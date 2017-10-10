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
            
           
            $(document).ready(function(){  
                $('form').submit(function(event) {

                    // get the form data
                    // there are many ways to get this data using jQuery (you can use the class or id also)
                    var formData = {
                        'NoCajas'              : $('input[name=NoCajas]').val(),
                    
                    };

                    // process the form
                    $.ajax({
                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url         : '<?php echo site_url("transferencia/dibujar_cajas") ?>', // the url where we want to POST
                        data        : formData, // our data object
                        dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true
                    })
                        // using the done promise callback
                        .done(function(data) {

                            // log data to the console so we can see
                            console.log(data); 
                            $("#div-cajas").html(data.resultado);
                            $("#div-cajas").show("slow");

                            // here we will handle errors and validation messages
                        });

                    // stop the form from submitting the normal way and refreshing the page
                    event.preventDefault();
                });


                
             }); 
 




            
            

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
            #t_listado{
                font-size: 85%;
            }
            .d-n{
                display: none;
            }
            
        </style>
    </head>
    <body>
        <!-- Menu Superior -->
       
        <div class="container-fluid">
            <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?> 
            <div class="row"> 
                
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                            <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                            <li class="active">Transferencias</li>
                     </ol>
                </div>
                <!-- breadcrumb -->
            </div>
            
        
            
            <div class="container">
                <h3>Transferencias</h3>
                
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Inventario de Transferencias</div>
                        <div class="panel-body">
                            
                            
                            
                            <form role="form" id="form-cajas">
                                <div class="form-group">
                                    <label for="NoCajas">No de Cajas</label>
                                    <input type="number" class="form-control"name="NoCajas" id="NoCajas" placeholder="Número de Cajas">
                                </div>
                               
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </form>
                            
                            <div class="d-n" id="div-cajas">
                                
                            </div>
                          
                        </div>
                    </div>
                   
                </div>
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
                        <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Transferencia- Nueva</h4>
                    </div>
                   
                    <form action="<?= site_url('transferencia/agregar_cat')?>" method="post" enctype="multipart/form-data" id="forma1" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" onSubmit="return valida_Datos();">
                        <div class="modal-body">
                                
                                <div class="form-group">
                                    <label for="NoCajas" class="control-label col-sm-3">No de Cajas:</label>
                                    <div class="col-sm-7">
                                        
                                        <input type="number" id="NoCajas" name="NoCajas" value="" onchange="mostrar_cajas()" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div id="detalles">

                                </div>
                                 <div class="form-group">
                                    <label for="Contrato" class="control-label col-sm-3">Contrato:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="Contrato" name="Contrato" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Obra" class="control-label col-sm-3">Obra:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="Obra" name="Obra" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Descripcion" class="control-label col-sm-3">Descripción:</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control input-sm" rows="3" id="Descripcion" name="Descripcion"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="FondodePrograma" class="control-label col-sm-3">Fondo de Programa:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="FondodePrograma" name="FondodePrograma" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Normatividad" class="control-label col-sm-3">Normatividad:</label>
                                    <div class="col-sm-7">
                                        <select id="Normatividad" name="Normatividad" class="form-control">
                                            <option value="FEDERAL">Federal</option>
                                            <option value="ESTATAL">Estatal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Modalidad" class="control-label col-sm-3">Modalidad:</label>
                                    <div class="col-sm-7">
                                        <?php echo form_dropdown('idModalidad', $Modalidades, '', 'class="form-control input-sm" id="idModalidad" '); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Ejercicio:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="idEjercicio" name="idEjercicio" value="" class="form-control input-sm" required min="1999" max="2049"/>   
                                        <!--<?php echo form_dropdown('idEjercicio', $Ejercicios, '', 'class="form-control input-sm" id="Ejercicio" '); ?>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Es Proyecto:
                                       
                                    </label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="Proyecto" name="Proyecto" value="" class="input-sm" />     
                                        
                                    </div>
                                </div>
                                
                 
                             
                                                                                        
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" id="idGuardar" name="idGuardar" class="btn btn-success">
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
