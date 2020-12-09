<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."plantillaController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."plantilla.php");
  require_once(MODEL_PATH."certificado.php");
  require_once(MODEL_PATH."grupoPlantilla.php");
  

  $modelPlantillaGrupo = new grupoPlantilla(
    null,
    $_POST['idplantilla'],
    strtoupper($_POST['consecutivo']),
    strtoupper($_POST['etiquetaPlantilla'])
  );

            
   plantillaController::registrarPlantillaGrupo($modelPlantillaGrupo);

    
   $url="../plantillas/verFicha.php?id=".$_POST['idplantilla'];
   empresaController::retornarVista($url);
    
  
  ?>  