<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."usuario.php");
require_once(MODEL_PATH."paises.php");
class usuarioDao
{
   
    public static function usuarioId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` where idusuario = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objusuario = new usuario(
            $data_table[0]["idusuario"],
            $data_table[0]["idsesion_usuario"],
            $data_table[0]["tipo_usuario"],
            $data_table[0]["nombre_usuario"],
            $data_table[0]["documento_usuario"],
            $data_table[0]["correo_usuario"],
            $data_table[0]["telefono_usuario"],
            $data_table[0]["direccion_usuario"],
            $data_table[0]["mail_usuario"],
            $data_table[0]["ciudad_usuario"],
            $data_table[0]["pais_usuario"]
        );
        return $objusuario;
    }
    
    public static function usuarioIdSesion($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` where idsesion_usuario = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objusuario = new usuario(
            $data_table[0]["idusuario"],
            $data_table[0]["idsesion_usuario"],
            $data_table[0]["tipo_usuario"],
            $data_table[0]["nombre_usuario"],
            $data_table[0]["documento_usuario"],
            $data_table[0]["correo_usuario"],
            $data_table[0]["telefono_usuario"],
            $data_table[0]["direccion_usuario"],
            $data_table[0]["mail_usuario"],
            $data_table[0]["ciudad_usuario"],
            $data_table[0]["pais_usuario"]
        );
        return $objusuario;
    }
    public static function listadoAuditores()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario`  where tipo_usuario = 'AUDITOR' ORDER BY `usuario`.`nombre_usuario` ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["idsesion_usuario"],
                    $data_table[$key]["tipo_usuario"],
                    $data_table[$key]["nombre_usuario"],
                    $data_table[$key]["documento_usuario"],
                    $data_table[$key]["correo_usuario"],
                    $data_table[$key]["telefono_usuario"],
                    $data_table[$key]["direccion_usuario"],
                    $data_table[$key]["mail_usuario"],
                    $data_table[$key]["ciudad_usuario"],
                    $data_table[$key]["pais_usuario"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function listadoPaises()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `paises` ORDER BY `paises`.`nombre` ASC   ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new paises(
                    $data_table[$key]["id"],
                    $data_table[$key]["nombre"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function listadoUsuarios()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` where tipo_usuario <> 'EMPRESA'  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["idsesion_usuario"],
                    $data_table[$key]["tipo_usuario"],
                    $data_table[$key]["nombre_usuario"],
                    $data_table[$key]["documento_usuario"],
                    $data_table[$key]["correo_usuario"],
                    $data_table[$key]["telefono_usuario"],
                    $data_table[$key]["direccion_usuario"],
                    $data_table[$key]["mail_usuario"],
                    $data_table[$key]["ciudad_usuario"],
                    $data_table[$key]["pais_usuario"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }



    public static function listadoUsuariosBuscar($rol,$usuario)
    {
        
        $data_source = new DataSource();
        if($rol == "TODOS"){
            $sql =" SELECT * FROM `usuario` where tipo_usuario <> 'EMPRESA' and   nombre_usuario like '%".$usuario."%' ";

        }else{
            $sql =" SELECT * FROM `usuario` where tipo_usuario = '".$rol."' and nombre_usuario like '%".$usuario."%' ";

        }

       
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["idsesion_usuario"],
                    $data_table[$key]["tipo_usuario"],
                    $data_table[$key]["nombre_usuario"],
                    $data_table[$key]["documento_usuario"],
                    $data_table[$key]["correo_usuario"],
                    $data_table[$key]["telefono_usuario"],
                    $data_table[$key]["direccion_usuario"],
                    $data_table[$key]["mail_usuario"],
                    $data_table[$key]["ciudad_usuario"],
                    $data_table[$key]["pais_usuario"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function registrarUsuario($modelSesion){
        
        $data_source = new DataSource();
       
             $sql2 = "INSERT INTO `usuario` VALUES (
                null,
                :idsesion_usurio,
                :tipo_usuario,
                :nombre_usuario,
                :documento_usuario,
                :correo_usuario,
                :telefono_usuario,
                :direccion_usuario,
                :mail_usuario,
                :ciudad_usuario,
                :pais_usuario
                
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':idsesion_usurio' =>$modelSesion->getIdsesion_usuario(),
                ':tipo_usuario' =>$modelSesion->getTipo_usuario(),
                ':nombre_usuario' =>$modelSesion->getNombre_usuario() ,
                ':documento_usuario' =>$modelSesion->getDocumento_usuario(),
                ':correo_usuario' =>$modelSesion->getCorreo_usuario(),
                ':telefono_usuario' =>$modelSesion->getTelefono_usuario(),
                ':direccion_usuario' =>$modelSesion->getDireccion_usuario(),
                ':mail_usuario' =>$modelSesion->getMail_usuario(),
                ':ciudad_usuario' =>$modelSesion->getCiudad_usuario(),
                ':pais_usuario' =>$modelSesion->getPais_usuario()
            ));
           
            return $resultado2;
        
    }


    public static function modificarUsuario($modelSesion){
        
        $data_source = new DataSource();
       
             $sql2 = "update `usuario` set
               
               
                tipo_usuario=:tipo_usuario,
                nombre_usuario=:nombre_usuario,
                documento_usuario=:documento_usuario,
                correo_usuario=:correo_usuario,
                telefono_usuario=:telefono_usuario,
                direccion_usuario=:direccion_usuario,
                mail_usuario=:mail_usuario,
                ciudad_usuario=:ciudad_usuario
               
                where idusuario = :idusuario
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':idusuario' =>$modelSesion->getIdusuario(),
                ':tipo_usuario' =>$modelSesion->getTipo_usuario(),
                ':nombre_usuario' =>$modelSesion->getNombre_usuario() ,
                ':documento_usuario' =>$modelSesion->getDocumento_usuario(),
                ':correo_usuario' =>$modelSesion->getCorreo_usuario(),
                ':telefono_usuario' =>$modelSesion->getTelefono_usuario(),
                ':direccion_usuario' =>$modelSesion->getDireccion_usuario(),
                ':mail_usuario' =>$modelSesion->getMail_usuario(),
                ':ciudad_usuario' =>$modelSesion->getCiudad_usuario()
               
            ));
           
            return $resultado2;
        
    }

    public static function ultimaEmpleadoRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `usuario` ORDER BY `usuario`.`idusuario` DESC  limit 1");
 
        return $data_table[0]["idusuario"];
    }
    
    
    
    
}