<?php 
	header("Access-Control-Allow-Origin: *");
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
	
	require_once(LIB_PATH."util.php");
	require_once(CONTROLLERS_PATH."empresaController.php");
	require_once(MODEL_PATH."empresa.php");
	require_once(MODEL_PATH."certificado.php");
	
	$_POST['contadorCertificados'];
	
	// echo "contador ".$_POST['contadorCertificados']."<br>";
	// echo "grupo ".$_POST['grupo']."<br>";
	// echo "razonSocial ".$_POST['razonSocial']."<br>";
	// echo "nit ".$_POST['nit']."<br>";
	// echo "ciudad ".$_POST['ciudad']."<br>";
	// echo "departamento ".$_POST['departamento']."<br>";
	// echo "direccion ".$_POST['direccion']."<br>";
	// echo "pais ".$_POST['pais']."<br>";
	// echo "emailEmpresarial ".$_POST['emailEmpresarial']."<br>";
	// echo "area ".$_POST['area']."<br>";
	// echo "cargoRepresentante ".$_POST['cargoRepresentante']."<br>";
	// echo "telefonoRepresentante ".$_POST['telefonoRepresentante']."<br>";
	// echo "sitioWeb ".$_POST['sitioWeb']."<br>";
	// echo "fechaCorteFacturacion ".$_POST['fechaCorteFacturacion']."<br>";
	// echo "emailFacturacion ".$_POST['emailFacturacion']."<br>";
	// echo "representanteSistemaGestion ".$_POST['representanteSistemaGestion']."<br>";
	// echo "cargoRepresentanteSistema ".$_POST['cargoRepresentanteSistema']."<br>";
	// echo "telefonoSistema ".$_POST['telefonoSistema']."<br>";
	// echo "emailContacto ".$_POST['emailContacto']."<br>";
	//print_r($_POST);
	//echo $_POST['car[0][certificado]'];
	// for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
	//   echo $_POST['certificado'.$i]." ".$_POST['entidad'.$i]." ".$_POST['codigo'.$i]." ".$_POST['date'.$i];
	// }
	// echo "<br>";
	$grupo = null;
	if($_POST['grupo'] != "NULL"){$grupo =$_POST['grupo'];}
	
	$modelEmpresa = new empresa(
		 null,
		 $grupo,
		 strtoupper($_POST['razonSocial']),
		 $_POST['nit'],
		 strtoupper($_POST['ciudad']),
		 strtoupper($_POST['departamento']),
		 strtoupper($_POST['direccion']),
		 strtoupper($_POST['pais']),
		 $_POST['emailEmpresarial'],
		 $_POST['area'],
		 strtoupper($_POST['representanteLegal']),
		 strtoupper($_POST['cargoRepresentante']),
		 $_POST['telefonoRepresentante'],
		 $_POST['sitioWeb'],
		 $_POST['fechaCorteFacturacion'],
		 $_POST['emailFacturacion'],
		 null,
		 1,
		 strtoupper($_POST['representanteSistemaGestion']),
		 strtoupper($_POST['cargoRepresentanteSistema']),
		 $_POST['telefonoSistema'],
		 $_POST['emailContacto']
	);
	if(empresaController::verificarNit($_POST['nit']) < 1){
	
	$objEmpresa = empresaController::registrarEmpresa($modelEmpresa);
	if($objEmpresa == false){
			echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
								<button   class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>×</span>
								</button>
								<strong>Oh tenemos un problema !</strong>El registro de la empresa no puedo ser realizada consulte con su administrador del sistema!.
						</div>";
			echo  "<script> errorRegistroEmpresa(); </script>" ;  
	}else{
			// echo "<div class='alert round bg-success alert-dismissible mb-2' role='alert'>
			//           <button   class='close' data-dismiss='alert' aria-label='Close'>
			//               <span aria-hidden='true'>×</span>
			//           </button>
			//           <strong>Registro de la empresa completado !</strong> <br>
			//       </div>";
			echo  "<script>  registroEmpresa();  </script>" ;
			$idempresa= empresaController::ultimaEmpresaRegistrada();
			
			for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
			 
				$modelCertificado = new certificado(
					null,
					$idempresa,
					strtoupper($_POST['certificado'.$i]),
					strtoupper($_POST['entidad'.$i]),
					$_POST['codigo'.$i],
					$_POST['date'.$i]
				);
				
				empresaController::registrarCertificado($modelCertificado);
			}
			$directorio=DOCUMENTS_PATH."fotosPerfil/".$idempresa;
			$directorio2=DOCUMENTS_PATH."documentos/empresa/".$idempresa;
			//echo $directorio;
			if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}
			if(!is_dir($directorio2)){ if(!mkdir($directorio2, 0755,true)) {die('Fallo al crear las carpetas...'); }}
			//print_r($_POST);
			
			
			if(empty($_FILES["logo"]) ){
				//echo "sin imagen";
				//$f1=move_uploaded_file(notFound,$directorio . "/".$idempresa.".jpg");
				//copy($directorio . "/", notFound);
				if (!copy(notFound, $directorio . "/".$idempresa.".jpg")) {
					echo "No se registro una logo para la ficha de empresa ...\n";
			}
				
			}else{
				//echo "con imagen";
				$temp_archivo = $_FILES["logo"]["tmp_name"];
				$f1=move_uploaded_file($temp_archivo,$directorio . "/".$idempresa.".jpg");
			}
	 
			echo "<div class='alert alert-success' role='alert'>
						 <li class='fa fa-check-circle'></li> Registro de empresa exitoso ! &nbsp 
					 </div>
					 <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'empresa/verFicha.php?id='.$idempresa."'  class='btn btn-gradient-primary text-white'><li class='fa fa-check-circle'></li>  Ficha de empresa</a>
						 &nbsp &nbsp  <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'empresa/asociarSedes.php?id='.$idempresa."'  class='btn btn-gradient-primary text-white'><li class='fa  fa-city'></li>   Asociar sedes a empresa </a>
						 &nbsp &nbsp  <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER."sesion/autentificacion.php?id=".$idempresa."' class='btn btn-gradient-success text-white'><li class='fa fa-shield-alt'></li>   Crear registro de autentificacion para acceso plataforma PVP</a>";
	}
}else{
	echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
								<button   class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>×</span>
								</button>
								<strong>Oh tenemos un problema !</strong>El nit de empresa ingresado ya corresponde a un nit registrado en nuestro sistema!.
						</div>";
}
 
?>  