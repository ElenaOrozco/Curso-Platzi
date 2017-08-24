<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proyectos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    public function ot_json($term = null, $id = null){
            $aRow = array();
            $return_arr = array();            
            if (!empty($term) || !empty($id)){
                if ($id > 0){
                    
                    
                    $this->db->select("id,OrdenTrabajo");
                    $this->db->order_by("OrdenTrabajo", "ASC");
                    $query2 = $this->db->get_where("saaArchivo",array("id" => $id),100);
                  
                }else{
                    
                    
                    $this->db->select("id,OrdenTrabajo");
                    $this->db->like("OrdenTrabajo",$term);
                    $this->db->order_by("OrdenTrabajo", "ASC");
                    $query2 = $this->db->get("saaArchivo",100);                    
                }
                
                if ($query2->num_rows() > 0){
                    
                    
                    foreach ($query2->result() as $row ){
                        $aRow["id"] = $row->id;
                        $aRow["text"] = $row->OrdenTrabajo;
                        $return_arr["results"][] = $aRow;
                    }
                }else{
                    $aRow["id"] = "newremit";
                    $aRow["text"] = 'No se encontro OT';
                    $return_arr["results"][] = $aRow;
                }
            }else{
                $aRow["id"] = "";
                $aRow["text"] = "";
                $return_arr["results"][] = $aRow;
            } 
            return $return_arr; 
        }
        
    
    public function buscar_ubicacion_disponible($cm){
        $sql = 'SELECT * FROM `saaUbicacion_Proyecto`
                WHERE cm_utilizados < 86- ?
                AND eliminacion_logica = 0
                ORDER BY no_isla, columna , fila ASC
                LIMIT 1';
        $query = $this->db->query($sql, array($cm));
        return $query;
    
    }
    
    public function asignar_ubicacion($data){
        $this->db->insert('saaRel_Proyecto_Ubicacion', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Proyecto_Ubicacion', 'Data' => $data, 'id' => $registro));
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
    
    public function no_proyectos_anaquel($id) {
        $sql = 'SELECT id FROM saaRel_Proyecto_Ubicacion WHERE idUbicacion = ? AND eliminacion_logica=0';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function listado(){
        $sql = 'SELECT `saaRel_Proyecto_Ubicacion`.* ,
	`saaUbicacion_Proyecto`.`no_isla`,
	`saaUbicacion_Proyecto`.`columna`,
	`saaUbicacion_Proyecto`.`fila`,
                `saaArchivo`.`OrdenTrabajo`,
                `saaArchivo`.`Contrato`,
                `saaArchivo`.`Obra`,
                `saaArchivo`.`Descripcion`
                
                 FROM  `saaUbicacion_Proyecto`
                 INNER JOIN saaRel_Proyecto_Ubicacion
                 ON `saaUbicacion_Proyecto`.id = `saaRel_Proyecto_Ubicacion`.`idUbicacion`
                 INNER JOIN `saaArchivo`
                 ON `saaArchivo`.id= `saaRel_Proyecto_Ubicacion`.`idArchivo`
                 WHERE `saaRel_Proyecto_Ubicacion`.`eliminacion_logica` = 0
                 ORDER BY  `saaRel_Proyecto_Ubicacion`.`idUbicacion` ASC';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function datos_asignacion($id){
        $sql = 'SELECT * FROM `saaRel_Proyecto_Ubicacion`
		WHERE id= ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }

    public function datos_ubicacion_update($id, $data){
            $this->log_save(array('Tabla' => 'saaRel_Proyecto_Ubicacion', 'Data' => $data, 'id' => $id));
            $this->db->where('id', $id);
            $this->db->update('saaRel_Proyecto_Ubicacion', $data);
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
               
                return array("retorno" => "1", "registro" => $id);
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
        