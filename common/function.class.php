<?php
/**
 * * Funciones generales
 */
class cFunction
{
    function __construct()
    {

    }
    //Orden de la fecha para insertar
    public function formatear_fecha_ins($fecha){   
                   // Y/m/d
        $explote = explode ('/',$fecha);                       //división de la fecha utilizando el separador /
        $fecha   = $explote [2].'-'.$explote [1].'-'.$explote [0];   //alteramos el orden de la variable

        return $fecha;
    }

    //Formato de hora para inserar (unicamente cuando se manda en AM y PM)
    public function formatear_hora_ins($hora){

        $hora_formato = strtotime($hora);
        $hora_formato = date("H:i", $hora_formato);

        return $hora_formato;
    }

    public function obtenerFechaEnLetra($fecha){
        $dia  = $this->conocerDiaSemanaFecha($fecha);
        $num  = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes  = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes  = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$num.' de '.$mes.' del '.$anno;
    }

    public function conocerDiaSemanaFecha($fecha) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $dia  = $dias[date('w', strtotime($fecha))];
        return $dia;
    }

    public function get_sub_string($string, $length=NULL)
    {
        //Primero eliminamos las etiquetas html y luego cortamos el string
        $stringDisplay = substr(strip_tags($string), 0, $length);
        //Si el texto es mayor que la longitud se agrega puntos suspensivos
        if (strlen(strip_tags($string)) > $length)
            $stringDisplay .= '';
            
        return trim($stringDisplay);
    }

    public function trans_null($valor){
        if($valor != ""){
            $valor = "'".$valor."'";
        }else{
            $valor = "NULL";
        }
        return $valor;
    }

    function comprimir_string_html($buffer) {
        $busca = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
        $reemplaza = array('>','<','\\1');
        return preg_replace($busca, $reemplaza, $buffer);
    }

    function fn_paginacion($pagina, $numeroTotalPaginas, $raiz, $ruta_paginado, $busqueda){
        $paginado = "<div class='col-md-12'>";
        if ($pagina > 1 && $numeroTotalPaginas > 1) { // Mostrar si no es la primera pagina
            $paginado.= "<a href='" . $raiz . $ruta_paginado."&pag=1$busqueda'  title='Primera página' class='btn ink-reaction btn-floating-action btn-sm btn-primary' style='float:left;'>
            <i class='fa fa-angle-double-left'></i>

                         </a>";
        }   // Mostrar si no es la primera pagina
        if ($pagina > 1) {
            $paginado.= "<a href='" . $raiz . $ruta_paginado."&pag=" . ($pagina - 1) . "$busqueda' title='Regresar a página anterior' class='btn ink-reaction btn-floating-action btn-sm btn-primary' style='float:left;'>
                        <i class='fa fa-angle-left'></i>
                     </a>";
        }
        if ($numeroTotalPaginas > 1) {
            $paginado.= "<div style='float:left;'>
                        <select  
                            name='pager' id='_pager_generic_' 
                            class='form-control '  
                            onchange='chagePage(\"".$ruta_paginado."\");'>";
            for ($i = 1; $i <= $numeroTotalPaginas; $i++) {
                if ($i == $pagina) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $paginado.= "<option $selected> $i </option> ";
            }
            $paginado.= "</select></div>";
            if ($pagina == $numeroTotalPaginas) {
                $paginado.= "";
            } else {
                $paginado.= "<a href='" . $raiz . $ruta_paginado."&pag=" . ($pagina + 1) . "$busqueda' title='Siguiente página' class='btn ink-reaction btn-floating-action btn-sm btn-primary'>
                            <i class='fa fa-angle-right'></i>
                         </a>";
                $paginado.= "<a href='" . $raiz . $ruta_paginado."&pag=" . $numeroTotalPaginas . "$busqueda'' title='Última página' class='btn ink-reaction btn-floating-action btn-sm btn-primary'>
                            <i class='fa fa-angle-double-right'></i>
                         </a>";
            }
        }
        $paginado.= "</div><div class='col-md-12'><span class='pull-right'>Página ".$pagina." de ".$numeroTotalPaginas."</span></div>";

        return $paginado;
    }

    /**
     * Crea un thumbail de un imagen con el ancho y el alto pasados como parametros,
     * recortando en caso de ser necesario la dimension mas grande por ambos lados.
     *
     * @param type $nombreImagen Nombre completo de la imagen incluida la ruta y la extension.
     * @param type $nombreThumbnail Nombre completo para el thumbnail incluida la ruta y la extension.
     * @param type $nuevoAncho Ancho para el thumbnail.
     * @param type $nuevoAlto Alto para el thumbnail.
     */
    function crearThumbnailRecortado($nombreImagen, $nombreThumbnail, $nuevoAncho, $nuevoAlto){

        // Obtiene las dimensiones de la imagen.
        list($ancho, $alto) = getimagesize($nombreImagen);

        // Si la division del ancho de la imagen entre el ancho del thumbnail es mayor
        // que el alto de la imagen entre el alto del thumbnail entoces igulamos el
        // alto de la imagen  con el alto del thumbnail y calculamos cual deberia ser
        // el ancho para la imagen (Seria mayor que el ancho del thumbnail).
        // Si la relacion entre los altos fuese mayor entonces el altoImagen seria
        // mayor que el alto del thumbnail.
        if ($ancho/$nuevoAncho > $alto/$nuevoAlto){
            $altoImagen = $nuevoAlto;
            $factorReduccion = $alto / $nuevoAlto;
            $anchoImagen = $ancho / $factorReduccion;
        }
        else{
            $anchoImagen = $nuevoAncho;
            $factorReduccion = $ancho / $nuevoAncho;
            $altoImagen = $alto / $factorReduccion;
        }

        // Abre la imagen original.
        list($imagen, $tipo)= $this->abrirImagen($nombreImagen);

        // Crea la nueva imagen (el thumbnail).
        $thumbnail = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        // Si la relacion entre los anchos es mayor que la relacion entre los altos
        // entonces el ancho de la imagen que se esta creando sera mayor que el del
        // thumbnail porlo que se centrara para que se corte por la derecha y por la
        // izquierda. Si el alto fuese mayor lo mismo se cortaria la imagen por arriba
        // y por abajo.
        if ($ancho/$nuevoAncho > $alto/$nuevoAlto){
            imagecopyresampled($thumbnail , $imagen, ($nuevoAncho-$anchoImagen)/2, 0, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto);
        }  else {
            imagecopyresampled($thumbnail , $imagen, 0, ($nuevoAlto-$altoImagen)/2, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto);
        }

        // Guarda la imagen.
        $this->guardarImagen($thumbnail, $nombreThumbnail, $tipo);
    }

    function custom_alert($type, $main_msg, $message, $cerrar, $icon){
        /**
         * Mensajes para cuando se desea mostrar respuesta
         *
         * @param {string} type     que alerta que se mostrará (warning, success, danger, info, success
         * @param {string} message  mensaje que se mostrará en la alerta
         * @param {int}    cerrar   Si tendrá boton de cerrar o no, (1 si, 0 no)
         * @param {int}    icon     Si se mostrará un ícono de alerta (1 si 0 no)
         *
         * by Fhohs!
         **/

        $alert      = "";
        $icon_show  = "";
        $alert_show = "";

        if($type == ""){
            $type = "success";
        }
        if($icon == 1){
            if($type == "warning"){
                $icon_show  = " <span class='fa fa-exclamation-triangle'></span>";
            }
            if($type == "danger"){
                $icon_show  = " <span class='fa fa-times'></span>";
            }
            if($type == "info"){
                $icon_show  = " <span class='fa fa-info-circle'></span>";
            }
            if($type == "success"){
                $icon_show  = " <span class='fa fa-check-circle'></span>";
            }
            $alert_show = " alert-dismissable";
        }else{
            $icon_show  = "";
            $alert_show = " alert-dismissable";
        }

        $alert = "<div class='alert alert-".$type." ".$alert_show."' role='alert'>";
        $alert.= $icon_show;
        if($cerrar == 1){
            $alert.= "<button type='button' class='close' data-dismiss='alert'>";
            $alert.= "<span aria-hidden='true'>&times;</span><span class='sr-only'>Cerrar</span>";
            $alert.= "</button>";
        }
        $alert.= "<b> ".$main_msg." </b> ".$message;
        $alert.= "</div>";

        return $alert;
    }

    /**
     * Abre la imagen con el nombre pasado como parametro y devuelve un array con la imagen y el tipo de imagen.
     *
     * @param type $nombre Nombre completo de la imagen incluida la ruta y la extension.
     * @return Devuelve la imagen abierta.
     */
    function abrirImagen($nombre){
        $info = getimagesize($nombre);
        switch ($info["mime"]){
            case "image/jpeg":
                $imagen = imagecreatefromjpeg($nombre);
                break;
            case "image/gif":
                $imagen = imagecreatefromgif($nombre);
                break;
            case "image/png":
                $imagen = imagecreatefrompng($nombre);
                break;
            default :
                echo "Error: No es un tipo de imagen permitido.";
        }
        $resultado[0]= $imagen;
        $resultado[1]= $info["mime"];
        return $resultado;
    }

    /**
     * Guarda la imagen con el nombre pasado como parametro.
     *
     * @param type $imagen La imagen que se quiere guardar
     * @param type $nombre Nombre completo de la imagen incluida la ruta y la extension.
     * @param type $tipo Formato en el que se guardara la imagen.
     */
    function guardarImagen($imagen, $nombre, $tipo){

        switch ($tipo){
            case "image/jpeg":
                imagejpeg($imagen, $nombre, 70); // El 100 es la calidade de la imagen (entre 1 y 100. Con 100 sin compresion ni perdida de calidad.).
                break;
            case "image/gif":
                imagegif($imagen, $nombre);
                break;
            case "image/png":
                imagepng($imagen, $nombre, 6); // El 9 es grado de compresion de la imagen (entre 0 y 9. Con 9 maxima compresion pero igual calidad.).
                break;
            default :
                echo "Error: Tipo de imagen no permitido.";
        }
    }


    function direccion_api($id_direccion, $type, $period){
        if($id_direccion >=  0){
            try{
                $done = 0;
                $direccion = array();
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://192.1.1.37/adminSTI/rest/dependencias/direccion.php',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_SSL_VERIFYHOST => '0',
                    CURLOPT_SSL_VERIFYPEER => '0',
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>array("id_direccion" => $id_direccion,
                                               "type"         => $type,
                                               "periodo"      => $period )

                )); 

                $response = curl_exec($curl);
                $err      = curl_error($curl);
                $inf      = curl_getinfo($curl);

                curl_close($curl);

                if($err){
                    $resp = "Error al realizar la consulta:" .$err;
                }else{
                    $data = json_decode($response);
                    if(!is_null($data)){
                        if($data->done == 1){
                            if($type == 0){
                                if(is_array($data->direccion)){
                                    for ($i=0; $i < count($data->direccion); $i++) { 
                                        $id_dir = $data->direccion[$i]->id;
                                        $direcc = $data->direccion[$i]->nombre;
    
                                        $direccion[$id_dir] = $direcc;
                                   }
                                }
                            }else{
                                $direccion = $data->direccion;
                            }
                        }
                    }else{
                        $resp  = "Dirección no encontrada ".$response;
                    }
                }

                return $direccion;

            }catch(\PDOException  $e){
                $resp = "Error ".$e->getMessage();
            }
        }
    }

    function area_api($id_direccion, $id_area, $type, $period){

        if($id_direccion <> 0 && $id_area <> 0){

            try{
                $done = 0;
                $area = "";
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => apis_dir.'dependencias/area.php',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_SSL_VERIFYHOST => '0',
                    CURLOPT_SSL_VERIFYPEER => '0',
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>array("id_direccion" => $id_direccion,
                                               "id_area"      => $id_area,
                                               "type"         => $type,
                                               "periodo"      => $period)

                )); 

                $response = curl_exec($curl);
                $err      = curl_error($curl);
                $inf      = curl_getinfo($curl);

                curl_close($curl);

                if($err){
                    $resp = "Error al realizar la consulta:" .$err;
                }else{
                    $data = json_decode($response);
                    if(!is_null($data)){
                        if($data->done == 1){
                            if($data->id_area == $id_area){
                                $done  = 1;
                                $area = $data->area;
                            }else{
                                $area = '';
                            }
                        }

                    }else{
                        $resp  = "Área no encontrada ".$response;
                    }
                }

                return $area;

            }catch(\PDOException  $e){
                $resp = "Error ".$e->getMessage();
            }
        }
    }



    //api para directorio
    function directorio_api_dir ( $id_direccion, $type, $period){

        try{

            $done = 0;
            $direccion = array();
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => apis_dir.'dependencias/direcciones_op.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => '0',
                CURLOPT_SSL_VERIFYPEER => '0',
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>array("id_direccion" => $id_direccion,
                                           "type"         => $type,
                                           "periodo"      => $period)

            )); 


            $response = curl_exec($curl);
            $err      = curl_error($curl);
            $inf      = curl_getinfo($curl);

            curl_close($curl);

            if($err){

                $resp = "Error al realizar la consulta:" .$err;

            }else{

                $data = json_decode($response);
                if(!is_null($data)){
                    if($data->done == 1){
                            $direccion = $data->direccion;
                    }
                }else{
                    $resp  = "Dirección no encontrada ".$response;
                }
            }

            return $direccion;

        }catch(\PDOException $e){
            $resp = "Error ".$e->getMessage();
        }

    }


     //api para directorio
     function areas_api_op ( $id_direccion, $id_area, $type ){

        try{

            $done = 0;
            $area = array();
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => apis_dir.'dependencias/areas_op.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => '0',
                CURLOPT_SSL_VERIFYPEER => '0',
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>array("id_direccion" => $id_direccion,
                                           "id_area"      => $id_area,
                                           "type"         => $type,
                                           "periodo"      => 1 )

            )); 


            $response = curl_exec($curl);
            $err      = curl_error($curl);
            $inf      = curl_getinfo($curl);

            curl_close($curl);

            if($err){

                $resp = "Error al realizar la consulta:" .$err;

            }else{

                $data = json_decode($response);
                if(!is_null($data)){
                    if($data->done == 1){
                            $area = $data->area;
                    }
                }else{
                    $resp  = "Área no encontrada ".$response;
                }
            }

            return $area;

        }catch(\PDOException $e){
            $resp = "Error ".$e->getMessage();
        }

    }

   


    public function addKeyAndValue(&$array, $key, $value)
    {
        $array[$key] = $value;
    }


    
    //APIS
    function getToken( $headers ){
        
        if( !isset($headers["HTTP_AUTHORIZATION"])){
            return false;
        }
        
        $auth = $headers["HTTP_AUTHORIZATION"][0];
        //$headers = apache_request_headers();
            
        if($auth != ""){
            $arrayAuthHead  = explode(" ", $auth);
    
            return $arrayAuthHead[1];
        }
        
        return "";
    
    }

}
?>
