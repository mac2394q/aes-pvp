<?php
header("Access-Control-Allow-Origin: *");
/* Ruta del archivo de configuracion principal*/
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (CONTROLLERS_PATH."usuarioController.php");

usuarioController::listadoEmpleadosBusqueda($_POST['area'],$_POST['buscar']);




    

?>