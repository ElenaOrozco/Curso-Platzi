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
	<title>Etiqueta Orden trabajo</title>

	 <style>
            
            @media print {
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size:12pt;
                }
                #idencabezado{
                    width: 8cm;
                    height: 11cm;
                }
                table tr,td{
                    vertical-align:top;
                }
                .reducir{
                    font-size:0.7em;
                }
            }
            body {
                font-family: Arial, Helvetica, sans-serif;
                 font-size: 10pt;
                 line-height: 14pt;
                

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
                border: 1px solid #04B45F;
                color: #000;
                text-align: center;
                font-size: 18px;
                line-height: 24px;
                font-weight: bold;
                text-align: center;
            }

            #idencabezado_raya {
            border: thin solid #000;
            }
            #idresult {
                text-transform: uppercase;
                
                font-weight: bold;
                text-align: start;
            }
            #idtable{
                 border: 1px solid #04B45F;
            }
            #idSubtitulo{
                font-size: 14px;
                line-height: 18px;
                text-align: center;
            }
     </style>

</head>
<body>
		
                 <table width="304px" heigt="414" border="0" cellspacing="0" id="idtable" >
                     <tr id="idencabezado">
                         <td align="center">
                             <table id="idencabezado" width="100%" height="90px">
                        
                                <tr> <td colspan="2" align="center"> SIOP </td></tr>
                                <tr> <td colspan="2" align="center" id="idSubtitulo">Centro de Integración Documental</td></tr>
                                <tr> <td colspan="2" align="center" id="idSubtitulo">Ing. Felipe Tito Lugo Arias</td></tr>
                             </table>
                         </td>
                     </tr>
                    <tr>
                         <td>
                             <table height="324px">
                                 <?php if (isset($qOrden)) {
                                    if ($qOrden->num_rows() > 0) {
                                        foreach ($qOrden->result() as $rOrden) {

                                ?>
                                 
                                    <tr>
                                         <td >
                                             OT: 
                                         </td>
                                         <td id="idresult" align="start">
                                              <?php echo $rOrden->OrdenTrabajo ?>
                                         </td>
                                    </tr>
                                    <tr>    
                                        <td colspan="2">Nombre de la Obra: </td>     
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="2" id="idresult"> <?php echo $rOrden->Obra ?></td> 
                                    </tr>
                                     
                                    <tr>
                                         <td> 
                                             Supervisor: 
                                         </td>
                                         <td id="idresult"> 
                                              <?php echo $rOrden->Supervisor ?>
                                         </td>
                                         
                                    </tr>
                                     
                                     <tr>
                                         <td>
                                             Ubicación: 
                                         </td>
                                         <td id="idresult">
                                             <?php echo $addwUbicaciones[$idUbicacion] ?>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             Folios: 
                                         </td>
                                         <td id="idresult">
                                             <?php echo $Folios ?>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             Apartados: 
                                         </td>
                                         <td id="idresult">
                                             <?php echo $Apartados ?>
                                         </td>
                                     </tr>
                                      <tr>
                                         <td>
                                             Bloque: 
                                         </td>
                                         <td id="idresult">
                                             <?php echo $bloque ?>
                                         </td>
                                     </tr>
                                    <?php } }
                                }?>
                                

                            </table>
                         </td>
                    </tr>
                    
                    


                 </table>
          


</body>
</html>



