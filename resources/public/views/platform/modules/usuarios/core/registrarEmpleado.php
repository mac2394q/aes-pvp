<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."usuarioController.php");
  require_once(PROVIDERS_PATH."pdo/usuarioDao.php");
  require_once(PROVIDERS_PATH."pdo/sesionDao.php");
  require_once(MODEL_PATH."usuario.php");
  require_once(MODEL_PATH."sesion.php");
   
  $modelSesion = new sesion(
    null,
    $_POST['usuario'],
    $_POST['clave'],
    $_POST['area'],
    null,
    null
 );
 
 
 sesionDao::registrarSesion($modelSesion);
 $idempleado = sesionDao::ultimaSesionRegistrada();
 
  $modelUsu = new usuario(
     null,
     $idempleado,
     $_POST['area'],
     strtoupper($_POST['nombre']),
     $_POST['documento'],
     $_POST['correo'],
     $_POST['telefono'],
     strtoupper($_POST['direccion']),
     $_POST['correo'],
     strtoupper($_POST['ciudad']),
     strtoupper($_POST['pais'])
     
  );
  usuarioDao::registrarUsuario($modelUsu);
  
  
  $idusuario = usuarioDao::ultimaEmpleadoRegistrada();
  $directorio=DOCUMENTS_PATH."fotosPerfilEmpleados/".$idusuario;
  //echo $directorio;
  if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}
  //print_r($_POST);
  
  
  if(empty($_FILES["fileDoc"]) ){
      echo "No adjunto imagen de perfil para la ficha del usuario actual <br>";
      //$f1=move_uploaded_file(notFound,$directorio . "/".$idempresa.".jpg");
      //copy($directorio . "/", notFound);
    //   if (!copy(notFound, $directorio . "/".$idusuario.".jpg")) {
    //       echo "Error al copiar ...\n";}
      
  }else{
      echo "con imagen";
      $temp_archivo = $_FILES["fileDoc"]["tmp_name"];
      $f1=move_uploaded_file($temp_archivo,$directorio . "/".$idusuario.".jpg");
  }
      
      echo "<br>
        <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle'></li> Registro de sede exitoso ! &nbsp 
            </div>
        <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'usuarios/verFicha.php?id='.usuarioDao::ultimaEmpleadoRegistrada()."'  class='btn btn-gradient-primary text-white'><li class='fa fa-check-circle'></li>  Ficha de usuario</a>";
      
  
 
 
?>  