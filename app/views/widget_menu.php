        <!-- Menu Superior -->
        
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#acerca_de">Sistema para la Gestión de Archivos(SIGA)</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        						
                    </ul>					
                    <ul class="nav navbar-nav navbar-right small">
                        
    		    
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Archivo</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url("archivo/"); ?>" title="Listado de Obras">Listado de Obras</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("archivo/captura"); ?>" title="Estados de Obra">Estado de Obra</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("proyectos/"); ?>" title="Proyectos">Proyectos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("concentracion/"); ?>" title="Concentración">Concentración</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("transferencia/"); ?>" title="Concentración">Transferencias</a>
                                </li>
                           
                                
                            </ul>
                        </li>
                        <?php /* $this->load->helper('url'); 
                                //echo uri_string() ."OOK";
                                if(uri_string()== "archivo")  { */?>
                        <?php /*if(isset($preregistro)){
                                if ($preregistro == 0){*/
                        ?>
                        <li>
                            <a href="<?php echo site_url("ubicacionFisica/ubicaciones_archivo"); ?>" title="Ubicaciones Archivo">Ubicaciones de Archivos</a>
                        </li>
                         
                        
                        
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Observaciones</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url("observaciones"); ?>">Observaciones por Dirección</a></li>
                                <li><a href="<?php echo site_url("observaciones/observaciones_documentos"); ?>">Observaciones de Documentos</a></li>
                                <li><a href="<?php echo site_url("observaciones/observaciones_archivos"); ?>">Observaciones de Archivos</a></li>
                                
                            </ul>
                        </li>
                        <?php $this->load->helper('url'); 
                                //echo uri_string() ."OOK";
                                if(uri_string()== "archivo/captura")  { ?>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  href=""data-toggle="modal" data-target="#modal-ver-reporte" role="button">Obras por Dirección</a>
                                    
                                </li>
                                <li>
                                    <a  href=""data-toggle="modal" data-target="#modal-ver-reporte-documento-direccion" role="button">Documentos por Dirección</a>
                                    
                                </li>
                                
                                <li>
                                    <a  href=""data-toggle="modal" data-target="#modal-ver-reporte-documento-bloque" role="button">Documentos por Bloque</a>
                                    
                                </li>
                                 <li>
                                    <a  href="<?php echo site_url("impresion/reporte_listado_contratistas"); ?>" target="_blank" >Contratistas (736 Obras)</a>
                                    
                                </li>
                                <li>
                                    <a  href="<?php echo site_url("impresion/reporte_relacion_obras_2017/"); ?>" target="_blank" >Relación de Obras Ejercicio Fiscal 2017</a>
                                    
                                </li>
                                
                                
                                
                            </ul>
                        </li>
                        <?php  } ?>
                        <?php  //} }?>
                        <?php  //} ?>
                        <?php if(isset($idArchivo) && (uri_string()== "archivo/cambios/" .$idArchivo || uri_string()== "archivo/preregistrar/" .$idArchivo) )  { ?>
                        <li class="dropdown list-style"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-print"></span> Impresiones</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php if (uri_string()== "archivo/cambios/" .$idArchivo) : ?>
                                        <a  href="<?php echo site_url("impresion/reporte_preregistro"). '/' . $aArchivo['id']; ?> " target="_blank" >Preregistro</a>
                                    <?php else: ?>
                                        <a  href="<?php echo site_url("impresion/reporte_preregistro_cid"). '/' . $aArchivo['id']; ?> " target="_blank" >Preregistro</a>
                                    <?php endif;?>
                                </li>
                                


                            </ul>
                        
                        </li>
                        <?php  } ?>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogos</a>
                            <ul class="dropdown-menu">
                                

                	            <li>
                                    <a href="<?php echo site_url("documentos/"); ?>" title="Documentos">Documentos</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url("subdocumentos/"); ?>" title="SubDocumentos">Sub Documentos</a>
                                </li>
                                
                                
                	            <li>
                                    <a href="<?php echo site_url("plantillas/"); ?>" title="Plantillas">Plantillas</a>
                                </li>
                                
                                
                                <li>
                                    <a href="<?php echo site_url("control_usuarios/"); ?>" title="Usuarios">Usuarios</a>
                                </li>
                                
                                
                                <li>
                                    <a href="<?php echo site_url("procesos/"); ?>" title="Procesos">Procesos</a>
                                </li>
                                
                                 <li>
                                    <a href="<?php echo site_url("subproceso/"); ?>" title="Sub Procesos">Sub Procesos</a>
                                </li>
                                
                                 <li>
                                    <a href="<?php echo site_url("titularidad/"); ?>" title="Sub Procesos">Titularidad</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url("modalidad/"); ?>" title="Sub Procesos">Modalidades</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("ubicacionFisica/"); ?>" title="Ubicacion Bloques">Ubicacion Bloques</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("ubicacion_proyectos/"); ?>" title="Ubicacion Proyectos">Ubicacion Proyectos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("areas_ubicacion/"); ?>" title="Áreas ubicación trabajo">Áreas ubicación trabajo</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("bloques_obras/"); ?>" title="Bloques Obras">Grupos Obras</a>
                                </li>
                        
                        
                            </ul>
                        </li>
                         
                        <?php /* }
                            } */
                        ?>
                        <li>
                            <a href="<?php echo site_url("sessions/logout"); ?>"><span class="glyphicon glyphicon-ban-circle"></span> Salir</a>
                        </li>						
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Barra Inferior -->
        
        <!-- Barra Inferior -->
        
        <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style="min-height: 28px !important; ">
            <div class="container-fluid">
                <div class="container-fluid navbar-header">
                    &nbsp;
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <p class="navbar-text">Usuario: <?php echo $usuario; ?></p>                
                    </ul>
                </div>
            </div>
        </nav>
        
       
       
        
        