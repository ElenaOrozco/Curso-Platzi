<?php


class Concentracion extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        //$this->load->model('concentracion_model');
        $this->load->library('ferfunc');
        /*if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Modalidades","P")==false){
            header("Location:" . site_url('principal'));
        }*/
        
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
        
        
        $data=array(
            'fecha_ingreso'=> date( 'Y-m-d', strtotime( $aFechaIngreso['fecha_ingreso'] ) ),
            'fecha_cierre'=> $aArchivo['FechaExtincionDerechos'],
            'identificador'=> $aArchivo['identificado'],
        );        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function asignar_ubicacion() {
        $this->load->model('concentracion_model');
        
        $errores ="";
        
       
        $idArchivo = $this->input->post('idArchivo');
        $legajos = $this->input->post('legajos');
        $data_archivo =  array(
            'identificado' => $this->input->post('identificador'),
            'FechaExtincionDerechos' => $this->input->post('cierre_expediente'),
        ); 
        
         //Guardar datos propios de archivo
        $retorno = $this->capturar_datos_archivo($data_archivo, $idArchivo);
        
        if( $retorno == 1 ){
            //Verificar ubicaciones
        $ubicaciones =  $this->verificar_ubicaciones($legajos, $idArchivo);
        
        } else {
            $errores .= "Error al guardar datos del Archivo <br>";
        }
        
        
         
        $data = array(
            'Fojas_utiles' => $this->input->post('fojas_utiles'),
            'Legajos' => $this->input->post('legajos'),
            'Fojas_utiles' => $this->input->post('fojas_utiles'),
            'Legajos' => $this->input->post('legajos'),
            'Fojas_utiles' => $this->input->post('fojas_utiles'),
            'Legajos' => $this->input->post('legajos'),
            'Fojas_utiles' => $this->input->post('fojas_utiles'),
            'Legajos' => $this->input->post('legajos'),
            'Fojas_utiles' => $this->input->post('fojas_utiles'),
            'Legajos' => $this->input->post('legajos'),
            
        );
         
        $retorno = $this->concentracion_model->datos_concentracion_insert($data);
        echo $retorno['retorno'];

        
    }
    
    public function capturar_datos_archivo($data, $idArchivo){
        $this->load->model('concentracion_model');
        return $this->concentracion_model->capturar_datos_archivo($data, $idArchivo);
        
    }
    
    public function verificar_ubicaciones($legajos, $idArchivo){
        
        
        
        
    }

    

    public function modificar_cat() {
         $this->load->model('seccion_model');
         
         
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'Codigo'=> $this->input->post('Codigo_mod'),
        );

        $retorno =  $this->seccion_model->datos_seccion_update($data, $id);
        if($retorno['retorno']<0){
            header('Location:'.site_url('seccion/index/'.$retorno['error']));
        }
        else{
            header('Location:'.site_url('seccion')); 
        }
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
    
    
    
    
    
}