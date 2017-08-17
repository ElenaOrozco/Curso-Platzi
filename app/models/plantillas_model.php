<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plantillas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_plantillas() {
            $sql = 'SELECT * FROM saaPlatillas WHERE Estatus=1 ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }

    
    public function listado_modalidades() {
            $sql = 'SELECT * FROM saaModalidad WHERE Estatus=1 ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }
    
    
    
    public function listado_documentos_plantilla($id) {
            $sql = 'SELECT saaRel_Plantilla_Documento.id,saaDocumentos.Nombre as Documento,
            saaSubTipoProceso.Nombre as SubTipoProceso,saaTipoProceso.Nombre as TipoProceso,saaRel_Plantilla_Documento.ordenar,
            Direcciones.Nombre as Direccion
            FROM 
            ((((saaRel_Plantilla_Documento inner join saaDocumentos on saaRel_Plantilla_Documento.idDocumento = saaDocumentos.id)  
            inner join saaSubTipoProceso on saaDocumentos.idSubTipoProceso = saaSubTipoProceso.id)
            inner join saaTipoProceso on saaSubTipoProceso.idTipoProceso = saaTipoProceso.id)
            LEFT JOIN Direcciones on saaDocumentos.idDireccion_responsable=Direcciones.id)
            WHERE idPlantilla=? ORDER BY saaRel_Plantilla_Documento.ordenar DESC';
            $query = $this->db->query($sql,array($id));
            return $query; 
    }
    
    
    
    public function listado_documentos() {
            $sql = 'SELECT saaDocumentos.id,saaDocumentos.Nombre as Documento,
            saaSubTipoProceso.Nombre as SubTipoProceso,saaTipoProceso.Nombre as TipoProceso    
            FROM 
            ((saaDocumentos inner join saaSubTipoProceso on saaDocumentos.idSubTipoProceso = saaSubTipoProceso.id)
            inner join saaTipoProceso on saaSubTipoProceso.idTipoProceso = saaTipoProceso.id)
            ORDER BY saaDocumentos.id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }
    
    
    public function datos_plantilla($id) {
        $sql = 'SELECT * FROM saaPlatillas WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function datos_modalidad($id) {
        $sql = 'SELECT * FROM saaModalidad WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    
     public function addw_modalidades($full = TRUE){
            if ($full){
                $query = $this->db->get('saaModalidad');
            } else {
                $query = $this->db->get_where('saaModalidad',"Estatus <> 0");
            }
            $addw = array();
            $addw[0] = "No disponible";
            if ($query->num_rows() > 0 ){
                foreach ($query->result() as $row ){
                    $addw[$row->id] = $row->Modalidad;
                }
            }
            return $addw; 
    }
    
    public function addw_plantilla() {
        $query=  $this->db->get('saaPlatillas');
        $addw[0]="No disponible";
        foreach ($query->result() as $row) {
            $addw[$row->id]=$row->Nombre;
        }
        return $addw;
    }

   
    
    public function datos_plantilla_insert($data) {
        
        
        $repetido=  $this->concepto_repetido(strtoupper($data['Nombre']));
        if(!$repetido['ret']){
        $this->db->insert('saaPlatillas', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
       
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaPlatillas', 'Data' => $data, 'id' => $registro));
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
    
    
    
    public function datos_rel_plantilla_documento_insert($data) {
        
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
    
    
    public function datos_plantilla_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaPlatillas', 'Data' => $data, 'id' => $id)); 
         
        $this->db->update('saaPlatillas', $data, array('id' => $id));
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
    
    public function datos_plantilla_delete($id) {
        $this->db->delete('saaPlatillas', array('id' => $id));
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
        $query = $this->db->get_where('saaPlatillas');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Nombre);
        } else
            return array('ret' => false, 'concepto' => 0);
    }
  

    
    public function delete_Rel_plantilla_documento($id) {
       
        $this->db->delete('saaRel_Plantilla_Documento', array('id' => $id));
        
        

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
    
    
    public function get_ultipo_documento_plantilla($id) {
        $sql = 'SELECT * FROM saaRel_Plantilla_Documento WHERE idPlantilla = ? order by saaRel_Plantilla_Documento.ordenar desc limit 1';
        $query = $this->db->query($sql, array($id));
        $ordenar=1;
        if ($query->num_rows()>0){
            $aQuery=$query->row_array();
            $ordenar=$aQuery['ordenar']+10;
        }
        return $ordenar;
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

