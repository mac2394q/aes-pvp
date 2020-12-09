<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(PROVIDERS_PATH."pdo/auditoriaDao.php");
require_once(CONTROLLERS_PATH."empresaController.php");


//print_r($_POST);
if($_POST['tipo'] == 'a'){
    $objUsuario = auditoriaDao::noSeleccionItem($_POST['id'],1);
    // echo "<td class='reorder sorting_1'><a id='seleccionElemento' href='".$_POST['id']."' title='d' class='dropdown-item'><i class='fa fa-check fa-2x'></i> </a></td>";
    echo   "<div class='alert bg-info alert-icon-left mb-2' role='alert'>
					<span class='alert-icon'><i class='fa fa-list'></i></span>
					<strong>ITEM SELECCIONADO</strong>
			</div>";
}else{
    $objUsuario = auditoriaDao::noSeleccionItem($_POST['id'],0);
    // echo "<td class='reorder sorting_1'><a id='seleccionElemento' href='".$_POST['id']."' title='a' class='dropdown-item'><i class='fa fa-minus-circle fa-2x'></i> </a></td>";
    echo   "<div class='alert bg-info alert-icon-left mb-2' role='alert'>
					<span class='alert-icon'><i class='fa fa-ban'></i></span>
					<strong>ITEM NO SELECCIONADO</strong>
			</div>";
}


?>