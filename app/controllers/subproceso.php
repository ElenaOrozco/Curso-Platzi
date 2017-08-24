<?php


class subproceso extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Subprocesos","P")==false){
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
        
        $this->load->model('subproceso_model');
        $this->load->model('procesos_model');

        $data['qListado'] = $this->subproceso_model->listado_subproceso();
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        //$data['qProcesos']=$data['qListado'];  
        $data['qProcesos'] = $this->procesos_model->listado_proceso();      
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        
        
        $this->load->view('v_pant_subproceso', $data);
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

    public function datos_subproceso($id) {
        $this->load->model('subproceso_model');
        $query = $this->subproceso_model->datos_subproceso($id);
        echo json_encode($query->row_array());
    }
    public function datos_procesos($id) {
        $this->load->model('subproceso_model');
        $query = $this->subproceso_model->datos_proceso($id);
        echo json_encode($query->row_array());
    }

    public function agregar_subproceso() {
         $this->load->model('subproceso_model');
          $aProceso_Padre=  $this->subproceso_model->datos_proceso($this->input->post('idProceso'))->row_array();
         
        $data=array(
            'Nombre'        => strtoupper($this->input->post('Nombre')),
            'idTipoProceso' => $this->input->post('idProceso'),
            'Ordenar'       => $this->input->post('txtOrdenar'),
            //'Estatus'=>  $this->input->post('Estatus'),
        ); 


        /* $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            'idTipoProceso'=>  $this->input->post('idProceso'),
            'listado_de_procesos'=>  $aProceso_Padre['Nivel']+1,
            'id_Padre'=>  $this->input->post('idProceso'),
        );
         */
        $retorno = $this->subproceso_model->datos_subproceso_insert($data);
        

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('subproceso/index/' . $retorno['error']));
        else
            header('Location:'.site_url('subproceso')); 
    }

    public function modificar_subproceso() {
         $this->load->model('subproceso_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Nombre'        => strtoupper($this->input->post('Nombre_mod')),
            'idTipoProceso' => $this->input->post('idProceso_mod'),
            'Ordenar'       => $this->input->post('txtOrdenar_mod'),
            //'Estatus'=>  $this->input->post('Estatus_mod'),
        );

        $retorno =  $this->subproceso_model->datos_subproceso_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('subproceso/index/'.$retorno['error']));
        else
            header('Location:'.site_url('subproceso')); 
    }
    
    public function eliminar_subproceso($id) {
        $this->load->model('subproceso_model');
        //$id = $this->input->post('id');
        $this->subproceso_model->datos_subproceso_delete($id);
        //$retorno = $this->procesos_model->datos_proceso_delete($id);
        //$query = $this->procesos_model->datos_proceso_delete($id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('subproceso/index/' . $retorno['error']));
        else
            header('Location:'.site_url('subproceso')); 

    }
    
    
    
    
}
