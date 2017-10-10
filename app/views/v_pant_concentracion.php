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
            .title{
                padding: 0 0 20px 0;
            }
            .m-b{
                margin-bottom: 20px;
            }
            .alert-info {
                background-color: #c1d8e4;
                border-color: #9ccad4;
                color: #0d4663;
            }
            .text-small{
                font-size: 12px;
                line-height: 14px;
            }
            .border-div{
                border-bottom: 2px solid #0d4663;
            }
            .text-uppercase{
                text-transform: uppercase;
            }
            .panel-primary {
                border-color: #428bca;
            }
            .panel-primary>.panel-heading {
                color: #fff;
                background-color: #428bca;
                border-color: #428bca;
            }
            .form-group {
                margin-bottom: 10px;
                
            }
            .panel-success>.panel-heading {
                color: #ffffff;
                background-color: #3e7d3e;
                border-color: #0f1f0f;
            }
            .panel-success>.panel-body{
                background: rgba(63, 123, 64, 0.16);
            }
            .panel-success {
                border-color:  #3e7d3e;
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
                
                
                var t = $('#t_concentracion').DataTable({
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
                });
            
                $('#addRow').on( 'click', function () {
                
                   var data = $("#form-ubicaciones").serialize();
                   alert("datos serializados " +data)
                   $.post( "test.php", { name: "John", time: "2pm" })
                    .done(function( data ) {
                      alert( "Data Loaded: " + data );
                    });
                    
                    
                    t.row.add( [
                        '.1',
                        '.2',
                        '.3',
                        '.4',
                        '.5',
                        '.1',
                        '.2',
                        '.3',
                        '.4'
                    ] ).draw( false );

                    
                } );
                
                $("#form-ubicaciones").submit(function(){
                    var cadena = $(this).serialize();
                    alert(cadena);
                    
                    $.post( "<?php echo site_url("concentracion/asignar_ubicacion"); ?>",
                        { 
                            idArchivo:      $("#orden_trabajo").val(),
                            fojas_utiles:   $("#fojas_utiles").val(),
                            legajos:        $("#legajos").val(),
                            Bloques:        $("#Bloques").val(),
                            No_caja:        $("#No_caja").val(),
                            Folio_Inicial:  $("#Folio_Inicial").val(),
                            Folio_Final:    $("#Folio_Final").val(),
                            No_Hojas:       $("#No_Hojas").val(),
                            fecha_ingreso:  $("#fecha_ingreso").val(),
                            identificador:  $("#identificador").val(),
                        
                        }, 
                        function( data ) {
                    
                            if (data.cierre_expediente != ""){
                                $("#cierre_expediente").val( data.fecha_cierre ); // fecha cierre
                                $("#cierre_expediente").attr("disabled", "true");
                            }

                            if (data.fecha_ingreso != ""){
                                $("#fecha_ingreso").val( data.fecha_ingreso);
                                $("#fecha_ingreso").attr("disabled", "true");
                            }


                            if (data.identificador != ""){
                                $("#identificador").attr("disabled", "true");
                                $("#identificador").val( data.identificador ); 
                            } 
                        }, "json");
                        
                    });
                
                $('#orden_trabajo').on( 'change', function () {
                   
                    //alert( $('#orden_trabajo').val())
                    traer_detalles()

                    
                } );


                
                

                

                $("#orden_trabajo").select2({
                    placeholder: "Asignar OT",
                    ajax: {
                        url: '<?php echo site_url("concentracion/ot_json"); ?>',
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
                        return $.post( '<?php echo site_url("concentracion/ot_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                        }, "json");
                     
                    }
                });  
                
                $("#fojas_utiles").change(function(){
                    var ingreso = buscar_ingreso($("#orden_trabajo").val())
                    $("#fecha_ingreso").val("4")
                });
                
                
               
                
            });
            
            function buscar_ingreso(ot){
                $.ajax({
                    url: "<?php echo site_url('concentracion/fecha_ingreso_ot') ?>/" + ot,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#fecha_ingreso").val(data['fecha']);
                       
                        
                    }
                
                });
            }
            
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
            //////////////////////
            
            function traer_detalles(){
                var ot = $("#orden_trabajo").val();
                
                
                
                $.post( "<?php echo site_url("concentracion/detalles_archivo"); ?>",{ ot: ot}, function( data ) {
                    //console.log( data.fecha_ingreso ); // fecha ingreso
                    if (data.cierre_expediente != ""){
                        $("#cierre_expediente").val( data.fecha_cierre ); // fecha cierre
                        $("#cierre_expediente").attr("disabled", "true");
                    }
                    
                    if (data.fecha_ingreso != ""){
                        $("#fecha_ingreso").val( data.fecha_ingreso);
                        $("#fecha_ingreso").attr("disabled", "true");
                    }
                    
                    
                    if (data.identificador != ""){
                        $("#identificador").attr("disabled", "true");
                        $("#identificador").val( data.identificador ); 
                    } 
                }, "json");
                
            
            }
            
           
           
            
           
            
        </script>
    </head>

    <body>
        
        <!-- Contenidos -->
        <div class="container-fluid">
            <!-- Menu Superior -->
             <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?> 
                <div class="container-fluid card">
                    <div class="row clearfix">                
                        <div class="col-md-12 column">
                            <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                                    <li class="active">Concentración</li>
                             </ol>
                        </div>
                        <!-- breadcrumb -->
                    </div>
                </div>
                    <h3>
                        <center class="title text-uppercase">Concentración</center>
                    </h3>

                       
            <div class="col-md-10 col-md-offset-1">
              
                <div class="col-md-4">
                    
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h5 class="text-center text-uppercase">Formulario de Ingreso</h5>
                            
                        </div>
                        <div class="panel-body">
                             <form role="form" id="form-ubicaciones" method="post" accept-charset="utf-8" action="" class="form-horizontal"  enctype="multipart/form-data" >

                                    

                                        <div class="form-group">
                                                <label for="orden_trabajo" class="col-sm-3 control-label">OT:</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" id="orden_trabajo" name="orden_trabajo"  class="form-control" value="" required="" />
                                                </div>
                                        </div>


                                        <div class="form-group">
                                                <label for="fojas_utiles" class="col-sm-3 control-label">Fojas útiles:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min="1" id="fojas_utiles" name="fojas_utiles" class="form-control" value="" placeholder="No de Fojas útiles" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="legajos" class="col-sm-3 control-label">Legajos:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min="1" id="legajos" name="legajos" class="form-control" placeholder="Legajos" value="" required="" />
                                                </div>
                                        </div>

                                        <hr>
                                         <div class="form-group">
                                                <label for="fecha_ingreso" class="col-sm-3 control-label">Bloques:</label>
                                                <div class="col-sm-8">
                                                    <input type="text"  id="Bloques" name="Bloques" class="form-control" placeholder="Bloques" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="identificador" class="col-sm-3 control-label">No caja:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="No_caja" name="No_caja" class="form-control" placeholder="No caja Ej. 1/2" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="cierre_expediente" class="col-sm-3 control-label">Folio Inicial:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" id="Folio_Inicial" name="Folio_Inicial" class="form-control" placeholder="Folio Inicial" value="" required="" />
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label for="cierre_expediente" class="col-sm-3 control-label">Folio Final:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" id="Folio_Final" name="Folio_Final" class="form-control" placeholder="Folio Final" value="" required="" />
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label for="cierre_expediente" class="col-sm-3 control-label">No Hojas:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" id="No_Hojas" name="No_Hojas" class="form-control" placeholder="No Hojas" value="" required="" />
                                                </div>
                                        </div>
                                        
                                        
                                        <hr>
                                        <div class="form-group">
                                                <label for="fecha_ingreso" class="col-sm-3 control-label">Ingreso (CID):</label>
                                                <div class="col-sm-8">
                                                    <input type="date"  id="fecha_ingreso" name="fecha_ingreso" class="form-control" placeholder="Fecha Ingreso (CID)" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="identificador" class="col-sm-3 control-label">Identificador:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="identificador" name="identificador" class="form-control" placeholder="Identificador" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="cierre_expediente" class="col-sm-3 control-label">Cierre Expediente:</label>
                                                <div class="col-sm-8">
                                                    <input type="date" id="cierre_expediente" name="cierre_expediente" class="form-control" placeholder="Cierre Expediente" value="" required="" />
                                                </div>
                                        </div>
                                       
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-8">
                                                <button type="submit" class="btn btn-success" >Asignar Ubicación</button>
                                            </div>
                                        </div>

                                        <div class="row alert alert-success fade in d-n" id="ubicacion_dinamica" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4>Ubicación</h4>
                                            <p id="str_ubicacion"></p>

                                        </div>
                                  
                                </form>
                        </div>
                   </div>
                    
                    
                   
                
                
                </div>
                
                <div class="col-md-8">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            <h3 class="">Ubicaciones</h3>
                            
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed table-bordered table-hover table-responsive"  id="t_concentracion">
                               
                                <thead>
                                    <tr>
                                        <td>Posición</td>
                                        <td>OT</td>
                                        <td>Identificador</td>
                                        <td>Bloque</td>
                                        <td>No de Caja</td>
                                        <td>Folio Inicial</td>
                                        <td>Folio Final</td>
                                        <td>No de Hojas</td>
                                        <td>Detalles</td>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <tr>
                                        <td>12000</td>
                                        <td>12000</td>
                                        <td>15000</td>
                                        <td>Enero</td>
                                        <td>12000</td>
                                        <td>15000</td>
                                        <td>Enero</td>
                                        <td>12000</td>
                                        <td>Detalles</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>13000</td>
                                        <td>9000</td>
                                        <td>13000</td>
                                        <td>9000</td>
                                        <td>13000</td>
                                        <td>9000</td>
                                        <td>13000</td>
                                        <td>9000</td>
                                        <td>Detalles</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>
                
            
            </div>
       
        
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
                            
                            <hr>
          
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="asignar_ubicacion()">Asignar Ubicación</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> 
                         
                             
                                                                                        
                        </div>
                    </form>
                    
                    

                                       
                </div>
            </div>
        </div>
        
   
    
    
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
    
    </body>
</html>