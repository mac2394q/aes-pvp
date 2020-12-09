<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  
  $objEmpresa = empresaController::registrarGrupo(strtoupper($_POST['etiqueta']));
  
    echo "<div class='alert alert-success' role='alert'>
              <li class='fa fa-check-circle'></li> Registro de grupo empresarial exitoso ! &nbsp 
          </div>";
  ?>