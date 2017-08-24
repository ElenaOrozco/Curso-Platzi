<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class observaciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function datos_observacion_update($data, $id){
        
        $this->log_save(array('Tabla' => 'saaObservaciones_Archivo', 'Data' => $data, 'id' => $id));
        $this->db->where('id', $id);
        $this->db->update('saaObservaciones_Archivo', $data);
        
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
    
    public function datos_observacion_documento_update($data, $id){
        
        $this->log_save(array('Tabla' => 'saaObservaciones_Documento', 'Data' => $data, 'id' => $id));
        $this->db->where('id', $id);
        $this->db->update('saaObservaciones_Documento', $data);
        
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
    
    public function datos_observacion_documento_por_id($id) {
        $sql = 'SELECT `saaObservaciones_Documento`.* ,
                `saaArchivo`.`OrdenTrabajo`,
                `saaDocumentos`.`Nombre`
                FROM `saaObservaciones_Documento`
                INNER JOIN 
                `saaArchivo` 
                ON `saaArchivo`.`id`=`saaObservaciones_Documento`.`idArchivo`
                INNER JOIN `saaDocumentos`
                ON `saaDocumentos`.`id` =`saaObservaciones_Documento`.`idDocumento`
                WHERE  `saaObservaciones_Documento`.id  = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    
    public function datos_observacion($id) {
        $sql = 'SELECT  `saaObservaciones_Archivo`.id,
                        `saaObservaciones_Archivo`.idArchivo, 
                        `saaObservaciones_Archivo`.`Motivo`, 
                        `saaObservaciones_Archivo`.`Fecha`,
                        `saaObservaciones_Archivo`.`Respuesta`,
                        `saaArchivo`.`OrdenTrabajo`,
                        `saaArchivo`.`Contrato`,
                        `saaArchivo`.obra
                FROM `saaObservaciones_Archivo` 
                INNER JOIN `saaArchivo`
                ON `saaArchivo`.id = `saaObservaciones_Archivo`.`idArchivo` 
                WHERE `saaObservaciones_Archivo`.id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function datos_observacion_documento($id) {
        $sql = 'SELECT  `saaObservaciones_Documento`.id,
                        `saaObservaciones_Documento`.idArchivo, 
                        `saaObservaciones_Documento`.`Motivo`, 
                        `saaObservaciones_Documento`.`Fecha`,
                        `saaObservaciones_Documento`.`Respuesta`,
                        `saaArchivo`.`OrdenTrabajo`,
                        `saaArchivo`.`Contrato`,
                        `saaArchivo`.obra
                FROM `saaObservaciones_Documento` 
                INNER JOIN `saaArchivo`
                ON `saaArchivo`.id = `saaObservaciones_Documento`.`idArchivo` 
                WHERE `saaObservaciones_Documento`.id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function listado_observaciones_archivo($id) {
        $sql = 'SELECT  *
                FROM `saaObservaciones_Archivo` 
                
                WHERE `saaObservaciones_Archivo`.idArchivo = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    
    public function listado_observaciones_documento($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento) {
        $sql = 'SELECT  * 
                FROM `saaObservaciones_Documento` 
                WHERE idArchivo = ?
                        AND idTipoProceso =?
                        AND idsubTipoProceso =?
                        AND idDocumento = ? 
                        AND eliminacion_logica= 0
                        ORDER BY id DESC';
        $query = $this->db->query($sql, array($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento));
        return $query;
    }
    
    
    public function listado_observaciones_documento_totales() {
        $sql = 'SELECT `saaObservaciones_Documento`.* ,
                `saaArchivo`.`OrdenTrabajo`,
                `saaDocumentos`.`Nombre`
                FROM `saaObservaciones_Documento`
                INNER JOIN 
                `saaArchivo` 
                ON `saaArchivo`.`id`=`saaObservaciones_Documento`.`idArchivo`
                INNER JOIN `saaDocumentos`
                ON `saaDocumentos`.`id` =`saaObservaciones_Documento`.`idDocumento`
                WHERE  `saaObservaciones_Documento`.eliminacion_logica = 0
                        ORDER BY id DESC';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function listado_observaciones_documento_enlaces($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento) {
        $sql = 'SELECT  * 
                FROM `saaObservaciones_Documento` 
                WHERE idArchivo = ?
                        AND idTipoProceso =?
                        AND idsubTipoProceso =?
                        AND idDocumento = ? 
                        AND tipo_usuario =1
                        AND eliminacion_logica = 0
                        AND leido = 0 AND Respuesta IS NULL
                        ORDER BY id DESC ';
        $query = $this->db->query($sql, array($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento));
        return $query;
    }
    
    public function listado_observaciones_documento_enlaces_totales() {
        $sql = 'SELECT `saaObservaciones_Documento`.* ,
                `saaArchivo`.`OrdenTrabajo`,
                `saaDocumentos`.`Nombre`
                FROM `saaObservaciones_Documento`
                INNER JOIN 
                `saaArchivo` 
                ON `saaArchivo`.`id`=`saaObservaciones_Documento`.`idArchivo`
                INNER JOIN `saaDocumentos`
                ON `saaDocumentos`.`id` =`saaObservaciones_Documento`.`idDocumento`
                WHERE tipo_usuario =1
                        AND `saaObservaciones_Documento`.eliminacion_logica = 0
                        AND leido = 0 AND Respuesta IS NULL
                        ORDER BY id DESC ';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function listado_observaciones_documento_enlaces_vistos($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento){
        $sql = 'SELECT  * 
                FROM `saaObservaciones_Documento` 
                WHERE idArchivo = ?
                        AND idTipoProceso =?
                        AND idsubTipoProceso =?
                        AND idDocumento = ? 
                        AND tipo_usuario =1
                        AND eliminacion_logica = 0
                        AND leido = 1
                        ORDER BY id DESC ';
        $query = $this->db->query($sql, array($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento));
        return $query;
    }
    
    public function listado_observaciones_documento_enlaces_vistos_totales(){
        $sql = 'SELECT `saaObservaciones_Documento`.* ,
                `saaArchivo`.`OrdenTrabajo`,
                `saaDocumentos`.`Nombre`
                FROM `saaObservaciones_Documento`
                INNER JOIN 
                `saaArchivo` 
                ON `saaArchivo`.`id`=`saaObservaciones_Documento`.`idArchivo`
                INNER JOIN `saaDocumentos`
                ON `saaDocumentos`.`id` =`saaObservaciones_Documento`.`idDocumento`
                WHERE tipo_usuario =1
                        AND `saaObservaciones_Documento`.eliminacion_logica = 0
                        AND leido = 1 OR Respuesta IS NOT NULL
                        ORDER BY id DESC ';
        $query = $this->db->query($sql);
        return $query;
    }

    public function listado_observaciones_documento_cid($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento) {
        $sql = 'SELECT  * 
                FROM `saaObservaciones_Documento` 
                WHERE idArchivo = ?
                        AND idTipoProceso =?
                        AND idsubTipoProceso =?
                        AND idDocumento = ? 
                        AND tipo_usuario =0
                        AND eliminacion_logica = 0
                        ORDER BY id DESC ';
        $query = $this->db->query($sql, array($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento));
        return $query;
    }
    
    public function listado_observaciones_documento_cid_totales() {
        $sql = 'SELECT `saaObservaciones_Documento`.* ,
                `saaArchivo`.`OrdenTrabajo`,
                `saaDocumentos`.`Nombre`
                FROM `saaObservaciones_Documento`
                INNER JOIN 
                `saaArchivo` 
                ON `saaArchivo`.`id`=`saaObservaciones_Documento`.`idArchivo`
                INNER JOIN `saaDocumentos`
                ON `saaDocumentos`.`id` =`saaObservaciones_Documento`.`idDocumento`
                WHERE tipo_usuario =0
                        AND `saaObservaciones_Documento`.eliminacion_logica = 0
                        ORDER BY id DESC ';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function listado_observaciones_documento_direccion($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento, $direccion) {
        $sql = 'SELECT  * 
                FROM `saaObservaciones_Documento` 
                WHERE idArchivo = ?
                        AND idTipoProceso =?
                        AND idsubTipoProceso =?
                        AND idDocumento = ?
                        AND idDireccion_responsable = ?
                        ORDER BY id DESC ';
        $query = $this->db->query($sql, array($idArchivo, $idTipoProceso, $idSubTipoProceso, $idDocumento, $direccion));
        return $query;
    }
    
    public function total_listado_observaciones_documentos() {
        $sql = ' SELECT `saaObservaciones_Documento`.*,
                                `saaArchivo`.`OrdenTrabajo`,
                                `saaArchivo`.`Contrato`,
                                `saaArchivo`.obra
                        FROM `saaObservaciones_Documento` 
                        INNER JOIN `saaArchivo`
                        ON `saaArchivo`.id = `saaObservaciones_Documento`.`idArchivo`
			
                        ORDER BY `saaObservaciones_Documento`.idArchivo, 
                        `saaObservaciones_Documento`.`idTipoProceso`,
                        `saaObservaciones_Documento`.`idSubTipoProceso`,
                        `saaObservaciones_Documento`.`idDocumento`
                         ASC';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function listado_observaciones_por_direccion_responsable_por_responder($id){
        $sql = 'SELECT `saaObservaciones_Documento`.*,
                                `saaArchivo`.`OrdenTrabajo`,
                                `saaArchivo`.`Contrato`,
                                `saaArchivo`.obra
                        FROM `saaObservaciones_Documento` 
                        INNER JOIN `saaArchivo`
                        ON `saaArchivo`.id = `saaObservaciones_Documento`.`idArchivo`
                        WHERE 
                        
                       saaObservaciones_Documento.`tipo_observacion` =1
                        AND tipo_usuario= 0 AND
                        direccion_respuesta = ?
                        AND Respuesta IS NULL
                        ORDER BY `saaObservaciones_Documento`.idArchivo, 
                        `saaObservaciones_Documento`.`idTipoProceso`,
                        `saaObservaciones_Documento`.`idSubTipoProceso`,
                        `saaObservaciones_Documento`.`idDocumento`
                         ASC';
        $query = $this->db->query($sql ,array($id));
        return $query;
    }

        public function total_listado_observaciones_archivo() {
        $sql = 'SELECT `saaObservaciones_Archivo`.*, `saaArchivo`.`OrdenTrabajo`, `saaArchivo`.`Contrato`, `saaArchivo`.obra 
                FROM `saaObservaciones_Archivo` 
                INNER JOIN `saaArchivo` 
                ON `saaArchivo`.id = `saaObservaciones_Archivo`.`idArchivo` 
                ORDER BY `saaObservaciones_Archivo`.idArchivo ASC';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function agregar_observaciones_por_archivo($data){
        
        
        $this->db->insert('saaObservaciones_Archivo',$data);
        
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaObservaciones_Archivo', 'Data' => $data, 'id' => $registro));
        }
            
        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            print_r($e);
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $registro);
        }
    }
    
    public function agregar_observaciones_por_documento($data){
        
        
        $this->db->insert('saaObservaciones_Documento',$data);
        
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaObservaciones_Documento', 'Data' => $data, 'id' => $registro));
        }
        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            print_r($e);
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $registro);
        }
    }
    
    
    public function observaciones_documento_update($data, $id){
        
        $this->log_save(array('Tabla' => 'saaObservaciones_Documento', 'Data' => $data, 'id' => $id));
        $this->db->update('saaObservaciones_Documento', $data, array("id" => $id));
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return false;
        } else {
            return true;
        }
    }

    public function listado_observaciones_por_direccion_responsable($idDireccion_responsable){
        $sql = 'SELECT `saaObservaciones_Documento`.*,
                                `saaArchivo`.`OrdenTrabajo`,
                                `saaArchivo`.`Contrato`,
                                `saaArchivo`.obra
                        FROM `saaObservaciones_Documento` 
                        INNER JOIN `saaArchivo`
                        ON `saaArchivo`.id = `saaObservaciones_Documento`.`idArchivo`
                        WHERE `saaObservaciones_Documento`.idDireccion_responsable = ?
                        AND saaObservaciones_Documento.`tipo_usuario`=1
                        AND saaObservaciones_Documento.`tipo_observacion` =1
                        AND Respuesta IS NOT NULL
                        AND leido = 0
                        ORDER BY `saaObservaciones_Documento`.idArchivo, 
                        `saaObservaciones_Documento`.`idTipoProceso`,
                        `saaObservaciones_Documento`.`idSubTipoProceso`,
                        `saaObservaciones_Documento`.`idDocumento`
                         ASC';
        $query = $this->db->query($sql, array($idDireccion_responsable));
        /* foreach ($query->result() as $rHistorial) {
            echo $rHistorial->OrdenTrabajo;
         }
         exit();*/
        return $query;
    }
    
    public function listado_observaciones_documento_por_archivo($idArchivo){
        $sql = 'SELECT `saaObservaciones_Documento`.id,
                                `saaObservaciones_Documento`.idArchivo, 
                                `saaObservaciones_Documento`.`Motivo`, 
                                `saaObservaciones_Documento`.`Fecha`,
                                `saaObservaciones_Documento`.`idUsuario`,
                                `saaObservaciones_Documento`.`Respuesta`,
                                `saaObservaciones_Documento`.`idTipoProceso`,
                                `saaObservaciones_Documento`.`idSubTipoProceso`,
                                `saaObservaciones_Documento`.`idDocumento`,
                                `saaArchivo`.`OrdenTrabajo`,
                                `saaArchivo`.`Contrato`,
                                `saaArchivo`.obra
                        FROM `saaObservaciones_Documento` 
                        INNER JOIN `saaArchivo`
                        ON `saaArchivo`.id = `saaObservaciones_Documento`.`idArchivo`
                        WHERE `saaObservaciones_Documento`.idArchivo = ?
                        ORDER BY  
                        `saaObservaciones_Documento`.`idTipoProceso`,
                        `saaObservaciones_Documento`.`idSubTipoProceso`,
                        `saaObservaciones_Documento`.`idDocumento`
                         ASC';
        $query = $this->db->query($sql, array($idArchivo));
        /* foreach ($query->result() as $rHistorial) {
            echo $rHistorial->OrdenTrabajo;
         }
         exit();*/
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
