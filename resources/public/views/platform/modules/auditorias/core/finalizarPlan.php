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
  require_once(MODEL_PATH."plan_accion.php");
  require_once(MODEL_PATH."detalle_item_plan_accion.php");
  //PRO11 /PRO01
  //auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO11");

  
  
  $validar=auditoriaDao::revisonPlan($_POST['idauditoria']);
  if(intval($validar) > 0){
     echo "
     <div class='alert bg-danger alert-icon-left mb-2' role='alert'>
        <span class='alert-icon'><i class='fa fa-ban '></i></span>
        <strong class='titulo'>Por favor verificar alguna rubrica no ha sido revisada</strong>
      </div>
   ";

  }else{
    echo "
     <div class='alert bg-success alert-icon-left mb-2' role='alert'>
        <span class='alert-icon'><i class='fa fa-check '></i></span>
        <strong class='titulo'>Plan de accion registrado Correctamente</strong>
      </div>
   ";
    auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO13");
    $url="verFicha.php?id=".auditoriasController::auditoriaID($_POST['idauditoria'])->getIdauditoria();
    empresaController::retornarVista($url);
    
  

 
      //auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO13");
    
    }

    


  // $url="verFicha.php?id=".auditoriasController::auditoriaID($_POST['idauditoria'])->getIdauditoria();
  // empresaController::retornarVista($url);

   
  






?>