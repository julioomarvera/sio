<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

$app->post('/reporte/listFoto',function(Request $request, Response $response){

     $dir_fc = "../";
    $uploadDir = $dir_fc."img/fotoTerritorialCopia/"; 
    // Verificar si se recibe una imagen
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {

        class mensaje {
            public $path;
        }
        
        $fileName = basename($_FILES["file"]["name"]); // Nombre del archivo
        $filePath = $uploadDir . uniqid() . "_" . $fileName; // Ruta con nombre único
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION)); // Tipo de archivo
        // Extensiones permitidas
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (!in_array($fileType, $allowedTypes)) {
            echo json_encode(["success" => false, "message" => "Formato no permitido"]);
            exit;
        }
        $resp = new mensaje();

        // Mover la imagen a la carpeta "uploads/"
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
            // echo json_encode([
            //     "success" => true,
            //     "message" => "Imagen subida con éxito",
            //     "path" => $filePath
            // ]);
             $resp->path = $filePath;
            // echo json_encode([$filePath]); 

            return $response->withJson($resp,200);
        } else {
            echo json_encode(["success" => false, "message" => "Error al subir la imagen 2"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "No se recibió ninguna imagen"]);
    }
});
?>
