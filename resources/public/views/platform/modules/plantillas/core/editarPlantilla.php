<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."plantillaController.php");
  require_once(MODEL_PATH."plantilla.php");
  require_once(MODEL_PATH."certificado.php");
  require_once(MODEL_PATH."grupoPlantilla.php");
  require_once(MODEL_PATH."item_grupo_plantilla.php");

            
    plantillaController::editarPlantilla($_POST['idplantilla'],strtoupper($_POST['nombre']),$_POST['area']);
    $url =PLATFORM_SERVER."modules/plantillas/verFicha.php?id=".$_POST['idplantilla'];
    plantillaController::retornarVista($url);

  ?>  