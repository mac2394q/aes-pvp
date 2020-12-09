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
    null,
    $_POST['fecha'],
    strtoupper($_POST['documento']),
    strtoupper($_POST['descripcion']),
    strtoupper($_POST['tipo'])
 );



 seguridadDao::registrarvalidacion_empresa($modelSesion);
  
      echo "<br>
        <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle'></li> Registro de validacion exitoso ! &nbsp 
            </div>";
       

?>  