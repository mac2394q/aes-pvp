<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  require_once(CONTROLLERS_PATH."plantillaController.php");
  
  require_once(PDO_PATH."plantillaDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(MODEL_PATH."auditoria_item.php");
  auditoriaDao::observacionAuditor($_POST['iditem'],$_POST['observacion'],$_POST['estado']);
  //echo !empty($_POST['observacion']);
  if(!empty($_POST['observacion']) == 0 || intval($_POST['estado']) == 0){
    echo "<div class='alert bg-danger alert-icon-left mb-2' role='alert'>
             Hay Campos Vacios o No Elegidos.
        </div>";


  }else{
    echo "<div class='alert bg-info alert-icon-left mb-2' role='alert'>
             Guardado con Exito.
        </div>";

  }
  




  ?>