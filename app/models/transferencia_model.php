<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class transferencia_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    public function editar_detalles($data, $id){
        $this->db->where('id', $id);
        $this->db->update('saaTransferencia_Detalle', $data); 
        $af = $this->db->affected_rows();
     
        return ( $af > 0 )?  1 : -1;
        
    }
            
    public function guardar_detalles($data){
        $this -> db -> trans_start (); 
        
       
        
        
        
        for($i=0;$i<count($data);$i++) {
            $id =  $data[$i]['id'];
            $this->db->where('id', $id);
            $this->db->update('saaTransferencia_Detalle', $data[$i]['detalles']); 
        }
        
        /*
        foreach ($data as $k => $v){
            
            $this->db->where('id', $id);
            $this->db->update('saaTransferencia_Detalle', $detalle); 
        }
         * */
        
        
        $this -> db -> trans_complete ();
        
        return ( $this -> db -> trans_status ()  ===  FALSE )? -1 : 1;
    }

    public function get_transferencia($idTransferencia){
        $this->db->where("id", $idTransferencia); 
        return $this->db->get("saaTransferencia");    
    }
    
    public function get_cajas($idTransferencia){
        $this->db->where("idTransferencia", $idTransferencia);  
        return $this->db->get("saaTransferencia_Caja");   
    }
    
    public function get_detalles($idCaja){
        $this->db->select("a.Obra, a.idEjercicio, d.*");
        $this->db->from("saaTransferencia_Detalle AS d");
        $this->db->join("saaArchivo AS a", "a.id = d.ot", 'left');
        $this->db->where("idCaja" ,$idCaja);
      
        return $this->db->get();
    }

    public function alta_transferencia($data){
       
        $this -> db -> trans_start (); 
        
         //Ingresar datos comunes del registro (cabeceras)
        $this -> db -> insert('saaTransferencia', $data);  
        $idTransferencia = $this-> db-> insert_id ();
        
        
        //Crear Folio e insertar
        $folio = "TR-$idTransferencia";
        $data_folio = array( "folio" => $folio,);
        
        $this->db->where('id', $idTransferencia);
        $this->db->update('saaTransferencia', $data_folio); 
        
        /*Crear caja
        $data_caja = array( "idTransferencia" => $idTransferencia,);
        $this -> db -> insert('saaTransferencia_Caja', $data_caja); 
        */
       
        $this -> db -> trans_complete ();
        
        return ( $this -> db -> trans_status ()  ===  FALSE )? -1 : $idTransferencia;
       
    }
    
    public function agregar_caja($data){
       
        
        $this -> db -> insert('saaTransferencia_Caja', $data);  
        $idCaja = $this-> db-> insert_id ();
        $af = $this->db->affected_rows();
     
        return ( $af > 0 )?  $idCaja : -1;
       
    }
    
    function eliminarFila($idDetalle){
       
        $this -> db -> trans_start (); 
        $this->db->where('id', $idDetalle);
        $this->db->delete('saaTransferencia_Detalle');
        $this -> db -> trans_complete ();
        
        return ( $this -> db -> trans_status ()  ===  FALSE )? -1 : 1;
    }
    
    function eliminarCaja($idCaja){
       
        $this -> db -> trans_start (); 
        $this->db->where('id', $idCaja);
        $this->db->delete('saaTransferencia_Caja');
        
        $this->db->where('idCaja', $idCaja);
        $this->db->delete('saaTransferencia_Detalle');
        
        
        $this -> db -> trans_complete ();
        
        return ( $this -> db -> trans_status ()  ===  FALSE )? -1 : 1;
    }
    
    
    public function agregar_fila($data){
       
        
        $this -> db -> insert('saaTransferencia_Detalle', $data);  
        $idFila = $this-> db-> insert_id ();
        $af = $this->db->affected_rows();
     
        return ( $af > 0 )?  $idFila : -1;
       
    }

    public function listado($direccion){
        $this->db->where("idDireccion" , $direccion);
        $this->db->order_by("id", "DESC");
        return $this->db->get('saaTransferencia');
    }
    
    public function listado_cid(){
        $this->db->order_by("id", "DESC");
        return $this->db->get('saaTransferencia');
    }
    
    

    public function ot_json($term = null, $id = null){
        $aRow = array();
        $return_arr = array();            
        if (!empty($term) || !empty($id)){
            if ($id > 0){


                $this->db->select("id,OrdenTrabajo");
                
                $this->db->order_by("OrdenTrabajo", "ASC");
                $query2 = $this->db->get_where("saaArchivo",array("id" => $id),100);
                
   
                // $query2 = $this->db->get_where("saaArchivo",array("id" => $id),100);

            }else{
                $where = "OrdenTrabajo LIKE '%$term%'
                            AND (OrdenTrabajo LIKE '%-13%'
                            OR OrdenTrabajo LIKE '%-14%'
                            OR OrdenTrabajo LIKE '%-15%')";

                $this->db->select("id,OrdenTrabajo");
                $this->db->where($where);
                /*$this->db->like("OrdenTrabajo",$term);
                $this->db->order_by("OrdenTrabajo", "ASC");*/
                
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
    
    public function identificador_json($term = null, $id = null){
        $aRow = array();
        $return_arr = array();            
        if (!empty($term) || !empty($id)){
            if ($id > 0){


                $this->db->select("id,Nombre,Codigo");
                
                $this->db->order_by("Nombre", "ASC");
                $query2 = $this->db->get_where("saaSeccion",array("id" => $id),100);
                
   
               

            }else{
               
                $this->db->select("id, Nombre,Codigo");
                $this->db->like("Nombre",$term);
                $this->db->order_by("Nombre", "ASC");
                $query2 = $this->db->get("saaSeccion",100);                    
            }

            if ($query2->num_rows() > 0){


                foreach ($query2->result() as $row ){
                    $aRow["id"] = $row->id;
                    $aRow["text"] = $row->Codigo. '-' .$row->Nombre;
                    $return_arr["results"][] = $aRow;
                }
            }else{
                $aRow["id"] = "newremit";
                $aRow["text"] = 'No se encontro Clasificador';
                $return_arr["results"][] = $aRow;
            }
        }else{
            $aRow["id"] = "";
            $aRow["text"] = "";
            $return_arr["results"][] = $aRow;
        } 
        return $return_arr; 
    }
    
    public function traer_detalles($ot){
        $this->db->select("Obra, idEjercicio");
        $this->db->where('id', $ot);  
        return $this->db->get("saaArchivo")->row_array(); 
        
        
    }
}