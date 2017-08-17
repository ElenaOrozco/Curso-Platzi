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
        <link href="<?php echo site_url(); ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery-confirm.css" rel="stylesheet">
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.tableTools.js"></script>              
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.bootstrap.js"></script>   
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script>  
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-confirm.js"></script>     
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>      


        <script>
            
            
            $(function() {

                $('#t_listado').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    
                    deferRender: true,
                    autoWidth: false,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'small sinwarp'},
                        {"targets": [1,2,3,4,5,6], 'className': 'small sinwarp'},
                        //{"targets": [2,3,4,5,10,11,12], 'className': 'small text-center'},
                        //{"targets": [6], 'className': 'text-justify small'},
                        //{"targets": [7], 'className': 'small'},
                        //{"targets": [8,9], 'className': 'sinwarp text-right small'},
                    ],
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros de la _START_ a la _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    "oTableTools": {
                        "aButtons": [
                            {
                                "sExtends": "copy",
                                "sButtonText": "Copiar",
                                "oSelectorOpts": {
                                    filter: "applied",
                                    order: 'current'
                                }
                            },
                            {
                                "sExtends": "xls",
                                "sButtonText": "Exportar a XL",
                                "oSelectorOpts": {
                                    filter: 'applied',
                                    order: 'current'
                                },
                                "sFileName": "listado_registros.xls"
                            },
                        ]
                    }

                });
                
                
                
				
		$('#t_respuesta').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'small sinwarp'},
                        {"targets": [1,2,3,4,5], 'className': 'small sinwarp'},
                        //{"targets": [2,3,4,5,10,11,12], 'className': 'small text-center'},
                        //{"targets": [6], 'className': 'text-justify small'},
                        //{"targets": [7], 'className': 'small'},
                        //{"targets": [8,9], 'className': 'sinwarp text-right small'},
                    ],
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros de la _START_ a la _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    "oTableTools": {
                        "aButtons": [
                            {
                                "sExtends": "copy",
                                "sButtonText": "Copiar",
                                "oSelectorOpts": {
                                    filter: "applied",
                                    order: 'current'
                                }
                            },
                            {
                                "sExtends": "xls",
                                "sButtonText": "Exportar a XL",
                                "oSelectorOpts": {
                                    filter: 'applied',
                                    order: 'current'
                                },
                                "sFileName": "listado_registros.xls"
                            },
                        ]
                    }

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
            
            function marcar_leido(elemento, id){
                
                leido = 0
                if(elemento.checked){
                    leido = 1
                }
                
                $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('observaciones/actualizar_leido_observacion_documento'); ?>/" + id,
                           data: {leido:leido} ,
                           success: function(data) {
                             
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
            .leido{
                width: 25px;
                height: 25px;
            }
            .m-b{
                margin-bottom: 20px;
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
                    <h3 class="m-b">
                        Listado de Observaciones 
                    </h3>
                </div>
            </div>
            
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Ver Respuestas</a></li>
                  <li role="presentation"><a href="#responder" aria-controls="profile" role="tab" data-toggle="tab">Por responder</a></li>
                  
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <!-- Fin Encabezado -->
                        <div class="row clearfix">
                <div class="col-md-12 column">
                    <br>
                    
                    

                    <table class="table table-striped table-hover table-bordered" id="t_listado">
                        <thead>
                            <tr>
                                <th class="col-md-1">
                                    Acción
                                </th>
                                <th class="col-md-3">
                                    Documento
                                </th> 
                                <th class="col-md-3">
                                    Observaciones
                                </th>
                                <th class="col-md-3">
                                    Respuesta
                                </th>
                                <th class="col-md-1">
                                    Orden de Trabajo
                                </th>
                                <th class="col-md-1">
                                    Contrato
                                </th>
                                <th class="col-md-3">
                                    Obra
                                </th>   
                                
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($qHistorial_respuestas)) {
                                
                                if ($qHistorial_respuestas->num_rows() > 0) {
                                   
                                    foreach ($qHistorial_respuestas->result() as $rHistorial_r) {
                                        
                            ?>           
                                        <tr>
                                            <td>
                                                
                                                <div class="checkbox">
                                                    <label>
                                                        <input class="leido" type="checkbox" value="" onchange="marcar_leido(this,<?= $rHistorial_r->id ?>)">
                                                      Visto
                                                    </label>
                                                </div>
                                            </td>  
                                            <td> <?= $aDocumento[$rHistorial_r->idDocumento] ?> </td>
                                               
                                            <td> <?= $rHistorial_r->Motivo ?> </td>
                                            
                                            <td> <?= $rHistorial_r->Respuesta ?> </td>
                                            
                                            <td> <?= $rHistorial_r->OrdenTrabajo ?>  </td>
                                           
                                            <td> <?= $rHistorial_r->Contrato ?> </td>
                                            
                                            <td> <?= $rHistorial_r->obra ?> </td>
                                            
                                            
                                            
                                            
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
                    <div role="tabpanel" class="tab-pane" id="responder">
                        <div class="row clearfix">
                            <div class="col-md-12 column table-responsive">
                                <br>



                                <table class="table table-striped table-hover table-bordered" id="t_respuesta" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1">
                                                Acción
                                            </th>
                                            <th class="col-md-3">
                                                Documento
                                            </th> 
                                            <th class="col-md-3">
                                                Observaciones
                                            </th>
                                            <th class="col-md-1">
                                                Orden de Trabajo
                                            </th>
                                            <th class="col-md-1">
                                                Contrato
                                            </th>
                                            <th class="col-md-3">
                                                Obra
                                            </th>   
                                            



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($qHistorial_por_responder)) {

                                            if ($qHistorial_por_responder->num_rows() > 0) {

                                                foreach ($qHistorial_por_responder->result() as $rHistorial) {

                                        ?>           
                                                    <tr>
                                                        <td>
                                                            <!--a href="<?php //echo site_url('archivo/cambios/' . $rArchivo->id); ?>"   class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a-->
                                                            <a href="#" data-toggle="modal" data-target="#modal-ver-observacion" role="button"  class="btn btn-xs btn-warning" onclick="uf_modificar_observacion(<?php echo $rHistorial->id; ?>)">
                                                                <span class="glyphicon glyphicon-search"></span>
                                                            </a> 
                                                        </td> 
                                                        
                                                        <td> <?= $aDocumento[$rHistorial->idDocumento] ?> </td>

                                                        <td> <?= $rHistorial->Motivo ?> </td>

                                                        <td> <?= $rHistorial->OrdenTrabajo ?>  </td>

                                                        <td> <?= $rHistorial->Contrato ?> </td>

                                                        <td> <?= $rHistorial->obra ?> </td>





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
