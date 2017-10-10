<?php $qDocumentos = $this->datos_model->documentos_de_archivo($idArchivo, $rSubProcesos->id); ?>

    <?php if (isset($qDocumentos)): ?>
        <?php if ($qDocumentos->num_rows() > 0): ?>
            <?php foreach ($qDocumentos->result() as $rRow): ?>
                <?php if ($rRow->idRAP): ?>
                    <!--con preregistro -->
                    <?php if (($preregistro ==1 &&  $idDireccion_responsable ==$rRow->idDireccion_responsable) || 
                              ($recibe == 1 && $rRow->preregistro_aceptado == 1) || 
                              ($reviso == 1 && $rRow->recibido_cid ==1)) : ?>
                                <div id="container-documento" class="col-xs-12">

                                    <div id="row-documento" class="row flex">

                                       
                                            <div class="panel panel-warning">
                                      
                                      
                                         
                                     
                                                <div class="panel-heading">
                                                     
                                                        
                                                            <div>
                                                                <div id="row-title" class="col-sm-5">  
                                                                    <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRow->idDocumento;  ?>" href="#panel-element-documentos-<?php echo $rRow->idDocumento;  ?>"><?php echo $rRow->Nombre;  ?> 
                                                                    </a>
                                                                    <div> <?php echo $addw_direciones[$rRow->idDireccion_responsable];  ?> </div>
                                                                </div>
                                                                <div id="row-tipo-documento" class="col-sm-2">

                                                                    <?php if ($rRow->tipo_documento == 4): ?>
                                                                        <?php
                                                                        
                                                                        $seleccion1 = "Selecciona una opción";
                                                                        $value1 = 'value="0"';
                                                                        $seleccion = "Contiene Estimaciones";
                                                                        $value='value="4"';


                                                                        ?>


                                                                        <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?= $idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                            <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                                                                            <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                                                        </select>
                                                                         <input type="hidden" value="<?= $rRow->idRAP ?>" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">

                                                                    <?php  else: ?>
                                                                        <?php if ($rRow->tipo_documento == 1): ?>
                                                                        

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
                                                                        <?php  elseif ($rRow->tipo_documento == 2): ?>
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

                                                                        <?php  elseif ($rRow->tipo_documento == 3): ?>
                                                                            <?php

                                                                            $seleccion = "No Aplica";
                                                                            $value = 'value="3"';
                                                                            $seleccion1 = "Copia";
                                                                            $value1 = 'value="1"';
                                                                            $seleccion2 = "Original";
                                                                            $value2 ='value="2"';
                                                                            $seleccion3 = "Selecciona una opción";
                                                                            $value3 = 'value="0"';


                                                                            ?>
                                                                        <?php  endif;  ?>

                                                                        
                                                                    <?php  endif;  ?>


                                                                    <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                                                        <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                                                                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                                    </select>
                                                                     <input type="hidden" value="<?= $rRow->idRAP ?>" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">

                                                                </div> <!-- row-tipo-documento -->

                                                                <div id="row-hojas" class="col-sm-1">
                                                                    <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                    <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->idRAD ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                                                           onchange="cargar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                                                                </div> <!-- row-hojas -->

                                                                <div id="row-acciones" class="col-sm-2">

                                                                    <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                                                        <span class="glyphicon glyphicon-search"></span>
                                                                    </a>

                                                                    <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                        <span class="glyphicon glyphicon-list"></span>
                                                                    </a>

                                                                </div> <!-- row-acciones -->



                                                                <div id="row-estatus" class="col-sm-2">
                                                                    <small style="padding: 5px; background: yellow; border-radius: 5px;">OTRO ESTATUS
                                                                    </small>

                                                                </div> <!--row-estatus-->
                                                            </div>

                                                         
                                                        
                                                    




                                                                
                                                </div>



                                                <div id="panel-element-documentos-<?php echo $rRow->idDocumento;  ?>" class="panel-collapse collapse">
                                                Status
                                                </div>
                                            </div><!-- panel -->
                                            

                                        

                                        
                                    </div> <!-- row-documento -->
                                    <hr>
                                </div><!-- row-documento -->
                    <?php endif; ?>
                <?php else: ?>
                    <!--sin preregistro -->
                    <div id="container-documento" class="col-xs-12">

                        <div id="row-documento" class="row flex">

                            <div id="row-title" class="col-sm-5">
                                <?= $rRow->Nombre ?>
                                <br>
                                <small><?= $rRow->responsable_documento?></small>

                            </div> <!-- row-title -->

                            <div id="row-tipo-documento" class="col-sm-2">

                                <?php if ($rRow->idDocumento == 114): ?>
                                    <?php
                                    
                                    $seleccion = "Selecciona una opción";
                                    $value = 'value="0"';
                                    $seleccion1 = "Contiene Estimaciones";
                                    $value1='value="4"';


                                    ?>


                                    <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?= $idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                        <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                                    </select>
                                     <input type="hidden" value="-1" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">

                                <?php  else: ?>
                                    

                                    <?php

                                    $seleccion = "Selecciona una opción";
                                    $value = 'value="0"';
                                    $seleccion1 = "Original";
                                    $value1 ='value="2"';
                                    $seleccion2 = "Copia";
                                    $value2 = 'value="1"';
                                    $seleccion3 = "No Aplica";
                                    $value3 = 'value="3"';


                                    ?>
                                    
                                <?php  endif;  ?>


                                <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                    <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                                    <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                    <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                    <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                </select>
                                <input type="hidden" value="-1" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">

                            </div> <!-- row-tipo-documento -->

                            <div id="row-hojas" class="col-sm-1">
                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->idRAD ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" 
                                       onchange="cargar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >

                            </div> <!-- row-hojas -->

                            <div id="row-acciones" class="col-sm-2">

                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>

                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                    <span class="glyphicon glyphicon-list"></span>
                                </a>

                            </div> <!-- row-acciones -->



                            <div id="row-estatus" class="col-sm-2">
                                <small style="padding: 5px; background: yellow; border-radius: 5px;">Esperando preregistro</small>

                            </div> <!--row-estatus-->



                        </div> <!-- row-documento -->
                        <hr>
                    </div><!-- row-documento -->
                <?php endif; ?>
                
            <?php endforeach;?>
        <?php endif;?>
    <?php endif;?>
