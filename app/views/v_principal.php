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
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery.vegas.min.css" type="text/css" rel="stylesheet" />

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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.vegas.min.js"></script>
        <?php if (isset($script)) echo $script; ?>
        <script type="text/javascript">
            $(function() {
                $.vegas({
                    src: '<?php echo site_url(); ?>images/fondoESCUDO.png',
                    fade: 2000,
                    valign: 'top', // top, center, bottom or %
                    align: 'right' // left, center, right or %
                });
                $("#menu").load("<?php echo site_url('catalogos/');?>");
            });
           
        </script>

        <style>
            body { padding-top: 70px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> 
                            <a class="navbar-brand" href="#">SECIP MEMORIAS</a></div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                             	<li>
                                <a href="<?php echo site_url("obras/listado_obras/1"); ?>" title="Ingreso al Sistema Obra Administrativa">Ingreso al Sistema Obra Administrativa</a></li>
                                
                                <li>
                                <a href="<?php echo site_url("cheque"); ?>" title="Acceso Cheques">Cheques</a></li>
                                
                                
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogos</a>
                                    <ul class="dropdown-menu" id="menu">
                                    
                                  </ul>
                                </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                              <li> <a href="<?php echo site_url("sessions/logout"); ?>" onclick="return confirm('¿ Salir del sistema?');"><span class="glyphicon glyphicon-ban-circle"></span> Salir</a> </li>
                            </ul>					
                        </div>
                    </nav>                    
                    <div class="col-md-12 column">									
                        <img src="<?php echo site_url(); ?>images/logo-secretaria.jpg" alt="Logo Secretaria" class="img-responsive center-block" />
                        <br>					
                    </div>
                    <h2 class="text-primary">
                        <?php echo $subtitulo; ?>
                    </h2>

                    <dl class="dl-horizontal">
                        <dt>&nbsp;</dt>
                        <dt>
                          <?php
                    if (isset($qAvisos) && $qAvisos !== FALSE) {
                        if ($qAvisos->num_rows() > 0) {
                            ?>
                        </dt>
                    </dl>
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 column">
                                    <h2 class="text-primary">
                                        Avisos
                                    </h2>
                                </div>
                                <?php foreach ($qAvisos->result() as $rAviso) { ?>
                                    <div class="col-xs-12 col-sm-6 column">
                                        <h3 class="text-info">
                                            <?php echo $rAviso->Titulo; ?></h3>
                                        <h5><small class><?php echo $this->ferfunc->fechacas(date("Y-m-d", strtotime($rAviso->FechaHora))); ?></small>
                                        </h5>
                                        <blockquote class="blockquote-reverse">
                                            <p class="text-justify">
                                                <?php
                                                // detectar si no es párrafo
                                                echo trim($rAviso->Aviso);
                                                ?>
                                            </p>
                                            <?php if (!empty($rAviso->Enlace)) { ?>
                                                <p>
                                                    <a class="btn" href="<?php echo $rAviso->Enlace; ?>"><?php echo $rAviso->EnlaceText; ?> »</a>
                                                </p>
                                            <?php } // si hay Enlace   ?>
                                            <footer>
                                                <?php echo $rAviso->Direccion; ?>                                       
                                            </footer>                                    
                                        </blockquote>
                                    </div>

                                <?php } // foreach   ?>
                            </div>
                            <?php
                        } // if
                    } // if 
                    ?>
                </div>
                <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style="min-height: 28px; important">
                    <div class="navbar-header">
                        &nbsp;
                    </div>
                    <div class="collapse navbar-collapse">
                    </div>
                </nav>
            </div>         
        </div>
    </body>
</html>