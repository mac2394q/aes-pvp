<?php
header("Access-Control-Allow-Origin: *");
/* Ruta del archivo de configuracion principal*/
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (CONTROLLERS_PATH."empresaController.php");
$id=$_POST['idauditoria'];
$directorio=DOCUMENTS_PATH."documentos/auditoria/".$id;


  $temp_archivo = $_FILES["files"]["tmp_name"];
  if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}


  $directorio=DOCUMENTS_PATH."documentos/auditoria/".$id. "/".$id."_certificado.pdf";


  $f1=move_uploaded_file($temp_archivo,$directorio );
  sleep(2);
  $url =PLATFORM_SERVER."modules/auditorias/verFicha.php?id=".$id; 
  //empresaController::retornarVista($url);     

    

    

?>