<td id="tr-<?= $rRow->idRAD ?>">


       
            <?php if (!$rRow->tipo_documento == 4): //si no tiene estimaciones ?>
                <!-- if (!$rRow->tipo_documento == 4): //si no tiene estimaciones -->
                <div id="container-documento" class="col-xs-12">

                    <div id="row-documento" class="row flex-center">

                     
                           
                            <div id="row-title" class="col-md-5">
                                <h5> <?php echo $rRow->Nombre;  ?>
                                    <br><small><?php if($rRow->responsable_documento != 0){ echo "RESPONSABLE: " .$addw_direciones[$rRow->responsable_documento];}else{ echo "RESPONSABLE: EJECUTORA " . $aArchivo['Direccion']; } ?> </small>

                                </h5>
                                <div id="idDireccion_preregistra<?= $rRow->idRAD ?>">

                                </div>

                                <div class="direccion m-b">
                                    <select class="form-control" name="idDireccion<?php echo $rRow->idRAD; ?>" id="idDireccion<?php echo $rRow->idRAD; ?>"  onchange="cambiar_direccion_estimacion(<?= $rRow->idRAD ?>)">
                                        <option  value="0" >  SELECCIONA DIRECCIÓN </option>
                                        <?php foreach ($Direcciones->result() as $rDireccion) { ?>
                                            <option   value ="<?= $rDireccion->id ?>"  ><?= $rDireccion->Nombre ?></option>
                                        <?php }  ?>



                                    </select>
                                </div>
                                
                                
                            
                                


                            </div> <!-- row-title -->

                        <div id="row-tipo-documento" class="col-md-2">
                           
   
                                    <!-- $rRowDocumentos->id  ==  id Rel_Archivo_Documento -->
                            <form class="form-inline">
                                <div class="form-group">
                                  <label class="sr-only" for="exampleInputEmail3">No. de Estimaciones</label>
                                  <input type="number" class="form-control" id="noEstimaciones" name="noEstimaciones" placeholder="No Estimaciones" onkeypress="return validar(event)" onchange="cargar_estimaciones_PRE_CID( event, <?= $rRow->idRAD  ?>, <?= $idArchivo ?>)">
                                </div>

                                
                            </form>
                            <input type="hidden" class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" value="">

                        <!--</div>-->
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
                        
                        
                        
                        <div id="row-acciones" class="col-md-2">

                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>

                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
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
                    
                   
                    
                   
                </div><!-- row-documento -->
                <hr>
            <?php else: //si  tiene estimaciones ?>
                <!-- if ($rRow->tipo_documento == 4): //tiene estimaciones -->
                <div id="container-documento" class="col-xs-12">

                    <div id="row-documento" class="row flex-center">

                        <div id="row-title" class="col-md-5">
                           
                             <h5  data-toggle="tooltip" title=" <?php if($rRow->responsable_documento != 0){ echo "RESPONSABLE " .$addw_direciones[$rRow->responsable_documento];}else{ echo "RESPONSABLE " . $aArchivo['Direccion']; } ?>"> <?php echo $rRow->Nombre;  ?>
                               
                            </h5>
                            


                        </div> <!-- row-title -->

                        <div id="row-tipo-documento" class="col-md-2">
                           
                            
                            
   
                            <!-- $rRowDocumentos->id  ==  id Rel_Archivo_Documento -->
                            <form class="form-inline" style="margin-top: 5px">
                                <div class="form-group">
                                  <label class="sr-only" for="exampleInputEmail3">No. de Estimaciones</label>
                                  <input type="number" class="form-control" id="noEstimaciones" name="noEstimaciones" placeholder="No Estimaciones" onkeypress="return validar(event)" onchange="cargar_estimaciones(event, <?= $rRow->idRAD  ?>, <?= $idArchivo ?> ,<?= $preregistro ?>)">
                                </div>

                                
                            </form>
                            <input type="hidden" class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" value="">

                            
                            
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
                        
                        
                        
                        <div id="row-acciones" class="col-md-2">

                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-sm" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>

                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning btn-sm" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                <span class="glyphicon glyphicon-comment"></span>
                            </a>

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
                                             <input  type="checkbox"  value="" onchange="uf_recibir_revisado(this, <?= $rRow->idArchivo ?>, <?= $rRow->idRAP ?> ,<?= $rRow->idRAD ?>)" <?= $checked_revisado ?> > Revisado
                                         </label>
                                     <?php  else: ?>
                                         <label>
                                             <input  type="checkbox" value="" disabled="disabled" <?= $checked_revisado ?>> Revisado
                                         </label>

                                     <?php endif; ?>
                                </div>

                        </div> <!--row-estatus-->
                    



                    </div> <!-- row-documento -->
                    <?php endif; ?>
                   
                    <div class="row m-t" id="row-estimaciones">
                        <div id="div_estimaciones_<?php echo $rRow->idRAD?>"> 
   
                                                   
                            <?php  
                            $estimaciones_existentes = $this->ferfunc->get_subreg_distinct("saaEstimaciones", "idRel_Archivo_Documento= " . $rRow->idRAD , "Numero_Estimacion, idRel_Archivo_Documento"); 
                           
                            if ($estimaciones_existentes->num_rows() >0){
                                //echo $estimaciones_existentes->num_rows();
                                foreach ($estimaciones_existentes->result() as $estimaciones) { 
                                      //echo $estimaciones->Numero_Estimacion;
                            ?>

                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">

                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php  echo $estimaciones->Numero_Estimacion ?>" aria-expanded="true" aria-controls="collapse-<?php  echo $estimaciones->Numero_Estimacion ?>">

                                                <div class="d-f">

                                                    EST. <?php  echo $estimaciones->Numero_Estimacion ?>
                                                    <a class="btn btn-danger del_documento" id="eliminar_est" onclick="eliminar_estimacion(<?= $estimaciones->Numero_Estimacion?>,<?=$estimaciones->idRel_Archivo_Documento?>,<?=$idArchivo?>)" target="_self"><span class="glyphicon glyphicon-remove"></span> Eliminar Estimacion</a>

                                                </div>


                                            </a>

                                        </div>
                                        
                                        <div id="collapse-<?php  echo $estimaciones->Numero_Estimacion  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php  echo $estimaciones->Numero_Estimacion  ?>">
                                            <div class="panel-body">
                                                <?php 


                                                //$qEstimaciones = $this->ferfunc->get_subreg("saaEstimaciones",array("idRel_Archivo_Documento" => $rRow->idRAD,), "*", "Numero_Estimacion,ordenar_subdocumento");
                                                $qEstimaciones =  $this->datos_model->get_estimaciones($idArchivo);
                                                if (isset($qEstimaciones)){ 

                                                    if ($qEstimaciones->num_rows() >0){
                                                       foreach ($qEstimaciones->result() as $rEstimaciones) { 
                                                           //echo $estimaciones->Numero_Estimacion .' == '. $rEstimaciones->Numero_Estimacion;
                                                           if($estimaciones->Numero_Estimacion  == $rEstimaciones->Numero_Estimacion){


                                                ?>  
                                                                <?php 


                                                                    $strchecked_recibido=""; 
                                                                    $strchecked_revisado=""; 
                                                                    $value_estimaciones= "";
                                                                    $seleccion_estimaciones = "";
                                                                    

                                                                    if ($rEstimaciones->revisado==1){
                                                                         $strchecked_revisado='checked="checked"';
                                                                    }
                                                                    if ($rEstimaciones->recibido==1){
                                                                         $strchecked_recibido='checked="checked"';
                                                                    }

                                                                    

                                                                    if ($rEstimaciones->original_recibido==1){
                                                                            $seleccion_estimaciones = "Original";
                                                                            $value_estimaciones = 2;
                                                                            $seleccion_estimaciones1 = "Copia";
                                                                            $value_estimaciones1 = 1;

                                                                            $seleccion_estimaciones2 = "No Aplica";
                                                                            $value_estimaciones2 = 3;
                                                                            $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                            $value_estimaciones3 = 0;
                                                                    }

                                                                    else if ($rEstimaciones->copia==1 ){
                                                                            $seleccion_estimaciones = "Copia";
                                                                            $value_estimaciones = 1;
                                                                            $seleccion_estimaciones1 = "Original";
                                                                            $value_estimaciones1 = 2;
                                                                            $seleccion_estimaciones2 = "No Aplica";
                                                                            $value_estimaciones2 = 3;
                                                                            $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                            $value_estimaciones3 = 0;
                                                                    }

                                                                    else if ($rEstimaciones->no_aplica==1){
                                                                        $seleccion_estimaciones = "No aplica";
                                                                        $value_estimaciones = 3;
                                                                        $seleccion_estimaciones1 = "Original";
                                                                        $value_estimaciones1 = 2;
                                                                        $seleccion_estimaciones2 = "Copia";
                                                                        $value_estimaciones2 = 1;
                                                                        $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                        $value_estimaciones3 = 0;
                                                                    }
                                                                    else {
                                                                            $seleccion_estimaciones = "Selecciona una opción";
                                                                            $value_estimaciones = 0;
                                                                            $seleccion_estimaciones1 = "Copia";
                                                                            $value_estimaciones1 = 1;
                                                                            $seleccion_estimaciones2 = "Original";
                                                                            $value_estimaciones2 = 2;
                                                                            $seleccion_estimaciones3 = "No Aplica";
                                                                            $value_estimaciones3 = 3;
                                                                    }


                                                                ?>  
   
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                           
                                                                            <h6> EST. <?php  echo $rEstimaciones->Numero_Estimacion .' - ' .$addw_SubDocumentos[$rEstimaciones->idSubDocumento]?></h6>
                                                                            
                                                                            <?php if ($rEstimaciones->idDireccion_responsable > 0){ $d = "style = 'display:none' "; }else { $d = "  ";}?>
                                                                            <div class="direccion-estimacion m-b">
                                                                               
                                                                                    <select class="form-control" name="DireccionEstimacion<?php echo $rEstimaciones->id; ?>" <?= $d ?> id="DireccionEstimacion<?php echo $rEstimaciones->id; ?>" >
                                                                                        <?php if($rEstimaciones->idDireccion_responsable== 0): ?>


                                                                                            <option  value="0" selected="selected" >  SELECCIONA DIRECCIÓN </option>
                                                                                        <?php endif;?>


                                                                                        <?php foreach ($Direcciones->result() as $rDireccion) { ?>

                                                                                            <?php if($rEstimaciones->idDireccion_responsable >0 == $rDireccion->id): ?>
                                                                                                <option   value ="<?= $rDireccion->id ?>" ><?= $rDireccion->Nombre ?></option>
                                                                                            <?php else: ?>
                                                                                                <option   value ="<?= $rDireccion->id ?>"  ><?= $rDireccion->Nombre ?></option>
                                                                                            <?php endif;?>
                                                                                        <?php }  ?>





                                                                                    </select>
                                                                                
                                                                                
                                                                            </div>

                                                                        </div> 
                                                                        
                                                                        <div class="col-md-2">
                                                                           
   
                                                                            <select class="form-control m-b" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" onchange="ingresar_estimacion_cid(<?= $rEstimaciones->id;?>)" >
                                                                                <option value="<?= $value_estimaciones ?>" id="select" name="select"><?php echo $seleccion_estimaciones ?></option>

                                                                                <option id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" value="<?php echo $value_estimaciones1 ?>"><?php echo $seleccion_estimaciones1 ?></option>
                                                                                <option id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" value="<?php echo $value_estimaciones2 ?>"><?php echo $seleccion_estimaciones2 ?></option>
                                                                                <option id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" value="<?php echo $value_estimaciones3 ?>"><?php echo $seleccion_estimaciones3 ?></option>
                                                                             </select>
   
                                                                          
                                                                        </div>
                                                                        <!-- $rRow->idRAD  ==  id Rel_Archivo_Documento -->
                                                                        <div class="col-md-2">
                                                                            <div class="">
                                                                                <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                <input type="number" class="form-control" id="noHojas_est_<?= $rEstimaciones->id ?>" name="noHojas_est_<?= $rEstimaciones->id ?>" placeholder="No Hojas" value="<?= $rEstimaciones->noHojas;?>" onchange="cargar_noHojas_estimaciones(<?= $rEstimaciones->id ?>)" min="0">
                                                                            </div>

                                                                        </div>
                                                                                
                                                                        <div class="col-md-2">
                                                                            <a href="#" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-sm" data-target="#observaciones_estimaciones" title="Observaciones" role="button" onclick="ver_observaciones_estimacion(<?php echo $idArchivo; ?>,<?php echo $rEstimaciones->id; ?> ,<?= $preregistro ?>)">
                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                            </a>
                                                                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_estimacion" role="button" class="btn btn-warning btn-sm" onclick="uf_agregar_observaciones_estimacion(<?php echo $rEstimaciones->id .' ,13 , ' .$idDireccion_responsable  ?>)">
                                                                                <span class="glyphicon glyphicon-comment"></span>
                                                                            </a>


                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="col-md-1" >
                                                                           
                                                                            <?php ($rEstimaciones->revisado ==1)? $checked_revisado = "checked='checked'" :  $checked_revisado = "" ?>


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

                                                                        </div> 
                                                                          
                                                                        
   
                                                                    </div> <!--Fin row mb separacion-->
                                                                    <hr>
                                                                      
                                                                    
                                                                       
                                                                       
                                                                      <?php  
                                                                                  }              
                                                                              }
                                                                          }
                                                                                                   
                                                                      } //if $qEstimaciones
                                                                   
                                                                  
                                                                      ?>  
                                                                  </div>   <!-- panel body-->
                                                              </div> <!-- panel collapse-->
                                                           
                                                               
                                                          </div>
                                                      </div>
                                               
                                               
                                               
                                                      <?php 
                                                              }
                                                          } 
                                                       
                                                       
                                                      ?>
                                    </div>
                    </div>
                    
                </div><!-- row-documento -->
                <hr>
            
</td>
        

                                                 