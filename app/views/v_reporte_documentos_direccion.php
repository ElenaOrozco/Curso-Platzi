

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Reporte de Obras por Direccion</title>

	 <style>
            
            @media print {
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size:9pt;
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
                 font-size: 9pt;

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
                background-color: #861d31;
                border: thin solid #000;
                color: #EEE;
            }
            #idencabezado_principal {
                background-color: #861d31;
                border: thin solid #000;
                color: #EEE;
            }

             #idencabezado_raya {
            border: thin dotted #000;
            }
            #idTitulos {
                text-transform: uppercase;
                font-size: 14px;
            }
            #b-b{
                border-bottom: thin solid  #000;
                border-right: thin solid #000;
            }
            #b-t{
                border-top: thin solid #000;
                border-right: thin solid #000;
            }
            #b-r {
                border-right: thin solid #000;
            }
     </style>

</head>
<body>
<table  width="800">

    <thead>
          
                
                    <tr>
                        
                        
                        <td width="33%" rowspan="3"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></td>
                        <th colspan="3">REPORTE DE OBRAS POR DIRECCIONES</th>
                    </tr>
                    
                  
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        
                    </tr>
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        
                    </tr>
                    
                    <tr>
                        <th colspan="5">&nbsp;</th>
                        
                    </tr>
                    <tr>
                        <th colspan="5">&nbsp;</th>
                        
                    </tr>
                    
                  
    </thead>
    
                
         
    <tbody>
                 
             <tr>
                       
                 <td id="idencabezado_principal">
                     Dirección
                 </td>
                 <td id="idencabezado_principal">
                     No. Total de Obras
                 </td>
                 <td id="idencabezado_principal">
                     Obras en Proceso
                 </td>
                 <td id="idencabezado_principal">
                     Obras Terminadas
                 </td>
                 <td id="idencabezado_principal">
                     Porcentaje
                 </td>

                     <?php
                     
                            foreach ($resultado as $r) {
                                

                    ?>

                    <tr>
                       
                        <td id="idborder">
                           <?php echo $aDirecciones[$r["direccion"]] ?>
                        </td>
                        <td id="idborder">
                           <?php  echo $r["obrasTotales"]; ?>
                        </td>
                        <td id="idborder">
                            <?php  echo $r["obrasProceso"]; ?>
                        </td>
                        <td id="idborder">
                            <?php  echo $r["obrasTerminadas"]; ?>
                        </td>
                        <td id="idborder">
                            <?php  if ($r["obrasProceso"] == $r["obrasTotales"]){
                                    echo '0%';
                            }
                            else if($r["obrasTotales"] == $r["obrasTerminadas"]) {
                                echo '100%';
                            } else {
                                $porcentaje = (int)$r ["obrasProceso"] * 100 / (int) $r["obrasTotales"];
                            
                                echo round($porcentaje). '%'; 
                            }
                            ?>
                        </td>
                        
                        
                        

                    </tr>



                    <?php
                         
                     }
                    ?>



        </tbody>
     </table>


</body>
</html>




