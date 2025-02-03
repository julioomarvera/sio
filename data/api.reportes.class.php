<?php 
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";

class rReports extends BD 
{
    private $conn;

    function __construct()
    {
        $this->conn = new BD();
    }

    
}