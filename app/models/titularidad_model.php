<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class titularidad_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_titularidad() {
        //listar activos
        $sql = 'SELECT * FROM saaTitularidad WHERE Estatus=1 ORDER BY id ASC';
        //listar todos
        //$sql = 'SELECT * FROM saatipoproceso';
        $query = $this->db->query($sql);
        return $query; 
    }

    
       
    
    public function datos_titularidad($id) {
        $sql = 'SELECT * FROM saaTitularidad WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    


   
    
    public function datos_titularidad_insert($data) {
        $repetido =  $this->concepto_repetido(strtoupper($data['Titulo']));

        if( !$repetido['ret'] ){
            $this->db->insert('saaTitularidad', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
            //$this->db->db_debug = $oldv; 

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
        
        } else{
         return array("retorno" => "-1", "error" => 'Titularidad repetida');   
        }
    }
    
    public function datos_titularidad_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('saaTitularidad', $data);
        //$this->db->update('saatipoproceso', $data, array('id' => $id));
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
//        $registro = $this->db->insert_id();
        //$this->db->db_debug = $oldv; 

        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
        }
    
    }
    public function datos_titularidad_delete($id) {
        
        $this->db->delete('saaTitularidad', array('id' => $id));
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
//        $registro = $this->db->insert_id();
        //$this->db->db_debug = $oldv; 

        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
        } 
    }
    
    public function concepto_repetido($str) {
        $this->db->where('Titulo', $str);
        $query = $this->db->get_where('saaTitularidad');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Titularidad);
        } else
            return array('ret' => false, 'concepto' => 0);
    }
  
    

}

?>

