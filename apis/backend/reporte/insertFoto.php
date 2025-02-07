<?php
$dir_fc = "../";
include_once $dir_fc.'data/reportes.class.php';	
require_once $dir_fc."common/function.class.php";	

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/insertFoto',function(Request $request, Response $response){

    $id_reporte = $request->getParam('id_reporte');
    $id_historia_reporte = $request->getParam('id_seguimiento');
    $id_usuario_captura = $request->getParam('id_usuario');
    $uploadedFiles = $request->getUploadedFiles();

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
		$insertDocumentoDB  = 0;

        if($id_reporte == "" || !is_numeric($id_reporte)){
            throw new Exception("Se requiere del número de reporte");
        }

        if($id_usuario_captura == "" || !is_numeric($id_usuario_captura)){
            throw new Exception("Debes de especificar el usuario que está realizando el moviemiento");
        }

        $pathLocal = "img/fotoseguimiento/";
        $uploadDir = "../$pathLocal"; 

        $uploadedFile = $uploadedFiles['foto'];

        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $permitidos = array("image/jpg", "image/jpeg", "image/png");
            
            if(in_array($uploadedFile->getClientMediaType(), $permitidos)){
                $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    
                $basename = bin2hex(random_bytes(8));
                $filename = sprintf('%s.%0.8s', $basename, $extension);

                $dataInsertDocto = array(
                    $id_reporte,
                    $id_historia_reporte,
                    $id_usuario_captura,
                    $filename,
                    $extension,
                    $pathLocal,
                );
        
                $insertDocumentoDB = $cAccion->insertDocumento($dataInsertDocto);
    
                $uploadedFile->moveTo($uploadDir . DIRECTORY_SEPARATOR . $filename);
            }else{
                throw new Exception("El tipo de dato adjunto no es válido");
            }
        }

        if(!is_numeric($insertDocumentoDB )){
            throw new Exception("Ocurrió un inconveniente ".$insertDocumentoDB);
        }

        $done = true;
        $msg = "Registro insertado correctamente";

		$resp = new mensaje();
		$resp->done = $done;
		$resp->msg  = $msg;
		$resp->id   = $insertDocumentoDB;

		return $response->withJson($resp,200);


	}catch(Exception $e){
		$resp = new mensaje();
		$resp->done = false;
		$resp->msg 	 = "Error: ". $e->getMessage();
		return $response->withJson($resp,400);
	}	   	   
});