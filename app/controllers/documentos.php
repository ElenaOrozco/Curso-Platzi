<?php


class Documentos extends MY_Controller {

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
            array('name' => 'AUTHOR', 'content' => 'Luis Fernando Chavez Villalobos'),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Luis Alfredo Chavez Balvaneda'),
            array('name' => 'AUTHOR', 'content' => 'Gabriel Hans Gonzalez Peña'),
            array('name' => 'AUTHOR', 'content' => 'Virginia Leonila Ezquivel Garduño'),
            array('name' => 'AUTHOR', 'content' => 'Pedro Joaquin Ponce Garcia'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, memorias, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
        $data['usuario'] = $this->session->userdata('nombre');
        
        $this->load->model('documentos_model');
        $data['qListado']=$this->documentos_model->listado();
        
        
        $data['qSubTipoProceso']=$this->documentos_model->listado_subtipoproceso();
        $data['qDirecciones']=$this->documentos_model->listado_direcciones();
       
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
       
        
        $this->load->view('v_pant_documentos', $data);
    }

    

    public function  listado_documentos(){
         $this->load->model('documentos_model');
         $this->documentos_model->listado();
    }

    public function datos_documento($id) {
        $this->load->model('documentos_model');
        $query = $this->documentos_model->datos_documento($id);
        echo json_encode($query->row_array());
    }
    
  

    
    public function agregar_cat() {
         $this->load->model('documentos_model');
         if (isset($_REQUEST['txtEstimacion'])) { $e = 1; }  
         else { $e=0; } 
         if (isset($_REQUEST['txtProrroga'])){ $p =1; }
         else{ $p=0; }
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            'idSubTipoProceso' => strtoupper($this->input->post('idSubTipoProceso')),
            'idDireccion_responsable' => $this->input->post('idDireccion'),
            'Es_Estimacion' => $e,
            'Es_Prorroga' => $p,
            /*'Es_Estimacion' => this->input->post('txtEstimacion'),
            'Es_Prorroga' => this->input->post('txtProrroga'),*/
        );
        $retorno=  $this->documentos_model->datos_documento_insert($data);
        if($retorno['retorno']<0)
            header('Location:'.site_url('documentos/index/'.$retorno['error']));
        else
            header('Location:'.site_url('documentos')); 
    }
    
    
    public function modificar_cat() {
          $this->load->model('documentos_model');
         $id=$this->input->post('idCatalogo');
         if (isset($_REQUEST['txtEstimacion_mod']))
            $e = 1;
         else
             $e=0;
         if (isset($_REQUEST['txtProrroga_mod']))
             $p =1; 
         else
             $p=0;
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'idSubTipoProceso'=> $this->input->post('idSubTipoProceso_mod'),
            'idDireccion_responsable' => $this->input->post('idDireccion_mod'),
            'Es_Estimacion' => $e,
            'Es_Prorroga' => $p,
        );
        $retorno=  $this->documentos_model->datos_documento_update($data,$id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('documentos/index/'.$retorno['error']));
        else
            header('Location:'.site_url('documentos')); 
    }
    
    public function eliminar_cat($id) {
        $this->load->model('documentos_model');
          
        $retorno=  $this->documentos_model->datos_documento_delete($id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('documentos/index/'.$retorno['error']));
        else
            header('Location:'.site_url('documentos')); 
    }
    
    
    public function dato_subtipoproceso($id) {
        $this->load->model('documentos_model');
        $query = $this->documentos_model->dato_subtipoproceso($id);
        echo json_encode($query->row_array());
    }
    
    public function datos_direcciones($id){
        $this->load->model('documentos_model');
        $query = $this->documentos_model->datos_direccion($id);
        echo json_encode($query->row_array());
    }
    
}
