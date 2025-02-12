<?php
$dir_fc = "../";

include_once $dir_fc.'data/users.class.php';
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/listColonias',function(Request $request, Response $response){

    $id_current_user = $request->getParam('id_current_user');

	$cFn 	 = new cFunction();
	$cAccion = new cUsers();
	
	$headers = $request->getHeaders();

	class mensaje {
		public $done;
		public $msg;
		public $colonias;
		public $count;
	}
   
	try{

		$done 	   = false;
		$arrComunidadesUser  = array();
		$msg   	   = "noValido";
		$countComunidades = 0;

		$token 	 = $cFn->getToken( $headers );
	
		if($token == ""){
			throw new Exception("No token available");
		}
        
        JWT::decode($token, _SECRET_JWT_, array('HS256')); //valida jwt, si no es válido tira una exepción
		
        if($id_current_user == ""){
			throw new Exception("No se especificó el usuario");
		}
        
		$rsDataUser = $cAccion->getUserById($id_current_user);

		if($rsDataUser->rowCount() == 0){
			throw new Exception("No se encontró el usuario especificado");
		}

		$rwInfoUser = $rsDataUser->fetch(PDO::FETCH_OBJ);

		$id_rol = $rwInfoUser->id_rol;
		$id_sector = $rwInfoUser->id_sector;
		$id_zona = $rwInfoUser->id_zona;
		$id_seccion = $rwInfoUser->id_seccion;

        $arrComunidadesUser = array();

		$rsComunidades = $cAccion->getColoniasByProfile($id_rol, $id_zona, $id_sector, $id_seccion);

		$countComunidades = $rsComunidades->rowCount();

		while($rowComunidad = $rsComunidades->fetch(PDO::FETCH_OBJ)){
			$arrComunidadesUser[] = $rowComunidad;
		}

		$done = true;
		$msg = "Colonias consultadas correctamente";

		$resp = new mensaje();

		$resp->done 	= $done;
		$resp->msg 		= $msg;
		$resp->colonias	= $arrComunidadesUser;
		$resp->count	= $countComunidades;

		return $response->withJson($resp,200);
		
	}catch(Exception $e){
		$resp = new mensaje();
		$resp->done		= false;
		$resp->msg		= "error ".$e->getMessage();
		return $response->withJson($resp,400);
	}	      
});
