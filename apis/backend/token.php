<?php
$dir_fc = "../";
require_once $dir_fc."common/function.class.php";
include_once $dir_fc.'data/users.class.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->get('/token',function(Request $request, Response $response){

	$cFn 	 = new cFunction();
	$cUsers  = new cUsers();
	
	$headers = $request->getHeaders();
	
	class mensaje {
		public $done;
		public $msg;
		public $uid;
		public $token;
	}
	
	try{

		$done 	 = false;
		$msg	 = "noValido";
		$uid     = null;
		$id_rol  = null;
		$name    = null;
		$user_name = null;
		$token   = null;
		$img_route = null;
		$systemOptions = [];

		$token 	 = $cFn->getToken( $headers );
		
		if($token == "" || !$token){
			throw new Exception("No token available");
		}

		$decoded = JWT::decode($token, _SECRET_JWT_, array('HS256')); //valida jwt si no es válido tira una exepción
		//Obteniendo el ID del user para consultar sus datos
		$data = $decoded->data;

		if(!is_numeric($data->id) || $data->id <= 0){
			throw new Exception("No se recibió el parámetro de manera correcta");
		}

		$selectUser = $cUsers->getUserById($data->id);

		if($selectUser->rowCount() <= 0){
			throw new Exception("No se encuentran datos con el usuario en curso");
		}

		$msg	 = "Token válido";
		$data   = $selectUser->fetch(PDO::FETCH_OBJ);

		$uid	 = $data->id_usuario;
		$name    = utf8_encode($data->nombrecompleto);
		$user_name    = utf8_encode($data->usuario);
		$id_rol    = $data->id_rol;
		$img_route = $data->img;
		$admin 	   = $data->admin;
		$id_sector	= intval($data->id_sector);
		$id_zona	= intval($data->id_zona);
		$id_seccion	= intval($data->id_seccion);
		
		$done 	 = true;
		$msg 	 = "Usuario con datos";

		//Opciones de usuario
		$systemOptions["admin"] = intval($admin);

		$resp = new mensaje();

		$resp->done 	 = $done;
		$resp->msg   	 = $msg;
		$resp->name      = $name;
		$resp->user_name = $user_name;
		$resp->id_sector  =	$id_sector;
		$resp->id_zona 	  =	$id_zona;
		$resp->id_seccion =	$id_seccion;
		$resp->id_rol 	 = $id_rol;
		$resp->uid    	 = $uid;
		$resp->token     = $token;
		$resp->img_route = $img_route;
		$resp->systemOptions = $systemOptions;

		return $response->withJson($resp,200);

	}catch(Exception $e){

		$resp = new mensaje();
		$resp->done = false;
		$resp->msg  = $e->getMessage();
		return $response->withJson($resp,200);

	}	   	   
});