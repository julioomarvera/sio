<?php
$dir_fc = "../";

include_once $dir_fc.'data/reportes.class.php';
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;
use PHPMailer\PHPMailer\Exception;

$app->post('/reporte/reportById',function(Request $request, Response $response){

    $id_reporte = $request->getParam('id_reporte');

    $cFn     = new cFunction();
    $cAccion = new cReports();

    $headers = $request->getHeaders();

    class mensaje {
        public $done;
        public $msg;
        public $row;
        public $count;
        public $follow;
    }

    try{

        $token = $cFn->getToken( $headers );

        if($token == ""){
			throw new Exception("No token available");
        }

        JWT::decode($token, _SECRET_JWT_, array('HS256')); //valida jwt, si no es válido tira una exepción

        if($id_reporte == "" || !is_numeric($id_reporte)){
            throw new Exception("No se recibió correctamente la información");
        }

        $reporte = $cAccion->getReport( $id_reporte );

        $done   = false;
        $row    = "";
        $msg    = "noValido";
        $count  = 0;

        $count = $reporte->rowCount();

        if($count > 0){
            while($rsRow = $reporte->fetch(PDO::FETCH_OBJ)){
                $row = $rsRow;

                $follow = array();
                $history =  $cAccion->getFollowById( $id_reporte );
                while($rfRow = $history->fetch(PDO::FETCH_OBJ)){
                    $follow[] = $rfRow;
                }    
                $row->seguimiento = $follow;
            }

            $done = true;	
            $msg   = "Regsitro consultado correctamente";
        }

        $resp = new mensaje();

		$resp->done 	= $done;
		$resp->msg 		= $msg;
		$resp->row		= $row;
		$resp->count	= $count;

		return $response->withJson($row,200);
		

    }catch(Exception $e){
        $resp = new mensaje();
        $resp->done = false;
        $resp->msg  = "error ".$e->getMessage();
        return $response->whithJson($row, 400);
    }

});