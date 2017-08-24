<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rel_archivo_preregistro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_relacion_archivo_preregistro($idRel, $idDireccion){
        
        
       /* $this->db->where('id_Rel_Archivo_Documento', $idRel);
        $this->db->where('idDireccion_responsable', $idDireccion);
        $query = $this->db->get_where('saaRel_Archivo_Preregistro');
        * */
        
        $query = $this->db->query("SELECT * FROM saaRel_Archivo_Preregistro
                    WHERE id_Rel_Archivo_Documento = " .$idRel ."
                    AND idDireccion_responsable = " .$idDireccion ."
                    AND eliminacion_logica=0");

        
        return $query;
        /*if ($query->num_rows() > 0) {
            $registro = $query->row();
            return array('ret' => true, 'registro' => $registro->id);
        } else{
            return array('ret' => false, 'registro' => 0);
        }*/
    }
    
    public function get_relacion_archivo_preregistro_por_relacion($idRel){
         $query = $this->db->query("SELECT * FROM saaRel_Archivo_Preregistro
                    WHERE id_Rel_Archivo_Documento = " .$idRel ."
                    
                    AND eliminacion_logica=0");

        
        return $query;
    }
    
    public function datos_preregistro_update_por_relacion($data, $idRel) {
        
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $data, 'id' => $id));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array( 'id_Rel_Archivo_Documento' => $idRel));
       
    
    }
    
    
    public function datos_relacion_archivo_preregistro_update($data, $idDireccion_responsable, $idRel) {
        $datos = $data;
        $datos['idDireccion_responsable'] = $idDireccion_responsable;
        $datos['idRel'] = $idRel;
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $datos, 'id' => $id));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array('idDireccion_responsable' => $idDireccion_responsable, 'id_Rel_Archivo_Documento' => $idRel));
       
    
    }
    
    public function datos_relacion_archivo_preregistro_update_preregistro($data, $idDireccion_responsable, $idArchivo) {
        
        $datos = $data;
        $datos['idDireccion_responsable'] = $idDireccion_responsable;
        $datos['idArchivo'] = $idArchivo;
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $datos, 'id' => $id));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array('idDireccion_responsable' => $idDireccion_responsable, 'idArchivo' => $idArchivo));
       
    
    }
    
    public function update_registro($data, $id){
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $data, 'id' => $id));
        $estado=$this->db->update('saaRel_Archivo_Preregistro', $data, array('id' => $id));
        
        // print_r($estado);
    }

    public function update_recibido_cid($data, $idArchivo) {
        $datos = $data;
        $datos['idArchivo'] = $idArchivo;
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $datos, 'id' => $id));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array('idArchivo' => $idArchivo));
    }

    public function datos_relacion_archivo_preregistro_insert($data) {
        
        
            $this->db->insert('saaRel_Archivo_Preregistro', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
            
            if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $data, 'id' => $registro));
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