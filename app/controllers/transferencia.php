<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transferencia extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('entidad_transferencia_helper');
        $this->load->model('transferencia_model');
       
    }
    
    public function index() {
        
        /*if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Transferencias","P")==false ){
            header("Location:" . site_url('principal'));
        }*/
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'CID, transparencia, archivo, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        
        
        
        
        $data['usuario'] = $this->session->userdata('nombre');   
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        $tipo = $this->session->userdata('prerregistro');
        if ($tipo == 1){
            $direccion = $this->session->userdata('idDireccion_responsable');   
            $data['listado'] = $this->transferencia_model->listado($direccion);
            $this->load->view('v_pant_transferencia', $data);
        }
        else {
            $data['listado'] = $this->transferencia_model->listado_cid();
            $this->load->view('v_pant_transferencia', $data);
        }
       
      
    }
    
    
   
    function modificar( $id=0 ){
         $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'CID, transparencia, archivo, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        
         
        if ($id == 0){
            //Agregar transferencia
            $idTransferencia = $this->transferencia_nueva();
            $data["id"] = $idTransferencia ;
            
            //Agregar Caja 
            $data_caja = array ( "idTransferencia" => $idTransferencia);
            $idCaja =  $this->transferencia_model->agregar_caja($data_caja);
            
            //Agregar Fila
            $data_fila= array ( "idCaja" => $idCaja, "No_Caja" =>1);
            $idDetalle =  $this->transferencia_model->agregar_fila($data_fila);
            
        } else {
            $data["id"] = $id ;
            $idTransferencia = $id;
        }
        $data["aTransferecia"] = $this->transferencia_model->get_transferencia($idTransferencia)->row_array();
        
        
        $cajas = $this->transferencia_model->get_cajas($idTransferencia);
        
        
        $datos = array();
              
        foreach ($cajas->result() as $caja){
             $datos[] = array (
                'idCaja' => $caja->id,
                'detalles' => $this->transferencia_model->get_detalles($caja->id),
            );
        }
        
        //echo $datos[0]['id'];
        //echo $datos[0]['detalles']['No_Caja'];
        
        
        //exit();
                
        $data["cajas"] = $cajas;
        $data['usuario'] = $this->session->userdata('nombre'); 
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'transferencia'; 
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        $this->load->view('v_pant_transferencia_modificar', $data );
    }
    
    
    
    function eliminarFila(){
        $idDetalle = $this->input->post('idDetalle');
        echo $this->transferencia_model->eliminarFila($idDetalle);
        
        
    }
    
    function eliminarCaja(){
        $idCaja = $this->input->post('idCaja');
        echo $this->transferencia_model->eliminarCaja($idCaja);
        
        
    }
    
     
    function nueva( ){
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'CID, transparencia, archivo, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        
        $idTransferencia = $this->transferencia_nueva();
        $data["id"] = $idTransferencia ;
        $data["aTransferecia"] = $this->transferencia_model->get_transferencia($idTransferencia)->row_array();
        //$data["aCajas"] = $this->transferencia_model->get_cajas($idTransferencia);
        $data['usuario'] = $this->session->userdata('nombre'); 
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'transferencia'; 
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        $this->load->view('v_pant_transferencia_editar', $data );
    }
    
    
    public function  editarCheck(){
       $clave =    $this->input->post("id");
       $idDetalle =    $this->input->post("idDetalle");
       $valor = $this->input->post("valor"); 
       
        $data = array (
                $clave => $valor,
            
            );
       $this->transferencia_model->editar_detalles($data, $idDetalle);
    }


    public function guardar_detalles(){
        $idDetalle =    $this->input->post("No_Detalle");
        $no_Caja =      $this->input->post("No_Caja");
        $idCaja =       $this->input->post("idCaja");
        $No_Carpeta =   $this->input->post("No_Carpeta");
        $ot =           $this->input->post("ot");
       
        $identificador =$this->input->post("identificador");
        
        $fojas =        $this->input->post("fojas");
        
        $observaciones =$this->input->post("observaciones");
        
       
        
        $data = array();
        foreach ($No_Carpeta as $v => $carpeta) {
           
            
            
            $data[] = array (
                'id' => $idDetalle[$v],
                'detalles' => array( 
                        'No_Caja'         => $no_Caja[$v],
                        'No_Carpeta'      => $No_Carpeta[$v], 
                        'ot'              => $ot[$v],
                       
                        'clasificador'    => 'SIOP' .$identificador[$v],
                        'fojas'           => $fojas[$v],
                     
                        'observaciones'   => $observaciones[$v]
                        ),
            );
           
        }
        
         
        
        echo  $this->transferencia_model->guardar_detalles($data);
    }

    public function transferencia_nueva(){
        $data = array (
                    "fecha_registro"      => date("Y-m-d G:i:s"),
                    "idDireccion"         => $this->session->userdata("idDireccion_responsable"),
                    "idUsuario_registra"  => $this->session->userdata("id"),
          
        );
        
        return $this->transferencia_model->alta_transferencia($data);
        
    }
    
    public function nuevaCaja(){
        $idTransferencia = $this->input->post("id");
        $data = array ( "idTransferencia" => $idTransferencia);
        $retorno =  $this->transferencia_model->agregar_caja($data);
          
        echo $retorno;
      
    }
    
    public function numeroCajas(){
        $idTransferencia = $this->input->post("id");
       
        $retorno =  $this->transferencia_model->numeroCajas($idTransferencia);
          
        echo $retorno;
      
    }
    
    public function nuevaFila(){
        $idCaja = $this->input->post("idCaja");
        $data = array ( "idCaja" => $idCaja);
        $retorno =  $this->transferencia_model->agregar_fila($data);
           
        echo $retorno;
        
    }
    
    
    public function get_cajas(){
        $idTransferencia = $this->input->post('idTransferencia');
        $cajas =  $this->transferencia_model->get_cajas($idTransferencia)->result_array();
        
        $datos = $cajas;
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($datos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function get_detalles(){
        $idCaja = $this->input->post('idCaja');
        $detalles =  $this->transferencia_model->get_detalles($idCaja)->result_array();
        
        $datos = $detalles;
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($datos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function ot_json() {
        $term = $this->input->post("term");
        $id = $this->input->post("id");
        
       
        $aOT = $this->transferencia_model->ot_json($term,$id);
        
        //print_r($aRemitente);
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($aOT, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function identificador_json() {
        $term = $this->input->post("term");
        $id = $this->input->post("id");
        $this->load->model('transferencia_model');
       
        $aOT = $this->transferencia_model->identificador_json($term,$id);
        
        //print_r($aRemitente);
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($aOT, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function traer_detalles (){
        $this->load->model('transferencia_model');
        
        $id = $this->input->post("ot");
       
        $aArchivo = $this->transferencia_model->traer_detalles ($id);
        
        $data=array(

            'Obra'=> $aArchivo['Obra'],
            'idEjercicio' =>  $aArchivo['idEjercicio'],
            
        ); 
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function dibujar_cajas(){
        $cajas = $this->input->post('NoCajas');
        
        $resultado = '';
        
        for($i = 0 ; $i < $cajas ; $i++ ){
            $resultado .= ' <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="panel-title"  data-toggle="collapse" data-parent="#panel-'. $i .'" href="#div-caja-'. $i .'">Caja '. $i . '</a>
                                </div>
                                <div id="div-caja-'. $i .'" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Panel content
                                    </div>
                                </div>
                            </div>';
        }
        
         
        
                          
                                
        $data=array();
        $data["resultado"]=$resultado;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);  
        
        
    }
}
        

