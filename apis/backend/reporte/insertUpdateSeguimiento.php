<?php
$dir_fc = "../";
include_once $dir_fc.'data/reportes.class.php';	
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/insertupdateSeguimiento',function(Request $request, Response $response){

	$id_update			= $request->getParam('id_update') ?? 0;

    $id_reporte = $request->getParam('id_reporte');
    $id_usuario_captura = $request->getParam('id_usuario');
    $id_accion = 7; //Actualmente lo dejé como agregando nota
    $seguimiento = 1;
    $observaciones = $request->getParam('observaciones') ?? '';

	$cFn 	 = new cFunction();
	$cAccion = new cReports();
	
	$headers = $request->getHeaders();
	
	class mensaje {
		public $done;
		public $msg;
		public $id;
	}
   
	try{

		$done	 = false;
		$msg     = "";
		$id_reg  = 0;
		
		$token 	 = $cFn->getToken( $headers );
	
		if($token == ""){
			throw new Exception("No token available");
		}

        if($id_reporte == "" || !is_numeric($id_reporte)){
            throw new Exception("Se requiere del número de reporte");
        }
        
        if($id_usuario_captura == "" || !is_numeric($id_usuario_captura)){
            throw new Exception("Debes de especificar el usuario que está realizando el moviemiento");
        }

		JWT::decode($token, _SECRET_JWT_, array('HS256')); //valida jwt, si no es válido tira una exepción

        $fecha_captura     = date('Y-m-d H:i:s');

		$data = array(
            $id_usuario_captura,
            $fecha_captura,
            $observaciones,
            $id_reporte
        );

        if($id_update == 0){
            $insert    = $cAccion->insertSeguimiento( $data );
            $strResp   = " insertado ";
            $id_reg    = $insert; 	
        }else{
            array_pop($data); //sin id_reporte
            array_push($data, $id_update);
            $insert    = $cAccion->updateRegSeguimiento( $data );
            $strResp   = " actualizado ";
            $id_reg    = $id_update; 
        }

        if(!is_numeric($id_reg )){
            throw new Exception("Ocurrió un inconveniente ".$id_reg);
        }

        $done = true;
        $msg = "Registro $strResp correctamente";

		$resp = new mensaje();
		$resp->done = $done;
		$resp->msg  = $msg;
		$resp->id   = $id_reg;
		
		return $response->withJson($resp,200);
		
			
	}catch(Exception $e){
		$resp = new mensaje();
		$resp->done = false;
		$resp->msg 	 = "Error: ". $e->getMessage();
		return $response->withJson($resp,400);
	}	   	   
});
