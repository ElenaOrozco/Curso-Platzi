<?php


class Serie extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        $this->load->model('serie_model');
        $this->load->library('ferfunc');
        /*if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Modalidades","P")==false){
            header("Location:" . site_url('principal'));
        }*/
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'siga, archivo, documentos, historico, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        
        $data['error']=$error;
        $data['usuario'] = $this->session->userdata('nombre');
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        $data['qListado']=$this->serie_model->listado_serie();      
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        
        $this->load->view('v_pant_serie', $data);
        
    }
    
    public function agregar_cat() {
        $this->load->model('serie_model');
         
         
        $data = array(
            'Nombre' => strtoupper($this->input->post('Nombre')),
            'Codigo' => $this->input->post('Codigo'),
            
        );
         
        $retorno = $this->serie_model->datos_serie_insert($data);
        

        if($retorno['retorno'] < 0){
            header('Location:'.site_url('serie/index/' . $retorno['error']));
        }
        else {
            header('Location:'.site_url('serie')); 
        }
    }
    
    
    public function modificar_cat() {
         $this->load->model('serie_model');
         
         
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'Codigo'=> $this->input->post('Codigo_mod'),
        );

        $retorno =  $this->serie_model->datos_serie_update($data, $id);
        if($retorno['retorno']<0){
            header('Location:'.site_url('serie/index/'.$retorno['error']));
        }
        else{
            header('Location:'.site_url('serie')); 
        }
    }
    
    
    public function eliminar_cat($id) {
         
        $this->load->model('serie_model');
         
         
        $data=array(
            'Estatus'=> 0,
            
        );

        $retorno =  $this->serie_model->datos_serie_update($data, $id);
        if($retorno['retorno']<0){
            header('Location:'.site_url('serie/index/'.$retorno['error']));
        }
        else{
            header('Location:'.site_url('serie')); 
        }
    }
    
    
    public function datos_serie($id) {
        $this->load->model('serie_model');
        $query = $this->serie_model->datos_serie($id);
        echo json_encode($query->row_array());
    }
    
    
    
    
    
}