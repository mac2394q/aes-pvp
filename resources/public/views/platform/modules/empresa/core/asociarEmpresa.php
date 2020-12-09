<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");

  $objEmpresa = empresaController::asociarEmpresa($_POST['idempresa'],$_POST['empresaA']);
  
    echo "<div class='alert round bg-success alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Asociacion exitosa!</strong> Ahora es una asociada de negocio
            </div>";
     sleep(2);
     $url="asociarEmpresas.php?id=".$_POST['idempresa'];
    
     empresaController::retornarVista($url);
      
  


 

?>  