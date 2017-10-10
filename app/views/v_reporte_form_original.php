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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
        
        <style>
            .table-small{
                font-size: 12px;
                color: #000;
            }
            
            .btn-yellow{
                background: rgb(250, 235, 204);
            }
        </style>
  
 <script type="text/javascript">
        
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
        
        
        
        function uf_recibir_revisado(elemento,idRel_Archivo_Documento) {
                        
                        
                        
                        revisado=0;
                        if (elemento.checked){
                            revisado=1;
                        }
                       
                       
                    
                       
                       
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/edit_revisado'); ?>/" + idRel_Archivo_Documento,
                           data: {revisado:revisado} ,
                           success: function(data) {
                             //$('.center').html(data); 
                             
                              $('#numero_documentos_proceso_revisados'+data["idTipoProceso"]).html(data["strTipoProceso_revisado"])
                              $('#numero_documentos_subproceso_revisados'+data["idSubTipoProceso"]).html(data["strSubTipoProceso_revisado"])
      
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
        
        
        
        function uf_ver_ubicacion_fisica_libre() {
                        
                       
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_ubicaciones_libres'); ?>/",
                           success: function(data) {
                              
                                $('#idUbicacionFisica_libre').html(data["ubicacion_fisica_libre"]); 
                           }
                         });
                       
        }
        
        function uf_ver_ubicacion_fisica_libre_mod() {
                        
                       
                        
                        $.ajax({
                           type:"POST",
                           url:"<?php echo site_url('archivo/ver_ubicaciones_libres_mod'); ?>/",
                           success: function(data) {
                              
                                $('#idUbicacionFisica_libre_mod').html(data["ubicacion_fisica_libre"]); 
                           }
                         });
                       
        }
        
        
       
        function uf_enviar_revision(idProceso) {
               $("#idTipoProceso_revision").val(idProceso);
        }

        function uf_enviar_foliado(idProceso) {
               $("#idTipoProceso_foliado").val(idProceso);
        }
       
       
       function uf_enviar_validar(idProceso) {
               $("#idTipoProceso_validar").val(idProceso);
        }
       
       function uf_enviar_digitalizar(idProceso) {
               $("#idTipoProceso_digitalizar").val(idProceso);
        }
     
        function uf_enviar_editar(idProceso) {
               $("#idTipoProceso_editar").val(idProceso);
        }
        
        
        function uf_enviar_finalizar(idProceso) {
               $("#idTipoProceso_finalizar").val(idProceso);
        }
        
        
        
        function uf_enviar_rechazar(idProceso) {
               $("#idTipoProceso_rechazar").val(idProceso);
        }
        
        function uf_agregar_observaciones(idProceso, idSubProceso, idDocumento) {
               $("#idTipoProceso_observacion").val(idProceso);
               $("#idSubTipoProceso_observacion").val(idSubProceso);
               $("#idDocumento_observacion").val(idDocumento);
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
        
       
        
      </script>
      
      <body>
        
           <!-- Menu Superior -->
         <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?>     
          
           
        <br> 
        <br>
        <br>
                <!-- Contenido Principal -->
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- breadcrumb -->
                <div class="col-md-12 column">
                    <div class="col-md-12" style="display:flex; justify-content: space-between">
                       <ol class="breadcrumb col-md-9">
                            <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                            <li><a href="<?php echo site_url("archivo/"); ?>">Archivo</a></li>
                        </ol> 
                        <ol class="breadcrumb col-md-3">
                        
                            <li><a href="<?php echo site_url("observaciones"); ?>">Ver Observaciones</a></li>

                        </ol>
                    </div>
                    
                    
                </div>
                <!-- breadcrumb -->
                
            </div>
            
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-566826">Datos de la Obra</a>
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
                                                <!--div class="panel-footer text-end" style="text-align:end">
                                                    <a href="#" class="btn btn-success" title="hidden"  data-toggle="modal" data-target="#modal-modificar-archivo" role="button" onclick="uf_modificar_archivo(<?php echo $aArchivo['id'];  ?>)">
                                                        <i class="glyphicon glyphicon-pencil"></i> Modificar
                                                    </a>
                                                                        
                                                    
                                                    
                                                </div-->
                                                
                                            </div> <!--Fin panel-->
                                            </div>
                                            </div>
                                            
                                        </dl>
                                    </div>
                                    
                                   
                                    
                            </div>
                                
                    </div>
                </div>
                
            </div>
        
         
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
        <!-- Procesos -->  
        
        <div class="row clearfix container-fluid">
            
            
             <?php 
                        $qUbicacion = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idTipoProceso" => $rRow->id,"idArchivo" => $idArchivo));                    
                        
                        if ($qUbicacion->num_rows()>0){
                            
                        
                        
                        $aUbicacion=$qUbicacion->row_array();
                        $Ubicacion_fisica=$aUbicacion["Ubicacion_fisica"];
                        $Folio_Desde=$aUbicacion["Folio_Desde"];
                        $Folio_Hasta=$aUbicacion["Folio_Hasta"];
                        $Estatus=$aUbicacion["Estatus"];
                    ?>
            
            
             <div class="row">
                    
                       
                        
                <div class="col-sm-3" >
                    
                     <div class="panel-group" id="panel-proceso-<?php echo $rRow->id;  ?>">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                    
                    
                    
                   
                    
                    <div class="table-responsive">
                    <table class="table">
                        <tr>
                            
                        </tr>
                        <tr>
                            
                            <td colspan="2">
                                <label>Ubicación Física:</label>
                                <table width="100%">
                                    <tr>
                                        <!--td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Acción <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#"  data-toggle="modal" data-target="#modal-agregar-ubicacion-fisica" role="button" onclick="uf_agregar_ubicacion(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Ubicación </a>
                                            </li>
                                            <li>
                                                <a href="#"  data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica" role="button" onclick="uf_ver_ubicacion_fisica_libre()" ><span class="glyphicon glyphicon-search"></span>  Ubicaciones Libres</a>
                                            </li>
                                            <li>
                                                <a href="#"  data-toggle="modal" data-target="#modal-agregar-documentos" title="Agregar Documentos" role="button" onclick="uf_agregar_documentos(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>)">
                                                    <span class="glyphicon glyphicon-plus-sign"></span> Agregar Documentos
                                                </a>
                                            </li>
                                          <li>
                                              <a href="<?php //echo site_url('impresion/etiqueta_orden_trabajo/' . $aArchivo['id']); ?>" target="_blank">
                                                <span class="glyphicon glyphicon-file"></span>Etiqueta Orden de Trabajo Totales
                                              </a>
                                          </li>
                                          <li>
                                              <a href="<?php //echo site_url('impresion/etiqueta_orden_trabajo_chica/' . $aArchivo['id']); ?>" target="_blank">
                                                    <span class="glyphicon glyphicon-file"></span>Etiqueta Orden de Trabajo Ubicación
                                                </a>
                                          </li>
                                          
                                        </ul>
                                      </div>
                                        </td-->
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td align="end">
                                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-agregar-ubicacion-fisica" role="button" onclick="uf_agregar_ubicacion(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Ubicación </a>
                                        </td>
                                           
                                    </tr>
                                    <tr> <td>&nbsp;</td></tr>
                        
                        
                                    <tr align="">
                                       
                                       <td align="end">
                                           <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica" role="button" onclick="uf_ver_ubicacion_fisica_libre()" ><span class="glyphicon glyphicon-search"></span>  Ubicaciones Libres</a>
                                       </td>
                                          
                                   </tr>
                                   <tr> <td>&nbsp;</td></tr>
                                </table>
                                 <?php
                                if (isset($qRelProcesoUbicacion)) {
                                    if ($qRelProcesoUbicacion->num_rows() > 0) {
                                ?>       
                                <table class="table-bordered table-condensed table-responsive table-small" width="100%">
                                    <tr>
                                        <td>Acción</td>
                                        <td>Ubicacion Fisica</td>
                                        <td>Caja</td>
                                        <td>Documento</td>
                                        <td>No Folio Inicial</td>
                                        <td>No Folio Final</td>
                                        <td>No Hojas</td>
                                       
                                        
                                    </tr>
                                    <?php
                                        foreach ($qRelProcesoUbicacion->result() as $rRelacion) {
                                            if ($rRelacion->idTipoProceso == $rRow->id){
                                                //echo 'proceso' . $rRelacion->idTipoProceso . 'Proc' . $rRow->id ;
                                               if ( $idArchivo == $rRelacion->idArchivo){
                                            ?>
                                    <tr>
                                        <td> 
                                            <!-- #MAOC --> 
                                            <div class="btn-group">
                                               <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-bottom:5px;">
                                                 <span class="glyphicon glyphicon-print"></span>
                                               </button>
                                               <ul class="dropdown-menu">
                                                 <li>
                                                     <a href="<?php echo site_url('impresion/etiqueta_orden_trabajo/' . $aArchivo['id']); ?>" target="_blank">
                                                       <span class="glyphicon glyphicon-file"></span> Etiqueta para Archivo de Recepción
                                                     </a>
                                                 </li>
                                                 <li>
                                                     <a href="<?php echo site_url('impresion/etiqueta_orden_trabajo_chica/' . $aArchivo['id']); ?>" target="_blank">
                                                           <span class="glyphicon glyphicon-file"></span> Etiqueta para Archivo de Integración
                                                       </a>
                                                 </li>

                                               </ul>
                                             </div>
                                            <a href="#" class="btn btn-success btn-xs" title=""  data-toggle="modal" data-target="#modal-modificar-ubicacion" role="button" onclick="uf_modificar_ubicacion(<?php echo $rRelacion->idRel; ?>)" style="margin-bottom:5px;"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                            <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url('archivo/eliminar_relacion_ubicacion/' . $rRelacion->idRel.' '.$idArchivo .' '. $rRelacion->idUbicacionFisica ); ?>" title="Eliminar Solicitud" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                        </td>
                                        <td> <?php echo  $rRelacion->Columna . '.' . $rRelacion->Fila.'.' . $rRelacion->C .'.' . $rRelacion->Apartado . '.' .$rRelacion->Posicion ?></td>
                                        <td> <?php echo  $rRelacion->CajaUbi ?></td>
                                        <td> <?php echo  $rRelacion->Documentos ?></td>
                                        <td><?php echo  $rRelacion->NoFolioInicial ?></td>
                                        <td> <?php echo  $rRelacion->NoFolioFinal ?></td>
                                        <td> <?php echo  $rRelacion->NoHojas ?></td>
                                    </tr>
                                    <?php 
                                            }
                                            }
                                        }
                                    ?>
                                    
                                </table>
                                <?php 
                                              
                                    }
                                }
                                
                                ?>
                            </td>
                            <!--td>
                                <input class="form-control" name="ubicacion<?php echo $rRow->id; ?>" type="text"   id="ubicacion<?php echo $rRow->id; ?>" onchange="uf_ubicacion_fisica(this,<?= $idArchivo; ?>,<?= $rRow->id; ?>)" value="<?php echo $Ubicacion_fisica; ?>" >
                                
                                
                              
                            </td-->
                        </tr>
                        <?php                                           
                            if (($Foliar==1) && ($Estatus==30)){	
                        ?>
                        <tr>
                            <td>
                                <label>Folio Desde:</label>
                            </td>
                        
                            <td>
                                <input class="form-control" name="folio_desde<?php echo $rRow->id; ?>" type="text"   id="folio_desde<?php echo $rRow->id; ?>" onchange="uf_folio_desde(this,<?= $idArchivo; ?>,<?= $rRow->id; ?>)" value="<?php echo $Folio_Desde; ?>" >
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <label>Folio Hasta: </label>
                            </td>
                        
                            <td>
                                <input class="form-control" name="folio_hasta<?php echo $rRow->id; ?>" type="text"   id="folio_hasta<?php echo $rRow->id; ?>" onchange="uf_folio_hasta(this,<?= $idArchivo; ?>,<?= $rRow->id; ?>)" value="<?php echo $Folio_Hasta; ?>" >
                            </td>
                        </tr>
                        
                        
                        <?php                                           
                            }else{
                        ?>        
                        <tr>
                            <td>
                                <label>Folio Desde:</label>
                            </td>
                        
                            <td>
                                 <?php echo $Folio_Desde; ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Folio Hasta:</label>
                            </td>
                        
                            <td>
                                 <?php echo $Folio_Hasta; ?>
                            </td>
                        </tr>
                        
                        <?php         
                            }	
                        ?>
                        
                        
                        
                       
                        
                        
                        
                        
                         <tr>
                            <td>
                               
                               <a href="#historial" data-toggle="modal" data-target="#historial" title="Historial" role="button" onclick="uf_ver_historia_bloque(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-search"></span>Ver  Historial  Estatus del Bloque</a>
                            </td>
                            <td>
                            </td>    
                        </tr>
                        
                        
                        
                        
                    </table>
                    
                    </div>
                   
                    
                    
                    <?php
                                 switch ($Estatus) {

            						case -10:
								// Editable
                               
                                    ?>
                                   
                                   
                                   
									<?php                                           
									 if ($recibe==1){  	
                                    ?>
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_revision" role="button"  onclick="uf_enviar_revision(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Enviar Revisión</a>
                                    </li>
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>
                                
                                     
                                     
                                     <?php
									 break;
                                    // Vo Bo.
									case 10:
									
                                    ?>
                                  
                                   <?php                                           
									if ($reviso==1){	
                                    ?>
 									
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#rechazar_bloque" role="button" onclick="uf_enviar_rechazar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Rechaza Bloque</a>
                                    </li>
                                    
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_revision" role="button"  onclick="uf_enviar_revision(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Enviar Revisión</a>
                                    </li>
				
                                    
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>
                                     
                                   
                                
                                <?php
									 break;
                                    // Vo Bo.
									case 20:
									
                                    ?>
                                  
                                   <?php                                           
									if ($reviso==1){	
                                    ?>
 									
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#rechazar_bloque" role="button" onclick="uf_enviar_rechazar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Rechaza Bloque</a>
                                    </li>
                                    
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_foliado" role="button" onclick="uf_enviar_foliado(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span>Enviar Foliado</a>
                                    </li>
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>
                                
                                
                             
                                     
                                    <?php
						 break;
                                    // Vo Bo.
									case 30:
									
                                    ?>
                                  
                                   <?php                                           
									if ($Foliar==1){	
                                    ?>
 									
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#rechazar_bloque" role="button" onclick="uf_enviar_rechazar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Rechaza Bloque</a>
                                    </li>
                                    
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_validar" role="button" onclick="uf_enviar_validar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span>Enviar Validar</a>
                                    </li>
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>
                                

                                
                                                                     <?php
						 break;
                                    // Vo Bo.
									case 40:
									
                                    ?>
                                  
                                   <?php                                           
									if ($Validar==1){	
                                    ?>
 									
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#rechazar_bloque" role="button" onclick="uf_enviar_rechazar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Rechaza Bloque</a>
                                    </li>
                                    
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_digitalizar" role="button" onclick="uf_enviar_digitalizar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span>Enviar Digitalizar</a>
                                    </li>
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>
                                

                                     
                                     
                              
                                    <?php
						 break;
                                    // Vo Bo.
									case 50:
									
                                    ?>
                                  
                                   <?php                                           
									if ($digitalizar==1){	
                                    ?>
 									
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#rechazar_bloque" role="button" onclick="uf_enviar_rechazar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Rechaza Bloque</a>
                                    </li>
                                    
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_editar" role="button" onclick="uf_enviar_editar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span>Enviar para Editarlo</a>
                                    </li>
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>
     
                                     
                                     
                                     
                                    <?php
						 break;
                                    // Vo Bo.
									case 60:
									
                                    ?>
                                  
                                   <?php                                           
									if ($digitalizar==1){	
                                    ?>
 									
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#rechazar_bloque" role="button" onclick="uf_enviar_rechazar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span> Rechaza Bloque</a>
                                    </li>
                                    
                                    <li class="active">
                                        <a href="#" data-toggle="modal" data-target="#enviar_finalizar" role="button" onclick="uf_enviar_finalizar(<?php echo $rRow->id; ?>)"><span class="glyphicon glyphicon-share-alt"></span>Enviar para Finalizarlo</a>
                                    </li>
									<?php                                   
									}else{
                                    ?>
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
									<?php                                   
									}
                                    ?>

                                     
                                     
                                    
                                    
                                <?php 
									break;                                       
                                                                              
                                                                        
                                                                        
                                                                        
                                   // Autoriza.
									default:
									
                                    ?>
                                    
                                    
                                     
                                     <li><a class="btn-primary" href="#"><span class="glyphicon glyphicon-flag"></span><?php echo $addw_Estatus_Bloque[$Estatus]; ?></a></li>
                                <?php } ?>
                                     <div style="text-align:end">
                                         <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-agregar-documentos" title="Agregar Documentos" role="button" onclick="uf_agregar_documentos(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>)">
                                            <span class="glyphicon glyphicon-plus-sign"></span> Agregar Documentos
                                        </a>
                                         <a href="v_reporte_orden_trabajo.php"></a>
                                     </div>
                                     
                                       
                                    

                    
                   
                    
                        <!--
                         <button class="btn btn-xs btn-success dropdown-toggle" onclick="ubicacion_fisica(<?= $idArchivo; ?>,<?= $rRow->id; ?>)" type="button" >
                                                        <span class="glyphicon glyphicon-plus" title="Ubicacion Fisica" ></span> Modificar Ubicacion Fisica
                                                    </button>&nbsp;
                         -->            
                    </div>
                    </div>    
                    </div> 
                    
                     
                </div>
                 
               
                
                <div class="col-sm-9" > 
                <div class="panel-group" id="panel-proceso-<?php echo $rRow->id;  ?>">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading"> 
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-proceso-<?php echo $rRow->id;  ?>" href="#panel-element-proceso-<?php echo $rRow->id;  ?>">
                                <table>
                                    <tr> <!-- #Estatus -->
                                        <td width="800" >
                                        <?php echo $rRow->Nombre;  ?>
                                        </td>  
                                        
                                        
                                        <td width="200">
                                            <?php echo "Estatus: " . $addw_Estatus_Bloque[$Estatus]; ?>
                                        </td>  
                                        
                                        <td width="250">
                                            <div id="numero_documentos_proceso_recibidos<?php echo $rRow->id;  ?>">
                                                
                                                 <?php
                                            
                                                        $qDocumentos_sub_proceso_recibido = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idTipoProceso" => $rRow->id,"recibio"=>1),"id");
                                                        $qDocumentos_sub_proceso_recibido_total = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idTipoProceso" => $rRow->id),"id");
                                                        
                                                        echo "Recibidos " . $qDocumentos_sub_proceso_recibido->num_rows() . " de " . $qDocumentos_sub_proceso_recibido_total->num_rows();
                                            
                                            
                                                ?>
                                                
                                            </div>
                                           
                                        </td>  
                                        
                                        
                                        
                                        <td width="250">
                                            
                                            <div id="numero_documentos_proceso_revisados<?php echo $rRow->id;  ?>">
                                                    <?php
                                            
                                                        $qDocumentos_sub_proceso_revisados = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idTipoProceso" => $rRow->id,"revisado"=>1),"id");
                                                        $qDocumentos_sub_proceso_revisados_total = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idTipoProceso" => $rRow->id),"id");
                                                        
                                                        echo "Revisados " . $qDocumentos_sub_proceso_revisados->num_rows() . " de " . $qDocumentos_sub_proceso_revisados_total->num_rows();
                                            
                                            
                                                ?>
                                            </div>
                                        </td>  
                                        
                                        
                                       </tr> 
                                    </table>    
                            </a>
                        </div>
                        
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
        
             
        
        
        $qDocumentos = $this->ferfunc->get_subreg("saaRel_Archivo_Documento INNER JOIN saaDocumentos ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id",array("saaDocumentos.idSubTipoProceso" => $rRowSubProcesos->id,"saaRel_Archivo_Documento.idArchivo" => $idArchivo),"saaRel_Archivo_Documento.id, saaDocumentos.id as idDoc, saaDocumentos.Nombre,recibio,revisado,original_recibido,original_revisado");
        
        
        if (isset($qDocumentos)) {
            if ($qDocumentos->num_rows() > 0) {
        ?>
        <!-- Subprocesos -->
                <div class="panel-group" id="panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>">
                    <div class="panel panel-success">
                        
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>" href="#panel-element-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>">
                               
                                <table>
                                    <tr> <!-- #MAOC SubProcesos-->
                                        <td width="800" >
                                           <?php echo $rRowSubProcesos->Nombre;  ?>
                                        </td>  
                                        
                                        <td width="200">
                                           
                                            
                                            
                                            <div id="numero_documentos_subproceso_recibidos<?php echo $rRowSubProcesos->id;  ?>">
                                                 <?php
                                            
                                                        $qDocumentos_sub_proceso_recibido = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id,"recibio"=>1),"id");
                                                        $qDocumentos_sub_proceso_recibido_total = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id),"id");
                                                        
                                                        echo "Recibidos " . $qDocumentos_sub_proceso_recibido->num_rows() . " de " . $qDocumentos_sub_proceso_recibido_total->num_rows();
                                            
                                            
                                                ?>
                                            </div>
                                            
                                           
                                        </td>  
                                        
                                        
                                        
                                           <td width="200">
                                           
                                            
                                            
                                           
                                            <div id="numero_documentos_subproceso_revisados<?php echo $rRowSubProcesos->id;  ?>">
                                                
                                                <?php
                                            
                                                        $qDocumentos_sub_proceso_revisados = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id,"revisado"=>1),"id");
                                                        $qDocumentos_sub_proceso_revisados_total = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id),"id");
                                                        
                                                        echo "Revisados " . $qDocumentos_sub_proceso_revisados->num_rows() . " de " . $qDocumentos_sub_proceso_revisados_total->num_rows();
                                            
                                            
                                                ?>
                                                
                                            </div>
                                            
                                           
                                        </td>  
                                     
                                        
                                    </tr> 
                                </table>
                            </a>
                        </div>
                        
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
                   
                    <?php 
                         $strchecked_recibido="";  
                          if ($rRowDocumentos->recibio==1){
                              $strchecked_recibido='checked="checked"';
                              
                          }

                          
                          $strchecked_recibido_original="";  
                          if ($rRowDocumentos->original_recibido==1){
                              $strchecked_recibido_original='checked="checked"';
                              
                          }
                          
                          $strchecked_revisado="";  
                          if ($rRowDocumentos->revisado==1){
                              $strchecked_revisado='checked="checked"';
                          }

                          $strchecked_revisado_original="";  
                          if ($rRowDocumentos->original_revisado==1){
                              $strchecked_revisado_original='checked="checked"';
                          }

                    ?>                   
                                        
                                        
                                        
                                        
                                        
                <div class="panel-group" id="panel-documentos-<?php echo $rRowDocumentos->id;  ?>">
                    
                    
                    <div class="row">
                    
                    <?php if ((($recibe==1) && ( $Estatus==10)) or (($recibe==1) && ( $Estatus==-10))){ ?>    
                            <div class="col-sm-2" >
                                <div class="checkbox-inline">
                                    <label><input name="recibio<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="recibio<?php echo $rRowDocumentos->id; ?>"  onclick="uf_recibir_documento(this,<?= $rRowDocumentos->id; ?>)" <?php echo $strchecked_recibido ?>>Recibio:</label>
                                </div>
                                <div class="checkbox-inline">
                                    <label><input name="original_recibio<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="original_recibio<?php echo $rRowDocumentos->id; ?>"  onclick="uf_orginal_recibido(this,<?= $rRowDocumentos->id; ?>)" <?php echo $strchecked_recibido_original ?>>Original:</label>
                                </div>

                            </div>    
                    <?php }else{ ?>     
                    
                          <div class="col-sm-2" >
                                <div class="checkbox-inline">
                                    <label><input name="rec<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="rec<?php echo $rRowDocumentos->id; ?>"  disabled="disabled"  <?php echo $strchecked_recibido ?>>Recibio:</label>
                                </div>
                                <div class="checkbox-inline">
                                    <label><input name="ori<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="ori<?php echo $rRowDocumentos->id; ?>"  disabled="disabled"   <?php echo $strchecked_recibido_original ?>>Original:</label>
                                </div>

                            </div>  
                        
                    <?php } ?>    
                        
                    <?php if (($reviso==1) && ( $Estatus==20)){ ?>      
                            <div class="col-sm-2" >
                                 <div class="checkbox-inline">
                                    <label><input name="revisado<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="revisado<?php echo $rRowDocumentos->id; ?>"  onclick="uf_recibir_revisado(this,<?= $rRowDocumentos->id; ?>)" <?php echo $strchecked_revisado ?>>Revisado:</label>
                                </div>
                                <div class="checkbox-inline">
                                    <label><input name="original_revisado<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="original_revisado<?php echo $rRowDocumentos->id; ?>"  onclick="uf_orginal_revisado(this,<?= $rRowDocumentos->id; ?>)" <?php echo $strchecked_revisado_original ?>>Original:</label>
                                </div>
                            </div> 
                    <?php }else{ ?>        
                            <div class="col-sm-2" >
                                 <div class="checkbox-inline">
                                    <label><input name="rev<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="rev<?php echo $rRowDocumentos->id; ?>"   disabled="disabled"  <?php echo $strchecked_revisado ?>>Revisado:</label>
                                </div>
                                <div class="checkbox-inline">
                                    <label><input name="ori_rev<?php echo $rRowDocumentos->id; ?>" type="checkbox"   id="ori_rev<?php echo $rRowDocumentos->id; ?>"   disabled="disabled"  <?php echo $strchecked_revisado_original ?>>Original:</label>
                                </div>
                            </div> 
                    <?php } ?>       
                        
                       
                        
                       
                        
                    <div class="col-sm-8" >
                    <div class="panel panel-warning">
                        
                        
                           
                       
                        <div class="panel-heading"> 
                             <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRowDocumentos->id;  ?>" href="#panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>">
                                
                                <table>
                                    <tr> <!-- #MAOC Documentos-->
                                        <td width="1000" >
                                            <div style="display:flex; justify-content: space-between">
                                                
                                                    <div>
                                                        <?php echo $rRowDocumentos->Nombre;  ?>
                                                    </div>
                                                    
                                                
                                            </div>
                                        
                                        </td>  
                                        
                                         
                                        
                                    </tr> 
                                </table>
                                
                            </a> 
                        </div>
                         
                        
                        
                        <div id="panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>" class="panel-collapse collapse <?php echo $strin_documento;  ?>">
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <!-- Panel de Control-->
                                    <div class="col-md-12 column">
                                        <section id="<?php echo "section_".$rRowDocumentos->id; ?>">
                                        <table>
                                            <tr>
                                                <td class="col-md-3" align="end" style="text-align: end">
                                                    
                                                    <?php if ($Editar==1){ ?> 
                                                    
                                                        <button class="btn btn-xs btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?= $idArchivo; ?>, <?= $rRowDocumentos->id; ?>,<?= $rRow->id; ?>,<?= $rRowSubProcesos->id;?>, <?= $rRowDocumentos->idDoc; ?>)" type="button" >
                                                            <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Agregar Documento
                                                        </button>&nbsp;
                                                    
                                                     <?php } ?> 
                                                    
                                                   
                                                    
                                                    <!--
                                                    <button class="btn btn-xs btn-success dropdown-toggle" onclick="estatus(<?= $idArchivo; ?>, <?= $rRowDocumentos->id; ?>, <?= $rRow->id; ?>, <?= $rRowSubProcesos->id; ?>)" type="button" >
                                                        <span class="glyphicon glyphicon-plus" title="Estatus" ></span> Estatus
                                                    </button><br>
                                                    -->
                                                   
                                                    
                                                   
                                                    
                                                    
                                                    
                                                </td>
                                                <td class="col-md-3" align="end" style="text-align: end">
                                                    <a href="#" data-toggle="modal" data-target="#observacion_bloque" role="button" class="btn btn-success btn-sm" onclick="uf_agregar_observaciones(<?php echo $rRow->id .' , ' . $rRowSubProcesos->id . ' , ' .$rRowDocumentos->idDoc; ?>)">
                                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar Observaciones
                                                    </a>
                                                </td>
                                                <td class="col-md-3" align="end" style="text-align: end">
                                                    <a href="#observaciones_bloque" data-toggle="modal" class="btn btn-default btn-sm" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="uf_ver_observaciones_bloque(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?>)">
                                                        <span class="glyphicon glyphicon-search"></span> Ver  Observaciones
                                                    </a>

                                               </td>
                                               <td class="col-md-3" align="end" style="text-align: end">
                                                   
                                                         <a class="btn btn-danger btn-xs del_documento" href="<?php echo site_url('archivo/eliminar_relacion_archivo_documento/' . $rRowDocumentos->id . '/' . $idArchivo); ?>" title="Eliminar Documento" onclick="return confirm('¿Confirma eliminar Registro?');" target="_self"><span class="glyphicon glyphicon-remove" ></span></a>
                                                    
                                               </td>
                                            </tr>
                                        </table>
                                            
                                        <?php
                                        
                                        //$qEjercicio = $this->ferfunc->get_subreg("Ejercicios",array("id" =>$aArchivo['idEjercicio']));
                                        //$aEjercicio=$qEjercicio->row_array();
                                            
                                            
                                        $tabla="saaDocumentosAnexos_".$aArchivo['idEjercicio'];
                                        
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
                                                            
                                                            
                                                            
                                                            <th>
                                                                &nbsp;
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
                                                    
                                                    <?php if ($rRow_anexos->idSubDocumento>0){ ?>
                                                            
                                                            <td>
                                                                 <?php 
                                                                 
                                                                 $qSubDocumento = $this->ferfunc->get_subreg_distinct('saaSubDocumentos', "id =" . $rRow_anexos->idSubDocumento, " id,Nombre" );

                                                                 if ($qSubDocumento->num_rows()>0){
                                                                     $aSubDocumento=$qSubDocumento->row_array();
                                                                     echo $aSubDocumento['Nombre']; 
                                                                 }
                                                                 
                                                                 ?>
                                                            </td>
                                                            
                                                      <?php } ?>
                                                    
                                                    
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
                    
                 
        </div>
                 
            <?php
                 }  
            ?>
                 
      </div>           
      <?php
            }
        }
    }
    ?>           
    
            <br>
            <br>
            <br>
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
                            <div class="col-sm-9 text-center">
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
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_foliado/30"); ?>">
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
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/cambio_estatus_validar/40"); ?>">
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


        
        
         <!-- Dialog Model Enviar Bloque a Digitalizar -->
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


        
         <!-- Dialog Model Observaciones Bloque -->
        <div class="modal fade" id="observacion_bloque" role="dialog" aria-labelledby="myModalLabel-observacion_bloque" aria-hidden="true">
            <div class="modal-dialog">
            	<!--Forma-->
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("archivo/agregar_observaciones_bloque/"); ?>">
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
                        <input type="hidden" name="idDireccion_observacion" id="idDireccion_observacion" required value="<?php echo $aArchivo['idDireccion']?>" >
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
                        <form action="<?php echo site_url("archivo/agregar_ubicacion_fisica"); ?>" method="post" name="forma1" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="modal-body">



                                
                                <div class="form-group">
                                        <label for="idUbicacionFisica" class="col-sm-3 control-label">Ubicación Física</label>	
                                         <div class="col-sm-7"> 
                                             <div class="form-control" id="nomubicacionfisica"></div>
                                             <input type="hidden" name="idUbicacionFisica" id="idUbicacionFisica" required value="0">
                                             </div>
                                         <div class="col-sm-2">    
                                             <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica" onclick="uf_ver_ubicacion_fisica_libre()"  ><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                                </div>  
                                
                                
                                <div class="form-group">
                                    <label for="caja_ubicacion" class="control-label col-sm-3">Caja:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="txtCaja" name="txtCaja" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="documento_ubicacion" class="control-label col-sm-3">Documentos:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="documento_ubicacion" name="documento_ubicacion" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                               
                                <input type="hidden" name="idArchivo" id="idArchivo" required value="<?= $idArchivo; ?>">
                                    
                                
                                <div class="form-group">
                                    <label for="folioInicial" class="control-label col-sm-3">No. Folio Inicial:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioInicial" name="txtFolioInicial" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="folioFinal" class="control-label col-sm-3">No. Folio Final:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioFinal" name="txtFolioFinal" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noHojas" class="control-label col-sm-3">No. de Hojas:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="noHojas" name="noHojas" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>

                                
                               
                               
                                
                                
                                
                 


                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="idTipoProceso_ubicacion" id="idTipoProceso_ubicacion" required value="" class="form-control" >
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
                                             <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica-mod" onclick="uf_ver_ubicacion_fisica_libre_mod()"  ><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                        </div>
                                </div>  
                                
                                
                                <div class="form-group">
                                    <label for="caja_ubicacion" class="control-label col-sm-3">Caja:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="txtCaja_mod" name="txtCaja_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="documento_ubicacion" class="control-label col-sm-3">Documentos:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="documento_ubicacion_mod" name="documento_ubicacion_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                               
                                <input type="hidden" name="idArchivo_mod" id="idArchivo_mod" required value="<?= $idArchivo; ?>">
                                    
                                
                                <div class="form-group">
                                    <label for="folioInicial" class="control-label col-sm-3">No. Folio Inicial:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioInicial_mod" name="txtFolioInicial_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="folioFinal" class="control-label col-sm-3">No. Folio Final:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="txtFolioFinal_mod" name="txtFolioFinal_mod" value="" class="form-control input-sm" required/>          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noHojas" class="control-label col-sm-3">No. de Hojas:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="noHojas_mod" name="noHojas_mod" value="" class="form-control input-sm" required/>          
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


        
            
            
          <!--Cambiar Ubicacion Fisica Tabla -->    
        <div class="modal fade" id="modal-cambiar-ubicacionfisica" role="dialog" aria-labelledby="myModalLabel-modal-cambiar-ubicacionfisica" aria-hidden="true">
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
        
       
            
            
</body>
</html>




                