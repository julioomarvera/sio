<?php
$dir_fc = "../";
include_once $dir_fc.'data/users.class.php';
include_once $dir_fc.'connections/trop.php';

use Complex\Exception;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/acceso',function(Request $request, Response $response){

	$txtUser = $request->getParam('user');
	$txtPass = $request->getParam('password');

	$txtPass = md5($txtPass);
	
	$cUsers	 =	new cUsers();

	class mensaje {
		public $done;
		public $msg;
		public $name;
		public $uid;
		public $token;
	}
	
	try{

		$done 	       = false;
		$msg	       = "noValido";
		$uid           = null;
		$id_rol        = null;
		$name          = null;
		$user_name     = null;
		$token         = null;
		$systemOptions = [];

		$img_route 	   = null;
		$id_sector 	   = null;
		$id_zona 	   = null;
		$id_seccion    = null;

		if($txtUser == "" || $txtPass == ""){
			throw new Exception("Debes de ingresar los valores correctos");
		}
		
		$selectUser = $cUsers->getUser($txtUser, $txtPass);
		
		if($selectUser->rowCount() == 0){
			throw New Exception("Usuario no válido");
		}

		$data   = $selectUser->fetch(PDO::FETCH_OBJ);
		$uid	   = $data->id_usuario;
		$name      = utf8_encode($data->nombrecompleto);
		$user_name = utf8_encode($data->usuario);
		$id_rol    = $data->id_rol;
		$img_route = $data->img;
		$admin 	   = $data->admin;
		$id_sector	= intval($data->id_sector);
		$id_zona	= intval($data->id_zona);
		$id_seccion	= intval($data->id_seccion);

		if($id_sector == 0){

		}

		$issuedat_claim = time(); // issued at
		$expire_claim = $issuedat_claim + 37000; // expire time in seconds
		
		$token = array(
			"iss" => _issuer_claim_,
			"aud" => _audience_claim_,
			"iat" => $issuedat_claim,
			"exp" => $expire_claim,
			"data" => array(
				"id" => $data->id_usuario,
			)
		);

		$token  = JWT::encode($token, _SECRET_JWT_);
		
		$done 	 = 1;
		$msg 	 = "Usuario con datos";

		//Opciones de usuario
		$systemOptions["admin"] = intval($admin);

		$resp = new mensaje();

		$resp->done 	  = $done;
		$resp->msg   	  = $msg;
		$resp->name       = $name;
		$resp->user_name  = $user_name;
		$resp->id_sector  =	$id_sector;
		$resp->id_zona 	  =	$id_zona;
		$resp->id_seccion =	$id_seccion;
		$resp->id_rol 	  = $id_rol;
		$resp->uid    	  = $uid;
		$resp->token      = $token;
		$resp->img_route  = $img_route;

		$resp->systemOptions = $systemOptions;
		
		return $response->withJson($resp,200);

	}catch(Exception $e){

		$resp = new mensaje();
		$resp->done = 0;
		$resp->msg  = $e->getMessage();
		return $response->withJson($resp,200);

	}	   	   
});

