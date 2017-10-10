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
        <link href="<?php echo site_url(); ?>css/bootstrapValidator.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/datatables.css" rel="stylesheet">
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrapValidator.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/language/es_CL.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabla-scroll').dataTable( {
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                } );
                
                $("#menu").load("http://10.5.6.117/secip_memorias_fork_dev/catalogos");

                
                
            } );

            function uf_modificar_medida(id) {

                $("#idCatalogo").val(id);
                $.ajax({
                    url: "<?php echo site_url('medidas/datos_medida_get') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#txtUM_mod").val(data['um']);
			$("#txtNombre_mod").val(data['nombre']);
                  
                    }
                });

                

            } 
            
            
           
 
        </script>
        
    </head>

    <body>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                            <a class="navbar-brand" href="<?php echo site_url("/"); ?>">SECIP MEMORIAS</a> <?php echo $this->session->userdata('idDireccion'); ?></div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogos</a>
                                    <ul class="dropdown-menu" id="menu">
                                    
                                  </ul>
                                </li>

                                <li><a href="#" title="Volver a las obras">Unidades de Medida </a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                              <li> <a href="<?php echo site_url("sessions/logout"); ?>" onclick="return confirm('¿ Salir del sistema?');"><span class="glyphicon glyphicon-ban-circle"></span> Salir</a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
           
            <div class="row clearfix margen" style="margin-top: 70px; padding: 0 15px;">
                <div class="col-md-12 column">
                    <h3> Unidades de Medida</h3>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-nuevo-medida" id="nuevo" style="margin-bottom:15px;" >
                        <span class="glyphicon glyphicon-plus"></span> Nueva Unidad
                    </button>
                </div>
                <div class="col-md-12">
                    <!--<div class="table-responsive">-->
                        <table class="table table-striped table-hover table-bordered table-responsive small" id="tabla-scroll">
                            <thead>
                                <tr>
                                    <th class="col-md-1">
                                        Acciones
                                    </th>
                                    <th class="col-md-5">Unidad de Medida</th>
                                    <th class="col-md-6">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($qMedidas)) {
                                        if ($qMedidas->num_rows() > 0) {
                                            foreach ($qMedidas->result() as $rSolicitud) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="btn btn-success btn-xs" title=""  data-toggle="modal" data-target="#modal-modificar-medida" role="button" onclick="uf_modificar_medida(<?php echo $rSolicitud->id; ?>)"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                        <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url('medidas/medida_delete/' . $rSolicitud->id); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                    </td>
                                                    <td>
                                                        <?php echo $rSolicitud->um; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $rSolicitud->nombre; ?>
                                                    </td>
                                                    

                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    <!--</div>-->
                    
                </div>
            </div>
             
            <!-- Dialogo Nuevo medida -->
            <div class="modal fade" id="modal-nuevo-medida" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Unidad de Medida - Nueva</h4>
                        </div>
                        <form action="<?php echo site_url('medidas/medida_insert'); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                            <label for="nombre" class="col-sm-3 control-label">Unidad de Medida </label>	
                                             <div class="col-sm-7"> 
                                                <input type="text" name="txtUM" id="txtUM" required value="" class="form-control" >
                                             </div>
                                </div>


                                <div class="form-group">
                                            <label for="nombre" class="col-sm-3 control-label">Nombre </label>	
                                             <div class="col-sm-7"> 
                                                <input type="text" name="txtNombre" id="txtNombre" required value="" class="form-control" >
                                             </div>
                                </div>

              


                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>						
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Cancelar
                                </button>						
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>
              
            
            
 
            
         
          
            <!-- Dialogo Modificar tipo Pago -->
            <div class="modal fade" id="modal-modificar-medida" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Unidad de Medida - Modificar</h4>
                        </div>
                        <form action="<?php echo site_url("medidas/medida_update"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                            <label for="um_mod" class="col-sm-3 control-label">Unidad de Medida </label>  
                                             <div class="col-sm-7"> 
                                                <input type="text" name="txtUM_mod" id="txtUM_mod" required value="" class="form-control" >
                                             </div>
                                </div> 

                                 <div class="form-group">
                                            <label for="nombre_mod" class="col-sm-3 control-label">Nombre </label>  
                                             <div class="col-sm-7"> 
                                                <input type="text" name="txtNombre_mod" id="txtNombre_mod" required value="" class="form-control" >
                                             </div>
                                </div> 

                    

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="idCatalogo" id="idCatalogo" required value="0" class="form-control" >

                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>                       
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Cancelar
                                </button>                       
                            </div>
                        </form>                    
                    </div>
                </div>
            </div> 
        
            
        </div>    
            
        
        
    </body>
    
    
</html>