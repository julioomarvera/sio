<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cTipoServicio extends BD
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
    private $tipo_servicio;
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
    public function getTipoServicio()
    {
        return $this->tipo_servicio;
    }

    /**
     * @param mixed $tipo_servicio
     */
    public function setTipoServicio($tipo_servicio)
    {
        $this->tipo_servicio = $tipo_servicio;
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

    public function getAllReg()
    {
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            $condition = " WHERE tipo_servicio LIKE '%" . $this->getFiltro() . "%' ";
        }

        $query = "  SELECT id_tipo_servicio,
                           tipo_servicio,
                           activo
                     FROM cat_tipo_servicio
                     $condition
                     ORDER BY id_tipo_servicio DESC" . $milimite;

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getRegbyId()
    {
        $query = "  SELECT id_tipo_servicio,
                           tipo_servicio,
                           activo
                     FROM cat_tipo_servicio 
                     WHERE id_tipo_servicio = ".$this->getId() ." LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function insertReg( $data ) {
        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert = " INSERT INTO cat_tipo_servicio(
                                    tipo_servicio,
                                    id_usuario_captura,
                                    fecha_captura)
                    VALUES ( ?,
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

    public function updateReg( $data ) {
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_tipo_servicio 
                       SET tipo_servicio = ?,
                           id_usuario_modifica = ?,
                           fecha_modifica = ?
                     WHERE id_tipo_servicio = ?";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data );
        $exec->commit();

        return $correcto;
    }

    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_tipo_servicio SET activo = $tipo
                     WHERE id_tipo_servicio = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_tipo_servicio WHERE id_tipo_servicio = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;

    }

}