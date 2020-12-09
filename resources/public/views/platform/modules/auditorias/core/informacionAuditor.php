<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH."auditoriasController.php");
require_once(CONTROLLERS_PATH."usuarioController.php");
require_once(MODEL_PATH."empresa.php");
$objUsuario = usuarioController::usuarioId($_POST['auditor']);

echo "<div class='col-md-5'>
<div class='form-group'>
    <label for='projectinput3'>
        <h5 class='card-title'>
            <li class='fa fa-globe-americas'></li> Pais
        </h5>
    </label>
    <input readonly type='text' class='form-control card-title'
        placeholder='. . . ' name='pais' value='".$objUsuario->getPais_usuario()."'>
</div>
</div>
<div class='col-md-5'>
<div class='form-group'>
    <label for='projectinput3'>
        <h5 class='card-title'>
            <li class='fa fa-city'></li> Ciudad / Estado
        </h5>
    </label>
    <input readonly type='text' class='form-control card-title'
        placeholder='. . . ' name='ciudad' value='".$objUsuario->getCiudad_usuario()."'>
</div>
</div>";







?>