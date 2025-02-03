<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cRelevancia extends BD
{
    private $filtro;
    private $inicio;
    private $fin;
    private $limite;
    private $id_usuario;
    private $fecha;
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
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    private $id;
    private $relevancia;
    private $activo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRelevancia()
    {
        return $this->relevancia;
    }

    /**
     * @param mixed $relevancia
     */
    public function setRelevancia($relevancia)
    {
        $this->relevancia = $relevancia;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
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



    public function getAllReg()
    {
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            $array_f = $this->getArray_search();

            if(isset($array_f["idr_b"]) && $array_f["idr_b"] != ""){
                $condition .= " AND id_relevancia = ".$array_f["idr_b"]." ";
            }

            if(isset($array_f["rel_b"]) && $array_f["rel_b"] != ""){
                $condition .= " AND relevancia LIKE '%".$array_f["rel_b"]."%' ";
            }
        }

        $query = "  SELECT c.id_relevancia,
                           c.relevancia,
                           c.class,
                           c.activo
                      FROM cat_relevancia as c
                     WHERE 1 = 1
                     $condition
                     ORDER BY id_relevancia DESC" . $milimite;

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getRegbyId() {
        $query = "  SELECT id_relevancia,
                           relevancia,
                           class,
                           activo
                     FROM cat_relevancia 
                     WHERE id_relevancia = ".$this->getId() ." LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function insertReg( $data ) {
        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert = " INSERT INTO cat_relevancia(id_usuario_captura,
                                               fecha_captura,
                                               relevancia, 
                                               class)
                                       VALUES (?,
                                               NOW(),
                                               ?,
                                               ?)";

        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute( $data );
        if ($correcto == 1) {
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;
    }

    public function updateReg( $data )  {
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_relevancia 
                       SET id_usuario_modifica = ?,
                           fecha_modifica      = NOW(),
                           relevancia          = ?,
                           class               = ?
                     WHERE id_relevancia       = ?";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data );
        $exec->commit();

        return $correcto;
    }

    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_relevancia 
                       SET activo        = $tipo
                     WHERE id_relevancia = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_relevancia 
                             WHERE id_relevancia = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;

    }


    public function closeOut(){
        $this->conn = null;
    }

}