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
        
            <link href="<?php echo site_url(); ?>css/datatables.css" rel="stylesheet">
            
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
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.ajaxreload.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.datatable.extraorder.js"></script>   
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
            
            /*======================
            SOLO ESTO HACE LA MAGIA
            ========================*/
            /*
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
            */
            /*=================
            LO DEMÁS ES ADORNO
            ===================*/
/*
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

            .nivel-04>li
            {
              padding-bottom:.5rem;
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
              background-color: white;
            }

            .nivel-04
            {
              background-color: #BBB;
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

            .nivel-03 .ampliar:after
            {
              color: teal;
            }

            .menu-arbol .mostrar-menu:checked ~ .ampliar:after
            {
              content:' - ';
            }
         */   
        </style>
        
        <style type="text/css">
        body {
        font-family: Trebuchet MS,Helvetica,Verdana,Arial,sans-serif;;
        font-size: 10pt;
        } 
        .treeMenuDefault {
        font-style: italic;
        }
        </style>
        <script src="TreeMenu.js" language="JavaScript" type="text/javascript"></script>
        
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
        
        <div class="container-fluid">
            <!-- Inicio -->
            <div class="row">
                <div class="column col-md-12">
                    <h3>Prueba de Arbol</h3>
                </div>
            </div>
       
            <div class="column col-md-12">
                
                               
                <?php
                /*
                list ($docsTps, $Estim, $Prorr)  = $this->datos_model->get_Historia_idtpdoc(7, 104);
                
                $NumEstAnt = 0; $NombEstmAnt = ''; $idDocAdjAnt = 0; $idEjercicioAnt = 0; $indice_ini = 0; $Tipos_Estimaciones = array();
                foreach($docsTps->result() as $docsTp){
                    if($indice_ini == 0){
                        $NumEstAnt = $docsTp->Numero_Estimacion;
                        $NombEstmAnt = $docsTp->nombrearchivo;
                        $idDocAdjAnt = $docsTp->idDocAdj;
                        $idEjercicioAnt = $docsTp->idEjercicio;
                        $indice_ini = 1;
                    }else{
                        $NumEstAnt = $docsTp->Numero_Estimacion;
                        $NombEstmAnt = $docsTp->nombrearchivo;
                        $idDocAdjAnt = $docsTp->idDocAdj;
                        $idEjercicioAnt = $docsTp->idEjercicio;
                    }
                    
                    if($docsTp->Numero_Estimacion != $NumEstAnt){
                        $Tipos_Estimaciones[$NumEstAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombEstmAnt;
                        //$Tipos_Estimaciones[$NumEstAnt][] = $idDocAdjAnt;
                        //$Tipos_Estimaciones[$NumEstAnt][] = $idEjercicioAnt;
                        $Tipos_Estimaciones[$docsTp->Numero_Estimacion][$docsTp->idDocAdj][$docsTp->idEjercicio][] = $docsTp->nombrearchivo;
                        //$Tipos_Estimaciones[$docsTp->Numero_Estimacion][] = $docsTp->idDocAdj;
                        //$Tipos_Estimaciones[$docsTp->Numero_Estimacion][] = $docsTp->idEjercicio;
                    }else{
                        $Tipos_Estimaciones[$NumEstAnt][$idDocAdjAnt][$idEjercicioAnt][] = $NombEstmAnt;
                        //$Tipos_Estimaciones[$NumEstAnt][] = $idDocAdjAnt;
                        //$Tipos_Estimaciones[$NumEstAnt][] = $idEjercicioAnt;
                    }
                }
                    
                //echo 'array sin posiciones:'.strlen($Tipos_Estimaciones);
                echo '<br>';
                print_r($Tipos_Estimaciones);
                echo '<br>';
                
                foreach($Tipos_Estimaciones as $key => $value){
                        echo '<br>array1: '.$key.'<br>';   // Nombre de la variable(nom, des, rut, etc)
                        //echo '<br>'.$value1; // Su valor
                    
                    foreach($value as $key1 => $value1){
                        echo '<br>array2: '.$key1;
                        
                        foreach($value1 as $key2 => $value2){
                            echo '<br>array3: '.$key2;
                            echo '<br>array2: '.$key1;
                            foreach($value2 as $key3 => $value3){
                                echo '<br>array4: '.$key3;
                                echo '<br>array2: '.$key1;
                                echo '<br>'.$value3;
                            }
                        }
                    }
                }*/
                
                //echo 'array en posicin[] :'.strlen($Tipos_Estimaciones);
                //echo 'array en posicion[][]:'.strlen($Tipos_Estimaciones[][]);
                
                /*
                for($i =0; $i < strlen($Tipos_Estimaciones[][]); $i++){
                    echo $Tipos_Estimaciones[][$i];
                }*/
                
                /*
                $tp_Est = array();
                $tp_Est[1][] = 'Estim 1';
                $tp_Est[1][] = 'Estim 1.1';
                $tp_Est[2][] = 'Estim 2';
                $tp_Est[3][] = 'Estim 3';
                $tp_Est[3][] = 'Estim 3.1';
                $tp_Est[4][] = 'Estim 4';


                for($i = 0; $i <=5; $i++){
                }*/
                ?>
            <?php /*
                if($Procesos->num_rows() > 0){
                    foreach($Procesos->result() as $Proceso){ ?>
                
                        <a href="#Proceso<?=$Proceso->id;?>"><?=$Proceso->Nombre;?> </a><br>
                        <?php        
                            $SubProcesos = $this->datos_model->get_subproceso_id($Proceso->id);
                            if($SubProcesos->num_rows() > 0){
                                foreach($SubProcesos->result() as $SubProceso){
                        ?>
                            &nbsp;&nbsp;&nbsp;<a href="#SubProceso<?=$SubProceso->id;?>"><?=$SubProceso->Nombre;?> </a><br>
                            
                        <?php
                            }
                        }
                        ?>
            <?php
                    }
                }*/
            ?>
                       
                <br><br><br>
                <!--section class="contenedor">
                    <nav>
                        <ul class="menu-arbol">
                            <?php 
                            $lvl = 1; $lvl2 = 1; $lvl3 = 1;
                            if($Procesos->num_rows() > 0){
                                foreach($Procesos->result() as $Proceso){ ?>
                                <li>
                                    <div id="Proceso<?=$Proceso->id;?>">
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
                                                <div id="SubProceso<?=$SubProceso->id;?>">
                                                    <input type="checkbox" class="mostrar-menu" id="menu0<?=$lvl2.$SubProceso->id?>">
                                                    <label for="menu0<?=$lvl2.$SubProceso->id?>" class="ampliar"></label>
                                                    <a href="#"><?=$SubProceso->Nombre;?></a>

                                                    <ul class="nivel-02">
                                                        <li>
                                                            <input type="checkbox" class="mostrar-menu" id="menu01<?=$lvl2.$SubProceso->id?>">
                                                            <label for="menu01<?=$lvl2.$SubProceso->id?>" class="ampliar"></label>
                                                            <a href="#">nivel 2</a>

                                                            <ul class="nivel-03">
                                                                <li>
                                                                    <input type="checkbox" class="mostrar-menu" id="menu001<?=$lvl2.$SubProceso->id?>">
                                                                    <label for="menu001<?=$lvl2.$SubProceso->id?>" class="ampliar"></label>
                                                                    <a href="#">nivel 3</a>

                                                                    <ul class="nivel-04">
                                                                        <li>
                                                                            Informacion de los archivos a cargar nivel 4
                                                                        </li>
                                                                    </ul>

                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <?php
                                        $lvl2++;
                                        }
                                    }
                                    ?>
                                    </div>
                                </li>
                            <?php
                                $lvl++;
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </section-->
                
                <!--div class="row clearfix">
                <div class="panel-group" id="panel-464595">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-599193">Datos de la Obra</a> </div>
                        <div id="panel-element-599193" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    
                                    <div class="col-md-12 column">
                                        <dl class="dl-horizontal">
                                            <dt> O.T.: </dt>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="panel-title" data-toggle="collapse" data-parent="#panel-464595" href="#panel-element-566826">Importes</a> </div>
                        <div id="panel-element-566826" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row clearfix"> 
                                    
                                    <div class="tabbable" id="tabs-obra">
                                        <ul class="nav nav-tabs">
                                            <li class="active"> <a href="#panel-Importes" data-toggle="tab">Saldos</a> </li>
                                            <li> <a href="#panel-Anticipos" data-toggle="tab">Saldo FondosRevolvente</a> </li>
                                            <li> <a href="#panel-Convenios" data-toggle="tab">Recurso Asignado</a> </li>
                                        </ul>
                                        <div class="tab-content">
                                            
                                            <div class="tab-pane active"  id="panel-Importes">
                                            	<br />
                                                <div class="col-md-4">
                                                    <div class="panel panel-danger">
                                                        <div class="panel-heading">Todas las Memorias</div>

                                                        <div class="panel-body">
                                                            <dl class="dl-horizontal">
                                                                <dt> Importe Contratado: </dt>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane" id="panel-Anticipos">
                                                 <br />
                                                 <div class="col-md-4">
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">Fondo Revolvente</div>
                                                        <div class="panel-body">
                                                            <dl class="dl-horizontal">
                                                                <dt> Fondo Revolvente: </dt>
                                                            </dl>
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane" id="panel-Convenios">
                                             <br />
                                                <div class="col-md-4">
                                                    <div class="panel panel-danger">
                                                        <div class="panel-heading">Asignado</div>
                                                        <div class="panel-body">
                                                            <dl class="dl-horizontal">
                                                                <dt> Asignado Inicial: </dt>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
                
               
                
                <a href="<?=site_url('archivo/act_ordenar/')?>" class="btn btn-default"  role="button" ><span class="glyphicon glyphicon-eye-open"></span> Actualizar Ordenar</a>
                
            </div>
        </div>
                
               
 
 <!-- Star Dialogo Filtros -->
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
        
            $(function(){
                $('a[href*=#]').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                    && location.hostname == this.hostname) {
                        var $target = $(this.hash);
                        $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
                        if ($target.length) {
                            var targetOffset = $target.offset().top;
                            $('html,body').animate({scrollTop: targetOffset}, 1000);
                            return false;
                       }
                  }
              });
            });
           
           
        function nuevo_tipo_anexo(){
            $("#modal-nuevo_tipo_anexo").modal('show');    
        }
        
        function estatus(idArchivoo, idTDd){
                $("#idEstatus").val('');
            
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
                    $("#idEstatus").val(data['idEstatus']);
                }
            });
            
            $("#idTpDocuest").val(idTDd);
            $("#modal-estatus").modal('show');    
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
            addfile_individual();
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

            var texto = document.createTextNode("Borrar");
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