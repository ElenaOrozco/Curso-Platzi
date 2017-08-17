<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Editar Archivo</title>
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo site_url("/"); ?>" title="Volver a la página inicial">SIADAR</a>
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
                        Nuevo Archivo
                    </h2>
                </div>
            </div>
            
                    <br>
                    <div class="row">
                        <div class="column col-md-12">
                            <form action="<?= site_url('archivo/new_archivo')?>" method="post" enctype="multipart/form-data" id="forma1" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal">
                                <!--                            Primera Pantalla-->
                                <div class="form-group">
                                    <label for="idUsuario" class="control-label col-sm-3">Creado Por:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$aUsuarios[$this->session->userdata("id")]; ?></p>
                                        <input type="hidden" id="id_user" name="id_user" value="<?= $this->session->userdata("id"); ?>"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="OrdenTrabajo" class="control-label col-sm-3">Orden de Trabajo:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="OrdenTrabajo" name="OrdenTrabajo" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="Contrato" class="control-label col-sm-3">Contrato:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Contrato" name="Contrato" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Obra" class="control-label col-sm-3">Obra:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Obra" name="Obra" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Descripcion" class="control-label col-sm-3">Descripción:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control input-sm" rows="3" id="Descripcion" name="Descripcion"></textarea>
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label for="FechaAlta" class="control-label col-sm-3">Fecha de Alta:</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="FechaAlta" name="FechaAlta" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="FechaIniciaVigencia" class="control-label col-sm-3">Fecha de Vigencia:</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="FechaIniciaVigencia" name="FechaIniciaVigencia" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="idTipo_archivo" class="control-label col-sm-3">Tipo de Archivo:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idTipo_archivo', $Tipos_Arch, '', 'class="form-control input-sm" id="idTipo_archivo" '); ?>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idTamano_normalizado" class="control-label col-sm-3">Tamaño Normalizado:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idTamano_normalizado', $Tam_Norm, '', 'class="form-control input-sm" id="idTamano_normalizado" '); ?>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idTipo_unidad" class="control-label col-sm-3">Tipo de Unidad:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idTipo_unidad', $Tipos_uni, '', 'class="form-control input-sm" id="idTipo_unidad" '); ?>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idTitularidad" class="control-label col-sm-3">Titularidad:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idTitularidad', $Titularidades, '', 'class="form-control input-sm" id="idTitularidad" '); ?>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idDireccion" class="control-label col-sm-3">Direccion:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idDireccion', $Direcciones, '', 'class="form-control input-sm" id="idDireccion" '); ?>          
                                    </div>
                                </div-->
                                <div class="form-group">
                                    <label for="FondodePrograma" class="control-label col-sm-3">Fondo de Programa:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="FondodePrograma" name="FondodePrograma" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Normatividad" class="control-label col-sm-3">Normatividad:</label>
                                    <div class="col-sm-9">
                                        <select id="Normatividad" name="Normatividad" class="form-control">
                                            <option value="FEDERAL">Federal</option>
                                            <option value="ESTATAL">Estatal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Modalidad" class="control-label col-sm-3">Modalidad:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idModalidad', $Modalidades, '', 'class="form-control input-sm" id="idModalidad" '); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Ejercicio:</label>
                                    <div class="col-sm-9">
                                        <?php echo form_dropdown('idEjercicio', $Ejercicios, '', 'class="form-control input-sm" id="Ejercicio" '); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Proyecto" class="control-label col-sm-3">Es Proyecto</label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="Proyecto" name="Proyecto" value="" class="input-sm"  />     
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3"> 
                                        <button class="btn btn-default" type="submit">Guardar</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
        </div>
</body>
</html>