<div class="panel-group" id="panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>">
                    <div class="panel panel-success">
                        
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" data-parent="#panel-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>" href="#panel-element-sub-proceso-<?php echo $rRowSubProcesos->id;  ?>">
                               
                                <table>
                                    <tr> <!-- #MAOC SubProcesos-->
                                        <td width="800" >
                                           <?php echo $rRowSubProcesos->Nombre;  ?>
                                        </td> 
                                        
                                        <?php if($preregistro ==1 || $recibe ==1) { ?>
                                        <td width="200">
                                           
                                            
                                            
                                            <div id="numero_documentos_subproceso_preregistrados<?php echo $rRowSubProcesos->id;  ?>">
                                                
                                                
                                                 <?php
                                                        if ($preregistro == 1){
                                                        $qDocumentos_sub_proceso_recibido = $this->ferfunc->get_reg_libre("SELECT DISTINCT `saaRel_Archivo_Documento`.`idTipoProceso`, 
                                                                `saaRel_Archivo_Documento`.`idSubTipoProceso`,`saaRel_Archivo_Preregistro`.* 
                                                                FROM `saaRel_Archivo_Documento`
                                                                INNER JOIN `saaRel_Archivo_Preregistro`
                                                                ON `saaRel_Archivo_Documento`.id = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                                                                WHERE `saaRel_Archivo_Preregistro`.idArchivo=" .$idArchivo ."
                                                                AND (`saaRel_Archivo_Preregistro`.tipo_documento = 1 OR `saaRel_Archivo_Preregistro`.tipo_documento =2 OR `saaRel_Archivo_Preregistro`.tipo_documento =3) 
                                                                AND `saaRel_Archivo_Preregistro`.idDireccion_responsable = " .$idDireccion_responsable ."
                                                                AND `saaRel_Archivo_Documento`.`idSubTipoProceso` = " . $rRowSubProcesos->id);
                                                        } else{
                                                            $qDocumentos_sub_proceso_recibido = $this->ferfunc->get_reg_libre("SELECT DISTINCT `saaRel_Archivo_Documento`.`idTipoProceso`, 
                                                                `saaRel_Archivo_Documento`.`idSubTipoProceso`,`saaRel_Archivo_Preregistro`.* 
                                                                FROM `saaRel_Archivo_Documento`
                                                                INNER JOIN `saaRel_Archivo_Preregistro`
                                                                ON `saaRel_Archivo_Documento`.id = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                                                                WHERE `saaRel_Archivo_Preregistro`.idArchivo=" .$idArchivo ."
                                                                AND (`saaRel_Archivo_Preregistro`.tipo_documento = 1 OR `saaRel_Archivo_Preregistro`.tipo_documento =2 OR `saaRel_Archivo_Preregistro`.tipo_documento =3) 
                                                                
                                                                AND `saaRel_Archivo_Documento`.`idSubTipoProceso` = " . $rRowSubProcesos->id);
                                                            
                                                        }
                                                        //$qDocumentos_sub_proceso_recibido_original = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id,"original_recibido"=>1),"id");
                                                        $qDocumentos_sub_proceso_recibido_total = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id),"id");
                                                        //$total =  $qDocumentos_sub_proceso_recibido->num_rows() + $qDocumentos_sub_proceso_recibido_original->num_rows() ;
                                                        echo "Preregistrados " . $qDocumentos_sub_proceso_recibido->num_rows() . " de " . $qDocumentos_sub_proceso_recibido_total->num_rows();
                                            
                                            
                                                ?>
                                            </div>
                                            
                                            <div class="d-n" id="numero_documentos_subproceso_preregistrados_preregistro<?php echo $rRowSubProcesos->id;  ?>">
                                            </div>
                                            <div class="d-n" id="numero_documentos_subproceso_preregistrados_recibe<?php echo $rRowSubProcesos->id;  ?>">
                                            </div>
                                            
                                           
                                        </td>
                                        <?php } ?>
                                        
                                        <td width="200">
                                           
                                            
                                            
                                            <div id="numero_documentos_subproceso_recibidos<?php echo $rRowSubProcesos->id;  ?>">
                                                 <?php
                                            
                                                        $qDocumentos_sub_proceso_recibido = $this->ferfunc->get_reg_libre("SELECT DISTINCT  `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                                                                FROM `saaRel_Archivo_Preregistro`
                                                                INNER JOIN saaRel_Archivo_Documento
                                                                ON `saaRel_Archivo_Preregistro`.id_Rel_Archivo_Documento = saaRel_Archivo_Documento.id
                                                                 WHERE saaRel_Archivo_Documento.idArchivo=" .$idArchivo . " AND  saaRel_Archivo_Documento.idSubTipoProceso= ". $rRowSubProcesos->id ."
                                                                 AND `saaRel_Archivo_Preregistro`.eliminacion_logica = 0 AND `saaRel_Archivo_Preregistro`.recibido_cid=1");
                                                        //$qDocumentos_sub_proceso_recibido_original = $this->ferfunc->get_subreg("saaRel_Archivo_Documento",array("idArchivo" => $idArchivo,"idSubTipoProceso" => $rRowSubProcesos->id,"original_recibido"=>1),"id");
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
                                                
                if (($recibe == 1 && $Estatus == 10) || ($reviso ==1 && $Estatus ==20)){
                  $disabled = "";
                } else{
                  $disabled ="disabled = 'disabled'";
                }

                foreach ($qDocumentos->result() as $rRowDocumentos) {
                       
                    ?>
                        
       
                    <?php  
                         $strin_documento="  ";
                        
                         if ($rRowDocumentos->id==$idDocumento){
                             $strin_documento=" in ";
                             
                         }

                    ?>                             
                   
                    <?php 
                         $value=""; 
                         
                          
                          ?>
                                        
                     <!-- Recibe = <?= $recibe ?> Estatus <?= $Estatus ?>-->                   
                                        
                  <div class="panel-group" id="panel-documentos-<?php echo $rRowDocumentos->id;  ?>">
                  
                  
                    
                    <div class="row"> <!--row idRel_archivo -->
                        
                        

                        <div class="col-sm-4 m-b-separacion m-t">

                        
                                 
                            <!--- id Dreccion <?= $rRowDocumentos->idDireccion_responsable ?> -->       
                          <!-- --------------------------------------------------------------------- -->         
                          <?php 
                          $visualizo = 0;
                          
                          ?>

                          <?php  $qPreregistros = $this->ferfunc->get_reg_libre("SELECT * FROM `saaRel_Archivo_Preregistro`
                                                                  WHERE id_Rel_Archivo_Documento =" .$rRowDocumentos->id  ." AND eliminacion_logica=0"); ?>

                          <?php if(($preregistro ==1 || $recibe ==1 || $reviso == 1) && $Estatus <= 30): ?>

                            

                            <?php if ($qPreregistros->num_rows() > 0):?>
                              <!-- Si hay preregistrados Ciclo -->
                              <?php foreach ($qPreregistros->result() as $rPreregistros): ?>

                                <?php $checked_recibido="" ?>
                                <?php if ($rPreregistros->recibido_cid == 1):?>
                                    <?php $checked_recibido="checked='checked'" ?>
                                <?php endif; ?>

                                <?php $checked_revisado="" ?>
                                <?php if ($rPreregistros->revisado == 1):?>
                                    <?php $checked_revisado="checked='checked'" ?>
                                <?php endif; ?>
    
                                  <?php if ( ($preregistro == 1 && $idDireccion_responsable == $rPreregistros->idDireccion_responsable) ||
                                      ($recibe==1 && $rPreregistros->preregistro_aceptado == 1) || ($reviso==1 && $rPreregistros->recibido_cid == 1)):?>
                                    <!-- ( ($preregistro == 1 && $idDireccion_responsable == $rPreregistros->idDireccion_responsable) ||
                                      $recibe || ($reviso && $rPreregistros->recibido_cid == 1))
                                    bandera -->
                                    <?php $visualizo = 1; ?>

                                      <div class="col-sm-12 m-b-separacion">
                                  
                                        <!--  C/registros -->
                                      
                                        <div class="row"> 
                                       
                                          <div class="col-sm-7">
                                              <div class="">  
                                                  <?php if ($rPreregistros->tipo_documento == 4): ?>
                                                    <?php
                                                    $seleccion = "Contiene Estimaciones";
                                                    $value='value="4"';
                                                    $seleccion1 = "Selecciona una opción";
                                                    $value1 = 'value="0"';
                                                    
                                                   
                                                    ?>
                                                    
                                                       
                                                    <select class="form-control" name="tipo_documento<?= $rPreregistros->id ?>" id="tipo_documento<?= $rPreregistros->id ?>" onchange="uf_recibir_tipo_documento_preregistro(<?= $rPreregistros->id ?>, <?= $rRowDocumentos->id?>)" <?= $disabled ?>>
                                                        
                                                        <option   <?php echo $value ?> id="select<?= $rPreregistros->id ?>" name="select<?= $rPreregistros->id ?>"><?php echo $seleccion ?></option>
                                                        <option id="tipo_documento<?= $rPreregistros->id ?>" name="tipo_documento<?= $rPreregistros->id ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                       
                                                    </select>

                                                  <?php  else: ?>
                                                      <?php  if ($rPreregistros->tipo_documento == 1): ?>

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
                                                      <?php  elseif ($rPreregistros->tipo_documento == 0): ?>

                                                        <?php
                                                        
                                                        $seleccion2 = "Copia";
                                                        $value2 = 'value="1"';
                                                        $seleccion1 = "Original";
                                                        $value1 ='value="2"';
                                                        $seleccion3 = "No Aplica";
                                                        $value3 = 'value="3"';
                                                        $seleccion = "Selecciona una opción";
                                                        $value = 'value="0"';
                                                      
                                                        ?>


                                                      <?php  elseif ($rPreregistros->tipo_documento == 2): ?>

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
                                                      <?php  elseif ($rPreregistros->tipo_documento == 3): ?>

                                                        <?php
                                                        
                                                        
                                                        $seleccion = "No Aplica";
                                                        $value = 'value="3"';
                                                        $seleccion1 = "Original";
                                                        $value1 ='value="2"';
                                                        $seleccion2 = "Copia";
                                                        $value2 = 'value="1"';
                                                        $seleccion3 = "Selecciona una opción";
                                                        $value3 = 'value="0"';
                                                      
                                                        ?>
                                                      <?php  endif;  ?>
                                                
                                                    
                                                       
                                                      <select class="form-control" name="tipo_documento<?= $rPreregistros->id ?>" id="tipo_documento<?= $rPreregistros->id ?>" onchange="uf_recibir_tipo_documento_preregistro(<?= $rPreregistros->id ?>, <?= $rRowDocumentos->id?>)" <?= $disabled ?>>
                                                          
                                                          <option   <?php echo $value ?>  name="tipo_documento<?= $rPreregistros->id ?>" id="tipo_documento<?= $rPreregistros->id ?>"><?php echo $seleccion ?></option>
                                                          <option id="tipo_documento<?= $rPreregistros->id ?>" name="tipo_documento<?= $rPreregistros->id ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                          <option id="tipo_documento<?= $rPreregistros->id ?>" name="tipo_documento<?= $rPreregistros->id ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                          <option id="tipo_documento<?= $rPreregistros->id ?>" name="tipo_documento<?= $rPreregistros->id ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                      </select>
                                                  <?php endif; ?> 
                                                          
                                              </div>  <!-- /Row tipodocumento -->
                                                    
                                              <div class="m-t">  <!--Row Hojas -->
                                                         
                                                  <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                  <input type="number" class="form-control" id="noHojas_doc_<?= $rPreregistros->id ?>" min="0" name="noHojas_doc_<?= $rPreregistros->id ?>" placeholder="No Hojas" value="<?= $rPreregistros->noHojas ?>" onchange="cargar_noHojas_preregistro(event,<?= $rPreregistros->id ?>)" onkeyup="cargar_noHojas_preregistro( event,<?= $rPreregistros->id ?>)" onkeypress="return validar(event)" <?= $disabled ?> >
                                                    
                                                    
                                                  <div id="oculta-noHojas-<?= $rRowDocumentos->id ?>" class="col-sm-12 d-n"></div>
                                                   
                                              </div>  <!--Row hojas -->

                                          </div>  <!--col-sm-8-->

                                          <div class="col-sm-2">
                                            <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?> ,<?= $preregistro ?>)">
                                                    <span class="glyphicon glyphicon-search"></span>
                                            </a>
                                            <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning m-t" onclick="uf_agregar_observaciones(<?php echo $rRow->id .' , ' . $rRowSubProcesos->id . ' , ' .$rRowDocumentos->idDoc . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                            <span class="glyphicon glyphicon-list"></span>
                                                        </a>

                                               
                                          </div>

                                          <div class="col-sm-3">
                                            <div class="">
                                               
                                              
                                                    
                                              <?php if($recibe ==1  && $Estatus==10): ?>
                                                <input   type="checkbox" value="" onchange="uf_recibido_cid(this, <?= $rPreregistros->id ?>, <?= $rPreregistros->id_Rel_Archivo_Documento ?>)" <?= $checked_recibido ?>> Recibido
                                              <?php else: ?>
                                                <input   type="checkbox" value="" disabled="disabled" <?= $checked_recibido ?>> Recibido
                                              <?php endif; ?>
                                            </div>

                                            <div class="" >
                                              
                                              <?php if($reviso ==1  && $Estatus==20): ?>
                                                <input  type="checkbox"  value="" onchange="uf_recibir_revisado(this,  <?= $rPreregistros->id ?> ,<?= $rRowDocumentos->id ?>)" <?= $checked_revisado ?>> Revisado
                                              <?php  else: ?>
                                                <input  type="checkbox" value="" disabled="disabled" <?= $checked_revisado ?>> Revisado

                                              <?php endif; ?>
                                            </div>
                                              
                                          </div> <!--col-sm-4-->

                                        </div> <!--/row tipo doc y num hojas -->

                                        
                                      </div> <!--col-sm-12 mb-separacion-->

                                  <?php endif; ?>
                                  <?php if ($preregistro == 1 && $idDireccion_responsable != $rPreregistros->idDireccion_responsable ):?> 
                                    <!--($preregistro == 1 && $idDireccion_responsable != $rPreregistros->idDireccion_responsable || $qPreregistros->num_rows()== 0)-->
                                    <?php $visualizo = 1; ?> 
                                        <!--  Vacia -->
                                        <div class="col-sm-12 m-b-separacion">  
                                            <div class="row"> 
                                           
                                              <div class="col-sm-7">
                                                  <div class="">  
                                                      <?php if ($rRowSubProcesos->Nombre == "XI. DE ESTIMACIONES"): ?>
                                                        <?php
                                                        $seleccion1 = "Contiene Estimaciones";
                                                        $value1='value="4"';
                                                        $seleccion = "Selecciona una opción";
                                                        $value = 'value="0"';
                                                        
                                                       
                                                        ?>
                                                        
                                                           
                                                        <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" <?= $disabled ?> >
                                                            
                                                            <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                            <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                           
                                                        </select>

                                                      <?php  else: ?>

                                                          <?php
                                                          $seleccion = "Selecciona una opción";
                                                          $value = 'value="0"';
                                                          $seleccion1 = "Original";
                                                          $value1='value="2"';
                                                          $seleccion2 = "Copia";
                                                          $value2= 'value="1"';
                                                          $seleccion3 = "No Aplica";
                                                          $value3= 'value="3"';
                                                        
                                                          ?>
                                                    
                                                        
                                                           
                                                          <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" <?= $disabled ?> >
                                                              
                                                              <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                              <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                              <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                              <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                          </select>
                                                      <?php endif; ?> 
                                                              
                                                  </div>  <!-- /Row tipodocumento -->
                                                        
                                                  <div class="m-t">  <!--Row Hojas -->
                                                             
                                                      <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                      <input type="number" class="form-control" id="noHojas_doc_<?= $rRowDocumentos->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" onchange="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)" <?= $disabled ?> >
                                                        
                                                        
                                                      <div id="oculta-noHojas-<?= $rRowDocumentos->id ?>" class="col-sm-12 d-n"></div>
                                                       
                                                  </div>  <!--Row hojas -->

                                              </div>  <!--col-sm-7-->
                                              <div class="col-sm-2">
                                                <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?>, <?= $preregistro ?>)">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                </a>
                                                <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning m-t" onclick="uf_agregar_observaciones(<?php echo $rRow->id .' , ' . $rRowSubProcesos->id . ' , ' .$rRowDocumentos->idDoc . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                                <span class="glyphicon glyphicon-list"></span>
                                                            </a>

                                                   
                                              </div>

                                              <div class="col-sm-3">
                                                <div class="">
                                                   
                                                  
                                                        
                                                  
                                                    <input   type="checkbox" value="" disabled="disabled" > Recibido
                                                  
                                                </div>

                                                <div class="" >
                                                  
                                                  
                                                    <input  type="checkbox" value="" disabled="disabled"> Revisado

                                                  
                                                </div>
                                                  
                                              </div> <!--col-sm-3-->

                                            </div> <!--/row tipo doc y num hojas -->

                                            
                                        </div> <!--col-sm-12 mb-separacion-->


                                  <?php endif; ?>
    
                              

                              <?php endforeach; ?>

                            <?php else: ?>

                              <div class="col-sm-12 m-b-separacion">  
                                  <div class="row"> 
                                 
                                    <div class="col-sm-7">
                                        <div class="">  
                                            <?php if ($rRowSubProcesos->Nombre == "XI. DE ESTIMACIONES"): ?>
                                              <?php
                                              $seleccion1 = "Contiene Estimaciones";
                                              $value1='value="4"';
                                              $seleccion = "Selecciona una opción";
                                              $value = 'value="0"';
                                              
                                             
                                              ?>
                                              
                                                 
                                              <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" <?= $disabled ?> >
                                                  
                                                  <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                  <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                 
                                              </select>

                                            <?php  else: ?>

                                                <?php
                                                $seleccion = "Selecciona una opción";
                                                $value = 'value="0"';
                                                $seleccion1 = "Original";
                                                $value1='value="2"';
                                                $seleccion2 = "Copia";
                                                $value2= 'value="1"';
                                                $seleccion3 = "No Aplica";
                                                $value3= 'value="3"';
                                              
                                                ?>
                                          
                                              
                                                 
                                                <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" <?= $disabled ?> >
                                                    
                                                    <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                    <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                    <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                    <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                </select>
                                            <?php endif; ?> 
                                                    
                                        </div>  <!-- /Row tipodocumento -->
                                              
                                        <div class="m-t">  <!--Row Hojas -->
                                                   
                                            <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                            <input type="number" class="form-control" id="noHojas_doc_<?= $rRowDocumentos->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" onchange="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)" <?= $disabled ?> >
                                              
                                              
                                            <div id="oculta-noHojas-<?= $rRowDocumentos->id ?>" class="col-sm-12 d-n"></div>
                                             
                                        </div>  <!--Row hojas -->

                                    </div>  <!--col-sm-7-->
                                    <div class="col-sm-2">
                                      <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?>, <?= $preregistro ?>)">
                                              <span class="glyphicon glyphicon-search"></span>
                                      </a>
                                      <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning m-t" onclick="uf_agregar_observaciones(<?php echo $rRow->id .' , ' . $rRowSubProcesos->id . ' , ' .$rRowDocumentos->idDoc . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                      <span class="glyphicon glyphicon-list"></span>
                                                  </a>

                                         
                                    </div>

                                    <div class="col-sm-3">
                                      <div class="">
                                         
                                        
                                              
                                        
                                          <input   type="checkbox" value="" disabled="disabled" > Recibido
                                        
                                      </div>

                                      <div class="" >
                                        
                                        
                                          <input  type="checkbox" value="" disabled="disabled"> Revisado

                                        
                                      </div>
                                        
                                    </div> <!--col-sm-3-->

                                  </div> <!--/row tipo doc y num hojas -->

                                  
                              </div> <!--col-sm-12 mb-separacion-->



                            

                            <?php endif; ?>
                          <?php else: ?>
                            <!-- Si No (($preregistro ==1 || $recibe ==1 || $reviso == 1) && $Estatus <= 30) -->
                              <?php if ($rRowDocumentos->id_preregistro > 0): ?>
                                  <?php $disabled = "disabled='disabled'"; ?>
                                  <?php $qPreregistros   = $this->ferfunc->get_reg_libre("SELECT * FROM `saaRel_Archivo_Preregistro`
                                                                  WHERE id_Rel_Archivo_Documento =" .$rRowDocumentos->id  ." AND eliminacion_logica=0"); ?>
                                  <?php $rPreregistros = $qPreregistros ->row_array(); ?> 
                            
                                  <?php $checked_recibido="" ?>
                                  <?php if ($rPreregistros['recibido_cid'] == 1):?>
                                      <?php $checked_recibido="checked='checked'" ?>
                                  <?php endif; ?>
                            
                                  <?php $checked_revisado="" ?>
                                  <?php if ($rPreregistros['revisado'] == 1):?>
                                      <?php $checked_revisado="checked='checked'" ?>
                                  <?php endif; ?>
                            
                            
                            
                            
                                  <?php $visualizo=1; ?>                                  
                                    <div class="col-sm-12 m-b-separacion">
                                  
                                        <!--  C/registros -->
                                      
                                        <div class="row"> 
                                       
                                          <div class="col-sm-8">
                                              <div class="">  
                                                  <?php if ($rRowSubProcesos->Nombre == "XI. DE ESTIMACIONES"): ?>
                                                    <?php
                                                    $seleccion1 = "Contiene Estimaciones";
                                                    $value1='value="4"';
                                                    $seleccion = "Selecciona una opción";
                                                    $value = 'value="0"';
                                                    
                                                   
                                                    ?>
                                                    
                                                       
                                                    <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" <?= $disabled ?>>
                                                        
                                                        <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                        <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                       
                                                    </select>

                                                  <?php  else: ?>
                                                      <?php  if ($rPreregistros['tipo_documento'] == 1): ?>

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

                                                      <?php  elseif ($rPreregistros['tipo_documento'] == 2): ?>

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
                                                      <?php  elseif ($rPreregistros['tipo_documento'] == 3): ?>

                                                        <?php
                                                        
                                                        
                                                        $seleccion = "No Aplica";
                                                        $value = 'value="3"';
                                                        $seleccion1 = "Original";
                                                        $value1 ='value="2"';
                                                        $seleccion2 = "Copia";
                                                        $value2 = 'value="1"';
                                                        $seleccion3 = "Selecciona una opción";
                                                        $value3 = 'value="0"';
                                                      
                                                        ?>
                                                      <?php  endif;  ?>
                                                
                                                    
                                                       
                                                      <select class="form-control" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" id="tipo_documento<?php echo $rRowDocumentos->id; ?>" onchange="uf_recibir_tipo_documento(<?= $rRowDocumentos->id; ?>,<?= $idArchivo ?>,<?= $preregistro ?>)" <?= $disabled ?>>
                                                          
                                                          <option   <?php echo $value ?> id="select<?php echo $rRowDocumentos->id; ?>" name="select<?php echo $rRowDocumentos->id; ?>"><?php echo $seleccion ?></option>
                                                          <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value1 ?> > <?php echo $seleccion1 ?> </option>
                                                          <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value2 ?> > <?php echo $seleccion2 ?> </option>
                                                          <option id="tipo_documento<?php echo $rRowDocumentos->id; ?>" name="tipo_documento<?php echo $rRowDocumentos->id; ?>" <?php echo $value3 ?> > <?php echo $seleccion3 ?> </option>
                                                      </select>
                                                  <?php endif; ?> 
                                                          
                                              </div>  <!-- /Row tipodocumento -->
                                                    
                                              <div class="m-t">  <!--Row Hojas -->
                                                         
                                                  <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                                  <input type="number" class="form-control" id="noHojas_doc_<?= $rRowDocumentos->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="<?= $rPreregistros['noHojas'] ?>" <?= $disabled ?> onchange="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)" <?= $disabled ?> >
                                                    
                                                    
                                                  <div id="oculta-noHojas-<?= $rRowDocumentos->id ?>" class="col-sm-12 d-n"></div>
                                                   
                                              </div>  <!--Row hojas -->

                                          </div>  <!--col-sm-8-->

                                          <div class="col-sm-4">
                                            <div class="">
                                               
                                              
                                                    
                                              <?php if($recibe ==1  && $Estatus==10): ?>
                                                <input   type="checkbox" value="" onchange="uf_recibido_cid(this, <?= $rPreregistros['id']  ?>, <?= $rPreregistros['id_Rel_Archivo_Documento'] ?>)" <?= $checked_recibido ?>> Recibido
                                              <?php else: ?>
                                                <input   type="checkbox" value="" disabled="disabled" <?= $checked_recibido ?>> Recibido
                                              <?php endif; ?>
                                            </div>

                                            <div class="" >
                                              
                                              <?php if($reviso ==1  && $Estatus==20): ?>
                                                <input  type="checkbox"  value="" onchange="uf_recibir_revisado(this,  <?= $rPreregistros['id'] ?> ,<?= $rRowDocumentos->id ?>)" <?= $checked_revisado ?>> Revisado
                                              <?php  else: ?>
                                                <input  type="checkbox" value="" disabled="disabled" <?= $checked_revisado ?>> Revisado

                                              <?php endif; ?>
                                            </div>
                                              
                                          </div> <!--col-sm-4-->

                                        </div> <!--/row tipo doc y num hojas -->

                                        <div class="col-sm-12">
                                          <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default m-t" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?>, <?= $preregistro ?>)">
                                                  <span class="glyphicon glyphicon-search"></span>
                                          </a>
                                          <a href="#" id="btn-agregar-obs"  data-toggle="modal" title="Agregar observaciones" data-target="#observacion_bloque" role="button" class="btn btn-warning m-t" onclick="uf_agregar_observaciones(<?php echo $rRow->id .' , ' . $rRowSubProcesos->id . ' , ' .$rRowDocumentos->idDoc . ' , ' .$idDireccion_responsable . ' , ' .$idusuario; ?>)">
                                                          <span class="glyphicon glyphicon-list"></span>
                                                      </a>

                                             
                                        </div>
                                  </div> <!--col-sm-12 mb-separacion-->
                            <?php endif; ?>
                          <?php endif; ?> 
                                   
                                  

                         
                  


                        <!-- ----------------------------------------------------------------------------------------- -->
                    
                      
                         
                       
                                        
                              
                       </div> <!-- col-sm-3 -->

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
                              <p> <?php echo $addw_direciones[$rRowDocumentos->idDireccion_responsable];  ?></p>
                          </div>
                           
                          
                          
                          <div id="panel-element-documentos-<?php echo $rRowDocumentos->id;  ?>" class="panel-collapse collapse <?php echo $strin_documento;  ?>">
                              <div class="panel-body" id="panel-body-documentos">
                                  <div class="row">
                                      <!-- Panel de Control--> <!-- Documento <?= $rRowDocumentos->id; ?>-->
                                      <div class="col-sm-12">
                                          <section id="<?php echo "section_".$rRowDocumentos->id; ?>" class="row">
                                              
                                              <?php if ($Editar==1 || $recibe ==1 || $reviso==1){ ?> 
                                              <div class="row">
                                                  <div class="col-sm-12 m-b">
                                                      <div class="col-xs-12 col-sm-12" style="text-align: end">
                                                                  <div class="btn-documentos">
                                                                        <a id="btn-eliminar-doc"   class="btn btn-danger del_documento" href="<?php echo site_url('archivo/eliminar_relacion_archivo_documento/' . $rRowDocumentos->id . '/' . $idArchivo); ?>" title="Eliminar Documento" onclick="return confirm('¿Confirma eliminar el documento y sus anexos?');" target="_self"><span class="glyphicon glyphicon-remove" ></span> Eliminar Documento</a>
                                                                  </div>
                                                      </div>
                                                  </div>
                                                  <?php if ($Editar==1){ ?>
                                                  <div class="col-sm-12  m-b-separacion">
                                                              <div class="col-xs-12 col-sm-6">
                                                                  <button class="btn btn-success dropdown-toggle" onclick="nuevo_doc_anexo(<?= $idArchivo; ?>, <?= $rRowDocumentos->id; ?>,<?= $rRow->id; ?>,<?= $rRowSubProcesos->id;?>, <?= $rRowDocumentos->idDoc; ?>)" type="button" >
                                                                      <span class="glyphicon glyphicon-plus" title="Nuevo Anexo" ></span> Digitalizar Documento
                                                                  </button>&nbsp; 
                                                              </div>



                                                  </div>
                                                   <?php } ?> 
                                              </div>  
                                                      
                                                    
                                               <?php } ?> 
                                              
                                              
                                          <?php
                                          
                                          //$qEjercicio = $this->ferfunc->get_subreg("Ejercicios",array("id" =>$aArchivo['idEjercicio']));
                                          //$aEjercicio=$qEjercicio->row_array();
                                              
                                          if($preregistro != 1)    {
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
                                               <div class="panel-group col-sm-12" id="panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
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
                                                                                           <th class="col-sm-6">
                                                                                               Accion
                                                                                           </th>
                                                                                            <th class="col-sm-3">
                                                                                               Nombre de Archivo
                                                                                           </th>



                                                                                           <th class="col-sm-3">

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



                                                                                   <td>

                                                                                        <?php if ($rRow_anexos->idSubDocumento>0){ ?>
                                                                                                <?php 

                                                                                                $qSubDocumento = $this->ferfunc->get_subreg_distinct('saaSubDocumentos', "id =" . $rRow_anexos->idSubDocumento, " id,Nombre" );

                                                                                                if ($qSubDocumento->num_rows()>0){
                                                                                                    $aSubDocumento=$qSubDocumento->row_array();
                                                                                                    echo $aSubDocumento['Nombre']; 

                                                                                                }

                                                                                                ?>
                                                                                       <?php } ?>
                                                                                   </td>




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