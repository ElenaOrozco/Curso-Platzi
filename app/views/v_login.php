<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($title)) echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <?php if (isset($meta)) echo meta($meta); ?>  

        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/responsive.less" type="text/css" /-->
        <!--script src="<?php echo site_url(); ?>js/less-1.3.3.min.js"></script-->
        <!--append '#!watch' to the browser URL, then refresh the page. -->

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/bootstrap.theme.min.css" rel="stylesheet">
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
        <?php if (isset($script)) echo $script; ?>
        <style>
            body { padding-top: 70px; }
        </style>

    </head>

    <body>
        <div class="container">            
            <div class="col-md-12 column">									
                <img src="<?php echo site_url(); ?>images/logo-secretaria.jpg" alt="Logo Secretaria" class="img-responsive center-block" />
                <br>					
            </div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="row clearfix">
                        <div class="col-md-6 column">
                            
                            <h1 class="text-primary">
                                SIGA <small>INTRANET</small>
                            </h1>
                            <h3 class="text-primary">
                                Sistema para la Gestión de Archivos
                            </h3>
                            <p class="text-justify">
                                Para uso exclusivo de <abbr title="Secretaría de Infraestructura y Obra Pública del Gobierno del Estado de Jalisco" class="initialism">SIOP</abbr> </p>
                            <blockquote>
                                <p class="text-justify small">
                                    Para acceder a este sistema deberá contar con un usuario y contraseña proporcionado por la Dirección de Informática y Sistemas Organizacionales.
                                </p>
                                <!--
                                <p class="text-justify small">
                                    No. de visitas: &nbsp; <b><?= $LogVisitas["id"] ?></b>&nbsp; desde el 29 de Agosto del 2016.
                                </p>
                                -->
                            </blockquote>
                            
                           
                            
                            
                           
                        </div>
                        <div class="col-md-6 column">
                            <h3>
                                Acceso al sistema
                            </h3>

                            <form role="form" method="post" accept-charset="utf-8" action="<?php echo site_url("sessions/authenticate"); ?>" >
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label><input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña:</label><input type="password" class="form-control" id="pass" name="pass" autocomplete="off" required>

                                </div>
                                <?php if ($error == 1) { ?>
                                    <br>
                                    <div class="alert alert-dismissable alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4>
                                            Alerta!
                                        </h4> <strong>Error de Acceso</strong> <?php echo $this->session->userdata("error_txt"); ?>
                                    </div>
                                    <br>
                                <?php } ?>
                                <button type="submit" class="btn btn-success">Acceso</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($analytics)) echo $analytics; ?>
        
    </body>
</html>