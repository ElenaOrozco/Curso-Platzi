<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    
    
    public function __construct() {
            parent::__construct();
    }

    function _prep_password($password) {
        //return sha1($password . $this->config->item('encryption_key'));
        //se activa codificacion de passwod a sha1. alfredo.
        return sha1($password);
        //return $password;
    }

    public function authenticate($usuario, $pass) {
        // get salt
        // DB is autoload		
//        $this->db->where('Usuario', $usuario);
//        $this->db->where('Password', $this->_prep_password($pass));
//        $this->db->where('Estatus', 1);
//        $query = $this->db->get('catUsuarios', 1);
        $sql = "SELECT * FROM catUsuarios WHERE BINARY Usuario = ? AND Password = ? ";
        $query = $this->db->query($sql, array($usuario, $this->_prep_password($pass)));
        
        if ($query->num_rows() != 1) {
            $this->session->set_userdata('error', 1);
            return false;
        }
        $row = $query->row();
       
        $id_usuario = $row->id;
        $nombre = $row->Nombre;              
        // Aqui se va a checar tambien la dependencia en la que trabajaaa ya que el sistema sea multidependencias        
        
        $this->session->set_userdata('loggedin', true);
        $this->session->set_userdata('error', 0);
        $this->session->set_userdata('id', $id_usuario);
        $this->session->set_userdata('nombre', $nombre); 
        $this->session->set_userdata('SuperUsuario', $row->SuperUsuario);
        
        
        $this->session->set_userdata('recibe', $row->recibe);
        $this->session->set_userdata('reviso', $row->reviso);
        
        
        $this->session->set_userdata('Foliar', $row->Foliar);
        $this->session->set_userdata('Validar', $row->Validar);
       
        
        $this->session->set_userdata('digitalizar', $row->digitalizar);
        
        $this->session->set_userdata('Editar', $row->Editar);
        
        #MAOC idArea_ubicacion_trabajo
        $this->session->set_userdata('idArea_ubicacion_trabajo', $row->idArea_ubicacion_trabajo);
        $this->session->set_userdata('integracion', $row->integracion);
        $this->session->set_userdata('preregistro', $row->preregistro);
        $this->session->set_userdata('editar_ubicacion', $row->editar_ubicacion);
        
        
        $this->session->set_userdata('idDireccion_responsable', $row->idDireccion_responsable);
        //echo $this->session->userdata('idDireccion_responsable');
        //exit();
        
        
        $data = array();
        $data['idUsuario'] = $id_usuario;
        $data['Nombre'] = $nombre;
        $data['Fecha'] = date('Y-m-d h:m:s');
        $data['Server'] = base_url();
        $data['IPClient'] = $_SERVER['REMOTE_ADDR'];
        $data['Browser'] = $_SERVER['HTTP_USER_AGENT'];
        $this->db->insert('log_Users', $data);
        return true;
    }
    
    public function get_usuario() {
        if( !$this->session->userdata('loggedin')){
            return false;
        }
        $id_usuario = $this->session->userdata("id");
        $sql = "
            SELECT * FROM catUsuario WHERE id = ? 
            ";
        $query = $this->db->query($sql,array($id_usuario),1);
        return $query->row_array();
    }
	
	
      
       
}
