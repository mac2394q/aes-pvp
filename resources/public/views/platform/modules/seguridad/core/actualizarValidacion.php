<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PROVIDERS_PATH."pdo/usuarioDao.php");
  require_once(PROVIDERS_PATH."pdo/seguridadDao.php");
  require_once(MODEL_PATH."validacion_empresa.php");

   
  $modelSesion = new validacion_empresa(
    $_POST['id'],
    $_POST['fecha'],
    $_POST['documento'],
    $_POST['descripcion'],
    $_POST['tipo']
 );

 seguridadDao::modificarvalidacion_empresa($modelSesion);

      echo "<br>
        <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle'></li> Modificacion de validacion exitoso ! &nbsp 
            </div>
";
$url =PLATFORM_SERVER."modules/seguridad/verFicha.php?id=".$_POST['id']; 
empresaController::retornarVista($url);


?>  