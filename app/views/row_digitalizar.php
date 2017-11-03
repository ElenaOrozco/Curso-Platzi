<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $tabla="saaDocumentosAnexos_".$aArchivo['idEjercicio'];
                                              
    $qEstimaciones = $this->ferfunc->get_subreg_distinct($tabla, "idRel_Archivo_Documento =" . $rRow->idRAD, " Numero_Estimacion, Es_Estimacion, Es_Prorroga " );

        if (isset($qEstimaciones)) {
            if ($qEstimaciones->num_rows() > 0) {
                foreach ($qEstimaciones->result() as $rRowEstimaciones) {

                    $strEstimacion_in="  ";
                    if ($rRowEstimaciones->Numero_Estimacion==$Numero_Estimacion){
                        $strEstimacion_in=" in ";
                    }
?>        
    <div class="box-digitalizar d-n">
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
                                    $qDocumentosAnexos = $this->ferfunc->get_subreg($tabla,array("idRel_Archivo_Documento" => $rRow->idRAD,"Numero_Estimacion"=>$rRowEstimaciones->Numero_Estimacion));

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
    </div>
</div>
<?php
        //  }



            }
        }
    }

    ?>    
