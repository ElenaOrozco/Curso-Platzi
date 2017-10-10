<div id="container-documento" class="col-xs-12">
 
    <div id="row-documento" class="row  flex-center">
        
        
        <div id="row-title" class="col-md-5">
            
            <h5> <?php echo $rRow->Nombre;  ?>
                <br><small><?php if($rRow->responsable_documento != 0){ echo "RESPONSABLE " .$addw_direciones[$rRow->responsable_documento];}else{ echo "RESPONSABLE EJECUTORA " . $aArchivo['Direccion']; } ?> </small>
                <br><small> ENTREGÓ: <?= $addw_catDireccion[$rRow->direccion_preregistra] ?> </small>
            </h5>
            
            
            <?php /*
            <div class="panel panel-warning">




                <div class="panel-heading"> 
                     <a class="panel-title" data-toggle="collapse" data-parent="#panel-documentos-<?php echo $rRow->idDocumento;  ?>" href="#panel-element-documentos-<?php echo $rRow->idDocumento;  ?>">
                          <?php echo $rRow->Nombre;  ?>

                      </a> 
                    <div> <small> <?php echo "RESPONSABLE: ". $addw_direciones[$rRow->responsable_documento];  ?> </small></div>
                    <?php if($preregistro == 0): ?>
        
    
                        <div> <small> <?php echo "PREREGISTRÓ: ". $addw_direciones[$rRow->direccion_preregistra];  ?> </small> </div>
                    <?php endif; ?>
                    
                </div>



                <div id="panel-element-documentos-<?php echo $rRow->idDocumento;  ?>" class="panel-collapse collapse">
                    <?php if($preregistro != 1)    {
                                              $tabla="saaDocumentosAnexos_".$aArchivo['idEjercicio'];
                                              
                                              $qEstimaciones = $this->ferfunc->get_subreg_distinct($tabla, "idRel_Archivo_Documento =" . $rDocumentos->id, " Numero_Estimacion, Es_Estimacion, Es_Prorroga " );

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
                                               <div class="panel-group col-md-12" id="panel-estimacion-<?php echo $rRowEstimaciones->Numero_Estimacion;  ?>">
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
                                                                                           <th class="col-md-6">
                                                                                               Accion
                                                                                           </th>
                                                                                            <th class="col-md-3">
                                                                                               Nombre de Archivo
                                                                                           </th>



                                                                                           <th class="col-md-3">

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
                                          <?php
                                                  //  }
                                          
                                              
                                         
                                                      }
                                                  }
                                              }
                                          }
                                          ?>
                </div>
            </div>
            /*/
            
            ?>


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
                <span class="glyphicon glyphicon-list"></span>
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
