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
                    AND idDireccion_responsable = " .$idDireccion);

        
        return $query;
        /*if ($query->num_rows() > 0) {
            $registro = $query->row();
            return array('ret' => true, 'registro' => $registro->id);
        } else{
            return array('ret' => false, 'registro' => 0);
        }*/
    }
    
    
   

    public function preregistros_anteriores(){
        $query = $this->db->query("SELECT DISTINCT id_Rel_Archivo_Documento , id FROM `saaRel_Archivo_Preregistro`
            WHERE idUsuario_preregistra = 0 AND eliminacion_logica = 0" );

        
        return $query;
    }
    
    public function preregistros_usuarios($id){
        $query = $this->db->query("SELECT * FROM `sisHistorico_archivo` WHERE idCambiado = $id ORDER BY id DESC LIMIT 1" );

        
        return $query;
    }
    
    public function total_documentos($ot){
        
        $this->db->select('id');
        $this->db->where('idArchivo', $ot);
        $query = $this->db->get('saaRel_Archivo_Documento');
        
        return $query->num_rows();
    }
    
    public function  ot_preregistradas(){
        $query = $this->db->query("SELECT DISTINCT p.idArchivo, a.OrdenTrabajo
            FROM saaRel_Archivo_Preregistro AS p
            INNER JOIN `saaArchivo` AS a
            ON a.id = p.`idArchivo`
            WHERE p.`eliminacion_logica` = 0" );

        
        return $query;
    }
    
    
    public function ot_preregistradas_direccion($id){
       
                
        $this->db->select('idArchivo');
        $this->db->distinct();
        $this->db->where('idDireccion_responsable', $id);
        $query = $this->db->get('saaRel_Archivo_Preregistro');
        
        return $query->num_rows();
    }
    
    public function documentos_preregistrados_direccion($id){
        $this->db->select('id_Rel_Archivo_Documento');
        $this->db->distinct();
        $this->db->where('idDireccion_responsable', $id);
        $query = $this->db->get('saaRel_Archivo_Preregistro');
        
        return $query->num_rows();
    }
    
    public function usuarios_preregistran_direccion($id){
        $query = $this->db->query("SELECT DISTINCT p.`idUsuario_preregistra`, u.Nombre
            FROM saaRel_Archivo_Preregistro AS p
            INNER JOIN `catUsuarios` AS u
            ON p.idUsuario_preregistra = u.id
            WHERE p.`eliminacion_logica` = 0 AND   p.`idDireccion_responsable` = $id");
                
                
        
        
        return $query;
    }

    public function documentos_preregistrados($ot){
        $query = $this->db->query("SELECT DISTINCT id_Rel_Archivo_Documento FROM `saaRel_Archivo_Preregistro` WHERE idArchivo=$ot
        AND eliminacion_logica= 0" );

        
        return $query->num_rows();
    }
    
    
    
    public function get_relacion_archivo_preregistro_por_relacion($idRel){
         $query = $this->db->query("SELECT * FROM saaRel_Archivo_Preregistro
                    WHERE id_Rel_Archivo_Documento = " .$idRel );

        
        return $query;
    }
    
    public function datos_preregistro_update_por_relacion($data, $idRel) {
        $id = $this->db->query('SELECT id FROM saaRel_Archivo_Preregistro Where id_Rel_Archivo_Documento='. $idRel)->row_array();
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $data, 'id' =>  $id['id']));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array( 'id' =>  $id['id']));
       
    
    }
    
    
    public function datos_relacion_archivo_preregistro_update($data, $idDireccion_responsable, $idRel) {
        $datos = $data;
        $datos['idDireccion_responsable'] = $idDireccion_responsable;
        $datos['idRel'] = $idRel;
        $id = $this->db->query('SELECT id FROM saaRel_Archivo_Preregistro Where idDireccion_responsable='.$idDireccion_responsable. ' AND id_Rel_Archivo_Documento='. $idRel)->row_array();
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $datos, 'id' => $id['id']));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array('idDireccion_responsable' => $idDireccion_responsable, 'id_Rel_Archivo_Documento' => $idRel));
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return "Error ";
        } else {
            return "Exito ";
        }
    
    }
    public function filtrar_archivos_direccion($filtro){
        $sql = "SELECT DISTINCT A.id,
                A.OrdenTrabajo,
                RAP.preregistro_aceptado ,
                RAP.idDireccion_responsable, 
                RAD.Estatus
                FROM `saaRel_Archivo_Preregistro` AS RAP
                INNER JOIN saaArchivo AS A
                ON A.id = RAP.idArchivo
                INNER JOIN `saaRel_Archivo_Documento` AS RAD
                ON RAD.`id` = RAP.`id_Rel_Archivo_Documento`
               
                WHERE RAD.Estatus <=30 AND A.`eliminacion_logica` = 0  
                AND RAP.idDireccion_responsable = ?
                AND RAP.preregistro_aceptado = 0  
                 ";
        
        $query = $this->db->query($sql, array($filtro));
        return $query;
    }
    
    public function datos_relacion_archivo_preregistro_update_preregistro($data, $idDireccion_responsable, $idArchivo) {
        
        $datos = $data;
        $datos['idDireccion_responsable'] = $idDireccion_responsable;
        $datos['idArchivo'] = $idArchivo;
        //$this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $datos, 'id' => $id));
        $this->db->update('saaRel_Archivo_Preregistro', $data, array('idDireccion_responsable' => $idDireccion_responsable, 'idArchivo' => $idArchivo, 'preregistro_aceptado' => 0));
       return  $this->db->affected_rows();

    
    }
    
    public function update_registro($data, $id){
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $data, 'id' => $id));
        $estado=$this->db->update('saaRel_Archivo_Preregistro', $data, array('id' => $id));
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return "Error ";
        } else {
            return "Exito ";
        }
        
       
        
    }
    
    public function update_registro_autotask($data, $id){
        
        $this->db->update('saaRel_Archivo_Preregistro', $data, array('id' => $id));
     

        
        
       
        
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