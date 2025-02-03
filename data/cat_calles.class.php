<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cCalle extends BD
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

    private $id;
    private $arraySearch;

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


    public function getAllReg()
    {
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["id_b"]) && $array_f["id_b"] != ""){
                $condition .=" AND id_calle = ".$array_f["id_b"]." ";
            }

            if(isset($array_f["ca_b"]) && $array_f["ca_b"] != ""){
                $condition .= " AND calle LIKE '%". $array_f["ca_b"]. "%' ";
            }

            if(isset($array_f["comb"]) && $array_f["comb"] != ""){
                $condition .= " AND C.id_comunidad = ".$array_f["comb"]." ";
            }

            if(isset($array_f["vial"]) && $array_f["vial"] != ""){
                $condition .= " AND C.id_tipo_vialidad = ".$array_f["vial"]." ";
            }
        }

        $query = "  SELECT  id_calle,
                            C.id_comunidad,
                            identificador,
                            calle,
                            C.activo,
                            CO.colonia,
                            V.tipo_vialidad,
                            V.descripcion
                      FROM cat_calles AS C
                 LEFT JOIN cat_comunidad AS CO ON C.id_comunidad = CO.id_comunidad
                 LEFT JOIN cat_tipo_vialidad AS V ON C.id_tipo_vialidad = V.id_tipo_vialidad
                     WHERE 1 = 1 $condition
                  ORDER BY C.id_calle DESC" . $milimite;
        // die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getCatComunidad() {
        $query = "  SELECT id_comunidad, 
                           colonia
                      FROM cat_comunidad 
                     WHERE activo = 1 
                  ORDER BY colonia ASC";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getCatTVialidad() {
        $query = "  SELECT id_tipo_vialidad, 
                           tipo_vialidad, 
                           descripcion
                      FROM cat_tipo_vialidad 
                     WHERE activo = 1 
                  ORDER BY tipo_vialidad ASC";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getRegbyId() {
        $query = "  SELECT id_calle,
                           id_comunidad,
                           id_tipo_vialidad,
                           calle
                      FROM cat_calles 
                     WHERE id_calle = ".$this->getId() ." 
                     LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function insertReg( $data ) {
        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert = " INSERT INTO cat_calles(id_comunidad,
                                           id_tipo_vialidad,
                                           id_usuario_captura,
                                           fecha_captura,
                                           calle,
                                           activo)
                                   VALUES (?,
                                           ?,
                                           ?,
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

        $update = " UPDATE cat_calles 
                       SET id_comunidad        = ?,
                           id_tipo_vialidad    = ?,
                           id_usuario_modifica = ?,
                           fecha_modifica      = NOW(),
                           calle               = ?
                     WHERE id_calle            = ?";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data );
        $exec->commit();

        return $correcto;
    }


    public function getArrayComunidad(){
        $array = array();
        try{
            $query = "SELECT id_comunidad,
                             colonia
                        FROM cat_comunidad
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_comunidad] = $row->colonia;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayVialidades(){
        $array = array();
        try{
            $query = "SELECT id_tipo_vialidad,
                             tipo_vialidad
                        FROM cat_tipo_vialidad
                       WHERE activo = 1";
                    
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_tipo_vialidad] = $row->tipo_vialidad;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }



    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_calles 
                       SET activo    = $tipo
                     WHERE id_calle = ".$this->getId();
        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_calles WHERE id_calle = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;

    }

    
    public function closeOut(){
        $this->conn = null;
    }


  
}