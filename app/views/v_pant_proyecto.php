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
            
            
            $("#orden_trabajo").select2({
                    placeholder: "Asignar OT",
                    ajax: {
                        url: '<?php echo site_url("proyectos/ot_json"); ?>',
                        dataType: 'json',
                        quietMillis: 100,
                        type: 'POST',
                        data: function (term, page) {
                            return {
                                term: term, //search term
                                page_limit: 100 // page size                               
                            };
                        },
                        results: function (data, page) {
                            return { results: data.results };
                        }
                    },
                    initSelection: function(element, callback) {
                        var idInicial = $("#orden_trabajo").val();
                        return $.post( '<?php echo site_url("proyectos/ot_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                        }, "json");
                    }
                });                  
                  
                //$("#orden_trabajo").on("change", function() {
                   // var remitente = $("#orden_trabajo").val(); 
                    //if (remitente=="newremit"){
                        //mostrar_ot();
                   // }else{
                       // ocultar_ot();
                   // }
                    
                //});
                
                
               
                
            });
            
            function mostrar_ot(){
                document.getElementById('view_ot').style.display = 'block';
            }
            function ocultar_ot(){
                document.getElementById('view_ot').style.display = 'none';
            }
            
            function asignar_ubicacion(){
                
            
                $.ajax({
                    data:  {
                        "idArchivo" : $("#orden_trabajo").val(),
                        "carpeta" : $("#carpeta").val(),
                        "cm" : $("#cm").val()
                    
                    },
                    url:   '<?php echo site_url("proyectos/asignar_ubicacion"); ?>',
                    dataType: 'json',
                    quietMillis: 100,
                    type:  'POST',
                    success:  function (data) {
                        //alert(data)
                       
                        $("#str_ubicacion").val(data["Isla"] + "." + data["Columna"] + "." + data["Fila"] + "." + data["numero"])
                        $("#ubicacion_dinamica").css("display", "block");
                        
                        
                    }
                });
               
            }
           
            
           
           

        </script>
        <style>
            body {
                padding-top: 50px; 
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
            .end{
                text-align: end;
                align-content: end;
            }
            .m-b{
                margin-bottom: 10px;
            }
            
        </style>
    </head>
    <body>
        <!-- Menu Superior -->
        <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?> 
        <div class="container-fluid">
            <div class="row clearfix">                
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                            <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                            <li class="active">Listado de Archivos</li>
                     </ol>
                </div>
                <!-- breadcrumb -->
            </div>
        </div>
        
        <div class="container-fluid">
            
            <div class="row clearfix">
                
                <div class="col-md-12 m-b">
                    <div class="col-md-8 col-md-offset-2"> 
                        <h3>
                        <center>Ubicaciones de Proyectos</center>
                        </h3> 
                    </div>
                    
                </div>
                
                
               
            </div>
            <!-- Fin Encabezado -->
            
            <div class="row clearfix">
                <div class="col-md-8 col-md-offset-2">
                    <br>
                    <div class="col-md-12 column">
                        <a href="#modal-agregar-cat" class="btn btn-success" role="button" data-toggle="modal" >
                            <span class="glyphicon glyphicon-plus"></span> Asignar Proyecto
                        </a>
                    </div>
                    
                    <div id="filtro-tabla" style="display:none"></div>
                    
                   <div id="tabla-principal">
                        <table class="table table-responsive table-striped table-hover table-bordered" id="t_listado">
                            <thead>
                                <tr>
                                    <th class="col-md-1">
                                        Acción
                                    </th>
                                    <th class="col-md-2">
                                        Orden de Trabajo
                                    </th>
                                    <th class="col-md-2">
                                        Contrato
                                    </th>
                                    <th class="col-md-2">
                                        Obra
                                    </th>                               
                                    <th class="col-md-2">
                                        Descripcion
                                    </th>
                                     
                                    <th class="col-md-1">
                                        Ubicación
                                    </th> 
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($qProyectos)) {
                                    if ($qProyectos->num_rows() > 0) {
                                        foreach ($qProyectos->result() as $rProyectos) {
                                           
                                            ?>
                                            <tr>
                                                <td>
                                                    
                                                    <a href="<?php echo site_url('archivo/cambios/' . $rProyectos->id); ?>"   class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
                                                    
                                                </td>  
                                                <td>
                                                    <?= $rProyectos->OrdenTrabajo ?>  
                                                </td>
                                                <td>
                                                    <?= $rProyectos->Contrato ?>
                                                </td>
                                                <td>
                                                    <?= $rProyectos->Obra ?>
                                                </td>                               
                                                <td>
                                                    <?= $rProyectos->Descripcion ?>
                                                </td>
                                                 
                                                <td>
                                                    <?= $rProyectos->idUbicacion?>
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
            
            <div class="container">
            
                

                <div class="col-md-12 column">
                    <center>
                    

                        <form role="form" method="post" accept-charset="utf-8" action="<?php echo site_url("proyectos/nuevo"); ?>" class="form-horizontal"  enctype="multipart/form-data" >

                            <div class=" col-md-6 row clearfix">

                                <div class="form-group">
                                        <label for="orden_trabajo" class="control-label">OT:</label>
                                        <input type="hidden" id="orden_trabajo" name="orden_trabajo" class="form-control" value="" required="" />
                                </div>

                                <div class="form-group">
                                        <label for="carpeta" class="control-label">Carpeta:</label>
                                        <input type="number" id="carpeta" name="carpeta" min="1" class="form-control" value="" required="" />
                                </div>


                                <div class="form-group">
                                        <label for="cm" class="control-label">Tamaño (cm):</label>
                                        <input type="number" id="cm" name="cm" min="1" class="form-control" value="" required="" />
                                </div>




                                <div class="form-group">
                                    <button type="button" class="btn btn-success" onclick="asignar_ubicacion()">Asignar Ubicación</button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                    </center>
                    
                    <div class="alert alert-success fade in" id="ubicacion_dinamica" >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>Ubicación</h4>
                        <p id="str_ubicacion"></p>
                        
                    </div>
                </div>
        </div>
        
        <!-- Fin Tabla Estimaciones --> 
        <!-- Dialogo Nueva Estimación --> 
        <!-- Historial del Bloque  -->
        <div class="modal fade" id="modal-historico-archivo" role="dialog" aria-labelledby="myModalLabel-observaciones_bloque" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header panel-default">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-historial">
                            Estatus de bloques
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                                <div id="idHistorial_estatus"></div>
                                                                              
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>
        <!--            Fin Dialog-->
        <!-- Modal Nuevo Archivo -->
        <div class="modal fade" id="modal-agregar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Asignar Proyecto</h4>
                    </div>
                   
                    <form role="form" method="post" accept-charset="utf-8" action="<?php echo site_url("proyectos/nuevo"); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <div class="modal-body">
                                
                                

                                    

                                        <div class="form-group">
                                                <label for="orden_trabajo" class="control-label">OT:</label>
                                                <input type="hidden" id="orden_trabajo" name="orden_trabajo" class="form-control" value="" required="" />
                                        </div>

                                        <div class="form-group">
                                                <label for="carpeta" class="control-label">Carpeta:</label>
                                                <input type="number" id="carpeta" name="carpeta" min="1" class="form-control" value="" required="" />
                                        </div>


                                        <div class="form-group">
                                                <label for="cm" class="control-label">Tamaño (cm):</label>
                                                <input type="number" id="cm" name="cm" min="1" class="form-control" value="" required="" />
                                        </div>

                                        <div id="ubicacion_dinamica" class="form-group d-n">
                                                <label for="ubicacion" class="control-label">Ubicación:</label>
                                                <input type="text" id="ubicacion" name="ubicacion"  class="form-control" value="" required="" />
                                        </div>
                        </div>

                        <div class="modal-footer">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success" onclick="asignar_ubicacion()">Asignar Ubicación</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Cerrar
                                            </button> 
                                        </div>
                                    
                                
                                
                 
                             
                                                                                        
                        </div>
                    </form>
                    
                    

                                       
                </div>
            </div>
        </div>
        
        <!-- Modal ver reporte archivos por direccion -->
        <div class="modal fade" id="modal-ver-reporte" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Reporte Obras por dirección</h4>
                    </div>
                    <form action="<?php echo site_url("impresion/reporte_obras_direccion"); ?> " method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                            
                                                                
                            <div class="form-group">
                              <label class="col-sm-2 control-label" for="bloqueObra">Grupo Obra</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="slc_bloqueObra" name="slc_bloqueObra">
                                        <option value="0">SELECCIONA</option>
                                        <?php foreach ($qBloques->result() as $rowdata) {  ?>
                                        <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                        <?php } ?>
                                  </select>
                              </div>

                            </div>
                                            
                        </div>
                        <div class="modal-footer">
                           
                            
                            
                            <button type="submit" class="btn btn-success">
                                Imprimir
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 
        
        
        <!-- Modal ver reporte documentos por bloquen -->
        <div class="modal fade" id="modal-ver-reporte-documento-bloque" role="dialog" aria-labelledby="modal-ver-reporte-documento-bloque_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Reporte documentos por bloque</h4>
                    </div>
                    <form action="<?php echo site_url("impresion/reporte_documentos_por_bloque"); ?> " method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                            
                                                                
                            <div class="form-group">
                              <label class="col-sm-2 control-label" for="bloqueObra">Grupo Obra</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="slc_bloqueObra_doc_bloque" name="slc_bloqueObra_doc_bloque">
                                        <option value="0">SELECCIONA</option>
                                        <?php foreach ($qBloques->result() as $rowdata) {  ?>
                                        <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                        <?php } ?>
                                  </select>
                              </div>

                            </div>
                                            
                        </div>
                        <div class="modal-footer">
                           
                            
                            
                            <button type="submit" class="btn btn-success">
                                Imprimir
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 
        
        
        <!-- Modal ver reporte documentos por direccion -->
        <div class="modal fade" id="modal-ver-reporte-documento-direccion" role="dialog" aria-labelledby="modal-ver-reporte-documento-bloque_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Reporte documentos por dirección</h4>
                    </div>
                    <form action="<?php echo site_url("impresion/reporte_documentos_por_direccion"); ?> " method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                            
                                                                
                            <div class="form-group">
                              <label class="col-sm-2 control-label" for="bloqueObra">Grupo Obra</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="slc_bloqueObra_doc_direccion" name="slc_bloqueObra_doc_direccion">
                                        <option value="0">SELECCIONA</option>
                                        <?php foreach ($qBloques->result() as $rowdata) {  ?>
                                        <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                        <?php } ?>
                                  </select>
                              </div>

                            </div>
                                            
                        </div>
                        <div class="modal-footer">
                           
                            
                            
                            <button type="submit" class="btn btn-success">
                                Imprimir
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