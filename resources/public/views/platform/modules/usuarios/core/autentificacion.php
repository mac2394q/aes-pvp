<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."sesionController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  $objEmpresa = sesionController::autentificacion($_POST['usuario'],$_POST['clave'],$_POST['idsesion'],$_POST['estado'],$_POST['rol'],$_POST['idempleado']);
  
    echo "<div class='alert round bg-success alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Actualizacion exitosa!</strong> 
            </div>";

     sleep(4);
     $url="../usuarios/autentificacionEmpleado.php?id=".$_POST['idempleado'];
     empresaController::retornarVista($url);
     
    //  $url="../verFicha.php?id=".$_POST['usuario'];
    //  empresaController::retornarVista($url);
     
      
  
 
?>  