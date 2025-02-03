<?php
//Incluyendo la conexión a la base de datos
require_once $dir_fc."connections/conn_data.php";
require_once $dir_fc."connections/php_config.php";

class cRemtys extends BD
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
    private $id_usr;
    private $id_clasificacion;
    private $create_date;
    private $id_direccion;
    private $codigo;
    private $nombre;    

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
     * Get the value of id_usr
     */ 
    public function getId_usr()
    {
        return $this->id_usr;
    }

    /**
     * Set the value of id_usr
     *
     * @return  self
     */ 
    public function setId_usr($id_usr)
    {
        $this->id_usr = $id_usr;

        return $this;
    }

    /**
     * Get the value of id_clasificacion
     */ 
    public function getId_clasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * Set the value of id_clasificacion
     *
     * @return  self
     */ 
    public function setId_clasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;

        return $this;
    }

    /**
     * Get the value of create_date
     */ 
    public function getCreate_date()
    {
        return $this->create_date;
    }

    /**
     * Set the value of create_date
     *
     * @return  self
     */ 
    public function setCreate_date($create_date)
    {
        $this->create_date = $create_date;

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
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

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

    private $arraySearch;

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



    public function getAllReg( $rol_usr ) {
        $milimite  = "";
        $condition = "";

        if ($this->getLimite() == 1) {
            $milimite = " LIMIT " . $this->getInicio() . ", " . $this->getFin();
        }

        if($rol_usr > 2){
            $condition .= " AND DATE_FORMAT(fecha_captura, '%Y') >= '2022' ";
        }

        if ($this->getFiltro() != "") {
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["id_dir"]) && $array_f["id_dir"] != ""){
                $condition .= " AND id_direccion = ".$array_f["id_dir"]." ";
            }

            if(isset($array_f["id_are"]) && $array_f["id_are"] != ""){
                $condition .= " AND id_area = ".$array_f["id_are"]." ";
            }

            if(isset($array_f["nomb"]) && $array_f["nomb"] != ""){
                $condition .= " AND nombre LIKE '%".$array_f["nomb"]."%' ";
            }

            if(isset($array_f["id_re"]) && $array_f["id_re"] != ""){
                $condition .= " AND id_remtys = ".$array_f["id_re"]." ";
            }

            if(isset($array_f["fecha"]) && $array_f["fecha"] != ""){
                $condition .= " AND CAST(fecha_captura AS DATE) = '".$array_f["fecha"]."' ";
            }
        }

        $query = "  SELECT id_remtys, 
                           id_clasificacion, 
                           fecha_captura, 
                           id_direccion,
                           id_area, 
                           codigo, 
                           nombre, 
                           descripcion, 
                           activo
                      FROM cat_remtys 
                     WHERE 1 = 1 $condition
                    ORDER BY id_remtys DESC" . $milimite;
                    // die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }



    public function getRptExcel() {
        $condition = "";

        if($this->getFiltro() != ""){
            
            $array_f = $this->getArraySearch();

            if(isset($array_f["id_dir"]) && $array_f["id_dir"] != ""){
                $condition .= " AND id_direccion = ".$array_f["id_dir"]." ";
            }

            if(isset($array_f["id_are"]) && $array_f["id_are"] != ""){
                $condition .= " AND id_area = ".$array_f["id_are"]." ";
            }

            if(isset($array_f["nomb"]) && $array_f["nomb"] != ""){
                $condition .= " AND nombre LIKE '%".$array_f["nomb"]."%' ";
            }

            if(isset($array_f["id_re"]) && $array_f["id_re"] != ""){
                $condition .= " AND id_remtys = ".$array_f["id_re"]." ";
            }

            if(isset($array_f["fecha"]) && $array_f["fecha"] != ""){
                $condition .= " AND CAST(fecha_captura AS DATE) = '".$array_f["fecha"]."' ";
            }
        }
        

        $query = "  SELECT id_remtys, 
                           id_usuario_captura,
                           id_clasificacion, 
                           id_direccion,
                           id_area, 
                           es_tramite,
                           DATE_FORMAT(fecha_captura, '%d/%m/%Y') as fecha_captura, 
                           codigo, 
                           nombre, 
                           descripcion, 
                           tiempo_atencion,
                           notas_tiempo,
                           activo
                      FROM cat_remtys 
                     WHERE 1 = 1 $condition";
                // die($query);
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;       
    }



    public function getUsrCap( $id_usr ){

        $usuario = "";

        try{

            $query = "SELECT id_usuario,
                             CONCAT_WS(' ', nombre, apepa, apema) as nombre_usuario
                        FROM ws_usuario
                       WHERE id_usuario = $id_usr
                       LIMIT 1";
            
            $result = $this->conn->prepare($query);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_OBJ);
                $usuario = $row->nombre_usuario;
            }

            return $usuario; 
        }catch(\PDOException $e){
            return "Error! : ".$e->getMessage();
        }
    }

    public function getRegbyid(){
        $query = "  SELECT id_remtys, 
                           id_usuario_captura, 
                           id_clasificacion, 
                           fecha_captura, 
                           id_direccion, 
                           codigo, 
                           nombre, 
                           descripcion, 
                           extencion, 
                           target, 
                           contador, 
                           activo, 
                           id_area,
                           es_tramite,
                           tiempo_atencion
                      FROM cat_remtys 
                     WHERE id_remtys = ".$this->getId() ." 
                     LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function insertReg( $data ){

        $exec = $this->conn->conexion();
        $correcto   = 1;

        $insert = " INSERT INTO cat_remtys(id_usuario_captura,   
                                           id_clasificacion,                                 
                                           id_direccion,
                                           id_area,
                                           es_tramite,
                                           fecha_captura,
                                           codigo,
                                           nombre,
                                           descripcion,
                                           target,
                                           contador,
                                           tiempo_atencion)
                                    VALUES (?,
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

    public function updateRegByExt( $data_doc ){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_remtys 
                       SET extencion = ?
                     WHERE id_remtys = ? ";

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute( $data_doc);
        $exec->commit();
        
        return $correcto;
    }

    public function updateStatus($tipo){
        $correcto   = 1;
        $exec       = $this->conn->conexion();

        $update = " UPDATE cat_remtys SET activo = $tipo
                     WHERE id_remtys = ".$this->getId();

        $result = $this->conn->prepare($update);
        $exec->beginTransaction();
        $result->execute();
        $exec->commit();
        
        return $correcto;
    }

    public function deleteReg(){
        $correcto   = 2;
        $delete     = "DELETE FROM cat_remtys WHERE id_remtys = ".$this->getId();

        $result = $this->conn->prepare($delete);
        $result->execute();

        return $correcto;
      
    }

    public function deleteDoc(){
        $correcto   = 2;
        $update     = " UPDATE cat_remtys 
                           SET extencion = null
                        WHERE id_remtys = ".$this->getId();
        // echo $update;
        $result = $this->conn->prepare($update);
        $result->execute();

        return $correcto;
      
    }

    public function updateReg( $data ){
        $correcto   = 1;        
        $update = " UPDATE cat_remtys 
                       SET  id_usuario_modifica = ?,
                            id_direccion        = ?,
                            id_area             = ?,
                            es_tramite          = ?,
                            fecha_modificacion  = NOW(),
                            codigo              = ?,
                            nombre              = ?,
                            descripcion         = ?,
                            tiempo_atencion     = ?
                      WHERE id_remtys           = ?";
                    //  echo $update;
        $result = $this->conn->prepare($update);
        $result->execute( $data );
        return $correcto;

    }


    public function getCheckInfoByR( $id_remty ){
        try{
            $query = "SELECT id_direccion,
                             id_area
                        FROM cat_remtys
                       WHERE id_remtys = $id_remty 
                       LIMIT 1";
                    // die($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result;
        }catch(\PDOException $e){
            return "Error: ".$e->getMessage();
        }
    }


    public function updateRemtyDtl( $data_update ){
        $correcto   = 1;        
        $exec       = $this->conn->conexion();
        
        try{
            $update = "UPDATE tbl_reporte_dtl
                          SET id_direccion_asig = ?,
                              id_area_asig      = ?
                        WHERE id_remty          = ? ";

            $result = $this->conn->prepare($update);
            $exec->beginTransaction();
            $result->execute($data_update);
            $exec->commit();
        }catch(\PDOException $e){
            $exec->rollBack();
            $correcto = "Error! : ".$e->getMessage();
        }
        return $correcto;
    }



    public function getRemtysBySearch($search)
    {
        $where = null;
        if($search != null)
        {
            $where = " AND (codigo LIKE '%$search%'
                  OR nombre LIKE '%$search%')";
        }
        $query = "SELECT id_remtys,
                         codigo,
                         nombre
                  FROM cat_remtys
                  WHERE 1 = 1 $where
                 ";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }




    public function duplicateRemtys( $remty ){
        $total = "";
        try{
            $query = "SELECT COUNT(id_remtys) as total
                        FROM cat_remtys
                       WHERE nombre = '$remty' ";
                // die($query);
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




    public function closeOut(){
        $this->conn = null;
    }



}