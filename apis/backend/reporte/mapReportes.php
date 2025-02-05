<?php
$dir_fc = "../";

include_once $dir_fc.'data/reportes.class.php';
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/mapReportes',function(Request $request, Response $response){

    $id_usuario = $request->getParam('id_usuario');

    $cFn     = new cFunction();
    $cAccion = new cReports();

    $headers = $request->getHeaders();

    class mensaje {
        public $done;
        public $msg;
        public $row;
    }

    try{

        $token = $cFn->getToken( $headers );

        if($token == ""){
			throw new Exception("No token available");
        }

        JWT::decode($token, _SECRET_JWT_, array('HS256')); //val

        // if($id_usuario == "" || !is_numeric($id_usuario)){
        //     throw new Exception("No se recibió correctamente la información");
        // }

        $direccion = $cFn->direccion_api(0, 0, 1);
        var_dump($direccion);

        // $reportes = $cAccion->getReports( $id_reporte );

        $done   = false;
        $row    = "";
        $msg    = "noValido";
        $count  = 0;

        $resp = new mensaje();

		$resp->done 	= $done;
		$resp->msg 		= $msg;
		$resp->row		= $row;

		return $response->withJson($resp,200);

    }catch(\PDOException $e){
        $resp = new mensaje();
        $resp->done = false;
        $resp->msg  = "error ".$e->getMessage();
        return $response->whithJson($resp, 400);
    }
});