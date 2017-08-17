<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ubicacion_fisica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_ubicacion() {
        
        $sql = 'SELECT * FROM saaUbicacionFisica ORDER BY id DESC';
       
        $query = $this->db->query($sql);
        return $query; 
    }
    
    public function listado_ubicaciones_archivo(){
        $sql = 'SELECT 
                    `saaRel_TipoProceso_UbicacionFisica`.`id`,
                    `saaRel_TipoProceso_UbicacionFisica`.`idTipoProceso`,
                    `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica`,
                    `saaUbicacionFisica`.`id`,
                    `saaUbicacionFisica`.`Columna`,
                    `saaUbicacionFisica`.`Fila`,
                    `saaUbicacionFisica`.`Caja`,
                    `saaUbicacionFisica`.`Apartado`,
                    `saaUbicacionFisica`.`Posicion`,
                    `saaUbicacionFisica`.`utilizado`,
                    `saaArchivo`.`OrdenTrabajo`,
                    `saaArchivo`.`Obra`,
                    `saaArchivo`.`Contrato`


            FROM `saaRel_TipoProceso_UbicacionFisica`
            INNER JOIN `saaUbicacionFisica`
            ON `saaUbicacionFisica`.id = `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica`
            INNER JOIN `saaArchivo`
            ON `saaRel_TipoProceso_UbicacionFisica`.`idArchivo` = `saaArchivo`.id
            WHERE `saaRel_TipoProceso_UbicacionFisica`.`Estatus`=1';
       
        $query = $this->db->query($sql);
        return $query; 
    }

    




    public function listado_ubicacion_ordenada_por_columna() {
        $sql = 'SELECT distinct Columna FROM saaUbicacionFisica ORDER BY Columna asc';
        $query = $this->db->query($sql);
        return $query; 
    }
    
    
    
    public function listado_ubicacion_ordenada_por_columna_area($desde, $hasta) {
        
        $sql = "SELECT DISTINCT Columna 
                FROM saaUbicacionFisica 
                WHERE Columna BETWEEN  '$desde' AND '$hasta'
                ORDER BY Columna ASC";
        $query = $this->db->query($sql);
        return $query; 
    }
    
    public function listado_ubicacion_ordenada_por_fila($Columna) {
        $sql = 'SELECT distinct Fila FROM saaUbicacionFisica where Columna=? ORDER BY Fila asc';
        $query = $this->db->query($sql,array($Columna));
        return $query; 
    }   
    
    
    public function listado_ubicacion_ordenada_por_caja($Columna,$Fila) {
        $sql = 'SELECT * FROM saaUbicacionFisica where Columna=? and Fila=? ORDER BY Fila asc';
        $query = $this->db->query($sql,array($Columna,$Fila));
        return $query; 
    }   
    
    public function ubicacion_ocupada_archivo($id,$idArchivo){
        $sql = 'SELECT saaUbicacionFisica.* FROM saaUbicacionFisica 
                INNER JOIN `saaRel_TipoProceso_UbicacionFisica` 
                ON `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica` = `saaUbicacionFisica`.`id`
                WHERE `saaUbicacionFisica`.id= ?
                AND `saaRel_TipoProceso_UbicacionFisica`.`idArchivo` = ?';
        $query = $this->db->query($sql,array($id,$idArchivo));
        return $query; 
    }

        public function datos_ubicacion($id) {
        $sql = 'SELECT * FROM saaUbicacionFisica WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function datos_relacion_ubicacion($id){
        $sql = 'SELECT `saaUbicacionFisica`.`id` AS idUbi,
                `saaUbicacionFisica`.`Columna`,
                `saaUbicacionFisica`.`Fila`,
                `saaUbicacionFisica`.`Caja` AS CajaUbi,
                `saaUbicacionFisica`.`Apartado`,
                `saaUbicacionFisica`.`Posicion`,
                `saaRel_TipoProceso_UbicacionFisica`.*, 
                `saaRel_TipoProceso_UbicacionFisica`.`Caja` AS CajaRel, 
                `saaRel_TipoProceso_UbicacionFisica`.`id` AS idRel
        FROM `saaRel_TipoProceso_UbicacionFisica`
        INNER JOIN `saaUbicacionFisica`
        ON `saaUbicacionFisica`.`id` = `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica`
        WHERE `saaRel_TipoProceso_UbicacionFisica`.Estatus = 1 AND `saaRel_TipoProceso_UbicacionFisica`.`id`=?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function  datos_relacion_proceso_ubicacion($id){
        $sql = 'SELECT * FROM `saaRel_TipoProceso_UbicacionFisica` WHERE id= ?';
        $query = $this->db->query($sql, array($id));
        $row = $query->row_array();
        
        return $row;
    }

    


    public function agregar_ubicacion_fisica($data){
        //$repetido =  $this->concepto_repetido(strtoupper($data['Nombre']));

        //if(!$repetido['ret']){
        $this->db->insert('saaRel_TipoProceso_UbicacionFisica', $data);
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
            return array("retorno" => "-1", "error" => $e);
        } else {
            
            return array("retorno" => "1", "registro" => $registro);
        }
        
        //}
        
        /*else
        {
         return array("retorno" => "-1", "error" => 'Proceso repetida');   
        } */
    }
    
    
    public function listado_ubicacion_fisica(){
        $sql = 'SELECT `saaUbicacionFisica`.* , `saaRel_TipoProceso_UbicacionFisica`.*, `saaRel_TipoProceso_UbicacionFisica`.`Caja` AS CajaUbi, `saaUbicacionFisica`.Caja AS C,
                `saaRel_TipoProceso_UbicacionFisica`.`id` AS idRel
                FROM `saaRel_TipoProceso_UbicacionFisica`
                INNER JOIN `saaUbicacionFisica`
                ON `saaUbicacionFisica`.`id` = `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica`
                WHERE `saaRel_TipoProceso_UbicacionFisica`.Estatus = 1
                ';
       
        $query = $this->db->query($sql);
        return $query;
    }
    
    
    public function listado_ubicaciones_proceso($idArchivo, $proceso){
        $sql = 'SELECT `saaUbicacionFisica`.* , `saaRel_TipoProceso_UbicacionFisica`.*, `saaRel_TipoProceso_UbicacionFisica`.`Caja` AS CajaUbi, `saaUbicacionFisica`.Caja AS C,
                `saaRel_TipoProceso_UbicacionFisica`.`id` AS idRel
                FROM `saaRel_TipoProceso_UbicacionFisica`
                INNER JOIN `saaUbicacionFisica`
                ON `saaUbicacionFisica`.`id` = `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica`
                WHERE (saaRel_TipoProceso_UbicacionFisica.`idArchivo` =?
                AND saaRel_TipoProceso_UbicacionFisica.`idTipoProceso`= ? ) AND
                `saaRel_TipoProceso_UbicacionFisica`.Estatus = 1
                ';
       
        $query = $this->db->query($sql, array($idArchivo, $proceso));
        return $query;
    }

        public function actualizar_estado_ubicacion($data, $id){
        
        $this->log_save(array('Tabla' => 'saaUbicacionFisica', 'Data' => $data, 'id' => $id));
        
        $this->db->where('id', $id);
        $this->db->update('saaUbicacionFisica', $data);
        //$this->db->update('saaTipoProceso', $data, array('id' => $id));
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

    







    public function datos_ubicacion_insert($data) {
         
 
        $repetido =  $this->concepto_repetido(strtoupper($data['Columna']), 
                                                strtoupper($data['Fila']),
                                                strtoupper($data['Caja']),
                                                strtoupper($data['Apartado'])
                                                );
        if( !$repetido['ret'] ){
            $this->db->insert('saaUbicacionFisica', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
           
            
            if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaUbicacionFisica', 'Data' => $data, 'id' => $registro));
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
         
        } else{
         return array("retorno" => "-1", "error" => 'Ubicacion repetida');   
        }
         
         
    }
    
    public function datos_ubicacion_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaUbicacionFisica', 'Data' => $data, 'id' => $id));
        
        $this->db->where('id', $id);
        $this->db->update('saaUbicacionFisica', $data);
        //$this->db->update('saaTipoProceso', $data, array('id' => $id));
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
    
    public function datos_relacion_ubicacion_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'saaRel_TipoProceso_UbicacionFisica', 'Data' => $data, 'id' => $id));
        
        $this->db->where('id', $id);
        $this->db->update('saaRel_TipoProceso_UbicacionFisica', $data);
        //$this->db->update('saaTipoProceso', $data, array('id' => $id));
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
    
    
    public function datos_relacion_proceso_ubicacion_archivo($id, $idArchivo){
        $sql = 'SELECT * FROM saaUbicacionFisica 
                INNER JOIN `saaRel_TipoProceso_UbicacionFisica` 
                ON `saaRel_TipoProceso_UbicacionFisica`.`idUbicacionFisica` = `saaUbicacionFisica`.`id`
                WHERE `saaUbicacionFisica`.id= ?
                AND `saaRel_TipoProceso_UbicacionFisica`.`idArchivo` = ? AND Estatus = 1';
        $query = $this->db->query($sql, array($id, $idArchivo));
        
        
        return $query;
    }

    public function datos_ubicacion_delete($id) {
       
        $this->db->delete('saaUbicacionFisica', array('id' => $id));
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
    
   public function concepto_repetido($Columna, $Fila, $Caja, $Apartado ) {
        /* Solo acepta registros donde alguno de los campos es diferente */
        $this->db->where('Columna', $Columna);
        $this->db->where('Fila', $Fila);
        $this->db->where('Caja', $Caja);
        $this->db->where('Apartado', $Apartado);
        //$this->db->where('Posicion', $Posicion);
 
        $query = $this->db->get_where('saaUbicacionFisica');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Columna);
        } else
            return array('ret' => false, 'concepto' => 0);  
        /* Solo acepta registros donde todos los campor son diferentes 
        $where = "Columna = '$Columna' OR Fila = $Fila OR Caja = $Caja OR Apartado = '$Apartado' OR Posicion = '$Posicion'";
        $this->db->where($where);
        $query = $this->db->get_where('saaUbicacionFisica');
         
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Columna);
        } else
            return array('ret' => false, 'concepto' => 0);*/
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

