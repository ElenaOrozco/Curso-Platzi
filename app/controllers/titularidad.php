<?php


class titularidad extends MY_Controller {

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
        $data['usuario'] = $this->session->userdata('nombre');
        $data['ejercicio'] = $this->session->userdata('ejercicio');
        
        $this->load->model('titularidad_model');
        $data['qListado']=$this->titularidad_model->listado_titularidad();
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        $data['qTitularidad']=$data['qListado'];        
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        
        $this->load->view('v_pant_titularidad', $data);
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

    public function datos_titularidad($id) {
        $this->load->model('titularidad_model');
        $query = $this->titularidad_model->datos_titularidad($id);
        echo json_encode($query->row_array());
    }

    public function agregar_titularidad() {
         $this->load->model('titularidad_model');
         
         
         $data=array(
            'Titulo'=> strtoupper($this->input->post('Titulo')),
            //'Estatus'=>  $this->input->post('Estatus'),
        );
         
        $retorno = $this->titularidad_model->datos_titularidad_insert($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('titularidad/index/' . $retorno['error']));
        else
            header('Location:'.site_url('titularidad')); 
    }

    public function modificar_titularidad() {
         $this->load->model('titularidad_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Titulo'=> strtoupper($this->input->post('Titulo_mod')),
            //'Estatus'=>  $this->input->post('Estatus_mod'),
        );

        $retorno =  $this->titularidad_model->datos_titularidad_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('titularidad/index/'.$retorno['error']));
        else
            header('Location:'.site_url('titularidad')); 
    }
    
    public function eliminar_titularidad($id) {
        $this->load->model('titularidad_model');
        //$id = $this->input->post('id');
        $this->titularidad_model->datos_titularidad_delete($id);
        //$retorno = $this->procesos_model->datos_proceso_delete($id);
        //$query = $this->procesos_model->datos_proceso_delete($id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('titularidad/index/' . $retorno['error']));
        else
            header('Location:'.site_url('titularidad')); 

    }
    
    
    
    
}
