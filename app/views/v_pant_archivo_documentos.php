<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            <?php if (isset($title)) echo $title; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if (isset($meta)) echo meta($meta); ?>

        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/responsive.less" type="text/css" /-->
        <!--script src="<?php echo site_url(); ?>js/less-1.3.3.min.js"></script-->
        <!--append '#!watch' to the browser URL, then refresh the page. -->

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/datatables.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo site_url(); ?>js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url(); ?>img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url(); ?>img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url(); ?>img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url(); ?>img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo site_url(); ?>img/favicon.png">

        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>

        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script>       
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
  
 <script type="text/javascript">
        
        function mostrar_Estim(){
            if(document.getElementById('m_c_estim').style.display === 'block'){
                document.getElementById('m_c_estim').style.display = 'none';
                document.getElementById('Es_Prorroga_id').style.display = 'block';
            }else{
                document.getElementById('m_c_estim').style.display = 'block';
                document.getElementById('Es_Prorroga_id').style.display = 'none';
            }
        }
        function mostrar_Prorr(){
            if(document.getElementById('m_c_prorr').style.display === 'block'){
                document.getElementById('m_c_prorr').style.display = 'none';
                document.getElementById('Es_Estimacion_id').style.display = 'block';
            }else{
                document.getElementById('m_c_prorr').style.display = 'block';
                document.getElementById('Es_Estimacion_id').style.display = 'none';
            }
        }
        
        function nuevo_tipo_anexo(){
            $("#modal-nuevo_tipo_anexo").modal('show');    
        }
        
        function estatus(idArchivoo, idTDd){
                $("#idEstatusE").val('');
                $("#idTitularidadE").val('');
            var parametros = {
                "idArchivoo" : idArchivoo,
                "idTpDocc" : idTDd,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/estatus"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#idEstatusE").val(data['idEstatus']);
                    $("#idTitularidadE").val(data['idTitularidad']);
                }
            });
            
            $("#idTpDocuest").val(idTDd);
            $("#modal-estatus").modal('show');    
        }
        
        function ubicacion_fisica_global(idArchivo){
                $("#ColumnaG").val('');
                $("#FilaG").val('');
                $("#CarpetaG").val('');
                $("#MetadatoG").val('');
            var parametros = {
                "idArchivo" : idArchivo,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/ubicacion_global"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#EstadoG").val(data['Estado']);
                    $("#ColumnaG").val(data['Columna']);
                    $("#FilaG").val(data['Fila']);
                    $("#CarpetaG").val(data['Carpeta']);
                    $("#MetadatoG").val(data['Metadato']);
                }
            });
            
            $("#modal-ubicacion_fisica_global").modal('show');    
        }
        
        function ubicacion_fisica(idArchivo, idTD, idProceso, idSubproceso){
                $("#ColumnaA").val('');
                $("#FilaA").val('');
                $("#CarpetaA").val('');
                $("#MetadatoO").val('');
                
                $("#idProceso_uf").val(idProceso);
                $("#idSubProceso_uf").val(idSubproceso);
                
            var x;
            //alert(idArchivo)
            //alert(idProceso)
            //alert(idSubproceso)
            //alert(idTD)
            var parametros = {
                "idArchivo" : idArchivo,
                "idTpDoc" : idTD,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/ubicacion"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#ColumnaA").val(data['Columna']);
                    $("#FilaA").val(data['Fila']);
                    $("#CarpetaA").val(data['Carpeta']);
                    $("#MetadatoO").val(data['Metadato']);
                }
            });
            
            $("#idTpDocub").val(idTD);
            $("#modal-ubicacion_fisica").modal('show');    
        }
        
        
        function nuevo_doc_anexo(idArchivo,idDocumento,idProceso,idSubProceso){
            $("#idDocumento_anexo").val(idDocumento);
            $("#idArchivo_anexo").val(idArchivo);
            $("#idProceso_anexo").val(idProceso);
            $("#idSubProceso_anexo").val(idSubProceso);
            //addfile_individual();
            $("#modal-nuevo_anexo").modal('show');    
        }
        
        function numeroAleatorio(min, max){
          return Math.round(Math.random() * (max - min) + min);
        }
        
        function addfile_individual(){
            idDoc = numeroAleatorio(1, 1000000);
            var xx = document.createElement("INPUT");
            xx.setAttribute("type", "file");
            xx.setAttribute("name", "docfile[]");
            xx.setAttribute("class", "form-control");
            xx.setAttribute("id", idDoc);
            xx.setAttribute("required", "");
            document.getElementById('crearfile').appendChild(xx);

            var texto = document.createTextNode("Quitar Documento");
            var xxx = document.createElement("BUTTON");
            xxx.setAttribute("type", "button");
            xxx.setAttribute("onclick", "eliminar("+idDoc+")");
            xxx.setAttribute("class", "btn btn-danger");
            xxx.setAttribute("value", "Borrar");
            xxx.setAttribute("title", "Borrar");
            xxx.setAttribute("id", idDoc);
            xxx.appendChild(texto);
            document.getElementById('crearfile').appendChild(xxx);

            var x = document.createElement("br");
            x.setAttribute("id", idDoc);
            document.getElementById('crearfile').appendChild(x);
        }
        function eliminar(nodo_name){
            if(document.getElementById(nodo_name)){
                var x = document.getElementById(nodo_name);
                x.parentNode.removeChild(x);
                eliminar(nodo_name);
            }else{
                //alert("se removio el nodo:"+nodo_name);
            }
        }
      </script>
      
      <body>
        
           <!-- Menu Superior -->
         <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>     
          
                <!-- Contenido Principal -->
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                        <li class="active">Archivo </li>
                    </ol>
                </div>
                <!-- breadcrumb -->
            </div>
            
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-566826">Datos de la Obra</a>
                        </div>
                        <div id="panel-element-566826" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <!-- Panel de Control-->
                                    <div class="col-md-8">
                                        <div class="tab-pane" id="panel-Vales">
                                                
                                            <div class="col-md-12">
                                            <div class="panel panel-danger">
                                            <div class="panel-heading">Datos Generales</div>

                                            <div class="panel-body">
                                            
                                            <dl class="dl-horizontal">
                                            <dt>Orden Trabajo</dt>
                                            <dd><?php echo $aArchivo['OrdenTrabajo'] ?></dd>
                                            <dt>Contrato </dt>
                                            <dd><?php echo $aArchivo['Contrato']; ?></dd>
                                            <dt>Obra</dt>
                                            <dd><<?php echo $aArchivo['Obra']; ?></dd>
                                            
                                            <!--
                                            <dt>
                                           
                                                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-modifcar-solicitud"  ><span class="glyphicon glyphicon-plus"></span>Editar Solicitud</a>
                                                
                                            </dt>
                                            -->
                                            <dd>&nbsp;</dd>
                                            </dl>
											</div>			
                                            </div>
                                            </div>
                                            </div>
                                            
                                        </dl>
                                    </div>
                                    
                                   
                                    
                            </div>
                                
                    </div>
                </div>
                
           </div>
            
  
          
          
          
          
        
        <?php
        if (isset($qProcesos)) {
            if ($qProcesos->num_rows() > 0) {
                foreach ($qProcesos->result() as $rRow) {
                       
                    ?>
                    
           <!-- $idProceso,$idSubProceso,$idDocumento -->
          
           <?php  
                $strin="  ";
               
                if ($rRow->id==$idProceso){
                    $strin=" in ";
                   
                }
                
           ?>
           
        <div class="row clearfix">
                <div class="panel-group" id="panel-proceso-<?php echo $rRow->id;  ?>">
                    <div class="panel panel-primary" style="color:#0073cf;">
                        <div class="panel-heading" > <a class="panel-title" data-toggle="collapse" data-parent="#panel-proceso-<?php echo $rRow->id;  ?>" href="#panel-element-proceso-<?php echo $rRow->id;  ?>"><?php echo $rRow->Nombre;  ?><span style="color:#0073cf;">Text here</span></a> </div>
                        <div id="panel-element-proceso-<?php echo $rRow->id;  ?>" class="panel-collapse collapse <?php  echo $strin; ?>">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                       
                                        
                                        
                                        
                                                <?php
                                                
       $qSubProcesos = $this->ferfunc->get_subreg("saaSubTipoProceso",array("idTipoProceso" => $rRow->id));
                                
                                                
        if (isset($qSubProcesos)) {
            if ($qSubProcesos->num_rows() > 0) {
                foreach ($qSubProcesos->result() as $rRowSubProcesos) {
                       
                    ?>
                    
                <?php  
                $strin_subproceso="  ";
               
                if ($rRowSubProcesos->id==$idSubProceso){
                    $strin_subproceso=" in ";
                    
                }
           
           ?>                     
                                        
                                        
        <?php
        $qDocumentos = $this->ferfunc->get_subreg("saaRel_Archivo_Documento INNER JOIN saaDocumentos ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id",array("saaDocumentos.idSubTipoProceso" => $rRowSubProcesos->id,"saaRel_Archivo_Documento.idArchivo" => $idArchivo),"saaRel_Archivo_Documento.id, saaDocumentos.Nombre");
        if (isset($qDocumentos)) {
            if ($qDocumentos->num_rows() > 0) {
                                        
        ?>                                
       
                <div class="panel-group" id="panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>">
                    <div class="panel panel-success">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>" href="#panel-element-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>"><?php echo $rRowSubProcesos->Nombre;  ?></a> </div>
                        <div id="panel-element-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>" class="panel-collapse collapse <?php echo $strin_subproceso;  ?>">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                      
                                        
                                        
                                        
                                        <?php
                                                
       
                foreach ($qDocumentos->result() as $rRowDocumentos) {
                       
                    ?>
                        
       
                    <?php  
                         $strin_documento="  ";
                        
                         if ($rRowDocumentos->id==$idDocumento){
                             $strin_documento=" in ";
                             
                         }

                    ?>                             
                                        
                <div class="panel-group" id="panel-documentos-<?php echo $rRowDocumentos->id;  ?>">
                    <div class="panel panel-warning">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRowDocumentos->id;  ?>" href="#panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>"><?php echo $rRowDocumentos->Nombre;  ?></a> </div>
                        <div id="panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>" class="panel-collapse collapse <?php echo $strin_documento;  ?>">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                        <section id="<?php echo "section_".$rRowDocumentos->id; ?>">
                                        <table>
                                            <tr>
                                                <td>
                                                 <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?=$idArchivo;?>, <?=$rRowDocumentos->id;?>,<?=$rRow->id;?>,<?=$rRowSubProcesos->id;?>)" type="button" >
                                                                                                                        <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                                                                                                                    </button>&nbsp;
                                                                                                                    
                                                 <button class="btn btn-xs btn-success dropdown-toggle" onclick="ubicacion_fisica(<?=$idArchivo;?>, <?=$rRowDocumentos->id;?>,<?=$rRow->id;?>,<?=$rRowSubProcesos->id;?>)" type="button" >
                                                                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span>Modificar Ubicacion Fisica
                                                                                                                    </button>&nbsp;
                                                                                                                     <button class="btn btn-xs btn-success dropdown-toggle" onclick="estatus(<?=$idArchivo;?>, <?=$rRowDocumentos->id;?>)" type="button" >
                                                                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Estatus
                                                                                                                    </button>                                                                    
                                                                                                                    
                                                                                                                    
                                                </td>                                                                      
                                          <tr>
                                        </table>
                                            
                                            
                                            
                                            
                                        <?php

                                        
                                        //$qEjercicio = $this->ferfunc->get_subreg("Ejercicios",array("id" =>$aArchivo['idEjercicio']));
                                        //$aEjercicio=$qEjercicio->row_array();
                                            
                                            
                                        $tabla="saaDocumentosAnexos_".$aArchivo['idEjercicio'];
                                        
                                         $qEstimaciones = $this->ferfunc->get_subreg_distinct($tabla,"idRel_Archivo_Documento =" . $rRowDocumentos->id, " Numero_Estimacion " );


                                          if (isset($qEstimaciones)) {
                                              if ($qEstimaciones->num_rows() > 0) {
                                                  foreach ($qEstimaciones->result() as $rRowEstimaciones) {

                                         ?>
                                            
                                            
                                        
                                            <?php  
                $strEstimacion_in="  ";
                if ($rRowEstimaciones->Numero_Estimacion==$Numero_Estimacion){
                    $strEstimacion_in=" in ";
                }
                
           ?>
           
        
                <div class="panel-group" id="panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" href="#panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">Est-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?></a> </div>
                        <div id="panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" class="panel-collapse collapse <?php  echo $strEstimacion_in; ?>">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">   
                                                                         
                                            <?php
                                            $qDocumentosAnexos = $this->ferfunc->get_subreg($tabla,array("idRel_Archivo_Documento" => $rRowDocumentos->id,"Numero_Estimacion"=>$rRowEstimaciones->Numero_Estimacion));


                                             if (isset($qDocumentosAnexos)) {
                                                 if ($qDocumentosAnexos->num_rows() > 0) {
                                                     foreach ($qDocumentosAnexos->result() as $rRow_anexos) {

                                                         ?>
                                                         
                                            <table>
                                                <tr>
                                                    
                                                    
                                                    <th>
                                                        Tipo Documento
                                                    </th>
                                                    <th>
                                                        Documento
                                                    </th>
                                                     <th>
                                                        Nombre de Archivo
                                                    </th>
                                                </tr>
                                                
                                                <tr>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <?php
                                                        echo $rRow_anexos->Documento;
                                                        ?>        
                                                    </td>
                                                    
                                                     <td>
                                                        <a href="<?=site_url('archivo/verDoc/'.$rRow_anexos->id.'/'.$aArchivo['idEjercicio'])?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                        <a href="<?=site_url('archivo/descargarDoc/'.$rRow_anexos->id.'/'.$aArchivo['idEjercicio'])?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                        <a href="<?=site_url('archivo/delete_doc_anexo/'.$rRow_anexos->id.'/'.$aArchivo['idEjercicio'])?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php
                                                        echo $rRow_anexos->nombrearchivo;
                                                        ?>        
                                                    </td>
                                                </tr>
                                                </table>

                                              <?php
                                                    }
                                                }
                                            }
                                            ?>   

                                        
                                        
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                                        
                                        
                                        
                                            
                                       <?php
                                                    }
                                                }
                                            }
                                            ?>         
                                            
                                            
                                             
                                    
                                        
                                            
                                        </section>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
           

      <?php
           
    }
    ?>           
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
           
         <?php
            }
    }
    ?>                                     
                                        

      <?php
            }
        }
    }
    ?>           

                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

      <?php
            }
        }
    }
    ?>           
    
   </div>        
           
           
          
   <!-- Ubicacion Fisica -->
    <div class="modal fade" id="modal-ubicacion_fisica" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Ubicacion Fisica:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo_prueba/edit_archivo/4'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idTpDocub" name="idTpDocub" value="" />
                        <input type="hidden" id="idProceso_uf" name="idProceso_uf" value="" />
                        <input type="hidden" id="idSubProceso_uf" name="idSubProceso_uf" value="" />
                        
                        <div class="form-group">
                            <label for="Columna" class="control-label col-sm-4 text-right">Columna:</label>
                            <div class="col-sm-5">
                                <input type="text" id="ColumnaA" name="Columna" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fila" class="control-label col-sm-4 text-right">Fila:</label>
                            <div class="col-sm-5">
                                <input type="text" id="FilaA" name="Fila" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Carpeta" class="control-label col-sm-4 text-right">Carpeta:</label>
                            <div class="col-sm-5">
                                <input type="text" id="CarpetaA" name="Carpeta" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Metadato" class="control-label col-sm-4 text-right">Metadato:</label>
                            <div class="col-sm-5">
                                <input type="text" id="MetadatoO" name="Metadato" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center><br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
        
    <!-- Selecciona los Documentos -->
    <div class="modal fade" id="modal-nuevo_anexo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Selecciona los Documentos:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo_prueba/edit_archivo/3'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idDocumento_anexo" name="idDocumento_anexo" value="" />
                        <input type="hidden" id="idArchivo_anexo" name="idArchivo_anexo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="hidden" id="idEjercicio_anexo" name="idEjercicio_anexo" value="<?=$aArchivo['idEjercicio'];?>" />
                        <input type="hidden" id="idProceso_anexo" name="idProceso_anexo" value="" />
                        <input type="hidden" id="idSubProceso_anexo" name="idSubProceso_anexo" value="" />
                                                
                        <div  class="form-group" ><br>
                            <p><strong>Cargar Documento</strong></p>
                            <div class="col-sm-12 text-center">
                                <input type="file" id="docfile" name="docfile[]" class="form-control" multiple="true" required=""/>
                            </div>
                        </div>
                        
                        <div  class="form-group" ><br>
                            <p><strong>Estimacion</strong></p>
                            <div class="col-sm-12 text-center">
                                <input type="checkbox" name="Es_Estimacion" id="Es_Estimacion_id" onclick="mostrar_Estim()" class="form-control"><br><br>
                                <div id='m_c_estim' style='display:none;'>
                                    
                                    <div class="col-sm-6">
                                        Numero Estimacion
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" id="Numero_Estimacion" name="Numero_Estimacion" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        Tipo Estimacion
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="Documento" name="Documento_est" class="form-control" />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div  class="form-group" ><br>
                            <p><strong>Prorroga</strong></p>
                            <div class="col-sm-12 text-center">
                                <input type="checkbox" name="Es_Prorroga" id="Es_Prorroga_id" onclick="mostrar_Prorr()" class="form-control"><br><br>
                                <div id='m_c_prorr' style='display:none;'>
                                    
                                    <div class="col-sm-6">
                                        Numero Prorroga
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" id="Numero_Estimacion" name="Numero_Prorroga" class="form-control" />
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        Tipo Prorroga
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="Documento" name="Documento_prorr" class="form-control" />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <br><br><br>
                                <center>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
          
          
</body>
</html>