<?php 
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(PDO_PATH."informeDao.php");
require_once(PDO_PATH."empresaDao.php");

class informeController
{
    public static function listadoClientes($fechai,$fechaf){

        $obj = informeDao::listadoClientes($fechai,$fechaf);
        //print_r($obj);
        if($obj!= false){
            
            echo   "
            <div class='col-md-12'>
            <a  href='core/generarCSV.php?fi=".$fechai."&ff=".$fechaf."' class='btn round text-white capa waves-effect waves-light' >
                <li class='fa fa-file-csv fa-3x'></li> &nbsp;&nbsp;Generar
            </a>
        </div>
            
            <table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                            role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                        <thead>
                            <tr role='row'>
                                <th class='sorting_disabled' rowspan='1' colspan='1' >  Nombre Empresa
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' >  Direccion Empresa
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' >Ciudad Principal
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' > Contacto
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' >Area Tecnica
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' >Fecha ultima Auditoria
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' >Sedes
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
                            $comp =0;
                            for ($i=0; $i <count($obj) ; $i++) {
                           
                            echo"
                            <tr role='row' class='even'>

                              <td class='reorder sorting_1'>
                                ".$obj[$i]['nombre']." 
                              </td>
                              <td class='reorder sorting_1'>
                                ".$obj[$i]['direccion']."
                              </td>
                              <td class='reorder sorting_1'>
                                ".$obj[$i]['ciudad']."
                              </td>
                              <td class='reorder sorting_1'>
                                ".$obj[$i]['contacto']."
                              </td>
                              <td class='reorder sorting_1'>
                                ".$obj[$i]['area']."
                              </td>
                              <td class='reorder sorting_1'>
                                ".informeDao::ultimaFechaAuditoria($obj[$i]['id'])[0]['fechaMax']."
                              </td>
                              <td class='reorder sorting_1'>
                                ".$obj[$i]['ciudad']."
                              </td>
                              ";
                      echo    "
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

    public static function listadoClientesCSV($fechai,$fechaf){

        
        $outputBuffer = fopen("php://output", 'w');
        $obj = informeDao::listadoClientes($fechai,$fechaf);
        //$separado_por_comas="Empresa".chr(59)."Ciudad".chr(59)."Contacto".chr(59)."Area".chr(59)."Auditoria".chr(59)."Sede\n\r";
        $separado_por_comas="";
        $csv_array = array();
        $stringLine = "";
        for ($i=0; $i <count($obj) ; $i++){
            $stringLine=str_pad(utf8_decode($obj[$i]['nombre']),10).chr(00).chr(59).utf8_decode($obj[$i]['ciudad']).chr(59).$obj[$i]['contacto'].chr(59).utf8_decode($obj[$i]['area']).chr(59).informeDao::ultimaFechaAuditoria($obj[$i]['id'])[0]['fechaMax'].chr(59).utf8_decode($obj[$i]['ciudad'])."\n";
            $separado_por_comas=$separado_por_comas.$stringLine;
            $csv_array[] =$separado_por_comas;
        }
        
        return $csv_array;
    }

    public static function tablaClientes($buscar){

      $objEmpresa=empresaDao::tablaClientes($buscar);
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
                            <td><a href='#' title='".$objEmpresa[$key]->getNombre_empresa()."' id='generarInformeTrazabilidad' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                            <td class='parrafo'>
                            ".$objEmpresa[$key]->getNit_empresa()."
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

    public static function infoEmpresa($buscar){
        $objEmpresa = empresaDao::empresaNombre($buscar);
      //$objEmpresa=empresaDao::tablaClientes($buscar);
        //print_r($objEmpresa);
        // if($objEmpresa!= false){
        
        // }

        echo "
       
        <div class='col-md-12'>
            <div class='card-body'>

                <div class='form'>
                    <div class='form-body'>
                        <h2 class='form-section'><i class='fa fa-id-card-alt'></i>
                            Información General
                        </h2>
                        <div class='row'>
                            <div class='col-md-5'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Compañía
                                        </h5>
                                    </label>
                                    <input readonly='' type='text' class='form-control' placeholder='. . .'
                                        name='razonSocial' id='razonSocial'
                                        value='".$objEmpresa->getNombre_empresa()."'>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Direccion</h5>
                                    </label>
                                    <input readonly='' type='text' class='form-control' placeholder='. . .' name='nit'
                                        id='nit' value='".$objEmpresa->getDireccion_empresa()."'>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Ciudad
                                    <input readonly='' type='text' class='form-control'  value='".$objEmpresa->getCiudad_principal_empresa()."'>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Pais
                                    <input readonly='' type='text' class='form-control' placeholder='. . .' name='area'
                                        id='area' value='".$objEmpresa->getPais_empresa()."'>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Telefono
                                    <input readonly='' type='text' class='form-control' placeholder='. . .' name='area'
                                        id='area' value='".$objEmpresa->getTelefono_movil_representante_empresa()."'>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Area Tecnica
                                    <input readonly='' type='text' class='form-control' placeholder='. . .' name='area'
                                        id='area' value='".$objEmpresa->getIdarea_tecnica_empresa()."'>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Telefono
                                    <input readonly='' type='text' class='form-control' placeholder='. . .' name='area'
                                        id='area' value='".$objEmpresa->getRepresentante_sistema_gestion()."'>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class='form-group'>
                                    <label for=''>
                                        <h5 class='card-title'>
                                            Telefono
                                    <input readonly='' type='text' class='form-control' placeholder='. . .' name='area'
                                        id='area' value='".$objEmpresa->getCargo_representante_sistema_gestion_empresa()."'>
                                </div>
                            </div>
                         
                        </div>
                    </div>

                </div>
            </div>
        </div>
  
     ";
    }


    public static function trazabilidad($fechai,$fechaf,$buscar){

      $obj = informeDao::trazabilidad($fechai,$fechaf,$buscar);
      //print_r($obj);
      if($obj!= false){
          echo   "
          <div class='col-md-12'>
            <button class='btn round text-white capa waves-effect waves-light' type='button' id='buscarEmpresa'>
                <li class='fa fa-file-csv'></li> &nbsp;&nbsp;Buscar
            </button>
        </div>
          
          <table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                          role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                      <thead>
                          <tr role='row'>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >  Direccion Sede 
                              </th>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >  Ciudad
                              </th>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >Fecha Auditoria
                              </th>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >Porcentaje
                              </th>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >Plan de Accion
                              </th>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >Nombre Usuario
                              </th>
                              <th class='sorting_disabled' rowspan='1' colspan='1' >Empresa Solicitante
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
                          $comp =0;
                          for ($i=0; $i <count($obj) ; $i++) {
                         
                          echo"
                          <tr role='row' class='even'>

                            <td class='reorder sorting_1'>
                              ".$obj[$i]['direccion']." 
                            </td>
                            <td class='reorder sorting_1'>
                              ".$obj[$i]['ciudad']."
                            </td>

                            <td class='reorder sorting_1'>
                              ".$obj[$i]['auditoria']."
                            </td>
                            <td class='reorder sorting_1'>
                              ".informeDao::porcentajeCumplimientoAuditoria($obj[$i]['id'])."
                            </td>
                            <td class='reorder sorting_1'>
                              ".$obj[$i]['plan']."
                            </td>
                         
                            <td class='reorder sorting_1'>
                              ".$obj[$i]['nombre']."
                            </td>
                            <td class='reorder sorting_1'>
                              ".$obj[$i]['ancla']."
                            </td>
                            ";
                    echo    "
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
}