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
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                        
                      
                    ],
                });
            
            
                $('#t_scroll').dataTable({
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
                        
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                        
                      
                    ],
                });
            
                $('#t_leidos').dataTable({
                    'bProcessing': true,
                    //'sScrollY': '400px',                    

                    'sPaginationType': 'bs_normal',
                    'sDom': '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                    'iDisplayLength': 10,
                    'aaSorting': [[0, 'desc']],
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
                        
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                        
                      
                    ],
                });
            
                $('#t_cid').dataTable({
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
                        
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                        
                      
                    ],
                });
            $('#t_todos').dataTable({
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
            
            function uf_modificar_observacion(id){
               
                $('#idCatalogo').val(id);
                
                $.ajax({
                    url: "<?php echo site_url('observaciones/datos_observacion_documento') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
			$("#OrdenTrabajo").html(data['OrdenTrabajo']);
                        $("#Contrato").html(data['Contrato']);
                        $("#Obra").html(data['obra']);
                        $("#Motivo").html(data['Motivo']);
                        $("#Respuesta").html(data['Respuesta']);
                        
                    }
                
                });
                
                
            }
            
            function marcar_visto(id){
                $("#visto"+id).css("display", "none");    
                 $.ajax({

                        data: {
                            "id" : id, 



                        },
                        type: "POST",
                        url: "<?php echo site_url('observaciones/marcar_visto_observacion_documento/'); ?>",
                         success: function (data, textStatus, jqXHR) {



                         },
                         error: function(jqXHR, estado, error){
                            console.log(estado)
                            console.log(error)
                         }
                    }) ;
            
            }
            
            function responder_observacion_documento(id){
            
                $.ajax({

                        type: "POST",
                        dataType: "json",
                        url: "<?php echo site_url('observaciones/datos_observacion_documento_por_id/');  ?>/" + id,
                        success: function(data, textStatus, jqXHR){
                              //alert(data["Motivo"])
                             $("#OrdenTrabajo").html(data["OrdenTrabajo"]);
                             $("#documento").html(data["Nombre"]);
                             $("#Motivo").html(data["Motivo"]);
                             $("#Respuesta").val(data["Respuesta"]);
                             $("#idCatalogo_observacion").val(data["id"]);
                        }
                    });
                
                
                 
                
             }
            
            function responder_observaciones(){
            $("#modal-ver-observacion").modal("hide");    
             $.ajax({
                    
                    data: {
                        "id" : $("#idCatalogo_observacion").val(), 
                        "Respuesta" : $("#Respuesta").val(),
                        
                        
                    },
                    type: "POST",
                    url: "<?php echo site_url('observaciones/responder_observacion_documento/'); ?>",
                     success: function (data, textStatus, jqXHR) {
                        
                        $("#Respuesta").val("")
                         
                     },
                     error: function(jqXHR, estado, error){
                        console.log(estado)
                        console.log(error)
                     }
                }) ;
            
        }




            

        </script>
        <style>
            body {
                padding-top: 70px; 
                padding-right: 10px;
                padding-left: 10px;
            }
            .navbar-nav.navbar-right:last-child {
                margin-right: 5px;
            }
            .grisecito{
                color: lightgray;
            }
            
            .sinwarp {
                white-space: nowrap;
            }
            .tabla_siop {
                overflow-y: hidden;
                overflow-x: scroll;
                width: 100%;
            }
            .btn-blue{
                background: #81DAF5 !important;
                color: #fff;
                border: 1px solid #81DAF5;
            }
            
            .btn-blue:hover,
            .btn-blue:active,
            .btn-blue:focus,
            .btn-blue:visited,
            .btn-blue:before
            {
                
                border: 1px solid #81DAF5 !important;
            }
        </style>
    </head>
    <body>
          <!-- Menu Superior -->
         <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>    
          <div class="container-fluid">
                <!--Fin Nav -->
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <h3>
                            Observaciones de Documentos
                        </h3>
                    </div>
                    <div>
                        <a href="#"   class="btn btn-xs btn-success">
                            <span class="glyphicon glyphicon-ok-sign"></span> Leido
                        </a>
                        <a href="#"   class="btn btn-xs btn-blue">
                            <span class="glyphicon glyphicon-search"></span> Tipo Informativa
                        </a>
                        <a href="#"   class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-envelope"></span> En espera de respuesta
                        </a>
                    </div>
                </div>
                <!-- Fin Encabezado -->
                <!-- 
                <div class="row clearfix">
                    <div class="table-responsive">



                        <table class="table table-striped table-hover table-bordered" id="t_listado">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">
                                        Acción
                                    </th>
                                    <th class="col-sm-1">
                                        Orden de Trabajo
                                    </th>
                                    <th class="col-sm-2">
                                        Documento
                                    </th>
                                    <th class="col-sm-2">
                                        Observaciones
                                    </th>
                                    <th class="col-sm-2">
                                        Dirección
                                    </th>
                                    <th class="col-sm-1">
                                        Contrato
                                    </th>
                                    <th class="col-sm-2">
                                        Obra
                                    </th> 
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($qHistorial)) {

                                    if ($qHistorial->num_rows() > 0) {

                                        foreach ($qHistorial->result() as $rHistorial) {

                                ?>           
                                            <tr>
                                                <td>
                                                    <?php if($rHistorial->tipo_observacion == 1){ ?>
                                                            <?php if ($rHistorial->Respuesta){ ?>  
                                                                <a href="#" data-toggle="modal" data-target="#modal-ver-observacion" role="button"  class="btn btn-xs btn-success" onclick="uf_modificar_observacion(<?php echo $rHistorial->id; ?>)">
                                                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                                                </a>
                                                            <?php } else { ?>  
                                                                <a href="#" data-toggle="modal" data-target="#modal-ver-observacion" role="button"  class="btn btn-xs btn-warning" onclick="uf_modificar_observacion(<?php echo $rHistorial->id; ?>)">
                                                                    <span class="glyphicon glyphicon-envelope"></span>
                                                                </a>
                                                            <?php } ?>  
                                                    <?php }else{ ?>
                                                    <a href="#"   class="btn btn-xs btn-warning btn-blue">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </a>
                                                    
                                                        
                                                    <?php  }   ?>
                                                </td>  

                                                <td> <?= $rHistorial->OrdenTrabajo ?>  </td>
                                                 <td> <?= $aDocumento[$rHistorial->idDocumento] ?> </td>

                                                <td> <?= $rHistorial->Motivo ?> </td>
                                                
                                                <td> <?= $aDirecciones[$rHistorial->idDireccion_responsable] ?> </td>

                                                <td> <?= $rHistorial->Contrato ?> </td>

                                                <td> <?= $rHistorial->obra ?> </td>
                                                
                                               


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
                
                
                <div>   Fin Encabezado -->

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentacion" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Nuevos (<?php echo $qEnlaces->num_rows() ?>)</a></li>
                  <li role="presentation"><a href="#vistos" aria-controls="messages" role="tab" data-toggle="tab">Leidos (<?php echo $qEnlacesVistos->num_rows() ?>)</a></li>
                  <li role="presentation"><a href="#cid" aria-controls="cid" role="tab" data-toggle="tab">CID (<?php echo $qCid->num_rows() ?>)</a></li>
                  <li role="presentation"><a href="#todo" aria-controls="messages" role="tab" data-toggle="tab">Todas (<?php echo $qHistorial->num_rows() ?>)</a></li>
                      
                  
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        
                        <table class="table table-striped table-hover table-condensed" id="t_scroll">
                            <thead>
                                <tr>                                    
                                    <th>
                                        #
                                    </th>
                                    
                                    <th>
                                        Obra
                                    </th>
                                    
                                    <th>
                                        Documento
                                    </th>
                                   
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    
                                    <th>
                                        Motivo
                                    </th>
                                    <th>
                                        Respuesta
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
         
         
                                if (isset($qEnlaces)) {
                                    if ($qEnlaces->num_rows() > 0) {
                                        $i = 0;
                                        foreach ($qEnlaces->result() as $rEnlaces) {
                                            $i++; ?>
                                            
                                            <tr>
                                                
                                           
                                                <td>
                                <?php                    if($rEnlaces->tipo_observacion ==1){ ?>
                                                
                                                            <a href='#' data-toggle='modal' data-target='#modal-ver-observacion' role='button'  class='btn btn-xs btn-warning' onclick='responder_observacion_documento(<?= $rEnlaces->id ?>)'>
                                                               <span class='glyphicon glyphicon-send'></span>
                                                            </a>
                                                                
                                <?php                    }else{   ?>
                                                            <a href='#' id='visto<?=$rEnlaces->id ?>' class='btn btn-xs btn-success' title= 'Marcar como Visto' onclick='marcar_visto(<?= $rEnlaces->id ?>)'>
                                                               <span class='glyphicon glyphicon-ok'></span>
                                                            </a>
                                <?php                    }        ?>
                                                </td> 
                                                <td>  <?= $rEnlaces->OrdenTrabajo ?></td>
                                                <td>  <?= $rEnlaces->Nombre ?></td>
                                                <td class='sinwarp'>  <?php echo date("d-m-Y h:i:s", strtotime($rEnlaces->Fecha)) ?> </td>
                                                <td> <?= $aUsuarios[$rEnlaces->idUsuario]  ?> </td> 
                                                <td class='text-justify'> <?= $rEnlaces->Motivo ?> </td>  
                                                <td class='text-justify'>
                                                    
                                                    <?php
                                                    if($rEnlaces->tipo_observacion==0){
                                                        echo 'No se Solicito Repuesta';
                                                    }
                                                    else if ($rEnlaces->Respuesta){
                                                        echo $rEnlaces->Respuesta;
                                                    }else{
                                                        echo 'Esperando Respuesta';
                                                    }
                                                    ?>
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
                    
                    
                    
                    <div role="tabpanel" class="tab-pane" id="vistos">
                        <table class="table table-striped table-hover table-condensed" id="t_leidos">
                            <thead>
                                <tr>                                    
                                    <th>
                                        #
                                    </th> 
                                    <th>
                                        Obra
                                    </th>
                                    
                                    <th>
                                        Documento
                                    </th>
                                   
                                   
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    
                                    <th>
                                        Motivo
                                    </th>
                                    <th>
                                        Respuesta
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
         
                            <?php
                                if (isset($qEnlacesVistos)) {
                                    if ($qEnlacesVistos->num_rows() > 0) {
                                        $i = 0;
                                        foreach ($qEnlacesVistos->result() as $rEnlacesVistos) {
                                            $i++;
                            ?>
                                            
                                            <tr>
                                                
                                                <td>
                                                <!--
                                                        <a href='#' data-toggle='modal' data-target='#mod-observacion-documento' role='button'  class='btn btn-xs btn-success' onclick='modificar_observacion_documento(<?= $rCid->id ?>)'>
                                                           <span class='glyphicon glyphicon-pencil'></span>
                                                        </a>
                                                        <a href='#' class='btn btn-xs btn-danger' onclick='eliminar_observacion_documento(<?= $rEnlacesVistos->id ?>)'>
                                                           <span class='glyphicon glyphicon-remove'></span>
                                                        </a>
                                                -->
                                                <?= $i ?>
                                                </td> 
                                                <td> <?= $rEnlacesVistos->OrdenTrabajo ?></td>
                                                <td> <?= $rEnlacesVistos->Nombre ?></td>
                                                <td class='sinwarp'> <?php echo date("d-m-Y h:i:s", strtotime($rEnlacesVistos->Fecha)) ?></td>
                                                <td> <?= $aUsuarios[$rEnlacesVistos->idUsuario] ?></td> 
                                                <td class='text-justify'> <?=$rEnlacesVistos->Motivo ?></td>
                                                <td class='text-justify'>
                                                    <?php 
                                                    if($rEnlacesVistos->tipo_observacion==0){
                                                        echo 'No se Solicito Repuesta';
                                                    }
                                                    else if ($rEnlacesVistos->Respuesta){
                                                        echo $rEnlacesVistos->Respuesta;
                                                    }else{
                                                        echo 'Esperando Respuesta';
                                                    }
                                                    ?>
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
                    
                    
                <div role="tabpanel" class="tab-pane" id="cid">
                        <table class="table table-striped table-hover table-condensed" id="t_cid">
                            <thead>
                                <tr>                                    
                                    <th>
                                        #
                                    </th> 
                                    <th>
                                        Obra
                                    </th>
                                    
                                    <th>
                                        Documento
                                    </th>
                                   
                                   
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    
                                    <th>
                                        Motivo
                                    </th>
                                    <th>
                                        Respuesta
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
         
         
                                if (isset($qCid)) {
                                    if ($qCid->num_rows() > 0) {
                                        $i = 0;
                                        foreach ($qCid->result() as $rCid) {
                                            $i++;
                                ?>
                                            
                                        <tr>
                                            <td>
                                                
                                                <a href='#' data-toggle='modal' data-target='#mod-observacion-documento' role='button'  class='btn btn-xs btn-success' onclick='modificar_observacion_documento(<?= $rCid->id?> , <?= $rCid->idTipoProceso ?>, <?= $rCid->idSubTipoProceso ?>, <?= $rCid->idDocumento ?>)'>
                                                   <span class='glyphicon glyphicon-pencil'></span>
                                                </a>
                                                <a href='#' class='btn btn-xs btn-danger' onclick='eliminar_observacion_documento(<?= $rCid->id ?>)'>
                                                   <span class='glyphicon glyphicon-remove'></span>
                                                </a>
                                            </td> 
                                            <td> <?= $rCid->OrdenTrabajo ?></td>
                                            <td> <?= $rCid->Nombre ?></td>
                                            <td class='sinwarp'> <?php date("d-m-Y h:i:s", strtotime($rCid->Fecha)) ?></td>
                                            <td> <?= $aUsuarios[$rCid->idUsuario] ?></td>
                                            <td class='text-justify'> <?= $rCid->Motivo ?> </td> 
                                            <td class='text-justify'>
                                                    <?php
                                                    if($rCid->tipo_observacion==0){
                                                        echo 'No se Solicito Repuesta';
                                                    }
                                                    else if ($rCid->Respuesta){
                                                        echo $rCid->Respuesta;
                                                    }else{
                                                        echo 'Esperando Respuesta';
                                                    }
                                                    
                                                    ?>
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
                    
                    <div role="tabpanel" class="tab-pane" id="todo">
                        <table class="table table-striped table-hover table-condensed" id="t_todos">
                            <thead>
                                <tr>                                    
                                    <th>
                                        #
                                    </th> 
                                    <th>
                                        Obra
                                    </th>
                                    
                                    <th>
                                        Documento
                                    </th>
                                   
                                   
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    
                                    <th>
                                        Motivo
                                    </th>
                                    <th>
                                        Respuesta
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
         
         
                                if (isset($qHistorial)) {
                                    if ($qHistorial->num_rows() > 0) {
                                        $i = 0;
                                        foreach ($qHistorial->result() as $rHistorial) {
                                            $i++;
                                            
                                ?>
                                            
                                            <tr>
                                                <td> <?= $i ?></td>
                                                <td> <?= $rHistorial->OrdenTrabajo ?></td>
                                                <td> <?= $rHistorial->Nombre ?></td>
                                            
                                                <td class='sinwarp'><?= date("d-m-Y h:i:s", strtotime($rHistorial->Fecha)) ?></td>
                                                <td><?= $aUsuarios[$rHistorial->idUsuario] ?></td>
                                                <td class='text-justify'><?= $rHistorial->Motivo ?></td>
                                                <td class='text-justify'>
                                                    <?php
                                                    if($rHistorial->tipo_observacion==0){
                                                        echo 'No se Solicito Repuesta';
                                                    }
                                                    else if ($rHistorial->Respuesta){
                                                        echo $rHistorial->Respuesta;
                                                    }else{
                                                        echo 'Esperando Respuesta';
                                                    }
                                                    ?>
                                                </td> 
                                               
                                            </tr>
                                            
                                <?php
                                            
                                        }
                                    }
                                }
                                
                                ?>
        
                                
                            </tbody>
                        </table>                       
                                
                    </div><!-- Fin tabla -->
                  
                </div>

            </div>
        </div>
          
          
        
            
          
          <div class="modal fade" id="modal-ver-observacion" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Observaciones</h4>
                    </div>
                    <form action="<?php echo site_url("observaciones/responder_observacion_documento"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                            <div class="form-group">
                                        <label for="ordenTrabajo" class="col-sm-3 control-label">Orden Trabajo: </label>	
                                        <div class="col-sm-7" name="OrdenTrabajo" id="OrdenTrabajo" style="padding-top: 7px;"> 
                                           
                                        </div>
                            </div>
                            
                            <div class="form-group">
                                        <label for="ordenTrabajo" class="col-sm-3 control-label">Documento: </label>	
                                        <div class="col-sm-7" name="documento" id="documento" style="padding-top: 7px;"> 
                                           
                                        </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="motivo" class="col-sm-3 control-label">Motivo: </label>
                                <div class="col-sm-7" name="Motivo" id="Motivo" style="padding-top: 7px;"> 
                                      
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="respuesta" class="control-label col-sm-3">Agregar Respuesta</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control col-md-12" id="Respuesta" name="Respuesta" cols="70" rows="5"></textarea>
                                </div>
                            </div>
                            
                            
                            
                            
                                                                     
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCatalogo_observacion" id="idCatalogo_observacion" required value="" class="form-control" >
                            					
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="button" class="btn btn-success" onclick="responder_observaciones()">
                                Enviar
                            </button>	
                        </div>
                    </form>                    
                </div>
            </div>
        </div> 
          
        
      
        
    
</body>
</html>
