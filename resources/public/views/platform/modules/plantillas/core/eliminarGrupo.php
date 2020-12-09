<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PROVIDERS_PATH."pdo/plantillaDao.php");

  $objEmpresa = plantillaDao::borrarItem($_GET['id']);
  $objEmpresa = plantillaDao::borrarGrupo($_GET['id']);
  
  $url="../verFicha.php?id=".$_GET['idplantilla'];
  empresaController::retornarVista($url);
?>  