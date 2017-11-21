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
            }
            .normal {
               text-transform: uppercase;
            }
            .normal th, .normal td{
              border: 1px  solid  #424242;
              padding:5px;
            }


            .titulo{
                background: #13ADB9;
                color: #FFF;
                padding:2px;
                text-transform: uppercase;
            }
            .upper {
                text-transform: uppercase;
            }
            .p-box{
                display: inline-block;
                width: 20%;
            }
        </style>
    </head>
    <body>

        <table width="100%">
            <tr>
                <td colspan="1" width="200" rowspan="3"><img src="<?php echo site_url('assets/logo-siop-original-verde.png') ?>" width="150px"  height="70" /></td> 
                <td colspan="4"></td> 

            </tr>
            <tr>

                <td colspan="4" ></td> 

            </tr>
            <tr>

                <td colspan="4" ></td> 

            </tr>
            <tr>

                <td colspan="5"  align="center"><span style="vertical-align: bottom; text-align:center; font-weigth:bold; font-size:9pt;">INVENTARIO DE TRANSFERENCIA<span></td>

            </tr>
        </table>





        <table class="normal" width="100%" border="1">

            <thead>

                <tr>
                    <th colspan="1" class="titulo" style="text-align: right;">Direccion General: </th>
                    <th colspan="3" style="text-align: lefth;" class="upper">Obras públicas </th>
                    <th colspan="1" class="titulo" style="text-align: right;">Fecha de Registro:</th>
                    <th colspan="1" style="text-align: lefth;"><?php  $date = date_create($rRow->fecha_registro);
                                                                    $fecha=date_format($date, 'd-m-Y');
                                                                    echo  $fecha; $cabecera['fecha_registro'] ?> </th>
                    <th colspan="1" class="titulo" style="text-align: right;">Folio:</th>
                    <th colspan="2" style="text-align: lefth;"><span style="font-weight: bold;"><?= $cabecera['folio'] ?></span></th>



                </tr>
                <tr>
                    <th colspan="1" class="titulo" style="text-align: right;">Direccion Área: </th>
                    <th colspan="3" style="text-align: lefth;" class="upper"><?= $cabecera['idDireccion'] ?> </th>
                    <th colspan="1" class="titulo" style="text-align: right;">Fecha de Transferencia: </th>
                    <th colspan="1" style="text-align: lefth;"> </th>
                    <th colspan="1" class="titulo" style="text-align: right;">Cajas: </th>
                    <th colspan="2" style="text-align: lefth;"><span><?= $no_cajas ?></span></th>



                </tr>
            </thead>


        </table>

                        <table width="100%" class="normal" border="1">


                            <tbody>

                                <tr>
                                    <td colspan="1" class="titulo" rowspan="2" align="center" >NO</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">CAJA</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">CARPETA</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">DESCRIPCIÓN</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">CLASIFICADOR</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">OT</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">AÑO</td>
                                    <td colspan="1" class="titulo" rowspan="2" align="center">FOJAS</td>
                                    <td colspan="3" class="titulo" align="center">VALOR</td>
                                    <td colspan="3" class="titulo" align="center">DESTINO</td>
                                    <td colspan="2" class="titulo" align="center">OBSERVACIÓN</td>

                                </tr>

                                <tr>
                                    <td colspan="1" class="titulo" align="center">ADM</td>
                                    <td colspan="1" class="titulo" align="center">LEG</td>
                                    <td colspan="1" class="titulo" align="center">CON</td>
                                    <td colspan="1" class="titulo" align="center">BAJ </td>
                                    <td colspan="1" class="titulo" align="center">MUE</td>
                                    <td colspan="1" class="titulo" align="center">HIS</td>
                                    <td colspan="2" class="titulo" align="center">Reservado</td>
                                </tr>
                                <?php  $i = 0; ?>
                                <?php  foreach ($detalles->result() as $row): ?>
                                <?php  $i ++; ?>
                                    <tr>
                                        <td colspan="1"><?= $i ?></td>
                                        <td colspan="1"><?= $row->No_Caja ?></td>
                                        <td colspan="1"><?= $row->No_Carpeta?></td>
                                        <td colspan="1"><?= $row->Obra ?></td>
                                        <td colspan="1"><?= $row->clasificador ?></td>
                                        <td colspan="1"><?= $row->OrdenTrabajo ?></td>
                                        <td colspan="1"><?= $row->idEjercicio ?></td>
                                        <td colspan="1"><?= $row->fojas ?></td>
                                        <td colspan="1"><?php if ($row->adm ==1) { echo "x"; } ?></td>
                                        <td colspan="1"><?php if ($row->leg ==1) { echo "x"; } ?></td>
                                        <td colspan="1"><?php if ($row->con ==1) { echo "x"; } ?></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                        <td colspan="2"><?= $row->observaciones ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                
                                


                            </tbody>
                             

                        </table>

                        <table width="100%">
                                <tr>
                                    <td width="100%" colspan="5" height="80px"></td>
                                </tr>
                                
                                <tr>

                                    <td width="20%" style="border-top: 1px solid #000; font-size:8pt" ></td>
                                    <td  width="20%" > </td>
                                    <td  width="20%" style="border-top: 1px solid #000; font-size:8pt">Gracia Ramirez Ruíz</td>
                                    <td  width="20%"  > </td>
                                    <td  width="20%" style="border-top: 1px solid #000; font-size:8pt"></td>

                                </tr> 
                                <tr>

                                    <td width="20%" style="font-size:8pt" >Responsable Oficina Generadora</td>
                                    <td  width="20%" > </td>
                                    <td  width="20%" style="font-size:8pt">Responsable Archivo Concentración</td>
                                    <td  width="20%"  > </td>
                                    <td  width="20%" style="font-size:8pt">Responsable Área de depósito</td>

                                </tr> 


                        </table>

                    </body>
                </html>
