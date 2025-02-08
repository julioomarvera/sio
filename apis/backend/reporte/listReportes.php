<?php
$dir_fc = "../";

include_once $dir_fc.'data/reportes.class.php';
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/listReportes',function(Request $request, Response $response){

    $id_current_user = $request->getParam('id_current_user');
	$id_rol 		 = $request->getParam('id_rol');
	$id_sector  	 = $request->getParam('id_sector');
	$id_zona  		 = $request->getParam('id_zona');
	$id_seccion      = $request->getParam('id_seccion');

	$cFn 	 = new cFunction();
	$cAccion = new cReports();
	
	$headers = $request->getHeaders();

	class mensaje {
		public $done;
		public $msg;
		public $rows;
		public $count;
	}
   
	try{

		$token 	 = $cFn->getToken( $headers );
	
		if($token == ""){
			throw new Exception("No token available");
		}
        
        JWT::decode($token, _SECRET_JWT_, array('HS256')); //valida jwt, si no es válido tira una exepción
		
        if($id_current_user == ""){
			throw new Exception("No se especificó el usuario");
		}
        
        if($id_rol == ""){
			throw new Exception("No se especificó el perfil del usuario");
		}

        if($id_sector == "" || $id_zona == "" || $id_seccion == ""
         || !is_numeric($id_sector) || !is_numeric($id_zona) || !is_numeric($id_seccion)){  
            throw new Exception("No se especificó correctamente el sector, zona o sección");
        }

		$lista = $cAccion->getAllReg(
            $id_current_user,
            $id_rol,
            $id_sector,
            $id_zona,
            $id_seccion
        );
		
		$done 	   = false;
		$rows	   = array();
		$msg   	   = "noValido";
		$count 	   = 0;
		
		$count = $lista->rowCount();		
		if($count > 0){
			while ($rsRow = $lista->fetch(PDO::FETCH_OBJ)){	

				$get_atentido = $cAccion->getAtendidoByHistory( $rsRow->id_reporte );
				if($get_atentido == ""){
					$rows[] = $rsRow;

				}		
				
				// var_dump($data);
			}
			$done = true;	
			$msg   = "Lista consultada correctamente";
		}

		$resp = new mensaje();

		$resp->done 	= $done;
		$resp->msg 		= $msg;
		$resp->rows		= $rows;
		$resp->count	= $count;

		return $response->withJson($rows,200);
		
	}catch(Exception $e){
		$resp = new mensaje();
		$resp->done		= false;
		$resp->msg		= "error ".$e->getMessage();
		return $response->withJson($resp,400);
	}	      
});
