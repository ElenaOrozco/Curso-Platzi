<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relacion_plantilla_documento_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_rel_plantilla_documento() {
            $sql = 'SELECT * FROM saaRel_Plantilla_Documento WHERE Estatus=1 ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }

    
    
    
    
    
    public function datos_rel_plantilla_documento($id) {
        $sql = 'SELECT * FROM saaRel_Plantilla_Documento WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function addw_rel_plantilla_documento() {
        $query=  $this->db->get('saaRel_Plantilla_Documento');
        $addw[0]="No disponible";
        foreach ($query->result() as $row) {
            $addw[$row->id]=$row->Nombre;
        }
        return $addw;
    }

   
    
    public function datos_rel_plantilla_documento_insert($data) {
        $repetido=  $this->concepto_repetido(strtoupper($data['Nombre']));
        if(!$repetido['ret']){
        $this->db->insert('saaRel_Plantilla_Documento', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Plantilla_Documento', 'Data' => $data, 'id' => $registro));
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
         return array("retorno" => "-1", "error" => 'Dirección repetida');   
        }
    }
    
    public function datos_rel_plantilla_documento_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaRel_Plantilla_Documento', 'Data' => $data, 'id' => $id));
        
        $this->db->update('saaRel_Plantilla_Documento', $data, array('id' => $id));
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
    
    public function datos_rel_plantilla_documento_delete($id) {
        $this->db->delete('saaRel_Plantilla_Documento', array('id' => $id));
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
        $query = $this->db->get_where('saaRel_Plantilla_Documento');
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

