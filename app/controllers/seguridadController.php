<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."area.php");
  require_once(MODEL_PATH."validacion_empresa.php");
  require_once(PDO_PATH."seguridadDao.php");
  
class seguridadController
{

    public static function listadoCertificados(){
        $objEmpresa=seguridadDao::listadoCertificados();
        //print_r($objEmpresa);
        if($objEmpresa != false){
        echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                        role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                    <thead>
                        <tr role='row'>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Fecha de Registro
                            </th> 
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>Documento
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li> Descripción
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>Tipo
                            </th>
                            <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>Estado
                            </th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        ";
                        foreach ($objEmpresa as $key => $value) {
                         
                        
                        echo"
                        
                        <tr role='row' class='even'>
                          <td >
                              <a href='".MODULE_APP_SERVER."seguridad/verFicha.php?id=".$objEmpresa[$key]->getid_validacion_empresa()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a>
                          </td>
                          <td>
                            ".$objEmpresa[$key]->getfecha_registro_validacion_empresa() ." 
                          </td>
                          <td >
                            ".$objEmpresa[$key]->getdocumento_validacion_empresa()."
                          </td>
                          <td class='reorder sorting_1'>
                            ".$objEmpresa[$key]->getconcepto_validacion_empresa()."
                          </td>
                          <td class='reorder sorting_1'>
                            ".$objEmpresa[$key]->getestado_validacion_empresa()."
                          </td>
                          <td >
                            <span class='badge badge-success'>ACTIVO</span>
                          </td>
                        </tr>";
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
                        <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay empresas registradas con la consulta anterior</p>
                    </div>
                </div>
            </div>
            ";
        }
    }


    public static function listadoCertificados2($tipo){
      $objArea = seguridadDao::listadoCertificados2($tipo);
      if($objArea != false){
          echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Certificación          :</h5></label>
                  <br><br>
                  <select id='".$tipo."' name='".$tipo."' class='form-control'>
                  <option value='0'>Elegir Tipo</option>";
          foreach ($objArea as $key => $value) {
              echo    "<option value='".$objArea[$key]->getid_validacion_empresa()."'>
              ".$objArea[$key]->getdocumento_validacion_empresa()." </option>";
          }
          echo     "</select>";
      }else{
          echo "  <label for=''>Tipo:</label>
                  <select id='tipo' name='tipo' class='form-control'>
                      <option value='null'>Sin certificaciones agregadas</option>
                  </select>";
      }
  }





}