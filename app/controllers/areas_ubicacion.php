<?php


class Areas_ubicacion extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {

        $this->load->library('ferfunc');
        
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Documentos","P")==false){
            header("Location:" . site_url('principal'));
        }
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, memorias, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
        $data['usuario'] = $this->session->userdata('nombre');
        
        $this->load->model('areas_ubicacion_model');
        $data['qListado']=$this-> areas_ubicacion_model ->listado();
        
        
 
       
       
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
       
        
        $this->load->view('v_pant_areas_ubicacion', $data);
    }
    
    
    
    
    public function datos_areas($id){
        $this->load->model('areas_ubicacion_model');
        $query = $this->areas_ubicacion_model->datos_area($id);
        echo json_encode($query->row_array());
    }
    
    public function agregar_cat() {
        $this->load->model('areas_ubicacion_model');
       
        $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            'deFila'=> strtoupper($this->input->post('deFila')),
            'hastaFila'=> strtoupper( $this->input->post('hastaFila')),
            
        );
        $retorno=  $this->areas_ubicacion_model->datos_area_insert($data);
        if($retorno['retorno']<0)
            header('Location:'.site_url('areas_ubicacion/'.$retorno['error']));
        else
            header('Location:'.site_url('areas_ubicacion/'));  
    }
    
    
    public function modificar_cat() {
        $this->load->model('areas_ubicacion_model');
        $id=$this->input->post('idCatalogo');
         
        $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'deFila'=> strtoupper($this->input->post('deFila_mod')),
            'hastaFila'=> strtoupper( $this->input->post('hastaFila_mod')),
            
        );
        
        $retorno=  $this->areas_ubicacion_model->datos_area_update($data,$id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('areas_ubicacion/'.$retorno['error']));
        else
            header('Location:'.site_url('areas_ubicacion/')); 
    }
    
    public function eliminar_cat($id) {
        $this->load->model('areas_ubicacion_model');
          
        $retorno=  $this->areas_ubicacion_model->datos_area_delete($id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('areas_ubicacion/'.$retorno['error']));
        else
            header('Location:'.site_url('areas_ubicacion/')); 
    }
    

    

    
    
}
