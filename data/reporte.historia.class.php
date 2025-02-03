<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class rHistory extends BD {
    
   
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


    private $id_reporte;
    private $id_direccion;
    private $id_estatus;
    private $id_usuario_captura;
    private $fecha_captura;
    private $fecha_seguimiento;
    private $observaciones;
    private $fecha_asignacion;
    private $id_hist_repo;
    private $id_area_asignada;
    private $id_reporte_dtl;
    
    /**
     * Get the value of id_reporte
     */ 
    public function getId_reporte()
    {
        return $this->id_reporte;
    }

    /**
     * Set the value of id_reporte
     *
     * @return  self
     */ 
    public function setId_reporte($id_reporte)
    {
        $this->id_reporte = $id_reporte;

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
     * Get the value of id_estatus
     */ 
    public function getId_estatus()
    {
        return $this->id_estatus;
    }

    /**
     * Set the value of id_estatus
     *
     * @return  self
     */ 
    public function setId_estatus($id_estatus)
    {
        $this->id_estatus = $id_estatus;

        return $this;
    }

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
     * Get the value of fecha_captura
     */ 
    public function getFecha_captura()
    {
        return $this->fecha_captura;
    }

    /**
     * Set the value of fecha_captura
     *
     * @return  self
     */ 
    public function setFecha_captura($fecha_captura)
    {
        $this->fecha_captura = $fecha_captura;

        return $this;
    }

    /**
     * Get the value of fecha_seguimiento
     */ 
    public function getFecha_seguimiento()
    {
        return $this->fecha_seguimiento;
    }

    /**
     * Set the value of fecha_seguimiento
     *
     * @return  self
     */ 
    public function setFecha_seguimiento($fecha_seguimiento)
    {
        $this->fecha_seguimiento = $fecha_seguimiento;

        return $this;
    }

    /**
     * Get the value of observaciones
     */ 
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of fecha_asignacion
     */ 
    public function getFecha_asignacion()
    {
        return $this->fecha_asignacion;
    }

    /**
     * Set the value of fecha_asignacion
     *
     * @return  self
     */ 
    public function setFecha_asignacion($fecha_asignacion)
    {
        $this->fecha_asignacion = $fecha_asignacion;

        return $this;
    }


        /**
     * Get the value of id_hist_repo
     */ 
    public function getId_hist_repo()
    {
        return $this->id_hist_repo;
    }

    /**
     * Set the value of id_hist_repo
     *
     * @return  self
     */ 
    public function setId_hist_repo($id_hist_repo)
    {
        $this->id_hist_repo = $id_hist_repo;

        return $this;
    }

        /**
     * Get the value of id_area_asignada
     */ 
    public function getId_area_asignada()
    {
        return $this->id_area_asignada;
    }

    /**
     * Set the value of id_area_asignada
     *
     * @return  self
     */ 
    public function setId_area_asignada($id_area_asignada)
    {
        $this->id_area_asignada = $id_area_asignada;

        return $this;
    }

        /**
     * Get the value of id_reporte_dtl
     */ 
    public function getId_reporte_dtl()
    {
        return $this->id_reporte_dtl;
    }

    /**
     * Set the value of id_reporte_dtl
     *
     * @return  self
     */ 
    public function setId_reporte_dtl($id_reporte_dtl)
    {
        $this->id_reporte_dtl = $id_reporte_dtl;

        return $this;
    }


    function __construct()
    {
        $this->conn = new BD();
    }

    public function getAllInfo($id_reporte){
        try{
            $query = "SELECT r.id_reporte,
                             r.id_usuario_captura,
                             r.id_usuario_modifica,
                             r.id_colonia,
                             r.id_calle,
                             r.id_estatus,
                             r.id_origen,
                             r.id_cuidadano_solicita,
                             r.id_aplicativo,
                             r.no_reporte,
                             r.descripcion,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y %T %p') as fecha_captura,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura_p,
                             DATE_FORMAT(r.fecha_situacion, '%d/%m/%Y') as fecha_situacion,
                             DATE_FORMAT(r.fecha_modifica, '%d/%m/%Y') as fecha_modifica,
                             DATE_FORMAT(r.fecha_asignacion, '%d/%m/%Y %T %p') as fecha_asignacion,
                             DATE_FORMAT(r.fecha_estatus, '%d/%m/%Y %T %p') as fecha_estatus,
                             DATE_FORMAT(r.fecha_termino, '%d/%m/%Y') as fecha_termino,
                             r.telefono_fijo,
                             r.telefono_cel,
                             r.numero_exterior,
                             r.numero_interior,
                             r.cp,
                             r.referencias,
                             r.observaciones,
                             r.avance,
                             oficio_respuesta,
                             r.activo,
                             r.concluido,
                             r.latitud_reporte,
                             r.longitud_reporte,
                             c.id_tipo_ciudadano,
                             r.reabierto,
                             r.copaci,
                             com.colonia, 
                             com.sectorint,
                             com.id_tipo_asentamiento,
                             CONCAT_WS(' ', c.nombre, c.apepat, c.apemat) as ciudadano_solicita,
                             c.cargo,
                             c.descripcion as descripcion_ciudadano,
                             c.id_tipo_contacto,
                             d.id_remty,
                             r.notificacion_presidencia,
                             r.no_dias,
                             r.tipo_dia,
                             DATE_FORMAT(r.fecha_limite, '%d/%m/%Y') as fecha_limite,
                             r.id_entre_calle,
                             r.id_y_calle,
                             d.no_oficio
                        FROM tbl_reporte as r 
                   LEFT JOIN cat_ciudadano as c on r.id_cuidadano_solicita = c.id_ciudadano
                   LEFT JOIN cat_comunidad as com on com.id_comunidad = r.id_colonia
                   LEFT JOIN tbl_reporte_dtl as d on r.id_reporte = d.id_reporte
                       WHERE r.id_reporte = $id_reporte LIMIT 1";
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function getArrayTipoAsentamiento(){
        $array_ta = array();
        try{
            $query = "SELECT id_tipo_asentamiento,
                             abreviatura
                        FROM cat_tipo_asentamiento
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array_ta[$row->id_tipo_asentamiento] = $row->abreviatura;
                }
            }
            return $array_ta;
        }catch(\PDOException $e){
            return "Error!: ".$e->getMessage();
        }
    }



    public function estatusById($estatus){
        try{
            $query = "SELECT id_estatus, estatus, class
                        FROM cat_estatus 
                       WHERE id_estatus = $estatus";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function usarioById( $usuario ){
        try{
            $query = "SELECT id_usuario, 
                             CONCAT_WS(' ', nombre, apepa, apema) as usuario_captura
                        FROM ws_usuario 
                       WHERE id_usuario = $usuario";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    
    public function origenByID($origen){
        try{
            $query = "SELECT id_origen, origen, abreviatura
                        FROM cat_origen 
                       WHERE id_origen = $origen";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function remtyById($remty){
        $remtyh = "";
        try{
            $query = "SELECT id_remtys, 
                             CONCAT_WS(' ',  nombre) as nombre
                        FROM cat_remtys 
                       WHERE id_remtys = $remty";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowhc = $result->fetch(PDO::FETCH_OBJ);
                $remtyh  = $rowhc->nombre;
            }
            return $remtyh;
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


    public function showInfoHist( $id_reporte, $rol ){

        $condition = "";

        if($rol != 1){
            $condition .= " AND id_accion <> 14";
        }

        try{
            $query = "SELECT id_reporte_historia, 
                             id_reporte, 
                             id_estatus, 
                             id_direccion_asignada,
                             id_area_asignada,
                             id_accion,
                             observaciones, 
                             id_usuario_captura,
                             DATE_FORMAT(fecha_captura, '%d/%m/%Y %T %p ') as fecha_captura,
                             DATE_FORMAT(fecha_seguimiento, '%d/%m/%Y') as fecha_seguimiento,
                             llamada_reporte
                        FROM tbl_reporte_historia
                       WHERE id_reporte = $id_reporte 
                         AND activo <> 2
                        $condition
                    ORDER BY id_reporte_historia DESC";
                    // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayAcciones(){
        $array_ac = array();
        try{
            $query = "SELECT id_accion, tipo_accion
                        FROM cat_acciones
                       WHERE activo =1 ";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array_ac[$row->id_accion] = $row->tipo_accion;
                }
            }
            return $array_ac;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function updateAre($insertDir){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_estatus        = ?,
                              id_area_asig      = ?
                        WHERE id_reporte        = ?
                          AND id_direccion_asig = ?";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($insertDir);
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateFechaAsignacion($dataFecha){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus        = ?,
                              fecha_asignacion  = NOW()
                        WHERE id_reporte        = ?";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($dataFecha);
            $exec->commit();

        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }
    


    public function insertHist( $dataHist ){
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
                                                             avance,
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
                                                             ?,
                                                             ?)";
            $result = $this->conn->prepare($insert_hist);
            $exec->beginTransaction();
            $result->execute( $dataHist );

        
            if($correcto == 1){
                $correcto = $exec->lastInsertId();
                $this->setId_hist_repo($correcto);
            }
            $exec->commit();
            return $correcto;
        }catch(\PDOException $e){
            $exec->rollBack();
            return "Error! : ".$e->getMessage();
        }
    }

    public function showEstatusById(){
        try{
            $query = "SELECT id_estatus, estatus
                        FROM cat_estatus 
                       WHERE id_estatus <> 1 
                         AND id_estatus <> 6
                         AND id_estatus <> 7
                         AND id_estatus <> 8
                         AND id_estatus <> 4
                         AND activo = 1  ";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function updateFollow( $data_follow_dtl ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_area_asig      = ?,
                              id_estatus        = ?,
                              avance            = ?,
                              estatus_rechazado = ?
                        WHERE id_reporte_dtl    = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_follow_dtl);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function getTotalDir($id_reporte){
        $id_direccion_t = array();
        try{
            $query = "SELECT id_area_asig
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowtd = $result->fetch(PDO::FETCH_OBJ)){
                    $id_direccion_t[] = $rowtd->id_area_asig;
                }
            }
            return $id_direccion_t;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getDatosDtl($id_reporte_dtl){
        try{
            $query = "SELECT id_reporte, 
                             id_remty, 
                             id_reporte_dtl,
                             id_peticion
                        FROM tbl_reporte_dtl
                       WHERE id_reporte_dtl = $id_reporte_dtl";
                    // die($query);
                       
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getTotalDirRepo($id_reporte){
        $total_dir = "";
        try{
            $query = "SELECT COUNT(id_direccion_asig) as total
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowtd = $result->fetch(PDO::FETCH_OBJ);
                $total_dir = $rowtd->total;
            }
            return $total_dir;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getCheckEstatusDir( $id_reporte ){
        try{
            $query = "SELECT id_estatus 
                        FROM tbl_reporte_dtl
                       WHERE id_reporte   = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function CheckEstatusMaster( $id_reporte ){
        $id_estatus = "";
        try{
            $query = "SELECT id_estatus 
                        FROM tbl_reporte
                       WHERE id_reporte   = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $id_estatus = $row->id_estatus;
            }
            return $id_estatus;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getAvanceGen($id_reporte){
        $avance = "";
        try{
            $query = "SELECT avance 
                        FROM tbl_reporte
                       WHERE id_reporte   = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowa = $result->fetch(PDO::FETCH_OBJ);
                $avance = $rowa->avance;
            }
            return $avance;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

 
    public function getCountDirByRepo($id_reporte){
        $total = "";
        try{
            $query = "SELECT COUNT(id_direccion_asig) total  
                        FROM tbl_reporte_dtl
                       WHERE id_reporte   = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $rowa = $result->fetch(PDO::FETCH_OBJ);
                $total = $rowa->total;
            }
            return $total;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function updateFollowR( $data_follow_r ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus       = ?,
                              fecha_estatus    = NOW(),
                              fecha_termino    = ?,
                              observaciones    = ?,
                              avance           = ?,
                              oficio_respuesta = ?,
                              concluido        = ?
                        WHERE id_reporte       = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_follow_r);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }
    
    public function updateByAsignacion( $data ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus       = ?,
                              fecha_estatus    = NOW(),
                              avance           = ?
                        WHERE id_reporte       = ? ";

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


    public function updateAddRemtysMaster( $data ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus       = ?,
                              fecha_asignacion = NOW(),
                              avance           = ?
                        WHERE id_reporte       = ? ";

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

    
    public function showAvance($id_reporte, $id_direccion, $id_area){
        $avance = "";
        try{
            $query = "SELECT id_reporte_dtl, avance, id_direccion_asig, id_area_asig, id_remty
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte
                         AND id_direccion_asig = $id_direccion
                         AND id_area_asig = $id_area
                       LIMIT 1 ";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateFin($data){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus       = ?,
                              avance           = ?,
                              concluido        = ?,
                              observaciones    = ?
                        WHERE id_reporte       = ? ";

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


    public function updateAvance1($dataavance){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET avance     = ?
                        WHERE id_reporte = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($dataavance);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function insertDirDtl($datadtl){
        $correcto = 1;
        $exec = $this->conn->conexion();
        
        try{
            $insert_dir_dtl = "INSERT INTO tbl_reporte_dtl(id_reporte,
                                                           id_direccion_asig,
                                                           id_remty,
                                                           id_usuario_captura,
                                                           id_estatus,
                                                           fecha_captura)
                                                    VALUES(?,
                                                           ?,
                                                           ?,
                                                           ?,
                                                           ?,
                                                           NOW())";
            $result = $this->conn->prepare($insert_dir_dtl);
            $exec->beginTransaction();
            $result->execute( $datadtl );

        
            if($correcto == 1){
                $correcto = $exec->lastInsertId();
                $this->setId_reporte_dtl($correcto);
            }
            $exec->commit();
            return $correcto;
        }catch(\PDOException $e){
            $exec->rollBack();
            return "Error! : ".$e->getMessage();
        }
    }


    public function getRegDoctosRpt( $id_reporte ){
        
        try{

            $query = "SELECT do.id_documento, 
                             do.route, 
                             do.ext, 
                             do.original_name, 
                             DATE_FORMAT(do.fecha_captura, '%d/%m/%Y %h %p') as fecha_captura,
                             CONCAT_WS(' ', u.nombre, u.apepa, u.apema) as usuario_captura
                        FROM tbl_reporte_documento as do
                        LEFT JOIN ws_usuario as u on u.id_usuario = do.id_usuario_captura
                       WHERE id_reporte = $id_reporte
                         AND id_historia_reporte = 0";
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){

            return "Error! : ".$e->getMessage();

        }
    }

    public function getRegDoctosHist( $id_reporte, $id_historia ){
        
        try{

            $query = "SELECT do.id_documento, 
                             do.route, 
                             do.ext, 
                             do.original_name, 
                             DATE_FORMAT(do.fecha_captura, '%d/%m/%Y %h %r') as fecha_captura,
                             CONCAT_WS(' ', u.nombre, u.apepa, u.apema) as usuario_captura
                        FROM tbl_reporte_documento as do
                        LEFT JOIN ws_usuario as u on u.id_usuario = do.id_usuario_captura
                       WHERE id_reporte = $id_reporte
                         AND id_historia_reporte = $id_historia";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;

        }catch(\PDOException $e){

            return "Error! : ".$e->getMessage();

        }
    }

    public function insertDocumento( $dataDocto )
    {
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


    public function updateAreaEstatus($dataArea){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_area_asig       = ?,
                              estatus_rechazado  = ?
                        WHERE id_reporte_dtl     = ? ";
            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($dataArea);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }

    public function getArrayUser(){
        $arrayu = array();
        try{
            $query = "SELECT id_usuario,
                             CONCAT_WS(' ', nombre, apepa, apema) as nombre
                        FROM ws_usuario
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayu[$row->id_usuario] = $row->nombre;
                }
            }
            // die($query);
            return $arrayu;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayColonia(){
        $arryac = array();
        try{
            $query = "SELECT id_comunidad, 
                             colonia
                        FROM cat_comunidad";
                    // die($query);
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


    public function getArrayEstatus(){
        $arraye = array();
        try{
            $query = "SELECT id_estatus, 
                             estatus, 
                             class, 
                             finaliza
                        FROM cat_estatus
                       WHERE activo = 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraye[] = $row;
                }
            }
            return $arraye;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getArrayOrigin(){
        $arrayor = array();
        try{
            $query = "SELECT id_origen, origen, abreviatura
                        FROM cat_origen
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                      $arrayor[$row->id_origen] = $row->origen;
                }
            }
            return $arrayor;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayRemtys( $aplicativo ){
        $arrayr = array();
        $condition = "";

        if($aplicativo > 2){
            $condition = " AND r.id_direccion IN (SELECT a.id_direccion 
                                                    FROM cat_aplicativo_direccion as a
                                                   WHERE a.id_aplicativo = $aplicativo )";
        }

        try{
            $query = "SELECT id_remtys, nombre
                        FROM cat_remtys as r
                       WHERE activo = 1
                       $condition ";
                    //    die($query);
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


    public function getarrayPeticiones( $apl ){
        $array     = array();
        $condition = "";

        if($apl > 2){
            $condition .= " AND r.id_direccion IN (SELECT a.id_direccion
                                                     FROM cat_aplicativo_direccion as a
                                                    WHERE a.id_aplicativo = $apl)";
        }

        try{
            $query = "SELECT id_peticion,
                             nombre
                        FROM cat_peticiones
                       WHERE activo = 1
                       $condition";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_peticion] = $row->nombre;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


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


    public function getArrayTipoCiudadano(){
        $arraytc = array();
        try{
            $query = "SELECT id_tipo_ciudadano, tipo_ciudadano
                        FROM cat_tipo_ciudadano
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraytc[$row->id_tipo_ciudadano] = $row->tipo_ciudadano;
                }
            }
            return $arraytc;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayNotificadores(){
        $arrayn = array();
        try{
            $query = "SELECT id_notificador,
                             CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno) as nombre_notificador
                        FROM cat_notificadores
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayn[$row->id_notificador] = $row->nombre_notificador;
                }
            }
            return $arrayn;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    
    public function getNotificadorById( $id_notificador ){
        $name_notificador = "";

        try{
            $query = "SELECT CONCAT_WS(' ', nombre, apellido_paterno, apellido_materno ) as nombre_notificador 
                        FROM cat_notificadores
                       WHERE id_notificador = $id_notificador ";
                // die($query);

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $name_notificador = $row->nombre_notificador;
            }
            return $name_notificador;
        }catch(\Exception $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayDataExtra(){
        $arrayd = array();
        try{
            $query = "SELECT id_data_extra,
                             descripcion
                        FROM cat_data_extra
                       WHERE activo = 1";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arrayn[$row->id_data_extra] = $row->descripcion;
                }
            }
            return $arrayn;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function  getReporteByCiudadano( $idc ){
        try{
            $query = "SELECT r.id_reporte, r.id_estatus,  r.id_origen, r.descripcion,
                             r.avance,
                             o.abreviatura,
                             DATE_FORMAT(r.fecha_captura, '%d/%m/%Y') as fecha_captura
                        FROM tbl_reporte as r
                   LEFT JOIN cat_origen as o on r.id_origen = o.id_origen
                       WHERE r.activo = 1
                         AND o.activo = 1
                         AND id_cuidadano_solicita = $idc ";
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function historialDtlById( $idrm ){
        try{
            $query = "SELECT id_remty
                        FROM tbl_reporte_dtl 
                       WHERE id_reporte = $idrm 
                       GROUP BY id_remty ";
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getArrayDepedenciaE(){
        $arrayd = array();
        try{
            $query = "SELECT id_dependencia_ext, descripcion_dependencia
                        FROM cat_dependencia_externa ";
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


    public function getAvanceAnt($idrep){
        $avance_port = 0;
        try{
            $query = "SELECT avg(avance) as avance
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $idrep
                         AND estatus_rechazado = 0
                         AND id_estatus <> 4
                         AND observador = 0
                         AND eliminado = 0";
                        //  die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $avance_port = is_null($row->avance) ? 0 : $row->avance;
            }
            return $avance_port;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getDireccionesDtl($id_reporte, $aplicativo = null, $id_rol = null){
        $condition = "";
        $cndt      = "";

        if($aplicativo == 3){
            $condition .= " AND id_direccion_asig != 29 AND id_direccion_asig != 52";
        }

        if($id_rol > 1){
            $cndt = " AND eliminado = 0";
        } 

        try{
            $query = "SELECT id_reporte_dtl, 
                             id_direccion_asig,
                             id_area_asig,
                             visitas,
                             avance,
                             id_estatus,
                             id_remty,
                             id_peticion,
                             estatus_rechazado,
                             observador,
                             no_oficio,
                             observaciones,
                             original,
                             eliminado
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte 
                        $cndt
                        $condition
                       ORDER BY observador ASC";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    
    public function getDireccionesDtlF($id_reporte, $aplicativo = null){
        $condition = "";

        if($aplicativo == 3){
            $condition .= " AND id_direccion_asig != 29 AND id_direccion_asig != 52";
        }

        try{
            $query = "SELECT id_reporte_dtl, 
                             id_direccion_asig,
                             id_area_asig,
                             visitas,
                             avance,
                             id_estatus,
                             id_remty,
                             estatus_rechazado,
                             observador
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte 
                        $condition
                       ORDER BY observador ASC";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function getInfoComplementosInfo( $id_reporte ){
        try{
            $query = "SELECT CONCAT_WS('/', folio, anio) as folio_aplicativo,
                             folio_externo,
                             anexos,
                             nombre,
                             cargo,
                             procedencia,
                             observaciones_extra
                        FROM tbl_reporte_complemento
                       WHERE id_reporte = $id_reporte";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateView($data_view){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET visitas        = ?
                        WHERE id_reporte_dtl = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_view);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }


    public function updateFinaliza($data_fin){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus = ?
                        WHERE id_reporte = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_fin);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }


    public function getAreasDtl($id_reporte){
        $array_ar = array();
        try{
            $query = "SELECT id_direccion_asig, id_area_asig, estatus_rechazado
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array_ar[$row->id_direccion_asig] = $row->id_area_asig;
                }
            }
            return $array_ar;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function viewDireccion($id_reporte){
        $id_direccion = array();
        try{
            $query = "SELECT id_direccion_asig
                        FROM tbl_reporte_dtl 
                       WHERE id_reporte = $id_reporte
                         AND estatus_rechazado = 0";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($rowd = $result->fetch(PDO::FETCH_OBJ)){
                      array_push($id_direccion,$rowd->id_direccion_asig);
                }
            }
            return $id_direccion;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function viewByPresidencia($reporte){
        $notificacion = "";
        try{
            $query = "SELECT notificacion_presidencia
                        FROM tbl_reporte
                       WHERE id_reporte = $reporte ";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $notificacion = $row->notificacion_presidencia;
            }
            return $notificacion;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
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

    public function getDirAreaByRemtyT($remty, $parametro){
        $param = "";
        $where = "";
        
        if($parametro == 1){
            $param = "id_remtys";
            $where = " AND id_remtys = $remty";
        } else if($parametro == 2){
            $param = "id_peticion";
            $where = " AND id_peticion = $parametro";
        }
        try{
            $query = "SELECT id_direccion, 
                             id_area,
                             $param
                        FROM cat_remtys
                       WHERE 1 = 1
                       $where
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }




    public function get_direccion_visitas($id_reporte, $direccion){
        try{
            $query = "SELECT id_direccion_asig, 
                             estatus_rechazado
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte 
                         AND id_direccion_asig = $direccion";
                         
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateRechazadoDir( $data_update ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_estatus        = ?,
                              avance            = ?,
                              estatus_rechazado = ?
                        WHERE id_reporte = ? 
                          AND id_direccion_asig = ?";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_update);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }


    public function getEstatusMaster($id_reporte){
        $estatus_m = "";
        try{
            $query = "SELECT id_estatus
                        FROM tbl_reporte
                       WHERE id_reporte = $id_reporte ";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $estatus_m = $row->id_estatus;
            }
            return $estatus_m;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function getIDDTL($id_reporte){
        try{
            $query = "SELECT id_reporte, id_area_asig, estatus_rechazado, id_estatus
                        FROM tbl_reporte_dtl
                       WHERE id_reporte_dtl = $id_reporte 
                         AND eliminado = 0
                       LIMIT 1";
                    // echo $query;
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function showHAsignados($id_historia_reporte){
        try{
            $query = "SELECT id_dir_reasignada, 
                             id_area_reasignada
                        FROM tbl_h_asignados
                       WHERE id_historia = $id_historia_reporte ";
                    // echo $query;

            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
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


    public function insertRemty( $data_remty, $parametro ){
        $exec     = $this->conn->conexion();
        $correcto = 1;
        $param    = "";

        if($parametro == 1){
            $param = "id_remty";
        } else if($parametro == 2){
            $param = "id_peticion";
        }

        try {
            $queryMP = "INSERT INTO tbl_reporte_dtl(id_reporte,
                                                    id_direccion_asig,
                                                    id_area_asig,
                                                    $param,
                                                    id_estatus,
                                                    id_usuario_captura,
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

            $result->execute( $data_remty );

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

    public function get_remty_reporte($id_reporte){
        $id_remty = "";
        try{
            $query = "SELECT id_remty
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_reporte 
                         AND id_remty IS NOT NULL";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $id_remty = $row->id_remty;
            }
            return $id_remty;

        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function updateAreaByDir( $data ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_direccion_asig = ?,
                              id_area_asig      = ?,
                              id_estatus        = ?
                        WHERE id_reporte_dtl    = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }


    public function insertDtlObs( $data_obs ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_reporte_dtl(id_reporte,
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

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute( $data_obs );

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


    public function updateFechaEstatus( $id_master ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET fecha_estatus  = NOW()
                        WHERE id_reporte     = $id_master ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute();
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }


    public function validateAplicativo( $id_aplicativo ){
        $dependencias = "";
        try{
            $query = "SELECT id_aplicativo,
                             limite_dependencias
                        FROM cat_aplicativo 
                       WHERE id_aplicativo = $id_aplicativo";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $dependencias = $row->limite_dependencias;
            }
            return $dependencias;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getRemtById($remtyid){
        $tramiteB = "";
        try{
            $query = "SELECT id_remtys, nombre
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



    public function deleteCopys( $detalle ){
        $correcto   = 2;
        
        $delete = "DELETE FROM tbl_reporte_dtl 
                         WHERE id_reporte_dtl = $detalle ";        
        $result = $this->conn->prepare($delete);
        $result->execute();
        return $correcto;
    }


    public function deleteComplemento( $detalle ){
        $correcto   = 2;
        
        $delete = "DELETE FROM tbl_reporte_complemento WHERE id_reporte_dtl = $detalle ";        
        $result = $this->conn->prepare($delete);
        $result->execute();
        return $correcto;
    }



    public function updateReturnChanges ( $data_returns ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_estatus     = ?,
                              avance         = ?
                        WHERE id_reporte_dtl = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_returns);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }


    public function updateReturnChangesMaster ( $data_returns_master ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET id_estatus     = ?,
                              fecha_estatus  = NOW(),
                              observaciones  = ?,
                              avance         = ?
                        WHERE id_reporte     = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_returns_master);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }



    public function getInfoComplements( $id ){
        try{
            $query = "SELECT descripcion
                        FROM tbl_reporte
                       WHERE id_reporte = $id 
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getInfoComplementsR( $id ){
        try{
            $query = "SELECT id_reporte_dtl,
                             id_aplicativo,
                             CONCAT_WS('/', folio, anio) as folio_aplicativo,
                             folio_externo
                        FROM tbl_reporte_complemento
                       WHERE id_reporte_dtl = $id 
                       LIMIT 1";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function checkOpenReport( $master ){
        $reabierto = "";
        try{
            $query = "SELECT reabierto
                        FROM tbl_reporte
                       WHERE id_reporte = $master";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $reabierto = $row->reabierto;
            }
        return $reabierto;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function update_master_open( $data ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte
                          SET reabierto      = ?
                        WHERE id_reporte     = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto; 
    }



    public function getInfoComplementsExtra( $dt ){
        try{
            $query = "SELECT id_folio,
                             id_reporte,
                             id_aplicativo,
                             folio,
                             anio,
                             folio_externo,
                             anexos,
                             nombre,
                             cargo,
                             procedencia,
                             observaciones_extra
                        FROM tbl_reporte_complemento
                       WHERE id_reporte_dtl = $dt ";
                // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertComplementsReport( $data_master ){
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

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute( $data_master );

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

    public  function updateComplementos( $data_dtl ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_complemento
                          SET folio               = ?,   
                              anio                = ?,   
                              folio_externo       = ?,               
                              anexos              = ?,       
                              nombre              = ?,       
                              cargo               = ?,   
                              procedencia         = ?,           
                              observaciones_extra = ?
                        WHERE id_reporte_dtl      = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_dtl);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function updateInfoDtl( $data_dtl ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET nombre_cargo_procedencia = ?
                        WHERE id_reporte = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_dtl);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto;
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
    


    public function checkNotification( $id_reporte, $id_detalle = null ){
        $condition = "";
        if($id_detalle != "" || $id_detalle != null){
            $condition = " AND id_reporte_dtl = $id_detalle";
        }
        try{
            $query = "SELECT COUNT(id_notificacion) as total,
                             id_notificacion
                        FROM tbl_notificacion_dtl 
                       WHERE id_reporte = $id_reporte 
                       $condition";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }

    }


    public function getInfoMaster( $id_master ){
        try{
            $query = "SELECT id_cuidadano_solicita,
                             id_colonia,
                             id_calle,
                             id_origen,
                             numero_exterior,
                             numero_interior,
                             cp
                        FROM tbl_reporte
                       WHERE id_reporte = $id_master";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }

    }


    public function infoNotificacion( $notificacion ){
        try{
            $query = "SELECT n.id_notificacion,
                             n.id_ciudadano,
                             n.id_dependencia,
                             n.id_area,
                             n.id_notificador,
                             n.id_data_extra,
                             DATE_FORMAT(fecha_notificacion, '%d/%m/%Y') as fecha_notificacion,
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
                             d.id_origen
                        FROM tbl_notificacion as n
                   LEFT JOIN tbl_notificacion_dtl as d on n.id_notificacion = d.id_notificacion
                       WHERE n.id_notificacion = $notificacion ";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function getInfoDtl( $id_dtl ){
        try{
            $query = "SELECT id_direccion_asig,
                             id_area_asig
                        FROM tbl_reporte_dtl 
                       WHERE id_reporte_dtl = $id_dtl ";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function getIdMaster( $id_dtl ){
        $master = "";
        try{
            $query = "SELECT id_reporte
                        FROM tbl_reporte_dtl 
                       WHERE id_reporte_dtl = $id_dtl ";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $master = $row->id_reporte;
            }
            return $master;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function insertNotifications( $data_not ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_notificacion(id_ciudadano,
                                                     id_dependencia,
                                                     id_area,
                                                     id_notificador,
                                                     id_usuario_captura,
                                                     id_data_extra,
                                                     fecha_captura,
                                                     fecha_notificacion,
                                                     id_colonia,
                                                     id_calle,
                                                     num_exterior,
                                                     num_interior,
                                                     cp,
                                                     domicilio_externo,
                                                     no_oficio,
                                                     observaciones,
                                                     dir_area_notifica,
                                                     remitente,
                                                     cargo)
                                             VALUES (?,
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
                                                     ?,
                                                     ?,
                                                     ?,
                                                     ?,
                                                     ?,
                                                     ?)";

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute( $data_not );

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


    public function insertNotificationDtl ( $data_dtl ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $queryMP = "INSERT INTO tbl_notificacion_dtl(id_notificacion,
                                                         id_reporte,
                                                         id_reporte_dtl,
                                                         id_origen,
                                                         id_usuario_captura,
                                                         fecha_captura)
                                                 VALUES (?,
                                                         ?,
                                                         ?,
                                                         ?,
                                                         ?,
                                                         NOW())";

            $result = $this->conn->prepare($queryMP);
            $exec->beginTransaction();

            $result->execute( $data_dtl );

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


    public function update_notificacion( $datA_not ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_notificacion
                          SET id_ciudadano         = ?,           
                              id_dependencia       = ?,               
                              id_area              = ?,       
                              id_notificador       = ?,               
                              id_data_extra        = ?,           
                              id_usuario_modifica  = ?,                   
                              fecha_modificacion   = ?,                   
                              fecha_notificacion   = ?,                   
                              id_colonia           = ?,           
                              id_calle             = ?,       
                              num_exterior         = ?,           
                              num_interior         = ?,           
                              cp                   = ?,   
                              domicilio_externo    = ?,               
                              no_oficio            = ?,       
                              observaciones        = ?,           
                              dir_area_notifica    = ?,               
                              remitente            = ?,       
                              cargo                = ?
                        WHERE id_notificacion      = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($datA_not);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto;
    }
   


    public function  infoNotificacionById( $notificacion ){
        try{
            $query = "SELECT n.id_notificacion,
                             n.id_ciudadano,
                             id_dependencia,
                             id_area,
                             id_notificador,
                             id_data_extra,
                             DATE_FORMAT(fecha_notificacion, '%d/%m/%Y') as fecha_notificacion,
                             n.id_colonia,
                             n.id_calle,
                             n.num_exterior,
                             n.num_interior,
                             n.cp,
                             domicilio_externo,
                             no_oficio, 
                             n.observaciones,
                             dir_area_notifica,
                             remitente,
                             n.cargo,
                             CONCAT_WS(' ', c.nombre, c.apepat, c.apemat) as nombre_ciudadano,
                             c.descripcion,
                             n.cancelado
                        FROM tbl_notificacion as n 
                   LEFT JOIN cat_ciudadano as c on c.id_ciudadano = n.id_ciudadano 
                       WHERE n.id_notificacion = $notificacion ";
                        // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getCalles( $id_calle, $prefijo = null ){
        $calle = "";
        $join_cdt  = "";
        $query     = "";

        if($prefijo != ""){
            $join_cdt  = "LEFT JOIN cat_tipo_vialidad as t on c.id_tipo_vialidad = t.id_tipo_vialidad";
            $query     = "CONCAT_WS(' ', t.descripcion, calle) as calle ";
        }else{
            $query  = "calle";
        }
        try{
            $query = "SELECT $query
                        FROM cat_calles as c
                        $join_cdt
                       WHERE id_calle = $id_calle ";
                        // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $calle = $row->calle;
            }
            return $calle;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getAllInfoCiudadanoById( $id_ciudadano ){
        try{
            $query = "SELECT id_colonia,
                             id_calle,
                             numero_exterior,
                             numero_interior,
                             cp,
                             c.sectorint,
                             c.id_tipo_asentamiento
                        FROM cat_ciudadano as i
                   LEFT JOIN cat_comunidad as c on c.id_comunidad = i.id_colonia
                       WHERE id_ciudadano = $id_ciudadano";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! :".$e->getMessage();
        }
    }


    public function getVialidadByCalle( $id_calle ){
        $vialidad = "";
        try{
            $query = "SELECT t.descripcion
                        FROM cat_calles as c
                   LEFT JOIN cat_tipo_vialidad as t on c.id_tipo_vialidad = t.id_tipo_vialidad
                       WHERE c.id_calle = $id_calle 
                         AND c.activo = 1";
                        // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $vialidad = $row->descripcion;
            }
            return $vialidad;
        }catch(\PDOException $e){
            return "Error! :".$e->getMessage();
        }
    }


    public function getAllDtl( $not ){
        try{
            $query = "SELECT id_reporte,
                             id_reporte_dtl,
                             id_caso,
                             id_caso_dtl,
                             campo_caso_externo,
                             id_origen
                        FROM tbl_notificacion_dtl
                       WHERE id_notificacion = $not ";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function deleteHistory( $data_delete ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_reporte_historia
                          SET activo              = ?
                        WHERE id_reporte_historia = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_delete);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto;
    }



    public function getNotById( $id_not ){
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
                      WHERE n.id_notificacion = $id_not";
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


    public function insertCopyHistory( $data_copy_h ){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $insert = "INSERT INTO tbl_rpt_copia_historia(id_rpt,
                                                          id_rpt_dtl,
                                                          id_rpt_historia,
                                                          no_oficio,
                                                          observaciones)
                                                   VALUES(?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?)";

            $result = $this->conn->prepare($insert);
            $exec->beginTransaction();

            $result->execute( $data_copy_h );

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


    public function getInfoCopyById( $idm ){
        try{
            $query = "SELECT id_rpt_copia_historia,
                             no_oficio,
                             observaciones
                        FROM tbl_rpt_copia_historia
                       WHERE id_rpt_historia = $idm";
                die($query);
                
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateCopyDtl( $data_u ){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE tbl_rpt_copia_historia
                          SET id_rpt_historia       = ?
                        WHERE id_rpt_copia_historia = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_u);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto =  "Error! : ".$e->getMessage();
        }
        return $correcto;
    }


    public function getDtlByMaster( $id_mst ){

        $dtl = array();

        try{
            $query = "SELECT id_reporte_dtl,
                             avance
                        FROM tbl_reporte_dtl
                       WHERE id_reporte = $id_mst 
                       LIMIT 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $dtl[] = $row;
            }
            
            return $dtl;
        }catch(\Exception $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function closeOut(){
        $this->conn = null;
    }

}
?>