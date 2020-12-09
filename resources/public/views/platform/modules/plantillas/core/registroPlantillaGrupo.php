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
  //$_POST['contadorCertificados'];
  //$idplantilla=$_POST['idplantilla'];

       
       
            $modelPlantillaGrupo = new item_grupo_plantilla(
              null,
              $_POST['plantilla'],
              strtoupper($_POST['etiquetaPlantilla']),
              strtoupper($_POST['textarea2'])
            );
            //print_r($modelPlantillaGrupo);
            
            plantillaController::registrarPlantillaItem($modelPlantillaGrupo);
          
        echo "<div class='alert alert-success' role='alert'>
             <li class='fa fa-check-circle'></li>  plantilla finalizada  correctamente ! &nbsp 
           </div>  
           
             ";
             $url =PLATFORM_SERVER."modules/plantillas/verRubrica.php?id=".plantillaController::ultimoItemRegistrado();
             plantillaController::retornarVista($url);

          //    <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'plantillas/verFicha.php?id='.plantillaController::ultimaPlantilla()."'  class='btn btn-gradient-primary text-white'><li class='fa fa-eye fa-2x'></li> &nbsp; ver registro de plantilla</a>
          //  <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'plantillas/?.php?id='.$idplantilla."'  class='btn btn-gradient-primary text-white'><li class='fa fa-copy fa-2x'></li> &nbsp; Clonar plantilla existente</a>
    
    
    
  
  ?>  