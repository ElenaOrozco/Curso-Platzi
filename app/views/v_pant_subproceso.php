<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$qProcesos

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
         
        function uf_modificar_subproceso(id) {

                $("#idCatalogo").val(id);
                $.ajax({
                    url: "<?php echo site_url('subproceso/datos_subproceso') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $idProceso = $("#Nombre_mod").val(data['Nombre']);
			            $("#Nombre_mod").val(data['Nombre']);
                        $("#idProceso_mod").val(data['idTipoProceso']);
                        $("#txtOrdenar_mod").val(data['Ordenar']);
                        imprimir_proceso_mod(data['idTipoProceso']);

                        
                        
                    }
                });

                

            } 
        //Selecionar/Modificar Proceso
        function modificar_proceso(id)
            {
                $("#idProceso").val(id);
                $("#modal-cambiar-proceso").modal('hide');
                //$("#modal-modificar-cat").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('subproceso/datos_procesos'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                       $("#nomproceso").html(data['Nombre']);
                       
                    }
                });
            }

        function imprimir_proceso_mod(id)
            {
                $("#idProceso_mod").val(id);
                $("#modal-cambiar-proceso-mod").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('subproceso/datos_procesos'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#nomproceso_mod").html(data['Nombre']);
                        
                        
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
                        <li class="active">Sub Procesos</li>
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
                        <a href="#modal-agregar-subproceso" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>  Nuevo Sub Proceso</a>
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
                                <th  >
                                   Tipo Proceso
                                </th>
                                <th class="col-md-1">
                                   Ordenar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                                if (isset($qListado)) {
                                                    if ($qListado->num_rows() > 0) {
                                                        foreach ($qListado->result() as $rSolicitud) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="#" class="btn btn-success btn-xs" title=""  data-toggle="modal" data-target="#modal-modificar-proceso" role="button" onclick="uf_modificar_subproceso(<?php echo $rSolicitud->id; ?>)"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                                    <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url('subproceso/eliminar_subproceso/' . $rSolicitud->id); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Nombre; ?>
                                                                </td>
                                                                <td >
                                                                    <?php  echo $rSolicitud->Proceso; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if( $rSolicitud->Ordenar == 0){
                                                                            echo 'No';
                                                                            } else{
                                                                                echo 'Si';
                                                                            }
                                                                    ; ?>
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
		
		
          <!-- Dialogo Nuevo Subproceso -->
        <div class="modal fade" id="modal-agregar-subproceso" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Subproceso - Nuevo</h4>
                    </div>
                    <form action="<?php echo site_url('subproceso/agregar_subproceso'); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="nombre" class="col-sm-3 control-label">Nombre del Subproceso </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre" id="Nombre" required value="" class="form-control" >
                                         </div>
                            </div>

                            <div class="form-group">
                                        <label for="idproceso" class="col-sm-3 control-label">Proceso Pertenece</label> 
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomproceso"></div>
                                                
                                                <input type="hidden" name="idProceso" id="idProceso" required value="0">
                                            </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-proceso"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            <div class="form-group">
                                <label for="ordenar" class="col-sm-3 control-label">Ordenar </label>
                                <div class="col-sm-7"> 
                                    <select class="form-control custom-select" id="txtOrdenar" name="txtOrdenar">
                                        <option value = "0">
                                           No 
                                        </option>
                                        <option value = "1">
                                            Si
                                        </option>

                                  </select>
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
</div>


        <!--Cambiar/Seleccionar Proceso -->    
        <div class="modal fade" id="modal-cambiar-proceso" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Tipos Procesos</h4>
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
                                                <?php foreach ($qProcesos->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_proceso(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
         
          
          <!-- Dialogo Modificar Car -->
        <div class="modal fade" id="modal-modificar-proceso" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Moficar Subproceso</h4>
                    </div>
                    <form action="<?php echo site_url("subproceso/modificar_subproceso"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                             <div class="form-group">
                                        <label for="nombre_mod" class="col-sm-3 control-label">Nombre </label>  
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre_mod" id="Nombre_mod" required value="" class="form-control" >
                                         </div>
                            </div> 
                            
                            <div class="form-group">
                                        <label for="idDireccion_mod" class="col-sm-3 control-label">Proceso Pertenece</label> 
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomproceso_mod"></div><input type="hidden" name="idProceso_mod" id="idProceso_mod" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-proceso-mod"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="ordenar" class="col-sm-3 control-label">Ordenar </label>
                                <div class="col-sm-7"> 
                                    <select class="form-control custom-select" id="txtOrdenar_mod" name="txtOrdenar_mod">
                                        <option value = "0">
                                           No 
                                        </option>
                                        <option value = "1">
                                            Si
                                        </option>

                                  </select>
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
        <div class="modal fade" id="modal-cambiar-proceso-mod" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Listado de Procesos</h4>
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
                                                <?php foreach ($qProcesos->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="imprimir_proceso_mod(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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

