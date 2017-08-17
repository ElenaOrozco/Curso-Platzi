<?php


class modalidad extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Modalidades","P")==false){
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
        //$data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'), 'procesos');
        $data['usuario'] = $this->session->userdata('nombre');
        $data['ejercicio'] = $this->session->userdata('ejercicio');
        
        $this->load->model('modalidad_model');
        $data['qListado']=$this->modalidad_model->listado_modalidad();
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        //$data['qProcesos']=$data['qListado'];        
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        
        $this->load->view('v_pant_modalidad', $data);
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

    public function datos_modalidad($id) {
        $this->load->model('modalidad_model');
        $query = $this->modalidad_model->datos_modalidad($id);
        echo json_encode($query->row_array());
    }

    public function agregar_modalidad() {
         $this->load->model('modalidad_model');
         
         
         $data=array(
            'Abreviatura'=> strtoupper($this->input->post('Abreviatura')),
            'Modalidad'  => strtoupper($this->input->post('Modalidad')),
        );
         
        $retorno = $this->modalidad_model->datos_modalidad_insert($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('modalidad/index/' . $retorno['error']));
        else
            header('Location:'.site_url('modalidad')); 
    }

    public function modificar_modalidad() {
         $this->load->model('modalidad_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Abreviatura'=> strtoupper($this->input->post('Abreviatura_mod')),
            'Modalidad'  => strtoupper($this->input->post('Modalidad_mod')),
        );

        $retorno =  $this->modalidad_model->datos_modalidad_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('modalidad/index/'.$retorno['error']));
        else
            header('Location:'.site_url('modalidad')); 
    }
    
    public function eliminar_modalidad($id) {
        $this->load->model('modalidad_model');
        //$id = $this->input->post('id');
        $this->modalidad_model->datos_modalidad_delete($id);
        
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('modalidad/index/' . $retorno['error']));
        else
            header('Location:'.site_url('modalidad')); 

    }
    
    
    
    
}
