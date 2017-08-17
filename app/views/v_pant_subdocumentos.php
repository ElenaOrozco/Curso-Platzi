<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php
            if (isset($title))
                echo $title;
            ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <?php
        if (isset($meta))
            echo meta($meta);
        ?>  
 
        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/responsive.less" type="text/css" /-->
        <!--script src="<?php echo site_url(); ?>js/less-1.3.3.min.js"></script-->
        <!--append '#!watch' to the browser URL, then refresh the page. -->
 
        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/principal.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery.vegas.min.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url(); ?>css/font-awesome.min.css" type="text/css" rel="stylesheet" />
         
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.tableTools.js"></script>              
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.bootstrap.js"></script>              
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.vegas.min.js"></script>
 
        <script type="text/javascript">
            var oTable;
            var sUrl_source_ajax = '<?php echo site_url('gestiona_documentos/listado'); ?>';
             
            $(function() {
                $('a[rel="popover"]').popover();
                $('#Ejercicio').on("change", function() {
                    $('#f_ejercicio').submit();
                });
                $.vegas({
                    src: '<?php echo site_url(); ?>images/fondoESCUDO.png',
                    fade: 2000,
                    valign: 'top', // top, center, bottom or %
                    align: 'right' // left, center, right or %
                });
                 
                 
        oTable = $('#tabla_scroll').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'small sinwarp'},
                        {"targets": [1], 'className': 'small sinwarp'},
                        //{"targets": [2,3,4,5,10,11,12], 'className': 'small text-center'},
                        //{"targets": [6], 'className': 'text-justify small'},
                        //{"targets": [7], 'className': 'small'},
                        //{"targets": [8,9], 'className': 'sinwarp text-right small'},
                    ],
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ direcciones",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando direcciones de la _START_ a la _END_ de un total de _TOTAL_ direcciones",
                        "sInfoEmpty": "Mostrando 0 direcciones",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ direcciones)",
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
                                "sFileName": "listado_direcciones.xls"
                            },
                        ]
                    }
 
                });
                
                
                
                 $('#t_documentos').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'small sinwarp'},
                       
                      
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
          
        function uf_modificar_subdocumento(id) {
 
                $("#idCatalogo").val(id);
                $idSubDocumento_mod = $("#idSubdocumentos_mod").val();
                $.ajax({
                    url: "<?php echo site_url('subdocumentos/datos_subdocumento') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#Nombre_mod").val(data['Nombre']);
                        $("#idDocumento_mod").val(data['idDocumento']);
                        imprimir_documento_mod(data['idDocumento']);
                         
                    }
                });
 
                
            }
        
        function imprimir_documento_mod(id)
            {
                $("#idDocumento_mod").val(id);
                $("#modal-cambiar-documento-mod").modal('hide');
                 
                $.ajax({
                    url: "<?php echo site_url('subdocumentos/datos_documento'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomdocumento_mod").html(data['Nombre']);
                         
                         
                    }
                });
            }
        //Selecionar/Modificar Proceso
        function modificar_documento(id)
            {
                $("#idDocumento").val(id);
                $("#modal-cambiar-documento").modal('hide');
                //$("#modal-modificar-cat").modal('hide');
                 
                $.ajax({
                    url: "<?php echo site_url('subdocumentos/datos_documento'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        //$("#nomdocumento").html(data['Nombre']);
                        //$("#nomdocumento").html('Hola');
                       $("#nomdocumento").html(data['Nombre']);
                    }
                });
            }
 
        
          
          
           
          
          
        </script>
        <style>
            .sinwarp {
                white-space: nowrap;
            }
            container-fluid {
                padding-right: 10px;
                padding-left: 10px;
            }
            .r_obra {
                cursor: pointer;
            }
            .r_contratista {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        
        
          <!-- Menu Superior -->
        <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>
      
         
        <!-- contenidos -->
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                 
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                        <li class="active">SubDocumentos</li>
                    </ol>
                </div>
                 
                <!-- breadcrumb -->
            </div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <h3>
                        <?php //echo $Titulo; ?>
                    </h3>
                </div>
         
                <div class="col-md-12 column">
                    <a href="#modal-agregar-subdocumento" class="btn btn-primary" role="button" data-toggle="modal" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-plus"></span> Nuevo Subdocumento</a>
                </div>
                 
                <div class="col-md-12 column">                    
                    <table class="table table-striped table-bordered table-hover small" id="tabla_scroll">
                        <thead>
                            <tr>
                                <th class="col-md-1">
                                    Acción
                                </th>
                                <th >
                                   Nombre
                                </th>
                                <th >
                                   Nombre  Documento
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                                if (isset($qSubDocumentos)) {
                                                    if ($qSubDocumentos->num_rows() > 0) {
                                                        foreach ($qSubDocumentos->result() as $rSolicitud) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="#" class="btn btn-xs btn-success" title=""  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_subdocumento(<?php echo $rSolicitud->id; ?>)"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                                    <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url('subdocumentos/eliminar_subdocumento/' . $rSolicitud->id); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Nombre; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Nombre_doc; ?>
                                                                </td>
                                                                 
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
         
         
          <!-- Dialogo Nuevo Subdocumento -->
        <div class="modal fade" id="modal-agregar-subdocumento" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Subdocumento - Nuevo</h4>
                    </div>
                    <form action="<?php echo site_url('subdocumentos/agregar_subdocumento'); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                             
                            
                             
                            <div class="form-group">
                                        <label for="nombre" class="col-sm-3 control-label">Nombre del Subdocumento </label>   
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre" id="Nombre" required value="" class="form-control" >
                                         </div>
                            </div>
 
                            <div class="form-group">
                                        <label for="idProceso" class="col-sm-3 control-label">Documento Pertenece</label> 
                                         <div class="col-sm-7"> 
                                             <div class="form-control" id="nomdocumento" style="overflow:hidden; line-height:1.5;"></div>
                                                <!--<input type="hidden" name="idProceso" id="idProceso" required value="0">-->
                                             <input type="hidden" name="idDocumento" id="idDocumento" required value="0">
                                            </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-documento"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
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
 
        <!--Cambiar/Seleccionar Documento -->    
        <div class="modal fade" id="modal-cambiar-documento" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Tipos Documentos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Documentos</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="1200" border="0" cellpadding="1" cellspacing="0" id="t_documentos">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDocumentos->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_documento(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><small><?php echo trim($rowdata->Nombre); ?></small></td>
                                                             
                                                        </tr>
                                                 <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset> 
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!--fin forma-->
            </div>
        </div>
        <!---Fin dialog----> 
          
           
          <!-- Dialogo Modificar Subproc -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Modificar Subdocumento</h4>
                    </div>
                    <form action="<?php echo site_url("subdocumentos/modificar_subdocumento"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                             
                            <div class="form-group">
                                        <label for="nombre_mod" class="col-sm-3 control-label">Nombre </label>   
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre_mod" id="Nombre_mod" required value="" class="form-control" >
                                         </div>
                            </div>
 
                            <div class="form-group">
                                        <label for="idDocumento" class="col-sm-3 control-label">Documento Pertenece</label> 
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomdocumento_mod" name="nomdocumento_mod" style="overflow:hidden; line-height:1.5;"></div>
                                                <!--<input type="hidden" name="idProceso" id="idProceso" required value="0">-->
                                            <input type="hidden" name="idDocumento_mod" id="idDocumento_mod" required value="0">
                                            </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-documento-mod"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
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
 
            <!--Cambiar/Modificar Proceso -->    
        <div class="modal fade" id="modal-cambiar-documento-mod" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Listado de Documentos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Procesos</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDocumentos->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="imprimir_documento_mod(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                            
                                                             
                                                        </tr>
                                                 <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset> 
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!--fin forma-->
            </div>
        </div>
        <!---Fin dialog---->      
         
         
        <div class="modal fade bs-example-modal-sm" id="modal-load" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <img src="./images/ajax-loader.gif" class="img img-responsive center-block" />
                </div>
            </div>
        </div>
    </body>
</html>