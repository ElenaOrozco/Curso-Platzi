<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivo_todos extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('datos_model');
        $this->load->model('usuarios_model');
        $this->load->library('ferfunc');
        //$this->load->helper('form');
    }
    
    public function index(){
        /*if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Archivo","P")==false){
            header("Location:" . site_url('principal'));
        }*/
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );

       
        $data["aUsuarios"] = $this->datos_model->get_usuarios();
        $data["Tipos_Arch"] = $this->datos_model->get_Tipos_Arch_select();
        $data["Tam_Norm"] = $this->datos_model->get_Tam_Norm_select();
        $data["Tipos_uni"] = $this->datos_model->get_Tipos_uni_select();
        $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
        $data["Direcciones"] = $this->datos_model->get_Direcciones_select();
        $data["Ejercicios"] = $this->datos_model->get_Ejercicio_select();
        $data["Modalidades"] = $this->datos_model->get_Modalidades_select();
        
        
        $data['usuario'] = $this->session->userdata('nombre');
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        $this->load->model("ubicacion_fisica_model");
        $this->load->model("datos_model");
         
        $data["qBloques"] = $this->datos_model->get_bloques();
        $data["qEstatus"] = $this->datos_model->listado_estatus_archivos();
        $data["qGrupos"] = $this->datos_model->get_grupos(); //Grupos obra- idBloqueObra
        $data["qUbicacionesFisicas"]=$this->ubicacion_fisica_model->listado_ubicacion_ordenada_por_columna();
       
        
        $this->load->view('v_pant_archivo_todos.php', $data);
    }
    
     public function fetch_archivos(){  
           $this->load->model('archivo_todos_model');  
           $fetch_data = $this->archivo_todos_model->make_datatables();  
           
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = ' <a href="'. site_url('archivo/cambios/' .$row->id) .'"   class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a>';  
                $sub_array[] = $row->OrdenTrabajo ;  
                $sub_array[] = $row->Contrato;  
                $sub_array[] = $row->Obra ;  
                $sub_array[] = $row->Descripcion;  
                $sub_array[] = $row->Normatividad ;  
                if(isset($Modalidades[$row->idModalidad])){
                    $sub_array[] =  $Modalidades[$row->idModalidad];
                } else {
                    $sub_array[] = "";
                }
 
                $sub_array[] = $row->idEjercicio;  
                $sub_array[] = $row->EstatusObra ;  
                $sub_array[] = $row->Direccion;  
                $sub_array[] = $row->Supervisor;  
                $sub_array[] = $row->FechaInicio;   
                $sub_array[] = $row->ImporteContratado;  
                $sub_array[] = $row->EjercidoSiop ;  
 
                if ($row->Finiquitada == 0) {
                    $sub_array[] = 'No';
                } else {
                    $sub_array[] = 'Si';
                }    
                $sub_array[] = $row->Contratista ;  
                $sub_array[] = '<a href="#" class="btn btn-warning btn-xs" title=""  data-toggle="modal" data-target="#modal-historico-archivo" role="button" onclick="ver_historico_archivo('. $row->id .')"><span class="glyphicon glyphicon-search"></span></a>&nbsp;';
 
 
 
     
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->archivo_todos_model->get_all_data(),  
                "recordsFiltered"     =>     $this->archivo_todos_model->get_filtered_data(),  
                "data"                =>     $data 
           );  
           echo json_encode($output);  
      }  
      
}
    