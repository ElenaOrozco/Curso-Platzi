<?php
// Secuencia revisada
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends MY_Controller {
    
    
    protected $meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'Control de Obras'),
        array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
        array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
       
        
        array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
        array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
        array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
    );
    

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
        
        // Listado de obras. se generan solo 100 registros y se paginan por medio de un motor			
        $this->load->library('ferfunc');
        $this->load->model("usuarios_model");
       
        $data['meta'] = $this->meta;
        
        
        $data['ejercicio'] = $this->session->userdata('ejercicio');
        $data['usuario'] = $this->session->userdata('nombre');       
               
        //$data["qAvisos"] = $this->usuarios_model->avisos($this->session->userdata('id'));
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        $this->load->view('v_pant_principal', $data);
    }
    
    public function obras() {
        // Listado de obras. se generan solo 100 registros y se paginan por medio de un motor			
        $data['meta'] = $this->meta;

        $this->load->model("menu_model");
        $data['menu'] = $this->menu_model->menu(1);
        
        $data['usuario'] = $this->session->userdata('nombre');
        
        $this->load->view('v_pant_portal_obras', $data);
    }
    
    public function padron() {
        // Listado de obras. se generan solo 100 registros y se paginan por medio de un motor			
        $data['meta'] = $this->meta;

        $this->load->model("menu_model");
        $data['menu'] = $this->menu_model->menu(2);
        
        $data['usuario'] = $this->session->userdata('nombre');       
               
        
        $this->load->view('v_pant_portal_padron', $data);
    }
    public function sistema() {
        // Listado de obras. se generan solo 100 registros y se paginan por medio de un motor			
        $data['meta'] = $this->meta;

        $this->load->model("menu_model");
        $data['menu'] = $this->menu_model->menu(3);
        
        $data['usuario'] = $this->session->userdata('nombre');
        
        $this->load->view('v_pant_portal_sistema', $data);
    }
    public function ayuda() {
        // Listado de obras. se generan solo 100 registros y se paginan por medio de un motor			
        $data['meta'] = $this->meta;

        $this->load->library("ferfunc");
        $data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'),'procesos');
        
        
        $data['usuario'] = $this->session->userdata('nombre');
//        print_r($data);
//        
        $this->load->view('v_pant_portal_ayuda', $data);
    }
    public function cambiar_ejercicio(){
        $this->session->set_userdata('ejercicio', $this->input->post('ejercicio'));
        
        
        
        $sql = "SELECT * FROM fondoUnidadEjecutoraGasto WHERE id=? ";
        $query = $this->db->query($sql, array($this->session->userdata('idDireccion')));
        $aQuery=$query->row_array();
        
        $sql = "SELECT * FROM fondoUnidadEjecutoraGasto WHERE Numero=? and Ejercicio=?";
        $query_aux = $this->db->query($sql, array($aQuery['Numero'],$this->session->userdata('ejercicio')));
        
        if ($query_aux->num_rows() > 0) {
            $aQuery_aux=$query_aux->row_array();
             
            $this->session->set_userdata('idDireccion', $aQuery_aux['id']);
        }

        
        
        $this->index();
        
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */