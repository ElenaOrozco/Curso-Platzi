<div id="container-documento" class="col-xs-12">
 
    <div id="row-documento" class="row  flex-center">
        
        
        <div id="row-title" class="col-md-5">
            
            <h5> <?php echo $rRow->Nombre;  ?>
                <br><small><?php if($rRow->responsable_documento != 0){ echo "RESPONSABLE " .$addw_direciones[$rRow->responsable_documento];}else{ echo "RESPONSABLE EJECUTORA " . $aArchivo['Direccion']; } ?> </small>
                <br><small> ENTREGÓ: <?= $addw_catDireccion[$rRow->direccion_preregistra] ?> </small>
            </h5>
            
            
           


        </div> <!-- row-title -->

        <div id="row-tipo-documento" class="col-md-2">

            <?php if ($rRow->tipo_documento == 4): ?>
                <?php

                $seleccion1 = "Selecciona una opción";
                $value1 = 'value="0"';
                $seleccion = "Contiene Estimaciones";
                $value='value="4"';


                ?>


                <select class="form-control" name="tipo_documento<?php echo $rRow->idRAP; ?>" id="tipo_documento<?php echo $rRow->idRAP; ?>" onchange="modificar_tipo_documento(<?= $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)" <?= $disabled ?> >

                    <option   <?php echo $value ?> id="select<?php echo $rRow->idRAP; ?>" name="select<?php echo $rRow->idRAP; ?>"><?php echo $seleccion ?></option>
                    <option id="tipo_documento<?php echo $rRow->idRAP; ?>" name="tipo_documento<?php echo $rRow->idRAP; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                </select>
                 <input type="hidden" value="<?= $rRow->idRAP ?>" name="preregistro-<?php echo $rRow->idRAP; ?>" id="preregistro-<?php echo $rRow->idRAP ?>">

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


            <select class="form-control" name="tipo_documento<?php echo $rRow->idRAP; ?>" id="tipo_documento<?php echo $rRow->idRAP; ?>" onchange="modificar_tipo_documento(<?= $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>, <?= $rRow->idRAP ?>)" <?= $disabled ?>>

                <option   <?php echo $value ?> id="select<?php echo $rRow->idRAP; ?>" name="select<?php echo $rRow->idRAP; ?>"><?php echo $seleccion ?></option>
                <option id="tipo_documento<?php echo $rRow->idRAP; ?>" name="tipo_documento<?php echo $rRow->idRAP; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                <option id="tipo_documento<?php echo $rRow->idRAP; ?>" name="tipo_documento<?php echo $rRow->idRAP; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                <option id="tipo_documento<?php echo $rRow->idRAP; ?>" name="tipo_documento<?php echo $rRow->idRAP; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
            </select>
            
            <input type="hidden" value="<?= $rRow->idRAP ?>" name="preregistro-<?php echo $rRow->idRAP; ?>" id="preregistro-<?php echo $rRow->idRAP ?>">

        </div> <!-- row-tipo-documento -->

        <div id="row-hojas" class="col-md-2">
            <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
            <input type="number" class="form-control" id="noHojas_doc_<?= $rRow->idRAP ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="<?php if( $rRow->noHojas != 0 ) echo  $rRow->noHojas  ?>"
                   onchange="modificar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>, <?= $rRow->idRAP ?>)" onkeyup="modificar_noHojas(event,<?= $rRow->idRAD ?>, <?= $idArchivo ?>, <?= $rRow->idRAP ?>)" onkeypress="return validar(event)" <?= $disabled ?> >

        </div> <!-- row-hojas -->

        <div id="row-acciones" class="col-md-2">

            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-sm" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                <span class="glyphicon glyphicon-search"></span>
            </a>

            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning btn-sm" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                <span class="glyphicon glyphicon-comment"></span>
            </a>
            <?php if($digitalizar == 1): ?>
                <!--<a href="#" id="btn-digitalizar"  title="Digitalizar"  class="btn btn-success btn-sm" onclick="digitalizar()">
                    <span class="glyphicon glyphicon-barcode"></span>
                </a>-->
                <a class="btn btn-success btn-sm"  title="Digitalizar Documento"  onclick="nuevo_doc_anexo(<?= $idArchivo; ?>, <?= $rRow->idRAD; ?>,<?= $rRow->idTipoProceso; ?>,<?= $rRow->idSubTipoProceso;?>, <?= $rRow->idDocumento; ?>)" >
                    <span class="glyphicon glyphicon-barcode"></span>
                </a>
                <?php
                 $tabla="saaDocumentosAnexos_".$aArchivo['idEjercicio'];
                                              
                    $qEstimaciones = $this->ferfunc->get_subreg_distinct($tabla, "idRel_Archivo_Documento =" . $rRow->idRAD, " Numero_Estimacion, Es_Estimacion, Es_Prorroga " );

                        if (isset($qEstimaciones)) {
                            if ($qEstimaciones->num_rows() > 0) {
                ?>
                            <a href="#" id="ver-documentos"  title="Ver Documento"  class="btn btn-info btn-sm" onclick="ver_documento()">
                                <span class="glyphicon glyphicon-eye"></span>
                            </a>
                <?php       }
                        }
                        
                        
                ?>
            <?php endif; ?>

        </div> <!-- row-acciones -->



        <div id="row-estatus" class="col-md-1">
            <?php ($rRow->recibido_cid ==1)? $checked_recibido = "checked='checked'" :  $checked_recibido = "" ?>
            <?php ($rRow->revisado ==1)? $checked_revisado = "checked='checked'" :  $checked_revisado = "" ?>
            
            
                <div class="checkbox">
                    <?php if($recibe ==1  && $Estatus==10): ?>
                        <label>
                             <input   type="checkbox" value="" onchange="uf_recibido_cid(this, <?= $rRow->idRAP ?>, <?= $rRow->idRAD ?>)" <?= $checked_recibido ?> > Recibido
                        </label>
                     <?php else: ?>
                         <label>
                             <input   type="checkbox" value="" disabled="disabled" <?= $checked_recibido ?>> Recibido
                         </label>
                     <?php endif; ?>
                </div>
              
                <div class="checkbox">
                     <?php if($reviso ==1  && $Estatus==20): ?>
                         <label>
                             <input  type="checkbox"  value="" id="revisado-<?= $rRow->idRAP ?>" onchange="uf_recibir_revisado(this, <?= $rRow->idArchivo?> , <?= $rRow->idRAP ?> ,<?= $rRow->idRAD ?>)" <?= $checked_revisado ?> > Revisado
                         </label>
                     <?php  else: ?>
                         <label>
                             <input  type="checkbox" value="" disabled="disabled" <?= $checked_revisado ?>> Revisado
                         </label>

                     <?php endif; ?>
                </div>
           
                                        
           

        </div> <!--row-estatus-->

        



    </div> <!-- row-documento -->
    
    <hr>
</div><!-- row-documento -->
