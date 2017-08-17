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
                    font-size:9pt;
                }
                table tr,td{
                    vertical-align:top;
                }
                .reducir{
                    font-size:0.9em;
                }
                
                .div-tabla{
                    
                    height: 396px;
                    width: 491px;
                    
                }
            }
            body {
                font-family: Arial, Helvetica, sans-serif;
                 font-size: 10pt;
         
                

            }
            .div-tabla{
                    
                    height: 396px;
                    width: 491px;
                    overflow: hidden;
                    
                }
            .tabla_label {
                background-color:#861d31;
                color:#FFF;
                vertical-align: text-top;
            }


            #idborder {
                border: thin solid #000;
            }

            .encabezado {
                background-color: #04B45F;
                
                color: #FFF;
                text-align: center;
                font-size: 11pt;
                line-height: 11pt;
                font-weight: bold;
                text-align: center;
                width: 100%;
                height: 71px;
            }

            
            .resultado{
                text-transform: uppercase;
                width: 70%;
                font-weight: bold;
                text-align: start;
                font-size: 10pt;
                line-height: 10pt;
                margin-right: 15px;
            }
            .nombre {
                width: 30%;
                text-align: start;
                font-size: 10pt;
                line-height: 10pt;
            }
            
            .bloque_numero{
                
                
                text-align: end;
                font-size: 8pt;
                line-height: 9pt;
            }
            .cuerpo{
                 border: 1px solid #04B45F;
                 height: 420px;
            }
            .row{
                    width: 100%;
                    display: flex;
                    align-content: flex-start;
                    flex-direction: row;
                    
                    margin: 5px 9px;
            }
           
            .titulo{
                padding: 5px 15px;
                font-size: 10pt;
                line-height: 11pt;
                
            }
            .bloque{
                border: 1px solid #000;
                border-radius: 2px;
                width: 40pt;
                height: 9pt;
            }
            .bloque-d-f{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            #fila-obra{
                height: 37px;
                overflow: hidden;
            }
     </style>

</head>
<body>
    
    <div class="div-tabla">
        <div class="encabezado d-f content-center">
            <div class="titulo">SIOP</div>
            <div class="titulo">Centro de Integración Documental</div>
            <div class="titulo">Ing. Felipe Tito Lugo Arias</div>
        </div>
        <div class="cuerpo">
            <?php if (isset($qOrden)) {
                if ($qOrden->num_rows() > 0) {
                    foreach ($qOrden->result() as $rOrden) {

            ?>
                                 
            <div class="row">
                <div class="nombre">
                    Orden de Trabajo:
                </div>
                <div class="resultado">
                    <?php echo $rOrden->OrdenTrabajo ?>
                </div>
            </div>
            
            <div class="row">
                <div class="nombre">
                    Nombre de la Obra:
                </div>
                <div class="resultado fila-obra">
                    <?php echo $rOrden->Obra ?>
                </div>
            </div>
            
            <div class="row">
                <div class="nombre">
                    Contrato:
                </div>
                <div class="resultado">
                    <?php echo $rOrden->Contrato ?>
                </div>
            </div>
            
            
            <div class="row">
                <div class="nombre">
                    Modalidad:
                </div>
                <div class="resultado">
                    <?php echo $rOrden->Modalidad ?>
                </div>
            </div>
            
            <div class="row">
                <div class="nombre">
                    Normatividad:
                </div>
                <div class="resultado">
                    <?php echo $rOrden->Normatividad ?>
                </div>
            </div>
            
            <div class="row">
                <div class="nombre">
                    Supervisor:
                </div>
                <div class="resultado">
                    <?php echo $rOrden->Supervisor ?>
                </div>
            </div>
            
            <div class="row">
                <div class="nombre">
                    Dirección Ejecutora:
                </div>
                <div class="resultado">
                    <?php echo $rOrden->Direccion ?>
                </div>
            </div>
            
            
            <div class="row">
                <div class="nombre">
                    Fecha Inicio Contrato: 
                </div>
                <div class="resultado">
                     <?php echo $rOrden->FechaInicio ?>
                </div>
            </div>
             <div class="row">
                <div class="nombre">
                    Fecha Termino Contrato: 
                </div>
                <div class="resultado">
                     <?php echo $rOrden->FechaTermino ?>
                </div>
            </div>
             <div class="row">
                <div class="nombre">
                    Monto Contratado: 
                </div>
                <div class="resultado">
                     <?php echo $rOrden->ImporteContratado ?>
                </div>
            </div>

             <div class="row">
                <div class="nombre">
                    Monto Ejercido por SIOP: 
                </div>
                <div class="resultado">
                     <?php echo $rOrden->ImporteEjercido ?>
                </div>
            </div>
             <div class="row">
                <div class="nombre">
                    Finiquitada: 
                </div>
                <div class="resultado">
                     <?php if ($rOrden->Finiquitada) echo 'SI'; else echo 'NO'; ?>
                </div>
            </div> 
            <div class="row">
                <div class="nombre">
                    Ubicación de Revisión: 
                </div>
                <div class="resultado">
                    <?php echo $addwUbicaciones[$idUbicacion] ?>
                </div>
            </div>
             <div class="row">
                <div class="nombre">
                    Bloque: 
                </div>
                <div class="resultado">
                    
                    <div class="bloque-d-f">
                            <div class="bloque_numero" align="center">1</div>
                            <div class="bloque"></div>
                            
                            <div class="bloque_numero" align="center">2</div>
                            <div class="bloque"></div>
                            
                            <div class="bloque_numero" align="center">3</div>
                            <div class="bloque"></div>
                            
                            <div class="bloque_numero" align="center">4</div>
                            <div class="bloque"></div>
                        </div>
                                             
                </div>
            
            
            
            
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>


</body>
</html>



