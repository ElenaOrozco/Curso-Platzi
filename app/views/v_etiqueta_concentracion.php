<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Etiqueta para Archivo de Recepción</title>

	 <style>
            
            @media print {
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    
                }
                
                
               
                table tr,td{
                    vertical-align:center;
                    
                }
                #div-tabla{
                    
                    height: 310px;
                    width: 440px;
                    
                }
                
            }
            
            
            body {
                font-family: Arial, Helvetica, sans-serif;
                 font-size: 10pt;
         
                

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
                background-color: #691726;
                
                color: #FFF;
                text-align: center;
                font-size: 12pt;
                line-height: 12pt;
                
                text-align: center;
                width: 100%;
            }
            
            #title{
                font-size: 16pt;
                line-height: 18pt;
                
            }

            #idencabezado_raya {
            border: thin solid #000;
            }
            #idresult {
                text-transform: uppercase;
                width: 100%;
                font-weight: bold;
                text-align: start;
                font-size: 11pt;
                line-height: 11pt;
            }
            #idresult2 {
                
                width: 100%;
                
                text-align: start;
                font-size: 11pt;
                line-height: 11pt;
            }
            
            
            #idtable{
                 border: 1px solid #04B45F;
            }
            
     </style>

</head>
<body>
    
		
    <div id="div-tabla">
         <table width="310" height="440" border="0" cellspacing="0" class="idtable" >
                     <tr id="idencabezado" width="100%" heigth="120">
                         <td width="100%" align="center">
                             <table id="idencabezado" width="100%">
                        
                                <tr> <td colspan="2" align="center" id="title"> SIOP </td></tr>
                                <tr> <td colspan="2" align="center">Centro de Integración Documental</td></tr>
                                <tr> <td colspan="2" align="center">Ing. Felipe Tito Lugo Arias</td></tr>
                             </table>
                         </td>
                     </tr>
                     
                    <tr>
                        <td class="" style=" border: 1px solid #691726;">
                            <table id="tabla-secun">
                                <?php if (isset($qListado)) {
                                    if ($qListado->num_rows() > 0) {
                                        foreach ($qListado->result() as $row) {
                                            $length =130;
                                            $strObra= substr($row->Obra, 0, $length);
                                            //Si el texto es mayor que la longitud se agrega puntos suspensivos
                                            if (strlen($row->Obra) > $length)
                                                $strObra .= ' ...';
                                ?>
                                            <tr id="fila">
                                                <td id="idresult2">&nbsp;</td>
                                                <td id="idresult">&nbsp;</td>    
                                            </tr>
                                            <tr id="fila">
                                                <td id="idresult2">
                                                     Código:  
                                                </td>
                                                <td id="idresult">
                                                    <?= $row->clasificador ?>
                                                </td> 
                                            </tr>


                                            <tr id="fila">
                                                <td colspan="2" id="idresult2">
                                                     Nombre de la Obra: 
                                                </td>

                                            </tr>
                                            <tr id="fila">

                                                <td colspan="2" height="80" id="idresult" >
                                                    <?php echo $strObra ?>
                                                </td>
                                            </tr>
                                            <tr id="fila">
                                                <td colspan="2" id="idresult2">
                                                    Fecha Inicio y Fin de Obra: 
                                                </td>

                                            </tr>

                                            <tr colspan="2" id="fila">

                                                <td colspan="2" id="idresult">
                                                    <?php echo date("d/m/Y", strtotime($row->FechaInicio)) . ' al ' . date("d/m/Y", strtotime($row->FechaTermino))?>
                                                </td>
                                            </tr>

                                            <tr id="fila">
                                                <td id="idresult2">
                                                    Bloque: 
                                                </td>
                                                <td id="idresult">
                                                      <?php echo $row->Bloques ?>
                                                </td> 
                                            </tr>

                                            <tr id="fila">
                                                <td id="idresult2"> 
                                                    Folios: 
                                                </td>
                                                <td id="idresult">
                                                      <?php echo $row->Folio_Inicial . ' - ' . $row->Folio_Final ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td id="idresult2">
                                                    Ubicación: 
                                                </td>
                                                <td id="idresult">
                                                      <?php echo $row->Nombre ?>
                                                 </td>
                                            </tr>
                                            <tr id="fila">
                                                <td id="idresult2">&nbsp;</td>
                                                <td id="idresult">&nbsp;</td>    
                                            </tr>

                                            
                                    <?php } }
                                }?>
                                

                            </table>
                         </td>
                    </tr>
                    
                    


                 </table>
    </div>
          


</body>
</html>