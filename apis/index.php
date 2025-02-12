<?php
require '../connections/php_config.php';
require '../connections/trop.php';
require 'vendor/autoload.php';

$app = new \Slim\App;

$config = [
	'settings' => ['displayErrorDetails' => $showErrors]
];

$app = new Slim\App($config);

$app->add(function ($req, $res, $next) {
	$response = $next($req, $res);
	return $response
		->withHeader('Access-Control-Allow-Origin', '*')
		->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
		->withHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
});

$url_actual = $server_name . $_SERVER["REQUEST_URI"];

$datos = parse_url($url_actual);

foreach ($datos as $key => $value) {
	//Accesos
	if ($value == $api_complemento . "/apis/acceso") {
		require_once('backend/acceso.php');
	} elseif ($value == $api_complemento . "/apis/token") {
		require_once('backend/token.php');
	}

	//Combos
	elseif ($value == $api_complemento . "/apis/combos/comboTramites") {
		require_once('backend/combos/comboTramites.php');
	} 
	elseif ($value == $api_complemento . "/apis/combos/comboPeticiones") {
		require_once('backend/combos/comboPeticiones.php');
	}
	elseif ($value == $api_complemento . "/apis/combos/comoCiudadanos") {
		require_once('backend/combos/comboCiudadanos.php');
	}
	
	//Reportes
	elseif ($value == $api_complemento . "/apis/reporte/listReportes") {
		require_once('backend/reporte/listReportes.php');
	}
	elseif ($value == $api_complemento . "/apis/reporte/insertupdate") {
		require_once('backend/reporte/insertupdate.php');
	}
	elseif ($value == $api_complemento . "/apis/reporte/insertupdateSeguimiento") {
		require_once('backend/reporte/insertupdateSeguimiento.php');
	}
	elseif ($value == $api_complemento . "/apis/reporte/getReporteById") {
		require_once('backend/reporte/listReporteById.php');
	}
	elseif ($value == $api_complemento . "/apis/reporte/reportById") {
		require_once('backend/reporte/reportById.php');
	}
	elseif ($value == $api_complemento . "/apis/reporte/mapReportes"){
		require_once('backend/reporte/mapReportes.php');
	}

	//subir foto
	elseif ($value == $api_complemento . "/apis/reporte/listFoto") {
		require_once('backend/reporte/listFoto.php');
	}
	
	//subir foto insert documentos
	elseif ($value == $api_complemento . "/apis/reporte/insertFoto") {
		require_once('backend/reporte/insertFoto.php');
	}
	
	//Listar colonias dependiendo del usuario y sector
	elseif ($value == $api_complemento . "/apis/reporte/listColonias") {
		require_once('backend/reporte/listColonias.php');
	}

}

$app->run();
