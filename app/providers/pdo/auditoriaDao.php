<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."empresa.php");
require_once(MODEL_PATH."area.php");
require_once(MODEL_PATH."estatus.php");
require_once(MODEL_PATH."certificado.php");
require_once(MODEL_PATH."auditoria.php");
require_once(MODEL_PATH."auditoria_item.php");
require_once(MODEL_PATH."detalle_item_plan_accion.php");
require_once(PDO_PATH."plantillaDao.php");
class auditoriaDao
{
    public static function crearPlanAccion($certificado)
    { 
       
        $data_source = new DataSource();
        $sql2 = "INSERT INTO plan_accion VALUES (
            null,
            :idauditoria_plan_accion,
            now(),
            1
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idauditoria_plan_accion' =>$certificado->getIdauditoria_plan_accion() ,
            
        ));
        return $resultado2;
    }
    public static function objPlanAccion($idauditoria)
    { 
       
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM plan_accion where idauditoria_plan_accion = ".$idauditoria."  limit 1");
        //print_r($data_table);
        return $data_table[0]["idplan_accion"];
    }
    public static function crearPlanAccionDetalle($certificado)
    { 
       
        $data_source = new DataSource();
        $sql2 = "INSERT INTO detalle_item_plan_accion VALUES (
            null,
            :idauditoria_item_detalle_item,
            :idplan_accion_detalle_item,
            '',
            '',
           null,
            0,
            null
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idauditoria_item_detalle_item' =>$certificado->getIdauditoria_item_detalle_item() ,
            ':idplan_accion_detalle_item' =>$certificado->getIdplan_accion_detalle_item()));
        return $resultado2;
    }
    public static function ultimoPlanAccionRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT idplan_accion as 'numero' FROM plan_accion GROUP by idplan_accion desc limit 1");
 
        return $data_table[0]["numero"];
    }
    public static function revisonAuditoria($id)
    {
        $data_source = new DataSource();//update auditoria_item set observacion_auditor = "//" where auditoria_item.estado_auditoria_item = 0
        $obj = $data_source->ejecutarActualizacion("update auditoria_item set observacion_auditor = '//' where auditoria_item.estado_auditoria_item = 0");
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM `auditoria_item` where idauditoria = ".$id." and (observacion_auditor is null or length(observacion_auditor) = 0 or estado_auditoria_item=1)");
 
        return $data_table[0]["numero"];
    }
    public static function revisonPlan($id)
    {  
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `plan_accion` join auditoria on(auditoria.idauditoria=plan_accion.idauditoria_plan_accion) where idauditoria_plan_accion = ".$id);
        //echo "SELECT * FROM `plan_accion` join auditoria on(auditoria.idauditoria=plan_accion.idauditoria_plan_accion) where idauditoria_plan_accion = ".$id;
        
        //echo "<br> "."SELECT count(*) as 'numero' FROM `detalle_item_plan_accion` where detalle_item_plan_accion.idplan_accion_detalle_item = ".$data_table[0]['idplan_accion']." and detalle_item_plan_accion.accion_realizar is null or length(detalle_item_plan_accion.accion_realizar)= 0  or detalle_item_plan_accion.responsable is null or length(detalle_item_plan_accion.responsable)= 0  or detalle_item_plan_accion.porcentaje_avance <= 0";
        
        $data_table_ = $data_source->ejecutarConsulta("SELECT count(*) as 'numero' FROM `detalle_item_plan_accion` where detalle_item_plan_accion.idplan_accion_detalle_item = ".$data_table[0]['idplan_accion']." and (detalle_item_plan_accion.accion_realizar is null or length(detalle_item_plan_accion.accion_realizar)= 0  or detalle_item_plan_accion.responsable is null or length(detalle_item_plan_accion.responsable)= 0  or detalle_item_plan_accion.porcentaje_avance <= 0");
 
        return $data_table_[0]["numero"];
    }
    public static function revisonAuditoriaEstado($id)
    {
        $data_source = new DataSource();//update auditoria_item set observacion_auditor = "//" where auditoria_item.estado_auditoria_item = 0
       
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM `auditoria_item` where idauditoria = ".$id." and estado_auditoria_item = 3");
 
        return $data_table[0]["numero"];
    }
    public static function listadoDetallePlanAccion($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `detalle_item_plan_accion` where 	idauditoria_item_detalle_item =".$id." ORDER BY `grupo_plantilla`.`idgrupo_plantilla` ASC";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new detalle_item_plan_accion(
                    $data_table[$key]["iddetalle_item_plan_accion"],
                    $data_table[$key]["idauditoria_item_detalle_item"],
                    $data_table[$key]["idplan_accion_detalle_item"],
                    $data_table[$key]["accion_realizar"],
                    $data_table[$key]["responsable"],
                    $data_table[$key]["fecha_realizar"],
                    $data_table[$key]["porcentaje_avance"],
                    $data_table[$key]["adjunto_evidencia"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function registrarItemPlan($id,$accion,$responsable,$fecha,$porcentaje){
        $data_source = new DataSource();
        $sql = "UPDATE detalle_item_plan_accion SET
           	accion_realizar=:accion_realizar,
               responsable=:responsable,
               accion_realizar=:accion_realizar,
               fecha_realizar=:fecha_realizar,
               porcentaje_avance=:porcentaje_avance
        WHERE iddetalle_item_plan_accion = :iddetalle_item_plan_accion";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':iddetalle_item_plan_accion' =>$id,
            ':accion_realizar' =>$accion ,
            ':responsable' =>$responsable,
            ':fecha_realizar' =>$fecha,
            ':porcentaje_avance' =>$porcentaje
            
        ));
        return $resultado2;
    }
    
    public static function observacionAuditor($id,$observacion,$estado){
        $data_source = new DataSource();
        $sql = "UPDATE auditoria_item SET
           observacion_auditor=:observacion_auditor,
           estado_auditoria_item=:estado_auditoria_item
        WHERE idauditoria_item = :idauditoria_item";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':idauditoria_item' =>$id,
            ':observacion_auditor' =>$observacion ,
            ':estado_auditoria_item' =>$estado 
            
        ));
        return $resultado2;
    }
    public static function estadoAuditoria($id,$estado){
        $data_source = new DataSource();
        $sql = "UPDATE auditoria SET
           	estado_auditoria=:estado_auditoria	
        WHERE idauditoria = :idauditoria";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':idauditoria' =>$id,
            ':estado_auditoria' =>$estado 
            
        ));
        return $resultado2;
    }
    public static function observacionEmpresa($id,$observacion){
        $data_source = new DataSource();
        $sql = "UPDATE auditoria_item SET
           observacion_empresa=:observacion_empresa
        WHERE idauditoria_item = :idauditoria_item";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':idauditoria_item' =>$id,
            ':observacion_empresa' =>$observacion 
            
        ));
        return $resultado2;
    }
    public static function listadoSimpleAuditorias($filtro,$tipo,$estado,$consulta)
    {
        $status ="";
         switch ($filtro) {
            case 'az':
            $status = "order by empresa.nombre_empresa ASC";
            break;
            case 'za':
            $status = "order by empresa.nombre_empresa  DESC";
            break;
            case 'fe':
            $status = "order by auditoria.fecha_programada_auditoria desc";
            break;
         }
         switch ($estado) {
            case 'te':
            $type =" ";
            break;
            
            case 'PRO01':
            $type ="where estado_auditoria = PRO01 ";
            break;
      
            case 'PRO010':
            $type ="where estado_auditoria = PRO010 ";
            break;
            case 'PRO02':
            $type ="where estado_auditoria = PRO02 ";
            break;
            case 'PRO11':
            $type ="where estado_auditoria = PRO11 ";
            break;
            case 'PRO12':
            $type ="where estado_auditoria = PRO12 ";
            break;
            case 'PRO121':
            $type ="where estado_auditoria = PRO121 ";
            break;
            case 'PRO13':
            $type ="where estado_auditoria = PRO13 ";
            break;
            case 'PRO14':
            $type ="where estado_auditoria = PRO14 ";
            break;
        }
        if(is_null($consulta)){
            $busqueda =" ";
        }elseif(!is_null($consulta) && strcmp($type," ")!==0){
            $busqueda="AND  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }elseif(strcmp($type," ")===0){
            $busqueda="where  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }
        
        $data_source = new DataSource();
        //.$type." ".$busqueda." ".$status
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) ORDER BY `auditoria`.`fecha_programada_auditoria` DESC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                //print_r($objAuditoria);
                array_push($arrayAuditoria,$objAuditoria);
            }
            //print_r($arrayAuditoria);
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    
    public static function listadoAuditoriasConsulta($estado,$valor)
    {
        $sql ="";
         switch ($estado) {
            case 'fecha':
                $sql = "SELECT * FROM `auditoria` where fecha_programada_auditoria = '".$valor."' ORDER BY `auditoria`.`fecha_programada_auditoria` DESC";
            break;
            case 'ancla':
                $sql = "SELECT * FROM `auditoria` join empresa on(auditoria.idempresa_ancla_auditoria=empresa.idempresarial) where 	nombre_empresa like '%".$valor."%' ORDER BY `auditoria`.`fecha_programada_auditoria` DESC";
               
            break;
            case 'asociada':
                $sql = "SELECT * FROM `auditoria` join empresa on(auditoria.idempresa_asociada_auditoria=empresa.idempresarial) where 		nombre_empresa like '%".$valor."%' ORDER BY `auditoria`.`fecha_programada_auditoria` DESC";
            break;
         }
         
        
        $data_source = new DataSource();
        //.$type." ".$busqueda." ".$status
        
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                //print_r($objAuditoria);
                array_push($arrayAuditoria,$objAuditoria);
            }
            //print_r($arrayAuditoria);
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function listadoCompuestoAuditorias($filtro,$tipo,$estado,$consulta,$idempresa,$idempresa2)
    {
        $status ="";
         switch ($filtro) {
            case 'az':
            $status = "order by empresa.nombre_empresa ASC";
            break;
            case 'za':
            $status = "order by empresa.nombre_empresa  DESC";
            break;
            case 'fe':
            $status = "order by auditoria.fecha_programada_auditoria desc";
            break;
         }
         switch ($estado) {
            case 'te':
            $type =" ";
            break;
            
            case 'PRO01':
            $type ="where estado_auditoria = PRO01 ";
            break;
      
            case 'PRO010':
            $type ="where estado_auditoria = PRO010 ";
            break;
            case 'PRO02':
            $type ="where estado_auditoria = PRO02 ";
            break;
            case 'PRO11':
            $type ="where estado_auditoria = PRO11 ";
            break;
            case 'PRO12':
            $type ="where estado_auditoria = PRO12 ";
            break;
            case 'PRO121':
            $type ="where estado_auditoria = PRO121 ";
            break;
            case 'PRO13':
            $type ="where estado_auditoria = PRO13 ";
            break;
            case 'PRO14':
            $type ="where estado_auditoria = PRO14 ";
            break;
        }
        if(is_null($consulta)){
            $busqueda =" ";
        }elseif(!is_null($consulta) && strcmp($type," ")!==0){
            $busqueda="AND  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }elseif(strcmp($type," ")===0){
            $busqueda="where  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }
        
        $data_source = new DataSource();
        //.$type." ".$busqueda." ".$status
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idempresa_ancla_auditoria=".$idempresa." and auditoria.idempresa_asociada_auditoria=".$idempresa2." order by auditoria.fecha_programada_auditoria DESC";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function listadoCompuestoAuditoriaEmpresa($idempresa)
    {
        $data_source = new DataSource();
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idempresa_ancla_auditoria=".$idempresa."  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function listadoCompuestoAuditoriaAuditor($idempresa)
    {
        $data_source = new DataSource();
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idusuario_auditoria=".$idempresa."  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
/*
proposito: seleccionar auditorias en orden fecha programada
que tengan todo el historias de ancla asociada mas
la asociada asociada(auditoria propia ultima)
contrato: entero, entero -> array(auditoria)
*/
public static function listadoRolAuditoriaAnclaAsociadaPropiasAsociada($idempresa,$idempresaAsociada)
{
    $data_source = new DataSource();
    $sql ="
    select *
from auditoria
join empresa as ancla on auditoria.idempresa_ancla_auditoria=ancla.idempresarial
join empresa as asociada on auditoria.idempresa_asociada_auditoria=asociada.idempresarial
join sede on auditoria.idsede_auditoria=sede.idsede
join usuario on auditoria.idusuario_auditoria=usuario.idusuario
join plantilla_maestra on auditoria.idplantilla_madre_auditoria=plantilla_maestra.idplantilla_maestra
WHERE  auditoria.idauditoria in
(SELECT max(auditoria.idauditoria)
FROM auditoria
WHERE
auditoria.idempresa_ancla_auditoria=".$idempresaAsociada 
." and auditoria.idempresa_asociada_auditoria=" .$idempresaAsociada
." group by idsede_auditoria UNION SELECT auditoria.idauditoria
FROM auditoria
WHERE
auditoria.idempresa_ancla_auditoria=" .$idempresa 
." and auditoria.idempresa_asociada_auditoria=" .$idempresaAsociada 
." ) order by auditoria.fecha_programada_auditoria desc";
    //echo $sql;
    $data_table = $data_source->ejecutarConsulta($sql);
    if(count($data_table)>0){
        
        $arrayAuditoria=array();
       
        foreach ($data_table as $key => $value) {
            $objAuditoria = new auditoria(
                $data_table[$key]["idauditoria"],
                $data_table[$key]["idempresa_ancla_auditoria"],
                $data_table[$key]["idempresa_asociada_auditoria"],
                $data_table[$key]["idsede_auditoria"],
                $data_table[$key]["fecha_programada_auditoria"],
                $data_table[$key]["fecha_cierre_auditoria"],
                $data_table[$key]["idusuario_auditoria"],
                $data_table[$key]["idplantilla_madre_auditoria"],
                $data_table[$key]["idusuario_crea_auditoria"],
                $data_table[$key]["estado_auditoria"],
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                ""
            );
            array_push($arrayAuditoria,$objAuditoria);
        }
        return $arrayAuditoria;
    }else{
        return false;
    }
}
//----------------------------------------------------------------------------------------------
    public static function listadoRolAuditoriaAnclaAsociada($idempresa,$idempresaAsociada)
    {
        $data_source = new DataSource();
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idempresa_ancla_auditoria=".$idempresa." and auditoria.idempresa_asociada_auditoria =".$idempresaAsociada;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function listadoRolAuditoriaAncla($idempresa)
    {
        $data_source = new DataSource();
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idempresa_ancla_auditoria=".$idempresa."  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function listadoRolAuditoriaAsociada($idempresa)
    {
        $data_source = new DataSource();
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idempresa_asociada_auditoria=".$idempresa."  ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function listadoEmpresasEmpresa($idempresa)
    {
        
        $data_source = new DataSource();
        
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idempresa_ancla_auditoria=".$idempresa."  order by auditoria.fecha_programada_auditoria DESC";
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
    public static function listadoEstatus($idempresa)
    {
        
        $data_source = new DataSource();
        
        $sql ="
        select * from empresas_asociadas join empresa on(empresa.idempresarial=empresas_asociadas.idempresa_asociada) join sede on(sede.idempresa=empresas_asociadas.idempresa_asociada)  where empresas_asociadas.idempresa_ancla = ".$idempresa." and estado_empresas_asociadas = 1";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new estatus(
                    $data_table[$key]["ciudad_sede"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["idsede"],
                    $data_table[$key]["idauditoria"],
                    null,
                    null
                );
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
    public static function listadoEstatusAuditorias($idempresa)
    {
        
        $data_source = new DataSource();
        
        $sql ="
        select * from sede left join auditoria on(auditoria.idsede_auditoria=sede.idsede) left JOIN plan_accion on(auditoria.idauditoria=plan_accion.idauditoria_plan_accion) where sede.idsede = ".$idempresa." limit 1";
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new estatus(
                    null,
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["estado_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_realizacion"],
                    null
                );
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
    public static function listadoCompuestoAuditoriaEmpresaAuditor($filtro,$tipo,$estado,$consulta,$idempresa)
    {
        $status ="";
         switch ($filtro) {
            case 'az':
            $status = "order by empresa.nombre_empresa ASC";
            break;
            case 'za':
            $status = "order by empresa.nombre_empresa  DESC";
            break;
            case 'fe':
            $status = "order by auditoria.fecha_programada_auditoria desc";
            break;
         }
         switch ($estado) {
            case 'te':
            $type =" ";
            break;
            
            case 'PRO01':
            $type ="where estado_auditoria = PRO01 ";
            break;
      
            case 'PRO010':
            $type ="where estado_auditoria = PRO010 ";
            break;
            case 'PRO02':
            $type ="where estado_auditoria = PRO02 ";
            break;
            case 'PRO11':
            $type ="where estado_auditoria = PRO11 ";
            break;
            case 'PRO12':
            $type ="where estado_auditoria = PRO12 ";
            break;
            case 'PRO121':
            $type ="where estado_auditoria = PRO121 ";
            break;
            case 'PRO13':
            $type ="where estado_auditoria = PRO13 ";
            break;
            case 'PRO14':
            $type ="where estado_auditoria = PRO14 ";
            break;
        }
        if(is_null($consulta)){
            $busqueda =" ";
        }elseif(!is_null($consulta) && strcmp($type," ")!==0){
            $busqueda="AND  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }elseif(strcmp($type," ")===0){
            $busqueda="where  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }
        
        $data_source = new DataSource();
        //.$type." ".$busqueda." ".$status
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) where auditoria.idusuario_auditoria=".$idempresa."  order by auditoria.fecha_programada_auditoria DESC";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }
    public static function auditoriasCalendarioVerificacion($fecha)
    {
        $array = explode("-",$fecha);
        //print_r($array);
        //print_r(explode('-', $fecha));
        $dias=0;
        switch ( $array[1]) {
                case '1':
                $dias = 31;
                break;
                case '2':
                $dias = 28;
                break;
                case '3':
                $dias = 31;
                break;
                case '4':
                $dias = 30;
                break;
                case '5':
                $dias = 31;
                break;
                case '6':
                $dias = 30;
                break;
                case '7':
                $dias = 31;
                break;
                case '8':
                $dias = 31;
                break;
                case '9':
                $dias = 30;
                break;
                case '10':
                $dias = 31;
                break;
                case '11':
                $dias = 30;
                break;
                case '12':
                $dias = 31;
                break;
                
                
        }
        $fechai = $array[0]."-".$array[1]."-1";
        $fechaf = $array[0]."-".$array[1]."-31";
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria` WHERE auditoria.fecha_programada_auditoria BETWEEN '".$fechai."' and '".$fechaf."' ORDER BY `auditoria`.`fecha_programada_auditoria` ASC ";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
           
      }
   }  
    public static function auditoriaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria` where idauditoria = ".$id;
        //echo "fsdfsdfsdfs ".$sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new auditoria(
                    $data_table[0]["idauditoria"],
                    $data_table[0]["idempresa_ancla_auditoria"],
                    $data_table[0]["idempresa_asociada_auditoria"],
                    $data_table[0]["idsede_auditoria"],
                    $data_table[0]["fecha_programada_auditoria"],
                    $data_table[0]["fecha_cierre_auditoria"],
                    $data_table[0]["idusuario_auditoria"],
                    $data_table[0]["idplantilla_madre_auditoria"],
                    $data_table[0]["idusuario_crea_auditoria"],
                    $data_table[0]["estado_auditoria"],
                    $data_table[0]["objetivo_auditoria"],
                    $data_table[0]["criterios_auditoria"],
                    $data_table[0]["direccion_auditoria"],
                    $data_table[0]["observacion_auditoria"],
                    $data_table[0]["descripcion_auditoria"],
                    $data_table[0]["localidad_auditoria"],
                    $data_table[0]["link_auditoria"],
                    $data_table[0]["descripcion_condiciones_entorno"],
                    $data_table[0]["descripcion_condiciones_interna"],
                    $data_table[0]["actividades_auditoria"],
                    $data_table[0]["conclusion_auditoria"],
                    $data_table[0]["recomendacion_auditoria"]
        );
        //print_r($objEmpresa);
        return $objEmpresa;
    }
    public static function auditoriasSinAprobar()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria` where estado_auditoria = 'NOVALIDADA'";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
      
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
           
      }
    }
    public static function auditoriaItem($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria_item` where idauditoria_item = ".$id;
        //
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new auditoria_item(
                    $data_table[0]["idauditoria_item"],
                    $data_table[0]["idauditoria"],
                    $data_table[0]["iditem_grupo_platilla_auditoria_item"],
                    $data_table[0]["observacion_empresa"],
                    $data_table[0]["observacion_auditor"],
                    $data_table[0]["archivo_evidencia"],
                    $data_table[0]["estado_auditoria_item"]
        );
        
        return $objEmpresa ;
    }
    public static function auditoriaItemPlan($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `detalle_item_plan_accion` where iddetalle_item_plan_accion = ".$id;
        //
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new detalle_item_plan_accion(
                    $data_table[0]["iddetalle_item_plan_accion"],
                    $data_table[0]["idauditoria_item_detalle_item"],
                    $data_table[0]["idplan_accion_detalle_item"],
                    $data_table[0]["accion_realizar"],
                    $data_table[0]["responsable"],
                    $data_table[0]["fecha_realizar"],
                    $data_table[0]["porcentaje_avance"],
                    $data_table[0]["adjunto_evidencia"]
        );
        
        return $objEmpresa ;
    }
    public static function crearAuditoria($auditoria)
    {
        $data_source = new DataSource();
        
        $sql2 = "INSERT INTO auditoria VALUES (
            NULL,
            ".$auditoria->getIdempresa_ancla().",
            ".$auditoria->getIdempresa_asociada().",
            ".$auditoria->getIdsede_auditoria().",
            '".$auditoria->getFecha_programada_auditoria()."',
            NULL,
            ".$auditoria->getIdusuario_auditor().",
            ".$auditoria->getIdplantilla_madre_aditoria().",
            NULL,
            'PRO01',
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL, 
            NULL
            )";
        //echo $sql2;
        //print_r($auditoria);
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        //, array(
        //     ':idempresa_ancla_auditoria' =>$auditoria->getIdempresa_ancla(),
        //     ':idempresa_asociada_auditoria' =>$auditoria->getIdempresa_asociada(),
        //     ':idsede_auditoria' =>$auditoria->getIdsede_auditoria(),
        //     ':fecha_programada_auditoria' =>$auditoria->getFecha_programada_auditoria(),
        //     ':idusuario_auditoria' =>$auditoria->getIdusuario_auditor() ,
        //     ':idplantilla_madre_auditoria' =>$auditoria->getIdplantilla_madre_aditoria(),
        //     ':idusuario_crea_auditoria' =>$auditoria->getIdusuario_crear_auditoria()
        // ));
        return $resultado2;
    }
    public static function modificarAuditoriaReporte($auditoria)
    {
        $data_source = new DataSource();
        //print_r($auditoria);
        $sql2 = "UPDATE  auditoria set
        objetivo_auditoria ='".$auditoria->getObjetivo_auditoria() ."',
        criterios_auditoria ='".$auditoria->getCriterios_auditoria() ."',
        direccion_auditoria ='".$auditoria->getDireccion_auditoria()."',
        observacion_auditoria ='".$auditoria->getObservacion_auditoria() ."',
        descripcion_auditoria ='".$auditoria->getDescripcion_auditoria() ."',
        localidad_auditoria ='".$auditoria->getLocalidad_auditoria()."',
        link_auditoria ='".$auditoria->getLink_auditoria()."',
        descripcion_condiciones_entorno ='".$auditoria->getDescripcion_condiciones_entorno_auditoria()."',
        descripcion_condiciones_interna ='".$auditoria->getDescripcion_condiciones_interna_auditoria() ."',
        actividades_auditoria ='".$auditoria->getActividades_auditoria()."',
        conclusion_auditoria ='".$auditoria->getConclusion_auditoria()."',
        recomendacion_auditoria ='".$auditoria->getRecomendacion_auditoria()."'
        where idauditoria = ".$auditoria->getIdauditoria()."
            ";
        //echo $sql2;
        
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        
        return $resultado2;
    }
    public static function crearAuditoria_item( $auditoria)
    { 
        //print_r( $auditoria);
        //echo "<br>xxxxx".$auditoria-> getIdauditoria();
        $data_source = new DataSource();
        $sql2 = "INSERT INTO auditoria_item VALUES (
            null,
            :idauditoria,
            :iditem_grupo_platilla_auditoria_item,
            '',
            '',
            '',	
            1
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':iditem_grupo_platilla_auditoria_item' =>$auditoria->getIditem_grupo_plantilla_auditoria_item(),
            ':idauditoria' =>$auditoria-> getIdauditoria()
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
   
    public static function modificarEmpresa(empresa $empresa)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE area_tecnica SET
            nombre_empresa=:nombre_empresa,
            nit_empresa=:nit_empresa,
            ciudad_principal_empresa=:ciudad_principal_empresa,
            direccion_empresa=:direccion_empresa,
            pais_empresa=:pais_empresa,
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
        WHERE idempresarial = :idempresarial";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':nit_empresa' =>$empresa->getNit_empresa() ,
            ':ciudad_principal_empresa' =>$empresa->getCiudad_principal_empresa() ,
            ':departamento' =>$empresa->getDepartamento(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
            ':pais_empresa' =>$empresa->getPais_empresa(),
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
    public static function noSeleccionItem($iditem,$estado)
    {
        $data_source = new DataSource();
        //echo "update auditoria_item set estado_auditoria_item=".$estado." WHERE 	idauditoria_item=".$iditem;
        $data_table = $data_source->ejecutarConsulta("update auditoria_item set estado_auditoria_item=".$estado."
      WHERE idauditoria_item=".$iditem);
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
            "SELECT MAX(idempresarial) as 'numero' FROM empresa ");
 
        return $data_table[0]["numero"];
    }
    public static function ultimaAuditoriaRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `auditoria` ORDER BY `idauditoria` DESC limit 1");
 
        return $data_table[0]["idauditoria"];
    }
    public static function verificarNit($nit)
    {
        
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM empresa where nit_empresa='".$nit."'");
 
        return $data_table[0]["numero"];
    }
    public static function listadoGrupoAuditoriaItemNAN($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria_item` join auditoria on(auditoria.idauditoria=auditoria_item.idauditoria) where auditoria_item.idauditoria = ".$id."  ORDER BY `auditoria_item`.`idauditoria_item` ASC";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new  auditoria_item(
                    $data_table[$key]["idauditoria_item"],
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["iditem_grupo_platilla_auditoria_item"],
                    $data_table[$key]["observacion_empresa"],
                    $data_table[$key]["observacion_auditor"],
                    $data_table[$key]["archivo_evidencia"],
                    $data_table[$key]["estado_auditoria_item"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoGrupoAuditoriaItem($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria_item` join auditoria on(auditoria.idauditoria=auditoria_item.idauditoria) where auditoria_item.idauditoria = ".$id." and estado_auditoria_item != 0 ORDER BY `auditoria_item`.`idauditoria_item` ASC";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new  auditoria_item(
                    $data_table[$key]["idauditoria_item"],
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["iditem_grupo_platilla_auditoria_item"],
                    $data_table[$key]["observacion_empresa"],
                    $data_table[$key]["observacion_auditor"],
                    $data_table[$key]["archivo_evidencia"],
                    $data_table[$key]["estado_auditoria_item"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoGrupoAuditoriaItem2($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria_item` join auditoria on(auditoria.idauditoria=auditoria_item.idauditoria) where auditoria_item.idauditoria = ".$id." and estado_auditoria_item != 0 ORDER BY `auditoria_item`.`idauditoria_item` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new  auditoria_item(
                    $data_table[$key]["idauditoria_item"],
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["iditem_grupo_platilla_auditoria_item"],
                    $data_table[$key]["observacion_empresa"],
                    $data_table[$key]["observacion_auditor"],
                    $data_table[$key]["archivo_evidencia"],
                    $data_table[$key]["estado_auditoria_item"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function rubricasCumplidas($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `auditoria_item`  where auditoria_item.idauditoria = ".$id." and estado_auditoria_item = 2 ";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['numero'];
       
    }
    public static function rubricasNoCumplidas($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `auditoria_item`  where auditoria_item.idauditoria = ".$id." and estado_auditoria_item = 3 ";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['numero'];
       
    }
    public static function rubricasEvaludas($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `auditoria_item`  where auditoria_item.idauditoria = ".$id." and (estado_auditoria_item = 3 or  estado_auditoria_item = 2)";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['numero'];
       
    }
    public static function numeroCapitulos($idgrupo)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `auditoria_item`  where 	iditem_grupo_platilla_auditoria_item = ".$idgrupo;
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['numero'];
       
    }
    public static function numeroCapitulosElegidos($idgrupo,$idauditoria)
    {
        
        $data_source = new DataSource();
        
        $sql = "SELECT  * from auditoria_item where idauditoria = ".$idauditoria;
        
        $data_table_1 = $data_source->ejecutarConsulta($sql);
       
        $contador = 0;
        foreach ($data_table_1 as $key => $value) {
            $idItem = $data_table_1[$key]["iditem_grupo_platilla_auditoria_item"];
            $estado = $data_table_1[$key]["estado_auditoria_item"];
            $objItem=plantillaDao::itemId($idItem);
            if(intval($objItem->getIdgrupo_plantilla_item()) == intval($idgrupo) && ($estado != 1 && $estado!=0)){
                $contador++;
            }
        }
        return $contador;
    }
    public static function capitulosElegidosEstado($idgrupo,$idauditoria,$estadoCapitulo)
    {
        
        $data_source = new DataSource();
        
        $sql = "SELECT  * from auditoria_item where idauditoria = ".$idauditoria;
        
        $data_table_1 = $data_source->ejecutarConsulta($sql);
       
        $contador = 0;
        foreach ($data_table_1 as $key => $value) {
            $idItem = $data_table_1[$key]["iditem_grupo_platilla_auditoria_item"];
            $estado = $data_table_1[$key]["estado_auditoria_item"];
            $objItem=plantillaDao::itemId($idItem);
            if(intval($objItem->getIdgrupo_plantilla_item()) == intval($idgrupo) && $estado == $estadoCapitulo ){
                $contador++;
            }
        }
        return $contador;
    }

    //******************************************************* */

    public static function numeroItemsPorEstadoEnAuditoria($idauditoria, $estado)
    {
        
        $data_source = new DataSource();
        
        $sql = "SELECT  count(*) as numero from auditoria_item where idauditoria = ".$idauditoria 
        ." and  estado_auditoria_item=".$estado;
        
        $data_table = $data_source->ejecutarConsulta($sql);
       
        
        return $data_table[0]['numero'];
    }
    //********************************************************* */
    public static function listadoGrupoAuditoriaItemPlanAccion($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `detalle_item_plan_accion`  where idplan_accion_detalle_item = ".$id."  ORDER BY `detalle_item_plan_accion`.`iddetalle_item_plan_accion` ASC ";
        //
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new  detalle_item_plan_accion(
                    $data_table[$key]["iddetalle_item_plan_accion"],
                    $data_table[$key]["idauditoria_item_detalle_item"],
                    $data_table[$key]["idplan_accion_detalle_item"],
                    $data_table[$key]["accion_realizar"],
                    $data_table[$key]["responsable"],
                    $data_table[$key]["fecha_realizar"],
                    $data_table[$key]["porcentaje_avance"],
                    $data_table[$key]["adjunto_evidencia"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function validarAsignacionAuditor($idauditor,$fechaAuditoria)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*)  as 'numero' FROM auditoria join usuario on(auditoria.idusuario_auditoria=usuario.idusuario) where usuario.idusuario = ".$idauditor." and auditoria.fecha_programada_auditoria = '".$fechaAuditoria."' ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        return $data_table[0]['numero'];
       
    }
    public static function estadoModeloStatus($codigo,$idauditoriaAncla)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' 
        FROM auditoria join empresa on (auditoria.idempresa_asociada_auditoria=empresa.idempresarial) 
                       join sede on(auditoria.idsede_auditoria=sede.idsede) 
        WHERE auditoria.idauditoria in( SELECT max(auditoria.idauditoria) as id_auditoria 
                                               FROM auditoria join empresa on (auditoria.idempresa_asociada_auditoria=empresa.idempresarial) 
                                                              join sede on(auditoria.idsede_auditoria=sede.idsede) 
                                        WHERE auditoria.idempresa_ancla_auditoria=".$idauditoriaAncla." 
                                              
                                              
                                        GROUP by auditoria.idempresa_asociada_auditoria, auditoria.idsede_auditoria 
                                        order by empresa.nombre_empresa) 
                                        AND auditoria.estado_auditoria = '".$codigo."'
                                        order by empresa.nombre_empresa ";
        
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['numero'];
       
    }
    public static function estadoModeloStatusTotal($idauditoriaAncla)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' 
        FROM auditoria join empresa on (auditoria.idempresa_asociada_auditoria=empresa.idempresarial) 
                       join sede on(auditoria.idsede_auditoria=sede.idsede) 
        WHERE auditoria.idauditoria in( SELECT max(auditoria.idauditoria) as id_auditoria 
                                               FROM auditoria join empresa on (auditoria.idempresa_asociada_auditoria=empresa.idempresarial) 
                                                              join sede on(auditoria.idsede_auditoria=sede.idsede) 
                                        WHERE auditoria.idempresa_ancla_auditoria=".$idauditoriaAncla." 
                                        GROUP by auditoria.idempresa_asociada_auditoria, auditoria.idsede_auditoria 
                                        order by empresa.nombre_empresa) 
                                        order by empresa.nombre_empresa ";
        
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['numero'];
       
    }
    public static function listadoModeloStatus($idauditoriaAncla)
    {
        
        $data_source = new DataSource();
        $sql ="SELECT auditoria.idauditoria as 'plan' , empresa.idempresarial, empresa.nombre_empresa as 'nombre_empresa', sede.idsede,sede.ciudad_sede as ciudad_sede, auditoria.fecha_programada_auditoria as fecha_programada_auditoria, auditoria.estado_auditoria as estado_auditoria
        FROM auditoria join empresa on (auditoria.idempresa_asociada_auditoria=empresa.idempresarial) 
                       join sede on(auditoria.idsede_auditoria=sede.idsede) 
        WHERE auditoria.idauditoria in( SELECT max(auditoria.idauditoria) as id_auditoria 
                                               FROM auditoria join empresa on (auditoria.idempresa_asociada_auditoria=empresa.idempresarial) 
                                                              join sede on(auditoria.idsede_auditoria=sede.idsede) 
                                        WHERE auditoria.idempresa_ancla_auditoria=".$idauditoriaAncla." 
                                        GROUP by auditoria.idempresa_asociada_auditoria, auditoria.idsede_auditoria 
                                        order by nombre_empresa) 
                                        order by nombre_empresa ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditoria=array();
            foreach ($data_table as $key => $value) {
                
                $objAuditoria =  array(
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["ciudad_sede"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["estado_auditoria"],
                    $data_table[$key]["plan"]
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
           
      }
    }
    public static function validarPlanModeloEstatus($idauditoria)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*)  as 'numero' , fecha_realizacion FROM plan_accion
                WHERE 	idauditoria_plan_accion = ".$idauditoria;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(intval($data_table[0]['numero']) > 0){
            return $data_table[0]['fecha_realizacion'];
        }else{
            return 0;
        }
    }
}