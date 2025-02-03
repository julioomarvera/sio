<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cNotificadores extends BD
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

    /**
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * Set the value of conn
     *
     * @return  self
     */ 
    public function setConn($conn)
    {
        $this->conn = $conn;

        return $this;
    }

    
    private $arraySearch;

    
    /**
     * Get the value of arraySearch
     */ 
    public function getArraySearch()
    {
        return $this->arraySearch;
    }

    /**
     * Set the value of arraySearch
     *
     * @return  self
     */ 
    public function setArraySearch($arraySearch)
    {
        $this->arraySearch = $arraySearch;

        return $this;
    }


    private $id;


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

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["id_n"]) && $array_f["id_n"] != ""){
                $condition .= " AND id_notificador = ".$array_f["id_n"]." ";
            }

            if(isset($array_f["no_b"]) && $array_f["no_b"] != ""){
                $condition .= " AND CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno) LIKE '%".$array_f["no_b"]."%' ";
            }


            if(isset($array_f["zo_b"]) && $array_f["zo_b"] != ""){
                if($array_f["zo_b"] == '0' ){
                    $condition .= " AND zona IS NULL ";
                }else{
                    $condition .= " AND zona = ".$array_f["zo_b"]." ";
                }
            }
        }     

        $query = "  SELECT id_notificador,
                           CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno ) as nombre_notificador,
                           zona,
                           activo
                      FROM cat_notificadores 
                     WHERE 1 = 1
                     $condition
                  ORDER BY id_notificador DESC" . $milimite;
                // die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }


    public function getAllComunidades($busqueda, $registros){
        try{

            $query = "SELECT c.id_comunidad,
                             CONCAT_WS(' ', t.abreviatura, c.colonia) as colonia
                        FROM cat_comunidad as c 
                   LEFT JOIN cat_tipo_asentamiento as t on t.id_tipo_asentamiento = c.id_tipo_asentamiento
                       WHERE c.activo = 1
                        AND  c.colonia LIKE '%".$busqueda."%' 
                      LIMIT $registros";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function repeatedNotifier( $nombre, $apepa, $apema ){
        $total = 0;
        try{
            $query = "SELECT COUNT(id_notificador) as total 
                        FROM cat_notificadores
                       WHERE nombre           = '$nombre'
                         AND apellido_paterno = '$apepa'
                         AND apellido_materno = '$apema' "; 

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

        $insert = "INSERT INTO cat_notificadores(id_usuario_captura,
                                                 fecha_captura,
                                                 nombre,
                                                 apellido_paterno,
                                                 apellido_materno,
                                                 zona)
                                          VALUES(?,
                                                 NOW(),
                                                 ?,
                                                 ?,
                                                 ?,
                                                 ?)";
        
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data);

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }

        $exec->commit();
        return $correcto;
    }



    public function insertDtl( $data_dtl ){

        $exec = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO cat_notificadores_dtl(id_notificador,
                                                     id_comunidad,
                                                     activo)
                                              VALUES(?,
                                                     ?,
                                                     ?)";
                                                
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute( $data_dtl );

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }

        $exec->commit();
        return $correcto;
    }


    public function getRegById( $id ){
        try{
            $query = "SELECT id_notificador,
                             nombre,
                             apellido_paterno,
                             apellido_materno,
                             zona
                        FROM cat_notificadores
                       WHERE id_notificador = $id ";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }



    public function getColoniasDtl( $id_notificador ){
        $array = array();
        try{
            $query = "SELECT id_comunidad
                        FROM cat_notificadores_dtl
                       WHERE id_notificador = $id_notificador ";
                    
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    array_push($array, $row->id_comunidad);
                }
            }

            return $array;

        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getColonias(){
        try{
            $query = "SELECT c.id_comunidad,
                             CONCAT_WS(' ', t.abreviatura, c.colonia) as colonia_name
                        FROM cat_comunidad as c 
                   LEFT JOIN cat_tipo_asentamiento as t on t.id_tipo_asentamiento = c.id_tipo_asentamiento
                       WHERE 1 = 1
                         AND c.activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateReg( $data_upd ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE cat_notificadores
                          SET id_usuario_modifica = ?,
                              fecha_modifica      = NOW(),
                              nombre              = ?,
                              apellido_paterno    = ?,
                              apellido_materno    = ?,
                              zona                = ?
                        WHERE id_notificador      = ?";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute( $data_upd );
            $exec->commit();

        }catch(\Exception $e){
            $exec->rollBack();
            $correcto = "Error: ".$e->getMessage();
        }
        return $correcto;
    }



    public function deleteDtl( $id_notificador ){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_notificadores_dtl
                             WHERE id_notificador = $id_notificador ";

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;
    }

    public function updateStatus($tipo){
        
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_notificadores 
                       SET activo = $tipo
                     WHERE id_notificador = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();
        
        return $correcto;
    }



    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_notificadores
                             WHERE id_notificador = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;
      
    }


    public function getRepExcel(){
        
        $condition = "";

        if($this->getFiltro() != ""){

            $array_f = $this->getArraySearch();

            if(isset($array_f["id_n"]) && $array_f["id_n"] != ""){
                $condition .= " AND id_notificador = ".$array_f["id_n"]." ";
            }

            if(isset($array_f["no_b"]) && $array_f["no_b"] != ""){
                $condition .= " AND CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno ) LIKE '%".$array_f["no_b"]."%' ";
            }

            if(isset($array_f["zo_b"]) && $array_f["zo_b"] != ""){
                if($array_f["zo_b"] == '0' ){
                    $condition .= " AND zona IS NULL ";
                }else{
                    $condition .= " AND zona = ".$array_f["zo_b"]." ";
                }
            }
        }

        try{

            $query = "SELECT id_notificador,
                             id_usuario_captura,
                             id_usuario_modifica,
                             DATE_FORMAT(fecha_captura, '%d/%m/%Y') as fecha_captura,
                             DATE_FORMAT(fecha_modifica, '%d/%m/%Y') as fecha_modifica,
                             nombre,
                             apellido_paterno,
                             apellido_materno,
                             zona,
                             activo 
                        FROM cat_notificadores
                       WHERE 1 = 1
                       $condition
                    ORDER BY id_notificador DESC ";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getNameUsr( $id_usr ){
        $nombre = "";
        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apepa, apema ) as nombre 
                        FROM ws_usuario
                       WHERE id_usuario = $id_usr ";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $nombre = $row->nombre;
            }
            return $nombre;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getDataColonysByZona( $not, $zona ){

        try{
            $query = "SELECT c.colonia,
                             CONCAT_WS(' ', n.nombre, n.apellido_paterno, n.apellido_materno) as notificador
                        FROM cat_comunidad as c
                   LEFT JOIN cat_notificadores as n on c.zona = n.zona
                       WHERE c.zona = $zona 
                         AND n.id_notificador = $not";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getDataColonysByDtl( $not ){
        try{
            $query = "SELECT c.colonia
                        FROM cat_notificadores_dtl as d
                   LEFT JOIN cat_comunidad as c on c.id_comunidad = d.id_comunidad
                       WHERE d.id_notificador = $not";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }

    public function closeOut(){
        $this->conn = null;
    }


}

?>