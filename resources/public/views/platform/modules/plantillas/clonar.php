<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  require_once(CONTROLLERS_PATH."plantillaController.php");
  
  require_once(PDO_PATH."plantillaDao.php");

  $id=$_GET['id'];
  
  
  $objPlantillaBase = plantillaDao::plantillaId2($id);
  $objPlantillaBase->setEtiqueta_plantilla($objPlantillaBase->getEtiqueta_plantilla()." - Copia");
  plantillaDao::registrarPlantilla($objPlantillaBase);

  $arrayCapitulos = null;
  $idplantillaNueva = plantillaDao::ultimaPlantilla();
  //echo $idplantillaNueva;
  $ArraygrupoPlantilla = plantillaDao::listadoGrupoPlantilla($id);
  foreach ($ArraygrupoPlantilla as $key => $value) {

      $ArraygrupoPlantilla[$key]->setIdplantilla_maestra_grupo($idplantillaNueva);
      plantillaDao::registrarPlantillaGrupo2($ArraygrupoPlantilla[$key]);
      $idgrupoPlantillaNuevo=plantillaDao::ultimaPlantillaGrupo();
      $arrayCapitulos =  plantillaDao::listadoGrupoPlantillaItem($ArraygrupoPlantilla[$key]->getIdgrupo_plantilla());

      foreach ($arrayCapitulos as $key => $value) {

        $objCapitulos =  plantillaDao::itemId($arrayCapitulos[$key]->getIditem_grupo_plantilla());
        $arrayCapitulos[$key]->setIdgrupo_plantilla_item($idgrupoPlantillaNuevo);
        plantillaDao::registrarPlantillaItem2($arrayCapitulos[$key]);
      }
  }

  $url="verFicha.php?id=".$idplantillaNueva;
  empresaController::retornarVista($url);

?>