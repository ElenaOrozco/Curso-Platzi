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
         
        function uf_modificar_cat(id) {

                $("#idCatalogo").val(id);
               
                $.ajax({
                    url: "<?php echo site_url('ubicacionFisica/datos_ubicacion') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
			            $("#Columna_mod").val(data['Columna']);
                                    $("#Fila_mod").val(data['Fila']);
                                    $("#Caja_mod").val(data['Caja']);
                                    $("#Apartado_mod").val(data['Apartado']);
                                    $("#Posicion_mod").val(data['Posicion']);
                        
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
            .custom-select{

                width: 488px;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
                box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
                -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
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
                        <li class="active">Ubicación Fisica</li>
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
                        <a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nueva Ubicación Fisica</a>
                </div>
                
                 <div class="col-md-12 column">
                        <a href="#modal-ubicacion-fisica-excel-catalogo" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span> Nueva Ubicación Fisica desde Excel</a>
                </div>
                
                
                <div class="col-md-12 column">                    
                    <table class="table table-striped table-bordered table-hover small" id="tabla_scroll">
                        <thead>
                            <tr>
                                <th class="col-md-1">
                                    Acción
                                </th>
                                <th >
                                   Columna
                                </th>
                                <th class="col-md-1">
                                   Fila
                                </th>
                                <th class="col-md-1">
                                   Caja
                                </th>
                                <th class="col-md-1">
                                   Apartado
                                </th>
                                <th class="col-md-1">
                                   Posicion
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
                                                                    <a href="#" class="btn btn-success btn-xs" title=""  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_cat(<?php echo $rSolicitud->id; ?>)"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                                    <a class="btn btn-danger btn-xs del_documento" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self" href="<?php echo site_url('ubicacionFisica/eliminar_ubicacion/' . $rSolicitud->id); ?>" ><span class="glyphicon glyphicon-remove" ></span></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Columna; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Fila; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Caja; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Apartado; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Posicion; ?>
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
		
		
          <!-- Dialogo Nueva Ubicacion-->
        <div class="modal fade" id="modal-agregar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Ubicación Fisica - Nueva</h4>
                    </div>
                    <form action="<?php echo site_url("ubicacionFisica/agregar_ubicacion"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="Columna" class="col-sm-3 control-label">Columna </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Columna" id="Columna" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Fila" class="col-sm-3 control-label">Fila </label>	
                                         <div class="col-sm-7"> 
                                            <input type="number" name="Fila" id="Fila" required value="" class="form-control" >
                                         </div>
                            </div>
                             <div class="form-group">
                                        <label for="Posicion" class="col-sm-3 control-label">Posicion </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Posicion" id="Posicion"  value="" class="form-control" >
                                         </div>
                            </div>
                            <div class="form-group">
                                        <label for="Caja" class="col-sm-3 control-label">Caja </label>	
                                         <div class="col-sm-7"> 
                                            <input type="number" name="Caja" id="Caja" required value="" class="form-control" >
                                         </div>
                            </div>
                            <div class="form-group">
                                        <label for="Apartado" class="col-sm-3 control-label">Apartado </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Apartado" id="Apartado"  value="" class="form-control" >
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

 
          
          
        <!-- Dialogo Modificar ubicacion  -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Modificar Ubicación Fisica</h4>
                    </div>
                    <form action="<?php echo site_url("ubicacionFisica/modificar_ubicacion"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                            <div class="form-group">
                                        <label for="Columna_mod" class="col-sm-3 control-label">Columna </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Columna_mod" id="Columna_mod" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Fila_mod" class="col-sm-3 control-label">Fila </label>	
                                         <div class="col-sm-7"> 
                                            <input type="number" name="Fila_mod" id="Fila_mod" required value="" class="form-control" >
                                         </div>
                            </div>
                            
                             <div class="form-group">
                                        <label for="posicion_mod" class="col-sm-3 control-label">Posicion </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Posicion_mod" id="Posicion_mod"  value="" class="form-control" >
                                         </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="Caja_mod" class="col-sm-3 control-label">Caja </label>	
                                         <div class="col-sm-7"> 
                                            <input type="number" name="Caja_mod" id="Caja_mod" required value="" class="form-control" >
                                         </div>
                            </div>
                            <div class="form-group">
                                        <label for="apartado_mod" class="col-sm-3 control-label">Apartado </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Apartado_mod" id="Apartado_mod"  value="" class="form-control" >
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
                    <form action="<?php echo site_url("ubicacionFisica/importa_ubicaciones_base_db"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">                        
                        
                    
                        
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

  
          
         
        
        <div class="modal fade bs-example-modal-sm" id="modal-load" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <img src="./images/ajax-loader.gif" class="img img-responsive center-block" />
                </div>
            </div>
        </div>
    </body>
</html>


