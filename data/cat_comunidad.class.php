<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cComunidad extends BD
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



    private $id;
    private $arraySearch;

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





    public function getAllReg(){
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["reg_n"]) && $array_f["reg_n"] != ""){
                $condition .= " AND id_comunidad = ".$array_f["reg_n"]." ";
            }

            if(isset($array_f["nom_n"]) && $array_f["nom_n"] != ""){
                $condition .= " AND colonia LIKE '%". $array_f["nom_n"]. "%' ";
            }
            if(isset($array_f["ase_n"]) && $array_f["ase_n"] != ""){
                $condition .= " AND id_tipo_asentamiento = ".$array_f["ase_n"]." ";
            }
            if(isset($array_f["sec_n"]) && $array_f["sec_n"] != ""){
                $condition .= " AND sectorint = ".$array_f["sec_n"]." ";
            }
        }

        $query = "  SELECT id_comunidad,
                           id_tipo_asentamiento,
                           colonia,
                           sectorint,
                           activo
                      FROM cat_comunidad
                     WHERE 1 = 1 $condition
                     ORDER BY id_comunidad DESC" . $milimite;
                    //  die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }


    public function getArrayAcentamiento(){
        $arraya = array();
        try{
            $query = "SELECT id_tipo_asentamiento, tipo_asentamiento
                        FROM cat_tipo_asentamiento
                       WHERE activo = 1 ";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowa = $result->fetch(PDO::FETCH_OBJ)){
                    $arraya[$rowa->id_tipo_asentamiento] = $rowa->tipo_asentamiento;
                }
            }
            return $arraya;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function duplicadoColonias($colonia, $asentamiento){
        try{
            $query = "SELECT id_comunidad
                        FROM cat_comunidad
                       WHERE colonia LIKE '%$colonia%'
                         AND id_tipo_asentamiento = $asentamiento";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertReg( $data ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $query_insert = "INSERT INTO cat_comunidad(id_tipo_asentamiento,
                                                       id_usuario_captura,
                                                       id_municipio,
                                                       fecha_captura,
                                                       codigo,
                                                       colonia,
                                                       zona,
                                                       poligono,
                                                       region,
                                                       sector,
                                                       tipo,
                                                       sectorint,
                                                       longitud,
                                                       latitud,
                                                       activo)
                                               VALUES (?,
                                                       ?,
                                                       ?,
                                                       NOW(),
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?,
                                                       ?)";

            $result = $this->conn->prepare($query_insert);
            $exec->beginTransaction();

            $result->execute( $data );

            if ($correcto == 1){
                $correcto= $exec->lastInsertId();
            }
            $exec->commit();
            return $correcto;
        }
        catch(\PDOException $e)
        {
            $exec->rollBack();
            return "Error!: " . $e->getMessage();
        }
    }


    public function getRegById(){
        try{
            $query = "SELECT id_comunidad,
                             id_tipo_asentamiento,
                             codigo,
                             colonia,
                             poligono,
                             region,
                             sectorint,
                             longitud,
                             latitud
                        FROM cat_comunidad
                       WHERE id_comunidad = ".$this->getId()." ";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){
            return "Error!: " . $e->getMessage();
        }
    }


    public function updateReg( $data_update ){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE cat_comunidad
                          SET id_tipo_asentamiento = ?,
                              id_usuario_modifica  = ?,
                              fecha_modificacion   = NOW(),
                              codigo               = ?,
                              colonia              = ?,
                              poligono             = ?,
                              region               = ?,
                              sectorint            = ?,
                              longitud             = ?,
                              latitud              = ?
                        WHERE id_comunidad         = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute( $data_update );
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateStatus($tipo){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE cat_comunidad
                          SET activo        = $tipo
                        WHERE id_comunidad  = ".$this->getId()." ";
            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function deleteReg(){
        $correcto = 2;
        try{
            $delete = "DELETE FROM cat_comunidad
                             WHERE id_comunidad = ".$this->getId()." ";
            $result = $this->conn->prepare($delete);
            $result->execute();

            return $correcto;
        }catch(\PDOException $e){
            return "Error!: ". $e->getMessage();
        }
    }


    public function getRptExcel(){

        $condition = "";

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["reg_n"]) && $array_f["reg_n"] != ""){
                $condition .= " AND id_comunidad = ".$array_f["reg_n"]." ";
            }

            if(isset($array_f["nom_n"]) && $array_f["nom_n"] != ""){
                $condition .= " AND colonia LIKE '%". $array_f["nom_n"]. "%' ";
            }
            if(isset($array_f["ase_n"]) && $array_f["ase_n"] != ""){
                $condition .= " AND id_tipo_asentamiento = ".$array_f["ase_n"]." ";
            }
            if(isset($array_f["sec_n"]) && $array_f["sec_n"] != ""){
                $condition .= " AND sectorint = ".$array_f["sec_n"]." ";
            }
        }

        $query = "  SELECT c.id_comunidad,
                           c.colonia,
                           c.sectorint,
                           c.zona,
                           c.activo,
                           a.tipo_asentamiento
                      FROM cat_comunidad as c
                 LEFT JOIN cat_tipo_asentamiento as a on c.id_tipo_asentamiento = a.id_tipo_asentamiento
                     WHERE 1 = 1 
                        $condition ";
                    //  die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;

    }

    public function getNameNot( $zona ){

        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno ) as notificador 
                        FROM cat_notificadores
                       WHERE activo = 1
                         AND zona = $zona";
                    // echo $query;
            
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getNameNotDtl( $id_comunidad ){
        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno ) as notificador 
                        FROM cat_notificadores
                       WHERE activo = 1
                         AND id_notificador IN (SELECT id_notificador
                                                  FROM cat_notificadores_dtl
                                                 WHERE id_comunidad = $id_comunidad)";
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