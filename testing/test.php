<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  require_once(CONTROLLERS_PATH."plantillaController.php");
  
  require_once(PDO_PATH."plantillaDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(MODEL_PATH."auditoria_item.php");


  echo auditoriasController::nItemPlanAccion(15);

?>