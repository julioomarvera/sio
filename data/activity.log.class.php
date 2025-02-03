<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
/*--------------------------------------------------------------------------------------------------------*/

class cActivity extends BD
{

    private $conn;

    function __construct()
    {
        //Esta es la que llama a la base de datos
        //parent::__construct();
        $this->conn = new BD();
    }

    private $filtro;
    private $inicio;
    private $fin;
    private $limite;


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
    

    public function insertLogIn($data_in){
        
        $exec     = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO ws_activity_log(id_current_user,
                                               id_aplicativo,
                                               in_out,
                                               capture_date,
                                               user_n,
                                               reject,
                                               pass)
                                        VALUES(?,
                                               ?,
                                               ?,
                                               NOW(),
                                               ?,
                                               ?,
                                               ?)";
                                // die($insert);
                                        
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data_in);

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;

    }


    public function insertLog($data){
        
        $exec     = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO ws_activity_log(id_current_user,
                                               id_menu,
                                               capture_date)
                                        VALUES(?,
                                               ?,
                                               NOW())";
                                // die($insert);
                                        
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data);

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;

    }


    public function insertLogOut($data_out){
        $exec     = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO ws_activity_log(id_current_user,
                                               id_aplicativo,
                                               in_out,
                                               capture_date)
                                        VALUES(?,
                                               ?,
                                               ?,
                                               NOW())";
                                // die($insert);
                                         
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data_out);

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;
    }


    public function insertLogActivity( $data_act ){
        $exec     = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO ws_activity_log(id_current_user,
                                               id_aplicativo,
                                               id_menu,
                                               id_type,
                                               id_registro,
                                               capture_date)
                                        VALUES(?,
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               NOW())";
                            // die($insert);
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data_act);

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }

        $exec->commit();
        return $correcto;
    }


    public function insertLogAjax( $data_act ){
        $exec     = $this->conn->conexion();
        $correcto = 1;

        $insert = "INSERT INTO ws_activity_log(id_current_user,
                                               id_aplicativo,
                                               id_menu,
                                               id_type,
                                               id_registro,
                                               capture_date,
                                               action,
                                               details)
                                        VALUES(?,
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               NOW(),
                                               ?,
                                               ?)";

        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data_act);

        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }

        $exec->commit();
        return $correcto;
    }

    //Query para mostar en menú

    public function getAllReg( $rol, $id_apl ){
        $milimite  = "";
        $condition = "";

        if($this->getLimite() == 1){
            $milimite = " LIMIT ".$this->getInicio().', '.$this->getFin();
        }else{
            $milimite = " LIMIT 10";
        }

        if($rol > 1){
            $condition .= " AND id_current_user > 1 
                            AND id_aplicativo = $id_apl";
        }else if($rol == 1){
            $condition .= " AND id_current_user > 1";
        }

        try{
            $query = "SELECT id_activity_log,
                             id_current_user,
                             id_menu,
                             id_type,
                             id_registro,
                             in_out,
                             DATE_FORMAT(capture_date, '%d-%m-%Y %T') as capture_date,
                             action,
                             user_n,
                             details,
                             reject
                        FROM ws_activity_log
                       WHERE 1 = 1
                       $condition
                    ORDER BY id_activity_log DESC ". $milimite;
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getUserById( $id_usr ){
        try{
            $query = "SELECT u.usuario,
                             r.rol,
                             u.id_direccion,
                             u.id_area
                        FROM ws_usuario as u
                   LEFT JOIN ws_rol as r on r.id = u.id_rol
                       WHERE u.id_usuario = $id_usr
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }



    public function getMenuById( $id_menu ){
        $menu_text = "";
        try{
            $query = "SELECT texto
                        FROM ws_menu
                       WHERE id = $id_menu ";
            
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $menu_text = $row->texto;
            }
            return $menu_text;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getDataUsetById( $id_usr ){
        $txt = "";
        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apepa, apema ) as nombre
                        FROM ws_usuario
                       WHERE id_usuario = $id_usr
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $txt = $row->nombre;
            }
            return $txt;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getDataRptEyS( $fecha_inicial, $fecha_final, $rol, $apl ){
        $condition = "";

        if($rol != ""){
            if($rol == 1){
                $condition .= " AND id_current_user > 1";
            }else{
                $condition .= " AND id_current_user > 1 
                                AND id_aplicativo = $apl";
            }
        }
        try{
            $query = "SELECT id_current_user,
                             in_out,
                             capture_date,
                             reject
                        FROM ws_activity_log
                       WHERE CAST(capture_date AS DATE) BETWEEN '$fecha_inicial' AND '$fecha_final' 
                         AND in_out IS NOT NULL
                         $condition";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function showUser( $term, $reg, $apl, $rol ){
        $condition = "";

        if($rol > 1){
            $condition .= " AND id_aplicativo = $apl
                            AND id_usuario > 1";
        }

        if($rol == 1){
            $condition .= " AND id_usuario > 1";
        }

        try{
            $query = "SELECT id_usuario,
                             CONCAT_WS(' ', nombre, apepa, apema) as usuario
                        FROM ws_usuario
                       WHERE (CONCAT_WS (' ', TRIM(nombre), TRIM(apepa), TRIM(apema)) LIKE '%".TRIM($term)."%'
                          OR usuario LIKE '%".TRIM($term)."%')
                          $condition 
                       LIMIT $reg ";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }



    public function getArrayDataPerfil( $rol = null ){
        $array = array();
        $condition = "";

        if($rol > 1){
            $condition .= " AND id > 1";
        }

        try{
            $query = "SELECT id,
                             rol
                        FROM ws_rol
                       WHERE activo = 1 
                       $condition ";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id] = $row->rol;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayDataAplicativo(){
        $array = array();
        try{
            $query = "SELECT id_aplicativo,
                             descripcion
                        FROM cat_aplicativo
                       WHERE activo = 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_aplicativo] = $row->descripcion;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getDataRptF( $name_user, $perfil_user, $dir_user, $area_user ){

        $condition = "";

        if(isset($name_user) && $name_user != ""){
            $condition .= " AND id_current_user = $name_user";
        }

        if(isset($perfil_user) && $perfil_user != ""){
            $condition .= " AND u.id_rol = $perfil_user";
        }

        if(isset($dir_user) && $dir_user != ""){
            $condition .= " AND u.id_direccion = $dir_user";
        }

        if(isset($area_user) && $area_user != ""){
            $condition .= " AND u.id_area = $area_user";
        }

        try{
            $query = "SELECT a.id_current_user,
                             a.id_aplicativo,
                             a.id_menu,
                             a.id_type,
                             a.id_registro,
                             DATE_FORMAT(a.capture_date, '%d/%m/%Y %r') as capture_date,
                             a.action,
                             a.details,
                             u.id_direccion,
                             u.id_area,
                             u.id_rol
                        FROM ws_activity_log as a
                   LEFT JOIN ws_usuario as u on a.id_current_user = u.id_usuario
                       WHERE 1 = 1 
                       $condition 
                         AND in_out IS NULL
                    ORDER BY id_activity_log DESC";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayAction(){
        $array = array();
        try{
            $query = "SELECT id_tipo_log,
                             descripcion
                        FROM cat_tipo_log
                       WHERE activo = 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_tipo_log] = $row->descripcion;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayMenus(){
        $array = array();
        try{
            $query = "SELECT id,
                             texto
                        FROM ws_menu
                       WHERE activo = 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id] = $row->texto;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function closeOut(){
        $this->conn = null;
    }

 
}

?>