<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
 <style>
            /*
			@page { 
                margin-top: 0mm;
                margin-left: 5mm;
                margin-right: 5mm;
                margin-bottom:5mm;				
                odd-footer-name: html_myFooter1;
                even-footer-name: html_myFooter1;
            }*/
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

            }
            .tabla_label {
                background-color:#861d31;
                color:#FFF;
                vertical-align: text-top;
            }
        </style>
                <style type="text/css">
                <!--
                #idencabezado {
                        background-color: #861d31;
                        border: thin dotted #000;
                        color: #EEE;
                }
                -->
                <!--
                #idencabezado_raya {
                        border: thin dotted #000;
                }
                #id_raya_verticar {
                        border-right-width: thin;
                        border-left-width: thin;
                        border-right-style: dotted;
                        border-left-style: dotted;
                        border-right-color: #001;
                        border-left-color: #001;
                }
                #id_raya_horizontal_top {
                        border-top-width: thin;
                        border-top-style: dotted;
                        border-top-color: #001;
                }

                #idborder {
                        border: thin dotted #000;
                }

                table { 
                    border-spacing: 0px;
                    border-collapse: 0px;
                }



                -->
                </style>



</head>

<body>
<table width="1200" border="0" cellspacing="0">
 <thead>
    <tr>
        <th colspan="3" rowspan="6" align="left"  valign="middle"><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></th>
        <th colspan="3" align="center">GOBIERNO DEL ESTADO DE JALISCO</th>
    </tr>
    <tr>
        <th colspan="3" align="center">SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA</th>
    </tr>
    <tr>
        <th colspan="3" align="center">DIRECCIÓN GENERAL ADMINISTRATIVA</th>
    </tr>
    <tr>
        <th colspan="3" align="center">&nbsp;</th>
    </tr>
    <tr>
        <th colspan="3" align="center">DIRECCIÓN DE RECURSOS MATERIALES</th>
    </tr>
    <tr>
        <th colspan="3" align="center">SOLICITUD INTERNA DE APROVISIONAMIENTO</th>
    </tr>  
  <tr>
    <td width="117" align="center" valign="top" bgcolor="#660000" id="idencabezado">ORDEN DE TRABAJO</td>
    <td width="194" align="center" valign="top" bgcolor="#660000" id="idencabezado">ASIGNACIÓN</td>
    <td colspan="2" align="center" valign="top" bgcolor="#660000" id="idencabezado">RESIDENCIA</td>
    <td width="133" align="center" valign="top" bgcolor="#660000" id="idencabezado">FECHA DE ELABORACIÓN</td>
    <td width="109" align="center" valign="top" bgcolor="#660000" id="idencabezado">FOLIO N</td>
  </tr>  
  <tr>
    <td align="center" id="idencabezado_raya"><?php echo $obra["OrdenTrabajo"] ?></td>
    <td align="center" id="idencabezado_raya"><?php echo $obra["Contrato"] ?></td>
    <td colspan="2" align="center" id="idencabezado_raya"><?php echo $residencias[$obra["idResidencia"]] ?></td>
    <td align="center" id="idencabezado_raya"><?php echo $aprovisionamiento["Fecha"] ?></td>
    <td align="center" id="idencabezado_raya"><?php echo $aprovisionamiento["Folio"] ?></td>
  </tr>  
  <tr>
    <td align="center" id="idencabezado">NOMBRE DE OBRA</td>
    <td colspan="5" align="justify" valign="top" id="idencabezado_raya"><?php echo $obra["Obra"] ?></td>
  </tr>  
  <tr>
    <td align="center" id="idencabezado">LUGAR ENTREGA</td>
    <td colspan="5" align="justify" valign="top" id="idencabezado_raya"><?php echo $aprovisionamiento["DireccionEntrega"] ?></td>
  </tr>
  <tr>
    <td align="center" id="idencabezado" colspan="2">CLAVE PRESUPUESTAL</td>
    <td colspan="4" align="justify" valign="top" id="idencabezado_raya"><?php echo $ClavePresupuestal; ?></td>
  </tr>
     
<?php
    if (!empty($aprovisionamiento['Placas']) && !empty($aprovisionamiento['Marca']) && !empty($aprovisionamiento['Modelo'])){
 ?>
   
     <tr>
        <td   align="left" id="idencabezado">PLACAS:</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['Placas']; ?></td>
        <td  align="left" id="idencabezado">MARCA:</td>
        <td   id="idencabezado_raya"><?= $aprovisionamiento['Marca']; ?></td>
        <td  align="left" id="idencabezado">MODELO:</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['Modelo']; ?></td>
    </tr>
    
     <tr>
        <td  align="left" id="idencabezado">TIPO:</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['Tipo']; ?></td>
        <td  align="left" id="idencabezado">ODMETRO:</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['odometro']; ?></td>
        <td  align="left" id="idencabezado">NÚMERO ECONÓMICO:</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['No_economico']; ?></td>
        
    </tr>
     
      <tr>
        <td  align="left" id="idencabezado">NÚMERO DE SERIE:</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['serie']; ?></td>
        <td  align="left" id="idencabezado">CILINDROS</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['cilindros']; ?></td>
        <td  align="left" id="idencabezado">MOTOR</td>
        <td  id="idencabezado_raya"><?= $aprovisionamiento['no_motor']; ?></td>
        
    </tr>
     
     
<?php } ?> 
     
  <tr>
    <td align="center" valign="top" bgcolor="#660000" id="idencabezado">CANTIDAD</td>
    <td align="center" valign="top" bgcolor="#660000" id="idencabezado">UNIDAD DE MEDIDA</td>
    <td colspan="4" align="center" valign="top" bgcolor="#660000" id="idencabezado">DESCRIPCIÓN DETALLADA DEL BIEN O ARTICULO</td>
  </tr>
</thead> 
  
 <tbody>
  <?php foreach ($qconceptos->result_array() as $conceptos):  ?>
  <tr>
    <td align="center" id="id_raya_verticar" ><?php echo $conceptos["Cantidad"] ?></td>
    <td align="center" id="id_raya_verticar" ><?php echo $conceptos["UnidadMedida"] ?></td>
    <td colspan="4" id="id_raya_verticar" ><?php echo $conceptos["Concepto"] .' - '. $conceptos["Descripcion"] ?></td>
    </tr>
  <?php endforeach ?>
  
 </tbody>
 
 
 <tfoot>
 <tr>
    <td id="id_raya_verticar">&nbsp;</td>
    <td id="id_raya_verticar">&nbsp;</td>
    <td colspan="4" id="id_raya_verticar" >&nbsp;</td>
 </tr>
 <tr>
    <td id="id_raya_verticar">&nbsp;</td>
    <td id="id_raya_verticar">&nbsp;</td>
    <td colspan="4" id="id_raya_verticar" >NOTA: <?php echo $aprovisionamiento["Notas"] ?></td>
 </tr>
 
 
 <tr>
    <td colspan="6" id="id_raya_horizontal_top" >&nbsp;</td>
 </tr>
  
 </tfoot>
 
</table>
</body>
</html>