<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(PROVIDERS_PATH."pdo/auditoriaDao.php");
require_once(CONTROLLERS_PATH."auditoriasController.php");
require_once(CONTROLLERS_PATH."empresaController.php");

$objUsuario = auditoriasController::cierreAuditoria($_POST['idauditoria'],$_POST['fecha']);

$url =PLATFORM_SERVER."modules/auditorias/verFicha.php?id=".$_POST['idauditoria']; 
empresaController::retornarVista($url);  


?>