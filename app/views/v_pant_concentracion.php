<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($title)) echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <?php if (isset($meta)) echo meta($meta); ?>  

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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.dataTables-Elena.js"></script> 
        <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>     
       
         
        

        
        <script type="text/javascript" src="<?php echo site_url(); ?>js/select2/select2.min.js"></script> 
        
        
        
            <?php if (isset($script)) echo $script; ?>
        <style>
            span{
                position: inherit !important;
            }
            .btn-xs {
                padding: 5px !important;
            }
            .title-primary{
                color: #883b61;
            }
            body { padding-top: 50px; }
            .d-n {
                display: none;
            }
            .btn-sm{
                padding: 5px 5px 8px 8px;
                font-size: 12px;
                line-height: 1.5;
                border-radius: 3px;
            }
            .title{
                padding: 0 0 20px 0;
            }
            .m-b{
                margin-bottom: 20px;
            }
            .alert-info {
                background-color: #c1d8e4;
                border-color: #9ccad4;
                color: #0d4663;
            }
            .text-small{
                font-size: 12px;
                line-height: 14px;
            }
            .border-div{
                border-bottom: 2px solid #0d4663;
            }
            .text-uppercase{
                text-transform: uppercase;
            }
           
            .form-group {
                margin-bottom: 10px;
                
            }
            #example, #t_ubicaciones{
                font-size: 80%;
            }
            .width-modal {
                width: 1000px !important;
            }
            #ubicaciones:checked {
                color:red;
            }
            
            
        </style>
        
        <script>
            var ot_listado;
            $(document).ready(function () {
                $("[rel='tooltip']").tooltip();
                $("[rel='popover']").popover();
                $('.select2').select2({
                    width: '100%'
                });
                
                
                var t = $('#t_concentracion_reg').DataTable({
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
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'},
                        {'sClass': 'small'}
                       
                    ],
                });
            
                
                
              
                
                    $('#orden_trabajo').on( 'change', function () {

                        //alert( $('#orden_trabajo').val())
                        limpiar_formulario(1)
                        traer_detalles()
                        $("#obra").val($("#select2-chosen-1").html());


                    } );


                
                

                

                $("#orden_trabajo").select2({
                    placeholder: "Asignar OT",
                    ajax: {
                        url: '<?php echo site_url("concentracion/ot_json"); ?>',
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
                        return $.post( '<?php echo site_url("concentracion/ot_json"); ?>', { id: idInicial }, function( data ) {
                            return callback(data.results[0]);
                        }, "json");
                     
                    }
                });  
                
               // $("#fojas_utiles").change(function(){
                  //  buscar_ingreso($("#orden_trabajo").val())
                   
                //});
                
                
                $("#btn-Enviar").click( function() {     
                
                        var obra = $("#select2-chosen-1").html();
                        
                        //Si son obras para PV
                        if  ( obra.search("-15") >= 0 || obra.search("-14")>=0 || obra.search("-13") >= 0){
                            
                            $("#fracaso").html("<strong>Error!</strong> Esta Obra es Concentración en Pablo Valdez")
                            $("#fracaso").delay(500).fadeIn("slow");   
                        } else {
                        
                           
                            if (validacion ()){
                                $.post("<?php echo site_url("concentracion/asignar_ubicacion"); ?>",$("#formdata").serialize(),function(res){
                                    console.log(res)
                                    alert (res.ingresosOT)
                                    if(res.resultado != -1){
                                        $("#btn-Enviar").css("display", "none")
                                        $("#tabla-ubi").html(res.tabla);
                                    } else {
                                        $("#fracaso").html("Ha ocurrido un error.")
                                        $("#fracaso").delay(500).fadeIn("slow"); 
                                    }
                                        //actualizar_tabla()
                                        //limpiar_formulario(0)
                                        //$("#exito").html(" Sus datos han sido recibidos con éxito.")
                                        //$("#exito").delay(500).fadeIn("slow");     
                                 


                                },  "json");


                            } 
                            
                        }
                        
                        return false;
                    
                }); 
                
                
                $("#btn-modificar").click( function() {     
                
                        
                    $.post("<?php echo site_url("concentracion/modificar_ubicacion"); ?>",$("#form-modificar-ubicacion").serialize(),function(res){
                        console.log(res)
                        if(res == 1){
                           $('#modal-modificar-ubicacion').modal('hide')
                           actualizar_tabla()
                        } else {
                            $("#fracaso").html("Ha ocurrido un error.")
                            $("#fracaso").delay(500).fadeIn("slow"); 
                        }
                              



                    },  "json");
                     return false;
                    
                });
                
                
            
               
                
            });
            
             
            function validacion() {
                if ($("#fojas_utiles").val() == "") {
                  $("#fracaso").html("Es necesario llenar algún campo");
                  return false;
                }
                else if ( $("#legajos").val() == "") {
                  $("#fracaso").html("Es necesario llenar algún campo");
                  return false;
                }
                
                
                else if ( $('#identificador').val() == "") {
                  $("#fracaso").html("Es necesario llenar algún campo");
                  return false;
                }
                

                // Si el script ha llegado a este punto, todas las condiciones
                // se han cumplido, por lo que se devuelve el valor true
                return true;
              }
            
            function limpiar_formulario(tipo){
                //borrar OT
                if (tipo ==0){
                    $("#select2-chosen-1").html("")
                }
                $("#fojas_utiles").val("")
                $("#legajos").val("")
                $("#Bloques").val("")
                $('#No_caja').val("")
                $('#Folio_Inicial').val("")
                $('#Folio_Final').val("")
                $('#No_Hojas').val("")
                $('#fecha_ingreso').val("")
                $('#identificador').val("")
                $('#identificador').css("border-color", "grey")
                $('#cierre_expediente').val("")
                $('#exito').html("")
                $('#fracaso').html("")
                $('#exito').css("display", "none")
                $('#fracaso').css("display", "none")
                $('#fracaso').html("")
                $('#fecha_ingreso').removeAttr("disabled")
                $('#identicador').removeAttr("disabled")
                $('#cierre_expediente').removeAttr("disabled")
                $("#tabla-ubi").html('');
            }
            
            
            
                
                
            
            
            function actualizar_tabla(){
                 $.ajax({
                    
                    type: "POST",
                    
                    url: "<?php echo site_url('concentracion/actualizar_tabla'); ?>/",
                    success: function (data) {
                        $("#table-registros").html(data["tabla"]); 
                         var t = $('#t_concentracion_reg').DataTable({
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
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'},
                                {'sClass': 'small'}

                            ],
                        });
                        
                        
                         
                    }
                }) ;
            }
            
            function buscar_ingreso(ot){
                $.ajax({
                    url: "<?php echo site_url('concentracion/fecha_ingreso') ?>/" + ot,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#fecha_ingreso").val(data['fecha']);
                       
                        
                    }
                
                });
            }
            
            function cambiar_identificador(){
                $.ajax({
                    data:  {
                        "idArchivo" : $("#orden_trabajo").val(),
                        "identificador" : $("#identificador").val(),
                    },
                    url: "<?php echo site_url('concentracion/cambiar_identificador') ?>/",
                    dataType: 'json',
                    type:  'POST',
                    success: function (data, textStatus, jqXHR) {
                        if (data== 1)
                            $("#identificador").css('border-color', 'green');
                        else
                            $("#identificador").css('border-color', 'red');
                        
                    }
                
                });
            }
            
            function cambiar_cierre_expediente(){
                $.ajax({
                    data:  {
                        "idArchivo" : $("#orden_trabajo").val(),
                        "cierre_expediente" : $("#cierre_expediente").val(),
                    },
                    url: "<?php echo site_url('concentracion/cambiar_cierre') ?>/",
                    dataType: 'json',
                    type:  'POST',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#cierre_expediente").css('border-color', 'green');
                       
                        
                    }
                
                });
            }
            
            function mostrar_ot(){
                document.getElementById('view_ot').style.display = 'block';
            }
            function ocultar_ot(){
                document.getElementById('view_ot').style.display = 'none';
            }
            
           
            
            
            function traer_detalles(){
                var ot = $("#orden_trabajo").val();
                $("#cierre_expediente").val("")
                $("#fecha_ingreso").val("")
                $("#identificador").val( "")
                $.post( "<?php echo site_url("concentracion/detalles_archivo"); ?>",{ ot: ot}, function( data ) {
                    console.log( data ); // fecha ingreso
                    
                    
                    if (data.cierre_expediente != "" || data.cierre_expediente != "0000-000-00"){
                        $("#cierre_expediente").val( data.fecha_cierre ); // fecha cierre
                       
                    }
                    
                    if (data.fecha_ingreso){
                        $("#fecha_ingreso").val( data.fecha_ingreso);
                       
                    } else {
                        
                        $("#fecha_ingreso").val(new Date().toJSON().slice(0,10));
                    }
                    
                    
                    if (data.identificador != ""){
                      
                        $("#identificador").val( data.identificador ); 
                    } 
                }, "json");
                
            
            }
            
            function uf_modificar_ubicacion(id) {

               
                
                $.ajax({
                    url: "<?php echo site_url('concentracion/datos_relacion_ubicacion') ?>/" + id,
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        
                        $("#id_mod").val(id);
                        $("#ubicacion_mod").val(data.Nombre);
                        $("#txtnomOT_mod").val(data.OrdenTrabajo);
                        $("#fojas_utiles_mod").val(data.fojas_utiles);
                        $("#legajos_mod").val(data.legajos);
                        $("#Bloques_mod").val(data.Bloques);
                        $("#No_caja_mod").val(data.No_caja);
                        $("#No_Hojas_mod").val(data.No_Hojas);
                        $("#Folio_Inicial_mod").val(data.Folio_Inicial);
                        $("#Folio_Final_mod").val(data.Folio_Final);
                        $("#identificador_mod").val(data.identificado);
                      

                        
                        
                    }
                });

                

            }
            
            function uf_ver_ubicaciona_libre_mod() {
                      
                       
                $.ajax({
                   type:"POST",
                   url:"<?php echo site_url('concentracion/ver_ubicaciones_libres_mod'); ?>/",
                   success: function(data) {

                        $('#idUbicacionFisica_libre_mod').html(data["tabla"]); 
                   }
                 });
                       
            }
            
            function actualizar_bloques(id){
                
                $.post( "<?php echo site_url('concentracion/actualizar_bloques') ?>/" + id, 
                        { Bloques: $("#Bloques"+id).val() })
                        .done(function( data ) {
                            if (data == 1){
                               $("#Bloques"+id).css("border-color", "green");
                               actualizar_tabla();
                            }else {
                               $("#Bloques"+id).css("border-color", "red");
                            }
                });

            }
            
            function actualizar_cajas(id){
                $.post( "<?php echo site_url('concentracion/actualizar_cajas') ?>/" + id, 
                        { cajas: $("#No_Caja"+id).val() })
                        .done(function( data ) {
                            if (data == 1){
                                $("#No_Caja"+id).css("border-color", "green");
                                actualizar_tabla();
                            }else {
                                $("#No_Caja"+id).css("border-color", "red");
                            }
                });

            }
            
            function actualizar_folio_inicial(id){
                $.post( "<?php echo site_url('concentracion/actualizar_folio_inicial') ?>/" + id, 
                        { Folio_Inicial: $("#Folio_Inicial"+id).val() })
                        .done(function( data ) {
                            if (data == 1){
                                $("#Folio_Inicial"+id).css("border-color", "green");
                                actualizar_tabla();
                            }else {
                                $("#Folio_Inicial"+id).css("border-color", "red");
                            }
                });
               

            }
            
            function actualizar_folio_final(id){
                $.post( "<?php echo site_url('concentracion/actualizar_folio_final') ?>/" + id, 
                        { Folio_Final: $("#Folio_Final"+id).val() })
                        .done(function( data ) {
                            if (data == 1){
                                $("#Folio_Final"+id).css("border-color", "green");
                                actualizar_tabla();
                            }else {
                                $("#Folio_Final"+id).css("border-color", "red");
                            }
                });
               

            }
            
            function actualizar_hojas(id){
                $.post( "<?php echo site_url('concentracion/actualizar_hojas') ?>/" + id, 
                        { No_Hojas: $("#No_Hojas"+id).val() })
                        .done(function( data ) {
                            if (data == 1){
                                $("#No_Hojas"+id).css("border-color", "green");
                                actualizar_tabla();
                            }else {
                                $("#No_Hojas"+id).css("border-color", "red");
                            }
                });
               

            }
            function reset_modal(){
                limpiar_formulario(0)
                $("#btn-Enviar").css("display", "block");
            }
            
            
            function seleccionar_ubicacion(elemento, id){
                console.log(elemento)
               
                if(elemento.checked){
                     console.log("checked")
                    $("#idUC"+id).css("color", "blue")
                }else {
                     console.log("cnocked")
                     $("#idUC"+id).css("color", "green")
                }
            }


            
           
           
            
           
            
        </script>
    </head>

    <body>
        
        <!-- Contenidos -->
        <div class="container-fluid">
            <!-- Menu Superior -->
             <?php if (isset($aWidgets["widget_menu"])) echo $aWidgets["widget_menu"]; ?> 
                <div class="container-fluid card">
                    <div class="row clearfix">                
                        <div class="col-md-12 column">
                            <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url("principal/"); ?>">Principal</a></li>
                                    <li class="active">Concentración</li>
                             </ol>
                        </div>
                        <!-- breadcrumb -->
                    </div>
                </div>
                    
            
             
                           

                       
            <div class="container">
              
                        <div>
                            <h3 class="title-primary text-center"><strong>Concentración</strong></h3>
                            
                        </div>
                        <div class="text-right">
                            <a href="#modal-nueva-ubicacion" class="btn btn-success" role="button" data-toggle="modal" >
                                <span class="glyphicon glyphicon-plus"></span> Nuevo Registro
                            </a>
                        </div>
                
                        <div>
                           
                            <div class="table-responsive" id="table-registros">
                                <table class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%"  id="t_concentracion_reg">
                               
                                    <thead>
                                        <tr>
                                            <td>Acción</td>
                                            <td>Posición</td>
                                            <td>OT</td>
                                            <td>Identificador</td>
                                            <td>Bloque</td>
                                            <td>No de Caja</td>
                                            <td>Folio Inicial</td>
                                            <td>Folio Final</td>
                                            <td>No de Hojas</td>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php if ( isset($listado) ):?>
                                            <?php if ( $listado->num_rows() > 0 ):?>
                                                <?php foreach ( $listado->result() as$rRow ):?>
                                                    <tr>
                                                        <td>
                                                          <!--<a href="#" id="btn-agregar-ubi"  class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-agregar-ubicacion-fisica" role="button" onclick="uf_agregar_ubicacion()">
                                                              <span class="glyphicon glyphicon-pencil"></span> 
                                                          </a>--->
                                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-modificar-ubicacion" onclick="uf_modificar_ubicacion(<?php echo $rRow->idR; ?>)"><span class="glyphicon glyphicon-pencil"></span> </button>
                                                            <a href="<?php echo site_url('impresion/v_etiqueta_concentracion') . '/'. $rRow->idR ?>" class="btn btn-default btn-xs" target="_blank">
                                                                <span class="glyphicon glyphicon-print"></span>
                                                            </a>
                                                        </td>
                                                        <td><?= $rRow->Nombre  ?></td>
                                                        <td><?= $rRow->OrdenTrabajo  ?></td>
                                                        <td><?= $rRow->identificado  ?></td>
                                                        <td><?= $rRow->Bloques ?></td>
                                                        <td><?= $rRow->No_caja  ?></td>
                                                        <td><?= $rRow->Folio_Inicial  ?></td>
                                                        <td><?= $rRow->Folio_Final ?></td>
                                                        <td><?= $rRow->No_Hojas  ?></td>
                                                        
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                  
                <!--</div>-->
                
            
            </div>
            
        <!-- Dialogo Modificar Ubicacion -->
        <div class="modal fade" id="modal-nueva-ubicacion" role="dialog" aria-labelledby="modal-agregar-ubicacion-fisica_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Modificar Ubicación</h4>
                        </div>
                        <div id="formulario">
                                
                            <form id="formdata" method="post" class="form-horizontal" >

                            <div class="modal-body">

                                
                                <div class="form-group">
                                                <label for="orden_trabajo" class="col-sm-3 control-label">OT:</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" id="orden_trabajo" name="orden_trabajo"  class="form-control" value="" required />
                                                    <input type="hidden" id="obra" name="obra"  class="form-control" value="" required />
                                                </div>
                                        </div>


                                        <div class="form-group">
                                                <label for="fojas_utiles" class="col-sm-3 control-label">Fojas útiles:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min="1" id="fojas_utiles" name="fojas_utiles" class="form-control" value="" placeholder="No de Fojas útiles" required />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="legajos" class="col-sm-3 control-label">Legajos:</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min="1" id="legajos" name="legajos" class="form-control" placeholder="Legajos" value="" required />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="UbicacionFisica_mod" class="col-sm-3 control-label">Ubicación Física</label>	
                                             <div class="col-sm-6"> 

                                                 <input type="text" id="txtnom_mod" name="txtnom_mod" value="" class="form-control input-sm" required/> 
                                                 <input type="hidden" name="idUbicacionFisica_mod" id="idUbicacionFisica_mod" required value="0">
                                                 </div>
                                             <div class="col-sm-2">    
                                                 <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica-mod" onclick="uf_ver_ubicaciona_libre_mod()"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                            </div>


                                        </div> 
                                
                                        <hr>
                                        <div class="form-group">
                                                <label for="fecha_ingreso" class="col-sm-3 control-label">Ingreso (CID):</label>
                                                <div class="col-sm-8">
                                                    <input type="date"  id="fecha_ingreso" name="fecha_ingreso" class="form-control" placeholder="Fecha Ingreso (CID)" value="" required />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="identificador" class="col-sm-3 control-label">Identificador:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="identificador" name="identificador" class="form-control" placeholder="Identificador" value="" required onchange="cambiar_identificador()" />
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-8">
                                                <button type="submit" id="btn-Enviar" class="btn btn-success" >Asignar Ubicación</button>
                                            </div>
                                        </div>

                                        
                                        

                                

                                
                            </div>
                            <div class="modal-footer">
                                
                                

                                <div class="row alert alert-success fade in d-n" id="ubicacion_dinamica" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4>Ubicación</h4>
                                    <p id="str_ubicacion"></p>

                                </div>
                                <div id="tabla-ubi" class="table-responsive"></div>
                          
                           
                                <div class="alert alert-success fade in" id="exito" style="display:none">
                                   <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                                   <div id="exito-msj">

                                   </div>

                                </div>
                                <div class="alert alert-warning fade in" id="fracaso" style="display:none">

                                </div> 
                                <button type="button"  class="btn btn-danger" data-dismiss="modal" onclick="reset_modal()">
                                    Cerrar
                                </button>  
                            </div>
                        </form>
                        </div>
                        
                        
                    </div>
                </div>
            </div>       
        <!-- Modificar archivo -->    
        
        <!-- Dialogo Modificar Ubicacion -->
        <div class="modal fade" id="modal-modificar-ubicacion" role="dialog" aria-labelledby="modal-agregar-ubicacion-fisica_myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-titlsamplee" id="modal-nuevo_subdocumentomyModalLabel">Modificar Ubicación</h4>
                        </div>
                        <form id="form-modificar-ubicacion" name="form-modificar-ubicacion" target="_self" id="forma1" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="modal-body">

                                
                                <div class="form-group">
                                    <label for="orden_trabajo" class="col-sm-3 control-label">OT:</label>
                                    <div class="col-sm-8">
                                        
                                        <input type="text" id="txtnomOT_mod" name="txtnom_mod" value="" class="form-control input-sm" required disabled/> 
                  
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="UbicacionFisica_mod" class="col-sm-3 control-label">Ubicación Física</label>	
                                     <div class="col-sm-6"> 

                                         <input type="text" id="txtnom_mod" name="txtnom_mod" value="" class="form-control input-sm" required/> 
                                         <input type="hidden" name="idUbicacionFisica_mod" id="idUbicacionFisica_mod" required value="0">
                                         </div>
                                     <div class="col-sm-2">    
                                         <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-cambiar-ubicacionfisica-mod" onclick="uf_ver_ubicaciona_libre_mod()"><em class="glyphicon glyphicon-plus-sign" ></em> Seleccionar</button>
                                    </div>
                                        
                                       
                                </div> 
                                -->


                                <div class="form-group">
                                    <label for="fojas_utiles" class="col-sm-3 control-label">Fojas útiles:</label>
                                    <div class="col-sm-8">
                                        <input type="number" min="1" id="fojas_utiles_mod" name="fojas_utiles_mod" class="form-control" value="" placeholder="No de Fojas útiles" required disabled/>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="identificador" class="col-sm-3 control-label">Identificador:</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="identificador_mod" name="identificador_mod" class="form-control" placeholder="Identificador" value="" required o disabled />
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="identificador" class="col-sm-3 control-label">Ubicación:</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="ubicacion_mod" name="ubicacion_mod" class="form-control" placeholder="Ubicación" value="" required  disabled />
                                        </div>
                                </div>

                                <hr>
                                 <div class="form-group">
                                        <label for="fecha_ingreso" class="col-sm-3 control-label">Bloques:</label>
                                        <div class="col-sm-8">
                                            <input type="text"  id="Bloques_mod" name="Bloques_mod" class="form-control" placeholder="Bloques" value="" required />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="identificador" class="col-sm-3 control-label">No caja:</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="No_caja_mod" name="No_caja_mod" class="form-control" placeholder="No caja Ej. 1/2" value="" required />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="cierre_expediente" class="col-sm-3 control-label">Folio Inicial:</label>
                                        <div class="col-sm-8">
                                            <input type="number" id="Folio_Inicial_mod" name="Folio_Inicial_mod" class="form-control" placeholder="Folio Inicial" value="" required />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="cierre_expediente" class="col-sm-3 control-label">Folio Final:</label>
                                        <div class="col-sm-8">
                                            <input type="number" id="Folio_Final_mod" name="Folio_Final_mod" class="form-control" placeholder="Folio Final" value="" required />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="cierre_expediente" class="col-sm-3 control-label">No Hojas:</label>
                                        <div class="col-sm-8">
                                            <input type="number" id="No_Hojas_mod" name="No_Hojas_mod" class="form-control" placeholder="No Hojas" value="" required />
                                        </div>
                                </div>


                                
                                

                                

                                
                            </div>
                            <div class="modal-footer">
                                
                                <input type="hidden" name="id_mod" id="id_mod" required value="" class="form-control" >
                                
                                <button type="submit" id="btn-modificar" class="btn btn-success" >
                                    Guardar
                                </button>                     
                                <button type="button"  class="btn btn-danger" data-dismiss="modal">
                                    Cancelar
                                </button>                     
                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>       
        <!-- Modificar archivo --> 
            
            
              <!--Cambiar Ubicacion Fisica -->    
        <div class="modal fade" id="modal-cambiar-ubicacionfisica-mod" role="dialog" aria-labelledby="myModalLabel-modal-cambiar-ubicacionfisica" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!--Forma-->

                <div class="modal-content width-modal">
                    <div class="modal-header panel-title width-modal">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="cambiar-concepto">Ubicación</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label>Ubicaciones Concentracion</label><br>
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