<?php session_start();
  header("Access-Control-Allow-Origin: *");
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."sesionController.php");
  require_once(PDO_PATH."sesionDao.php");
  require_once(PDO_PATH."usuarioDao.php");

  //echo "".$_POST['usuario']."-".$_POST['clave']."-".$_POST['idioma'];
  $objUsuario = sesionController::validarSesion($_POST['usuario'],$_POST['clave']);
  print_r($objUsuario);
  if($objUsuario  == false){
      echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Oh tenemos un problema !</strong> Los datos  de autentificacion estan erroneos.
            </div>";
      session_destroy();      
      echo  "<script> errorSesion(); </script>" ;  
    
  }elseif($objUsuario->getEstado_sesion() == 0){
    echo "<div class='alert round bg-warning alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Oh tenemos un problema !</strong>  el usuario ha sido bloqueado.<br>
                Por favor contacte con AES para mas detalles.
            </div>";
    session_destroy();        
    echo  "<script> bloqueoSesion(); </script>" ;
  }else{
    
    echo  "<script> iniciarSesion(); </script>" ;
    
    $_SESSION['idsesion'] = $objUsuario->getIdsesion();
    
    $_SESSION['rol'] = $objUsuario->getRol_sesion();
    $_SESSION['idioma'] = $_POST['idioma'];
    if($_SESSION['rol'] == "EMPRESA"){

          $objEmpresa=empresaDao::empresaIdSesion($objUsuario->getIdsesion());
          $_SESSION['nombre'] = $objEmpresa->getNombre_empresa();
    }else{
          $objUsuario = usuarioDao::usuarioIdSesion($objUsuario->getIdsesion());
          $_SESSION['nombre'] = $objUsuario->getNombre_usuario();

    }
    //print_r($_SESSION);
    
    sesionController::index();

  } 

?>  