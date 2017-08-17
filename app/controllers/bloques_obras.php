<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bloques_obras extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('bloques_obras_model');
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
         
        
        
        
        $this->load->model('control_usuarios_model');
        $data['usuario'] = $this->session->userdata('nombre');
        
        //echo 'Direccion resp ' . $this->session->set_userdata('idDireccion_responsable') . $this->session->set_userdata('integracion');
        //exit();
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
       
        $data['qListado']=$this->bloques_obras_model->listado_bloques_obras();
        
        
        //$data['direccion']=$this->session->userdata('idDireccion_responsable');
        $this->load->view('v_pant_bloques_obras.php', $data);
         
        
    }
    
    public function agregar_cat() {
   
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            
        );
         
        $retorno = $this->bloques_obras_model->datos_bloque_insert($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('bloques_obras' . $retorno['error']));
        else
            header('Location:'.site_url('bloques_obras')); 
    }
    
    
    public function modificar_cat() {
        
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
           
        );

        $retorno =  $this->bloques_obras_model->datos_bloque_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('bloques_obras' .$retorno['error']));
        else
            header('Location:'.site_url('bloques_obras')); 
    }
    
    
    public function eliminar_cat($id) {
       
        $data=array(
            'Estatus'=> 0,
           
        );

        $retorno =  $this->bloques_obras_model->datos_bloque_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('bloques_obras' .$retorno['error']));
        else
            header('Location:'.site_url('bloques_obras')); 

    }
    
    
}