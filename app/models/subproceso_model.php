<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class subproceso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_subproceso() {

            $sql = 'SELECT saaSubTipoProceso.*, saaTipoProceso.Nombre AS Proceso FROM saaSubTipoProceso INNER JOIN saaTipoProceso ON 
             saaSubTipoProceso.idTipoProceso = saaTipoProceso.id';
            $query = $this->db->query($sql);
            return $query; 
    }

    
       
    
    public function datos_subproceso($id) {
        $sql = 'SELECT * FROM saaSubTipoProceso WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    public function datos_proceso($id) {
        $sql = 'SELECT * FROM saaTipoProceso WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    
   
    
    public function datos_subproceso_insert($data) {
        $repetido =  $this->concepto_repetido(strtoupper($data['Nombre']));

        if(!$repetido['ret']){
        $this->db->insert('saaSubTipoProceso', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaSubTipoProceso', 'Data' => $data, 'id' => $registro));
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
        
        }
        
        else
        {
         return array("retorno" => "-1", "error" => 'Proceso repetida');   
        }
    }


    
    public function datos_subproceso_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaSubTipoProceso', 'Data' => $data, 'id' => $id));
        
        $this->db->where('id', $id);
        $this->db->update('saaSubTipoProceso', $data);
        //$this->db->update('saaTipoProceso', $data, array('id' => $id));
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
    public function datos_subproceso_delete($id) {
        //echo $id;
        //$this->db->where('id', $id);
        //$this->db->update('saaTipoProceso');
        $this->db->delete('saaSubTipoProceso', array('id' => $id));
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
        $this->db->where('Nombre', $str);
        $query = $this->db->get_where('saaSubTipoProceso');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Nombre);
        } else
            return array('ret' => false, 'concepto' => 0);
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

