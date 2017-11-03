<?php


class ubicacion_proyectos extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Ubicacion proyectos","P")==false){
            header("Location:" . site_url('principal'));
        }
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, siga, archivo, concentracion, gestion, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
        
        $data['usuario'] = $this->session->userdata('nombre');
        
        
        $this->load->model('ubicacion_proyectos_model');
        $data['qListado']=$this->ubicacion_proyectos_model->listado_ubicacion();
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        
        $this->load->view('v_pant_ubicacion_proyectos', $data);
    }
    
    
    public function agregar_ubicacion() {
        $this->load->model('ubicacion_proyectos_model');
         
         
        $data=array(
            'no_isla'=> $this->input->post('Isla'),
            'columna'=> strtoupper($this->input->post('Columna')),
            'fila'=> $this->input->post('Fila'),
            
        );
         
        $retorno = $this->ubicacion_proyectos_model->insert_ubicacion($data);
        //printf($retorno);

        if($retorno['retorno'] < 0){
            header('Location:'.site_url('ubicacion_proyectos/index/' . $retorno['error']));
        }
        else{
            header('Location:'.site_url('ubicacion_proyectos')); 
        }
    }
    
    
    public function datos_ubicacion($id) {
        $this->load->model('ubicacion_proyectos_model');
        $query = $this->ubicacion_proyectos_model->datos_ubicacion($id);
        echo json_encode($query->row_array());
    }
    
    public function modificar_ubicacion() {
        $this->load->model('ubicacion_proyectos_model');
         
         
         
        $id = $this->input->post('idCatalogo');
        $data=array(
            'no_isla'      =>  $this->input->post('Isla_mod'),
            'columna'   =>  strtoupper($this->input->post('Columna_mod')),
            'fila'      =>  $this->input->post('Fila_mod'),
            
        );    

        $retorno =  $this->ubicacion_proyectos_model->datos_ubicacion_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('ubicacion_proyectos/index/'.$retorno['error']));
        else
            header('Location:'.site_url('ubicacion_proyectos')); 
    }
    
    
    public function eliminar_ubicacion($id) {
        $this->load->model('ubicacion_proyectos_model');
        $data=array(
            'eliminacion_logica' => 1
        );
        $this->ubicacion_proyectos_model->datos_ubicacion_update($data, $id);
       
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('ubicacion_proyectos/index/' . $retorno['error']));
        else
            header('Location:'.site_url('ubicacion_proyectos')); 

    }

   
  
    
    
    
}
