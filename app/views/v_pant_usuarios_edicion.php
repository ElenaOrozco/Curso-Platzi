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
         <script type="text/javascript" src="<?php echo site_url(); ?>js/radios.js"></script>
        <script type="text/javascript">
            var oTable;
            var sUrl_source_ajax = '<?php echo site_url('gestiona_documentos/listado'); ?>';
			
            $(function() {
                
				
                
                
              $('#t_elaboro').dataTable({
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

               

               $('#t_vobo').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'text-justify small'},
                        {"targets": [2], 'className': 'text-justify small'},
                        {"targets": [3], 'className': 'text-justify small'}
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


           
           
           


            $('#t_funcionarios').dataTable({
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


            $('#t_recibio').dataTable({
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




               $('#t_vobo_comision').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'text-justify small'},
                        {"targets": [2], 'className': 'text-justify small'},
                        {"targets": [3], 'className': 'text-justify small'}
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


            $('#t_autorizo_comision').dataTable({
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


            $('#t_recibio_comision').dataTable({
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





               $('#t_direccion').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'text-justify small'},
                       
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

                
                 $('#t_direcciones_generales').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'text-justify small'},
                        {"targets": [2], 'className': 'text-justify small'},
                       
                    ],
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ direcciones",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando direcciones de la _START_ a la _END_ de un total de _TOTAL_ direcciones",
                        "sInfoEmpty": "Mostrando 0 direcciones",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ direcciones)",
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
                                "sFileName": "listado_direcciones_generales.xls"
                            },
                        ]
                    }

                });
                
                
                $('#modal-cambiar-funcionario').on('show.bs.modal', function(e) { 
                    var firma = $(e.relatedTarget).data('firma');
                    $("#firma").val(firma);
                }); 
                
                
                
                
            });     
         
        function uf_modificar_cat(id) {

                $("#idCatalogo").val(id);
               
                $.ajax({
                    url: "<?php echo site_url('usuarios/datos_concepto') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
			$("#Nombre_mod").val(data['nombre']);
                        $("#Numero_mod").val(data['numero']);
                        modificar_unidadmedida_mod(data['idUnidadMedida']);
                    }
                });
            } 
            

           
         
         
            function modificar_elaboro(id)
            {
                $("#idElaboro").val(id);
                $("#modal-cambiar-elaboro").modal('hide');
               
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomelaboro").html(data['nombre']);
                    }
                });
            }
            
            function modificar_vobo(id)
            {
                $("#idVoBo").val(id);
                $("#modal-cambiar-vobo").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#nomvobo").html(data['nombre']);
                    }
                });
            }

            


            function modificar_autorizo(id)
            {
                $("#idAutorizo").val(id);
                $("#modal-cambiar-autorizo").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomautorizo").html(data['nombre']);
                    }
                });
            }
            
            function modificar_recibio(id)
            {
                $("#idRecibio").val(id);
                $("#modal-cambiar-recibio").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomrecibio").html(data['nombre']);
                    }
                });
            }



            function modificar_recibio_vehiculos(id)
            {
                $("#idRecibio_vehiculos").val(id);
                $("#modal-cambiar-recibio-vehiculos").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomrecibio_vehiculos").html(data['nombre']);
                    }
                });
            }
         

            function modificar_vobo_comision(id)
            {
                $("#idVoBo_comision").val(id);
                $("#modal-cambiar-vobo-comision").modal('hide');
               
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomvobo_comision").html(data['nombre']);
                    }
                });
               
            }

            


            function modificar_autorizo_comision(id)
            {
                $("#idAutorizo_comision").val(id);
                $("#modal-cambiar-autorizo-comision").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomautorizo_comision").html(data['nombre']);
                    }
                });
            }
            
            function modificar_recibio_comision(id)
            {
                $("#idRecibio_comision").val(id);
                $("#modal-cambiar-recibio-comision").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomrecibio_comision").html(data['nombre']);
                    }
                });
            }



            function modificar_funcionario(id)
            {
               id_input=$("#firma").val();
                
                
                
                 if (id_input=="idElaboro"){
                    $("#idElaboro").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomelaboro").html(data['nombre']);
                        }
                    });
                }
                
                
                
                if (id_input=="idVoBo"){
                    $("#idVoBo").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomvobo").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idAutorizo"){
                    $("#idAutorizo").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomautorizo").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idRecibio"){
                    $("#idRecibio").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomrecibio").html(data['nombre']);
                        }
                    });
                }
                

                if (id_input=="idRecibio_vehiculos"){
                    $("#idRecibio_vehiculos").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomrecibio_vehiculos").html(data['nombre']);
                        }
                    });
                }
                
                
                
                
                if (id_input=="idVoBo_comision"){
                    $("#idVoBo_comision").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomvobo_comision").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idAutorizo_comision"){
                    $("#idAutorizo_comision").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomautorizo_comision").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idRecibio_comision"){
                    $("#idRecibio_comision").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomrecibio_comision").html(data['nombre']);
                        }
                    });
                }
                
                
                
                
                if (id_input=="idVoBo_oc"){
                    $("#idVoBo_oc").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomvobo_oc").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idAutorizo_oc"){
                    $("#idAutorizo_oc").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomautorizo_oc").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idRecibio_oc"){
                    $("#idRecibio_oc").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomrecibio_oc").html(data['nombre']);
                        }
                    });
                }
                
                
                
                
                if (id_input=="idVoBo_cotizacion"){
                    $("#idVoBo_cotizacion").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomvobo_cotizacion").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idAutorizo_cotizacion"){
                    $("#idAutorizo_cotizacion").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomautorizo_cotizacion").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idRecibio_cotizacion"){
                    $("#idRecibio_cotizacion").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomrecibio_cotizacion").html(data['nombre']);
                        }
                    });
                }
                
                
                
                if (id_input=="idElaboro_oc"){
                    $("#idElaboro_oc").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomelaboro_oc").html(data['nombre']);
                        }
                    });
                }
                
                
                if (id_input=="idElaboro_cotizacion"){
                    $("#idElaboro_cotizacion").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomelaboro_cotizacion").html(data['nombre']);
                        }
                    });
                }
                
                if (id_input=="idElaboro_comision"){
                    $("#idElaboro_comision").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomelaboro_comision").html(data['nombre']);
                        }
                    });
                }
                
                
                 if (id_input=="idFormulo"){
                    $("#idFormulo").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomformulo").html(data['nombre']);
                        }
                    });
                }
                
                
                 if (id_input=="idReviso"){
                    $("#idReviso").val(id);
                    $("#modal-cambiar-funcionario").modal('hide');

                    $.ajax({
                        url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            $("#nomreviso").html(data['nombre']);
                        }
                    });
                }
                
            }


          function modificar_direccion(id)
            {
                $("#idDireccion").val(id);
                $("#modal-cambiar-direccion").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_catDireccion'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomdireccion").html(data['Nombre']);
                    }
                });
            }
         
         
         function modificar_direccion_general(id)
            {
                
                $("#idDireccionGeneral").val(id);
                $("#modal-cambiar-direccion-general").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones_generales/datos_direccion_general'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomdirecciongeneral").html(data['Nombre']);
                    }
                });
            }
         
         
            function modificar_direccion_area(id)
            {
                
                $("#idArea").val(id);
                $("#modal-cambiar-direccion-area").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones_area/datos_direccion_area'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomdireccionarea").html(data['Nombre']);
                    }
                });
            }
            
            function checkEstado(){
                
		if ($("#txtRecibe_mod").val() ==1) {
			$("#txtRecibe_mod").prop("checked", true);  // para poner la marca
			//$("#txtReviso_mod").prop( "disabled", true ); //para deshabilitar
		} 
		if ($("#txtReviso_mod").val() ==1) {
			$("#txtReviso_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtFoliar_mod").val() ==1) {
			$("#txtFoliar_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtValidar_mod").val() ==1) {
			$("#txtValidar_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtDigitalizar_mod").val() ==1) {
			$("#txtDigitalizar_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtEditar_mod").val() ==1) {
			$("#txtEditar_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtIntegracion_mod").val() ==1) {
			$("#txtIntegracion_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtPreregistro_mod").val() ==1) {
			$("#txtPreregistro_mod").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
	
            }
            
            function checkEstado_pant(id){
                
                $.ajax({
                    url: "<?php echo site_url('control_usuarios/datos_usuario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        //$("#nomdireccionarea").html(data['Nombre']);
                        $("#txtRecibe_pant").val() == data['recibe'];
                        if ($("#txtRecibe_pant").val() ==1) {
			$("#txtRecibe_pant").prop("checked", true);  // para poner la marca
			//$("#txtReviso_mod").prop( "disabled", true ); //para deshabilitar
		} 
                    }
                });
                
		if ($("#txtRecibe_pant").val() ==1) {
			$("#txtRecibe_pant").prop("checked", true);  // para poner la marca
			//$("#txtReviso_mod").prop( "disabled", true ); //para deshabilitar
		} 
		if ($("#txtReviso_pant").val() ==1) {
			$("#txtReviso_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtFoliar_pant").val() ==1) {
			$("#txtFoliar_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtValidar_pant").val() ==1) {
			$("#txtValidar_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtDigitalizar_pant").val() ==1) {
			$("#txtDigitalizar_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtEditar_pant").val() ==1) {
			$("#txtEditar_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtIntegracion_pant").val() ==1) {
			$("#txtIntegracion_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtPreregistro_pant").val() ==1) {
			$("#txtPreregistro_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
                if ($("#txtEditar_ubicacion_pant").val() ==1) {
			$("#txtEditar_ubicacion_pant").prop("checked", true);
			//$("#txtRecibe_mod").prop( "disabled", true );
		}
	
            }
            
            function modificar_area(id)
            {
                $("#idArea_mod").val(id);
                $("#modal-cambiar-area").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('control_usuarios/datos_area'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomArea_mod").html(data['Nombre']);
                       
                    }
                });
            }
            
            function modificar_direccion(id)
            {
                $("#idDireccion_responsable_mod").val(id);
                $("#modal-cambiar-direccion").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_catDireccion'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomDireccion_mod").html(data['Nombre']);
                       
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
        </style>
    </head>
    <body onload="checkEstado_pant(<?php echo $qUsuario['id']; ?> )">
        
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
                        <li><a href="<?php echo site_url("control_usuarios/"); ?>">Usuarios</a></li>
                        <li class="active">Usuario</li>
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
                        <li><a href="<?php echo site_url("control_usuarios/"); ?>">Usuarios</a></li>
                        <li class="active">Usuario</li>
                    </ol>
                </div>
                
                <!-- breadcrumb -->
            </div>
        </div>     
            
        
        <div class="container-fluid tabbable" id="tabs-principal">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-permisos" data-toggle="tab" title="Listado de permisos">Permisos</a>
                    </li>
                   
                </ul>
        
        
                <div class="tab-content">
                           <div class="tab-pane active" id="panel-autorizacion">
                               <br>
                               <div class="row clearfix">                  
                                   <!-- Columna Principal -->
                                   <div class="column col-md-6 col-lg-8">

                                       <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Permisos</h3>
                                            </div>
                                           <div class="panel-body">
                                               <?php
                                                   echo $menu;
                                               ?>
                                           </div>
                                       </div>

                                    <!-- Fin del panel autorizacion -->
                                   </div>


                               <!-- Columna chica -->
                               <div class="column col-md-6 col-lg-4">
                                   <!-- Columna de mapas y fotos -->                 
                                   <div class="panel panel-primary">
                                       <div class="panel-heading" style="display: flex;  justify-content: space-between;">
                                           <h4 class="panel-title">Usuario</h4>
                                           <a href="#" class="btn btn-success" data-toggle="modal" onclick="checkEstado()" data-target="#modal-modificar-cat" style="text-align:end;" ><span class="glyphicon glyphicon-plus"></span> Editar Solicitud</a>
                                       </div>
                                       <div class="panel-body">                      
                          <form action="#" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data"  >
                               <div class="modal-body">



                                   <div class="form-group">
                                               <label for="" class="col-sm-3 control-label">Nombre</label>	
                                                <div class="col-sm-9"> 

                                                   <input type="text" name="" id=""  value="<?php echo $qUsuario['Nombre']; ?>" class="form-control" >
                                                </div>

                                   </div> 

                                   <div class="form-group">
                                               <label for="" class="col-sm-3 control-label">Usuario</label>	
                                                <div class="col-sm-9"> 
                                                   <input type="text" name="" id="" required value="<?php echo $qUsuario['Usuario']; ?>" class="form-control" >
                                                </div>

                                   </div> 
                                   <hr>
                                   <div class="form-group">
                                               <label for="" class="col-sm-2 control-label">Permisos</label>	
                                                

                                   </div> 
                                   
                                   <div class="form-group">
                                       
                                       <div class="col-sm-9 col-md-offset-3">
                                            <label class="col-md-3 checkbox-inline">

                                            <input type="checkbox" name="txtRecibe_pant" id="txtRecibe_pant"  value="<?php echo $qUsuario['recibe']?>" disabled> Recibir
                                            </label>

                                           <label class="col-md-3 checkbox-inline">

                                                <input type="checkbox" name="txtReviso_pant" id="txtReviso_pant"  value="<?php echo $qUsuario['reviso']?>" disabled> Revisar
                                            </label>
                                           <label class="col-md-3 checkbox-inline">

                                                <input type="checkbox" name="txtFoliar_pant" id="txtFoliar_pant"  value="<?php echo $qUsuario['Foliar']?>" disabled> Foliar
                                            </label>
                                       </div>
                                       <div class="col-sm-9 col-md-offset-3">
                                           <label class="col-md-3 checkbox-inline">

                                            <input type="checkbox" name="txtValidar_pant" id="txtValidar_pant"  value="<?php echo $qUsuario['Validar']?>" disabled> Validar
                                            </label>

                                            <label class="col-md-3 checkbox-inline">

                                                <input type="checkbox" name="txtDigitalizar_pant" id="txtDigitalizar_pant"  value="<?php echo $qUsuario['digitalizar']?>"  disabled> Digitalizar
                                            </label>
                                           <label class="col-md-3 checkbox-inline">

                                                <input type="checkbox" name="txtEditar_pant" id="txtEditar_pant"  value="<?php echo $qUsuario['Editar']?>" disabled> Editar
                                            </label>
                                       </div>
                                       <div class="col-sm-9 col-md-offset-3">
                                           <label class="col-md-3 checkbox-inline">

                                                <input type="checkbox" name="txtIntegracion_pant" id="txtIntegracion_pant"  value="<?php echo $qUsuario['integracion']?>"  disabled> Integración
                                            </label>
                                           <label class="col-md-3 checkbox-inline">

                                                <input type="checkbox" name="txtPreregistro_pant" id="txtPreregistro_pant"  value="<?php echo $qUsuario['preregistro']?>" disabled> Preregistro
                                            </label>
                                            
                                       </div>
                                       <div class="col-sm-9 col-md-offset-3">
                                            <label class="col-md-12 checkbox-inline">

                                                <input type="checkbox" name="txtEditar_ubicacion_pant" id="txtEditar_ubicacion_pant"  value="<?php echo $qUsuario['editar_ubicacion']?>" disabled> Editar ubicación
                                            </label>
                                       </div>
                                       
                                    
                                       
                                       
                                    </div>
                                   <hr>
                                    <div class="form-group">
                                                <label for="idArea" class="col-sm-3 control-label">Area de ubicación de trabajo </label>   
                                                 <div class="col-sm-9"> 
                                                    
                                                    <input class="form-control" type="text" name="idArea_pant" id="idArea_pant"  value="<?php echo $addw_areas[$qUsuario['idArea_ubicacion_trabajo']]?>">
                                                  </div>
                                                 
                                    </div> 
                                    <hr>
                                    <div class="form-group">
                                                <label for="idDireccion" class="col-sm-3 control-label">Dirección Responsable </label>   
                                                 <div class="col-sm-9"> 
                                                   
                                                    <input  class="form-control" type="text" name="idDireccion_responsable_pant" id="idDireccion_responsable_pant"  value="<?php echo $addw_direcciones[$qUsuario['idDireccion_responsable']]?>">
                                                  </div>
                                                
                                    </div> 











                               </div>

                           </form>                    
                           




                                       </div>
                                   </div>
                               </div>


                           </div>
                           </div>
                     
               </div> 
            
            
        </div>          
                
                                    
                                    
		
          <!-- Dialogo Modificar Usuario -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Usuario - Modificar</h4>
                    </div>
                    <form action="<?php echo site_url("control_usuarios/modificar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="Nombre" class="col-sm-3 control-label">Nombre</label>	
                                         <div class="col-sm-9"> 
                                            <input type="text" name="Nombre" id="Nombre" required value="<?php echo $qUsuario['Nombre']; ?>" class="form-control" >
                                         </div>
                                         
                            </div> 
                            
                            <div class="form-group">
                                        <label for="Usuario" class="col-sm-3 control-label">Usuario</label>	
                                         <div class="col-sm-9"> 
                                            <input type="text" name="Usuario" id="Usuario" required value="<?php echo $qUsuario['Usuario']; ?>" class="form-control" >
                                         </div>
                                         
                            </div> 
                            
                             <div class="form-group">
                                        <label for="Password" class="col-sm-3 control-label">Password</label>	
                                         <div class="col-sm-9"> 
                                            <input type="Password" name="Password" id="Password" required value="-1" class="form-control" >
                                         </div>
                            </div> 
                            
                            <hr>
                            
                            <div class="form-group">
                                <label for="Permisos" class="col-sm-3 control-label">Permisos</label>	
                                <div class="col-sm-9">
                                    <div class="col-sm-12">
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtRecibe_mod" id="txtRecibe_mod"  value="<?php echo $qUsuario['recibe']?>"> Recibe
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtReviso_mod" id="txtReviso_mod"  value="<?php echo $qUsuario['reviso']?>" > Reviso
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtFoliar_mod" id="txtFoliar_mod"  value="<?php echo $qUsuario['Foliar']?>" > Foliar
                                        </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtValidar_mod" id="txtValidar_mod"  value="<?php echo $qUsuario['Validar']?>" > Validar
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtDigitalizar_mod" id="txtDigitalizar_mod"  value="<?php echo $qUsuario['digitalizar']?>"  > Digitalizar
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtEditar_mod" id="txtEditar_mod"  value="<?php echo $qUsuario['Editar']?>" > Editar
                                        </label>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtIntegracion_mod" id="txtIntegracion_mod"  value="<?php echo $qUsuario['integracion']?>" > Integración
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtPreregistro_mod" id="txtPreregistro_mod"  value="<?php echo $qUsuario['preregistro']?>"  > Preregistro
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtEditar_ubicacion_mod" id="txtEditar_ubicacion_mod"  value="<?php echo $qUsuario['editar_ubicacion']?>"  > Editar Ubicación
                                        </label>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <hr>
                            <div class="form-group">
                                        <label for="idArea" class="col-sm-3 control-label">Area de ubicación de trabajo </label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomArea_mod" style="overflow: hidden; line-height: 1.5;"><?php echo $addw_areas[$qUsuario['idArea_ubicacion_trabajo']]?></div>
                                            <input type="hidden" name="idArea_mod" id="idArea_mod" required value="<?php echo $qUsuario['idArea_ubicacion_trabajo']?>">
                                          </div> 
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-area"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            <hr>
                            <div class="form-group">
                                        <label for="idDireccion" class="col-sm-3 control-label">Dirección Responsable </label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomDireccion_mod" style="overflow: hidden; line-height: 1.5;"><?php echo $addw_direcciones[$qUsuario['idDireccion_responsable']]?></div>
                                            <input type="hidden" name="idDireccion_responsable_mod" id="idDireccion_responsable_mod" required value="<?php echo $qUsuario['idDireccion_responsable'] ?>">
                                          </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-direccion"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            
                                    
                            
                        </div>
                        <div class="modal-footer">
                            
                            <input type="hidden" name="firma" id="firma" value="" >
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="<?php echo $qUsuario['id']; ?>">
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
        </div> <!--Fin modificar-cat -->

              <!--Cambiar Direccion -->    
        <div class="modal fade" id="modal-cambiar-direccion" role="dialog" aria-labelledby="myModalLabel-cambiar-subtipoproceso" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Direccion Responsable</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label> Área </label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direccion">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                   
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDirecciones->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_direccion(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                           
                                                             
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
          
        
             <!--Cambiar Area -->    
        <div class="modal fade" id="modal-cambiar-area" role="dialog" aria-labelledby="myModalLabel-cambiar-subtipoproceso" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->
 
                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Áreas de ubicación</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label> Área </label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_area">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                   
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qAreas->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_area(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                           
                                                             
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
          
          
        
          
       
          
          
          
 
                         <!--Cambiar Elabora-->  
        <!--                 
        <div class="modal fade" id="modal-cambiar-elaboro" role="dialog" aria-labelledby="myModalLabel-cambiar-elaboro" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Elabora Solicitud</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-md-12">
                                    <div class="input-group" id="elboro">
                                        
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="0" cellspacing="0" id="t_elaboro">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Cargo</th>
                                                    <th scope="col">Dirección</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //foreach ($qFuncionarios->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_elaboro(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->nombre; ?></td>
                                                            <td><?php echo $rowdata->cargo; ?></td>
                                                            <td><?php echo $rowdata->direccion; ?></td>
                                                        </tr>
                                                    <?php //} ?>
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
                
            </div>
        </div>
        -->
        <!---Fin dialog---->
        



        
        
        
           

        
        
        
        
  
          
          
          
   		
		
         <!--Cambiar Area Solicitante -->    
        <div class="modal fade" id="modal-cambiar-direccion" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Unidad Ejecutora del Gasto</h4>
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
                                                    <th scope="col">UEG</th>
                                                    <th scope="col">Nombre</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDirecciones->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_direccion(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Numero; ?></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                            
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
        
       
         <!--Cambiar General Solicitante Solicitante -->    
        <div class="modal fade" id="modal-cambiar-direccion-general" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Dirección General Solicitante</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Direcciones</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direcciones_generales">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">UEG</th>
                                                    <th scope="col">Nombre</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDireccionesGenerales->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_direccion_general(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php echo $rowdata->Numero; ?></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                            
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
       
        
        
        
           <!--Cambiar Direccion Área Solicitante -->    
        <div class="modal fade" id="modal-cambiar-direccion-area" role="dialog" aria-labelledby="myModalLabel-cambiar-area" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Dirección Área Solicitante</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Áreas</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_direcciones_generales">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qDireccionesArea->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_direccion_area(<?php echo $rowdata->id; ?>)">Seleccionar</a></small></td>
                                                            <td><?php echo $rowdata->Nombre; ?></td>
                                                            
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
        
        
         
           

        
        
        
                 <!--Cambiar Funcionario-->    
        <div class="modal fade" id="modal-cambiar-funcionario" role="dialog" aria-labelledby="myModalLabel-cambiar-funcionario" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-funcionario">Funcionarios</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_funcionarios">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Cargo</th>
                                                    <th scope="col">Dirección</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($qFuncionarios->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_funcionario(<?php echo $rowdata->id; ?>)">Agregar</a></small></td>
                                                            <td><?php echo $rowdata->nombre; ?></td>
                                                            <td><?php echo $rowdata->cargo; ?></td>
                                                            <td><?php echo $rowdata->direccion; ?></td>
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


