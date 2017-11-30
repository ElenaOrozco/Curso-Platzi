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
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Transferencias","P")==false ){
            header("Location:" . site_url('principal'));
        }
        
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
        $data["preregistro"]=$this->session->userdata('preregistro');
        $tipo = $this->session->userdata('prerregistro');
        $data['tipo'] = $tipo;
        
        
        if ($data["preregistro"]){
            $direccion = $this->session->userdata('idDireccion_responsable');   
            $data['listado'] = $this->transferencia_model->listado($direccion);
            $this->load->view('v_pant_transferencia', $data);
        }
        else {
            $data['listado'] = $this->transferencia_model->listado_cid();
            $this->load->view('v_pant_transferencia', $data);
        }
       
      
    }
    
   
    
    
    function marcar_revisada($id){
       
        
        $data = array ( 
            "idUsuario_transfiere" => $this->session->userdata("id"),
            
        );
        $retorno = $this->transferencia_model->marcar_revisada($data, $id);
        
        echo $retorno;
    }
    
    function ver_datos(){
       
        $id = $this->input->post('id');
        
        $retorno = $this->transferencia_model->ver_datos($id);
        $cajas = $retorno['cajas'];
        $carpetas = $retorno['carpetas'];
        echo "La Transferencia cuenta con:  <br> $cajas Cajas y $carpetas Carpetas";
    }
    
    
   
    function editar( $id=0 ){
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
        
        
        if ($id > 0){
            
            $data["id"] = $id ;
            $idTransferencia = $id;
            
        } else {
            //Agregar transferencia
            $idTransferencia = $this->transferencia_nueva();
            $data["id"] = $idTransferencia ;
            
            //Agregar Caja 
            $data_caja = array ( "idTransferencia" => $idTransferencia);
            $idCaja =  $this->transferencia_model->agregar_caja($data_caja);
            
            //Agregar Fila
            $data_fila= array ( "idCaja" => $idCaja, "No_Caja" =>1);
            $idDetalle =  $this->transferencia_model->agregar_fila($data_fila);
           
            
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
        //$this->load->view('v_pant_transferencia_modificar', $data );
        $this->load->view('v_pant_transferencia_editar', $data );
    }
    
    
    
    function eliminarFila(){
        $idDetalle = $this->input->post('idDetalle');
        echo $this->transferencia_model->eliminarFila($idDetalle);
        
        
    }
    
    
    public function listado_identificadores($idDetalle){
       
        
        $qListado = $this->transferencia_model->listado_cuca();
        
         
        $tabla='
         
         
          <table class="table table-striped table-hover table-condensed" id="tabla_documentos" width="100%">
                            <thead>
                                <tr>                                    
                                    <th class="col-sm-1">
                                        Accion
                                    </th> 
                                    <th class="col-sm-3">
                                        Sección
                                    </th>
                                    <th class="col-sm-3">
                                        Serie
                                    </th>
                                    <th class="col-sm-2">
                                        Sub Serie
                                    </th>
                                    <th class="col-sm-2">
                                        Sub Sub-Serie
                                    </th>
                                    <th class="col-sm-1">
                                        Identificador
                                    </th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
         ';
         
         
                                if (isset($qListado)) {
                                    if ($qListado->num_rows() > 0) {
                                        //echo 'Hola';
                                        foreach ($qListado->result() as $rListado) {
                                            
                                           
                                           $identificador = '"' .$rListado->identificador .'"';
                                           $id = $rListado->id;
                                           
                                           $tabla.= "<tr>";
                                           $tabla.= "<td><small><a href='#' class='btn btn-default btn-xs'  onclick='imprimir_identificador(".$id . ",".$identificador.",".$idDetalle .")'>Agregar</a></small></td>";
                                           $tabla.= "<td class='sinwarp'>" . $rListado->Nombre . "</td>";
                                           
                                           $tabla.="<td>" . $rListado->Nombres . "</td>"; 
                                           $tabla.="<td>" . $rListado->Nombresub . "</td>"; 
                                           $tabla.="<td>" . $rListado->Nombresubsub . "</td>"; 
                                           $tabla.="<td>" . $rListado->identificador . "</td>"; 
                                                        
                                                
                                           
                                            
                                        }
                                    }
                                }
        
                                
        $tabla.=' </tbody>
                        </table> ';                        
                                
        $data=array();
        $data["listado"]=$tabla;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);                      
         
         
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
    
    public function  editarIdentificador(){
       $id =    $this->input->post("ot");
       $identificador =    $this->input->post("identificador");
       
       
        $data = array (
            'identificado' => $identificador,
            
            );
       echo $this->transferencia_model->editar_identificador($data, $id);
    }
    
    function limpia_espacios($cadena){
	$cadena = str_replace(' ', '', $cadena);
	return $cadena;
    }   


    public function guardar_detalles(){
        $idDetalle =    $this->input->post("No_Detalle");
        $no_Caja =      $this->input->post("No_Caja");
        $idCaja =       $this->input->post("idCaja");
        $No_Carpeta =   $this->input->post("No_Carpeta");
        $ot =           $this->input->post("ot");
       
        $identificador   = $this->input->post("identificador");
        $idIdentificador = $this->input->post("IDidentificador");
        $fojas           = $this->input->post("fojas");
        
        $observaciones  = $this->input->post("observaciones");
        
        
       
        
        $data = array();
        foreach ($No_Carpeta as $v => $carpeta) {
            
            $ordenTrabajo = $this->traer_ot ($ot[$v]);
            $ident = $this->identificador_text($identificador[$v]);
            
            
            $cadena= 'SIOP'.'.'.$ident.'/'.$ordenTrabajo.'/';
            $clasificador = $this->limpia_espacios($cadena);
            
            
            
            
            $data[] = array (
                'id' => $idDetalle[$v],
                'detalles' => array( 
                        'No_Caja'         => $no_Caja[$v],
                        'No_Carpeta'      => $No_Carpeta[$v], 
                        'ot'              => $ot[$v],
                        'identificador'   => $identificador[$v],
                        'clasificador'    => $clasificador,
                        'fojas'           => $fojas[$v],
                     
                        'observaciones'   => $observaciones[$v]
                        ),
            );
           
        }
        
         
        
        echo  $this->transferencia_model->guardar_detalles($data);
    }
    
     public function traer_ot($ot){
        $this->load->model('transferencia_model');
        
        
        $aArchivo = $this->transferencia_model->traer_detalles ($ot);
        
        return $aArchivo['OrdenTrabajo'];
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
            'identificador' =>  $aArchivo['identificado'],
        ); 
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function identificador_text ($id){
        $this->load->model('transferencia_model');
        
        //$id = $this->input->post("id");
       
        $aIdentificador = $this->transferencia_model->traer_identificador ($id);
        return $aIdentificador['identificador'];
        /*
        $data=array(

            
            'identificador' =>  $aIdentificador['identificador'],
        ); 
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
         * */
        
    }
    
    public function traer_identificador (){
        $this->load->model('transferencia_model');
        
        $id = $this->input->post("id");
       
        $aIdentificador = $this->transferencia_model->traer_identificador ($id);
        
        
        $data=array(

            'id'=>  $aIdentificador['id'],
            'identificador' =>  $aIdentificador['identificador'],
            'Nombre' => $aIdentificador['Nombre'],
            'Nombres' => $aIdentificador['Nombres'],
            'Nombresub' => $aIdentificador['Nombresub'],
            'Nombresubsub' => $aIdentificador['Nombresubsub'],
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
        

