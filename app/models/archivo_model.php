<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class archivo_model extends CI_Model {

    var $table = "listado_736";  
    var $select_column = "*";  
    var $order_column = array(null, "OrdenTrabajo" , "Obra", null, null);  
    
    public function __construct() {
        parent::__construct();
    }
 
 
    public function make_query(){  
           $this->db->select("*");  
           $this->db->from($this->table); 
           
            
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("OrdenTrabajo", $_POST["search"]["value"]);  
                $this->db->or_like("Obra", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else 
           {  
                $this->db->order_by('id', 'DESC');  
           }  
    } 
    
    
    public function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get(); 
           
           return $query->result();  
    }  
    
    public function crear_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();
           
           return $query->result();  
    }  
    
    function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    function get_all_data(){  
           $this->db->select("*");  
           $this->db->from($this->table); 
           $where = "(idBloqueObra = 1 OR 
                idBloqueObra = 2 
                OR idBloqueObra = 3)
                AND eliminacion_logica = 0";
            $this->db->where($where);
           return $this->db->count_all_results();  
    }
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

