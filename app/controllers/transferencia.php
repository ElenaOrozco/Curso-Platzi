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
        $this->load->view('v_pant_transferencia', $data);
      
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
        

