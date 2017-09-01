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
        <link href="<?php echo site_url(); ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>css/jquery-confirm.css" rel="stylesheet">
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.tableTools.js"></script>              
        <script type="text/javascript" src="<?php echo site_url(); ?>js/dataTables.bootstrap.js"></script>   
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script>  
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-confirm.js"></script>     
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
         
 <!--<script type="text/javascript">
        
        $(function() {

            
                
                
				
		oTable = $('#tabla_documentos').dataTable({
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
                
                $("div.btn-permisos  > a").attr("disabled", "disabled");
                
                
            }); 
                         //Función que envía la petición ajax.
    function buscar_legajo(){
       $.ajax({
          url: 'buscar_empleado.php',
          type: 'POST',
          timeout: 10000,
          data: {legajo: $("#legajo").val()},
          beforeSend: function(){
             $("#respuesta").html('Buscando legajo...');
          },
          error: function(){
             $("#respuesta").html('');
                alert('Ha surgido un error.')
             },
          success: function(respuesta){
             $("#respuesta").html(respuesta);
          }
       })
    } 
    $(document).ready(function(){
       $("#boton_buscar_legajo").click(function(){
          buscar_legajo();
       });
    });


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
                        $("#Proyecto_mod").val(data['proyecto']);
                        
                        if ($("#Proyecto_mod").val() == 1){
                            $("#Proyecto_mod").prop("checked", true);
                        } 
                        
                         
                        
                         
                    }
                });
                
        }
        
        
        
        function uf_recibir_documento(elemento,idRel_Archivo_Documento) {
                            
                        recibido=0;
                        if (elemento.checked){
                            recibido=1;
                            $("#recibio"+idRel_Archivo_Documento).prop( "disabled", true );
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_recibio'); ?>/" + idRel_Archivo_Documento,
                           data: {recibido:recibido} ,
                           success: function(data) {
                             //$('.center').html(data); 
                            
                             $('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                             $('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                             
                           }
                         });
                        
                       
                           
        }
        function uf_recibir_tipo_documento(idRel_Archivo_Documento, idArchivo) {
                        
                        //alert($("#tipo_documento"+idRel_Archivo_Documento).val())
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==1){
                            preregistrado=1;
                        }
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==2){ 
                            preregistrado=2;
                        }
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==0){
                            preregistrado=0;
                            $("#noHojas_doc_"+idRel_Archivo_Documento).val("")
                            $("#oculta-noHojas-"+idRel_Archivo_Documento).css("display", "none")
                        }
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==3){
                            preregistrado=3;
                            $("#noHojas_doc_"+idRel_Archivo_Documento).val(0)
                            $("#oculta-noHojas-"+idRel_Archivo_Documento).html("<b>No Hojas: </b> 0")
                        }
                        //Si contiene estimaciones
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==4){
                            preregistrado=4;
                        }
                        //alert('preregistrado ' +preregistrado)
                        
                       
                    //alert ($("#tipo_documento"+idRel_Archivo_Documento).val())
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_preregistrados'); ?>/" + idRel_Archivo_Documento +'/' + idArchivo,
                           data: {preregistrado:preregistrado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                                //alert('Data ' +data)
                            
                                $('#numero_documentos_proceso_preregistrados'+data["idTipoProceso"]).html(data["strTipoProceso_preregistrados"])
                                $('#numero_documentos_subproceso_preregistrados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_preregistrados"])
                             
                           }
                         });
                        
                       
                           
        }
        
        //Cuando hay preregistro
        function uf_recibir_tipo_documento_preregistro(id, id_Rel_Archivo_Documento, idArchivo) {
                        
                        //alert($("#tipo_documento"+idRel_Archivo_Documento).val())
                        if($("#tipo_documento"+id).val()==1){
                            preregistrado=1;
                        }
                        if($("#tipo_documento"+id).val()==2){ 
                            preregistrado=2;
                        }
                        if($("#tipo_documento"+id).val()==0){
                            preregistrado=0;
                        }
                        if($("#tipo_documento"+id).val()==3){
                            preregistrado=3;
                            $("#noHojas_doc_"+id).val(0)
                            $("#oculta-noHojas-"+id).html("0")
                        }
                        //Si contiene estimaciones
                        if($("#tipo_documento"+id).val()==4){
                            preregistrado=4;
                        }
                        //alert('preregistrado ' +preregistrado)
                        
                       
                    //alert ($("#tipo_documento"+idRel_Archivo_Documento).val())
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/editar_documento_preregistro'); ?>/"+id+'/' + id_Rel_Archivo_Documento +'/' + idArchivo,
                           data: {preregistrado:preregistrado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                                //alert('Data ' +data)
                            
                                $('#numero_documentos_proceso_preregistrados'+data["idTipoProceso"]).html(data["strTipoProceso_preregistrados"])
                                $('#numero_documentos_subproceso_preregistrados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_preregistrados"])
                             
                           }
                         });
                        
                       
                           
        }
        
        
        function uf_recibir_estimacion(elemento,idEstimacion) {
               
                        var Est_recibido=0;
                        if (elemento.checked){
                            Est_recibido=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_est_recibio'); ?>/" + idEstimacion +'/' + Est_recibido,
                           data: {recibido:Est_recibido} ,
                           success: function (data) {
                             //$('.center').html(data); 
                            
                             
                             
                           }
                         });
                       
        }
        
        function uf_recibir_tipo_estimacion(idEstimacion) {
                        
                        //alert ($("#tipo_documento_est"+idEstimacion).val())
                        
                        if($("#tipo_documento_est"+idEstimacion).val()==1){
                            recibido=1;
                        }
                        if($("#tipo_documento_est"+idEstimacion).val()==2){
                        
                            recibido=2;
                        }
                        if($("#tipo_documento_est"+idEstimacion).val()==3){
                        
                            recibido=3;
                        }
                        if($("#tipo_documento_est"+idEstimacion).val()==0){
                        
                            recibido=0;
                            $("#noHojas_est_"+idEstimacion).val(0)
                            $("#div_noHojas_est_"+idEstimacion).html("<b>No Hojas: </b> 0" )
                            $("#div_noHojas_est_aux_"+idEstimacion).html("<b>No Hojas: </b> 0" )
                        }
                        
                        
                       
                    //alert ($("#tipo_documento"+idRel_Archivo_Documento).val())
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_est_recibio'); ?>/" + idEstimacion,
                           data: {recibido:recibido} ,
                           success: function(data) {
                             //$('.center').html(data); 
                            
                             //$('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                             //$('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                             
                           }
                         });
                        
                       
                           
        }
        
        

        function uf_original_recibido_estimacion(elemento,idEstimacion) {
                        
                        
                        
                        var Est_original_recibido=0;
                        if (elemento.checked){
                            Est_original_recibido=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_original_recibido_estimacion'); ?>/" + idEstimacion +'/' + Est_original_recibido,
                           data: {original_recibido:Est_original_recibido} ,
                           success: function (data) {
                             //$('.center').html(data); 
                            
                             
                             
                           }
                         });
                         
                         
                        
                       
                           
        }
        
        function uf_revisado_estimacion(elemento,idEstimacion) {
                        
                        
                        
                        var Est_revisado=0;
                        if (elemento.checked){
                            Est_revisado=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit__revisado_estimacion'); ?>/" + idEstimacion +'/' + Est_revisado,
                           data: {revisado:Est_revisado} ,
                           success: function (data) {
                             //$('.center').html(data); 
                            
                             
                             
                           }
                         });
                         
                         
                        
                       
                           
        }

                            
           
        
        
        function uf_orginal_recibido(elemento,idRel_Archivo_Documento) {
                        
                        
                        original_recibido=0;
                        if (elemento.checked){
                            original_recibido=1;
                        }
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_original_recibio'); ?>/" + idRel_Archivo_Documento,
                           data: {original_recibido:original_recibido} ,
                           success: function(data) {
                             //$('.center').html(data); 
                             
                           }
                         });
                        
                       
                           
        }
        
        
        
        
        function uf_recibir_revisado(elemento, id ,idRel_Archivo_Documento) {
                        
                        
                        
                        revisado=0;
                        if (elemento.checked){
                            revisado=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_revisado'); ?>/" + id + "/" + idRel_Archivo_Documento,
                           data: {revisado:revisado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                             
                              $('#numero_documentos_proceso_revisados'+data["idTipoProceso"]).html(data["strTipoProceso_revisado"])
                              $('#numero_documentos_subproceso_revisados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_revisado"])
      
                           }
                         });
                        
                       
                           
        }
        
        function uf_recibido_cid(elemento,id, idRel_Archivo_Documento) {
                 
                        recibido_cid=0;
                        if (elemento.checked){
                            recibido_cid=1;
                        }
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_recibido_cid'); ?>/" + id+"/"+ idRel_Archivo_Documento,
                           data: {recibido_cid:recibido_cid} ,
                           success: function(data) {
                             //$('.center').html(data); 
                                //alert("id tipo proceso" +data["idTipoProceso"])
                                
                                alert("doc recibidos" +data["NumTipoProceso_recibido"])
                                //alert("doc totales" +data["NumTipoProceso"] )
                              $('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                              $('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                              
                              $("#enviar_revision_"+data["idTipoProceso"]).css("display", "block")

                              
                              if (data["NumTipoProceso"] == data["NumTipoProceso_recibido"]){
                                  //alert ("son iguales")
                                  $("#enviar_revision_"+data["idTipoProceso"]).css("display", "block")
                              }else{
                                  $("#enviar_revision_"+data["idTipoProceso"]).css("display", "none")
                              }
                              
                              
      
                           }
                         });
                         
                         
                             

                        
                       
                           
        }
        
        
        
        function uf_orginal_revisado(elemento,idRel_Archivo_Documento) {
                        
                        
                        original_revisado=0;
                        if (elemento.checked){
                            original_revisado=1;
                        }
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_original_revisado'); ?>/" + idRel_Archivo_Documento,
                           data: {original_revisado:original_revisado} ,
                           success: function(data) {
                             //$('.center').html(data);
                               
                           }
                         });
                        
                       
                           
        }
        
        
        
        function uf_ubicacion_fisica(elemento,idArchivo,idProceso) {
                        
                        
                        
                       
                        Ubicacion_fisica=elemento.value;        
                        
                      
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_ubicacion_fisica'); ?>/" + idArchivo+"/"+idProceso,
                           data: {Ubicacion_fisica:Ubicacion_fisica} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
                        
                       
                           
        }
        
        
        function uf_folio_desde(elemento,idArchivo,idProceso) {
                       
                        folio_desde=elemento.value;        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_folio_desde'); ?>/" + idArchivo+"/"+idProceso,
                           data: {folio_desde:folio_desde} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
        }
        
        
         function uf_folio_hasta(elemento,idArchivo,idProceso) {
                        folio_hasta=elemento.value;        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_folio_hasta'); ?>/" + idArchivo+"/"+idProceso,
                           data: {folio_hasta:folio_hasta} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
        }
        
        
        function ver_observaciones_archivo(idArchivo){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('archivo/ver_observaciones_archivo'); ?>/" + idArchivo,
                        success: function(data) {
                         $('#idObservacionesArchivo').html(data["historial"]); 
                        }
                      });
        }
        
        function ver_observaciones_documento(idArchivo,idProceso ,idSubTipoProceso, idDocumento){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('archivo/ver_observaciones_documento'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubTipoProceso+"/"+idDocumento,
                           success: function(data) {
                            $('#idObservacionesBloque').html(data["historial"]); 
                           }
                        });
        }
        
        function ver_observaciones_documento_por_archivo(idArchivo){
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('archivo/ver_observaciones_documento_por_archivo'); ?>/" + idArchivo,
                        success: function(data) {
                         $('#idObservacionesArchivo_Documento').html(data["historial"]); 
                        }
                      });
        }
        
        
        function uf_ver_historia_bloque(idArchivo,idProceso) {
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_historia_bloque'); ?>/" + idArchivo+"/"+idProceso,
                           success: function(data) {
                            $('#idHistorialBloque').html(data["historial"]); 
                           }
                         });
        }
        
        
        
        function uf_ver_observaciones_bloque(idArchivo,idProceso ,idSubTipoProceso, idDocumento) {
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_observaciones_bloque'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubTipoProceso+"/"+idDocumento,
                           success: function(data) {
                            $('#idObservacionesBloque').html(data["historial"]); 
                           }
                         });
        }
        
        
        
        function uf_ver_ubicacion_fisica_libre(idArea, idArchivo) {
                        
                       
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_ubicaciones_libres_area'); ?>/" + idArea + "/" +idArchivo, 
                           success: function(data) {
                              
                                $('#idUbicacionFisica_libre').html(data["ubicacion_fisica_libre"]); 
                           }
                         });
                       
        }
        
        function uf_ver_ubicacion_fisica_libre_mod(idArea, idArchivo) {
                        
                       
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_ubicaciones_libres_mod'); ?>/" + idArea + "/" +idArchivo,
                           success: function(data) {
                              
                                $('#idUbicacionFisica_libre_mod').html(data["ubicacion_fisica_libre"]); 
                           }
                         });
                       
        }
        
        
       
        function uf_enviar_revision(idProceso, idArchivo) {
               $("#idTipoProceso_revision").val(idProceso);
               $("#Estatus-recibir").show();
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }

        function uf_enviar_foliado(idProceso, idArchivo) {
               $("#idTipoProceso_foliado").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
       
       
       function uf_enviar_validar(idProceso, idArchivo) {
               $("#idTipoProceso_validar").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
       
       function uf_enviar_digitalizar(idProceso, idArchivo) {
               $("#idTipoProceso_digitalizar").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
     
        function uf_enviar_editar(idProceso, idArchivo) {
               $("#idTipoProceso_editar").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
        
        function uf_enviar_integracion(idProceso, idArchivo) {
               $("#idTipoProceso_integracion").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
        
        
        function uf_enviar_finalizar(idProceso, idArchivo) {
               $("#idTipoProceso_finalizar").val(idProceso);
               $("#finalizar").hide();
               $("#finalizar-oculto").show();
               liberar_estado_trabajo(idProceso, idArchivo, 0);
        }
        
        
        
        function uf_enviar_rechazar(idProceso) {
               $("#idTipoProceso_rechazar").val(idProceso);
        }
        
        function uf_agregar_observaciones(idProceso, idSubProceso, idDocumento, direccion, usuario_preregistro) {
               $("#idTipoProceso_observacion").val(idProceso);
               $("#idSubTipoProceso_observacion").val(idSubProceso);
               $("#idDocumento_observacion").val(idDocumento);
               $("#dir_respuesta_observacion").val(direccion);
               $("#usuario_preregistro").val(usuario_preregistro);
               
               
               
               
        }
        
        function uf_agregar_ubicacion(idProceso){
                $("#idTipoProceso_ubicacion").val(idProceso);
        }
        
        
        
        function uf_totales_recibidos_revisados(idArchivo,idProceso,idSubProceso) {
                        
                      
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/total_documentos_revisados'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubProceso,
                           success: function(data) {
                             alert(data["strSubTipoProceso_revisado"]);  
                             $('#numero_documentos_proceso_revisados'+data["idTipoProceso"]).html(data["strTipoProceso_revisado"])
                             $('#numero_documentos_subproceso_revisados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_revisado"])
                             
                              
                             
                           }
                         });
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/total_documentos_recibidos'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubProceso,
                           success: function(data) {
                             $('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                             $('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                           }
                         });
                       
                           
        }
        
        
        
         function uf_agregar_ubicacion_fisica_mod(id,ubicacion_fisica)
            {
                $("#idUbicacionFisica_mod").val(id);
                $("#txtnom_mod").val(ubicacion_fisica);
                $("#modal-cambiar-ubicacionfisica-mod").modal('hide');
                
            }
            
        function uf_agregar_ubicacion_fisica(id,ubicacion_fisica)
            {
                $("#idUbicacionFisica").val(id);
                $("#nomubicacionfisica").html(ubicacion_fisica);
                $("#modal-cambiar-ubicacionfisica").modal('hide');
                
            }
            
        
        function uf_modificar_ubicacion(id) {

                $("#idRel_mod").val(id);
                $.ajax({
                    url: "<?php echo site_url('ubicacionFisica/datos_relacion_ubicacion') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        //$idProceso = $("#Nombre_mod").val(data['Nombre']);
                        
                        var ubicacion = data['Columna'] + data['Fila'] + data['CajaUbi'] + data['Apartado'] + data['Posicion'];
            $("#txtnom_mod").val(ubicacion);
                        $("#idUbicacionFisica_mod").val(data['idUbi']);
                        $("#txtCaja_mod").val(data['CajaRel']);
                        $("#documento_ubicacion_mod").val(data['Documentos']);
                        $("#txtFolioInicial_mod").val(data['NoFolioInicial']);
                        $("#txtFolioFinal_mod").val(data['NoFolioFinal']);
                        $("#noHojas_mod").val(data['NoHojas']);
                        //$("#noHojas_mod").val(data['Fila']);
                        
                        
                        $("#idUbi_anterior").val(data['idUbi']);

                        
                        
                    }
                });

                

            } 
        
        function uf_agregar_documentos(idArchivo, idProceso){
            $("#idArchivo_agregar").val(idArchivo);
            $("#idProceso_agregar").val(idProceso);
                $.ajax({
                    url: "<?php echo site_url('archivo/listado_documentos_por_proceso') ?>/" + idProceso + "/" +idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#tablaDocumentos").html(data["listado"]);
                       //$("#tablaDocumentos").html("Hola");
                    }
                });
                
                
        }
        
        function imprimir_documento_agregado(idDocumento, idProceso, idSubProceso, idArchivo){
            $("#modal-agregar-documentos").modal('hide');
           
            $.ajax({
                    url: "<?php echo site_url('archivo/agregar_relacion_archivo_documento') ?>/" + idDocumento + "/" + idProceso + "/" + idSubProceso + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                    }
                });
            
            location.href="<?php echo site_url('archivo/cambios') ?>" +"/"  + idArchivo;
        }
        
        function actualizar_plantilla(recibio){
            if (recibio == 1){
                alert ('Ya tienes documentos recibidos, no puedes volver a cargar la plantilla')
            }
        }
        
        function cargar_identificador(id){
            var identificador = $("#identificador").val();
            
           
            $.ajax({
                    url: "<?php echo site_url('archivo/cargar_identificador') ?>/" + id + "/" + identificador,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                         
                    }
                });
                
                $("#identificador").val("");
                $("#caja-i").hide();
                $("#oculta").html("<b>Identificador: </b>" + identificador);
                $("#oculta").show();
                //document.getElementById('caja-v').style.display = 'block';
            
            
            
        }
        
        
        function cargar_bloqueObra(id){
        
            var bloque = $("#slc_obra").val();
            
            //alert($("#slc_obra").val());
           
            $.ajax({
                    url: "<?php echo site_url('archivo/cargar_idBloqueObra') ?>/" + id + "/" + bloque,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                         
                    }
                });
                
                //$("#idBloqueObra").val("");
               // $("#caja-b").hide();
                //$("#oculta-b").html("<b>Bloque : </b>" + identificador);
                //$("#oculta-b").show();
                //document.getElementById('caja-v').style.display = 'block';
        }
        
        function uf_modificar_observacion(id){
                $("#ver_observaciones_bloque_archivo").modal('hide');
                $('#idCatalogo').val(id);
                
                $.ajax({
                    url: "<?php echo site_url('observaciones/datos_observacion') ?>/" + id,
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
            
        function agregar_observaciones_archivo(idDireccion,idContrato){
            $("#idDireccion_Archivo").val(idDireccion);
            $("#idContrato_Archivo").val(idContrato);
            
        }
        
        function modificar_bloque(id)
            {
                $("#idBloqueObra").val(id);
                $("#modal-cambiar-bloque").modal('hide');
                //$("#modal-modificar-cat").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('archivo/datos_bloque'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                       $("#nomBloque").val(data['Nombre']);
                       
                    }
                });
            }
            
        function checar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar, usuario, tipo){
            //alert("Checar")
            if (elemento.checked){
                //$("#estado-trabajo").attr("disabled", "disabled")
                $.ajax({
                    //id= idProceso
                    url: "<?php echo site_url('archivo/comprobar_estado_trabajo'); ?>/" + id  + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                      //$("#estado-trabajo-"+id).html(data['idUsuario_Trabajando']);  
                      if( data['idUsuario_Trabajando'] != 0){
                            //alert('idUsuario_Trabajando dif 0')
                            if(data['idUsuario_Trabajando'] == usuario){
                                uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar);
                                //alert('idUsuario_Trabajando == usuario')
                            } else {
                                //alert('idUsuario_Trabajando dif usuario ' +usuario)
                                
                                $("#modal-ocupado").modal('show');
                            }
                            
                            //Si estaba el bloque abierto
                            if(tipo==1){
                                $("#bloque-abierto-"+id).css("display", "none")
                                $("#bloque-ocupado-"+id).css("display", "none")
                            }
                      }
                      else {
                          uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar);
                      }
                      //alert(data['idUsuario_Trabajando'])
                       
                    }
                });
                
                
               
            }
            else {
            
                $.ajax({
                    //id= idProceso
                    url: "<?php echo site_url('archivo/comprobar_estado_trabajo'); ?>/" + id  + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                      
                            if(data['idUsuario_Trabajando'] == usuario){
                                uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar);
                                //alert('idUsuario_Trabajando == usuario')
                            } 
                    }
                });
               
            }
            
        
            
                
           
           
        }
            
            
        function uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar){
            var trabajando = 0;
            if (elemento.checked){
                
               
                trabajando =1;
            }
            
            //alert( "#panel-proceso-datos-"+id);
            
            
            
            $.ajax({
                    url: "<?php echo site_url('archivo/estado_trabajo'); ?>/" + id + "/" + trabajando + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                      //$("#panel-proceso-datos-"+id).hide();
                       
                    }
                });
           
            
            if(trabajando == 0){
                $("#panel-body-"+id).hide();
                
                $("#ubicaciones-tabla-"+id).css("display", "none" );
                
                $("#info-oculto-"+id).css("display", "none");
                $("#div-agregar-documentos-"+id).css("display", "none" );
                $("#div-accion-"+id).css("display", "none" );
                
                
                
                //$("#ver_ubi").attr("disabled", "disabled" );
                
                //$("#panel-proceso-datos-"+id).children().attr("disabled","disabled");
            }
            if(trabajando == 1){
                $("#panel-body-"+id).show();
      
                $("#ubicaciones-tabla-"+id).css("display", "block" );
                
                $("#info-oculto-"+id).css("display", "block" );
                $("#div-agregar-documentos-"+id).css("display", "block" );
                $("#div-accion-"+id).css("display", "block" );
                
                if(validar == 1 || digitalizar ==1){
                    
                    $("#div-accion-"+id).css("display", "block" );
                }
                
                if(foliar == 1){
                    
                    $("#div-accion-"+id).css("display", "block" );
                    $("div.input-folio  > input").removeAttr("disabled");
                }
                
                if(preregistro == 1){
                    $("#ubicaciones-tabla-"+id).css("display", "none" );
                    $("#div-accion-"+id).css("display", "none" );
                   
                    $("#btn-agregar-documentos").removeAttr("disabled");
                    $("div.btn-documentos  > a").removeAttr("disabled");
                }
                if(recibir == 1 || revisar == 1){
                   
                    $("div.btn-permisos  > a").removeAttr("disabled");
                    $("div.btn-ubicaciones  > a").removeAttr("disabled");
                    $("#ubicaciones-tabla-"+id).css("display", "block" );
                    $("#btn-agregar-ubi").removeAttr("disabled");
                    $("#btn-ubicaciones-libres").removeAttr("disabled");
                    $("div.btn-observaciones  > a").removeAttr("disabled");
                    $("#btn-ver-obs").removeAttr("disabled");
                    $("#div-accion-"+id).css("display", "block" );
                }
                 if (recibir == 0){
                       
                       //btn tabla
                        $("div.btn-permisos  > a").attr("disabled", "disabled");
                        $("div.btn-ubicaciones  > a").attr("disabled", "disabled");
                }
                
                
                
                
                
                
                //$("#ver_ubi").removeAttr("disabled");
                
            }
            
        }
        
        function liberar_estado_trabajo(idProceso, idArchivo, tipo){
            var trabajando = 0;
            //alert("Entro " +tipo)
            $.ajax({
                    url: "<?php echo site_url('archivo/estado_trabajo'); ?>/" + idProceso + "/" + trabajando + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                       //alert("Succes") 
                      
                       
                    }
                });
            //$("#panel-proceso-datos-"+idProceso).hide();
            //
            //
            //Dejar de trabajar con bloque
            if(tipo ==1){
                //alert("tipo=1")
                  $("#bloque-ocupado-"+idProceso).css("display", "none")
                  $("#bloque-abierto-"+idProceso).css("display", "none")


            }
            
            
            
        }
        
        function cargar_noHojas(e, idRelacion, idArchivo){
        //var valor = document.getElementById("texto").value;
          tecla = (document.all) ? e.keyCode : e.which;
          if (tecla!=13){
           
            var hojas = $("#noHojas_doc_"+idRelacion).val();
            //alert($("#noHojas_doc_"+idRelacion).val());
            //var noHojas = document.getElementById("noHojas_doc").value;
            //$.ajax({
                    
                   // url: "<?php //echo site_url('archivo/cargar_noHojas'); ?>/" + idRelacion +  "/" + idArchivo +  "/" + hojas,
                   // dataType: 'json',
                   // success: function (data, textStatus, jqXHR) {
                         //$("#noHojas_doc_"+idRelacion).val(data['noHojas']);
                         
                   // }
                    
               // });
            $.post("<?php echo site_url('archivo/cargar_noHojas'); ?>/" + idRelacion +  "/" + idArchivo +  "/" + hojas, 
                    function() {
                    $("#noHojas_doc_"+idRelacion).val(data['noHojas']);

                  },
                  'json'
            ); 

                
                
            
            //$("#caja-noHojas").hide();
            $("#oculta-noHojas-"+idRelacion).html("<b>No Hojas: </b>" + hojas);
            $("#noHojas-"+idRelacion).hide();
            $("#oculta-noHojas-"+idRelacion).show();
          }
               
        }
        
        function cargar_noHojas_preregistro(id, idArchivo){
        //var valor = document.getElementById("texto").value;
            var hojas = $("#noHojas_doc_"+id).val();
            //alert($("#noHojas_doc_"+idRelacion).val());
            //var noHojas = document.getElementById("noHojas_doc").value;
            $.ajax({
                    
                    url: "<?php echo site_url('archivo/cargar_noHojas_preregistro'); ?>/" + id +  "/"  + hojas,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         //$("#noHojas_doc_"+id).val(data['noHojas']);
                         
                    }
                    
                });
                
                
            
            //$("#caja-noHojas").hide();
            $("#oculta-noHojas-"+id).html("<b>No Hojas: </b>" + hojas);
            $("#noHojas-"+id).hide();
            $("#oculta-noHojas-"+id).show();
                
               
        }

        function validar(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla!=13)
          
        }
        
        function agregar_observaciones_documento(){
            
            
            var marcado =0
            $("#observacion_bloque").modal('hide');
            if ($("#tipo_observacion").prop("checked")){
                marcado = 1
            }
            
                $.ajax({
                    data: {
                        "Motivo" :$("#motivo_observacion").val(), 
                        "idSubTipoProceso_observacion" : $("#idSubTipoProceso_observacion").val(),
                        "idArchivo_observacion" : $("#idArchivo_observacion").val(),
                        "idTipoProceso_observacion" : $("#idTipoProceso_observacion").val(),
                        "idDocumento_observacion" : $("#idDocumento_observacion").val(),
                        "idContrato_observacion" : $("#idContrato_observacion").val(),
                        "idDireccion_observacion" : $("#idDireccion_observacion").val(),
                        "tipo_usuario" : $("#tipo_usuario_observacion").val(),
                        "tipo_observacion" : marcado,
                        "direccion_respuesta" : $("#dir_respuesta_observacion").val(),
                        "usuario_preregistro" : $("#usuario_preregistro").val(),
                        
                        
                    },
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo site_url('archivo/agregar_observaciones_documento/'); ?>",
                })
                 .done(function( data, textStatus, jqXHR ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud se ha completado correctamente." );
                     }
                 })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud a fallado: " +  textStatus);
                     }
                });
            $("#motivo_observacion").val("");
            $("#tipo_observacion").prop("checked", false);
        }
        
        function agregar_ubicacion_fisica(idArchivo){
            
            
            var ubicacion = $("#nomubicacionfisica").html()
            //alert(ubicacion)
            var proceso = $("#idTipoProceso_ubicacion").val()
            //alert("Proceso " +proceso)
            $("#modal-agregar-ubicacion-fisica").modal('hide');
                $.ajax({
                    beforeSend: function(){
                        $("#tabla_ubi_actualizada_"+proceso).html("Cargando...")

                    },
                    data: {
                        "idUbicacionFisica" :$("#idUbicacionFisica").val(), 
                        "Caja" : $("#txtCaja").val(),
                        "Documentos" : $("#documento_ubicacion").val(),
                        "idArchivo" : $("#idArchivo").val(),
                        "NoFolioInicial" : $("#txtFolioInicial").val(),
                        "NoFolioFinal" : $("#txtFolioFinal").val(),
                        "NoHojas" : $("#noHojas").val(),
                        "idTipoProceso" : $("#idTipoProceso_ubicacion").val(),
                        
                    },
                    type: "POST",
                    url: "<?php echo site_url('archivo/agregar_ubicacion_fisica/'); ?>",
                     success: function (data, textStatus, jqXHR) {
                        dibujar_tabla_ubicaciones(idArchivo, proceso)
                        $("#idUbicacionFisica").val("") 
                        $("#txtCaja").val("")
                        $("#documento_ubicacion").val("")
                        $("#nomubicacionfisica").html("")
                        $("#txtFolioInicial").val("")
                        $("#txtFolioFinal").val("")
                        $("#noHojas").val("")
                        $("#idTipoProceso_ubicacion").val("")
                         
                     },
                     error: function(jqXHR, estado, error){
                        console.log(estado)
                        console.log(error)
                     }
                }) ;
                
                
        }
        
        function dibujar_tabla_ubicaciones(idArchivo, proceso){
        
            $.ajax({
                    
                    type: "POST",
                    
                    url: "<?php echo site_url('archivo/ver_ubicaciones_proceso'); ?>/" +idArchivo+"/"+proceso,
                    success: function (data) {
                        
                         //alert("dib" +data["tabla"])
                         $("#tabla_ubi_actualizada_"+proceso).html(data["tabla"]); 
                         $("#tabla_ubi_principal_"+proceso).hide();
                         $("#tabla_ubi_actualizada_"+proceso).show();
                         
                    }
                }) ;
               
        }
        
        
        function cargar_estimaciones(idRel, idArchivo, reviso){
            
            
            var estimaciones = $("#noEstimaciones").val(); 
                $.ajax({
                    beforeSend: function(){
                        
                        $("#div_estimaciones_"+idRel).html("Cargando...")

                    },
                    type: "POST",
                    
                    url: "<?php echo site_url('archivo/cargar_estimaciones'); ?>/" + idRel+"/"+idArchivo+"/"+estimaciones +"/"+reviso,
                    success: function (data) {
                        
                        dibujar_tabla_estimaciones(idRel, idArchivo, reviso)
                        //$("#div_estimaciones_"+idRel).html(data["estimaciones"]); 
                         //$('#div_estimaciones').html("Hola");
                         
                    }
                }) ;
        }

        function dibujar_tabla_estimaciones(idRel, idArchivo, reviso){
            $.ajax({
                    
                    type: "POST",
                    
                    url: "<?php echo site_url('archivo/ver_estimaciones_relacion'); ?>/" +idArchivo+"/"+idRel +"/"+reviso,
                    success: function (data) {
                        
                         //alert//("dib" +data["estimaciones"])
                         $("#div_estimaciones_"+idRel).html(data["estimaciones"]); 
                        
                         
                    }
                }) ;
        }


        function eliminar_estimacion(Numero_Estimacion, idRel, idArchivo){
            //alert("OK" +idRel);
            //var idRel = idRel
                $.confirm({
                title: 'Eliminar Registro',
                content: '¿Deseas Eliminar el Registro?',
                buttons: {
                    Si: function () {
                        $.ajax({
                            
                            type: "POST",
                            url: "<?php echo site_url('archivo/eliminar_estimacion');?>/"+Numero_Estimacion  + "/" +idRel,
                             success: function (data, textStatus, jqXHR) {
                                    //alert("Eliminado")
                                    dibujar_tabla_estimaciones(idRel, idArchivo)
                                 
                             },
                             error: function(jqXHR, estado, error){
                                console.log(estado)
                                console.log(error)
                             }
                        }) ;
                    },
                    No: function () {
                        //$.alert('Canceled!');
                    }
                    
                }});
            
        }
        
        function trabajar_ot(elemento, idArchivo){
            
            trabajando=0
            if (elemento.checked){
                trabajando=1
            }
            
            
            $.ajax({
                    //id= idProceso
                    url: "<?php echo site_url('archivo/trabajar_ot'); ?>/" + trabajando  + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        uf_modificar_estado_trabajo(elemento, 1, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 2, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 3, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 4, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 5, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                            alert ("OK")
                    }
                });
        }
        
        //cargar_noHojas_estimaciones
 
        function cargar_noHojas_estimaciones(id){
        //var valor = document.getElementById("texto").value;
            var hojas = $("#noHojas_est_"+id).val();
            //alert($("#noHojas_doc_"+idRelacion).val());
            //var noHojas = document.getElementById("noHojas_doc").value;
            
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('archivo/editar_estimacion_hojas'); ?>/" + id +  "/"  + hojas,
                    success: function (data, textStatus, jqXHR) {
                         
                          
                    }
                     
                });
                
                $("#div_noHojas_est_"+id).hide();
                $("#div_noHojas_est_aux_"+id).html("<b>No Hojas: </b>" + hojas)
                $("#div_noHojas_est_aux_"+id).show()
          
                
        }
        
        
        
        


       
        
    
    </script> -->
   
        
        <style>
            #row-title{
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                padding: 15px;
                border-radius: 5px;
            }
            .p-l{
              padding-left: 15px;
            }
            
            .table-small{
                font-size: 12px;
                color: #000;
            }
            
            .btn-yellow{
                background: rgb(250, 235, 204);
            }
            .flex{
                display: flex;
                justify-content: space-between;
            }
            .list-style{
                list-style: none;
            }
            
            
            p-t {
              font-size : 2.5em ;
              text-align : center;
              color : #333;
              text-shadow : 0px 3px 5px #999;
            }
            .box{
              position : absolute;
              top : calc(50% - 2.5em);
              left : calc(50% - 3em);
            }
            .container-fluid {
                padding-right: 10px;
                padding-left: 10px;
            }

            .tog .tog-con{
                width : 5em;
                height : 5em/2;
                border-radius : 5em/2;
                box-shadow : 0 0 4px #999;
                position : relative;
                background : #f55;
                transition : all ease-in-out 300ms;
            }
            .tog .tog-con:after{
                  content : "SI";
                  line-height : 5em/2;
                  text-align : center;
                  color : #111;
                  width : 5em/2;
                  height : 5em/2;
                  display : block;
                  background : #eee;
                  border-radius : 5em/2;
                  box-shadow : 0 0 5px -1px;
                  position : absolute;
                  left : 0;
                  transition : all ease-in-out 300ms;
            }
    
            .d-n{
              display : none;
            }
            .input :checked .tog-con{
                background : #1c5;
                transition : all ease-in-out 300ms;
            }
            .input:after{
                  left : 5em/2;
                  content : "NO"
            }
            .align-end{
                text-align: end;
            }
            
            .width-modal{
                width: 1000px !important;
            }
            .enlace-succes{
                color: #3c763d;
            }
            .m-b{
                margin-bottom: 10px;
            }
            .m-b-separacion{
                margin-bottom: 30px;
            }
            
            .list-style{
                list-style: none;
            }
            .m-t{
                margin-top: 10px;
            }
            .d-f{
                display: flex;
                justify-content: space-between;
            }
            .color-red{
                color: #d9534f;
            }
            .m-b-body{
                margin-bottom: 60px;
            }
            .checkbox-lg{
                width: 25px;
                height: 25px;
            }
            
  
        </style>
    
    <body  class="m-b-body" style="overflow: visible;">
        
       
        <!-- Contenido Principal -->
        <div class="container-fluid">
                <!-- Menu Superior -->
            <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>     
             
            
               
            <br> 
            <br>
            <br>
            <div class="row clearfix">
                <!-- breadcrumb -->
                <div class="col-md-12">
                    
                       <ol class="breadcrumb">
                            <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                            <li><a href="<?php echo site_url("archivo/"); ?>">Archivo</a></li>
                        </ol> 
                        
                    
                    
                    
                </div>
                <!-- breadcrumb -->
                
            </div>

            
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading flex">
                        <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-566826">Datos de la Obra</a>

                        <div class="col-sm-3">
                            <div class="col-md-6">

                                <li class="dropdown list-style"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-searchs"></span> Observaciones</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                             <a class="col-md-8" href="#" data-toggle="modal" data-target="#ver_observaciones_bloque_archivo" onclick="ver_observaciones_archivo(<?= $aArchivo['id']?> )"></span> Observaciones de Archivo</a>
                                        </li>
                                        <li>
                                             <a class="col-md-8" href="#" data-toggle="modal" data-target="#ver_observaciones_bloque_archivo_documento" onclick="ver_observaciones_documento_por_archivo(<?= $aArchivo['id']?>)"></span> Observaciones de Documento por Archivo</a>
                                        </li>


                                    </ul>
                                </li>
                            </div>
                            <div class="col-md-6">
                                <li class="dropdown list-style"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-print"></span> Impresiones</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="col-md-4" href="<?php echo site_url("impresion/reporte_estatus_archivo"). '/' . $aArchivo['id']; ?> " target="_blank" >Documentos Archivo</a>
                                        </li>
                                        


                                    </ul>
                                </li>
                            </div>
                        </div>  
                    </div>

                    <div id="panel-element-566826" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row clearfix">
                                <!-- Panel de Control-->
                                <div class="col-md-8">
                                    <div class="tab-pane" id="panel-Vales">
                                            
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">Datos Generales </div>

                                                <div class="row panel-body">

                                                    <div class="col-md-4">
                                                        <dl class="row">
                                                            <input type="hidden" id="idArchivoAux" name="idArchivoAux" value="<?php echo $aArchivo['id']; ?>">
                                                            <dt class="col-md-6 text-end">Orden Trabajo</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['OrdenTrabajo']; ?></dd>
                                                            <dt class="col-md-6 text-end">Contrato </dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['Contrato']; ?></dd>
                                                            <dt class="col-md-6 text-end">Obra</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['Obra']; ?></dd>
                                                        </dl>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <dl class="row">
                                                            <dt class="col-md-6 text-end">Modalidad</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $addw_modalidades[$aArchivo['idModalidad']]; ?></dd>
                                                            <dt class="col-md-6 text-end">Ejercicio </dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['idEjercicio']; ?></dd>
                                                            <dt class="col-md-6 text-end">Normatividad</dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['Normatividad']; ?></dd>
                                                        </dl>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <dl class="row">
                                                           
                                                            <dt class="col-md-6 text-end">Fondo de Programa </dt>
                                                            <dd class="col-md-6 text-star"><?php echo $aArchivo['FondodePrograma']; ?></dd>  
                                                        </dl>      
                                                    </div>  
                                                </div>
                                                
                                                
                                            </div> <!--Fin panel primary-->
                                        </div>
                                    </div>   
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                          <h3 class="panel-title"> Datos de Archivo</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <form class="form-horizontal">
                                                    
                                                    <?php if (!$aArchivo['identificado']){ ?>
                                                        <div class="form-group" id="caja-i">
                                                            
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label" for="exampleInputEmail3">Identificador</label>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" class="form-control" id="identificador" name="identificador" placeholder="Identificador" value="">
                                                                            
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <a class="btn btn-default col-sm-12" id="mostrar" onclick="cargar_identificador(<?php echo $idArchivo ?>)">Agregar</a>
                                                                        </div>
                                                                    </div>

                                                               
                                                            
                                                        </div>

                                                        <div id="oculta" style="display:none">
                                                            
                                                        </div>
                                                    <?php } else { ?>
                                                        <div style="margin-bottom:20px;">
                                                             <b><?php echo 'Identificador: '?></b> <?=$aArchivo['identificado']; ?>   
                                                        </div>
                                                   <?php } ?>
                                                    
                                                    
                                                    
                                                    <?php if (!$aArchivo['idBloqueObra'] && $preregistro ==0){ ?>
                                                        <div class="form-group">
                                                            <!-- grupo va en la tabla bloque-->
                                                            <div class="form-group" id=""caja-b>
                                                              <label class="col-sm-3 control-label" for="exampleInputEmail3">Grupo Obra</label>
                                                              <div class="col-sm-9">
                                                                  <select class="form-control" id="slc_obra" name="slc_obra" onchange="cargar_bloqueObra(<?php echo $idArchivo ?>)">
                                                                        <option value="0">Selecciona un Grupo</option>
                                                                        <?php foreach ($qBloques->result() as $rowdata) {  ?>
                                                                        <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->Nombre; ?></option>
                                                                        <?php } ?>
                                                                  </select>
                                                              </div>

                                                            </div>

                                                                
                                                            
                                                        </div>
                                                    <?php } else if ($aArchivo['idBloqueObra'] && $preregistro ==0){ ?>
                                                        <div style="margin-bottom:20px;">
                                                             <?php echo '<b>Obra: </b>' . $aArchivo['idBloqueObra']; ?>   
                                                        </div>
                                                   <?php } ?>
                                                    
                                                    <div class="form-group"> 
                                                        <div class="col-sm-6">
                                                            <a href="<?php echo site_url("archivo/actualizar_plantilla"). '/' . $aArchivo['id']; ?>" class="btn btn-success"  onclick=""><span class="glyphicon glyphicon-repeat"></span> Actualizar Plantilla </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <a href="#" data-toggle="modal" data-target="#observacion_bloque_archivo" role="button" class="btn btn-success" onclick="agregar_observaciones_archivo(<?= $aArchivo['idDireccion']?>, <?= $aArchivo['idContrato']?>)">
                                                                <span class="glyphicon glyphicon-plus"></span> Observaciones Archivo
                                                            </a>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    <?php if($Editar == 1){
                                                        
                                                    if ($NoProcesos_archivo == $NoProcesos_archivo_integracion){ ?>
                                                    <div class="alert alert-success" role="alert" style="margin-bottom:20px;">
                                                    
                                                                
                                                        <?php echo '<b>Estatus Obra: </b>' . 'Finalizado'; ?> 
                                                        <div>  
                                                            <a class="enlace-succes" href="#" data-toggle="modal" data-target="#enviar_concentracion" role="button"  onclick="uf_enviar_concentracion(<?php echo $idArchivo; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Enviar a Concentración</a>
                                                        </div> 

                                                              
                                                          
                                                    </div>
                                                    
                                                    
                                                    <?php } else {  
                                                        echo '<b>Bloques finalizados: </b>' . $NoProcesos_archivo_integracion; 
                                                        }
                                                    }
                                                    
                                                    
                                                    ?>
                                                    
                                                    <?php if ($reviso ==1){ ?>
                                                    <div>
                                                            
                                                        <label class=""> Trabajar con OT:
                                                            <input id="estado-trabajo" type="checkbox" class="" onchange="trabajar_ot(this, <?php echo $idArchivo ?>)">

                                                        </label>


                                                    </div>
                                                    <?php }?>
                                                    
                                                </form>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--Fin panel 4 col -->
                                
                               
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div> <!-- panel-default -->
            </div>
            
            <!-- Procesos -->
            <?php if (isset($qProcesos)): ?>
                <?php if ($qProcesos->num_rows() > 0): ?>
                        <?php foreach ($qProcesos->result() as $rProcesos): ?>
                            <div class="col-sm-12"> 
                                <div class="panel panel-primary">

                                    <div class="panel-heading d-f"> 
                                        <a class="panel-title" id="panel-proceso-titulo-<?= $rProcesos->idTipoProceso;  ?>" data-toggle="collapse" data-parent="#panel-proceso-<?= $rProcesos->idTipoProceso;  ?>" href="#panel-element-proceso-<?= $rProcesos->idTipoProceso;  ?>">
                                            <?= $rProcesos->Nombre ?>
                                        </a>
                                        <div id="box-estatus">
                                            <?php echo "Estatus: " . $addw_Estatus_Bloque[$rProcesos->Estatus]; ?>
                                        </div>
                                        <div id="numero_documentos_proceso_preregistrados_preregistro<?= $rProcesos->idTipoProceso?>">
                                             <?php  
                                                if ($preregistro == 1){
                                                    $qDocumentos_proceso_recibido = $this->datos_model->documentos_proceso_por_direccion($idArchivo, $idDireccion_responsable, $rProcesos->idTipoProceso);
                                                } else {
                                                    $qDocumentos_proceso_recibido = $this->datos_model->documentos_proceso($idArchivo, $rProcesos->idTipoProceso);     
                                                }
                                                
                                                $qDocumentos_proceso_recibido_total = $this->datos_model->total_procesos($idArchivo, $rProcesos->idTipoProceso);
                                                echo "Preregistrados " . $qDocumentos_proceso_recibido->num_rows() . " de " . $qDocumentos_proceso_recibido_total->num_rows();
                                            
                                                ?>
                                        </div>
                                        <div id="box-recibidos-<?= $rProcesos->idTipoProceso?>">
                                           
                                        </div>
                                        <div id="box-revisados-<?= $rProcesos->idTipoProceso?>">
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div id="panel-element-proceso-<?= $rProcesos->idTipoProceso;  ?>" class="panel-collapse collapse in">
                                        <div class="panel-body"  id="panel-body-<?= $rProcesos->idTipoProceso;  ?>">
                                            
                                            
                                            
                                            <?php $qSubProcesos = $this->datos_model->subprocesos_de_archivo($idArchivo, $rProcesos->idTipoProceso); ?>
                                            
                                            <!-- SubProcesos -->
                                            <?php if (isset($qSubProcesos)): ?>
                                                <?php if ($qSubProcesos->num_rows() > 0): ?>
                                                        <?php foreach ($qSubProcesos->result() as $rSubProcesos): ?>
                                                            
                                                            <div class="panel panel-success">

                                                                <div class="panel-heading d-f"> 
                                                                    <a class="panel-title" id="panel-proceso-titulo-<?= $rSubProcesos->id;  ?>" data-toggle="collapse" data-parent="#panel-proceso-<?= $rSubProcesos->id;  ?>" href="#panel-element-subproceso-<?= $rSubProcesos->id;  ?>">
                                                                        <?= $rSubProcesos->Nombre ?>
                                                                    </a>
                                                                    <div id="numero_documentos_subproceso_preregistrados_preregistro<?= $rSubProcesos->id?>">
                                            
                                                                    </div>

                                                                </div>
                                                                
                                                                <div id="panel-element-subproceso-<?= $rSubProcesos->id;  ?>" class="panel-collapse collapse in" >
                                                                    <div class="panel-body"  id="panel-body-<?= $rSubProcesos->id;  ?>">
                                                                        
                                                                                <?php $qDocumentos = $this->datos_model->documentos_de_archivo($idArchivo, $rSubProcesos->id); ?>

                                                                                <?php if (isset($qDocumentos)): ?>
                                                                                    <?php if ($qDocumentos->num_rows() > 0): ?>
                                                                                        <?php foreach ($qDocumentos->result() as $rRow): ?>
                                                                                            <?php $visualizo = 0; ?>
                                                                                            
                                                                                            <?php if(($preregistro ==1 || $recibe ==1 || $reviso == 1) && $rProcesos->Estatus <= 30): ?> 
                                                                                                <?php // echo "Estatus <=30</br>" ?>   

                                                                                                    <?php $qPreregistros= $this->datos_model->preregistro_documento($rRow->id); ?>

                                                                                                    <?php if ($qPreregistros->num_rows() > 0):?>
                                                                                                        <?php //echo "Preregistro rows". $qPreregistros->num_rows()."</br>" ?>  

                                                                                                        <?php foreach ($qPreregistros->result() as $rPreregistros): ?>

                                                                                                            <?php $checked_recibido="" ?>
                                                                                                            <?php if ($rPreregistros->recibido_cid == 1):?>
                                                                                                                <?php $checked_recibido="checked='checked'" ?>
                                                                                                            <?php endif; ?>

                                                                                                            <?php $checked_revisado="" ?>
                                                                                                            <?php if ($rPreregistros->revisado == 1):?>
                                                                                                                <?php $checked_revisado="checked='checked'" ?>
                                                                                                            <?php endif; ?>

                                                                                                            <?php if ($preregistro == 1): ?>
                                                                                                            <!-- Preregistrado ==1 -->

                                                                                                                <?php if ($idDireccion_responsable == $rPreregistros->idDireccion_responsable):?>
                                                                                                                    <?php //echo "Preregistro de direccion</br>" ?>  
                                                                                                                    <?php $visualizo = 1; ?>
                                                                                                                    <div id="container-documento" class="col-xs-12">

                                                                                                                        <div id="row-documento" class="row flex">

                                                                                                                            <div id="row-title" class="col-sm-5">
                                                                                                                                <?= $rRow->documento?>
                                                                                                                                <br>
                                                                                                                                <small><?= $addw_direciones[$rRow->idDireccion_responsable]?></small>

                                                                                                                            </div> <!-- row-title -->

                                                                                                                            <div id="row-tipo-documento" class="col-sm-2">

                                                                                                                                <?php if ($rPreregistros->tipo_documento == 4): ?>
                                                                                                                                    <?php
                                                                                                                                    $seleccion = "Contiene Estimaciones";
                                                                                                                                    $value='value="4"';
                                                                                                                                    $seleccion1 = "Selecciona una opción";
                                                                                                                                    $value1 = 'value="0"';


                                                                                                                                    ?>


                                                                                                                                    <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                        <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                        <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                                                                                                                    </select>

                                                                                                                                <?php  else: ?>
                                                                                                                                    <?php  if ($rPreregistros->tipo_documento == 1): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion = "Copia";
                                                                                                                                        $value = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 0): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion3 = "No Aplica";
                                                                                                                                        $value3 = 'value="3"';
                                                                                                                                        $seleccion = "Selecciona una opción";
                                                                                                                                        $value = 'value="0"';

                                                                                                                                        ?>


                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 2): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "Original";
                                                                                                                                        $value ='value="2"';
                                                                                                                                        $seleccion1 = "Copia";
                                                                                                                                        $value1 = 'value="1"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 3): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "No Aplica";
                                                                                                                                        $value = 'value="3"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  endif;  ?>
                                                                                                                                <?php  endif;  ?>


                                                                                                                                <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                    <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                                                                                </select>

                                                                                                                            </div> <!-- row-tipo-documento -->

                                                                                                                            <div id="row-hojas" class="col-sm-1">
                                                                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                                                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                                                                            </div> <!-- row-hojas -->

                                                                                                                            <div id="row-acciones" class="col-sm-2">

                                                                                                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rProcesos->idTipoProceso; ?>,<?php echo $rSubProcesos->id ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                                                                </a>

                                                                                                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rProcesos->idTipoProceso .' , ' . $rSubProcesos->id . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-list"></span>
                                                                                                                                </a>

                                                                                                                            </div> <!-- row-acciones -->



                                                                                                                            <div id="row-estatus" class="col-sm-2">
                                                                                                                                <div class="">


                                                                                                                                      <input   type="checkbox" value="" disabled="disabled" > Recibido

                                                                                                                                </div>

                                                                                                                                <div class="" >


                                                                                                                                      <input  type="checkbox" value="" disabled="disabled"> Revisado


                                                                                                                                </div>

                                                                                                                            </div> <!--row-estatus-->



                                                                                                                        </div> <!-- row-documento -->
                                                                                                                        <hr>

                                                                                                                    </div> <!-- container-documento -->
                                                                                                                <?php endif; //Direccion_responsable == $rPreregistros->idDireccion_responsable?>
                                                                                                            <?php else: ?>
                                                                                                            <!-- Preregistrado !=1 -->


                                                                                                                <?php if ($recibe == 1):?>
                                                                                                                    <!-- Recibe ==1 -->
                                                                                                                    <?php $visualizo = 1 ?>

                                                                                                                    <?php ($Estatus == 10) ? $disabled_tipo_doc = "" : $disabled_tipo_doc = "disabled='disabled'" ;?>
                                                                                                                    <div id="container-documento" class="col-xs-12">

                                                                                                                        <div id="row-documento" class="row flex">

                                                                                                                            <div id="row-title" class="col-sm-5">
                                                                                                                                <?= $rRow->documento?>
                                                                                                                                <br>
                                                                                                                                <small><?= $addw_direciones[$rRow->idDireccion_responsable]?></small>

                                                                                                                            </div> <!-- row-title -->

                                                                                                                            <div id="row-tipo-documento" class="col-sm-2">

                                                                                                                                <?php if ($rPreregistros->tipo_documento == 4): ?>
                                                                                                                                    <?php
                                                                                                                                    $seleccion = "Contiene Estimaciones";
                                                                                                                                    $value='value="4"';
                                                                                                                                    $seleccion1 = "Selecciona una opción";
                                                                                                                                    $value1 = 'value="0"';


                                                                                                                                    ?>


                                                                                                                                    <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                        <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                        <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                                                                                                                    </select>

                                                                                                                                <?php  else: ?>
                                                                                                                                    <?php  if ($rPreregistros->tipo_documento == 1): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion = "Copia";
                                                                                                                                        $value = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 0): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion3 = "No Aplica";
                                                                                                                                        $value3 = 'value="3"';
                                                                                                                                        $seleccion = "Selecciona una opción";
                                                                                                                                        $value = 'value="0"';

                                                                                                                                        ?>


                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 2): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "Original";
                                                                                                                                        $value ='value="2"';
                                                                                                                                        $seleccion1 = "Copia";
                                                                                                                                        $value1 = 'value="1"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 3): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "No Aplica";
                                                                                                                                        $value = 'value="3"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  endif;  ?>
                                                                                                                                <?php  endif;  ?>


                                                                                                                                <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                    <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                                                                                </select>

                                                                                                                            </div> <!-- row-tipo-documento -->

                                                                                                                            <div id="row-hojas" class="col-sm-1">
                                                                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                                                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                                                                            </div> <!-- row-hojas -->

                                                                                                                            <div id="row-acciones" class="col-sm-2">

                                                                                                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rProcesos->idTipoProceso; ?>,<?php echo $rSubProcesos->id ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                                                                </a>

                                                                                                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rProcesos->idTipoProceso .' , ' . $rSubProcesos->id . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-list"></span>
                                                                                                                                </a>

                                                                                                                            </div> <!-- row-acciones -->



                                                                                                                            <div id="row-estatus" class="col-sm-2">
                                                                                                                                <div class="">


                                                                                                                                      <input   type="checkbox" value="" disabled="disabled" > Recibido

                                                                                                                                </div>

                                                                                                                                <div class="" >


                                                                                                                                      <input  type="checkbox" value="" disabled="disabled"> Revisado


                                                                                                                                </div>

                                                                                                                            </div> <!--row-estatus-->



                                                                                                                        </div> <!-- row-documento -->


                                                                                                                    </div> <!-- container-documento -->

                                                                                                                <?php endif; // recibe = 1?>

                                                                                                                <?php if ($reviso == 1 && $Estatus == 20 && $rPreregistros->recibido_cid == 1 &&  $visualizo == 0):?>
                                                                                                                    <!-- Reviso == 1 && $rPreregistros->recibido_cid == 1 -->
                                                                                                                    <?php $visualizo = 1 ?>
                                                                                                                    <div id="container-documento" class="col-xs-12">

                                                                                                                        <div id="row-documento" class="row flex">

                                                                                                                            <div id="row-title" class="col-sm-5">
                                                                                                                                <?= $rRow->documento?>
                                                                                                                                <br>
                                                                                                                                <small><?= $addw_direciones[$rRow->idDireccion_responsable]?></small>

                                                                                                                            </div> <!-- row-title -->

                                                                                                                            <div id="row-tipo-documento" class="col-sm-2">

                                                                                                                                <?php if ($rPreregistros->tipo_documento == 4): ?>
                                                                                                                                    <?php
                                                                                                                                    $seleccion = "Contiene Estimaciones";
                                                                                                                                    $value='value="4"';
                                                                                                                                    $seleccion1 = "Selecciona una opción";
                                                                                                                                    $value1 = 'value="0"';


                                                                                                                                    ?>


                                                                                                                                    <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                        <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                        <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                                                                                                                    </select>

                                                                                                                                <?php  else: ?>
                                                                                                                                    <?php  if ($rPreregistros->tipo_documento == 1): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion = "Copia";
                                                                                                                                        $value = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 0): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion3 = "No Aplica";
                                                                                                                                        $value3 = 'value="3"';
                                                                                                                                        $seleccion = "Selecciona una opción";
                                                                                                                                        $value = 'value="0"';

                                                                                                                                        ?>


                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 2): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "Original";
                                                                                                                                        $value ='value="2"';
                                                                                                                                        $seleccion1 = "Copia";
                                                                                                                                        $value1 = 'value="1"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 3): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "No Aplica";
                                                                                                                                        $value = 'value="3"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  endif;  ?>
                                                                                                                                <?php  endif;  ?>


                                                                                                                                <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                    <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                                                                                </select>

                                                                                                                            </div> <!-- row-tipo-documento -->

                                                                                                                            <div id="row-hojas" class="col-sm-1">
                                                                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                                                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                                                                            </div> <!-- row-hojas -->

                                                                                                                            <div id="row-acciones" class="col-sm-2">

                                                                                                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rProcesos->idTipoProceso; ?>,<?php echo $rSubProcesos->id ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                                                                </a>

                                                                                                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rProcesos->idTipoProceso .' , ' . $rSubProcesos->id . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-list"></span>
                                                                                                                                </a>

                                                                                                                            </div> <!-- row-acciones -->



                                                                                                                            <div id="row-estatus" class="col-sm-2">
                                                                                                                                <div class="">


                                                                                                                                      <input   type="checkbox" value="" disabled="disabled" > Recibido

                                                                                                                                </div>

                                                                                                                                <div class="" >


                                                                                                                                      <input  type="checkbox" value="" disabled="disabled"> Revisado


                                                                                                                                </div>

                                                                                                                            </div> <!--row-estatus-->



                                                                                                                        </div> <!-- row-documento -->
                                                                                                                        <hr>

                                                                                                                    </div> <!-- container-documento -->
                                                                                                                <?php endif; //reviso = 1?>
                                                                                                            <?php endif; ?>



                                                                                                        <?php endforeach; ?> <!-- /ciclo preregistros -->
                                                                                                    <?php endif; ?> <!-- /qPreregistros->num_rows() > 0 -->
                                                                                            <?php else: ?> <!-- /Preregistros Recibe Reviso -->
                                                                                                <?php if ($rRowDocumentos->id_preregistro > 0): ?>
                                                                                                    <?php $disabled = "disabled='disabled'"; ?>
                                                                                                    <?php $this->datos_model->relacion_documento($rRow->id);?>
                                                                                                    <?php $rPreregistros = $qPreregistros ->row_array(); ?> 
                                                                                                    <?php $checked_recibido="checked='checked'"?>
                                                                                                    <?php $checked_revisado="checked='checked'"?>
                                                                                                    
                                                                                                    <?php $visualizo=1; ?>  
                                                                                                     <div id="container-documento" class="col-xs-12">

                                                                                                                        <div id="row-documento" class="row flex">

                                                                                                                            <div id="row-title" class="col-sm-5">
                                                                                                                                <?= $rRow->documento?>
                                                                                                                                <br>
                                                                                                                                <small><?= $addw_direciones[$rRow->idDireccion_responsable]?></small>

                                                                                                                            </div> <!-- row-title -->

                                                                                                                            <div id="row-tipo-documento" class="col-sm-2">

                                                                                                                                <?php if ($rPreregistros->tipo_documento == 4): ?>
                                                                                                                                    <?php
                                                                                                                                    $seleccion = "Contiene Estimaciones";
                                                                                                                                    $value='value="4"';
                                                                                                                                    $seleccion1 = "Selecciona una opción";
                                                                                                                                    $value1 = 'value="0"';


                                                                                                                                    ?>


                                                                                                                                    <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                        <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                        <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                                                                                                                    </select>

                                                                                                                                <?php  else: ?>
                                                                                                                                    <?php  if ($rPreregistros->tipo_documento == 1): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion = "Copia";
                                                                                                                                        $value = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 0): ?>

                                                                                                                                        <?php

                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion3 = "No Aplica";
                                                                                                                                        $value3 = 'value="3"';
                                                                                                                                        $seleccion = "Selecciona una opción";
                                                                                                                                        $value = 'value="0"';

                                                                                                                                        ?>


                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 2): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "Original";
                                                                                                                                        $value ='value="2"';
                                                                                                                                        $seleccion1 = "Copia";
                                                                                                                                        $value1 = 'value="1"';
                                                                                                                                        $seleccion2 = "No Aplica";
                                                                                                                                        $value2 = 'value="3"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  elseif ($rPreregistros->tipo_documento == 3): ?>

                                                                                                                                        <?php


                                                                                                                                        $seleccion = "No Aplica";
                                                                                                                                        $value = 'value="3"';
                                                                                                                                        $seleccion1 = "Original";
                                                                                                                                        $value1 ='value="2"';
                                                                                                                                        $seleccion2 = "Copia";
                                                                                                                                        $value2 = 'value="1"';
                                                                                                                                        $seleccion3 = "Selecciona una opción";
                                                                                                                                        $value3 = 'value="0"';

                                                                                                                                        ?>
                                                                                                                                    <?php  endif;  ?>
                                                                                                                                <?php  endif;  ?>


                                                                                                                                <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                                    <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                                                                                </select>

                                                                                                                            </div> <!-- row-tipo-documento -->

                                                                                                                            <div id="row-hojas" class="col-sm-1">
                                                                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                                                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                                                                            </div> <!-- row-hojas -->

                                                                                                                            <div id="row-acciones" class="col-sm-2">

                                                                                                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rProcesos->idTipoProceso; ?>,<?php echo $rSubProcesos->id ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                                                                </a>

                                                                                                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rProcesos->idTipoProceso .' , ' . $rSubProcesos->id . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-list"></span>
                                                                                                                                </a>

                                                                                                                            </div> <!-- row-acciones -->



                                                                                                                            <div id="row-estatus" class="col-sm-2">
                                                                                                                                <div class="">


                                                                                                                                      <input   type="checkbox" value="" disabled="disabled" > Recibido

                                                                                                                                </div>

                                                                                                                                <div class="" >


                                                                                                                                      <input  type="checkbox" value="" disabled="disabled"> Revisado


                                                                                                                                </div>

                                                                                                                            </div> <!--row-estatus-->



                                                                                                                        </div> <!-- row-documento -->
                                                                                                                        <hr>

                                                                                                                    </div> <!-- container-documento -->
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                            
                                                                                            <?php if($visualizo==0): ?> 
                                                                                                                    <?php //echo "viz" .$visualizo; ?>
                                                                                                <?php $visualizo=1 ?> 
                                                                                                     <div id="container-documento" class="col-xs-12">

                                                                                                                        <div id="row-documento" class="row flex">

                                                                                                                            <div id="row-title" class="col-sm-5">
                                                                                                                                <?= $rRow->documento?>
                                                                                                                                <br>
                                                                                                                                <small><?= $addw_direciones[$rRow->idDireccion_responsable]?></small>

                                                                                                                            </div> <!-- row-title -->

                                                                                                                            <div id="row-tipo-documento" class="col-sm-2">

                                                                                                                                <?php if ($rSubProcesos->Nombre == "XI. DE ESTIMACIONES"): ?>
                                                                                                                                    <?php
                                                                                                                                    $seleccion1 = "Contiene Estimaciones";
                                                                                                                                    $value1='value="4"';
                                                                                                                                    $seleccion = "Selecciona una opción";
                                                                                                                                    $value = 'value="0"';


                                                                                                                                    ?>


                                                                                                                                    <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" >

                                                                                                                                        <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRows->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                        <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                                                                                                                    </select>

                                                                                                                                  <?php  else: ?>

                                                                                                                                      <?php
                                                                                                                                      $seleccion = "Selecciona una opción";
                                                                                                                                      $value = 'value="0"';
                                                                                                                                      $seleccion1 = "Original";
                                                                                                                                      $value1='value="2"';
                                                                                                                                      $seleccion2 = "Copia";
                                                                                                                                      $value2= 'value="1"';
                                                                                                                                      $seleccion3 = "No Aplica";
                                                                                                                                      $value3= 'value="3"';

                                                                                                                                      ?>



                                                                                                                                      <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" >

                                                                                                                                          <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                                          <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                                                                                          <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                                                                                          <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                                                                                      </select>
                                                                                                                                  <?php endif; ?> 
                                                                                                                            </div> <!-- row-tipo-documento -->

                                                                                                                            <div id="row-hojas" class="col-sm-1">
                                                                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                                                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                                                                            </div> <!-- row-hojas -->

                                                                                                                            <div id="row-acciones" class="col-sm-2">

                                                                                                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rProcesos->idTipoProceso; ?>,<?php echo $rSubProcesos->id ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                                                                </a>

                                                                                                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rProcesos->idTipoProceso .' , ' . $rSubProcesos->id . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                                                                                    <span class="glyphicon glyphicon-list"></span>
                                                                                                                                </a>

                                                                                                                            </div> <!-- row-acciones -->



                                                                                                                            <div id="row-estatus" class="col-sm-2">
                                                                                                                                <div class="">
                                                                                                                                    <label class="checkbox-inline">
                                                                                                                                        <input type="checkbox" id="inlineCheckbox1" value="" disabled="disabled">  Recibido
                                                                                                                                    </label>
                                                                                                                                </div>

                                                                                                                                <div class="" >
                                                                                                                                    <label class="checkbox-inline">
                                                                                                                                        <input type="checkbox" id="inlineCheckbox1" value="" disabled="disabled">  Revisado
                                                                                                                                    </label>
                                                                                                                                </div>

                                                                                                                            </div> <!--row-estatus-->



                                                                                                                        </div> <!-- row-documento -->
                                                                                                                        <hr>

                                                                                                                    </div> <!-- container-documento -->
                                                                                            <?php endif;  //visualizo==0?>
                                                                                                                 





                                                                                   

                                                                                        <?php endforeach; ?>
                                                                                    <?php endif;  //qDocumentos->num_rows?>
                                                                                <?php endif; //isset(qDocumentos) ?> 


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?> 
                                            <!-- /SubProcesos -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?> 
            <!-- /Procesos -->
            <!-- Sin preregistro -->
                                                                                                <?php  /*if ($rRow->id_preregistro == 0): ?>


                                                                                                    <div id="container-documento" class="col-xs-12">

                                                                                                        <div id="row-documento" class="row flex">

                                                                                                            <div id="row-title" class="col-sm-5">
                                                                                                                <?= $rRow->documento?>
                                                                                                                <br>
                                                                                                                <small><?= $addw_direciones[$rRow->idDireccion_responsable]?></small>

                                                                                                            </div> <!-- row-title -->

                                                                                                            <div id="row-tipo-documento" class="col-sm-2">

                                                                                                                <?php
                                                                                                                    $seleccion = "Selecciona una opción";
                                                                                                                    $value = 'value="0"';
                                                                                                                    $seleccion1 = "Original";
                                                                                                                    $value1='value="2"';
                                                                                                                    $seleccion2 = "Copia";
                                                                                                                    $value2= 'value="1"';
                                                                                                                    $seleccion3 = "No Aplica";
                                                                                                                    $value3= 'value="3"';

                                                                                                                ?>


                                                                                                                <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                                                                    <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                                                                </select>

                                                                                                            </div> <!-- row-tipo-documento -->

                                                                                                            <div id="row-hojas" class="col-sm-1">
                                                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                                                            </div> <!-- row-hojas -->

                                                                                                            <div id="row-acciones" class="col-sm-2">

                                                                                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rProcesos->idTipoProceso; ?>,<?php echo $rSubProcesos->id ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                                                </a>

                                                                                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rProcesos->idTipoProceso .' , ' . $rSubProcesos->id . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                                                                    <span class="glyphicon glyphicon-list"></span>
                                                                                                                </a>

                                                                                                            </div> <!-- row-acciones -->



                                                                                                            <div id="row-estatus" class="col-sm-2">
                                                                                                                <div class="">


                                                                                                                      <input   type="checkbox" value="" disabled="disabled" > Recibido

                                                                                                                </div>

                                                                                                                <div class="" >


                                                                                                                      <input  type="checkbox" value="" disabled="disabled"> Revisado


                                                                                                                </div>

                                                                                                            </div> <!--row-estatus-->



                                                                                                        </div> <!-- row-documento -->
                                                                                                        <hr>

                                                                                                    </div> <!-- container-documento -->


                                                                                                 <?php else: ?> <!-- /Sino sin preregistro -->

                                                                                                 <?php endif; */?> <!-- /Sin preregistro -->
            
        
            <div  class="m-b-separacion">
                <?php /*
                $strin=" in ";
                $proceso_aux="";
                $subproceso_aux="";
                ?>
                <?php if (isset($qPlantilla)): ?>
                    <?php if ($qPlantilla->num_rows() > 0): ?>
                        <div id="container-plantilla" class="row">
                            
                            
                            <?php foreach ($qPlantilla->result() as $rRow): ?>
                            
                                
                                
                                <?php if ($rRow->proceso != $proceso_aux): ?>
                                    
                                    
                                        
                                    <div id="row-proceso-title" class="col-xs-12">
                                        
                                        <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRow->id;  ?>" href="#panel-element-documentos-<?php echo $rRow->id;  ?>">
                                            <?= $rRow->proceso ?>
                                            <?php $proceso_aux = $rRow->proceso;?>
                                        </a>
                                    </div> <!-- row-proceso title -->
                                        


                                <?php endif; ?>

                                <?php if ($rRow->subproceso != $subproceso_aux): ?>
                                    
                                    
                                    <div id="row-subproceso-title" class="col-xs-12">
                                        <?php 
                                            echo $rRow->subproceso;
                                            $subproceso_aux = $rRow->subproceso;
                                        ?>
                                    </div> <!-- row-subproceso title -->
                                    
                                <?php endif; ?>
                                    
                                
                                    <div id="container-documento" class="col-xs-12">
                                        
                                        <div id="row-documento" class="row flex">
                                            
                                            <div id="row-title" class="col-sm-5">
                                                <?= $rRow->documento?>
                                                <br>
                                                <?= $addw_direciones[$rRow->idDireccion_responsable]?>

                                            </div> <!-- row-title -->
                                            
                                            <div id="row-tipo-documento" class="col-sm-2">
                                                 
                                                <?php
                                                    $seleccion = "Selecciona una opción";
                                                    $value = 'value="0"';
                                                    $seleccion1 = "Original";
                                                    $value1='value="2"';
                                                    $seleccion2 = "Copia";
                                                    $value2= 'value="1"';
                                                    $seleccion3 = "No Aplica";
                                                    $value3= 'value="3"';

                                                ?>

                                                
                                                <select class="form-control" name="tipo_documento<?php echo $rRow->id; ?>" id="tipo_documento<?php echo $rRow->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->id; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">
                                                        
                                                    <option   <?php echo $value ?> id="select<?php echo $rRow->id; ?>" name="select<?php echo $rRow->id; ?>"><?php echo $seleccion ?></option>
                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                    <option id="tipo_documento<?php echo $rRow->id; ?>" name="tipo_documento<?php echo $rRow->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                </select>

                                            </div> <!-- row-tipo-documento -->
                                            
                                            <div id="row-hojas" class="col-sm-1">
                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                       onchange="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                            </div> <!-- row-hojas -->
                                            
                                            <div id="row-acciones" class="col-sm-2">
                                                
                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idProceso; ?>,<?php echo $rRow->idSubproceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </a>
                                                
                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rRow->idProceso .' , ' . $rRow->idSubproceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                    <span class="glyphicon glyphicon-list"></span>
                                                </a>

                                            </div> <!-- row-acciones -->
                                            
                                            
                                            
                                            <div id="row-estatus" class="col-sm-2">
                                                <div class="">
                                             
                                                    
                                                      <input   type="checkbox" value="" disabled="disabled" > Recibido
                                                   
                                                </div>

                                                <div class="" >

                                                   
                                                      <input  type="checkbox" value="" disabled="disabled"> Revisado

                                                  
                                                </div>

                                            </div> <!--row-estatus-->

                                           

                                        </div> <!-- row-documento -->
                                        <hr>
                                        
                                    </div> <!-- container-documento -->
                                    
                            <?php endforeach; ?>
                                    
                        </div> <!-- container-plantilla -->
                        
                    <?php endif; ?>
                <?php endif; */?> 
                


           
              
            </div>
            <br>
               
                
        </div> <!-- Container fluid principal -->       
           
           
      <!-- Modal ver observacion -->
        <div class="modal fade" id="modal-ver-observacion" role="dialog" aria-labelledby="modal-modificar-cat_myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-titlsamplee" id="modal-nuevo_documentomyModalLabel">Observaciones</h4>
                    </div>
                    <form action="<?php echo site_url("observaciones/actualizar_estado_observacion"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            
                             <div class="form-group">
                                        <label for="ordenTrabajo" class="col-sm-3 control-label">Orden Trabajo: </label>	
                                        <div class="col-sm-7" name="OrdenTrabajo" id="OrdenTrabajo" style="padding-top: 7px;"> 
                                           
                                         </div>
                            </div>  
                            <div class="form-group">
                                <label for="Contrato" class="col-sm-3 control-label">Contrato: </label>
                                <div class="col-sm-7" name="Contrato" id="Contrato" style="padding-top: 7px;"> 
                                    
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label for="Obra" class="col-sm-3 control-label">Obra: </label>
                                <div class="col-sm-7"  name="Obra" id="Obra" style="padding-top: 7px;"> 
                                   
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="Motivo" class="col-sm-3 control-label">Motivo: </label>
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
                            <input type="hidden" name="idCatalogo" id="idCatalogo" required value="0" class="form-control" >
                            
                            
                            <button type="submit" class="btn btn-success">
                                Marcar como visto y Guardar
                            </button>						
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>						
                        </div>
                    </form>                    
                </div>
            </div>
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
                    <h4 class="modal-titlsamplee text-center" id="modal-nuevo_documentomyModalLabel">Selecciona los Documentos:</h4>
                </div>
                <div class="form-group text-center">
                    <form role="form" method="post" accept-charset="utf-8" action="<?= site_url('archivo/edit_archivo/3'); ?>" class="form-horizontal"  enctype="multipart/form-data" >
                        <input type="hidden" id="idDocumento_anexo" name="idDocumento_anexo" value="" />
                        
                        <input type="hidden" id="idArchivo_anexo" name="idArchivo_anexo" value="<?= $aArchivo["id"]; ?>" />
                        <input type="hidden" id="idEjercicio_anexo" name="idEjercicio_anexo" value="<?=$aArchivo['idEjercicio'];?>" />
                        <input type="hidden" id="idProceso_anexo" name="idProceso_anexo" value="" />
                        <input type="hidden" id="idSubProceso_anexo" name="idSubProceso_anexo" value="" />
                        
                        <input type="hidden" id="idDoc_anexo" name="idDoc_anexo" value="" />
                        
                        <div  class="form-group" ><br>
                            <label for="idSubDocumento_mod" class="col-sm-3 control-label">Cargar Documento</label>
                            <div class="col-sm-8 text-center">
                                <input type="file" id="docfile" name="docfile[]" class="form-control" multiple="true" required=""/>
                            </div>
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
    <!--/div ---------------- -->
       
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
                                <div class="form-group">
                                    <label for="Proyecto" class="control-label col-sm-3">Es Proyecto</label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="Proyecto_mod" name="Proyecto_mod" value="" class="input-sm" />     
                                        
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

        
            
            
     
        
        
              <!-- Dialog Model Enviar Bloque a Revisión -->
        <div class="modal fade" id="enviar_revision" role="dialog" aria-labelledby="myModalLabel-enviar_revision" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus/20"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar Bloque a Revisión
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviara para revisión</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_revision" id="idTipoProceso_revision" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_revision" id="idArchivo_revision" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->
        
        
        <!-- Dialog Model Enviar Bloque a Revisión -->
        <div class="modal fade" id="enviar_foliado" role="dialog" aria-labelledby="myModalLabel-enviar_foliado" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_foliado/40"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar a Foliado
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Foliado</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_foliado" id="idTipoProceso_foliado" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_foliado" id="idArchivo_foliado" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->

        
        
        <!-- Dialog Model Enviar Bloque a Digitalizar -->
        <div class="modal fade" id="enviar_validar" role="dialog" aria-labelledby="myModalLabel-enviar_validar" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_validar/30"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar a Validar
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Validar</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_validar" id="idTipoProceso_validar" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_validar" id="idArchivo_validar" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->


        
        
        
        
        <!-- Dialog Model Enviar Bloque a Digitalizar -->
        <div class="modal fade" id="enviar_digitalizar" role="dialog" aria-labelledby="myModalLabel-enviar_digitalizar" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_digitalizar/50"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar a Digitalizar
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Digitalizar</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_digitalizar" id="idTipoProceso_digitalizar" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_digitalizar" id="idArchivo_digitalizar" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->


        
        
         <!-- Dialog Model Enviar Bloque a Editar -->
        <div class="modal fade" id="enviar_editar" role="dialog" aria-labelledby="myModalLabel-enviar_editar" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_editar/60"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar a Editado
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Editarlo</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_editar" id="idTipoProceso_editar" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_editar" id="idArchivo_editar" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->
        
        
         <!-- Dialog Model Enviar Bloque a Integracion -->
        <div class="modal fade" id="enviar_integracion" role="dialog" aria-labelledby="myModalLabel-enviar_integracion" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_integrar/70"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar a Integrar
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Integrarlo</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_integracion" id="idTipoProceso_integracion" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_integracion" id="idArchivo_integracion" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->
        
         <!-- Dialog Model Enviar Bloque a concentracion -->
        <div class="modal fade" id="enviar_concentracion" role="dialog" aria-labelledby="myModalLabel-enviar_concentracion" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_concentrar/80"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar a Integrar
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Concentración</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_concentracion" id="idTipoProceso_concentracion" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_concentracion" id="idArchivo_concentracion" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->


        
        
                 <!-- Dialog Model Enviar Bloque a Digitalizar -->
        <div class="modal fade" id="enviar_finalizar" role="dialog" aria-labelledby="myModalLabel-enviar_finalizar" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_finalizar/70"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Enviar para Finalizar
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>El Bloque se Enviará para Finalizarlo</b></p>                            
                        <!--
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        -->
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_finalizar" id="idTipoProceso_finalizar" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_finalizar" id="idArchivo_finalizar" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->


        
        
         <!-- Dialog Model Rechazar Bloque -->
        <div class="modal fade" id="rechazar_bloque" role="dialog" aria-labelledby="myModalLabel-rechazar_bloque" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_rechazar/-10"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Rechaza Bloque
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify"><b>Rechazar Bloque</b></p>                            
                        
                        <textarea id="motivo" name="motivo" cols="70" rows="5"></textarea>                                     
                        
                    </div>
                    <div class="modal-footer">                            
                        <input type="hidden" name="idTipoProceso_rechazar" id="idTipoProceso_rechazar" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_rechazar" id="idArchivo_rechazar" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->


        
         <!-- Dialog Model Observaciones Bloque 
        <div class="modal fade" id="observacion_bloque" role="dialog" aria-labelledby="myModalLabel-observacion_bloque" aria-hidden="true">
            <div class="modal-dialog">
            	
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/agregar_observaciones_documento/"); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Observaciones
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="observaciones" class="control-label col-sm-4">Agregar Observaciones</label>
                            <div class="col-sm-10">
                                <textarea class="form-control col-md-12" id="motivo" name="motivo" cols="70" rows="5"></textarea>
                            </div>
                         </div>
                                                   
                        
                                                          
                        
                    </div>
                    
                    <div class="modal-footer">
                        <input type="hidden" name="idSubTipoProceso_observacion" id="idSubTipoProceso_observacion" required value="0" class="form-control" >
                        <input type="hidden" name="idTipoProceso_observacion" id="idTipoProceso_observacion" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_observacion" id="idArchivo_observacion" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <input type="hidden" name="idDocumento_observacion" id="idDocumento_observacion" required value="0" >
                        <input type="hidden" name="idContrato_observacion" id="idContrato_observacion" required value="<?php echo $aArchivo['idContrato']?>" >
                        <input type="hidden" name="idDireccion_observacion" id="idDireccion_observacion" required value="<?php echo $aArchivo['idDireccion']?>>" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
               
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->
        
        
        <!-- Dialog Model Observaciones Bloque -->
        <div class="modal fade" id="observacion_bloque" role="dialog" aria-labelledby="myModalLabel-observacion_bloque" aria-hidden="true">
            <div class="modal-dialog">
            	
                <form class="form-horizontal" role="form">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Observaciones
                        </h4>
                    </div>
                    <div class="modal-body">
                                   
                       
                        
                        <div class="form-group">
                            <label for="observaciones" class="control-label col-sm-4">Agregar Observaciones</label>
                            <div class="col-sm-10">
                                <textarea class="form-control col-md-12" id="motivo_observacion" name="motivo_observacion" cols="70" rows="5"></textarea>
                            </div>
                         </div>
                        
                         <div class="checkbox">
                            <label>
                                <input type="checkbox" value="0" name="tipo_observacion" id="tipo_observacion" onchange="verificar_permisos(this, <?= $preregistro ?>)">
                                Solicitar respuesta
                            </label>
                        </div>
                       
                        
                                                   
                        
                                                          
                        
                    </div>
                    
                    <div class="modal-footer">
                        
                        <input type="hidden" name="idSubTipoProceso_observacion" id="idSubTipoProceso_observacion" required value="0" class="form-control" >
                        <input type="hidden" name="idTipoProceso_observacion" id="idTipoProceso_observacion" required value="0" class="form-control" >
                        <input type="hidden" name="idArchivo_observacion" id="idArchivo_observacion" required value="<?php echo $aArchivo['id'] ?>" class="form-control" >
                        <input type="hidden" name="idDocumento_observacion" id="idDocumento_observacion" required value="0" >
                        <input type="hidden" name="idContrato_observacion" id="idContrato_observacion" required value="<?php echo $aArchivo['idContrato']?>" >
                        <input type="hidden" name="idDireccion_observacion" id="idDireccion_observacion" required value="<?php echo $aArchivo['idDireccion']?>" >
                        <input type="hidden" name="tipo_usuario_observacion" id="tipo_usuario_observacion" required value="<?php echo $preregistro ?>" >
                        <input type="hidden" name="dir_respuesta_observacion" id="dir_respuesta_observacion" required value="" >
                        <input type="hidden" name="usuario_preregistro" id="usuario_preregistro" required value="" >
                        
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <a class="btn btn-primary" onclick="agregar_observaciones_documento()">Aceptar</a>
                    </div>
                </div>
               
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->

        
         <!-- Dialog Model Observaciones por Archivo -->
        <div class="modal fade" id="observacion_bloque_archivo" role="dialog" aria-labelledby="myModalLabel-observacion_bloque" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/agregar_observaciones_por_archivo/" . $aArchivo['id']); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Observaciones
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="observaciones" class="control-label col-sm-4">Agregar Observaciones</label>
                            <div class="col-sm-10">
                                <textarea class="form-control col-md-12" id="motivo_observacion_archivo" name="motivo_observacion_archivo" cols="70" rows="5"></textarea>
                            </div>
                         </div>
                                                   
                        
                                                          
                        
                    </div>
                    
                    <div class="modal-footer">
                        <input type="hidden" name="idDireccion_Archivo" id="idDireccion_Archivo" required value="0" class="form-control" >
                        <input type="hidden" name="idContrato_Archivo" id="idContrato_Archivo" required value="0" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->
        
         <!-- Dialog Model Observaciones de Documentos por Archivo -->
        <div class="modal fade" id="observacion_bloque_archivo_documento" role="dialog" aria-labelledby="myModalLabel-observacion_bloque" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/agregar_observaciones_por_archivo/" . $aArchivo['id']); ?>">
                <div class="modal-content">
                    <div class="modal-header panel-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-espera_solicitud">
                            Observaciones
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="observaciones" class="control-label col-sm-4">Agregar Observaciones</label>
                            <div class="col-sm-10">
                                <textarea class="form-control col-md-12" id="motivo_observacion_archivo" name="motivo_observacion_archivo" cols="70" rows="5"></textarea>
                            </div>
                         </div>
                                                   
                        
                                                          
                        
                    </div>
                    
                    <div class="modal-footer">
                        <input type="hidden" name="idDireccion_Archivo" id="idDireccion_Archivo" required value="0" class="form-control" >
                        <input type="hidden" name="idContrato_Archivo" id="idContrato_Archivo" required value="0" class="form-control" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
                <!--Forma-->
        	</form>
            </div>

        </div>
        <!--            Fin Dialog-->

        <!-- Historial del Bloque  -->
        <div class="modal fade" id="ver_observaciones_bloque_archivo" role="dialog" aria-labelledby="myModalLabel-historial" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header panel-default">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-historial">
                            Observaciones por Archivo 
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                                <div id="idObservacionesArchivo"></div>
                                                                              
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Historial del Bloque Documento por Archivo -->
        <div class="modal fade" id="ver_observaciones_bloque_archivo_documento" role="dialog" aria-labelledby="myModalLabel-historial" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header panel-default">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-historial">
                            Observaciones de Documentos 
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                                <div id="idObservacionesArchivo_Documento"></div>
                                                                              
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>
        <!--            Fin Dialog-->
        
        <!-- Historial del Bloque  -->
        <div class="modal fade" id="historial" role="dialog" aria-labelledby="myModalLabel-historial" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header panel-default">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-historial">
                            Historial 
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                                <div id="idHistorialBloque"></div>
                                                                              
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>
        <!--            Fin Dialog-->
        
        
        <!-- Agregar Documentos  -->
          
        <div class="modal fade" id="modal-agregar-documentos" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
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
                                <label>Listado Documentos</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="tablaDocumentos">
                                        
                                    </div>
                                </div>
                            </div>
                        </fieldset> 
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="idArchivo_agregar" name="idArchivo_agregar" value="">
                    </div>
                </div>
                <!--fin forma-->
            </div>
        </div>
        <!---Fin dialog----> 
         
        <!--            Fin Dialog-->
        
       
         <!-- Historial del Bloque  -->
        <div class="modal fade" id="observaciones_bloque" role="dialog" aria-labelledby="myModalLabel-observaciones_bloque" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header panel-default">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel-historial">
                            Observaciones
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                                <div id="idObservacionesBloque"></div>
                                                                              
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>
        <!--            Fin Dialog-->
        
        
        
        <!-- Dialogo Agregar Ubicacion -->
        <div class="modal fade" id="modal-agregar-ubicacion-fisica" role="dialog" aria-labelledby="modal-agregar-ubicacion-fisica_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Agregar Ubicación Física</h4>
                        </div>
                        <form  class="form-horizontal">
                            <div class="modal-body">



                                
                                <div class="form-group">
                                        <label for="idUbicacionFisica" class="col-sm-3 control-label">Ubicación Física</label>	
                                         <div class="col-sm-7"> 
                                             <div class="form-control" id="nomubicacionfisica"></div>
                                             <input type="hidden" name="idUbicacionFisica" id="idUbicacionFisica" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                             <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica" onclick="uf_ver_ubicacion_fisica_libre(<?php echo $idArea_ubicacion_trabajo ?>,<?php echo $idArchivo ?> )"  ><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                                </div>  
                                
                                
                                <div class="form-group">
                                    <label for="caja_ubicacion" class="control-label col-sm-3">Caja:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="txtCaja" name="txtCaja" value="" class="form-control input-sm" />          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="documento_ubicacion" class="control-label col-sm-3">Documentos:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="documento_ubicacion" name="documento_ubicacion" value="" class="form-control input-sm" />          
                                    </div>
                                </div>
                               
                                <input type="hidden" name="idArchivo" id="idArchivo" required value="<?= $idArchivo; ?>">
                                    
                                
                                <div class="form-group">
                                    <label for="folioInicial" class="control-label col-sm-3">No. Folio Inicial:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioInicial" name="txtFolioInicial" value="" class="form-control input-sm"/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="folioFinal" class="control-label col-sm-3">No. Folio Final:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioFinal" name="txtFolioFinal" value="" class="form-control input-sm" />          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noHojas" class="control-label col-sm-3">No. de Hojas:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="noHojas" name="noHojas" value="" class="form-control input-sm"/>          
                                    </div>
                                </div>

                                
                               
                               
                                
                                
                                
                 


                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="idTipoProceso_ubicacion" id="idTipoProceso_ubicacion" required value="" class="form-control" >
                                <a class="btn btn-success" onclick="agregar_ubicacion_fisica(<?= $idArchivo ?>)">Guardar</a>                  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    
                                    Cancelar
                                </button>
                                
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>       <!-- gregar ubicación fisica --> 
            
            
        <!-- Dialogo Modificar Ubicacion -->
        <div class="modal fade" id="modal-modificar-ubicacion" role="dialog" aria-labelledby="modal-agregar-ubicacion-fisica_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Modificar Ubicación Física</h4>
                        </div>
                        <form action="<?php echo site_url("archivo/modificar_ubicacion_fisica"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="modal-body">



                                
                                <div class="form-group">
                                        <label for="UbicacionFisica_mod" class="col-sm-3 control-label">Ubicación Física</label>	
                                         <div class="col-sm-7"> 
                                             
                                             <input type="text" id="txtnom_mod" name="txtnom_mod" value="" class="form-control input-sm" required/> 
                                             <input type="hidden" name="idUbicacionFisica_mod" id="idUbicacionFisica_mod" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                             <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica-mod" onclick="uf_ver_ubicacion_fisica_libre_mod(<?php echo $idArea_ubicacion_trabajo ?>, <?php echo $idArchivo ?>)"  ><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                                </div>  
                                
                                
                                <div class="form-group">
                                    <label for="caja_ubicacion" class="control-label col-sm-3">Caja:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="txtCaja_mod" name="txtCaja_mod" value="" class="form-control input-sm" />          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="documento_ubicacion" class="control-label col-sm-3">Documentos:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="documento_ubicacion_mod" name="documento_ubicacion_mod" value="" class="form-control input-sm" />          
                                    </div>
                                </div>
                               
                                <input type="hidden" name="idArchivo_mod" id="idArchivo_mod" required value="<?= $idArchivo; ?>">
                                    
                                
                                <div class="form-group">
                                    <label for="folioInicial" class="control-label col-sm-3">No. Folio Inicial:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioInicial_mod" name="txtFolioInicial_mod" value="" class="form-control input-sm" />          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="folioFinal" class="control-label col-sm-3">No. Folio Final:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioFinal_mod" name="txtFolioFinal_mod" value="" class="form-control input-sm" />          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noHojas" class="control-label col-sm-3">No. de Hojas:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="noHojas_mod" name="noHojas_mod" value="" class="form-control input-sm" />          
                                    </div>
                                </div>

                                
                               
                               
                                
                                
                                
                 


                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="idRel_mod" id="idRel_mod" required value="" class="form-control" >
                                <input type="hidden" name="idUbi_anterior" id="idUbi_anterior" required value="" class="form-control" >
                                
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

            <!--Cambiar/Seleccionar Bloque -->    
        <div class="modal fade" id="modal-cambiar-bloque" role="dialog" aria-labelledby="myModalLabel-cambiar-direccion" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Bloques</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Procesos</label><br>
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
                                                <?php foreach ($qBloques->result() as $rowdata) {
                                                        ?>
                                                        <tr>
                                                            <td><small><a href="#" class="btn btn-default btn-xs"  id="reg<?php echo $rowdata->id; ?>" onclick="modificar_bloque(<?php echo $rowdata->id; ?>)">Cambiar</a></small></td>
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
        
            
            
          <!--Cambiar Ubicacion Fisica Tabla -->    
        <div class="modal fade" id="modal-cambiar-ubicacionfisica" role="dialog" aria-labelledby="myModalLabel-modal-cambiar-ubicacionfisica" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content width-modal">
                    <div class="modal-header panel-title width-modal">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Ubicación Física</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Ubicaciones Física</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        
                                        <div id="idUbicacionFisica_libre"></div>
                                        
                                       
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
        
          <!--Cambiar Ubicacion Fisica -->    
        <div class="modal fade" id="modal-cambiar-ubicacionfisica-mod" role="dialog" aria-labelledby="myModalLabel-modal-cambiar-ubicacionfisica" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content">
                    <div class="modal-header panel-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Ubicación Física</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Ubicaciones Física</label><br>
                                <div class="col-sm-12">
                                    <div class="input-group" id="subConcepto">
                                        
                                        <div id="idUbicacionFisica_libre_mod"></div>
                                        
                                       
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
        
        
        <div class="modal fade" id="modal-ocupado" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Bloque Ocupado</h4>
                    </div>
                    <div class="modal-body">
                      <p>Este bloque esta siendo utilizado por otro usuario, espere a que se libere</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        
        <div class="modal fade" id="noHojas-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Número hojas actualizado</h4>
                    </div>
                    <div class="modal-body">
                        <p>El documento tiene: <div id="modal-noHojas"></div></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        
       
            
        <script>
            $(function() {

            
                
                
				
		oTable = $('#tabla_documentos').dataTable({
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
                
                $("div.btn-permisos  > a").attr("disabled", "disabled");
                
                
            }); 
                         //Función que envía la petición ajax.
    function buscar_legajo(){
       $.ajax({
          url: 'buscar_empleado.php',
          type: 'POST',
          timeout: 10000,
          data: {legajo: $("#legajo").val()},
          beforeSend: function(){
             $("#respuesta").html('Buscando legajo...');
          },
          error: function(){
             $("#respuesta").html('');
                alert('Ha surgido un error.')
             },
          success: function(respuesta){
             $("#respuesta").html(respuesta);
          }
       })
    } 
    $(document).ready(function(){
       $("#boton_buscar_legajo").click(function(){
          buscar_legajo();
       });
    });


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
                        $("#Proyecto_mod").val(data['proyecto']);
                        
                        if ($("#Proyecto_mod").val() == 1){
                            $("#Proyecto_mod").prop("checked", true);
                        } 
                        
                         
                        
                         
                    }
                });
                
        }
        
        
        
        function uf_recibir_documento(elemento,idRel_Archivo_Documento) {
                            
                        recibido=0;
                        if (elemento.checked){
                            recibido=1;
                            $("#recibio"+idRel_Archivo_Documento).prop( "disabled", true );
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_recibio'); ?>/" + idRel_Archivo_Documento,
                           data: {recibido:recibido} ,
                           success: function(data) {
                             //$('.center').html(data); 
                             alert ("OK")
                             $('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                             $('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                             
                           }
                         });
                        
                       
                           
        }
        
        //**
        function uf_recibir_tipo_documento(idRel_Archivo_Documento, idArchivo, preregistro) {
                        
                        //alert($("#tipo_documento"+idRel_Archivo_Documento).val())
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==1){
                            preregistrado=1;
                        }
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==2){ 
                            preregistrado=2;
                        }
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==0){
                            preregistrado=0;
                            $("#noHojas_doc_"+idRel_Archivo_Documento).val("")
                            $("#oculta-noHojas-"+idRel_Archivo_Documento).css("display", "none")
                        }
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==3){
                            preregistrado=3;
                            $("#noHojas_doc_"+idRel_Archivo_Documento).val(0)
                            $("#oculta-noHojas-"+idRel_Archivo_Documento).html("<b>No Hojas: </b> 0")
                        }
                        //Si contiene estimaciones
                        if($("#tipo_documento"+idRel_Archivo_Documento).val()==4){
                            preregistrado=4;
                        }
                        //alert('preregistrado ' +preregistrado)
                        
                       
                    //alert ($("#tipo_documento"+idRel_Archivo_Documento).val())
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_preregistrados'); ?>/" + idRel_Archivo_Documento +'/' + idArchivo,
                           data: {preregistrado:preregistrado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                                alert("id rel"+ idRel_Archivo_Documento)
                                $('tipo_documento'+ idRel_Archivo_Documento).css("border-color", "#3c763d")
                                $('#numero_documentos_proceso_preregistrados'+data["idTipoProceso"]).css("display", "none")
                                
                                
                                if (preregistro==1){
                                    $('#numero_documentos_proceso_preregistrados_preregistro'+data["idTipoProceso"]).css("display", "block")
                                    $('#numero_documentos_proceso_preregistrados_preregistro'+data["idTipoProceso"]).html(data["strTipoProceso_preregistrados"])
                                    $('#numero_documentos_subproceso_preregistrados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_preregistrados"])
                                } else{
                                
                                    $('#numero_documentos_proceso_preregistrados_recibe'+data["idTipoProceso"]).css("display", "block")
                            
                                    $('#numero_documentos_proceso_preregistrados_recibe'+data["idTipoProceso"]).html(data["strTipoProceso_cid"])
                                    $('#numero_documentos_subproceso_preregistrados_recibe'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_cid"])
                                }
                             
                           }
                         });
                        
                       
                           
        }
        
        
        
        
        //Cuando hay preregistro
        function uf_recibir_tipo_documento_preregistro(id, id_Rel_Archivo_Documento, idArchivo) {
                        
                        //alert($("#tipo_documento"+idRel_Archivo_Documento).val())
                        if($("#tipo_documento"+id).val()==1){
                            preregistrado=1;
                        }
                        if($("#tipo_documento"+id).val()==2){ 
                            preregistrado=2;
                        }
                        if($("#tipo_documento"+id).val()==0){
                            preregistrado=0;
                        }
                        if($("#tipo_documento"+id).val()==3){
                            preregistrado=3;
                            $("#noHojas_doc_"+id).val(0)
                            $("#oculta-noHojas-"+id).html("0")
                        }
                        //Si contiene estimaciones
                        if($("#tipo_documento"+id).val()==4){
                            preregistrado=4;
                        }
                        //alert('preregistrado ' +preregistrado)
                        
                       
                    //alert ($("#tipo_documento"+idRel_Archivo_Documento).val())
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/editar_documento_preregistro'); ?>/"+id+'/' + id_Rel_Archivo_Documento +'/' + idArchivo,
                           data: {preregistrado:preregistrado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                                //alert('Data ' +data)
                            
                                $('#numero_documentos_proceso_preregistrados'+data["idTipoProceso"]).html(data["strTipoProceso_preregistrados"])
                                $('#numero_documentos_subproceso_preregistrados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_preregistrados"])
                             
                           }
                         });
                        
                       
                           
        }
        
        
        function uf_recibir_estimacion(elemento,idEstimacion) {
               
                        var Est_recibido=0;
                        if (elemento.checked){
                            Est_recibido=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_est_recibio'); ?>/" + idEstimacion +'/' + Est_recibido,
                           data: {recibido:Est_recibido} ,
                           success: function (data) {
                             //$('.center').html(data); 
                            
                             
                             
                           }
                         });
                       
        }
        
        function uf_recibir_tipo_estimacion(idEstimacion) {
                        
                        //alert ($("#tipo_documento_est"+idEstimacion).val())
                        
                        if($("#tipo_documento_est"+idEstimacion).val()==1){
                            recibido=1;
                        }
                        if($("#tipo_documento_est"+idEstimacion).val()==2){
                        
                            recibido=2;
                        }
                        if($("#tipo_documento_est"+idEstimacion).val()==3){
                        
                            recibido=3;
                        }
                        if($("#tipo_documento_est"+idEstimacion).val()==0){
                        
                            recibido=0;
                            $("#noHojas_est_"+idEstimacion).val(0)
                            $("#div_noHojas_est_"+idEstimacion).html("<b>No Hojas: </b> 0" )
                            $("#div_noHojas_est_aux_"+idEstimacion).html("<b>No Hojas: </b> 0" )
                        }
                        
                        
                       
                    //alert ($("#tipo_documento"+idRel_Archivo_Documento).val())
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_est_recibio'); ?>/" + idEstimacion,
                           data: {recibido:recibido} ,
                           success: function(data) {
                             //$('.center').html(data); 
                            
                             //$('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                             //$('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                             
                           }
                         });
                        
                       
                           
        }
        
        

        function uf_original_recibido_estimacion(elemento,idEstimacion) {
                        
                        
                        
                        var Est_original_recibido=0;
                        if (elemento.checked){
                            Est_original_recibido=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_original_recibido_estimacion'); ?>/" + idEstimacion +'/' + Est_original_recibido,
                           data: {original_recibido:Est_original_recibido} ,
                           success: function (data) {
                             //$('.center').html(data); 
                            
                             
                             
                           }
                         });
                         
                         
                        
                       
                           
        }
        
        function uf_revisado_estimacion(elemento,idEstimacion) {
                        
                        
                        
                        var Est_revisado=0;
                        if (elemento.checked){
                            Est_revisado=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit__revisado_estimacion'); ?>/" + idEstimacion +'/' + Est_revisado,
                           data: {revisado:Est_revisado} ,
                           success: function (data) {
                             //$('.center').html(data); 
                            
                             
                             
                           }
                         });
                         
                         
                        
                       
                           
        }

                            
           
        
        
        function uf_orginal_recibido(elemento,idRel_Archivo_Documento) {
                        
                        
                        original_recibido=0;
                        if (elemento.checked){
                            original_recibido=1;
                        }
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_original_recibio'); ?>/" + idRel_Archivo_Documento,
                           data: {original_recibido:original_recibido} ,
                           success: function(data) {
                             //$('.center').html(data); 
                             
                           }
                         });
                        
                       
                           
        }
        
        
        
        
        function uf_recibir_revisado(elemento, id ,idRel_Archivo_Documento) {
                        
                        
                        
                        revisado=0;
                        if (elemento.checked){
                            revisado=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_revisado'); ?>/" + id + "/" + idRel_Archivo_Documento,
                           data: {revisado:revisado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                             
                              $('#numero_documentos_proceso_revisados'+data["idTipoProceso"]).html(data["strTipoProceso_revisado"])
                              $('#numero_documentos_subproceso_revisados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_revisado"])
      
                           }
                         });
                        
                       
                           
        }
        
        function uf_recibido_cid(elemento,id, idRel_Archivo_Documento) {
                 
                        recibido_cid=0;
                        if (elemento.checked){
                            recibido_cid=1;
                        }
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_recibido_cid'); ?>/" + id+"/"+ idRel_Archivo_Documento,
                           data: {recibido_cid:recibido_cid} ,
                           success: function(data) {
                              
                               $('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                               $('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])

                               $("#enviar_revision_"+data["idTipoProceso"]).css("display", "block")

                               if (data["NumTipoProceso"] == data["NumTipoProceso_recibido"]){
                                   //alert ("son iguales")
                                   $("#enviar_revision_"+data["idTipoProceso"]).css("display", "block")
                               }else{
                                   $("#enviar_revision_"+data["idTipoProceso"]).css("display", "none")
                               }
                           }
                         });
                             
        }
        
        
        
        function uf_orginal_revisado(elemento,idRel_Archivo_Documento) {
                        
                        
                        original_revisado=0;
                        if (elemento.checked){
                            original_revisado=1;
                        }
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_original_revisado'); ?>/" + idRel_Archivo_Documento,
                           data: {original_revisado:original_revisado} ,
                           success: function(data) {
                             //$('.center').html(data);
                               
                           }
                         });
                        
                       
                           
        }
        
        
        
        function uf_ubicacion_fisica(elemento,idArchivo,idProceso) {
                        
                        
                        
                       
                        Ubicacion_fisica=elemento.value;        
                        
                      
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_ubicacion_fisica'); ?>/" + idArchivo+"/"+idProceso,
                           data: {Ubicacion_fisica:Ubicacion_fisica} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
                        
                       
                           
        }
        
        
        function uf_folio_desde(elemento,idArchivo,idProceso) {
                       
                        folio_desde=elemento.value;        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_folio_desde'); ?>/" + idArchivo+"/"+idProceso,
                           data: {folio_desde:folio_desde} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
        }
        
        
         function uf_folio_hasta(elemento,idArchivo,idProceso) {
                        folio_hasta=elemento.value;        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_folio_hasta'); ?>/" + idArchivo+"/"+idProceso,
                           data: {folio_hasta:folio_hasta} ,
                           success: function(data) {
                             //$('.center').html(data); 
                           }
                         });
        }
        
        
        function ver_observaciones_archivo(idArchivo){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('archivo/ver_observaciones_archivo'); ?>/" + idArchivo,
                        success: function(data) {
                         $('#idObservacionesArchivo').html(data["historial"]); 
                        }
                      });
        }
        
        function ver_observaciones_documento(idArchivo,idProceso ,idSubTipoProceso, idDocumento, preregistro){
        
                    if (preregistro == 0){
                        $.ajax({
                            type:"POST",
                            url:"<?php echo site_url('archivo/ver_observaciones_documento'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubTipoProceso+"/"+idDocumento,
                               success: function(data) {
                                $('#idObservacionesBloque').html(data["historial"]); 
                               }
                            });
                    } else {
                    
                        $.ajax({
                            type:"POST",
                            url:"<?php echo site_url('archivo/ver_observaciones_documento_direccion'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubTipoProceso+"/"+idDocumento,
                               success: function(data) {
                                $('#idObservacionesBloque').html(data["historial"]); 
                               }
                            });
                    
                    }
        }
        
        function ver_observaciones_documento_por_archivo(idArchivo){
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('archivo/ver_observaciones_documento_por_archivo'); ?>/" + idArchivo,
                        success: function(data) {
                         $('#idObservacionesArchivo_Documento').html(data["historial"]); 
                        }
                      });
        }
        
        
        function uf_ver_historia_bloque(idArchivo,idProceso) {
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_historia_bloque'); ?>/" + idArchivo+"/"+idProceso,
                           success: function(data) {
                            $('#idHistorialBloque').html(data["historial"]); 
                           }
                         });
        }
        
        
        
        function uf_ver_observaciones_bloque(idArchivo,idProceso ,idSubTipoProceso, idDocumento) {
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_observaciones_bloque'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubTipoProceso+"/"+idDocumento,
                           success: function(data) {
                            $('#idObservacionesBloque').html(data["historial"]); 
                           }
                         });
        }
        
        
        
        function uf_ver_ubicacion_fisica_libre(idArea, idArchivo) {
                        
                       
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_ubicaciones_libres_area'); ?>/" + idArea + "/" +idArchivo, 
                           success: function(data) {
                              
                                $('#idUbicacionFisica_libre').html(data["ubicacion_fisica_libre"]); 
                           }
                         });
                       
        }
        
        function uf_ver_ubicacion_fisica_libre_mod(idArea, idArchivo) {
                        
                       
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_ubicaciones_libres_mod'); ?>/" + idArea + "/" +idArchivo,
                           success: function(data) {
                              
                                $('#idUbicacionFisica_libre_mod').html(data["ubicacion_fisica_libre"]); 
                           }
                         });
                       
        }
        
        
       
        function uf_enviar_revision(idProceso, idArchivo) {
               $("#idTipoProceso_revision").val(idProceso);
               $("#Estatus-recibir").show();
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }

        function uf_enviar_foliado(idProceso, idArchivo) {
               $("#idTipoProceso_foliado").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
       
       
       function uf_enviar_validar(idProceso, idArchivo) {
               $("#idTipoProceso_validar").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
       
       function uf_enviar_digitalizar(idProceso, idArchivo) {
               $("#idTipoProceso_digitalizar").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
     
        function uf_enviar_editar(idProceso, idArchivo) {
               $("#idTipoProceso_editar").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
        
        function uf_enviar_integracion(idProceso, idArchivo) {
               $("#idTipoProceso_integracion").val(idProceso);
               liberar_estado_trabajo(idProceso, idArchivo,0);
        }
        
        
        function uf_enviar_finalizar(idProceso, idArchivo) {
               $("#idTipoProceso_finalizar").val(idProceso);
               $("#finalizar").hide();
               $("#finalizar-oculto").show();
               liberar_estado_trabajo(idProceso, idArchivo, 0);
        }
        
        
        
        function uf_enviar_rechazar(idProceso) {
               $("#idTipoProceso_rechazar").val(idProceso);
        }
        
        function uf_agregar_observaciones(idProceso, idSubProceso, idDocumento, direccion, usuario_preregistro) {
               $("#idTipoProceso_observacion").val(idProceso);
               $("#idSubTipoProceso_observacion").val(idSubProceso);
               $("#idDocumento_observacion").val(idDocumento);
               $("#dir_respuesta_observacion").val(direccion);
               $("#usuario_preregistro").val(usuario_preregistro);
               
               
               
               
        }
        
        function uf_agregar_ubicacion(idProceso){
                $("#idTipoProceso_ubicacion").val(idProceso);
        }
        
        
        
        function uf_totales_recibidos_revisados(idArchivo,idProceso,idSubProceso) {
                        
                      
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/total_documentos_revisados'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubProceso,
                           success: function(data) {
                             alert(data["strSubTipoProceso_revisado"]);  
                             $('#numero_documentos_proceso_revisados'+data["idTipoProceso"]).html(data["strTipoProceso_revisado"])
                             $('#numero_documentos_subproceso_revisados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_revisado"])
                             
                              
                             
                           }
                         });
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/total_documentos_recibidos'); ?>/" + idArchivo+"/"+idProceso+"/"+idSubProceso,
                           success: function(data) {
                             $('#numero_documentos_proceso_recibidos'+data["idTipoProceso"]).html(data["strTipoProceso_recibido"])
                             $('#numero_documentos_subproceso_recibidos'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_recibido"])
                           }
                         });
                       
                           
        }
        
        function agregar_observaciones_estimacion(){
            
            
            var marcado =0
            $("#observacion_estimacion").modal('hide');
            if ($("#tipo_observacion_estimacion").prop("checked")){
                marcado = 1
            }
            
                $.ajax({
                    data: {
                        "Motivo" :$("#motivo_observacion_estimacion").val(), 
                        "idArchivo" : $("#idArchivo_realizo_observacion").val(),
                        "idEstimacion" : $("#idEstimacion_observacion").val(),
                        "direccion_respuesta" : $("#idDireccion_respuesta").val(),
                        "idDireccion" : $("#direccion_realizo_observacion").val(),
                        "tipo_usuario" : $("#tipo_usuario_realizo_observacion").val(),
                        "tipo_observacion" : marcado,
                    
                    },
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo site_url('archivo/agregar_observaciones_estimacion/'); ?>",
                })
                 .done(function( data, textStatus, jqXHR ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud se ha completado correctamente." );
                     }
                 })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud a fallado: " +  textStatus);
                     }
                });
            $("#motivo_observacion_estimacion").val("");
            $("#tipo_observacion_estimacion").prop("checked", false);
        }
        
        
        
         function uf_agregar_ubicacion_fisica_mod(id,ubicacion_fisica)
            {
                $("#idUbicacionFisica_mod").val(id);
                $("#txtnom_mod").val(ubicacion_fisica);
                $("#modal-cambiar-ubicacionfisica-mod").modal('hide');
                
            }
            
        function uf_agregar_ubicacion_fisica(id,ubicacion_fisica)
            {
                $("#idUbicacionFisica").val(id);
                $("#nomubicacionfisica").html(ubicacion_fisica);
                $("#modal-cambiar-ubicacionfisica").modal('hide');
                
            }
            
        
        function uf_modificar_ubicacion(id) {

                $("#idRel_mod").val(id);
                $.ajax({
                    url: "<?php echo site_url('ubicacionFisica/datos_relacion_ubicacion') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        //$idProceso = $("#Nombre_mod").val(data['Nombre']);
                        
                        var ubicacion = data['Columna'] + data['Fila'] + data['CajaUbi'] + data['Apartado'] + data['Posicion'];
            $("#txtnom_mod").val(ubicacion);
                        $("#idUbicacionFisica_mod").val(data['idUbi']);
                        $("#txtCaja_mod").val(data['CajaRel']);
                        $("#documento_ubicacion_mod").val(data['Documentos']);
                        $("#txtFolioInicial_mod").val(data['NoFolioInicial']);
                        $("#txtFolioFinal_mod").val(data['NoFolioFinal']);
                        $("#noHojas_mod").val(data['NoHojas']);
                        //$("#noHojas_mod").val(data['Fila']);
                        
                        
                        $("#idUbi_anterior").val(data['idUbi']);

                        
                        
                    }
                });

                

            } 
        
        function uf_agregar_documentos(idArchivo, idProceso){
            $("#idArchivo_agregar").val(idArchivo);
            $("#idProceso_agregar").val(idProceso);
                $.ajax({
                    url: "<?php echo site_url('archivo/listado_documentos_por_proceso') ?>/" + idProceso + "/" +idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#tablaDocumentos").html(data["listado"]);
                       //$("#tablaDocumentos").html("Hola");
                    }
                });
                
                
        }
        
        function imprimir_documento_agregado(idDocumento, idProceso, idSubProceso, idArchivo){
            $("#modal-agregar-documentos").modal('hide');
           
            $.ajax({
                    url: "<?php echo site_url('archivo/agregar_relacion_archivo_documento') ?>/" + idDocumento + "/" + idProceso + "/" + idSubProceso + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                    }
                });
            
            location.href="<?php echo site_url('archivo/cambios') ?>" +"/"  + idArchivo;
        }
        
        function actualizar_plantilla(recibio){
            if (recibio == 1){
                alert ('Ya tienes documentos recibidos, no puedes volver a cargar la plantilla')
            }
        }
        
        function cargar_identificador(id){
            var identificador = $("#identificador").val();
            
           
            $.ajax({
                    url: "<?php echo site_url('archivo/cargar_identificador') ?>/" + id + "/" + identificador,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                         
                    }
                });
                
                $("#identificador").val("");
                $("#caja-i").hide();
                $("#oculta").html("<b>Identificador: </b>" + identificador);
                $("#oculta").show();
                //document.getElementById('caja-v').style.display = 'block';
            
            
            
        }
        
        
        function cargar_bloqueObra(id){
        
            var bloque = $("#slc_obra").val();
            
            //alert($("#slc_obra").val());
           
            $.ajax({
                    url: "<?php echo site_url('archivo/cargar_idBloqueObra') ?>/" + id + "/" + bloque,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         
                         
                    }
                });
                
                //$("#idBloqueObra").val("");
               // $("#caja-b").hide();
                //$("#oculta-b").html("<b>Bloque : </b>" + identificador);
                //$("#oculta-b").show();
                //document.getElementById('caja-v').style.display = 'block';
        }
        
        function uf_modificar_observacion(id){
                $("#ver_observaciones_bloque_archivo").modal('hide');
                $('#idCatalogo').val(id);
                
                $.ajax({
                    url: "<?php echo site_url('observaciones/datos_observacion') ?>/" + id,
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
        function modificar_observacion_documento(id){
                //$("#mod-observacion-documento").modal('hide');
                $("#observaciones_bloque").modal('hide');
                $('#idCatalogo_mod_observacion').val(id);
               
                
                $.ajax({
                    url: "<?php echo site_url('observaciones/datos_observacion_documento_por_id') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        //alert (data['motivo'])
                        //alert (data['tipo_observacion'])
                        $("#mod_motivo_observacion").html(data['Motivo']);
                        $('#idArchivo_mod_observacion').val(data['idArchivo']);
                        $('#idTipoProceso_mod_observacion').val(data['idTipoProceso']);
                        $('#idSubTipoProceso_mod_observacion').val(data['idSubTipoProceso']);
                        $('#idDocumento_mod_observacion').val(data['idDocumento']);
                        
                        if ( data['tipo_observacion'] == 1){
                        $("#mod_tipo_observacion").attr("checked","checked");
                        }
                        
                        
                    }
                
                });
                
                
        }
            
        function agregar_observaciones_archivo(idDireccion,idContrato){
            $("#idDireccion_Archivo").val(idDireccion);
            $("#idContrato_Archivo").val(idContrato);
            
        }
        
        function modificar_bloque(id)
            {
                $("#idBloqueObra").val(id);
                $("#modal-cambiar-bloque").modal('hide');
                //$("#modal-modificar-cat").modal('hide');
                
                $.ajax({
                    url: "<?php echo site_url('archivo/datos_bloque'); ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                       $("#nomBloque").val(data['Nombre']);
                       
                    }
                });
            }
            
        function checar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar, usuario, tipo){
            //alert("Checar")
            if (elemento.checked){
                //$("#estado-trabajo").attr("disabled", "disabled")
                $.ajax({
                    //id= idProceso
                    url: "<?php echo site_url('archivo/comprobar_estado_trabajo'); ?>/" + id  + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                      //$("#estado-trabajo-"+id).html(data['idUsuario_Trabajando']);  
                      if( data['idUsuario_Trabajando'] != 0){
                            //alert('idUsuario_Trabajando dif 0')
                            if(data['idUsuario_Trabajando'] == usuario){
                                uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar);
                                //alert('idUsuario_Trabajando == usuario')
                            } else {
                                //alert('idUsuario_Trabajando dif usuario ' +usuario)
                                
                                $("#modal-ocupado").modal('show');
                            }
                            
                            //Si estaba el bloque abierto
                            if(tipo==1){
                                $("#bloque-abierto-"+id).css("display", "none")
                                $("#bloque-ocupado-"+id).css("display", "none")
                            }
                      }
                      else {
                          uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar);
                      }
                      //alert(data['idUsuario_Trabajando'])
                       
                    }
                });
                
                
               
            }
            else {
            
                $.ajax({
                    //id= idProceso
                    url: "<?php echo site_url('archivo/comprobar_estado_trabajo'); ?>/" + id  + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                      
                            if(data['idUsuario_Trabajando'] == usuario){
                                uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar);
                                //alert('idUsuario_Trabajando == usuario')
                            } 
                    }
                });
               
            }
            
        
            
                
           
           
        }
            
            
        function uf_modificar_estado_trabajo(elemento, id, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar){
            var trabajando = 0;
            if (elemento.checked){
                
               
                trabajando =1;
            }
            
            //alert( "#panel-proceso-datos-"+id);
            
            
            
            $.ajax({
                    url: "<?php echo site_url('archivo/estado_trabajo'); ?>/" + id + "/" + trabajando + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                      //$("#panel-proceso-datos-"+id).hide();
                       
                    }
                });
           
            
            if(trabajando == 0){
                $("#panel-body-"+id).hide();
                
                $("#ubicaciones-tabla-"+id).css("display", "none" );
                
                $("#info-oculto-"+id).css("display", "none");
                $("#div-agregar-documentos-"+id).css("display", "none" );
                $("#div-accion-"+id).css("display", "none" );
                
                
                
                //$("#ver_ubi").attr("disabled", "disabled" );
                
                //$("#panel-proceso-datos-"+id).children().attr("disabled","disabled");
            }
            if(trabajando == 1){
                $("#panel-body-"+id).show();
      
                $("#ubicaciones-tabla-"+id).css("display", "block" );
                
                $("#info-oculto-"+id).css("display", "block" );
                $("#div-agregar-documentos-"+id).css("display", "block" );
                $("#div-accion-"+id).css("display", "block" );
                
                if(validar == 1 || digitalizar ==1){
                    
                    $("#div-accion-"+id).css("display", "block" );
                }
                
                if(foliar == 1){
                    
                    $("#div-accion-"+id).css("display", "block" );
                    $("div.input-folio  > input").removeAttr("disabled");
                }
                
                if(preregistro == 1){
                    $("#ubicaciones-tabla-"+id).css("display", "none" );
                    $("#div-accion-"+id).css("display", "none" );
                   
                    $("#btn-agregar-documentos").removeAttr("disabled");
                    $("div.btn-documentos  > a").removeAttr("disabled");
                }
                if(recibir == 1 || revisar == 1){
                   
                    $("div.btn-permisos  > a").removeAttr("disabled");
                    $("div.btn-ubicaciones  > a").removeAttr("disabled");
                    $("#ubicaciones-tabla-"+id).css("display", "block" );
                    $("#btn-agregar-ubi").removeAttr("disabled");
                    $("#btn-ubicaciones-libres").removeAttr("disabled");
                    $("div.btn-observaciones  > a").removeAttr("disabled");
                    $("#btn-ver-obs").removeAttr("disabled");
                    $("#div-accion-"+id).css("display", "block" );
                }
                 if (recibir == 0){
                       
                       //btn tabla
                        $("div.btn-permisos  > a").attr("disabled", "disabled");
                        $("div.btn-ubicaciones  > a").attr("disabled", "disabled");
                }
                
                
                
                
                
                
                //$("#ver_ubi").removeAttr("disabled");
                
            }
            
        }
        
        function liberar_estado_trabajo(idProceso, idArchivo, tipo){
            var trabajando = 0;
            //alert("Entro " +tipo)
            $.ajax({
                    url: "<?php echo site_url('archivo/estado_trabajo'); ?>/" + idProceso + "/" + trabajando + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                       //alert("Succes") 
                      
                       
                    }
                });
            //$("#panel-proceso-datos-"+idProceso).hide();
            //
            //
            //Dejar de trabajar con bloque
            if(tipo ==1){
                //alert("tipo=1")
                  $("#bloque-ocupado-"+idProceso).css("display", "none")
                  $("#bloque-abierto-"+idProceso).css("display", "none")


            }
            
            
            
        }
        
        function cargar_noHojas(e, idRelacion, idArchivo){
        //var valor = document.getElementById("texto").value;
          tecla = (document.all) ? e.keyCode : e.which;
          if (tecla!=13){
           
            var hojas = $("#noHojas_doc_"+idRelacion).val();
            
            $.post("<?php echo site_url('archivo/cargar_noHojas'); ?>/" + idRelacion +  "/" + idArchivo +  "/" + hojas, 
                    function() {
                    $("#noHojas_doc_"+idRelacion).val(data['noHojas']);

                  },
                  'json'
            ); 

                
                
            
            //$("#caja-noHojas").hide();
            $("#oculta-noHojas-"+idRelacion).html("<b>No Hojas: </b>" + hojas);
            $("#noHojas-"+idRelacion).hide();
            $("#oculta-noHojas-"+idRelacion).show();
          }
               
        }
        
        function cargar_noHojas_preregistro(id, idArchivo){
        //var valor = document.getElementById("texto").value;
            var hojas = $("#noHojas_doc_"+id).val();
            //alert($("#noHojas_doc_"+idRelacion).val());
            //var noHojas = document.getElementById("noHojas_doc").value;
            $.ajax({
                    
                    url: "<?php echo site_url('archivo/cargar_noHojas_preregistro'); ?>/" + id +  "/"  + hojas,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                         //$("#noHojas_doc_"+id).val(data['noHojas']);
                         
                    }
                    
                });
                
                
            
            //$("#caja-noHojas").hide();
            $("#oculta-noHojas-"+id).html("<b>No Hojas: </b>" + hojas);
            $("#noHojas-"+id).hide();
            $("#oculta-noHojas-"+id).show();
                
               
        }

        function validar(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla!=13)
          
        }
        
        function agregar_observaciones_documento(){
            
            
            var marcado =0
            $("#observacion_bloque").modal('hide');
            if ($("#tipo_observacion").prop("checked")){
                marcado = 1
            }
            
                $.ajax({
                    data: {
                        "Motivo" :$("#motivo_observacion").val(), 
                        "idSubTipoProceso_observacion" : $("#idSubTipoProceso_observacion").val(),
                        "idArchivo_observacion" : $("#idArchivo_observacion").val(),
                        "idTipoProceso_observacion" : $("#idTipoProceso_observacion").val(),
                        "idDocumento_observacion" : $("#idDocumento_observacion").val(),
                        "idContrato_observacion" : $("#idContrato_observacion").val(),
                        "idDireccion_observacion" : $("#idDireccion_observacion").val(),
                        "tipo_usuario" : $("#tipo_usuario_observacion").val(),
                        "tipo_observacion" : marcado,
                        "direccion_respuesta" : $("#dir_respuesta_observacion").val(),
                        "usuario_preregistro" : $("#usuario_preregistro").val(),
                        
                        
                    },
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo site_url('archivo/agregar_observaciones_documento/'); ?>",
                })
                 .done(function( data, textStatus, jqXHR ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud se ha completado correctamente." );
                     }
                 })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud a fallado: " +  textStatus);
                     }
                });
            $("#motivo_observacion").val("");
            $("#tipo_observacion").prop("checked", false);
        }
        
        
        function responder_observacion_documento(id){
            $("#observaciones_bloque").modal("hide");
            $.ajax({
                   
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo site_url('observaciones/datos_observacion_documento_por_id/');  ?>/" + id,
                    success: function(data, textStatus, jqXHR){
                        alert(data["Motivo"])
                         $("#Motivo").html(data["Motivo"]);
                         $("#Respuesta").val(data["Respuesta"]);
                         $("#idCatalogo_observacion").val(data["id"]);
                    }
                });
                
                
                 
                
        }
        
        
        function modificar_observaciones_documento(){
            
            
            var marcado =0
            $("#observacion_bloque").modal('hide');
            if ($("#mod_tipo_observacion").prop("checked")){
                marcado = 1
            }
            var id = $("#idCatalogo_mod_observacion").val()
            
                $.ajax({
                    data: {
                        "Motivo" :$("#mod_motivo_observacion").val(), 
                        "tipo_observacion" : marcado,
                    
                    },
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo site_url('archivo/modificar_observaciones_documento/');  ?>/" + id,
                })
                 .done(function( data, textStatus, jqXHR ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud se ha completado correctamente." );
                     }
                 })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud a fallado: " +  textStatus);
                     }
                });
                
            $("#mod-observacion-documento").modal('hide');
            //ver_observaciones_documento(
              //          $('#idArchivo_mod_observacion').val(),
              //          $('#idTipoProceso_mod_observacion').val(),
             //           $('#idSubTipoProceso_mod_observacion').val(),
             //           $('#idDocumento_mod_observacion').val(),
             //           $('#preregistro_mod_observacion').val()
              //          )
            
            //$("#motivo_observacion").val("");
            //
            //$("#tipo_observacion").prop("checked", false);
        }
        
        function agregar_ubicacion_fisica(idArchivo){
            
            
            var ubicacion = $("#nomubicacionfisica").html()
            //alert(ubicacion)
            var proceso = $("#idTipoProceso_ubicacion").val()
            //alert("Proceso " +proceso)
            $("#modal-agregar-ubicacion-fisica").modal('hide');
                $.ajax({
                    beforeSend: function(){
                        $("#tabla_ubi_actualizada_"+proceso).html("Cargando...")

                    },
                    data: {
                        "idUbicacionFisica" :$("#idUbicacionFisica").val(), 
                        "Caja" : $("#txtCaja").val(),
                        "Documentos" : $("#documento_ubicacion").val(),
                        "idArchivo" : $("#idArchivo").val(),
                        "NoFolioInicial" : $("#txtFolioInicial").val(),
                        "NoFolioFinal" : $("#txtFolioFinal").val(),
                        "NoHojas" : $("#noHojas").val(),
                        "idTipoProceso" : $("#idTipoProceso_ubicacion").val(),
                        
                    },
                    type: "POST",
                    url: "<?php echo site_url('archivo/agregar_ubicacion_fisica/'); ?>",
                     success: function (data, textStatus, jqXHR) {
                        dibujar_tabla_ubicaciones(idArchivo, proceso)
                        $("#idUbicacionFisica").val("") 
                        $("#txtCaja").val("")
                        $("#documento_ubicacion").val("")
                        $("#nomubicacionfisica").html("")
                        $("#txtFolioInicial").val("")
                        $("#txtFolioFinal").val("")
                        $("#noHojas").val("")
                        $("#idTipoProceso_ubicacion").val("")
                         
                     },
                     error: function(jqXHR, estado, error){
                        console.log(estado)
                        console.log(error)
                     }
                }) ;
                
                
        }
        
        function dibujar_tabla_ubicaciones(idArchivo, proceso){
        
            $.ajax({
                    
                    type: "POST",
                    
                    url: "<?php echo site_url('archivo/ver_ubicaciones_proceso'); ?>/" +idArchivo+"/"+proceso,
                    success: function (data) {
                        
                         //alert("dib" +data["tabla"])
                         $("#tabla_ubi_actualizada_"+proceso).html(data["tabla"]); 
                         $("#tabla_ubi_principal_"+proceso).hide();
                         $("#tabla_ubi_actualizada_"+proceso).show();
                         
                    }
                }) ;
               
        }
        
        
        function cargar_estimaciones(idRel, idArchivo, reviso){
            $("#tipo_documento"+idRel).val(4);
            
            
            uf_recibir_tipo_documento(idRel, idArchivo, reviso)
            
            
            var estimaciones = $("#noEstimaciones").val(); 
                $.ajax({
                    beforeSend: function(){
                        
                        $("#div_estimaciones_"+idRel).html("Cargando...")

                    },
                    type: "POST",
                    
                    url: "<?php echo site_url('archivo/cargar_estimaciones'); ?>/" + idRel+"/"+idArchivo+"/"+estimaciones +"/"+reviso,
                    success: function (data) {
                        
                        dibujar_tabla_estimaciones(idRel, idArchivo, reviso)
                        //$("#div_estimaciones_"+idRel).html(data["estimaciones"]); 
                         //$('#div_estimaciones').html("Hola");
                         
                    }
                }) ;
                
          
        }

        function dibujar_tabla_estimaciones(idRel, idArchivo, reviso){
            $.ajax({
                    
                    type: "POST",
                    
                    url: "<?php echo site_url('archivo/ver_estimaciones_relacion'); ?>/" +idArchivo+"/"+idRel +"/"+reviso,
                    success: function (data) {
                        
                         //alert//("dib" +data["estimaciones"])
                         $("#div_estimaciones_"+idRel).html(data["estimaciones"]); 
                        
                         
                    }
                }) ;
        }
        
        function eliminar_observacion_documento(id){
            //alert("OK" +idRel);
            //var idRel = idRel
                $.confirm({
                title: 'Eliminar Registro',
                content: '¿Deseas Eliminar el Registro?',
                buttons: {
                    Si: function () {
                        $.ajax({
                            
                            type: "POST",
                            url: "<?php echo site_url('archivo/eliminar_observacion_documento');?>/"+id,
                             success: function (data, textStatus, jqXHR) {
                                    //alert("Eliminado")
                                    $("#observaciones_bloque").modal('hide');
                                    
                                 
                             },
                             error: function(jqXHR, estado, error){
                                console.log(estado)
                                console.log(error)
                             }
                        }) ;
                    },
                    No: function () {
                        //$.alert('Canceled!');
                    }
                    
                }});
            
        }


        function eliminar_estimacion(Numero_Estimacion, idRel, idArchivo){
            //alert("OK" +idRel);
            //var idRel = idRel
                $.confirm({
                title: 'Eliminar Registro',
                content: '¿Deseas Eliminar el Registro?',
                buttons: {
                    Si: function () {
                        $.ajax({
                            
                            type: "POST",
                            url: "<?php echo site_url('archivo/eliminar_estimacion');?>/"+Numero_Estimacion  + "/" +idRel,
                             success: function (data, textStatus, jqXHR) {
                                    //alert("Eliminado")
                                    dibujar_tabla_estimaciones(idRel, idArchivo)
                                 
                             },
                             error: function(jqXHR, estado, error){
                                console.log(estado)
                                console.log(error)
                             }
                        }) ;
                    },
                    No: function () {
                        //$.alert('Canceled!');
                    }
                    
                }});
            
        }
        
        function trabajar_ot(elemento, idArchivo){
            
            trabajando=0
            if (elemento.checked){
                trabajando=1
            }
            
            
            $.ajax({
                    //id= idProceso
                    url: "<?php echo site_url('archivo/trabajar_ot'); ?>/" + trabajando  + "/" + idArchivo,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        uf_modificar_estado_trabajo(elemento, 1, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 2, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 3, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 4, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                        uf_modificar_estado_trabajo(elemento, 5, idArchivo, preregistro, recibir, revisar, foliar, validar, digitalizar, editar)
                            alert ("OK")
                    }
                });
        }
        
        //cargar_noHojas_estimaciones
 
        function cargar_noHojas_estimaciones(id){
        //var valor = document.getElementById("texto").value;
            var hojas = $("#noHojas_est_"+id).val();
            //alert($("#noHojas_doc_"+idRelacion).val());
            //var noHojas = document.getElementById("noHojas_doc").value;
            
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('archivo/editar_estimacion_hojas'); ?>/" + id +  "/"  + hojas,
                    success: function (data, textStatus, jqXHR) {
                         
                          
                    }
                     
                });
                
                $("#div_noHojas_est_"+id).hide();
                $("#div_noHojas_est_aux_"+id).html("<b>No Hojas: </b>" + hojas)
                $("#div_noHojas_est_aux_"+id).show()
          
                
        }
        
        
        function activar_bloque_observacion(){
             $("#observaciones_bloque").modal("show");
        
        
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
        
        function marcar_visto(id){
            $("#visto"+id).css("display", "none");    
             $.ajax({
                    
                    data: {
                        "id" : $("#idCatalogo_observacion").val(), 
                        
                        
                        
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
        
        function uf_agregar_observaciones_estimacion(idEstimacion, direccion_responsable_documento, direcion_preregistro) {
               $("#idEstimacion_observacion").val(idEstimacion);
               $("#idDireccion_respuesta").val(direccion_responsable_documento);
               $("#direccion_realizo_observacion").val(direcion_preregistro);
               
               
               
               
               
        }
        
        function ver_observaciones_estimacion(idArchivo,idEstimacion, preregistro){
                       alert
                    if (preregistro == 0){
                        $.ajax({
                            type:"POST",
                            url:"<?php echo site_url('archivo/ver_observaciones_documento_estimacion'); ?>/" + idArchivo+"/"+idEstimacion,
                               success: function(data) {
                                $('#idObservacionesEstimaciones').html(data["historial"]); 
                               }
                            });
                    } else {
                    
                        $.ajax({
                            type:"POST",
                            url:"<?php echo site_url('archivo/ver_observaciones_estimacion_direccion'); ?>/" +idEstimacion,
                               success: function(data) {
                                $('#idObservacionesEstimaciones').html(data["historial"]); 
                               }
                            });
                    
                    }
        }
        
        function modificar_observacion_estimacion(id){
                //$("#mod-observacion-documento").modal('hide');
                $("#observaciones_estimaciones").modal('hide');
                $('#idCatalogo_mod_observacion_estimacion').val(id);
               
                
                $.ajax({
                    url: "<?php echo site_url('observaciones/datos_observacion_estimacion_por_id') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        //alert (data['motivo'])
                        //alert (data['tipo_observacion'])
                        $("#mod_motivo_observacion_estimacion").html(data['Motivo']);
                       
                        
                        if ( data['tipo_observacion'] == 1){
                        $("#mod_tipo_observacion_estimacion").attr("checked","checked");
                        }
                        
                        
                    }
                
                });
                
                
        }
        
        function modificar_observaciones_estimacion(){
            
            
            var marcado =0
            $("#mod-observacion-estimacion").modal('hide');
            if ($("#mod_tipo_observacion_estimacion").prop("checked")){
                marcado = 1
            }
            var id = $("#idCatalogo_mod_observacion_estimacion").val()
            
                $.ajax({
                    data: {
                        "Motivo" :$("#mod_motivo_observacion_estimacion").val(), 
                        "tipo_observacion" : marcado,
                    
                    },
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo site_url('archivo/modificar_observaciones_estimacion/');  ?>/" + id,
                })
                 .done(function( data, textStatus, jqXHR ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud se ha completado correctamente." );
                     }
                 })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                     if ( console && console.log ) {
                         console.log( "La solicitud a fallado: " +  textStatus);
                     }
                });
                
            $("#mod-observacion-estimacion").modal('hide');
            //ver_observaciones_documento(
              //          $('#idArchivo_mod_observacion').val(),
              //          $('#idTipoProceso_mod_observacion').val(),
             //           $('#idSubTipoProceso_mod_observacion').val(),
             //           $('#idDocumento_mod_observacion').val(),
             //           $('#preregistro_mod_observacion').val()
              //          )
            
            //$("#motivo_observacion").val("");
            //
            //$("#tipo_observacion").prop("checked", false);
        }
        
        
        function eliminar_observacion_estimacion(id){
            //alert("OK" +idRel);
            //var idRel = idRel
                $.confirm({
                title: 'Eliminar Registro',
                content: '¿Deseas Eliminar el Registro?',
                buttons: {
                    Si: function () {
                        $.ajax({
                            
                            type: "POST",
                            url: "<?php echo site_url('archivo/eliminar_observacion_estimacion');?>/"+id,
                             success: function (data, textStatus, jqXHR) {
                                    //alert("Eliminado")
                                    $("#observaciones_estimaciones").modal('hide');
                                    
                                 
                             },
                             error: function(jqXHR, estado, error){
                                console.log(estado)
                                console.log(error)
                             }
                        }) ;
                    },
                    No: function () {
                        //$.alert('Canceled!');
                    }
                    
                }});
            
        }
        
        
        
        


       
        
    
        
        </script>         
</body>
</html>




                              