<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class estimaciones_model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function datos_estimaciones_insert($data) {
        
            $this->db->insert('saaEstimaciones', $data);
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
         
        
         
        
    }
    
   
    
    public function estimaciones_rel_archivo($idRel){
        $sql= 'SELECT * FROM saaEstimaciones
                WHERE idRel_Archivo_Documento= ?
                ORDER BY ordenar_subdocumento';
        $query = $this->db->query($sql, array($idRel));
        return $query;

        
    }
    
    public function estimaciones_existentes($idRel){
        $sql= 'SELECT DISTINCT Numero_Estimacion, idRel_Archivo_Documento FROM  `saaEstimaciones`
                WHERE idRel_archivo_documento = ?
                ORDER BY Numero_Estimacion DESC';
        $query = $this->db->query($sql, array($idRel));
        return $query;

        
    }
    
    
    public function eliminar_estimacion($relacion, $no_estimacion){
        $sql= 'DELETE  FROM saaEstimaciones
                WHERE idRel_Archivo_Documento= ? AND Numero_Estimacion = ?';
        $query = $this->db->query($sql, array($relacion, $no_estimacion));
        return $query;
    }

    public function datos_estimaciones_update($data, $id) {
        //$this->db->where('id', $id);
        //$this->db->update('saatipoproceso', $data);
        $this->db->update('saaEstimaciones', $data, array('id' => $id));
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
}

