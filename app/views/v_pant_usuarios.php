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
                
		oTable = $('#tabla_scroll').dataTable({
                    //ajax: sUrl_source_ajax,                    
                    scrollX: false,
                    deferRender: true,
                    autoWidth: true,
                    order: [],
                    columnDefs: [ 
                        {"targets": [0], 'searchable': false, "orderable": false, 'className': 'text-center small'},
                        {"targets": [1], 'className': 'small sinwarp'},
                        {"targets": [1], 'className': 'small sinwarp'},
                        //{"targets": [2,3,4,5,10,11,12], 'className': 'small text-center'},
                        //{"targets": [6], 'className': 'text-justify small'},
                        //{"targets": [7], 'className': 'small'},
                        //{"targets": [8,9], 'className': 'sinwarp text-right small'},
                    ],
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ usuarios",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando usuarios de la _START_ a la _END_ de un total de _TOTAL_ usuarios",
                        "sInfoEmpty": "Mostrando 0 usuarios",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ usuarios)",
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
                                "sFileName": "listado_usuarios.xls"
                            },
                        ]
                    }

                });
                
                
                
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

               

                $('#t_elaboro_comision').dataTable({
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


            $('#t_autorizo').dataTable({
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




            $('#t_recibio_vehiculos').dataTable({
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
            
            
             function modificar_elaboro_comision(id)
            {
                $("#idElaboro_comision").val(id);
                $("#modal-cambiar-elaboro-comision").modal('hide');
               
                $.ajax({
                    url: "<?php echo site_url('funcionarios/datos_funcionario'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomelaboro_comision").html(data['nombre']);
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

         
         
         
         function modificar_direccion(id)
            {
                $("#idDireccion").val(id);
                $("#modal-cambiar-direccion").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_direccion'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#nomdireccion").html(data['Nombre']);
                    }
                });
            }
         
          function valida_Datos_Usuario()
            {
                nombre = $("#Nombre").val();
                if (nombre == 0){
                    alert('Introduzca el Nombre del Usuario');
                    return false;
                }
                
                usuario = $("#Usuario").val();
                if (usuario == 0){
                    alert('Introduzca el Nombre del Usuario');
                    return false;
                }
                
                password = $("#Password").val();
                if (password == 0){
                    alert('Introduzca el Nombre del Password');
                    return false;
                }
                
                
                 idDireccion = $("#idDireccion").val();
                
				
                if (idDireccion == 0){
                    alert('Seleccione la Unidad Ejecutora del Gasto');
                    return false;
                }
                
               
                
               
                
                idelaboro = $("#idElaboro").val();
                if (idelaboro == 0){
                    alert('Seleccione el Jefe Área(Operador)');
                    return false;
                }
                
                /*
                idrecibio = $("#idRecibio").val();
                if (idrecibio == 0){
                    alert('Seleccione quien recibe en Recepción');
                    return false;
                }*/
                
                idDireccion = $("#idDireccionGeneral").val();
                
				
                if (idDireccion == 0){
                    alert('Seleccione la Dirección General Solicitante');
                    return false;
                }
                
		return true;
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
            
            function modificar_area(id)
            {
                $("#idArea").val(id);
                $("#modal-cambiar-area").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('control_usuarios/datos_area'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomArea").html(data['Nombre']);
                       
                    }
                });
            }
            
            function modificar_direccion(id)
            {
                $("#idDireccion_responsable").val(id);
                $("#modal-cambiar-direccion").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('direcciones/datos_direccion'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                        $("#nomDireccion").html(data['Nombre']);
                       
                    }
                });
            }
            
            function alta_permiso(elemento){
                if(elemento.checked){
                    $("#txtPermisos").val("1")
                }
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
            .d-n{
                display: none;
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
                        <li class="active">Usuarios</li>
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
                        <li class="active">Usuarios</li>
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
                        <a href="#modal-agregar-cat" class="btn btn-primary" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>Nuevo Usuario</a>
                </div>
                
                <div class="col-md-12 column">                    
                    <table class="table table-striped table-bordered table-hover small" id="tabla_scroll">
                        <thead>
                            <tr>
                                <th class="col-md-1">
                                    Acción
                                </th>
                                <th >
                                   Nombre
                                </th>
                                <th >
                                   Usuario
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
                                                <a href="<?php echo site_url("control_usuarios/cambios/" . $rSolicitud->id); ?>" class="btn btn-success btn-xs" title=""  data-toggle="modal"  role="button" ><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;
                                                <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url("control_usuarios/eliminar_cat/" . $rSolicitud->id); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                            </td>
                                            <td>
                                                <?php echo $rSolicitud->Nombre; ?>
                                            </td>
                                            <td>
                                                <?php echo $rSolicitud->Usuario; ?>
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
		
		
          <!-- Dialogo Nuevo Usuario -->
        <div class="modal fade" id="modal-agregar-cat" role="dialog" aria-labelledby="modal-agregar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Usuario - Nuevo</h4>
                    </div>
                    <form action="<?php echo site_url("control_usuarios/agregar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" onSubmit="return valida_Datos_Usuario();">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="Nombre" class="col-sm-3 control-label">Nombre</label>	
                                         <div class="col-sm-9"> 
                                            <input type="text" name="Nombre" id="Nombre" required value="" class="form-control" >
                                         </div>
                                         
                            </div> 
                            
                            <div class="form-group">
                                        <label for="Usuario" class="col-sm-3 control-label">Usuario</label>	
                                         <div class="col-sm-9"> 
                                            <input type="text" name="txtUsuario" id="txtUsuario" required value="" class="form-control" >
                                         </div>
                                         
                            </div> 
                            
                             <div class="form-group">
                                        <label for="Password" class="col-sm-3 control-label">Password</label>	
                                         <div class="col-sm-9"> 
                                            <input type="password" name="txtPassword" id="txtPassword" required value="" class="form-control" >
                                         </div>
                            </div>  
                            <hr>
                            <div class="form-group">
                                <label for="Permisos" class="col-sm-3 control-label">Permisos</label>	
                                
                                
                                <div class="col-sm-9">
                                    <div class="col-sm-12">
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox"   name="txtRecibe" id="txtRecibe"  value="" onchange="alta_permiso(this)"> Recibir
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtReviso" id="txtReviso"  value=""  onchange="alta_permiso(this)"> Revisar
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtFoliar" id="txtFoliar"  value="" onchange="alta_permiso(this)" > Foliar
                                        </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtValidar" id="txtValidar"  value="" onchange="alta_permiso(this)" > Validar
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtDigitalizar" id="txtReviso"  value="" onchange="alta_permiso(this)"> Digitalizar
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtEditar" id="txtEditar"  value="" onchange="alta_permiso(this)"> Editar
                                        </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtIntegracion" id="txtIntegracion"  value="" onchange="alta_permiso(this)" > Integración
                                        </label>
                                        <label class="col-md-3 checkbox-inline">
                                            <input type="checkbox" name="txtPreregistro" id="txtPreregistroo"  value="" onchange="alta_permiso(this)" > Preregistro
                                        </label>
                                       
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="form-group">
                                        <label for="idArea" class="col-sm-3 control-label">Area de ubicación de trabajo </label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomArea" style="overflow: hidden; line-height: 1.5;"></div>
                                            <input type="hidden" name="idArea" id="idArea" required value="0">
                                          </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-area"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            <hr>
                            <div class="form-group">
                                        <label for="idDireccion" class="col-sm-3 control-label">Dirección Responsable </label>   
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomDireccion" style="overflow: hidden; line-height: 1.5;"></div>
                                            <input type="hidden" name="idDireccion_responsable" id="idDireccion_responsable" required value="0">
                                          </div>
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-direccion"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                            </div> 
                            
                            
                              
                           
                           
                            
                            
                            
                                                                                                      
                                                            
                              

                            
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                Guardar
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>	
                            <input type="text" name="txtPermisos" id="txtPermisos" required class="d-n">
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
          
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
        <!--div class="modal fade" id="modal-cambiar-elaboro-comision" role="dialog" aria-labelledby="myModalLabel-cambiar-elaboro" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <!--div class="modal-content">
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
                                        
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="0" cellspacing="0" id="t_elaboro_comision">
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_elaboro_comision(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
                                                            <td><?php //echo $rowdata->nombre; ?></td>
                                                            <td><?php //echo $rowdata->cargo; ?></td>
                                                            <td><?php //echo $rowdata->direccion; ?></td>
                                                        </tr>
                                                    <?php// } ?>
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
            <!--/div-->
        <!--/div>
        <!---Fin dialog---->  
          
          
 
                         <!--Cambiar Elabora-->    
        <div class="modal fade" id="modal-cambiar-elaboro" role="dialog" aria-labelledby="myModalLabel-cambiar-elaboro" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

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
                                                <?php foreach ($qFuncionarios->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_elaboro(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        



        <!--Cambiar Visto Bueno-->    
        <div class="modal fade" id="modal-cambiar-vobo" role="dialog" aria-labelledby="myModalLabel-cambiar-vobo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Visto Bueno de la Solicitud</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-md-12">
                                    <div class="input-group" id="subConcepto">
                                         <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_vobo" >
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_vobo(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
         
         <!--Cambiar Autorizacion-->    
        <div class="modal fade" id="modal-cambiar-autorizo" role="dialog" aria-labelledby="myModalLabel-cambiar-autorizo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Autoriza la Solicitud</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_autorizo">
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_autorizo(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
           

         <!--Cambiar Recibe Cotizacion-->    
        <div class="modal fade" id="modal-cambiar-recibio" role="dialog" aria-labelledby="myModalLabel-cambiar-recibio" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Recibe Cotización</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_recibio">
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_recibio(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
        
        
        
         <!--Cambiar Recibe Vehiculos-->    
        <div class="modal fade" id="modal-cambiar-recibio-vehiculos" role="dialog" aria-labelledby="myModalLabel-cambiar-recibio" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Recibe Vehículos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_recibio_vehiculos">
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_recibio_vehiculos(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
        

  
          
          
          
          <!-- Dialogo Modificar Car -->
        <div class="modal fade" id="modal-modificar-cat" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Moficar Usuario</h4>
                    </div>
                    <form action="<?php echo site_url("usuarios/modificar_cat"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                           
                            
                            <div class="form-group">
                                        <label for="Nombre_mod" class="col-sm-3 control-label">Usuario</label>	
                                         <div class="col-sm-7"> 
                                            <input type="text" name="Nombre_mod" id="Nombre_mod" required value="0" class="form-control" >
                                         </div>
                                         <div class="col-sm-2"> 
                                            <input type="text" name="Numero_mod" id="Numero_mod" required value="0" class="form-control" >
                                         </div>
                                         
                                         
                            </div>  
                            <div class="form-group">
                                        <label for="idUnidadMedida_mod" class="col-sm-3 control-label">Unidad Medida</label>	
                                         <div class="col-sm-7"> 
                                            <div class="form-control" id="nomunidadmedida_mod"></div><input type="hidden" name="idUnidadMedida_mod" id="idUnidadMedida_mod" required value="0">
                                         </div>
                                          
                                         <div class="col-sm-2">    
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-unidadmedida-mod"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
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
		
		
         <!--Cambiar Unidades Ejecutoras del Gasto -->    
        <div class="modal fade" id="modal-cambiar-direccion" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Unidades Ejecutoras del Gasto Solicitante</h4>
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
       
        
        
        
        
        
        
                <!--Cambiar Visto Bueno-->    
        <div class="modal fade" id="modal-cambiar-vobo-comision" role="dialog" aria-labelledby="myModalLabel-cambiar-vobo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Visto Bueno de la Solicitud</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-md-12">
                                    <div class="input-group" id="subConcepto">
                                         <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_vobo_comision" >
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_vobo_comision(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
         
         <!--Cambiar Autorizacion-->    
        <div class="modal fade" id="modal-cambiar-autorizo-comision" role="dialog" aria-labelledby="myModalLabel-cambiar-autorizo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Autoriza la Solicitud</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_autorizo_comision">
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_autorizo_comision(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
           

         <!--Cambiar Recibe Cotizacion-->    
        <div class="modal fade" id="modal-cambiar-recibio-comision" role="dialog" aria-labelledby="myModalLabel-cambiar-recibio" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Recibe Cotización</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Funcionario</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        <table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_recibio_comision">
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
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_recibio_comision(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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

