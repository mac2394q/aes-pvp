<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(MODEL_PATH."usuarios.php");
require_once(MODEL_PATH."registro.php");
require_once(DATABASE_PATH."DataSource.php");
class examenDao
{
    public static function registrarExamen($model){
        $data_source = new DataSource();
        $sql2 = "
        INSERT INTO `registro` (
            `idusuario`,
            `tos`,
            `garganta`,
            `fiebre`,
            `disnea`,
            `cabeza`, 
            `escalofrios_malestar`,
            `goteo_nasal`, 
            `estado_diagnostico`)
        VALUES (
                :idusuario,
                :tos,
                :garganta,
                :fiebre,
                :disnea,
                :cabeza,
                :escalofrios_malestar,
                :goteo_nasal,
                :estado_diagnostico
                )";
            $resultado = $data_source->ejecutarActualizacion($sql2, array(
                ':idusuario' =>$model->getIdusuario(),
                ':tos' =>$model->getTos(),
                ':garganta' =>$model->getGargante() ,
                ':fiebre' =>$model->getFiebre(),
                ':disnea' =>$model->getDisnea(),
                ':cabeza' =>$model->getCabeza(),
                ':escalofrios_malestar' =>$model->getEscalofrios(),
                ':goteo_nasal' =>$model->getGoteo_nasal(),
                ':estado_diagnostico' =>$model->getEstado_diagnostico()
            )
        );
            return $resultado;
    }

    public static function ultimoRegistroExamen(){
        $resultado2 = null;
        $sql = null;
        $data_source = new DataSource();
        $sql = "SELECT MAX(idregistro) as contador FROM registro";
        $resultado2 = $data_source->ejecutarConsulta($sql);
        return $resultado2[0]["contador"];
    }

}
?>