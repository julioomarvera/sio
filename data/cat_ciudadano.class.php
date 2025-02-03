<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cCuidadanos extends BD
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

    private $id;
    private $id_colonia_b;
    private $nombre_b;
    private $contacto_b;
    private $array_search;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


        /**
     * Get the value of id_colonia_b
     */ 
    public function getId_colonia_b()
    {
        return $this->id_colonia_b;
    }

    /**
     * Set the value of id_colonia_b
     *
     * @return  self
     */ 
    public function setId_colonia_b($id_colonia_b)
    {
        $this->id_colonia_b = $id_colonia_b;

        return $this;
    }

    /**
     * Get the value of nombre_b
     */ 
    public function getNombre_b()
    {
        return $this->nombre_b;
    }

    /**
     * Set the value of nombre_b
     *
     * @return  self
     */ 
    public function setNombre_b($nombre_b)
    {
        $this->nombre_b = $nombre_b;

        return $this;
    }

    /**
     * Get the value of contacto_b
     */ 
    public function getContacto_b()
    {
        return $this->contacto_b;
    }

    /**
     * Set the value of contacto_b
     *
     * @return  self
     */ 
    public function setContacto_b($contacto_b)
    {
        $this->contacto_b = $contacto_b;

        return $this;
    }


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


    
    public function getAllReg() {
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if ($this->getFiltro() != "") {
           
            $array_f = $this->getArray_search();

            if(isset($array_f["nom_b"]) && $array_f["nom_b"] != ""){
                $condition .= " AND CONCAT_WS(' ', nombre, apepat, apemat) LIKE '%".$array_f["nom_b"]."%' ";
            }

            if(isset($array_f["con_b"]) && $array_f["con_b"] != ""){
                $condition .= " AND id_tipo_contacto = ".$array_f["con_b"]." ";
            }

            if(isset($array_f["col_b"]) && $array_f["col_b"] != ""){
                $condition .= " AND id_colonia = ".$array_f["col_b"]." ";
            }

            if(isset($array_f["tel_b"]) && $array_f["tel_b"] != ""){
                $condition .= " AND (telefono_fijo = ".$array_f["tel_b"]." OR telefono_cel = ".$array_f["tel_b"].")";
            }

            if(isset($array_f["reg_b"]) && $array_f["reg_b"] != ""){
                $condition .= " AND id_ciudadano = ".$array_f["reg_b"]." ";
            }
        }

        $query = "  SELECT id_ciudadano,
                           id_colonia,
                           id_calle,
                           CONCAT_WS(' ', nombre, apepat, apemat) as nombre_c,
                           id_tipo_contacto,
                           numero_exterior,
                           numero_interior,
                           cp,
                           telefono_fijo,
                           telefono_cel,
                           email,
                           descripcion,
                           activo
                      FROM cat_ciudadano 
                     WHERE 1 = 1 $condition
                     ORDER BY id_ciudadano DESC" . $milimite;
                    //  die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }


    public function getRptExcel() {
        $condition = "";

        if ($this->getFiltro() != "") {

            $array_f = $this->getArray_search();

            if(isset($array_f["nom_b"]) && $array_f["nom_b"] != ""){
                $condition .= " AND CONCAT_WS(' ', nombre, apepat, apemat) LIKE '%".$array_f["nom_b"]."%' ";
            }

            if(isset($array_f["con_b"]) && $array_f["con_b"] != ""){
                $condition .= " AND id_tipo_contacto = ".$array_f["con_b"]." ";
            }

            if(isset($array_f["col_b"]) && $array_f["col_b"] != ""){
                $condition .= " AND id_colonia = ".$array_f["col_b"]." ";
            }

            if(isset($array_f["tel_b"]) && $array_f["tel_b"] != ""){
                $condition .= " AND (telefono_fijo = ".$array_f["tel_b"]." OR telefono_cel = ".$array_f["tel_b"].")";
            }

            if(isset($array_f["reg_b"]) && $array_f["reg_b"] != ""){
                $condition .= " AND id_ciudadano = ".$array_f["reg_b"]." ";
            }
        }

        $query = "  SELECT id_ciudadano,
                           id_colonia,
                           id_calle,
                           id_municipio,
                           id_tipo_contacto,
                           id_tipo_ciudadano,
                           CONCAT_WS(' ', nombre, apepat, apemat) as nombre_c,
                           descripcion,
                           numero_exterior,
                           numero_interior,
                           cp,
                           telefono_fijo,
                           telefono_cel,
                           email,
                           activo
                      FROM cat_ciudadano 
                     WHERE 1 = 1 $condition ";
                    //  die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }


    public function getArrayColonias(){
        $arraycol = array();
        try{
            $query = "SELECT id_comunidad, colonia
                        FROM cat_comunidad
                       WHERE activo = 1
                    ORDER BY colonia ASC";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraycol[$row->id_comunidad] = $row->colonia;
                }
            }
            return $arraycol;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayCiudadano(){
        $arraycon = array();
        try{
            $query = "SELECT id_tipo_ciudadano, tipo_ciudadano	
                        FROM cat_tipo_ciudadano
                       WHERE activo = 1";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraycon[$row->id_tipo_ciudadano] = $row->tipo_ciudadano;
                }
            }
            return $arraycon;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayContacto(){
        $arraycon = array();
        try{
            $query = "SELECT id_dependencia_ext, descripcion_dependencia	
                        FROM cat_dependencia_externa
                       WHERE activo = 1";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraycon[$row->id_dependencia_ext] = $row->descripcion_dependencia;
                }
            }
            return $arraycon;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function getArrayTCiudadano(){
        $array = array();

        try{
            $query = "SELECT id_tipo_ciudadano,
                             tipo_ciudadano
                        FROM cat_tipo_ciudadano
                       WHERE activo = 1";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $array[$row->id_tipo_ciudadano] = $row->tipo_ciudadano;
                }
            }
            return $array;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function getArrayCalles( $report = null){
        $arraycal  = array();
        $condition = "";

        if($report != ""){
            $condition .= " AND activo = 1";
        }

        try{
            $query = "SELECT id_calle, calle
                        FROM cat_calles 
                       WHERE 1 = 1 
                       $condition";
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount () > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraycal[$row->id_calle] = $row->calle;
                }
            }
            return $arraycal;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }



    public function callesById($colonia){
        try{
            $query = "SELECT id_calle, 
                             CONCAT_WS(' ', v.descripcion, calle) as calle,
                             m.codigo,
                             m.sectorint
                        FROM cat_calles as c
                   LEFT JOIN cat_comunidad as m on c.id_comunidad = m.id_comunidad
                   LEFT JOIN cat_tipo_vialidad as v on c.id_tipo_vialidad = v.id_tipo_vialidad
                       WHERE c.id_comunidad = $colonia";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }


    public function duplicateCitizens($nombre, $apellido_pat, $apellido_mat){
        $total = "";
        try{
            $query = "SELECT COUNT(*) as total
                        FROM cat_ciudadano
                       WHERE nombre = '$nombre'
                         AND apepat = '$apellido_pat'
                         AND apemat = '$apellido_mat' ";
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


    public function insertReg($data){
        $correcto= 1;
        $exec = $this->conn->conexion();
        try {
            $query_insert = "INSERT INTO cat_ciudadano(id_colonia,
                                                       id_calle,  
                                                       id_municipio,
                                                       id_usuario_captura,
                                                       id_tipo_contacto,
                                                       id_entre_calle,
                                                       id_entre_calle2,
                                                       id_tipo_ciudadano,
                                                       fecha_captura,
                                                       nombre,
                                                       apepat,
                                                       apemat,
                                                       descripcion,
                                                       numero_exterior,
                                                       numero_interior,
                                                       cp,
                                                       telefono_fijo,
                                                       telefono_cel,
                                                       referencias,
                                                       email,
                                                       cargo)
                                               VALUES (?,
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


    public function getRegById(){
        try{
            $query = "SELECT id_ciudadano, 
                             id_colonia,
                             id_calle, 
                             id_tipo_contacto,
                             id_entre_calle, 
                             id_entre_calle2,
                             id_tipo_ciudadano,
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
                             referencias, 
                             email,
                             o.sectorint
                        FROM cat_ciudadano as c
                   LEFT JOIN cat_comunidad as o on c.id_colonia = o.id_comunidad
                       WHERE id_ciudadano = ".$this->getId()." ";
                    //    die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function updateReg($data){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        try{
            $update = "UPDATE cat_ciudadano
                          SET id_colonia           = ?,
                              id_calle             = ?,          
                              id_usuario_modifica  = ?,                      
                              id_tipo_contacto     = ?,                  
                              id_entre_calle       = ?,                  
                              id_entre_calle2      = ?, 
                              id_tipo_ciudadano    = ?,                 
                              fecha_modificacion   = NOW(),                      
                              nombre               = ?,          
                              apepat               = ?,          
                              apemat               = ?,  
                              descripcion          = ?,              
                              numero_exterior      = ?,                  
                              numero_interior      = ?,                  
                              cp                   = ?,      
                              telefono_fijo        = ?,              
                              telefono_cel         = ?,              
                              referencias          = ?,              
                              email                = ?,
                              cargo                = ?
                        WHERE id_ciudadano         = ? ";

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

    public function updateStatus( $tipo){
        $correcto = 1;
        $exec     = $this->conn->conexion();

        try{
            $update = "UPDATE cat_ciudadano
                          SET activo        = $tipo
                        WHERE id_ciudadano  = ".$this->getId()." ";
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


    public function deleteReg(){
        $correcto = 2;
        try{
            $delete = "DELETE FROM cat_ciudadano
                             WHERE id_ciudadano = ".$this->getId()." ";
                            //  die($dele)
            $result = $this->conn->prepare($delete);
            $result->execute();

            return $correcto;
        }catch(\PDOException $e){
            return "Error!: ". $e->getMessage();
        }
    }


    public function getArrayEstatus(){
        $arraye = array();
        try{
            $query = "SELECT id_estatus, 
                             estatus
                        FROM cat_estatus
                       WHERE activo = 1 ";

            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                while($row = $result->fetch(PDO::FETCH_OBJ)){
                    $arraye[] = $row;
                }
            }

            return $arraye;
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    
    public function getReporteByCiudadano ( $idc ){
        try{
            $query = "SELECT r.id_reporte, r.id_estatus,  r.id_origen, r.descripcion,
                             r.avance,
                             o.abreviatura
                        FROM tbl_reporte as r
                   LEFT JOIN cat_origen as o on r.id_origen = o.id_origen
                       WHERE o.activo = 1
                         AND id_cuidadano_solicita = $idc ";
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


    public function closeOut(){
        $this->conn = null;
    }




}