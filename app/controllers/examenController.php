<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."usuarios.php");
  require_once(PDO_PATH."examenDao.php");
  
class examenController
{
    

    public static function registrarExamen($model){
        return examenDao::registrarExamen($model);
    }

    public static function ultimoRegistroExamen(){
        return examenDao::ultimoRegistroExamen();
    }


}