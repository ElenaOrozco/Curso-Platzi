
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
         <!-- Contenidos -->
        <div class="container">
            <div class="col-md-12 column">
                <ol class="breadcrumb">
                    <li><a href="<?php echo $urlanterior; ?>"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</a></li>
                    <li><a href="<?php echo site_url("archivo"); ?>"><span class="glyphicon glyphicon-home"></span> Principal</a></li>
                </ol>
            </div>
            <div class="row clearfix">
                <center>
                    <h3>
                       Detalles del Documento
                    </h3>
                </center>
                <br><br>
                <div class="col-md-12 column">
                    
                        <?php if($extension == '.pdf'){ ?>
                            <center><strong>Vista previa del Documento Anexado</strong></center>
                                <iframe src = "<?= site_url(); ?>js/ViewerJS/#../<?=$carpeta_user; ?>" width='550' height='450' allowfullscreen webkitallowfullscreen></iframe><br>
                            <center>
                                <div class="btn-group">
                                    <a href="<?= site_url('archivo/descargarDoc/'.$idDocDigital.'/'.$idEjercicio); ?>" class="btn btn-primary"  role="button" >Descargar Anexo</a>
                                </div>
                            </center>
                        <?php }else if($extension == '.png' || $extension == '.cad'|| $extension == '.jpg' || $extension == '.gif' || $extension == '.crw' || $extension == '.tiff' ){ ?>
                            <center><strong>Vista previa del Documento</strong>
                                <img src = "<?= site_url(); ?>js/<?=$carpeta_user; ?>" width='550' height='450' allowfullscreen webkitallowfullscreen/><br>
                                <div class="btn-group">
                                    <a href="<?= site_url("archivo/descargarDoc/".$idDocDigital."/".$idEjercicio); ?>" class="btn btn-primary"  role="button" data-toggle="modal">Descargar Anexo</a>
                                </div>
                            </center>
                        <?php }else{ ?>
                            <center><strong>No es posible mostrar el documento</strong>
                                <div class="btn-group">
                                    <a href="<?= site_url("archivo/descargarDoc/".$idDocDigital."/".$idEjercicio); ?>" class="btn btn-primary"  role="button" >Descargar Anexo</a>
                                </div>
                            </center>
                        <?php } ?>
                        <br>
                   
                </div>
            </div>
            <br><br><br><br>
            
        </div>                
        
    </body>
</html>