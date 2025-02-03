<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cContacto extends BD
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


    private $id_dependencia_ext;
    private $descripcion_ext;
    private $id;


        /**
     * Get the value of id_dependencia_ext
     */ 
    public function getId_dependencia_ext()
    {
        return $this->id_dependencia_ext;
    }

    /**
     * Set the value of id_dependencia_ext
     *
     * @return  self
     */ 
    public function setId_dependencia_ext($id_dependencia_ext)
    {
        $this->id_dependencia_ext = $id_dependencia_ext;

        return $this;
    }


        /**
     * Get the value of descripcion_ext
     */ 
    public function getDescripcion_ext()
    {
        return $this->descripcion_ext;
    }

    /**
     * Set the value of descripcion_ext
     *
     * @return  self
     */ 
    public function setDescripcion_ext($descripcion_ext)
    {
        $this->descripcion_ext = $descripcion_ext;

        return $this;
    }


    private $array_search;
    
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



    public function getAllReg(){
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArray_search();

            if(isset($array_f["dep_b"]) && $array_f["dep_b"] != ""){
                $condition .= " AND descripcion_dependencia LIKE '%".$array_f["dep_b"]."%' ";
            }

            if(isset($array_f["obs_b"]) && $array_f["obs_b"] != ""){
                $condition .= " AND descripcion LIKE '%".$array_f["obs_b"]."%' ";
            }
        }

        $query = "  SELECT id_dependencia_ext,
                           descripcion_dependencia,
                           descripcion,
                           activo
                      FROM cat_dependencia_externa 
                     WHERE 1 = 1
                     $condition
                     ORDER BY id_dependencia_ext DESC" . $milimite;
                    //  die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }

    public function insertReg($data){
        $correcto = 1;
        $exec = $this->conn->conexion();

        $insert = " INSERT INTO cat_dependencia_externa(id_usuario_captura,
                                                        fecha_captura,
                                                        descripcion_dependencia,
                                                        descripcion)
                                                 VALUES(?,
                                                        NOW(),
                                                        ?,
                                                        ?)";                                    
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data);
        if($correcto == 1){
            $correcto = $exec->lastInsertId();
            $this->setId_dependencia_ext($correcto);
        }
        $exec->commit();
        return $correcto;
    }



    public function getRegById($id){
            $query = "SELECT id_dependencia_ext,
                             descripcion_dependencia,
                             descripcion
                        FROM cat_dependencia_externa
                       WHERE id_dependencia_ext =  $id 
                       LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
    }


    public function updateReg($data){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        
        $update = "UPDATE cat_dependencia_externa
                        SET id_usuario_modifica     = ?,
                            fecha_modifica          = NOW(),
                            descripcion_dependencia = ?,
                            descripcion             = ?
                    WHERE id_dependencia_ext      = ? ";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute($data);
        $exec->commit();
      
        return $correcto;
    }


    public function updateStatus( $tipo ){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_dependencia_externa 
                       SET activo = $tipo
                     WHERE id_dependencia_ext = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }


    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_dependencia_externa 
                             WHERE id_dependencia_ext = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;

    }


    public function closeOut(){
        $this->conn = null;
    }

}