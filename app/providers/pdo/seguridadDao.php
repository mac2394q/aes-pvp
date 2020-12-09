<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."validacion_empresa.php");

class seguridadDao
{
   
    public static function validacionId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `validacion_empresa` where id_validacion_empresa = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objusuario = new validacion_empresa(
            $data_table[0]["id_validacion_empresa"],
            $data_table[0]["fecha_registro_validacion_empresa"],
            $data_table[0]["documento_validacion_empresa"],
            $data_table[0]["descripcion_validacion_empresa"],
            $data_table[0]["estado_validacion_empresa"]
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
    public static function listadoCertificados()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `validacion_empresa`  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new validacion_empresa(
                    $data_table[$key]["id_validacion_empresa"],
                    $data_table[$key]["fecha_registro_validacion_empresa"],
                    $data_table[$key]["documento_validacion_empresa"],
                    $data_table[$key]["descripcion_validacion_empresa"],
                    $data_table[$key]["estado_validacion_empresa"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function listadoCertificados2($tipo)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `validacion_empresa` where   estado_validacion_empresa = '".$tipo."'";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new validacion_empresa(
                    $data_table[$key]["id_validacion_empresa"],
                    $data_table[$key]["fecha_registro_validacion_empresa"],
                    $data_table[$key]["documento_validacion_empresa"],
                    $data_table[$key]["descripcion_validacion_empresa"],
                    $data_table[$key]["estado_validacion_empresa"]
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
        $sql =" SELECT * FROM `usuario`   ";
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


    public static function registrarvalidacion_empresa($modelSesion){
        
        $data_source = new DataSource();
       
             $sql2 = "INSERT INTO `validacion_empresa` VALUES (
                null,
                :fecha_registro_validacion_empresa,
                :documento_validacion_empresa,
                :descripcion_validacion_empresa,
                :estado_validacion_empresa
                
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':fecha_registro_validacion_empresa' =>$modelSesion->getfecha_registro_validacion_empresa(),
                ':documento_validacion_empresa' =>$modelSesion->getdocumento_validacion_empresa(),
                ':descripcion_validacion_empresa' =>$modelSesion->getconcepto_validacion_empresa(),
                ':estado_validacion_empresa' =>$modelSesion->getestado_validacion_empresa()
            ));
           
            return $resultado2;
        
    }


    public static function registrarAsignacion($modelSesion){
        
        $data_source = new DataSource();
       
             $sql2 = "INSERT INTO `asignacion _validacion_empresa` VALUES (
                :idempresa_asignacion,
                :idvalidacion_empresa,
                :concepto
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':idempresa_asignacion' =>$modelSesion->getidempresa_asignacion(),
                ':idvalidacion_empresa' =>$modelSesion->getidvalidacion_empresa(),
                ':concepto' =>$modelSesion->getconcepto() ));
           
            return $resultado2;
        
    }


    public static function modificarvalidacion_empresa($modelSesion){
        
        $data_source = new DataSource();
       
        $sql2 = "update  `validacion_empresa` set

        fecha_registro_validacion_empresa= :fecha_registro_validacion_empresa,
        documento_validacion_empresa=:documento_validacion_empresa,
        descripcion_validacion_empresa=:descripcion_validacion_empresa,
        estado_validacion_empresa=:estado_validacion_empresa
        where id_validacion_empresa= :id_validacion_empresa
        ";
                $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                    ':id_validacion_empresa' =>$modelSesion->getid_validacion_empresa(),
                    ':fecha_registro_validacion_empresa' =>$modelSesion->getfecha_registro_validacion_empresa(),
                    ':documento_validacion_empresa' =>$modelSesion->getdocumento_validacion_empresa(),
                    ':descripcion_validacion_empresa' =>$modelSesion->getconcepto_validacion_empresa(),
                    ':estado_validacion_empresa' =>$modelSesion->getestado_validacion_empresa()
                ));
           
            return $resultado2;
        
    }

    public static function ultimoRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `validacion_empresa` ORDER BY `validacion_empresa`.`id_validacion_empresa` DESC  limit 1");
 
        return $data_table[0]["id_validacion_empresa"];
    }
    
    
    
    
}