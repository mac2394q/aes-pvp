<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."sede.php");
  require_once(PDO_PATH."empresaDao.php");
  require_once (CONTROLLERS_PATH."areaController.php");
  
class sedeController
{
    public static function objSede($idsede){
        return empresaDao::sedeId($idsede);
    }


  public static function listadoSede(){
    $objplantilla = empresaDao::listadoSede();
    //print_r($objplantilla);
    if($objplantilla != false){
      
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Sedes:</h5></label>
                <select id='plantilla' name='plantilla' class='form-control'>
                ";                
        foreach ($objplantilla as $key => $value) {     
            echo    "<option value='".$objplantilla[$key]->getIdsede()."'>
            ".$objplantilla[$key]->getCiudad_sede()." </option>";
            
        }
        
        echo     "</select>";
    }else{
        echo "  <label for=''>Plantillas PVP:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN PLANTILLA</option>
                </select>";
    }
}
    public static function listadoSimpleEmpresas($filtro,$area,$estado,$consulta,$idempresa){
        $objEmpresa=empresaDao::listadoSedeEmpresa($idempresa);
        //print_r($objEmpresa);
        if($objEmpresa!= false){
        echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                        role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                    <thead>
                        <tr role='row'>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Direccion
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Ciudad
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li> Cantidad de procesos
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li> Contacto principal
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li> Cargo
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='group'>
                          <td colspan='8'>
                            <h6 class='mb-0'>Ultima actualizacion del listado: 
                                  <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                  <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                             </h6>
                          </td>
                        </tr>";
                        foreach ($objEmpresa as $key => $value) {
                            $nombre = "";
                            $rol ="";
                            $objSede=empresaDao::contactosSede($objEmpresa[$key]->getIdsede());
                            if($objSede != false){
                                $nombre =$objSede[0]->getNombre_contacto();
                                $rol = $objSede[0]->getCargo_contacto();

                            }

                        echo"
                        <tr role='row' class='even'>
                        <td><a href='verFichaSede.php?id=".$objEmpresa[$key]->getIdsede()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                            <td class='reorder sorting_1'>
                              ".$objEmpresa[$key]->getDireccion_sede()."
                            </td>
                            <td class='reorder sorting_1'>
                            ".$objEmpresa[$key]->getCiudad_sede()."
                            </td>
                            <td class='reorder sorting_1'>
                            ".$objEmpresa[$key]->getCantidad_procesos_sede()."
                            </td>
                            <td class='reorder sorting_1'>
                            ".$nombre."
                            </td>
                            <td class='reorder sorting_1'>
                            ".$rol ."
                            </td>";
                        echo"    
                            
                        </tr>
                        ";
                        
                        }
                        echo"
                    </tbody>
                </table>";
        }else{
        
      echo "
            <div class='bs-callout-pink callout-square callout-transparent mt-1'>
                <div class='media align-items-stretch'>
                    <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                        <i class='fa fa-exclamation-triangle text-white'></i>
                    </div>
                    <div class='media-body p-1'>
                        <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay sede registradas para la empresa</p>
                    </div>
                </div>
            </div>
            ";
        }
    }
    
    
    
}
?>
