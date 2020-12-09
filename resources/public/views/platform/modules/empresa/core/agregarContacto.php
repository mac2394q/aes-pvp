<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."certificado.php");
  

      $idsede= $_POST['idsede_'];
      
      for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
       
        $modelSede= new contacto_sede(
          null,
          $idsede,
          strtoupper($_POST['contacto'.$i]),
          strtoupper($_POST['cargo'.$i]),
          $_POST['telefonos'.$i]
        );
        //print_r($modelSede);
        
        empresaController::registrarContacto($modelSede);
      
      }

      $url =PLATFORM_SERVER."modules/empresa/verFichaSede.php?id=".$_POST['idsede_']; 
      empresaController::retornarVista($url);   
      
   
      
  

 
?>  