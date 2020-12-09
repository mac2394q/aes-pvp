<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."certificado.php");
  

      $idempresa= $_POST['idempresa'];
      
      for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
       
        $modelCertificado = new certificado(
          null,
          $idempresa,
          $_POST['certificado'.$i],
          $_POST['entidad'.$i],
          $_POST['codigo'.$i],
          $_POST['date'.$i]
        );
        
        empresaController::registrarCertificado($modelCertificado);
      }

      $url =PLATFORM_SERVER."modules/empresa/verFicha.php?id=".$_POST['idempresa']; 
      empresaController::retornarVista($url);   
      
   
      
  

 
?>  