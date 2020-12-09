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


   //echo $_POST['id']." ".$_POST['accion']." ".$_POST['responsable']." ".$_POST['fecha']." ".$_POST['porcentaje'];
 
  
  

          if(!empty($_POST['accion']) == 0 || !empty($_POST['responsable']) == 0 || intval($_POST['porcentaje']) == 0){
            echo "<div class='alert bg-danger alert-icon-left mb-2' role='alert'>
             Hay Campos Vacios o No Elegidos.
        </div>";
        
        
          }else{
            auditoriaDao::registrarItemPlan($_POST['id'],$_POST['accion'],$_POST['responsable'],$_POST['fecha'],$_POST['porcentaje']);
            $idauditoria = auditoriaDao::auditoriaItemPlan($_POST['id']);
            $directorio = DOCUMENTS_PATH."documentos/auditoria/".$_POST['id'];
            if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}
            if(isset($_FILES["file"])){
              $temp_archivo = $_FILES["file"]["tmp_name"];
              $f1=move_uploaded_file($temp_archivo,$directorio . "/adjuntoPlanAccion_".$_POST['id'].".pdf");

            }
            

            echo "<div class='alert alert-success' role='alert'>
              <li class='fa fa-check-circle'></li> Guardado con Exito &nbsp 
          </div>";
        
          }       
          
            
  ?>