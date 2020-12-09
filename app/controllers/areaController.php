<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."area.php");
  require_once(PDO_PATH."areaDao.php");
  
class areaController
{
    public static function registrarArea($modelArea){
        return empresaDao::crearArea($modelArea);
    }
    public static function modificarArea($modelArea){
        return empresaDao::modificarArea($modelArea);
    }
    public static function eliminarArea($modelArea){
        return empresaDao::borrarArea($modelArea);
    }
    public static function select_area_listado_general(){
        $objArea = areaDao::select_area_listado_general();
        if($objArea != false){
            echo "  <label for=''><h5 class='card-title titulo'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Área Técnica:</h5></label>
                    <select id='area' name='area' class='form-control titulo'>
                    <option value='null'>Elegir area tecnica / Sin estado</option>";
            foreach ($objArea as $key => $value) {
                echo    "<option class='titulo' value='".$objArea[$key]->getIdarea_tecnica()."'>
                ".$objArea[$key]->getEtiqueta_area_tecnica()." </option>";
            }
            echo     "</select>";
        }else{
            echo "  <label for=''>Area tecnica:</label>
                    <select id='area' name='area' class='form-control'>
                        <option value='null'>SIN AREAS TECNICAS</option>
                    </select>";
        }
    }

    public static function select_area_listado($area){
        $objArea = areaDao::select_area_listado_general();
        $objareaActual = areaDao::area_tecnicaNombre($area);
        
        if($objArea != false){
            echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Área Técnica:</h5></label>
                    <select id='area_' name='area_' class='form-control'>
                    <option value='".$objareaActual->getIdarea_tecnica()."'>".$objareaActual->getEtiqueta_area_tecnica()."'</option>";
            foreach ($objArea as $key => $value) {
                echo    "<option value='".$objArea[$key]->getIdarea_tecnica()."'>
                ".$objArea[$key]->getEtiqueta_area_tecnica()." </option>";
            }
            echo     "</select>";
        }else{
            echo "  <label for=''>Area tecnica:</label>
                    <select id='area' name='area' class='form-control'>
                        <option value='null'>SIN AREAS TECNICAS</option>
                    </select>";
        }
    }

    
    public static function select_area_listado_general2(){
        $objArea = areaDao::select_area_listado_general();
        if($objArea != false){
            echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Area tecnica:</h5></label>
                    <select id='area' name='area' class='form-control'><option value='todos'>TODAS LAS PLANTILLAS</option>";
            // foreach ($objArea as $key => $value) {
            //     echo    "
            //     <option value='".$objArea[$key]->getIdarea_tecnica()."'>
            //     ".$objArea[$key]->getEtiqueta_area_tecnica()." </option>";
            // }
            echo     "</select>";
        }else{
            echo "  <label for=''>Area tecnica:</label>
                    <select id='area' name='area' class='form-control'>
                        <option value='null'>SIN AREAS TECNICAS</option>
                    </select>";
        }
    }
    
}
?>