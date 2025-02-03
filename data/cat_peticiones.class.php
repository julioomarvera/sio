<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cPeticiones extends BD
{
    private $filtro;
    private $inicio;
    private $fin;
    private $limite;
    private $conn;

    function __construct()
    {

        $this->conn = new BD();
    }

    /**
     * Get the value of filtro
     */ 
    public function getFiltro()
    {
        return $this->filtro;
    }

    /**
     * Set the value of filtro
     *
     * @return  self
     */ 
    public function setFiltro($filtro)
    {
        $this->filtro = $filtro;

        return $this;
    }

    /**
     * Get the value of inicio
     */ 
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set the value of inicio
     *
     * @return  self
     */ 
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get the value of fin
     */ 
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set the value of fin
     *
     * @return  self
     */ 
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get the value of limite
     */ 
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     * Set the value of limite
     *
     * @return  self
     */ 
    public function setLimite($limite)
    {
        $this->limite = $limite;

        return $this;
    }


    private $array_search;
    private $id;

    /**
     * Get the value of array_search
     */ 
    public function getArray_search()
    {
        return $this->array_search;
    }

    /**
     * Set the value of array_search
     *
     * @return  self
     */ 
    public function setArray_search($array_search)
    {
        $this->array_search = $array_search;

        return $this;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getAllReg(){
        $milimite  = "";
        $condition = "";

        if($this->getLimite() == 1){ 
            $milimite = "LIMIT ".$this->getInicio().", ".$this->getFin();
        }

        if($this->getFiltro() != ""){
            $array_f = $this->getArray_search();

            if(isset($array_f["id_pet"]) && $array_f["id_pet"] != ""){
                $condition .= " AND id_peticion = ".$array_f["id_pet"]." ";
            }

            if(isset($array_f["name_p"]) && $array_f["name_p"] != ""){
                $condition .= " AND nombre LIKE '%".$array_f["name_p"]."%' ";
            }

            if(isset($array_f["dir_pe"]) && $array_f["dir_pe"] != ""){
                $condition .= " AND id_direccion = ".$array_f["dir_pe"]." ";
            }

            if(isset($array_f["dir_pe"]) && $array_f["dir_pe"] != "" &&
               isset($array_f["are_pe"]) && $array_f["are_pe"] != ""){
                $condition .= " AND id_area = ".$array_f["are_pe"]." ";
            }
        }

        $query = "SELECT id_peticion,
                         id_direccion,
                         id_area,
                         nombre,
                         activo
                    FROM cat_peticiones
                   WHERE 1 = 1
                    $condition 
                ORDER BY id_peticion DESC ".$milimite;

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }


    public function duplicatePeticion( $name ){
        $total = "";
        try{
            $query = "SELECT COUNT(id_peticion) as total
                        FROM cat_peticiones
                       WHERE nombre = '$name' ";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $total = $row->total;
            }
            return $total;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function insertReg( $data ){
        $exec     = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO cat_peticiones(id_usuario_captura,
                                              id_direccion,
                                              id_area,
                                              fecha_captura,
                                              nombre,
                                              descripcion)
                                       VALUES(?,
                                              ?,
                                              ?,
                                              NOW(),
                                              ?,
                                              ?)";

        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute( $data );

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }

        $exec->commit();
        return $correcto;
    }


    public function getRegbyId( $id_pt ){
        try{
            $query = "SELECT id_direccion,
                             id_area,
                             nombre,
                             descripcion
                        FROM cat_peticiones
                       WHERE id_peticion = $id_pt";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateReg( $data ){
        $correcto = 1;
        $exec       = $this->conn->conexion();

        try{     
            $update = "UPDATE cat_peticiones 
                          SET id_usuario_modifica = ?,
                              id_direccion        = ?,
                              id_area             = ?,
                              fecha_modifica      = NOW(),
                              nombre              = ?,
                              descripcion         = ?
                        WHERE id_peticion         = ?";
    
            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute( $data );
            $exec->commit();
            
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error: ".$e->getMessage();
        }
        return $correcto;
    }


    public function getRptExcel(){
        $condition = "";

        if($this->getFiltro() != ""){
            $array_f = $this->getArray_search();

            if(isset($array_f["id_pet"]) && $array_f["id_pet"] != ""){
                $condition .= " AND id_peticion = ".$array_f["id_pet"]." ";
            }

            if(isset($array_f["name_p"]) && $array_f["name_p"] != ""){
                $condition .= " AND nombre LIKE '%".$array_f["name_p"]."%' ";
            }

            if(isset($array_f["dir_pe"]) && $array_f["dir_pe"] != ""){
                $condition .= " AND id_direccion = ".$array_f["dir_pe"]." ";
            }

            if(isset($array_f["dir_pe"]) && $array_f["dir_pe"] != "" &&
               isset($array_f["are_pe"]) && $array_f["are_pe"] != ""){
                $condition .= " AND id_area = ".$array_f["are_pe"]." ";
            }
        }

        $query = "SELECT id_peticion,
                         id_usuario_captura,
                         id_usuario_modifica,
                         id_direccion,
                         id_area,
                         DATE_FORMAT(fecha_captura, '%d-%m-%Y') as fecha_captura,
                         DATE_FORMAT(fecha_modifica, '%d-%m-%Y') as fecha_modifica,
                         nombre,
                         descripcion,
                         activo
                    FROM cat_peticiones";

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
        
    }

    public function getUserById( $id_usr ){
        $name = "";

        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apepa, apema) as nombre
                        FROM ws_usuario
                       WHERE id_usuario = $id_usr";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $name = $row->nombre;
            }
            return $name;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_peticiones 
                       SET activo      = $tipo
                     WHERE id_peticion = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();
        
        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_peticiones 
                             WHERE id_peticion = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;
      
    }


    public function closeOut(){
        $this->conn = null;
    }

}
