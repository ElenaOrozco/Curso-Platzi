<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class subdocumentos_model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function addw_subDocumentos() {
        $query = $this->db->get("saaSubDocumentos");
        $addw = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Nombre;
            }
        }
        return $addw;
    }
 
    public function listado_subdocumento() {
 
            $sql = 'SELECT saaSubDocumentos.*,  saaDocumentos.Nombre AS Nombre_doc FROM saaSubDocumentos INNER JOIN saaDocumentos
                    WHERE saaSubDocumentos.idDocumento = saaDocumentos.id ORDER BY idDocumento DESC';
            $query = $this->db->query($sql);
            return $query; 
    }
 
    public function listado_subdocumentos_documento($id) {
            $sql = 'SELECT *   FROM saaSubDocumentos 
                    where idDocumento=? ';
            $query = $this->db->query($sql,array($id));
            return $query; 
    }
    
    
     public function listado_documentos() {
 
            $sql = 'SELECT * FROM saaDocumentos ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }
        
     
    public function datos_subdocumento($id) {
        $sql = 'SELECT * FROM saaSubDocumentos WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    public function datos_documento($id) {
        $sql = 'SELECT * FROM saaDocumentos WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
     
     
    
     
    public function datos_subdocumento_insert($data) {
        $repetido =  $this->concepto_repetido(strtoupper($data['Nombre']));
 
        if(!$repetido['ret']){
            $this->db->insert('saaSubDocumentos', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
            
            if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaSubDocumentos', 'Data' => $data, 'id' => $registro));
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
         return array("retorno" => "-1", "error" => 'Proceso repetido');   
        } 
    }
     
    public function datos_subdocumento_update($data, $id) {
        
        
        $this->log_save(array('Tabla' => 'saaSubDocumentos', 'Data' => $data, 'id' => $id));
        
        $this->db->where('id', $id);
        $this->db->update('saaSubDocumentos', $data);
        //$this->db->update('saatipodocumento', $data, array('id' => $id));
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
    public function datos_subdocumento_delete($id) {
        //echo $id;
        //$this->db->where('id', $id);
        //$this->db->update('saatipodocumento');
        $this->db->delete('saaSubDocumentos', array('id' => $id));
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
        $query = $this->db->get_where('saaSubDocumentos');
        if ($query->num_rows() < 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Nombre);
        } else
            return array('ret' => false, 'concepto' => 0);
    }
   
 
     
 
     
    public function filtrar_listado_direcciones_de_la_direccion($idDireccion) {
        $direcciones = array();
        $direcciones[] =$idDireccion;
         
        $num_listado=count($direcciones);
        $listado=" id_Direccion_index=" .$idDireccion;
        for ($i = 0; $i < $num_listado; $i++) {
            $query = $this->listado_direcciones_de_la_direccion($direcciones[$i]);
            foreach ($query->result() as $row) {
                $direcciones[]=$row->id;
                $listado.=" or id_Direccion_index=" . $row->id;
            }    
            $num_listado=count($direcciones);
        }
        return $listado;
         
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