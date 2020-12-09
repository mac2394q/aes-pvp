<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."empresa.php");
require_once(MODEL_PATH."area.php");
require_once(MODEL_PATH."sede.php");
require_once(MODEL_PATH."grupo.php");
require_once(MODEL_PATH."contacto.php");
require_once(MODEL_PATH."certificado.php");
require_once(MODEL_PATH."grupoEmpresarial.php");
require_once(MODEL_PATH."validacion_empresa.php");
require_once(MODEL_PATH."asignacion_validacion_empresa.php");
class empresaDao
{
    public static function listadoGrupoEmpresarial($filtro,$consulta)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM grupo_empresarial";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new grupo(
                    $data_table[$key]["idgrupo_empresarial"],
                    $data_table[$key]["nombre_grupo_empresarial"],
                    $data_table[$key]["estado_grupo_empresarial"]
                );
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }


    public static function listadoDocumentosEmpresa($idempresa,$tipo)
    {
        $data_source = new DataSource();

        $sql ="SELECT * FROM `asignacion _validacion_empresa`  WHERE idempresa_asignacion = ".$idempresa;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new asignacion_validacion_empresa(
                    $data_table[$key]["idempresa_asignacion"],
                    $data_table[$key]["idvalidacion_empresa"],
                    $data_table[$key]["concepto"]
                );
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }


    public static function nEmpresaGrupo($idempresa)
    { 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("UPDATE `empresas_asociadas` SET `estado_empresas_asociadas` = '0' WHERE `empresas_asociadas`.`idempresa_ancla` = ".$ancla." AND `empresas_asociadas`.`idempresa_asociada` = ".$negocio);
        
        return $data_table;
    }
    public static function listadoSimpleEmpresas($filtro,$area,$estado,$consulta)
    {
        
        $status ="";
         switch ($filtro) {
            case 'az':
            $status = "order by empresa.nombre_empresa ASC";
            break;
            case 'za':
            $status = "order by empresa.nombre_empresa  DESC";
            break;
         }


         switch ($estado) {
            case 'te':
            $type =" ";
            break;
            
            case 'ea':
            $type ="where estado_empresa = 1 ";
            break;
      
            case 'ei':
            $type ="where estado_empresa = 0 ";
            break;
            
            
        }
        $busqueda=NULL;

        if(is_null($consulta)){
            $busqueda =" ";
        }
        elseif(!is_null($consulta) && strcmp($type," ") != 0){
            $busqueda="AND  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%' or  nit_empresa LIKE  '%".$consulta."%') ";
            if(intval($area) != 0){
                $busqueda= $busqueda." AND  empresa.idarea_tecnica_empresa =".$area;
            }
        }

        $data_source = new DataSource();
        $sql ="
        SELECT * FROM empresa JOIN area_tecnica on(empresa.idarea_tecnica_empresa=area_tecnica.idarea_tecnica) join paises on(empresa.pais_empresa=paises.id)  ".$type." ".$busqueda." ".$status;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new empresa(
                    $data_table[$key]["idempresarial"],
                    $data_table[$key]["idgrupo_empresarial"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["nit_empresa"],
                    $data_table[$key]["ciudad_principal_empresa"],
                    $data_table[$key]["departamento_empresa"],
                    $data_table[$key]["direccion_empresa"],
                    $data_table[$key]["nombre"],
                    $data_table[$key]["correo_empresa"],
                    $data_table[$key]["etiqueta_area_tecnica"],
                    $data_table[$key]["representante_legal_empresa"],
                    $data_table[$key]["cargo_representante_empresa"],
                    $data_table[$key]["telefono_movil_representante_empresa"],
                    $data_table[$key]["sitio_web_empresa"],
                    $data_table[$key]["fecha_corte_facturacion_empresa"],
                    $data_table[$key]["correo_facturacion_empresa"],
                    $data_table[$key]["idsesion_empresa"],
                    $data_table[$key]["estado_empresa"],
                    $data_table[$key]["representante_sistema_gestion"],
                    $data_table[$key]["cargo_representante_sistema_gestion_empresa"],
                    $data_table[$key]["telefono_movil_representante_sistema_gestion_empresa"],
                    $data_table[$key]["correo_sistema_gestion_empresa"]
                );
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }


    public static function tablaClientes($consulta)
    {
        
   
        $busqueda=NULL;

        if(is_null($consulta)){
            $busqueda =" ";
        }
        elseif(!is_null($consulta)  != 0){
            $busqueda="AND  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%' or  nit_empresa LIKE  '%".$consulta."%') ";
            
        }

        $data_source = new DataSource();
        $sql ="
        SELECT * FROM empresa JOIN area_tecnica on(empresa.idarea_tecnica_empresa=area_tecnica.idarea_tecnica) join paises on(empresa.pais_empresa=paises.id)   ".$busqueda;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new empresa(
                    $data_table[$key]["idempresarial"],
                    $data_table[$key]["idgrupo_empresarial"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["nit_empresa"],
                    $data_table[$key]["ciudad_principal_empresa"],
                    $data_table[$key]["departamento_empresa"],
                    $data_table[$key]["direccion_empresa"],
                    $data_table[$key]["nombre"],
                    $data_table[$key]["correo_empresa"],
                    $data_table[$key]["etiqueta_area_tecnica"],
                    $data_table[$key]["representante_legal_empresa"],
                    $data_table[$key]["cargo_representante_empresa"],
                    $data_table[$key]["telefono_movil_representante_empresa"],
                    $data_table[$key]["sitio_web_empresa"],
                    $data_table[$key]["fecha_corte_facturacion_empresa"],
                    $data_table[$key]["correo_facturacion_empresa"],
                    $data_table[$key]["idsesion_empresa"],
                    $data_table[$key]["estado_empresa"],
                    $data_table[$key]["representante_sistema_gestion"],
                    $data_table[$key]["cargo_representante_sistema_gestion_empresa"],
                    $data_table[$key]["telefono_movil_representante_sistema_gestion_empresa"],
                    $data_table[$key]["correo_sistema_gestion_empresa"]
                );
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }

    public static function listadoSimpleEmpresasAsociar($idempresa)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresas_asociadas` join empresa join area_tecnica on(empresa.idarea_tecnica_empresa=area_tecnica.idarea_tecnica) join paises on(empresa.pais_empresa=paises.id) where 	idempresa_ancla =".$idempresa." && empresas_asociadas.estado_empresas_asociadas = 1 GROUP BY empresas_asociadas.idempresa_asociada";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        //print_r($data_table);
        if(count($data_table)>0){
        $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                //echo "<br><br><br><br>";
                $sql2 ="select * from empresa join area_tecnica on(empresa.idarea_tecnica_empresa=area_tecnica.idarea_tecnica) join paises on(empresa.pais_empresa=paises.id) where  idempresarial =".$data_table[$key]["idempresa_asociada"]." GROUP BY idempresarial";
                //echo $sql2;
                $data_table2 = $data_source->ejecutarConsulta($sql2);
      
        $objEmpresa = new empresa(
            $data_table2[0]["idempresarial"],
            $data_table2[0]["idgrupo_empresarial"],
            $data_table2[0]["nombre_empresa"],
            $data_table2[0]["nit_empresa"],
            $data_table2[0]["ciudad_principal_empresa"],
            $data_table2[0]["departamento_empresa"],
            $data_table2[0]["direccion_empresa"],
            $data_table2[0]["nombre"],
            $data_table2[0]["correo_empresa"],
            $data_table2[0]["etiqueta_area_tecnica"],
            $data_table2[0]["representante_legal_empresa"],
            $data_table2[0]["cargo_representante_empresa"],
            $data_table2[0]["telefono_movil_representante_empresa"],
            $data_table2[0]["sitio_web_empresa"],
            $data_table2[0]["fecha_corte_facturacion_empresa"],
            $data_table2[0]["correo_facturacion_empresa"],
            $data_table2[0]["idsesion_empresa"],
            $data_table2[0]["estado_empresa"],
            $data_table2[0]["representante_sistema_gestion"],
            $data_table2[0]["cargo_representante_sistema_gestion_empresa"],
            $data_table2[0]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table2[0]["correo_sistema_gestion_empresa"]
        );
        array_push($arrayEmpresa,$objEmpresa);
        
            }
            //print_r($arrayEmpresa);
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
    
    public static function listadoEmpresas($idempresa)
    {
        
        $data_source = new DataSource();
       
            $arrayEmpresa=array();
            $sql2 = "SELECT * FROM `empresa` join paises on(empresa.pais_empresa=paises.id) GROUP BY empresa.nombre_empresa ORDER BY `empresa`.`nombre_empresa` ASC ";
        
                //echo $sql2;
            $data_table2 = $data_source->ejecutarConsulta($sql2);
            foreach ($data_table2 as $key => $value) {
                $objEmpresa = new empresa(
                    $data_table2[$key]["idempresarial"],
                    $data_table2[$key]["idgrupo_empresarial"],
                    $data_table2[$key]["nombre_empresa"],
                    $data_table2[$key]["nit_empresa"],
                    $data_table2[$key]["ciudad_principal_empresa"],
                    $data_table2[$key]["departamento_empresa"],
                    $data_table2[$key]["direccion_empresa"],
                    $data_table2[$key]["nombre"],
                    $data_table2[$key]["correo_empresa"],
                    $data_table2[$key]["etiqueta_area_tecnica"],
                    $data_table2[$key]["representante_legal_empresa"],
                    $data_table2[$key]["cargo_representante_empresa"],
                    $data_table2[$key]["telefono_movil_representante_empresa"],
                    $data_table2[$key]["sitio_web_empresa"],
                    $data_table2[$key]["fecha_corte_facturacion_empresa"],
                    $data_table2[$key]["correo_facturacion_empresa"],
                    $data_table2[$key]["idsesion_empresa"],
                    $data_table2[$key]["estado_empresa"],
                    $data_table2[$key]["representante_sistema_gestion"],
                    $data_table2[$key]["cargo_representante_sistema_gestion_empresa"],
                    $data_table2[$key]["telefono_movil_representante_sistema_gestion_empresa"],
                    $data_table2[$key]["correo_sistema_gestion_empresa"]
                );
                array_push($arrayEmpresa,$objEmpresa);
                    }
                    return $arrayEmpresa;
            }
        
        
    public static function listadoEmpresasAsociadas($idempresa)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
      
        $objEmpresa = new empresa(
            $data_table[$key]["idempresarial"],
            $data_table[$key]["idgrupo_empresarial"],
            $data_table[$key]["nombre_empresa"],
            $data_table[$key]["nit_empresa"],
            $data_table[$key]["ciudad_principal_empresa"],
            $data_table[$key]["departamento_empresa"],
            $data_table[$key]["direccion_empresa"],
            $data_table[$key]["pais_empresa"],
            $data_table[$key]["correo_empresa"],
            $data_table[$key]["etiqueta_area_tecnica"],
            $data_table[$key]["representante_legal_empresa"],
            $data_table[$key]["cargo_representante_empresa"],
            $data_table[$key]["telefono_movil_representante_empresa"],
            $data_table[$key]["sitio_web_empresa"],
            $data_table[$key]["fecha_corte_facturacion_empresa"],
            $data_table[$key]["correo_facturacion_empresa"],
            $data_table[$key]["idsesion_empresa"],
            $data_table[$key]["estado_empresa"],
            $data_table[$key]["representante_sistema_gestion"],
            $data_table[$key]["cargo_representante_sistema_gestion_empresa"],
            $data_table[$key]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table[$key]["correo_sistema_gestion_empresa"]
        );
        array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }

    public static function listadoEmpresasGrupoEmpresarial($idgrupo)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa`  where idgrupo_empresarial =".$idgrupo;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
      
        $objEmpresa = new empresa(
            $data_table[$key]["idempresarial"],
            $data_table[$key]["idgrupo_empresarial"],
            $data_table[$key]["nombre_empresa"],
            $data_table[$key]["nit_empresa"],
            $data_table[$key]["ciudad_principal_empresa"],
            $data_table[$key]["departamento_empresa"],
            $data_table[$key]["direccion_empresa"],
            $data_table[$key]["pais_empresa"],
            $data_table[$key]["correo_empresa"],
            $data_table[$key]["etiqueta_area_tecnica"],
            $data_table[$key]["representante_legal_empresa"],
            $data_table[$key]["cargo_representante_empresa"],
            $data_table[$key]["telefono_movil_representante_empresa"],
            $data_table[$key]["sitio_web_empresa"],
            $data_table[$key]["fecha_corte_facturacion_empresa"],
            $data_table[$key]["correo_facturacion_empresa"],
            $data_table[$key]["idsesion_empresa"],
            $data_table[$key]["estado_empresa"],
            $data_table[$key]["representante_sistema_gestion"],
            $data_table[$key]["cargo_representante_sistema_gestion_empresa"],
            $data_table[$key]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table[$key]["correo_sistema_gestion_empresa"]
        );
        array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }

    public static function nEmpresasGrupoEmpresarial($idgrupo)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `empresa`  where idgrupo_empresarial =".$idgrupo;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);        
        return  $data_table[0]["numero"];
    }

    public static function grupoEmpresarial($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT *  FROM `grupo_empresarial`  where idgrupo_empresarial=".$id;
        //echo $sql."<br>";
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new grupoEmpresarial(
            $data_table[0]["idgrupo_empresarial"],
            $data_table[0]["nombre_grupo_empresarial"],
            $data_table[0]["estado_grupo_empresarial"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }



    public static function empresaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` join area_tecnica  on(area_tecnica.idarea_tecnica=empresa.idarea_tecnica_empresa) join paises on(paises.id=empresa.pais_empresa) where idempresarial = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new empresa(
            $data_table[0]["idempresarial"],
            $data_table[0]["idgrupo_empresarial"],
            $data_table[0]["nombre_empresa"],
            $data_table[0]["nit_empresa"],
            $data_table[0]["ciudad_principal_empresa"],
            $data_table[0]["departamento_empresa"],
            $data_table[0]["direccion_empresa"],
            $data_table[0]["nombre"],
            $data_table[0]["correo_empresa"],
            $data_table[0]["etiqueta_area_tecnica"],
            $data_table[0]["representante_legal_empresa"],
            $data_table[0]["cargo_representante_empresa"],
            $data_table[0]["telefono_movil_representante_empresa"],
            $data_table[0]["sitio_web_empresa"],
            $data_table[0]["fecha_corte_facturacion_empresa"],
            $data_table[0]["correo_facturacion_empresa"],
            $data_table[0]["idsesion_empresa"],
            $data_table[0]["estado_empresa"],
            $data_table[0]["representante_sistema_gestion"],
            $data_table[0]["cargo_representante_sistema_gestion_empresa"],
            $data_table[0]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table[0]["correo_sistema_gestion_empresa"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }

    public static function empresaNombre($buscar)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` join area_tecnica  on(area_tecnica.idarea_tecnica=empresa.idarea_tecnica_empresa) join paises on(paises.id=empresa.pais_empresa) where 	nombre_empresa = '".$buscar."'";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new empresa(
            $data_table[0]["idempresarial"],
            $data_table[0]["idgrupo_empresarial"],
            $data_table[0]["nombre_empresa"],
            $data_table[0]["nit_empresa"],
            $data_table[0]["ciudad_principal_empresa"],
            $data_table[0]["departamento_empresa"],
            $data_table[0]["direccion_empresa"],
            $data_table[0]["nombre"],
            $data_table[0]["correo_empresa"],
            $data_table[0]["etiqueta_area_tecnica"],
            $data_table[0]["representante_legal_empresa"],
            $data_table[0]["cargo_representante_empresa"],
            $data_table[0]["telefono_movil_representante_empresa"],
            $data_table[0]["sitio_web_empresa"],
            $data_table[0]["fecha_corte_facturacion_empresa"],
            $data_table[0]["correo_facturacion_empresa"],
            $data_table[0]["idsesion_empresa"],
            $data_table[0]["estado_empresa"],
            $data_table[0]["representante_sistema_gestion"],
            $data_table[0]["cargo_representante_sistema_gestion_empresa"],
            $data_table[0]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table[0]["correo_sistema_gestion_empresa"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }

    public static function empresaIdCom($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa`   where idempresarial = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new empresa(
            $data_table[0]["idempresarial"],
            $data_table[0]["idgrupo_empresarial"],
            $data_table[0]["nombre_empresa"],
            $data_table[0]["nit_empresa"],
            $data_table[0]["ciudad_principal_empresa"],
            $data_table[0]["departamento_empresa"],
            $data_table[0]["direccion_empresa"],
            $data_table[0]["pais_empresa"],
            $data_table[0]["correo_empresa"],
            $data_table[0]["idarea_tecnica_empresa"],
            $data_table[0]["representante_legal_empresa"],
            $data_table[0]["cargo_representante_empresa"],
            $data_table[0]["telefono_movil_representante_empresa"],
            $data_table[0]["sitio_web_empresa"],
            $data_table[0]["fecha_corte_facturacion_empresa"],
            $data_table[0]["correo_facturacion_empresa"],
            $data_table[0]["idsesion_empresa"],
            $data_table[0]["estado_empresa"],
            $data_table[0]["representante_sistema_gestion"],
            $data_table[0]["cargo_representante_sistema_gestion_empresa"],
            $data_table[0]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table[0]["correo_sistema_gestion_empresa"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }


    public static function empresaIdSesion($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` join area_tecnica  on(area_tecnica.idarea_tecnica=empresa.idarea_tecnica_empresa) where idsesion_empresa = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new empresa(
            $data_table[0]["idempresarial"],
            $data_table[0]["idgrupo_empresarial"],
            $data_table[0]["nombre_empresa"],
            $data_table[0]["nit_empresa"],
            $data_table[0]["ciudad_principal_empresa"],
            $data_table[0]["departamento_empresa"],
            $data_table[0]["direccion_empresa"],
            $data_table[0]["pais_empresa"],
            $data_table[0]["correo_empresa"],
            $data_table[0]["etiqueta_area_tecnica"],
            $data_table[0]["representante_legal_empresa"],
            $data_table[0]["cargo_representante_empresa"],
            $data_table[0]["telefono_movil_representante_empresa"],
            $data_table[0]["sitio_web_empresa"],
            $data_table[0]["fecha_corte_facturacion_empresa"],
            $data_table[0]["correo_facturacion_empresa"],
            $data_table[0]["idsesion_empresa"],
            $data_table[0]["estado_empresa"],
            $data_table[0]["representante_sistema_gestion"],
            $data_table[0]["cargo_representante_sistema_gestion_empresa"],
            $data_table[0]["telefono_movil_representante_sistema_gestion_empresa"],
            $data_table[0]["correo_sistema_gestion_empresa"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }
    public static function crearEmpresa( $empresa)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO empresa VALUES (
            null,
            :idgrupo_empresarial,
            :nombre_empresa,
            :nit_empresa,
            :ciudad_principal_empresa,
            :departamento_empresa,
            :direccion_empresa,
            :pais_empresa,
            :correo_empresa,
            :idarea_tecnica_empresa,
            :representante_legal_empresa,
            :cargo_representante_empresa,
            :telefono_movil_representante_empresa,
            :sitio_web_empresa,
            :fecha_corte_facturacion_empresa,
            :correo_facturacion_empresa,
            NULL,
            1,
            :representante_sistema_gestion,
            :cargo_representante_sistema_gestion_empresa,
            :telefono_movil_representante_sistema_gestion_empresa,
            :correo_sistema_gestion_empresa
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idgrupo_empresarial' =>$empresa->getIdgrupoEmpresarial(),
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':nit_empresa' =>$empresa->getNit_empresa() ,
            ':ciudad_principal_empresa' =>$empresa->getCiudad_principal_empresa() ,
            ':departamento_empresa' =>$empresa->getDepartamento(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
            ':pais_empresa' =>$empresa->getPais_empresa(),
            ':correo_empresa' =>$empresa->getCorreo_empresa(),
            ':idarea_tecnica_empresa' =>$empresa->getIdarea_tecnica_empresa(),
            ':representante_legal_empresa' =>$empresa->getRepresentante_legal_empresa(),
            ':cargo_representante_empresa' =>$empresa->getCargo_representante_empresa(),
            ':telefono_movil_representante_empresa' =>$empresa->getTelefono_movil_representante_empresa(),
            ':sitio_web_empresa' =>$empresa->getSitio_web_empresa(),
            ':fecha_corte_facturacion_empresa' =>$empresa->getFecha_corte_facturacion_empresa(),
            ':correo_facturacion_empresa' =>$empresa->getCorreo_facturacion_empresa(),
            ':representante_sistema_gestion' =>$empresa->getRepresentante_sistema_gestion(),
            ':cargo_representante_sistema_gestion_empresa' =>$empresa->getCargo_representante_sistema_gestion_empresa(),
            ':telefono_movil_representante_sistema_gestion_empresa' =>$empresa->getTelefono_movil_representante_sistema_gestion_empresa(),
            ':correo_sistema_gestion_empresa' =>$empresa->getCorreo_sistema_gestion_empresa()
        ));
        return $resultado2;
    }
    
    public static function crearCertificado( $certificado)
    { 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $sql2 = "INSERT INTO certificado VALUES (
            null,
            :idempresa_certificado,
            :etiqueta_certificado,
            :entidad_certificado,
            :codigo_certificado,	
            :fecha_certificado
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idempresa_certificado' =>$certificado->getIdempresa_certificado(),
            ':etiqueta_certificado' =>$certificado->getEtiqueta_certificado() ,
            ':entidad_certificado' =>$certificado->getEntidad_certificado() ,
            ':codigo_certificado' =>$certificado->getCodigo_certificado(),
            ':fecha_certificado' =>$certificado->getFecha_certificado()
        ));
        return $resultado2;
    }
    public static function crearSede( $sede)
    { 
        
        $data_source = new DataSource();
        $sql2 = "INSERT INTO sede VALUES (
            null,
            :idempresa,
            :ciudad_sede,
            :nempleados_sede,
            :direccion_sede,	
            :cantidad_procesos_sede,
            NULL,
            NULL,
            NULL,
            NULL
            )";
             
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idempresa' =>$sede->getIdempresa_sede(),
            ':ciudad_sede' =>$sede->getCiudad_sede() ,
            ':nempleados_sede' =>$sede->getN_empleados() ,
            ':direccion_sede' =>$sede->getDireccion_sede(),
            ':cantidad_procesos_sede' =>$sede->getCantidad_procesos_sede() 
        ));
        return $resultado2;
    }


    public static function registrarGrupo( $sede)
    { 
        
        $data_source = new DataSource();
        $sql2 = "INSERT INTO grupo_empresarial VALUES (
            null,
            :etiqueta,
            1
            )";
             
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':etiqueta' =>$sede
        ));
        return $resultado2;
    }


    public static function crearContacto( $sede)
    { 
        //print_r($sede);
        
        $data_source = new DataSource();
        $sql2 = "INSERT INTO contacto_sede VALUES (
            null,
            :idsede,
            :nombre_contacto,
            :cargo_contacto,
            :telefono_contacto
            )";
             
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idsede' =>$sede->getIdsede_contacto()  ,
            ':nombre_contacto' =>$sede->getNombre_contacto(),
            ':cargo_contacto' =>$sede->getCargo_contacto(),
            ':telefono_contacto' =>$sede->getTelefono_contacto() 
        ));
        return $resultado2;
    }
   
    public static function modificarEmpresa($empresa)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE empresa SET
             idgrupo_empresarial=:idgrupo_empresarial,
             nombre_empresa=:nombre_empresa,
             nit_empresa=:nit_empresa,
             ciudad_principal_empresa=:ciudad_principal_empresa,
             departamento_empresa=:departamento_empresa,
             direccion_empresa=:direccion_empresa,
            
             correo_empresa=:correo_empresa,
             representante_legal_empresa=:representante_legal_empresa,
             cargo_representante_empresa=:cargo_representante_empresa,
             telefono_movil_representante_empresa=:telefono_movil_representante_empresa,
             sitio_web_empresa=:sitio_web_empresa,
             fecha_corte_facturacion_empresa=:fecha_corte_facturacion_empresa,
             correo_facturacion_empresa=:correo_facturacion_empresa,
            
             representante_sistema_gestion=:representante_sistema_gestion,
             cargo_representante_sistema_gestion_empresa=:cargo_representante_sistema_gestion_empresa,
             telefono_movil_representante_sistema_gestion_empresa=:telefono_movil_representante_sistema_gestion_empresa,
             correo_sistema_gestion_empresa=:correo_sistema_gestion_empresa
        WHERE 	idempresarial = :idempresarial";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':idempresarial' =>$empresa->getIdempresarial(),
            ':idgrupo_empresarial' =>$empresa->getIdgrupoEmpresarial(),
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':nit_empresa' =>$empresa->getNit_empresa() ,
            ':ciudad_principal_empresa' =>$empresa->getCiudad_principal_empresa() ,
            ':departamento_empresa' =>$empresa->getDepartamento(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
           
            ':correo_empresa' =>$empresa->getCorreo_empresa(),
            
            ':representante_legal_empresa' =>$empresa->getRepresentante_legal_empresa(),
            ':cargo_representante_empresa' =>$empresa->getCargo_representante_empresa(),
            ':telefono_movil_representante_empresa' =>$empresa->getTelefono_movil_representante_empresa(),
            ':sitio_web_empresa' =>$empresa->getSitio_web_empresa(),
            ':fecha_corte_facturacion_empresa' =>$empresa->getFecha_corte_facturacion_empresa(),
            ':correo_facturacion_empresa' =>$empresa->getCorreo_facturacion_empresa(),
            ':representante_sistema_gestion' =>$empresa->getRepresentante_sistema_gestion(),
            ':cargo_representante_sistema_gestion_empresa' =>$empresa->getCargo_representante_sistema_gestion_empresa(),
            ':telefono_movil_representante_sistema_gestion_empresa' =>$empresa->getTelefono_movil_representante_sistema_gestion_empresa(),
            ':correo_sistema_gestion_empresa' =>$empresa->getCorreo_sistema_gestion_empresa()
        ));
        return $resultado2;
    }


    public static function modificarSede($empresa)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE sede SET
             ciudad_sede=:ciudad_sede,
             n_empleados=:n_empleados,
             direccion_sede=:direccion_sede,
             cantidad_procesos_sede=:cantidad_procesos_sede
        WHERE 	idsede = :idsede";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':ciudad_sede' =>$empresa->getCiudad_sede(),
            ':n_empleados' =>$empresa->getN_empleados(),
            ':direccion_sede' =>$empresa->getDireccion_sede() ,
            ':cantidad_procesos_sede' =>$empresa->getCantidad_procesos_sede() ,
            ':idsede' =>$empresa->getIdsede()
            
        ));
        return $resultado2;
    }


    public function borrarCertificado($idCertificado)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM certificado
      WHERE idcertificado=:id ", array(':id' => $id));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public function habilitarEmpresa($idSesion)
    {
        $data_source = new DataSource(); 
        $data_table = $data_source->ejecutarConsulta("update sesion set estado_sesion=1
      WHERE idsesion=".$idSesion);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public static function habilitarEmpresaActiva($idempresa)
    {
        $data_source = new DataSource(); 
        $data_table = $data_source->ejecutarConsulta("update empresa set estado_empresa=1
      WHERE idempresarial=".$idempresa);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public static function inhabilitarEmpresaInactiva($idSesion)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("update empresa set estado_empresa=0
      WHERE idempresarial=".$idSesion);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }


    public function inhabilitarEmpresa($idSesion)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("update sesion set estado_sesion=0
      WHERE idsesion=".$idSesion);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }

    public static function ultimaEmpresaRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT `empresa`.`idempresarial` as 'numero'  FROM empresa ORDER BY `empresa`.`idempresarial` DESC limit 1");
 
        return $data_table[0]["numero"];
    }

    public static function nEmpresas()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero'  FROM empresa ORDER BY `empresa`.`idempresarial` DESC limit 1");
 
        return $data_table[0]["numero"];
    }

    public static function nEmpresasEstados($estado)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero'  FROM empresa  where estado_empresa = ".$estado." ORDER BY `empresa`.`idempresarial` DESC limit 1");
 
        return $data_table[0]["numero"];
    }


    public static function ultimaSedeRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT `sede`.`idsede` as 'numero' FROM sede ORDER BY `sede`.`idsede`  DESC limit 1 ");
 
        return $data_table[0]["numero"];
    }
    public static function verificarNit($nit)
    {
        
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM empresa where nit_empresa='".$nit."'");
 
        return $data_table[0]["numero"];
    }
    public static function sedeId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `sede` where idsede = ".$id;
        //echo $sql;
        $data_table= $data_source->ejecutarConsulta($sql);
        //print_r( $data_table);
        $objsede = new sede(
            $data_table[0]["idsede"],
            $data_table[0]["idempresa"],
            $data_table[0]["ciudad_sede"],
            $data_table[0]["n_empleados"],
            $data_table[0]["direccion_sede"],
            $data_table[0]["cantidad_procesos_sede"],
            $data_table[0]["contacto_sede"],
            $data_table[0]["cargo_Sede"],
            $data_table[0]["telefono_movil_contacto_sede"],
            $data_table[0]["correo_empresarial_sede"]
        );
        return $objsede;
    }
    public static function listadoSede()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `sede`   ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objsede = new sede(
                    $data_table[$key]["idsede"],
                    $data_table[$key]["idempresa"],
                    $data_table[$key]["ciudad_sede"],
                    $data_table[$key]["n_empleados"],
                    $data_table[$key]["direccion_sede"],
                    $data_table[$key]["cantidad_procesos_sede"],
                    $data_table[$key]["contacto_sede"],
                    $data_table[$key]["cargo_Sede"],
                    $data_table[$key]["telefono_movil_contacto_sede"],
                    $data_table[$key]["correo_empresarial_sede"]
                );
                array_push($arrayAuditores,$objsede);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoSedeEmpresa($idempresa)
    {
        
        $data_source = new DataSource();
        $sql ="SELECT * FROM `sede`  where idempresa =".$idempresa."   ";
        
        //echo "<script> alert('id'+'".$idempresa."'); </script>";
        //echo "<script> console.log('".$sql."'); </script>";
        $data_table = $data_source->ejecutarConsulta($sql);
        //print_r($data_table);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objsede = new sede(
                    $data_table[$key]["idsede"],
                    $data_table[$key]["idempresa"],
                    $data_table[$key]["ciudad_sede"],
                    $data_table[$key]["n_empleados"],
                    $data_table[$key]["direccion_sede"],
                    $data_table[$key]["cantidad_procesos_sede"],
                    $data_table[$key]["contacto_sede"],
                    $data_table[$key]["cargo_Sede"],
                    $data_table[$key]["telefono_movil_contacto_sede"],
                    $data_table[$key]["correo_empresarial_sede"]
                );
                array_push($arrayAuditores,$objsede);
            }
            
            
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function certificadosEmpresa($idempresa)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `certificado` where 	idempresa_certificado = ".$idempresa;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objsede = new certificado(
                    $data_table[$key]["idcertificado"],
                    $data_table[$key]["idempresa_certificado"],
                    $data_table[$key]["etiqueta_certificado"],
                    $data_table[$key]["entidad_certificado"],
                    $data_table[$key]["codigo_certificado"],
                    $data_table[$key]["fecha_certificado"]
                );
                array_push($arrayAuditores,$objsede);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function contactosSede($idempresa)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `contacto_sede` where idsede_contacto = ".$idempresa;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objsede = new contacto_sede(
                    $data_table[$key]["idcontacto_sede"],
                    $data_table[$key]["idsede_contacto"],
                    $data_table[$key]["nombre_contacto"],
                    $data_table[$key]["cargo_contacto"],
                    $data_table[$key]["telefono_contacto"]
                );
                array_push($arrayAuditores,$objsede);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function contactosID($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `contacto_sede` where idcontacto_sede = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        if(count($data_table)>0){
           
                $objsede = new contacto_sede(
                    $data_table[$key]["idcontacto_sede"],
                    $data_table[$key]["idsede_contacto"],
                    $data_table[$key]["nombre_contacto"],
                    $data_table[$key]["cargo_contacto"],
                    $data_table[$key]["telefono_contacto"]
                );
               
            
            return $arrayAuditores;
            }else{
            return false;
        }
    }


    public static function asociarEmpresa($ancla,$negocio)
    { 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $data_table0 = $data_source->ejecutarConsulta("SELECT * from  `empresas_asociadas`  WHERE `empresas_asociadas`.`idempresa_ancla` = ".$ancla." AND `empresas_asociadas`.`idempresa_asociada` = ".$negocio);
        if(count($data_table0) > 0){
            $data_table = $data_source->ejecutarConsulta("UPDATE `empresas_asociadas` SET `estado_empresas_asociadas` = '1' WHERE `empresas_asociadas`.`idempresa_ancla` = ".$ancla." AND `empresas_asociadas`.`idempresa_asociada` = ".$negocio);
            return $data_table;
        }else{
             $sql2 = "INSERT INTO empresas_asociadas VALUES (
                :idempresa_ancla,
                :idempresa_asociada,
                1
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':idempresa_ancla' =>$ancla,
                ':idempresa_asociada' =>$negocio 
            ));
            return $resultado2;
        }
       
        
    }
    public static function desasociarEmpresa($ancla,$negocio){ 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("UPDATE `empresas_asociadas` SET `estado_empresas_asociadas` = '0' WHERE `empresas_asociadas`.`idempresa_ancla` = ".$ancla." AND `empresas_asociadas`.`idempresa_asociada` = ".$negocio);
        return $data_table;
    }


    public static function cierreAuditoria($id,$fecha){ 
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("UPDATE `auditoria` SET `fecha_cierre_auditoria` = '".$fecha."' WHERE  	idauditoria = ".$id);
        return $data_table;
    }


    public static function eliminarCertificado($idcertificado){ 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM `certificado` WHERE `certificado`.`idcertificado` =".$idcertificado);
        return $data_table;
    }


    public static function eliminarDocumento($idcertificado,$idempresa){ 

        $data_source = new DataSource();
        //echo "DELETE FROM `asignacion _validacion_empresa` WHERE `asignacion _validacion_empresa`.`idempresa_asignacion` =".$idcertificado." and `asignacion _validacion_empresa`.`idvalidacion_empresa` =".$idempresa;
        $data_table = $data_source->ejecutarConsulta("DELETE FROM `asignacion _validacion_empresa` WHERE `asignacion _validacion_empresa`.`idempresa_asignacion` =".$idcertificado." and `asignacion _validacion_empresa`.`idvalidacion_empresa` =".$idempresa);
        return $data_table;
    }


}


