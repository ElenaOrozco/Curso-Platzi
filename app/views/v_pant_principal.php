<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// secuencia revisada
?>
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
        <link href="<?php echo site_url(); ?>css/principal.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/font-awesome.min.css" rel="stylesheet">
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
        
        <script type="text/javascript">
            $(function() {
                $.vegas({
                    src: '<?php echo site_url(); ?>images/fondoESCUDO.png',
                    fade: 2000,
                    valign: 'top', // top, center, bottom or %
                    align: 'right' // left, center, right or %
                });
            });
        </script>

        <style>
            
        </style>
    </head>
    <body>
        <!-- Menu Superior -->
        <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>
      
        
        
        <!--
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#acerca_de">SECIP->SISTEMA DE ADMINISTRACION DE ARCHIVO</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    						
                </ul>					
                <ul class="nav navbar-nav navbar-right small">
                    
		    
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Archivo</a>
                        <ul class="dropdown-menu">
                         <li>
                                <a href="<?php echo site_url("archivo/"); ?>" title="Listado de Archivos">Listado de Archivos</a>
                            </li>
                       
                            
                        </ul>
                    </li>
                   
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogos</a>
                        <ul class="dropdown-menu">
                            

		     <li>
                        <a href="<?php echo site_url("documentos/"); ?>" title="Documentos">Documentos</a>
                    </li>
                    
		    <li>
                        <a href="<?php echo site_url("plantillas/"); ?>" title="Plantillas">Plantillas</a>
                    </li>
                    
                    
                    <li>
                        <a href="<?php echo site_url("control_usuarios/"); ?>" title="Usuarios">Usuarios</a>
                    </li>
                    
                    
                     <li>
                        <a href="<?php echo site_url("procesos/"); ?>" title="Procesos">Procesos</a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url("subproceso/"); ?>" title="Sub Procesos">Sub Procesos</a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url("titularidad/"); ?>" title="Sub Procesos">Titularidad</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url("modalidad/"); ?>" title="Sub Procesos">Modalidades</a>
                    </li>
                    
                    
                        </ul>
                    </li>
                      
                      
                     
                    
                    
                     
                      <li>
                        <a href="<?php echo site_url("sessions/logout"); ?>"><span class="glyphicon glyphicon-ban-circle"></span> Salir</a>
                    </li>						
                </ul>
            </div>
        </nav>
        -->
        <!-- Barra Inferior -->
        
        <!--
        <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style="min-height: 28px !important; ">
            <div class="navbar-header">
                &nbsp;
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <p class="navbar-text">Usuario: <?php echo $usuario; ?></p>                
                </ul>
            </div>
        </nav>
        
        -->
        
        <!-- breadcrumb -->
        <div class="container-fluid">
            <div class="row clearfix">                
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li class="active">Principal</li>
                        
                    </ol>
                </div>
                <!-- breadcrumb -->
            </div>
        </div>
        <!-- breadcrumb -->
        <div class="container">
            <div class="row clearfix">                
                <div class="col-md-12 column">                    
                    <div class="col-md-12 column">									
                        <img src="<?php echo site_url(); ?>images/logo-secretaria.jpg" alt="Logo Secretaria" class="img-responsive center-block" />
                        <br>					
                    </div>  

                    PRIMER COMMIT EJEMPLO                  
                    <?php
                    if (isset($qAvisos) && $qAvisos !== FALSE) {
                        if ($qAvisos->num_rows() > 0) {
                            ?>
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
            </div> 
            
                <!-- Dialogo cambiar-ejercicio -->
        <div class="modal fade" id="modal-cambiar-ejercicio" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Cambiar Ejercicio</h4>
                    </div>
                    <form action="<?php echo site_url("principal/cambiar_ejercicio"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="ejercicio" class="col-sm-3 control-label">Ejercicio</label>	
                                         <div class="col-sm-2"> 
                                            <input type="text" name="ejercicio" id="ejercicio" required value="<?php echo $ejercicio; ?>" class="form-control" >
                                         </div>
                                      
                            </div>  
                            
                                                                                       
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="0" class="form-control" >
                            <button type="submit" class="btn btn-success">
                                Aceptar
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 	
            
        
                
                
                <!-- Dialogo viajes-oficiales -->
        <div class="modal fade" id="modal-viajes-oficiales" role="dialog" aria-labelledby="modal-viajes-oficiales_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Viajes Oficiales</h4>
                    </div>
                    <form action="<?php echo site_url("impresion/reporte_viajes_oficiales"); ?>" method="post" name="forma1" target="_blank" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="mes" class="col-sm-3 control-label">Mes</label>	
                                         <div class="col-sm-2"> 
                                             <input type="number" name="mes" id="mes" required value="1" class="form-control" >
                                         </div>
                                      
                            </div>  
                            
                                                                                       
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="0" class="form-control" >
                            <button type="submit" class="btn btn-success">
                                Aceptar
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 	
                    
        
                
                <!-- Dialogo viajes-oficiales -->
        <div class="modal fade" id="modal-placas-vehiculos" role="dialog" aria-labelledby="modal-viajes-oficiales_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Reporte por Vehiculo</h4>
                    </div>
                    <form action="<?php echo site_url("impresion/saldo_placa_vehiculo"); ?>" method="post" name="forma1" target="_blank" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="placas" class="col-sm-3 control-label">Placas</label>	
                                         <div class="col-sm-2"> 
                                             <input type="text" name="placas" id="placas" required value="JS02796" class="form-control" >
                                         </div>
                                      
                            </div>  
                            
                                                                                       
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="0" class="form-control" >
                            <button type="submit" class="btn btn-success">
                                Aceptar
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 	
                            
                
                
          <!-- Dialogo Filtrar Orden Compra por Fecha -->
        <div class="modal fade" id="modal-reporte-ordencompra" role="dialog" aria-labelledby="modal-reporte-ordencompra_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-reporte-ordencompramyModalLabel">Generar el Listado de Orden de Compra</h4>
                    </div>
                    <form action="<?php echo site_url("impresion/listado_ordenes_compra_por_periodo/0"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            <?php 
                             
                              $aOrdenCompraSelect = array();
                              $aOrdenCompraSelect['TODAS'] = "TODAS"; 
                              $aOrdenCompraSelect['AD']='AD';
                              $aOrdenCompraSelect['VH']='VH';
                              $aOrdenCompraSelect['SEA']='SEA';
                             
                             
                             ?>   
                            
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Seleccione tipo Orden Compra:</label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('FiltroOrdenCompra', $aOrdenCompraSelect, '' , ' class="form-control" id="FiltroOrdenCompra"'); ?>
                                </div>
                            </div>
                            
                            
                             <div class="form-group">
                                <label for="FechaDesde" class="col-sm-3 control-label">Fecha Desde:</label>
                                <div class="col-sm-3">
                                    <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="date" name="FechaDesde" id="FechaDesde" class="form-control" value="<?php echo date('Y-m-d'); ?>" required/>
                                    
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="form-group">
                                <label for="FechaHasta" class="col-sm-3 control-label">Fecha Hasta:</label>
                                <div class="col-sm-3">
                                    <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="date" name="FechaHasta" id="FechaHasta" class="form-control" value="<?php echo date('Y-m-d'); ?>" required/>
                                    
                                    </div>
                                </div>
                            </div> 
                            
                                                                                       
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-success">
                                Generar
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 
                
    </body>
</html>