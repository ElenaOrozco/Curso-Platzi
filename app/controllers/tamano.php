<?php


class tamano extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
    
        
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
        
        $this->load->model('tamano_model');
        $data['qListado']=$this->tamano_model->listado_tamano();
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        $data['qProcesos']=$data['qListado'];        
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        $this->load->view('v_pant_tamano', $data);
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

    public function datos_tamano($id) {
        $this->load->model('tamano_model');
        $query = $this->tamano_model->datos_tamano($id);
        echo json_encode($query->row_array());
    }

    public function agregar_tamano() {
         $this->load->model('tamano_model');
         
         
         $data=array(
            'Tamano'=> strtoupper($this->input->post('Tamano')),
            //'Estatus'=>  $this->input->post('Estatus'),
        );
         
        $retorno = $this->tamano_model->datos_tamano_insert($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('tamano/index/' . $retorno['error']));
        else
            header('Location:'.site_url('tamano')); 
    }

    public function modificar_tamano() {
         $this->load->model('tamano_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Tamano'=> strtoupper($this->input->post('Tamano_mod')),
            //'Estatus'=>  $this->input->post('Estatus_mod'),
        );

        $retorno =  $this->tamano_model->datos_tamano_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('tamano/index/'.$retorno['error']));
        else
            header('Location:'.site_url('tamano')); 
    }
    
    public function eliminar_tamano($id) {
        $this->load->model('tamano_model');
        //$id = $this->input->post('id');
        $this->tamano_model->datos_tamano_delete($id);
        //$retorno = $this->procesos_model->datos_proceso_delete($id);
        //$query = $this->procesos_model->datos_proceso_delete($id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('tamano/index/' . $retorno['error']));
        else
            header('Location:'.site_url('tamano')); 

    }
    
    
    
    
}
