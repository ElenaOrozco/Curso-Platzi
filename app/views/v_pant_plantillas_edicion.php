<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

?>
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
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/principal.css" rel="stylesheet">

        <link href="<?php echo site_url(); ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery.vegas.min.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url(); ?>css/font-awesome.min.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url(); ?>js/select2/select2.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>js/select2/select2-bootstrap.css" rel="stylesheet">

        <link href="<?php echo site_url(); ?>css/timeline.css" rel="stylesheet">

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

        <script type="text/javascript" src="<?php echo site_url(); ?>js/typeahead.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2.min.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2_locale_es.js"></script>
       

        
       
        
        <script type="text/javascript">
           var oTable;
           
           $(function() {
               
               $('#t_documentos').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'text-justify small'},
                        {"targets": [2], 'className': 'text-justify small'},
                        {"targets": [3], 'className': 'text-justify small'},
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
           
           
           
         
           
            function agregar_documento(idDocumento,idPlantilla)
            {
                
               
               
               
               $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('plantillas/agregar_documento'); ?>/" + idDocumento+"/"+idPlantilla,
                           data: {idDocumento:idDocumento,idPlantilla:idPlantilla} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
               
                
                
            }
            
            
            function uf_modificar_cat_ordenar(id,ordenar_mod,idPlantila) {
                $("#idRel_Plantilla_Documento_mod").val(id);
                $("#ordenar_mod").val(ordenar_mod);
                $("#idPlantilla_mod").val(idPlantila);
              
            } 
            
            function modificar_plantilla(id)
            {
                $("#idModalidad_mod").val(id);
                $("#modal-cambiar-modalidad").modal('hide');
               
                $.ajax({
                    url: "<?php echo site_url('plantillas/datos_modalidad'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#nommodalidad_mod").html(data['Modalidad']);
                       
                    }
                });
            }
            
            
            
            function uf_modificar_plantilla(id){
            
                $("#idModalidad_mod").val(id);
                
                    $.ajax({
                        url: "<?php echo site_url('plantillas/datos_modalidad'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {

                            $("#nommodalidad_mod").html(data['Modalidad']);

                        }
                    });
            }
            
            
            
            
        </script>

        <style>
            .sinwarp{
                white-space: nowrap;
                padding: 10px;
            }
            .container-fluid{
                padding-right: 10px;
                padding-left: 10px;
            }
            /* dl-horizontal overwrite*/
            .dl-horizontal dt 
            {
                white-space: normal;                
            }
            .margen-dd{
                margin-left: 10px !important;
            }
            .Flexible-container {
                position: relative;
                padding-bottom: 56.25%;
                padding-top: 30px;
                height: 0;
                overflow: hidden;
            }

            .Flexible-container iframe,   
            .Flexible-container object,  
            .Flexible-container canvas,  
            .Flexible-container embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            .Flexible-container canvas {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;                
            }
            .Flexible-container .highcharts-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;                
            }
            .nav .breadcrumb {
                margin: 0 7px;                
            }
            @media (min-width: 768px) {
                .nav .breadcrumb {
                    float: left;
                    margin: 7px 10px;
                }
            }

        </style>
    </head>
    <body>
        <!-- Menu Superior -->
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" id="scroll-to-top-custom" href="#">SECIP-> SISTEMA DE ADMINISTRACION DE ARCHIVO</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>					
                <ul class="nav navbar-nav navbar-right small">  
                    
                    <!--
                     <li >
                        <a href="#historial" data-toggle="modal" data-target="#historial" title="Historial" role="button"><span class="glyphicon glyphicon-search"></span> Historial</a>
                    </li>
                    
                   
                    
                    
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-print"></span>Impresiones</a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="<?php echo site_url('impresion/solicitud_aprovisionamiento/' . $aSolicitid["id"]); ?>" target="_blank"><span class="glyphicon glyphicon-file"></span>Solicitud de Aprovisionamiento</a></li>
                        </ul>
                    </li>
                    -->
                    <li>
                        <a href="<?php echo site_url("sessions/logout"); ?>"><span class="glyphicon glyphicon-ban-circle"></span> Salir</a>
                    </li>						
                </ul>
            </div>
        </nav>
        <!-- Barra Inferior -->
        <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style="min-height: 28px !important;">
            <div class="navbar-header">
                &nbsp;
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">                   
                    <ol class="breadcrumb bottomMenu" style="display: none;"> 
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                           <li class="active">Documentos</li>
                    </ol>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <p class="navbar-text">Usuario: <?php echo $usuario; ?></p>                
                </ul>
                
                
                
            </div>
        </nav>
        
        <!-- Contenido Principal -->
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                          <li class="active">Documentos </li>
                    

                  
                                    </ol>
                </div>
                <!-- breadcrumb -->
            </div> 
           
            
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-566826">Datos de Plantilla</a>
                        </div>
                        <div id="panel-element-566826" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <!-- Panel de Control-->
                                    <div class="col-md-8">

                                         
                                            
                                             <div class="tab-pane" id="panel-Vales">
                                                
                                                 <div class="col-md-12">
                                                <div class="panel panel-danger" >
                                                <div class="panel-heading" style="display:flex; justify-content: space-between;">
                                                    Datos Generales
                                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-editar-plantilla">
                                                        <span class="glyphicon glyphicon-pencil"></span> Editar Plantilla
                                                    </a>
                                                </div>

                                            <div class="panel-body">
                                            
                                                <dl class="dl-horizontal">
                                                <dt>Plantilla</dt>
                                                <dd><?php echo $aPlantilla['Nombre'] ?></dd>
                                                <dt>Normativdad </dt>
                                                <dd><?php echo $aPlantilla['Normatividad']; ?></dd>
                                                <dt>Modalidad </dt>
                                                <dd><?php echo $addw_modalidades[$aPlantilla['idModalidad']]; ?></dd>




                                                </dl>
                                            </div>
                                                
                                            </div>
                                            </div>
                                            </div>
                                            
                                        </dl>
                                    </div>
                                    
                                     <div class="col-md-4">
                                        
                                        
                                      
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                     </div> 
                                    
                            </div>
                                
                    </div>
                </div>
                
           </div>
            
            
            
            
            
            <!-- Inicio -->
            <div class="row clearfix">
                <div class="column col-md-12">

                    <h1>
                        Documentos de la Plantilla
                    </h1>

                </div> 
            </div>
            <div class="container-fluid tabbable" id="tabs-principal">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-autorizacion" data-toggle="tab" title="Listado de Solicitudes por Autorizar">Documentos</a>
                    </li>
                   
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-autorizacion">
                        <br>
                        <div class="row clearfix">                  
                            <!-- Columna Principal -->
                            <div class="column col-md-12 col-lg-12">
                               
                               
                                    
                                    
                                    
                                

                                <!-- Solicitudes Captura -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Captura</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        
                                        <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-agregar-documento"><span class="glyphicon glyphicon-plus"></span> Nuevo Documento</a>
                                             
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Acción
                                                    </th>
                                                    <th>
                                                        No. Seguimiento
                                                    </th>
                                                    <th>
                                                        Documento
                                                    </th>
                                                    <th>
                                                        Sub Proceso
                                                    </th>
                                                    <th>
                                                        Proceso
                                                    </th>
                                                     <th>
                                                        Dirección
                                                    </th>                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($qListadoDocumentos)) {
                                                    if ($qListadoDocumentos->num_rows() > 0) {
                                                        foreach ($qListadoDocumentos->result() as $rSolicitud) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                   
                                                                    <a href="#" class="btn btn-xs btn-success" title=""  data-toggle="modal" data-target="#modal-modificar-cat-ordenar" role="button" onclick="uf_modificar_cat_ordenar(<?php echo $rSolicitud->id; ?>,<?php echo $rSolicitud->ordenar; ?>,<?php echo $aPlantilla['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;
                                                                     <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url("plantillas/delete_rel_plantilla_documento/" . $rSolicitud->id .'/' . $aPlantilla['id']); ?>" title="Eliminar Documento" onclick="return confirm('¿Confirma eliminar el Documento?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                                        
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->ordenar; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Documento; ?>
                                                                </td>                                                   
                                                                <td>
                                                                    <?php echo $rSolicitud->SubTipoProceso; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->TipoProceso; ?>
                                                                </td>  
                                                                <td>
                                                                    <?php echo $rSolicitud->Direccion; ?>
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

                            
                                

                                

                                
                            <!-- Fin del panel autorizacion -->
                        </div>
                            
                            
                       


                        
                            
                            
                    </div>
                    </div>
                     
               </div>        
              </div>          
            </div>
        
        
 
        
         
      



        
       
        
           

        
        <!--Agregar Documento -->    
        <div class="modal fade" id="modal-agregar-documento" role="dialog" aria-labelledby="myModalLabel-cambiar-documento" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                  
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Documentos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Agregar Documentos</label><br>
                                <div class="col-sm-12">
                                   
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_documentos">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Documento</th>
                                                    <th scope="col">Sub Proceso</th>
                                                    <th scope="col">Proceso</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDocumentos->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <!--
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="agregar_documento(<?php echo $rowdata->id; ?>,<?php echo $aPlantilla['id']; ?>)">Seleccionar</a></small></td>
                                                            -->
                                                            <td><small><a href="<?php echo site_url("plantillas/agregar_documento/" . $rowdata->id ."/" .$aPlantilla['id']); ?>" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" >Seleccionar</a></small></td>
                                                            <td><?php echo $rowdata->Documento; ?></td>
                                                            <td><?php echo $rowdata->SubTipoProceso; ?></td>
                                                            <td><?php echo $rowdata->TipoProceso; ?></td>
                                                        </tr>
                                                 <?php } ?>
                                            </tbody>
                                        </table>
                                   
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
        
        
        
        
        <!--Editar Plantilla -->     
        <div class="modal fade" id="modal-editar-plantilla" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Plantilla - Editar</h4>
                    </div>
                    <form action="<?php echo site_url("plantillas/modificar_plantilla"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           

                            
                            <div class="form-group">
                                        <label for="Nombre" class="col-sm-3 control-label">Plantilla </label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre_mod" id="Nombre_mod" required value="<?php echo $aPlantilla['Nombre'] ?>" class="form-control" >
                                         </div>
                            </div>  
                            
                             <div class="form-group">
                                        <label for="Normatividad" class="col-sm-3 control-label">Normatividad</label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Normatividad_mod" id="Normatividad_mod" required value="<?php echo $aPlantilla['Normatividad']; ?>" class="form-control" >
                                         </div>
                            </div>
                            
                            
                            <div class="form-group">
                                        <label for="idModalidad" class="col-sm-3 control-label">Modalidad</label>	
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nommodalidad_mod" value=""><?php echo $addw_modalidades[$aPlantilla['idModalidad']]; ?></div>
                                            <input type="hidden" name="idModalidad_mod" id="idModalidad_mod" required value="<?php echo $aPlantilla['idModalidad'] ?>">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-modalidad"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div>  
                            
                            
                           
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="<?php echo $aPlantilla['id'] ?>" class="form-control" >
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
         
         
                  <!--Cambiar Modalidades -->    
        <div class="modal fade" id="modal-cambiar-modalidad" role="dialog" aria-labelledby="myModalLabel-cambiar-modalidad" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Modalidades</h4>
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
                                                <?php foreach ($qModalidades->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_plantilla(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Modalidad; ?></td>
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
       

        



         
          <!-- Dialogo Modificar Car -->
        <div class="modal fade" id="modal-modificar-cat-ordenar" role="dialog" aria-labelledby="modal-modificar-cat-ordenar_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Modificar No. Seguimiento</h4>
                    </div>
                    <form action="<?php echo site_url("plantillas/modificar_cat_ordenar"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="ordenar_mod" class="col-sm-3 control-label">Número de Orden</label>	
                                         <div class="col-sm-7"> 
                                             <input type="number" name="ordenar_mod" id="ordenar_mod" required value="0" class="form-control" >
                                         </div>
                                         
                            </div>  
                            
                            
                           
                            
                                                                                       
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idPlantilla_mod" id="idPlantilla_mod" required value="0" class="form-control" >
                            <input type="hidden" name="idRel_Plantilla_Documento_mod" id="idRel_Plantilla_Documento_mod" required value="0" class="form-control" >
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
		
	

        
     
        
        
     
        
                  
        
    </body>
</html>