


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            <?php if (isset($title)) echo $title; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<style>
			
		</style>
    </head>

<body>

<div class="page-content">
		<div class="container-fluid">
			

			<section class="box-typical box-typical-max-280 scrollable">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>Bootstrap Table Examples</h3>
						</div>
					</div>
				</header>
				<div class="box-typical-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
								<tr>
									
									<td class="w-30"> 
										<div class="font-11 color-blue-grey-lighter uppercase">
										2.1 DICTÁMENES, PERMISOS, LICENCIAS, DERECHOS DE BANCOS DE MATERIALES, DERECHOS DE PROPIEDAD, DE VÍA Y EXPROPIACIÓN DE INMUEBLES O DERECHOS DE DISPOSICIÓN LEGAL, OBTENIDOS POR LA ENTIDAD  
									</div>                                                    
									</td>
									<td nowrap="nowrap w-15">
										<div class="progress-steps-block">
											<select class="form-control" >
                                                    
                                                    <option >seleccion</option>
                                                    <option >seleccion 1</option>
                                                    <option >seleccion 2</option>
                                                    
                                                </select>
										</div>
									</td>
									<td class="w-15">
										<div class="m-t">  <!--Row Hojas -->
                                                <!-- $rRowDocumentos->id  ==  id Rel_Archivo_Documento -->
                                                
                                               <label class="sr-only" for="exampleInputEmail3">No. Hojas</label>
                                               <input type="number" class="form-control" id="noHojas_doc_<?= $rRowDocumentos->id ?>" min="0" name="noHojas_doc" placeholder="No Hojas" value="" onchange="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeyup="cargar_noHojas(event,<?= $rRowDocumentos->id ?>, <?= $idArchivo ?>)" onkeypress="return validar(event)"  >
                                                
                                                
                                                <div id="oculta-noHojas-<?= $rRowDocumentos->id ?>" class="col-sm-12 d-n"></div>
                                           
                                      </div>  <!--Row hojas -->
									</td>
									<td class="w-15">
										<a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-xs" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?>)">
                                          <span class="glyphicon glyphicon-search"></span>
		                                  </a>
		                                  <a href="#observaciones_bloque" id="btn-ver-obs"  data-toggle="modal" title="Ver Observaciones" class="btn btn-default btn-xs" data-target="#observaciones_bloque" title="Observaciones" role="button" onclick="ver_observaciones_documento(<?php echo $idArchivo; ?>,<?php echo $rRow->id; ?>,<?php echo $rRowSubProcesos->id ?>,<?php echo $rRowDocumentos->idDoc ?>)">
		                                          <span class="glyphicon glyphicon-search"></span>
		                                  </a>
									</td>
									<td>
										
									</td>
								</tr>
								<td class="w-20">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-2-1"/>
											<label for="tbl-check-2-1"></label>
										</div>
									</td>
									<td><a href="#">State</a></td>
								
								
							</tbody>
						</table>
					</div>
				</div><!--.box-typical-body-->
			</section><!--.box-typical-->
		</div>
</div>

</body>
</html>
