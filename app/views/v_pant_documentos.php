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
            var sUrl_source_ajax = '<?php echo site_url('docuentos/listado'); ?>';
             
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
                        //{"targets": [1], 'className': 'small sinwarp'},
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
                    url: "<?php echo site_url('documentos/datos_documento') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#Nombre_mod").val(data['Nombre']);
                 
                 
                        
                        $("#txtEstimacion_mod").val(data['Es_Estimacion']);
                        $("#txtProrroga_mod").val(data['Es_Prorroga']);
                        
                        //alert (data['Es_Prorroga']);
                        //alert (data['Es_Estimacion']);
                         
                        if (data['Es_Prorroga']==1){
                            document.getElementById("txtProrroga_mod").checked = true;
                            document.getElementById("txtEstimacion_mod").disabled= true;
                        }else{
                            document.getElementById("txtProrroga_mod").checked = false;
                            document.getElementById("txtEstimacion_mod").disabled= false;
                        }
                        if (data['Es_Estimacion']==1){
                            document.getElementById("txtEstimacion_mod").checked = true;
                            document.getElementById("txtProrroga_mod").disabled = true;
                        }else{
                            document.getElementById("txtEstimacion_mod").checked = false;
                        }
                         
                         
                        modificar_subtipoproceso_mod(data['idSubTipoProceso']);
                        modificar_direccion_mod(data['idDireccion']);
                        
                         
                        
                         
                    }
                });
                
                 
                //alert ($("#txtProrroga_mod").val());
                // if ($("#txtProrroga_mod").val() = 1) 
                            //marcar
                            //$("#txtProrroga_mod").prop("checked", "checked");
                         
                        //if ($("#txtEstimacion").val() = 1) 
                          //  $("#txtEstimacion_mod").prop("checked", "checked");
        } 
          
          
          
           function modificar_subtipoproceso(id)
            {
                $("#idSubTipoProceso").val(id);
                $("#modal-cambiar-subtipoproceso").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('documentos/dato_subtipoproceso'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomsubtipoproceso").html(data['subtipoproceso']);
                        $("#nomtipoproceso").html(data['tipoproceso']);
                    }
                });
            }
            
            function modificar_direccion(id)
            {
                $("#idDireccion").val(id);
                $("#modal-cambiar-direccion").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('documentos/datos_direcciones'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomDireccion").html(data['Nombre']);
                       
                    }
                });
            }
             
             
            function modificar_subtipoproceso_mod(id)
            {
                $("#idSubTipoProceso_mod").val(id);
                $("#modal-cambiar-subtipoproceso-mod").modal('hide');
                 
                $.ajax({
                    url: "<?php echo site_url('documentos/dato_subtipoproceso'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomsubtipoproceso_mod").html(data['subtipoproceso']);
                        $("#nomtipoproceso_mod").html(data['tipoproceso']);
                    }
                });
            }
            
            function modificar_direccion_mod(id)
            {
                $("#idDireccion_mod").val(id);
                $("#modal-cambiar-direccion-mod").modal('hide');
                 
                $.ajax({
                    url: "<?php echo site_url('documentos/datos_direcciones'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomDireccion_mod").html(data['Nombre']);
                       
                    }
                });
            }
            
            
             
            //estimaciones
            function comprobar(obj) {   
                if (obj.checked)
                    document.getElementById('txtProrroga').disabled = true;
                else
                    document.getElementById('txtProrroga').disabled = false;
            }
            //prorogas
            function comprobar_p(obj) {   
                if (obj.checked)
                    document.getElementById('txtEstimacion').disabled = true;
                else
                    document.getElementById('txtEstimacion').disabled = false;
            }
             
            //estimaciones_mod
            function comprobar_mod(obj) {   
                if (obj.checked)
                    document.getElementById('txtProrroga_mod').disabled = true;
                else
                    document.getElementById('txtProrroga_mod').disabled = false;
            }
            //prorogas
            function comprobar_mod_p(obj) {   
                if (obj.checked)
                    document.getElementById('txtEstimacion_mod').disabled = true;
                else
                    document.getElementById('txtEstimacion_mod').disabled = false;
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
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                 
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                        <li class="active">Documentos</li>
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
                        <a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>Nuevo Documento</a>
                </div>
                 
                <div class="col-md-12 column">                    
                    <table class="table table-striped table-bordered table-hover small" id="tabla_scroll">
                        <thead>
                            <tr>
                                <th class="col-sm-1">
                                    Acción
                                </th>
                                <th class="col-sm-2">
                                   Nombre
                                </th>
                               
                                 <th class="col-sm-2">
                                   Sub Proceso
                                </th>
                                 
                                 <th class="col-sm-2">
                                   Proceso
                                </th>
                                <th class="col-sm-1">
                                   Va a contener estimaciones
                                </th>
                                <th class="col-sm-1">
                                   Va a contener prorrogas
                                </th>
                                 <th class="col-sm-1">
                                   Dirección Responsable
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
                                                                    <a href="#" class="btn btn-xs btn-success" title=""  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_cat(<?php echo $rSolicitud->id; ?>)"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;
                                                                    <a class="btn btn-danger btn-xs del_subdocumento" href="<?php echo site_url("documentos/eliminar_cat/" . $rSolicitud->id); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rSolicitud->Nombre; ?>
                                                                </td>
                                                               
                                                                 <td>
                                                                    <?php echo $rSolicitud->SubTipoProceso; ?>
                                                                </td>
                                                                 
                                                                 <td>
                                                                    <?php echo $rSolicitud->TipoProceso; ?>
                                                                </td>
                                                                 <td>
                                                                    <?php  if($rSolicitud->Es_Estimacion==1) echo 'Si'; else echo 'No'; ?>
                                                                </td>
                                                                 <td>
                                                                    <?php  if($rSolicitud->Es_Prorroga==1) echo 'Si'; else echo 'No'; ?>
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
        </div> 
         
         
          <!-- Dialogo Nueva Documento -->
        <div class="modal fade" id="modal-agregar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Documento - Nuevo</h4>
                    </div>
                    <form action="<?php echo site_url("documentos/agregar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                             
                            
                             
                            <div class="form-group">
                                        <label for="Nombre" class="col-sm-3 control-label">Documento</label>    
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre" id="Nombre" required value="" class="form-control" >
                                         </div>
                                         
                                          
                                          
                            </div>  
                             
                             
                             <div class="form-group">
                                        <label for="idSubTipoProceso" class="col-sm-3 control-label">Sub Proceso</label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomsubtipoproceso" style="overflow: hidden; line-height: 1.5;"></div><input type="hidden" name="idSubTipoProceso" id="idSubTipoProceso" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-subtipoproceso"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                             <div class="form-group">
                                        <label for="idDireccion" class="col-sm-3 control-label">Direccion Responsable</label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomDireccion" style="overflow: hidden; line-height: 1.5;"></div>
                                            <input type="hidden" name="idDireccion" id="idDireccion" required value="0">
                                          </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-direccion"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-offset-4 checkbox-inline">
                                    <input type="checkbox"  onChange="comprobar(this)" name="txtEstimacion" id="txtEstimacion"  value=""> Va a contener estimaciones
                                </label>
                                <label class="col-md-offset-1 checkbox-inline">
                                    <input type="checkbox" name="txtProrroga" id="txtProrroga"  value="" onChange="comprobar_p(this)" > Va a contener prorrogas
                                </label>
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
                        <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Modificar Documento</h4>
                    </div>
                    <form action="<?php echo site_url("documentos/modificar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                             
                            
                             
                            <div class="form-group">
                                        <label for="Nombre_mod" class="col-sm-3 control-label">Documento</label>    
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre_mod" id="Nombre_mod" required value="0" class="form-control" >
                                         </div>
                                         
                                         
                                          
                                          
                            </div>  
                             
                             
                             
                             <div class="form-group">
                                        <label for="idSubTipoProceso_mod" class="col-sm-3 control-label">Sub Proceso</label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomsubtipoproceso_mod" style="overflow: hidden; line-height: 1.5;"></div><input type="hidden" name="idSubTipoProceso_mod" id="idSubTipoProceso_mod" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-subtipoproceso-mod"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            
                             <div class="form-group">
                                        <label for="idDireccion_mod" class="col-sm-3 control-label">Direccion Responsable</label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomDireccion_mod" style="overflow: hidden; line-height: 1.5;"></div>
                                            <input type="hidden" name="idDireccion_mod" id="idDireccion_mod" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-direccion-mod"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                             
                            <div class="form-group">
                                <label class="col-md-offset-4 checkbox-inline">
                                    <input type="checkbox"  onChange="comprobar_mod(this)" name="txtEstimacion_mod" id="txtEstimacion_mod" value=""> Va a contener estimaciones
                                </label>
                                <label class="col-md-offset-1 checkbox-inline">
                                    <input type="checkbox" name="txtProrroga_mod" id="txtProrroga_mod" value="" onChange="comprobar_mod_p(this)" > Va a contener prorrogas
                                </label>
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
         
     
           
           
             <!--Cambiar Sub Proceso -->    
        <div class="modal fade" id="modal-cambiar-subtipoproceso" role="dialog" aria-labelledby="myModalLabel-cambiar-subtipoproceso" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Sub Procesos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Sub Procesos</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Sub Proceso</th>
                                                    <th scope="col">Proceso</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qSubTipoProceso->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_subtipoproceso(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->subtipoproceso; ?></td>
                                                            <td><?php echo $rowdata->tipoproceso; ?></td>
                                                             
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
        <!---Fin dialog
        >
         
             <!--Cambiar Direccion -->    
        <div class="modal fade" id="modal-cambiar-direccion" role="dialog" aria-labelledby="myModalLabel-cambiar-subtipoproceso" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Direcciones</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label> Direcciones </label><br>
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
         
         
                 <!--Cambiar Sub Proceso -->    
        <div class="modal fade" id="modal-cambiar-subtipoproceso-mod" role="dialog" aria-labelledby="myModalLabel-cambiar-subtipoproceso-mod" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Sub Procesos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Sub Procesos</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Sub Proceso</th>
                                                    <th scope="col">Proceso</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qSubTipoProceso->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_subtipoproceso_mod(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->subtipoproceso; ?></td>
                                                            <td><?php echo $rowdata->tipoproceso; ?></td>
                                                             
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
        
                 <!--Cambiar Direccion mod -->    
        <div class="modal fade" id="modal-cambiar-direccion-mod" role="dialog" aria-labelledby="myModalLabel-cambiar-subtipoproceso-mod" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Direcciones</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Sub Procesos</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Dirección</th>
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