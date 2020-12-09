<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(PROVIDERS_PATH."pdo/auditoriaDao.php");


$objUsuario = auditoriaDao::noSeleccionItem($_GET['iditem']);


$url =PLATFORM_SERVER."modules/empresa/verFicha.php?id=".$_GET['idauditoria']; 
empresaController::retornarVista($url);  



?>