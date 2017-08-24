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
            var ot_principal;
            $(document).ready(function() {
                
                 ot_principal = $('#t_principal').dataTable({
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
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                       
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                      
                    ],
                });

               


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
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
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
                
                filtrar_archivos_estatus(20);
                filtrar_archivos_estatus(30);
                filtrar_archivos_estatus(40);
                filtrar_archivos_estatus(50);
                filtrar_archivos_estatus(60);
            });




            function valida_Datos()
            {
                
                
                document.getElementById("idGuardar").disabled=true;
		return true;
            }
            
            function ver_historico_archivo(idArchivo)
            {
                
            
                
                $.ajax({
                    type:"POST",
                    url: "<?php echo site_url('archivo/historico_archivo'); ?>/" + idArchivo,
                    success: function(data) {
                            $('#idHistorial_estatus').html(data["historial"]); 
                           }
                    });
                    
              
                
                
            }
            
            function filtrar_archivos_estatus(filtro){
                //alert('#tabla-'+filtro)
               
                 $('#tabla-'+filtro).html("");
                
                
            
            
                
                    $.ajax({
                            type:"POST",
                            url: "<?php echo site_url('archivo/filtrar_archivos_estatus') ?>/" + filtro ,

                            success: function(data) {
                                 
                                 $('#tabla-'+filtro).html(data["tabla"]);
                                 $('#tabla-'+filtro).show()
                                 

                                 $('#t_listado_estatus'+ filtro).dataTable({
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
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},

                                        {'sClass': 'small'}

                                    ],
                                });



                            }
                        });
                
                
                    
                    
                
                
            } 
            
            
            function filtrar_archivos_direccion(){
                
                var filtro = $("#slc_Direccion").val();
                //alert(filtro)
                
                $.ajax({
                            type:"POST",
                            url: "<?php echo site_url('archivo/filtrar_archivos_direccion') ?>/" + filtro,
                            beforeSend: function(){
                                $('#tabla-principal').html('Cargando...');
                             },
                            success: function(data) {
                                 $('#tabla-principal').hide();
                                 //$('#filtro-tabla').html(data["tabla"]);
                                 $('#filtro-tabla').html(data["tabla"]);
                                 $('#filtro-tabla').show();

                                 $('#t_listado').dataTable({
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
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},
                                        {'sClass': 'small'},

                                        {'sClass': 'small'}

                                    ],
                                });



                            }
                        });
                
                
            } 
            
            function ver_todo(){
            
                
            
            
                $.ajax({
                        type:"POST",
                        url: "<?php echo site_url('archivo/ver_todo') ?>/",

                        success: function(data) {
                             $('#tabla-principal').hide();
                             //$('#filtro-tabla').html(data["tabla"]);
                             $('#filtro-tabla').html(data["tabla"]);
                             $('#filtro-tabla').show();
                             
                             $('#t_listado').dataTable({
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
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},

                                {'sClass': 'small'}

                            ],
                        });

                           
                            
                            
                             

                        }
                    });
                
            } 
            
            function aceptar_preregistro(idArchivo, idDireccion_responsable){
                $.ajax({
                        type:"POST",
                        url: "<?php echo site_url('archivo/aceptar_preregistro') ?>/" + idArchivo + "/" + idDireccion_responsable,

                        success: function(data) {
                             $("#recibir_preregistro_"+idArchivo).css("display", "none")
                             //$("#preregistro_aceptado"+idArchivo).css("display", "block")
                             $("#preregistro_ubi"+idArchivo).css("display", "block")
                             
                             
                        }
                    });

                     
                
            }

            function editar_archivo(idArchivo){

                //alert (idArchivo)

                var direccion = $("#direccion_preregistro").val();
                if(direccion == 0){
                    alert ("Selecciona una direccion para el preregistro")
                }else{
                window.location.href = "<?php echo site_url('archivo/preregistrar') ?>/" +idArchivo + "/" +direccion;
                }
            }
            
            function mostrar_archivos_verificar(){
                $.ajax({
                        type:"POST",
                        url: "<?php echo site_url('archivo/mostrar_archivos_verificar') ?>/",

                        success: function(data) {
                             
                             $('#tabla-verificar').html(data["tabla"]);
                             $('#tabla-verificar').show();
                             
                             $('#t_verificar').dataTable({
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
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},

                                {'sClass': 'small'}

                            ],
                        });

                           
                            
                            
                             

                        }
                    });
            }
            
            function ver_todos(){
                $.ajax({
                        type:"POST",
                        url: "<?php echo site_url('archivo/mostrar_todos') ?>/",

                        success: function(data) {
                             
                             $('#tabla-mostrar-todos').html(data["tabla"]);
                             $('#pantalla-1').hide();
                             $('#tabla-mostrar-todos').show();
                             
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
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},

                                {'sClass': 'small'}

                            ],
                        });

                           
                            
                            
                             

                        }
                    });
            }
            
            
            function listado_tx(){
                $.ajax({
                        type:"POST",
                        url: "<?php echo site_url('archivo/listado_tx') ?>/",

                        success: function(data) {
                             
                             $('#tabla-tx').html(data["tabla"]);
                             $('#tabla-tx').show();
                             //$('#tabla-mostrar-todos').show();
                             
                             $('#t_tx').dataTable({
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
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},

                                {'sClass': 'small'}

                            ],
                        });

                           
                            
                            
                             

                        }
                    });
            }
            
            
            function cargar_archivos(){

            
                if ( $("#direccion_preregistro").val() == 0 ){
                    $("#pantalla-1").css("display", "none")
                    //alert($("#direccion_preregistro").val())
                }else{
                    $("#pantalla-1").css("display", "block")
                    
                }
            
            
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
            .m-t{
                margin-top: 10px;
            }
            .m-t-separacion{
                margin-top: 40px;
            }
            .d-n{
                display: none;
            }
            
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <!-- Menu Superior -->
            <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?> 

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
                
                
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <?php 
                        if($Editar ==1 || $integracion ==1){
                            $activo_recibe= '';
                            $activo_reviso= '';
                            $activo_foliar= '';
                            $activo_validar= '';
                            $activo_digitalizar= '';
                            $activo_editar= 'class="active"';
                            $panel_activo_recibe= 'class="tab-pane"' ;
                            $panel_activo_reviso= 'class="tab-pane"';
                            $panel_activo_foliar= 'class="tab-pane"';
                            $panel_activo_validar= 'class="tab-pane"';
                            $panel_activo_digitalizar= 'class="tab-pane"';
                            $panel_activo_editar= 'class="tab-pane active"';
                           
                        }
                        if($digitalizar ==1){
                            $activo_recibe= '';
                            $activo_reviso= '';
                            $activo_foliar= '';
                            $activo_validar= '';
                            $activo_digitalizar= 'class="active"';
                            $activo_editar= '';
                            $panel_activo_recibe= 'class="tab-pane"' ;
                            $panel_activo_reviso= 'class="tab-pane"';
                            $panel_activo_foliar= 'class="tab-pane"';
                            $panel_activo_validar= 'class="tab-pane"';
                            $panel_activo_digitalizar= 'class="tab-pane active"';
                            $panel_activo_editar= 'class="tab-pane"';
                           
                        }
                        
                        if($Validar ==1){
                            $activo_recibe= '';
                            $activo_reviso= '';
                            $activo_foliar= '';
                            $activo_validar= 'class="active"';
                            $activo_digitalizar= '';
                            $activo_editar= '';
                            $panel_activo_recibe= 'class="tab-pane"' ;
                            $panel_activo_reviso= 'class="tab-pane"';
                            $panel_activo_foliar= 'class="tab-pane"';
                            $panel_activo_validar= 'class="tab-pane active"';
                            $panel_activo_digitalizar= 'class="tab-pane"';
                            $panel_activo_editar= 'class="tab-pane"';
                           
                        }
                        if($Foliar ==1){
                            $activo_recibe= '';
                            $activo_reviso= '';
                            $activo_foliar= 'class="active"';
                            $activo_validar= '';
                            $activo_digitalizar= '';
                            $activo_editar= '';
                            $panel_activo_recibe= 'class="tab-pane"' ;
                            $panel_activo_reviso= 'class="tab-pane"';
                            $panel_activo_foliar= 'class="tab-pane active"';
                            $panel_activo_validar= 'class="tab-pane"';
                            $panel_activo_digitalizar= 'class="tab-pane"';
                            $panel_activo_editar= 'class="tab-pane"';
                           
                        }
                        
                        if($reviso ==1){
                            $activo_recibe= '';
                            $activo_reviso= 'class="active"';
                            $activo_foliar= '';
                            $activo_validar= '';
                            $activo_digitalizar= '';
                            $activo_editar= '';
                            $panel_activo_recibe= 'class="tab-pane"' ;
                            $panel_activo_reviso= 'class="tab-pane active"';
                            $panel_activo_foliar= 'class="tab-pane"';
                            $panel_activo_validar= 'class="tab-pane"';
                            $panel_activo_digitalizar= 'class="tab-pane"';
                            $panel_activo_editar= 'class="tab-pane"';
                           
                        }
                        if($recibe ==1){
                            $activo_recibe= 'class="active"';
                            $activo_reviso= '';
                            $activo_foliar= '';
                            $activo_validar= '';
                            $activo_digitalizar= '';
                            $activo_editar= '';
                            $panel_activo_recibe= 'class="tab-pane active"' ;
                            $panel_activo_reviso= 'class="tab-pane"';
                            $panel_activo_foliar= 'class="tab-pane"';
                            $panel_activo_validar= 'class="tab-pane"';
                            $panel_activo_digitalizar= 'class="tab-pane"';
                            $panel_activo_editar= 'class="tab-pane"';
                           
                        }
                        
                                
                                
                        ?>
                        <?php if ($recibe == 1) { ?>
                        <li role="presentation" <?= $activo_recibe  ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Preregistro</a></li>
                        <li role="presentation" ><a href="#recepcion" aria-controls="home" role="tab" data-toggle="tab">Recepción Preregistro</a></li>
                        
                        <li role="presentation"><a href="#verificacion" aria-controls="profile" role="tab" data-toggle="tab" onclick="mostrar_archivos_verificar()">Verificación </a></li>
                        <?php } ?>
                        <?php if ($reviso == 1) { 
                           
                        ?>
                        <li role="revision" <?= $activo_reviso ?>><a href="#revision" aria-controls="profile" role="tab" data-toggle="tab" onclick="filtrar_archivos_estatus(20)">Revisión </a></li>
                        <?php } ?>
                        <?php if ($Validar == 1) { 
                            
                        ?>
                        <li role="validar"  <?= $activo_validar ?>><a href="#validar" aria-controls="profile" role="tab" data-toggle="tab" onclick="filtrar_archivos_estatus(30)">Validar </a></li>
                        <?php } ?>
                        <?php if ($Foliar == 1) { 
                            
                            
                        ?>
                        <li role="foliar"  <?= $activo_foliar ?>><a href="#foliar" aria-controls="profile" role="tab" data-toggle="tab" onclick="filtrar_archivos_estatus(40)">Foliar </a></li>
                        <?php } ?>
                        
                        <?php if ($digitalizar == 1) { 
                            
                            
                        ?>
                        <li role="digitalizar"  <?= $activo_digitalizar ?>><a href="#digitalizar" aria-controls="profile" role="tab" data-toggle="tab" onclick="filtrar_archivos_estatus(50)">Digitalizar </a></li>
                        <li role="G3 TX"><a href="#grupotx" aria-controls="profile" role="tab" data-toggle="tab" onclick="listado_tx()">Grupo 3 TX </a></li>
                        <?php } ?>
                        <?php if ($Editar == 1) { 
                            
                        ?>
                        <li role="editar"  <?= $activo_editar ?>><a href="#editar" aria-controls="profile" role="tab" data-toggle="tab" onclick="filtrar_archivos_estatus(60)">Editar </a></li>
                        <?php } ?>
                        
                      
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <!--Archivos  pocaptura/recepcion) -->
                        <div role="tabpanel" <?= $panel_activo_recibe ?> id="home">
                            <div class="col-md-12 m-b m-t">
                    
                                
                                
                                
                                <div class="col-xs-10 col-sm-8 m-b m-t-separacion">
                                    <div class="form-group">
                                          <label class="col-sm-3 control-label" for="filtroGrupo">Dirección de Preregistro: </label>
                                          <div class="col-sm-9">
                                              <select class="form-control" id="direccion_preregistro" name="direccion_preregistro" onchange="cargar_archivos()">
                                                    <option value="0">SELECCIONA</option>
                                                    <?php foreach ($qDirecciones->result() as $rowdata) {  ?>
                                                    <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                                    <?php } ?>
                                              </select>
                                          </div>

                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-sm-4"></div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        <div class="col-md-12 column">
                                            <!--a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" >
                                                <span class="glyphicon glyphicon-plus"></span> Nuevo Archivo
                                            </a-->
                                        </div>

                                        <div id="filtro-archivos">
                                            <div class="container-fluid">
            
            <div class="row clearfix d-n" >
                
                <div class="col-md-12 m-b">
                    <div class="col-md-11"><h3>Listado de Archivos</h3></div>
                    
                </div>
                <!--
                <div class="col-md-12 m-b">
                    <div class="col-md-8"></div>
                    <div class="col-xs-12 col-md-4">
                        
                        <div class="form-group">
                              <label class="col-sm-4 control-label" for="bloqueObra">Filtrar por Estatus: </label>
                              <div class="col-sm-8">
                                  <select class="form-control" id="slc_Estatus" name="slc_Estatus" onchange="filtrar_archivos(1)">
                                        <option value="0">SELECCIONA</option>
                                        <?php //foreach ($qEstatus->result() as $rowdata) {  ?>
                                        <option value="<?php //echo $rowdata->Estatus; ?>"><?php //echo strtoupper($rowdata->Nombre); ?></option>
                                        <?php //} ?>
                                  </select>
                              </div>

                        </div>
                    </div>
                   
                </div>
                -->
                
                <div class="col-md-12 m-b">
                    
                    
                    <div class="col-md-8"></div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                              <label class="col-sm-4 control-label" for="filtroGrupo">Filtrar por Grupos: </label>
                              <div class="col-sm-8">
                                  <select class="form-control" id="slc_Grupos" name="slc_Grupos" onchange="filtrar_archivos(2)">
                                        <option value="0">SELECCIONA</option>
                                        <?php foreach ($qGrupos->result() as $rowdata) {  ?>
                                        <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                        <?php } ?>
                                  </select>
                              </div>

                        </div>
                    
                    </div>
                    
                    
                    
                </div>
            </div>
            <!-- Fin Encabezado -->
            <div class="row clearfix">
                <div class="col-md-12  d-n"  id="pantalla-1" name="pantalla-1">
                    <br>
                    <div class="col-xs-12 col-md-1">
                        <button class="btn btn-primary end" onclick="ver_todos()">
                                    <span class="glyphicon glyphicon-plus"></span> Ver Todos 
                        </button>
                    </div>
                    <div class="col-md-12 column">
                        <!--a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" >
                            <span class="glyphicon glyphicon-plus"></span> Nuevo Archivo
                        </a-->
                    </div>
                    
                    
                    
                                                <div id="tabla-listado-principal">
                                                    <table class="table table-responsive table-striped table-hover table-bordered" id="t_principal">
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
                                                                    Normatividad
                                                                </th> 
                                                                  <th class="col-md-1">
                                                                    Modalidad
                                                                </th> 
                                                                <th class="col-md-1">
                                                                    Ejercicio
                                                                </th> 
                                                                <th class="col-md-1">
                                                                    Estatus Obra
                                                                </th>

                                                                <th class="col-md-2">
                                                                    Direccion Ejecutora
                                                                </th>
                                                                <th class="col-md-2">
                                                                    Supervisor
                                                                </th>
                                                                <th class="col-md-1">
                                                                    Inicio Contrato
                                                                </th>
                                                                <th class="col-md-1">
                                                                    Monto Contratado
                                                                </th>
                                                                <th class="col-md-1">
                                                                    Monto Ejercido por SIOP
                                                                </th>
                                                                <th class="col-md-1">
                                                                    Finiquitada
                                                                </th>
                                                                <th class="col-md-1">
                                                                    Estatus FIDO
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (isset($qArchivos_736)) {
                                                                if ($qArchivos_736->num_rows() > 0) {
                                                                    foreach ($qArchivos_736->result() as $rArchivo) {
                                                                        if($rArchivo->Estatus == 0 || $rArchivo->Estatus == 3) {
                                                                            $clase = 'class="grisecito"';
                                                                        } else {
                                                                            $clase = "";
                                                                        }
                                                                        ?>
                                                                        <tr <?php echo $clase;?>>
                                                                            <td>
                                                                                
                                                                                <a href="#"  onclick ="editar_archivo(<?php echo $rArchivo->id ?>)" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a>

                                                                                

                                                                                
                                                                               
                                                                            </td>  
                                                                            <td>
                                                                                <?= $rArchivo->OrdenTrabajo ?>  
                                                                            </td>
                                                                            <td>
                                                                                <?= $rArchivo->Contrato ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $rArchivo->Obra ?>
                                                                            </td>                               
                                                                            <td>
                                                                                <?= $rArchivo->Descripcion ?>
                                                                            </td>

                                                                            <td>
                                                                                <?= $rArchivo->Normatividad ?>
                                                                            </td> 
                                                                            <td>
                                                                                <?php if(isset($Modalidades[$rArchivo->idModalidad])){
                                                                                    echo $Modalidades[$rArchivo->idModalidad];
                                                                                } ?>
                                                                            </td> 
                                                                            <td>
                                                                                <?php echo $rArchivo->idEjercicio; ?>
                                                                            </td> 
                                                                            <td>
                                                                                <?php echo $rArchivo->EstatusObra; ?>
                                                                            </td>

                                                                            <td>
                                                                                <?php echo $rArchivo->Direccion;  ?>

                                                                            </td> 
                                                                            <td>
                                                                                <?php echo $rArchivo->Supervisor; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $rArchivo->FechaInicio; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $rArchivo->ImporteContratado; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $rArchivo->EjercidoSiop; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php if ($rArchivo->Finiquitada == 0){
                                                                                    echo 'No';
                                                                                } else {
                                                                                    echo 'Si';
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="btn btn-warning btn-xs" title=""  data-toggle="modal" data-target="#modal-historico-archivo" role="button" onclick="ver_historico_archivo(<?php echo $rArchivo->id; ?>)"><span class="glyphicon glyphicon-search"></span></a>&nbsp;

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
                                                    <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Archivo - Nuevo</h4>
                                                </div>

                                                <form action="<?= site_url('archivo/agregar_archivo')?>" method="post" enctype="multipart/form-data" id="forma1" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" onSubmit="return valida_Datos();">
                                                    <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="OrdenTrabajo" class="control-label col-sm-3">Orden de Trabajo:</label>
                                                                <div class="col-sm-7">

                                                                    <input type="text" id="OrdenTrabajo" name="OrdenTrabajo" value="" class="form-control input-sm" required/>          
                                                                </div>
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
                                        
                                    </div>
                                </div>
                                



                            </div>
                            <div id="tabla-mostrar-todos" style="display:none"></div>
                            
                            
                        </div>
                        
                        
                        <!--Archivos  pocaptura/recepcion) -->
                        <div role="tabpanel" class="tab-pane"id="recepcion">
                            <div class="col-md-12 m-b m-t">
                    
                                <h4>Archivos con bloques por Recibir</h4>
                                <!--
                                <div class="col-md-8"></div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                          <label class="col-sm-4 control-label" for="filtroGrupo">Filtrar por Grupos: </label>
                                          <div class="col-sm-8">
                                              <select class="form-control" id="slc_Grupos" name="slc_Grupos" onchange="filtrar_archivos(2)">
                                                    <option value="0">SELECCIONA</option>
                                                    <?php //foreach ($qGrupos->result() as $rowdata) {  ?>
                                                    <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                                    <?php //} ?>
                                              </select>
                                          </div>

                                    </div>

                                </div>
                                -->
                                
                                <?php if ($recibe == 1) { ?>
                                <div class="col-xs-12 col-sm-8 m-b m-t-separacion">
                                    <div class="form-group">
                                          <label class="col-sm-4 control-label" for="filtroGrupo">Selecciona la Dirección: </label>
                                          <div class="col-sm-8">
                                              <select class="form-control" id="slc_Direccion" name="slc_Direccion" onchange="filtrar_archivos_direccion()">
                                                    <option value="0">SELECCIONA</option>
                                                    <?php foreach ($qDirecciones->result() as $rowdata) {  ?>
                                                    <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                                    <?php } ?>
                                              </select>
                                          </div>

                                    </div>

                                </div>
                                <?php } ?>
                                <div class="col-xs-12 col-sm-4"></div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        <div class="col-md-12 column">
                                            <!--a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" >
                                                <span class="glyphicon glyphicon-plus"></span> Nuevo Archivo
                                            </a-->
                                        </div>

                                        <div id="filtro-tabla" style="display:none"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                            
                            
                        </div>
                        
                        <!-- Archivos poverificacion -->
                        <div role="tabpanel"   class="tab-pane" id="verificacion">
                            <div class="col-md-12 m-b m-t">
                    
                    
                                <h4>Archivos con bloques por Verificar</h4>
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        

                                        <div id="tabla-verificar" style="display:none"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                            
                            
                        </div>
                        
                        <div role="tabpanel" <?= $panel_activo_reviso ?> id="revision">
                            <div class="col-md-12 m-b m-t">
                                <h4>Archivos con bloques por Revisar</h4>
                    
                                
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        

                                        <div class="table-responsive d-n" id="tabla-20"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                        </div>
                            
                        
                        
                        <div role="tabpanel" <?= $panel_activo_foliar ?> id="foliar">
                            <div class="col-md-12 m-b m-t">
                                <h4>Archivos con bloques por Foliar</h4>
                    
                                
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        

                                        <div class="table-responsive d-n" id="tabla-40"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                        </div>
                        
                        <div role="tabpanel" <?= $panel_activo_validar ?> id="validar">
                            <div class="col-md-12 m-b m-t">
                    
                                <h4>Archivos con bloques por Validar</h4>
                                
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        

                                        <div class="table-responsive d-n" id="tabla-30"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                        </div>
                        
                        <div role="tabpanel" <?= $panel_activo_digitalizar ?> id="digitalizar">
                            <div class="col-md-12 m-b m-t">
                                <h4>Archivos con bloques por Digitalizar</h4>
                    
                                
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        

                                        <div class="table-responsive d-n" id="tabla-50"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                        </div>
                        
                        <div role="tabpanel"   class="tab-pane" id="grupotx">
                            <div class="col-md-12 m-b m-t">
                    
                    
                                <h4>Archivos Grupo 3 - TX </h4>
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br> Grupo
                                        

                                        <div id="tabla-tx" style="display:none"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                            
                            
                        </div>
                        
                        <div role="tabpanel" <?= $panel_activo_editar ?> id="editar">
                            <div class="col-md-12 m-b m-t">
                    
                                <h4>Archivos con bloques por Editar</h4>
                                
                                
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <br>
                                        

                                        <div class="table-responsive d-n" id="tabla-60"></div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                        </div>
                        
                    </div>
                    
                    

                </div>
                
                <!--
                <div class="col-md-12 m-b">
                    <div class="col-md-11"><h4>Listado de Archivos</h4></div>
                    <div class="col-xs-12 col-md-1">
                        <a href="<?php echo site_url("archivo/ver_todo") ?>" class="btn btn-primary end">
                                    <span class="glyphicon glyphicon-plus"></span> Ver Todos 
                        </a>
                    </div>
                </div>
                -->
                
                
                
            </div>
            <!-- Fin Encabezado -->
            
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
                        <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Archivo - Nuevo</h4>
                    </div>
                   
                    <form action="<?= site_url('archivo/agregar_archivo')?>" method="post" enctype="multipart/form-data" id="forma1" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" onSubmit="return valida_Datos();">
                        <div class="modal-body">
                                
                                <div class="form-group">
                                    <label for="OrdenTrabajo" class="control-label col-sm-3">Orden de Trabajo:</label>
                                    <div class="col-sm-7">
                                        
                                        <input type="text" id="OrdenTrabajo" name="OrdenTrabajo" value="" class="form-control input-sm" required/>          
                                    </div>
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