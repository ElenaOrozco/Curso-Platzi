<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class direcciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listado_direcciones() {
            $sql = 'SELECT * FROM Direcciones WHERE Estatus=1 ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }
    public function listado_catDirecciones() {
            $sql = 'SELECT * FROM catDirecciones WHERE Estatus=1 ORDER BY id DESC';
            $query = $this->db->query($sql);
            return $query; 
    }

    
    
    
    
    
    public function datos_direccion($id) {
        $sql = 'SELECT * FROM Direcciones WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
     public function datos_catDireccion($id) {
        $sql = 'SELECT * FROM catDirecciones WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function addw_direccion() {
        $query=  $this->db->get('Direcciones');
        $addw[0]="No disponible";
        foreach ($query->result() as $row) {
            $addw[$row->id]=$row->Nombre;
        }
        return $addw;
    }
    public function addw_catDireccion() {
        $query=  $this->db->get('catDirecciones');
        $addw[0]="No disponible";
        foreach ($query->result() as $row) {
            $addw[$row->id]=$row->Nombre;
        }
        return $addw;
    }

   
    
    public function datos_direccion_insert($data) {
        $repetido=  $this->concepto_repetido(strtoupper($data['Nombre']));
        if(!$repetido['ret']){
        $this->db->insert('Direcciones', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
       
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'Direcciones', 'Data' => $data, 'id' => $registro));
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
    
    public function datos_direccion_update($data, $id) {
        
        $this->log_save(array('Tabla' => 'Direcciones', 'Data' => $data, 'id' => $id));
        
        $this->db->update('Direcciones', $data, array('id' => $id));
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
    
    public function datos_direccion_delete($id) {
        $this->db->delete('Direcciones', array('id' => $id));
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
        $query = $this->db->get_where('Direcciones');
        if ($query->num_rows() > 0) {
            $concepto = $query->row();
            return array('ret' => true, 'concepto' => $concepto->Nombre);
        } else
            return array('ret' => false, 'concepto' => 0);
    }
  

    public function listado_direcciones_de_la_direccion($idDireccion) {
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

