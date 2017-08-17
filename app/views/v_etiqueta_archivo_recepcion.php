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
	<title>Etiqueta para Archivo de Recepción</title>

	 <style>
            
            @media print {
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size:9pt;
                }
                #idtable{
                    height: 100%;
                    width: 100%;
                }
                #idencabezado{
                    height: 71px;
                }
                #tabla-secun{
                    height: 421px;
                }
                #fila{
                    height: 20px;
                }
                #fila-obra{
                    height: 37px;
                    overflow: hidden;
                  
                    
                }
                table tr,td{
                    vertical-align:center;
                    
                }
                #div-tabla{
                    
                    height: 396px;
                    width: 491px;
                    
                }
                .reducir{
                    font-size:0.9em;
                }
            }
            
            
            body {
                font-family: Arial, Helvetica, sans-serif;
                 font-size: 10pt;
         
                

            }
            .tabla_label {
                background-color:#861d31;
                color:#FFF;
                vertical-align: text-top;
            }


            #idborder {
                border: thin solid #000;
            }
            

            #idencabezado {
                background-color: #04B45F;
                
                color: #FFF;
                text-align: center;
                font-size: 10pt;
                line-height: 10pt;
                font-weight: bold;
                text-align: center;
                width: 100%;
            }

            #idencabezado_raya {
            border: thin solid #000;
            }
            #idresult {
                text-transform: uppercase;
                width: 100%;
                font-weight: bold;
                text-align: start;
                font-size: 9pt;
                line-height: 9pt;
            }
            #idresult2 {
                
                width: 100%;
                
                text-align: start;
                font-size: 9pt;
                line-height: 9pt;
            }
            
            #bloque_numero{
                width: 100%;
                
                text-align: end;
                font-size: 8pt;
                line-height: 8pt;
            }
            #idtable{
                 border: 1px solid #04B45F;
            }
            #bloque{
                border: 1px solid #000;
                border-radius: 5px;
                width: 40px;
                height: 20px;
            }
            #fila-obra{
                height: 30px;
                overflow: hidden;

            }
     </style>

</head>
<body>
    
		
    <div id="div-tabla">
         <table width="550" heigth="420" border="0" cellspacing="0" class="idtable" >
                     <tr id="idencabezado" width="100%" heigth="120px">
                         <td width="100%" align="center">
                             <table id="idencabezado" width="100%">
                        
                                <tr> <td colspan="2" align="center"> SIOP </td></tr>
                                <tr> <td colspan="2" align="center">Centro de Integración Documental</td></tr>
                                <tr> <td colspan="2" align="center">Ing. Felipe Tito Lugo Arias</td></tr>
                             </table>
                         </td>
                     </tr>
                     
                    <tr>
                        <td class="" style=" border: 1px solid #04B45F;">
                             <table id="tabla-secun">
                                 <?php if (isset($qOrden)) {
                                    if ($qOrden->num_rows() > 0) {
                                        foreach ($qOrden->result() as $rOrden) {

                                ?>
                                 
                                     <tr id="fila">
                                         <td id="idresult2">
                                             Orden de Trabajo: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->OrdenTrabajo ?>
                                         </td>
                                     </tr>
                                     <tr id="fila-obra">
                                         <td id="idresult2">
                                             <div class="fila-obra">
                                                Nombre de la Obra:  
                                             </div>
                                            
                                         </td>
                                         <td id="idresult">
                                             <div class="fila-obra">
                                                 <?php echo substr($rOrden->Obra, 0, 150);  // bcd ?>
                                             </div>
                                               
                                         </td>
                                     </tr>
                                     <tr id="fila">
                                         <td id="idresult2">
                                             Contrato: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->Contrato ?>
                                         </td>
                                     </tr>
                                     <tr id="fila">
                                         <td id="idresult2">
                                             Modalidad: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->Modalidad ?>
                                         </td>
                                     </tr>
                                     <tr id="fila">
                                         <td id="idresult2">
                                             Normatividad: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->Normatividad ?>
                                         </td>
                                     </tr>
                                     <tr id="fila">
                                         <td id="idresult2"> 
                                             Supervisor: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->Supervisor ?>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td id="idresult2">
                                             Dirección Ejecutora: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->Direccion ?>
                                         </td>
                                     </tr>
                                     <tr id="fila">
                                         <td id="idresult2">
                                             Fecha Inicio Contrato: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->FechaInicio ?>
                                         </td>
                                     </tr>
                                      <tr id="fila">
                                         <td id="idresult2">
                                             Fecha Termino Contrato: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->FechaTermino ?>
                                         </td>
                                     </tr>
                                      <tr id="fila">
                                         <td id="idresult2">
                                             Monto Contratado: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->ImporteContratado ?>
                                         </td>
                                     </tr>

                                      <tr id="fila">
                                         <td id="idresult2">
                                             Monto Ejercido por SIOP: 
                                         </td>
                                         <td id="idresult">
                                              <?php echo $rOrden->ImporteEjercido ?>
                                         </td>
                                     </tr>
                                      <tr id="fila">
                                         <td id="idresult2">
                                             Finiquitada: 
                                         </td>
                                         <td id="idresult">
                                              <?php if ($rOrden->Finiquitada) echo 'SI'; else echo 'NO'; ?>
                                         </td>
                                     </tr> 
                                     <tr id="fila">
                                         <td id="idresult2">
                                             Ubicación de Revisión: 
                                         </td>
                                         <td id="idresult">
                                             <?php echo $addwUbicaciones[$idUbicacion] ?>
                                         </td>
                                     </tr>
                                      <tr>
                                         <td id="idresult2">
                                             Bloque: 
                                         </td>
                                         <td id="idresult">
                                             <table width="100%">
                                                 <tr>
                                                     <td id="bloque_numero" align="center">1</td>
                                                     <td id="bloque"></td>
                                                     <td></td>
                                                     <td id="bloque_numero" align="center">2</td>
                                                     <td id="bloque"></td>
                                                     <td></td>
                                                     <td id="bloque_numero" align="center">3</td>
                                                     <td id="bloque"></td>
                                                     <td></td>
                                                     <td id="bloque_numero" align="center">4</td>
                                                     <td id="bloque"></td>
                                                 </tr>
                                             </table>
                                             
                                         </td>
                                     </tr>
                                    <?php } }
                                }?>
                                

                            </table>
                         </td>
                    </tr>
                    
                    


                 </table>
    </div>
          


</body>
</html>



