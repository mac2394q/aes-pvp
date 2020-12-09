<?php 
class util{

    public static function validacionCampos($array_ ){
     //print_r($array_);
     $con=0;
     for ($i=0; $i < sizeof($array_); $i++) { 
        //echo $array_[$i];
     if(empty($array_[$i])){
         
         $con++;

     }
     return $con;


    
 }




}
}


?>