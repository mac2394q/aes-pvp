<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  
class routeController
{
    public static function returnView($url){
        echo  "<script>window.location.replace('".$url."');</script> ";
    }


}