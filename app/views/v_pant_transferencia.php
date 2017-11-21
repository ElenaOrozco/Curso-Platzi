<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

  


?>
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

        <script>
            var ot_listado;
            $(document).ready(function () {
               
                
                var t = $('#t').DataTable({
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
                        {'sClass': 'small'}
                       
                    ],
                });
            });
                
        
        
        
        </script>
        
        </head>
        <body>
            
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
                    <h3 class="text-center">Listado de Transferencias</h3>
                    <div class="text-right">
                        <!--<a href="<?php echo base_url('transferencia/editar/0'); ?>" class="btn btn-success">Nueva Transferencia</a>-->
                        <a href="<?php echo base_url('transferencia/nueva'); ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Transferencia</a>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="t">
                                <thead>
                                    <tr>
                                        
                                        <th class="col-md-1"> Folio </th>
                                        <th class="col-md-1"> Fecha </th>
                     
                                        <th class="col-md-1">Estatus</th>
                                        <th class="col-md-1">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if ( isset($listado) ):?>
                                        <?php if ( $listado->num_rows() > 0 ):?>
                                            <?php foreach ( $listado->result() as$rRow ):?>
                                                <tr>

                                                    <td><?= $rRow->folio  ?></td>
                                                    <td><?php 
                                                            $date = date_create($rRow->fecha_registro);
                                                            $fecha=date_format($date, 'd-m-Y');
                                                            echo  $fecha;  
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($rRow->idUsuario_transfiere >0):?>
                                                            <span class="label label-success">Recibido</span>
                                                        <?php else: ?>
                                                            <span class="label label-warning">En Espera</span>
                                                           
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($rRow->idUsuario_transfiere == 0):?>
                                                            <a href="<?php echo base_url('transferencia/editar/'. $rRow->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>       




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</html>