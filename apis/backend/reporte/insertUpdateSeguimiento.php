<?php
$dir_fc = "../";
include_once $dir_fc.'data/reportes.class.php';	
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/insertupdateSeguimiento',function(Request $request, Response $response){
	$id_update			= $request->getParam('id_seguimiento') ?? 0;

    $id_reporte = $request->getParam('id_reporte');
    $id_usuario_captura = $request->getParam('id_usuario');
    $atendido = $request->getParam('atendido');
    $datosCompletos  = $request->getParam('datosCompletos');

    $latitud = $request->getParam('latitud');
    $longitud = $request->getParam('longitud');

    $id_accion = 7; //Actualmente lo dejé como agregando nota
    $seguimiento = 1;
    $observaciones = $request->getParam('observaciones') ?? '';

    $uploadedFiles = $request->getParam('imageRuta');

    $atendido = ($atendido == "") ? 0 : $atendido;
    $datosCompletos = ($datosCompletos  == "") ? 0 : 1;

	$cFn 	 = new cFunction();
	$cAccion = new cReports();

	$headers = $request->getHeaders();

	class mensaje {
		public $done;
		public $msg;
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
        
        if($latitud == "" || $longitud == ""){
            throw new Exception("Debes de especificar la latitud y longitud");
        }
        
        if(!is_numeric($atendido)){
            throw new Exception("Debes de especificar si está atendido o no");
        }

		JWT::decode($token, _SECRET_JWT_, array('HS256')); //valida jwt, si no es válido tira una exepción

        $fecha_captura     = date('Y-m-d H:i:s');

		$data = array(
            $id_usuario_captura,
            $fecha_captura,
            $observaciones,
            $atendido,
            $latitud,
            $longitud,
            $datosCompletos,
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

        if($atendido == 1){
            $cAccion->updateAtendidoByReporteMaster($id_reporte);
        }

        $pathLocal    = "img/fotoseguimiento/";
        $pathLocalAnt = "img/fotoTerritorialCopia/";
        //$uploadDir = "../$pathLocal"; 
//
        //$uploadedFile = $uploadedFiles['foto'];
//
        //if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        //    $permitidos = array("image/jpg", "image/jpeg", "image/png");
        //    
        //    if(in_array($uploadedFile->getClientMediaType(), $permitidos)){
        //        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    //
        //        $basename = bin2hex(random_bytes(8));
        //        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $partes = explode(".", $uploadedFiles);
        $extension = end($partes);

        $dataInsertDocto = array(
            $id_reporte,
            $id_reg,
            $id_usuario_captura,
            $uploadedFiles,
            $extension,
            $pathLocal,
        );


        $insertDocumentoDB = $cAccion->insertDocumento($dataInsertDocto);
        if(is_numeric($insertDocumentoDB)){

            $pathLocalName = md5($insertDocumentoDB).".".$extension;

            $new_route = "../".$pathLocal.$pathLocalName;
            $route_ant = "../".$pathLocalAnt.$uploadedFiles;

            $sio_dir = "../../"._NAME_MAIN_FOLDER_."/files/reporte/historia"; //este despues se agrega a variable de entorno

            $rutaCopyToSio = $sio_dir."/".$pathLocalName;
            //$uploadedFile->moveTo($uploadDir . DIRECTORY_SEPARATOR . $filename);
            if(file_exists($route_ant)){
                copy($route_ant, $new_route);
                copy($new_route, $rutaCopyToSio);
            } else {
                $msg = "No existe el archivo";
            }
        }else{
            $msg = "Ocurrió un inconveniente ".$insertDocumentoDB;
        }

        $done = true;
        $msg.= "Registro $strResp correctamente";

		$resp = new mensaje();
		$resp->done = $done;

		return $response->withJson($done,200);


	}catch(Exception $e){
		$resp = new mensaje();
		$resp->done = false;
		$resp->msg 	 = "Error: ". $e->getMessage();
		return $response->withJson($done,400);
	}	   	   
});