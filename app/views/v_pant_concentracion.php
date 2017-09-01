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
            .card{
                padding-top: 30px;
                
                border-radius: 5px;
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
            
            
            $('#select2-chosen-1').change(
                )
            
           
           
            
           
            
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
                                    <li class="active">Concentración</li>
                             </ol>
                        </div>
                        <!-- breadcrumb -->
                    </div>
                </div>
                    <h3>
                        <center>Concentración</center>
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
              
                <div class="col-md-6 card">
                    
                        
                
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                              Datos para Ingreso
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form role="form"  method="post" accept-charset="utf-8" action="<?php echo site_url("proyectos/nuevo"); ?>" class="form-horizontal"  enctype="multipart/form-data" >

                                    <div class="col-md-12">

                                        <div class="form-group">
                                                <label for="orden_trabajo" class="col-sm-2 control-label">OT:</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" id="orden_trabajo" name="orden_trabajo" class="form-control" value="" required="" />
                                                </div>
                                        </div>


                                        <div class="form-group">
                                                <label for="fojas_utiles" class="col-sm-2 control-label">No de Fojas útiles:</label>
                                                <div class="col-sm-10">
                                                    <input type="number" min="1" id="fojas_utiles" name="fojas_utiles" class="form-control" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="legajos" class="col-sm-2 control-label">Legajos:</label>
                                                <div class="col-sm-10">
                                                    <input type="number" min="1" id="legajos" name="legajos" class="form-control" value="" required="" />
                                                </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                                <label for="fecha_ingreso" class="col-sm-2 control-label">Fecha Ingreso (CID):</label>
                                                <div class="col-sm-10">
                                                    <input type="number" min="1" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="identificador" class="col-sm-2 control-label">Identificador:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="identificador" name="identificador" class="form-control" value="" required="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="cierre_expediente" class="col-sm-2 control-label">Cierre Expediente:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="cierre_expediente" name="cierre_expediente" class="form-control" value="" required="" />
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" class="btn btn-success" onclick="asignar_ubicacion()">Asignar Ubicación</button>
                                            </div>
                                        </div>

                                        <div class="row alert alert-success fade in d-n" id="ubicacion_dinamica" >
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4>Ubicación</h4>
                                            <p id="str_ubicacion"></p>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                              Información General y Clasificación de Obra
                            </a>
                          </h4>
                        </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form role="form"  method="post" accept-charset="utf-8" action="" class="form-horizontal"  enctype="multipart/form-data" >
                                    <div class="form-group">
                                            <label for="area" class="col-sm-2 control-label">Área o Unidad Adm:</label>
                                            <div class="col-sm-10">
                                                <input type="number" min="1" id="area" name="area" class="form-control" value="" required="" />
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <label for="fondo" class="col-sm-2 control-label">Fondo:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="fondo" name="fondo" class="form-control" value="" required="" />
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <label for="seccion" class="col-sm-2 control-label">Seccion:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="seccion" name="seccion" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="serie" class="col-sm-2 control-label">Serie:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="serie" name="serie" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="subserie" class="col-sm-2 control-label">Subserie:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="subserie" name="subserie" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="subsubserie" class="col-sm-2 control-label">Sub subserie:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="subsubserie" name="subsubserie" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="no_expediente" class="col-sm-2 control-label">No Expediente:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="no_expediente" name="no_expediente" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                            <label for="fecha_apertura" class="col-sm-2 control-label">Fecha Apertura:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="fecha_apertura" name="fecha_apertura" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="asunto" class="col-sm-2 control-label">Asunto:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="asunto" name="asunto" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="valores" class="col-sm-2 control-label">Valores Documentales:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="valores" name="valores" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="vigencia" class="col-sm-2 control-label">Vigencia Documental:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="vigencia" name="vigencia" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="leyenda_clasificacion" class="col-sm-2 control-label">Leyenda de Clasificación:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="leyenda_clasificacion" name="leyenda_clasificacion" class="form-control" value="" required="" />
                                            </div>
                                    </div>
                                    
                                </form>
                            </div>
                          </div>
                    </div>
                    
                  </div>
                
                
                </div>
                
                <div class="col-sm-6">
                    <div class="thumbnail">
                        
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