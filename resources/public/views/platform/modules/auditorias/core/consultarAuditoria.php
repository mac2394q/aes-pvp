<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(PROVIDERS_PATH."pdo/auditoriaDao.php");
require_once(CONTROLLERS_PATH."auditoriasController.php");
require_once(CONTROLLERS_PATH."empresaController.php");
//print_r( $_POST);

echo auditoriasController::listadoAuditoriasConsulta($_POST['estado'],$_POST['consulta']); 


?>