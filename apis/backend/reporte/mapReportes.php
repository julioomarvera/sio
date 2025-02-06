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


        $reportes = $cAccion->getReportsMap( $id_usuario );

        $done   = false;
        $maps   = [];
        $msg    = "noValido";

        $array_colors = array("55" => "blue",
                              "56" => "green",
                              "57" => "yellow",
                              "58" => "purple",
                              "59" => "orange",
                              "60" => "cyan",
                              "61" => "pink",
                              "62" => "black",
                              "63" => "brown", 
                              "64" => "gray",
                              "65" => "goldenrod",
                              "66" => "indigo",
                              "67" => "navy",
                              "68" => "saddlebrown",
                              "69" => "slateblue",
                              "70" => "yellowgreen",
                              "71" => "wheat",
                              "72" => "peru",
                              "73" => "mediumslateblue",
                              "74" => "indianred",
                              "75" => "hotpink",
                              "76" => "forestgreen",
                              "77" => "dimgrey",
                              "78" => "darkslategrey");


        if($reportes->rowCount() > 0){
            $row    = [];
            while($rsRow = $reportes->fetch(PDO::FETCH_OBJ)){
                $id_reporte        = $rsRow->id_reporte;      
                $latitud_reporte   = $rsRow->latitud_reporte;              
                $longitud_reporte  = $rsRow->longitud_reporte;              
                $tramite           = $rsRow->tramite;      
                $id_direccion_asig = $rsRow->id_direccion_asig;    

                $row['id_reporte']       = $id_reporte;
                $row['latitud_reporte']  = $latitud_reporte;
                $row['longitud_reporte'] = $longitud_reporte;
                $row['tramite']          = $tramite;              
                
                foreach ($array_colors as $key => $value) {
                    if($key == $id_direccion_asig){
                        $color = $value;
                        $row['color'] = $color;
                    }
                }  

                array_push($maps, $row); 
            }

            $done = true;	
            $msg   = "Regsitro consultado correctamente";
        }        

        $resp = new mensaje();

		$resp->done 	= $done;
		$resp->msg 		= $msg;
		$resp->row		= $maps;

		return $response->withJson($resp,200);

    }catch(\PDOException $e){
        $resp = new mensaje();
        $resp->done = false;
        $resp->msg  = "error ".$e->getMessage();
        return $response->whithJson($resp, 400);
    }
});