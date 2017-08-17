<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($titulo)) echo $titulo; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/responsive.less" type="text/css" /-->
        <!--script src="js/<?php echo site_url(); ?>less-1.3.3.min.js"></script-->
        <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">      
        <link href="<?php echo site_url(); ?>css/fileinput.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap-typeahead.min.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/fileinput.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>

        <script language='JavaScript' type='text/javascript'>
            var _isDirty = false;

            $(document).ready(function() {
                $(':input').change(function() {
                    _isDirty = true;
                });

                $('form').submit(function() {
                    _isDirty = false;
                });

                $(window).bind('beforeunload', function(e) {
                    if (_isDirty) {
                        return "Hay cambios sin guardar, desea salir sin guardar los cambios ?";
                    }
                });

//                var hash = window.location.hash;
//                    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
//
//                    $('.nav-tabs a').click(function (e) {
//                      $(this).tab('show');
//                      var scrollmem = $('body').scrollTop();
//                      window.location.hash = this.hash;
//                      $('html,body').scrollTop(scrollmem);
//                    });

                $('#Sistema').typeahead({
                    ajax: '<?php echo site_url("asistencia/sistemas_text"); ?>'
                });

                $("#foto_1").fileinput({
                    browseLabel: "Seleccionar &hellip;",
                    removeLabel: "Cancelar",
                    uploadLabel: "Cargar",
                    msgLoading: "Cargando",
                    msgProgress: "Cargado {percent}% de {file}",
                    msgSelected: "{n} Imagen actual"
                });

                var hash = window.location.hash;
                hash && $('ul.nav a[href="' + hash + '"]').tab('show');

                $('.nav-tabs a').click(function(e) {
                    $(this).tab('show');
                    var scrollmem = $('body').scrollTop();
                    window.location.hash = this.hash;
                    $('html,body').scrollTop(scrollmem);
                });


            });

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
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo site_url("/"); ?>" title="Volver a la página inicial">SECIP DHD</a>
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
                <div class="column col-md-8">
                    <h2>
                        Reporte <?php echo $aReporte["id"]; ?>
                    </h2>
                </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#Reporte" role="tab" data-toggle="tab">Reporte</a></li>               
                <li><a href="#Pantallas" role="tab" data-toggle="tab">Pantallas</a></li>
                <li><a href="#Avances" role="tab" data-toggle="tab">Avances</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="Reporte">
                    <div class="row">
                        <div class="column col-md-12">
                            <form action="<?php if (isset($accion)) echo $accion; ?>" method="post" enctype="multipart/form-data" id="forma1" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal">
                                <!--                            Primera Pantalla-->
                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="idUsuario" class="control-label col-sm-3">Creado Por:</label>
                                        <div class="col-sm-9">

                                            <p class="form-control-static"><?php echo $aUsuarios[$aReporte['idUsuario']]; ?></p>
                                            <input type="hidden" id="id" name="id" value="<?php echo $aReporte["id"]; ?>"/>                                    

                                        </div>
                                    </div>                                                
                                    <div class="form-group">
                                        <label for="Categoria" class="control-label col-sm-3">Categoria:</label>
                                        <div class="col-sm-9">
                                            <?php echo form_dropdown('Categoria', $aCategorias, $aReporte['Categoria'], 'class="form-control input-sm" id="Categoria" title="Categoria del reporte" readonly'); ?>
                                        </div>
                                    </div>                                                
                                    <div class="form-group">
                                        <label for="Prioridad" class="control-label col-sm-3">Prioridad:</label>
                                        <div class="col-sm-9">
                                            <?php echo form_dropdown('Prioridad', $aPrioridad, $aReporte['Prioridad'], 'class="form-control input-sm" id="Prioridad" title="Nivel de prioridad del reporte" readonly'); ?>
                                        </div>
                                    </div>                                                
                                    <div class="form-group">
                                        <label for="Titulo" class="control-label col-sm-3">Titulo:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="Titulo" name="Titulo" value="<?php echo $aReporte["Titulo"]; ?>" class="form-control input-sm" title="Categoria del reporte" readonly/>          
                                        </div>
                                    </div>                                                
                                    <div class="form-group">
                                        <label for="Descripcion" class="control-label col-sm-3">Descripción:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control input-sm" rows="3" id="Descripcion" name="Descripcion"><?php echo $aReporte["Descripcion"]; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="UsuarioReporta" class="control-label col-sm-3">Usuario Reporta:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="Titulo" name="UsuarioReporta" value="<?php echo $aReporte["UsuarioReporta"]; ?>" class="form-control input-sm" readonly title="Usuario que reporta el evento"/>          
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="idAsignado" class="control-label col-sm-3">Personal Asignado:</label>
                                        <div class="col-sm-9">
                                            <?php echo form_dropdown('idAsignado', $aUsuarios, $aReporte['idAsignado'], 'class="form-control input-sm" id="idAsignado" title="Personal asignado para resolver la falla"'); ?>          
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Sistema" class="control-label col-sm-3">Sistema:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="Sistema" name="Sistema" value="<?php echo $aReporte["Sistema"]; ?>" class="form-control input-sm" title="Sistema que se reporta" autocomplete="off" readonly />                    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="FechaReporte" class="control-label col-sm-3">Fecha del Reporte:</label>
                                        <div class="col-sm-9">
                                            <p class="form-control-static"><?php echo date("d-m-Y", $aReporte['FechaReporte']); ?></p>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="FechaUltimoAvance" class="control-label col-sm-3">Fecha Inicio de Atención:</label>
                                        <div class="col-sm-9">
                                            <p class="form-control-static"><?php if ($aReporte['FechaInicioAtencion'] > 0) echo date("d-m-Y", $aReporte['FechaInicioAtencion']); ?><?php if ($aReporte['FechaInicioAtencion'] > 0) echo " (Tiempo: " . $this->ferfunc->secondsToTime($aReporte['FechaInicioAtencion'] - $aReporte['FechaReporte']) . ")"; ?></p>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="FechaUltimoAvance" class="control-label col-sm-3">Fecha Ultimo Avance:</label>
                                        <div class="col-sm-9">
                                            <p class="form-control-static"><?php if ($aReporte['FechaUltimoAvance'] > 0) echo date("d-m-Y", $aReporte['FechaUltimoAvance']); ?></p>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="FechaTerminacion" class="control-label col-sm-3">Fecha de Terminación:</label>
                                        <div class="col-sm-9">
                                            <p class="form-control-static"><?php if ($aReporte['FechaTerminacion'] > 0) echo date("d-m-Y", $aReporte['FechaTerminacion']); ?> <?php if ($aReporte['FechaTerminacion'] > 0 && $aReporte['FechaInicioAtencion'] > 0) echo " (Tiempo: " . $this->ferfunc->secondsToTime($aReporte['FechaTerminacion'] - $aReporte['FechaInicioAtencion']) . ")"; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Estatus" class="control-label col-sm-3">Estatus:</label>
                                        <div class="col-sm-9">
                                            <p class="form-control-static"><?php echo $aEstatus[$aReporte['Estatus']]; ?></p>                                          
                                        </div>
                                    </div>                           
                                </fieldset>
                            </form>
                                    <div class="col-sm-9 col-sm-offset-3">                                            
                                            <a id="btn-Reabrir" href="#Reabrir" role="button" class="btn btn-default" data-toggle="modal">Reabrir Reporte</a>
                                        </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Pantallas">

                    <div class="row clearfix">
                        <?php
                        $foto = 0;
                        if (isset($qFotos)) {
                            if ($qFotos->num_rows() > 0) {
                                foreach ($qFotos->result() as $rFoto) {
                                    ?>
                                    <div class="column col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading text-right"></div>
                                            <div class="panel-body">
                                                <img alt="Pantalla" src="data:<?php echo $rFoto->Mime; ?>;base64,<?php echo $rFoto->Pantalla; ?>" class="img-rounded img-responsive" />
                                            </div>
                                        </div>
                                    </div> 
                                    <?php
                                    $foto++;
                                    if ($foto == 2) {
                                        $foto = 0;
                                        ?>
                                    </div>
                                    <div class="row clearfix">
                                        <?php
                                    }
                                } // foreach
                            } // if numrows
                        } // if isset
                        ?>
                    </div>

                </div>
                <div class="tab-pane" id="Avances">                    
                    <br>
                    <div class="row clearfix">
                        <?php
                        if (isset($qComentarios)) {
                            if ($qComentarios->num_rows() > 0) {
                                foreach ($qComentarios->result() as $rComentario) {
                                    ?>
                                    <div class="column col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <?php echo date("d-m-Y", $rComentario->fecha); ?> &nbsp;                                                    
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <dl class="dl-horizontal">
                                                    <dt>Técnico:</dt>
                                                    <dd><?php echo $aUsuarios[$rComentario->idUsuario]; ?></dd>
                                                    <dt>Comentario:</dt>
                                                    <dd class="text-justify"><?php echo $rComentario->Comentario; ?></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } // foreach
                            } // if numrows
                        } // if isset
                        ?>
                    </div>

                </div>                
            </div>        




        </div>
    </div>

</div>

<!--            Fin-->
<div class="modal fade" id="Reabrir" role="dialog" aria-labelledby="ReabrirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="ReabrirLabel">
                    Re-abrir reporte
                </h4>
            </div>
            <form role="form" name="comentario1" target="_self" action="<?php echo site_url('asistencia/reabrir_db'); ?>" method="post">
                <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Causa de la reapertura</label>
                        <textarea class="form-control" rows="10" name="Comentario" id="Comentario"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="idHelpDesk" name="idHelpDesk" value="<?php echo $aReporte['id']; ?>">         
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> <button type="submit" class="btn btn-primary">Re-abrir Reporte</button>
                </div>
            </form>
        </div>
    </div>
</div>



</body>
</html>