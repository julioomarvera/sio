<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cModulos extends BD
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
            $condition = " WHERE observaciones LIKE '%" . $this->getFiltro() . "%' ";
        }     

        $query = "  SELECT id_modulo,
                           observaciones,
                           activo
                      FROM cat_modulos 
                     $condition
                     ORDER BY id_modulo DESC" . $milimite;
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }

    public function insertReg( $data ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        $insert = "INSERT INTO cat_modulos(id_usuario_captura,
                                                    fecha_captura,
                                                    observaciones)
                                            VALUES (?,
                                                    ?,
                                                    ?)";

        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute( $data );

        if ($correcto == 1){
            $correcto= $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;
       
    }



    public  function getRegById()  {
        $query = "SELECT id_modulo, observaciones
                    FROM cat_modulos
                    WHERE id_modulo = ".$this->getId();
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }



    public function updateReg( $data ){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        $update = " UPDATE cat_modulos
                       SET id_usuario_modifica  = ?,  
                           fecha_modifica       = ?,
                           observaciones        = ?
                     WHERE id_modulo            = ? ";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute($data);
        $exec->commit();
        
        return $correcto;
    }


    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_modulos 
                       SET activo = $tipo
                     WHERE id_modulo = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }



    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_modulos WHERE id_modulo = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;
    }



    public function closeOut(){
        $this->conn = null;
    }
}