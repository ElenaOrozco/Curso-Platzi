<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Observaciones extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('datos_model');
        $this->load->model('usuarios_model');
        $this->load->library('ferfunc');
        //$this->load->helper('form');
    }
    
    public function index(){
         $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
         
        
        
        $this->load->model('observaciones_model');
        $this->load->model('control_usuarios_model');
        $this->load->model('datos_model');
         
         
        $data['usuario'] = $this->session->userdata('nombre');
        
        //echo 'Direccion resp ' . $this->session->set_userdata('idDireccion_responsable') . $this->session->set_userdata('integracion');
        //exit();
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        //echo $this->session->userdata('idDireccion_responsable');
        //exit();
        $this->load->model('documentos_model');
        $data['aDocumento'] = $this->documentos_model->addw_documento();
        
        $data['qHistorial_respuestas']=$this->observaciones_model->listado_observaciones_por_direccion_responsable($this->session->userdata('idDireccion_responsable'));
        $data['qHistorial_por_responder']=$this->observaciones_model->listado_observaciones_por_direccion_responsable_por_responder($this->session->userdata('idDireccion_responsable'));
        
        //$data['direccion']=$this->session->userdata('idDireccion_responsable');
        $preregistro=$this->session->userdata('preregistro');
        
        
        if($preregistro==1){
            $this->load->view('v_pant_observaciones.php', $data);
        } else{
            $this->load->view('v_pant_principal.php', $data);
        }
         
        
    }
    
    
    public function observaciones_documentos(){
         $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
         
        
        
        $this->load->model('observaciones_model');
        $this->load->model('control_usuarios_model');
        $this->load->model('datos_model');
        $this->load->model('direcciones_model');
         
         
        $data['usuario'] = $this->session->userdata('nombre');
        
        //echo 'Direccion resp ' . $this->session->set_userdata('idDireccion_responsable') . $this->session->set_userdata('integracion');
        //exit();
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        //echo $this->session->userdata('idDireccion_responsable');
        //exit();
        $this->load->model('documentos_model');
        $data['aDocumento'] = $this->documentos_model->addw_documento();
        
        //$data['qHistorial']=$this->observaciones_model->total_listado_observaciones_documentos();
        $data['aUsuarios']=$this->control_usuarios_model->addw_Usuarios();
        $data['qHistorial']=$this->observaciones_model->listado_observaciones_documento_totales();
        $data['qEnlaces'] = $this->observaciones_model->listado_observaciones_documento_enlaces_totales();
        $data['qEnlacesVistos'] = $this->observaciones_model->listado_observaciones_documento_enlaces_vistos_totales();
        $data['qCid'] = $this->observaciones_model->listado_observaciones_documento_cid_totales();
         
        $data['aDirecciones']=$this->direcciones_model->addw_catDireccion();
        
        
        //$data['direccion']=$this->session->userdata('idDireccion_responsable');
        
        
        $preregistro=$this->session->userdata('preregistro');
        
        
        if($preregistro==0){
            $this->load->view('v_pant_observaciones_documentos.php', $data);
        } else{
            $this->load->view('v_pant_principal.php', $data);
        }
         
    }
    
    public function observaciones_archivos(){
         $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
         
        
        
        $this->load->model('observaciones_model');
        $this->load->model('control_usuarios_model');
        $this->load->model('datos_model');
        
        
                
         
        $data['usuario'] = $this->session->userdata('nombre');
        
        //echo 'Direccion resp ' . $this->session->set_userdata('idDireccion_responsable') . $this->session->set_userdata('integracion');
        //exit();
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        //echo $this->session->userdata('idDireccion_responsable');
        //exit();
         
        $data['qHistorial']=$this->observaciones_model->total_listado_observaciones_archivo();
        
        
        //$data['direccion']=$this->session->userdata('idDireccion_responsable');
        ///$this->load->view('v_pant_observaciones_archivos.php', $data);
        
        $preregistro=$this->session->userdata('preregistro');
        
        
        if($preregistro==0){
            $this->load->view('v_pant_observaciones_archivos.php', $data);
        } else{
            $this->load->view('v_pant_principal.php', $data);
        }
         
         
    }


    public function actualizar_estado_observacion(){
         $this->load->model('observaciones_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Respuesta'=> strtoupper($this->input->post('Respuesta')),
            'FechaVisto'=>  date('Y,m,d H:i:s'),
        );

        $retorno =  $this->observaciones_model->datos_observacion_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('observaciones/'.$retorno['error']));
        else
            header('Location:'.site_url('observaciones/')); 
    }
    
    
    public function responder_observacion_documento(){
         $this->load->model('observaciones_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         /*echo 'id '. $this->input->post('idCatalogo_observacion');
         echo 'Resp '. $this->input->post('Respuesta');
         exit();*/
         $id = $this->input->post('id');
         $data=array(
            'Respuesta'=> $this->input->post('Respuesta'),
            'FechaVisto'=>  date('Y,m,d H:i:s'),
            'leido'=>  1,
        );

        $retorno =  $this->observaciones_model->datos_observacion_documento_update($data, $id);
        if($retorno['retorno']<0){
            echo 'OK';
            return TRUE;
        }
        else{
            echo 'FALSE';
            return FALSE;
        }
    }
    
    public function marcar_visto_observacion_documento(){
         $this->load->model('observaciones_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         /*echo 'id '. $this->input->post('idCatalogo_observacion');
         echo 'Resp '. $this->input->post('Respuesta');
         exit();*/
         $id = $this->input->post('id');
         $data=array(
            
            'leido'=>  1,
        );

        $retorno =  $this->observaciones_model->datos_observacion_documento_update($data, $id);
        if($retorno['retorno']<0){
            echo 'OK';
            return TRUE;
        }
        else{
            echo 'FALSE';
            return FALSE;
        }
    }
    
    
        public function actualizar_leido_observacion_documento($id){
         $this->load->model('observaciones_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         
         $data=array(
            'leido'=> $this->input->post('leido'),
            
        );

        $retorno =  $this->observaciones_model->datos_observacion_documento_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('observaciones/'.$retorno['error']));
        else
            header('Location:'.site_url('observaciones/')); 
    }
    
    public function actualizar_estado_observacion_documento(){
         $this->load->model('observaciones_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Respuesta'=> strtoupper($this->input->post('Respuesta')),
            'FechaVisto'=>  date('Y,m,d H:i:s'),
        );

        $retorno =  $this->observaciones_model->datos_observacion_documento_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('observaciones/'.$retorno['error']));
        else
            header('Location:'.site_url('observaciones/')); 
    }
    
    public function actualizar_visto($id){
         $this->load->model('observaciones_model');
         
         
         
         $data=array(
            
            'FechaVisto'=>  date('Y,m,d H:i:s'),
        );

        $retorno = $this->observaciones_model->datos_observacion_update($data, $id);
       
         if($retorno['retorno']<0)
            header('Location:'.site_url('observaciones/'.$retorno['error']));
        else
            header('Location:'.site_url('observaciones/')); 
    }
    
    
    public function datos_observacion($id) {
        $this->load->model('observaciones_model');
        
        $query = $this->observaciones_model->datos_observacion($id);
        echo json_encode($query->row_array());
    }
    
    public function datos_observacion_documento_por_id($id) {
        $this->load->model('observaciones_model');
        
        $query = $this->observaciones_model->datos_observacion_documento_por_id($id);
        echo json_encode($query->row_array());
    }
    
    
    public function datos_observacion_estimacion_por_id($id) {
        $this->load->model('observaciones_estimacion_model');
        
        $query = $this->observaciones_estimacion_model->datos_observacion_estimacion_por_id($id);
        echo json_encode($query->row_array());
    }


        public function datos_observacion_documento($id) {
        $this->load->model('observaciones_model');
        
        $query = $this->observaciones_model->datos_observacion_documento($id);
        echo json_encode($query->row_array());
    }
    
   
    
}
