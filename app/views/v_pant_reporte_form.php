<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            <?php if (isset($title)) echo $title; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if (isset($meta)) echo meta($meta); ?>

        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="<?php echo site_url(); ?>less/responsive.less" type="text/css" /-->
        <!--script src="<?php echo site_url(); ?>js/less-1.3.3.min.js"></script-->
        <!--append '#!watch' to the browser URL, then refresh the page. -->

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/datatables.css" rel="stylesheet">

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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>

        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script>       
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
  
 <script type="text/javascript">
        
        
        function nuevo_tipo_anexo(){
            $("#modal-nuevo_tipo_anexo").modal('show');    
        }
        
        function estatus(idArchivoo, idTDd, idProceso, idSubproceso){
                $("#idEstatusE").val('');
                $("#idTitularidadE").val('');
                $("#idTpDocuest").val(idTDd);
                $("#idProceso_est").val(idProceso);
                $("#idSubProceso_est").val(idSubproceso);
                
            var parametros = {
                "idArchivoo" : idArchivoo,
                "idTpDocc" : idTDd,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/estatus"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#idEstatusE").val(data['idEstatus']);
                    $("#idTitularidadE").val(data['idTitularidad']);
                }
            });
            //alert(idArchivo)
            //alert(idProceso)
            //alert(idSubproceso)
            //alert(idTD)
            $("#modal-estatus").modal('show');    
        }
        
        function ubicacion_fisica(idArchivo, idTD, idProceso, idSubproceso){
                $("#ColumnaA").val('');
                $("#FilaA").val('');
                $("#CarpetaA").val('');
                $("#MetadatoO").val('');
                
                $("#idProceso_uf").val(idProceso);
                $("#idSubProceso_uf").val(idSubproceso);
                
            //alert(idArchivo)
            //alert(idProceso)
            //alert(idSubproceso)
            //alert(idTD)
            var parametros = {
                "idArchivo" : idArchivo,
                "idTpDoc" : idTD,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/ubicacion"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#ColumnaA").val(data['Columna']);
                    $("#FilaA").val(data['Fila']);
                    $("#CarpetaA").val(data['Carpeta']);
                    $("#MetadatoO").val(data['Metadato']);
                }
            });
            
            $("#idTpDocub").val(idTD);
            $("#modal-ubicacion_fisica").modal('show');    
        }
        
        
        function nuevo_doc_anexo(idArchivo,idRelDocumento,idProceso,idSubProceso, idDoc){
            var Es_Estimacion = 0;
            var Es_Prorroga = 0;
            var SubDoc = false;
            $("#idDocumento_anexo").val(idRelDocumento);
            $("#idArchivo_anexo").val(idArchivo);
            $("#idProceso_anexo").val(idProceso);
            $("#idSubProceso_anexo").val(idSubProceso);
            
            $("#idDoc_anexo").val(idDoc);
            
            
            
                    
            var parametros = {
                "idDoc" : idDoc
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/Tipo_Documento"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (datan) {
                    Es_Estimacion = datan['Es_Estimacion'];
                    Es_Prorroga = datan['Es_Prorroga'];
                    SubDoc = datan['SubDocs'];
                    $("#Es_Estimacion_idd").val(datan['Es_Estimacion']);
                    $("#Es_Prorroga_idd").val(datan['Es_Prorroga']);
                    
                    if(Es_Estimacion == '1'){
                        document.getElementById('Estm_Prorr').style.display = 'block';
                        document.getElementById('Es_Estimacion_id').style.display = 'block';
                        document.getElementById('Es_Prorroga_id').style.display = 'none';
                    }else if(Es_Prorroga == '1'){
                        document.getElementById('Estm_Prorr').style.display = 'block';
                        document.getElementById('Es_Prorroga_id').style.display = 'block';
                        document.getElementById('Es_Estimacion_id').style.display = 'none';
                    }else{
                        document.getElementById('Estm_Prorr').style.display = 'none';
                    }
                  
                }
            });
           
            
            
                id=idDoc;
                
              
                var subdocumento=0;
                $.ajax({
                    url: "<?php echo site_url('archivo/no_subdocumento'); ?>/" + idDoc,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                         subdocumento = data['numero'];
                         
                         if (subdocumento >0){ 
                             document.getElementById('presenta_subdocumentos').style.display = 'block';
                         }else{
                             document.getElementById('presenta_subdocumentos').style.display = 'none';
                         }
                    }  
                });
                
               
            
            $("#modal-nuevo_anexo").modal('show');    
        }
        
        
        
         function modificar_listado_sub_documentos_mod()
            {
                
               
                
                id=$("#idDoc_anexo").val();
                
                
               
                
                $.ajax({
                    url: "<?php echo site_url('archivo/listado_sub_documentos_mod'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#listado_sub_documentos_mod").html(data);
                    }
                });
                
                
            }
        
        
        
        function modificar_sub_documento_mod(id)
            {
                $("#idSubDocumento_mod").val(id);
                $("#modal-cambiar-sub-documentos-mod").modal('hide');
               
               
                
                
               

                
                
                $.ajax({
                    url: "<?php echo site_url('archivo/datos_subdocumento'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        var subdocumento =data['Nombre'];
                        $("#subdocumento_mod").html(subdocumento);
                    }
                });
            }
        
        
        function mostrar_Estim(){
            if(document.getElementById('m_c_estim').style.display === 'block'){
                document.getElementById('m_c_estim').style.display = 'none';
                document.getElementById('Es_Prorroga_id').style.display = 'block';
            }else{
                document.getElementById('m_c_estim').style.display = 'block';
                document.getElementById('Es_Prorroga_id').style.display = 'none';
            }
        }
        function mostrar_Prorr(){
            if(document.getElementById('m_c_prorr').style.display === 'block'){
                document.getElementById('m_c_prorr').style.display = 'none';
                document.getElementById('Es_Estimacion_id').style.display = 'block';
            }else{
                document.getElementById('m_c_prorr').style.display = 'block';
                document.getElementById('Es_Estimacion_id').style.display = 'none';
            }
        }
        
        
        
        function numeroAleatorio(min, max){
          return Math.round(Math.random() * (max - min) + min);
        }
        
        function addfile_individual(){
            idDoc = numeroAleatorio(1, 1000000);
            var xx = document.createElement("INPUT");
            xx.setAttribute("type", "file");
            xx.setAttribute("name", "docfile[]");
            xx.setAttribute("class", "form-control");
            xx.setAttribute("id", idDoc);
            xx.setAttribute("required", "");
            document.getElementById('crearfile').appendChild(xx);

            var texto = document.createTextNode("Quitar Documento");
            var xxx = document.createElement("BUTTON");
            xxx.setAttribute("type", "button");
            xxx.setAttribute("onclick", "eliminar("+idDoc+")");
            xxx.setAttribute("class", "btn btn-danger");
            xxx.setAttribute("value", "Borrar");
            xxx.setAttribute("title", "Borrar");
            xxx.setAttribute("id", idDoc);
            xxx.appendChild(texto);
            document.getElementById('crearfile').appendChild(xxx);

            var x = document.createElement("br");
            x.setAttribute("id", idDoc);
            document.getElementById('crearfile').appendChild(x);
        }
        
        function eliminar(nodo_name){
            if(document.getElementById(nodo_name)){
                var x = document.getElementById(nodo_name);
                x.parentNode.removeChild(x);
                eliminar(nodo_name);
            }else{
                //alert("se removio el nodo:"+nodo_name);
            }
        }
        
        function uf_modificar_archivo(id){
            $("#idCatalogo").val(id);
                //var marcado = $("#chkStatus").prop("checked") ? true : false;
                $.ajax({
                    url: "<?php echo site_url('archivo/datos_archivo') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        $("#OrdenTrabajo_mod").val(data['OrdenTrabajo']);
                        $("#Contrato_mod").val(data['Contrato']);
                        $("#Obra_mod").val(data['Obra']);
                        $("#Descripcion_mod").val(data['Descripcion']);
                        $("#FondodePrograma_mod").val(data['FondodePrograma']);
                        $("#Normatividad_mod").val(data['Normatividad']);
                        $("#idModalidad_mod").val(data['idModalidad']);
                        $("#idEjercicio_mod").val(data['idEjercicio']);
                        
                        
                        
                         
                        
                         
                    }
                });
                
        }
        
      </script>
      <style>
          .text-end{
              text-align: end;
          }
          .text-star{
              text-align: start;
          }
      </style>
      
      <body>
        
           <!-- Menu Superior -->
         <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>     
          
                <!-- Contenido Principal -->
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                <div class="col-md-12 column">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                        <li class="active">Archivo </li>
                    </ol>
                </div>
                <!-- breadcrumb -->
            </div>
            <!-- Panel Principal Datos de la obra -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-566826">Datos de la Obra</a>
                </div>
                        <div id="panel-element-566826" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <!-- Panel de Control Danger-->
                                    <div class="col-md-10">
                                        <div class="tab-pane" id="panel-Vales">
                                                
                                            <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">Datos Generales</div>

                                                <div class="row panel-body">

                                                    <div class="col-md-4">
                                                        <dl class="row">
                                                            <dt class="col-md-6 text-end">Orden Trabajo</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['OrdenTrabajo']; ?></dd>
                                                            <dt class="col-md-6 text-end">Contrato </dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['Contrato']; ?></dd>
                                                            <dt class="col-md-6 text-end">Obra</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['Obra']; ?></dd>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <dl class="row">
                                                            <dt class="col-md-6 text-end">Modalidad</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $addw_modalidades[$aArchivo['idModalidad']]; ?></dd>
                                                            <dt class="col-md-6 text-end">Ejercicio </dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['idEjercicio']; ?></dd>
                                                            <dt class="col-md-6 text-end">Normatividad</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['Normatividad']; ?></dd>

                                                    </div>


                                                    <div class="col-md-4">
                                                        <dl class="row">
                                                           
                                                            <dt class="col-md-6 text-end">Fondo de Programa </dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['FondodePrograma']; ?></dd>
                                                            
                                                    </div>
                                                    
                                                </div>
                                                <div class="panel-footer text-end">
                                                    <a href="#" class="btn btn-success" title=""  data-toggle="modal" data-target="#modal-modificar-archivo" role="button" onclick="uf_modificar_archivo(<?php echo $aArchivo['id'];  ?>)">
                                                        <i class="glyphicon glyphicon-pencil"></i> Modificar
                                                    </a>
                                                                        
                                                    
                                                    
                                                </div>
                                                
                                            </div> <!--Fin panel-->
                                            </div>
                                            </div>
                                            
                                        </dl>
                                    </div>
                                    
                                   
                                    
                            </div>
                                
                    </div>
                </div>
                
                
                
            </div> <!--Fin panel principal obras-->
            
            <!-- Dialogo Modificar Car -->
            <div class="modal fade" id="modal-modificar-archivo" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Modificar Archivo</h4>
                        </div>
                        <form action="<?php echo site_url("archivo/modificar_archivo"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="modal-body">



                                
                                
                                <div class="form-group">
                                    <label for="OrdenTrabajo" class="control-label col-sm-3">Orden de Trabajo:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="OrdenTrabajo_mod" name="OrdenTrabajo_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="Contrato" class="control-label col-sm-3">Contrato:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="Contrato_mod" name="Contrato_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Obra" class="control-label col-sm-3">Obra:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="Obra_mod" name="Obra_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Descripcion" class="control-label col-sm-3">Descripción:</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control input-sm" rows="3" id="Descripcion_mod" name="Descripcion_mod"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="FondodePrograma" class="control-label col-sm-3">Fondo de Programa:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="FondodePrograma_mod" name="FondodePrograma_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Normatividad" class="control-label col-sm-3">Normatividad:</label>
                                    <div class="col-sm-7">
                                        <select id="Normatividad_mod" name="Normatividad_mod" class="form-control">
                                            <option value="FEDERAL">Federal</option>
                                            <option value="ESTATAL">Estatal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Modalidad" class="control-label col-sm-3">Modalidad:</label>
                                    <div class="col-sm-7">
                                        <?php echo form_dropdown('idModalidad_mod', $Modalidades, '', 'class="form-control input-sm" id="idModalidad_mod" name="idModalidad_mod"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Ejercicio:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="idEjercicio_mod" name="idEjercicio_mod" value="" class="form-control input-sm" required maxlength="4" minlength="4" />     
                                        
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
            </div>       <!-- Modificar archivo --> 
         
     
            
        <?php
        if (isset($qProcesos)) {
            if ($qProcesos->num_rows() > 0) {
                foreach ($qProcesos->result() as $rRow) {
                       
                    ?>
                    
           <!-- $idProceso,$idSubProceso,$idDocumento -->
          
           <?php  
                $strin="  ";
               
                if ($rRow->id==$idProceso){
                    $strin=" in ";
                   
                }
                
           ?>
           
        <div class="row clearfix">
                <div class="panel-group" id="panel-proceso-<?php echo $rRow->id;  ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-proceso-<?php echo $rRow->id;  ?>" href="#panel-element-proceso-<?php echo $rRow->id;  ?>"><?php echo $rRow->Nombre;  ?></a> </div>
                        <div id="panel-element-proceso-<?php echo $rRow->id;  ?>" class="panel-collapse collapse <?php  echo $strin; ?>">
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                       
                                                <?php
                                                
                    $qSubProcesos = $this->ferfunc->get_subreg("saaSubTipoProceso",array("idTipoProceso" => $rRow->id));
                                
                                                
        if (isset($qSubProcesos)) {
            if ($qSubProcesos->num_rows() > 0) {
                foreach ($qSubProcesos->result() as $rRowSubProcesos) {
                       
                    ?>
                    
                <?php  
                $strin_subproceso="  ";
               
                if ($rRowSubProcesos->id==$idSubProceso){
                    $strin_subproceso=" in ";
                    
                }
           
           ?>                     
                                        
                                        
        <?php
        $qDocumentos = $this->ferfunc->get_subreg("saaRel_Archivo_Documento INNER JOIN saaDocumentos ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id",array("saaDocumentos.idSubTipoProceso" => $rRowSubProcesos->id,"saaRel_Archivo_Documento.idArchivo" => $idArchivo),"saaRel_Archivo_Documento.id, saaDocumentos.id as idDoc, saaDocumentos.Nombre");
        if (isset($qDocumentos)) {
            if ($qDocumentos->num_rows() > 0) {
        ?>
                <div class="panel-group" id="panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>" href="#panel-element-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>"><?php echo $rRowSubProcesos->Nombre;  ?></a> </div>
                        <div id="panel-element-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>" class="panel-collapse collapse <?php echo $strin_subproceso;  ?>">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                      
                                        <?php
                                                
       
                foreach ($qDocumentos->result() as $rRowDocumentos) {
                       
                    ?>
                        
       
                    <?php  
                         $strin_documento="  ";
                        
                         if ($rRowDocumentos->id==$idDocumento){
                             $strin_documento=" in ";
                             
                         }

                    ?>                             
                   
                                        
                                        
                                        
                                        
                                        
                <div class="panel-group" id="panel-documentos-<?php echo $rRowDocumentos->id;  ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRowDocumentos->id;  ?>" href="#panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>"><?php echo $rRowDocumentos->Nombre;  ?></a> </div>
                        <div id="panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>" class="panel-collapse collapse <?php echo $strin_documento;  ?>">
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                        <section id="<?php echo "section_".$rRowDocumentos->id; ?>">
                                        <table>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?= $idArchivo; ?>, <?= $rRowDocumentos->id; ?>,<?= $rRow->id; ?>,<?= $rRowSubProcesos->id;?>, <?= $rRowDocumentos->idDoc; ?>)" type="button" >
                                                        <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                                                    </button>&nbsp;
                                                    <button class="btn btn-success dropdown-toggle" onclick="ubicacion_fisica(<?= $idArchivo; ?>, <?= $rRowDocumentos->id; ?>,<?= $rRow->id; ?>,<?= $rRowSubProcesos->id; ?>)" type="button" >
                                                        <span class="glyphicon glyphicon-pencil" title="Ubicacion Fisica" ></span> Modificar Ubicacion Fisica
                                                    </button>&nbsp;
                                                    <button class="btn btn-success dropdown-toggle" onclick="estatus(<?= $idArchivo; ?>, <?= $rRowDocumentos->id; ?>, <?= $rRow->id; ?>, <?= $rRowSubProcesos->id; ?>)" type="button" >
                                                        <span class="glyphicon glyphicon-eye-open" title="Estatus" ></span> Estatus
                                                    </button><br>
                                                </td>
                                            </tr>
                                        </table>
                                            
                                        <?php
                                        
                                        $qEjercicio = $this->ferfunc->get_subreg("Ejercicios",array("id" =>$aArchivo['idEjercicio']));
                                        $aEjercicio=$qEjercicio->row_array();
                                            
                                            
                                        $tabla="saaDocumentosAnexos_".$aEjercicio['Anyo'];
                                        
                                         $qEstimaciones = $this->ferfunc->get_subreg_distinct($tabla, "idRel_Archivo_Documento =" . $rRowDocumentos->id, " Numero_Estimacion, Es_Estimacion, Es_Prorroga " );

                                          if (isset($qEstimaciones)) {
                                              if ($qEstimaciones->num_rows() > 0) {
                                                  foreach ($qEstimaciones->result() as $rRowEstimaciones) {

                                         ?>
                                            
                            <?php  
                            
                           
                                    $strEstimacion_in="  ";
                                    if ($rRowEstimaciones->Numero_Estimacion==$Numero_Estimacion){
                                        $strEstimacion_in=" in ";
                                    }
           ?>        
                <div class="panel-group" id="panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php if($rRowEstimaciones->Es_Prorroga == 1){  ?>
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" href="#panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
                                Prorr-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>
                            </a>
                        <?php }else if($rRowEstimaciones->Es_Estimacion == 1){  ?>
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" href="#panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
                                Est-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>
                            </a>
                        <?php }else{  ?>
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" href="#panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
                                
                            </a>
                        <?php } ?>
                        </div>
                        <?php if($rRowEstimaciones->Es_Prorroga != 1 && $rRowEstimaciones->Es_Estimacion != 1){ ?>
                            <div id="panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" class="panel-collapse collapse in">
                        <?php }else{ ?>
                            <div id="panel-element-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>" class="panel-collapse collapse <?php  echo $strEstimacion_in; ?>">
                        <?php } ?>    
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                                                         
                                            <?php
                                            $qDocumentosAnexos = $this->ferfunc->get_subreg($tabla,array("idRel_Archivo_Documento" => $rRowDocumentos->id,"Numero_Estimacion"=>$rRowEstimaciones->Numero_Estimacion));
                                            
                                             if (isset($qDocumentosAnexos)) {
                                                 if ($qDocumentosAnexos->num_rows() > 0) { ?>
                                                    <table class="table table-striped table-bordered table-hover text-center">
                                                        <tr>
                                                            <!--th>
                                                                Tipo Documento
                                                            </th-->
                                                            <th>
                                                                Accion
                                                            </th>
                                                             <th>
                                                                Nombre de Archivo
                                                            </th>
                                                        </tr>
                                                <?php foreach ($qDocumentosAnexos->result() as $rRow_anexos) { ?>
                                            
                                                <tr>
                                                    <!--td>
                                                        <?php
                                                        echo $rRow_anexos->Documento;
                                                        ?>        
                                                    </td-->
                                                     <td>
                                                        <a href="<?=site_url('archivo/verDoc/'.$rRow_anexos->id.'/'.$aArchivo['idEjercicio'])?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                        <a href="<?=site_url('archivo/descargarDoc/'.$rRow_anexos->id.'/'.$aArchivo['idEjercicio'])?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                        <a href="<?=site_url('archivo/delete_doc_anexo/'.$rRow_anexos->id.'/'.$aArchivo['idEjercicio'])?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $rRow_anexos->nombrearchivo;
                                                        ?>
                                                    </td>
                                                </tr>
                                            

                                                <?php }
                                                     ?>
                                                    </table>
                                                <?php  
                                                }
                                            }
                                            ?>   

                                        
                                        
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                                        <?php
                                                //  }
                                        
                                            
                                       
                                                    }
                                                }
                                            }
                                            ?>         
                                            
                                            
                                             
                                    
                                        
                                            
                                        </section>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
           

      <?php
           
    }
    ?>           
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
           
         <?php
            }
    }
    ?>                                     
                                        

      <?php
            }
        }
    }
    ?>           

                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

      <?php
            }
        }
    }
    ?>           
    
   </div>        
           
           
          
   <!-- Ubicacion Fisica -->
    <div class="modal fade" id="modal-ubicacion_fisica" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Ubicacion Fisica:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/4'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idTpDocub" name="idTpDocub" value="" />
                        <input type="hidden" id="idProceso_uf" name="idProceso_uf" value="" />
                        <input type="hidden" id="idSubProceso_uf" name="idSubProceso_uf" value="" />
                        
                        <div class="form-group">
                            <label for="Columna" class="control-label col-sm-4 text-right">Columna:</label>
                            <div class="col-sm-5">
                                <input type="text" id="ColumnaA" name="Columna" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fila" class="control-label col-sm-4 text-right">Fila:</label>
                            <div class="col-sm-5">
                                <input type="text" id="FilaA" name="Fila" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Carpeta" class="control-label col-sm-4 text-right">Carpeta:</label>
                            <div class="col-sm-5">
                                <input type="text" id="CarpetaA" name="Carpeta" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Metadato" class="control-label col-sm-4 text-right">Metadato:</label>
                            <div class="col-sm-5">
                                <input type="text" id="MetadatoO" name="Metadato" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center><br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
        
    <!-- Selecciona los Documentos -->
    <div class="modal fade" id="modal-nuevo_anexo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Selecciona los Documentos </h4>
                </div>
                <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/3'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                    <div class="modal-body">
                        
                        <input type="" id="idDocumento_anexo" name="idDocumento_anexo" value="" />
                        
                        <input type="" id="idArchivo_anexo" name="idArchivo_anexo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="" id="idEjercicio_anexo" name="idEjercicio_anexo" value="<?=$aArchivo['idEjercicio'];?>" />
                        <input type="" id="idProceso_anexo" name="idProceso_anexo" value="" />
                        <input type="" id="idSubProceso_anexo" name="idSubProceso_anexo" value="" />
                        
                        <input type="" id="idDoc_anexo" name="idDoc_anexo" value="" />
                        
                        <div class="form-group">
                            <label for="idSubDocumento_mod" class="col-sm-3 control-label">Cargar Documento</label>
                            <div class="col-sm-7">
                                <input type="file" id="docfile" name="docfile[]" class="form-control" multiple="true" required=""/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="idSubDocumento_mod" class="col-sm-3 control-label">Sub Documento</label>	
                             <div class="col-sm-7"> 
                                <div class="form-control" id="subdocumento_mod"></div>
                                <input type="hidden" name="idSubDocumento_mod" id="idSubDocumento_mod" required value="0">
                             </div>
                             <div class="col-sm-2">    
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-sub-documentos-mod" onclick="modificar_listado_sub_documentos_mod()" >
                                    <em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar
                                </button>
                            </div>
                        </div> 
                        <div class="form-group">
                            <input type="" name="Es_Estimacion" id="Es_Estimacion_idd" value="0" class="form-control">
                            <label for="idSubDocumento_mod" class="col-sm-3 control-label">Sub Documento</label>	
                             <div class="col-sm-7"> 
                                <div class="form-control" id="subdocumento_mod"></div>
                                <input type="hidden" name="idSubDocumento_mod" id="idSubDocumento_mod" required value="0">
                             </div>
                             <div class="col-sm-2">    
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-sub-documentos-mod" onclick="modificar_listado_sub_documentos_mod()" >
                                    <em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar
                                </button>
                            </div>
                        </div> 

                    </div> <!--Fin modal body -->
                <div class="form-group text-center">
                   
                        
                        
                        <div  class="form-group" ><br>
                            
                        </div>
                        
                        
                         <div  id="presenta_subdocumentos" style='display:none;'><br>
                        
                            <div class="form-group">
                                       <label for="idSubDocumento_mod" class="col-sm-3 control-label">Sub Documento</label>	
                                        <div class="col-sm-7"> 
                                           <div class="form-control" id="subdocumento_mod"></div><input type="hidden" name="idSubDocumento_mod" id="idSubDocumento_mod" required value="0">
                                            </div>
                                        <div class="col-sm-2">    
                                           <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-sub-documentos-mod" onclick="modificar_listado_sub_documentos_mod()" ><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                       </div>
                           </div> 
                       
                        </div>     
                             
                        <div  class="form-group" id="Estm_Prorr" style='display:none;'><br>
                            <div class="col-sm-12 text-center" id="Es_Estimacion_id">
                                <p><strong>Estimacion</strong></p>
                                <input type="hidden" name="Es_Estimacion" id="Es_Estimacion_idd" value="0" class="form-control"><br><br>
                                <div id='m_c_estim'>
                                    
                                    <div class="col-sm-6">
                                        Numero Estimacion
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" id="Numero_Estimacion" name="Numero_Estimacion" class="form-control" />
                                    </div>
                                   
                                    
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center" id="Es_Prorroga_id">
                                <p><strong>Prorroga</strong></p>
                                <input type="hidden" name="Es_Prorroga" id="Es_Prorroga_idd" value="0" class="form-control"><br><br>
                                <div id='m_c_prorr'>
                                    
                                    <div class="col-sm-6">
                                        Numero Prorroga
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" id="Numero_Estimacion" name="Numero_Prorroga" class="form-control" />
                                    </div>
                                    
                                   
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        

                        
                        
                        
          

                        
                        <!--div  class="form-group" ><br>
                            <div class="col-sm-12 text-center" id="prueba_tpdoc">
                                <p><strong>Prueba</strong></p>

                                <div class="col-sm-6">
                                    Prorroga
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="PEst" name="p" class="form-control" readonly="" />
                                </div>

                                <div class="col-sm-6">
                                    Estimacion
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="PPro" name="p" class="form-control" readonly="" />
                                </div>

                            </div>
                        </div-->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <br><br><br>
                                <center>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
    <!-- Estatus del Documento -->
    <div class="modal fade" id="modal-estatus" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Estatus del Documento:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/5'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $idArchivo; ?>" />
                        <input type="hidden" id="idTpDocuest" name="idTpDocuest" value="" />
                        <input type="hidden" id="idProceso_est" name="idProceso_est" value="" />
                        <input type="hidden" id="idSubProceso_est" name="idSubProceso_est" value="" />
                        
                        <div class="form-group"><br><br>
                            <div class="col-sm-12">
                                 <div class="col-sm-6">
                                    <label for="Columna" class="control-label text-right">Estatus del Documento:</label>
                                </div>
                                <div class="col-sm-6">
                                    <!--input type="text" id="idEstatusE" name="idEstatusE" value="" /-->
                                    <?= form_dropdown('idEstatus', $Estatus_select, '', 'class="form-control" id="idEstatusE" '); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Columna" class="control-label text-right">Titularidad:</label>
                                </div>
                                <div class="col-sm-6">
                                    <!--input type="text" id="idTitularidadE" name="idTitularidadE" value="" /-->
                                    <?=form_dropdown('idTitularidad', $Titularidades, '', 'class="form-control" id="idTitularidadE" '); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center><br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
    
    
                    <!--Cambiar Sub Documento -->    
        <div class="modal fade" id="modal-cambiar-sub-documentos-mod" role="dialog" aria-labelledby="myModalLabel-cambiar-sub-documentos-mod" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Sub Documentos</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Sub Documentos</label><br>
                                <div class="col-sm-12">
                                   <div id="listado_sub_documentos_mod">
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

    
          
</body>
</html>


<?php /*

<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Editar Archivo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo site_url(); ?>css/bootstrap.min.css" rel="stylesheet">      
        <link href="<?php echo site_url(); ?>css/fileinput.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/style.css" rel="stylesheet">

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
        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap-typeahead.min.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/fileinput.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/datatables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2.min.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2_locale_es.js"></script>

        <script language='JavaScript' type='text/javascript'>
            var _isDirty = false;
            //var ot_listado;
            $(document).ready(function() {
                
                $("#documentost").select2({
                    placeholder: "Selecciona Documento",
                    ajax: {
                        url: '<?php echo site_url("archivo/documentos_json"); ?>',
                        dataType: 'json',
                        quietMillis: 100,
                        type: 'POST',
                        data: function (term) {
                            return {
                                term: term, //search term
                                id_plantilla: <?=$Id_Plantilla;?> // page size                               
                            };
                        },
                        results: function (data, page) {
                            return { results: data.results };
                        }
                    },
                    initSelection: function(element, callback) {
                        var idInicial = $("#documentost").val();
                        return $.post( '<?php echo site_url("archivo/documentos_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                        }, "json");
                    }
                });
                
                $("#documentost").on("change", function() {
                    var documentont = $("#documentost").val(); 
                    if (documentont!="sindoc"){
                        $("#enviado").val(1); 
                        agregar(documentont);
                    }
                });
                
                
            });
             
            function agregar(iddoc){
                var y = document.getElementById(iddoc);
                if(!y){
                    var x;
                    var parametros = {
                        "iddoc" : iddoc
                    };
                    $.ajax({
                        data:  parametros,
                        url:   '<?php echo site_url("archivo/returndocdesrip"); ?>',
                        dataType: 'json',
                        quietMillis: 100,
                        type:  'POST',                                
                        success:  function (response) {
                            x = document.createElement("INPUT");
                            x.setAttribute("type", "text");
                            x.setAttribute("value", response);
                            x.setAttribute("readonly", "");
                            x.setAttribute("class", "form-control");
                            x.setAttribute("name", "visual"+iddoc+"");
                            x.setAttribute("id", iddoc);
                            x.setAttribute("onclick", "eliminar("+iddoc+")");
                            document.getElementById('docs').appendChild(x);
                            addfile(iddoc);
                        }
                    });
                }else{
                    alert('Ya fue seleccionado');
                }
            }
                
            function addfile(iddoc){
                var xx = document.createElement("INPUT");
                    xx.setAttribute("type", "file");
                    xx.setAttribute("name", "docfile"+iddoc+"[]");
                    xx.setAttribute("class", "form-control");
                    xx.setAttribute("id", iddoc);
                    xx.setAttribute("required", "");
                    xx.setAttribute("multiple", "true");
                    document.getElementById('docs').appendChild(xx);
                
                var xxx = document.createElement("INPUT");
                    xxx.setAttribute("type", "hidden");
                    xxx.setAttribute("value", iddoc);
                    xxx.setAttribute("class", "form-control");
                    xxx.setAttribute("name", "idsdocs[]");
                    xxx.setAttribute("id", iddoc);
                    document.getElementById('docs').appendChild(xxx);
                        
                var x = document.createElement("br");
                x.setAttribute("id", iddoc);
                document.getElementById('docs').appendChild(x);
            }
            
            
            
        
            
            
        </script>


        <style>
            body { 
                padding-top: 70px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .navbar-nav.navbar-right:last-child {
                margin-right: 5px;
            }
            .thumb {
                max-width: 200px;
                max-height: 100px;
            }
          

            .menu-arbol .mostrar-menu:not(:checked) ~ ul
            {
              opacity:0.5;
              height: 5px;
              overflow: hidden;
              margin-top: 0.5rem;
            }

            .menu-arbol .mostrar-menu:checked ~ ul
            {
              opacity:1;
              height: auto;
              overflow: hidden;
            }

         

            @import url(http://fonts.googleapis.com/css?family=Open+Sans:100,300,400,800);
            
            *
            {
              box-sizing: border-box;
              font-family: 'Open Sans', trebuchet, sans-serif;
                    font-weight: 1300;
              transition: all easy 5s;
            }
            
            ul
            {
              padding: 0 0 0 2rem;
            }

            li
            {
              list-style: none;
              padding:2rem;
              padding-bottom: 0;
            }

          

            .menu-arbol,
            .menu-arbol a,
            .menu-arbol a:link
            {
              color: blacksmoke;
              text-decoration: none;
            }

            .menu-arbol
            {
              background-color: white;
              
              border-radius: 0.5rem;
              margin: 0 auto;
            }

            .nivel-00
            {
             background-color: graytext;
            }

            .nivel-01
            {
              background-color: #EEE;
            }

            .nivel-02
            {
              background-color: white;
            }

            .nivel-03
            {
              background-color: #EEE;
            }

            .nivel-04
            {
              background-color: white;
            }
                        
            .mostrar-menu
            {
              display: none;
            }
            
            
            .menu-arbol .ampliar:after
            {
              content:' + ';
              display: inline-block;
              font-weight: light;
              border: rgba(255,255,255,.5) solid 10px;
              border-radius: 5px;
              padding: 0 2rem;
              margin-right: 3rem;
            }

           
            .menu-arbol .mostrar-menu:checked ~ .ampliar:after
            {
              content:' - ';
            }
            
        </style>
    </head>
    <body>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo site_url("/"); ?>" title="Volver a la página inicial">SECIP->SISTEMA DE ADMINISTRACION DE ARCHIVO</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            -->
                        </ul>					
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="<?php echo site_url("sessions/logout"); ?>">Salir</a>
                            </li>						
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
        <div class="container">
            <!-- Inicio -->
            <div class="row">
                <div class="column col-md-12 text-center">
                    <h2>
                        Archivo de Obra
                    </h2>
                   
                </div>
            </div>
            
            <!--A href="#Pestana_Archivo">Archivo</A>
            <A href="#Pestana_Documentos">Documentos</A>
            <A name="Pestana_Archivo"></A>
            <A name="Pestana_Documentos"></A-->
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#Reporte" role="tab" data-toggle="tab">Archivo</a></li>
                <li><a href="#Documentos" role="tab" data-toggle="tab">Documentos</a></li>
            </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            
                <div class="tab-pane active" id="Reporte">
                    
                    <br>
                    <div class="row">
                        <div class="column col-md-12">
                            <form action="<?= site_url('archivo/edit_archivo/1')?>" method="post" enctype="multipart/form-data" id="forma1" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal">
                                <!--                            Primera Pantalla-->
                                <div class="form-group">
                                    <label for="idUsuario" class="control-label col-sm-3">Creado Por:</label>
                                    <div class="col-sm-9">

                                        <p class="form-control-static"><?=$aUsuarios[$aArchivo['idUsuario']]; ?></p>
                                        <input type="hidden" id="id_user" name="id_user" value="<?= $aArchivo["idUsuario"]; ?>"/>
                                        <input type="hidden" id="id" name="id" value="<?= $aArchivo["id"]; ?>"/>

                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="OrdenTrabajo" class="control-label col-sm-3">Orden de Trabajo:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="OrdenTrabajo" name="OrdenTrabajo" value="<?php echo $aArchivo["OrdenTrabajo"]; ?>" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="Contrato" class="control-label col-sm-3">Contrato:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Contrato" name="Contrato" value="<?php echo $aArchivo["Contrato"]; ?>" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Obra" class="control-label col-sm-3">Obra:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Obra" name="Obra" value="<?php echo $aArchivo["Obra"]; ?>" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Descripcion" class="control-label col-sm-3">Descripción:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control input-sm" rows="3" id="Descripcion" name="Descripcion"><?php echo $aArchivo["Descripcion"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="FechaRegistro" class="control-label col-sm-3">Fecha Registro:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?= $aArchivo['FechaRegistro']; ?></p>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="FondodePrograma" class="control-label col-sm-3">Fondo de Programa:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="FondodePrograma" name="FondodePrograma" value="<?= $aArchivo['FondodePrograma']; ?>" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Normatividad" class="control-label col-sm-3">Normatividad:</label>
                                    <div class="col-sm-9">
                                        <?=$aArchivo['Normatividad']; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Modalidad" class="control-label col-sm-3">Modalidad:</label>
                                    <div class="col-sm-9">
                                        <?php if(isset($Modalidades[$aArchivo['idModalidad']])){ echo $Modalidades[$aArchivo['idModalidad']]; } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Ejercicio:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" class="form-control" value="<?=$Ejercicios[$aArchivo['idEjercicio']]; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Columna:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" class="form-control" value="<?=$aArchivo['Columna']; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Fila:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" class="form-control" value="<?=$aArchivo['Fila']; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Carpeta:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" class="form-control" value="<?=$aArchivo['Carpeta']; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ejercicio" class="control-label col-sm-3">Metadato:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" class="form-control" value="<?=$aArchivo['Metadato']; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="Documentos"><br>
                    
                    <section class="contenedor">
                        <nav>
                            <ul class="menu-arbol">
                                <?php 
                                $lvl = 1; $lvl2 = 1; $lvl3 = 1; $lvl4 = 1;
                                if($Procesos->num_rows() > 0){
                                    foreach($Procesos->result() as $Proceso){ ?>
                                    <li>
                                        <input type="radio" name="nivel-1" class="mostrar-menu" id="menu<?=$lvl.$Proceso->id?>">
                                            <label for="menu<?=$lvl.$Proceso->id?>" class="ampliar"></label>
                                            <a href="#"><?=$Proceso->Nombre;?></a>
                                    <?php        
                                        $SubProcesos = $this->datos_model->get_subproceso_id($Proceso->id);
                                        if($SubProcesos->num_rows() > 0){
                                            foreach($SubProcesos->result() as $SubProceso){
                                    ?>
                                            <ul class="nivel-01">
                                                <li>
                                                   
                                                <?php 
                                                    $info_docs = $this->datos_model->get_info_docs_subtipo($aArchivo['id'], $SubProceso->id);
                                                    if($info_docs->num_rows() ){ ?>
                                                        <input type="checkbox" class="mostrar-menu" id="menu0<?=$lvl2.$SubProceso->id?>">
                                                        <label for="menu0<?=$lvl2.$SubProceso->id?>" class="ampliar"></label>
                                                        <a href="#"><?=$SubProceso->Nombre;?></a>
                                                        
                                                        <?php  foreach($info_docs->result() as $info_doc){ ?>
                                                                                <ul class="nivel-02">
                                                                                <li>
                                                                                    <input type="checkbox" class="mostrar-menu" id="menu01<?=$lvl3.$SubProceso->id?>">
                                                                                    <label for="menu01<?=$lvl3.$SubProceso->id?>" class="ampliar"></label>
                                                                                    <a href="#"><?=$info_doc->Nombre.'<br>';?></a>
                                                                                    
                                                                                    <ul class="nivel-03">
                                                                                        <li>
                                                                                            <div class="col-sm-12">
                                                                                                        <div class="table-responsive">
                                                                                                        <table class="table table-striped table-bordered table-hover text-center" >
                                                                                                            <thead>
                                                                                                                <tr><strong><?=$info_doc->Nombre;?></strong></tr>

                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <center><strong>Ubicacion Fisica</strong><br>
                                                                                                                        <?php 
                                                                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $info_doc->id);
                                                                                                                            $Ubicacion = $this->datos_model->getUbicacionFisica($idRelid);
                                                                                                                            if($Ubicacion){
                                                                                                                                foreach($Ubicacion->result() as $Ubic){
                                                                                                                                    echo 'Columna: '.$Ubic->Columna;
                                                                                                                                    echo '<br>Fiula: '.$Ubic->Fila;
                                                                                                                                    echo '<br>Carpeta: '.$Ubic->Carpeta;
                                                                                                                                    echo '<br>Metadato: '.$Ubic->Metadato;
                                                                                                                                }
                                                                                                                            }else{
                                                                                                                                echo 'Sin Ubicacion';
                                                                                                                            }
                                                                                                                        ?>
                                                                                                                        </center>
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <center><strong>Estatus de Categoria</strong><br>
                                                                                                                        <?php 
                                                                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $info_doc->id);
                                                                                                                            $Estatus = $this->datos_model->get_estatus_rel_id($idRelid);
                                                                                                                             if($Estatus){
                                                                                                                                foreach($Estatus->result() as $Est){
                                                                                                                                    $Estatus2 = $this->datos_model->get_estatus_Est_all($Est->Estatus);
                                                                                                                                    if($Estatus2){
                                                                                                                                        foreach ($Estatus2->result() as $Est2){
                                                                                                                                            echo 'Estatus: '.$Est2->Nombre;
                                                                                                                                            echo '<br>Descripcion: '.$Est2->Descripcion;
                                                                                                                                        }
                                                                                                                                    }else{
                                                                                                                                        echo 'Sin Estatus';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }else{
                                                                                                                                echo 'Sin Estatus';
                                                                                                                            }
                                                                                                                        ?>
                                                                                                                        </center>
                                                                                                                        <center><strong>Titularidad</strong><br>
                                                                                                                        <?php 
                                                                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $info_doc->id);
                                                                                                                            $Releacion = $this->datos_model->get_estatus_rel_id($idRelid);
                                                                                                                             if($Releacion){
                                                                                                                                $Rel = $Releacion->row();
                                                                                                                                    $titul = $this->datos_model->get_Titularidad_id($Rel->idTitularidad)->row();
                                                                                                                                    if(isset($titul)){
                                                                                                                                        echo $titul->Titulo;
                                                                                                                                    }else{
                                                                                                                                        echo 'Sin Titularidad';
                                                                                                                                    }
                                                                                                                            }else{
                                                                                                                                echo 'Sin Titularidad';
                                                                                                                            }
                                                                                                                        ?>
                                                                                                                        </center>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <th>
                                                                                                                        <center>Acción</center>
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                        <center>Documento</center>
                                                                                                                    </th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <tr>&nbsp;
                                                                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?=$info_doc->id;?>)" type="button" >
                                                                                                                        <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                                                                                                                    </button>&nbsp;
                                                                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="ubicacion_fisica(<?=$aArchivo['id'];?>, <?=$info_doc->id;?>)" type="button" >
                                                                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span>Modificar Ubicacion Fisica
                                                                                                                    </button>&nbsp;
                                                                                                                     <button class="btn btn-xs btn-success dropdown-toggle" onclick="estatus(<?=$aArchivo['id'];?>, <?=$info_doc->id;?>)" type="button" >
                                                                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Estatus
                                                                                                                    </button>
                                                                                                                </tr>
                                                                                                             
                                                                                                        <?php 
                                                                                                        list ($docsTps, $Estim, $Prorr)  = $this->datos_model->get_Historia_idtpdoc_new($aArchivo['id'], $info_doc->id, $aArchivo['idEjercicio']);
                                                                                                            if($docsTps->num_rows() > 0){
                                                                                                                if($Estim){ ?>
                                                                                                                 <tr>
                                                                                                                    <td  colspan="2">
                                                                                                                            <?php
                                                                                                                                $NumEstAnt = 0; $NombEstmAnt = ''; $indice_ini = 0; $idDocAdjAnt = 0; $idEjercicioAnt = 0; $Tipos_Estimaciones = array();
                                                                                                                                foreach($docsTps->result() as $docsTp){
                                                                                                                                    if($indice_ini == 0){
                                                                                                                                        $NumEstAnt = $docsTp->Numero_Estimacion;
                                                                                                                                        $NombEstmAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                                                                                                        $idDocAdjAnt = $docsTp->idDocAdj;
                                                                                                                                        $idEjercicioAnt = $docsTp->idEjercicio;
                                                                                                                                        $indice_ini = 1;
                                                                                                                                    }else{
                                                                                                                                        $NumEstAnt = $docsTp->Numero_Estimacion;
                                                                                                                                        $NombEstmAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                                                                                                        $idDocAdjAnt = $docsTp->idDocAdj;
                                                                                                                                        $idEjercicioAnt = $docsTp->idEjercicio;
                                                                                                                                    }

                                                                                                                                    if($docsTp->Numero_Estimacion != $NumEstAnt){
                                                                                                                                        if($docsTp->Es_Estimacion == 1){
                                                                                                                                            $Tipos_Estimaciones[$NumEstAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombEstmAnt;
                                                                                                                                            $Tipos_Estimaciones[$docsTp->Numero_Estimacion][$docsTp->idDocAdj][$docsTp->idEjercicio][] = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                                                                                                        }
                                                                                                                                    }else{
                                                                                                                                        if($docsTp->Es_Estimacion == 1){
                                                                                                                                            $Tipos_Estimaciones[$NumEstAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombEstmAnt;
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                
                                                                                                                             foreach($Tipos_Estimaciones as $NumEstm => $value){  ?>
                                                                                                                        
                                                                                                                                <input type="checkbox" class="mostrar-menu" id="menu001<?=$lvl4.$NumEstm; ?>">
                                                                                                                                <label for="menu001<?=$lvl4.$NumEstm; ?>" class="ampliar"></label>
                                                                                                                                <a href="#">Estimaciones: <?='['.$NumEstm.']';?> </a>
                                                                                                                                
                                                                                                                                <ul class="nivel-04">
                                                                                                                                    <li>
                                                                                                                                        <table class="table table-striped table-bordered table-hover text-center">
                                                                                                                                <?php foreach($value as $IDDocAdj => $value1){ ?>
                                                                                                                                            
                                                                                                                                <?php   foreach($value1 as $idEjercicio => $value2){ ?>            
                                                                                                                                           
                                                                                                                                <?php       foreach($value2 as $PosNomDoc => $NombreArchivo){ ?>
                                                                                                                                            
                                                                                                                                        <tr>
                                                                                                                                            <td><!--Accion de los archivos-->
                                                                                                                                                <a href="<?=site_url('archivo/verDoc/'.$IDDocAdj.'/'.$idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                                                                                                                <a href="<?=site_url('archivo/descargarDoc/'.$IDDocAdj.'/'.$idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                                                                                                                <a href="<?=site_url('archivo/delete_doc_anexo/'.$IDDocAdj.'/'.$idEjercicio)?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                                                                                                            </td>
                                                                                                                                            <td><!--Nombre de los archivos-->
                                                                                                                                                <?=$NombreArchivo;?>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                       
                                                                                                                                <?php $lvl4++;  
                                                                                                                                            }
                                                                                                                                ?>
                                                                                                                                <?php   } ?>
                                                                                                                                <?php } ?>
                                                                                                                                        </table>
                                                                                                                                    </li>
                                                                                                                                </ul>
                                                                                                                            <?php  } ?>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            <?php   }else if($Prorr){ ?>
                                                                                                                        <tr>
                                                                                                                            <td  colspan="2">
                                                                                                                            <?php
                                                                                                                                $NumProrrAnt = 0; $NombProrrAnt = ''; $indice_ini = 0; $idDocAdjAnt = 0; $idEjercicioAnt = 0; $Tipos_Prorrogas = array();
                                                                                                                                foreach($docsTps->result() as $docsTp){
                                                                                                                                    if($indice_ini == 0){
                                                                                                                                        $NumProrrAnt = $docsTp->Numero_Prorroga;
                                                                                                                                        $NombProrrAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                                                                                                        $idDocAdjAnt = $docsTp->idDocAdj;
                                                                                                                                        $idEjercicioAnt = $docsTp->idEjercicio;
                                                                                                                                        $indice_ini = 1;
                                                                                                                                    }else{
                                                                                                                                        $NumProrrAnt = $docsTp->Numero_Prorroga;
                                                                                                                                        $NombProrrAnt = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                                                                                                        $idDocAdjAnt = $docsTp->idDocAdj;
                                                                                                                                        $idEjercicioAnt = $docsTp->idEjercicio;
                                                                                                                                    }
                                                                                                                                    
                                                                                                                                    if($docsTp->Numero_Prorroga != $NumProrrAnt){
                                                                                                                                        if($docsTp->Es_Prorroga == 1){
                                                                                                                                            $Tipos_Prorrogas[$NumProrrAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombProrrAnt;
                                                                                                                                            $Tipos_Prorrogas[$docsTp->Numero_Prorroga][$docsTp->idDocAdj][$docsTp->idEjercicio][] = $docsTp->Documento.'['.$docsTp->nombrearchivo.']';
                                                                                                                                        }
                                                                                                                                    }else{
                                                                                                                                        if($docsTp->Es_Prorroga == 1){
                                                                                                                                            $Tipos_Prorrogas[$NumProrrAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombProrrAnt;
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                
                                                                                                                                foreach($Tipos_Prorrogas as $NumProrr => $value){  ?>
                                                                                                                                
                                                                                                                                   <input type="checkbox" class="mostrar-menu" id="menu001<?=$lvl4.$NumProrr;?>">
                                                                                                                                    <label for="menu001<?=$lvl4.$NumProrr;?>" class="ampliar"></label>
                                                                                                                                    <a href="#">Prorroga: <?='['.$NumProrr.']';?> </a>
                                                                                                                                    
                                                                                                                                    <ul class="nivel-04">
                                                                                                                                        <li>
                                                                                                                                            <table class="table table-striped table-bordered table-hover text-center">
                                                                                                                                         
                                                                                                                                    <?php foreach($value as $IDDocAdj => $value1){ ?>
                                                                                                                                            
                                                                                                                                    <?php   foreach($value1 as $idEjercicio => $value2){ ?>            
                                                                                                                                           
                                                                                                                                    <?php       foreach($value2 as $PosNomDoc => $NombreArchivo){ ?>
                                                                                                                                
                                                                                                                                        <tr>
                                                                                                                                            <td><!--Accion de los archivos-->
                                                                                                                                                <a href="<?= site_url('archivo/verDoc/' .$IDDocAdj. '/' .$idEjercicio) ?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                                                                                                                <a href="<?= site_url('archivo/descargarDoc/' .$IDDocAdj. '/' .$idEjercicio) ?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                                                                                                                <a href="<?= site_url('archivo/delete_doc_anexo/' .$IDDocAdj. '/' .$idEjercicio) ?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                                                                                                            </td>
                                                                                                                                            <td><!--Nombre de los archivos-->
                                                                                                                                                <?=$NombreArchivo?>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                        <?php
                                                                                                                                            $lvl4++;
                                                                                                                                            }
                                                                                                                                        ?>
                                                                                                                                        <?php   } ?>
                                                                                                                                    <?php } ?>
                                                                                                                                    </table>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                            <?php   } ?>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                            <?php    
                                                                                                                    }else{
                                                                                                                        foreach($docsTps->result() as $docsTp){ ?>
                                                                                                                             <tr>
                                                                                                                                <td><!--Accion de los archivos-->
                                                                                                                                    <a href="<?=site_url('archivo/verDoc/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                                                                                                    <a href="<?=site_url('archivo/descargarDoc/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                                                                                                    <a href="<?=site_url('archivo/delete_doc_anexo/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" title="Eliminar" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                                                                                                </td>
                                                                                                                                <td><!--Nombre de los archivos-->
                                                                                                                                    <?=$docsTp->nombrearchivo;?>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                            <?php       }
                                                                                                                    }
                                                                                                            }else{  ?>
                                                                                                                <tr>
                                                                                                                    <td colspan="2">
                                                                                                                    <center>
                                                                                                                        Sin Documentos
                                                                                                                    </center>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                        <?php   }  ?>
                                                                                                        </tbody>
                                                                                                </table><br><br>   
                                                                                                           
                                                                                             <?php
                                                                                                 ?>
                                                                                                </div>
                                                                                            </div>


                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                            <?php        
                                                                    $lvl3++;
                                                                        //}else{      ?>
                                                                            
                                                                <?php
                                                                        //}
                                                                    }
                                                                }else{ 
                                                                    //echo 'No Hay Tipo de Documento';
                                                                }
                                                            ?>
                                                        
                                                </li>
                                            </ul>
                                            <?php
                                            $lvl2++;
                                            }
                                        }
                                        ?>
                                    </li>
                                <?php
                                    $lvl++;
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </section>
                
                </div>
        </div>
        <br><br><br><br>
    </div>
    
    <!-- Estatus del Documento -->
    <div class="modal fade" id="modal-estatus" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Estatus del Documento:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/5'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="hidden" id="idTpDocuest" name="idTpDocuest" value="" />
                        
                        <div class="form-group"><br><br>
                            <div class="col-sm-12">
                                 <div class="col-sm-6">
                                    <label for="Columna" class="control-label text-right">Estatus del Documento:</label>
                                </div>
                                <div class="col-sm-6">
                                    <?=form_dropdown('idEstatus', $Estatus_select, '', 'class="form-control" id="idEstatusE" '); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Columna" class="control-label text-right">Titularidad:</label>
                                </div>
                                <div class="col-sm-6">
                                    <?=form_dropdown('idTitularidad', $Titularidades, '', 'class="form-control" id="idTitularidadE" '); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center><br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
         
 <!-- Ubicacion Fisica Global de Archivo -->
    <!--div class="modal fade" id="modal-ubicacion_fisica_global" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Ubicacion Fisica Global de Archivo:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/6'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivoG" name="idArchivo" value="<?= $aArchivo["id"]; ?>" />
                        
                        <div class="form-group">
                            <label for="Columna" class="control-label col-sm-4 text-right">Columna:</label>
                            <div class="col-sm-5">
                                <input type="text" id="ColumnaG" name="Columna" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fila" class="control-label col-sm-4 text-right">Fila:</label>
                            <div class="col-sm-5">
                                <input type="text" id="FilaG" name="Fila" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Carpeta" class="control-label col-sm-4 text-right">Carpeta:</label>
                            <div class="col-sm-5">
                                <input type="text" id="CarpetaG" name="Carpeta" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Metadato" class="control-label col-sm-4 text-right">Metadato:</label>
                            <div class="col-sm-5">
                                <input type="text" id="MetadatoG" name="Metadato" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center><br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div-->
 
 <!-- Ubicacion Fisica -->
    <div class="modal fade" id="modal-ubicacion_fisica" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Ubicacion Fisica:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/4'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="hidden" id="idTpDocub" name="idTpDocub" value="" />
                        
                        <div class="form-group">
                            <label for="Columna" class="control-label col-sm-4 text-right">Columna:</label>
                            <div class="col-sm-5">
                                <input type="text" id="ColumnaA" name="Columna" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fila" class="control-label col-sm-4 text-right">Fila:</label>
                            <div class="col-sm-5">
                                <input type="text" id="FilaA" name="Fila" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Carpeta" class="control-label col-sm-4 text-right">Carpeta:</label>
                            <div class="col-sm-5">
                                <input type="text" id="CarpetaA" name="Carpeta" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Metadato" class="control-label col-sm-4 text-right">Metadato:</label>
                            <div class="col-sm-5">
                                <input type="text" id="MetadatoO" name="Metadato" value="" class="form-control input-sm" required/>          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <center><br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
 
 <!-- Selecciona los Documentos -->
    <div class="modal fade" id="modal-nuevo_anexo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Selecciona los Documentos:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/3'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idTpDoc" name="idTpDoc" value="" />
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="hidden" id="idEjercicio" name="idEjercicio" value="<?=$aArchivo['idEjercicio'];?>" />
                        
                        <!--div class="form-group">
                            <div class="col-sm-12 text-center">
                                <label for="lista" class="control-label" ></label>
                                <button type="button" onclick="addfile_individual()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Mas Documentos</button>
                            </div>
                        </div>
                        <div  class="form-group" ><br><br>
                            <p><strong>Cargar Documento</strong></p>
                            <div class="col-sm-12 text-center">
                                    <p id="crearfile"></p>
                            </div>
                        </div-->
                        
                        <div  class="form-group" ><br>
                            <p><strong>Cargar Documento</strong></p>
                            <div class="col-sm-12 text-center">
                                <input type="file" id="docfile" name="docfile[]" class="form-control" multiple="true" required=""/>
                            </div>
                        </div>
                        
                        <div  class="form-group" ><br>
                            <p><strong>Estimacion</strong></p>
                            <div class="col-sm-12 text-center">
                                <input type="checkbox" name="Es_Estimacion" id="Es_Estimacion_id" onclick="mostrar_Estim()" class="form-control"><br><br>
                                <div id='m_c_estim' style='display:none;'>
                                    
                                    <div class="col-sm-6">
                                        Numero Estimacion
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" id="Numero_Estimacion" name="Numero_Estimacion" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        Tipo Estimacion
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="Documento" name="Documento_est" class="form-control" />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div  class="form-group" ><br>
                            <p><strong>Prorroga</strong></p>
                            <div class="col-sm-12 text-center">
                                <input type="checkbox" name="Es_Prorroga" id="Es_Prorroga_id" onclick="mostrar_Prorr()" class="form-control"><br><br>
                                <div id='m_c_prorr' style='display:none;'>
                                    
                                    <div class="col-sm-6">
                                        Numero Prorroga
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" id="Numero_Estimacion" name="Numero_Prorroga" class="form-control" />
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        Tipo Prorroga
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="Documento" name="Documento_prorr" class="form-control" />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <br><br><br>
                                <center>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
 <!-- Selecciona el Tipo -->
    <div class="modal fade" id="modal-nuevo_tipo_anexo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Selecciona el Tipo y los Documentos:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/2'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idArchivo" name="idArchivo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="hidden" id="idEjercicio" name="idEjercicio" value="<?=$aArchivo['idEjercicio'];?>" />
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="text" id="documentost" name="documentost" class="form-control" value="" /><br><br>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p id="docs"> <br></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <br><br><br>
                                <center>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <script type="text/javascript">
        
        function mostrar_Estim(){
            if(document.getElementById('m_c_estim').style.display === 'block'){
                document.getElementById('m_c_estim').style.display = 'none';
                document.getElementById('Es_Prorroga_id').style.display = 'block';
            }else{
                document.getElementById('m_c_estim').style.display = 'block';
                document.getElementById('Es_Prorroga_id').style.display = 'none';
            }
        }
        function mostrar_Prorr(){
            if(document.getElementById('m_c_prorr').style.display === 'block'){
                document.getElementById('m_c_prorr').style.display = 'none';
                document.getElementById('Es_Estimacion_id').style.display = 'block';
            }else{
                document.getElementById('m_c_prorr').style.display = 'block';
                document.getElementById('Es_Estimacion_id').style.display = 'none';
            }
        }
        
        function nuevo_tipo_anexo(){
            $("#modal-nuevo_tipo_anexo").modal('show');    
        }
        
        function estatus(idArchivoo, idTDd){
                $("#idEstatusE").val('');
                $("#idTitularidadE").val('');
            var parametros = {
                "idArchivoo" : idArchivoo,
                "idTpDocc" : idTDd,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/estatus"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#idEstatusE").val(data['idEstatus']);
                    $("#idTitularidadE").val(data['idTitularidad']);
                }
            });
            
            $("#idTpDocuest").val(idTDd);
            $("#modal-estatus").modal('show');    
        }
        
        function ubicacion_fisica_global(idArchivo){
                $("#ColumnaG").val('');
                $("#FilaG").val('');
                $("#CarpetaG").val('');
                $("#MetadatoG").val('');
            var parametros = {
                "idArchivo" : idArchivo,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/ubicacion_global"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#EstadoG").val(data['Estado']);
                    $("#ColumnaG").val(data['Columna']);
                    $("#FilaG").val(data['Fila']);
                    $("#CarpetaG").val(data['Carpeta']);
                    $("#MetadatoG").val(data['Metadato']);
                }
            });
            
            $("#modal-ubicacion_fisica_global").modal('show');    
        }
        
        function ubicacion_fisica(idArchivo, idTD){
                $("#ColumnaA").val('');
                $("#FilaA").val('');
                $("#CarpetaA").val('');
                $("#MetadatoO").val('');
            var x;
            var parametros = {
                "idArchivo" : idArchivo,
                "idTpDoc" : idTD,
            };
            $.ajax({
                data:  parametros,
                url:   '<?php echo site_url("archivo/ubicacion"); ?>',
                dataType: 'json',
                quietMillis: 100,
                type:  'POST',
                success:  function (data) {
                    $("#ColumnaA").val(data['Columna']);
                    $("#FilaA").val(data['Fila']);
                    $("#CarpetaA").val(data['Carpeta']);
                    $("#MetadatoO").val(data['Metadato']);
                }
            });
            
            $("#idTpDocub").val(idTD);
            $("#modal-ubicacion_fisica").modal('show');    
        }
        
        
        function nuevo_doc_anexo(idTD){
            $("#idTpDoc").val(idTD);
            //addfile_individual();
            $("#modal-nuevo_anexo").modal('show');    
        }
        function numeroAleatorio(min, max){
          return Math.round(Math.random() * (max - min) + min);
        }
        
        function addfile_individual(){
            idDoc = numeroAleatorio(1, 1000000);
            var xx = document.createElement("INPUT");
            xx.setAttribute("type", "file");
            xx.setAttribute("name", "docfile[]");
            xx.setAttribute("class", "form-control");
            xx.setAttribute("id", idDoc);
            xx.setAttribute("required", "");
            document.getElementById('crearfile').appendChild(xx);

            var texto = document.createTextNode("Quitar Documento");
            var xxx = document.createElement("BUTTON");
            xxx.setAttribute("type", "button");
            xxx.setAttribute("onclick", "eliminar("+idDoc+")");
            xxx.setAttribute("class", "btn btn-danger");
            xxx.setAttribute("value", "Borrar");
            xxx.setAttribute("title", "Borrar");
            xxx.setAttribute("id", idDoc);
            xxx.appendChild(texto);
            document.getElementById('crearfile').appendChild(xxx);

            var x = document.createElement("br");
            x.setAttribute("id", idDoc);
            document.getElementById('crearfile').appendChild(x);
        }
        function eliminar(nodo_name){
            if(document.getElementById(nodo_name)){
                var x = document.getElementById(nodo_name);
                x.parentNode.removeChild(x);
                eliminar(nodo_name);
            }else{
                //alert("se removio el nodo:"+nodo_name);
            }
        }
      </script>
</body>
</html>

*/ ?>

















<!--
                    
                    <?php if($Documentos_Totales){ ?>
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_tipo_anexo()" type="button" >
                            <span class="glyphicon glyphicon-plus" title="Nuevo Tipo Anexo" ></span> Nueva Categoria de Documento
                        </button>
                    </div> <br>
                            <div class="col-sm-12 text-center">
                                <label for="lista" class="control-label" > <h3>Historial de Documentos:</h3></label>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <?php
                                            $cantdocs= 0;
                                            foreach($Documentos_Totales->result() as $Documento){
                                                $docsTps = $this->datos_model->get_Historia_idtpdoc($aArchivo['id'], $Documento->id);
                                                if($docsTps->num_rows() > 0){ ?>
                                                    <div class="col-sm-12">
                                                        <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover text-center" >
                                                            <thead>
                                                                <tr><strong><?=$Documento->Nombre;?></strong></tr>
                                                        
                                                                <tr>
                                                                    <td>
                                                                        <center><strong>Ubicacion Fisica</strong><br>
                                                                        <?php 
                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $Documento->id);
                                                                            $Ubicacion = $this->datos_model->getUbicacionFisica($idRelid);
                                                                            if($Ubicacion){
                                                                                foreach($Ubicacion->result() as $Ubic){
                                                                                    echo 'Columna: '.$Ubic->Columna;
                                                                                    echo '<br>Fiula: '.$Ubic->Fila;
                                                                                    echo '<br>Carpeta: '.$Ubic->Carpeta;
                                                                                    echo '<br>Metadato: '.$Ubic->Metadato;
                                                                                }
                                                                            }else{
                                                                                echo 'Sin Ubicacion';
                                                                            }
                                                                        ?>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center><strong>Estatus de Categoria</strong><br>
                                                                        <?php 
                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $Documento->id);
                                                                            $Estatus = $this->datos_model->get_estatus_rel_id($idRelid);
                                                                             if($Estatus){
                                                                                foreach($Estatus->result() as $Est){
                                                                                    $Estatus2 = $this->datos_model->get_estatus_Est_all($Est->Estatus);
                                                                                    if($Estatus2){
                                                                                        foreach ($Estatus2->result() as $Est2){
                                                                                            echo 'Estatus: '.$Est2->Nombre;
                                                                                            echo '<br>Descripcion: '.$Est2->Descripcion;
                                                                                        }
                                                                                    }else{
                                                                                        echo 'Sin Estatus';
                                                                                    }
                                                                                }
                                                                            }else{
                                                                                echo 'Sin Estatus';
                                                                            }
                                                                        ?>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th>
                                                                        <center>Acción</center>
                                                                    </th>
                                                                    <th>
                                                                        <center>Documento</center>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>&nbsp;
                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?=$Documento->id;?>)" type="button" >
                                                                        <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                                                                    </button>&nbsp;
                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="ubicacion_fisica(<?=$aArchivo['id'];?>, <?=$Documento->id;?>)" type="button" >
                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Ubicacion Fisica
                                                                    </button>&nbsp;
                                                                     <button class="btn btn-xs btn-success dropdown-toggle" onclick="estatus(<?=$aArchivo['id'];?>, <?=$Documento->id;?>)" type="button" >
                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Estatus
                                                                    </button>
                                                                </tr>
                                                                
                                                                                                                                       
                                                        <?php  foreach($docsTps->result() as $docsTp){ $cantdocs++; ?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?=site_url('archivo/verDoc/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                                                        <a href="<?=site_url('archivo/descargarDoc/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-download"></span> Descargar</a>
                                                                        <a href="<?=site_url('archivo/delete_doc_anexo/'.$docsTp->idDocAdj.'/'.$docsTp->idEjercicio)?>" title="Eliminar Archivo" onclick="return confirm('¿Confirma Que Quiere Eliminar el Documento Anexo?');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                                                    </td>
                                                                    <td>
                                                                        <?=$docsTp->nombrearchivo;?>
                                                                    </td>
                                                                </tr>
                                                        <?php   } ?>
                                                            </tbody>
                                                        </table><br><br>
                                             <?php
                                                }else{ ?>
                                                        <table class="table table-striped table-bordered table-hover text-center" >
                                                            <thead>
                                                                <tr><strong><?=$Documento->Nombre;?></strong></tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><strong>Ubicacion Fisica</strong><br>
                                                                        <?php 
                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $Documento->id);
                                                                            $Ubicacion = $this->datos_model->getUbicacionFisica($idRelid);
                                                                            if($Ubicacion){
                                                                                foreach($Ubicacion->result() as $Ubic){
                                                                                    echo 'Columna: '.$Ubic->Columna;
                                                                                    echo '<br>Fiula: '.$Ubic->Fila;
                                                                                    echo '<br>Carpeta: '.$Ubic->Carpeta;
                                                                                    echo '<br>Metadato: '.$Ubic->Metadato;
                                                                                }
                                                                            }else{
                                                                                echo 'Sin Ubicacion';
                                                                            }
                                                                        ?>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center><strong>Estatus de Categoria</strong><br>
                                                                        <?php 
                                                                            $idRelid = $this->datos_model->verifica_relacion($aArchivo['id'], $Documento->id);
                                                                            $Estatus = $this->datos_model->get_estatus_rel_id($idRelid);
                                                                             if($Estatus){
                                                                                foreach($Estatus->result() as $Est){
                                                                                    $Estatus2 = $this->datos_model->get_estatus_Est_all($Est->Estatus);
                                                                                    if($Estatus2){
                                                                                        foreach ($Estatus2->result() as $Est2){
                                                                                            echo 'Estatus: '.$Est2->Nombre;
                                                                                            echo '<br>Descripcion: '.$Est2->Descripcion;
                                                                                        }
                                                                                    }else{
                                                                                        echo 'Sin Estatus';
                                                                                    }
                                                                                }
                                                                            }else{
                                                                                echo 'Sin Estatus';
                                                                            }
                                                                        ?>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <center>Sin Documentos</center>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?=$Documento->id;?>)" type="button" >
                                                                        <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                                                                    </button>&nbsp;
                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="ubicacion_fisica(<?=$aArchivo['id'];?>, <?=$Documento->id;?>)" type="button" >
                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Ubicacion Fisica
                                                                    </button>&nbsp;
                                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="estatus(<?=$aArchivo['id'];?>, <?=$Documento->id;?>)" type="button" >
                                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Estatus
                                                                    </button>
                                                                </tr>
                                                            </tbody>
                                                        </table><br><br>
                                            <?php
                                                }
                                            }
                                            if($cantdocs == 0){
                                                echo 'No hay Historial de Cargas';
                                            }
                                        }else{ echo '<div class="col-sm-12 text-center">
                                                        <label for="lista" class="control-label" > <h3>No Hay Plantilla Para Carga de Documentos</h3></label><br><br>
                                                    </div>'; }
                                    ?>                   
                                                </div>
                                        </div>
                            </div>
                    
                    </div>
                    -->

