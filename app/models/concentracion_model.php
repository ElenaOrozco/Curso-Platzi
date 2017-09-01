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
    
    public function fecha_ingreso_ot($ot){
        $this->db->select("fecha_ingreso");
        $this->db->get_where("saaRel_Archivo_Preregistro",array("idArchivo" => $id),100);
        $this->db->order_by("OrdenTrabajo", "ASC");
        $query2 = $this->db->get("saaArchivo",100); 
    }
}