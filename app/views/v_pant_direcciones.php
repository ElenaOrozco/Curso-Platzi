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
                
            });     
         
        function uf_modificar_cat(id) {

                $("#idCatalogo").val(id);
               
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_direccion') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
			$("#Nombre_mod").val(data['Nombre']);
                        $("#Abreviatura_mod").val(data['Abreviatura']);
                        
                        
                        
                        modificar_direccion_mod(data['id_padre'])
                        
                    }
                });
            } 
         
         
         
          function modificar_direccion(id)
            {
                $("#idDireccion").val(id);
                $("#modal-cambiar-direccion").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_direccion'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomdireccion").html(data['Nombre']);
                       
                    }
                });
            }
            
            
            function modificar_direccion_mod(id)
            {
                $("#idDireccion_mod").val(id);
                $("#modal-cambiar-direccion-mod").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_direccion'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#nomdireccion_mod").html(data['Nombre']);
                        
                        
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
        <?php //include "v_menuDocs.php"; ?>
        
        
        <!-- contenidos -->
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                        <li class="active">Direcciones</li>
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
                        <a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>Nueva Dirección</a>
                </div>
                
                <div class="col-md-12 column">                    
                    <table class="table table-striped table-bordered table-hover small" id="tabla_scroll">
                        <thead>
                            <tr>
                                <th>
                                    Acción
                                </th>
                                <th >
                                   Nombre
                                </th>
                                <th >
                                   Abreviatura
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
                                                                    <a href="#" class="btn btn-default btn-xs" title=""  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_cat(<?php echo $rSolicitud->id; ?>)"><i class="fa fa-file-pdf-o"></i></a>&nbsp;
                                                                    <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url("direcciones_generales/eliminar_cat/" . $rSolicitud->id); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Nombre; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Abreviatura; ?>
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
		
		
          <!-- Dialogo Nueva Partida Presupuesal -->
        <div class="modal fade" id="modal-agregar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Dirección General - Nueva</h4>
                    </div>
                    <form action="<?php echo site_url("direcciones/agregar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="nombre" class="col-sm-3 control-label">Dirección/Coordinación </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre" id="Nombre" required value="" class="form-control" >
                                         </div>
                            </div>  
                            
                             <div class="form-group">
                                        <label for="Abreviatura" class="col-sm-3 control-label">Dirección/Coordinación Abreviatura</label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Abreviatura" id="Abreviatura" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                            
                            <div class="form-group">
                                        <label for="idDireccion" class="col-sm-3 control-label">Dirección Pertenece</label>	
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomdireccion"></div><input type="hidden" name="idDireccion" id="idDireccion" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-direccion"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
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

 
          
          
          <!-- Dialogo Modificar Car -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Moficar Dirección General</h4>
                    </div>
                    <form action="<?php echo site_url("direcciones/modificar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                             <div class="form-group">
                                        <label for="nombre_mod" class="col-sm-3 control-label">Dirección/Coordinación </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre_mod" id="Nombre_mod" required value="" class="form-control" >
                                         </div>
                            </div>  
                            
                             <div class="form-group">
                                        <label for="Abreviatura_mod" class="col-sm-3 control-label">Dirección/Coordinación Abreviatura</label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Abreviatura_mod" id="Abreviatura_mod" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                        <label for="idDireccion_mod" class="col-sm-3 control-label">Dirección Pertenece</label>	
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomdireccion_mod"></div><input type="hidden" name="idDireccion_mod" id="idDireccion_mod" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-direccion-mod"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
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
		
		
        
          
        <!--Cambiar Dirección General -->    
        <div class="modal fade" id="modal-cambiar-direccion" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Direcciones Generales</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Direcciones</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Abreviatura</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDirecciones->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_direccion(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                            <td><?php echo $rowdata->Abreviatura; ?></td>
                                                            
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
          
          
          <!--Cambiar Dirección General -->    
        <div class="modal fade" id="modal-cambiar-direccion-mod" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Direcciones Generales</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Direcciones</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Abreviatura</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDirecciones->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_direccion_mod(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                            <td><?php echo $rowdata->Abreviatura; ?></td>
                                                            
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
       
  
          
        
        
       
        
              
        <!-- Dialogo Obra -->
        <div class="modal fade" id="modal-obra" role="dialog" aria-labelledby="modal-obramyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-obramyModalLabel"> Datos de la Obra</h4>
                    </div>
                    <div class="modal-body">
                        <span id="ficha_obra">Cargando...</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cerrar
                        </button>						
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-sm" id="modal-load" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <img src="./images/ajax-loader.gif" class="img img-responsive center-block" />
                </div>
            </div>
        </div>
    </body>
</html>

