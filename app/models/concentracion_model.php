<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class concentracion_model extends CI_Model {

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
                
                //$query2 = $this->db->query('SELECT * FROM archivos_concentracion 
                        //WHERE `saaArchivo`.id = ' .$id .'AND `saaHistorialBloque`.`Estatus`=80');
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
    
    public function detalles_archivo($ot){
        $this->db->select("identificado, FechaExtincionDerechos");
        $this->db->where('id', $ot);  
        return $this->db->get("saaArchivo")->row_array(); 
        
        
    }
    public function fecha_ingreso($ot){
        /* *
        $this->db->select("fecha_ingreso");
        $this->db->distinct();
        $this->db->where('id', $ot);
        $this->db->order_by('fecha_ingreso', 'DESC');
        $this->db->limit(1);
        * */
         
        
        $query = $this->db->query("SELECT DISTINCT fecha_ingreso 
            FROM `saaRel_Archivo_Preregistro`
            WHERE idArchivo = $ot
            ORDER BY fecha_ingreso DESC
            LIMIT 1");

        $row = $query->row_array();
        
        return $row; 
        
        
    }
    
    public function datos_concentracion_insert($data){
        $this->db->insert('saaRel_ArchivoConcentracion_Ubicacion', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();

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
    
    public function capturar_datos_archivo($data, $id){
        $this->db->where('id', $id);
        $this->db->update('saaArchivo', $data);
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return -1;
        } else {
            return 1;
        }
    }
}