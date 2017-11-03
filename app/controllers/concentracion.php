<?php


class Concentracion extends MY_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('concentracion_model');
    }

    public function index($error='') {
        
        //$this->load->model('concentracion_model');
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Concentracion","P")==false){
            header("Location:" . site_url('principal'));
        }
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'siga, archivo, concentracion, documentos, historico, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
       
        $data['usuario'] = $this->session->userdata('nombre');
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        //$data['qListado']=$this->seccion_model->listado_seccion();      
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        $data['listado'] = $this->concentracion_model->listado_ubicaciones();
        //$this->load->view('v_pant_principal', $data);
        $this->load->view('v_pant_concentracion', $data);
        
    }
    
    public function ot_json() {
        $term = $this->input->post("term");
        $id = $this->input->post("id");
        $this->load->model('concentracion_model');
       
        $aOT = $this->concentracion_model->ot_json($term,$id);
        
        //print_r($aRemitente);
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($aOT, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function detalles_archivo (){
        $this->load->model('concentracion_model');
        
        $id = $this->input->post("ot");
       
        $aArchivo = $this->concentracion_model->detalles_archivo ($id);
        $aFechaIngreso = $this->concentracion_model->fecha_ingreso ($id);
        
        
       
         
         if (isset($aFechaIngreso['fecha_ingreso'])){
            $data=array(
                'fecha_ingreso'=> date( 'Y-m-d', strtotime( $aFechaIngreso['fecha_ingreso'] ) ),
                'fecha_cierre'=> $aArchivo['FechaExtincionDerechos'],
                'identificador'=> $aArchivo['identificado'],
            ); 
        }
        else {
            $data=array(
               
                'fecha_cierre'=> $aArchivo['FechaExtincionDerechos'],
                'identificador'=> $aArchivo['identificado'],
            ); 
        }
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function cambiar_identificador (){
        $this->load->model('concentracion_model');
        
        $id = $this->input->post("idArchivo");
       
        $data['identificado'] = $this->input->post("identificador");
        $retorno  = $this->concentracion_model->cambiar_identificador ($id, $data);
        
        echo json_encode($retorno, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function  datos_relacion_ubicacion($id){
        $query  = $this->concentracion_model->datos_relacion_ubicacion($id);
        echo json_encode($query->row_array());
    }

    

    public function cambiar_cierre(){
        $this->load->model('concentracion_model');
        
        $id = $this->input->post("idArchivo");
       
        $data['FechaExtincionDerechos'] = $this->input->post("cierre_expediente");
        $retorno  = $this->concentracion_model->cambiar_identificador ($id, $data);
        
        echo json_encode($retorno, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function asignar_ubicacion() {
        
       
       
        $vacias = 0;
        $idArchivo = $this->input->post('orden_trabajo');
        $legajos = $this->input->post('legajos');
        
        
        $ingreso = $this->input->post('fecha_ingreso');
        
        $cajas = ceil($legajos/2);
        $ubicaciones_necesarias =  $cajas * 2;
       
       
        
        
        
        $data=array();
        
        // Ingresos de la misma OT 
        $ingresosOT = $this->concentracion_model->get_ingresosOT($idArchivo);
        //echo $ingresosOT->num_rows;
        $data["ingresosOT"] = $ingresosOT->num_rows();
       
        
        
        /*
        
        /*
             //trae ubicaciones 
            $idUbicaciones = $this->concentracion_model->get_idUbicaciones($ubicaciones_necesarias, 0 ); //Estatus = 0 las libres
        
        
            $data_ingreso = array (
                "data_cabecera"     => array(
                        "idArchivo"     => $idArchivo,
                        "fojas_utiles"  => $this->input->post('fojas_utiles'),
                        "legajos"       => $legajos,
                        "idUsuario"     => $this->session->userdata("id"),
                        "ingreso_cid"   => $this->input->post("fecha_ingreso"),
                        "fecha_alta"    => date("Y-m-d G:i:s"),
                    ),
                "legajos"           => $legajos,
                "idUbicaciones"     => $idUbicaciones,

            );


            ($idUbicaciones->num_rows >0)? $retorno = $this->concentracion_model->alta_concentracion($data_ingreso): $retorno = -1;

           */
          
        $data_ingreso = array (
            "data_cabecera"     => array(
                    "idArchivo"     => $idArchivo,
                    "fojas_utiles"  => $this->input->post('fojas_utiles'),
                    "legajos"       => $legajos,
                    "idUsuario"     => $this->session->userdata("id"),
                    "ingreso_cid"   => $this->input->post("fecha_ingreso"),
                    "fecha_alta"    => date("Y-m-d G:i:s"),
                ),
            "legajos"           => $legajos,
            "ubicaciones_necesarias" => $ubicaciones_necesarias,

        );

        $idIngreso = $this->concentracion_model->alta_concentracion($data_ingreso);

        //var_dump($idIngreso);
        //echo $idIngreso;
        
        $data["resultado"] = $idIngreso;
        if ($idIngreso != -1) {
            $data["tabla"] = $this->retornar_ubicaciones($idIngreso, $ingresosOT);
        } 
        $data["ejemplo"] = 'Ejemplo ';
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);   
        
        
        
        /*
        
        if ( $legajos == 1 ){
            //trae ubicaciones, busca primero si hay vacias
            $idUbicaciones = $this->buscar_vacias($idArchivo);
            $vacias = $idUbicaciones->num_rows();
            
            
        }
        
        //si el numero de legajos es mayor que uno o no hubo vacias (-1)
        if ( $legajos > 1 || $vacias == 0 ){
            //trae ubicaciones 
            $idUbicaciones = $this->concentracion_model->get_idUbicaciones($ubicaciones_necesarias, 0 ); //Estatus = 0 las libres
        }
        
        $data_ingreso = array (
            "data_cabecera"     => array(
                    "idArchivo"     => $idArchivo,
                    "fojas_utiles"  => $this->input->post('fojas_utiles'),
                    "legajos"       => $legajos,
                    "idUsuario"     => $this->session->userdata("id"),
                    "ingreso_cid"   => $this->input->post("fecha_ingreso"),
                    "fecha_alta"    => date("Y-m-d G:i:s"),
                ),
            "legajos"           => $legajos,
            "idUbicaciones"     => $idUbicaciones,
            
        );
        
         
        ($idUbicaciones->num_rows >0)? $retorno = $this->concentracion_model->alta_concentracion($data_ingreso): $retorno = -1;
        
        $data=array();
        
        $data["resultado"] = $retorno;
        if ($retorno == 1) {
            $data["tabla"] = $this->retornar_ubicaciones($idUbicaciones);
        } 
        
        
        $data["tabla"] = 'hola';
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);  
       */
       
    }
    
    
    
    public function retornar_ubicaciones($idIngreso, $ingresosOT){
        
        
        
        $tabla = '';
        
        
        
        $registros = $this->concentracion_model->traer_relaciones($idIngreso);
        
       
       
        $tabla .=    '<table id="example" class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Ubicación</th>
                                <th>Bloques</th>
                                <th>No Caja</th>
                                <th>Folio Inicial</th>
                                <th>Folio Final</th>
                                <th>No Hojas</th>
                            </tr>
                        </thead>

                        <tbody>';
        foreach ($registros->result() as $row){
            $tabla .=    '  <tr>
                                <td id="row-nombre" name="row-nombre"> 
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica-mod" onclick="uf_ver_ubicaciona_libre_mod()">
                                        <span class="glyphicon glyphicon-plus"></span> 
                                    </button>
                                </td>
                                <td><input type="text"  id="Bloques'. $row->id . '" name="Bloques'. $row->id . '" class="form-control" placeholder="Bloques" value="" required onchange="actualizar_bloques('. $row->id . ')" /></td>
                                <td><input type="text"  id="No_Caja'. $row->id . '" name="No_Caja'. $row->id . '" class="form-control" placeholder="No Caja" value="" required onchange="actualizar_cajas('. $row->id . ')"/></td>
                                <td><input type="text"  id="Folio_Inicial'. $row->id . '" name="Folio_Inicial'. $row->id . '" class="form-control" placeholder="Folio Inicial" value="" required onchange="actualizar_folio_inicial('. $row->id . ')"/></td>
                                <td><input type="text"  id="Folio_Final'. $row->id . '" name="Folio_Final'. $row->id . '" class="form-control" placeholder="Folio Final" value="" required onchange="actualizar_folio_final('. $row->id . ')"/></td>
                                <td><input type="text"  id="No_Hojas'. $row->id . '" name="No_Hojas'. $row->id . '" class="form-control" placeholder="No Hojas" value="" required onchange="actualizar_hojas('. $row->id . ')"/></td>

                            </tr>';
            
           /* $tabla .=    '  <tr>
                                <td id="row-nombre" name="row-nombre">'. $row->Nombre . '</td>
                                <td><input type="text"  id="Bloques'. $row->id . '" name="Bloques'. $row->id . '" class="form-control" placeholder="Bloques" value="" required onchange="actualizar_bloques('. $row->id . ')" /></td>
                                <td><input type="text"  id="No_Caja'. $row->id . '" name="No_Caja'. $row->id . '" class="form-control" placeholder="No Caja" value="" required onchange="actualizar_cajas('. $row->id . ')"/></td>
                                <td><input type="text"  id="Folio_Inicial'. $row->id . '" name="Folio_Inicial'. $row->id . '" class="form-control" placeholder="Folio Inicial" value="" required onchange="actualizar_folio_inicial('. $row->id . ')"/></td>
                                <td><input type="text"  id="Folio_Final'. $row->id . '" name="Folio_Final'. $row->id . '" class="form-control" placeholder="Folio Final" value="" required onchange="actualizar_folio_final('. $row->id . ')"/></td>
                                <td><input type="text"  id="No_Hojas'. $row->id . '" name="No_Hojas'. $row->id . '" class="form-control" placeholder="No Hojas" value="" required onchange="actualizar_hojas('. $row->id . ')"/></td>

                            </tr>';*/
            
        }
        if ($ingresosOT->num_rows() > 0){
            foreach ($ingresosOT->result() as $row){
                $tabla .=    '  <tr>
                                <td id="row-nombre" name="row-nombre"> 
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica-mod" onclick="uf_ver_ubicaciona_libre_mod()">
                                        <span class="glyphicon glyphicon-plus"></span> 
                                    </button>
                                    '. $row->Nombre . '
                                </td>
                                <td><input type="text"  id="Bloques'. $row->id . '" name="Bloques'. $row->id . '" class="form-control" placeholder="Bloques" value="'. $row->Bloques . '" required onchange="actualizar_bloques('. $row->id . ')" disabled /></td>
                                <td><input type="text"  id="No_Caja'. $row->id . '" name="No_Caja'. $row->id . '" class="form-control" placeholder="No Caja" value="'. $row->No_caja . '" required onchange="actualizar_cajas('. $row->id . ')" disabled /></td>
                                <td><input type="text"  id="Folio_Inicial'. $row->id . '" name="Folio_Inicial'. $row->id . '" class="form-control" placeholder="Folio Inicial" value="'. $row->Folio_Inicial. '" required onchange="actualizar_folio_inicial('. $row->id . ')" disabled /></td>
                                <td><input type="text"  id="Folio_Final'. $row->id . '" name="Folio_Final'. $row->id . '" class="form-control" placeholder="Folio Final" value="'. $row->Folio_Final . '" required onchange="actualizar_folio_final('. $row->id . ')" disabled /></td>
                                <td><input type="text"  id="No_Hojas'. $row->id . '" name="No_Hojas'. $row->id . '" class="form-control" placeholder="No Hojas" value="'. $row->No_Hojas . ' " required onchange="actualizar_hojas('. $row->id . ')" disabled /></td>

                            </tr>';
            }
        }
                                       
        $tabla .=      '</tbody>
                    </table>';
        
         return $tabla;
    
        
    }
    
    
    public function buscar_vacias($idArchivo){
        return $this->concentracion_model->buscar_vacias($idArchivo);
    }
    
    public function capturar_datos_archivo($data, $idArchivo){
        $this->load->model('concentracion_model');
        return $this->concentracion_model->capturar_datos_archivo($data, $idArchivo);
        
    }
    
    
    
    public function ubicar_ot($legajos, $idArchivo){
        
        $data = array(
           'Legajos' => $legajos,
           'idArchivo' => $idArchivo,
        );
        
        $errores = "";
        
        $ubicaciones = $this->concentracion_model->traer_ubicaciones($legajos);
        if ($ubicaciones->num_rows() == $legajos ) {
            
            foreach ($ubicaciones->result() as $rUbicacion) {
                if ($this->concentracion_model->update_ubicacion($rUbicacion->id, 1)) {
                     
                } else {
                    $errores ="Error: No se pudo ocupar ubicación";
                }
                
            }
        }
        
        $this->concentracion_model->ubicar_ot($legajos, $idArchivo);
        
    }

    

    public function actualizar_bloques($id) {
         
        $data=array(
            'Bloques'=> $this->input->post('Bloques'),  
        );
        echo  $this->concentracion_model->actualizar_relacion($id, $data);
        
       
    }
    
    public function actualizar_cajas($id) {
         
        $data=array(
            'No_caja'=> $this->input->post('cajas'),  
        );
        echo  $this->concentracion_model->actualizar_relacion($id, $data);
        
       
    }
    
    public function actualizar_folio_inicial($id) {
         
        $data=array(
            'Folio_Inicial'=> $this->input->post('Folio_Inicial'),  
        );
        echo  $this->concentracion_model->actualizar_relacion($id, $data);
        
       
    }
    
    public function actualizar_folio_final($id) {
         
        $data=array(
            'Folio_Final'=> $this->input->post('Folio_Final'),  
        );
        echo  $this->concentracion_model->actualizar_relacion($id, $data);
        
       
    }
    
     public function actualizar_hojas($id) {
         
        $data=array(
            'No_Hojas'=> $this->input->post('No_Hojas'),  
        );
        echo  $this->concentracion_model->actualizar_relacion($id, $data);
        
       
    }
    
    public function modificar_ubicacion(){
        
        $id = $this->input->post('id_mod'); 
        $data=array(
            'Bloques'       => $this->input->post('Bloques_mod'),
            'No_caja'       => $this->input->post('No_caja_mod'),
            'Folio_Inicial' => $this->input->post('Folio_Inicial_mod'),
            'Folio_Final'   => $this->input->post('Folio_Final_mod'),
            'No_Hojas'      => $this->input->post('No_Hojas_mod'),                      
        );
        echo  $this->concentracion_model->actualizar_relacion($id, $data);
    }

    

    public function eliminar_cat($id) {
         
        $this->load->model('seccion_model');
         
         
        $data=array(
            'Estatus'=> 0,
            
        );

        $retorno =  $this->seccion_model->datos_seccion_update($data, $id);
        if($retorno['retorno']<0){
            header('Location:'.site_url('seccion/index/'.$retorno['error']));
        }
        else{
            header('Location:'.site_url('seccion')); 
        }
    }
    
    
     public function datos_seccion($id) {
        $this->load->model('seccion_model');
        $query = $this->seccion_model->datos_seccion($id);
        echo json_encode($query->row_array());
    }
    
    public function  actualizar_tabla(){
        $listado = $this->concentracion_model->listado_ubicaciones();
        $tabla =    '
                        <table class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%"  id="t_concentracion_reg">

                            <thead>
                                <tr>
                                    <td>Acción</td>
                                    <td>Posición</td>
                                    <td>OT</td>
                                    <td>Identificador</td>
                                    <td>Bloque</td>
                                    <td>No de Caja</td>
                                    <td>Folio Inicial</td>
                                    <td>Folio Final</td>
                                    <td>No de Hojas</td>
                                  
                                </tr>
                            </thead>

                            <tbody>';

        if ( isset($listado) ){
            if ( $listado->num_rows() > 0 ){
                foreach ( $listado->result() as$rRow ){
                $tabla .=        '<tr>
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-modificar-ubicacion" onclick="uf_modificar_ubicacion('. $rRow->idR .')"><span class="glyphicon glyphicon-pencil"></span> </button>
                                        <a href="'.  site_url('impresion/v_etiqueta_concentracion') . '/'. $rRow->idR .'" class="btn btn-default btn-xs" target="_blank">
                                            <span class="glyphicon glyphicon-print"></span>
                                        </a>
                                    
                                    </td>
                                    <td>'. $rRow->Nombre        .'</td>
                                    <td>'. $rRow->OrdenTrabajo  .'</td>
                                    <td>'. $rRow->identificado  .'</td>
                                    <td>'. $rRow->Bloques       .'</td>
                                    <td>'. $rRow->No_caja       .'</td>
                                    <td>'. $rRow->Folio_Inicial .'</td>
                                    <td>'. $rRow->Folio_Final   .'</td>
                                    <td>'. $rRow->No_Hojas      .'</td>
                                   
                                </tr>';
                }
            }
        }

        $tabla .=        '   </tbody>
                        </table>
                    ';
                            
        $data=array();
        $data["tabla"]=$tabla;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);  
    }
    
    public function ver_ubicaciones_libres_mod(){
        $ubicaciones = $this->concentracion_model->traer_ubicaciones();
        $limite_i = 0;
        $limite_f = 17;
        $i= 0;
        
        $no_ubicaciones = 4;
        $tabla =    '<table class="table table-bordered table-condensed" id="t_ubicaciones">';
       
                   
        foreach ($ubicaciones->result() as $row) {
           //echo  $row->Nombre. 'No Ubicacion-' .$no_ubicaciones .'Vuelta -' . $j .'<br>';
            if ( $row->Estatus == 0){
                $color = "rgba(12, 86, 12, 0.25)";
            } else if ($row->Estatus == -1){
                $color = "rgba(255, 255, 0, 0.13)";
            }else {
                $color = "rgba(255, 0, 0, 0.21)";
            }
            
            //ubicaciones predefinidas
            if ($no_ubicaciones > 0){
                $color = "blue";
                $no_ubicaciones = $no_ubicaciones -1;
            }
            
            if ( $i == $limite_i)
            {
                $tabla .= '<tr>'; 
            }
           
            $tabla .=  '<td  style="background:' . $color . '" id="idUC'. $row->id .'">
                            <label>
                            <span>' . $row->Nombre . '</span>
                            </lable>
                            <input type="checkbox" name="idUC[]" id="idUChecked" class="ubicaciones" required value="'. $row->id .' " onchange="seleccionar_ubicacion(this, '. $row->id .')">    
                        </td>';
            $i++;
            
            if ( $i == $limite_f)
            {
                $tabla .= '</tr>'; 
                $i=0;
            }
            
            
            
            
            
        }


        
        
            
        $tabla .= '</table>';    
                
        
        
        
        $data=array();
        $data["tabla"] = $tabla;
        
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);  
    }
    
    
    
}