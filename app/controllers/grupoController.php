<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."grupo.php");
  require_once(PDO_PATH."grupoDao.php");
  
class grupoController
{
    public static function select_grupo(){
        $objGrupo = grupoDao::select_grupo();
        //print_r($objGrupo);
        if($objGrupo != false){
            echo "  <label for=''><h5 class='card-title'><span class='text-danger'>*</span> Grupo Empresarial:</h5></label>
                    <select id='grupo' name='grupo' class='form-control'>
                    ";
            foreach ($objGrupo as $key => $value) {
                echo    "<option value='".$objGrupo[$key]->getIdgrupo_empresarial()."'>
                ".$objGrupo[$key]->getNombre_grupo_empresarial()." </option>";
            }
            echo     "<option value='NULL'>SIN GRUPOS EMPRESARIAL</option>
                    </select>";
        }else{
            echo "  <label for=''><span class='text-danger'>*</span> Grupo Empresarial:</label>
                    <select id='grupo' name='grupo' class='form-control'>
                        <option value='NULL'>SIN GRUPOS EMPRESARIAL</option>
                    </select>";
        }
    }
    public static function select_grupEmpresa($id){
        $objGrupo = grupoDao::select_grupo();
        
        //print_r($objGrupo);
        if($objGrupo != null){
            echo "  <label for=''><h5 class='card-title'><span class='text-danger'>*</span> Grupo Empresarial:</h5></label>
                    <select id='grupo' name='grupo' class='form-control'>";
            if(!is_null($id)){
            $grupoEmpresa = grupoDao::grupoId($id);        
            echo    "<option value='".$grupoEmpresa->getIdgrupo_empresarial()."'>".$grupoEmpresa->getNombre_grupo_empresarial()."</option>";
            }else{
                echo "<option value='NULL'>SIN GRUPOS EMPRESARIAL</option>";
            }
            foreach ($objGrupo as $key => $value) {
                echo    "<option value='".$objGrupo[$key]->getIdgrupo_empresarial()."'>
                ".$objGrupo[$key]->getNombre_grupo_empresarial()." </option>";
            }
            echo     "<option value='NULL'>SIN GRUPOS EMPRESARIAL</option>
                    </select>";
        }else{
            echo "  <label for=''><span class='text-danger'>*</span> Grupo Empresarial:</label>
                    <select id='grupo' name='grupo' class='form-control'>
                        <option value='NULL'>SIN GRUPOS EMPRESARIAL</option>
                    </select>";
        }
    }
    
}
?>
