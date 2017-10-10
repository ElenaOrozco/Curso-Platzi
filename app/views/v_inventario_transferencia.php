<?php
/*header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Etiqueta_Obra.xls");
header("Pragma: no-cache");
header("Expires: 0");*/
?>

<!DOCTYPE html>
  <html>
            <head>
                <meta content="text/html; charset=UTF-8" http-equiv="content-type">
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
                        background: #8e1538;
                        color: #FFF;
                        padding:2px;
                        text-transform: uppercase;
                        
                    }
                    .upper {
                        text-transform: uppercase;
                    }
                </style>
            </head>
            <body>
                
                
        



                <table class="normal" width="100%" border="1">
                
                    <thead>
                        
                        <tr>
                            <th colspan="4" width="200" rowspan="3"><img src="<?php echo site_url('assets/logo_chico.png') ?>" width="200px"  height="70" /></th> 
                            <th colspan="15" ></th> 
                        </tr>
                        <tr>

                            <th colspan="15" ></th> 

                        </tr>
                        <tr>

                            <th colspan="15" ></th> 

                        </tr>
                        <tr>

                            <td colspan="19"  align="center"><span style="vertical-align: bottom; text-align:center; font-weigth:bold; font-size:9pt;">INVENTARIO DE TRANSFERENCIA<span></td>

                        </tr>
                        
                        <tr>
                            <th colspan="5" class="titulo" style="text-align: right;">Direccion General: </th>
                            <th colspan="5" style="text-align: lefth;" class="upper">Obras públicas </th>
                            <th colspan="4" class="titulo" style="text-align: right;">Fecha de Registro:</th>
                            <th colspan="2" style="text-align: lefth;">12/02/1017 </th>
                            <th colspan="1" class="titulo" style="text-align: right;">Folio:</th>
                            <th colspan="2" style="text-align: lefth;"><span style="font-weight: bold;">T-0002</span></th>



                        </tr>
                        <tr>
                            <th colspan="5" class="titulo" style="text-align: right;">Direccion Área: </th>
                            <th colspan="5" style="text-align: lefth;" class="upper">Obras General públicas </th>
                            <th colspan="4" class="titulo" style="text-align: right;">Fecha de Transferencia: </th>
                            <th colspan="2" style="text-align: lefth;">19/02/1017 </th>
                            <th colspan="1" class="titulo" style="text-align: right;">Cajas: </th>
                            <th colspan="2" style="text-align: lefth;"><span>6</span></th>



                        </tr>
                    </thead>
 
            
                </table>
 
                <table width="100%" border="1">
             
 
                    <tbody>

                        <tr>
                            <td colspan="1" class="titulo" rowspan="2" align="center" >NO</td>
                            <td colspan="1" class="titulo" rowspan="2" align="center">CAJA</td>
                            <td colspan="1" class="titulo" rowspan="2" align="center">CARPETA</td>
                            <td colspan="3" class="titulo" rowspan="2" align="center">DESCRIPCIÓN</td>
                            <td colspan="2" class="titulo" rowspan="2" align="center">CLASIFICADOR</td>
                            <td colspan="2" class="titulo" rowspan="2" align="center">OT</td>
                            <td colspan="1" class="titulo" rowspan="2" align="center">AÑO</td>
                            <td colspan="1" class="titulo" rowspan="2" align="center">FOJAS</td>
                            <td colspan="3" class="titulo" align="center">VALOR</td>
                            <td colspan="3" class="titulo" align="center">DESTINO</td>
                            <td colspan="2" class="titulo" align="center">OBSERVACIÓN</td>

                        </tr>
 
                        <tr>
                            <td colspan="1" class="titulo" align="center">Administrativo</td>
                            <td colspan="1" class="titulo" align="center">Legal</td>
                            <td colspan="1" class="titulo" align="center">Contable</td>
                            <td colspan="1" class="titulo" align="center">Baja </td>
                            <td colspan="1" class="titulo" align="center">Muestreo</td>
                            <td colspan="1" class="titulo" align="center">Historico</td>
                            <td colspan="2" class="titulo" align="center">Reservado</td>
                        </tr>
                        <tr>
                            <td colspan="1">1</td>
                            <td colspan="1">1</td>
                            <td colspan="1">1</td>
                            <td colspan="3">Proyecto de ciudad judicial, sala de juicios orales</td>
                            <td colspan="2">SIOP/1S1.3/LP001/15</td>
                            <td colspan="2">LP001/15</td>
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
                            <td colspan="3">Proyecto de ciudad judicial, sala de juicios orales, detalle de comunicaciones</td>
                            <td colspan="2">SIOP/1S1.3/LP001/15</td>
                            <td colspan="2">LP001/15</td>
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
                            <td colspan="3">Proyecto de ciudad judicial, sala de juicios orales, detalle sin especificar</td>
                            <td colspan="2">SIOP/1S1.3/LP001/15</td>
                            <td colspan="2">SIOP/1S1.3/LP001/15</td>
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
                            <td colspan="3">Construcción de Especificación col. Puerta del Sol</td>
                            <td colspan="2">SIOP/1S1.3/LP028/15</td>
                            <td colspan="2">LP028/15</td>
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
                            <td colspan="3">Construcción de Especificación col. Puerta del Sol, detalles tecnicos</td>
                            <td colspan="2">SIOP/1S1.3/LP028/15</td>
                            <td colspan="2">LP028/15</td>
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
                        
                       
                       
 
 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="19" height="40px"></td>
                        </tr>
                        <tr>
                            
                            <td colspan="5" style="border-top: 1px solid #000;" >Responsable Oficina Generadora</td>
                            <td colspan="2" ></td>
                            <td colspan="5" style="border-top: 1px solid #000; ">Responsable Archivo Concentración</td>
                            <td colspan="2" ></td>
                            <td colspan="5" style="border-top: 1px solid #000; ">Responsable Área de deposito</td>
                       
                        </tr> 
                        
                        
                    </tfoot>
 
                </table>
                
                
            </body>
        </html>
 

