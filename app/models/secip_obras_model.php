<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class secip_obras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_obras() {
        
        //con esta línea cargamos la base de datos secip
        //y la asignamos a $db_secip
        $db_secip = $this->load->database('production_secip', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
	$sql = 'SELECT * FROM catObras  where (Estatus=70 or Estatus=120 or Estatus=121 or Estatus=122  or Estatus=110) and idObraMatriz=0';
        $query = $db_secip->query($sql);
        return $query; 	
        
    }
    
    public function datos_obra($idContrato) {
        
        //con esta línea cargamos la base de datos secip
        //y la asignamos a $db_secip
        $db_secip = $this->load->database('production_secip', TRUE);
        //$db_secip = $this->load->database('secip_dev', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
	$sql = 'SELECT * FROM catObras  where (Estatus=70 or Estatus=120 or Estatus=121 or Estatus=122  or Estatus=110) and idObraMatriz=0 and id = ?';
        $query = $db_secip->query($sql);
        return $query; 	
        
    }
    
    
    public function datos_Archivo_contrato($idContrato){
        $query = $this->db->get_where("saaArchivo", array("idContrato" => $idContrato));
        return $query;
    }

    
    public function addw_supervisores() {
        
        //con esta línea cargamos la base de datos secip
        //y la asignamos a $db_secip
        $db_secip = $this->load->database('production_secip', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
	$sql = 'SELECT * FROM catSupervision  ';
        $query = $db_secip->query($sql);
        $addw = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Supervisor;
            }
        }
        return $addw; 	
        
    }
    
   public function addw_direcciones() {
        
        //con esta línea cargamos la base de datos secip
        //y la asignamos a $db_secip
        $db_secip = $this->load->database('production_secip', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
	$sql = 'SELECT * FROM catDirecciones  ';
        $query = $db_secip->query($sql);
        $addw = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Nombre;
            }
        }
        return $addw; 	
        
    }
    
    public function datos_supervisor($id) {
        
        //con esta línea cargamos la base de datos secip
        //y la asignamos a $db_secip
        $db_secip = $this->load->database('production_secip', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
	$sql = 'SELECT * FROM catSupervision  where id=?';
        $query = $db_secip->query($sql,$id);
       
        return $query; 	
        
    }
   
    
    public function addw_estatus() {
        
        //con esta línea cargamos la base de datos secip
        //y la asignamos a $db_secip
        $db_secip = $this->load->database('production_secip', TRUE);
        //y de esta forma accedemos, no con $this->db->get,
        //sino con $db_prueba->get que contiene la conexión
        //a la base de datos prueba
	$sql = 'SELECT * FROM sisEstatus  where (Modulo=1)';
        $query = $db_secip->query($sql);
        $addw = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->Estatus] = $row->Nombre;
            }
        }
        return $addw; 	
        
    }
    
    
}