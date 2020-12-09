<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."area.php");
  require_once(MODEL_PATH."certificado.php");
  require_once(PDO_PATH."empresaDao.php");
  
class empresaController
{
    public static function retornarVista($url){
       
        echo  "<script>window.location.replace('".$url."');</script> ";
         
    }

    public static function registrarEmpresa($modelEmpresa){
        return empresaDao::crearEmpresa($modelEmpresa);
    }
    public static function registrarSede($modelSede){
        return empresaDao::crearSede($modelSede);
    }

    public static function registrarGrupo($etiqueta){
        return empresaDao::registrarGrupo($etiqueta);
    }


    public static function registrarContacto($modelSede){
        return empresaDao::crearContacto($modelSede);
    }
    public static function ultimaEmpresaRegistrada(){
        return empresaDao::ultimaEmpresaRegistrada();
    }

    public static function nEmpresas(){
        return empresaDao::nEmpresas();
    }

    public static function nEmpresasEstados($estado){
        return empresaDao::nEmpresasEstados($estado);
    }

    


    public static function ultimaSedeRegistrada(){
        return empresaDao::ultimaSedeRegistrada();
    }

    
    public static function verificarNit($nit){
        return empresaDao::verificarNit($nit);
    }
    public static function registrarCertificado($modelCertificado){
        return empresaDao::crearCertificado($modelCertificado);
    }
    public static function eliminarCertificado($idCertificado){
        return empresaDao::borrarCertificado($idCertificado);
    }
    public static function modificarEmpresa($modelEmpresa){
        return empresaDao::modificarEmpresa($modelEmpresa);
    }
    public static function objEmpresa($idempresa){
        return empresaDao::empresaId($idempresa);
    }

    public static function grupoEmpresarial($id){
        return empresaDao::grupoEmpresarial($id);
    }


    public static function habilitarEmpresa($idEmpresa){
        return empresaDao::habilitarEmpresa($idEmpresa);
    }
    public static function inhabilitarEmpresa($idEmpresa){
        return empresaDao::inhabilitarEmpresa($idEmpresa);
    }

    public static function asociarEmpresa($ancla,$negocio){
        return empresaDao::asociarEmpresa($ancla,$negocio);
    }
    public static function desasociarEmpresa($ancla,$negocio){
        return empresaDao::desasociarEmpresa($ancla,$negocio);
    }

    public static function listadoSimpleEmpresas($filtro,$area,$estado,$consulta){
        $objEmpresa=empresaDao::listadoSimpleEmpresas($filtro,$area,$estado,$consulta);
        //print_r($objEmpresa);
        if($objEmpresa!= false){
        echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                        role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                    <thead>
                        <tr role='row'>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Nit</th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Ciudad - País
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li>  Sector
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='group'>
                          <td colspan='8'>
                            <h6 class='mb-0'>Ultima Actualizacion del Listado: 
                                  <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                  <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                             </h6>
                          </td>
                        </tr>";
                        foreach ($objEmpresa as $key => $value) {
                        echo"
                        <tr role='row' class='even'>
                            <td><a href='".MODULE_APP_SERVER."empresa/verFicha.php?id=".$objEmpresa[$key]->getIdempresarial()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                            <td class='parrafo'>
                            <a href='".MODULE_APP_SERVER."empresa/verFicha.php?id=".$objEmpresa[$key]->getIdempresarial()."' class='dropdown-item'>".$objEmpresa[$key]->getNit_empresa()."</a>
                             
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getNombre_empresa()."
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getCiudad_principal_empresa()."-".$objEmpresa[$key]->getPais_empresa()."
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getIdarea_tecnica_empresa()."
                            </td>";
                            if($objEmpresa[$key]->getEstado_empresa() == 1){
                                echo " <td><span class='badge badge-default badge-success'>Activo</span></td>";
                            }else{
                                echo " <td><span class='badge badge-default badge-danger'>Inactivo</span></td>";
                            }
                            
                            echo "
                            
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


    public static function listadoSimpleEmpresasGrupoEmpresarial($idgrupo){
        $objEmpresa=empresaDao::listadoEmpresasGrupoEmpresarial($idgrupo);
        //print_r($objEmpresa);
        if($objEmpresa!= false){
        echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                        role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                    <thead>
                        <tr role='row'>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  VER
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> NIT</th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Pais -
                              Ciudad
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li>  Sector
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
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
                        echo"
                        <tr role='row' class='even'>
                            <td><a href='".MODULE_APP_SERVER."empresa/verFicha.php?id=".$objEmpresa[$key]->getIdempresarial()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                            <td class='parrafo'>
                            <a href='".MODULE_APP_SERVER."empresa/verFicha.php?id=".$objEmpresa[$key]->getIdempresarial()."' class='dropdown-item'>".$objEmpresa[$key]->getNit_empresa()."</a>
                             
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getNombre_empresa()."
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getCiudad_principal_empresa()."-".$objEmpresa[$key]->getPais_empresa()."
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getIdarea_tecnica_empresa()."
                            </td>";
                            if($objEmpresa[$key]->getEstado_empresa() == 1){
                                echo " <td><span class='badge badge-default badge-success'>ACTIVO</span></td>";
                            }else{
                                echo " <td><span class='badge badge-default badge-danger'>INACTIVO</span></td>";
                            }
                            
                            echo "
                            
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


    public static function listadoSimpleEmpresasAsociar($idempresa){
        $objEmpresa=empresaDao::listadoSimpleEmpresasAsociar($idempresa);
        //print_r($objEmpresa); 
        // <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li>  Auditorias propias
        //                     </th>
        if($objEmpresa!= false){
        echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                        role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                    <thead>
                        <tr role='row'>

                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li> Ciudad  -
                            País
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li>  Sector
                            </th>

                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li>  Auditorias como Asociada 
                            </th>
                            <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-minus-circle'></li>  Desasociar Empresa
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
                        foreach ($objEmpresa as $key => $value) {
                        echo"
                        <tr role='row' class='even'>
                            
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getNombre_empresa()."
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getCiudad_principal_empresa()."-".$objEmpresa[$key]->getPais_empresa()."
                            </td>
                            <td class='parrafo'>
                              ".$objEmpresa[$key]->getIdarea_tecnica_empresa()."
                            </td>";
                            //<td><a href='".MODULE_APP_SERVER."auditorias/auditoriasEmpresaAsociada.php?id=".$idempresa."&id2=".$objEmpresa[$key]->getIdempresarial()."' class='btn capa text-white'><i class='fa fa-book-open fa-2x'></i> </a></td>
                            echo "
                            <td><a href='".MODULE_APP_SERVER."empresa/auditoriasEmpresaAnclaAsociada.php?id=".$idempresa."&id2=".$objEmpresa[$key]->getIdempresarial()."' class='btn capa text-white round '><i class='fa fa-clipboard-list fa-2x'></i> </a></td>
                            <td><a href='".MODULE_APP_SERVER."empresa/core/desasociarEmpresa.php?id=".$idempresa."&id2=".$objEmpresa[$key]->getIdempresarial()."' class='btn btn-danger round '><i class='fa fa-ban fa-2x'></i> </a></td>
                        </tr>";
                        }
                        echo"
                    </tbody>
                </table>";
        }else{
        
      echo "<div class='col-md-12'>
      <div class='bs-callout-warning callout-border-left mt-1 p-1'>
                            <strong>No hay empresas asociadas!</strong>
                            <p>Actualmente esta no presenta asociadas de negocio puede asociar nuevas empresas o desasociar segun sea el caso .</p>
                        </div>
        </div>
            ";
        }
    }
    public static function listadoSimpleGrupos($filtro,$consulta){
      $objEmpresa=empresaDao::listadoGrupoEmpresarial($filtro,$consulta);
      //print_r($objEmpresa);
      if($objEmpresa!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Numero de Empresas
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
                          </th>
                          
                      </tr>
                  </thead>
                  <tbody>";
                      foreach ($objEmpresa as $key => $value) {
                      echo"
                      
                      <tr role='row' class='even'>
                          <td class='parrafo'><a href='verFichaGrupo.php?id=".$objEmpresa[$key]->getIdgrupo_empresarial()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                          <td class='parrafo'>
                             ".$objEmpresa[$key]->getNombre_grupo_empresarial()."
                          </td>
                          <td class='parrafo'>
                            ".empresaDao::nEmpresasGrupoEmpresarial($objEmpresa[$key]->getIdgrupo_empresarial())."
                          </td>
                          <td class='parrafo'>
                              <span class='badge badge-default badge-success'>ACTIVO</span>
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
                     <p>Actualmente no hay grupos empresariales registrados </p>
                  </div>
              </div>
          </div>
          ";
      }
  }


  public static function listadoSimpleGruposEmpresa($filtro,$consulta){
    $objEmpresa=empresaDao::listadoGrupoEmpresarial($filtro,$consulta);
    //print_r($objEmpresa);
    if($objEmpresa!= false){
    echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Numero de empresas
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Acciones
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
                    echo"
                    
                    <tr role='row' class='even'>
                        <td class='parrafo'>
                           ".$objEmpresa[$key]->getNombre_grupo_empresarial()."
                        </td>
                        <td class='parrafo'>
                          1
                        </td>
                        <td class='parrafo'>
                            <span class='badge badge-default badge-success'>ACTIVO</span>
                        </td>
                        <td class='parrafo'><a href='verFichaGrupo.php?id=".$objEmpresa[$key]->getIdgrupo_empresarial()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
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


  public static function listadoSimpleGruposAsociar($filtro,$area,$estado,$consulta){
    $objEmpresa=empresaDao::listadoSimpleEmpresas($filtro,$area,$estado,$consulta);
    //print_r($objEmpresa);
    if($objEmpresa!= false){
    echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Numero de empresas
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Acciones
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
                    echo"
                    <tr role='row' class='even'>
                        <td class='parrafo'>
                          GRUPO BBVA
                        </td>
                        <td class='parrafo'>
                         1
                        </td>
                        <td class='parrafo'>
                            <td><span class='badge badge-default badge-primary'>ACTIVO</span>
                        </td>
                        <td class='parrafo'><a href='verFichaSede.php' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                    </tr>
                    <tr role='row' class='even'>
                        <td class='parrafo'>
                           GRUPO CARVAJAL
                        </td>
                        <td class='parrafo'>
                          1
                        </td>
                        <td class='parrafo'>
                            <td><span class='badge badge-default badge-success'>ACTIVO</span>
                        </td>
                        <td class='parrafo'><a href='verFichaGrupo.php?id=".$objEmpresa[$key]->getIdempresarial()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
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

  public static function listadoEmpresas($idempresa){
    $objplantilla = empresaDao::listadoEmpresas($idempresa);
    //print_r($objplantilla);
    if($objplantilla != false){
      
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> Empresa :</h5></label>
                <select id='empresaA' name='empresaA' class='form-control'>
                ";                
        foreach ($objplantilla as $key => $value) {     
            echo    "<option value='".$objplantilla[$key]->getIdempresarial()."'>
            ".$objplantilla[$key]->getNombre_empresa()." </option>";
            
        }
        
        echo     "</select>";
    }else{
        echo "  <label for=''>Empresas:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN EMPRESAS PARA ASOCIAR</option>
                </select>";
    }
  }

  public static function listadoEmpresasSelect($name,$etiqueta){
    $objplantilla = empresaDao::listadoSimpleEmpresas("az",$idArea,"te",null);
    //print_r($objplantilla);
    if($objplantilla != false){
      
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-warehouse'></li> <span class='text-danger'>*</span>".$etiqueta."</h5></label>
                <select id='".$name."' name='".$name."' class='form-control' title=''>
                <option value='null'>Elegir empresa</option>";                
        foreach ($objplantilla as $key => $value) {     
            echo    "<option value='".$objplantilla[$key]->getIdempresarial()."'>
            ".$objplantilla[$key]->getNombre_empresa()." </option>";
            
        }
        
        echo     "</select>";
    }else{
        echo "  <label for=''>Empresas:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN EMPRESAS PARA ASOCIAR</option>
                </select>";
    }
  }

  public static function listadoEmpresasSelect2($name,$etiqueta,$idempresa){
    $objplantilla = empresaDao::listadoSimpleEmpresasAsociar($idempresa);
    //print_r($objplantilla);
    if($objplantilla != false){
      
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-warehouse'></li> <span class='text-danger'>*</span>".$etiqueta."</h5></label>
                <select id='".$name."' name='".$name."' class='form-control'>
                ";                
        foreach ($objplantilla as $key => $value) {     
            echo    "<option value='".$objplantilla[$key]->getIdempresarial()."'>
            ".$objplantilla[$key]->getNombre_empresa()." </option>";
            
        }
        
        echo     "</select>";
    }else{
        echo "  <label for=''>Empresas:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN EMPRESAS PARA ASOCIAR</option>
                </select>";
    }
  }


  public static function listadoEmpresaSedes($idempresa){
    $objplantilla = empresaDao::listadoSedeEmpresa($idempresa);
    //print_r($objplantilla);
    if($objplantilla != false){
      
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span>Sede de empresa  :</h5></label>
                <select id='sede' name='sede' class='form-control'>
                ";                
        foreach ($objplantilla as $key => $value) {     
            echo    "<option value='".$objplantilla[$key]->getIdsede()."'>
            ".$objplantilla[$key]->getCiudad_sede()." - ".$objplantilla[$key]->getDireccion_sede()." </option>";
            
        }
        
        echo     "</select>";
    }else{
        echo "  <label for=''>Empresas:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN SEDES PARA ASOCIAR</option>
                </select>";
    }
  }
    public static function certificadosEmpresa($idempresa){
        $objCertificados = empresaDao::certificadosEmpresa($idempresa);
        //print_r($objCertificados);
        if($objCertificados != false){
            foreach ($objCertificados as $key => $value) {
              
            echo "<div >
            <div  style=''>
                <form class='form row'>
                    <div class='form-group mb-1  col-md-2'>
                        <label for=''><span
                                class='text-danger'>*</span>Certificado:</label>
                        <br>
                        <select class='form-control' name='certificado'>
                            <option value='".$objCertificados[$key]->getEtiqueta_certificado()."'>".$objCertificados[$key]->getEtiqueta_certificado()." </option>
                            <option value='ISO 18001'>ISO 18001 </option>
                            <option value='ISO 45001'> ISO 45001</option>
                            <option value='ISO 14001'> ISO 14001</option>
                            <option value='ISO 28001'>ISO 28001</option>
                            <option value='OTRO'>OTRO</option>
                        </select>
                    </div>
                    <div class='form-group mb-1  col-md-2'>
                        <label for='email-addr'><span class='text-danger'>*</span>
                            Entidad:</label>
                        <br>
                        <select class='form-control' i name='entidad'>
                            <option value='".$objCertificados[$key]->getEntidad_certificado()."'>".$objCertificados[$key]->getEntidad_certificado()."</option>
                            <option value='ICONTEC'>ICONTEC</option>
                            <option value='SGS'>SGS </option>
                            <option value='AES'> AES</option>
                            <option value='COTECNA'> COTECNA</option>
                            <option value='BERITAS'>BERITAS</option>
                            <option value='OTRO'>OTRO</option>
                        </select>
                    </div>
                    <div class='form-group mb-1  col-md-2'>
                        <label for=''><span class='text-danger'>*</span> Serial /
                            Codigo</label>
                        <br>
                        <input type='text' class='form-control' name='codigo'
                            placeholder='. . .' value='".$objCertificados[$key]->getCodigo_certificado()."'>
                    </div>
                    <div class='form-group mb-1  col-md-2'>
                        <label for=''><span class='text-danger'>*</span> Fecha
                            certificado</label>
                        <br>
                        <input type='date' id='timesheetinput3' class='form-control'
                            name='date' value='".$objCertificados[$key]->getFecha_certificado()."'>
                    </div>

                   
                    <div class='form-group mb-1  col-md-2'>
                        <a  href='".MODULE_APP_SERVER."empresa/core/eliminarCertificado.php?id=".$objCertificados[$key]->getIdcertificado()."&id2=".$idempresa."'
                            class='btn btn-danger waves-effect waves-light'
                            > <i class='fa fa-minus-square '></i>
                            Eliminar</a>
                    </div>
                </form>
                <hr>
            </div>
        </div>";
          
        }
        }else{
            echo "<div >
            <div  style=''>
                <form class='form row'>
                    <div class='form-group mb-1  col-md-8'>
                        <label for=''><span
                                class='text-danger titulo'><h2 >Actualmente la empresa no posee certificado vigentes  </h2></span></label>
                        <br>
                    </div>
                    
                </form>
                <hr>
            </div>
        </div>";
        }

    }



    public static function contactosSede($idempresa){
        $objCertificados = empresaDao::contactosSede($idempresa);
        //print_r($objCertificados);
        if($objCertificados != false){
            foreach ($objCertificados as $key => $value) {
              
            echo "<div >
            <div  style=''>
            <form class='form row'>
            <div class='form-group mb-1 col-sm-12 col-md-4'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Contacto
                    sede</label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='contacto' value='".$objCertificados[$key]->getNombre_contacto()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-3'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Cargo </label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='cargo' value='".$objCertificados[$key]->getCargo_contacto()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-3'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Telefono
                    Movil - Fijo -
                    Ext </label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='telefonos' value='".$objCertificados[$key]->getTelefono_contacto()."'>
            </div>
            <div class='form-group col-sm-12 col-md-2 text-center mt-2'>
                <button type='button'
                    class='btn btn-danger waves-effect waves-light'
                    data-repeater-delete='' id='eliminarCertificado'> <i
                        class='ft-x'></i>
                    Eliminar</button>
            </div>
        </form>
                <hr>
            </div>
        </div>";
          
        }
        }else{
            echo "<div >
            <div  style=''>
                <form class='form row'>
                    <div class='form-group mb-1  col-md-8'>
                        <label for=''><span
                                class='text-danger'>Actualmente la sede no posee contactos agregados</span></label>
                        <br>
                    </div>
                    
                </form>
                <hr>
            </div>
        </div>";
        }

    }

    public static function validacionEmpresa($idempresa,$tipo){
        $objCertificados = empresaDao::contactosSede($idempresa);
        //print_r($objCertificados);
        if($objCertificados != false){
            foreach ($objCertificados as $key => $value) {
              
            echo "<div >
            <div  style=''>
            <form class='form row'>
            <div class='form-group mb-1 col-sm-12 col-md-4'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Contacto
                    sede</label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='contacto' value='".$objCertificados[$key]->getNombre_contacto()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-3'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Cargo </label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='cargo' value='".$objCertificados[$key]->getCargo_contacto()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-3'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Telefono
                    Movil - Fijo -
                    Ext </label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='telefonos' value='".$objCertificados[$key]->getTelefono_contacto()."'>
            </div>
            <div class='form-group col-sm-12 col-md-2 text-center mt-2'>
                <button type='button'
                    class='btn btn-danger waves-effect waves-light'
                    data-repeater-delete='' id='eliminarCertificado'> <i
                        class='ft-x'></i>
                    Eliminar</button>
            </div>
        </form>
                <hr>
            </div>
        </div>";
          
        }
        }else{
            echo "<div >
            <div  style=''>
                <form class='form row'>
                    <div class='form-group mb-1  col-md-8'>
                        <label for=''><span
                                class='text-danger'>Actualmente no hay documentos sobre la validacion de  la empresa</span></label>
                        <br>
                    </div>
                    
                </form>
                <hr>
            </div>
        </div>";
        }

    }


    public static function listadoDocumentosEmpresa($idempresa,$empresa){
        $objCertificados = empresaDao::listadoDocumentosEmpresa($idempresa,$empresa);
        //print_r($objCertificados);
        if($objCertificados != false){
            foreach ($objCertificados as $key => $value) {
              
            echo "<div >
            <div  style=''>
            <form class='form row'>
            <div class='form-group mb-1 col-sm-12 col-md-2'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Fecha de registro</label>
                <input type='date' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='contacto' value='".$objCertificados[$key]->getfecha_registro_validacion_empresa()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-2'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Documento </label><br>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='cargo' value='".$objCertificados[$key]->getdocumento_validacion_empresa()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-4'>
                <label for='projectinput3'><span
                        class='text-danger'>*</span>
                    </span> Descripcion </label>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='telefonos' value='".$objCertificados[$key]->getconcepto_validacion_empresa()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-2'>
                <label for='email-addr'><span
                        class='text-danger'>*</span>
                    Tipo:</label>
                <br>
                <input type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='telefonos' value='".$objCertificados[$key]->getestado_validacion_empresa()."'>
            </div>
            <div class='form-group col-sm-12 col-md-2 text-center mt-2'>
                <button type='button'
                    class='btn btn-danger waves-effect waves-light'
                    data-repeater-delete='' id='eliminarCertificado'> <i
                        class='fa fa-times fa-2x'></i>
                    </button>
            </div>
        </form>
        <br>
            </div>
        </div>";
          
        }
        }else{
            echo "<div >
            <div  style=''>
                <form class='form row'>
                    <div class='form-group mb-1  col-md-8'>
                        <label for=''><span
                                class='text-danger'>Actualmente no hay documentos adjunto sobre : ".$empresa."</span></label>
                        <br>
                    </div>
                    
                </form>
                <hr>
            </div>
        </div>";
        }

    }


    public static function listadoDocumentosEmpresaValidacion($idempresa,$empresa){
        $objCertificados = empresaDao::listadoDocumentosEmpresa($idempresa,$empresa);
        //print_r($objCertificados);
        if($objCertificados != false){
            foreach ($objCertificados as $key => $value) {
            
            
            $url = DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/".$objCertificados[$key]->getidempresa_asignacion()."_".$objCertificados[$key]->getidvalidacion_empresa()."_".$empresa.".pdf";
            $objValidacion = seguridadDao::validacionId($objCertificados[$key]->getidvalidacion_empresa());
            //echo $empresa;
            if($objValidacion->getestado_validacion_empresa() == $empresa){
                echo "<div >
            <div  style=''>
            <form class='form row'>
            <div class='form-group mb-1 col-sm-12 col-md-3'>
                <label for='projectinput3'>
                    Tipo de Documento 
                </label>
                <br><br>
                <input readonly type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='cargo' value='".$objValidacion->getdocumento_validacion_empresa()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-5'>
                <label for='projectinput3'>
                    Descripcion del Documento
                </label>
                <br><br>
                <input readonly type='text' id='projectinput3'
                    class='form-control' placeholder='. . . '
                    name='telefonos' value='".$objCertificados[$key]->getconcepto()."'>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-2'>
                
                <br><br>
                <a href='".$url."' class='btn btn-info round '><li class='fa fa-file-pdf fa-2x'></li>&nbsp;&nbsp;Ver Documento</a>
            </div>
            <div class='form-group mb-1 col-sm-12 col-md-2'>
                
                <br><br>
                <a href='".$url."' class='btn btn-warning round '><li class='fa fa-ban fa-2x'></li>&nbsp;&nbsp;Eliminar Documento</a>
            </div>
            
            
        </form>
        <br>
            </div>
        </div>";

            }
          
        }
        }else{
            echo "<div >
            <div  style=''>
                <form class='form row'>
                    <div class='form-group mb-1  col-md-8'>
                        <label for=''><span
                                class='text-danger'>Actualmente no hay documentos adjunto sobre : ".$empresa."</span></label>
                        <br>
                    </div>
                    
                </form>
                <hr>
            </div>
        </div>";
        }

    }


    


    
    
    
}
?>
