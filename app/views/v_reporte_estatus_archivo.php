

<!DOCTYPE html>
<html>
<head>
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
                        
                        <th colspan="3" id="idencabezado_principal">INVENTARIO DE TRANSFERENCIA PRIMARIA</th>
                        <td width="33%" rowspan="6"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <th colspan="4">&nbsp;</th>
                        
                    </tr>
                    
                    <tr>
                        <th colspan="3" id="idencabezado_principal">ORDEN TRABAJO: <?php echo $OrdenTrabajo ?></th>
                        
                        
                    </tr>
                    
                    <tr>
                        <th colspan="3" id="idencabezado_principal">CONTRATO: <?php echo $Contrato ?></th>
                        
                        
                    </tr>
                    <tr>
                        <th colspan="3" id="idencabezado_principal">OBRA: <?php echo $Obra ?></th>
                        
                        
                    </tr>
                    <tr>
                        <th colspan="3" id="idencabezado_principal">MODALIDAD: <?php echo $addwModalidad[$Modalidad] ?></th>
                        
                       
                    </tr>
                    <tr>
                        <th colspan="3" id="idencabezado_principal">EJERCICIO: <?php echo $Ejercicio//$addwEjercicio[$Ejercicio]?></th>
                        
                       
                    </tr>
                    <tr>
                        <th colspan="3" id="idencabezado_principal">NORMATIVIDAD: <?php echo $Normatividad ?></th>
                        
                        
                    </tr>
                    <tr>
                        <th colspan="3" id="idencabezado_principal">DIRECCION RESPONSABLE: <?php echo $addwDireccion[$rDireccion_responsable]?></th>
                        
                        
                    </tr>
                  
                    <tr>
                        <th colspan="4">&nbsp;</th>
                        
                    </tr>
                    <tr>
                        <th colspan="4">&nbsp;</th>
                        
                    </tr>
                    <tr>
                        <th  id="idencabezado">
                           No.
                        </th>
                        <th  id="idencabezado" width="60%">
                            Nombre
                        </th>
                        
                         <th  id="idencabezado">
                            No. Hojas
                        </th>
                        <th  id="idencabezado">
                            Tipo Documento
                        </th>
                        <th  id="idencabezado">
                            Bloque
                        </th>
                       
                        
                        
                       
                        
                    </tr>
                  
    </thead>
    
                
         
    <tbody>
                 

                    

                     <?php
                     if (isset($qStatus)) {
                         echo 'isset status';
                           if ($qStatus->num_rows() > 0) {
                               $i=0;
                                //echo 'rows';
                            foreach ($qStatus->result() as $rStatus) {
                                 //echo 'each';
                                    $i++;
                                
                                
                    ?>
        
                            <tr>
                                <td id="idborder">
                                    
                                   <?php
                                       echo $i;
                                   
                                   ?>
                                </td>

                                <td id="idborder">
                                   <?php echo $rStatus->Nombre ; ?>

                                </td>


                                </td><td id="idborder">
                                
                                   
                                   <?php  if( $rStatus->Nombre == "11.1 ESTIMACIONES") {
                                                if ($rStatus->noHojas == 0){
                                                    echo '-';
                                                }else {
                                                    echo $rStatus->noHojas ;  
                                                }
                                           }else{
                                             echo $rStatus->noHojas ;  
                                           }
                                   ?>
                                </td>
                                <td id="idborder">

                                   <?php
                                            if($rStatus->tipo_documento==1) {
                                                echo 'Copia ';
                                            } 
                                             if($rStatus->tipo_documento==2) {
                                                echo 'Original ';
                                            }
                                            if($rStatus->tipo_documento==3) {
                                                echo 'No Aplica';
                                            }

                                   ?>
                                </td>
                                <td id="idborder">
                                    <?php  if($rStatus->idTipoProceso==1 || $rStatus->idTipoProceso==5) {
                                            echo '1';
                                        } 
                                        else {
                                            echo $rStatus->idTipoProceso;
                                        }
                                   ?>
                                </td>





                            </tr>
                    <?php
                            if($hay_estimaciones > 0){
                                echo 'Hay estimaciones';
                                if( $rStatus->Nombre == "11.1 ESTIMACIONES") {
                                    echo 'Nombre';
                                    
                                        
                                     if ($estimaciones_archivo->num_rows() > 0){
                                        echo 'Rows'. $estimaciones_archivo->num_rows();

                                        foreach ($estimaciones_archivo->result() as $estimaciones_a){
                                           echo 'Entra';
                    ?>
        
                                        <tr>
                                            <td id="idborder">
                                              
                                            </td>

                                            <td id="idborder">

                                                <?php  echo "EST." .$estimaciones_a->Numero_Estimacion ." " .$aSubDocumentos[$estimaciones_a->idSubDocumento]; ?>


                                            </td>


                                            </td>
                                            <td id="idborder">
                                               <?php echo $estimaciones_a->noHojas ?>
                                            </td>
                                            <td id="idborder">
                                               <?php  


                                                    if($estimaciones_a->copia==1) {
                                                        echo 'Copia ';
                                                    } 
                                                     if($estimaciones_a->original_recibido==1) {
                                                        echo 'Original ';
                                                    }
                                                    if($estimaciones_a->no_aplica==1) {
                                                        echo 'No Aplica';
                                                    }

                                               ?>
                                            </td>
                                            <td id="idborder">
                                                <?php  if($rStatus->idTipoProceso==1 || $rStatus->idTipoProceso==5) {
                                                        echo '1';
                                                    } 
                                                    else {
                                                        echo $rStatus->idTipoProceso;
                                                    }
                                               ?>
                                            </td>





                                        </tr>
                    <?php
                    
                                    }
                                }
                                    }
                            } 
                    ?>

                    



                    <?php
                          }
                        }
                     }
                     
                    ?>



        </tbody>
     </table>


</body>
</html>



