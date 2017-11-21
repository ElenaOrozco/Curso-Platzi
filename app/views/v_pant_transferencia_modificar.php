<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/*
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
*/

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
        
        <link href="<?php echo site_url(); ?>css/jquery-confirm.css" rel="stylesheet">
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
        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-confirm.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2.min.js"></script> 
        <!--script type="text/javascript">
            
            function agregar_caja(id){
                guardar_cambios()
                $.post("<?php echo site_url('transferencia/agregar_caja'); ?>/", 
                    { id: id },
                    function(data) {
                        console.log(data)
                        if (data > 0){
                            dibujar_cajas();
                            
                        } else {
                            alert("Error al agregar caja, intentalo nuevamente")
                        }
                    }
                ); 
            }
            
            function guardar_cambios(){
                
            }
            
            function dibujar_cajas(){
                
            }
        </script-->
        
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
            .flex{
                display:flex;
                justify-content: space-between;
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
                            <li><a href="<?php echo site_url("transferencia/"); ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i> Transferencias </a></li>
                            <li class="active">Transferencia Editar</li>
                     </ol>
                </div>
                <!-- breadcrumb -->
            </div>
            
        
            
            <div class="container">
                <h3 class="text-center m-b-separacion">Transferencia <?= $id ?></h3>
                <input id="idTransferencia" type="hidden" value="<?= $id ?>">
                <!--<a href="<?php echo base_url('transferencia') ?>" class="m-b"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar a Listado</a>-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!--<div class="panel-heading">Transferecia  1256</div>-->
                            <div class="panel-body">
                                

                                <div class="row">

                                    <div class="col-xs-6">
                                        <div class="input-group form-group">
                                            <label for="" class="input-group-addon">Folio:</label>
                                            <input type="text" name="folio" value="<?= $aTransferecia['folio'] ?>"class="form-control" readonly>
                                        </div>

                                    </div>
                                    <div class="col-xs-6 text-right m-b">
                                        <!--button type="button" class="btn btn-warning" onclick="imprimir_transferencia(<?= $id ?>)"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button-->
                                        <a  href="<?php echo site_url("impresion/transferencia"). '/' . $id ?> " class="btn btn-warning" target="_blank" >Imprimir </a>
                                    </div>
                                </div>
                                
                                <div class="row">
                                
                                    <div class="col col-xs-6">
                                        <div class="input-group form-group">
                                            <label for="" class="input-group-addon" >Fecha:</label>
                                            <input type="text" name="fecha_registro" value="<?php  $date = date_create($aTransferecia['fecha_registro'] );
                                                            $fecha=date_format($date, 'd-m-Y');
                                                            echo  $fecha;  ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col col-xs-5">
                                        <div class="input-group form-group">
                                            <label for="" class="input-group-addon" >No Cajas:</label>
                                            <input type="number" id="cajas_total" name="cajas_total" value="<?= $cajas->num_rows() ?>" class="form-control" readonly>
                                        </div>
                                       
                                    </div>
                                    <div class="col col-xs-1 text-right">
                                        <button type="submit" class="btn btn-success" onclick="nuevaCaja(<?= $id ?>)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                   
                                
                                </div>
                                
                                <form id="form-detalles" action="" method="post">
                                    <div class="m-b text-right">
                                        <a type="submit" id="enviar" class="btn btn-success text-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
                                    </div>
                                    
                                    <div class="m-b" id="mensaje">

                                    </div>
                                    <div class="" id="div-cajas">
                                        <?php /*foreach ($datos as $dato):?>
                                             <?php $i= 1 ?>
                                            <div class="panel panel-info">
                                    
                                                <div class="panel-heading flex">
                                                       <a class="panel-title"  data-toggle="collapse" data-parent="#panel" href="#div-caja-<?= $dato['idCaja'] ?>">Caja <?= $i ?> </a>
                                                       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_Caja(this,<?= $dato['idCaja'] ?> )"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </div>




                                                    <div id="div-caja-<?= $dato['idCaja'] ?>" class="panel-collapse collapse in">
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
                                                                    <tbody id='<?= $dato['idCaja'] ?>'>
                                                                        <?php foreach ($dato['detalles']->result() as $row): ?>
                                                                        <tr>
                                                                            <td> 
                                                                                <input type="hidden" id="No_Detalle" name="No_Detalle[]"   value="<?= $row->id ?>" required /> 
                                                                                <input type="hidden" id="No_Caja" name="No_Caja[]"   value="<?= $row->No_Caja ?>" required /> 
                                                                                <input type="hidden" id="idCaja" name="idCaja[]"   value="<?= $row->idCaja ?>" required /> 
                                                                                <input type="number" id="No_Carpeta" name="No_Carpeta[]"   value="<?= $row->No_Carpeta ?>" required /> 
                                                                            </td>
                                                                            <td> <input type="hidden" id="ot" name="ot[]"  class="form-control" value="<?= $row->ot ?>" required /> </td>
                                                                            <td> <input type="text" id="obra" name="obra[]" value="{obra}" required  disabled/> </td>
                                                                            <td> 
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" id="identificador" name="identificador[]"  class="form-control" value="<?= $row->clasificador ?>" required />
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                     <button type="button" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                                                </div>



                                                                            </td>
                                                                            <td> <input type="text" id="anio" name="anio[]" value="<?= $row->anio ?>" required disabled /> </td>
                                                                            <td> <input type="number" id="fojas" name="fojas[]" value="<?= $row->fojas ?>" required /> </td>
                                                                            <td>  
                                                                                 <table width="100%">

                                                                                    <tr>
                                                                                        <th> <input id="adm" name="adm[]" value="{adm}" type="checkbox" onchange="cambiar_valor(this, <?= $row->id ?>)"> </th>
                                                                                        <th> <input id="leg" name="leg[]" value="{leg}" type="checkbox" onchange="cambiar_valor(this, <?= $row->id ?>)"> </th>
                                                                                        <th> <input id="con" name="con[]" value="{con}" type="checkbox" onchange="cambiar_valor(this, <?= $row->id ?>)"> </th>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td> <input type="text" id="observaciones" name="observaciones[]" value="<?= $row->observaciones ?>" required /> </td>
                                                                            <td> <button type="button" class="btn btn-danger btn-sm" onclick="eliminar(this,<?= $row->id ?> )"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </td>
                                                                        </tr>
                                                                        <?php    endforeach; ?>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-success btn-sm" onclick="nuevaFila(<?= $dato['idCaja'] ?>)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                        <?php endforeach; */?>
                                
                                            
                                        
                                    </div>
                                </form>
                                
                                <textarea name="text-caja" id="text-caja" style="display:none">
                                    <div class="panel panel-info">
                                    
                                        <div class="panel-heading flex">
                                               <a class="panel-title"  data-toggle="collapse" data-parent="#panel" href="#div-caja-{idCaja}">Caja {numeroCaja} </a>
                                               <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_Caja(this,{idCaja} )"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </div>
                                    
                                       
                                        
                                        
                                            <div id="div-caja-{idCaja}" class="panel-collapse collapse in">
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
                                                            <tbody id='f_body_{idCaja}'>
                                                                
                                                               

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="nuevaFila({idCaja}, {numeroCaja})"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                    </div>
                                </textarea>
                                <textarea name="text-plantilla" id="text-plantilla" cols="30" rows="10" style="display:none">
                               
                                    <tr>
                                        <td> 
                                            <input type="hidden" id="No_Detalle" name="No_Detalle[]"   value="{idDetalle}" required /> 
                                            <input type="hidden" id="No_Caja" name="No_Caja[]"   value="{numeroCaja}" required /> 
                                            <input type="hidden" id="idCaja" name="idCaja[]"   value="{idCaja}" required /> 
                                            <input type="number" id="No_Carpeta" name="No_Carpeta[]"   value="{No_carpeta}" required /> 
                                        </td>
                                        <td id="td-{idDetalle}"> <input type="hidden" id="ot" name="ot[]"  class="form-control" value="{ot}" required /> </td>
                                        <td> <input type="text" id="obra{idDetalle}" name="obra[]" value="{obra}" required  disabled/> </td>
                                        <td> 
                                            <div class="col-sm-8">
                                                <input type="text" id="identificador" name="identificador[]"  class="form-control" value="{identificador}" required />
                                            </div>
                                            <div class="col-sm-3">
                                                 <button type="button" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                            </div>
                                           
                                           
                                            
                                        </td>
                                        <td> <input type="text" id="anio{idDetalle}" name="anio[]" value="{anio}" required disabled /> </td>
                                        <td> <input type="number" id="fojas" name="fojas[]" value="{fojas}" required /> </td>
                                        <td>  
                                             <table width="100%">

                                                <tr>
                                                    <th> <input id="adm" name="adm[]" value="{adm}" type="checkbox" onchange="cambiar_valor(this, {idDetalle})"> </th>
                                                    <th> <input id="leg" name="leg[]" value="{leg}" type="checkbox" onchange="cambiar_valor(this, {idDetalle})"> </th>
                                                    <th> <input id="con" name="con[]" value="{con}" type="checkbox" onchange="cambiar_valor(this, {idDetalle})"> </th>
                                                </tr>
                                            </table>
                                        </td>
                                        <td> <input type="text" id="observaciones" name="observaciones[]" value="{observaciones}" required /> </td>
                                        <td> <button type="button" class="btn btn-danger btn-sm" onclick="eliminar(this,{idDetalle} )"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </td>
                                    </tr>
                                </textarea>

                                

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
            
            var caja = 0;
            $(document).ready(function(){  
               
                
                //nuevaCaja($("#idTransferencia").val())
                inicializar ($("#idTransferencia").val());
                 
                $("#enviar").click(function() {
                    console.log($("#form-detalles").serialize())
                    $.post("<?php echo site_url("transferencia/guardar_detalles"); ?>",$("#form-detalles").serialize(),function(res){
                        console.log("Resultado" +res)
                        if(res ==1){
                            msj = "Transferencia guardada con exito";
                            $("#mensaje").css("color", "green");
                            $("#mensaje").html(msj)
                            $("#mensaje").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                            $("#mensaje").fadeOut(5000);
                        } else {
                            msj = "Error al guardar cambios";
                            $("#mensaje").css("color", "red");
                            $("#mensaje").html(msj)
                            $("#mensaje").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                            $("#mensaje").fadeOut(5000);
                            
                        }
                    });
                    
                    //event.preventDefault();
                });
                
                
               $("#orden_trabajo").select2({
                    placeholder: "Ingresa OT",
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
                
                
                $("#ot").select2({
                    placeholder: "Ingresa OT",
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
                        var idInicial = $("#ot").val();
                        return $.post( '<?php echo site_url("transferencia/ot_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                           
                        }, "json");
                     
                    }
                });
                
                
                
                $("#ot").change(function(){
                    console.log($("#ot").val());
                     //detalles()
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
             
             
            function inicializar(idTransferencia){
                $.post( "<?php echo site_url("transferencia/get_cajas"); ?>",{ idTransferencia:idTransferencia }, function( data ) {
                    console.log( data ); 
                    
                    for (var i=0; i < data.length; i++){
                        
                        //Pintar Cajas
                        obj = {};
                        obj.idCaja = data[i].id;
                        obj.numeroCaja = caja +1;
                        console.log(obj) 
                        agregarCaja(obj)
                        caja = caja +1
                        console.log(caja +" Cajas Totales")
                        //buscar Filas de la Caja
                        
                    
                        $.post( "<?php echo site_url("transferencia/get_detalles"); ?>",{ idCaja:data[i].id }, function( data ) {
                            console.log( data ); 

                            for (var j=0; j < data.length; j++){

                                //Pintar Filas
                                obj = {};
                                
                                obj.idDetalle = data[j].id;
                                obj.numeroCaja = data[j].No_Caja;
                                obj.idCaja = data[j].idCaja;
                                
                                if (data[j].No_Carpeta) {
                                     obj.No_carpeta = data[j].No_Carpeta;
                                } else {
                                     obj.No_carpeta =  "";
                                }
                                
                                
                                 
                                if (data[j].ot) {
                                    obj.ot = data[j].ot;
                                } else {
                                     obj.ot =  "";
                                }
                                
                                if (data[j].Obra) {
                                     obj.obra = data[j].Obra;
                                } else {
                                     obj.obra =  "";
                                }
                                
                                if (data[j].clasificador) {
                                     obj.identificador = data[j].clasificador;
                                } else {
                                     obj.identificador=  "";
                                }
                                
                                if (data[j].idEjercicio) {
                                      obj.anio = data[j].idEjercicio;
                                } else {
                                      obj.anio =  "";
                                }
                                
                                if (data[j].fojas) {
                                      obj.fojas = data[j].fojas;
                                } else {
                                      obj.fojas =  "";
                                }
                                
                                obj.adm = data[j].adm;
                                obj.leg = data[j].leg;
                                obj.con = data[j].con;
                                
                                if (data[j].observaciones) {
                                      obj.observaciones = data[j].observaciones;
                                } else {
                                      obj.observaciones =  "";
                                }
                                
                                

                                console.log(obj)
                                agregarFila(obj, data[j].idCaja);


                                //buscar Filas de la Caja

                            }

                        }, "json");
                    }

                }, "json");
                
            }
             
            
            function alert_confirm(type, title, content){
                $.confirm({
                    title: title,
                    content: content,
                    type: type,
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Aceptar',
                            btnClass: 'btn-orange',
                            action: function(){
                                return true;
                            }
                        },
                        close: function () {
                            return false;
                        }
                    }
                });
            }
            
            function traer_detalles(elemento, ot){
                
                console.log(ot + " OT")
                $.post( "<?php echo site_url("transferencia/traer_detalles"); ?>",{ ot:ot }, function( data ) {
                    console.log( data ); 
                    console.log(elemento);
                    
                    obra = elemento.find("#obra")
                    obra.val(data.Obra);
                    anio = elemento.find("#anio")
                    anio.val(data.idEjercicio);
                    
                    
                    
                    obra.css("background", "#fcf8e3")
                    anio.css("background", "#fcf8e3")
                   
                }, "json");
                
            
            
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
            
            function nuevaCaja(id){
                caja = caja + 1
                
                $.post("<?php echo site_url('transferencia/nuevaCaja'); ?>/", 
                    { id: id },
                    function(data) {
                        console.log(data)
                        if (data > 0){
                            obj = {};
                            obj.idCaja = data;
                            obj.numeroCaja = caja;
                            console.log(obj)
           
                            agregarCaja(obj);
                            nuevaFila(data, caja);
                            $("#cajas_total").val(caja)
                        } else {
                            alert("Error al agregar caja, intentalo nuevamente")
                        }
                    },
                    "json"
                ); 
        
                
            }
            
            
            //Visualmente
            function agregarCaja(obj){
                
               /*
                * function addDiv() {
                    var objTo = document.getElementById('container')
                    var divtest = document.createElement("div");
                    divtest.innerHTML = "new div"
                    objTo.appendChild(divtest)
                }
                */
    
                div = document.createElement('div');
            
                div_contenido = $('#text-caja').val();
                
                //Como ocpamos 4 veces la propiedad 
                for(i=0 ; i <5 ;i++){
                    for( prop in obj){
                        console.log(prop  + "  " +  obj[prop]);
                        div_contenido = div_contenido.replace('{'+prop+'}', obj[prop]);

                    }
                }
                
                //console.log(div_contenido)
                div.innerHTML = div_contenido;
                
                document.getElementById('div-cajas').appendChild(div);
                $("#div-cajas").css("display", "block")
            }
 
            function nuevaFila(idCaja, noCaja){
                
                $.post("<?php echo site_url('transferencia/nuevaFila'); ?>/", 
                    { idCaja: idCaja },
                    function(data) {
                        //console.log(data)
                        if (data > 0){
                            obj = {};
                            obj.idDetalle = data;
                            obj.numeroCaja = noCaja;
                            obj.idCaja = idCaja;
                            obj.No_carpeta = "";
                            obj.ot ="";
                            obj.obra = "";
                            obj.identificador = "";
                            obj.anio = "";
                            obj.fojas = "";
                            obj.adm = 0;
                            obj.leg = 0;
                            obj.con = 0;
                            obj.observaciones = "";

                            console.log(obj)
                            agregarFila(obj, idCaja);

                            
                        } else {
                            alert("Error al agregar caja, intentalo nuevamente")
                        }
                    },
                    "json"
                ); 
        
               
            }
            

            function agregarFila(obj, idCaja){
                
                tr = document.createElement('tr');
                cont = $('#text-plantilla').val();
                
                for(i=0 ; i <8;i++){
                    for( prop in obj){
                        
                        cont = cont.replace('{'+prop+'}', obj[prop]);
                        
                       
               
                    }
                }
                
                
                console.log (cont)       
                tr.innerHTML = cont;

                document.getElementById('f_body_'+idCaja).appendChild(tr);
                idDetalle = obj.idDetalle;
                
                
                
                $("#td-" + idDetalle + " #ot").select2({
                    placeholder: "Ingresa OT",
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
                        var idInicial = $("#td-" + idDetalle + " #ot").val();
                        return $.post( '<?php echo site_url("transferencia/ot_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                           
                        }, "json");
                     
                    }
                });
                
                
                //Change 
                $("#td-" + idDetalle + " #ot").change(function(){
                    console.log ("cambiando" + idDetalle)
                    
                    ot = $("#td-" + idDetalle + " #ot").val();
                    elemento = $("#td-" + idDetalle).parent();
                    elemento.css("background", "blue")
                    console.log(elemento)
                    console.log(ot + " Orden t")
                    traer_detalles(elemento,  ot)
                });
                
                //Poner Checked 
                
                elemento = $("#td-" + idDetalle).parent();
                console.log(elemento)


                elem_adm = elemento.find("#adm")
                if (elem_adm.val() == 1 )elem_adm.prop('checked', true )


                elem_leg = elemento.find("#leg")
                if (elem_leg.val() == 1 ) elem_leg.prop('checked', true )



                elem_con = elemento.find("#con")
                if (elem_con.val() == 1 ) elem_con.prop('checked', true )
               
                
            }
            
            function eliminar(btn, idDetalle){
                
                $.confirm({
                title: 'Eliminar Registro',
                content: '¿Deseas Eliminar el Registro?',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                    Si: function () {
                        $.post("<?php echo site_url('transferencia/eliminarFila'); ?>/", 
                            { idDetalle: idDetalle},
                            function(data) {
                                console.log(data)
                                if (data > 0){
                                   registro = btn.parentNode.parentNode;
                                   registro.parentNode.removeChild(registro);


                                } else {
                                    alert("Error al Eliminar registro, intentalo nuevamente")
                                }
                            }
                        ); 
                         
                    },
                    No: function () {
                        //$.alert('Canceled!');
                    }
                    
                }});
                
                
            }
            
            
            function eliminar_Caja(btn, idCaja){
                
                $.confirm({
                title: 'Eliminar Registro',
                content: '¿Deseas Eliminar la Caja junto con sus documentos?',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                    Si: function () {
                        $.post("<?php echo site_url('transferencia/eliminarCaja'); ?>/", 
                            { idCaja: idCaja},
                            function(data) {
                                console.log(data)
                                if (data > 0){
                                   registro = btn.parentNode.parentNode;
                                   console.log(registro)
                                   registro.parentNode.removeChild(registro);
                                   caja = caja -1

                                } else {
                                    alert("Error al Eliminar caja, intentalo nuevamente")
                                }
                            }
                        ); 
                         
                    },
                    No: function () {
                        //$.alert('Canceled!');
                    }
                    
                }});
                
                
            }
            
            function cambiar_valor(elemento, idDetalle){
            
                if(elemento.checked){
                    console.log(elemento.id)
                    elemento.value = 1;
                    valor = 1
                } else{
                    elemento.value = 0;
                    valor = 0
                }
                $.post("<?php echo site_url('transferencia/editarCheck'); ?>/", 
                            { valor: valor, id : elemento.id, idDetalle : idDetalle},
                            function(data) {
                                console.log(data)
                                
                            }
                        ); 
                
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
