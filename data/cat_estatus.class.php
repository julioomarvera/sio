<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cEstatus extends BD
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
    private $estatus;
    private $class;
    private $finaliza;
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
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getFinaliza()
    {
        return $this->finaliza;
    }

    /**
     * @param mixed $finaliza
     */
    public function setFinaliza($finaliza)
    {
        $this->finaliza = $finaliza;
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

            if(isset($array_f["est_b"]) && $array_f["est_b"] != ""){
                $condition .= " AND estatus LIKE '%".$array_f["est_b"]."%' ";
            }

            if(isset($array_f["fin_b"]) && $array_f["fin_b"] != ""){
                $condition .= " AND finaliza = ".$array_f["fin_b"]." ";
            }
        }

        $query = "  SELECT c.id_estatus,
                           c.estatus,
                           c.class,
                           c.finaliza,
                           c.activo
                     FROM cat_estatus as c
                     WHERE 1 = 1 $condition
                     ORDER BY id_estatus DESC" . $milimite;

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }


    public function getArrayModulo(){

    }

    public function getRegbyId() {
        $query = "  SELECT id_estatus,
                           estatus,
                           finaliza,
                           class,
                           orden,
                           activo
                      FROM cat_estatus 
                     WHERE id_estatus = ".$this->getId() ." LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getOrdenMax() {
        $orden = 0;
        $query = "  SELECT MAX(orden) as orden
                      FROM cat_estatus ";
        $result = $this->conn->prepare($query);
        $result->execute();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $orden = $row->orden + 1;
        }
        return $orden;
    }


    public function insertReg( $data ) {
        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert = " INSERT INTO cat_estatus(id_usuario_captura,
                                            fecha_captura,
                                            estatus,
                                            class,
                                            finaliza,
                                            orden)
                                    VALUES (?,
                                            NOW(),
                                            ?,
                                            ?,
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

        $update = " UPDATE cat_estatus 
                       SET id_usuario_modifica = ?,
                           fecha_modifica      = NOW(),
                           estatus             = ?,
                           class               = ?,
                           finaliza            = ?,
                           orden               = ?
                     WHERE id_estatus          = ? ";
        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data );
        $exec->commit();

        return $correcto;
    }

    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_estatus 
                       SET activo = $tipo
                     WHERE id_estatus = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_estatus 
                             WHERE id_estatus = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;

    }


    public function closeOut(){
        $this->conn = null;
    }


}