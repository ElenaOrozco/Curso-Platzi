<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tamano_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_tamano() {
        //listar activos
            //$sql = 'SELECT * FROM saatipoproceso WHERE Estatus=1 ORDER BY id ASC';
        //listar todos
            $sql = 'SELECT * FROM saatamano_normalizado';
            $query = $this->db->query($sql);
            return $query; 
    }

    
       
    
    public function datos_tamano($id) {
        $sql = 'SELECT * FROM saatamano_normalizado WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }

   
    
    public function datos_tamano_insert($data) {
        $repetido =  $this->concepto_repetido(strtoupper($data['Tamano']));

        if(!$repetido['ret']){
            $this->db->insert('saatamano_normalizado', $data);
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
        
        else
        {
         return array("retorno" => "-1", "error" => 'Tamaño repetido');   
        }
    }
    
    public function datos_tamano_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('saatamano_normalizado', $data);
        //$this->db->update('saatipoproceso', $data, array('id' => $id));
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
    public function datos_tamano_delete($id) {
        //echo $id;
        //$this->db->where('id', $id);
        //$this->db->update('saatipoproceso');
        $this->db->delete('saatamano_normalizado', array('id' => $id));
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
        $this->db->where('Tamano', $str);
        $query = $this->db->get_where('saatamano_normalizado');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Tamano);
        } else
            return array('ret' => false, 'concepto' => 0);
    }
  

    /*public function listado_direcciones_de_la_direccion($idDireccion) {
            $sql = 'SELECT id FROM Direcciones WHERE Estatus=1 and id_padre=? ORDER BY id DESC';
            $query = $this->db->query($sql,array($idDireccion));
            return $query; 
    }

    
    public function filtrar_listado_direcciones_de_la_direccion($idDireccion) {
        $direcciones = array();
        $direcciones[] =$idDireccion;
        
        $num_listado=count($direcciones);
        $listado=" id_Direccion_index=" .$idDireccion;
        for ($i = 0; $i < $num_listado; $i++) {
            $query = $this->listado_direcciones_de_la_direccion($direcciones[$i]);
            foreach ($query->result() as $row) {
                $direcciones[]=$row->id;
                $listado.=" or id_Direccion_index=" . $row->id;
            }    
            $num_listado=count($direcciones);
        }
        return $listado;
        
    }*/
    

}

?>

