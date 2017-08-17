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
<!--        <link href="<?php echo site_url(); ?>css/bootstrap.theme.min.css" rel="stylesheet">-->
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/datatables.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo site_url(); ?>js/html5shiv.js"></script>
        <![endif]-->
        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
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
            <div class="row clearfix">
                <div class="col-md-12 center">
                    <h4 class="col-md-8">
                        Ubicaciones de Archivos
                    </h4>
                    
                </div>
            </div>
            <!-- Fin Encabezado -->
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <br>
                    <div class="col-md-12 column">
                        <!--a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" >
                            <span class="glyphicon glyphicon-plus"></span> Nuevo Archivo
                        </a-->
                    </div>
                    

                    <table class="table table-responsive table-striped table-hover table-bordered" id="t_listado">
                        <thead>
                            <tr>
                                
                                <th class="col-sd-3 col-md-1">
                                    Orden de Trabajo
                                </th>
                                <th class="col-sd-3 col-md-3">
                                    Contrato
                                </th>
                                <th class="col-sd-3 col-md-4">
                                    Obra
                                </th>                               
                                <th class="col-sd-3 col-md-3">
                                    Proceso
                                </th>
                                <th class="col-sd-3 col-md-1">
                                    Ubicación
                                </th> 
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($qListado)) {
                                if ($qListado->num_rows() > 0) {
                                    foreach ($qListado->result() as $rListado) {
                                       
                                        ?>
                                        <tr >
                                            <!--td>
                                                <a href="<?php //echo site_url('archivo/cambios/' . $rArchivo->id); ?>"   class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="<?php //echo site_url('archivo/delete_archivo/' . $rArchivo->id); ?>" title="Eliminar Archivo" onclick="return confirm('¿Confirma Que Quiere Eliminar el Archivo?');" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td-->  
                                            <td>
                                                <?= $rListado->OrdenTrabajo ?>  
                                            </td>
                                            <td>
                                                <?= $rListado->Contrato ?>
                                            </td>
                                            <td>
                                                <?= $rListado->Obra ?>
                                            </td>                               
                                            <td>
                                                <?= $aProcesos[$rListado->idTipoProceso] ?>
                                            </td>
                                            <td>
                                                <?= $rListado->Columna . '.'  . $rListado->Fila . '.' . $rListado->Caja . '.'  . $rListado->Apartado . '.' . $rListado->Posicion ?>
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
         
        
        
   
    
</body>
</html>