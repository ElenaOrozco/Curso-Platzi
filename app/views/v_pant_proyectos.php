<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($title)) echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <?php if (isset($meta)) echo meta($meta); ?>  

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/principal.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery.vegas.min.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url(); ?>css/font-awesome.min.css" type="text/css" rel="stylesheet" />

        
        <link href="<?php echo site_url(); ?>js/select2/select2.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>js/select2/select2-bootstrap.css" rel="stylesheet">
        
        
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

        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2.min.js"></script> 
        
        
        
            <?php if (isset($script)) echo $script; ?>
        <style>
            body { padding-top: 50px; }
            .d-n {
                display: none;
            }
            .btn-sm{
                padding: 5px 5px 8px 8px;
                font-size: 12px;
                line-height: 1.5;
                border-radius: 3px;
            }
        </style>
        
        <script>
            var ot_listado;
            $(document).ready(function () {
                $("[rel='tooltip']").tooltip();
                $("[rel='popover']").popover();
                $('.select2').select2({
                    width: '100%'
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
                
                $("#orden_trabajo_mod").select2({
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
                    
                    type:  'POST',
                    success:  function (data) {
                        //alert(data)
                        $("#tabla-principal").hide();
                        
                        actualizar_tabla();
                        $("#modal-agregar-cat").modal('hide');
                        $("#str_ubicacion").html($("#select2-chosen-1").html() + ": " +data["Isla"] + "." + data["Columna"] + "." + data["Fila"] + "." + data["numero"])
                        $("#ubicacion_dinamica").css("display", "block");
                        $("#select2-chosen-1").html("");
                        $("#carpeta").val("");
                        $("#cm").val("");
                        
                    }
                });
               
            }
            
            function modificar_asignacion(){
                
            
                $.ajax({
                    data:  {
                        "id":           $("#idCatalogo_mod").val(),
                        "idArchivo":    $("#orden_trabajo_mod").val(),
                        "carpeta":      $("#carpeta_mod").val(),
                        "cm":           $("#cm_mod").val(),
                        "cm_anteriores":$('#cm_anteriores').val(),
                        "idUbicacion":  $('#idUbicacion').val(),
                        "fecha_ingreso":$('#fecha_ingreso').val(),
                    
                    },
                    url:   '<?php echo site_url("proyectos/modificar_asignacion"); ?>',
                    dataType: 'json',
                    
                    type:  'POST',
                    success:  function (data) {
                        //alert("OK")
                        //alert(data)
                        $("#tabla-principal").hide();
                        
                        actualizar_tabla();
                        $("#modal-modificar-cat").modal('hide');
                        if (data.error ==""){
                            $("#str_ubicacion").html($("#select2-chosen-2").html() + ": " +data["Isla"] + "." + data["Columna"] + "." + data["Fila"] + "." + data["numero"])
                            $("#ubicacion_dinamica").css("display", "block");
                            $("#select2-chosen-2").html("");
                            $("#carpeta_mod").val("");
                            $("#cm_mod").val("");
                        } else{
                            $("#str_ubicacion").html(data.error)
                        }
                        
                    }
                });
               
            }
            
            function actualizar_tabla(){
                $.ajax({
                    type:  'POST',
                    url:   '<?php echo site_url("proyectos/actualizar_tabla"); ?>',
                    
                    success:  function (data) {
                        
                       //alert(data["tabla"])
                       
                        $("#filtro-tabla").html(data["tabla"]);
                        $('#t_listado').dataTable({
                            'bProcessing': true,
                            //'sScrollY': '400px',                    

                            'sPaginationType': 'bs_normal',
                            'sDom': '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                            'iDisplayLength': 10,

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
                
                
                        
                    }
                });
                
            }
            
            function uf_modificar_asignacion(id, ot){
                $("#idCatalogo_mod").val(id);
                $.ajax({
                    
                    url: "<?php echo site_url('proyectos/datos_asignacion'); ?>/" + id,
                    dataType: 'json',
                    success: function(data) {
                            $('#orden_trabajo_mod').val(data.idArchivo);
                            $('#select2-chosen-2').html(ot); 
                            $('#carpeta_mod').val(data.carpeta); 
                            $('#cm_mod').val(data.cm);
                            $('#cm_anteriores').val(data.cm);
                            $('#idUbicacion').val(data.idUbicacion);
                            $("#fecha_ingreso").val(data.fecha_ingreso);
                           }
                    });
            }
           
            
           
            
        </script>
    </head>

    <body>
        
        <!-- Contenidos -->
        <div class="container-fluid">
            <!-- Menu Superior -->
             <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?> 
                <div class="container-fluid">
                    <div class="row clearfix">                
                        <div class="col-md-12 column">
                            <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                                    <li class="active">Ubicaciones Proyectos</li>
                             </ol>
                        </div>
                        <!-- breadcrumb -->
                    </div>
                </div>
                    <h3>
                        <center>Ubicaciones de Proyectos</center>
                    </h3>

                        <?php /* if ($error == 2) { ?>
                            <br>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>
                                    Alerta!
                                </h4> <strong>Error de Carga </strong> <?php echo $this->session->userdata("error_txt"); ?>
                            </div>
                            <br>
                        <?php } ?>
                        <?php if ($error == 3) { ?>
                            <br>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>
                                    Alerta!
                                </h4> <strong>Error de asignacion </strong> <?php echo $this->session->userdata("error_txt"); ?>
                            </div>
                            <br>
                        <?php } ?>
                        <?php if ($error == 4) { ?>
                            <br>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>
                                    Exito!
                                </h4> <strong>Registro Correcto de la Secretaria </strong> <?php echo $this->session->userdata("error_txt"); ?>
                            </div>
                            <br>
                        <?php } ?>
                        <?php if ($error == 5) { ?>
                            <br>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>
                                    Error!
                                </h4> <strong>Error de Registro </strong> <?php echo $this->session->userdata("error_txt"); ?>
                            </div>
                            <br>
                        <?php } ?>
                        <?php if ($error == -2) { ?>
                            <br>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>
                                    Alerta!
                                </h4> <strong>El Documento con ese Folio de Secretaria ya Fue Registrado el dia de hoy </strong> <?php echo $this->session->userdata("error_txt"); ?>
                            </div>
                            <br>
                        <?php } */?>
            <div class="container-fluid">
                <div class="row alert alert-success fade in d-n" id="ubicacion_dinamica" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>Ubicación</h4>
                    <p id="str_ubicacion"></p>

                </div>
                
                <div class="col-md-12">
                     <div class="row clearfix">
                        <div class="col-md-12">
                            <br>
                            
                            <div class="row">
                                <a href="#modal-agregar-cat" class="btn btn-success" role="button" data-toggle="modal" >
                                    <span class="glyphicon glyphicon-plus"></span> Asignar Proyecto
                                </a>
                            </div>
                            

                            <div id="filtro-tabla"></div>

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
                                                Carpeta
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
                                                $i=1;
                                                $isla_aux="";
                                                $fila_aux="";
                                                $columna_aux="";
                                                foreach ($qProyectos->result() as $rProyectos) {
                                                    /*echo $rProyectos->OrdenTrabajo . "</br>" ;
                                                    echo $rProyectos->no_isla . "- Isla " .$isla_aux;
                                                    echo $rProyectos->columna . "- Col " .$columna_aux;
                                                    echo $rProyectos->fila . "- Fila " .$fila_aux . "</br>";
                                                    echo $rProyectos->cm ;*/
                                                    
                                                    
                                                    if ($rProyectos->fila != $fila_aux){
                                                        $i=1;
                                                    }
                                                    if ( ($rProyectos->no_isla == $isla_aux) && ($rProyectos->fila == $fila_aux) && ($rProyectos->columna == $columna_aux) ){
                                                        
                                                        $i++;
                                                    }
                                                    
                                                    ?>
                                                    <tr>
                                                        
                                                        <td>
                                                            <a href="#" class="btn btn-success btn-sm" title="Modificar Asignación"  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_asignacion(<?php echo $rProyectos->id; ?>, '<?php echo $rProyectos->OrdenTrabajo; ?>')"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                            <a class="btn btn-danger btn-sm del_documento" title="Liberar Ubicación" onclick="return confirm('¿Desea liberar ubicación?');" target="_self" href="<?php echo site_url('proyectos/eliminar_ubicacion/' . $rProyectos->id .'/' . $rProyectos->cm .'/'. $rProyectos->idUbicacion); ?>" ><span class="glyphicon glyphicon-remove" ></span></a>

                                                          

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
                                                            <?php echo $rProyectos->carpeta ?>
                                                            </br>
                                                            <?php echo $rProyectos->cm ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $rProyectos->no_isla . "." . $rProyectos->columna . "." . $rProyectos->fila . "." . $i ?>
                                                        </td> 



                                                    </tr>
                                                    <?php
                                                    $isla_aux = $rProyectos->no_isla ;
                                                    $fila_aux = $rProyectos->fila;
                                                    $columna_aux = $rProyectos->columna ;
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
                <!--
                <div class="col-md-4">
                    
                    

                        <form role="form" method="post" accept-charset="utf-8" action="<?php echo site_url("proyectos/nuevo"); ?>" class="form-horizontal"  enctype="multipart/form-data" >

                            <div class="col-md-12">

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
                                
                                <div class="row alert alert-success fade in d-n" id="ubicacion_dinamica" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4>Ubicación</h4>
                                    <p id="str_ubicacion"></p>

                                </div>
                            </div>
                        </form>
                        <br><br>
                        
                    
                    
                    
                </div>
                <br><br>
                
                
            </div>
                -->
            
        </div>
        <br><br><br><br>
        
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
                                    <label for="orden_trabajo" class="col-sm-2 control-label">OT:</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="orden_trabajo" name="orden_trabajo" class="form-control" value="" required="" />
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label for="carpeta" class="col-sm-2 control-label">Carpeta:</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="carpeta" name="carpeta" min="1" placeholder="Número Carpeta" class="form-control" value="" required="" />
                                    </div>
                            </div>


                            <div class="form-group">
                                    <label for="cm" class="col-sm-2 control-label">Tamaño (cm):</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="cm" name="cm" min="1" placeholder="Tamaño en cm"  class="form-control" value="" required="" />
                                    </div>
                            </div>
          
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="asignar_ubicacion()">Asignar Ubicación</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> 
                         
                             
                                                                                        
                        </div>
                    </form>
                    
                    

                                       
                </div>
            </div>
        </div
        
    </body>
    
    
        <!-- Modal Modificar Archivo -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Modificar Asignación de Proyecto</h4>
                    </div>
                   
                    <form role="form" method="post" accept-charset="utf-8" action="" class="form-horizontal"  enctype="multipart/form-data" >
                        <div class="modal-body">
                                
                             
                            <div class="form-group">
                                    <label for="orden_trabajo" class="col-sm-2 control-label">OT:</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="orden_trabajo_mod" name="orden_trabajo_mod" class="form-control" value="" required="" />
                                        
                                       
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label for="carpeta" class="col-sm-2 control-label">Carpeta:</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="carpeta_mod" name="carpeta_mod" min="1" placeholder="Número Carpeta" class="form-control" value="" required="" />
                                    </div>
                            </div>


                            <div class="form-group">
                                    <label for="cm" class="col-sm-2 control-label">Tamaño (cm):</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="cm_mod" name="cm_mod" min="1" placeholder="Tamaño en cm"  class="form-control" value="" required="" />
                                    </div>
                            </div>
          
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" id="idCatalogo_mod" name="idCatalogo_mod"  class="form-control" value="" required="" />
                            <input type="hidden" id="cm_anteriores" name="cm_anteriores"  class="form-control" value="" required="" />
                            <input type="hidden" id="idUbicacion" name="idUbicacion"  class="form-control" value="" required="" />
                            <input type="hidden" id="fecha_ingreso" name="fecha_ingreso"  class="form-control" value="" required="" />
                            <button type="button" class="btn btn-success" onclick="modificar_asignacion()">Modificar Ubicación</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> 
                         
                             
                                                                                        
                        </div>
                    </form>
                    
                    

                                       
                </div>
            </div>
        </div
        
    </body>
</html>