<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preregistro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function traer_documentos_direccion($idArchivo, $idSubProceso, $direccion){
        $sql= 'SELECT *
                FROM preregistro
                WHERE idArchivo =?
                AND idSubTipoProceso = ?
                AND (direccion_preregistra = ? OR direccion_preregistra IS  NULL)
                AND (eliminacion_logica = 0 OR eliminacion_logica IS NULL)
               ';
        $query = $this->db->query($sql, array($idArchivo, $idSubProceso, $direccion));
        return $query;
    }

    public function traer_documentos_recibidos($idArchivo, $idSubProceso){
        $sql= 'SELECT *
                FROM preregistro
                WHERE idArchivo =?
                AND idSubTipoProceso = ?
                AND (preregistro_aceptado = 1 OR preregistro_aceptado IS NULL )
                AND (eliminacion_logica = 0 OR eliminacion_logica IS NULL)
                ORDER BY Nombre ASC
               ';
        $query = $this->db->query($sql, array($idArchivo, $idSubProceso));
        return $query;
    }
    
    public function traer_documentos_recibidos_PRE_CID($idArchivo, $idSubProceso){
        $sql= 'SELECT *
                FROM preregistro
                WHERE idArchivo =?
                AND idSubTipoProceso = ?
                
                AND (eliminacion_logica = 0 OR eliminacion_logica IS NULL)
                ORDER BY Nombre ASC
               ';
        $query = $this->db->query($sql, array($idArchivo, $idSubProceso));
        return $query;
    }

    public function traer_documentos_revisar($idArchivo, $idSubProceso){
        $sql= 'SELECT *
                FROM preregistro
                WHERE idArchivo =?
                AND idSubTipoProceso = ?
                AND (recibido_cid = 1 OR recibido_cid IS NULL )
                AND (eliminacion_logica = 0 OR eliminacion_logica IS NULL)
               ';
        $query = $this->db->query($sql, array($idArchivo, $idSubProceso));
        return $query;
    }

    public function traer_documentos_finales($idArchivo, $idSubProceso){
        $sql= 'SELECT *
                FROM preregistro
                WHERE idArchivo =?
                AND idSubTipoProceso = ?
                AND (revisado = 1 OR revisado IS NULL )
                AND (eliminacion_logica = 0 OR eliminacion_logica IS NULL)
               ';
        $query = $this->db->query($sql, array($idArchivo, $idSubProceso));
        return $query;
    }
    
    public function retorna_historial($idArchivo, $Proceso, $idUsuario){
        $this->db->select('*');
        $this->db->where('idArchivo', $idArchivo);
        $this->db->where('idTipoProceso', $Proceso);
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->get('saaHistorialBloque'); 
        
        
    }
    
    public function agregar_historial($data){
        $this->db->insert('saaHistorialBloque', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();

       
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaHistorialBloque', 'Data' => $data, 'id' => $registro));
        }
        
        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "id_registro" => $registro);
        }
    }
    
    
    public function get_subdocumentos($id, $direccion){
        $sql = 'SELECT `saaEstimaciones`.*, `saaSubDocumentos`.`Nombre`
                FROM `saaEstimaciones` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaEstimaciones`.`idRel_Archivo_Documento` = `saaRel_Archivo_Documento`.id
                INNER JOIN `saaSubDocumentos`
                ON `saaSubDocumentos`.id = `saaEstimaciones`.`idSubDocumento`
                WHERE `saaRel_Archivo_Documento`.idArchivo = ?
                AND `saaEstimaciones`.idDireccion_responsable = ?
                ORDER BY Numero_Estimacion, ordenar_subdocumento ASC';
        $query = $this->db->query($sql, array($id, $direccion));
        return $query;

    }
    
    public function aceptar_estimaciones($idRAD, $direccion, $data){
        $this->db->update('saaEstimaciones', $data, array('idDireccion_responsable' => $direccion, 'idRel_Archivo_Documento' => $idRAD, 'preregistro_aceptado' => 0));
       return  $this->db->affected_rows();
    }
    
 }