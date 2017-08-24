<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($title)) echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <?php if (isset($meta)) echo meta($meta); ?>  

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/datatables.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/principal.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery.vegas.min.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url(); ?>css/font-awesome.min.css" type="text/css" rel="stylesheet" />
        
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url(); ?>img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url(); ?>img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url(); ?>img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url(); ?>img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo site_url(); ?>img/favicon.png">

        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap.min.js"></script>
         <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.tableTools.js"></script>              
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.bootstrap.js"></script>   
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>        


        <script>
            var ot_listado;
            $(document).ready(function() {

                ot_listado = $('#t_listado').dataTable({
                    'bProcessing': true,
                    //'sScrollY': '400px',                    

                    'sPaginationType': 'bs_normal',
                    'sDom': '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                    'iDisplayLength': 10,
                    'aaSorting': [[1, 'desc']],
                    'aLengthMenu': [[10, 50, 100, 200, -1], [10, 50, 100, 200, "Todo"]],
                    'bDeferRender': true,
                    'bAutoWidth': false,
                    'bScrollCollapse': false,                    
                    'oLanguage': {
                        'sProcessing': '<img src=\"./images/ajax-loader.gif\"/> Procesando...',
                        'sLengthMenu': 'Mostrar _MENU_ archivos',
                        'sZeroRecords': 'Buscando Archivos...',
                        'sInfo': 'Mostrando desde _START_ hasta _END_ de _TOTAL_ archivos',
                        'sInfoEmpty': 'Mostrando desde 0 hasta 0 de 0 archivos',
                        'sInfoFiltered': '(filtrado de _MAX_ archivos en total)',
                        'sInfoPostFix': '',
                        'sSearch': 'Buscar:',
                        'sUrl': '',
                        'oPaginate': {
                            'sFirst': '&nbsp;Primero&nbsp;',
                            'sPrevious': '&nbsp;Anterior&nbsp;',
                            'sNext': '&nbsp;Siguiente&nbsp;',
                            'sLast': '&nbsp;&Uacute;ltimo&nbsp;'
                        }
                    },
                    'aoColumns': [
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                    ],
                });

                $('.datatable').each(function() {
                    var datatable = $(this);
                    // SEARCH - Add the placeholder for Search and Turn this into in-line form control

                    var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                    search_input.attr('placeholder', 'Search');
                    search_input.addClass('form-control input-sm');
                    // LENGTH - Inline-Form control
                    var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                    length_sel.addClass('form-control input-sm');
                    datatable.bind('page', function(e) {
                        window.console && console.log('pagination event:', e); //this event must be fired whenever you paginate
                    });
                    // add responsive hardcode
                });
            });
            
            
            function uf_modificar_cat(id) {

                $("#idCatalogo").val(id);
               
                $.ajax({
                    url: "<?php echo site_url('ubicacion_proyectos/datos_ubicacion') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#Isla_mod").val(data['no_isla']);
                        $("#Columna_mod").val(data['columna']);
                        $("#Fila_mod").val(data['fila']);
                                    
                    }
                });
            }




            

        </script>
        <style>
            body {
                padding-top: 70px; 
                padding-right: 10px;
                padding-left: 10px;
            }
            .navbar-nav.navbar-right:last-child {
                margin-right: 5px;
            }
            .grisecito{
                color: lightgray;
            }
            .center{
                display: flex;
                align-items: center;
            }
            
        </style>
    </head>
    <body>
        <!-- Menu Superior -->
        <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>    
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12 center">
                    <h3>
                        Ubicaciones de Proyectos
                    </h3>
                    
                </div>
                
                <div class="col-md-12 column">
                        <a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nueva Ubicación de Proyecto</a>
                </div>
                
                <div class="col-md-12 column" style="margin-top: 20px">
                        <a href="#modal-ubicacion-fisica-excel-catalogo" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nueva Ubicación Fisica desde Excel</a>
                </div>
                
                 <!-- Dialogo Importa Ubicaciones Físicas Catalogo-->
                <div class="modal fade" id="modal-ubicacion-fisica-excel-catalogo" role="dialog" aria-labelledby="modal-ubicacion-fisica-excel-catalogogomyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    ×
                                </button>
                                <h4 class="modal-titlsamplee" id="modal-presupuesto-excel-catalogoModalLabel"><span id="title_comentario"></span>Importar Catálogo de Ubicaciones Físicas desde Excel</h4>
                            </div>
                            <form action="<?php echo site_url("proyectos/importa_ubicaciones_base_db"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">                        



                                 <div class="modal-body">

                                    <div class="form-group">
                                        <label for="userfile" class="control-label">Seleccionar Archivo:</label>
                                        <input type="file" name="userfile" size="20" class="form-control" required accept=".xls,.xlsx" />
                                        <small>Solo Archivos de Excel</small>
                                    </div>                           


                                </div>   

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Subir Archivo</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Cancelar
                                    </button>                       
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
                <!-- **** FIN *** -->
            </div>
            <!-- Fin Encabezado -->
            
            <!-- Tabla -->
            <div class="row clearfix">
                <div class="col-md-12 column">
                    
                    

                    <table class="table table-responsive table-striped table-hover table-bordered" id="t_listado">
                        <thead>
                            <tr>
                                
                                <th class="col-sd-3 col-md-1">
                                    Acción
                                </th>
                                <th class="col-sd-3 col-md-3">
                                    No Isla
                                </th>
                                <th class="col-sd-3 col-md-4">
                                    Columna
                                </th> 
                                <th class="col-sd-3 col-md-4">
                                    Fila
                                </th>                               
                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($qListado)) {
                                if ($qListado->num_rows() > 0) {
                                    foreach ($qListado->result() as $rListado) {
                                       
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="#" class="btn btn-success btn-xs" title=""  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_cat(<?php echo $rListado->id; ?>)"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                <a class="btn btn-danger btn-xs del_documento" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self" href="<?php echo site_url('ubicacion_proyectos/eliminar_ubicacion/' . $rListado->id); ?>" ><span class="glyphicon glyphicon-remove" ></span></a>
                                            </td>  
                                            <td>
                                                <?= $rListado->no_isla ?>  
                                            </td>
                                            <td>
                                                <?= $rListado->columna ?>
                                            </td>
                                            <td>
                                                <?= $rListado->fila ?>
                                            </td>                               
                                           
                                        </tr>
                                        <?php
                                    } // foreach
                                } // if numrows
                            } // if isset
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
         
        <!-- Dialogo Nueva Ubicacion-->
        <div class="modal fade" id="modal-agregar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Ubicación Fisica Proyecto - Nueva</h4>
                    </div>
                    <form action="<?php echo site_url("ubicacion_proyectos/agregar_ubicacion"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            <div class="form-group">
                                        <label for="Isla" class="col-sm-3 control-label">Isla </label>	
                                        <div class="col-sm-7"> 
                                           <input type="number" name="Isla" id="Isla" min="1" required value="" class="form-control" >
                                        </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Columna" class="col-sm-3 control-label">Columna </label>	
                                        <div class="col-sm-7"> 
                                           <input type="text" name="Columna" id="Columna" required value="" class="form-control" >
                                        </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Fila" class="col-sm-3 control-label">Fila </label>	
                                        <div class="col-sm-7"> 
                                           <input type="number" name="Fila" id="Fila" min="1" required value="" class="form-control" >
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
        </div>  <!-- Dialogo Agregar ubicacion  -->
        
        
         <!-- Dialogo Modificar ubicacion  -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Modificar Ubicación Fisica</h4>
                    </div>
                    <form action="<?php echo site_url("ubicacion_proyectos/modificar_ubicacion"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                        <label for="Columna_mod" class="col-sm-3 control-label">Columna </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Isla_mod" id="Isla_mod" min="1" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Columna_mod" class="col-sm-3 control-label">Columna </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Columna_mod" id="Columna_mod" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Fila_mod" class="col-sm-3 control-label">Fila </label>	
                                         <div class="col-sm-7"> 
                                            <input type="number" name="Fila_mod" id="Fila_mod" min="1" required value="" class="form-control" >
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
         
        
        
   
    
</body>
</html>