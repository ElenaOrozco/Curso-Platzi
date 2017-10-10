

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Reporte de Archivo</title>

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
                background-color: #fff;
                text-align: start;
                color: #000;
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
                        
                        <th colspan="3" rowspan="4" id="idencabezado_principal">REPORTE DE AVANCE POR OT</th>
                        <td width="33%" rowspan="4"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></td>
                    </tr>
                    
                    
                  
                    
                    <tr>
                        <th  id="idencabezado">
                           ORDEN DE TRABAJO
                        </th>
                        <th  id="idencabezado" width="60%">
                            TOTAL DE DOCUMENTOS
                        </th>
                        
                         <th  id="idencabezado">
                            DOCUMENTOS PREREGISTRADOS
                        </th>
                        <th  id="idencabezado">
                            PORCENTAJE DE AVANCE
                        </th>
                        
                       
                        
                        
                       
                        
                    </tr>
                  
    </thead>
    
                
         
    <tbody>
                 

                    

                     <?php
                    
                            foreach ($resultado as $rRow) {
                                 //echo 'each';
                                    
                                
                                
                    ?>
        
                            <tr>
                               

                                <td id="idborder">
                                   <?php echo $rRow['OT']; ?>

                                </td>


                                <td id="idborder">
                                
                                   
                                   <?php  echo $rRow['total_documentos'] ?>
                                </td>
                                <td id="idborder">

                                   <?php echo $rRow['documentos_preregistrados'] ?>
                                </td>
                                <td id="idborder">
                                    <?php  if ($rRow['documentos_preregistrados'] == 0){
                                                echo '0%';
                                        }
                                        else if($rRow['documentos_preregistrados'] == $rRow['total_documentos']) {
                                            echo '100%';
                                        } else {
                                            $porcentaje = (int)$rRow['documentos_preregistrados'] * 100 / (int) $rRow['total_documentos'];

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



