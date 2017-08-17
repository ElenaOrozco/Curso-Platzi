<?php

//if (!defined('BASEPATH'))
    //exit('No direct script access allowed');

class Impresion extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->db->save_queries = FALSE;
        date_default_timezone_set("America/Mexico_City");
        @set_time_limit(0);
        @ini_set('memory_limit', '-1');
    }

    
    public function listado_archivos(){
        
        $this->load->model('impresiones_model');
        
        $qDetalle = $this->impresiones_model->get_listado_archivos();
        $data['datos'] = $qDetalle->result_array();
        
        $this->load->view('v_listado_archivos', $data); // este manda a pantalla HTML normal
    }

    public function detalle_memoria($idMemoria, $pdf = 1) {
        $this->load->model('memorias_model');
        $this->load->model('impresiones_model');

        $qDetalle = $this->memorias_model->get_datalles_memoria($idMemoria);
        $data['datos'] = $qDetalle->result_array();

        $qMemoria = $this->memorias_model->datos_memoria($idMemoria);
        $data['memoria'] = $qMemoria->row_array();

        $qObra = $this->memorias_model->datos_obra($data['memoria']['idObra']);
        $data['obra'] = $qObra->row_array();

        $qPartida = $this->memorias_model->datos_partida($data['obra']['idPartidaPresupuestal']);
        $data['partida'] = $qPartida->row_array();

        $qDireccion = $this->memorias_model->datos_partida($data['obra']['idDireccion']);
        $data['direccion'] = $qDireccion->row_array();


        $qFirmas = $this->impresiones_model->get_firmas_memoria($data['memoria']['idAutorizo']);
        $data['autorizo'] = $qFirmas[$data['memoria']['idAutorizo']];

        $qFirmas = $this->impresiones_model->get_firmas_memoria($data['memoria']['idVoBo']);
        $data['vo_bo'] = $qFirmas[$data['memoria']['idElaboro']];

        $qFirmas = $this->impresiones_model->get_firmas_memoria($data['memoria']['idElaboro']);
        $data['elaboro'] = $qFirmas[$data['memoria']['idAutorizo']];


        $subtipopago = $this->impresiones_model->get_SubTiposPago($data['memoria']['id_subtipopago'])->row_array();
        $idTipoPago = $subtipopago['idTipoPago'];


        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            switch ($idTipoPago) {
                case 1:
                    $outputhtml = $this->load->view('v_memoria_detalle_materiales', $data, true);
                    break;
                case 2:
                    $outputhtml = $this->load->view('v_memoria_detalle_materiales', $data, true);
                    break;
                case 3:
                    $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
                    break;
                case 4:
                    $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
                    break;
                case 5:
                    $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
                    break;
                case 6:
                    $outputhtml = $this->load->view('v_memoria_detalle_materiales', $data, true);
                    break;
                case 7:
                    $outputhtml = $this->load->view('v_memoria_detalle_materiales', $data, true);
                    break;
                case 15:
                    $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
                    break;
                default:
                    $outputhtml = $this->load->view('v_memoria_detalle_materiales', $data, true);
                    break;
            }

            /*
              if ($idTipoPago==0){
              $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
              } */
            $mpdf->WriteHTML($outputhtml);
            $mpdf->Output();
        } else {
            $this->load->view('v_memoria_detalle_nomina', $data); // este manda a pantalla HTML normal
        }
    }

    public function Imprime_memoria($idMemoria, $pdf = 1) {
        $this->load->model('memorias_model');
        $this->load->model('impresiones_model');
        $this->load->library('ferfunc');
        $dMemoria = $this->impresiones_model->datos_memoria($idMemoria);


        $data = $dMemoria;
        


        $idTipoPago = $data['idTipoPago'];

        

        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            /*
            if ($data['memoria']['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/

            switch ($idTipoPago) {
                case 1:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 2:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 3:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 4:
                   /*
                    if ($dMemoria['memoria']['amortizado'] > 0)
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss_fondo', $data, true);
                    else
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss', $data, true);
                    break;
                    * 
                    */
                    $outputhtml = $this->load->view('v_memoria_estado_contable_imss', $data, true);
                     break;
                case 5:
                   
                    
                   
                    $outputhtml = $this->load->view('v_memoria_estado_contable_servicios_personales', $data, true);
                    
                    //$outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    
                    break;
                case 6:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 7:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 15:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 18:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_servicios_personales', $data, true);
                    break;
                default:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
            }

            
            /*
              if ($idTipoPago==0){
              $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
              } */
            $mpdf->WriteHTML($outputhtml);
            $mpdf->Output();
        } else {
                        switch ($idTipoPago) {
                case 1:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 2:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 3:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 4:
                    /*
                    if ($dMemoria['memoria']['amortizado'] > 0)
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss_fondo', $data, true);
                    else
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss', $data, true);
                     * 
                     */
                    
                    $outputhtml = $this->load->view('v_memoria_estado_contable_imss', $data, true);
                    break;
                case 5:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 6:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 7:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 15:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 18:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_servicios_personales', $data, true);
                    break;
                default:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
            }

        }
    }

    
     public function Imprime_memoria_parcial($idMemoria, $pdf = 1) {
        $this->load->model('memorias_model');
        $this->load->model('impresiones_model');
        $this->load->library('ferfunc');
        $dMemoria = $this->impresiones_model->datos_memoria($idMemoria);


        $data = $dMemoria;
        


        $idTipoPago = $data['idTipoPago'];

       
       
        
        

        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            /*
            if ($data['memoria']['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/

            
           
            
            switch ($idTipoPago) {
                case 1:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales_parcial', $data, true);
                    break;
                case 2:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales_parcial', $data, true);
                    break;
                case 3:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina_parcial', $data, true);
                    break;
                case 4:
                   /*
                    if ($dMemoria['memoria']['amortizado'] > 0)
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss_fondo', $data, true);
                    else
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss', $data, true);
                    break;
                    * 
                    */
                   
                    
                    $outputhtml = $this->load->view('v_memoria_estado_contable_imss_parcial', $data, true);
                     break;
                case 5:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina_parcial', $data, true);
                    break;
                case 6:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales_parcial', $data, true);
                    break;
                case 7:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales_parcial', $data, true);
                    break;
                case 15:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina_parcial', $data, true);
                    break;
                default:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales_parcial', $data, true);
                    break;
            }

            
            /*
              if ($idTipoPago==0){
              $outputhtml = $this->load->view('v_memoria_detalle_nomina', $data, true);
              } */
           
            $mpdf->WriteHTML($outputhtml);
            $mpdf->Output();
        } else {
                        switch ($idTipoPago) {
                case 1:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 2:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 3:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 4:
                    /*
                    if ($dMemoria['memoria']['amortizado'] > 0)
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss_fondo', $data, true);
                    else
                        $outputhtml = $this->load->view('v_memoria_estado_contable_imss', $data, true);
                     * 
                     */
                    
                    $outputhtml = $this->load->view('v_memoria_estado_contable_imss_parcial', $data, true);
                    break;
                case 5:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                case 6:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 7:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
                case 15:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_nomina', $data, true);
                    break;
                default:
                    $outputhtml = $this->load->view('v_memoria_estado_contable_materiales', $data, true);
                    break;
            }

        }
        
    }

    
    
    public function detalle_memoria_materiales($idmemoria, $pdf = 1){
        $this->load->model('memorias_model');
        $this->load->model('facturas_model');
        $this->load->model('conceptos_model');
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');


        $this->load->library('ferfunc');

        $dMemoria = $this->memorias_model->datos_memoria($idmemoria)->row_array();
        $dObra = $this->obras_model->datos_obra($dMemoria['idObra'])->row_array();

        $qConceptos = $this->impresiones_model->facturas_memorias($idmemoria);
        $this->db->where('id',$dObra['idResidencia']);
        $dResidencia=  $this->db->get_where('memResidencias');

        $residencia="";
        if ($dResidencia->num_rows()>0){
        	$aResidencia=$dResidencia->row_array();
        	$residencia=$aResidencia["Nombre"];
        }

        echo $residencia;
       
        
        $this->db->where('idObra', $dObra['id']);
        $qPartida = $this->db->get_where('catObrasRelPartidasPresupuestales');
        
        $this->db->where('id', $dMemoria['idClavePresupuestal']);
        $qClave = $this->db->get_where('catClavesPresupuestales');
        
        $claves_presupuestales="";
        
        $aClave=$qClave->row_array();
         $claves_presupuestales=$aClave['ClavePresupuestal'];
           
        
        /*
        $claves_presupuestales="";
        foreach ($qPartida->result() as $rPartida) {
            $sql ='select catClavesPresupuestales.* from catObrasRelClavesPresupuestales inner join catClavesPresupuestales on 
            catObrasRelClavesPresupuestales.idClavePresupuestal = catClavesPresupuestales.id
            where idRelPartidaPresupuestal=? order by id asc '; 
            $qClave = $this->db->query($sql, array($rPartida->id));
            foreach ($qClave->result() as $rClave) {
               $claves_presupuestales.=$rClave->ClavePresupuestal.'<br/>';
            }

        }
        */
       
        $partidas_presupuestales="";
        foreach ($qPartida->result() as $rPartida) {
            $sql ='select Nombre from catPartidasPresupuestales
            where id=?'; 
            $qClave = $this->db->query($sql, array($rPartida->idPartidaPresupuestal));
            foreach ($qClave->result() as $rClave) {
               $partidas_presupuestales.=$rClave->Nombre.'<br/>';
            }

        }
        
        
        
        $direccion = $this->impresiones_model->direccion($dObra['idDireccion']);


        $data = array(
            'obra' => $dObra,
            'memoria' => $dMemoria,
            'claves_presupuestales' => $claves_presupuestales,
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'qConceptos' => $qConceptos,
            'direccion' => $direccion,
            'residencia' => $residencia,
            'partidas_presupuestales' => $partidas_presupuestales,
            'autorizo' => $this->impresiones_model->firma_funcionario($dMemoria['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dMemoria['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dMemoria['idElaboro']),
            'reviso' => $this->impresiones_model->firma_funcionario($dMemoria['idReviso'])    
        );

        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            /*
            if ($dMemoria['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }
            */
            $cadena_footer = $this->load->view('v_reporte_memoria_materiales_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_detalle_memoria_materiales', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_detalle_memoria_materiales', $data);
        }
    }


    
    public function solicitud_aprovisionamiento($idaprovisionamiento, $pdf = 1) {
        $this->load->model('aprovisionamientos_model');
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');
        $this->load->model('residencias_model');
        
        
        
        $this->load->library('ferfunc');

        $dAprovisionamiento = $this->aprovisionamientos_model->datos_aprovisionamiento($idaprovisionamiento)->row_array();
        $dObra = $this->obras_model->datos_obra($dAprovisionamiento['idObra'])->row_array();
        $qConceptos = $this->impresiones_model->conceptos_aprovisionamiento($idaprovisionamiento);
        $direccion = $this->impresiones_model->direccion($dObra['idDireccion']);


        $data = array(
            'obra' => $dObra,
            'aprovisionamiento' => $dAprovisionamiento,
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'qconceptos' => $qConceptos,
            'direccion' => $direccion,
            'autorizo' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idElaboro']),
            'recibe' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idRecibio'])
        );

        
        
        $data['ClavePresupuestal']= $this->aprovisionamientos_model->get_clave_presupuestal($dAprovisionamiento['idClavePresupuestal']);
       
                
        
        /*
         $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            $mpdf = new mPDF('utf-8', 'Letter',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';

            
            //$mpdf->forcePortraitHeaders = true;
            
            //$mpdf->mirrorMargins = 1;
            
            
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }
             $mpdf->useOddEven = false;
           
            
            
            $cadena_footer = $this->load->view('v_reporte_solicitud_de_cotizacion_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_solicitud_de_cotizacion', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            */
        
        $data['residencias']=$this->residencias_model->addwResidencias();
        
        if ($pdf == 1) {
            
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            //$mpdf->shrink_tables_to_fit = 1;
            //$mpdf->forcePortraitHeaders = true;
                        
            if ($dAprovisionamiento['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }
            
            $mpdf->useOddEven = false;

            if ($dAprovisionamiento["fondo_revolvente"]==1){
                $cadena_footer = $this->load->view('v_reporte_aprovisionamiento_pie', $data, true);
            }else{
                 $cadena_footer = $this->load->view('v_reporte_aprovisionamiento_fondo_pie', $data, true);
            }
             $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_aprovisionamiento', $data, true);
                        
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_aprovisionamiento', $data);
        }
    }
    
    
    
    
     public function solicitud_aprovisionamiento_umom($idaprovisionamiento, $pdf = 1) {
        $this->load->model('aprovisionamientos_model');
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');
        $this->load->model('residencias_model');
        
        $this->load->library('ferfunc');

        $dAprovisionamiento = $this->aprovisionamientos_model->datos_aprovisionamiento($idaprovisionamiento)->row_array();
        $dObra = $this->obras_model->datos_obra($dAprovisionamiento['idObra'])->row_array();
        $qConceptos = $this->impresiones_model->conceptos_aprovisionamiento($idaprovisionamiento);
        $direccion = $this->impresiones_model->direccion($dObra['idDireccion']);

        $data = array(
            'obra' => $dObra,
            'aprovisionamiento' => $dAprovisionamiento,
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'qconceptos' => $qConceptos,
            'direccion' => $direccion,
            'autorizo' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idElaboro']),
            'recibe' => $this->impresiones_model->firma_funcionario($dAprovisionamiento['idRecibio'])
        );
        
        $data['ClavePresupuestal']= $this->aprovisionamientos_model->get_clave_presupuestal($dAprovisionamiento['idClavePresupuestal']);
       
        /*
         $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            $mpdf = new mPDF('utf-8', 'Letter',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';

            
            //$mpdf->forcePortraitHeaders = true;
            
            //$mpdf->mirrorMargins = 1;
            
            
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }
             $mpdf->useOddEven = false;
           
            
            
            $cadena_footer = $this->load->view('v_reporte_solicitud_de_cotizacion_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_solicitud_de_cotizacion', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            */
        
        $data['residencias']=$this->residencias_model->addwResidencias();
        
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            //$mpdf->shrink_tables_to_fit = 1;
            //$mpdf->forcePortraitHeaders = true;            
            
            if ($dAprovisionamiento['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }            
            $mpdf->useOddEven = false;            
           
            $cadena_footer = $this->load->view('v_reporte_aprovisionamiento_umom_pie', $data, true);            
            $mpdf->SetHTMLFooter($cadena_footer);            
            $output = $this->load->view('v_reporte_aprovisionamiento', $data, true);
            
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_aprovisionamiento', $data);
        }
    }
    
    
    public function solicitud_orden_compra($idOrdenCompra, $pdf = 1) {
        $this->load->model('cotizaciones_model');
        $this->load->model('aprovisionamientos_model');
        $this->load->model('ordenescompra_model');
        $this->load->model('proveedores_model');
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');

        $this->load->library('ferfunc');

        $dOrdenCompra = $this->ordenescompra_model->datos_ordencompra($idOrdenCompra)->row_array();
        $dObra = $this->obras_model->datos_obra($dOrdenCompra['idObra'])->row_array();
        $dProveedor = $this->proveedores_model->get_proveedor($dOrdenCompra['idProveedor'])->row_array();
        
        $direccion = $this->impresiones_model->direccion($dObra['idDireccion']);
        
        $qConceptos = $this->impresiones_model->conceptos_ordencompra($idOrdenCompra);
               
        //--- clave presupuestal
        
        
        $ClavesPresupuestales = $this->aprovisionamientos_model->get_clave_presupuestal($dOrdenCompra['idClavePresupuestal']); // MAVS
                       
        $qCotizaciones=$this->impresiones_model->cotizaciones_orden_compra($idOrdenCompra);
        
        $FolioCotizacion="";
        foreach ($qCotizaciones->result_array() as $cotizaciones):
            $aCotizacion = $this->cotizaciones_model->datos_cotizacion($cotizaciones['idCotizacion'])->row_array();
            $FolioCotizacion=$aCotizacion['Folio'];
        endforeach;
        
        $qAprovisionamientos=$this->impresiones_model->aprivisionamientos_orden_compra($idOrdenCompra);
        
        $FolioAprovisionamiento="";
        foreach ($qAprovisionamientos->result_array() as $aprovisionamiento):
            if ($FolioAprovisionamiento==""){
                $FolioAprovisionamiento.=$aprovisionamiento['Folio'];
            }else{
                 $FolioAprovisionamiento.=','.  $aprovisionamiento['Folio'];
            }
        endforeach;
       
        $data = array(
            'obra' => $dObra,
            'ordencompra' => $dOrdenCompra,
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'qconceptos' =>  $qConceptos,
            'direccion' => $direccion,
            'proveedor' =>$dProveedor,
            'autorizo' => $this->impresiones_model->firma_funcionario($dOrdenCompra['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dOrdenCompra['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dOrdenCompra['idElaboro']),
            'recibio' => $this->impresiones_model->firma_funcionario($dOrdenCompra['idRecibio']),
            'VoBoEjecutor' => $this->impresiones_model->firma_funcionario($dOrdenCompra['idVoBoEjecutor']),
            'FolioCotizacion'=>$FolioCotizacion,
            'FolioAprovisionamiento'=>$FolioAprovisionamiento,
            'ClavesPresupuestales' => $ClavesPresupuestales
        );

        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            $mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;
            
            
            if ($dOrdenCompra['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }
 
          
        
           
            $cadena_footer = $this->load->view('v_reporte_solicitud_orden_compra_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_solicitud_orden_compra', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_solicitud_orden_compra', $data);
        }
    }

    
   public function solicitud_cotizacion($id, $pdf = 1) {
        $this->load->model('proveedores_participantes_model');
        $this->load->model('cotizaciones_model');
        $this->load->model('proveedores_model');
        $this->load->model('impresiones_model');

        $this->load->library('ferfunc');
        
        $dProveedoresCotizacion = $this->proveedores_participantes_model->datos_ProveedoresCotizacion($id)->row_array();
        $dCotizacion = $this->cotizaciones_model->datos_cotizacion($dProveedoresCotizacion['idCotizacion'])->row_array();
        $dProveedor = $this->proveedores_model->get_proveedor($dProveedoresCotizacion['idProveedor'])->row_array(); 
        $qConceptos = $this->cotizaciones_model->conceptos_cotizacion_proveedor($id);
       
        $data = array(
            'cotizacion' => $dCotizacion,
            //'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'qconceptos' =>  $qConceptos,
            'proveedor' =>$dProveedor,
            'autorizo' => $this->impresiones_model->firma_funcionario($dCotizacion['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dCotizacion['idVobo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dCotizacion['idElaboro']),
            'Fecha' =>  strtoupper($this->ferfunc->fechacascompleta($dCotizacion['Fecha']))        
        );
        
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            $mpdf = new mPDF('utf-8', 'Letter',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';
            
            //$mpdf->forcePortraitHeaders = true;
            
            //$mpdf->mirrorMargins = 1;
            
            /*
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/
             $mpdf->useOddEven = false;
            
            $cadena_footer = $this->load->view('v_reporte_solicitud_de_cotizacion_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_solicitud_de_cotizacion', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            
           
            
        } else {
            $this->load->view('v_reporte_solicitud_de_cotizacion', $data);
        }
    }

     function checkDateTime($data) {
    if (date('Y-m-d', strtotime($data)) == $data) {
        return true;
    } else {
        return false;
    }
 }
    
    
    public function comparativo_cotizacion($id, $pdf = 1) {
        $this->load->model('proveedores_participantes_model');
        $this->load->model('cotizaciones_model');
        $this->load->model('proveedores_model');
        $this->load->model('impresiones_model');


        $this->load->library('ferfunc');

        
        
        $fecha_impresion=date('Y-m-d');
        if ($this->checkDateTime($this->input->post('Fecha_Cuadro_Comparativo'))==true){
           $fecha_impresion=$this->input->post('Fecha_Cuadro_Comparativo'); 
        }
        
        
        
        $this->modificar_fecha_solicitud($id,$fecha_impresion);
        
        
        $dCotizacion = $this->cotizaciones_model->datos_cotizacion($id)->row_array();
        
       
        $data = array(
            'cotizacion' => $dCotizacion,
            'autorizo' => $this->impresiones_model->firma_funcionario($dCotizacion['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dCotizacion['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dCotizacion['idElaboro'])
        );
        
        
        
        //$dProveedoresCotizacion = $this->proveedores_participantes_model->datos_ProveedoresCotizacion($id)->row_array();
        //$dCotizacion = $this->cotizaciones_model->datos_cotizacion($dProveedoresCotizacion['idCotizacion'])->row_array();
        //$dProveedor = $this->proveedores_model->get_proveedor($dProveedoresCotizacion['idProveedor'])->row_array(); 
        
        $qConceptos = $this->cotizaciones_model->conceptos_cotizacion($id);
        $qProveedores = $this->proveedores_participantes_model->listado($id);
        
        
         $listadoPrecios = array();

         
        foreach ($qConceptos->result() as $aConceptos) {

            $itemEmpleado = array();
            $itemEmpleado['Cantidad'] = $aConceptos->Cantidad;
            $itemEmpleado['Concepto'] = trim($aConceptos->Concepto).' '. trim($aConceptos->Descripcion);
            $itemEmpleado['UnidadMedida'] = $aConceptos->UnidadMedida;
            $itemEmpleado['id'] = $aConceptos->id;
            
            $i=0;
            
            $itemEmpleado['Proveedor1'] = "";
            $itemEmpleado['marca1'] = "";
            $itemEmpleado['precio_unitario1'] =  0.0000;
            $itemEmpleado['total1'] = 0.00;
            $itemEmpleado['iva1'] = 0.00;

            $itemEmpleado['Proveedor2'] = "";
            $itemEmpleado['marca2'] = "";
            $itemEmpleado['precio_unitario2'] =  0.0000;
            $itemEmpleado['total2'] = 0.00;
            $itemEmpleado['iva2'] = 0.00;

            $itemEmpleado['Proveedor3'] = "";
            $itemEmpleado['marca3'] = "";
            $itemEmpleado['precio_unitario3'] =  0.0000;
            $itemEmpleado['total3'] = 0.00;
            $itemEmpleado['iva3'] = 0.00;    
          
           foreach ($qProveedores->result() as $aProveedores) {
                $aProveedorConcepto = $this->proveedores_participantes_model->datos_ProveedoresConceptos($aConceptos->id,$aProveedores->id)->row_array();
                $i+=1;
                $itemEmpleado['marca'.$i] = $aProveedorConcepto['marca'];
                $itemEmpleado['precio_unitario'.$i] =  $aProveedorConcepto['Precio'];
                $itemEmpleado['total'.$i] = $aProveedorConcepto['Precio']*$aProveedorConcepto['Cantidad'];
                $itemEmpleado['iva'.$i] =  $aProveedorConcepto['IVA'];
                
            }


            /*
            foreach ($qProveedores->result() as $aProveedores) {
                $aProveedorConcepto = $this->proveedores_participantes_model->datos_ProveedoresConceptos($aConceptos->id,$aProveedores->id)->row_array();
                $itemEmpleado['marca'.$aConceptos->id.'-'.$aProveedores->id] = "";
                $itemEmpleado['precio_unitario'.$aConceptos->id.'-'.$aProveedores->id] =  $aProveedorConcepto['Precio'];
                $itemEmpleado['total'.$aConceptos->id.'-'.$aProveedores->id] = $aProveedorConcepto['Precio']*$aConceptos->Cantidad;
            }*/
            
            
            
            $listadoPrecios[] = $itemEmpleado;
        }
        
        $data['conceptos'] = $listadoPrecios;
        
        
        
        $i=0;
        
        $itemProveedor = array();
        $itemProveedor['Proveedor1']="";
        $itemProveedor['Proveedor2']="";      
        $itemProveedor['Proveedor3']="";
        
        $itemProveedor['Telefono1']="";
        $itemProveedor['Telefono2']="";      
        $itemProveedor['Telefono3']="";
        
        
        $itemProveedor['Persona_Cotizo1']="";
        $itemProveedor['Persona_Cotizo2']="";      
        $itemProveedor['Persona_Cotizo3']="";
                
        $itemProveedor['Plazo_Entrega1']="";
        $itemProveedor['Plazo_Entrega2']="";      
        $itemProveedor['Plazo_Entrega3']="";
        
        
        $itemProveedor['Condiciones_Pago1']="";
        $itemProveedor['Condiciones_Pago2']="";      
        $itemProveedor['Condiciones_Pago3']="";
        
        
        $itemProveedor['Vigencia_Cotizacion1']="";
        $itemProveedor['Vigencia_Cotizacion2']="";      
        $itemProveedor['Vigencia_Cotizacion3']="";

        foreach ($qProveedores->result() as $aProveedores) {
           $i+=1; 
           $itemProveedor['Proveedor'.$i] = trim($aProveedores->nombre); 
           $itemProveedor['Telefono'.$i] = trim($aProveedores->telefono);
           $itemProveedor['Persona_Cotizo'.$i] = trim($aProveedores->Persona_Cotizo); 
           $itemProveedor['Plazo_Entrega'.$i] = $aProveedores->Plazo_Entrega; 
           $itemProveedor['Condiciones_Pago'.$i] = $aProveedores->Condiciones_Pago; 
           $itemProveedor['Vigencia_Cotizacion'.$i] = $aProveedores->Vigencia_Cotizacion;
           $itemProveedor['descuento'.$i] = $aProveedores->descuento;
           
          
           
        }
        
       
        
        $data['Proveedores'] = $itemProveedor;

       
        
       
         
        if ($pdf == 1) {
            
            
            
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            //$mpdf->pagenumPrefix = 'Página ';
            //$mpdf->pagenumSuffix = ' de ';

            
            //$mpdf->forcePortraitHeaders = true;
            
            //$mpdf->mirrorMargins = 1;
            
            /*
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/
             $mpdf->useOddEven = false;
           
            
            
            //$cadena_footer = $this->load->view('v_reporte_comparativo_cotizaciones_pie', $data, true);
            //$mpdf->SetHTMLFooter($cadena_footer);
            
            $cadena_footer='<table width="900" border="0" cellspacing="0"> <tr>
           <td align="left" width="100%" >Pagina {PAGENO} de {nbpg}</td>
        </tr> </table>';   
            $mpdf->SetHTMLFooter($cadena_footer); 
            
            $output = $this->load->view('v_reporte_comparativo_cotizaciones', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            
           
            
        } else {
            $this->load->view('v_reporte_comparativo_cotizaciones', $data);
        }
    }


      public function comparativo_cotizacion_cuatro($id, $pdf = 1) {
        $this->load->model('proveedores_participantes_model');
        $this->load->model('cotizaciones_model');
        $this->load->model('proveedores_model');
        $this->load->model('impresiones_model');


        $this->load->library('ferfunc');

        
        
        $dCotizacion = $this->cotizaciones_model->datos_cotizacion($id)->row_array();
        
       
        $data = array(
            'cotizacion' => $dCotizacion,
            'autorizo' => $this->impresiones_model->firma_funcionario($dCotizacion['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dCotizacion['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dCotizacion['idElaboro'])
        );
        
        
        
        //$dProveedoresCotizacion = $this->proveedores_participantes_model->datos_ProveedoresCotizacion($id)->row_array();
        //$dCotizacion = $this->cotizaciones_model->datos_cotizacion($dProveedoresCotizacion['idCotizacion'])->row_array();
        //$dProveedor = $this->proveedores_model->get_proveedor($dProveedoresCotizacion['idProveedor'])->row_array(); 
        
        $qConceptos = $this->cotizaciones_model->conceptos_cotizacion($id);
        $qProveedores = $this->proveedores_participantes_model->listado($id);
        
        
         $listadoPrecios = array();

         
        foreach ($qConceptos->result() as $aConceptos) {

            $itemEmpleado = array();
            $itemEmpleado['Cantidad'] = $aConceptos->Cantidad;
            $itemEmpleado['Concepto'] = trim($aConceptos->Concepto).' '. trim($aConceptos->Descripcion);
            $itemEmpleado['UnidadMedida'] = $aConceptos->UnidadMedida;
            $itemEmpleado['id'] = $aConceptos->id;
            
            $i=0;
            
            $itemEmpleado['Proveedor1'] = "";
            $itemEmpleado['marca1'] = "";
            $itemEmpleado['precio_unitario1'] =  0.00;
            $itemEmpleado['total1'] = 0.00;
            $itemEmpleado['iva1'] = 0.00;

            $itemEmpleado['Proveedor2'] = "";
            $itemEmpleado['marca2'] = "";
            $itemEmpleado['precio_unitario2'] =  0.00;
            $itemEmpleado['total2'] = 0.00;
            $itemEmpleado['iva2'] = 0.00;

            $itemEmpleado['Proveedor3'] = "";
            $itemEmpleado['marca3'] = "";
            $itemEmpleado['precio_unitario3'] =  0.00;
            $itemEmpleado['total3'] = 0.00;
            $itemEmpleado['iva3'] = 0.00;    

            $itemEmpleado['Proveedor4'] = "";
            $itemEmpleado['marca4'] = "";
            $itemEmpleado['precio_unitario4'] =  0.00;
            $itemEmpleado['total4'] = 0.00;
            $itemEmpleado['iva4'] = 0.00;    
          
           foreach ($qProveedores->result() as $aProveedores) {
                $aProveedorConcepto = $this->proveedores_participantes_model->datos_ProveedoresConceptos($aConceptos->id,$aProveedores->id)->row_array();
                $i+=1;
                $itemEmpleado['marca'.$i] = $aProveedorConcepto['marca'];
                $itemEmpleado['precio_unitario'.$i] =  $aProveedorConcepto['Precio'];
                $itemEmpleado['total'.$i] = $aProveedorConcepto['Precio']*$aProveedorConcepto['Cantidad'];
                $itemEmpleado['iva'.$i] =  $aProveedorConcepto['IVA'];
                
            }


            /*
            foreach ($qProveedores->result() as $aProveedores) {
                $aProveedorConcepto = $this->proveedores_participantes_model->datos_ProveedoresConceptos($aConceptos->id,$aProveedores->id)->row_array();
                $itemEmpleado['marca'.$aConceptos->id.'-'.$aProveedores->id] = "";
                $itemEmpleado['precio_unitario'.$aConceptos->id.'-'.$aProveedores->id] =  $aProveedorConcepto['Precio'];
                $itemEmpleado['total'.$aConceptos->id.'-'.$aProveedores->id] = $aProveedorConcepto['Precio']*$aConceptos->Cantidad;
            }*/
            
            
            
            $listadoPrecios[] = $itemEmpleado;
        }
        
        $data['conceptos'] = $listadoPrecios;
        
        
        
        $i=0;
        
        $itemProveedor = array();
        $itemProveedor['Proveedor1']="";
        $itemProveedor['Proveedor2']="";      
        $itemProveedor['Proveedor3']="";
        $itemProveedor['Proveedor4']="";
        
        $itemProveedor['Telefono1']="";
        $itemProveedor['Telefono2']="";      
        $itemProveedor['Telefono3']="";
        $itemProveedor['Telefono4']="";
        
        
        $itemProveedor['Persona_Cotizo1']="";
        $itemProveedor['Persona_Cotizo2']="";      
        $itemProveedor['Persona_Cotizo3']="";
        $itemProveedor['Persona_Cotizo4']="";
                
        $itemProveedor['Plazo_Entrega1']="";
        $itemProveedor['Plazo_Entrega2']="";      
        $itemProveedor['Plazo_Entrega3']="";
        $itemProveedor['Plazo_Entrega4']="";
        
        
        $itemProveedor['Condiciones_Pago1']="";
        $itemProveedor['Condiciones_Pago2']="";      
        $itemProveedor['Condiciones_Pago3']="";
        $itemProveedor['Condiciones_Pago4']="";
        
        
        $itemProveedor['Vigencia_Cotizacion1']="";
        $itemProveedor['Vigencia_Cotizacion2']="";      
        $itemProveedor['Vigencia_Cotizacion3']="";
        $itemProveedor['Vigencia_Cotizacion4']="";




        foreach ($qProveedores->result() as $aProveedores) {
           $i+=1; 
           $itemProveedor['Proveedor'.$i] = trim($aProveedores->nombre); 
           $itemProveedor['Telefono'.$i] = trim($aProveedores->telefono);
           $itemProveedor['Persona_Cotizo'.$i] = trim($aProveedores->Persona_Cotizo); 
           $itemProveedor['Plazo_Entrega'.$i] = $aProveedores->Plazo_Entrega; 
           $itemProveedor['Condiciones_Pago'.$i] = $aProveedores->Condiciones_Pago; 
           $itemProveedor['Vigencia_Cotizacion'.$i] = $aProveedores->Vigencia_Cotizacion; 
        }
        
       
        
        $data['Proveedores'] = $itemProveedor;

       
        
       
         
        if ($pdf == 1) {
            
            
            
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            //$mpdf->pagenumPrefix = 'Página ';
            //$mpdf->pagenumSuffix = ' de ';

            
            //$mpdf->forcePortraitHeaders = true;
            
            //$mpdf->mirrorMargins = 1;
            
            /*
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/
             $mpdf->useOddEven = false;
           
            
            
            $cadena_footer = $this->load->view('v_reporte_comparativo_cotizaciones_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_comparativo_cotizaciones4', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            
           
            
        } else {
            $this->load->view('v_reporte_comparativo_cotizaciones4', $data);
        }
    }


      public function comparativo_cotizacion_cinco($id, $pdf = 1) {
        $this->load->model('proveedores_participantes_model');
        $this->load->model('cotizaciones_model');
        $this->load->model('proveedores_model');
        $this->load->model('impresiones_model');


        $this->load->library('ferfunc');

        
        
        $dCotizacion = $this->cotizaciones_model->datos_cotizacion($id)->row_array();
        
       
        $data = array(
            'cotizacion' => $dCotizacion,
            'autorizo' => $this->impresiones_model->firma_funcionario($dCotizacion['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dCotizacion['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dCotizacion['idElaboro'])
        );
        
        
        
        //$dProveedoresCotizacion = $this->proveedores_participantes_model->datos_ProveedoresCotizacion($id)->row_array();
        //$dCotizacion = $this->cotizaciones_model->datos_cotizacion($dProveedoresCotizacion['idCotizacion'])->row_array();
        //$dProveedor = $this->proveedores_model->get_proveedor($dProveedoresCotizacion['idProveedor'])->row_array(); 
        
        $qConceptos = $this->cotizaciones_model->conceptos_cotizacion($id);
        $qProveedores = $this->proveedores_participantes_model->listado($id);
        
        
         $listadoPrecios = array();

         
        foreach ($qConceptos->result() as $aConceptos) {

            $itemEmpleado = array();
            $itemEmpleado['Cantidad'] = $aConceptos->Cantidad;
            $itemEmpleado['Concepto'] = trim($aConceptos->Concepto).' '. trim($aConceptos->Descripcion);
            $itemEmpleado['UnidadMedida'] = $aConceptos->UnidadMedida;
            $itemEmpleado['id'] = $aConceptos->id;
            
            $i=0;
            
            $itemEmpleado['Proveedor1'] = "";
            $itemEmpleado['marca1'] = "";
            $itemEmpleado['precio_unitario1'] =  0.00;
            $itemEmpleado['total1'] = 0.00;
            $itemEmpleado['iva1'] = 0.00;

            $itemEmpleado['Proveedor2'] = "";
            $itemEmpleado['marca2'] = "";
            $itemEmpleado['precio_unitario2'] =  0.00;
            $itemEmpleado['total2'] = 0.00;
            $itemEmpleado['iva2'] = 0.00;

            $itemEmpleado['Proveedor3'] = "";
            $itemEmpleado['marca3'] = "";
            $itemEmpleado['precio_unitario3'] =  0.00;
            $itemEmpleado['total3'] = 0.00;
            $itemEmpleado['iva3'] = 0.00;    

            $itemEmpleado['Proveedor4'] = "";
            $itemEmpleado['marca4'] = "";
            $itemEmpleado['precio_unitario4'] =  0.00;
            $itemEmpleado['total4'] = 0.00;
            $itemEmpleado['iva4'] = 0.00;   
          

            $itemEmpleado['Proveedor5'] = "";
            $itemEmpleado['marca5'] = "";
            $itemEmpleado['precio_unitario5'] =  0.00;
            $itemEmpleado['total5'] = 0.00;
            $itemEmpleado['iva5'] = 0.00;   

           foreach ($qProveedores->result() as $aProveedores) {
                $aProveedorConcepto = $this->proveedores_participantes_model->datos_ProveedoresConceptos($aConceptos->id,$aProveedores->id)->row_array();
                $i+=1;
                $itemEmpleado['marca'.$i] = $aProveedorConcepto['marca'];
                $itemEmpleado['precio_unitario'.$i] =  $aProveedorConcepto['Precio'];
                $itemEmpleado['total'.$i] = $aProveedorConcepto['Precio']*$aProveedorConcepto['Cantidad'];
                $itemEmpleado['iva'.$i] =  $aProveedorConcepto['IVA'];
                
            }


            /*
            foreach ($qProveedores->result() as $aProveedores) {
                $aProveedorConcepto = $this->proveedores_participantes_model->datos_ProveedoresConceptos($aConceptos->id,$aProveedores->id)->row_array();
                $itemEmpleado['marca'.$aConceptos->id.'-'.$aProveedores->id] = "";
                $itemEmpleado['precio_unitario'.$aConceptos->id.'-'.$aProveedores->id] =  $aProveedorConcepto['Precio'];
                $itemEmpleado['total'.$aConceptos->id.'-'.$aProveedores->id] = $aProveedorConcepto['Precio']*$aConceptos->Cantidad;
            }*/
            
            
            
            $listadoPrecios[] = $itemEmpleado;
        }
        
        $data['conceptos'] = $listadoPrecios;
        
        
        
        $i=0;
        
        $itemProveedor = array();
        $itemProveedor['Proveedor1']="";
        $itemProveedor['Proveedor2']="";      
        $itemProveedor['Proveedor3']="";
        $itemProveedor['Proveedor4']="";
        $itemProveedor['Proveedor5']="";
        
        $itemProveedor['Telefono1']="";
        $itemProveedor['Telefono2']="";      
        $itemProveedor['Telefono3']="";
        $itemProveedor['Telefono4']="";      
        $itemProveedor['Telefono5']="";
        
        
        $itemProveedor['Persona_Cotizo1']="";
        $itemProveedor['Persona_Cotizo2']="";      
        $itemProveedor['Persona_Cotizo3']="";
        $itemProveedor['Persona_Cotizo4']="";      
        $itemProveedor['Persona_Cotizo5']="";
                
        $itemProveedor['Plazo_Entrega1']="";
        $itemProveedor['Plazo_Entrega2']="";      
        $itemProveedor['Plazo_Entrega3']="";
        $itemProveedor['Plazo_Entrega4']="";      
        $itemProveedor['Plazo_Entrega5']="";
        
        
        $itemProveedor['Condiciones_Pago1']="";
        $itemProveedor['Condiciones_Pago2']="";      
        $itemProveedor['Condiciones_Pago3']="";
        $itemProveedor['Condiciones_Pago4']="";      
        $itemProveedor['Condiciones_Pago5']="";
        
        $itemProveedor['Vigencia_Cotizacion1']="";
        $itemProveedor['Vigencia_Cotizacion2']="";      
        $itemProveedor['Vigencia_Cotizacion3']="";
        $itemProveedor['Vigencia_Cotizacion4']="";      
        $itemProveedor['Vigencia_Cotizacion5']="";

        foreach ($qProveedores->result() as $aProveedores) {
           $i+=1; 
           $itemProveedor['Proveedor'.$i] = trim($aProveedores->nombre); 
           $itemProveedor['Telefono'.$i] = trim($aProveedores->telefono);
           $itemProveedor['Persona_Cotizo'.$i] = trim($aProveedores->Persona_Cotizo); 
           $itemProveedor['Plazo_Entrega'.$i] = $aProveedores->Plazo_Entrega; 
           $itemProveedor['Condiciones_Pago'.$i] = $aProveedores->Condiciones_Pago; 
           $itemProveedor['Vigencia_Cotizacion'.$i] = $aProveedores->Vigencia_Cotizacion; 
        }
        
       
        
        $data['Proveedores'] = $itemProveedor;

       
        
       
         
        if ($pdf == 1) {
            
            
            
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            //$mpdf->pagenumPrefix = 'Página ';
            //$mpdf->pagenumSuffix = ' de ';

            
            //$mpdf->forcePortraitHeaders = true;
            
            //$mpdf->mirrorMargins = 1;
            
            /*
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/
             $mpdf->useOddEven = false;
           
            
            
            $cadena_footer = $this->load->view('v_reporte_comparativo_cotizaciones_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_comparativo_cotizaciones5', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            
           
            
        } else {
            $this->load->view('v_reporte_comparativo_cotizaciones5', $data);
        }
    }

    
    
    
    
    public function detalle_memoria_nomina($idmemoria, $pdf = 1) {
        $this->load->model('memorias_model');
        $this->load->model('facturas_model');
        $this->load->model('conceptos_model');
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');


        $this->load->library('ferfunc');
        $this->load->library('table');

        $dMemoria = $this->memorias_model->datos_memoria($idmemoria)->row_array();
        $dObra = $this->obras_model->datos_obra($dMemoria['idObra'])->row_array();

        $this->db->where('idObra', $dObra['id']);
        $qPartida = $this->db->get_where('catObrasRelPartidasPresupuestales');

        $this->db->where('id',$dObra['idResidencia']);
        $dResidencia=  $this->db->get_where('memResidencias');

        $residencia="";
        if ($dResidencia->num_rows()>0){
        	$aResidencia=$dResidencia->row_array();
        	$residencia=$aResidencia["Nombre"];
        }

        echo $residencia;
       // exit();
        
        
        $this->db->where('idObra', $dObra['id']);
        $qPartida = $this->db->get_where('catObrasRelPartidasPresupuestales');
        
        $this->db->where('id', $dMemoria['idClavePresupuestal']);
        $qClave = $this->db->get_where('catClavesPresupuestales');
        
        $claves_presupuestales="";
        
        $aClave=$qClave->row_array();
        $claves_presupuestales=$aClave['ClavePresupuestal'];
        
        
        /*
        
        $claves_presupuestales="";
        foreach ($qPartida->result() as $rPartida) {
            $sql ='select catClavesPresupuestales.* from catObrasRelClavesPresupuestales inner join catClavesPresupuestales on 
            catObrasRelClavesPresupuestales.idClavePresupuestal = catClavesPresupuestales.id
            where idRelPartidaPresupuestal=? order by id asc '; 
            $qClave = $this->db->query($sql, array($rPartida->id));
            foreach ($qClave->result() as $rClave) {
               $claves_presupuestales.=$rClave->ClavePresupuestal.'<br/>';
            }

        }
        */

        $partidas_presupuestales="";
        foreach ($qPartida->result() as $rPartida) {
            $sql ='select Nombre from catPartidasPresupuestales
            where id=?'; 
            $qClave = $this->db->query($sql, array($rPartida->idPartidaPresupuestal));
            foreach ($qClave->result() as $rClave) {
               $partidas_presupuestales.=$rClave->Nombre.'<br/>';
            }

        }



        
        
        $qConceptos = $this->facturas_model->listado_nominas($idmemoria);
        
        
        
//        $aCheques = $this->impresiones_model->cheques_memorias($idmemoria);
        $direccion = $this->impresiones_model->direccion($dObra['idDireccion']);
        $partida = $this->impresiones_model->partida_presupuestal($dObra['idPartidaPresupuestal'])->row_array();
        
        
       
        
       
        /*
        
        $this->table->set_template(
                array(
                    'table_open' => '<table id="facturas">',
                    'heading_row_start' => '<tr>',
                    'heading_row_end' => '</tr>',
                    'heading_cell_start' => '<th style="vertical-align: top; text-align: center;">',
                    'heading_cell_end' => '</th>',
                    'row_start' => '<tr>',
                    'row_end' => '</tr>',
                    'cell_start' => '<td>',
                    'cell_end' => '</td>',
                    'table_close' => '</table>'
        ));
        $this->table->set_heading(array('NUMERO CONSECUTIVO', 'PERIODO', 'CONCEPTO', 'IMPORTE'));
        $i=1;
        $total=0;
        foreach ($qConceptos->result() as $rConcepto) {
            $i++;
            $total+=$rConcepto->importe;
            $tabla = array(
                array('data' => $i, 'style' => 'vertical-align: top; text-align: center'),
                array('data' => $rConcepto->periodo, 'style' => 'vertical-align: top; text-align: center'),
                array('data' => $rConcepto->concepto, 'style' => 'vertical-align: top; text-align: center'),
                array('data' => $this->ferfunc->formato_dinero($rConcepto->importe), 'style' => 'vertical-align: top;text-align: right')
            );
            $this->table->add_row($tabla);
            $cheques = $this->facturas_model->listado_cheques_cancelados($rConcepto->id);
            foreach ($cheques->result() as $rCheques) {
                $importe = 0 - $rCheques->importe;
                $i++;
                $total+=$importe;
                $tabla = array(
                    array('data' => $i, 'style' => 'vertical-align: top; text-align: center'),
                    array('data' => $rConcepto->periodo, 'style' => 'vertical-align: top; text-align: center'),
                    array('data' => 'DEDUCTIVA POR CANCELACION', 'style' => 'vertical-align: top; text-align: center'),
                    array('data' => '-' . $this->ferfunc->formato_dinero($importe), 'style' => 'vertical-align: top;text-align: right;color: #990000')
                );
                $this->table->add_row($tabla);
            }
        }
        $this->table->add_row(array(
            'data' => $this->ferfunc->fechacascompleta($dMemoria['fecha']),
            'colspan' => 2,
            'style' => 'font-size: 10pt;font-weight: bold;text-align: center'
                ), array('data' => 'TOTAL',
            'class' => 'titulosCabezera',
            'style' => 'text-align: center;'), array('data' => $this->ferfunc->formato_dinero($total),
            'style' => 'text-align: right;')
        );

       
        */
         
        
        $data = array(
            'obra' => $dObra,
            'memoria' => $dMemoria,
            'claves_presupuestales' => $claves_presupuestales,
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            //'tabla' => $this->table->generate(),
            'direccion' => $direccion,
            'autorizo' => $this->impresiones_model->firma_funcionario($dMemoria['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dMemoria['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dMemoria['idElaboro']),
            'reviso'  => $this->impresiones_model->firma_funcionario($dMemoria['idReviso']),
//            'cheques' => $aCheques,
            'partidas_presupuestales' => $partidas_presupuestales,
            'residencia'=>$residencia,
            //'total' => $total,
            'qConceptos' => $qConceptos,
        );

        
        
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter-L');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            /*
            if ($dMemoria['Estatus'] < 40) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/

            $output = $this->load->view('v_reporte_detalle_memoria_nomina', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_detalle_memoria_nomina', $data);
        }
    }

    public function nomina_ot($idObra) {
        $this->load->model('obras_model');
        $this->load->model('memorias_model');
        $this->load->model('impresiones_model');
        $this->load->model('facturas_model');
        $this->load->model('residencias_model');
        $this->load->model('conceptos_model');

        $this->load->library('ferfunc');
        $this->load->library('excel');

        $dObra = $this->obras_model->datos_obra($idObra)->row_array();
        $memorias = $this->impresiones_model->memorias_nominas($idObra);
        $aResidencias = $this->residencias_model->aResidencias();
        $aConceptos = $this->conceptos_model->aConceptos();
        $datos = array(
            array(
                'Orden Trabajo',
                'Memoria',
                'Residencia',
                'Concepto',
                'Periodo',
                'Fecha',
                'Importe',
                'ISPT',
                'ISR',
                '2 al Millar',
                'Deductiva Cheque',
                'ISR ASIM',
                '2 al Millar a deduccion',
                'Neto 2 al Millar',
                'Neto ISR',
                'Neto',
                
        ));
        $this->excel->setActiveSheetIndex(0);
//        $this->excel->getActiveSheet()->fromArray($titCabecera, null, 'A1');

        foreach ($memorias->result() as $rmemoria) {
            $nominas = $this->facturas_model->listado_nominas($rmemoria->id);
            foreach ($nominas->result() as $rnominas) {
                $retDeduccion = $rnominas->deduChecquecancelado * 0.002;
                $netoRetencion = $rnominas->importe_retencion - $retDeduccion;
                $netoISR = $rnominas->isr - $rnominas->isr_asim;
                $neto = $rnominas->importe - $rnominas->deduChecquecancelado;
                $datos[] = array(
                    $dObra['OrdenTrabajo'],
                    $rmemoria->numero,
                    $aResidencias[$rnominas->idResidencia],
                    $rnominas->concepto,
                    $rnominas->periodo,
                    $this->ferfunc->fechacas($rnominas->fecha_nomina),
                    $this->ferfunc->formato_dinero($rnominas->importe),
                    $this->ferfunc->formato_dinero($rnominas->ISPT),
                    $this->ferfunc->formato_dinero($rnominas->isr),
                    $this->ferfunc->formato_dinero($rnominas->importe_retencion),
                    $this->ferfunc->formato_dinero($rnominas->deduChecquecancelado),
                    $this->ferfunc->formato_dinero($rnominas->isr_asim),
                    $this->ferfunc->formato_dinero($retDeduccion),
                    $this->ferfunc->formato_dinero($netoRetencion),
                    $this->ferfunc->formato_dinero($netoISR),
                    $this->ferfunc->formato_dinero($neto)
                );
            }
        }
        
        $filename = 'Reporte nominas OT-' . $dObra['OrdenTrabajo'] . '.xls';
        $this->excel->getActiveSheet()->fromArray($datos, null, 'A1');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
        //$this->excel->stream('Reporte nominas OT-' . $dObra['OrdenTrabajo'] .'.xls');
    }
    
    

    public function reporte_facturas_proveedor($idObra, $pdf = 1) {
        $this->load->model('impresiones_model');
        $this->load->library('ferfunc');

        $facturas = $this->impresiones_model->get_facturas_obra($idObra);
        $data = array(
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'facturas' => $facturas
        );

        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            $output = $this->load->view('v_reporte_facturas_proveedor', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_facturas_proveedor', $data);
        }
    }
    
    /*public function reporte_facturas_proveedor_nomina($idObra, $pdf = 1) {
        $this->load->model('impresiones_model');
        $this->load->library('ferfunc');

        $facturas = $this->impresiones_model->get_facturas_obra($idObra);
        $data = array(
            'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'facturas' => $facturas
        );

        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;

            $output = $this->load->view('v_reporte_facturas_proveedor', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_facturas_proveedor', $data);
        }
    }
    
    public function reporte_completo($idObra, $pdf = 1){
        $this->load->model('impresiones_model');
    }*/

    public function recibo_nomina($idMemoria, $pdf = 1) {
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');
        $this->load->model('direcciones_model');
        $this->load->model('firmas_model');
        $this->load->model('leyendas_model');
        $this->load->model('bancos_model');

        
        $this->load->library('ferfunc');

        $memoria = $this->impresiones_model->recibo_nomina($idMemoria)->row_array();
        $obra = $this->obras_model->datos_obra($memoria['idObra'])->row_array();
        $direccion = $this->direcciones_model->datos_direccion($obra['idDireccion'])->row_array();
        //$funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();

        $aBancos = $this->bancos_model->datos_banco($memoria["idBanco"])->row_array();
        
        if ($obra['OrdenTrabajo']=="OAD-0055-17"){ 
            $funcionario = $this->firmas_model->datos_firma($memoria['idVoBo'])->row_array();
        }else{
            $funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        }
        
        $data = array(
            'memoria' => $memoria,
            'obra' => $obra,
            'direccion' => $direccion['nombre'],
            'funcionario' => $funcionario,
            'leyenda' => $this->leyendas_model->datos_leyenda_ejercicio(date('Y')),
            'Bancos' => $aBancos    
        );
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;
            $mpdf->setHTMLFooter('<span style="font-weight:bold">Favor de realizar el depósito a la Cuenta Bancaria Número 030 320 90000040782 2
BANCO DEL BAJÍO, S.A.</span>');

            $output = $this->load->view('v_recibo_nomina', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_recibo_nomina', $data);
        }
    }

    public function recibo_imss($idMemoria, $pdf = 1) {
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');
        $this->load->model('direcciones_model');
        $this->load->model('firmas_model');
        $this->load->model('leyendas_model');
        $this->load->model('bancos_model');
        
        $this->load->library('ferfunc');

        $memoria = $this->impresiones_model->recibo_nomina($idMemoria)->row_array();
        $obra = $this->obras_model->datos_obra($memoria['idObra'])->row_array();
        $direccion = $this->direcciones_model->datos_direccion($obra['idDireccion'])->row_array();
        //$funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        $aBancos = $this->bancos_model->datos_banco($memoria["idBanco"])->row_array();
        
        if ($obra['OrdenTrabajo']=="OAD-0055-17"){ 
            $funcionario = $this->firmas_model->datos_firma($memoria['idVoBo'])->row_array();
        }else{
            $funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        }
        
        $data = array(
            'memoria' => $memoria,
            'obra' => $obra,
            'direccion' => $direccion['nombre'],
            'funcionario' => $funcionario,
            'leyenda' => $this->leyendas_model->datos_leyenda_ejercicio(date('Y')),
            'Bancos' => $aBancos
        );
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 0;
            $mpdf->forcePortraitHeaders = true;

//            $mpdf->setHTMLFooter('<span style="font-weight:bold">Favor de realizar el depósito a la Cuenta Bancaria Número 030 320 90000040782 2
//BANCO DEL BAJÍO, S.A.</span>');
            if ($memoria['amortizado'] > 0)
                //$output = $this->load->view('v_recibo_imss_fondo', $data, true);
                $output = $this->load->view('v_recibo_imss', $data, true);
            else
                $output = $this->load->view('v_recibo_imss', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_recibo_imss', $data);
        }
    }

    
    
    
    
    public function recibo_servicios_personales($idMemoria, $pdf = 1) {
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');
        $this->load->model('direcciones_model');
        $this->load->model('firmas_model');
        $this->load->model('leyendas_model');
        $this->load->model('bancos_model');
        
        $this->load->library('ferfunc');

        $memoria = $this->impresiones_model->recibo_nomina($idMemoria)->row_array();
        $obra = $this->obras_model->datos_obra($memoria['idObra'])->row_array();
        $direccion = $this->direcciones_model->datos_direccion($obra['idDireccion'])->row_array();
        //$funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        $aBancos = $this->bancos_model->datos_banco($memoria["idBanco"])->row_array();
        
        if ($obra['OrdenTrabajo']=="OAD-0055-17"){ 
            $funcionario = $this->firmas_model->datos_firma($memoria['idVoBo'])->row_array();
        }else{
            $funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        }
        
        $data = array(
            'memoria' => $memoria,
            'obra' => $obra,
            'direccion' => $direccion['nombre'],
            'funcionario' => $funcionario,
            'leyenda' => $this->leyendas_model->datos_leyenda_ejercicio(date('Y')),
            'Bancos' => $aBancos
        );
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 0;
            $mpdf->forcePortraitHeaders = true;

//            $mpdf->setHTMLFooter('<span style="font-weight:bold">Favor de realizar el depósito a la Cuenta Bancaria Número 030 320 90000040782 2
//BANCO DEL BAJÍO, S.A.</span>');
            if ($memoria['amortizado'] > 0)
                //$output = $this->load->view('v_recibo_imss_fondo', $data, true);
                $output = $this->load->view('v_recibo_servicios_personales', $data, true);
            else
                $output = $this->load->view('v_recibo_servicios_personales', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_recibo_servicios_personales', $data);
        }
    }

    
    
    public function recibo_materiales($idMemoria, $pdf = 1) {
        $this->load->model('impresiones_model');
        $this->load->model('obras_model');
        $this->load->model('direcciones_model');
        $this->load->model('firmas_model');
        $this->load->model('leyendas_model');
        $this->load->model('bancos_model');
        
        $this->load->library('ferfunc');

        $memoria = $this->impresiones_model->recibo_materiales($idMemoria)->row_array();
        $obra = $this->obras_model->datos_obra($memoria['idObra'])->row_array();
        $direccion = $this->direcciones_model->datos_direccion($obra['idDireccion'])->row_array();
        //$funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        $aBancos = $this->bancos_model->datos_banco($memoria["idBanco"])->row_array();

        if ($obra['OrdenTrabajo']=="OAD-0055-17"){ 
            $funcionario = $this->firmas_model->datos_firma($memoria['idVoBo'])->row_array();
        }else{
            $funcionario = $this->firmas_model->datos_firma($memoria['idAutorizo'])->row_array();
        }

        $data = array(
            'memoria' => $memoria,
            'obra' => $obra,
            'direccion' => $direccion['nombre'],
            'funcionario' => $funcionario,
            'leyenda' => $this->leyendas_model->datos_leyenda_ejercicio(date('Y')),
            'Bancos' => $aBancos   
        );
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->setHTMLFooter('<span style="font-weight:bold">Favor de realizar el depósito a la Cuenta Bancaria Número 030 320 90000040782 2
BANCO DEL BAJÍO, S.A.</span>');

            $output = $this->load->view('v_recibo_materiales', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_recibo_materiales', $data);
        }
    }

    
    
    
    
    public function imprime_cheque($idChque, $pdf = 1) {
        $this->load->model('cheque_model');
     
        
        $this->load->library('ferfunc');

        $aCheque = $this->cheque_model->datos_cheque($idChque)->row_array();
       
       
       
        $data = array(
            'cheque' => $aCheque,
        );
        
        $data['importe_lentra'] =$this->ferfunc->numerosaletras($aCheque["importecheque"],1);
        $data['aLeyendacheque']=$this->cheque_model->addw_leyenda_cheque(); 
        //$this->load->view('v_reporte_cheque_aux', $data); 
         

        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            //$mpdf = new mPDF('utf-8', 'Letter',12,'',5,5,5,58,0,10,'');
            
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',96,0,80.5,0,0,0,'');
            
            $mpdf = new mPDF('utf-8', array(70,183),0, '', 10, 0, 20, 0, 0, 0, 'L');
            
            
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;
           
             
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';
            $mpdf->autoPageBreak = true;
            
          
            
            $output = $this->load->view('v_reporte_cheque', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_cheque', $data);
        }
       
    }
    
   
     
    public function poliza_cheque($idChque, $pdf = 1) {
        $this->load->model('cheque_model');
        $this->load->model('funcionarios_model');
        
        
        $this->load->library('ferfunc');

        $aCheque = $this->cheque_model->datos_cheque($idChque)->row_array();
       
        
        
        
       
        $data = array(
            'cheque' => $aCheque,
            'formulo' => $this->funcionarios_model->firma_funcionario($aCheque['idFomulo']),
            'reviso' => $this->funcionarios_model->firma_funcionario($aCheque['idReviso']),
            'cuentabanco' => $this->funcionarios_model->firma_funcionario($aCheque['idCuentaBanco']),
        );
        
        
        
        $data['importe_lentra'] =$this->ferfunc->numerosaletras($aCheque["importecheque"],1);
        
        
        $this->load->model('funcionarios_model');
        $data['aFuncionarios']=$this->funcionarios_model->addw_funcionarios();
        
        $this->load->model('bancos_model');
        $data['aBancos']=$this->bancos_model->addw_bancos();
        

        
        
        if ($pdf == 1) {
            $this->load->library('mpdf');
            $mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            //$mpdf = new mPDF('utf-8', 'Letter-L',12,'',5,5,5,58,0,10,'');
            $mpdf = new mPDF('utf-8', 'Letter',12,'',20,20,5,5,0,10,'');
            
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;
           
             
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';
            $mpdf->autoPageBreak = true;
            
           /*
            if ($dOrdenCompra['Estatus'] < 30) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/
 
            /*
            $cadena_footer = $this->load->view('v_reporte_solicitud_orden_compra_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            //$mpdf->setFooter('{PAGENO}');
            if ($letras>100){
                $output = $this->load->view('v_reporte_solicitud_orden_compra_aux', $data, true);
            }else{
                $output = $this->load->view('v_reporte_solicitud_orden_compra', $data, true);
            }*/
            
            $output = $this->load->view('v_poliza_cheque', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_poliza_cheque', $data);
        }
    }
    
    
    
    public function solicitud_cotizacion_sin_proveedor($idCotizacion,$pdf = 1) {
        $this->load->model('proveedores_participantes_model');
        $this->load->model('cotizaciones_model');
        $this->load->model('proveedores_model');
        $this->load->model('impresiones_model');
        $this->load->model('usuarios_model');
        $this->load->model('obras_model');
        $this->load->model('residencias_model');
        
        


        $this->load->library('ferfunc');
        
        
        $idUsuario=$this->session->userdata('id');
        $aUsuario = $this->usuarios_model->datos_usuario($idUsuario)->row_array();
        
        
        
        $dCotizacion = $this->cotizaciones_model->datos_cotizacion($idCotizacion)->row_array();
        
        $qConceptos = $this->cotizaciones_model->conceptos_cotizacion($idCotizacion);

       $qObra = $this->obras_model->datos_obra($dCotizacion['idObra']);
       $aObra = $qObra -> row_array();

        //$qObra = $this->obras_model->datos_obra($id_obra);
        //$data['aObra'] = $qObra->row_array();

       
        //$aResidencia = $qResidencia
        
        $aResidencia = $this->residencias_model->datos_residencia($aObra['idResidencia'])->row_array();
        
                
       
        
       
        $data = array(
            'obra' => $aObra,
            'Email' => $aUsuario['correo'],
            'ext' => $aUsuario['ext'],
            'cotizacion' => $dCotizacion,
            'Residencia' => $aResidencia['Nombre'],
            //'logo' => '<img  src="' . site_url('images/logo-secretaria-mini.fw.png') . '" id="logo">',
            'qconceptos' =>  $qConceptos,
            'autorizo' => $this->impresiones_model->firma_funcionario($dCotizacion['idAutorizo']),
            'vo_bo' => $this->impresiones_model->firma_funcionario($dCotizacion['idVoBo']),
            'elaboro' => $this->impresiones_model->firma_funcionario($dCotizacion['idElaboro']),
            'Fecha' =>  strtoupper($this->ferfunc->fechacascompleta($dCotizacion['Fecha']))        
        );

       
        
        if ($pdf == 1) {
            
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            $mpdf = new mPDF('utf-8', 'Letter',12,'',5,5,5,30,0,10,'');
            $mpdf->keep_table_proportions = true;
            $mpdf->allow_charset_conversion = false;
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';
            
            //$mpdf->forcePortraitHeaders = true;
            //$mpdf->mirrorMargins = 1;
            /*
            if ($dMemoria['estatus'] < 50) {
                $mpdf->SetWatermarkText('SIN VALIDEZ OFICIAL');
                $mpdf->showWatermarkText = true;
            }*/
            $mpdf->useOddEven = false;
            
            $cadena_footer = $this->load->view('v_reporte_solicitud_de_cotizacion_pie', $data, true);
            $mpdf->SetHTMLFooter($cadena_footer);
            
            $output = $this->load->view('v_reporte_solicitud_de_cotizacion_sin_proveedor', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
            
           
            
        } else {
            $this->load->view('v_reporte_solicitud_de_cotizacion_sin_proveedor', $data);
        }
    }

    
    
    public function modificar_fecha_solicitud($id,$Fecha) {
        $this->load->model('cotizaciones_model');
        
        
        
        
        $data = array(
            'Fecha_Cuadro_Comparativo' => $Fecha,
           
        );
        $retorno = $this->cotizaciones_model->datos_cotizacion_update($data,$id);
        print_r($retorno);
        
       
        
        //$this->comparativo_cotizacion( $id,$this->input->post('fecha_impresion'),$pdf = 1);
        
       
  
        
    }
    
    
    public function reporte_documentos_por_bloque($pdf=1){
            $this->load->model('impresiones_model');
            $this->load->model('direcciones_model');
            $bloque = $this->input->post('slc_bloqueObra_doc_bloque');
            //echo $bloque;
            //exit();
            
            $qDocumentos_total_por_bloque_1 = $this->impresiones_model->listado_documentos_bloque(1, $bloque)->num_rows();
            $qDocumentos_total_por_bloque_2 = $this->impresiones_model->listado_documentos_bloque(2, $bloque)->num_rows();
            $qDocumentos_total_por_bloque_3 = $this->impresiones_model->listado_documentos_bloque(3, $bloque)->num_rows();
            $qDocumentos_total_por_bloque_4 = $this->impresiones_model->listado_documentos_bloque(4, $bloque)->num_rows();
            $qDocumentos_total_por_bloque_5 = $this->impresiones_model->listado_documentos_bloque(5, $bloque)->num_rows();
            
            
            $qDocumentos_finalizados_bloque_1 = $this->impresiones_model->listado_documentos_finalizados_bloque(1, $bloque)->num_rows();
            $qDocumentos_finalizados_bloque_2 = $this->impresiones_model->listado_documentos_finalizados_bloque(2, $bloque)->num_rows();
            $qDocumentos_finalizados_bloque_3 = $this->impresiones_model->listado_documentos_finalizados_bloque(3, $bloque)->num_rows();
            $qDocumentos_finalizados_bloque_4 = $this->impresiones_model->listado_documentos_finalizados_bloque(4, $bloque)->num_rows();
            $qDocumentos_finalizados_bloque_5 = $this->impresiones_model->listado_documentos_finalizados_bloque(5, $bloque)->num_rows();
            
            $total_general_finalizados = $this->impresiones_model->listado_documentos_totales_finalizados_bloque($bloque)->num_rows();
            $total_general = $this->impresiones_model->listado_documentos_totales_general_bloque($bloque)->num_rows();
            
            
            
            
            
            
            
            $data = array(
        	
        	'qDocumentos_total_por_bloque_1' => $qDocumentos_total_por_bloque_1,
                'qDocumentos_total_por_bloque_2' => $qDocumentos_total_por_bloque_2,
                'qDocumentos_total_por_bloque_3' => $qDocumentos_total_por_bloque_3,
                'qDocumentos_total_por_bloque_4' => $qDocumentos_total_por_bloque_4,
                'qDocumentos_total_por_bloque_5' => $qDocumentos_total_por_bloque_5,
                'qDocumentos_finalizados_bloque_1' => $qDocumentos_finalizados_bloque_1,
                'qDocumentos_finalizados_bloque_2' => $qDocumentos_finalizados_bloque_2,
                'qDocumentos_finalizados_bloque_3' => $qDocumentos_finalizados_bloque_3,
                'qDocumentos_finalizados_bloque_4' => $qDocumentos_finalizados_bloque_4,
                'total_general_finalizados' => $total_general_finalizados,
                'total_general' => $total_general,
                
                
                
                
            );
            
            
            if ($pdf == 1) {
                $this->load->library('mpdf');
                //$mpdf = new mPDF('utf-8', 'Letter');
                //$mpdf = new mPDF('utf-8', 'Legal');
                $mpdf = new mPDF('utf-8');


               /* $mpdf->keep_table_proportions = true;
                $mpdf->tableMinSizePriority = false;
                $mpdf->shrink_tables_to_fit = 1.4;
                $mpdf->forcePortraitHeaders = true;


                $mpdf->pagenumPrefix = 'Página ';
                $mpdf->pagenumSuffix = ' de ';
                $mpdf->autoPageBreak = true; */





                $output = $this->load->view('v_reporte_documentos_por_bloque', $data, true);
                $mpdf->WriteHTML($output);
                $mpdf->Output();
            } else {
                $this->load->view('v_reporte_documentos_por_bloque', $data);
            }
    }
    
    public function reporte_documentos_por_direccion($pdf=1){
            $this->load->model('impresiones_model');
            $this->load->model('direcciones_model');
            $bloque = $this->input->post('slc_bloqueObra_doc_direccion');
            //echo $bloque;
            //exit();
            
            
            $qDirecciones = $this->impresiones_model->get_direcciones_por_bloque($bloque);
            $aDirecciones = $this->impresiones_model->addw_direccionesEjecutoras();
            
            
            $resultado = array();
            
            //$qResultado = $this->impresiones_model->get_obras_por_direccion($direccion);
            
            if (isset($qDirecciones)){
                if ($qDirecciones->num_rows() > 0) {
                    $i=0;
                    
                    foreach ($qDirecciones->result() as $rDirecciones) {
                        //echo "</br>" .$rDirecciones->direccion . "</br>";
                        $qListado_Archivos_Direccion = $this->impresiones_model->listado_archivos_direccion($rDirecciones->idDireccion, $bloque);
                        
                        $documentos_direccion= 0;
                        $documentos_entregados = 0;
                        $obras_por_entregar = 0;
                        
                        
                        foreach ($qListado_Archivos_Direccion->result() as $rListado) {
                            //echo '</br>IF dr ' .$rDirecciones->idDireccion . "lis== ". $rListado->idDireccion;
                            if($rDirecciones->idDireccion == $rListado->idDireccion){
                                //echo '</br>dr ' .$rDirecciones->idDireccion . "lis== ". $rListado->idDireccion .'</br>dr ';
                                //$rListado->id == idArchivo
                                $qNo_documentos_por_archivo = $this->impresiones_model->no_documentos_por_archivo($rListado->id);
                                $no_documentos_por_archivo= $qNo_documentos_por_archivo->row();
                                //echo "</br>Doc por archivo " . $no_documentos_por_archivo->numero;
                                $documentos_direccion= $documentos_direccion + $no_documentos_por_archivo->numero;
                                //echo "</br>Doc direccion suma " . $documentos_direccion;

                                $qNo_documentos_entregados_archivo = $this->impresiones_model->no_documentos_entregados_archivo($rListado->id);
                                $no_documentos_entregados_archivo= $qNo_documentos_entregados_archivo->row();
                                //echo "</br> Doc entregados archivo".$no_documentos_entregados_archivo->numero_entregados;
                                $documentos_entregados= $documentos_entregados + $no_documentos_entregados_archivo->numero_entregados;
                                //echo "</br>Doc entregados suma " . $documentos_entregados;

                                $qNo_obras_por_entregar =  $this->impresiones_model->no_obras_por_entregar($rListado->id);
                                if ($qNo_obras_por_entregar->num_rows() ==1 ){
                                    $no_obras_por_entregar = $qNo_obras_por_entregar->row();
                                    if( $no_obras_por_entregar->Estatus == 10){
                                        //echo '</br> Estatus' .$no_obras_por_entregar->Estatus;
                                        $obras_por_entregar = $obras_por_entregar +1;
                                        //echo '</br>obras entregar' .$obras_por_entregar;
                                    }
                                }
                                //$obras_por_entregar = $obras_por_entregar 

                                
                                $i++;
                            }
                        }
                        
                        $resultado[$i]= array(
                                "direccion" => $rDirecciones->direccion ,
                                "docTotales" => $documentos_direccion,
                                "docEntregados" => $documentos_entregados,
                                "obrasPorEntregar" => $obras_por_entregar,

                                );
                        
                    }
                    
                }
            }
                
            $data = array(
        	
        	'resultado' => $resultado,
                //'aDirecciones' =>$aDirecciones,
                
            );    
                
                
            
            //$pdf=0;
            if ($pdf == 1) {
                $this->load->library('mpdf');
                //$mpdf = new mPDF('utf-8', 'Letter');
                //$mpdf = new mPDF('utf-8', 'Legal');
                $mpdf = new mPDF('utf-8');


               /* $mpdf->keep_table_proportions = true;
                $mpdf->tableMinSizePriority = false;
                $mpdf->shrink_tables_to_fit = 1.4;
                $mpdf->forcePortraitHeaders = true;


                $mpdf->pagenumPrefix = 'Página ';
                $mpdf->pagenumSuffix = ' de ';
                $mpdf->autoPageBreak = true; */





                $output = $this->load->view('v_reporte_documentos_por_direccion', $data, true);
                $mpdf->WriteHTML($output);
                $mpdf->Output();
            } else {
                $this->load->view('v_reporte_documentos_por_direccion', $data);
            }
    }

    public function reporte_memoria_nomina(){

    	/*$this->load->library('excel');


        $filename = 'Reporte de Nomina -' . $datos. '.xls';
        $this->excel->getActiveSheet()->fromArray($datos, null, 'A1');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');*/

    	    /*$this->load->library('mpdf60');
            $mpdf = new mPDF('utf-8','Legal-L');
            $mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;*/ 


            $this->load->model('impresiones_model');
           
            $qMemorias = $this->impresiones_model->listado_memorias_nominas($this->input->post('fecha_inicio_nomina'),$this->input->post('fecha_termino_nomina'));


            $datos = array(
        	//'obra' => $dObra,
        	'qMemorias' => $qMemorias,
        	);

           // if(isset($datos)){
           // print_r($datos);
           // exit();
           // }
            
            /*$outputhtml = $this->load->view('v_reporte_memoria_nomina',$datos);
            $mpdf->WriteHTML($outputhtml);
            $mpdf->Output();*/


              $this->load->view('v_reporte_memoria_nomina', $datos);

    		
    }

    public function reporte_memoria_retenciones(){

    	$this->load->model('obras_model');
    	$this->load->model('impresiones_model');
    	$this->load->model('residencias_model');
    	$this->load->model('conceptos_model');



        //$dObra = $this->obras_model->datos_obra($idObra)->row_array();
        $qMemorias = $this->impresiones_model->listado_memorias_nominas_retenciones($this->input->post('fecha_inicio_orden'),$this->input->post('fecha_termino_orden'));
        //$aResidencias = $this->residencias_model->aResidencias();
        //$aConceptos = $this->conceptos_model->aConceptos();



        $datos = array(
        	//'obra' => $dObra,
        	'qMemorias' => $qMemorias,
        	 );

        
           
      
            $this->load->view('v_reporte_memorias_retenciones', $datos);

         
    		



    }
    
    public function  etiqueta_orden_trabajo ($id){
        $porciones = explode("%20", $id);
        
        
        $this->load->model('impresiones_model');
     
        
        

        $qOrden = $this->impresiones_model->datos_orden_trabajo($porciones[0], $pdf = 1);
        $addwUbicaciones =  $this->impresiones_model->addw_ubicaciones();   
       
       
        $data = array(
        	
        	'qOrden' => $qOrden,
                'bloque' => $porciones[1],
                'idUbicacion' => $porciones[2],
                'addwUbicaciones' => $addwUbicaciones,
        	);
         
        //$pdf = 0;
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            //$mpdf = new mPDF('utf-8');
            //$mpdf = new mPDF('utf-8', array(130,105),0, '', 0, 0, 0, 0, 0, 0, 'L');
            $mpdf = new mPDF('','', 0, '', 15, 15, 16, 16, 9, 9, 'L');
            
            /*$mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;
           
             
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';
            $mpdf->autoPageBreak = true;
            */
          
           
            
            
            //$output = $this->load->view('v_reporte_orden_trabajo', $data, true);
            $output = $this->load->view('v_etiqueta_archivo_recepcion', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            //$this->load->view('v_reporte_orden_trabajo', $data);
           $this->load->view('v_etiqueta_archivo_recepcion', $data, true);
        }
        
        
        
    }
    
    public function  etiqueta_orden_trabajo_chica ($id){
        $porciones = explode("%20", $id);
        
        
        $this->load->model('impresiones_model');
     
        
        

        $qOrden = $this->impresiones_model->datos_orden_trabajo($porciones[0], $pdf = 1);
        $addwUbicaciones =  $this->impresiones_model->addw_ubicaciones();   
        $query=  $this->impresiones_model->datos_relacion($porciones[3]);  
        $row = $query->row();

        if (isset($row))
        {
                $Folios =  $row->NoFolioInicial . '-' . $row->NoFolioFinal;
                $Apartados =  $row->Documentos;
                
        }
       
        $data = array(
        	
        	'qOrden' => $qOrden,
                'bloque' => $porciones[1],
                'idUbicacion' => $porciones[2],
                'addwUbicaciones' => $addwUbicaciones,
                'Folios' => $Folios,
                'Apartados' => $Apartados,
        	);
         
        //$pdf = 0;
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            $mpdf = new mPDF('utf-8');
            
            /*$mpdf->keep_table_proportions = true;
            $mpdf->shrink_tables_to_fit = 1;
            $mpdf->forcePortraitHeaders = true;
           
             
            $mpdf->pagenumPrefix = 'Página ';
            $mpdf->pagenumSuffix = ' de ';
            $mpdf->autoPageBreak = true;
            */
          
           
            
            
            $output = $this->load->view('v_reporte_orden_trabajo_chica', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_orden_trabajo_chica', $data);
        }
        
        
        
    }
    
        public function reporte_obras_direccion($pdf = 1){
            $this->load->model('impresiones_model');
            $this->load->model('direcciones_model');
            $bloque = $this->input->post('slc_bloqueObra');
            //echo $bloque;
            //exit();
            
            $qEstatus = $this->impresiones_model->listado_estatus_archivos();
            
            $qDirecciones = $this->impresiones_model->get_direcciones_por_bloque($bloque);
            $aDirecciones = $this->impresiones_model->addw_direccionesEjecutoras();
            
            
            $resultado = array();
            
            //$qResultado = $this->impresiones_model->get_obras_por_direccion($direccion);
            
            if (isset($qDirecciones)){
                if ($qDirecciones->num_rows() > 0) {
                    $i=0;
                    foreach ($qDirecciones->result() as $rDirecciones) {
                        echo $rDirecciones->idDireccion . "-";
                        
                        
                        $qNo_obras_por_direccion = $this->impresiones_model->get_obras_por_direccion($rDirecciones->idDireccion, $bloque);
                        $no_obras_por_direccion= $qNo_obras_por_direccion->row();
                        echo $no_obras_por_direccion->numero . "-";
                        
                        $qNo_obras_en_proceso= $this->impresiones_model->total_obras_en_proceso($rDirecciones->idDireccion, $bloque);
                        $no_obras_proceso = $qNo_obras_en_proceso->row() ;
                        echo 'Proceso ' .$no_obras_proceso->numero_proceso . "-";
                        
                        $qNo_obras_terminadas= $this->impresiones_model->total_obras_terminadas($rDirecciones->idDireccion, $bloque);
                        $no_obras_terminadas = $qNo_obras_terminadas->row();
                        echo 'Terminadas ' .$no_obras_terminadas->numero_terminadas . "</br>";
                        
                        $resultado[$i]= array(
                            "direccion" => $rDirecciones->idDireccion ,
                            "obrasTotales" => $no_obras_por_direccion->numero,
                            "obrasTerminadas" => $no_obras_terminadas->numero_terminadas,
                            "obrasProceso" => $no_obras_proceso->numero_proceso,
                            
                        );
                        $i++;
                        
                    }
                    
                }
                
                
                
                //print_r($resultado);
                //$a= $resultado;
                
                
                
              /*  foreach ($resultado as $r) {
                    echo $r["direccion"];
                    echo $r["obrasTotales"];
                
                }
                
                exit();*/
            }
            
            $data = array(
        	
        	'resultado' => $resultado,
                'aDirecciones' =>$aDirecciones,
                
            );
            
            
            if ($pdf == 1) {
                $this->load->library('mpdf');
                //$mpdf = new mPDF('utf-8', 'Letter');
                //$mpdf = new mPDF('utf-8', 'Legal');
                $mpdf = new mPDF('utf-8');


               /* $mpdf->keep_table_proportions = true;
                $mpdf->tableMinSizePriority = false;
                $mpdf->shrink_tables_to_fit = 1.4;
                $mpdf->forcePortraitHeaders = true;


                $mpdf->pagenumPrefix = 'Página ';
                $mpdf->pagenumSuffix = ' de ';
                $mpdf->autoPageBreak = true; */





                $output = $this->load->view('v_reporte_documentos_direccion', $data, true);
                $mpdf->WriteHTML($output);
                $mpdf->Output();
            } else {
                $this->load->view('v_reporte_documentos_direccion', $data);
            }
        
            
            
        }

        public function  reporte_estatus_archivo ($id, $pdf = 1){
       
        
        $this->load->model('impresiones_model');
        $this->load->model('modalidad_model');
        $this->load->model('datos_model');
        $this->load->model('direcciones_model');
        $this->load->model('subdocumentos_model');
        
        $estimaciones_archivo = "";
        $addwModalidad= $this->modalidad_model->addw_modalidades();
        $addwEjercicio = $this->impresiones_model->addw_ejercicio();
        $addwDirecciones = $this->direcciones_model->addw_catDireccion();
        $aSubDocumentos = $this->subdocumentos_model->addw_subDocumentos();
        //Rel archivo documento por archivo
        $qStatus = $this->impresiones_model->datos_reporte_estatus_archivo ($id, $this->session->userdata('idDireccion_responsable'));
        $qEstimaciones_archivo = $this->impresiones_model->estimaciones_de_archivo($id);
        echo 'Entro';
        if (isset($qEstimaciones_archivo)){
            if ($qEstimaciones_archivo->num_rows() > 0){
                //echo 'Rows'. $qEstimaciones_archivo->num_rows();

                foreach ($qEstimaciones_archivo->result() as $estimaciones){

                        echo 'hay tipo id est '. $estimaciones->id;
                        $estimaciones_archivo=$this->impresiones_model->get_estimaciones_archivo_preregistro($estimaciones->id,  $this->session->userdata('id'));
                        if ($estimaciones_archivo->num_rows() > 0){
                                            echo 'Rows'. $estimaciones_archivo->num_rows();

                                            foreach ($estimaciones_archivo->result() as $estimaciones_a){
                                                echo $estimaciones_a->idSubDocumento;
                                            }
                        }
                        $hay_estimaciones =1;
                        

                }
                //exit();
            } else{
                $hay_estimaciones =-1;
                echo $estimaciones_archivo;
            }
        }
        $qArchivo = $this->datos_model-> get_Archivo_id($id);
        $qObra = $this->impresiones_model->datos_obra ($id);
        $rObra = $qObra->row_array();
        $rArchivo = $qArchivo->row_array();
        
        //echo $rArchivo['Direccion'] . $this->session->userdata('idDireccion_responsable');
        //exit();
        
        if (isset($rObra))
        {
                $Contrato =  $rObra['Contrato'];
                $OrdenTrabajo = $rObra['OrdenTrabajo'];
                $Obra = $rObra['Obra'];
                $Modalidad = $rObra['idModalidad'];
                $Ejercicio = $rObra['idEjercicio'];
                $Normatividad = $rObra['Normatividad'];
                //echo $rObra->Contrato . $rObra->OrdenTrabajo;
                //exit();
                
        } 
        
        $data = array(
        	
        	'qStatus' => $qStatus,
                'estimaciones_archivo' =>$estimaciones_archivo,
                'aSubDocumentos'=> $aSubDocumentos ,
                'OrdenTrabajo' => $OrdenTrabajo,
                'Obra' =>  $Obra,
                'Contrato' => $Contrato,
                'Modalidad' => $Modalidad,
                'Ejercicio' => $Ejercicio,
                'Normatividad' => $Normatividad,
                'addwModalidad' =>$addwModalidad,
                'addwEjercicio' => $addwEjercicio,
                'rArchivo' => $rArchivo,
                'rDireccion_responsable' =>$this->session->userdata('idDireccion_responsable'),
                'addwDireccion' => $addwDirecciones,
                'hay_estimaciones'=>$hay_estimaciones
            
        	);
        
        //$pdf = 0;
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            $mpdf = new mPDF('utf-8');
            
            
        
          
           
            
            
            $output = $this->load->view('v_reporte_estatus_archivo', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_estatus_archivo', $data);
        } 
          
        
        
        
    }
    
    public function  reporte_preregistro($id, $idDireccion ,$pdf = 1){
       
        
        $this->load->model('impresiones_model');
        $this->load->model('modalidad_model');
        $this->load->model('datos_model');
        $this->load->model('direcciones_model');
        $this->load->model('subdocumentos_model');
        
        $estimaciones_archivo = "";
        $addwModalidad= $this->modalidad_model->addw_modalidades();
        $addwEjercicio = $this->impresiones_model->addw_ejercicio();
        $addwDirecciones = $this->direcciones_model->addw_catDireccion();
        $aSubDocumentos = $this->subdocumentos_model->addw_subDocumentos();
        //Rel archivo documento por archivo
        $qStatus = $this->impresiones_model->datos_reporte_preregistro ($id, $idDireccion);
        $qEstimaciones_archivo = $this->impresiones_model->estimaciones_de_archivo($id);
        echo 'Entro';
        if (isset($qEstimaciones_archivo)){
            if ($qEstimaciones_archivo->num_rows() > 0){
                //echo 'Rows'. $qEstimaciones_archivo->num_rows();

                foreach ($qEstimaciones_archivo->result() as $estimaciones){

                        echo 'hay tipo';
                        $estimaciones_archivo=$this->impresiones_model->get_estimaciones_archivo_preregistro($estimaciones->id,  $this->session->userdata('id'));
                        if ($estimaciones_archivo->num_rows() > 0){
                                            echo 'Rows'. $estimaciones_archivo->num_rows();

                                            foreach ($estimaciones_archivo->result() as $estimaciones_a){
                                                echo $estimaciones_a->idSubDocumento;
                                            }
                        }
                        $hay_estimaciones =1;
                        

                }
                //exit();
            } else{
                $hay_estimaciones =-1;
                echo $estimaciones_archivo;
            }
        }
        $qArchivo = $this->datos_model-> get_Archivo_id($id);
        $qObra = $this->impresiones_model->datos_obra ($id);
        $rObra = $qObra->row_array();
        $rArchivo = $qArchivo->row_array();
        
        //echo $rArchivo['Direccion'] . $this->session->userdata('idDireccion_responsable');
        //exit();
        
        if (isset($rObra))
        {
                $Contrato =  $rObra['Contrato'];
                $OrdenTrabajo = $rObra['OrdenTrabajo'];
                $Obra = $rObra['Obra'];
                $Modalidad = $rObra['idModalidad'];
                $Ejercicio = $rObra['idEjercicio'];
                $Normatividad = $rObra['Normatividad'];
                //echo $rObra->Contrato . $rObra->OrdenTrabajo;
                //exit();
                
        } 
        
        $data = array(
        	
        	'qStatus' => $qStatus,
                'estimaciones_archivo' =>$estimaciones_archivo,
                'aSubDocumentos'=> $aSubDocumentos ,
                'OrdenTrabajo' => $OrdenTrabajo,
                'Obra' =>  $Obra,
                'Contrato' => $Contrato,
                'Modalidad' => $Modalidad,
                'Ejercicio' => $Ejercicio,
                'Normatividad' => $Normatividad,
                'addwModalidad' =>$addwModalidad,
                'addwEjercicio' => $addwEjercicio,
                'rArchivo' => $rArchivo,
                'rDireccion_responsable' =>$idDireccion,
                'addwDireccion' => $addwDirecciones,
                'hay_estimaciones'=>$hay_estimaciones
            
        	);
        
        //$pdf = 0;
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            $mpdf = new mPDF('utf-8');
            
            
        
          
           
            
            
            $output = $this->load->view('v_reporte_estatus_archivo', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_estatus_archivo', $data);
        } 
          
        
        
        
    }
    
    
   
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */