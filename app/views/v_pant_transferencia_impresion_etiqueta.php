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
	<title>Transferencia</title>

	 
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
                padding:13pt;
                text-transform: uppercase;
                font-size: 12pt;
                vertical-align: bottom; 
                text-align: center; 
                font-weigth:bold;
            }
            .subtitulo{
                font-size: 10pt; 
                color: #FFF;
                font-size: 10pt; 
                text-transform: uppercase;
            }
            
            .respuesta{
                text-transform: uppercase;
                background: #13AEBA;
                color: #FFF;
                font-size: 10pt; 
                text-align: center; 
            }
            
            .linea{
                border-bottom : 1px solid #000;

            }
            .principal{
                width:100% !important; 
                heigth:353px !important; 
                border:3px solid #13AEBA;
            }
        </style>
    </head>
    <body>

        <div class="principal">
            <div style="width:100%; heigth:100px;" class="titulo">
                <table width="100%">
                    
                    <tr class="titulo">
                        <th colspan="3" style="font-weigth:bold;"  align="center"><span class="titulo">SIOP<span></th>
                    </tr>
                    <tr class="titulo">
                        <td colspan="3" style="font-weigth:bold;"  align="center"><span class="subtitulo"><?= $direccion ?><span></td> 
                    </tr>
                    <tr class="titulo">
                        <td colspan="3" style="font-weigth:bold;"  align="center"><span class="subtitulo">No. Caja <?= $caja ?><span></td> 
                    </tr>
                    <tr class="titulo">
                        <td colspan="3" style="font-weigth:bold;"  align="center"><span class="subtitulo">Folio <?= $folio ?><span></td> 
                    </tr>
                    


                </table>

            </div>
            
            <div style="width:100%; heigth:253px;">
                <!--
                <table width="100%">
                    <tr class="titulo">
                        <td width="20%" style="text-align:end; text-transform:uppercase; " >Dirección Área:</td>
                        <th width="60%" style="text-align:start; text-transform:uppercase; "><?= $direccion ?></th>
                        <td width="10%" style="text-align:end; text-transform:uppercase; ">Caja: </td>
                        <th width="10%" style="text-align:start; text-transform:uppercase; "><?= $caja ?></th>

                    </tr>
                    
                     <tr class="titulo">

                        <td width="20%" style="text-align:end; text-transform:uppercase; "></td>
                        <th width="60%" style="text-align:start; text-transform:uppercase; "></th>
                        <td width="10%" style="text-align:end; text-transform:uppercase; ">Folio: </td>
                        <th width="10%" style="text-align:start; text-transform:uppercase; "><?= $folio ?></th>

                    </tr>  
                </table>
                -->
                <p align="center">Expedientes </p>
                <table  width="100%"  class="normal-linea">
                    
                        <tr>
                            <td height="320" style=" vertical-align:top; ">
                                <table  width ="100%" heigth="100%">
                                   <thead>
                                       <tr>
                                           <td width="10%"  align="center">Carpeta </td>
                                           <td width="20%"  align="center">Identificador</td>
                                           <td width="20%"  align="center">OT</td>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       
                                       <?php  foreach ($detalle->result() as $row): ?>
                                       <tr>
                                           <td width="10%" class="linea" align="center" ><?= $row->No_Carpeta ?></td>
                                           <td width="20%" class="linea" align="center"><?= $row->clasificador ?></td>
                                           <td width="20%" class="linea" align="center"><?= $row->OrdenTrabajo ?></td>
                                       </tr>
                                       
                                       <?php endforeach; ?>
                                       
                                       

                                   </tbody>
                               </table>
                            
                            </td>
                            
                        </tr>
                    </table>
           
            
           


        
        
        
        </div>
        
        
        
    </div>

    </body>
</html>
