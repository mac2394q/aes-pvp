<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."usuario.php");
  require_once(PDO_PATH."plantillaDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(PDO_PATH."empresaDao.php");
  
class plantillaController
{
	public static function editarPlantilla($idplantilla,$nombre,$area){
		return plantillaDao::editarPlantillaPrincipal($idplantilla,$nombre,$area);
	}

	public static function ngruposPlantillas($idplantilla){
		return plantillaDao::ngruposPlantillas($idplantilla);
	}

	public static function ultimaPlantilla(){
		return plantillaDao::ultimaPlantilla();
	}
	public static function plantillaId($id){
		return plantillaDao::plantillaId($id);
	}

	public static function grupoId($id){
		return plantillaDao::grupoId($id);
	}

	public static function itemId($id){
		return plantillaDao::itemId($id);
	}

	public static function ultimoItemRegistrado(){
		return plantillaDao::ultimoItemRegistrado();
	}

	public static function retornarVista($url){
		
		echo  "<script>window.location.replace('".$url."');</script> ";
		 
	}


  public static function registrarPlantilla($modelPlantilla){
	  return plantillaDao::registrarPlantilla($modelPlantilla);
  }
  public static function registrarPlantillaGrupo($modelPlantillaGrupo){
	return plantillaDao::registrarPlantillaGrupo($modelPlantillaGrupo);
  }
  public static function registrarPlantillaItem($modelPlantilla){
	return plantillaDao::registrarPlantillaItem($modelPlantilla);
  }

  public static function editarPlantillaItem($modelPlantilla){
	return plantillaDao::editarPlantillaItem($modelPlantilla);
  }

  public static function editarPlantillaGrupo($modelPlantilla){
	return plantillaDao::editarPlantillaGrupo($modelPlantilla);
  }

  public static function nItem($id){
	return plantillaDao::nItem($id);
  }

  
  public static function listadoPlantillaAso($idempresa){
	$objtEmpresa = empresaDao::empresaIdCom($idempresa);
	//echo $objtEmpresa->getIdarea_tecnica_empresa();
	//print_r($objtEmpresa );
	$objPlantillaNew = plantillaDao::plantillaIdCom($objtEmpresa->getIdarea_tecnica_empresa() );
    //print_r($objPlantillaNew);
	$objplantilla = plantillaDao::listadoPlantilla();
	if($objPlantillaNew != false){
	  
		echo "  <label for=''><h5 class='card-title'><li class='fa fa-list-ul'></li> <span class='text-danger'>*</span> Plantilla:</h5></label>
				<select id='plantilla' name='plantilla' class='form-control'>
				<option value='".$objPlantillaNew->getIdplantilla_maestra()."'>
			PLANTILLA AES ->    ".$objPlantillaNew->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objPlantillaNew->getPais_plantilla()."     AREA TECNICA  ->  ".$objPlantillaNew->getIdarea_tecnica_plantilla()." </option>";                
		foreach ($objplantilla as $key => $value) {     
			echo    "<option value='".$objplantilla[$key]->getIdplantilla_maestra()."'>
			PLANTILLA AES ->    ".$objplantilla[$key]->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objplantilla[$key]->getPais_plantilla()."     AREA TECNICA  ->  ".$objplantilla[$key]->getIdarea_tecnica_plantilla()." </option>";
			
		}
		
		echo     "</select>";
	}else{
		

		echo "  <label for=''><h5 class='card-title'><li class='fa fa-list-ul'></li> <span class='text-danger'>*</span> Plantilla:</h5></label>
				<select id='plantilla' name='plantilla' class='form-control'>
				    <option value='null'>SIN PLANTILLA</option>'>";                
		foreach ($objplantilla as $key => $value) {     
			echo    "<option value='".$objplantilla[$key]->getIdplantilla_maestra()."'>
			PLANTILLA AES ->    ".$objplantilla[$key]->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objplantilla[$key]->getPais_plantilla()."     AREA TECNICA  ->  ".$objplantilla[$key]->getIdarea_tecnica_plantilla()." </option>";
			
		}
	}
}    
  public static function listadoPlantilla(){
	$objplantilla = plantillaDao::listadoPlantilla();
	if($objplantilla != false){
	  
		echo "  <label for=''><h5 class='card-title'><li class='fa fa-list-ul'></li> <span class='text-danger'>*</span> Plantilla:</h5></label>
				<select id='plantilla' name='plantilla' class='form-control'>
				";                
		foreach ($objplantilla as $key => $value) {     
			echo    "<option value='".$objplantilla[$key]->getIdplantilla_maestra()."'>
			->  ".$objplantilla[$key]->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objplantilla[$key]->getPais_plantilla()."     AREA TECNICA  ->  ".$objplantilla[$key]->getIdarea_tecnica_plantilla()." </option>";
			
		}
		
		echo     "</select>";
	}else{
		echo "  <label for=''>Plantillas PVP:</label>
				<select id='plantilla' name='plantilla' class='form-control'>
					<option value='null'>SIN PLANTILLA</option>
				</select>";
	}
}    
	public static function listadoGrupoPlantilla($id){
		$objplantilla = plantillaDao::listadoGrupoPlantilla($id);
		//print_r($objplantilla);
		if($objplantilla != false){
		  
			echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Grupo:</h5></label>
					<select id='plantilla' name='plantilla' class='form-control'>
					";                
			foreach ($objplantilla as $key => $value) {     
				echo    "<option value='".$objplantilla[$key]->getIdgrupo_plantilla()."'>
				".$objplantilla[$key]->getEtiqueta_grupo_plantilla()." - ".$objplantilla[$key]->getTitulo_conjunto()." </option>";
				
			}
			
			echo     "</select>";
		}else{
			echo "  <label for=''>Plantillas PVP:</label>
					<select id='plantilla' name='plantilla' class='form-control'>
						<option value='null'>SIN PLANTILLA</option>
					</select>";
		}
	}
	public static function cargarPlantillaUI($idplantilla){
		$GrupoPlantilla = plantillaDao::listadoGrupoPlantilla($idplantilla);
		//print_r($GrupoPlantilla);
		$c=0;
		foreach ($GrupoPlantilla  as $key => $value) {
	
			// echo "<form class='form row'>
			//     <div class='form-group mb-1 col-sm-12 col-md-4'>
			//         <label for='projectinput3'><span </span> Consecutivo</label>
			//         <input type='text' id='projectinput3'
			//                 class='form-control' placeholder='. . . '
			//                 name='consecutivo' value='".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."'>
			//     </div>
			//     <div class='form-group mb-1 col-sm-12 col-md-8'>
			//         <label for='projectinput3'><span
			//                     class='text-danger'>*</span>
			//                 </span> Etiqueta de grupo</label>
			//         <input type='text' id='projectinput3'
			//                 class='form-control' placeholder='. . . '
			//                 name='etiquetaPlantilla' value='".$GrupoPlantilla[$key]->getTitulo_conjunto()."'>
			//     </div>
			//     <br>
				
				
				
			// </form>";
			//$objsItem = plantillaDao::listadoGrupoPlantillaItem($GrupoPlantilla[$key]->getIdgrupo_plantilla());
			
			echo "<div class='card collapse-icon accordion-icon-rotate'>
			<div id='headingCollapse11' class='card-header'>
				<a data-toggle='collapse' href='#collapse11".$c."' aria-expanded='false' aria-controls='collapse11' class='card-title lead collapsed'><li class='fa fa-caret-square-down'></li>&nbsp;".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()." - ".$GrupoPlantilla[$key]->getTitulo_conjunto()."</a>
			</div>
			<div id='collapse11".$c."' role='tabpanel' aria-labelledby='headingCollapse11' class='collapse' style=''>
				<div class='card-content'>
					<div class='card-body'>
						
						<ul class='nav nav-pills'>
							<li class='nav-item'>
								<a class='nav-link active waves-effect waves-dark' id='base-pill00' data-toggle='pill' href='#pill00' aria-expanded='true'>Grupo</a>
							</li>";
							$objsItem = plantillaDao::listadoGrupoPlantillaItem($GrupoPlantilla[$key]->getIdgrupo_plantilla());
							 $c1=0;
							 $cod =$GrupoPlantilla[$key]->getIdgrupo_plantilla();
							 //print_r($objsItem);
							foreach ($objsItem as $keys => $values) {
							 
							   
							  echo "<li class='nav-item '>
										<a class='nav-link  waves-effect waves-dark' id='base-pill".$c1.$cod."' data-toggle='pill' href='#pill".$c1.$cod."' aria-expanded='true'>".$objsItem[$keys]->getEtiqueta_item_grupo_plantilla()."</a>
									</li>";
								$c1=intval($c1)+1;      
							}
							
							
				  echo "</ul>
						<div class='tab-content px-1 pt-1'>
							<div role='tabpanel' class='tab-pane active' id='pill00' aria-expanded='true' aria-labelledby='base-pill00'>
								<form class='form row'>
									<div class='form-group mb-1 col-sm-12 col-md-4'>
										<label for='projectinput3'>Consecutivo</label>
										<input type='text' id='projectinput3'
												class='form-control' placeholder='. . . '
												name='consecutivo' value='".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."'>
									</div>
									<div class='form-group mb-1 col-sm-12 col-md-8'>
										<label for='projectinput3'>
												</span> Etiqueta de grupo</label>
										<input type='text' id='projectinput3'
												class='form-control' placeholder='. . . '
												name='etiquetaPlantilla' value='".$GrupoPlantilla[$key]->getTitulo_conjunto()."'>
									</div>
									<br>
								</form>
							</div>";
							$c2=0;
							$objsItem2 = plantillaDao::listadoGrupoPlantillaItem($GrupoPlantilla[$key]->getIdgrupo_plantilla());
							foreach ($objsItem2 as $keys2 => $values2) {
								echo "<div role='tabpanel' class='tab-pane ' id='pill".$c2.$cod."' aria-expanded='true' aria-labelledby='base-pill".$c2.$cod."'>
										<textarea id='projectinput9' rows='5' class='form-control' >".$objsItem2[$keys2]->getDescripcion_item_grupo_plantilla()."</textarea>
									   </div>";
								$c2=intval($c2)+1;       
							  }
  
						echo "	
						</div>
					
					</div>
				</div>
			</div>
			
		</div>";
		$c=intval($c)+1;
		}  
	}
  public static function listadoPlantillas(){
	$objEmpresa=plantillaDao::listadoPlantilla();
	//print_r($objEmpresa);
	if($objEmpresa!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-copy'></li>  Clonar
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-city'></li>  Área Técnica

						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tags'></li>Nombre  PLantilla
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li> País 
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-toggle-on'></li> Estado
						</th>
						
					</tr>
				</thead>
				<tbody>
					<tr class='group'>
					  <td colspan='8'>
						<h6 class='mb-0'>Ultima actualizacion del listado: 
							  <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
							  <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
						 </h6>
					  </td>
					</tr>";
					foreach ($objEmpresa as $key => $value) {           
					echo"
					<tr role='row' class='even'>
					<td class='reorder sorting_1'><a href='verFicha.php?id=".$objEmpresa[$key]->getIdplantilla_maestra()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
						<td class='reorder sorting_1'><a href='clonar.php?id=".$objEmpresa[$key]->getIdplantilla_maestra()."' class='dropdown-item'><i class='fa fa-copy fa-2x'></i> </a></td>
						<td class='reorder sorting_1'>
						".$objEmpresa[$key]->getIdarea_tecnica_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$objEmpresa[$key]->getEtiqueta_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$objEmpresa[$key]->getPais_plantilla()."
						</td>
						<td class='reorder sorting_1'>
							<span class='badge badge-default badge-success'>ACTIVO</span>
						</td>
					
					</tr>";
				  }
					// <tr role='row' class='even'>
					//     <td class='reorder sorting_1'>
					//     DEPOSITOS ADUANEROS
					//   </td>
					//   <td class='reorder sorting_1'>
					//     Plantilla test abc 1123
					//   </td>
					//   <td class='reorder sorting_1'>
					//     Colombia
					//   </td>
					  
					//   <td class='reorder sorting_1'>
					//     <span class='badge badge-default badge-primary'>ACTIVO</span>
					//   </td>
					//     <td class='reorder sorting_1'><a href='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
					// </tr>
					// <tr role='row' class='even'>
					//     <td class='reorder sorting_1'>
					//     TRANSPORTE DE CARGA
					//   </td>
					//   <td class='reorder sorting_1'>
					//     test plantilla iso 998045
					//   </td>
					//   <td class='reorder sorting_1'>
					//     Colombia
					//   </td>
					  
					//   <td class='reorder sorting_1'>
					//     <span class='badge badge-default badge-danger'>INACTIVO</span>
					//   </td>
					//     <td class='reorder sorting_1'><a href='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
					// </tr>
					
					// ";
					
					
					echo"
				</tbody>
			</table>";
	}else{
	
  echo "
		<div class='bs-callout-pink callout-square callout-transparent mt-1'>
			<div class='media align-items-stretch'>
				<div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
					<i class='fa fa-exclamation-triangle text-white'></i>
				</div>
				<div class='media-body p-1'>
					<strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay empresas registradas con la consulta anterior</p>
				</div>
			</div>
		</div>
		";
	}
}

public static function listadoPlantillasInforme($idplantillaMaestra,$idauditoria){
	$GrupoPlantilla = plantillaDao::listadoGrupoPlantilla($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	if($GrupoPlantilla!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  #
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Capitulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-check'></li> Cumplen
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-minus'></li> N cumplen
						</th>
						
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Total
						</th>
						

					</tr>
				</thead>
				<tbody>
				";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getTitulo_conjunto()."
						</td>
						<td class='reorder sorting_1'>".auditoriaDao::capitulosElegidosEstado($GrupoPlantilla[$key]->getIdgrupo_plantilla(),$idauditoria,2)."</td>
						<td class='reorder sorting_1'>".auditoriaDao::capitulosElegidosEstado($GrupoPlantilla[$key]->getIdgrupo_plantilla(),$idauditoria,3)."</td>
						
						<td class='reorder sorting_1'>
						".auditoriaDao::numeroCapitulosElegidos($GrupoPlantilla[$key]->getIdgrupo_plantilla(),$idauditoria)."
						</td>
						
						
					</tr>";
				  }
					echo"
				</tbody>
			</table>";

		}else{
	
			echo "
				  <div class='bs-callout-pink callout-square callout-transparent mt-1'>
					  <div class='media align-items-stretch'>
						  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
							  <i class='fa fa-exclamation-triangle text-white'></i>
						  </div>
						  <div class='media-body p-1'>
							  <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay capitulos agregados a la plantilla</p>
						  </div>
					  </div>
				  </div>
				  ";
			  }
	
}

public static function listadoPlantillasGrupo($idplantillaMaestra){
	$GrupoPlantilla = plantillaDao::listadoGrupoPlantilla($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	if($GrupoPlantilla!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-edit'></li> Editar Capitulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  Consecutivo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Capitulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Rubricas
						</th>
						
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Ver Rubricas
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Eliminar Capitulo
						</th>

					</tr>
				</thead>
				<tbody>
					";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>
					<td class='reorder sorting_1'><a href='verGrupo.php?id=".$GrupoPlantilla[$key]->getIdgrupo_plantilla()."' class='dropdown-item'><i class='fa fa-edit fa-2x'></i> </a></td>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getTitulo_conjunto()."
						</td><td class='reorder sorting_1'>
						".plantillaController::nItem($GrupoPlantilla[$key]->getIdgrupo_plantilla())."
						</td>
						
						<td class='reorder sorting_1'><a href='verCapitulos.php?id=".$GrupoPlantilla[$key]->getIdgrupo_plantilla()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
						<td class='reorder sorting_1'><a href='core/eliminarGrupo.php?id=".$GrupoPlantilla[$key]->getIdgrupo_plantilla()."&idplantilla=".$GrupoPlantilla[$key]->getIdplantilla_maestra_grupo()."' class='dropdown-item'><i class='fa fa-trash-alt fa-2x'></i> </a></td>
					</tr>";
				  }
					echo"
				</tbody>
			</table>";

		}else{
	
			echo "
				  <div class='bs-callout-pink callout-square callout-transparent mt-1'>
					  <div class='media align-items-stretch'>
						  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
							  <i class='fa fa-exclamation-triangle text-white'></i>
						  </div>
						  <div class='media-body p-1'>
							  <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay capitulos agregados a la plantilla</p>
						  </div>
					  </div>
				  </div>
				  ";
			  }
	
}


public static function listadoPlantillasGrupo2($idplantillaMaestra,$idauditoria){
	$GrupoPlantilla = plantillaDao::listadoGrupoPlantilla($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	if($GrupoPlantilla!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li> CAPITULO / ASPECTO EVALUADO
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-edit'></li> CONCLUSIONES / COMENTARIOS DE LA AUDITORIA
						</th>
						

					</tr>
				</thead>
				<tbody>";
				    $con = 1;
					foreach ($GrupoPlantilla as $key => $value) {
                    $obj= plantillaDao::idverificacion($GrupoPlantilla[$key]->getIdgrupo_plantilla(),$idauditoria);
					echo"
					<tr role='row' class='even'>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla().". ".$GrupoPlantilla[$key]->getTitulo_conjunto()."
						</td>
						<td class='reorder sorting_1'>
						<textarea class='form-control' rows='8' cols='110' id='".$con."' name='".$GrupoPlantilla[$key]->getIdgrupo_plantilla()."' >".$obj."</textarea>
						
						
					</tr>";
					$con++;
				  }
					echo"
				</tbody>
			</table>";

		}else{
	
			echo "
				  <div class='bs-callout-pink callout-square callout-transparent mt-1'>
					  <div class='media align-items-stretch'>
						  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
							  <i class='fa fa-exclamation-triangle text-white'></i>
						  </div>
						  <div class='media-body p-1'>
							  <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay capitulos agregados a la plantilla</p>
						  </div>
					  </div>
				  </div>
				  ";
			  }
	
}

public static function listadoGrupoPlantillaItem($idplantillaMaestra){
	$GrupoPlantilla = plantillaDao::listadoGrupoPlantillaItem2($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-edit'></li> Editar
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  Titulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  Descripcion
						</th>
						
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Eliminar
						</th>

					</tr>
				</thead>
				<tbody>
					<tr class='group'>
					  <td colspan='8'>
						<h6 class='mb-0'>Ultima actualizacion del listado: 
							  <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
							  <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
						 </h6>
					  </td>
					</tr>";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>
					<td class='reorder sorting_1'><a href='verRubrica.php?id=".$GrupoPlantilla[$key]->getIditem_grupo_plantilla()."' class='dropdown-item'><i class='fa fa-edit fa-2x'></i> </a></td>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_item_grupo_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						<textarea  rows='20' cols='110'>".$GrupoPlantilla[$key]->getDescripcion_item_grupo_plantilla()."</textarea>
						</td>
						
						<td class='reorder sorting_1'><a href='core/eliminarRubrica.php?id=".$GrupoPlantilla[$key]->getIditem_grupo_plantilla()."&idgrupo=".$GrupoPlantilla[$key]->getIdgrupo_plantilla_item()."' class='dropdown-item'><i class='fa fa-trash-alt fa-2x'></i> </a></td>
					</tr>";
				  }
					echo"
				</tbody>
			</table>";
	
}
	
	
}
?>
