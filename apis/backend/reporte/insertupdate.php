<?php
$dir_fc = "../";

include_once $dir_fc.'data/reportes.class.php';
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/listFoto',function(Request $request, Response $response){

    $file               = $request->getParam('file');
    $id_reporte         = $request->getParam('id_reporte');
    $fecha_seguimiento  = $request->getParam('fecha_segumiento');
    $id_usuario_captura = $request->getParam('id_usuario_captura');
    $observaciones      = $request->getParam('observaciones');

    $cFn     = new cFunction();
    $cAccion = new cReports();

    $headers = $request->getHeaders();

    class mensaje {
        public $done;
        public $msg;
        public $row;
    }


   
});