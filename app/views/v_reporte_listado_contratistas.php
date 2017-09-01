

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Reporte de Contratistas</title>

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
                 font-size: 8pt;

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
                        
                        <td width="33%" rowspan="3"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></td>
                        <th colspan="1" id="idencabezado_principal">REPORTE DE CONTRATISTAS (736 OBRAS)</th>
                    </tr>
                    
                    <tr> <th colspan="1">&nbsp;</th></tr>
                    <tr> <th colspan="1">&nbsp;</th></tr>
                    <tr> <th colspan="2">&nbsp;</th></tr>
                    <tr> <th colspan="2">&nbsp;</th></tr>
                    
                    
                  
                    <tr>
                        <th  id="idencabezado">
                           OT
                        </th>
                        <th  id="idencabezado" width="60%">
                                Contratista
                        </th>
                        
                        
                      
                        
                    </tr>
                  
    </thead>
    
                
         
    <tbody>
                 

                    

                     <?php
                     if (isset($qListado)) {
                         echo 'isset status';
                           if ($qListado->num_rows() > 0) {
                               $i=0;
                                //echo 'rows';
                            foreach ($qListado->result() as $rStatus) {
                                 //echo 'each';
                                    $i++;
                                
                                
                    ?>
        
                            <tr>
                                <td id="idborder">
                                     <?php echo $rStatus->OrdenTrabajo ; ?>
                                  
                                </td>

                                <td id="idborder">
                                   <?php echo $rStatus->Contratista ; ?>

                                </td>


                               




                            </tr>
                    <?php
                    
                                    }
                                }
                                    
                            } 
                    ?>

                    





        </tbody>
     </table>


</body>
</html>



