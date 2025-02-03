<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cAplicativo extends BD {
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


    public function getAllReg() {
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["ida_b"]) && $array_f["ida_b"] != ""){
                $condition .= "AND id_aplicativo = ".$array_f["ida_b"]." ";
            }

            if(isset($array_f["apl_b"]) && $array_f["apl_b"] != ""){
                $condition .= "AND descripcion LIKE '%".$array_f["apl_b"]."%' ";
            }
        }


        $query = "  SELECT  id_aplicativo, 
                            descripcion, 
                            img, 
                            limite_dependencias, 
                            activo
                       FROM cat_aplicativo
                      WHERE 1 = 1
                       $condition
                    ORDER BY id_aplicativo DESC" . $milimite;
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getRegbyId() {
        $query = "  SELECT id_aplicativo,
                           descripcion, img, limite_dependencias, activo
                     FROM cat_aplicativo 
                     WHERE id_aplicativo = ".$this->getId() ." LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function insertReg( $data ) {
        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert = " INSERT INTO cat_aplicativo(descripcion,
                                               limite_dependencias,
                                               id_usr_captura,
                                               fecha_captura)
                                       VALUES (?,
                                               ?,
                                               ?,
                                               NOW())";
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute( $data );
        if ($correcto == 1) {
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;
    }

    public function updateRegByExt( $data_img ){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_aplicativo 
                       SET img           = ?
                     WHERE id_aplicativo = ? ";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data_img);
        $exec->commit();
        
        return $correcto;
    }

    public function insertDirecciones( $data_dir ){
        $correcto = 1;
        $exec = $this->conn->conexion();
        $insert = " INSERT INTO cat_aplicativo_direccion(id_aplicativo, id_direccion)
                            VALUES(
                                ?, 
                                ?)";
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute( $data_dir );
        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;        
    }


    public function getArrayDirecciones($id){
        $arrayDir = array();
        $query = "SELECT id_aplicativo, id_direccion
                    FROM cat_aplicativo_direccion 
                    WHERE id_aplicativo = $id ";
        $result = $this->conn->prepare($query);
        $result->execute();
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                array_push($arrayDir, $row->id_direccion);
            }
        }
        return $arrayDir;      
    }


    public function updateReg( $data )  {
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_aplicativo 
                       SET descripcion         = ?,
                           limite_dependencias = ?,
                           id_usr_modifica     = ?,
                           fecha_modifica      = NOW()
                     WHERE id_aplicativo       = ?";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data );
        $exec->commit();

        return $correcto;
    }

    public function deleteDirecciones($id){
        $correcto   = 2;
        $delete = "DELETE FROM cat_aplicativo_direccion WHERE id_aplicativo = ".$id." ";
        // echo $delete;   
        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;    
    }

    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_aplicativo 
                       SET activo = $tipo
                     WHERE id_aplicativo = ".$this->getId();
        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_aplicativo 
                             WHERE id_aplicativo = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;
    }  


    public function closeOut(){
        $this->conn = null;
    }
}