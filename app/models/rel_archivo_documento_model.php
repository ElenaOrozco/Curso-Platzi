<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rel_archivo_documento_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_relacion_archivo_documentos() {
        //listar activos
        //$sql = 'SELECT * FROM saaModalidad WHERE Estatus=1 ORDER BY id ASC';
        //listar todos
        $sql = 'SELECT * FROM saaRel_Archivo_Documento
                WHERE eliminacion_logica = 0';
        $query = $this->db->query($sql);
        return $query; 
    }

    
    public function agregar_relacion_archivo_documento($data){
        
        $repetido =  $this->concepto_repetido($data['idDocumento'],$data['idArchivo'] );

        if(!$repetido['ret']){
        $this->db->insert('saaRel_Archivo_Documento', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        

        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $registro));
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
         return array("retorno" => "-1", "error" => 'Proceso repetida');   
        }
        
    }
    
    public function eliminar_relacion_archivo_documento($id){
        $this->db->delete('saaRel_Archivo_Documento', array('id' => $id)); 
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        //$this->db->db_debug = $oldv; 

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
    
    public function eliminar_relacion_archivo_documento_por_Archivo($idArchivo){
        $data = array(
            'eliminacion_logica' => 1,
        );
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento(eliminacion_por Archivo id = idArchivo)', 'Data' => $data, 'id' => $id));
        
        
        $this->db->update('saaRel_Archivo_Documento', $data, array('idArchivo' => $idArchivo));
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
      

        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            //echo 'Error';
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
            //echo 'bien';
        }
        
        
        
       

    }
    
    

    public function concepto_repetido($idDocumento, $idArchivo) {
        $this->db->where('idDocumento', $idDocumento);
        $this->db->where('idArchivo', $idArchivo);
        $query = $this->db->get_where('saaRel_Archivo_Documento');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->idDocumento);
        } else
            return array('ret' => false, 'concepto' => 0);
    }

    public function documentos_recibidos($id){
        $sql = 'SELECT * FROM saaRel_Archivo_Documento 
                WHERE `saaRel_Archivo_Documento`.idArchivo=? 
                AND  `saaRel_Archivo_Documento`.copia = 1';
        $query = $this->db->query($sql, array($id));
        return $query;
    }

    public function datos_relacion_archivo_documento($id) {
        $sql = 'SELECT * FROM saaRel_Archivo_Documento WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    
    public function datos_relacion_archivo_documento_ubicacion_fisica($Ubicacion_fisica) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE Ubicacion_fisica = ?';
        $query = $this->db->query($sql, array($Ubicacion_fisica));
        return $query;
    }
    
    
   
    public function listado_registros_revisados_por_sub_tipo_proceso($idArchivo,$idSubTipoProceso) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE idArchivo=? and idSubTipoProceso = ? and revisado=1';
        $query = $this->db->query($sql, array($idArchivo,$idSubTipoProceso));
        return $query;
    }
    
    public function listado_registros_revisados_por_tipo_proceso($idArchivo,$idTipoProceso) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE idArchivo=? and  idTipoProceso = ? and revisado=1';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso));
        return $query;
    }

    
    public function listado_registros_revisados_por_sub_tipo_proceso_total($idArchivo,$idSubTipoProceso) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE idArchivo=? and idSubTipoProceso = ? ';
        $query = $this->db->query($sql, array($idArchivo,$idSubTipoProceso));
        return $query;
    }
    
    public function listado_registros_revisados_por_tipo_proceso_total($idArchivo,$idTipoProceso) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE idArchivo=? and  idTipoProceso = ? ';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso));
        return $query;
    }
    
    
    public function listado_registros_preregistrados_por_sub_tipo_proceso($idArchivo,$idSubTipoProceso) {
        $sql = 'SELECT  `saaRel_Archivo_Preregistro`.* , saaRel_Archivo_Documento.`idTipoProceso`
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN saaRel_Archivo_Documento
                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                 WHERE saaRel_Archivo_Documento.idArchivo=? AND  saaRel_Archivo_Documento.idSubTipoProceso=?
                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND saaRel_Archivo_Preregistro.preregistro_aceptado=1';
        $query = $this->db->query($sql, array($idArchivo,$idSubTipoProceso));
        return $query;
    }
    
    public function listado_registros_preregistrados_por_tipo_proceso($idArchivo,$idTipoProceso) {
        $sql = 'SELECT  `saaRel_Archivo_Preregistro`.* , saaRel_Archivo_Documento.`idTipoProceso`
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN saaRel_Archivo_Documento
                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                 WHERE saaRel_Archivo_Documento.idArchivo=? AND  saaRel_Archivo_Documento.idTipoProceso=?
                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND saaRel_Archivo_Preregistro.preregistro_aceptado=1';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso));
        return $query;
    }
    
    public function listado_registros_preregistrados_por_sub_tipo_proceso_preregistro($idArchivo,$idSubTipoProceso, $idDireccion_responsable) {
        $sql = 'SELECT  `saaRel_Archivo_Preregistro`.* , saaRel_Archivo_Documento.`idTipoProceso`
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN saaRel_Archivo_Documento
                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                 WHERE saaRel_Archivo_Documento.idArchivo=? AND  saaRel_Archivo_Documento.idSubTipoProceso=?
                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND saaRel_Archivo_Preregistro.idDireccion_responsable= ?';
        $query = $this->db->query($sql, array($idArchivo,$idSubTipoProceso, $idDireccion_responsable));
        return $query;
    }
    
    public function listado_registros_preregistrados_por_tipo_proceso_preregistro($idArchivo,$idTipoProceso, $idDireccion_responsable) {
        $sql = 'SELECT  `saaRel_Archivo_Preregistro`.* , saaRel_Archivo_Documento.`idTipoProceso`
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN saaRel_Archivo_Documento
                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                 WHERE saaRel_Archivo_Documento.idArchivo=? AND  saaRel_Archivo_Documento.idTipoProceso=?
                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND saaRel_Archivo_Preregistro.idDireccion_responsable = ?';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso, $idDireccion_responsable));
        return $query;
    }
    
    
    public function listado_registros_recibido_por_sub_tipo_proceso($idArchivo,$idSubTipoProceso) {
        $sql = 'SELECT DISTINCT `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento` , saaRel_Archivo_Documento.`idTipoProceso`
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN saaRel_Archivo_Documento
                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                 WHERE saaRel_Archivo_Documento.idArchivo=? AND  saaRel_Archivo_Documento.idSubTipoProceso=?
                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND `saaRel_Archivo_Preregistro`.recibido_cid=1';
        $query = $this->db->query($sql, array($idArchivo,$idSubTipoProceso));
        return $query;
    }
    
    public function listado_registros_recibido_por_tipo_proceso($idArchivo,$idTipoProceso) {
        $sql = 'SELECT DISTINCT `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento` , saaRel_Archivo_Documento.`idTipoProceso`
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN saaRel_Archivo_Documento
                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                 WHERE saaRel_Archivo_Documento.idArchivo=? AND  saaRel_Archivo_Documento.idTipoProceso=?
                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND `saaRel_Archivo_Preregistro`.recibido_cid=1';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso));
        return $query;
    }
     
    
    
    public function listado_registros_recibido_por_sub_tipo_proceso_total($idArchivo,$idSubTipoProceso) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE idArchivo=? and idSubTipoProceso = ? ';
        $query = $this->db->query($sql, array($idArchivo,$idSubTipoProceso));
        return $query;
    }
    
    public function listado_registros_recibido_por_tipo_proceso_total($idArchivo,$idTipoProceso) {
        $sql = 'SELECT id FROM saaRel_Archivo_Documento WHERE idArchivo=? and  idTipoProceso = ? ';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso));
        return $query;
    }
    
    
    public function addw_ubiacion_fisica() {
        $sql = 'SELECT  id FROM saaArchivo   ';
        $qArchivo = $this->db->query($sql);
        
        $addw = array();
        foreach ($qArchivo->result() as $row_archivo) {
            $sql = 'SELECT DISTINCT idTipoProceso,Estatus,Ubicacion_fisica FROM saaRel_Archivo_Documento WHERE idArchivo=?  ';
            $query = $this->db->query($sql, array($row_archivo->id));

            if ($query->num_rows() > 0) {
                $Ubicacion_fisica="";
                foreach ($query->result() as $row) {
                    if ($Ubicacion_fisica==""){
                        $Ubicacion_fisica=$row->Ubicacion_fisica;
                    }else{
                         $Ubicacion_fisica.="," .$row->Ubicacion_fisica;
                    }
                }
                
                $addw[$row_archivo->id] = $Ubicacion_fisica;
            }
        }
        return $addw;
        
        
        
    }

    public function get_documentos_subproceso($idArchivo, $idSubTipoProceso){
        
        $sql = 'SELECT * FROM 
            `saarel_archivo_documento`
            WHERE idArchivo = ? AND idSubTipoProceso= ?
                ORDER BY Ordenar asc';
        $query = $this->db->query($sql, array($idArchivo, $idSubTipoProceso));
        return $query;
    }
    
    public function get_procesos_por_archivo($idArchivo){
        $sql = 'SELECT  DISTINCT idTipoProceso, Estatus 
                FROM `saaRel_Archivo_Documento`
                WHERE idArchivo = ?
                ';
        $query = $this->db->query($sql, array($idArchivo));
        return $query;
    }

    

    public function  datos_relacion_archivo_documento_insert($data) {
        
        
            $this->db->insert('saaRel_Archivo_Documento', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
            
            
            if (!empty($registro)) {
                    $this->log_new(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $registro));
            }
            
            if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $registro));
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
    
    public function datos_relacion_archivo_documento_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $id));
        
        //$this->db->where('id', $id);
        //$this->db->update('saatipoproceso', $data);
        $this->db->update('saaRel_Archivo_Documento', $data, array('id' => $id));
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
            //echo 'Error';
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
            //echo 'bien';
        }
        
        //exit();
    
    }
    
    
    public function datos_relacion_archivo_documento_update_por_archivo($data, $idArchivo) {
        
       $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento(update_por Archivo id = idArchivo)', 'Data' => $data, 'id' => $id));
        
        //$this->db->where('id', $id);
        //$this->db->update('saatipoproceso', $data);
        $this->db->update('saaRel_Archivo_Documento', $data, array('idArchivo' => $idArchivo));
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
            //echo 'Error';
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
            //echo 'bien';
        }
        
        //exit();
    
    }
    
    
    function update_rel_archivo_documento_aceptar_preregistro($idArchivo, $idDireccion_responsable, $data){
        
        $data = array (
            'idArchivo' => $idArchivo,
             'idDireccion_responsable' => $idDireccion_responsable, 
            'Estatus'=>10
        );
        
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $id));
        $this->db->update('saaRel_Archivo_Documento', $data, array('idArchivo' => $idArchivo, 'idDireccion_responsable' => $idDireccion_responsable, 'Estatus'=>10));
    }
            
    function comprobar_estado_trabajo($idArchivo,$id){
       $sql = 'SELECT  DISTINCT idUsuario_Trabajando 
            FROM `saaRel_Archivo_Documento` 
            WHERE idArchivo = ? AND idTipoProceso = ?';
        $query = $this->db->query($sql, array($idArchivo,$id));
        return $query;
       
    }

 
    
    public function datos_relacion_archivo_documento_update_por_proceso($data, $idArchivo,$idProceso) {
        
        
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $idProceso));
        
        $this->db->update('saaRel_Archivo_Documento', $data, array('idArchivo' => $idArchivo,'idTipoProceso' => $idProceso));
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
            return array("retorno" => "1", "registro" => $idProceso);
        }
    
    }
    
    
    public function datos_relacion_archivo_documento_delete($id) {
        $data = array (
            'eliminacion_logica' => 1,
            
        );
        
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $id));
        $this->db->update('saaRel_Archivo_Documento', array('id' => $id));
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
    
   
  
    public function cambiar_estatus($idArchivo,$idTipoProceso, $estatus) {
        
        
        
        $this->db->update('saaRel_Archivo_Documento', array('Estatus' => $estatus), array('idArchivo' => $idArchivo,'idTipoProceso' => $idTipoProceso));
            
            $data=array(
                'idArchivo'=>$idArchivo,
                'idTipoProceso'=>$idTipoProceso,
                'Estatus'=>$estatus,
                'idUsuario'=>  $this->session->userdata('id'),
                'Fecha'=>date('Y-m-d H:i:s')
            );
            $this->historico($data);
            return 1;
        
    }

    public function cambiar_estatus_rechazar($idArchivo,$idTipoProceso, $estatus,$motivo) {
            
         $this->db->update('saaRel_Archivo_Documento', array('Estatus' => $estatus), array('idArchivo' => $idArchivo,'idTipoProceso' => $idTipoProceso));
             
            $data=array(
                'idArchivo'=>$idArchivo,
                'idTipoProceso'=>$idTipoProceso,
                'Estatus'=>$estatus,
                'idUsuario'=>  $this->session->userdata('id'),
                'motivo' => $motivo,
                'Fecha'=>date('Y-m-d H:i:s')
            );
            $this->historico($data);
            return 1;
        
    }
    
    
    public function agregar_observaciones_bloque($idArchivo,$idTipoProceso, $motivo, $idSubTipoProceso, $idDocumento) {
          $data=array(
                'idArchivo'=>$idArchivo,
                'idTipoProceso'=>$idTipoProceso,
                'Estatus'=>10,
                'idUsuario'=>  $this->session->userdata('id'),
                'motivo' => $motivo,
                'Fecha'=>date('Y-m-d H:i:s'),
                'idSubTipoProceso'=>$idSubTipoProceso,
                'idDocumento'=>$idDocumento,
              
            );
            $this->historico_observaciones($data);
            return 1;
    }
    
    
    
    public function Rel_TipoProceso_UbicacionFisica_insert($idArchivo,$idTipoProceso, $motivo) {
        
        
        
        $data['idUsuario']=  $this->session->userdata('id');
        $this->db->insert('saaRel_TipoProceso_UbicacionFisica',$data);
        
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();

        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_TipoProceso_UbicacionFisica', 'Data' => $data, 'id' => $registro));
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
    
    

    public function historico($data) {
        $data['Fecha']=date('Y-m-d H:i:s');
        $data['idUsuario']=  $this->session->userdata('id');
        
        $this->db->insert('saaHistorialBloque',$data);
        
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
            print_r($e);
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $registro);
        }
    }

   
    public function historico_observaciones($data) {
        $data['Fecha']=date('Y-m-d H:i:s');
        $data['idUsuario']=  $this->session->userdata('id');
        
        $this->db->insert('saaObservacionesArchivo',$data);
        
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
            print_r($e);
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $registro);
        }
    }

    
    public function listado_historial_bloque($idArchivo,$idTipoProceso) {
        $sql = 'SELECT * FROM saaHistorialBloque WHERE idArchivo=? and  idTipoProceso = ? ';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso));
        return $query;
    }
    

    public function listado_observaciones_bloque($idArchivo,$idTipoProceso,$idSubTipoProceso, $idDocumento) {
        $sql = 'SELECT * FROM saaObservacionesArchivo WHERE idArchivo=? and  idTipoProceso = ? and idSubTipoProceso = ? and idDocumento = ?';
        $query = $this->db->query($sql, array($idArchivo,$idTipoProceso,$idSubTipoProceso, $idDocumento));
        return $query;
    }
    
    public function listado_observaciones(){
        $sql = 'SELECT `saaObservacionesArchivo`.id,
                `saaObservacionesArchivo`.idArchivo, 
                `saaObservacionesArchivo`.`Motivo`, 
                `saaObservacionesArchivo`.`Fecha`,
                `saaArchivo`.`OrdenTrabajo`,
                `saaArchivo`.`Contrato`,
                `saaArchivo`.obra
        FROM `saaObservacionesArchivo` 
        INNER JOIN `saaArchivo`
        ON `saaArchivo`.id = `saaObservacionesArchivo`.`idArchivo`';
        $query = $this->db->query($sql);
        return $query;
    }
    
    
    
    public function listado_observaciones_por_direccion_responsable($idDireccion_responsable){
        $sql = 'SELECT `saaObservaciones_Documento`.id,
                `saaObservaciones_Documento`.idArchivo, 
                `saaObservaciones_Documento`.`Motivo`, 
                `saaObservaciones_Documento`.`Fecha`,
                `saaArchivo`.`OrdenTrabajo`,
                `saaArchivo`.`Contrato`,
                `saaArchivo`.obra
        FROM `saaObservaciones_Documento` 
        INNER JOIN `saaArchivo`
        ON `saaArchivo`.id = `saaObservaciones_Documento`.`idArchivo`
        WHERE `saaObservaciones_Documento`.idDireccion_responsable = ?';
        $query = $this->db->query($sql, array($idDireccion_responsable));
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

