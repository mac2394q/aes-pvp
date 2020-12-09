<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PROVIDERS_PATH."pdo/empresaDao.php");
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."sede.php");
  

  
  $modelEmpresa = new sede(
     $_POST['idsede'],
     null,
     strtoupper($_POST['ciudad']),
     $_POST['nempleado'],
     strtoupper($_POST['direccion']),
     $_POST['procesos'],
     null,
     null,
     null,
     null
  );

  
  $objEmpresa = empresaDao::modificarSede($modelEmpresa);
  
    echo "<br><div class='alert alert-success' role='alert'>
             <li class='fa fa-check-circle'></li> Modificacion de registro  de sede exitoso ! &nbsp 
           </div>";
    
    $url =PLATFORM_SERVER."modules/empresa/verFichaSede.php?id=".$_POST['idsede']; 
    empresaController::retornarVista($url);     
  

 
?>  