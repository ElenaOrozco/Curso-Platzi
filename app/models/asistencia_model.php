<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function a_estatus_helpdesk() {
        $query = $this->db->get_where("sisEstatus", array("Modulo" => 100));
        $retorno = array();
        foreach ($query->result() as $rowdata) {
            $retorno[$rowdata->Estatus] = $rowdata->Nombre;
        }
        return $retorno;
    }

    public function listado() {
        return $this->db->get_where("catHelpDesk");
    }

    public function datos_reporte($id) {
        $query = $this->db->get_where("catHelpDesk", array("id" => $id));
        return $query;
    }

    public function datos_reporte_insert($data) {
        $this->db->insert('catHelpDesk', $data);

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

    public function datos_reporte_update($data, $id) {
        $this->db->update('catHelpDesk', $data, array("id" => $id));
        $e = trim($this->db->_error_message());
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();

        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            } else {
                // si hay debug
                $e .= "<br /><pre>" . $last_query . "</pre>";
            }
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
        }
    }

    public function baja($id) {
        $data = array("Estatus" => 0);
        $this->db->update('catHelpDesk', $data, array("id" => $id));
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
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

    public function sistemas_txt() {
        $addw = array();
        
        $addw[] = "SECIP_INTRANET";
        $addw[] = "SECIP CONTRATISTAS";
        $addw[] = "GEO-REFERENCIA";
        $addw[] = "DEPENDENCIAS";
        $addw[] = "TRANSPARENCIA";
        $addw[] = "PORTAL";
        $addw[] = "SINCRONIZACION-SEFIN";

        $sql = 'SELECT TRIM(Sistema) AS sistema FROM movHelpdesk Where Estatus <> 0';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[] = strtoupper(trim($row->sistema));
            }
        }

        $addw = array_unique($addw);

        return $addw;
    }

}

?>
