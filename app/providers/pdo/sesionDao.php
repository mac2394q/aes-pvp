<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."sesion.php");
require_once(MODEL_PATH."usuario.php");
require_once(CONTROLLERS_PATH."usuarioController.php");
class sesionDao
{
    public static function validarSesion($usuario,$clave)
    {
        
        $data_source = new DataSource();
        $sql2 ="SELECT * FROM `sesion` join usuario  where usuario_sesion = '".$usuario."' and clave_sesion ='".$clave."' limit 1";
        //echo $sql2;
        $data_table = $data_source->ejecutarConsulta($sql2);
        //print_r($data_table);
        if(count($data_table)>0){
            
            $objsesion = new sesion(
                $data_table[0]["idsesion"],
                $data_table[0]["usuario_sesion"],
                $data_table[0]["clave_sesion"],
                $data_table[0]["rol_sesion"],
                $data_table[0]["ultima_conexion_sesion"],
                $data_table[0]["estado_sesion"]
            );
            return $objsesion;
        }else{
           
            return false;
        }
    }


    



    public static function sesionID($idsesion)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `sesion`  where idsesion = ".$idsesion."  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
       
        if(count($data_table)>0){
            $objsesion = new sesion(
                $data_table[0]["idsesion"],
                $data_table[0]["usuario_sesion"],
                $data_table[0]["clave_sesion"],
                $data_table[0]["rol_sesion"],
                $data_table[0]["ultima_conexion_sesion"],
                $data_table[0]["estado_sesion"]
            );
           
            return $objsesion;
        }else{
            return false;
        }
    }
    public static function autentificacion($usuario,$clave,$sesion,$estado,$rol,$idempresa){
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $data_table0 = $data_source->ejecutarConsulta("SELECT * from  `sesion`  WHERE idsesion = ".$sesion);
        if(count($data_table0) > 0){
            $data_table = $data_source->ejecutarConsulta("UPDATE `sesion` SET usuario_sesion = :usuario, clave_sesion = :clave, rol_sesion = :rol, estado_sesion = :estado WHERE idsesion = ".$sesion,array(
                ':usuario' =>$usuario,
                ':clave' =>$clave,
                ':rol' =>$rol,
                ':estado' =>$estado   
            ));
            return $data_table;
        }else{
             $sql2 = "INSERT INTO `sesion` VALUES (
                null,
                :usuario,
                :clave,
                :rol,
                now(),
                1
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':usuario' =>$usuario,
                ':clave' =>$clave,
                ':rol' =>$rol  
            ));
            $data_table3 = $data_source->ejecutarConsulta("UPDATE `empresa` SET idsesion_empresa = :idsesion  WHERE idempresarial = ".$idempresa,array(
                ':idsesion' =>sesionDao::ultimaSesionRegistrada()
            ));
            return $resultado2;
        }
    }

    public static function registrarSesion($modelSesion){
        
        $data_source = new DataSource();
       
             $sql2 = "INSERT INTO `sesion` VALUES (
                null,
                :usuario,
                :clave,
                :rol,
                now(),
                1
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':usuario' =>$modelSesion->getUsuario_sesion(),
                ':clave' =>$modelSesion->getClave_sesion(),
                ':rol' =>$modelSesion->getRol_sesion() 
            ));
           
            return $resultado2;
        
    }

    public static function ultimaSesionRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT MAX(idsesion) as 'numero' FROM sesion ");
 
        return $data_table[0]["numero"];
    }


}