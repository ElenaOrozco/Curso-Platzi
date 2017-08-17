<?php
 
 
class subdocumentos extends MY_Controller {
 
    public function __construct() {
        parent::__construct();
    }
 
    public function index($error='') {
         
        
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"SubDocuemtos","P")==false){
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
         
        $this->load->model('subdocumentos_model');
        $this->load->model('documentos_model');
 
        $data['qListado'] = $this->subdocumentos_model->listado_subdocumento();
        $data['qDocumentos'] = $this->subdocumentos_model->listado_documentos();    
          
        $data['qSubDocumentos'] = $this->subdocumentos_model->listado_subdocumento();      
        
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
       
        
        $this->load->view('v_pant_subdocumentos', $data);
    }
 
    public function infouser($iduser = null){
         
        $this->db->select('catUsuarios.*, Direcciones.id as iddir, Direcciones.Nombre as nomdir, Direcciones.Nivel as lvldir,')
            ->join('Direcciones', 'Direcciones.id=catUsuarios.idDireccion', 'left')
            ->group_by('catUsuarios.id');
        $this->db->where("catUsuarios.id", $iduser);
        $query = $this->db->get('catUsuarios');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
 
    public function datos_subdocumento($id) {
        $this->load->model('subdocumentos_model');
        $query = $this->subdocumentos_model->datos_subdocumento($id);
        echo json_encode($query->row_array());
    }
     public function datos_documento($id) {
        $this->load->model('subdocumentos_model');
        $query = $this->subdocumentos_model->datos_documento($id);
        echo json_encode($query->row_array());
    }
    public function datos_procesos($id) {
        $this->load->model('subdocumentos_model');
        $query = $this->subdocumentos_model->datos_proceso($id);
        echo json_encode($query->row_array());
    }
 
    public function agregar_subdocumento() {
         $this->load->model('subdocumentos_model');
          
          
         $data=array(
            'Nombre'        => strtoupper($this->input->post('Nombre')),
            'idDocumento' => $this->input->post('idDocumento'),
            //'Estatus'=>  $this->input->post('Estatus'),
        );
          
          
        $retorno = $this->subdocumentos_model->datos_subdocumento_insert($data);
         
 
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('subdocumentos/index/' . $retorno['error']));
        else
            header('Location:'.site_url('subdocumentos')); 
    }
 
    public function modificar_subdocumento() {
         $this->load->model('subdocumentos_model');
          
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
          
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Nombre'        => strtoupper($this->input->post('Nombre_mod')),
            'idDocumento' => $this->input->post('idDocumento_mod'),
            //'Estatus'=>  $this->input->post('Estatus_mod'),
        );
 
        $retorno =  $this->subdocumentos_model->datos_subdocumento_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('subdocumentos/index/'.$retorno['error']));
        else
            header('Location:'.site_url('subdocumentos')); 
    }
     
    public function eliminar_subdocumento($id) {
        $this->load->model('subdocumentos_model');
        //$id = $this->input->post('id');
        $this->subdocumentos_model->datos_subdocumento_delete($id);
        //$retorno = $this->procesos_model->datos_proceso_delete($id);
        //$query = $this->procesos_model->datos_proceso_delete($id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('subdocumentos/index/' . $retorno['error']));
        else
            header('Location:'.site_url('subdocumentos')); 
 
    }
     
     
     
     
}