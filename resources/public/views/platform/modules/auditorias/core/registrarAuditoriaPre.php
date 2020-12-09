<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."plantillaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  
  require_once(PDO_PATH."plantillaDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(MODEL_PATH."auditoria.php");
  $modelAuditoria = new auditoria(
      null,
      $_POST['empresaAncla'],
      $_POST['empresaAso'],
      $_POST['sede'],
      $_POST['fecha'],
      null,
      $_POST['idauditor'],
      $_POST['idplantilla'],
      $_POST['idusuario'],
      null
  );
  $objEmpresa = auditoriaDao::crearAuditoria($modelAuditoria);
    $id =auditoriaDao::ultimaAuditoriaRegistrada();
    auditoriaDao::estadoAuditoria($id,"NOVALIDADA");
    $url = MODULE_APP_SERVER."auditorias/registrarAuditoria.php";
    empresaController::retornarVista($url);     


  ?>