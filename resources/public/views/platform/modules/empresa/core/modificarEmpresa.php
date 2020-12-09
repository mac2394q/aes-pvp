<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."certificado.php");
  
 
  
  // echo "contador ".$_POST['contadorCertificados']."<br>";
  // echo "grupo ".$_POST['grupo']."<br>";
  // echo "razonSocial ".$_POST['razonSocial']."<br>";
  // echo "nit ".$_POST['nit']."<br>";
  // echo "ciudad ".$_POST['ciudad']."<br>";
  // echo "departamento ".$_POST['departamento']."<br>";
  // echo "direccion ".$_POST['direccion']."<br>";
  // echo "pais ".$_POST['pais']."<br>";
  // echo "emailEmpresarial ".$_POST['emailEmpresarial']."<br>";
  // echo "area ".$_POST['area']."<br>";
  // echo "cargoRepresentante ".$_POST['cargoRepresentante']."<br>";
  // echo "telefonoRepresentante ".$_POST['telefonoRepresentante']."<br>";
  // echo "sitioWeb ".$_POST['sitioWeb']."<br>";
  // echo "fechaCorteFacturacion ".$_POST['fechaCorteFacturacion']."<br>";
  // echo "emailFacturacion ".$_POST['emailFacturacion']."<br>";
  // echo "representanteSistemaGestion ".$_POST['representanteSistemaGestion']."<br>";
  // echo "cargoRepresentanteSistema ".$_POST['cargoRepresentanteSistema']."<br>";
  // echo "telefonoSistema ".$_POST['telefonoSistema']."<br>";
  // echo "emailContacto ".$_POST['emailContacto']."<br>";
  //print_r($_POST);
  //echo $_POST['car[0][certificado]'];
  // for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
  //   echo $_POST['certificado'.$i]." ".$_POST['entidad'.$i]." ".$_POST['codigo'.$i]." ".$_POST['date'.$i];
  // }
  // echo "<br>";
  $grupo = null;
  if($_POST['grupo'] != "NULL"){$grupo =$_POST['grupo'];}
  
  $modelEmpresa = new empresa(
     $_POST['idempresa'],
     $grupo,
     strtoupper($_POST['razonSocial']),
     $_POST['nit'],
     strtoupper($_POST['ciudad']),
     strtoupper($_POST['departamento']),
     strtoupper($_POST['direccion']),
     null,
     $_POST['emailEmpresarial'],
     null,
     strtoupper($_POST['representanteLegal']),
     strtoupper($_POST['cargoRepresentante']),
     $_POST['telefonoRepresentante'],
     $_POST['sitioWeb'],
     $_POST['fechaCorteFacturacion'],
     $_POST['emailFacturacion'],
     null,
     null,
     strtoupper($_POST['representanteSistemaGestion']),
     strtoupper($_POST['cargoRepresentanteSistema']),
     $_POST['telefonoSistema'],
     $_POST['emailContacto']
  );

  
  $objEmpresa = empresaController::modificarEmpresa($modelEmpresa);
  
    echo "<br><div class='alert alert-success' role='alert'>
             <li class='fa fa-check-circle'></li> Modificacion de registro  de empresa exitoso ! &nbsp 
           </div>";
    
    $url =PLATFORM_SERVER."modules/empresa/verFicha.php?id=".$_POST['idempresa']; 
    //empresaController::retornarVista($url);     
  

 
?>  