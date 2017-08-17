<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documentos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado() {
        //$sql = 'SELECT * FROM saaDocumentos where Estatus=1  ORDER BY id desc';
        //$query = $this->db->query($sql);
        //return $query;
        
        
         /*$sql = 'SELECT saaDocumentos.id,saaDocumentos.Nombre , saaDocumentos.Es_Estimacion, saaDocumentos.Es_Prorroga,
            saaSubTipoProceso.Nombre as SubTipoProceso,saaTipoProceso.Nombre as TipoProceso    
            FROM 
            ((saaDocumentos inner join saaSubTipoProceso on saaDocumentos.idSubTipoProceso = saaSubTipoProceso.id)
            inner join saaTipoProceso on saaSubTipoProceso.idTipoProceso = saaTipoProceso.id)
            ORDER BY saaDocumentos.id DESC';*/
         $sql = 'SELECT saaDocumentos.id,saaDocumentos.Nombre , saaDocumentos.Es_Estimacion, saaDocumentos.Es_Prorroga,
                    saaSubTipoProceso.Nombre AS SubTipoProceso,saaTipoProceso.Nombre AS TipoProceso,Direcciones.Nombre as Direccion    
                    FROM 
                    (((saaDocumentos LEFT JOIN saaSubTipoProceso ON saaDocumentos.idSubTipoProceso = saaSubTipoProceso.id)
                    LEFT JOIN saaTipoProceso ON saaSubTipoProceso.idTipoProceso = saaTipoProceso.id) 
                    LEFT JOIN Direcciones on saaDocumentos.idDireccion_responsable=Direcciones.id)  
                    WHERE saaDocumentos.Estatus=1
                    ORDER BY saaDocumentos.id DESC';
            $query = $this->db->query($sql);
            return $query; 
        
        
    }
    
    public function listado_documentos_por_proceso($idProceso){
        $sql = 'SELECT saaDocumentos.id,saaDocumentos.Nombre , saaDocumentos.Es_Estimacion, saaDocumentos.Es_Prorroga,
            saaSubTipoProceso.Nombre AS SubTipoProceso, saaSubTipoProceso.id AS idSubproceso, saaTipoProceso.Nombre AS TipoProceso, saaTipoProceso.id AS idProceso     
            FROM 
            ((saaDocumentos INNER JOIN saaSubTipoProceso ON saaDocumentos.idSubTipoProceso = saaSubTipoProceso.id)
            INNER JOIN saaTipoProceso ON saaSubTipoProceso.idTipoProceso = saaTipoProceso.id) 
            WHERE saaDocumentos.Estatus=1 AND saaTipoProceso.id= ?
            ORDER BY saaSubTipoProceso.id ASC';
            $query = $this->db->query($sql, array($idProceso));
            return $query; 
    }

    
    public function datos_documento($id) {
        $sql = 'SELECT `saaDocumentos`.* , 
                `Direcciones`.`id` AS idDireccion,
                `Direcciones`.`Nombre` AS NombreDir
                FROM `saaDocumentos`
                LEFT JOIN `Direcciones`
                ON
                `Direcciones`.id = `saaDocumentos`.`idDireccion_responsable` 
                WHERE `saaDocumentos`.id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function addw_documento() {
        $query=  $this->db->get('saaDocumentos');
        $addw[0]="No disponible";
        foreach ($query->result() as $row) {
            $addw[$row->id]=$row->Nombre;
        }
        return $addw;
    }

   
    
    public function datos_documento_insert($data) {
        
        $this->db->insert('saaDocumentos', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaDocumentos', 'Data' => $data, 'id' => $registro));
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
    
    public function datos_documento_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaDocumentos', 'Data' => $data, 'id' => $id));
        
        $this->db->update('saaDocumentos', $data, array('id' => $id));
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
    
    public function datos_documento_delete($id) {
        $data = array(
            'Estatus' => 0
        );
        $this->db->update('saaDocumentos',$data ,array('id'=>$id));
        //$this->db->delete('saaDocumentos', array('id' => $id));
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
        $query = $this->db->get_where('saaDocumentos');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Nombre);
        } else
            return array('ret' => false, 'concepto' => 0);
    }
  

     public function listado_subtipoproceso(){
            $sql = 'SELECT saaSubTipoProceso.id,saaSubTipoProceso.Nombre as subtipoproceso,saaTipoProceso.Nombre as tipoproceso FROM saaSubTipoProceso inner join saaTipoProceso  
            on saaSubTipoProceso.idTipoProceso = saaTipoProceso.id ';
            $query = $this->db->query($sql);
            return $query;       
        }
        
     public function listado_direcciones(){
            $sql = 'SELECT Direcciones.*  FROM Direcciones';
            $query = $this->db->query($sql);
            return $query;       
        }
        
        
        
    public function dato_subtipoproceso($id){
            $sql = 'SELECT saaSubTipoProceso.id,saaSubTipoProceso.Nombre as subtipoproceso,saaTipoProceso.Nombre as tipoproceso FROM saaSubTipoProceso inner join saaTipoProceso  
            on saaSubTipoProceso.idTipoProceso = saaTipoProceso.id where saaSubTipoProceso.id=? ';
            $query = $this->db->query($sql,array($id));
            return $query;       
    }
    
    public function datos_direccion($id){
            $sql = 'SELECT Direcciones.*  FROM Direcciones where Direcciones.id=? ';
            $query = $this->db->query($sql,array($id));
            return $query;       
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


