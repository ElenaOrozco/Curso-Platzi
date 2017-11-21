<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    //var_dump($_POST);
    $CI =& get_instance();
     //ps://www.youtube.com/watch?v=izezg_uXxps
     //crear en helper obj_transferencia 
     //con las prop de la base de datos--
     //cargar en controlador el helper
     $transferencia = new obj_Transferencia();
     $transferencia->id = $id;
     $transferencia->folio = "T-0$id-".date('y');
     $transferencia->fecha_registro = date('Y-m-d');
     $transferencia->idUsuario_registra =  $this->session->userdata('id');
     $transferencia->idDireccion =  $this->session->userdata('idDireccion_responsable');
 
     
       
    if ($_POST){
        $transferencia->id = $_POST['id'];
        foreach ($transferencia as $prop => $val) {
            //ceho $prop;
            $transferencia->$prop = $_POST[$prop];
        }
 
        //var_dump($transferencia);
        if ($transferencia->id > 0){
            //actualizar
            $CI->db->where('id', $transferencia->id);
            $CI->db->update('saaTransferencia', $transferencia);
        } else{
            //inserta
            $CI->db->insert('saaTransferencia', $transferencia);
            $transferencia->id = $CI->db->insert_id();
        }
        
        // Detalles de transferencia
        
        $CI->db->query("DELETE FROM saaTransferencia_Detalle WHERE idTransferencia ='{$transferencia->id}' ");
        $No_carpeta = $_POST['No_Carpeta'];
        $ot = $_POST['ot'];
        //$obra = $_POST['obra'];
        $identificador = $_POST['identificador'];
        //$anio = $_POST['anio'];
        $fojas = $_POST['fojas'];
        
        if (isset($_REQUEST['adm'])) { $adm=1; }  
        else { $adm=0; } 
        
        if (isset($_REQUEST['leg'])) { $leg=1; }  
        else { $leg=0; } 
        
        if (isset($_REQUEST['con'])) { $con=1; }  
        else { $con=0; } 
        
        $obra = $_POST['obra'];
        $anio  = $_POST['anio'];
        $observaciones = $_POST['observaciones'];
        
        
        $todo = array();
        foreach ($No_carpeta as $v => $carpeta) {
            $todo[] = array( 
                'idTransferencia' => $transferencia->id, 
                'No_carpeta'      => $No_carpeta[$v], 
                'ot'              => $ot[$v],
                'obra'            => $obra[$v],
                'anio'            => $anio[$v],
                'clasificador'    => 'SIOP' .$identificador[$v],
                'fojas'           => $fojas[$v],
                'adm'             => $adm[$v],
                'leg'             => $leg[$v],
                'con'             => $con[$v],
                'observaciones'   => $observaciones[$v]
                );
        }
        //echo '<br><br>TODO <br>';
        //var_dump($todo);
        
        
        $CI->db->insert_batch('saaTransferencia_Detalle', $todo);
 
    } else if ($id>0){
        $CI->db->where('id', $id);
        $rs = $CI->db->get('saaTransferencia')->result();
        
        if (count($rs) <  0){
            $transferencia = $rs[0];
        }
    }


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
            input{
                border: none;
                width: 100%;
                line-height: 1.4;
                height: 24px;
            }
            .table-responsive{
                font-size: 80%;
            }
            .select2-container .select2-choice {
                height: 24px;
                line-height: 1;
                font-size: 70%;
            }
            .select2-container .select2-choice .select2-arrow b, .select2-container .select2-choice div b {
                background-position: 0 -2px;
            }
            input[type="text"]:disabled{
                background-color: #fff;
            }
            
            .panel-blue{
                border-color: #337ab7;
            }
            
            .panel-blue>.panel-heading {
                color: #fff;
                background-color: #337ab7;
                border-color: #337ab7;
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
                            <li><a href="<?php echo site_url("transferencia/"); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Transferencias</a></li>
                            <li class="active">Editar Transferencia</li>
                     </ol>
                </div>
                <!-- breadcrumb -->
            </div>
            
        
            
            <div class="container">
                <h3 class="text-center m-b-separacion">Transferencias</h3>
                <!--<a href="<?php echo base_url('transferencia') ?>" class="m-b"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar a Listado</a>-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!--<div class="panel-heading">Transferecia  1256</div>-->
                            <div class="panel-body">


                                
                                    
                                <input type="hidden"  name="id" value="<?= $transferencia->id ?>" class="form-control">
                                

                                <div class="row">

                                    <div class="col-xs-6">
                                        <div class="input-group form-group">
                                            <label for="" class="input-group-addon">Folio:</label>
                                            <input type="text" name="folio" value="1256"class="form-control" readonly>
                                        </div>

                                    </div>
                                    <div class="col-xs-6 text-right m-b">
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>

                                    </div>
                                </div>
                                <div class="row">
                                



                                    <div class="col col-xs-6">
                                        <div class="input-group form-group">
                                            <label for="" class="input-group-addon" >Fecha:</label>
                                            <input type="date" name="fecha_registro" value="<?= $transferencia->fecha_registro ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-xs-5">
                                        <div class="input-group form-group">
                                            <label for="" class="input-group-addon" >No Cajas:</label>
                                            <input type="number" name="fecha_registro" value="2" class="form-control" readonly>
                                        </div>
                                       
                                    </div>
                                    <div class="col col-xs-1 text-right">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <input type="hidden" name="idDireccion" value="<?= $transferencia->idDireccion ?>" class="form-control">

                                    <input type="hidden" name="fecha_transferencia" value="" class="form-control">
                                    <input type="hidden" name="idUsuario_registra"  value="<?= $transferencia->idUsuario_registra ?>" class="form-control">
                                    <input type="hidden" name="idUsuario_transfiere"  value="" class="form-control">
                                </div>
                                
                                <form role="form" id="form-cajas">
                                    <!--
                                    <div class="form-group">
                                        <label for="NoCajas">No de Cajas</label>
                                        <input type="number" class="form-control"name="NoCajas" id="NoCajas" placeholder="Número de Cajas">
                                    </div>

                                    <button type="submit" class="btn btn-success">Agregar</button>
                                    -->
                                </form>

                                <div class="panel panel-info">
                                    
                                    <div class="panel-heading" style="display: flex;  justify-content: space-between;">
                                           <a class="panel-title"  data-toggle="collapse" data-parent="#panel" href="#div-caja">Caja 2</a>
                                           <a type="submit" class="btn btn-success text-rigth"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
                                    </div>
                                    
                                    <form action="" method="post">
                                        <!--
                                        <input type="hidden"  name="id" value="<?= $transferencia->id ?>" class="form-control">
                                        <div class="text-rigth">
                                            <!--<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                                            
                                        </div>
                                        
                                          <div class="row">
     
                                            <div class="col-xs-6">
                                                <div class="input-group form-group">
                                                    <label for="" class="input-group-addon">Folio:</label>
                                                    <input type="text" name="folio" value="<?= $transferencia->folio ?>"class="form-control" readonly>
                                                </div>

                                            </div>

                                            
                                            
                                            <div class="col col-xs-6">
                                                <div class="input-group form-group">
                                                    <label for="" class="input-group-addon" >Fecha:</label>
                                                    <input type="date" name="fecha_registro" value="<?= $transferencia->fecha_registro ?>" class="form-control">
                                                </div>
                                            </div>
                                            <input type="hidden" name="idDireccion" value="<?= $transferencia->idDireccion ?>" class="form-control">
                                            
                                            <input type="hidden" name="fecha_transferencia" value="" class="form-control">
                                            <input type="hidden" name="idUsuario_registra"  value="<?= $transferencia->idUsuario_registra ?>" class="form-control">
                                            <input type="hidden" name="idUsuario_transfiere"  value="" class="form-control">
                                        </div>

                                        -->
                                        
                                        <div id="div-caja" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"> Carpeta</th>
                                                                <th class="col-md-2"> OT</th>
                                                                <th class="col-md-2"> Descripción</th>
                                                                <th class="col-md-2"> Identificador</th>
                                                                <th class="col-md-1"> Año</th>
                                                                <th class="col-md-1"> Fojas</th>
                                                                <th class="col-md-1"> 

                                                                    <table class="table table-condensed">
                                                                        <thead><tr><th colspan="3" align="center">Valor</th></tr></thead>
                                                                        <tbody >
                                                                            <tr>
                                                                                <td> ADM </td>
                                                                                <td> LEG </td>
                                                                                <td> CON </td>
                                                                            </tr>
                                                                        </tbody>

                                                                    </table>
                                                                </th>
                                                                <th class="col-md-1">Observaciones</th>
                                                                <th class="col-md-1"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='f_body'>






                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="text-right">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="nuevaFila()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                
                                <div class="panel panel-info">
                                    
                                    <div class="panel-heading" style="display: flex;  justify-content: space-between;">
                                           <a class="panel-title"  data-toggle="collapse" data-parent="#panel" href="#div-caja">Caja 1</a>
                                           <a type="submit" class="btn btn-success text-rigth"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
                                    </div>
                                    
                                    <form action="" method="post">
                                        <!--
                                        <input type="hidden"  name="id" value="<?= $transferencia->id ?>" class="form-control">
                                        <div class="text-rigth">
                                            <!--<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                                            
                                        </div>
                                        
                                          <div class="row">
     
                                            <div class="col-xs-6">
                                                <div class="input-group form-group">
                                                    <label for="" class="input-group-addon">Folio:</label>
                                                    <input type="text" name="folio" value="<?= $transferencia->folio ?>"class="form-control" readonly>
                                                </div>

                                            </div>

                                            
                                            
                                            <div class="col col-xs-6">
                                                <div class="input-group form-group">
                                                    <label for="" class="input-group-addon" >Fecha:</label>
                                                    <input type="date" name="fecha_registro" value="<?= $transferencia->fecha_registro ?>" class="form-control">
                                                </div>
                                            </div>
                                            <input type="hidden" name="idDireccion" value="<?= $transferencia->idDireccion ?>" class="form-control">
                                            
                                            <input type="hidden" name="fecha_transferencia" value="" class="form-control">
                                            <input type="hidden" name="idUsuario_registra"  value="<?= $transferencia->idUsuario_registra ?>" class="form-control">
                                            <input type="hidden" name="idUsuario_transfiere"  value="" class="form-control">
                                        </div>

                                        -->
                                        
                                        <div id="div-caja" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"> Carpeta</th>
                                                                <th class="col-md-2"> OT</th>
                                                                <th class="col-md-2"> Descripción</th>
                                                                <th class="col-md-2"> Identificador</th>
                                                                <th class="col-md-1"> Año</th>
                                                                <th class="col-md-1"> Fojas</th>
                                                                <th class="col-md-1"> 

                                                                    <table class="table table-condensed">
                                                                        <thead><tr><th colspan="3" align="center">Valor</th></tr></thead>
                                                                        <tbody >
                                                                            <tr>
                                                                                <td> ADM </td>
                                                                                <td> LEG </td>
                                                                                <td> CON </td>
                                                                            </tr>
                                                                        </tbody>

                                                                    </table>
                                                                </th>
                                                                <th class="col-md-1">Observaciones</th>
                                                                <th class="col-md-1"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='f_body'>






                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="text-right">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="nuevaFila()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <textarea name="text-plantilla" id="text-plantilla" cols="30" rows="10" style="display:none">
                                    <!-- Original
                                    <tr>
                                        <td> <input type="number" id="No_Carpeta" name="No_Carpeta[]"   value='{No_Carpeta}' required /> </td>
                                        <td> <input type="hidden" id="ot" name="ot[]"  class="form-control" value='{ot}' required /> </td>
                                        <td> <input type="text" id="obra" name="obra[]" value='{obra}' required  /> </td>
                                        <td> <input type="hidden" id="identificador" name="identificador[]"  class="form-control" value='{identificador}' required /></td>
                                        <td> <input type="text" id="anio" name="anio[]" value='{anio}' required  /> </td>
                                        <td> <input type="number" id="fojas" name="fojas[]" value='{fojas}' required /> </td>
                                        <td> 
                                             <table width="100%">

                                                <tr>
                                                    <th> <input id="adm" name="adm[]" value="{adm}" type="checkbox"> </th>
                                                    <th> <input id="leg" name="leg[]" value="{leg}" type="checkbox"> </th>
                                                    <th> <input id="con" name="con[]" value="{con}" type="checkbox"> </th>
                                                </tr>
                                            </table>
                                        </td>
                                        <td> <input type="text" id="observaciones" name="observaciones[]" value='{observaciones}' required /> </td>
                                        <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                    </tr>
                                    -->

                                    <tr>
                                        <td> <input type="number" id="No_Carpeta" name="No_Carpeta[]"   value='{No_Carpeta}' required /> </td>
                                        <td> <input type="text" id="ot" name="ot[]"  class="form-control" value='{ot}' required /> </td>
                                        <td> <input type="text" id="obra" name="obra[]" value='{obra}' required  /> </td>
                                        <td> 
                                            <div class="col-sm-8">
                                                <input type="text" id="identificador" name="identificador[]"  class="form-control" value='{identificador}' required />
                                            </div>
                                            <div class="col-sm-3">
                                                 <button type="button" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                            </div>
                                           
                                           
                                            
                                        </td>
                                        <td> <input type="text" id="anio" name="anio[]" value='{anio}' required  /> </td>
                                        <td> <input type="number" id="fojas" name="fojas[]" value='{fojas}' required /> </td>
                                        <td> 
                                             <table width="100%">

                                                <tr>
                                                    <th> <input id="adm" name="adm[]" value="{adm}" type="checkbox"> </th>
                                                    <th> <input id="leg" name="leg[]" value="{leg}" type="checkbox"> </th>
                                                    <th> <input id="con" name="con[]" value="{con}" type="checkbox"> </th>
                                                </tr>
                                            </table>
                                        </td>
                                        <td> <input type="text" id="observaciones" name="observaciones[]" value='{observaciones}' required /> </td>
                                        <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                    </tr>
                                </textarea>

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
        
        <!-- Modal ver reporte archivos por direccion 
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
                                        <?php /*foreach ($qBloques->result() as $rowdata) {  ?>
                                        <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                        <?php } */?>
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
        </div> -->
        
        
        
        
        
        
    
   <script>
            
           
            $(document).ready(function(){  
                $('#form-cajas').submit(function(event) {

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
                
                
                
                $("#orden_trabajo").select2({
                    placeholder: "",
                    ajax: {
                        url: '<?php echo site_url("transferencia/ot_json"); ?>',
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
                        return $.post( '<?php echo site_url("transferencia/ot_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                           
                        }, "json");
                     
                    }
                });
                
                
                
                $("#orden_trabajo").change(function(){
                    console.log($("#orden_trabajo").val());
                     traer_detalles()
                });
                
               $("td> #identificador").select2({
                    placeholder: "",
                    ajax: {
                        url: '<?php echo site_url("transferencia/identificador_json"); ?>',
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
                        var idInicial = $("#identificador").val();
                        return $.post( '<?php echo site_url("transferencia/identificador_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                           
                        }, "json");
                     
                    }
                });
                
                


                
             });
             
            function traer_detalles(){
                $.post( "<?php echo site_url("transferencia/traer_detalles"); ?>",{ ot:$("#orden_trabajo").val() }, function( data ) {
                    console.log( data ); 
                    $("#obra").val(data.Obra);
                    $("#anio").val(data.idEjercicio);
                    
                }, "json");
                
            
            
            }
            function nueva_carpeta(row){
                
                var carpeta = row.rowIndex
                console.log("Row index is: " + carpeta);
 
                $("row[carpeta] >#carpeta").val(carpeta)
            }
            
            function my_num(num){
                rs = 0;

                tmp = parseFloat(num);
                if (!isNaN(temp)){
                    rs = tmp;
                }

                return rs;
            }

            function calcular(){
                //Ejemplo
                precio = document.getElementByName('carpeta[]');
                cantidad = document.getElementByName('carpeta[]');
                subtotal = document.getElementByName('carpeta[]');

                for (x= 0 ; x < precio.length; x++){
                    sub = (my_num(precio[x].value)* my_num(cantidad[x].value)).toFixed(2);
                    subtotal[x].value = sub;
                    total = total + sub;
                }

                document.getElementById('subtotal').value = total;
            }
 
            function nuevaFila(){
                obj = {};
                obj.id = "";
                obj.No_carpeta = "";
                obj.ot ="";
                obj.obra = "";
                obj.identificador = "";
                obj.anio = "";
                obj.fojas = "";
                obj.adm = "";
                obj.leg = "";
                obj.con = "";
                obj.observaciones = "";


                agregarFila(obj);

            }

            function agregarFila(obj){
                tr = document.createElement('tr');
                console.log($('#text-plantilla').val())
                cont = $('#text-plantilla').val();

                for( prop in obj){
                    console.log(prop);
                    cont = cont.replace('{'+prop+'}', obj[prop]);


                }

                tr.innerHTML = cont;

                document.getElementById('f_body').appendChild(tr);
            }
            
            function eliminar(btn){
                if(confirm,("Quiere eliminar")) {
                    //padre del boton tdy tr
                    registro = btn.parentNode.parentNode;
                    registro.parentNode.removeChild(registro);
                }
            }





            
            

        </script>
        <script>
            
            <?php
                $det = $CI->db->query("SELECT *FROM saaTransferencia_Detalle where idTransferencia = '{$transferencia->id}'")->result();
                
                $json = json_encode($det); //objeto
                
                echo "detalle = {$json}; ";
                
               
            ?>
                for(k in detalle){
                    fila = detalle[k];
                    console.log(fila);
                    
                    agregarFila(fila);
                }
        </script>
            
    
</body>
</html>
