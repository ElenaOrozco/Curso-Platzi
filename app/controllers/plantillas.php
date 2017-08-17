<?php


class Plantillas extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Plantillas","P")==false){
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
        
        $this->load->model('plantillas_model');
        $data['qListado']=$this->plantillas_model->listado_plantillas();
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        $data['qModalidades']=$this->plantillas_model->listado_modalidades();  
        
        
         
        $data['addw_modalidades']=$this->plantillas_model->addw_modalidades();
        
        
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        
         $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
       
        
        $this->load->view('v_pant_plantillas', $data);
    }

    
    public function cambios($id) {
         $this->load->library('ferfunc');
         
         
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
        
        //$data['error']=$error;
        //$data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'), 'procesos');
        $data['usuario'] = $this->session->userdata('Nombre');
        $data['ejercicio'] = $this->session->userdata('ejercicio');
        
        $this->load->model('plantillas_model');
        
        
        
        
        $data['aPlantilla']=$this->plantillas_model->datos_plantilla($id)->row_array();
        
        $data['qListadoDocumentos']=$this->plantillas_model->listado_documentos_plantilla($id);
        
        
        $data['qDocumentos']=$this->plantillas_model->listado_documentos();
        
        
        $data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        $data['qModalidades']=$this->plantillas_model->listado_modalidades();  
        
        
         
        $data['addw_modalidades']=$this->plantillas_model->addw_modalidades();
        

         
         $this->load->view('v_pant_plantillas_edicion', $data);
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

    public function datos_plantilla($id) {
        $this->load->model('plantillas_model');
        $query = $this->plantillas_model->datos_plantilla($id);
        echo json_encode($query->row_array());
    }

    public function datos_modalidad($id) {
        $this->load->model('plantillas_model');
        $query = $this->plantillas_model->datos_modalidad($id);
        echo json_encode($query->row_array());
    }
    
    
    public function agregar_cat() {
         $this->load->model('plantillas_model');
         
          
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            'Normatividad'=>  $this->input->post('Normatividad'),
            'idModalidad'=>  $this->input->post('idModalidad'),
        );
        $retorno=  $this->plantillas_model->datos_plantilla_insert($data);
        if($retorno['retorno']<0)
            header('Location:'.site_url('plantillas/index/'.$retorno['error']));
        else
            header('Location:'.site_url('plantillas')); 
    }
    
    public function modificar_plantilla(){
        $this->load->model('plantillas_model');
        $id =  $this->input->post('idCatalogo');
          
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'Normatividad'=>  $this->input->post('Normatividad_mod'),
            'idModalidad'=>  $this->input->post('idModalidad_mod'),
        );
        $retorno=  $this->plantillas_model->datos_plantilla_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('plantillas/cambios/' . $id . '/' .$retorno['error']));
        else
            header('Location:'.site_url('plantillas/cambios/' . $id )); 
    }

    

    public function agregar_documento($idDocumento,$idPlantilla) {
         $this->load->model('plantillas_model');
         
         $ordenar=$this->plantillas_model->get_ultipo_documento_plantilla($idPlantilla);
         
        /*  
         $data=array(
            'idDocumento'=> $this->input->post('idDocumento'),
            'idPlantilla'=> $this->input->post('idPlantilla'),
        );
       
         * 
         */  
        $data=array(
            'idDocumento'=> $idDocumento,
            'idPlantilla'=> $idPlantilla,
            'ordenar'=> $ordenar,
        );  
         
        $retorno=  $this->plantillas_model->datos_rel_plantilla_documento_insert($data);
        
        
         header('Location:'.site_url('plantillas/cambios/'.$idPlantilla));
       
    }
    
    
    
    public function modificar_cat_ordenar() {
         $this->load->model('plantillas_model');
         
         $idPlantilla=$this->input->post('idPlantilla_mod');
         $idRel_Plantilla_Documento=$this->input->post('idRel_Plantilla_Documento_mod');
          
         
         $data=array(
            'ordenar'=> $this->input->post('ordenar_mod'),
        );
       
         
      
         
        $retorno=  $this->plantillas_model->datos_rel_plantilla_documento_update($data,$idRel_Plantilla_Documento);
        
        
         header('Location:'.site_url('plantillas/cambios/'.$idPlantilla));
       
    }
    
    
    
    public function modificar_cat() {
         $this->load->model('plantillas_model');
         
         $aDireccion_Padre=  $this->plantillas_model->datos_plantilla($this->input->post('idDireccion_mod'))->row_array();
         
         $id=$this->input->post('idCatalogo');
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre_mod')),
            'Abreviatura'=>  $this->input->post('Abreviatura_mod'),
            'Nivel'=>  $aDireccion_Padre['Nivel']+1,
            'id_Padre'=>  $this->input->post('idDireccion_mod'),
        );
        $retorno=  $this->plantillas_model->datos_plantilla_update($data,$id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('pantillas/index/'.$retorno['error']));
        else
            header('Location:'.site_url('pantillas')); 
    }
    
    public function eliminar_cat($id) {
        $this->load->model('plantillas_model');
        header('Location:'.site_url('pantillas'));
    }
    
    
    
     public function delete_rel_plantilla_documento($id,$idPlantilla) {
        $this->load->model('plantillas_model');
        
        
        $this->plantillas_model->delete_Rel_plantilla_documento($id);
        
        header('Location:'.site_url('plantillas/cambios/'.$idPlantilla));
        
    }
    
    
}

