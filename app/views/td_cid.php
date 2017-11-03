<td id="tr-<?= $rRow->idRAD ?>">
    <div id="container-documento" class="col-xs-12">

        <div id="row-documento" class="row">

            <div id="row-title" class="col-md-6 col-xs-12">
                <p><?php echo $rRow->Nombre;  ?></p>
                

                    <div id="idDireccion_preregistra<?= $rRow->idRAD ?>">
                        <?php if ($rRow->direccion_preregistra > 0): ?>
                            <small> ENTREGÓ: <?= $addw_catDireccion[$rRow->direccion_preregistra] ?> </small>
                        <?php endif; ?>
                    </div>
                
                    <?php  ($rRow->direccion_preregistra > 0 )? $d = "d-n" : $d = ""  ?>
                    <select class="form-control <?= $d ?>" name="idDireccion<?php echo $rRow->idRAD; ?>" id="idDireccion<?php echo $rRow->idRAD; ?>" >
                        <option  value="<?= $rRow->direccion_preregistra ?>"> 
                            <?php if ($rRow->direccion_preregistra): ?>

                                <?= $addw_catDireccion[$rRow->direccion_preregistra] ?>
                            <?php else : ?>

                                SELECCIONA DIRECCIÓN
                            <?php endif ; ?>
                        </option>
                        <?php foreach ($Direcciones->result() as $rDireccion) { ?>
                            <option   value ="<?= $rDireccion->id ?>"  ><?= $rDireccion->Nombre ?></option>
                        <?php }  ?>

                       
                       
                    </select>
                   
                

                    
                    
            


            </div> <!-- row-title -->

            <div id="row-tipo-documento" class="col-md-2 col-xs-12">

                <?php if ($rRow->idDocumento == 114): ?>
                    <?php

                    $seleccion = "Selecciona una opción";
                    $value = 'value="0"';
                    $seleccion1 = "Contiene Estimaciones";
                    $value1='value="4"';


                    ?>

                    <!-- tipo documento 114 -->
                    <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="preregistro_documento_cid(<?=  $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                        <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                        <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                    </select>
                     <input type="hidden" value="114" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">

                <?php  else: ?>


                    <?php

                    

                    if ($rRow->tipo_documento < 0){
                        
                        $s_selecciona = "selected = 'selected'";
                        
                    } else {
                        $s_selecciona = "";
                        ($rRow->tipo_documento == 1)? $s_copia = "selected = 'selected'": $s_copia = "";
                        ($rRow->tipo_documento == 2)? $s_original = "selected = 'selected'": $s_original = "";
                        ($rRow->tipo_documento == 3)? $s_aplica = "selected = 'selected'": $s_aplica = "";
                        

                    }



                    ?>



                    <div class="direccion m-b">
                        <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="preregistro_documento_cid(<?= $rRow->idRAD; ?>,<?= $idArchivo ?>)">

                            <option  value="0" id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>" <?= $s_selecciona ?>>Selecciona una opción</option>
                            <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" value="1" <?= $s_copia ?> >Copia </option>
                            <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" value="2" <?= $s_original ?>> Original </option>
                            <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" value="3" <?= $s_aplica ?>> No Aplica </option>
                        </select>
                        <input type="hidden" value="-1" name="preregistro-<?php echo $rRow->idRAD; ?>" id="preregistro-<?php echo $rRow->idRAD ?>">
                    </div>
                <?php  endif;  ?>
            </div> <!-- row-tipo-documento -->





            <div id="row-hojas" class="col-md-2">
                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->idRAD ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="<?= $rRow->noHojas ?>"
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

            <div id="row-acciones" class="col-md-1">

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
                             <input   type="checkbox" value="" disabled="disabled" > Recibido
                         </label>
                    
                </div>
                <div class="checkbox">

               
                         <label>
                             <input  type="checkbox" value="" disabled="disabled" > Revisado
                         </label>

                     
                </div>


            </div> <!--row-estatus-->



        </div> <!-- row-documento -->
       
    </div><!-- row-documento -->
<td>
    
               
               
                    
              
           