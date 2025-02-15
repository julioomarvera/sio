<?php
require_once $dir_fc."connections/conn_data.php";
//require_once $dir_fc."connections/conn_config.php";

class cUsers extends BD
{
    private $id_usuario;
    private $id_rol;
    private $id_direccion;
    private $id_area;
    private $usuario;
    private $clave;
    private $nombre;
    private $apepa;
    private $apema;
    private $sexo;
    private $correo;
    private $fecha_ingreso;
    private $imprimir;
    private $editar;
    private $eliminar;
    private $nvo_usr;
    private $imagen;
    private $nvaclave;
    private $admin;
    private $nuevo;
    private $exportar;
    private $id_origen;
    private $id_usuario_origen;
    private $id_aplicativo;
    private $id_modulo;
    private $arraySearch;

    private $id_menu;

    private $filtro;
    private $inicio;
    private $fin;
    private $limite;

    private $conn;

    function __construct()
    {
        //Esta es la que llama a la base de datos
        //parent::__construct();
        $this->conn = new BD();
    }


    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of id_rol
     */ 
    public function getId_rol()
    {
        return $this->id_rol;
    }

    /**
     * Set the value of id_rol
     *
     * @return  self
     */ 
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of clave
     */ 
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     *
     * @return  self
     */ 
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apepa
     */ 
    public function getApepa()
    {
        return $this->apepa;
    }

    /**
     * Set the value of apepa
     *
     * @return  self
     */ 
    public function setApepa($apepa)
    {
        $this->apepa = $apepa;

        return $this;
    }

    /**
     * Get the value of apema
     */ 
    public function getApema()
    {
        return $this->apema;
    }

    /**
     * Set the value of apema
     *
     * @return  self
     */ 
    public function setApema($apema)
    {
        $this->apema = $apema;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of fecha_ingreso
     */ 
    public function getFecha_ingreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Set the value of fecha_ingreso
     *
     * @return  self
     */ 
    public function setFecha_ingreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;

        return $this;
    }

    /**
     * Get the value of imprimir
     */ 
    public function getImprimir()
    {
        return $this->imprimir;
    }

    /**
     * Set the value of imprimir
     *
     * @return  self
     */ 
    public function setImprimir($imprimir)
    {
        $this->imprimir = $imprimir;

        return $this;
    }

    /**
     * Get the value of editar
     */ 
    public function getEditar()
    {
        return $this->editar;
    }

    /**
     * Set the value of editar
     *
     * @return  self
     */ 
    public function setEditar($editar)
    {
        $this->editar = $editar;

        return $this;
    }

    /**
     * Get the value of eliminar
     */ 
    public function getEliminar()
    {
        return $this->eliminar;
    }

    /**
     * Set the value of eliminar
     *
     * @return  self
     */ 
    public function setEliminar($eliminar)
    {
        $this->eliminar = $eliminar;

        return $this;
    }

    /**
     * Get the value of nvo_usr
     */ 
    public function getNvo_usr()
    {
        return $this->nvo_usr;
    }

    /**
     * Set the value of nvo_usr
     *
     * @return  self
     */ 
    public function setNvo_usr($nvo_usr)
    {
        $this->nvo_usr = $nvo_usr;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of nvaclave
     */ 
    public function getNvaclave()
    {
        return $this->nvaclave;
    }

    /**
     * Set the value of nvaclave
     *
     * @return  self
     */ 
    public function setNvaclave($nvaclave)
    {
        $this->nvaclave = $nvaclave;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get the value of nuevo
     */ 
    public function getNuevo()
    {
        return $this->nuevo;
    }

    /**
     * Set the value of nuevo
     *
     * @return  self
     */ 
    public function setNuevo($nuevo)
    {
        $this->nuevo = $nuevo;

        return $this;
    }

    /**
     * Get the value of exportar
     */ 
    public function getExportar()
    {
        return $this->exportar;
    }

    /**
     * Set the value of exportar
     *
     * @return  self
     */ 
    public function setExportar($exportar)
    {
        $this->exportar = $exportar;

        return $this;
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
     * Get the value of id_menu
     */ 
    public function getId_menu()
    {
        return $this->id_menu;
    }

    /**
     * Set the value of id_menu
     *
     * @return  self
     */ 
    public function setId_menu($id_menu)
    {
        $this->id_menu = $id_menu;

        return $this;
    }

    /**
     * Get the value of id_direccion
     */ 
    public function getId_direccion()
    {
        return $this->id_direccion;
    }

    /**
     * Set the value of id_direccion
     *
     * @return  self
     */ 
    public function setId_direccion($id_direccion)
    {
        $this->id_direccion = $id_direccion;

        return $this;
    }

        /**
     * Get the value of id_origen
     */ 
    public function getId_origen()
    {
        return $this->id_origen;
    }


    /**
     * Set the value of id_origen
     *
     * @return  self
     */ 
    public function setId_origen($id_origen)
    {
        $this->id_origen = $id_origen;

        return $this;
    }

    
    /**
     * Get the value of id_usuario_origen
     */ 
    public function getId_usuario_origen()
    {
        return $this->id_usuario_origen;
    }

    /**
     * Set the value of id_usuario_origen
     *
     * @return  self
     */ 
    public function setId_usuario_origen($id_usuario_origen)
    {
        $this->id_usuario_origen = $id_usuario_origen;

        return $this;
    }

    
    /**
     * Get the value of id_area
     */ 
    public function getId_area()
    {
        return $this->id_area;
    }

    /**
     * Set the value of id_area
     *
     * @return  self
     */ 
    public function setId_area($id_area)
    {
        $this->id_area = $id_area;

        return $this;
    }


        /**
     * Get the value of id_aplicativo
     */ 
    public function getId_aplicativo()
    {
        return $this->id_aplicativo;
    }

    /**
     * Set the value of id_aplicativo
     *
     * @return  self
     */ 
    public function setId_aplicativo($id_aplicativo)
    {
        $this->id_aplicativo = $id_aplicativo;

        return $this;
    }


       /**
     * Get the value of id_modulo
     */ 
    public function getId_modulo()
    {
        return $this->id_modulo;
    }

    /**
     * Set the value of id_modulo
     *
     * @return  self
     */ 
    public function setId_modulo($id_modulo)
    {
        $this->id_modulo = $id_modulo;

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


    public function getUser( $usr = null, $pass = null) {
        $condition = "";

        $query = " SELECT U.id_usuario, 
                          U.id_rol, 
                          U.id_direccion,
                          U.id_area, 
                          U.id_aplicativo,
                          U.usuario, 
                          U.nombre, 
                          U.admin,
                          CONCAT_WS(' ', U.nombre, U.apepa, U.apema) AS nombrecompleto, 
                          U.correo,
                          U.sexo, 
                          U.img, 
                          DATE_FORMAT(U.fec_ingreso, '%d/%m/%Y') AS fecha_ingreso,
                          U.imp, 
                          U.edit, 
                          U.elim, 
                          U.nuev, 
                          R.rol, 
                          M.link AS carpeta,
                          C.descripcion,
                          U.id_sector,
                          U.id_zona,
                          U.id_seccion
                     FROM ws_usuario AS U 
                LEFT JOIN ws_rol AS R ON R.id = U.id_rol
                LEFT JOIN ws_menu AS M ON  R.id_menu_ini = M.id
                LEFT JOIN cat_aplicativo as C on u.id_aplicativo = C.id_aplicativo
                    WHERE 1 = 1
                    $condition
                      AND U.activo = 1
                      AND u.usuario = ?
                      and u.clave = ?
                    LIMIT 1";

                  
        $result = $this->conn->prepare($query);
        $result->execute(
            array(
                $usr,
                $pass
            ) 
        );
        $result->execute();
        return $result;       
    }
    
    public function getColoniasByProfile( $id_rol, $id_zona, $id_sector, $id_seccion) {
        $condition = " 1 = 1 ";

        if($id_rol == 8){
            $condition = " tat.id_sector = $id_sector";
        }
        if($id_rol == 9){
            $condition = " tat.id_zona = $id_zona";
        }
        if($id_rol == 10){
            $condition = " tat.id_seccion = $id_seccion";
        }

        $query = "SELECT
                    com.id_comunidad,
                    com.colonia,
                    cta.tipo_asentamiento,
                    cta.abreviatura as ab_asentamiento
                    from
                        cat_comunidad as com
                    left join cat_tipo_asentamiento cta on
                        cta.id_tipo_asentamiento = com.id_tipo_asentamiento
                    where
                        com.id_comunidad in (
                        select
                            tat.id_comunidad
                        from
                            tbl_asig_territorial as tat
                        where
                            $condition
                        )
                        and com.activo = 1 ORDER by com.colonia asc";

                  
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }
    
    public function getUserById( $id ) {
        $condition = "";

        $query = " SELECT U.id_usuario, 
                          U.id_rol, 
                          U.id_direccion,
                          U.id_area, 
                          U.id_aplicativo,
                          U.usuario, 
                          U.nombre, 
                          U.admin,
                          CONCAT_WS(' ', U.nombre, U.apepa, U.apema) AS nombrecompleto, 
                          U.correo,
                          U.sexo, 
                          U.img, 
                          DATE_FORMAT(U.fec_ingreso, '%d/%m/%Y') AS fecha_ingreso,
                          U.imp, 
                          U.edit, 
                          U.elim, 
                          U.nuev, 
                          R.rol, 
                          M.link AS carpeta,
                          C.descripcion,
                          U.id_sector,
                          U.id_zona,
                          U.id_seccion
                     FROM ws_usuario AS U 
                LEFT JOIN ws_rol AS R ON R.id = U.id_rol
                LEFT JOIN ws_menu AS M ON  R.id_menu_ini = M.id
                LEFT JOIN cat_aplicativo as C on u.id_aplicativo = C.id_aplicativo
                    WHERE 1 = 1
                    $condition
                      AND U.activo = 1
                      AND u.id_usuario = ?
                    LIMIT 1";

        $result = $this->conn->prepare($query);
        $result->execute(
            array(
                $id
            ) 
        );
        $result->execute();
        return $result;       
    }


    public function getDateExpiration( $id_usr ){
        $date = "";
        try{
            $query = "SELECT DATE_FORMAT(fecha_caducidad, '%Y-%m-%d') as fecha_expira
                        FROM ws_usuario 
                       WHERE id_usuario = $id_usr";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $date = $row->fecha_expira;
            }
            return $date;
                
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }

    
    public function getAllReg( $id_rol, $id_aplicativo){
        //Inicio fin son para paginado
        $milimite      = "";
        $condition     = "";
        $condition_ext = "";

        $condProfile = ( $id_rol > 1 ) ? ' AND u.id_usuario > 1 ' : '';

        if ($this->getLimite() == 1){ $milimite = "LIMIT ".$this->getInicio().", ".$this->getFin();}
        $filtro = $this->getFiltro();

        if ($filtro != ""){

            $array_f = $this->getArraySearch();

            if(isset($array_f["id_u"]) && $array_f["id_u"] != ""){
                $condition .= " AND id_usuario = ".$array_f["id_u"]." ";
            }

            if (isset($array_f["dc_u"]) && $array_f["dc_u"] != "") {
                $condition .= " AND id_direccion = " . $array_f["dc_u"] . " ";
            }

            if (isset($array_f["us_u"]) && $array_f["us_u"] != "") {
                $condition .= " AND usuario LIKE '%" . $array_f["us_u"] . "%' ";
            }

            if (isset($array_f["no_u"]) && $array_f["no_u"] != "") {
                $condition .= " AND (CONCAT_WS(' ', u.nombre, u.apepa, u.apema) 
                                LIKE '%".$array_f["no_u"]."%'
                                 OR u.usuario LIKE '%".$array_f["no_u"]."%' )";
            }
            
            if(isset($array_f["rl_u"]) && $array_f["rl_u"] != ""){
                $condition.= " AND u.id_rol = '".$array_f["rl_u"]."' ";
            }

            if (isset($array_f["ar_u"]) && $array_f["ar_u"] != "") {
                $condition .= " AND u.id_area = " . $array_f["ar_u"] . " ";
            }

            if (isset($array_f["ap_u"]) && $array_f["ap_u"] != "") {
                $condition .= " AND u.id_aplicativo = " . $array_f["ap_u"] . " ";
            }
        }

        if($id_rol > 1 && $this->getFiltro() == ""){
            $condition_ext = " AND u.id_aplicativo = $id_aplicativo";
        }

        $query  = " SELECT u.id_usuario, 
                           u.usuario, 
                           u.id_direccion, 
                           CONCAT_WS(' ', u.nombre, u.apepa, u.apema) AS nombre,
                           u.correo, 
                           u.activo, 
                           u.admin, 
                           u.id_area,
                           r.rol,
                           u.id_aplicativo
                      FROM ws_usuario as u
                 LEFT JOIN ws_rol as r on u.id_rol = r.id
                     WHERE 1 
                           $condProfile 
                           $condition        
                           $condition_ext 
                    ORDER BY id_usuario DESC ".$milimite;
                    // die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function getRegbyid(){

        $query = "  SELECT id_usuario, 
                           id_rol, 
                           id_direccion, 
                           id_area,
                           id_modulo, 
                           usuario, 
                           sexo, 
                           nombre, 
                           apepa, 
                           apema, 
                           correo,
                           imp, 
                           edit, 
                           elim, 
                           nuev, 
                           img, 
                           admin, 
                           activo,
                           id_aplicativo,
                           id_usuario_captura,
                           id_usuario_modifica,
                           DATE_FORMAT(fec_ingreso, '%d/%m/%Y %T') as fecha_captura,
                           DATE_FORMAT(fecha_modifica, '%d/%m/%Y %T') as fecha_modifica
                      FROM ws_usuario
                    WHERE  id_usuario = ".$this->getId_usuario() ." LIMIT 1";
                    // die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;

    }

    public function checarMenuUser(){
        
        $query = " SELECT id_usuario_menu, 
                          imp, 
                          edit, 
                          elim, 
                          nuevo, 
                          exportar
                      FROM ws_usuario_menu 
                    WHERE id_menu = " . $this->getId_menu() . "
                      AND id_usuario = " . $this->getId_usuario();
            // echo $query;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    public function foundUserConcidencia(){
        //Busca si existe un usuario con el nombre
        $query = " SELECT usuario 
                     FROM ws_usuario 
                    WHERE usuario = '".$this->getUsuario()."' 
                      AND id_usuario = ".$this->getId_usuario();
        $result    = $this->conn->prepare($query);
        $result->execute();
        $registrosf = $result->rowCount();
        return $registrosf;
    }

    public function foundUser(){
        $query = "SELECT usuario 
                    FROM ws_usuario 
                   WHERE usuario = '".$this->getUsuario()."'";
        $result = $this->conn->prepare($query);
        $result->execute();
        $registrosf = $result->rowCount();
        return $registrosf;
    }



    public function getArrayModulo(){
        $arraym = array();
        try{
            $query = "SELECT id_modulo, 
                             observaciones
                        FROM cat_modulos
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraym[$row->id_modulo] = $row->observaciones;
                }
            }
            return $arraym;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function updateReg( $data_update ){
        $correcto   = 1;
        $exec       = $this->conn->conexion();
        $sexo       = $this->getSexo();

        $update = " UPDATE ws_usuario
                       SET id_rol              = ?,
                           id_direccion        = ?,
                           id_area             = ?,
                           id_usuario_modifica = ?,
                           id_aplicativo       = ?,
                           usuario             = ?,
                           sexo                = ?,
                           nombre              = ?,
                           apepa               = ?,
                           apema               = ?,
                           correo              = ?,
                           fecha_modifica      = NOW(),
                           imp                 = ?,
                           edit                = ?,
                           elim                = ?,
                           nuev                = ?,
                           admin               = ?,
                           img                 = ?
                     WHERE id_usuario          = ?";
        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data_update );
        $exec->commit();
        return $correcto;
    }

    public function insertRegdtluser(){

        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert_dtl = " INSERT INTO ws_usuario_menu(id_usuario, 
                                                    id_menu, 
                                                    imp,
                                                    edit,
                                                    elim,
                                                    nuevo,
                                                    exportar) 
                                            VALUES ( " . $this->getId_usuario() . ",
                                                     " . $this->getId_menu() . ",
                                                     " . $this->getImprimir() . ",
                                                     " . $this->getEditar() . ",
                                                     " . $this->getEliminar() . ",
                                                     " . $this->getNuevo() . ",
                                                     " . $this->getExportar() . ")";
                                        // echo $insert_dtl;
        $result = $this->conn->prepare($insert_dtl);
        $exec->beginTransaction();
        $result->execute();
        if ($correcto == 1) {
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;
    }

    public function deleteRegUsMenu(){
        $correcto   = 2;
        $delete     = "DELETE FROM ws_usuario_menu 
                             WHERE id_usuario = ".$this->getId_usuario()." ";
                            //  die($delete);

        $result = $this->conn->prepare($delete);
        $result->execute();
        return $correcto;
    }

    public function insertReg( $data ){

        $correcto= 1;    
        $exec = $this->conn->conexion();

        $insert = " INSERT INTO ws_usuario(id_rol, 
                                           id_direccion, 
                                           id_area, 
                                           id_usuario_captura,
                                           id_aplicativo,
                                           usuario, 
                                           clave,  
                                           nombre, 
                                           apepa, 
                                           apema, 
                                           correo, 
                                           sexo, 
                                           imp, 
                                           edit, 
                                           elim, 
                                           nuev, 
                                           fec_ingreso, 
                                           img, 
                                           admin,  
                                           activo)
                                   VALUES (?,
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
                                           ?,
                                           ?,
                                           ?,
                                           ?,
                                           ?,
                                           NOW(),
                                           ?,
                                           ?,
                                           ?)";
                                        // die($insert);
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data);

        if ($correcto == 1) {
            $correcto = $exec->lastInsertId();
        }
        $exec->commit();
        return $correcto;

    }


    public function updateStatus($tipo){
        $correcto   = 1;        
        $update = " UPDATE ws_usuario 
                       SET activo     = $tipo
                     WHERE id_usuario = ".$this->getId_usuario();
        $result = $this->conn->prepare($update);
        $result->execute();
        $result = null;
        $this->conn = null;
        return $correcto;

    }

    public function deleteReg(){
        $correcto   = 2;
        
        $delete = "DELETE FROM ws_usuario 
                         WHERE id_usuario = ".$this->getId_usuario();        
        $result = $this->conn->prepare($delete);
        $result->execute();
        $result = null;
        $this->conn = null;
        return $correcto;
    }

    public function getRegbyPW(){
        $query  = " SELECT id_usuario, 
                           usuario 
                      FROM ws_usuario
                     WHERE id_usuario = ".$this->getId_usuario()." 
                      AND clave       = '".$this->getClave()."' LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        $registrosf = $result->rowCount();
        return $registrosf;
    }

    public function updateRegPW(){
        
        $correcto   = 1;

        $exec = $this->conn->conexion();

        $update = " UPDATE ws_usuario
                       SET clave     = '".$this->getNvaclave()."'
                     WHERE id_usuario = ".$this->getId_usuario();
            // die($update);

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();

        $result = null;
        $exec = null;

        return $correcto;
    }

    public function getUserLock(){
        $query = "  SELECT id_usuario, 
                           id_rol, 
                           id_direccion, 
                           usuario, 
                           nombre,
                           CONCAT_WS(' ', nombre, apepa, apema) AS nombrecompleto,
                           correo,
                           sexo, 
                           img, 
                           DATE_FORMAT(fec_ingreso, '%d/%m/%Y' ) AS fecha_ingreso,
                           imp, 
                           edit, 
                           elim, 
                           nuev
                    FROM ws_usuario 
                    where id_usuario = ".$this->getId_usuario()." 
                      and clave = '".$this->getClave()."'
                      AND activo = 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function updateRegacount(){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE ws_usuario
                       SET nombre   = '".$this->getNombre()."', 
                           apepa    = '".$this->getApepa()."',
                           apema    = '".$this->getApema()."',
                           usuario  = '" . $this->getUsuario() . "', 
                           correo   = '" . $this->getCorreo() . "',
                           sexo     = '" . $this->getSexo() . "'
                     WHERE id_usuario = " . $this->getId_usuario();
        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();
        return $correcto;
    }

    public function showorigen($id_usr, $id_apl){
        $condition = "";

        // if($id_usr > 1){
        //     if($id_apl != ""){
        //         $condition .= " AND id_aplicativo = $id_apl";
        //     }
        // }

        try{
            $query = "SELECT id_origen, 
                             origen, 
                             abreviatura
                        FROM cat_origen 
                       WHERE activo = 1
                         $condition";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertOrigin( $data_org ){
        $correcto = 1;
        $exec = $this->conn->conexion();

        try{
            $insert = "INSERT INTO tbl_usuario_origen(id_usuario,
                                                      id_origen)
                                               VALUES(?,
                                                      ?)";
            $result = $this->conn->prepare($insert);
            $exec->beginTransaction();
            $result->execute($data_org);

            if($correcto == 1){
                $correcto = $exec->lastInsertId();
                $this->setId_usuario_origen($correcto);
            }
            $exec->commit();
            return $correcto;
        }catch(\PDOException $e){
            $exec->rollBack();
            return "Error! : ".$e->getMessage();
        }
    }


    public function originById(){
        try{
            $query = "SELECT id_usuario, 
                             id_origen
                        FROM tbl_usuario_origen 
                       WHERE id_usuario = ".$this->getId_usuario()." ";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function deleteOrigin( $id_usr ){
        $correcto   = 2;
        try {
            $delete = "DELETE FROM tbl_usuario_origen 
                             WHERE id_usuario =  $id_usr";
            // die($delete);
            $result = $this->conn->prepare($delete);
            $result->execute();

            return $correcto;
        } catch (\PDOException $e) {
            return "Error!: " . $e->getMessage();
        } 
    }

    public function show_aplicativo( $id_usr, $id_apl ){
        $condition = "";

        if($id_usr > 1){
            if($id_apl != ""){
                $condition .= " AND id_aplicativo = $id_apl";
            }
        }

        try{
            $query = "SELECT id_aplicativo,
                             descripcion
                        FROM cat_aplicativo 
                       WHERE activo = 1 
                       $condition";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error!: " . $e->getMessage();
        }
    }


    public function getRolById( $id_rol ){
        $txt_rol = "";
        try{
            $query = "SELECT rol
                        FROM ws_rol
                       WHERE id = $id_rol";
            
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $txt_rol = $row->rol;
            }
            return $txt_rol;
        }catch(\Exception $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getSearchUser( $usr ){
        $total = "";
        
        try{
            $query = "SELECT COUNT(id_usuario) as total 
                        FROM ws_usuario
                       WHERE usuario = '$usr' ";
                
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $total = $row->total;
            }
            return $total;

        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayAplicativos(){
        $array = array();

        try {
            $query = "SELECT id_aplicativo,
                             descripcion
                        FROM cat_aplicativo
                       WHERE activo = 1";
                
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_aplicativo] = $row->descripcion;
                }
            }
            return $array;
        } catch (\Throwable $th) {
            return "Error: ".$th->getMessage();
        }
    }


    public function getRptExcel( $rol_usr, $apl_usr ){

        $condition = "";

        if($rol_usr > 1){
            $condition .= " AND u.id_usuario > 1";
            $condition .= " AND u.id_aplicativo = $apl_usr";
        }

        if ($this->getFiltro() != ""){

            $array_f = $this->getArraySearch();

            if(isset($array_f["id_u"]) && $array_f["id_u"] != ""){
                $condition .= " AND id_usuario = ".$array_f["id_u"]." ";
            }

            if (isset($array_f["dc_u"]) && $array_f["dc_u"] != "") {
                $condition .= " AND id_direccion = " . $array_f["dc_u"] . " ";
            }

            if (isset($array_f["us_u"]) && $array_f["us_u"] != "") {
                $condition .= " AND usuario LIKE '%" . $array_f["us_u"] . "%' ";
            }

            if (isset($array_f["no_u"]) && $array_f["no_u"] != "") {
                $condition .= " AND (CONCAT_WS(' ', nombre, apepa, apema) 
                                LIKE '%".$array_f["no_u"]."%'
                                 OR u.usuario LIKE '%".$array_f["no_u"]."%' )";
            }
            
            if(isset($array_f["rl_u"]) && $array_f["rl_u"] != ""){
                $condition.= " AND id_rol = '".$array_f["rl_u"]."' ";
            }

            if (isset($array_f["ar_u"]) && $array_f["ar_u"] != "") {
                $condition .= " AND id_area = " . $array_f["ar_u"] . " ";
            }

            if (isset($array_f["ap_u"]) && $array_f["ap_u"] != "") {
                $condition .= " AND id_aplicativo = " . $array_f["ap_u"] . " ";
            }
        }

        try{
            $query = "SELECT id_usuario,
                             id_rol,
                             id_direccion,
                             id_area,
                             id_origen,
                             id_usuario_captura,
                             id_usuario_modifica,
                             id_aplicativo,
                             usuario,
                             CONCAT_WS(' ', nombre, apepa, apema) as nombre,
                             sexo,
                             correo,
                             descripcion,
                             DATE_FORMAT(fec_ingreso, '%d/%m/%Y') as fec_ingreso,
                             DATE_FORMAT(fecha_modifica, '%d/%m/%Y') as fecha_modifica,
                             telefono_directo,
                             tel_movil,
                             activo
                        FROM ws_usuario
                       WHERE 1 = 1
                       $condition ";
                    // die($query);
            
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayUsuarios(){
        $array = array();
        try{
            $query = "SELECT id_usuario,
                             CONCAT_WS(' ', nombre, apepa, apema) as nombre
                        FROM ws_usuario";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_usuario] = $row->nombre;
                }
            }
            
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateRegDate( $data ){
        $correcto = 1;
        $exec     = $this->conn->conexion();
        
        $update = "UPDATE ws_usuario 
                      SET fecha_caducidad = ?
                    WHERE id_usuario      = ?";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data );
        $exec->commit();
        return $correcto;
    }
    
    public function closeOut(){
        $this->conn = null;
    }  

}
?>