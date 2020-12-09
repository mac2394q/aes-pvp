<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."plantillaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  
  require_once(PDO_PATH."plantillaDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(MODEL_PATH."auditoria.php");
  //print_r($_POST);
  for ($i=1; $i <=$_POST['ngrupos'] ; $i++) { 

    
    $id = $_POST['idauditoria'];
    //echo $_POST[$i."_".$id]."<br>";
    // // echo $_POST[$i."_".$id]."<br>";
    plantillaDao::registrarInformeVerificacion( $_POST[$i."_".$id],$id,$_POST[$i]);
  }
  $modelAuditoria = new auditoria(
      $_POST['idauditoria'],
      null,
      null,
      null,
      null,
      null,
      null,
      null,
      null,
      null,
      $_POST['objetivo_auditoria'],
      $_POST['criterio_auditoria'],
      $_POST['direccion_auditor'],
      $_POST['observacion_auditoria'],
      $_POST['descripcion_auditoria'],
      $_POST['localidad_auditoria'],
      $_POST['mapa_localizacion'],
      $_POST['descripcion_condiciones_entorno_auditoria'],
      $_POST['descripcion_condiciones_seguridad'],
      $_POST['actividades'],
      $_POST['comentarios_auditor'],
      $_POST['recomendacion_auditor']
  );
  //print_r($modelAuditoria);
  auditoriaDao::modificarAuditoriaReporte($modelAuditoria);

  ?>