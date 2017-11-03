<!-- vacia -->
    <div id="container-documento" class="col-xs-12">

        <div id="row-documento" class="row flex-center">

            <div id="row-title" class="col-md-5">
                <h5> <?php echo $rRow->Nombre;  ?>
                    <br><small><?php if($rRow->responsable_documento != 0){ echo "RESPONSABLE: " .$addw_direciones[$rRow->responsable_documento];}else{ echo "RESPONSABLE: EJECUTORA " . $aArchivo['Direccion']; } ?> </small>

                </h5>


            </div> <!-- row-title -->

            <div id="row-tipo-documento" class="col-md-2">

                <?php if ($rRow->idDocumento == 114): ?>
                    <?php

                    $seleccion = "Selecciona una opción";
                    $value = 'value="0"';
                    $seleccion1 = "Contiene Estimaciones";
                    $value1='value="4"';


                    ?>

                    <!-- tipo documento 114 -->
                    <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?=  $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                        <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                    </select>
                     <input type="hidden" value="114" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">

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




                    <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?= $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                        <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                    </select>
                    <input type="hidden" value="-1" name="preregistro-<?php echo $rRow->idRAP; ?>" id="preregistro-<?php echo $rRow->idRAP ?>">
                <?php  endif;  ?>
            </div> <!-- row-tipo-documento -->

            <div id="row-hojas" class="col-md-2">
                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->idRAD ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value=""
                       onchange="cargar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >
                <div class="popover bottom d-n" id="popover-hojas-<?= $rRow->idRAD ?>">
                    <div class="arrow"></div>
                    <h3 class="popover-title">Error</h3>

                    <div class="popover-content">
                      <p>Falta Seleccionar tipo de documento</p>
                    </div>
                </div>
            </div> <!-- row-hojas -->
            <div class="tooltip" id="tooltip-hojas-<?= $rRow->idRAD ?>">
               <div class="tooltip-inner">
                Tooltip!
              </div>
               <div class="tooltip-arrow">Inserta un Tipo de Documento</div>
            </div>

            <div id="row-acciones" class="col-md-2">

                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-sm" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                    <span class="glyphicon glyphicon-search"></span>
                </a>

                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning btn-sm" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                    <span class="glyphicon glyphicon-comment"></span>
                </a>

            </div> <!-- row-acciones -->



            <div id="row-estatus" class="col-md-1">
               
                <div class="checkbox">    
                    <label>
                        <input   type="checkbox" value="" disabled="disabled"> Recibido
                    </label>
                </div>
                <div class="checkbox">    
                    <label>
                        <input  type="checkbox" value="" disabled="disabled" > Revisado
                    </label>
                </div>

                   
            

            </div> <!--row-estatus-->



        </div> <!-- row-documento -->
    <hr>    
    </div><!-- row-documento -->
    
               
               
                    
              
           