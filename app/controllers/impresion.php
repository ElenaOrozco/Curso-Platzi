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
        
    public function etiqueta_transferencia($pdf= 0){
        /*
        if ($pdf == 1) {
            $this->load->library('mpdf'); 
            $mpdf = new mPDF('','', 0, '', 15, 15, 16, 16, 9, 9, 'L');
            
         
            $output = $this->load->view('v_etiqueta_transferencia');
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            //$this->load->view('v_reporte_orden_trabajo', $data);
           $this->load->view('v_etiqueta_transferencia');
        }*/
        /*$html = '
        <html>
            <head>
                <style>
                    body{
                        font-size: 7pt;
                        font-family: "Arial";
                    }
                    .normal {
                       text-transform: uppercase;
                    }
                    .normal th, .normal td {
                      border: 1px solid #000;
                    }
                    .titulo{
                        background: #691726;
                        color: #FFF;
                        padding:2px;
                        text-transform: uppercase;
                    }
                </style>
            </head>
            <body>
        <table width="756" heigth="453">
            <thead>
            
                <tr>
                    <th colspan="3" rowspan="3"><img src="' . site_url('assets/logo_chico.png') .'"  width="100" style="margin-bottom:10px"/></th> 
                    <th colspan="6" align="center"></th>

                </tr>
                <tr>

                    <th colspan="6"  align="center"><span style="vertical-align: bottom; font-size: 10pt; font-weigth:bold;">SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA<span></th>

                </tr>
                <tr>

                    <th colspan="6"  align="center"></th>

                </tr>
                <tr>

                    <th colspan="9"  align="center"></th>

                </tr>
                <tr class="normal">
                
                    <th colspan="2" align="end" class="titulo">Dirección General:</th>
                    <th colspan="3" align="start">Dirección General Administrativa</th>
                    <th colspan="2" align="end" class="titulo">Caja: </th>
                    <th colspan="2" align="start">1/2</th>

                </tr>
                <tr class="normal">

                    <th colspan="2" align="end" class="titulo">Dirección Área:</th>
                    <th colspan="3" align="start">Dirección Recursos Humanos</th>
                    <th colspan="2" align="end" class="titulo">Año: </th>
                    <th colspan="2" align="start">2014</th>

                </tr>
                
                <tr>

                    <th colspan="9"  align="center" class="titulo">Expedientes</th>

                </tr>
                <tr>
                    <th colspan="1"  align="center" class="titulo">Carpeta</th>
                    <th colspan="4"  align="center" class="titulo">Descripción</th>
                    <th colspan="2"  align="center" class="titulo">Clasificador</th>
                    <th colspan="2"  align="center" class="titulo">OT</th>
                </tr>
                
            </thead>
            <tbody class="normal">
                <tr> 
                    <td colspan="1"  align="center">1</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                <tr> 
                    <td colspan="1"  align="center">2</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                <tr> 
                    <td colspan="1"  align="center">3</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                <tr> 
                    <td colspan="1"  align="center">4</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                <tr> 
                    <td colspan="1"  align="center">5</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                <tr> 
                    <td colspan="1"  align="center">6</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                <tr> 
                    <td colspan="1"  align="center">7</td>
                    <td colspan="4"  align="center">Bloque uno proyecto Mascota</td>
                    <td colspan="2"  align="center">1S.3</td>
                    <td colspan="2"  align="center">Lp0001-15</td>
                </tr>
                
            </tbody>   
                
                



            </table>
            </body>
        </html>
        ';
        */
        $html = '
        <html>
            <head>
                <style>
                    body{
                        font-size: 7pt;
                        font-family: "Arial";
                        text-transform: uppercase;
                    }
                    .normal {
                       text-transform: uppercase;
                    }
                    .normal th, .normal td {
                      border: 1px solid #000;
                      heigth: 50pt;
                    }
                    .titulo{
                        background: #13AEBA;
                        color: #FFF;
                        padding:11pt;
                        text-transform: uppercase;
                        font-size: 11pt;
                        vertical-align: bottom; 
                        text-align="center" 
                        font-weigth:bold;
                    }
                    .linea{
                        border-bottom : 1px solid #000;
                       
                    }
                    .principal{
                        width:756px !important; 
                        heigth:453px !important; 
                        border:3px solid #13AEBA;
                    }
                    
                </style>
            </head>
            <body>
            
        <div class="principal">
            <div style="width:756px; heigth:100px;" class="titulo">
                <table width="100%">
                    
                    <tr class="titulo">

                        <th colspan="4" style="font-weigth:bold;"  align="center"><span class="titulo">SIOP<span></th>

                    </tr>
                    <tr class="titulo">

                        <th colspan="4" style="font-weigth:bold;" align="center"><span class="titulo">SECRETARIA DE INFRAESTRUCTURA Y OBRA PUBLICA<span></th>

                    </tr>


                </table>

            </div>
            <div style="width:756px; heigth:353px;">
                <table width="100%">
                    <tr>
                        <td width="20%"  style="text-align:end; text-transform:uppercase; ">Dirección General:</td>
                        <th width="60%" style="text-align:start; text-transform:uppercase; ">Dirección General Administrativa</th>
                        <td width="10%" style="text-align:end; text-transform:uppercase; ">Caja: </td>
                        <th width="10%" style="text-align:start; text-transform:uppercase; ">1/2</th>

                    </tr>
                    <tr>

                        <td width="20%" style="text-align:end; text-transform:uppercase; ">Dirección Área:</td>
                        <th width="60%" style="text-align:start; text-transform:uppercase; ">Dirección Recursos Humanos</th>
                        <td width="10%" style="text-align:end; text-transform:uppercase; ">Año: </td>
                        <th width="10%" style="text-align:start; text-transform:uppercase; ">2014</th>

                    </tr>
                     <tr>

                        <td width="20%" style="text-align:end; text-transform:uppercase; "></td>
                        <th width="60%" style="text-align:start; text-transform:uppercase; "></th>
                        <td width="10%" style="text-align:end; text-transform:uppercase; ">Folio: </td>
                        <th width="10%" style="text-align:start; text-transform:uppercase; ">T-001</th>

                    </tr>  
                </table>
                <p align="center">Expedientes </p>
                <table  width="100%"  class="normal-linea">
                    
                        <tr>
                            <td height="320" style=" vertical-align:top; ">
                                <table  width ="100%" heigth="100%">
                                   <thead>
                                       <tr>
                                           <td width="10%"  align="center">No </td>
                                           <td width="50%"  align="center">Descripcion</td>
                                           <td width="20%"  align="center">Identificador</td>
                                           <td width="20%"  align="center">OT</td>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
                                           <td width="10%" class="linea" align="center" >1</td>
                                           <td width="50%" class="linea">REFACCIONES, MANTENIMIENTOS, SERVICIOS E INSUMOS PARA MAQUINARIA PESADA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%" class="linea" align="center">2</td>
                                           <td width="50%" class="linea">REMODELACIÓN DEL SÓTANO DE LA SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%" class="linea" align="center">3</td>
                                           <td width="50%" class="linea">REMODELACIÓN DE LA PLANTA BAJA Y LA DIRECCIÓN ADMINISTRATIVA DE LA SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%" class="linea" align="center">4</td>
                                           <td width="50%" class="linea">TRABAJOS EMERGENTES EN LA CONSERVACIÓN DE CAMINOS EN LA RESIDENCIA DE SAN MIGUEL PARA EL CAMINO 323 ARANDAS-MARTÍNEZ VALADEZ-SAN DIEGO DE ALEJANDRÍA, DEL KM. 17+000 AL 52+000.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       
                                       <tr>
                                           <td width="10%" class="linea" align="center">5</td>
                                           <td width="50%" class="linea">TRABAJOS EMERGENTES EN LA CONSERVACIÓN DE CAMINOS EN LA RESIDENCIA DE SAN MIGUEL PARA EL CAMINO 302 LAGOS DE MORENO-UNIÓN DE SAN ANTONIO-SAN DIEGO DE ALEJANDRÍA, DEL KM. 0+000 AL 41+700.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                        </tr>
                                        <tr>
                                           <td width="10%" class="linea" align="center">6</td>
                                           <td width="50%" class="linea">REMODELACIÓN DEL SÓTANO DE LA SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%" class="linea" align="center">7</td>
                                           <td width="50%" class="linea">REMODELACIÓN DE LA PLANTA BAJA Y LA DIRECCIÓN ADMINISTRATIVA DE LA SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%" class="linea" align="center">8</td>
                                           <td width="50%" class="linea">TRABAJOS EMERGENTES EN LA CONSERVACIÓN DE CAMINOS EN LA RESIDENCIA DE SAN MIGUEL PARA EL CAMINO 323 ARANDAS-MARTÍNEZ VALADEZ-SAN DIEGO DE ALEJANDRÍA, DEL KM. 17+000 AL 52+000.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       
                                       <tr>
                                           <td width="10%" class="linea" align="center">9</td>
                                           <td width="50%" class="linea">TRABAJOS EMERGENTES EN LA CONSERVACIÓN DE CAMINOS EN LA RESIDENCIA DE SAN MIGUEL PARA EL CAMINO 302 LAGOS DE MORENO-UNIÓN DE SAN ANTONIO-SAN DIEGO DE ALEJANDRÍA, DEL KM. 0+000 AL 41+700.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                        <tr>
                                           <td width="10%" class="linea" align="center">10</td>
                                           <td width="50%" class="linea">REMODELACIÓN DEL SÓTANO DE LA SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%" class="linea" align="center">11</td>
                                           <td width="50%" class="linea">REMODELACIÓN DE LA PLANTA BAJA Y LA DIRECCIÓN ADMINISTRATIVA DE LA SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA.</td>
                                           <td width="20%" class="linea" align="center">1S.3</td>
                                           <td width="20%" class="linea" align="center">Lp0001-15</td>
                                       </tr>
                                    
                                       <!--
                                       <tr>
                                           <td width="10%"  align="center">6</td>
                                           <td width="50%">ELABORACIÓN DE ESTUDIOS TÉCNICOS DE SOPORTE Y EVALUACIÓN SOCIOECONÓMICA PARA LA OBRA DE REHABILITACIÓN Y CONSTRUCCIÓN DE NUEVA INFRAESTRUCTURA DEPORTIVA Y RECREATIVA EN EL PARQUE DE LA SOLIDARIDAD.</td>
                                           <td width="20%" align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                       </tr>
                                       
                                       <tr>
                                           <td width="10%" align="center">7</td>
                                           <td width="50%">PROYECTO INTEGRAL PARA MITIGAR INUNDACIIONES EN LA ZONA DE PORTALES DEL MUNICIPIO DE PUERTO VALLARTA, FOPREDEN (AMPLIACIÓN Y REENCAUSAMIENTO DE ARROYO LA VIRGEN EN CONCRETO HIDRÁULICO DEL CADENAMIENTO 0+470 AL 0+560)</td>
                                           <td width="20%"  align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                           
                                       </tr>
                                       <tr>
                                           <td width="10%" align="center">8</td>
                                           <td width="50%">TRABAJOS EMERGENTES EN LA CONSERVACIÓN DE CAMINOS EN LA RESIDENCIA DE SAN MIGUEL PARA EL CAMINO 302 LAGOS DE MORENO-UNIÓN DE SAN ANTONIO-SAN DIEGO DE ALEJANDRÍA, DEL KM. 0+000 AL 41+700.</td>
                                           <td width="20%"  align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                       </tr>
                                         <tr>
                                           <td width="10%" align="center">7</td>
                                           <td width="50%">PROYECTO INTEGRAL PARA MITIGAR INUNDACIIONES EN LA ZONA DE PORTALES DEL MUNICIPIO DE PUERTO VALLARTA, FOPREDEN (AMPLIACIÓN Y REENCAUSAMIENTO DE ARROYO LA VIRGEN EN CONCRETO HIDRÁULICO DEL CADENAMIENTO 0+470 AL 0+560)</td>
                                           <td width="20%"  align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                           
                                       </tr>
                                       <tr>
                                           <td width="10%" align="center">8</td>
                                           <td width="50%">TRABAJOS EMERGENTES EN LA CONSERVACIÓN DE CAMINOS EN LA RESIDENCIA DE SAN MIGUEL PARA EL CAMINO 302 LAGOS DE MORENO-UNIÓN DE SAN ANTONIO-SAN DIEGO DE ALEJANDRÍA, DEL KM. 0+000 AL 41+700.</td>
                                           <td width="20%"  align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                       </tr>
                                       <tr>
                                           <td width="10%"  align="center">9</td>
                                           <td width="50%">ELABORACIÓN DE ESTUDIOS TÉCNICOS DE SOPORTE Y EVALUACIÓN SOCIOECONÓMICA PARA LA OBRA DE REHABILITACIÓN Y CONSTRUCCIÓN DE NUEVA INFRAESTRUCTURA DEPORTIVA Y RECREATIVA EN EL PARQUE DE LA SOLIDARIDAD.</td>
                                           <td width="20%" align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                       </tr>
                                       
                                       <tr>
                                           <td width="10%" align="center">10</td>
                                           <td width="50%">PROYECTO INTEGRAL PARA MITIGAR INUNDACIIONES EN LA ZONA DE PORTALES DEL MUNICIPIO DE PUERTO VALLARTA, FOPREDEN (AMPLIACIÓN Y REENCAUSAMIENTO DE ARROYO LA VIRGEN EN CONCRETO HIDRÁULICO DEL CADENAMIENTO 0+470 AL 0+560)</td>
                                           <td width="20%"  align="center">1S.3</td>
                                           <td width="20%"  align="center">Lp0001-15</td>
                                           
                                       </tr>-->
                                     <!--
                                       <tr>
                                           <td width="10%" height="50" align="center"></td>
                                           <td width="50%" height="50" ></td>
                                           <td width="20%" height="50"  align="center"></td>
                                           <td width="20%" height="50"  align="center"></td>
                                           
                                       </tr>-->
                                       

                                   </tbody>
                               </table>
                            
                            </td>
                            
                        </tr>
                    </table>
           
            
           


        
        
        
        </div>
        
        
        
    </div>
            </body>
        </html>
        ';
        $this->load->library('mpdf');

         $mpdf=new mPDF('c','A4','','',42,15,67,67,20,15); 
 
        //$mpdf=new mpdf('c','A4','','',42,15,67,67,20,15); 
        $mpdf->AddPage('L','','','','',10,10,5,25,18,12);
 
        //$mpdf->shrink_tables_to_fit = 0;
        $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<tocentry content="150mm square" /><p>Pegar esta etiqueta al frente de la caja y laterales</p>');

        //$mpdf->WriteHTML($html);
      


        $mpdf->Output();
    }


    public function pruebas ($pdf=0){
        
           
     
        
                $html = '
                <html>
                    <head>
                        <style>
                            body{
                                font-size: 7pt;
                                font-family: "Arial";
                            }
                            .normal {
                               text-transform: uppercase;
                            }
                            .normal th, .normal td{
                              border: 1px  solid  #424242;
                              padding:5px;
                            }
                            
                            
                            .titulo{
                                background: #9e2138;
                                color: #FFF;
                                padding:2px;
                                text-transform: uppercase;
                            }
                            .upper {
                                text-transform: uppercase;
                            }
                            .p-box{
                                display: inline-block;
                                width: 20%;
                            }
                        </style>
                    </head>
                    <body>

                        <table width="100%">
                            <tr>
                                <td colspan="1" width="200" rowspan="3"><img src="' . site_url('assets/logo_chico.png') .'" width="150px"  height="70" /></td> 
                                <td colspan="4"></td> 
                                
                            </tr>
                            <tr>

                                <td colspan="4" ></td> 

                            </tr>
                            <tr>

                                <td colspan="4" ></td> 

                            </tr>
                            <tr>

                                <td colspan="5"  align="center"><span style="vertical-align: bottom; text-align="center" font-weigth:bold; font-size:9pt;">INVENTARIO DE TRANSFERENCIA<span></td>

                            </tr>
                        </table>





                        <table class="normal" width="100%" border="1">

                            <thead>

                                <tr>
                                    <th colspan="1" class="titulo" style="text-align: right;">Direccion General: </th>
                                    <th colspan="3" style="text-align: lefth;" class="upper">Obras públicas </th>
                                    <th colspan="1" class="titulo" style="text-align: right;">Fecha de Registro:</th>
                                    <th colspan="1" style="text-align: lefth;">12/02/1017 </th>
                                    <th colspan="1" class="titulo" style="text-align: right;">Folio:</th>
                                    <th colspan="2" style="text-align: lefth;"><span style="font-weight: bold;">T-0002</span></th>



                                </tr>
                                <tr>
                                    <th colspan="1" class="titulo" style="text-align: right;">Direccion Área: </th>
                                    <th colspan="3" style="text-align: lefth;" class="upper">Obras General públicas </th>
                                    <th colspan="1" class="titulo" style="text-align: right;">Fecha de Transferencia: </th>
                                    <th colspan="1" style="text-align: lefth;">19/02/1017 </th>
                                    <th colspan="1" class="titulo" style="text-align: right;">Cajas: </th>
                                    <th colspan="2" style="text-align: lefth;"><span>6</span></th>



                                </tr>
                            </thead>


                        </table>

                        <table width="100%" class="normal" border="1">


                            <tbody>

                                <tr>
                                    <td colspan="1" class="titulo" rowspan="2" align="center" >NO</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">CAJA</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">CARPETA</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">DESCRIPCIÓN</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">CLASIFICADOR</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">OT</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">AÑO</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">FOJAS</td>
                                    <td colspan="3" class="titulo" align="center">VALOR</td>
                                    <td colspan="3" class="titulo" align="center">DESTINO</td>
                                    <td colspan="2" class="titulo" align="center">OBSERVACIÓN</td>

                                </tr>

                                <tr>
                                    <td colspan="1" class="titulo" align="center">ADM</td>
                                    <td colspan="1" class="titulo" align="center">LEG</td>
                                    <td colspan="1" class="titulo" align="center">CON</td>
                                    <td colspan="1" class="titulo" align="center">BAJ </td>
                                    <td colspan="1" class="titulo" align="center">MUE</td>
                                    <td colspan="1" class="titulo" align="center">HIS</td>
                                    <td colspan="2" class="titulo" align="center">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">2</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">2</td>
                                    <td colspan="1">Proyecto de ciudad judicial, sala de juicios orales, detalle de comunicaciones</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">200</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2"></td>
                                </tr>
                               <tr>
                                    <td colspan="1">3</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">3</td>
                                    <td colspan="1">Proyecto de ciudad judicial, sala de juicios orales, detalle sin especificar</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">99</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">135</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol, detalles tecnicos</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">3</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">3</td>
                                    <td colspan="1">Proyecto de ciudad judicial, sala de juicios orales, detalle sin especificar</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">99</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">135</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol, detalles tecnicos</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">3</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">3</td>
                                    <td colspan="1">Proyecto de ciudad judicial, sala de juicios orales, detalle sin especificar</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">99</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">135</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol, detalles tecnicos</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr class="evenrow">
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">proyecto de ciudad judicial, sala de juicios orales</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">235</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">3</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">3</td>
                                    <td colspan="1">Proyecto de ciudad judicial, sala de juicios orales, detalle sin especificar</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">SIOP/1S1.3/LP001/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">99</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>
                                <tr>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">Construcción de Especificación col. Puerta del Sol</td>
                                    <td colspan="1">SIOP/1S1.3/LP028/15</td>
                                    <td colspan="1">LP028/15</td>
                                    <td colspan="1">2015</td>
                                    <td colspan="1">135</td>
                                    <td colspan="1">xx</td>
                                    <td colspan="1"></td>
                                    <td colspan="1">x</td>
                                    <td colspan="1">x </td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="2">Reservado</td>
                                </tr>



                            </tbody>
                             

                        </table>

                        <table width="100%">
                                <tr>
                                    <td width="100%" colspan="5" height="80px"></td>
                                </tr>
                                
                                <tr>

                                    <td width="20%" style="border-top: 1px solid #000; font-size:8pt" ></td>
                                    <td  width="20%" > </td>
                                    <td  width="20%" style="border-top: 1px solid #000; font-size:8pt">Gracia Ramirez Ruíz</td>
                                    <td  width="20%"  > </td>
                                    <td  width="20%" style="border-top: 1px solid #000; font-size:8pt"></td>

                                </tr> 
                                <tr>

                                    <td width="20%" style="font-size:8pt" >Responsable Oficina Generadora</td>
                                    <td  width="20%" > </td>
                                    <td  width="20%" style="font-size:8pt">Responsable Archivo Concentración</td>
                                    <td  width="20%"  > </td>
                                    <td  width="20%" style="font-size:8pt">Responsable Área de depósito</td>

                                </tr> 


                        </table>

                    </body>
                </html>


        ';
        
        $this->load->library('mpdf');
        $mpdf=new mPDF('c','A4','','',42,15,67,67,20,15); 

        //$mpdf=new mpdf('c','A4','','',42,15,67,67,20,15); 
         // ('L','','','','',10,10,TOP,BOTTOM,18,12
        $mpdf->AddPage('L','','','','',25,25,5,25,18,12);



       // $mpdf->mirrorMargins = 1;


        $footer= 
                '
                <div style="text-align:center; font-family:mono;font-size:7pt;font-weight:bold;font-style:italic;">
                  
                     
                        <p >Folio T-0002 - {PAGENO} de {nbpg} </p>
                  
                   

                </div>
                <div style="font-family:mono;font-size:7pt;font-weight:bold;font-style:italic; width:100%; border-top: 1px solid #000">
                  * IMPORTANTE: SOLO SE ACEPTARAN DOCUMENTOS EN SOBRE AMARILLO O COCIDOS <br>
                  

                </div>';

        //$mpdf->SetHTMLHeader($header);
        //$mpdf->SetHTMLHeader($headerE,'E');
        //$mpdf->setFooter('Folio T-0002 ||{PAGENO} de {nbpg}') ;

        $mpdf->setHTMLFooter($footer) ;
        
        //$mpdf->setFooter('Folio T-0002 ||{PAGENO} de {nbpg}') ;
        $mpdf->WriteHTML($html);

        $mpdf->Output('mpdf.pdf','I');
    
         
    }
    
    
    /*
   
    public function reporte_uso(){
        $this->load->model('impresiones_model');
        $this->load->model('direcciones_model');
        
        $qDirecciones = $this->direcciones_model->listado_catDirecciones();
        
       
        foreach ($qDirecciones->result() as $rDirecciones){
            $ot_preregistradas = $this->impresiones_model->ot_preregistradas($rDirecciones->id)->num_rows();
            $documentos = $this->impresiones_model->documentos_preregistrados()->num_rows();
            
        }
          
        
        
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
           
            $cadena_footer = "Reporte Uso";
            $mpdf->SetHTMLFooter($cadena_footer);            
            $output = $this->load->view('v_reporte_uso', $data, true);
            
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_uso', $data);
        }
        
        
    }

    public function listado_archivos(){
        
        $this->load->model('impresiones_model');
        
        $qDetalle = $this->impresiones_model->get_listado_archivos();
        $data['datos'] = $qDetalle->result_array();
        
        $this->load->view('v_listado_archivos', $data); // este manda a pantalla HTML normal
    }

    
    */
   
  

     
    
    
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
    
    public function reporte_listado_contratistas($pdf=1){
            $this->load->model('impresiones_model');
            $this->load->model('datos_model');
            
            $data = array();
            
            $data['qListado']= $this->impresiones_model->listado_contratistas();
            
            
            
            
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





                $output = $this->load->view('v_reporte_listado_contratistas', $data, true);
                $mpdf->WriteHTML($output);
                $mpdf->Output();
            } else {
                $this->load->view('v_reporte_listado_contratistas', $data);
            }
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
        /*$qEstimaciones_archivo = $this->impresiones_model->estimaciones_de_archivo($id);
        echo 'Entro';
        if (isset($qEstimaciones_archivo)){
            if ($qEstimaciones_archivo->num_rows() > 0){
                //echo 'Rows'. $qEstimaciones_archivo->num_rows();

                foreach ($qEstimaciones_archivo->result() as $estimaciones){

                        echo 'hay tipo id est '. $estimaciones->id;
                        $estimaciones_archivo=$this->impresiones_model->get_estimaciones_archivo_preregistro($estimaciones->id_Rel_Archivo_Documento,  $this->session->userdata('id'));
                        //$estimaciones_archivo=$this->impresiones_model->get_estimaciones_archivo($estimaciones->id);
                        if ($estimaciones_archivo->num_rows() > 0){
                                            echo 'Rows controller'. $estimaciones_archivo->num_rows();
                                            $estimaciones_usuario= 1;

                                            foreach ($estimaciones_archivo->result() as $estimaciones_a){
                                                //echo $estimaciones_a->idSubDocumento;
                                            }
                        }
                        $hay_estimaciones =1;
                        

                }
                //exit();
            } else{
                $hay_estimaciones =-1;
                echo $estimaciones_archivo;
            }
        
        }*/
        $qEstimaciones_archivo = $this->impresiones_model->estimaciones_direccion($id, $this->session->userdata('idDireccion_responsable'));
        if ($qEstimaciones_archivo->num_rows() > 0){
            $hay_estimaciones =1;
        }else {
            $hay_estimaciones =-1;
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
                'estimaciones_archivo' =>$qEstimaciones_archivo,
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
    
    public function documentos_preregistro_ot( $pdf = 1) {
        
        $this->load->model('impresiones_model');
        $this->load->model('rel_archivo_preregistro_model');
        
       
        $qOT = $this->rel_archivo_preregistro_model->ot_preregistradas();
        $data = array();
        $i = 0;
        if (isset($qOT)){
            if ($qOT->num_rows() > 0){
                
                

                foreach ($qOT->result() as $OT){
                   
                        
                    $total_documentos = $this->rel_archivo_preregistro_model->total_documentos($OT->idArchivo);
                    $documentos_preregistrados = $this->rel_archivo_preregistro_model->documentos_preregistrados($OT->idArchivo);
                    
                    
                    $resultado[$i]= array(
                                "OT" => $OT->OrdenTrabajo ,
                                "total_documentos" => $total_documentos,
                                "documentos_preregistrados" => $documentos_preregistrados,
                               
                                );
                    $i++;
                    echo $OT->OrdenTrabajo;
                    echo $total_documentos;
                    echo $documentos_preregistrados ."<br>";

                }
            }
            
        }
        
       

        
        
        $data = array(
        	
        	'resultado' => $resultado,
            );
        
         
        
        
        //$pdf = 0;
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            $mpdf = new mPDF('utf-8');
            
            
        
          
           
            
            
            $output = $this->load->view('v_reporte_avance_ot', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_avance_ot', $data);
        } 
          
        
        
        
    }
    
    
    public function reporte_uso($pdf = 1 ) {
        
        $this->load->model('impresiones_model');
        $this->load->model('rel_archivo_preregistro_model');
        $this->load->model('direcciones_model');
        
       
        $qDirecciones = $this->direcciones_model->listado_catDirecciones();
        
        $i = 0;
       
                

                foreach ($qDirecciones->result() as $rRow){
                   
                    $usuarios_direccion =     
                    $ot_preregistradas = $this->rel_archivo_preregistro_model->ot_preregistradas_direccion($rRow->id);
                    $documentos_preregistrados = $this->rel_archivo_preregistro_model->documentos_preregistrados_direccion($rRow->id);
                    $usuarios =  $this->rel_archivo_preregistro_model->usuarios_preregistran_direccion($rRow->id);
                    
                    $usuario = "";
                    foreach ($usuarios->result() as $u){
                        
                        $usuario .= $u->Nombre."<br>";
                        print_r($usuario);
                    }
                    
                    
                    $resultado[$i]= array(
                        "Direccion" => $rRow->Nombre ,
                        "ot_preregistradas" => $ot_preregistradas,
                        "documentos_preregistrados" => $documentos_preregistrados,
                        "usuarios" => $usuario,
                       

                    );
                    $i++;
                    $usuario .="<br><br>";

                }
                
           
        
        
        
        $data = array(
        	
        	'resultado' => $resultado,
            );
        
         //array_multisort($sortArray[$orderby],SORT_DESC,$data); 
         
        // var_dump($data);
        
        
        //$pdf = 0;
        if ($pdf == 1) {
            $this->load->library('mpdf');
            //$mpdf = new mPDF('utf-8', 'Letter');
            //$mpdf = new mPDF('utf-8', 'Legal');
            $mpdf = new mPDF('utf-8');
            
            
        
          
           
            
            
            $output = $this->load->view('v_reporte_avance_ot', $data, true);
            $mpdf->WriteHTML($output);
            $mpdf->Output();
        } else {
            $this->load->view('v_reporte_avance_ot', $data);
        } 
          
        
        
        
    }
    
    
   
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */