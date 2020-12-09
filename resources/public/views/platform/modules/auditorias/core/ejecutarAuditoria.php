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

  $id=$_GET['id'];
  $objAuditoria = auditoriasController::auditoriaID($_GET['id']);
  $idplantilla =  $objAuditoria->getIdplantilla_madre_aditoria();
  $ArraygrupoPlantilla = plantillaDao::listadoGrupoPlantilla($idplantilla);
  $arrayCapitulos = null;
  foreach ($ArraygrupoPlantilla as $key => $value) {
      $arrayCapitulos =  plantillaDao::listadoGrupoPlantillaItem($ArraygrupoPlantilla[$key]->getIdgrupo_plantilla());
      foreach ($arrayCapitulos as $key => $value) {
        $objCapitulos =  plantillaDao::itemId($arrayCapitulos[$key]->getIditem_grupo_plantilla());
        $objAuditoriaItem = new auditoria_item(
            null,
            $id,
            $objCapitulos->getIditem_grupo_plantilla(),
            null,
            null,
            null,
            null
        );
         //print_r($objAuditoriaItem);
        auditoriaDao::crearAuditoria_item($objAuditoriaItem);
      }
  }
  auditoriaDao::estadoAuditoria($_GET['id'],"PRO02");
  $url="../verFicha.php?id=".$_GET['id'];
  empresaController::retornarVista($url);

?>