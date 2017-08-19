<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ubicacion_proyectos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_ubicacion() {
        
        $sql = 'SELECT * FROM saaUbicacion_Proyecto
                WHERE eliminacion_logica= 0 ORDER BY id DESC';
       
        $query = $this->db->query($sql);
        return $query; 
    }
    
    
     public function insert_ubicacion($data){
        $repetido =  $this->concepto_repetido($data);

        if(!$repetido['ret']){
            $this->db->insert('saaUbicacion_Proyecto', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();


            if (!empty($registro)) {
                    $this->log_new(array('Tabla' => 'saaUbicacion_Proyecto', 'Data' => $data, 'id' => $registro));
            }

            if ($aff < 1) {
                if (empty($e)) {
                    $e = "No se realizaron cambios";
                }
                // si hay debug
                $e .= "<pre>" . $last_query . "</pre>";
                return array("retorno" => "-1", "error" => $e);
            } else {

                return array("retorno" => "1", "registro" => $registro);
            }
        }else {
            $e = "Concepto Repetido";
            return array("retorno" => "-1", "error" => $e);
        }
        
      
    }
    
    public function datos_ubicacion_update($data, $id) {
        
        $repetido =  $this->concepto_repetido($data);

        if(!$repetido['ret']){
           

            $this->db->where('id', $id);
            $this->db->update('saaUbicacion_Proyecto', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
   

            if ($aff < 1) {
                if (empty($e)) {
                    $e = "No se realizaron cambios";
                }
                // si hay debug
                $e .= "<pre>" . $last_query . "</pre>";
                return array("retorno" => "-1", "error" => $e);
            } else {
                $this->log_save(array('Tabla' => 'saaUbicacion_Proyecto', 'Data' => $data, 'id' => $id));
                return array("retorno" => "1", "registro" => $id);
            }
        }else {
            $e = "Datos repetidos";
            return array("retorno" => "-1", "error" => $e);
        }
    
    }
    
    public function datos_ubicacion($id) {
        $sql = 'SELECT * FROM saaUbicacion_Proyecto WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function concepto_repetido($data) {
       
        $this->db->where('no_isla', $data['no_isla']);
        $this->db->where('columna', $data['columna']);
        $this->db->where('fila', $data['fila']);
        
        
 
        $query = $this->db->get_where('saaUbicacion_Proyecto');
        
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto);
        } else {
            return array('ret' => false, 'concepto' => 0);  
        }
    }
    
    public function log_save($cambios) {
            $this->load->model("control_usuarios_model");
            return $this->control_usuarios_model->log_save($cambios);
    }
    
    public function log_new($cambios) {
            $this->load->model("control_usuarios_model");
            return $this->control_usuarios_model->log_new($cambios);
    }
   
    
    
    
    

}

?>

