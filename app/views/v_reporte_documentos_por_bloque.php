

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
                        
                        <th colspan="2">REPORTE DE DOCUMENTOS POR BLOQUE</th>
                        <td width="33%" rowspan="3"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></td>
                        
                    </tr>
                    
                  
                    <tr>
                        <th>&nbsp;</th>
                        
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        
                    </tr>
                    
                    <tr>
                        <th>&nbsp;</th>
                        
                    </tr>
                    <tr>
                        <th colspan="4">&nbsp;</th>
                        
                    </tr>
                    
                  
    </thead>
    
                
         
    <tbody>
                 
             <tr>
                       
                 <td id="idencabezado_principal">
                     Bloque
                 </td>
                 <td id="idencabezado_principal">
                     No. Total de Documentos
                 </td>
                 <td id="idencabezado_principal">
                     Entregados
                 </td>
                 
                 <td id="idencabezado_principal">
                     Porcentaje
                 </td>

             </tr>

              <tr>
                       
                        <td id="idborder">
                           1
                        </td>
                        <td id="idborder">
                           <?php  $suma = $qDocumentos_total_por_bloque_1 + $qDocumentos_total_por_bloque_5; 
                                   echo $suma;
                           
                           ?>
                        </td>
                        <td id="idborder">
                            <?php  $suma_finalizados =  $qDocumentos_finalizados_bloque_1 + $qDocumentos_finalizados_bloque_5; 
                                   echo  $suma_finalizados;
                            ?>
                        </td>
                       
                        <td id="idborder">
                            <?php  if ($suma == $suma_finalizados){
                                    echo '100%';
                            
                           
                            } else {
                                $porcentaje = (int)$suma_finalizados * 100 / (int) $suma;
                            
                                echo round($porcentaje, 2) . '%'; 
                            }
                            ?>
                        </td>
                        
                        
                        

               </tr>
               
               <tr>
                       
                        <td id="idborder">
                           2
                        </td>
                        <td id="idborder">
                           <?php  echo $qDocumentos_total_por_bloque_2; ?>
                        </td>
                        <td id="idborder">
                            <?php  echo  $qDocumentos_finalizados_bloque_2 ?>
                        </td>
                       
                        <td id="idborder">
                            <?php  if ($qDocumentos_total_por_bloque_2 == $qDocumentos_finalizados_bloque_2){
                                    echo '100%';
                            
                           
                            } else {
                                $porcentaje = (int)$qDocumentos_finalizados_bloque_2 * 100 / (int) $qDocumentos_total_por_bloque_2;
                            
                                echo round($porcentaje, 2) . '%'; 
                            }
                            ?>
                        </td>
                 
               </tr>
               
               <tr>
                       
                        <td id="idborder">
                           3
                        </td>
                        <td id="idborder">
                           <?php  echo $qDocumentos_total_por_bloque_3; ?>
                        </td>
                        <td id="idborder">
                            <?php  echo  $qDocumentos_finalizados_bloque_3 ?>
                        </td>
                       
                        <td id="idborder">
                            <?php  if ($qDocumentos_total_por_bloque_3 == $qDocumentos_finalizados_bloque_3){
                                    echo '100%';
                            
                           
                            } else {
                                $porcentaje = (int)$qDocumentos_finalizados_bloque_3 * 100 / (int) $qDocumentos_total_por_bloque_3;
                            
                                echo round($porcentaje, 2) . '%'; 
                            }
                            ?>
                        </td>
                 
               </tr>
               
               <tr>
                       
                        <td id="idborder">
                           4
                        </td>
                        <td id="idborder">
                           <?php  echo $qDocumentos_total_por_bloque_4; ?>
                        </td>
                        <td id="idborder">
                            <?php  echo  $qDocumentos_finalizados_bloque_4 ?>
                        </td>
                       
                        <td id="idborder">
                            <?php  if ($qDocumentos_total_por_bloque_4 == $qDocumentos_finalizados_bloque_4){
                                    echo '100%';
                            
                           
                            } else {
                                $porcentaje = (int)$qDocumentos_finalizados_bloque_4 * 100 / (int) $qDocumentos_total_por_bloque_4;
                            
                                echo round($porcentaje, 2) . '%'; 
                            }
                            ?>
                        </td>
                 
               </tr>
               
               <tr>
                       
                        <td id="idencabezado_principal">
                           Total General
                        </td>
                        <td id="idencabezado_principal">
                           <?php  echo $total_general; ?>
                        </td>
                        <td id="idencabezado_principal">
                            <?php  echo  $total_general_finalizados ?>
                        </td>
                       
                        <td id="idencabezado_principal">
                            <?php  if ($total_general_finalizados == $total_general){
                                    echo '100%';
                            
                           
                            } else {
                                $porcentaje = (int)$total_general_finalizados * 100 / (int) $total_general;
                            
                                echo round($porcentaje, 2) . '%'; 
                            }
                            ?>
                        </td>
                 
               </tr>
               
               



                  



        </tbody>
     </table>


</body>
</html>
