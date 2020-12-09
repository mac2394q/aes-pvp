<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."area.php");
  require_once(MODEL_PATH."auditoria.php");
  require_once(MODEL_PATH."certificado.php");
  require_once(PDO_PATH."empresaDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(PDO_PATH."plantillaDao.php");
  require_once(PDO_PATH."usuarioDao.php"); 
  
class auditoriasControllers
{
	public static function registrarEmpresa($modelEmpresa){
		return empresaDao::crearEmpresa($modelEmpresa);
	}
	public static function ultimaEmpresaRegistrada(){
		return empresaDao::ultimaEmpresaRegistrada();
	}

	public static function verificarNit($nit){
		return empresaDao::verificarNit($nit);
	}
	
	public static function registrarCertificado($modelCertificado){
		return empresaDao::crearCertificado($modelCertificado);
	}

	public static function eliminarCertificado($idCertificado){
		return empresaDao::borrarCertificado($idCertificado);
	}

	public static function modificarEmpresa($modelEmpresa){
		return empresaDao::modificarEmpresa($modelEmpresa);
	}

	public static function objAuditoria($idempresa){
		return empresaDao::empresaId($idempresa);
	}

	public static function auditoriaID($id){
		return auditoriaDao::auditoriaId($id);
	}
	
	
	public static function habilitarEmpresa($idEmpresa){
		return empresaDao::habilitarEmpresa($idEmpresa);
	}
	public static function inhabilitarEmpresa($idEmpresa){
		return empresaDao::inhabilitarEmpresa($idEmpresa);
	}


	public static function badgeComponentAuditoria($estado){
		switch ($estado) {
							
								
			case 'PRO01':
			echo " <div class='badge badge-pill  badge-secondary'>PROGRAMADA</div>";
		   
			break;
	  
			case 'PRO010':
			echo " <div class='badge badge-pill  badge-danger'>PROGRAMADA VENCIDA</div>";
		   
			break;

			case 'PRO02':
			echo " <div class='badge badge-pill  badge-info'>EN PROGRESO </div>";
		   
			break;

			case 'PRO11':
			echo " <div class='badge badge-pill  badge-success'>AUDITADA</div>";
		   
			break;

			case 'PRO12':
			echo " <div class='badge badge-pill  badge-warning'>AUDITADA - PENDIENTE PLAN ACCION</div>";
		   
			break;

			case 'PRO121':
			echo " <div class='badge badge-pill  badge-info'>REVISION</div>";
		   
			break;

			case 'PRO13':
			echo " <div class='badge badge-pill  badge-success'>AUDITADA-APROBADA</div>";
			
			break;

			case 'PRO14':
			echo " <div class='badge badge-pill  badge-success'>CERTIFICADA</div>";
			
			break;
		}

	}

	public static function auditoriasSinAprobar(){
		$objAuditoria=auditoriaDao::auditoriasSinAprobar();
	}


	public static function listadoCompuestoAuditoriaEmpresa($filtro,$tipo,$estado,$consulta,$idempresa,$idempresa2){
		$objAuditoria=auditoriaDao::listadoCompuestoAuditorias($filtro,$tipo,$estado,$consulta,$idempresa,$idempresa2);
		
		//($objAuditoria);
		if($objAuditoria!= false){
		echo   "<table  class='table table-bordered table-responsive-lg'
						>
					<thead>
						<tr role='row'>
						<th  ><li class='fa fa-cog'></li>  Acciones
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Estado
							</th>
							<th  ><li class='fa fa-barcode'></li> Empresa Ancla</th>
							<th  ><li class='fa fa-money-check'></li>  Sede - Empresa Asociada de Negocio
							</th>
							<th  ><li class='fa fa-globe'></li>  Fecha de Programación
							</th>
							<th  ><li class='fa fa-warehouse'></li>  Auditor
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Plantilla
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Responsable
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
						foreach ($objAuditoria as $key => $value) {
							$objempresaA=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_ancla());
							$objempresaN=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_asociada());
							$objusuarioA=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_auditor());
							$objusuarioR=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_crear_auditoria());
							$objPlantilla=plantillaDao::plantillaId($objAuditoria[$key]->getIdplantilla_madre_aditoria());
						echo"
						<tr role='row' class='even'>
						<td><a href='".MODULE_APP_SERVER."auditorias/verFicha.php?id=".$objAuditoria[$key]->getIdauditoria() ."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
							";
							switch ($objAuditoria[$key]->getEstado_auditoria()) {
							
								
								case 'PRO01':
								echo " <td><span class='badge badge-default badge-secondary'>PROGRAMADA</span></td>";
							   
								break;
						  
								case 'PRO010':
								echo " <td><span class='badge badge-default badge-danger'>PROGRAMADA VENCIDA</span></td>";
							   
								break;
					
								case 'PRO02':
								echo " <td><span class='badge badge-default badge-info'>EN PROGRESO </span></td>";
							   
								break;
					
								case 'PRO11':
								echo " <td>AUDITADA</span></td>";
							   
								break;
					
								case 'PRO12':
								echo " <td><span class='badge badge-default badge-warning'>PENDIENTE</span></td>";
							   
								break;
					
								case 'PRO121':
								echo " <td><span class='badge badge-default badge-info'>REVISION</span></td>";
							   
								break;
					
								case 'PRO13':
								echo " <td>APROBADA</span></td>";
								
								break;
					
								case 'PRO14':
								echo " <td>CERTIFICADA</span></td>";
								
								break;
							}
							echo "<td >
							  ".$objempresaA->getNombre_empresa()."
							</td>
							<td >
							  ".$objempresaN->getNombre_empresa()."
							</td>
							<td >
							  ".$objAuditoria[$key]->getFecha_programada_auditoria()."
							</td>
							<td >
							  ".$objusuarioA->getNombre_usuario()."
							</td>
							<td >
							  ".$objPlantilla->getEtiqueta_plantilla()."
							</td>
							<td >
							  ".$objusuarioR->getNombre_usuario()."
							</td>
							";
							
						   
							
							echo "
						  
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
						 <p>Actualmente no hay empresas registradas con la consulta anterior</p>
					</div>
				</div>
			</div>
			";
		}
	}

	public static function listadoSimpleAuditoriaEmpresa($filtro,$tipo,$estado,$consulta,$idempresa){
		$objAuditoria=auditoriaDao::listadoCompuestoAuditoriaEmpresa($filtro,$tipo,$estado,$consulta,$idempresa);
		
		//($objAuditoria);
		if($objAuditoria!= false){
		echo   "<table  class='table table-bordered table-responsive-lg'
						>
					<thead>
						<tr role='row'>
						<th  ><li class='fa fa-cog'></li>  Acciones
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Estado
							</th>
							<th  ><li class='fa fa-barcode'></li> Empresa Ancla</th>
							<th  ><li class='fa fa-money-check'></li>  Sede - Empresa Asociada de Negocio
							</th>
							<th  ><li class='fa fa-globe'></li>  Fecha de Programación
							</th>
							<th  ><li class='fa fa-warehouse'></li>  Auditor
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Plantilla
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Responsable
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
						foreach ($objAuditoria as $key => $value) {
							$objempresaA=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_ancla());
							$objempresaN=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_asociada());
							$objusuarioA=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_auditor());
							$objusuarioR=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_crear_auditoria());
							$objPlantilla=plantillaDao::plantillaId($objAuditoria[$key]->getIdplantilla_madre_aditoria());
						echo"
						<tr role='row' class='even'>
						<td><a href='".MODULE_APP_SERVER."auditorias/verFicha.php?id=".$objAuditoria[$key]->getIdauditoria() ."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
							";
							switch ($objAuditoria[$key]->getEstado_auditoria()) {
							
								
								case 'PRO01':
								echo " <td><span class='badge badge-default badge-secondary'>PROGRAMADA</span></td>";
							   
								break;
						  
								case 'PRO010':
								echo " <td><span class='badge badge-default badge-danger'>PROGRAMADA VENCIDA</span></td>";
							   
								break;
					
								case 'PRO02':
								echo " <td><span class='badge badge-default badge-info'>EN PROGRESO </span></td>";
							   
								break;
					
								case 'PRO11':
								echo " <td><span class='badge badge-default badge-success'>AUDITADA</span></td>";
							   
								break;
					
								case 'PRO12':
								echo " <td><span class='badge badge-default badge-warning'>PENDIENTE</span></td>";
							   
								break;
					
								case 'PRO121':
								echo " <td><span class='badge badge-default badge-info'>REVISION</span></td>";
							   
								break;
					
								case 'PRO13':
								echo " <td><span class='badge badge-default badge-success'>APROBADA</span></td>";
								
								break;
					
								case 'PRO14':
								echo " <td><span class='badge badge-default badge-success'>CERTIFICADA</span></td>";
								
								break;
							}
							echo "<td >
							  ".$objempresaA->getNombre_empresa()."
							</td>
							<td >
							  ".$objempresaN->getNombre_empresa()."
							</td>
							<td >
							  ".$objAuditoria[$key]->getFecha_programada_auditoria()."
							</td>
							<td >
							  ".$objusuarioA->getNombre_usuario()."
							</td>
							<td >
							  ".$objPlantilla->getEtiqueta_plantilla()."
							</td>
							<td >
							  ".$objusuarioR->getNombre_usuario()."
							</td>
							";
							
						   
							
							echo "
						  
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
						 <p>Actualmente no hay empresas registradas con la consulta anterior</p>
					</div>
				</div>
			</div>
			";
		}
	}



	public static function listadoSimpleAuditoriaEmpresaAuditor($filtro,$tipo,$estado,$consulta,$idempresa){
		$objAuditoria=auditoriaDao::listadoCompuestoAuditoriaEmpresaAuditor($filtro,$tipo,$estado,$consulta,$idempresa);
		
		//($objAuditoria);
		if($objAuditoria!= false){
		echo   "<table  class='table table-bordered table-responsive-lg'
						>
					<thead>
						<tr role='row'>
						<th  ><li class='fa fa-cog'></li>  Acciones
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Estado
							</th>
							<th  ><li class='fa fa-barcode'></li> Empresa Ancla</th>
							<th  ><li class='fa fa-money-check'></li>  Sede - Empresa Asociada de Negocio
							</th>
							<th  ><li class='fa fa-globe'></li>  Fecha de Programación
							</th>
							<th  ><li class='fa fa-warehouse'></li>  Auditor
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Plantilla
							</th>
							<th  ><li class='fa fa-chart-line'></li>  Responsable
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
						foreach ($objAuditoria as $key => $value) {
							$objempresaA=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_ancla());
							$objempresaN=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_asociada());
							$objusuarioA=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_auditor());
							$objusuarioR=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_crear_auditoria());
							$objPlantilla=plantillaDao::plantillaId($objAuditoria[$key]->getIdplantilla_madre_aditoria());
						echo"
						<tr role='row' class='even'>
						<td><a href='".MODULE_APP_SERVER."auditorias/verFicha.php?id=".$objAuditoria[$key]->getIdauditoria() ."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
							";
							switch ($objAuditoria[$key]->getEstado_auditoria()) {
							
								
								case 'PRO01':
								echo " <td><span class='badge badge-default badge-secondary'>PROGRAMADA</span></td>";
							   
								break;
						  
								case 'PRO010':
								echo " <td><span class='badge badge-default badge-danger'>PROGRAMADA VENCIDA</span></td>";
							   
								break;
					
								case 'PRO02':
								echo " <td><span class='badge badge-default badge-info'>EN PROGRESO </span></td>";
							   
								break;
					
								case 'PRO11':
								echo " <td><span class='badge badge-default badge-success'>AUDITADA</span></td>";
							   
								break;
					
								case 'PRO12':
								echo " <td><span class='badge badge-default badge-warning'>PENDIENTE</span></td>";
							   
								break;
					
								case 'PRO121':
								echo " <td><span class='badge badge-default badge-info'>REVISION</span></td>";
							   
								break;
					
								case 'PRO13':
								echo " <td><span class='badge badge-default badge-success'>APROBADA</span></td>";
								
								break;
					
								case 'PRO14':
								echo " <td><span class='badge badge-default badge-success'>CERTIFICADA</span></td>";
								
								break;
							}
							echo "<td >
							  ".$objempresaA->getNombre_empresa()."
							</td>
							<td >
							  ".$objempresaN->getNombre_empresa()."
							</td>
							<td >
							  ".$objAuditoria[$key]->getFecha_programada_auditoria()."
							</td>
							<td >
							  ".$objusuarioA->getNombre_usuario()."
							</td>
							<td >
							  ".$objPlantilla->getEtiqueta_plantilla()."
							</td>
							<td >
							  ".$objusuarioR->getNombre_usuario()."
							</td>
							";
							
						   
							
							echo "
						  
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
						 <p>Actualmente no hay empresas registradas con la consulta anterior</p>
					</div>
				</div>
			</div>
			";
		}
	}


	public static function listadoSimpleAuditorias($filtro,$tipo,$estado,$consulta){
		$objAuditoria=auditoriaDao::listadoSimpleAuditorias($filtro,$tipo,$estado,$consulta);
		//print_r($objAuditoria);
		//printf_r($objAuditoria);
		if($objAuditoria!= false){
		echo   "<table  class='table table-bordered table-responsive-lg '
						>
					<thead>
						<tr role='row'>
						<th  class='parrafo'><li class='fa fa-cog'></li>  Acciones
							</th>
							<th  class='parrafo'><li class='fa fa-chart-line'></li>  Estado
							</th>
							<th  class='parrafo'><li class='fa fa-barcode'></li> Empresa Ancla</th>
							<th  class='parrafo'><li class='fa fa-money-check'></li>  Asociada de Negocio 
							</th>
							<th  class='parrafo'><li class='fa fa-globe'></li>  Fecha auditoria
							</th>
							<th  class='parrafo'><li class='fa fa-warehouse'></li>  Auditor
							</th>
							<th  class='parrafo'><li class='fa fa-chart-line'></li>  Plantilla
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
						foreach ($objAuditoria as $key => $value) {
							//print_r($objAuditoria[$key]);
							$objempresaA=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_ancla());
							$objempresaN=empresaDao::empresaId($objAuditoria[$key]->getIdempresa_asociada());
							$objusuarioA=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_auditor());
							// $objusuarioR=usuarioDao::usuarioId($objAuditoria[$key]->getIdusuario_crear_auditoria());
							$objPlantilla=plantillaDao::plantillaId($objAuditoria[$key]->getIdplantilla_madre_aditoria());
						echo"
						<tr role='row' class='even'>
						<td><a href='".MODULE_APP_SERVER."auditorias/verFicha.php?id=".$objAuditoria[$key]->getIdauditoria() ."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
							";
							switch ($objAuditoria[$key]->getEstado_auditoria()) {
							
								
								case 'PRO01':
								echo " <td><span class='badge badge-default badge-secondary'>PROGRAMADA</span></td>";
							   
								break;
						  
								case 'PRO010':
								echo " <td><span class='badge badge-default badge-danger'>PROGRAMADA VENCIDA</span></td>";
							   
								break;
					
								case 'PRO02':
								echo " <td><span class='badge badge-default badge-info'>EN PROGRESO </span></td>";
							   
								break;
					
								case 'PRO11':
								echo " <td><span class='badge badge-default badge-success'>AUDITADA</span></td>";
							   
								break;
					
								case 'PRO12':
								echo " <td><span class='badge badge-default badge-warning'>PENDIENTE</span></td>";
							   
								break;
					
								case 'PRO121':
								echo " <td><span class='badge badge-default badge-info'>REVISION</span></td>";
							   
								break;
					
								case 'PRO13':
								echo " <td><span class='badge badge-default badge-success'>APROBADA</span></td>";
								
								break;
					
								case 'PRO14':
								echo " <td><span class='badge badge-default badge-success'>CERTIFICADA</span></td>";
								
								break;
							}
							echo "<td >
							  ".$objempresaA->getNombre_empresa()."
							</td>
							<td >
							  ".$objempresaN->getNombre_empresa()."
							</td>
							<td >
							  ".$objAuditoria[$key]->getFecha_programada_auditoria()."
							</td>
							<td >
							  ".$objusuarioA->getNombre_usuario()."
							</td>
							<td >
							  ".$objPlantilla->getEtiqueta_plantilla()."
							</td>
							
							";
							
						   
							
							echo "
						  
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
						 <p>Actualmente no hay empresas registradas con la consulta anterior</p>
					</div>
				</div>
			</div>
			";
		}
	}



	public static function listadoGrupoAuditoriaItem($idauditoria){
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItem($idauditoria);
		if($GrupoPlantilla != false){


			$nelementos =sizeof($GrupoPlantilla);

		    foreach ($GrupoPlantilla as $key => $value) {  
	 
		     $objPlantilla = plantillaDao::itemId($GrupoPlantilla[$key]->getIditem_grupo_plantilla_auditoria_item());
		
		     echo "<div class='alert bg-success alert-icon-left mb-2' role='alert'>
					<span class='alert-icon'><i class='fa fa-list'></i></span>
					<strong>".$objPlantilla->getEtiqueta_item_grupo_plantilla()."!</strong>
				</div>";
		     echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled titulo'  ><li class='fa fa-folder-open'></li>  Titulo
							</th>
							<th class='sorting_disabled titulo'  ><li class='fa fa-file-alt'></li>  Descripción
							</th>
							
							<th class='sorting_disabled titulo' ><li class='fa fa-file-alt'></li> Autodiagnóstico  de la Empresa
							</th>
							
	
						</tr>
					</thead>
					<tbody>";
								 
						echo"
						<tr role='row' class='even'>
							<td class='reorder sorting_1'>
							".$objPlantilla->getEtiqueta_item_grupo_plantilla()."
							</td>
							<td class='reorder sorting_1'>
							<textarea readonly rows='5' cols='70' class='text-justify'>".$objPlantilla->getDescripcion_item_grupo_plantilla()."</textarea>
							
							</td>
							<td class='reorder sorting_1'>
							<textarea readonly rows='5' cols='70' class='text-justify'>".$GrupoPlantilla[$key]->getObservacion_empresa()."</textarea>
							
							</td>
						</tr>";
					  
						echo"
					</tbody>
				</table>
				";
				

				echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
				role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
			
			<tbody>";
						 
				echo"
				<tr role='row' class='even'>
				
			
					<td class='reorder sorting_1'>
					    <div class='form-group mb-1 col-sm-12 col-md-12'>
																<label for='projectinput3'>
																	<h5 class='card-title'>
																		<span class='text-danger'>*</span>
																		<li class='fa fa-edit fa-2x'></li>
																		OBSERVACIÓN DEL AUDITOR :
																	</h5>
																</label>
																<textarea class='form-control ' id='textarea'
																	name='textarea".$GrupoPlantilla[$key]->getIdauditoria_item()."' rows='5' cols='80'>".$GrupoPlantilla[$key]->getObservacion_auditor()."</textarea>
						</div>
					
					</td>
					<td class='reorder sorting_1'>
					    <div class='form-group'>
							<label for=''><h5 class='card-title'><li class='fa fa-swatchbook'></li>&nbsp;Estado:</h5></label>
							<select id='' name='estado".$GrupoPlantilla[$key]->getIdauditoria_item()."' class='form-control'>";
															      switch ($GrupoPlantilla[$key]->getEstado_auditoria_item()) {
															    	  case '0':
															    		  echo "<option value='1'>SIN ESTADO</option>";
															    	  break;
															    	  case '2':
															    		   echo "<option value='2'>Cumple</option>";
															    	  break;
															    	  case '3':
															    		   echo "<option value='3'>No cumple</option>";
															    	  break;
															    	  
    
															      }
														            echo"
														                	<option value='0'>Sin Estado</option>
														                	<option value='2'>Cumple</option>
														                	<option value='3'>No cumple</option>
    
    
							</select>
						</div>
						<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
														<a  href='#".$GrupoPlantilla[$key]->getIdauditoria_item()."' title='".$GrupoPlantilla[$key]->getIdauditoria_item()."' id='validarElemento'
															class='btn capa round text-white  waves-effect waves-light'>  <i class='fa fa-save fa-2x'></i>&nbsp; Validar</a>
				</div>
					</td>
				</tr>";
			  
				echo"
			</tbody>
		</table>
		";
		echo "<div class='form-group col-sm-12 col-md-6 text-center mt-2'>
																   
																		<strong><div id='respuesta".$GrupoPlantilla[$key]->getIdauditoria_item()."'></div></strong>
																		
				</div>";

				// echo "<div class='card-body'>
				// 							<div class='repeater-default'>
				// 								<div >
				// 									<div  style=''>
				// 										<div id='smgPlantilla'></div>
				// 										<form class='form row'>
				// 											<div class='form-group mb-1 col-sm-12 col-md-4'>
														
				// 											    <div class='form-group'>
				// 											      <label for=''><h5 class='card-title'><li class='fa fa-swatchbook'></li>&nbsp;Estado:</h5></label>
				// 											      <select id='' name='estado".$GrupoPlantilla[$key]->getIdauditoria_item()."' class='form-control'>";
				// 											      switch ($GrupoPlantilla[$key]->getEstado_auditoria_item()) {
				// 											    	  case '0':
				// 											    		  echo "<option value='0'>SIN ESTADO</option>";
				// 											    	  break;
				// 											    	  case '2':
				// 											    		   echo "<option value='2'>Cumple</option>";
				// 											    	  break;
				// 											    	  case '3':
				// 											    		   echo "<option value='3'>No cumple</option>";
				// 											    	  break;
															    	  
    
				// 											      }
				// 										            echo"
				// 										                	<option value='0'>SIN ESTADO</option>
				// 										                	<option value='2'>Cumple</option>
				// 										                	<option value='3'>No cumple</option>
    
    
				// 										           </select>
				// 											    </div>
											
				// 											</div>
															
				// 											<div class='form-group mb-1 col-sm-12 col-md-12'>
				// 												<label for='projectinput3'>
				// 													<h5 class='card-title'>
				// 														<span class='text-danger'>*</span>
				// 														<li class='fa fa-edit fa-2x'></li>
				// 														OBSERVACION DEL AUDITOR :
				// 													</h5>
				// 												</label>
				// 												<textarea class='form-control ' id='textarea'
				// 													name='textarea".$GrupoPlantilla[$key]->getIdauditoria_item()."' rows='10' cols='120'>".$GrupoPlantilla[$key]->getObservacion_auditor()."</textarea>
				// 											</div>
				// 											<div class='form-group col-sm-12 col-md-6 text-center mt-2'>
																   
				// 														<strong><div id='respuesta".$GrupoPlantilla[$key]->getIdauditoria_item()."'></div></strong>
																		
				// 											</div>
															
				// 											<hr>
				// 											<br>
				// 											<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
				// 												<a  href='#".$GrupoPlantilla[$key]->getIdauditoria_item()."' title='".$GrupoPlantilla[$key]->getIdauditoria_item()."' id='validarElemento'
				// 													class='btn capa text-white  waves-effect waves-light'>  <i class='fa fa-save fa-2x'></i>&nbsp; Validar</a>
				// 											</div>


															

				// 											<br>
				// 										</form>
				// 									</div>
				// 								</div>
				// 							</div>
				// 							<br>
				// 						</div>";
			}
		
		}
		
	}


	public static function listadoGrupoAuditoriaItemInformeGeneral($idauditoria){
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItem($idauditoria);
		//( $GrupoPlantilla);
		$nelementos =sizeof($GrupoPlantilla);

		foreach ($GrupoPlantilla as $key => $value) {  
	 
		$objPlantilla = plantillaDao::itemId($GrupoPlantilla[$key]->getIditem_grupo_plantilla_auditoria_item());
		
		echo "<div class='alert bg-success alert-icon-left mb-2' role='alert'>
					<span class='alert-icon'><i class='fa fa-list'></i></span>
					<strong>".$objPlantilla->getEtiqueta_item_grupo_plantilla()."!</strong>
				</div>";
		echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-folder-open'></li>  Titulo
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Descripción
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Editar
							</th>
	
						</tr>
					</thead>
					<tbody>";
								 
						echo"
						<tr role='row' class='even'>
							<td class='reorder sorting_1'>
							".$objPlantilla->getEtiqueta_item_grupo_plantilla()."
							</td>
							<td class='reorder sorting_1'>
							<textarea readonly rows='10' cols='120'>".$objPlantilla->getDescripcion_item_grupo_plantilla()."</textarea>
							</td>
							
						</tr>";
					  
						echo"
					</tbody>
				</table>
				";
				echo "<div class='card-body'>
											<div class='repeater-default'>
												<div >
													<div  style=''>
														<div id='smgPlantilla'></div>
														<form class='form row'>
															<div class='form-group mb-1 col-sm-12 col-md-4'>
														
															<div class='form-group'>
															  <label for=''><h5 class='card-title'><li class='fa fa-swatchbook'></li>&nbsp;Estado:</h5></label>
															  <select id='' name='estado".$GrupoPlantilla[$key]->getIdauditoria_item()."' class='form-control'>";
															  switch ($GrupoPlantilla[$key]->getEstado_auditoria_item()) {
																  case '0':
																	  echo "<option value='0'>SIN ESTADO</option>";
																  break;
																  case '1':
																	  echo " <option value='1'>COMPLETA</option>";
																  break;
																  case '2':
																	   echo "<option value='2'>INCIDENCIA</option>";
																  break;
																  case '3':
																	   echo "<option value='3'>NO APLICA</option>";
																  break;
																  

															  }
														echo"
																

														  </select>
																 
														
															</div>
											
															</div>
															
															<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
																
															</div>
															<div class='form-group col-sm-12 col-md-6 text-center mt-2'>
																   
																		<strong><div id='respuesta".$GrupoPlantilla[$key]->getIdauditoria_item()."'></div></strong>
																		
															</div>
															<div class='form-group mb-1 col-sm-12 col-md-12'>
																<label for='projectinput3'>
																	<h5 class='card-title'>
																		<span class='text-danger'>*</span>
																		<li class='fa fa-edit fa-2x'></li>
																		Observacion de Autodiagnóstico Empresa:
																	</h5>
																</label>
																<textarea class='form-control card-title' id='textarea'
																	name='textarea' readonly rows='10' cols='120'>".$GrupoPlantilla[$key]->getObservacion_empresa()."</textarea>
															</div>
															<hr>
															<div class='form-group mb-1 col-sm-12 col-md-12'>
																<label for='projectinput3'>
																	<h5 class='card-title'>
																		<span class='text-danger'>*</span>
																		<li class='fa fa-edit fa-2x'></li>
																		Observacion del Auditor :
																	</h5>
																</label>
																<textarea class='form-control ' id='textarea'
																	name='textarea".$GrupoPlantilla[$key]->getIdauditoria_item()."' rows='10' cols='120'>".$GrupoPlantilla[$key]->getObservacion_auditor()."</textarea>
															</div>

															<br>
														</form>
													</div>
												</div>
											</div>
											<br>
										</div>";
			}
		
	}


	public static function oea($idauditoria){
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItem($idauditoria);
		//( $GrupoPlantilla);
		$nelementos =sizeof($GrupoPlantilla);

		foreach ($GrupoPlantilla as $key => $value) {  

		$objPlantilla = plantillaDao::itemId($GrupoPlantilla[$key]->getIditem_grupo_plantilla_auditoria_item());
		
		
		echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-folder-open'></li>  Titulo
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Descripción
							</th>
							
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Cumple
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  No cumple
							</th>
							
	
						</tr>
					</thead>
					<tbody>";
								 
						echo"
						<tr role='row' class='even'>
							<td class='reorder sorting_1'>
							".$objPlantilla->getEtiqueta_item_grupo_plantilla()."
							</td>
							<td >
							<textarea readonly rows='9' cols='125'  style='height: 284px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>".$objPlantilla->getDescripcion_item_grupo_plantilla()."</textarea>
							<br><br>
							
							<span class='daniela'>Comentario del Auditor</span>
							
							<br><br>
							<textarea readonly rows='12' cols='125'  style='height: 284px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>".$GrupoPlantilla[$key]->getObservacion_auditor()."</textarea>
							</td>
							
							
						";
						switch ($GrupoPlantilla[$key]->getEstado_auditoria_item()) {

							case '2':
								 echo "<td class='reorder sorting_1'><span class='badge badge-success badge-info'><li class='fa fa-times fa-3x'></li></span></td>";
								 echo "<td class='reorder sorting_1'></td>";
							break;
							case '3':
							echo "<td class='reorder sorting_1'></td>";
							echo "<td class='reorder sorting_1'><span class='badge badge-success badge-info'><li class='fa fa-times fa-3x'></li></span></td>";
							break;
							

						}
					  
						echo"
						</tr>
					</tbody>


				</table>
				";

			}
		
	}

	
	

	public static function listadoGrupoAuditoriaItem3($idauditoria){
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItem($idauditoria);
		//( $GrupoPlantilla);
		$nelementos =sizeof($GrupoPlantilla);

		foreach ($GrupoPlantilla as $key => $value) {  

		$objPlantilla = plantillaDao::itemId($GrupoPlantilla[$key]->getIditem_grupo_plantilla_auditoria_item());
		
		echo "<div class='alert bg-success alert-icon-left mb-2' role='alert'>
					<span class='alert-icon'><i class='fa fa-list'></i></span>
					<strong>".$objPlantilla->getEtiqueta_item_grupo_plantilla()."!</strong>
				</div>";
		echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-folder-open'></li>  Titulo
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Descripcion
							</th>
							
	
						</tr>
					</thead>
					<tbody>";
								 
						echo"
						<tr role='row' class='even'>
							<td class='reorder sorting_1'>
							".$objPlantilla->getEtiqueta_item_grupo_plantilla()."
							</td>
							<td class='reorder sorting_1'>
							<textarea readonly rows='28' cols='150'>".$objPlantilla->getDescripcion_item_grupo_plantilla()."</textarea>
							</td>
							
						</tr>";
					  
						echo"
					</tbody>
				</table>
				";
				echo "<div class='card-body'>
											<div class='repeater-default'>
												<div >
													<div  style=''>
														<div id='smgPlantilla'></div>
														<form class='form row'>
															<div class='form-group mb-1 col-sm-12 col-md-4'>
														
															<div class='form-group'>
															  <label for=''><h5 class='card-title'><li class='fa fa-swatchbook'></li>&nbsp;Estado:</h5></label>
															  <select id='' name='estado".$GrupoPlantilla[$key]->getIdauditoria_item()."' class='form-control'>";
															  switch ($GrupoPlantilla[$key]->getEstado_auditoria_item()) {
																  case '0':
																	  echo "<option value='0'>SIN ESTADO</option>";
																  break;

																  case '2':
																	   echo "<option value='2'>Cumple</option>";
																  break;
																  case '3':
																	   echo "<option value='3'>No cumple</option>";
																  break;
																  

															  }
														echo"
																<option value='0'>Sin estado</option>
																<option value='2'>Cumple</option>
																<option value='3'>No cumple</option>

														  </select>
															</div>
											
															</div>
															
															<div class='form-group mb-1 col-sm-12 col-md-12'>
																<label for='projectinput3'>
																	<h5 class='card-title'>
																		<span class='text-danger'>*</span>
																		<li class='fa fa-edit fa-2x'></li>
																		Observacion de Autodiagnóstico Empresa:
																	</h5>
																</label>
																<textarea class='form-control card-title' id='textarea'
																	name='textarea' readonly rows='10' cols='120'>".$GrupoPlantilla[$key]->getObservacion_empresa()."</textarea>
															</div>
															<hr>
															<div class='form-group mb-1 col-sm-12 col-md-12'>
																<label for='projectinput3'>
																	<h5 class='card-title'>
																		<span class='text-danger'>*</span>
																		<li class='fa fa-edit fa-2x'></li>
																		OBSERVACIÓN DEL AUDITOR :
																	</h5>
																</label>
																<textarea class='form-control ' id='textarea'
																	name='textarea".$GrupoPlantilla[$key]->getIdauditoria_item()."' rows='10' cols='120'>".$GrupoPlantilla[$key]->getObservacion_auditor()."</textarea>
															</div>

															<br>
														</form>
													</div>
												</div>
											</div>
											<br>
										</div>";
			}
		
	}



	public static function listadoGrupoAuditoriaItem2($idauditoria){
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItem2($idauditoria);
		//( $GrupoPlantilla);
		$nelementos =sizeof($GrupoPlantilla);

		foreach ($GrupoPlantilla as $key => $value) {  

		$objPlantilla = plantillaDao::itemId($GrupoPlantilla[$key]->getIditem_grupo_plantilla_auditoria_item());
		
		echo "<div class='alert bg-success alert-icon-left mb-2' role='alert'>
					<span class='alert-icon'><i class='fa fa-list'></i></span>
					<strong>".$objPlantilla->getEtiqueta_item_grupo_plantilla()."!</strong>
				</div>";
		echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-folder-open'></li>  Titulo
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Descripcion
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Editar
							</th>
	
						</tr>
					</thead>
					<tbody>";
								 
						echo"
						<tr role='row' class='even'>
							<td class='reorder sorting_1'>
							".$objPlantilla->getEtiqueta_item_grupo_plantilla()."
							</td>
							<td class='reorder sorting_1'>
							<textarea readonly rows='10' cols='120'>".$objPlantilla->getDescripcion_item_grupo_plantilla()."</textarea>
							</td>
							<td class='reorder sorting_1'><a href='verRubrica.php?id=".$objPlantilla->getIditem_grupo_plantilla()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
						</tr>";
					  
						echo"
					</tbody>
				</table>
				";
				echo "<div class='card-body'>
											<div class='repeater-default'>
												<div >
													<div  style=''>
														<div id='smgPlantilla'></div>
														<form class='form row'>";
															 
														echo"
															<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
																<a  href='#".$GrupoPlantilla[$key]->getIdauditoria_item()."' title='".$GrupoPlantilla[$key]->getIdauditoria_item()."' id='validarElemento2'
																	class='btn capa round text-white waves-effect waves-light'>  <i class='fa fa-save fa-2x'></i>&nbsp Validar</a>
															</div>
															<div class='form-group col-sm-12 col-md-6 text-center mt-2'>
																   
																<strong><div id='respuesta2".$GrupoPlantilla[$key]->getIdauditoria_item()."'></div></strong>
																	
															</div>
															<div class='form-group mb-1 col-sm-12 col-md-12'>
																<label for='projectinput3'>
																	<h5 class='card-title'>
																		<span class='text-danger'>*</span>
																		<li class='fa fa-edit fa-2x'></li>
																		OBSERVACIÓN DE AUTODIAGNÓSTICO EMPRESA:
																	</h5>
																</label>
																<textarea class='form-control card-title' id='textarea'
																	name='textarea".$GrupoPlantilla[$key]->getIdauditoria_item()."'  rows='10' cols='120'>".$GrupoPlantilla[$key]->getObservacion_empresa()."</textarea>
															</div>
															<hr>
															

															<br>
														</form>
													</div>
												</div>
											</div>
											<br>
										</div>";
			}
		
	}


	public static function listadoGrupoAuditoriaItemSeleccion($idauditoria){
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItemNAN($idauditoria);
		//( $GrupoPlantilla);
		$nelementos =sizeof($GrupoPlantilla);

		foreach ($GrupoPlantilla as $key => $value) {  

		$objPlantilla = plantillaDao::itemId($GrupoPlantilla[$key]->getIditem_grupo_plantilla_auditoria_item());
		
		// echo "<div class='alert bg-info alert-icon-left mb-2' role='alert'>
		// 			<span class='alert-icon'><i class='fa fa-list'></i></span>
		// 			<strong>".$objPlantilla->getEtiqueta_item_grupo_plantilla()."</strong>
		// 		</div>";
		echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-folder-open'></li>  Titulo
							</th>
							<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Descripcion
							</th>
							<th class='sorting_disabled' colspan='2' rowspan='2' ><li class='fa fa-list-ul'></li> Accion
							</th>
							
	
						</tr>
					</thead>
					<tbody>";
								 
						echo"
						<tr role='row' class='even'>
							<td class='reorder sorting_1'>
							".$objPlantilla->getEtiqueta_item_grupo_plantilla()."
							</td>
							<td class='reorder sorting_1'>
							<textarea readonly rows='4' cols='120'>".$objPlantilla->getDescripcion_item_grupo_plantilla()."</textarea>
							</td>";
							

							// if($GrupoPlantilla[$key]->getEstado_auditoria_item() == 0){
							// 	echo "<td class='reorder sorting_1'><a id='seleccionElemento' href='core/seleccionar.php?iditem=".$GrupoPlantilla[$key]->getIdauditoria_item()."&idauditoria=".$GrupoPlantilla[$key]->getIdauditoria() ."' class='dropdown-item'><i class='fa fa-minus-circle fa-2x'></i> </a></td>";
								
							// }else{
							// 	echo "<td class='reorder sorting_1'><a id='seleccionElemento' href='core/noSeleccionar.php?iditem=".$GrupoPlantilla[$key]->getIdauditoria_item()."&idauditoria=".$GrupoPlantilla[$key]->getIdauditoria() ."' class='dropdown-item'><i class='fa fa-check fa-2x'></i> </a></td>";
								
							// }
						echo"</tr>
					</tbody>
				</table>
				";
				
			}
		
	}

	public static function listadoModeloEstatus($idauditoria){
		$objAuditoria = auditoriaDao::auditoriaId($idauditoria);
		$listadoObjEmpresa = auditoriaDao::listadoEstatus($objAuditoria->getIdempresa_asociada());
		
		//print_r($listadoObjEmpresa);
		echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;zoom:90%;'>
					<thead>
						<tr role='row'>
							<th class='sorting_disabled'  >  Nombre
							</th>
							<th class='sorting_disabled' >  Ciudad
							</th>
							<th class='sorting_disabled'  > Estatus
							</th>
							<th class='sorting_disabled'  > Fecha auditoria
							</th>
							<th class='sorting_disabled'  > Fecha Plan de Accion
							</th>
							<th class='sorting_disabled'  > % de Cumplimiento
							</th>
							
	
						</tr>
					</thead>
					<tbody>";
					foreach ($listadoObjEmpresa as $key => $value) {  
						// $objEmpresa = empresaDao::empresaId($objAuditoria->getIdempresa_asociada());
		                // $listaSedes = empresaDao::listadoSedeEmpresa($objEmpresa->getIdempresarial());

						//($listadoObjEmpresa[$key]);
						echo"
						<tr role='row' class='even'>
							<td >"
							.$listadoObjEmpresa[$key]->getNombre().
							"</td>
							<td >
							"
							.$listadoObjEmpresa[$key]->getCiudad().
							"
							</td>";
							//echo " -------------".$listadoObjEmpresa[$key]->getEstatus();
							$objAuditoria= auditoriaDao::listadoEstatusAuditorias($listadoObjEmpresa[$key]->getEstatus());
							
						
							if(is_null($objAuditoria[0]->getEstatus()) == 1){
								echo "
							        <td >
							        NO PROGRAMADA
							        </td>
							        <td >
							        //
							        </td>
							        <td >
							        //
							        </td>
							        <td >
							        0
							        </td>";
							
						}else{
							// echo  "->".$listadoObjEmpresa[$key]->getFecha_auditoria();
							
							$c =auditoriaDao::rubricasCumplidas($objAuditoria[0]->getCiudad() );
							$nc =auditoriaDao::rubricasNoCumplidas($objAuditoria[0]->getCiudad());
							$r = intval($c) + intval($nc);
							// echo $c." ******************************************** ".$nc;
							$f = (intval($c) / intval($r)*100);
							// echo $r."------ ".$f;
							switch ($objAuditoria[0]->getEstatus()) {
							 
								
								case 'PRO01':
								echo " <td>PROGRAMADA</td>";
							   
								break;
						  
								
								break;
					
								case 'PRO02':
								echo " <td>PROGRAMADA</td>";
							   
								break;
					
								case 'PRO11':
								echo " <td>AUDITADA</td>";
							   
								break;
					
								case 'PRO12':
								echo " <td>AUDITADA</td>";
							   
								break;
					
								case 'PRO121':
								echo " <td>AUDITADA</td>";
							   
								break;
					
								case 'PRO13':
								echo " <td>AUDITADA</td>";
								
								break;
					
								case 'PRO14':
								echo " <td>AUDITADA</td>";
								
								break;
							}
							echo "<td >
							".$objAuditoria[0]->getFecha_auditoria()."
							</td>
							<td >
							".$objAuditoria[0]->getFecha_plan()."
							</td>
							<td >
							".intval($f)."%
							</td>";
							}
						

						echo "</tr>";
						
						}
						echo"
					</tbody>
				</table>
				";
				
			
		
	}
	public static function nItemPlanAccion($idauditoria){
		$idplanAccion = auditoriaDAO::objPlanAccion($idauditoria);
		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItemPlanAccion($idplanAccion);
		return sizeof($GrupoPlantilla);

	}

	public static function listadoGrupoAuditoriaItemPlanAccion($idauditoria){
		$idplanAccion = auditoriaDAO::objPlanAccion($idauditoria);


		$GrupoPlantilla = auditoriaDao::listadoGrupoAuditoriaItemPlanAccion($idplanAccion);
		//( $GrupoPlantilla);
		
        $grupo = "";
		foreach ($GrupoPlantilla as $key => $value) {  

		
			$objAuditoriaItem = auditoriaDao::auditoriaItem($GrupoPlantilla[$key]->getIdauditoria_item_detalle_item());
			$objPlantilla = plantillaDao::itemId($objAuditoriaItem->getIditem_grupo_plantilla_auditoria_item());
			$objGrupo  = plantillaDao:: grupoId($objPlantilla->getIdgrupo_plantilla_item());
			// ($objAuditoriaItem);
			if($grupo != $objGrupo->getEtiqueta_grupo_plantilla()){
				echo "<div class='alert bg-info  mb-2' role='alert'>
					<strong> Capitulo &nbsp;".$objGrupo->getEtiqueta_grupo_plantilla()." </strong>
				</div>";
				$grupo = $objGrupo->getEtiqueta_grupo_plantilla();

			}

		
		echo "
		<div class='alert bg-success alert-icon-left mb-2' role='alert'>
				<span class='alert-icon'><i class='fa fa-list'></i></span>
					<strong>    &nbsp;".$objPlantilla->getEtiqueta_item_grupo_plantilla()." &nbsp; ESTADO : EN INCIDENCIA</strong>
				    <br><br>
				    <div class='row'>
						<br><br>
						
						 <p readonly rows='10' cols='160' class='text-justify'> ".$objPlantilla->getDescripcion_item_grupo_plantilla()."</p>
						
				        
				   </div>
			</div>
		<div class='row'>
		    <div col-md-12>
		    
			</div>
				";
				
	echo   "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
						role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Observación del Auditor
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li> Acción
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-file-alt'></li>  Fecha 
						</th>
					</tr>
				</thead>
				<tbody>";
				echo"
					<tr role='row' class='even'>
						<td class='reorder sorting_1'>
							<div class='row'>
							    <textarea readonly style='height: 284px; width: 100%; margin-top: 0px; margin-bottom: 0px;' rows='20' cols='66' class='text-justify'>".$objAuditoriaItem->getObservacion_auditor()."</textarea>
							</div>
						</td>
						<td class='reorder sorting_1'>
							<div class='row'>
							    <textarea style='height: 284px; width: 100%; margin-top: 0px; margin-bottom: 0px;' rows='20' cols='66' name='accion".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' id='accion".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."'  class='text-justify'>".$GrupoPlantilla[$key]->getAccion_realizar()."</textarea>
							</div>
						</td>
						<td class='reorder sorting_1'>
							<div class='row'>
							    <div class='form-group'>
							        <input type='date' class='form-control' placeholder='. . . ' name='fecha".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' name='fecha".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' value='".$GrupoPlantilla[$key]->getFecha_realizar()."'>
								</div>
							</div>
						</td>
					</tr>";
				echo"
				</tbody>
			</table>
				";
				$dir = DOCUMENTS_SERVER."documentos/auditoria/".$GrupoPlantilla[$key]->getIddetalle_item_plan_accion()."/adjuntoPlanAccion_".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion().".pdf";
	echo "  <div class='card-body'>
				<div class='repeater-default'>
					<div >
						<div  style=''>
							<div id='smgPlantilla'></div>
								<form class='form row'>
									<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
										<label>Responsable</label>
										<input type=text' class='form-control' placeholder='. . . ' name='responsable".$GrupoPlantilla[$key]->getIddetalle_item_plan_accion()."' id='responsable".$GrupoPlantilla[$key]->getIddetalle_item_plan_accion()."' value='".$GrupoPlantilla[$key]->getResponsable()."'>
									</div>
									<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
										<label> % Implementación</label>
										<input type='number'  step='10' min='0' max='100' class='form-control'  name='porcentaje".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' value='".$GrupoPlantilla[$key]->getPorcentaje_avance()."'>
									</div>
									<div class='form-group col-sm-12 col-md-4 text-center mt-2'>
										<label>Adjunto</label>
										<input type='file' class='form-control' placeholder='. . . ' id='file".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' name='file".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."'>
									</div>
									<div class='form-group col-sm-12 col-md-1 text-center mt-2'>
										<a  href='".$dir."' title='' id='' target='_blank'
																	class='btn round capa text-white waves-effect waves-light'>  <i class='fa fa-file-pdf fa-2x'></i>&nbsp; PDF</a>
									</div>
									<div class='form-group col-sm-12 col-md-2 text-center mt-2'>
										<a  href='#".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' title='".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."' id='validarElementoPlan'
																	class='btn round  capa text-white waves-effect waves-light'>  <i class='fa fa-save fa-2x'></i>&nbsp; Validar</a>
									</div>
									<div class='form-group col-sm-12 col-md-6 text-center mt-2'>
										<strong><div id='respuesta".$GrupoPlantilla[$key]-> getIddetalle_item_plan_accion()."'></div></strong>
									</div>
	                            </form>
							</div>
						</div>
					</div>
				</div>
			</div>";
			}
		
	}



}
?>
