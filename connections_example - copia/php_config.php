<?php
$proydes = "_siv3_local_rem";             //En caso de que sea producción cambiar este valor.

define('c_page_title','TEMPLATE BE');            //Titulo del proyecto
define('c_num_reg',10);                                 //Número general de registros en páginas a ocupar

//Sesiones Generales de Administración  ---
define('id_usr','cve_admin_'.$proydes);                 //Sesión principal del Usuario.

define('_SECRET_JWT_', '-Jess-SK-@-tinuy-ON-S3erv!SIO');
define('_issuer_claim_', 'localhost');
define('_audience_claim_', 'audience');
