<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Reporte de Archivo</title>

	 <style>
             @page {
		sheet-size: A2;
		
		/*margin: 10%;	/* % of page-box width for LR, height for TB */
               
		margin-header: 5mm;
		margin-footer: 5mm;
		margin-left: 2cm;
		margin-right: 1cm;
		marks: cross crop;
                
		
            }
            
            @media print {
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size:9px;
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
                 font-size: 9px;

            }
            .tabla_label {
                background-color:#861d31;
                color:#FFF;
                vertical-align: text-top;
            }


            #idborder {
                border: thin solid #000;
                text-align: center;
                padding: 3px;
            }

            #idencabezado {
                background-color: #861d31;
                border: thin solid #000;
                color: #EEE;
              
            .idencabezado_principal {
                background-color: #fff;
                text-align: center;
                color: #000;
                font-size: 14px;
            }

             #idencabezado_raya {
            border: thin dotted #000;
            }
            #idTitulos {
                text-transform: uppercase;
                font-size: 9px;
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
            .m-b-separacion{
                margin-bottom: 40px;
                height: 30px;
            }
            .idTituloAzul{
                color:#006dcc;
                text-align: center;
                padding: 10px;
                font-weight: bold;
                
            }
            #idGris{
                background: #71757d;
                color: #fff;
                text-align: center;
                padding: 3px;
                font-size: 8px;
                 
                 
            }
            .columnaTitle{
                background:#006dcc;
                color: #fff;
                text-align: center;
                text-transform: uppercase;
                padding: 18px;
                
            }
            .verde{
                background: green;
                color: #fff;
                text-align: center;
                font-weight: bold;
                font-size: 15px;
            }
            .rojo{
                text-align: center;
                color: #a92626;
                font-weight: bold;
                
            }
     </style>

</head>
<body>
    <?php $DCP = 14;
                    $DLD = 16;
                    $DIS = 15;
                    $DGJ = 7;
                    $DGOP = 1;
                    $DGIC  =3;
                    $DGGFI  = 12;
            ?>
    <table  width="100%">

        <thead>            
                <tr>
                    <th colspan="3"  rowspan="5"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg') ?>" /></th>
                    <th colspan="9" class="idencabezado_principal">Relación de Obras Ejercicio Fiscal 2017</th>
                    <th colspan="3"></th>

                </tr>
                <tr><th colspan="9" class="idencabezado_principal">Período del Secretario</th><th colspan="3"></th></tr>
                <tr><th colspan="9" class="idencabezado_principal">Montos de mayor a menor</th><th colspan="3"></th></tr>
                <tr><th colspan="9" class="idencabezado_principal"></th></tr>
                <tr><th colspan="9" class="idencabezado_principal"></th></tr>
        </thead>
    
                
         
        <tbody>
        <?php foreach ($retorno as $rRow): ?>
            <tr><th class="m-b-separacion" colspan="15"></th></tr>
            <tr>
                
                <td class="idTituloAzul" colspan="8"><?= $rRow['Ejecutora']; ?></td>
                <td id="idGris">DCP</td>
                <td id="idGris">DLD</td>
                <td id="idGris">DIS</td>
                <td id="idGris">DGJ</td>
                <td id="idGris">DGOP</td>
                <td id="idGris">DGIC</td>
                <td id="idGris">DGGFI</td>
                
                
            </tr>
            
            <tr>
                <td class="columnaTitle">#</td>
                <td class="columnaTitle">OT</td>
                <td class="columnaTitle">Contrato</td>
                <td class="columnaTitle">Obra</td>
                <td class="columnaTitle">Modalidad</td>
                <td class="columnaTitle">Normatividad</td>
                <td class="columnaTitle">Dirección Ejecutora Encargada de la Obra</td>
                <td class="columnaTitle">Monto Contratado</td>
                
                
                <td id="idGris">Entregada</td>
                <td id="idGris">Entregada</td>
                <td id="idGris">Entregada</td>
                <td id="idGris">Entregada</td>
                <td id="idGris">Entregada</td>
                <td id="idGris">Entregada</td>
                <td id="idGris">Entregada</td>
                
                
            </tr>
           
            <?php   $qArchivos = $this->impresiones_model->get_archivos_entregados_ejecutoras($rRow['Ejecutora']); 
                    $i=1;
            ?>
            <?php   foreach ($qArchivos->result() as $rArchivo):?>
                    <tr>



                        <td id="idborder"> <?php echo $i ?> </td>
                        <td id="idborder"> <?= $rArchivo->OrdenTrabajo ?> </td>
                        <td id="idborder"> <?= $rArchivo->Contrato; ?> </td>
                        <td id="idborder"> <?= $rArchivo->Obra ?> </td>
                        <td id="idborder"> <?= $rArchivo->Modalidad ?> </td>
                        <td id="idborder"> <?= $rArchivo->Normatividad ?> </td>
                        <td id="idborder"> <?= $rArchivo->Direccion ?> </td>
                        <td id="idborder"> <?= $rArchivo->ImporteContratado; ?> </td>
                        
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DCP) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DLD) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DIS) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DGJ) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DGOP) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DGIC) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        <?php if ($this->impresiones_model->get_entregados($rArchivo->idArchivo, $DGGFI) ->num_rows() > 0 ) { $clase = 'verde'; $res = '✓';} else {$clase = 'rojo'; $res = 'X';} ?>
                        <td id="idborder" class="<?= $clase ?>"><span class="<?= $clase ?>"><?= $res ?></span></td>
                        
                    </tr>
            <?php $i++; 
            
            ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
                    


        </tbody>
    </table>


</body>
</html>
