<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cTituloC extends BD
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


    private $ArraySearch;

        /**
     * Get the value of ArraySearch
     */ 
    public function getArraySearch()
    {
        return $this->ArraySearch;
    }

    /**
     * Set the value of ArraySearch
     *
     * @return  self
     */ 
    public function setArraySearch($ArraySearch)
    {
        $this->ArraySearch = $ArraySearch;

        return $this;
    }


    public function getAllReg() {
        $milimite  = "";
        $condition = "";
        try{
            if ($this->getLimite() == 1) {
                $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
            }
    
            if ($this->getFiltro() != "") {
                $array_f = $this->getArraySearch();

                if (isset($array_f["nombre_b"]) && $array_f["nombre_b"] != "") {
                    $condition .= " AND descripcion  LIKE '%" . $array_f["nombre_b"] . "%' ";
                }
            }
    
            $query = "  SELECT id_titulo,
                               descripcion,
                               activo
                          FROM cat_titulo_caso 
                         WHERE 1 = 1 $condition
                         ORDER BY id_titulo DESC" . $milimite;
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;    
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }



    public function checkDuplicate( $detalle ){
        try{
            $query = "SELECT id_tipo_caso as total
                        FROM cat_tipo_caso
                       WHERE observaciones = '$detalle'";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function insertReg( $data ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $query_insert = "INSERT INTO cat_titulo_caso(id_usuario_captura, 
                                                         fecha_captura,
                                                         descripcion)
                                                 VALUES (?,
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


    public function getRegById($id){
        try{
            $query = "SELECT id_titulo,
                             descripcion
                        FROM cat_titulo_caso
                       WHERE id_titulo = $id ";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateReg( $data ){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        try{
            $update = "UPDATE cat_tipo_caso
                          SET observaciones  = ?    
                        WHERE id_tipo_caso   = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateStatus($data){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE cat_tipo_caso
                          SET activo       = ?
                        WHERE id_tipo_caso = ? ";
            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function deleteReg($id){
        $correcto = 2;
        try{
            $delete = "DELETE FROM cat_tipo_caso
                             WHERE id_tipo_caso = $id";
            $result = $this->conn->prepare($delete);
            $result->execute();

            return $correcto;
        }catch(\PDOException $e){
            return "Error!: ". $e->getMessage();
        }
    }



    public function closeOut(){
        $this->conn = null;
    }  
}