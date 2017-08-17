<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($title)) echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <?php if (isset($meta)) echo meta($meta); ?>  

        

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
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
                    
                    'aLengthMenu': [[10, 50, 100, 200, -1], [10, 50, 100, 200, "Todo"]],
                    'bDeferRender': true,
                    'bAutoWidth': false,
                    'bScrollCollapse': false,   
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1,2,3], 'className': 'small sinwarp'},
                        //{"targets": [1], 'className': 'small sinwarp'},
                        //{"targets": [2,3,4,5,10,11,12], 'className': 'small text-center'},
                        //{"targets": [6], 'className': 'text-justify small'},
                        //{"targets": [7], 'className': 'small'},
                        //{"targets": [8,9], 'className': 'sinwarp text-right small'},
                    ],
                    'oLanguage': {
                        'sProcessing': '<img src=\"./images/ajax-loader.gif\"/> Procesando...',
                        'sLengthMenu': 'Mostrar _MENU_ archivos',
                        'sZeroRecords': 'Buscando Observaciones Archivos...',
                        'sInfo': 'Mostrando desde _START_ hasta _END_ de _TOTAL_ observaciones',
                        'sInfoEmpty': 'Mostrando desde 0 hasta 0 de 0 observaciones',
                        'sInfoFiltered': '(filtrado de _MAX_ observaciones en total)',
                        'sInfoPostFix': '',
                        'sSearch': 'Buscar:',
                        'sUrl': '',
                        'oPaginate': {
                            'sFirst': '&nbsp;Primero&nbsp;',
                            'sPrevious': '&nbsp;Anterior&nbsp;',
                            'sNext': '&nbsp;Siguiente&nbsp;',
                            'sLast': '&nbsp;&Uacute;ltimo&nbsp;'
                        }
                    }
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
            
            function uf_modificar_observacion(id){
               
                $('#idCatalogo').val(id);
                
                $.ajax({
                    url: "<?php echo site_url('observaciones/datos_observacion_documento') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
			$("#OrdenTrabajo").html(data['OrdenTrabajo']);
                        $("#Contrato").html(data['Contrato']);
                        $("#Obra").html(data['obra']);
                        $("#Motivo").html(data['Motivo']);
                        $("#Respuesta").html(data['Respuesta']);
                        
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
            
            .sinwarp {
                white-space: nowrap;
            }
            .tabla_siop {
                overflow-y: hidden;
                overflow-x: scroll;
                width: 100%;
            }
        </style>
    </head>
    <body>
          <!-- Menu Superior -->
         <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>    
          <div class="container-fluid">
            <!--Fin Nav -->
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <h3>
                        Observaciones de Archivos
                    </h3>
                </div>
            </div>
            <!-- Fin Encabezado -->
            <div class="row clearfix">
                <div class="table-responsive">
                    <br>
                    <div class="col-md-12 column">
                        <!--a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" >
                            <span class="glyphicon glyphicon-plus"></span> Nuevo Archivo
                        </a-->
                    </div>
                    

                    <table class="table table-striped table-hover table-bordered" id="t_listado">
                        <thead>
                            <tr>
                                <!--
                                <th class="col-md-1">
                                    Acción
                                </th>
                                -->
                                <th class="col-md-1">
                                    Orden de Trabajo
                                </th>
                                <th class="col-md-1">
                                    Contrato
                                </th>
                                <th class="col-md-5">
                                    Obra
                                </th>                               
                                <th class="col-md-4">
                                    Observaciones
                                </th>
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($qHistorial)) {
                                
                                if ($qHistorial->num_rows() > 0) {
                                   
                                    foreach ($qHistorial->result() as $rHistorial) {
                                        
                            ?>           
                                        <tr>
                                            <!--
                                            <td>
                                                <!--a href="<?php //echo site_url('archivo/cambios/' . $rArchivo->id); ?>"   class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a-->
                                            <!--    <a href="#" data-toggle="modal" data-target="#modal-ver-observacion" role="button"  class="btn btn-xs btn-warning" onclick="uf_modificar_observacion(<?php echo $rHistorial->id; ?>)">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </a>
                                            </td>  
                                            -->
                                            
                                            <td> <?= $rHistorial->OrdenTrabajo ?>  </td>
                                           
                                            <td> <?= $rHistorial->Contrato ?> </td>
                                            
                                            <td> <?= $rHistorial->obra ?> </td>
                                               
                                            <td> <?= $rHistorial->Motivo ?> </td>
                                            
                                            
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
          
          
          <!-- Modal ver observacion -->
        <div class="modal fade" id="modal-ver-observacion" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Observaciones</h4>
                    </div>
                    <form action="<?php echo site_url("observaciones/actualizar_estado_observacion_documento"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                             <div class="form-group">
                                        <label for="ordenTrabajo" class="col-sm-3 control-label">Orden Trabajo: </label>	
                                        <div class="col-sm-7" name="OrdenTrabajo" id="OrdenTrabajo" style="padding-top: 7px;"> 
                                           
                                         </div>
                            </div>  
                            <div class="form-group">
                                <label for="Contrato" class="col-sm-3 control-label">Contrato: </label>
                                <div class="col-sm-7" name="Contrato" id="Contrato" style="padding-top: 7px;"> 
                                    
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label for="Obra" class="col-sm-3 control-label">Obra: </label>
                                <div class="col-sm-7"  name="Obra" id="Obra" style="padding-top: 7px;"> 
                                   
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="Motivo" class="col-sm-3 control-label">Motivo: </label>
                                <div class="col-sm-7" name="Motivo" id="Motivo" style="padding-top: 7px;"> 
                                      
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="respuesta" class="control-label col-sm-3">Agregar Respuesta</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control col-md-12" id="Respuesta" name="Respuesta" cols="70" rows="5"></textarea>
                                </div>
                            </div>
                            
                            
                            
                            
                                                                     
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="0" class="form-control" >
                            
                            
                            <button type="submit" class="btn btn-success">
                                Marcar como visto y Guardar
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
