<?php


class procesos extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        /*
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"direcciones","P")==false){
            header("Location:" . site_url('principal'));
        }*/
        
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
        //$data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'), 'procesos');
        $data['usuario'] = $this->session->userdata('Nombre');
        $data['ejercicio'] = $this->session->userdata('ejercicio');
        
        $this->load->model('procesos_model');
        $data['qListado']=$this->procesos_model->listado_procesos();
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        $data['qProcesos']=$data['qListado'];        
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        $this->load->view('v_pant_procesos', $data);
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

    public function datos_procesos($id) {
        $this->load->model('procesos_model');
        $query = $this->procesos_model->datos_proceso($id);
        echo json_encode($query->row_array());
    }

    public function agregar_proceso() {
         $this->load->model('procesos_model');
         
         
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            'Estatus'=>  $this->input->post('Estatus'),
        );
         
        $retorno = $this->procesos_model->datos_proceso_insert($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('procesos/index/' . $retorno['error']));
        else
            header('Location:'.site_url('procesos')); 
    }

    public function modificar_proceso() {
         $this->load->model('procesos_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'Estatus'=>  $this->input->post('Estatus_mod'),
        );

        $retorno =  $this->procesos_model->datos_proceso_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('procesos/index/'.$retorno['error']));
        else
            header('Location:'.site_url('procesos')); 
    }
    
    public function eliminar_proceso($id) {
        $this->load->model('procesos_model');
        //$id = $this->input->post('id');
        $this->procesos_model->datos_proceso_delete($id);
        //$retorno = $this->procesos_model->datos_proceso_delete($id);
        //$query = $this->procesos_model->datos_proceso_delete($id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('procesos/index/' . $retorno['error']));
        else
            header('Location:'.site_url('procesos')); 

    }
    
    
    
    
}
