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
  
  $modelPlanAccion = new plan_accion(
    null,
    $_POST['idauditoria'],
    null,
    null
  );
  $validar=auditoriaDao::revisonAuditoria($_POST['idauditoria']);
  if(intval($validar) > 0){
     echo "
     <div class='alert bg-danger alert-icon-left mb-2' role='alert'>
        <span class='alert-icon'><i class='fa fa-ban '></i></span>
        <strong class='titulo'>Por favor verificar alguna rubrica no ha sido revisada</strong>
      </div>
   ";
  }else{
    
    sleep(3);
    $validar2=auditoriaDao::revisonAuditoriaEstado($_POST['idauditoria']);
    if(intval($validar2) > 0){
         //echo "el proceso se hizo correctamente ,y puede activar el codigo que debe de ir aqui";
      auditoriaDao::crearPlanAccion($modelPlanAccion);
      $idplan=auditoriaDao::ultimoPlanAccionRegistrada();
      $arrayAuditoria = auditoriaDao::listadoGrupoAuditoriaItem( $_POST['idauditoria']);
      foreach ($arrayAuditoria  as $key => $value) {
        if(intval($arrayAuditoria[$key]->getEstado_auditoria_item()) == 3){
          $modeldetalle_item_plan_accion = new detalle_item_plan_accion(
            null,
            $arrayAuditoria[$key]->getIdauditoria_item(),
            $idplan,
            null,
            null,
            null,
            null,
            null
          );
           auditoriaDao::crearPlanAccionDetalle($modeldetalle_item_plan_accion);
        }
      }
      auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO12");
      echo "
      <div class='alert bg-success alert-icon-left mb-2' role='alert'>
        <span class='alert-icon'><i class='fa fa-check '></i></span>
        <strong class='parrafo'>El proceso se hizo correctamente , Siguiente Fase Plan de Accion</strong>
      </div>
    ";
      
    }else{
      auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO13");
      echo "
     <div class='alert bg-success alert-icon-left mb-2' role='alert'>
        <span class='alert-icon'><i class='fa fa-check '></i></span>
        <strong class='parrafo'>El proceso se hizo correctamente, Siguiente Fase Certificacion</strong>
      </div>
    ";
    }
    
    //echo "el proceso se hizo correctamente ,y puede activar el codigo que debe de ir aqui";
  //   auditoriaDao::crearPlanAccion($modelPlanAccion);
  // $idplan=auditoriaDao::ultimoPlanAccionRegistrada();
  // $arrayAuditoria = auditoriaDao::listadoGrupoAuditoriaItem( $_POST['idauditoria']);
  // foreach ($arrayAuditoria  as $key => $value) {
  //   if(intval($arrayAuditoria[$key]->getEstado_auditoria_item()) == 3){
  //     $modeldetalle_item_plan_accion = new detalle_item_plan_accion(
  //       null,
  //       $arrayAuditoria[$key]->getIdauditoria_item(),
  //       $idplan,
  //       null,
  //       null,
  //       null,
  //       null,
  //       null
  //     );
  //      auditoriaDao::crearPlanAccionDetalle($modeldetalle_item_plan_accion);
  //   }
        
  // }
 
  //$validador = auditoriasController::nItemPlanAccion($_POST['idauditoria']);
  // if(intval($validador) > 0 ){
  //   auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO12");
  // }else{
  //   auditoriaDao::estadoAuditoria($_POST['idauditoria'],"PRO13");
  // }
  $url="verFicha.php?id=".auditoriasController::auditoriaID($_POST['idauditoria'])->getIdauditoria();
  empresaController::retornarVista($url);
   }
  
?>