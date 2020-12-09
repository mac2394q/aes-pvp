<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PROVIDERS_PATH."pdo/empresaDao.php");

  $objEmpresa = empresaDao::eliminarDocumento($_GET['id'],$_GET['id2']);
  //unlink($_GET['url']);  
  $url="../validacionEmpresa.php?id=".$_GET['id'];
  //echo $url;
  empresaController::retornarVista($url);
?>  