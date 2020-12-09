<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."area.php");
class areaDao
{
    public static function select_area_listado_general()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `area_tecnica` ORDER BY `area_tecnica`.`etiqueta_area_tecnica` ASC ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayArea=array();
            foreach ($data_table as $key => $value) {
                $objArea = new area(
                    $data_table[$key]["idarea_tecnica"],
                    $data_table[$key]["etiqueta_area_tecnica"],
                    $data_table[$key]["descripcion_area_tecnica"]
                );
                array_push($arrayArea,$objArea);
            }
            return $arrayArea;
        }else{
            return false;
        }
    }
    public static function area_tecnicaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `area_tecnica` where idarea_tecnica = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objArea = new area(
            $data_table[0]["idarea_tecnica"],
            $data_table[0]["etiqueta_area_tecnica"],
            $data_table[0]["descripcion_area_tecnica"]
        );
        return $objArea;
    }

    public static function area_tecnicaNombre($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `area_tecnica` where etiqueta_area_tecnica = '".$id."'";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objArea = new area(
            $data_table[0]["idarea_tecnica"],
            $data_table[0]["etiqueta_area_tecnica"],
            $data_table[0]["descripcion_area_tecnica"]
        );
        return $objArea ;
    }


    public static function crearArea(area $area)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO area_tecnica VALUES (
            null,
            etiqueta_area_tecnica,
            descripcion_area _tecnica
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    
    public static function modificarArea(area $area)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE area_tecnica SET
        etiqueta_area_tecnica=:etiqueta_area_tecnica,
        descripcion_area_tecnica=:descripcion_area_tecnica
        WHERE idarea_tecnica = :idarea_tecnica";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':idarea_tecnica' => $getIdarea_tecnica(),
            ':etiqueta_area_tecnica' => $area->getEtiqueta_area_tecnica(),
            ':descripcion_area_tecnica' => $area->getDescripcion_area_tecnica()
        ));
        return $resultado2;
    }
    public function borrarArea($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM area_tecnica
      WHERE idarea_tecnica=:id ", array(':id' => $id));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
}