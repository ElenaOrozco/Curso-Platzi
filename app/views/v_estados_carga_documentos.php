<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Editar Archivo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">      
        <link href="<?php echo site_url(); ?>css/fileinput.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">

        <link href="<?php echo site_url(); ?>js/select2/select2.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>js/select2/select2-bootstrap.css" rel="stylesheet">
       
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url(); ?>img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url(); ?>img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url(); ?>img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url(); ?>img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo site_url(); ?>img/favicon.png">

        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap-typeahead.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/fileinput.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2_locale_es.js"></script>

        <script language='JavaScript' type='text/javascript'>
            var _isDirty = false;
            //var ot_listado;
            $(document).ready(function() {
                
                $("#documentost").select2({
                    placeholder: "Selecciona Documento",
                    ajax: {
                        url: '<?php echo site_url("archivo/documentos_json"); ?>',
                        dataType: 'json',
                        quietMillis: 100,
                        type: 'POST',
                        data: function (term) {
                            return {
                                term: term, //search term
                                id_plantilla: <?=$Id_Plantilla;?> // page size                               
                            };
                        },
                        results: function (data, page) {
                            return { results: data.results };
                        }
                    },
                    initSelection: function(element, callback) {
                        var idInicial = $("#documentost").val();
                        return $.post( '<?php echo site_url("archivo/documentos_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                        }, "json");
                    }
                });
                
                $("#documentost").on("change", function() {
                    var documentont = $("#documentost").val(); 
                    if (documentont!="sindoc"){
                        $("#enviado").val(1); 
                        agregar(documentont);
                    }
                });
                
            });
             
            function agregar(iddoc){
                var y = document.getElementById(iddoc);
                if(!y){
                    var x;
                    var parametros = {
                        "iddoc" : iddoc
                    };
                    $.ajax({
                        data:  parametros,
                        url:   '<?php echo site_url("archivo/returndocdesrip"); ?>',
                        dataType: 'json',
                        quietMillis: 100,
                        type:  'POST',                                
                        success:  function (response) {
                            x = document.createElement("INPUT");
                            x.setAttribute("type", "text");
                            x.setAttribute("value", response);
                            x.setAttribute("readonly", "");
                            x.setAttribute("class", "form-control");
                            x.setAttribute("name", "visual"+iddoc+"");
                            x.setAttribute("id", iddoc);
                            x.setAttribute("onclick", "eliminar("+iddoc+")");
                            document.getElementById('docs').appendChild(x);
                            addfile(iddoc);
                        }
                    });
                }else{
                    alert('Ya fue seleccionado');
                }
            }
                
            function addfile(iddoc){
                var xx = document.createElement("INPUT");
                    xx.setAttribute("type", "file");
                    xx.setAttribute("name", "docfile"+iddoc+"[]");
                    xx.setAttribute("class", "form-control");
                    xx.setAttribute("id", iddoc);
                    xx.setAttribute("required", "");
                    xx.setAttribute("multiple", "true");
                    document.getElementById('docs').appendChild(xx);
                
                var xxx = document.createElement("INPUT");
                    xxx.setAttribute("type", "hidden");
                    xxx.setAttribute("value", iddoc);
                    xxx.setAttribute("class", "form-control");
                    xxx.setAttribute("name", "idsdocs[]");
                    xxx.setAttribute("id", iddoc);
                    document.getElementById('docs').appendChild(xxx);
                        
                var x = document.createElement("br");
                x.setAttribute("id", iddoc);
                document.getElementById('docs').appendChild(x);
            }
                        
        </script>


        <style>
            body { 
                padding-top: 70px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .navbar-nav.navbar-right:last-child {
                margin-right: 5px;
            }
            .thumb {
                max-width: 200px;
                max-height: 100px;
            }
        </style>
    </head>
    <body>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo site_url("/"); ?>" title="Volver a la página inicial">SECIP->SISTEMA DE ADMINISTRACION DE ARCHIVO</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            -->
                        </ul>					
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="<?php echo site_url("sessions/logout"); ?>">Salir</a>
                            </li>						
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
        <div class="container">
            <!-- Inicio -->
            <div class="row">
                <div class="column col-md-12 text-center">
                    <h2>
                        Documentos de Archivo
                    </h2>
                    <br>
                <center>
                    <strong><?=$NomProcesos;?></strong><br>
                    <strong><?=$NomSubProcesos;?></strong><br>
                    <strong><?=$NomDocumento;?></strong><br><br>
                    
                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?=$idTpDoc;?>)" type="button" >
                        <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                    </button>&nbsp;
                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="ubicacion_fisica(<?=$idArchivo;?>, <?=$idTpDoc;?>)" type="button" >
                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span>Modificar Ubicacion Fisica
                    </button>&nbsp;
                     <button class="btn btn-xs btn-success dropdown-toggle" onclick="estatus(<?=$idArchivo;?>, <?=$idTpDoc;?>)" type="button" >
                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Estatus
                    </button>
                </center>
                </div>
            </div>
            
            <section class="contenedor">
                <div class="col-sm-12">
                    <br><br>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover text-center" >
                        <thead>
                            <tr>
                                <td>
                                    <center><strong>Ubicacion Fisica</strong><br>
                                    <?php 
                                        $idRelid = $this->datos_model->verifica_relacion($idArchivo, $idTpDoc);
                                        $Ubicacion = $this->datos_model->getUbicacionFisica($idRelid);
                                        if($Ubicacion){
                                            foreach($Ubicacion->result() as $Ubic){
                                                echo 'Columna: '.$Ubic->Columna;
                                                echo '<br>Fiula: '.$Ubic->Fila;
                                                echo '<br>Carpeta: '.$Ubic->Carpeta;
                                                echo '<br>Metadato: '.$Ubic->Metadato;
                                            }
                                        }else{
                                            echo 'Sin Ubicacion';
                                        }
                                    ?>
                                    </center>
                                </td>
                                <td>
                                    <center><strong>Estatus de Categoria</strong><br>
                                    <?php 
                                        $idRelid = $this->datos_model->verifica_relacion($idArchivo, $idTpDoc);
                                        $Estatus = $this->datos_model->get_estatus_rel_id($idRelid);
                                         if($Estatus){
                                            foreach($Estatus->result() as $Est){
                                                $Estatus2 = $this->datos_model->get_estatus_Est_all($Est->Estatus);
                                                if($Estatus2){
                                                    foreach ($Estatus2->result() as $Est2){
                                                        echo 'Estatus: '.$Est2->Nombre;
                                                        echo '<br>Descripcion: '.$Est2->Descripcion;
                                                    }
                                                }else{
                                                    echo 'Sin Estatus';
                                                }
                                            }
                                        }else{
                                            echo 'Sin Estatus';
                                        }
                                    ?>
                                    </center>
                                    <center><strong>Titularidad</strong><br>
                                    <?php 
                                        $idRelid = $this->datos_model->verifica_relacion($idArchivo, $idTpDoc);
                                        $Releacion = $this->datos_model->get_estatus_rel_id($idRelid);
                                         if($Releacion){
                                            $Rel = $Releacion->row();
                                                $titul = $this->datos_model->get_Titularidad_id($Rel->idTitularidad)->row();
                                                if(isset($titul)){
                                                    echo $titul->Titulo;
                                                }else{
                                                    echo 'Sin Titularidad';
                                                }
                                        }else{
                                            echo 'Sin Titularidad';
                                        }
                                    ?>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <center>Acción</center>
                                </th>
                                <th>
                                    <center>Documento</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                    <?php 
                    list ($docsTps, $Estim, $Prorr)  = $this->datos_model->get_Historia_idtpdoc_new($idArchivo, $idTpDoc, $idEjercicio);
                        if($docsTps->num_rows() > 0){
                            if($Estim){ ?>
                             <tr>
                                <td  colspan="2">
                                        <?php
                                            $NumEstAnt = 0; $NombEstmAnt = ''; $indice_ini = 0; $idDocAdjAnt = 0; $idEjercicioAnt = 0; $Tipos_Estimaciones = array();
                                            foreach($docsTps->result() as $docsTp){
                                                if($indice_ini == 0){
                                                    $NumEstAnt = $docsTp->Numero_Estimacion;
                                                    $NombEstmAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                    $idDocAdjAnt = $docsTp->idDocAdj;
                                                    $idEjercicioAnt = $docsTp->idEjercicio;
                                                    $indice_ini = 1;
                                                }else{
                                                    $NumEstAnt = $docsTp->Numero_Estimacion;
                                                    $NombEstmAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                    $idDocAdjAnt = $docsTp->idDocAdj;
                                                    $idEjercicioAnt = $docsTp->idEjercicio;
                                                }

                                                if($docsTp->Numero_Estimacion != $NumEstAnt){
                                                    if($docsTp->Es_Estimacion == 1){
                                                        $Tipos_Estimaciones[$NumEstAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombEstmAnt;
                                                        $Tipos_Estimaciones[$docsTp->Numero_Estimacion][$docsTp->idDocAdj][$docsTp->idEjercicio][] = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                    }
                                                }else{
                                                    if($docsTp->Es_Estimacion == 1){
                                                        $Tipos_Estimaciones[$NumEstAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombEstmAnt;
                                                    }
                                                }
                                            }

                                         foreach($Tipos_Estimaciones as $NumEstm => $value){  ?>

                                            <h3>Estimaciones: <?='['.$NumEstm.']';?></h3>

                                                <table class="table table-striped table-bordered table-hover text-center">
                                            <?php foreach($value as $IDDocAdj => $value1){ ?>

                                            <?php   foreach($value1 as $idEjercicio => $value2){ ?>            

                                            <?php       foreach($value2 as $PosNomDoc => $NombreArchivo){ ?>

                                                    <tr>
                                                        <td><!--Accion de los archivos-->
                                                            <a href="<?=site_url('archivo/verDoc/'.$IDDocAdj.'/'.$idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                            <a href="<?=site_url('archivo/descargarDoc/'.$IDDocAdj.'/'.$idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                            <a href="<?=site_url('archivo/delete_doc_anexo/'.$IDDocAdj.'/'.$idEjercicio)?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                        </td>
                                                        <td><!--Nombre de los archivos-->
                                                            <?=$NombreArchivo;?>
                                                        </td>
                                                    </tr>

                                            <?php
                                                        }
                                            ?>
                                            <?php   } ?>
                                            <?php } ?>
                                                </table>
                                                
                                        <?php  } ?>
                                </td>
                            </tr>
                        <?php   }else if($Prorr){ ?>
                                    <tr>
                                        <td  colspan="2">
                                        <?php
                                            $NumProrrAnt = 0; $NombProrrAnt = ''; $indice_ini = 0; $idDocAdjAnt = 0; $idEjercicioAnt = 0; $Tipos_Prorrogas = array();
                                            foreach($docsTps->result() as $docsTp){
                                                if($indice_ini == 0){
                                                    $NumProrrAnt = $docsTp->Numero_Prorroga;
                                                    $NombProrrAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                    $idDocAdjAnt = $docsTp->idDocAdj;
                                                    $idEjercicioAnt = $docsTp->idEjercicio;
                                                    $indice_ini = 1;
                                                }else{
                                                    $NumProrrAnt = $docsTp->Numero_Prorroga;
                                                    $NombProrrAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                    $idDocAdjAnt = $docsTp->idDocAdj;
                                                    $idEjercicioAnt = $docsTp->idEjercicio;
                                                }

                                                if($docsTp->Numero_Prorroga != $NumProrrAnt){
                                                    if($docsTp->Es_Prorroga == 1){
                                                        $Tipos_Prorrogas[$NumProrrAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombProrrAnt;
                                                        $Tipos_Prorrogas[$docsTp->Numero_Prorroga][$docsTp->idDocAdj][$docsTp->idEjercicio][] = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                    }
                                                }else{
                                                    if($docsTp->Es_Prorroga == 1){
                                                        $Tipos_Prorrogas[$NumProrrAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombProrrAnt;
                                                    }
                                                }
                                            }

                                            foreach($Tipos_Prorrogas as $NumProrr => $value){  ?>

                                              
                                                <h3>Prorroga: <?='['.$NumProrr.']';?> </h3>
                                                
                                                <table class="table table-striped table-bordered table-hover text-center">

                                                <?php foreach($value as $IDDocAdj => $value1){ ?>

                                                <?php   foreach($value1 as $idEjercicio => $value2){ ?>            

                                                <?php       foreach($value2 as $PosNomDoc => $NombreArchivo){ ?>

                                                    <tr>
                                                        <td><!--Accion de los archivos-->
                                                            <a href="<?= site_url('archivo/verDoc/' .$IDDocAdj. '/' .$idEjercicio) ?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                            <a href="<?= site_url('archivo/descargarDoc/' .$IDDocAdj. '/' .$idEjercicio) ?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                            <a href="<?= site_url('archivo/delete_doc_anexo/' .$IDDocAdj. '/' .$idEjercicio) ?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                        </td>
                                                        <td><!--Nombre de los archivos-->
                                                            <?=$NombreArchivo?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php   } ?>
                                                <?php } ?>
                                                </table>
                                            
                                        <?php   } ?>
                                        </td>
                                    </tr>



                        <?php    
                                }else{
                                    foreach($docsTps->result() as $docsTp){ ?>
                                         <tr>
                                            <td><!--Accion de los archivos-->
                                                <a href="<?=site_url('archivo/verDoc/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                <a href="<?=site_url('archivo/descargarDoc/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                <a href="<?=site_url('archivo/delete_doc_anexo/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            <td><!--Nombre de los archivos-->
                                                <?=$docsTp->nombrearchivo;?>
                                            </td>
                                        </tr>
                        <?php       }
                                }
                        }else{  ?>
                            <tr>
                                <td colspan="2">
                                <center>
                                    Sin Documentos
                                </center>
                                </td>
                            </tr>
                    <?php   }  ?>
                    </tbody>
            </table><br><br>   

         <?php
             ?>
            </div>
        </div>
            </section>
                
    </div>
    
    <!-- Estatus del Documento -->
    <div class="modal fade" id="modal-estatus" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Estatus del Documento:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/5'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idTpDocuest" name="idTpDocuest" value="" />
                        
                        <div class="form-group"><br><br>
                            <div class="col-sm-12">
                                 <div class="col-sm-6">
                                    <label for="Columna" class="control-label text-right">Estatus del Documento:</label>
                                </div>
                                <div class="col-sm-6">
                                    <?=form_dropdown('idEstatus', $Estatus_select, '', 'class="form-control" id="idEstatusE" '); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Columna" class="control-label text-right">Titularidad:</label>
                                </div>
                                <div class="col-sm-6">
                                    <?=form_dropdown('idTitularidad', $Titularidades, '', 'class="form-control" id="idTitularidadE" '); ?>
                                </div>
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
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/4'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idTpDocub" name="idTpDocub" value="" />
                        
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
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/3'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idTpDoc" name="idTpDoc" value="" />
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idEjercicio" name="idEjercicio" value="<?=$idEjercicio;?>" />
                        
                        <!--div class="form-group">
                            <div class="col-sm-12 text-center">
                                <label for="lista" class="control-label" ></label>
                                <button type="button" onclick="addfile_individual()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Mas Documentos</button>
                            </div>
                        </div>
                        <div  class="form-group" ><br><br>
                            <p><strong>Cargar Documento</strong></p>
                            <div class="col-sm-12 text-center">
                                    <p id="crearfile"></p>
                            </div>
                        </div-->
                        
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
 
 <!-- Selecciona el Tipo -->
    <div class="modal fade" id="modal-nuevo_tipo_anexo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Selecciona el Tipo y los Documentos:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/2'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idEjercicio" name="idEjercicio" value="<?=$idEjercicio;?>" />
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="text" id="documentost" name="documentost" class="form-control" value="" /><br><br>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p id="docs"> <br></p>
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
        
        function ubicacion_fisica(idArchivo, idTD){
                $("#ColumnaA").val('');
                $("#FilaA").val('');
                $("#CarpetaA").val('');
                $("#MetadatoO").val('');
            var x;
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
        
        
        function nuevo_doc_anexo(idTD){
            $("#idTpDoc").val(idTD);
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
</body>
</html>
