<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."sesion.php");
  require_once(PDO_PATH."sesionDao.php");
  
class sesionController
{
    public static function validarSesion($usuario,$clave){
        return sesionDao::validarSesion($usuario,$clave);
    }
    public static function sesionID($idsesion){
      return sesionDao::sesionID($idsesion);
    }
    public static function autentificacion($usuario,$clave,$sesion,$estado,$rol,$idempresa){
      return sesionDao::autentificacion($usuario,$clave,$sesion,$estado,$rol,$idempresa);
    }
    public static function index(){
        echo  "<script>window.location.replace('".PLATFORM_SERVER."index.php');</script> ";
     }
    
    
}
?>
