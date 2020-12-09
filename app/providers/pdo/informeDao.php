<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");

class informeDao
{
    public static function listadoClientes($fechaI,$fechaF)
    {
        $data_source = new DataSource();
        $sql ="SELECT emp.idempresarial as 'id', emp.nombre_empresa as 'nombre', emp.direccion_empresa as 'direccion', emp.ciudad_principal_empresa as 'ciudad', emp.representante_sistema_gestion as 'contacto', area.etiqueta_area_tecnica as 'area',
        sede.ciudad_sede as 'ciudad'
        FROM auditoria as aud join empresa as emp on ( aud.idempresa_asociada_auditoria= emp.idempresarial)
        join area_tecnica as area on (emp.idarea_tecnica_empresa= area.idarea_tecnica)
        join sede on (aud.idsede_auditoria=sede.idsede)
        WHERE
        aud.fecha_programada_auditoria BETWEEN '".$fechaI."' and '".$fechaF."' order by emp.nombre_empresa asc
        ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            return $data_table ;
        }else{
            return false;
        }
    }


    public static function trazabilidad($fechaI,$fechaF,$buscar)
    {
        $data_source = new DataSource();
        $sql ="SELECT aud.idauditoria as 'id', sede.direccion_sede as 'direccion', sede.ciudad_sede as 'ciudad', aud.fecha_programada_auditoria as 'auditoria', plan.fecha_realizacion as 'plan',
                      usuario.nombre_usuario as 'nombre', ancla.nombre_empresa as 'ancla'
        FROM auditoria as aud left join plan_accion as plan ON (aud.idauditoria=plan.idauditoria_plan_accion)
        join empresa as emp on (aud.idempresa_asociada_auditoria=emp.idempresarial)
        join sede on (aud.idsede_auditoria=sede.idsede)
        join usuario on (usuario.idusuario=aud.idusuario_auditoria)
        join empresa as ancla on (aud.idempresa_ancla_auditoria=ancla.idempresarial)
        WHERE emp.nombre_empresa='".$buscar."'
        and aud.fecha_programada_auditoria BETWEEN '".$fechaI."' and '".$fechaF."'
        ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            return $data_table ;
        }else{
            return false;
        }
    }


    public static function porcentajeCumplimientoAuditoria($idauditoria)
    {
        $data_source = new DataSource();
        $sql =" select count(*)  as 'numero' from auditoria_item
        WHERE auditoria_item.estado_auditoria_item =2 and auditoria_item.idauditoria=".$idauditoria;

        $sql2 ="select count(*)  as 'numero2' from auditoria_item
        WHERE auditoria_item.estado_auditoria_item in (2,3) and auditoria_item.idauditoria=".$idauditoria;

        $data_table = $data_source->ejecutarConsulta($sql);
        $data_table2 = $data_source->ejecutarConsulta($sql2);
      

        if($data_table2[0]['numero2'] ==0){
            return 0 ;
        }else{
            $r = ($data_table[0]['numero'] / $data_table2[0]['numero2']);
            return intval(  floatval($r) *100);
        }
    }


    public static function ultimaFechaAuditoria($id)
    {
        $data_source = new DataSource();
        $sql ="SELECT emp.idempresarial, emp.nombre_empresa, max(aud.fecha_programada_auditoria) as 'fechaMax'
        FROM auditoria as aud join empresa as emp on ( aud.idempresa_asociada_auditoria= emp.idempresarial)
        WHERE
        emp.idempresarial=".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            return $data_table ;
        }else{
            return "0000/00/00";
        }
    }




}