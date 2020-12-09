<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."plantillaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  
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
      null,
      null,
      "",
      "",
      "",
      "",
      "",
      "",
      "",
      "",
      "",
      "",
      "",
      ""
  );
  //print_r($modelAuditoria);
  $ver = auditoriaDao::validarAsignacionAuditor($_POST['idauditor'],$_POST['fecha']);
  //echo "xxx ".$ver;
  if($ver == 0){
   
  
     $objEmpresa = auditoriaDao::crearAuditoria($modelAuditoria);
    //echo "bien";
    echo "<div class='alert alert-success' role='alert'>
              <li class='fa fa-check-circle'></li> Registro de auditoria completa ! &nbsp 
          </div>
          <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'auditorias/verFicha.php?id='.auditoriaDao::ultimaAuditoriaRegistrada()."'  class='btn btn-gradient-primary text-white'><li class='fa fa-check-circle'></li>  Ficha de auditoria</a>";
          $id =auditoriaDao::ultimaAuditoriaRegistrada();
          $objAuditoria = auditoriasController::auditoriaID($id);
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
          auditoriaDao::estadoAuditoria($id,"PRO02");     

        }else{
          echo "<div class='alert alert-warning' role='alert'>
                  <li class='fa fa-check-circle'></li> Este auditor ya esta programado en la fecha registrada ! &nbsp 
                </div>";
        }
  ?>