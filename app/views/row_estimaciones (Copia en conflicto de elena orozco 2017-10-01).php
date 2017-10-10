


       
            <?php if (!$rRow->tipo_documento == 4): //si no tiene estimaciones ?>
                <div id="container-documento" class="col-xs-12">

                    <div id="row-documento" class="row">

                        <div id="row-title" class="col-md-6">
                            <div class="panel panel-warning">




                                <div class="panel-heading"> 
                                     <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRow->idDocumento;  ?>" href="#panel-element-documentos-<?php echo $rRow->idDocumento;  ?>">
                                          <?php echo $rRow->Nombre;  ?>

                                      </a> 
                                    <div> <small><?php echo $addw_direciones[$rRow->responsable_documento];  ?> </small></div>
                                </div>



                                
                            </div>


                        </div> <!-- row-title -->

                        <div id="row-tipo-documento" class="col-md-2">
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

                            <?php  /*else: ?>


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

                           <?php  endif; */ ?>
                            <div class="col-xs-12 col-md-12" align="end" style="text-align: end; margin-top: 20px">
   
                                    <!-- $rRowDocumentos->id  ==  id Rel_Archivo_Documento -->
                                          <form class="form-inline">
                                              <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail3">No. de Estimaciones</label>
                                                <input type="number" class="form-control" id="noEstimaciones" name="noEstimaciones" placeholder="No Estimaciones">
                                              </div>

                                              <button type="button" class="btn btn-default" onclick="cargar_estimaciones(<?= $rRow->idRAD  ?>, <?= $idArchivo ?> , <?= $reviso ?>)">Agregar</button>
                                          </form>

                         </div>
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
                        
                        
                        
                        <div id="row-acciones" class="col-md-1">

                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>

                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                <span class="glyphicon glyphicon-list"></span>
                            </a>

                        </div> <!-- row-acciones -->



                        <div id="row-estatus" class="col-md-1">
                            <small class="estatus">Sin preregistro</small>

                        </div> <!--row-estatus-->



                    </div> <!-- row-documento -->
                    
                    <div class="row-estimaciones">
                        <div id="panel-element-documentos-<?php echo $rRow->idDocumento;  ?>" class="panel-collapse collapse">
                                    <div id="div_estimaciones_<?php echo $rRow->idRAD?>">
   
                                                   
                                                  <?php  
                                                  $estimaciones_existentes = $this->ferfunc->get_subreg_distinct("saaEstimaciones", "idRel_Archivo_Documento= " . $rRow->idRAD , "Numero_Estimacion, idRel_Archivo_Documento"); 
                                                  if ($estimaciones_existentes->num_rows() >0){
                                                      //echo $estimaciones_existentes->num_rows();
                                                      foreach ($estimaciones_existentes->result() as $estimaciones) { 
                                                          //echo $estimaciones->Numero_Estimacion;
                                                  ?>
                                               
                                                      <div class="col-md-12 m-t" style="margin-bottom:20px" >
                                                          <div class="panel panel-default">
                                                              <div class="panel-heading">
                                                                       
                                                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php  echo $estimaciones->Numero_Estimacion ?>" aria-expanded="true" aria-controls="collapse-<?php  echo $estimaciones->Numero_Estimacion ?>">
                                                                                  <!--div class="display-flex">
   
                                                                                      EST. <?php  echo $estimaciones->Numero_Estimacion ?>
                                                                                      <a class="btn btn-danger del_documento" href="<?php echo site_url('archivo/eliminar_estimacion/' . $estimaciones->Numero_Estimacion  . '/' . $estimaciones->idRel_Archivo_Documento); ?>" title="Eliminar Documento" onclick="return confirm('¿Confirma eliminar la estimación y sus anexos?');" target="_self"><span class="glyphicon glyphicon-remove" ></span> Eliminar Estimacion</a>
   
                                                                                  </div-->
                                                                                  <div class="display-flex">
   
                                                                                      EST. <?php  echo $estimaciones->Numero_Estimacion ?>
                                                                                      <a class="btn btn-danger del_documento" id="eliminar_est" onclick="eliminar_estimacion(<?= $estimaciones->Numero_Estimacion?>,<?=$estimaciones->idRel_Archivo_Documento?>,<?=$idArchivo?>)" target="_self"><span class="glyphicon glyphicon-remove"></span> Eliminar Estimacion</a>
   
                                                                                  </div>
   
   
                                                                      </a>
                                                                   
                                                              </div>
                                                              <div id="collapse-<?php  echo $estimaciones->Numero_Estimacion  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php  echo $estimaciones->Numero_Estimacion  ?>">
                                                                  <div class="panel-body">
                                                                      <?php 
                                                           
                                                           
                                                                      $qEstimaciones = $this->ferfunc->get_subreg("saaEstimaciones",array("idRel_Archivo_Documento" => $rRow->idRAD,), "*", "Numero_Estimacion,ordenar_subdocumento");
                                                                      if (isset($qEstimaciones)){ 
   
                                                                          if ($qEstimaciones->num_rows() >0){
                                                                             foreach ($qEstimaciones->result() as $rEstimaciones) { 
                                                                                 //echo $estimaciones->Numero_Estimacion .' == '. $rEstimaciones->Numero_Estimacion;
                                                                                 if($estimaciones->Numero_Estimacion  == $rEstimaciones->Numero_Estimacion){
                                                                                      
   
                                                                      ?>  
                                                                      <?php 
   
   
                                                                          $strchecked_revisado=""; 
                                                                          $value_estimaciones= "";
                                                                          $seleccion_estimaciones = "";
                                                                           
                                                                         
                                                                          if ($rEstimaciones->revisado==1){
                                                                               $strchecked_revisado='checked="checked"';
                                                                              }
   
                                                                          if ($rEstimaciones->original_recibido==0 && $rEstimaciones->copia==0 && $rEstimaciones->no_aplica==0){
                                                                                  $seleccion_estimaciones = "Selecciona una opción";
                                                                                  $value_estimaciones = 0;
                                                                                  $seleccion_estimaciones1 = "Copia";
                                                                                  $value_estimaciones1 = 1;
                                                                                  $seleccion_estimaciones2 = "Original";
                                                                                  $value_estimaciones2 = 2;
                                                                                  $seleccion_estimaciones3 = "No Aplica";
                                                                                  $value_estimaciones3 = 3;
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
                                                                          
                                                                          if ($rEstimaciones->copia==1){
                                                                                  $seleccion_estimaciones = "Copia";
                                                                                  $value_estimaciones = 1;
                                                                                  $seleccion_estimaciones1 = "Original";
                                                                                  $value_estimaciones1 = 2;
                                                                                  $seleccion_estimaciones2 = "No Aplica";
                                                                                  $value_estimaciones2 = 3;
                                                                                  $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                                  $value_estimaciones3 = 0;
                                                                          }
                                                                          
                                                                          if ($rEstimaciones->no_aplica==1){
                                                                              $seleccion_estimaciones = "No aplica";
                                                                              $value_estimaciones = 3;
                                                                              $seleccion_estimaciones1 = "Original";
                                                                              $value_estimaciones1 = 2;
                                                                              $seleccion_estimaciones2 = "Copia";
                                                                              $value_estimaciones2 = 1;
                                                                              $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                              $value_estimaciones3 = 0;
                                                                          }
                                                                          
                                                                          
                                                                              
                                                                         
   
   
   
                                                                      ?>  
   
                                                                    <div class="row m-b-separacion">
                                                           
                                                                      <div class="col-md-5">
                                                                                 
                                                                                   
                                                                      
                                                                          <div class="col-md-8">
   
                                                                              <select class="form-control m-b" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" onchange="uf_recibir_tipo_estimacion(<?= $rEstimaciones->id;?>)" >
                                                                                  <option value="<?= $value_estimaciones ?>" id="select" name="select"><?php echo $seleccion_estimaciones ?></option>
                                                                                  
                                                                                  <option id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" value="<?php echo $value_estimaciones1 ?>"><?php echo $seleccion_estimaciones1 ?></option>
                                                                                  <option id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" value="<?php echo $value_estimaciones2 ?>"><?php echo $seleccion_estimaciones2 ?></option>
                                                                                  <option id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" value="<?php echo $value_estimaciones3 ?>"><?php echo $seleccion_estimaciones3 ?></option>
                                                                                </select>
   
                                                                                <!-- $rRow->idRAD  ==  id Rel_Archivo_Documento -->
                                                                                <div class="m-b">
                                                                                  <div class="">
                                                                                     <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                                                     <input type="number" class="form-control" id="noHojas_est_<?= $rEstimaciones->id ?>" name="noHojas_est_<?= $rEstimaciones->id ?>" placeholder="No Hojas" value="" onchange="cargar_noHojas_estimaciones(<?= $rEstimaciones->id ?>)" min="0">
                                                                                  </div>
                                                                                            
                                                                                </div>
                                                                                
                                                                                <div class="m-b" id="div_noHojas_est_<?= $rEstimaciones->id ?>" name="div_noHojas_est_<?= $rEstimaciones->id ?>">
                                                                                    <?php echo '<b>No Hojas: </b>' . $rEstimaciones->noHojas?>
                                                                                
                                                                                </div>
                                                                                
                                                                                <div  class="m-b d-n" id="div_noHojas_est_aux_<?= $rEstimaciones->id ?>" name="div_noHojas_est_aux_<?= $rEstimaciones->id ?>">
                                                                                    
                                                                                
                                                                                </div>
                                                              
   
                                                                                 
   
   
                                                                          </div>
                                                                          <?php if($reviso ==1 ){
                                                                              $disable_estimacion= "";
                                                                          } else {
                                                                              $disable_estimacion= "disabled = 'disabled'";
                                                                          }
                                                                          ?>
                                                                          <div class="col-md-4" >
                                                                              <div class="checkbox-inline">
                                                                                  <label><input name="Est_revisado<?php echo $rEstimaciones->id; ?>" type="checkbox"   id="Est_revisado<?php echo $rEstimaciones->id; ?>"  onclick="uf_revisado_estimacion(this,<?= $rEstimaciones->id; ?>)"   <?php echo $strchecked_revisado ?> <?= $disable_estimacion ?>>Revisado</label>
                                                                              </div>
   
                                                                          </div> 
                                                                          
                                                                          <div class="col-md-12">
                                                                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default m-t" data-target="#observaciones_estimaciones" title="Observaciones" role="button" onclick="ver_observaciones_estimacion(<?php echo $idArchivo; ?>,<?php echo $rEstimaciones->id; ?> ,<?= $preregistro ?>)">
                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                            </a>
                                                                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_estimacion" role="button" class="btn btn-warning m-t" onclick="uf_agregar_observaciones_estimacion(<?php echo $rEstimaciones->id .' , ' .$rRow->direccion_preregistra .' , ' .$idDireccion_responsable  ?>)">
                                                                                            <span class="glyphicon glyphicon-list"></span>
                                                                                        </a>


                                                                          </div>
   
                                                                      </div>
                                                                      <div class="col-md-7 m-b">
                                                                          <div class="panel panel-default">
                                                                              <div class="panel-heading" role="tab" id="heading-<?php  echo $rEstimaciones->id ?>">
                                                                                <h4 class="panel-title">
                                                                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php  echo $rEstimaciones->id ?>" aria-expanded="true" aria-controls="collapse-<?php  echo $rEstimaciones->id?>">
                                                                                      <div style="display:flex; justify-content: space-between">
   
                                                                                          EST. <?php  echo $rEstimaciones->Numero_Estimacion .' - ' .$addw_SubDocumentos[$rEstimaciones->idSubDocumento]?>
   
   
                                                                                      </div>
   
   
                                                                                  </a>
                                                                                </h4>
                                                                              </div>
                                                                              <div id="collapse-<?php  echo $rEstimaciones->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php  echo $rEstimaciones->id ?>">
                                                                                <div class="panel-body">
   
                                                                                </div>
                                                                              </div>
                                                                          </div> 
                                                                      </div>
                                                                    </div> <!--Fin row-->
                                                                       
                                                                       
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
                    </div>
                </div><!-- row-documento -->
                <hr>
            <?php else: //si  tiene estimaciones ?>
                
                <div id="container-documento" class="col-xs-12">

                    <div id="row-documento" class="row">

                        <div id="row-title" class="col-md-6">
                            <div class="panel panel-warning">




                                <div class="panel-heading"> 
                                    <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRow->idDocumento;  ?>" href="#panel-element-documentos-<?php echo $rRow->idDocumento;  ?>">
                                          <?php echo $rRow->Nombre;  ?>

                                    </a> 
                                    <div> <small><?php echo $addw_direciones[$rRow->responsable_documento];  ?> </small></div>
                                </div>



                                <div id="panel-element-documentos-<?php echo $rRow->idDocumento;  ?>" class="panel-collapse collapse">
                                    
                                </div>
                            </div>


                        </div> <!-- row-title -->

                        <div id="row-tipo-documento" class="col-md-2">
                            <?php

                            $seleccion1 = "Selecciona una opción";
                            $value1 = 'value="0"';
                            $seleccion = "Contiene Estimaciones";
                            $value = 'value="4"';


                            ?>
                            <!-- tipo documento 114 -->
                            <select class="form-control" name="tipo_documento<?php echo $rRow->idRAD; ?>" id="tipo_documento<?php echo $rRow->idRAD; ?>" onchange="uf_recibir_tipo_documento(<?=  $rRow->idRAD; ?>,<?= $idArchivo ?> ,<?= $preregistro ?>)">

                                <option   <?php echo $value ?> id="select<?php echo $rRow->idRAD; ?>" name="select<?php echo $rRow->idRAD; ?>"><?php echo $seleccion ?></option>
                                <option id="tipo_documento<?php echo $rRow->idRAD; ?>" name="tipo_documento<?php echo $rRow->idRAD; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>

                            </select>
                            
                            
   
                            <!-- $rRowDocumentos->id  ==  id Rel_Archivo_Documento -->
                            <form class="form-inline" style="margin-top: 5px">
                                <div class="form-group">
                                  <label class="sr-only" for="exampleInputEmail3">No. de Estimaciones</label>
                                  <input type="number" class="form-control" id="noEstimaciones" name="noEstimaciones" placeholder="No Estimaciones">
                                </div>

                                <button type="button" class="btn btn-default" onclick="cargar_estimaciones(<?= $rRow->idRAD  ?>, <?= $idArchivo ?> , <?= $reviso ?>)">Agregar</button>
                            </form>

                            
                            
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
                        
                        
                        
                        <div id="row-acciones" class="col-md-1">

                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-sm" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->idTipoProceso; ?>,<?php echo $rRow->idSubTipoProceso ?>,<?php echo $rRow->idDocumento ?>, <?= $preregistro ?>)">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>

                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning btn-sm" onclick="uf_agregar_observaciones(<?php echo $rRow->idTipoProceso .' , ' . $rRow->idSubTipoProceso . ' , ' .$rRow->idDocumento . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                <span class="glyphicon glyphicon-list"></span>
                            </a>

                        </div> <!-- row-acciones -->



                        <div id="row-estatus" class="col-md-1">
                            <small class="estatus">Sin preregistro</small>

                        </div> <!--row-estatus-->



                    </div> <!-- row-documento -->
                   
                    <div class="row" id="row-estimaciones">
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


                                                $qEstimaciones = $this->ferfunc->get_subreg("saaEstimaciones",array("idRel_Archivo_Documento" => $rRow->idRAD,), "*", "Numero_Estimacion,ordenar_subdocumento");
                                                if (isset($qEstimaciones)){ 

                                                    if ($qEstimaciones->num_rows() >0){
                                                       foreach ($qEstimaciones->result() as $rEstimaciones) { 
                                                           //echo $estimaciones->Numero_Estimacion .' == '. $rEstimaciones->Numero_Estimacion;
                                                           if($estimaciones->Numero_Estimacion  == $rEstimaciones->Numero_Estimacion){


                                                ?>  
                                                                <?php 


                                                                    $strchecked_revisado=""; 
                                                                    $value_estimaciones= "";
                                                                    $seleccion_estimaciones = "";


                                                                    if ($rEstimaciones->revisado==1){
                                                                         $strchecked_revisado='checked="checked"';
                                                                        }

                                                                    if ($rEstimaciones->original_recibido==0 && $rEstimaciones->copia==0 && $rEstimaciones->no_aplica==0){
                                                                            $seleccion_estimaciones = "Selecciona una opción";
                                                                            $value_estimaciones = 0;
                                                                            $seleccion_estimaciones1 = "Copia";
                                                                            $value_estimaciones1 = 1;
                                                                            $seleccion_estimaciones2 = "Original";
                                                                            $value_estimaciones2 = 2;
                                                                            $seleccion_estimaciones3 = "No Aplica";
                                                                            $value_estimaciones3 = 3;
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

                                                                    if ($rEstimaciones->copia==1){
                                                                            $seleccion_estimaciones = "Copia";
                                                                            $value_estimaciones = 1;
                                                                            $seleccion_estimaciones1 = "Original";
                                                                            $value_estimaciones1 = 2;
                                                                            $seleccion_estimaciones2 = "No Aplica";
                                                                            $value_estimaciones2 = 3;
                                                                            $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                            $value_estimaciones3 = 0;
                                                                    }

                                                                    if ($rEstimaciones->no_aplica==1){
                                                                        $seleccion_estimaciones = "No aplica";
                                                                        $value_estimaciones = 3;
                                                                        $seleccion_estimaciones1 = "Original";
                                                                        $value_estimaciones1 = 2;
                                                                        $seleccion_estimaciones2 = "Copia";
                                                                        $value_estimaciones2 = 1;
                                                                        $seleccion_estimaciones3 = "Selecciona una opcion";
                                                                        $value_estimaciones3 = 0;
                                                                    }


                                                                ?>  
   
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab" id="heading-<?php  echo $rEstimaciones->id ?>">
                                                                                    <h4 class="panel-title">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php  echo $rEstimaciones->id ?>" aria-expanded="true" aria-controls="collapse-<?php  echo $rEstimaciones->id?>">
                                                                                            <div style="display:flex; justify-content: space-between">

                                                                                                EST. <?php  echo $rEstimaciones->Numero_Estimacion .' - ' .$addw_SubDocumentos[$rEstimaciones->idSubDocumento]?>


                                                                                            </div>


                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                              
                                                                            </div> 
                                                                        </div> 
                                                                        
                                                                        <div class="col-md-2">
                                                                           
   
                                                                            <select class="form-control m-b" name="tipo_documento_est<?php echo $rEstimaciones->id; ?>" id="tipo_documento_est<?php echo $rEstimaciones->id; ?>" onchange="uf_recibir_tipo_estimacion(<?= $rEstimaciones->id;?>)" >
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
                                                                                <input type="number" class="form-control" id="noHojas_est_<?= $rEstimaciones->id ?>" name="noHojas_est_<?= $rEstimaciones->id ?>" placeholder="No Hojas" value="" onchange="cargar_noHojas_estimaciones(<?= $rEstimaciones->id ?>)" min="0">
                                                                            </div>

                                                                        </div>
                                                                                
                                                                        <div class="col-md-1">
                                                                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-sm" data-target="#observaciones_estimaciones" title="Observaciones" role="button" onclick="ver_observaciones_estimacion(<?php echo $idArchivo; ?>,<?php echo $rEstimaciones->id; ?> ,<?= $preregistro ?>)">
                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                            </a>
                                                                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_estimacion" role="button" class="btn btn-warning btn-sm" onclick="uf_agregar_observaciones_estimacion(<?php echo $rEstimaciones->id .' , ' .$rRow->direccion_preregistra .' , ' .$idDireccion_responsable  ?>)">
                                                                                <span class="glyphicon glyphicon-list"></span>
                                                                            </a>


                                                                        </div>
                                                                        
                                                                        <?php if($reviso ==1 ){
                                                                            $disable_estimacion= "";
                                                                        } else {
                                                                            $disable_estimacion= "disabled = 'disabled'";
                                                                        }
                                                                        ?>
                                                                        <div class="col-md-1" >
                                                                            <div class="checkbox-inline">
                                                                                <label><input name="Est_revisado<?php echo $rEstimaciones->id; ?>" type="checkbox"   id="Est_revisado<?php echo $rEstimaciones->id; ?>"  onclick="uf_revisado_estimacion(this,<?= $rEstimaciones->id; ?>)"   <?php echo $strchecked_revisado ?> <?= $disable_estimacion ?>>Revisado</label>
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
            <?php endif; ?>
        

                                                 