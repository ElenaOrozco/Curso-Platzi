<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
#idencabezado {
	background-color: #700;
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
#id_margin-top{
    margin-top: 40px;
    line-height: 20px;
    
}
#id_text-center{
    text-align: center;
}
-->
</style>
</head>

<body>

 <table width="900" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th colspan="3" rowspan="3" ><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></th>
                                <th colspan="4" align="center">GOBIERNO DEL ESTADO DE JALISCO</th>
                            </tr>
                            <tr>
                                <th colspan="4" align="center">SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA</th>
                            </tr>
                        </thead>
 </table>
 <table width="900" id="id_margin-top" border="1" cellspacing="0" cellpadding="0">
     <thead>
                            <tr>
                                
                                <th  id="idencabezado">
                                    Numero
                                </th>
                                <th  id="idencabezado">
                                    Orden de Trabajo
                                </th>
                                <th  id="idencabezado">
                                    Contrato
                                </th>
                                <th  id="idencabezado">
                                    Obra
                                </th>                               
                                
                                <th  id="idencabezado">
                                    Columna
                                </th>
                                <th   id="idencabezado">
                                    Fila
                                </th >
                                <th  id="idencabezado">
                                    Carpeta
                                </th>
                                <th  id="idencabezado">
                                    Metadato
                                </th>
                            </tr>
                        </thead>
                       
  
                        <tbody>
                            <?php $contador=0;
                            
                            ?> 
                            <?php foreach ($datos as $conceptos): 
                            $contador++;
                            
                            ?>

                            <tr id="id_text-center">
                              <td ><?php echo $contador ?></td>
                              <td ><?php echo $conceptos["OrdenTrabajo"] ?></td>
                              <td ><?php echo $conceptos["Contrato"] ?></td>
                              <td ><?php echo $conceptos["Obra"] ?></td>
                              <td ><?php if (!empty($conceptos["Columna"])){ 
                                  echo $conceptos["Columna"];
                              } else {
                                  echo '-';
                                  
                              }
                              ?>
                              </td>
                              <td  id="id_text-center"><?php if (!empty($conceptos["Fila"])){
                                        echo $conceptos["Fila"];
                              }
                              else {
                                  echo '-';
                              }
                              ?>
                            </td>
                              <td  id="id_text-center"><?php if (!empty($conceptos["Carpeta"])){
                                        echo $conceptos["Carpeta"];
                              }
                              else {
                                  echo '-';
                              }
                              ?>
                              </td>
                              <td  id="id_text-center"><?php if (!empty($conceptos["Metadato"])){
                                        echo $conceptos["Metadato"];
                              }
                              else {
                                  echo '-';
                              }
                              ?>
                              </td>
                            </tr>
                            <?php endforeach ?>
                            
                        </tbody>  
                    </table>
</body>
</html> <!--
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
#idencabezado {
	background-color: #700;
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
#id_margin-top{
    margin-top: 40px;
}
--> <!--
</style>
</head>

<body>

 <table width="900" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th colspan="3" rowspan="3" ><img src="<?php echo site_url('images/logo-secretaria-mini.jpg'); ?>" /></th>
                                <th colspan="4" align="center">GOBIERNO DEL ESTADO DE JALISCO</th>
                            </tr>
                            <tr>
                                <th colspan="4" align="center">SECRETARÍA DE INFRAESTRUCTURA Y OBRA PÚBLICA</th>
                            </tr>
                        </thead>
 </table>
 <table width="900" id="id_margin-top">
     <thead>
                            <tr>
                                
                                <th  id="idencabezado">
                                    Numero
                                </th>
                                <th  id="idencabezado">
                                    Orden de Trabajo
                                </th>
                                <th  id="idencabezado">
                                    Contrato
                                </th>
                                <th  id="idencabezado">
                                    Obra
                                </th>                               
                                
                                <th  id="idencabezado">
                                    Columna
                                </th>
                                <th   id="idencabezado">
                                    Fila
                                </th >
                                <th  id="idencabezado">
                                    Carpeta
                                </th>
                                <th  id="idencabezado">
                                    Metadato
                                </th>
                            </tr>
                        </thead>
                       
  
                        <tbody>
                            <?php $contador=0;
                            
                            ?> 
                            <?php foreach ($datos as $conceptos): 
                            $contador++;
                            
                            ?>

                            <tr>
                              <td id="id_raya_verticar" height="26" align="center"><?php echo $contador ?></td>
                              <td align="justify" id="id_raya_verticar" ><?php echo $conceptos["OrdenTrabajo"] ?></td>
                              <td align="center" id="id_raya_verticar"><?php echo $conceptos["Contrato"] ?></td>
                              <td id="id_raya_verticar" align="right"><?php echo $conceptos["Obra"] ?></td>
                              <td align="center" id="id_raya_verticar"><?php echo $conceptos["Columna"] ?></td>
                              <td  align="center" id="id_raya_verticar"><?php echo $conceptos["Fila"] ?></td>
                              <td  align="center" id="id_raya_verticar"><?php echo $conceptos["Carpeta"] ?></td>
                              <td  align="center" id="id_raya_verticar"><?php echo $conceptos["Metadato"] ?></td>
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                                <td id="id_raya_horizontal_top">&nbsp;</td>
                            </tr>
                        </tbody>  
                    </table>
</body>
</html>