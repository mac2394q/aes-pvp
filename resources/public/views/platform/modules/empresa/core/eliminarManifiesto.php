<?php
header("Access-Control-Allow-Origin: *");
/* Ruta del archivo de configuracion principal*/
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (CONTROLLERS_PATH."empresaController.php");
$idempresa=$_POST['idempresa'];
$documento=DOCUMENTS_PATH."documentos/empresa/".$idempresa. "/manifestacion.pdf";

//echo $documento;
unlink($documento);  
echo "<div class='alert alert-warning' role='alert'>
						 <li class='fa fa-check-circle'></li> Eliminacion de documento exitoso ! &nbsp 
			</div>";
  //if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}
  //$temp_archivo = $_FILES["files11"]["tmp_name"];
  //$f1=move_uploaded_file($temp_archivo,$directorio . "/plan.pdf");
  //echo $f1;

  //$url =PLATFORM_SERVER."modules/empresa/seguridad.php?id=".$_POST['idempresa']; 
  //empresaController::retornarVista($url);     

    

    

?>