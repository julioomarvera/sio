<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cReports extends BD{

    private $filtro;
    private $inicio;
    private $fin;
    private $limite;
    private $conn;

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
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * Set the value of conn
     *
     * @return  self
     */ 
    public function setConn($conn)
    {
        $this->conn = $conn;

        return $this;
    }


    private $arraySearch;
    private $filtro_presidencia;
    private $filtro_origenes_master;
    private $filtro_fecha_limite;
    private $copaci_f;
    private $origenes_filtro_rol;
    private $id_aplicativo;
    private $estatus_filt;
    private $origenes_filtro;
    private $filtro_terminado;
    private $id_direccion_asiganda_s;
    private $id_area_asignada_s;
    private $id_direccion_asignado;

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

    /**
     * Get the value of filtro_presidencia
     */ 
    public function getFiltro_presidencia()
    {
        return $this->filtro_presidencia;
    }

    /**
     * Set the value of filtro_presidencia
     *
     * @return  self
     */ 
    public function setFiltro_presidencia($filtro_presidencia)
    {
        $this->filtro_presidencia = $filtro_presidencia;

        return $this;
    }

    /**
     * Get the value of filtro_origenes_master
     */ 
    public function getFiltro_origenes_master()
    {
        return $this->filtro_origenes_master;
    }

    /**
     * Set the value of filtro_origenes_master
     *
     * @return  self
     */ 
    public function setFiltro_origenes_master($filtro_origenes_master)
    {
        $this->filtro_origenes_master = $filtro_origenes_master;

        return $this;
    }

    /**
     * Get the value of copaci_f
     */ 
    public function getCopaci_f()
    {
        return $this->copaci_f;
    }

    /**
     * Set the value of copaci_f
     *
     * @return  self
     */ 
    public function setCopaci_f($copaci_f)
    {
        $this->copaci_f = $copaci_f;

        return $this;
    }

    /**
     * Get the value of filtro_fecha_limite
     */ 
    public function getFiltro_fecha_limite()
    {
        return $this->filtro_fecha_limite;
    }

    /**
     * Set the value of filtro_fecha_limite
     *
     * @return  self
     */ 
    public function setFiltro_fecha_limite($filtro_fecha_limite)
    {
        $this->filtro_fecha_limite = $filtro_fecha_limite;

        return $this;
    }

    /**
     * Get the value of origenes_filtro_rol
     */ 
    public function getOrigenes_filtro_rol()
    {
        return $this->origenes_filtro_rol;
    }

    /**
     * Set the value of origenes_filtro_rol
     *
     * @return  self
     */ 
    public function setOrigenes_filtro_rol($origenes_filtro_rol)
    {
        $this->origenes_filtro_rol = $origenes_filtro_rol;

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
     * Get the value of estatus_filt
     */ 
    public function getEstatus_filt()
    {
        return $this->estatus_filt;
    }

    /**
     * Set the value of estatus_filt
     *
     * @return  self
     */ 
    public function setEstatus_filt($estatus_filt)
    {
        $this->estatus_filt = $estatus_filt;

        return $this;
    }


        /**
     * Get the value of origenes_filtro
     */ 
    public function getOrigenes_filtro()
    {
        return $this->origenes_filtro;
    }

    /**
     * Set the value of origenes_filtro
     *
     * @return  self
     */ 
    public function setOrigenes_filtro($origenes_filtro)
    {
        $this->origenes_filtro = $origenes_filtro;

        return $this;
    }

    /**
     * Get the value of filtro_terminado
     */ 
    public function getFiltro_terminado()
    {
        return $this->filtro_terminado;
    }

    /**
     * Set the value of filtro_terminado
     *
     * @return  self
     */ 
    public function setFiltro_terminado($filtro_terminado)
    {
        $this->filtro_terminado = $filtro_terminado;

        return $this;
    }


        /**
     * Get the value of id_area_asignada_s
     */ 
    public function getId_area_asignada_s()
    {
        return $this->id_area_asignada_s;
    }

    /**
     * Set the value of id_area_asignada_s
     *
     * @return  self
     */ 
    public function setId_area_asignada_s($id_area_asignada_s)
    {
        $this->id_area_asignada_s = $id_area_asignada_s;

        return $this;
    }

    /**
     * Get the value of id_direccion_asiganda_s
     */ 
    public function getId_direccion_asiganda_s()
    {
        return $this->id_direccion_asiganda_s;
    }

    /**
     * Set the value of id_direccion_asiganda_s
     *
     * @return  self
     */ 
    public function setId_direccion_asiganda_s($id_direccion_asiganda_s)
    {
        $this->id_direccion_asiganda_s = $id_direccion_asiganda_s;

        return $this;
    }

    /**
     * Get the value of id_direccion_asignado
     */ 
    public function getId_direccion_asignado()
    {
        return $this->id_direccion_asignado;
    }

    /**
     * Set the value of id_direccion_asignado
     *
     * @return  self
     */ 
    public function setId_direccion_asignado($id_direccion_asignado)
    {
        $this->id_direccion_asignado = $id_direccion_asignado;

        return $this;
    }



    private $id_usuario_captura;
    private $id_rol;

    /**
     * Get the value of id_usuario_captura
     */ 
    public function getId_usuario_captura()
    {
        return $this->id_usuario_captura;
    }

    /**
     * Set the value of id_usuario_captura
     *
     * @return  self
     */ 
    public function setId_usuario_captura($id_usuario_captura)
    {
        $this->id_usuario_captura = $id_usuario_captura;

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

    function __construct()
    {
        $this->conn = new BD();
    }



    public function getAllReg( $id_usuario, $rol, $id_sector, $id_zona, $id_seccion, $id_comunidad ){

        $condition      = "";
        $joinCondition  = "";
        $str            = "";
        $conditionst    = "";
        $condition_b    = "";
        $join_cdt       = "";

        if($rol > 1){
            $condition .= " AND r.activo = 1";
        }

        if($rol == 7){
            $condition .= " AND r.id_reporte IN (SELECT dtl.id_reporte
                                                   FROM tbl_reporte_dtl as dtl
                                              LEFT JOIN cat_remtys as m on m.id_remtys = dtl.id_remty
                                                  WHERE m.es_tramite = 0)";
        }
        
        if($rol == 8){
            $condition .= " AND r.id_sector = $id_sector";
        }
        if($rol == 9){
            $condition .= " AND r.id_zona = $id_zona";
        }
        if($rol == 10){
            $condition .= " AND r.id_seccion = $id_seccion";
        }

        $condition_fecha = "ORDER BY r.id_reporte DESC";
        
        if($this->getFiltro() !=""){

            $array_f = $this->getArraySearch();

            if(isset($array_f["id_reporte"]) && $array_f["id_reporte"] != ""){
                $condition_b .= " AND r.id_reporte = ".$array_f["id_reporte"];
            }

            if(isset($array_f["fecha_inicial"]) && $array_f["fecha_inicial"] != "" && 
               $array_f["fecha_final"] != ""    && isset($array_f["fecha_final"]) ){
                $condition_b .= " AND CAST(r.fecha_captura AS DATE) BETWEEN '".$array_f["fecha_inicial"]."' AND '".$array_f["fecha_final"]."' ";
            }

            if(isset($array_f["tipo_reporte"]) && $array_f["tipo_reporte"] != ""){
                $condition_b .= " AND r.id_origen = '".$array_f["tipo_reporte"]."' ";
            }

            if(isset($array_f["tipo_tramite"]) && $array_f["tipo_tramite"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_remty = ".$array_f["tipo_tramite"]." 
                                     AND d.estatus_rechazado = 0 )";
            }

            if(isset($array_f["colonia_b"]) && $array_f["colonia_b"] != ""){
                $condition_b .= " AND r.id_colonia = ".$array_f["colonia_b"]." ";
            }

            if(isset($array_f["calle_b"]) && $array_f["calle_b"] != ""){
                $condition_b .= " AND r.id_calle = ".$array_f["calle_b"]." ";
            }

            if(isset($array_f["dir_b"]) && $array_f["dir_b"] != ""){
                $conditionst = ""; //La condición se elimina para que no vaya a master
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_direccion_asig = ".$array_f["dir_b"]." 
                                     AND d.estatus_rechazado = 0
                                     AND d.eliminado = 0
                                     AND d.id_estatus in ($str))";
            }

            if(isset($array_f["ciudadano_s"]) && $array_f["ciudadano_s"] != ""){
                $joinCondition .= " LEFT JOIN cat_ciudadano as c on r.id_cuidadano_solicita = c.id_ciudadano  ";
                $condition_b .= " AND CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.apepat), TRIM(c.apemat) ) LIKE '%".trim($array_f["ciudadano_s"])."%' ";
            }

            if(isset($array_f["detalle_b"]) && $array_f["detalle_b"] != ""){
                $condition_b .= " AND r.descripcion LIKE '%".$array_f["detalle_b"]."%' ";
            }

            if(isset($array_f["bus_notas"]) && $array_f["bus_notas"] == 1){
                $condition_b .= " OR r.id_reporte IN( SELECT h.id_reporte 
                                                       FROM tbl_reporte_historia as h
                                                      WHERE h.observaciones LIKE '%".$array_f["detalle_b"]."%') ";
            }

            if(isset($array_f["folio_opdm_b"]) && $array_f["folio_opdm_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE CONCAT_WS('/', c.folio, c.anio) LIKE '%".$array_f["folio_opdm_b"]."%')";
            }

            if(isset($array_f["no_of_ext_b"]) && $array_f["no_of_ext_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE c.folio_externo LIKE '%".$array_f["no_of_ext_b"]."%')";
            }

            if(isset($array_f["nom_car_pro_b"]) && $array_f["nom_car_pro_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE (CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.cargo), TRIM(c.procedencia)) LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.nombre LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.cargo  LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.procedencia LIKE '%".trim($array_f["nom_car_pro_b"])."%'))";
            }

            if(isset($array_f["observaciones_extra_b"]) && $array_f["observaciones_extra_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE c.observaciones_extra LIKE '%".$array_f["folio_opdm_b"]."%')";
            }

            if(isset($array_f["peticion_b"]) && $array_f["peticion_b"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d
                                   WHERE d.id_peticion = ".$array_f["peticion_b"]." 
                                     AND d.estatus_rechazado = 0 )";
            }
        }

        if(is_numeric($id_comunidad) && $id_comunidad > 0){
            $condition.= " and r.id_colonia = $id_comunidad";
        }

        $query = "SELECT r.id_reporte, 
                         r.id_colonia,
                         m.colonia,
                         l.calle,
                         r.descripcion, 
                         DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura, 
                         DATE_FORMAT(r.fecha_estatus, '%d/%m/%Y') as fecha_estatus,
                         DATE_FORMAT(r.fecha_limite, '%d/%m/%Y') as fecha_limite,
                         r.telefono_cel,
                         r.referencias
                    FROM tbl_reporte  as r
               LEFT JOIN cat_comunidad as m on r.id_colonia = m.id_comunidad
               LEFT JOIN cat_calles as l on l.id_calle = r.id_calle
                         $joinCondition
                   WHERE 1 = 1 
                     AND r.concluido = 0
                     AND r.activo = 1
                     AND r.id_aplicativo = 1
                     AND r.atendido = 0
                     AND r.id_estatus in (1, 2, 7)
                   $conditionst 
                   $condition
                   $condition_b
                   ORDER BY m.colonia asc";

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    } 


    public function getAtendidoByHistory( $id_report ){
        $atendido = 0;
        try{
            $query = "SELECT atendido
                        FROM tbl_reporte_historia
                       WHERE id_reporte = $id_report
                    ORDER BY fecha_captura DESC
                       LIMIT 1";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $atendido = $row->atendido;
            }
            return $atendido;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getReporteById($id_reporte ){

        $condition      = "";
        $joinCondition  = "";
        $str            = "";
        $conditionst    = "";
        $condition_b    = "";

        $condition_fecha = "ORDER BY r.id_reporte DESC ";
        
        // if($this->getFiltro() !=""){

        //     $array_f = $this->getArraySearch();

            // if(isset($array_f["id_reporte"]) && $array_f["id_reporte"] != ""){
            //     $condition_b .= " AND r.id_reporte = ".$array_f["id_reporte"];
            // }

         
        
        $query = "SELECT r.id_reporte, 
                         r.id_usuario_captura, 
                         r.id_colonia, 
                         r.id_calle,
                         r.id_origen,
                         r.id_cuidadano_solicita,
                         r.id_aplicativo,
                         r.no_reporte, 
                         r.descripcion, 
                         DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura, 
                         DATE_FORMAT(r.fecha_situacion, '%d/%m/%Y') as fecha_situacion,
                         DATE_FORMAT(r.fecha_asignacion, '%d/%m/%Y') as fecha_asignacion,
                         DATE_FORMAT(r.fecha_estatus, '%d/%m/%Y') as fecha_estatus,
                         DATE_FORMAT(r.fecha_termino, '%d/%m/%Y') as fecha_termino,
                         DATE_FORMAT(r.fecha_limite, '%d/%m/%Y') as fecha_limite,
                         DATE_FORMAT(r.fecha_limite, '%Y-%m-%d') as fecha_limite_calculo,
                         r.telefono_fijo, 
                         r.telefono_cel,
                         r.numero_exterior, 
                         r.numero_interior, 
                         r.cp,
                         r.referencias, 
                         r.avance,
                         r.oficio_respuesta, 
                         r.concluido,
                         r.activo,
                         e.estatus, 
                         e.class, 
                         e.finaliza,
                         o.abreviatura,
                         r.id_estatus,
                         r.copaci,
                         m.sectorint,
                         r.notificacion_presidencia,
                         a.img,
                         a.descripcion,
                         r.tipo_dia,
                         r.no_dias,
                         r.activo
                    FROM tbl_reporte  as r
               LEFT JOIN cat_estatus as e on r.id_estatus = e.id_estatus
               LEFT JOIN cat_origen as o on r.id_origen = o.id_origen
               LEFT JOIN cat_comunidad as m on r.id_colonia = m.id_comunidad
               LEFT JOIN cat_aplicativo as a on r.id_aplicativo = a.id_aplicativo
                         $joinCondition
                   WHERE id_reporte = $id_reporte
                   and r.id_estatus in (1, 2, 7)
                   $conditionst 
                   $condition
                   $condition_b
                   $condition_fecha
                    ";
            // die($query);

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    } 


    public function origenByUser($usuario){
        $array_estatus_index = array();
        try{
            $query = "SELECT id_usuario_origen, 
                             id_usuario, 
                             id_origen
                        FROM tbl_usuario_origen 
                       WHERE id_usuario = $usuario ";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            while($rowei = $result->fetch(PDO::FETCH_OBJ)){
                array_push($array_estatus_index, $rowei->id_origen);
            }
            return $array_estatus_index;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getDatosReportDtl($id_reporte, $id_direccion = null, $id_rol){
        $condition = "";
        $array_roles = array(3, 4, 5);

        if( $id_direccion > 0 && in_array($id_rol, $array_roles)){
            $condition .= " AND id_direccion_asig = $id_direccion ";
        }

        try{
            $query = "SELECT id_remty, 
                             id_peticion,
                             id_reporte_dtl,
                             id_direccion_asig
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte
                         AND observador = 0
                         AND eliminado  = 0
                       $condition";
                    // echo ($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getRptAplicativos( $fecha_inicio, $fecha_fin ){
        
        $query = "SELECT r.id_reporte,
                         r.id_colonia,
                         r.id_calle,
                         r.id_estatus,
                         r.id_origen,
                         r.id_cuidadano_solicita,
                         r.id_aplicativo,
                         r.id_entre_calle,
                         r.id_y_calle,
                         r.descripcion,
                         r.telefono_fijo,
                         r.telefono_cel,
                         r.numero_exterior,
                         r.numero_interior,
                         r.cp,
                         DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura,
                         r.referencias,
                         r.activo,
                         c.colonia,
                         c.sectorint,
                         a.calle,
                         b.calle as entre_calle,
                         p.calle as y_calle,
                         e.estatus,
                         o.origen,
                         o.abreviatura,
                         v.descripcion as aplicativo
                    FROM tbl_reporte as r
               LEFT JOIN cat_comunidad as c on c.id_comunidad = r.id_colonia
               LEFT JOIN cat_calles as a on a.id_calle = r.id_calle
               LEFT JOIN cat_calles as b on b.id_calle = r.id_entre_calle
               LEFT JOIN cat_calles as p on p.id_calle = r.id_y_calle
               LEFT JOIN cat_estatus as e on e.id_estatus = r.id_estatus
               LEFT JOIN cat_origen as o on o.id_origen = r.id_origen
               LEFT JOIN cat_aplicativo as v on v.id_aplicativo = r.id_aplicativo
                   WHERE r.activo = 1
                     AND CAST(r.fecha_captura as DATE) BETWEEN '$fecha_inicio' AND '$fecha_fin' ";

            // die($query);|
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }
    

    public function showOrigen( $origen = null){
        $condition = "";
        $strO      = "";

        if(is_array($origen) && !empty($origen)){
            $strO = implode(",", $origen);
            $condition = " AND id_origen IN ($strO)";
        }

        try{
            $query = "SELECT id_origen, 
                             origen, 
                             class, 
                             abreviatura
                        FROM cat_origen 
                       WHERE activo = 1 
                        $condition";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayAplicativo(){
        $arraya = array();
        try{
            $query = "SELECT id_aplicativo, 
                             descripcion
                        FROM cat_aplicativo
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowa = $result->fetch(PDO::FETCH_OBJ)){
                    $arraya[$rowa->id_aplicativo] = $rowa->descripcion;
                }
            }
            return $arraya;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayNotificador(){
        $arrayn = array();
        try{
            $query = "SELECT id_notificador,
                             CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno) as nombre_completo
                        FROM cat_notificadores
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowa = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayn[$rowa->id_notificador] = $rowa->nombre_completo;
                }
            }
            return $arrayn;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayEstatus( $rol ){
        $condition = "";

        if($rol > 3){

            $condition = "AND id_estatus IN (1, 2, 5, 6, 7)";
        }

        try{
            $query = "SELECT id_estatus, 
                             estatus, 
                             finaliza, 
                             class
                        FROM cat_estatus
                       WHERE activo = 1
                             $condition";
                            //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getNameByIdCiudadano( $id_ciudadano ){
        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apepat, apemat) as ciudadano
                        FROM cat_ciudadano as c
                       WHERE id_ciudadano = $id_ciudadano  
                       LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getInfoDiryArea( $id_reporte, $id_direccion = null, $rol = null, $area = null ){

        $cond = "";
        if(!is_null($id_direccion)){
            if(!is_null($rol)){
                if($rol == 4 ){
                    $cond =  " AND dtl.id_direccion_asig = ".$id_direccion;
                }
                if($rol == 5){
                    $cond =  " AND dtl.id_area_asig = ".$area;
                }
                if($rol == 6 ){
                    $cond =  "";
                }
                
            }
        }

        try{
            $query = "SELECT dtl.id_remty, 
                             dtl.id_direccion_asig,
                             dtl.id_estatus,
                             dtl.id_area_asig,
                             s.class as class_dtl,
                             s.estatus as estatus_dtl,
                             dtl.observador,
                             dtl.id_reporte_dtl,
                             dtl.id_peticion
                        FROM tbl_reporte_dtl as dtl
                   LEFT JOIN cat_estatus as s on s.id_estatus = dtl.id_estatus
                       WHERE dtl.id_reporte = $id_reporte 
                         AND dtl.eliminado = 0
                        $cond 
                    GROUP BY dtl.id_remty, dtl.id_peticion";
            //    die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getInfoDiryAreaR( $id_reporte, $id_direccion = null, $rol = null ){

        $cond = "";
        if(!is_null($id_direccion)){
            if(!is_null($rol)){
                if($rol > 3 ){
                    $cond =  " AND dtl.id_direccion_asig = ".$id_direccion;
                }
                if($rol == 6 ){
                    $cond =  "";
                }
                
            }
        }

        try{
            $query = "SELECT dtl.id_remty, 
                             dtl.id_peticion,
                             dtl.id_direccion_asig,
                             dtl.id_estatus,
                             dtl.id_area_asig,
                             s.class as class_dtl,
                             s.estatus as estatus_dtl,
                             dtl.observador,
                             dtl.avance
                        FROM tbl_reporte_dtl as dtl
                   LEFT JOIN cat_estatus as s on s.id_estatus = dtl.id_estatus
                       WHERE dtl.id_reporte = $id_reporte  $cond 
                         AND dtl.observador = 0
                         AND dtl.eliminado  = 0";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getRemtyById($remtyid){
        $tramiteB = "";
        try{
            $query = "SELECT id_remtys, 
                             nombre
                        FROM cat_remtys 
                       WHERE id_remtys = $remtyid LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowcol = $result->fetch(PDO::FETCH_OBJ);
                $tramiteB = $rowcol->nombre;
            }
            return $tramiteB;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getPeticionById( $id_peticion ){
        $name_pet = "";
        try {
            $query = "SELECT id_peticion,
                             nombre
                        FROM cat_peticiones
                       WHERE id_peticion = $id_peticion";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $name_pet = $row->nombre;
            }
            return $name_pet;
        } catch (\Throwable $th) {
            return "Error: ".$th;
        }
    }


    public function getCounNotById( $rep ){
        $total = "";
        try{
            $query = "SELECT COUNT(n.id_notificacion) as total
                        FROM tbl_notificacion as n
                   LEFT JOIN tbl_notificacion_dtl  as d on n.id_notificacion = d.id_notificacion
                       WHERE d.id_reporte = $rep ";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $total = $row->total;
            }
            return $total;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function showRemtys($rol = null, $id_direccion = null){

        $condition = "";

        if($rol > 3){
            if($id_direccion > 0){
                $condition = " AND id_direccion = $id_direccion ";
            }
        }else if($rol == 3 && $_SESSION[aplicativo] > 2){
            if($id_direccion > 0){
                $condition = " AND id_direccion = $id_direccion ";
            }
        }
        

        try{
            $query = "SELECT id_remtys, 
                             codigo, 
                             nombre
                        FROM cat_remtys 
                       WHERE activo = 1
                       $condition ";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function showPeticiones( $rol, $direccion ){
        $condition = "";

        if($rol > 3){
            if($direccion > 0){
                $condition = " AND id_direccion = $direccion";
            }
        } else if($rol == 3 && $_SESSION[aplicativo] > 2){
            if($direccion > 0){
                $condition = " AND id_direccion = $direccion";
            }
        }

        try{
            $query = "SELECT id_peticion,
                             nombre
                        FROM cat_peticiones
                       WHERE activo = 1
                        $condition";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getColonia( $id_colonia = null ){

        $condition = "";

        if($id_colonia != ""){
            $condition .= " AND id_comunidad = $id_colonia ";
        }

        try{
            $query = "SELECT id_comunidad, 
                             colonia,
                             activo,
                             codigo, 
                             sectorint, 
                             latitud, 
                             longitud,
                             zona
                        FROM cat_comunidad 
                       WHERE activo = 1 
                         $condition
                    ORDER BY colonia ASC";
                        // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    //búsqueda
    public function getArrayRemtys(){
        $arrayr = array();
        try{
            $query = "SELECT id_remtys, 
                             nombre
                        FROM cat_remtys";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayr[$row->id_remtys] = $row->nombre;
                }
            }
            return $arrayr;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getArrayColonia(){
        $arryac = array();
        try{
            $query = "SELECT id_comunidad, 
                             colonia
                        FROM cat_comunidad
                       WHERE activo = 1";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                      $arryac[$row->id_comunidad] = $row->colonia;
                }
            }
            return $arryac;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayCalle( $id_colonia = null ){
        $arraya = array();
        $condition = "";

        if($id_colonia != ""){
            $condition = " AND id_comunidad = $id_colonia ";
        }

        try{
            $query = "SELECT id_calle, 
                             CONCAT_WS(' ', t.descripcion, calle) as calle
                        FROM cat_calles as c
                   LEFT JOIN cat_tipo_vialidad as t on c.id_tipo_vialidad = t.id_tipo_vialidad
                       WHERE c.activo = 1
                       $condition";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                      $arraya[$row->id_calle] = $row->calle;
                }
            }

            return $arraya;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getEstatusMaster( $id_master ){
        $estatus = "";
        try{
            $query = "SELECT id_estatus 
                        FROM tbl_reporte
                       WHERE id_reporte = $id_master 
                       LIMIT 1 ";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $estatus = $row->id_estatus;
            }
            return $estatus;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateDescMaster( $data ){
        $correcto = 1;
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE tbl_reporte
                          SET id_usuario_modifica      = ?,                  
                              descripcion              = ?,  
                              fecha_modifica           = NOW()    
                        WHERE id_reporte               = ? ";

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


    
    public function updateBanderaReabrir($id, $status){

        $correcto = 1;
        $exec       = $this->conn->conexion();

        try{

            $update = " UPDATE tbl_reporte
                           SET id_estatus = $status,
                               concluido  = 0,
                               reabierto  = 1
                         WHERE id_reporte = ".$id;

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error: ".$e->getMessage();
        }

        return $correcto;
    }


    public function getArrayUser(){
        $arrayu = array();
        try{
            $query = "SELECT id_usuario,
                             CONCAT_WS(' ', nombre, apepa, apema) as nombre
                        FROM ws_usuario";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayu[$row->id_usuario] = $row->nombre;
                }
            }
            return $arrayu;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    
    //Exportar reporte fechas
    public function getDatosReport($fechai, $fechaf, $direccion, $rol, $origenes = null){
        $condition      = "";
        $conditionDtl   = "";
        $presiCondition = "";

        if($rol > 3){
                if($rol == 6){//sesión de presidencia
                    $presiCondition = " OR r.notificacion_presidencia = 1 ";
                }
            $condition .= " AND r.id_reporte IN( SELECT d.id_reporte
                                                   FROM tbl_reporte_dtl as d
                                                  WHERE d.id_direccion_asig = $direccion
                                                  $presiCondition)";
        }


        if(!empty($origenes)){
            if(is_array($origenes)){
                $str = implode(",", $origenes);
                $conditionDtl = " AND o.id_origen IN ($str)";
            }
        }

        try{
        
            $query = "SELECT r.id_reporte,
                             o.id_origen,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura,
                             r.descripcion,
                             r.no_reporte,
                             r.id_cuidadano_solicita,
                             r.observaciones,
                             o.abreviatura,
                             r.notificacion_presidencia,
                             r.id_aplicativo,
                             DATE_FORMAT(r.fecha_limite, '%d-%m-%Y') as fecha_limite,
                             CASE 
                                WHEN fecha_limite IS NOT NULL THEN 'TERMINO'
                                WHEN r.id_reporte IN (SELECT d.id_reporte 
                                                        FROM tbl_reporte_dtl  as d 
                                                         WHERE d.id_remty IN(308, 223) ) THEN 'URGENTE'
                                ELSE 'Sin prioridad'
                             END AS PRIORIDAD
                        FROM tbl_reporte as r
                  INNER JOIN cat_origen as o on r.id_origen = o.id_origen AND o.activo = 1
                       WHERE r.activo = 1
                         AND CAST(r.fecha_captura as DATE) BETWEEN '$fechai' AND '$fechaf' 
                        $conditionDtl
                        $condition
                    ORDER BY fecha_limite DESC, PRIORIDAD DESC ";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    //Exportar reporte general
    public function getRptExcel( $id_rol ){

        $milimite       = "";
        $condition      = "";
        $joinCondition  = "";
        $str            = "";
        $conditionst    = "";
        $condition_b    = "";
        $conditionDtl   = "";
        $presiCondition = "";


        if($this->getLimite() == 1){
            $milimite = " LIMIT ".$this->getInicio() .", ".$this->getFin();
        }

        if($id_rol > 1){
            $condition .= " AND r.activo = 1";
        }

        if(!empty($this->getCopaci_f())){
            if(is_array($this->getCopaci_f())){
                $strc = implode(",", $this->getCopaci_f());
                $condition .= " AND r.copaci = $strc";
            }
        }

        
        if(!empty($this->getFiltro_presidencia())){
            if(is_array($this->getFiltro_presidencia())){
                $strnp = implode(",", $this->getFiltro_presidencia());
                $condition .= " AND r.notificacion_presidencia = $strnp";
            }
        }
        

        if($this->getId_aplicativo() != ""){
            $condition .= " AND r.id_aplicativo = ".$this->getId_aplicativo()." ";
        }


        if(!empty($this->getEstatus_filt())){
            if(is_array($this->getEstatus_filt())){
                $str = implode(",", $this->getEstatus_filt());
                if($id_rol > 3 && $id_rol < 6){
                    $conditionDtl = "  AND (d.id_estatus in ($str) OR observador = 1 )";
                }else{
                    $conditionst = " AND r.id_estatus in ($str)";
                }
            }
        }

        if($this->getFiltro() != null){

            $array_f = $this->getArraySearch();

            if(isset($array_f["id_bus"]) && $array_f["id_bus"] != ""){
                $condition_b .= " AND r.id_reporte = ".$array_f["id_bus"]." OR (migracion = 1 AND folio_atencion = ".$array_f["id_bus"].") ";
            }
            if(isset($array_f["fecha_inicial"]) && $array_f["fecha_inicial"] != "" && 
               $array_f["fecha_final"] != ""    && isset($array_f["fecha_final"]) ){
                $condition_b .= " AND CAST(r.fecha_captura AS DATE) BETWEEN '".$array_f["fecha_inicial"]."' AND '".$array_f["fecha_final"]."' ";
            }
            if(isset($array_f["tipo_reporte"]) && $array_f["tipo_reporte"] != ""){
                $condition_b .= " AND r.id_origen = '".$array_f["tipo_reporte"]."' ";
            }
            if(isset($array_f["tipo_tramite"]) && $array_f["tipo_tramite"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_remty = ".$array_f["tipo_tramite"]." 
                                     AND d.estatus_rechazado = 0 
                                     AND d.eliminado = 0)";
            }
            if(isset($array_f["colonia_b"]) && $array_f["colonia_b"] != ""){
                $condition_b .= " AND r.id_colonia = ".$array_f["colonia_b"]." ";
            }
            if(isset($array_f["calle_b"]) && $array_f["calle_b"] != ""){
                $condition_b .= " AND r.id_calle = ".$array_f["calle_b"]." ";
            }
            if(isset($array_f["telefono_f"]) && $array_f["telefono_f"] != ""){
                $condition_b .= " AND r.telefono_fijo = ".$array_f["telefono_f"]." ";
            }
            if(isset($array_f["telefono_c"]) && $array_f["telefono_c"] != ""){
                $condition_b .= " AND r.telefono_cel = ".$array_f["telefono_c"]." ";
            }
            if(isset($array_f["dir_b"]) && $array_f["dir_b"] != ""){
                $conditionst = ""; //La condición se elimina para que no vaya a master
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_direccion_asig = ".$array_f["dir_b"]." 
                                     AND d.estatus_rechazado = 0
                                     AND d.eliminado = 0
                                     AND d.id_estatus in ($str))";
            }
            if(isset($array_f["ciudadano_s"]) && $array_f["ciudadano_s"] != ""){
                $joinCondition .= " LEFT JOIN cat_ciudadano as c on r.id_cuidadano_solicita = c.id_ciudadano  ";
                $condition_b .= " AND CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.apepat), TRIM(c.apemat) ) LIKE '%".trim($array_f["ciudadano_s"])."%' ";
            }
            if(isset($array_f["detalle_b"]) && $array_f["detalle_b"] != ""){
                $condition_b .= " AND r.descripcion LIKE '%".$array_f["detalle_b"]."%' ";
            }

            if(isset($array_f["bus_notas"]) && $array_f["bus_notas"] == 1){
                $condition_b .= " OR r.id_reporte IN( SELECT h.id_reporte 
                                                       FROM tbl_reporte_historia as h
                                                      WHERE h.observaciones LIKE '%".$array_f["detalle_b"]."%') ";
            }

            if(isset($array_f["area_b"]) && $array_f["area_b"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d 
                               WHERE d.id_area_asig = ".$array_f["area_b"]." 
                                 AND d.estatus_rechazado = 0
                                 AND d.eliminado = 0
                                 AND d.id_estatus in ($str))";
            }


            if(isset($array_f["folio_opdm_b"]) && $array_f["folio_opdm_b"] != ""){
               $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE CONCAT_WS('/', c.folio, c.anio) LIKE '%".$array_f["folio_opdm_b"]."%')";
            }

            if(isset($array_f["no_of_ext_b"]) && $array_f["no_of_ext_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE c.folio_externo LIKE '%".$array_f["no_of_ext_b"]."%')";
            }

            if(isset($array_f["nom_car_pro_b"]) && $array_f["nom_car_pro_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE (CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.cargo), TRIM(c.procedencia)) LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.nombre LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.cargo  LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.procedencia LIKE '%".trim($array_f["nom_car_pro_b"])."%'))";
            }

            if(isset($array_f["observaciones_extra_b"]) && $array_f["observaciones_extra_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE c.observaciones_extra LIKE '%".$array_f["folio_opdm_b"]."%')";
            }

            if(isset($array_f["fecha_inicial_l"]) && $array_f["fecha_inicial_l"] != "" && 
               isset($array_f["fecha_final_l"])   && $array_f["fecha_final_l"]   != ""   ){
                $condition_b .= " AND CAST(r.fecha_limite AS DATE) BETWEEN '".$array_f["fecha_inicial_l"]."' AND '".$array_f["fecha_final_l"]."' ";
            }

            if(isset($array_f["peticion_b"]) && $array_f["peticion_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT dtl.id_reporte
                                                         FROM tbl_reporte_dtl as dtl 
                                                        WHERE dtl.id_peticion = ".$array_f["peticion_b"]."
                                                          AND dtl.estatus_rechazado = 0 
                                                          AND dtl.eliminado = 0 )";
            }
        }

        if(!empty($this->getOrigenes_filtro())){
            if(is_array($this->getOrigenes_filtro())){
                $str1 = implode(",", $this->getOrigenes_filtro());
                $condition .= " AND o.id_origen in ($str1)";
            }
        }


        if(!empty($this->getFiltro_origenes_master())){
            if(is_array($this->getFiltro_origenes_master())){
                $stro = implode(",", $this->getFiltro_origenes_master());
                $condition .= " AND o.id_origen in ($stro)";
            }
        }

        if($this->getFiltro_terminado() !=""){
            $condition .= " AND concluido = ".$this->getFiltro_terminado()." ";
        }

        if($id_rol == 6){//sesión de presidencia
            $presiCondition = " OR r.notificacion_presidencia = 1 "; 
        }


        if($this->getId_direccion_asignado() !="" && $this->getId_direccion_asignado() > 0){
            //Enlaces
            $condition .= " AND (r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d 
                               WHERE d.id_direccion_asig = ".$this->getId_direccion_asignado()."
                                 AND d.estatus_rechazado = 0 
                                 AND d.eliminado = 0
                                 $conditionDtl ) $presiCondition )";
        }

        if($this->getId_area_asignada_s() !="" && $this->getId_area_asignada_s() > 0){
            $condition .= "AND r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d 
                               WHERE d.id_area_asig = ".$this->getId_area_asignada_s()." 
                                 AND d.estatus_rechazado = 0
                                 AND d.eliminado = 0
                                 $conditionDtl)";
        }


        $condition_fecha = "ORDER BY r.id_reporte DESC ";
        $diferencia_dias = "";
        if(!empty($this->getFiltro_fecha_limite())){
            if(is_array($this->getFiltro_fecha_limite())){
                
                $strfl = implode(",", $this->getFiltro_fecha_limite());
                if($strfl == 1){

                    $diferencia_dias = ",CASE
    	                                    WHEN DATEDIFF(r.fecha_limite, CURDATE()) <= 1 THEN 'Alta'
                                            WHEN DATEDIFF(r.fecha_limite, CURDATE())  = 2 THEN 'Media'
                                            WHEN DATEDIFF(r.fecha_limite, CURDATE()) >= 3 THEN 'Baja'
                                            ELSE 'Sin prioridad'
                                        END AS PRIORIDAD";

                    $condition_fecha = "ORDER BY PRIORIDAD ASC";
                }

            }
        }

        
        $query = "SELECT r.id_reporte, 
                         r.id_usuario_captura, 
                         r.id_colonia, 
                         r.id_calle,
                         r.id_origen,
                         r.id_cuidadano_solicita,
                         r.id_aplicativo,
                         r.no_reporte, 
                         r.descripcion as descripcion_repo, 
                         DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura, 
                         DATE_FORMAT(r.fecha_situacion, '%d/%m/%Y') as fecha_situacion,
                         DATE_FORMAT(r.fecha_asignacion, '%d/%m/%Y') as fecha_asignacion,
                         DATE_FORMAT(r.fecha_estatus, '%d/%m/%Y') as fecha_estatus,
                         DATE_FORMAT(r.fecha_termino, '%d/%m/%Y') as fecha_termino,
                         r.telefono_fijo, 
                         r.telefono_cel,
                         r.numero_exterior, 
                         r.numero_interior, 
                         r.cp,
                         r.referencias, 
                         r.nombre_ciudadano, 
                         r.avance,
                         r.oficio_respuesta, 
                         r.concluido,
                         r.activo,
                         e.estatus, e.class, e.finaliza,
                         o.abreviatura,
                         o.origen,
                         r.id_estatus,
                         r.copaci,
                         m.sectorint,
                         m.colonia,
                         r.notificacion_presidencia,
                         a.img,
                         a.descripcion,
                         l.calle,
                         r.id_entre_calle,
                         r.id_y_calle,
                         r.folio_atencion
                         $diferencia_dias
                    FROM tbl_reporte  as r
               LEFT JOIN cat_estatus as e on r.id_estatus = e.id_estatus
               LEFT JOIN cat_origen as o on r.id_origen = o.id_origen
               LEFT JOIN cat_comunidad as m on r.id_colonia = m.id_comunidad
               LEFT JOIN cat_aplicativo as a on r.id_aplicativo = a.id_aplicativo
               LEFT JOIN cat_calles as l on r.id_calle = l.id_calle
                         $joinCondition
                   WHERE 1 = 1 
                    $conditionst
                    $condition 
                    $condition_b
                    $conditionst 
                    $condition_fecha ".$milimite;
                //  die($query);

        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;

    }



    //Reporte OPDM
    public function getRptExcelOPDM( $id_rol ){

        $milimite       = "";
        $condition      = "";
        $joinCondition  = "";
        $str            = "";
        $conditionst    = "";
        $condition_b    = "";

        if($this->getLimite() == 1){
            $milimite = " LIMIT ".$this->getInicio() .", ".$this->getFin();
        }

        if($id_rol > 1){
            $condition .= " AND r.activo = 1";
        }

        $conditionDtl = "";

        if(!empty($this->getEstatus_filt())){
            if(is_array($this->getEstatus_filt())){
                $str = implode(",", $this->getEstatus_filt());
                if($this->getId_rol() > 3){
                    $conditionDtl = "  AND (d.id_estatus in ($str) OR observador = 1 )";
                }else{
                    $conditionst = " AND r.id_estatus in ($str)";
                }
            }
        }

        if($this->getFiltro() != null){
            $array_f = $this->getArraySearch();

            if(isset($array_f["id_bus"]) && $array_f["id_bus"] != ""){
                $condition_b .= " AND r.id_reporte = ".$array_f["id_bus"]." ";
            }
            if(isset($array_f["fecha_inicial"]) && $array_f["fecha_inicial"] != "" && 
               $array_f["fecha_final"] != ""    && isset($array_f["fecha_final"]) ){
                $condition_b .= " AND CAST(r.fecha_captura AS DATE) BETWEEN '".$array_f["fecha_inicial"]."' AND '".$array_f["fecha_final"]."' ";
            }
            if(isset($array_f["tipo_reporte"]) && $array_f["tipo_reporte"] != ""){
                $condition_b .= " AND r.id_origen = '".$array_f["tipo_reporte"]."' ";
            }
            if(isset($array_f["tipo_tramite"]) && $array_f["tipo_tramite"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_remty = ".$array_f["tipo_tramite"]." 
                                     AND d.estatus_rechazado = 0 )";
            }
            if(isset($array_f["colonia_b"]) && $array_f["colonia_b"] != ""){
                $condition_b .= " AND r.id_colonia = ".$array_f["colonia_b"]." ";
            }
            if(isset($array_f["calle_b"]) && $array_f["calle_b"] != ""){
                $condition_b .= " AND r.id_calle = ".$array_f["calle_b"]." ";
            }
            if(isset($array_f["telefono_f"]) && $array_f["telefono_f"] != ""){
                $condition_b .= " AND r.telefono_fijo = ".$array_f["telefono_f"]." ";
            }
            if(isset($array_f["telefono_c"]) && $array_f["telefono_c"] != ""){
                $condition_b .= " AND r.telefono_cel = ".$array_f["telefono_c"]." ";
            }
            if(isset($array_f["dir_b"]) && $array_f["dir_b"] != ""){
                $conditionst = ""; //La condición se elimina para que no vaya a master
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_direccion_asig = ".$array_f["dir_b"]." 
                                     AND d.estatus_rechazado = 0
                                     AND d.id_estatus in ($str))";
            }
            if(isset($array_f["ciudadano_s"]) && $array_f["ciudadano_s"] != ""){
                $joinCondition .= " LEFT JOIN cat_ciudadano as c on r.id_cuidadano_solicita = c.id_ciudadano  ";
                $condition_b .= " AND CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.apepat), TRIM(c.apemat) ) LIKE '%".trim($array_f["ciudadano_s"])."%' ";
            }
            if(isset($array_f["detalle_b"]) && $array_f["detalle_b"] != ""){
                $condition_b .= " AND r.descripcion LIKE '%".$array_f["detalle_b"]."%' ";
            }

            if(isset($array_f["bus_notas"]) && $array_f["bus_notas"] == 1){
                $condition_b .= " OR r.id_reporte IN( SELECT h.id_reporte 
                                                       FROM tbl_reporte_historia as h
                                                      WHERE h.observaciones LIKE '%".$array_f["detalle_b"]."%') ";
            }

            if(isset($array_f["area_b"]) && $array_f["area_b"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d 
                               WHERE d.id_area_asig = ".$array_f["area_b"]." 
                                 AND d.estatus_rechazado = 0
                                 AND d.id_estatus in ($str))";
            }


            if(isset($array_f["folio_opdm_b"]) && $array_f["folio_opdm_b"] != ""){
                // $condition .= " AND r.folio_opdm LIKE '%".$array_f["folio_opdm_b"]."%' ";
               $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE CONCAT_WS('/', c.folio, c.anio) LIKE '%".$array_f["folio_opdm_b"]."%')";
            }

            if(isset($array_f["no_of_ext_b"]) && $array_f["no_of_ext_b"] != ""){
                // $condition .= " AND c.folio_externo LIKE '%".$array_f["no_of_ext_b"]."%' ";
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE c.folio_externo LIKE '%".$array_f["no_of_ext_b"]."%')";
            }

            if(isset($array_f["nom_car_pro_b"]) && $array_f["nom_car_pro_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE (CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.cargo), TRIM(c.procedencia)) LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.nombre LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.cargo  LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                       OR c.procedencia LIKE '%".trim($array_f["nom_car_pro_b"])."%'))";
            }

            if(isset($array_f["observaciones_extra_b"]) && $array_f["observaciones_extra_b"] != ""){
                $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                       FROM tbl_reporte_complemento as c
                                                      WHERE c.observaciones_extra LIKE '%".$array_f["folio_opdm_b"]."%')";
            }


            if(isset($array_f["fecha_inicial_l"]) && $array_f["fecha_inicial_l"] != "" && 
               isset($array_f["fecha_final_l"])   && $array_f["fecha_final_l"]   != ""   ){
                $condition_b .= " AND CAST(r.fecha_limite AS DATE) BETWEEN '".$array_f["fecha_inicial_l"]."' AND '".$array_f["fecha_final_l"]."' ";
            }

            if(isset($array_f["peticion_b"]) && $array_f["peticion_b"] != ""){
                $condition_b .= "AND r.id_reporte IN 
                                ( SELECT d.id_reporte 
                                    FROM tbl_reporte_dtl as d 
                                   WHERE d.id_peticion = ".$array_f["peticion_b"]." 
                                     AND d.estatus_rechazado = 0 )";
            }
        }


        if(!empty($this->getFiltro_origenes_master())){
            if(is_array($this->getFiltro_origenes_master())){
                $stro = implode(",", $this->getFiltro_origenes_master());
                $condition .= " AND o.id_origen in ($stro)";
            }
        }

        if($this->getFiltro_terminado() !=""){
            $condition .= " AND concluido = ".$this->getFiltro_terminado()." ";
        }

        $presiCondition = "";

        if($this->getId_rol() == 6){//sesión de presidencia
            $presiCondition = " OR r.notificacion_presidencia = 1 ";
            
        }

        if(!empty($this->getCopaci_f())){
            if(is_array($this->getCopaci_f())){
                $strc = implode(",", $this->getCopaci_f());
                $condition .= " AND r.copaci = $strc";
            }
        }

        
        if(!empty($this->getFiltro_presidencia())){
            if(is_array($this->getFiltro_presidencia())){
                $strnp = implode(",", $this->getFiltro_presidencia());
                $condition .= " AND r.notificacion_presidencia = $strnp";
            }
        }


        $condition_fecha = "ORDER BY r.id_reporte DESC ";
        $diferencia_dias = "";
        if(!empty($this->getFiltro_fecha_limite())){
            if(is_array($this->getFiltro_fecha_limite())){
                
                $strfl = implode(",", $this->getFiltro_fecha_limite());
                if($strfl == 1){

                    $diferencia_dias = ",CASE
    	                                    WHEN DATEDIFF(r.fecha_limite, CURDATE()) <= 1 THEN 'Alta'
                                            WHEN DATEDIFF(r.fecha_limite, CURDATE())  = 2 THEN 'Media'
                                            WHEN DATEDIFF(r.fecha_limite, CURDATE()) >= 3 THEN 'Baja'
                                            ELSE 'Sin prioridad'
                                        END AS PRIORIDAD";

                    $condition_fecha = "ORDER BY PRIORIDAD ASC";
                }

            }
        }
        

        
        try{
            $query = "SELECT r.id_reporte,
                             id_cuidadano_solicita,
                             descripcion,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura,
                             r.id_aplicativo,
                             r.observaciones,
                             o.abreviatura,
                             dtl.id_area_asig,
                             dtl.id_direccion_asig,
                             dtl.id_estatus,
                             dtl.id_remty,
                             dtl.observador,
                             c.colonia
                             $diferencia_dias
                        FROM tbl_reporte as r
                  INNER JOIN tbl_reporte_dtl as dtl on dtl.id_reporte = r.id_reporte
                  INNER JOIN cat_origen as o on r.id_origen = o.id_origen 
                   LEFT JOIN cat_comunidad as c on r.id_colonia = c.id_comunidad
                             $joinCondition
                       WHERE 1 = 1 $condition 
                            $condition_b
                            $conditionst 
                        AND dtl.id_direccion_asig = 77
                        AND dtl.observador = 0
                    $condition_fecha".$milimite;
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function showCiudadanoById( $ciudadano ){
        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apepat, apemat) as nombre,
                             cargo,
                             d.descripcion_dependencia
                        FROM cat_ciudadano as c
                  INNER JOIN cat_dependencia_externa as d on d.id_dependencia_ext = c.id_tipo_contacto
                       WHERE id_ciudadano = $ciudadano
                       LIMIT 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getInfoCopias( $id_reporte ){
        try{
            $query = "SELECT id_direccion_asig,
                             id_area_asig,
                             observador
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte
                         AND observador = 1";
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage(); 
        }
    }


    public function getTipoAById( $id_colonia ){
        $asentamiento = "";
        try{
            $query = "SELECT a.tipo_asentamiento
                        FROM cat_comunidad as c 
                   LEFT JOIN cat_tipo_asentamiento as a on c.id_tipo_asentamiento = a.id_tipo_asentamiento
                       WHERE id_comunidad = $id_colonia";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $asentamiento = $row->tipo_asentamiento;
            }
            return $asentamiento;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getDtlById( $id_reporte ){
        try{
            $query = "SELECT id_direccion_asig,
                             id_area_asig,
                             id_remty,
                             id_peticion
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    
    public function getEstatusById($estatusid){
        $estatusB = "";
        try{
            $query = "SELECT id_estatus, 
                             estatus
                        FROM cat_estatus 
                       WHERE id_estatus = $estatusid";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowcol = $result->fetch(PDO::FETCH_OBJ);
                $estatusB = $rowcol->estatus;
            }
            return $estatusB;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    //Reporte Master
    public function getDataRptMaster(){
        try{
            $query = "SELECT c.colonia AS colonia, 
                             IF (s.nombre IS NOT NULL, s.nombre, p.nombre)  as tramite,
                             COUNT(r.id_reporte) AS total 
                        FROM tbl_reporte AS r 
                   LEFT JOIN tbl_reporte_dtl AS d ON r.id_reporte = d.id_reporte 
                   LEFT JOIN cat_comunidad AS c ON r.id_colonia = c.id_comunidad 
                   LEFT JOIN cat_remtys AS s ON d.id_remty = s.id_remtys 
                   LEFT JOIN cat_peticiones as p on d.id_peticion = p.id_peticion
                       WHERE c.activo = 1 
                         AND d.observador = 0 
                    GROUP BY r.id_colonia, d.id_remty, p.id_peticion
                    ORDER BY colonia ASC,
                             total DESC";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    //Nuevo y Editar
    public function getArrayPeticiones(){
        try{
            $query = "SELECT id_peticion,      
                             nombre
                        FROM cat_peticiones
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayTipoCiudadano(){
        $arraytc = array();
        try{
            $query = "SELECT id_tipo_ciudadano, 
                             tipo_ciudadano
                        FROM cat_tipo_ciudadano
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowtc = $result->fetch(PDO::FETCH_OBJ)){
                    $arraytc[$rowtc->id_tipo_ciudadano] = $rowtc->tipo_ciudadano;
                }
            }
            return $arraytc;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayDepedenciaE(){
        $arrayd = array();
        try{
            $query = "SELECT id_dependencia_ext, 
                             descripcion_dependencia
                        FROM cat_dependencia_externa
                       WHERE activo = 1
                         AND id_dependencia_ext <> 2";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowd = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayd[$rowd->id_dependencia_ext] = $rowd->descripcion_dependencia;
                }
            }
            return $arrayd;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayCiudadanos(){
        $arrayC = array();
        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat) as nombre
                        FROM cat_ciudadano ";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowr = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayC[$rowr->id_ciudadano] = $rowr->nombre;
                }
            }
            return $arrayC;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage(); 
        }
    }


    public function showRegistros($numero_de_registros){
        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat) as ciudadano,
                             CONCAT_WS(' ', telefono_fijo, telefono_cel) as telefonos,
                             d.descripcion_dependencia
                        FROM cat_ciudadano AS c
                        LEFT JOIN cat_dependecia_externa AS d ON d.id_dependecia_ext = c.id_tipo_contacto
                       WHERE c.activo = 1
                        LIMIT $numero_de_registros";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getCiudadanos($numero_registros, $busqueda, $ciudadano = null){

        $condition = "";

        if($busqueda != ""){
            $condition .= "  (CONCAT_WS(' ', TRIM(nombre), TRIM(apepat), TRIM(apemat)) LIKE '%".trim($busqueda)."%'
                            OR CONCAT(nombre, apepat, apemat) LIKE '%".trim($busqueda)."%'
                            OR CONCAT_WS(' ', apepat, apemat) LIKE '%".trim($busqueda)."%'
                            OR apemat LIKE '%".trim($busqueda)."%'
                            OR telefono_fijo LIKE '%".trim($busqueda)."%'
                            OR telefono_cel LIKE '%".trim($busqueda)."%')";

        }else if($ciudadano != ""){

            $condition .= " id_ciudadano = ".trim($ciudadano)." ";
        }

        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat) as ciudadano,
                             CONCAT_WS(' ', telefono_fijo, telefono_cel) as telefonos,
                             d.descripcion_dependencia, 
                             c.descripcion
                        FROM cat_ciudadano AS c
                   LEFT JOIN cat_dependencia_externa AS d ON d.id_dependencia_ext = c.id_tipo_contacto
                       WHERE $condition
                       LIMIT $numero_registros";
                    //    die ($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    
    public function infoById( $id_ciudadano ){
        try{
            $query = "SELECT id_ciudadano, 
                             c.id_colonia, 
                             c.id_calle, 
                             c.id_municipio, 
                             numero_exterior, 
                             numero_interior,
                             telefono_fijo, 
                             telefono_cel,
                             nombre, 
                             apepat, 
                             apemat,
                             CONCAT_WS(' ', nombre, apepat, apemat) as ciudadano,
                             descripcion_dependencia,
                             descripcion,
                             email,
                             o.codigo,
                             o.longitud,
                             o.latitud,
                             o.sectorint,
                             c.id_entre_calle,
                             c.id_entre_calle2
                        FROM cat_ciudadano as c
                   LEFT JOIN cat_comunidad as o on c.id_colonia = o.id_comunidad
                       WHERE id_ciudadano =  $id_ciudadano 
                       LIMIT 1";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function checkColActive($idc){
        try{
            $query = "SELECT id_comunidad, c.activo, colonia,
                             id_notificador
                        FROM cat_comunidad as c
                   LEFT JOIN cat_notificadores as n on c.zona = n.zona
                       WHERE id_comunidad = $idc";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getNotificador( $zona, $colonia ){
        $notificador = "";
        try{
            $query = "SELECT n.id_notificador
                        FROM cat_notificadores as n
                       WHERE n.activo = 1
                        AND (n.zona = $zona OR n.id_notificador IN (SELECT d.id_notificador
                                                                      FROM cat_notificadores_dtl as d
                                                                     WHERE d.id_comunidad = $colonia))";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $notificador = $row->id_notificador;
            }
            return $notificador;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getShowRemtys($busqueda, $registros, $id_aplicativo = null){
        $condition = "";
        
        // if($this->getId_remty() !=""){
        //     $condition .= " AND id_remtys = ".$this->getId_remty()." ";
        // }

        if($id_aplicativo > 2){
            $condition .= " AND r.id_direccion IN (SELECT d.id_direccion 
                                                     FROM cat_aplicativo_direccion  as d
                                                    WHERE d.id_aplicativo = $id_aplicativo)";
        }

        try{
            $query = "SELECT id_remtys, 
                             r.id_direccion,
                             CONCAT_WS(' ', nombre) as remtys
                        FROM cat_remtys as r
                       WHERE r.activo = 1
                          AND ( codigo LIKE '%".$busqueda."%'
                               OR nombre LIKE '%".$busqueda."%' ) 
                          $condition 
                          LIMIT $registros";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }


    public function fileRemty($id_remty){
        try{
            $query = "SELECT id_remtys, 
                             extencion, 
                             nombre
                        FROM cat_remtys
                       WHERE id_remtys = $id_remty ";
                // echo $query;
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function duplicateReport( $check = null, $remty, $colonia, $calle ){
        $condition = "";

        if(!empty($check)){
            $check_txt = implode(",", $check);
            $condition = " AND r.id_origen IN ($check_txt) ";
        }
        try{
            
            $query = "SELECT r.id_reporte,
                             o.abreviatura
                        FROM tbl_reporte as r
                   LEFT JOIN cat_origen as o on r.id_origen = o.id_origen
                       WHERE r.concluido <> 1
                         AND r.id_colonia = ".$colonia." 
                         AND r.id_calle   = ".$calle."
                         AND r.id_reporte IN (SELECT dtl.id_reporte
                                                FROM tbl_reporte_dtl as dtl
                                               WHERE id_remty = ".$remty.")
                            $condition
                        ORDER BY r.id_reporte DESC
                        LIMIT 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertCitizen($data_citizen){
        $correcto = 1;
        $exec = $this->conn->conexion();

        try{
            $insert_citizen = "INSERT INTO cat_ciudadano(id_colonia,
                                                         id_calle,
                                                         id_municipio,
                                                         id_usuario_captura,
                                                         id_tipo_ciudadano,
                                                         fecha_captura,
                                                         id_tipo_contacto,
                                                         id_entre_calle,
                                                         id_entre_calle2,
                                                         nombre,
                                                         apepat,
                                                         apemat,
                                                         cargo,
                                                         descripcion,
                                                         numero_exterior,
                                                         numero_interior,
                                                         cp,
                                                         telefono_fijo,
                                                         telefono_cel,
                                                         email)
                                                  VALUES(?,
                                                         ?,
                                                         ?,
                                                         ?,
                                                         ?,
                                                         NOW(),
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
                                                         ?)";
            $result = $this->conn->prepare($insert_citizen);
            $exec->beginTransaction();
            $result->execute( $data_citizen );

            if($correcto == 1){
                $correcto = $exec->lastInsertId();
            }

            $exec->commit();
            return $correcto;
        }catch(\PDOException $e){
            $exec->rollBack();
            return "Error! : ".$e->getMessage();
        }
    }


    public function getLatitudLongitudCol($id_colonia){
        try{
            $query = "SELECT longitud, 
                             latitud
                        FROM cat_comunidad 
                       WHERE id_comunidad = $id_colonia";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage(); 
        }
    }


    public function changeOrigen($torigen){
        $id_origen = "";
        try{
            $query = "SELECT id_origen
                        FROM cat_origen 
                       WHERE origen = '".$torigen."' ";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() >  0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $id_origen = $row->id_origen;
            }
            return $id_origen;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    
    public function checkDateNL(){
        $total = array();
        try{
            $query = "SELECT fecha_no_lab
                        FROM tbl_dia_no_lab";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    array_push($total, $row->fecha_no_lab);
                }
            }
            return $total;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertReg($data){
        $correcto = 1;
        $exec = $this->conn->conexion();

        $insert = "INSERT INTO tbl_reporte(  id_usuario_captura,
                                             id_colonia,
                                             id_calle,
                                             id_estatus,
                                             id_origen,
                                             id_cuidadano_solicita,
                                             id_aplicativo,
                                             id_entre_calle,
                                             id_y_calle,
                                             fecha_captura,
                                             fecha_situacion,
                                             fecha_estatus,
                                             fecha_limite,
                                             no_dias,
                                             tipo_dia,
                                             notificacion_presidencia,
                                             copaci,
                                             descripcion,
                                             avance,
                                             telefono_fijo,
                                             telefono_cel,
                                             numero_exterior,
                                             numero_interior,
                                             cp,
                                             referencias,
                                             latitud_reporte,
                                             longitud_reporte,
                                             no_reparaciones)
                                      VALUES(?,
                                             ?,
                                             ?,
                                             ?,
                                             ?,
                                             ?,
                                             ?,
                                             ?,
                                             ?,
                                             NOW(),
                                             NOW(),
                                             NOW(),
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
                                             ?)";
                                    
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($data);
        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }
        
        $exec->commit();
        return $correcto;
    }


    public function getDirAreaByRemty($remty){
        $remtydir = array();
        try{
            $query = "SELECT id_direccion, 
                             id_area,
                             id_remtys
                        FROM cat_remtys
                       WHERE id_remtys = $remty
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0 ){
                $rowrd = $result->fetch(PDO::FETCH_OBJ);
                $remtydir[0] = $rowrd->id_direccion;
                $remtydir[1] = $rowrd->id_area;
            }
            return $remtydir;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getDirAreaByPeticion( $peticion ){
        $data = array();

        try{
            $query = "SELECT id_peticion,
                             id_direccion,
                             id_area
                        FROM cat_peticiones
                       WHERE id_peticion = $peticion";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $data[0] = $row->id_direccion;
                $data[1] = $row->id_area;
            }
            return $data;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }
  

    public function updateStatusRM( $id_rpt ){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE tbl_reporte
                          SET activo     = 0
                        WHERE id_reporte = $id_rpt ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();
            
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function insertDtl( $dataDtl, $param ){
        $correcto = 1;
        $dato     = "";
        $exec = $this->conn->conexion();

        if($param == 1){
            $dato = 'id_remty';
        } else {
            $dato = 'id_peticion';
        }

        $insert = "INSERT INTO tbl_reporte_dtl(id_reporte,
                                               id_direccion_asig,
                                               id_area_asig,
                                               $dato,
                                               id_estatus,
                                               id_usuario_captura,
                                               fecha_captura,
                                               original,
                                               no_oficio,
                                               anexos,
                                               fojas,
                                               is_acuse,
                                               observaciones,
                                               eliminado)
                                        VALUES(?,
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               NOW(),
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               ?,
                                               ?)";
                                    // die($insert);
        $result = $this->conn->prepare($insert);
        $exec->beginTransaction();
        $result->execute($dataDtl);
        
        if($correcto == 1){
            $correcto = $exec->lastInsertId();
        }

        $exec->commit();
        return $correcto;
    }



    public function updateRepo( $datarepo ){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE tbl_reporte
                          SET no_reporte = ?
                        WHERE id_reporte = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($datarepo);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function getinfoByUser( $id_ciudadano ){
        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apepat, apemat ) as nombre_ciudadano,
                             descripcion
                        FROM cat_ciudadano
                       WHERE id_ciudadano = $id_ciudadano ";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function insertComplement( $data ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_reporte_complemento(id_reporte,
                                                            id_reporte_dtl,
                                                            id_usuario_captura,
                                                            id_aplicativo,
                                                            fecha_captura,
                                                            folio,
                                                            anio,
                                                            folio_externo,
                                                            anexos,
                                                            nombre,
                                                            cargo,
                                                            procedencia,
                                                            observaciones_extra)
                                                    VALUES (?,
                                                            ?,
                                                            ?,
                                                            ?,
                                                            NOW(),
                                                            ?,
                                                            ?,
                                                            ?,
                                                            ?,
                                                            ?,
                                                            ?,
                                                            ?,
                                                            ?)";
                                                    // die($queryMP);

            $result = $this->conn->prepare($queryMP);
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


    public function insertHist( $data ){
        $correcto = 1;
        $exec = $this->conn->conexion();

        try{
            $insert_hist = "INSERT INTO tbl_reporte_historia(id_reporte,
                                                             id_estatus,
                                                             id_direccion_asignada,
                                                             id_area_asignada,
                                                             id_usuario_captura,
                                                             id_accion,
                                                             fecha_captura,
                                                             fecha_seguimiento,
                                                             observaciones,
                                                             llamada_reporte)
                                                      VALUES(?,
                                                             ?,
                                                             ?,
                                                             ?,
                                                             ?,
                                                             ?,
                                                             NOW(),
                                                             NOW(),
                                                             ?,
                                                             ?)";
            $result = $this->conn->prepare($insert_hist);
            $exec->beginTransaction();
            $result->execute( $data );
        
            if($correcto == 1){
                $correcto = $exec->lastInsertId();
            }

            $exec->commit();
            return $correcto;

        }catch(\PDOException $e){
            $exec->rollBack();
            return "Error! : ".$e->getMessage();
        }
    }


    public function showOrigenById($idorigen){
        $origen = "";
        try{
            $query = "SELECT id_origen, abreviatura
                        FROM cat_origen
                       WHERE id_origen = $idorigen
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowo = $result->fetch(PDO::FETCH_OBJ);
                $origen = $rowo->abreviatura;
            }

            return $origen;

        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertHAsig($data_asig){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_h_asignados(id_historia,
                                                    id_dir_reasignada,
                                                    id_area_reasignada)
                                            VALUES (?,
                                                    ?,
                                                    ?)";

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute( $data_asig );

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


    public function insertDocumento($dataDocto){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_reporte_documento(id_reporte, 
                                                          id_historia_reporte, 
                                                          id_usuario_captura,
                                                          original_name, 
                                                          ext, 
                                                          route, 
                                                          fecha_captura)
                                                  VALUES (?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          NOW())";

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute( $dataDocto );

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


    public function insertDtlCopys( $data_copys ){
        $correcto= 1;
        $exec = $this->conn->conexion();

        try {
            $insert = "INSERT INTO tbl_reporte_dtl(id_reporte,
                                                   id_direccion_asig,
                                                   id_area_asig,
                                                   id_usuario_captura,
                                                   fecha_captura,
                                                   observador,
                                                   original,
                                                   no_oficio,
                                                   no_copias,
                                                   anexos,
                                                   fojas,
                                                   is_acuse,
                                                   observaciones)
                                           VALUES (?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                   NOW(),
                                                   ?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                   ?)";
                                                    // die($queryMP);

            $result = $this->conn->prepare($insert);
            $exec->beginTransaction();

            $result->execute( $data_copys );

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


    public function insertCopyHistory( $data_c ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $insert = "INSERT INTO tbl_rpt_copia_historia(id_rpt,
                                                          id_rpt_dtl,
                                                          no_oficio,
                                                          observaciones)
                                                   VALUES(?,
                                                          ?,
                                                          ?,
                                                          ?)";

            $result = $this->conn->prepare($insert);
            $exec->beginTransaction();

            $result->execute( $data_c );

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


    
    public function updateFechaEstatus( $id ){
        $correcto = 1;
        $exec     = $this->conn->conexion();
        try{
            $update = "UPDATE tbl_reporte
                          SET fecha_estatus = NOW() 
                        WHERE id_reporte    = $id ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateCopyDtl( $dta_id_c ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_rpt_copia_historia
                          SET id_rpt_historia       = ?
                        WHERE id_rpt_copia_historia = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($dta_id_c);
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto;
    }
 

    //Editar
    public function getArrayCiudadano(){
        $arrayc = array();
        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat) as nombre
                        FROM cat_ciudadano
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayc[$row->id_ciudadano] = $row->nombre;
                }
            }
            return $arrayc;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getRegById( $id_aplicativo, $id_rpt ){

        try{
            $query = "SELECT r.id_reporte,
                             r.id_colonia,
                             r.id_calle,
                             r.id_estatus,
                             r.id_origen,
                             r.id_cuidadano_solicita,
                             r.no_reporte,
                             r.descripcion,
                             r.telefono_fijo,
                             r.telefono_cel,
                             r.numero_exterior,
                             r.numero_interior,
                             r.cp,
                             r.referencias, 
                             r.avance,
                             r.latitud_reporte,
                             r.longitud_reporte,
                             r.copaci,
                             c.email,
                             m.sectorint,
                             r.notificacion_presidencia,
                             r.no_dias,
                             r.tipo_dia,
                             DATE_FORMAT(r.fecha_limite, '%d/%m/%Y') as fecha_limite,
                             r.no_reparaciones,
                             r.id_entre_calle,
                             r.id_y_calle
                        FROM tbl_reporte as r
                  INNER JOIN cat_ciudadano as c on r.id_cuidadano_solicita = c.id_ciudadano
                  INNER JOIN cat_comunidad as m on r.id_colonia = m.id_comunidad
                       WHERE r.id_reporte = $id_rpt
                       LIMIT 1";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getComplementosM( $id, $flag = null ){

        $cond = "";
        $join = "";

        if($flag != ""){
            $join = " LEFT JOIN tbl_reporte_dtl as d on d.id_reporte_dtl = r.id_reporte_dtl ";
            $cond = " AND d.original = 1 ";
        }

        try{
            $query = "SELECT r.id_folio,
                             r.id_reporte,
                             r.id_reporte_dtl,
                             r.id_usuario_captura,
                             r.id_aplicativo,
                             r.fecha_captura,
                             r.folio,
                             r.anio,
                             r.folio_externo,
                             r.anexos,
                             r.nombre,
                             r.cargo,
                             r.procedencia,
                             r.observaciones_extra
                        FROM tbl_reporte_complemento as r
                        $join
                       WHERE r.id_reporte = $id 
                        $cond";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getInfoOfice( $id ){
        try{
            $query = "SELECT no_oficio,
                             anexos,
                             fojas,
                             is_acuse,
                             observaciones
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id
                         AND original = 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! :".$e->getMessage();
        }
    }


    
    public function getFechaCapturaById( $id_reporte ){
        $fecha = "";
        try{
            $query = "SELECT fecha_captura
                        FROM tbl_reporte 
                       WHERE id_reporte = $id_reporte ";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $fecha = $row->fecha_captura;
            }
            return $fecha;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateReg( $data ){
        $correcto = 1;
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE tbl_reporte
                          SET id_usuario_modifica      = ?,                      
                              id_colonia               = ?,              
                              id_calle                 = ?,          
                              id_origen                = ?,              
                              fecha_modifica           = NOW(),                  
                              fecha_limite             = ?,           
                              no_dias                  = ?,          
                              tipo_dia                 = ?,          
                              notificacion_presidencia = ?,                          
                              copaci                   = ?,          
                              descripcion              = ?,              
                              telefono_fijo            = ?,              
                              telefono_cel             = ?,              
                              numero_exterior          = ?,                  
                              numero_interior          = ?,                  
                              cp                       = ?,      
                              referencias              = ?,              
                              latitud_reporte          = ?,                  
                              longitud_reporte         = ?           
                        WHERE id_reporte               = ? ";

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


    
    public function getDtlByOf( $id_reporte ){
        $no_reporte = "";
        try{
            $query = "SELECT id_reporte_dtl
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte
                         AND original = 1";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $no_reporte = $row->id_reporte_dtl;
            }
            return $no_reporte;
        }catch(\PDOException $e){
            return "Error! :".$e->getMessage();
        }
    }


    public function updateComplementos( $dta_complementos ){

        $correcto = 1;
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE tbl_reporte_complemento
                          SET folio          = ?,
                              anio           = ?,
                              folio_externo  = ?,
                              anexos         = ?                  
                        WHERE id_reporte_dtl = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($dta_complementos);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateStatusDtl( $id_rtp_master, $parametro ){
        $correcto  = 1;
        $exec      = $this->conn->conexion();
        $condition = "";

        if($parametro == 1){
            $condition = " AND id_remty IS NOT NULL";
        }
        
        if($parametro == 2){
            $condition = " AND id_peticion IS NOT NULL";
        }

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET eliminado  = 1              
                        WHERE id_reporte = $id_rtp_master 
                        $condition";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function validateDtlByT( $id_rtp_master, $id_tramite, $parametro ){
        $id_rpt_dtl = "";
        $condition  = "";

        if($parametro == 1){
            $condition = "id_remty";
        } else if($parametro == 2){
            $condition = "id_peticion";
        }

        try{
            $query = "SELECT id_reporte_dtl
                        FROM tbl_reporte_dtl
                       WHERE $parametro = $id_tramite
                         AND id_reporte = $id_rtp_master ";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $id_rpt_dtl = $row->id_reporte_dtl;
            }
            return $id_rpt_dtl;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateRemtyByDtl( $data_udt, $parametro ){
        $correcto = 1;
        $exec     = $this->conn->conexion();
        $set      = "";

        if($parametro == 1){
            $set = "id_remty";
        } else if($parametro == 2){
            $set = "id_peticion";
        }

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_direccion_asig   = ?,
                              id_area_asig        = ?,
                              $set                = ?,
                              id_estatus          = ?,
                              id_usuario_modifica = ?,
                              fecha_modifica      = NOW(),
                              original            = ?,
                              no_oficio           = ?,
                              anexos              = ?,      
                              fojas               = ?,  
                              is_acuse            = ?,  
                              observaciones       = ?,    
                              eliminado           = ?                                     
                        WHERE id_reporte_dtl      = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_udt);
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateInfoByRemty( $id_rpt_master ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_direccion_asig = NULL,
                              id_area_asig      = NULL                                  
                        WHERE id_reporte        = $id_rpt_master ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateStatusPresi( $id_rpt_master, $flag_presi ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET notificacion_presidencia = $flag_presi                               
                        WHERE id_reporte               = $id_rpt_master ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }



    //Notificacion
    public function getNotById( $rep ){
        try{
            $query = "SELECT n.id_notificacion,
                             n.id_ciudadano,
                             n.id_dependencia,
                             n.id_area,
                             n.id_notificador,
                             n.id_estatus,
                             n.id_usuario_captura,
                             n.id_data_extra,
                             n.id_usuario_modifica,
                             DATE_FORMAT(n.fecha_captura, '%d/%m/%Y') as fecha_captura,
                             DATE_FORMAT(n.fecha_notificacion, '%d/%m/%Y') as fecha_notificacion,
                             DATE_FORMAT(n.fecha_modificacion, '%d/%m/%Y') as fecha_modificacion,
                             n.id_colonia,
                             n.id_calle,
                             n.num_exterior,
                             n.num_interior,
                             n.cp,
                             n.domicilio_externo,
                             n.no_oficio,
                             n.observaciones,
                             n.dir_area_notifica,
                             n.remitente,
                             n.cargo,
                             d.id_reporte,
                             d.id_reporte_dtl,
                             d.id_caso,
                             d.id_caso_dtl,
                             d.id_origen,
                             d.campo_caso_externo 
                        FROM tbl_notificacion as n
                   LEFT JOIN tbl_notificacion_dtl as d on d.id_notificacion = n.id_notificacion
                       WHERE d.id_reporte = $rep";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function geArrayOrigen(){
        $arrayo = array();
        try{
            $query = "SELECT id_origen,
                             abreviatura
                        FROM cat_origen
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayo[$row->id_origen] = $row->abreviatura;
                }
            }
            return $arrayo;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function citizen($idciudadano){
        $ciudadano = "";
        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat) as ciudadano
                        FROM cat_ciudadano
                       WHERE id_ciudadano = $idciudadano
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowc = $result->fetch(PDO::FETCH_OBJ);
                $ciudadano = $rowc->ciudadano;
            }
            return $ciudadano;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getDataRpt( $feca_inicio, $fecha_fin){

        try{
            $query = "SELECT r.id_reporte,
                             r.id_usuario_captura,
                             r.id_cuidadano_solicita,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura,
                             r.descripcion,
                             o.abreviatura
                        FROM tbl_reporte as r
                   LEFT JOIN cat_origen as o on r.id_origen = o.id_origen 
                       WHERE r.id_origen = 6
                         AND r.id_estatus = 1
                         AND r.activo = 1
                         AND r.id_aplicativo = 2
                         AND r.id_reporte NOT IN (SELECT d.id_reporte
                                                    FROM tbl_reporte_documento as d)
                        AND CAST(r.fecha_captura AS DATE) BETWEEN '$feca_inicio' AND '$fecha_fin' ";
                //  die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getCiudadanoById( $ciudadano ){
        $nombre_ciudadano = "";
        try{
            $query = "SELECT id_ciudadano,
                             CONCAT_WS(' ', nombre, apepat, apemat ) as ciudadano
                        FROM cat_ciudadano
                       WHERE id_ciudadano = $ciudadano";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $nombre_ciudadano = $row->ciudadano;
            }
            return $nombre_ciudadano;

        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getUserById( $user ){
        $nombre_ciudadano = "";
        try{
            $query = "SELECT id_usuario,
                             CONCAT_WS(' ', nombre, apepa, apema ) as usuario
                        FROM ws_usuario
                       WHERE id_usuario = $user";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $nombre_ciudadano = $row->usuario;
            }
            return $nombre_ciudadano;

        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateNot( $data ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_usuario_modifica      = ?,
                              fecha_situacion          = NOW(),
                              fecha_modifica           = NOW(),
                              fecha_estatus            = NOW(),
                              notificacion_presidencia = ?                           
                        WHERE id_reporte               = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute( $data );
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function getAplicativoById( $id_reporte ){

        $reporte = "";

        try {
            $query = "SELECT o.abreviatura 
                        FROM tbl_reporte as r
                   LEFT JOIN cat_origen as o on o.id_origen = r.id_origen
                       WHERE r.id_reporte = $id_reporte";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $reporte = $row->abreviatura.str_pad($id_reporte, 10, '0', STR_PAD_LEFT);
            }
            return $reporte;

        } catch (\Throwable $th) {
            return "Error: ".$th->getMessage();
        }
    }


    public function showRegistrosP( $registros ){
        try{
            $query = "SELECT id_peticion,
                             nombre
                        FROM cat_peticiones
                       WHERE activo = 1
                       LIMIT $registros";

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getPeticiones( $registros, $busqueda, $peticion = null ){
        $condition = "";

        if($busqueda != ""){
            $condition .= " AND nombre LIKE '%".$busqueda."%'";
        }

        $query = "SELECT id_peticion,
                         nombre
                    FROM cat_peticiones
                   WHERE 1 = 1
                   $condition
                   LIMIT $registros";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
    }


    public function getRptServicios( $fecha_in, $fecha_fn, $rol, $origen, $apl){
        $condition = "";

        if($rol == 7){
            if(is_array($origen) && !empty($origen)){
                $str = implode(",", $origen);
            }

            $condition .= " AND r.id_origen IN ($str) AND r.id_aplicativo = $apl";
        }

        try{
            $query = "SELECT r.id_reporte,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura,
                             r.descripcion,
                             r.no_reporte,
                             r.id_cuidadano_solicita,
                             r.observaciones,
                             r.notificacion_presidencia,
                             r.id_aplicativo,
                             o.id_origen,
                             o.abreviatura
                        FROM tbl_reporte as r
                  INNER JOIN cat_origen as o on r.id_origen = o.id_origen AND o.activo = 1
                       WHERE r.activo = 1
                         AND CAST(r.fecha_captura as DATE) BETWEEN '$fecha_in' AND '$fecha_fn' 
                         AND r.id_reporte IN (SELECT dtl.id_reporte
                                                FROM tbl_reporte_dtl as dtl
                                           LEFT JOIN cat_remtys as m on m.id_remtys = dtl.id_remty
                                               WHERE m.es_tramite = 0)
                        $condition";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getReport( $id ){
        try{
            $query = "SELECT r.id_reporte,
                             r.id_colonia,
                             c.colonia,
                             r.id_calle,
                             a.calle,
                             r.id_estatus,
                             e.estatus,
                             r.id_origen,
                             o.origen,
                             r.id_cuidadano_solicita,
                             CONCAT_WS(' ', d.nombre, d.apepat, d.apemat) as ciudadano,
                             r.id_entre_calle,
                             t.calle as entre_calle,
                             r.id_y_calle,
                             y.calle as y_calle,
                             r.descripcion,
                             DATE_FORMAT(r.fecha_captura, '%d-%m-%Y') as fecha_captura,
                             r.telefono_fijo,
                             r.telefono_cel,
                             r.cp,
                             CASE
                                WHEN l.id_remty IS NOT NULL THEN s.nombre
                                WHEN l.id_peticion IS NOT NULL THEN p.nombre
                                ELSE 'Otro'
                             END AS tramite,
                             latitud_reporte,
                             longitud_reporte,
                             h.id_reporte_historia as id_seguimiento,
                             n.tipo_accion,
                             h.observaciones,
                             DATE_FORMAT(h.fecha_seguimiento, '%d-%m-%Y %r') as fecha_seguimiento,
                             CONCAT(b.route, md5(b.id_documento),'.',b.ext) as file,
                             b.original_name,
                             h.id_usuario_captura,
                             CONCAT_WS(' ', w.nombre, w.apepa, w.apema) as nombre_usuario
                        FROM tbl_reporte as r
                  INNER JOIN tbl_reporte_dtl as l on r.id_reporte = l.id_reporte
                   LEFT JOIN cat_comunidad as c on c.id_comunidad = r.id_colonia       AND c.activo = 1    
                   LEFT JOIN cat_calles    as a on a.id_calle     = r.id_calle         AND a.activo = 1
                   LEFT JOIN cat_calles    as t on t.id_calle     = r.id_entre_calle   AND t.activo = 1
                   LEFT JOIN cat_calles    as y on y.id_calle     = r.id_y_calle       AND y.activo = 1
                   LEFT JOIN cat_estatus   as e on e.id_estatus   = r.id_estatus       AND e.activo = 1    
                   LEFT JOIN cat_ciudadano as d on d.id_ciudadano = r.id_cuidadano_solicita AND d.activo = 1    
                   LEFT JOIN cat_origen    as o on o.id_origen    = r.id_origen         AND o.activo = 1
                   LEFT JOIN cat_remtys    as s on l.id_remty     = s.id_remtys AND s.activo = 1
                   LEFT JOIN cat_peticiones as p on l.id_peticion = p.id_peticion AND p.activo = 1
                   LEFT JOIN tbl_reporte_historia as h on r.id_reporte = h.id_reporte
                   LEFT JOIN tbl_reporte_documento as b on b.id_historia_reporte = h.id_reporte_historia
                   LEFT JOIN cat_acciones as n on h.id_accion  = n.id_accion AND n.activo = 1
                   LEFT JOIN ws_usuario   as w on w.id_usuario = h.id_usuario_captura AND w.activo = 1
                       WHERE r.id_reporte = $id 
                    ORDER BY h.fecha_seguimiento DESC
                       LIMIT 1";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getFollowById( $id_rpt ){
        try{
            $query = "SELECT t.id_reporte_historia as id_seguimiento,
                             a.tipo_accion,
                             t.observaciones,
                             DATE_FORMAT(t.fecha_seguimiento, '%d-%m-%Y %r') as fecha_seguimiento,
                             CONCAT(o.route, md5(o.id_documento),'.',o.ext) as file,
                             o.original_name,
                             t.id_usuario_captura,
                             CONCAT_WS(' ', w.nombre, w.apepa, w.apema) as nombre_usuario
                        FROM tbl_reporte_historia t
                   LEFT JOIN tbl_reporte_documento as o on o.id_historia_reporte = t.id_reporte_historia
                   LEFT JOIN cat_acciones as a on t.id_accion  = a.id_accion AND a.activo = 1
                   LEFT JOIN ws_usuario   as w on w.id_usuario = t.id_usuario_captura AND w.activo = 1
                       WHERE t.id_reporte = $id_rpt 
                    ORDER BY t.fecha_seguimiento DESC
                       LIMIT 1";
                   //  die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getReportsMap( $id_usuario ){
        $condition = "";
        // $array     = ();
        // if($id_usuario != ""){
        //     $condition = " AND id_u"
        // }

        try{
            $query = "SELECT r.id_reporte,
                             r.latitud_reporte,
                             r.longitud_reporte,
                            CASE
                                WHEN d.id_remty IS NOT NULL THEN s.nombre
                                WHEN d.id_peticion IS NOT NULL THEN p.nombre
                                ELSE 'Otro'
                             END AS tramite,
                             d.id_direccion_asig
                        FROM tbl_reporte as r
                   LEFT JOIN tbl_reporte_dtl as d on r.id_reporte = d.id_reporte
                   LEFT JOIN cat_remtys    as s on d.id_remty     = s.id_remtys AND s.activo = 1
                   LEFT JOIN cat_peticiones as p on d.id_peticion = p.id_peticion AND p.activo = 1
                       WHERE r.id_estatus = 1 
                         AND r.id_aplicativo = 1";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function insertSeguimiento( $data ){
        $correcto= 1;

        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_reporte_historia(
                            id_estatus,
                            id_usuario_captura,
                            id_accion,
                            fecha_captura,
                            reporta_ciudadano,
                            avance,
                            seguimiento,
                            observaciones,
                            llamada_reporte,
                            activo,
                            atendido,
                            latitud,
                            longitud,
                            datosCompletos,
                            id_reporte
                            )
                             VALUES (
                            1,
                            ?,
                            7,
                            ?,
                            0,
                            0,
                            1,
                            ?,
                            0,
                            1,
                            ?,
                            ?,
                            ?,
                            ?,
                            ?)";

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute($data);

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


    public function updateRegSeguimiento( $data ){
        $correcto = 1;
        $exec       = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_historia
                          SET id_usuario_modifica = ?,
                            fecha_modificacion = ?,
                            observaciones = ?,
                            atendido = ?,
                            latitud = ?,
                            longitud = ?,
                            datosCompletos = ?
                        WHERE id_reporte_historia = ?";

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

    public function updateAtendidoByReporteMaster( $id_reporte, $atendido ){
        $correcto = 1;
        $exec       = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET atendido = $atendido
                        WHERE id_reporte = ?";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute(array($id_reporte));
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }

    

    public function closeOut(){
        $this->conn = null;
    }

// prueba de julio 

public function getAllRegGeoreferencia( $id_usuario, $rol, $id_sector, $id_zona, $id_seccion, $id_comunidad ){

    $condition      = "";
    $joinCondition  = "";
    $str            = "";
    $conditionst    = "";
    $condition_b    = "";
    $join_cdt       = "";

    if($rol > 1){
        $condition .= " AND r.activo = 1";
    }

    if($rol == 7){
        $condition .= " AND r.id_reporte IN (SELECT dtl.id_reporte
                                               FROM tbl_reporte_dtl as dtl
                                          LEFT JOIN cat_remtys as m on m.id_remtys = dtl.id_remty
                                              WHERE m.es_tramite = 0)";
    }
    
    if($rol == 8){
        $condition .= " AND r.id_sector = $id_sector";
    }
    if($rol == 9){
        $condition .= " AND r.id_zona = $id_zona";
    }
    if($rol == 10){
        $condition .= " AND r.id_seccion = $id_seccion";
    }

    $condition_fecha = "ORDER BY r.id_reporte DESC";
    
    if($this->getFiltro() !=""){

        $array_f = $this->getArraySearch();

        if(isset($array_f["id_reporte"]) && $array_f["id_reporte"] != ""){
            $condition_b .= " AND r.id_reporte = ".$array_f["id_reporte"];
        }

        if(isset($array_f["fecha_inicial"]) && $array_f["fecha_inicial"] != "" && 
           $array_f["fecha_final"] != ""    && isset($array_f["fecha_final"]) ){
            $condition_b .= " AND CAST(r.fecha_captura AS DATE) BETWEEN '".$array_f["fecha_inicial"]."' AND '".$array_f["fecha_final"]."' ";
        }

        if(isset($array_f["tipo_reporte"]) && $array_f["tipo_reporte"] != ""){
            $condition_b .= " AND r.id_origen = '".$array_f["tipo_reporte"]."' ";
        }

        if(isset($array_f["tipo_tramite"]) && $array_f["tipo_tramite"] != ""){
            $condition_b .= "AND r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d 
                               WHERE d.id_remty = ".$array_f["tipo_tramite"]." 
                                 AND d.estatus_rechazado = 0 )";
        }

        if(isset($array_f["colonia_b"]) && $array_f["colonia_b"] != ""){
            $condition_b .= " AND r.id_colonia = ".$array_f["colonia_b"]." ";
        }

        if(isset($array_f["calle_b"]) && $array_f["calle_b"] != ""){
            $condition_b .= " AND r.id_calle = ".$array_f["calle_b"]." ";
        }

        if(isset($array_f["dir_b"]) && $array_f["dir_b"] != ""){
            $conditionst = ""; //La condición se elimina para que no vaya a master
            $condition_b .= "AND r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d 
                               WHERE d.id_direccion_asig = ".$array_f["dir_b"]." 
                                 AND d.estatus_rechazado = 0
                                 AND d.eliminado = 0
                                 AND d.id_estatus in ($str))";
        }

        if(isset($array_f["ciudadano_s"]) && $array_f["ciudadano_s"] != ""){
            $joinCondition .= " LEFT JOIN cat_ciudadano as c on r.id_cuidadano_solicita = c.id_ciudadano  ";
            $condition_b .= " AND CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.apepat), TRIM(c.apemat) ) LIKE '%".trim($array_f["ciudadano_s"])."%' ";
        }

        if(isset($array_f["detalle_b"]) && $array_f["detalle_b"] != ""){
            $condition_b .= " AND r.descripcion LIKE '%".$array_f["detalle_b"]."%' ";
        }

        if(isset($array_f["bus_notas"]) && $array_f["bus_notas"] == 1){
            $condition_b .= " OR r.id_reporte IN( SELECT h.id_reporte 
                                                   FROM tbl_reporte_historia as h
                                                  WHERE h.observaciones LIKE '%".$array_f["detalle_b"]."%') ";
        }

        if(isset($array_f["folio_opdm_b"]) && $array_f["folio_opdm_b"] != ""){
            $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                   FROM tbl_reporte_complemento as c
                                                  WHERE CONCAT_WS('/', c.folio, c.anio) LIKE '%".$array_f["folio_opdm_b"]."%')";
        }

        if(isset($array_f["no_of_ext_b"]) && $array_f["no_of_ext_b"] != ""){
            $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                   FROM tbl_reporte_complemento as c
                                                  WHERE c.folio_externo LIKE '%".$array_f["no_of_ext_b"]."%')";
        }

        if(isset($array_f["nom_car_pro_b"]) && $array_f["nom_car_pro_b"] != ""){
            $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                   FROM tbl_reporte_complemento as c
                                                  WHERE (CONCAT_WS(' ', TRIM(c.nombre), TRIM(c.cargo), TRIM(c.procedencia)) LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                   OR c.nombre LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                   OR c.cargo  LIKE '%".trim($array_f["nom_car_pro_b"])."%'
                                                   OR c.procedencia LIKE '%".trim($array_f["nom_car_pro_b"])."%'))";
        }

        if(isset($array_f["observaciones_extra_b"]) && $array_f["observaciones_extra_b"] != ""){
            $condition_b .= " AND r.id_reporte IN (SELECT c.id_reporte
                                                   FROM tbl_reporte_complemento as c
                                                  WHERE c.observaciones_extra LIKE '%".$array_f["folio_opdm_b"]."%')";
        }

        if(isset($array_f["peticion_b"]) && $array_f["peticion_b"] != ""){
            $condition_b .= "AND r.id_reporte IN 
                            ( SELECT d.id_reporte 
                                FROM tbl_reporte_dtl as d
                               WHERE d.id_peticion = ".$array_f["peticion_b"]." 
                                 AND d.estatus_rechazado = 0 )";
        }
    }

    if(is_numeric($id_comunidad) && $id_comunidad > 0){
        $condition.= " and r.id_colonia = $id_comunidad";
    }

    $query = "SELECT r.id_reporte, 
                     r.descripcion, 
                     r.latitud_reporte,
                     r.longitud_reporte  
                FROM tbl_reporte  as r
           LEFT JOIN cat_comunidad as m on r.id_colonia = m.id_comunidad
           LEFT JOIN cat_calles as l on l.id_calle = r.id_calle
                     $joinCondition
               WHERE 1 = 1 
                 AND r.concluido = 0
                 AND r.activo = 1
                 AND r.id_aplicativo = 1
                 AND r.atendido = 0
                 AND r.id_estatus in (1, 2, 7)
               $conditionst 
               $condition
               $condition_b
               $condition_fecha";
           // die($query);

    $result = $this->conn->prepare($query);
    $result->execute();
    return $result;
} 

}

?>