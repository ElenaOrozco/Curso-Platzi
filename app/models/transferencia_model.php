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
        $this->log_save(array('Tabla' => 'saaTransferencia_Detalle', 'Data' => $data, 'id' => $id));
     
        return ( $af > 0 )?  1 : -1;
        
    }
    
    public function marcar_revisada($data, $id){
        $this->db->where('id', $id);
        $this->db->update('saaTransferencia', $data); 
        $af = $this->db->affected_rows();
        $this->log_save(array('Tabla' => 'saaTransferencia', 'Data' => $data, 'id' => $id));
     
        return ( $af > 0 )?  1 : -1;
    }
    
    public function ver_datos($id){
        
        $cajas = $this->get_cajas($id)->num_rows();
        $carpetas = $this->get_detalles_transferencia($id)->num_rows();
        
        $data = array(
           'cajas' => $cajas,
           'carpetas' => $carpetas,
        );
        
        return $data;
        
    }

    

    public function editar_identificador($data, $id){
        $this->db->where('id', $id);
        $this->db->update('saaArchivo', $data); 
        $af = $this->db->affected_rows();
        $this->log_save(array('Tabla' => 'saaArchivo', 'Data' => $data, 'id' => $id));
        return ( $af > 0 )?  1 : -1;
        
    }
            
    public function guardar_detalles($data){
        $this -> db -> trans_start (); 
        
       
        
        
        
        for($i=0;$i<count($data);$i++) {
            $id =  $data[$i]['id'];
            $this->db->where('id', $id);
            $this->db->update('saaTransferencia_Detalle', $data[$i]['detalles']); 
            $this->log_save(array('Tabla' => 'saaTransferencia_Detalle', 'Data' => $data[$i]['detalles'], 'id' => $id));
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
    
    public function listado_identificadores(){
        
        $this->db->select(" seccion.*, 
                    serie.id AS ids,
                    serie.`Codigo` AS Codigos,
                    serie.Nombre AS Nombres,
                    sub.id AS idsub,
                    sub.`Codigo`  AS Codigosub,
                    sub.Nombre AS Nombresub,
                    subsub.id AS idsubsub,
                    subsub.Codigo AS Codigosubsub,
                    subsub.Nombre AS Nombresubsub"); 
        $this->db->from("saaSeccion as seccion"); 
        $this->db->join("saaSerie as serie", "seccion.id = serie.idSeccion", "left"); 
        $this->db->join("saaSubserie as sub", "serie.id = sub.idSerie", "left"); 
        $this->db->join("saaSubSubserie as subsub", "sub.id = subsub.idSubserie", "left"); 
        return $this->db->get();   
    }
    
    public function listado_serie(){
        return $this->db->get('saaSerie');  
    }
    
    public function listado_subserie(){
        return $this->db->get('saaSubserie');  
    }
    
    
    public function update_subserie($id, $like){
        
        //$where = "Codigo LIKE '%$like%'";
        
        $this -> db -> set ( 'idSerie' ,  $id ); 
        $this -> db -> like ('Codigo', $like ); 
        $this -> db -> update ( 'saaSubserie' ); 
        
        $aff = $this->db->affected_rows();
       
        if ($aff < 1) {
            return array("retorno" => "-1", "query" => $like.'-'.$id );
        } else {
            return array("retorno" => "1", "query" => $like.'-'.$id );
        }
    }
    
    
    public function update_archivo($like, $data){
        
        
        
        $this->db->where('identificado', $like);
        $this->db->update('saaArchivo', $data);
        
        $aff = $this->db->affected_rows();
        
        if ($aff < 1) {
            return array("retorno" => "-1", "query" => $like.'-'.$data['identificado'] );
        } else {
            return array("retorno" => "1", "query" => $like.'-'.$data['identificado'] );
        }
    }
    
    
    public function update_subsubserie($id, $like){
        
        //$where = "Codigo LIKE '%$like%'";
        
        $this -> db -> set ( 'idSubserie' ,  $id ); 
        $this -> db -> like ('Codigo', $like ); 
        $this -> db -> update ( 'saaSubSubserie' ); 

        $aff = $this->db->affected_rows();
       
        if ($aff < 1) {
            return array("retorno" => "-1", "query" => $like.'-'.$id  );
        } else {
            return array("retorno" => "1", "query" => $like.'-'.$id );
        }
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
    
    public function get_detalles_transferencia($id){
         $this->db->select("d.*, a.OrdenTrabajo, a.Obra, a.idEjercicio");
        $this->db->from('saaTransferencia AS t');
        $this->db->join('saaTransferencia_Caja AS c', 'c.idTransferencia = t.id');
        $this->db->join('saaTransferencia_Detalle AS d', 'c.id = d.idCaja');
        $this->db->join('saaArchivo AS a', 'a.id = d.ot');
        $this->db->where('t.id', $id); 
        
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
        $this->log_save(array('Tabla' => 'saaTransferencia', 'Data' => $data_folio, 'id' => $idTransferencia));
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
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaTransferencia_Caja', 'Data' => $data, 'id' => $registro));
        }
        return ( $af > 0 )?  $idCaja : -1;
       
    }
    
    public function  listado_cuca(){
        $this->db->select(" c.*, s.Nombre, serie.`Nombre` AS Nombres,
                            sub.`Nombre` AS Nombresub,
                            subsub.`Nombre` AS Nombresubsub
                              "); 
        $this->db->from("saaTransferencia_Cuca as c"); 
        $this->db->join("saaSeccion as s", "s.id = c.idSeccion"); 
        $this->db->join("saaSerie as serie", "c.idSerie = serie.id", "left"); 
        $this->db->join("saaSubserie as sub", "sub.id = c.idSubserie", "left"); 
        $this->db->join("saaSubSubserie as subsub", "subsub.id = c.idSubSubserie", "left"); 
        return $this->db->get();   
    }
    

    public function insertar_cuca($data){
       
        
        $this -> db -> insert('saaTransferencia_Cuca', $data);  
        $id = $this-> db-> insert_id ();
        $af = $this->db->affected_rows();
       
        
        if (!empty($id)) {
                $this->log_new(array('Tabla' => 'saaTransferencia_Caja', 'Data' => $data, 'id' => $id));
        }
     
        return ( $af > 0 )?  $id : -1;
       
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
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaTransferencia_Detalle', 'Data' => $data, 'id' => $registro));
        }
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


                $this->db->select(" c.*, s.Nombre, serie.`Nombre` AS Nombres,
                            sub.`Nombre` AS Nombresub,
                            subsub.`Nombre` AS Nombresubsub
                              "); 
                $this->db->from("saaTransferencia_Cuca as c"); 
                $this->db->join("saaSeccion as s", "s.id = c.idSeccion"); 
                $this->db->join("saaSerie as serie", "c.idSerie = serie.id", "left"); 
                $this->db->join("saaSubserie as sub", "sub.id = c.idSubserie", "left"); 
                $this->db->join("saaSubSubserie as subsub", "subsub.id = c.idSubSubserie", "left"); 
                $this->db->where("c.id", $id);
                $this->db->limit(100);
                $query2 = $this->db->get();
                
   
               

            }else{
                $where = "c.identificador like '%$term%'
                        OR s.Nombre like '%$term%'
                        
                        OR serie.`Nombre` like '%$term%'
                        OR sub.`Nombre` like '%$term%'
                        OR subsub.`Nombre` like '%$term%'";
                $this->db->select(" c.*, s.Nombre, serie.`Nombre` AS Nombres,
                            sub.`Nombre` AS Nombresub,
                            subsub.`Nombre` AS Nombresubsub
                              "); 
                $this->db->from("saaTransferencia_Cuca as c"); 
                $this->db->join("saaSeccion as s", "s.id = c.idSeccion"); 
                $this->db->join("saaSerie as serie", "c.idSerie = serie.id", "left"); 
                $this->db->join("saaSubserie as sub", "sub.id = c.idSubserie", "left"); 
                $this->db->join("saaSubSubserie as subsub", "subsub.id = c.idSubSubserie", "left"); 
                $this->db->where($where);
                $this->db->limit(100);
                $query2 = $this->db->get();                    
            }

            if ($query2->num_rows() > 0){


                foreach ($query2->result() as $row ){
                    $aRow["id"] = $row->id;
                    
                    $aRow["text"] = $row->identificador. '-' .$row->Nombre. '-' .$row->Nombres. '-' .$row->Nombresub. '-' .$row->Nombresubsub;
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
        $this->db->select("Obra, idEjercicio, identificado, OrdenTrabajo");
        $this->db->where('id', $ot);  
        return $this->db->get("saaArchivo")->row_array(); 
        
        
    }
    
    public function traer_identificador($id){
        $this->db->select(" c.*, s.Nombre, serie.`Nombre` AS Nombres,
                            sub.`Nombre` AS Nombresub,
                            subsub.`Nombre` AS Nombresubsub
                              "); 
        $this->db->from("saaTransferencia_Cuca as c"); 
        $this->db->join("saaSeccion as s", "s.id = c.idSeccion"); 
        $this->db->join("saaSerie as serie", "c.idSerie = serie.id", "left"); 
        $this->db->join("saaSubserie as sub", "sub.id = c.idSubserie", "left"); 
        $this->db->join("saaSubSubserie as subsub", "subsub.id = c.idSubSubserie", "left"); 
        $this->db->where("c.id", $id);
        return $this->db->get()->row_array(); 
        
        
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