<?php
$dir_fc = "../";

include_once $dir_fc.'data/reportes.class.php';
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/getReporteById',function(Request $request, Response $response){

    $id_reporte = $request->getParam('id_reporte');
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
		
        if($id_reporte == ""){
			throw new Exception("No se especificó el usuario");
		}
        
		$lista = $cAccion->getReporteById($id_reporte);
		
		$done 	   = false;
		$rows	   = array();
		$msg   	   = "noValido";
		$count 	   = 0;

		$count = $lista->rowCount();

		if($count > 0){
			while ($rsRow = $lista->fetch(PDO::FETCH_ASSOC)){		
				$rows[] = $rsRow;
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
		return $response->withJson($rows,400);
	}	      
});
