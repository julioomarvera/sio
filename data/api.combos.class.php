<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";

class cCombos extends BD 
{
    private $conn;

    function __construct()
    {
        $this->conn = new BD();
    }


    public function getComboTramites(){
        try{
            $query = "SELECT id_remtys,
                             nombre
                        FROM cat_remtys
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getComboPeticiones(){
        try{
            $query = "SELECT id_peticion,
                             nombre
                        FROM cat_peticiones
                       WHERE activo = 1";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }



    public function getComboCiudadanos(){
        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat) as nombre
                        FROM cat_ciudadano
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }
}