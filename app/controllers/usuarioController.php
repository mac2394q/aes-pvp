<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."usuario.php");
  require_once(PDO_PATH."usuarioDao.php");
  require_once(PDO_PATH."empresaDao.php");
  require_once(PDO_PATH."sesionDao.php");
  
class usuarioController
{
  public static function usuarioIdSesion($id){
    return usuarioDao::usuarioIdSesion($id);
  }
  public static function usuarioId($id){
    return usuarioDao::usuarioId($id);
  }
  public static function listadoAuditores(){
    $objusuario = usuarioDao::listadoAuditores();
    //print_r($objusuario);
    if($objusuario != false){
      
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Auditores:</h5></label>
                <br>
                <select id='auditor' name='auditor' class='form-control'>
                <option value='no'>Seleccione</option>
                ";
                
        foreach ($objusuario as $key => $value) {
         
            echo    "<option value='".$objusuario[$key]->getIdusuario()."'>
            ".$objusuario[$key]->getNombre_usuario()." </option>";
            
            
        }
        
        echo     "</select>";
    }else{
        echo "  <label for=''>Area tecnica:</label>
                <select id='auditor' name='auditor' class='form-control'>
                    <option value='null'>SIN AUDITORES</option>
                </select>";
    }
}
public static function listadoPaises($variable_nombre){
  $objusuario = usuarioDao::listadoPaises();
  //print_r($objusuario);
  if($objusuario != false){
    
      echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Listado de Países :</h5></label>
              <select id='".$variable_nombre."' name='".$variable_nombre."' class='form-control'>
              <option value='null'>Seleccione</option>
              ";
              
      foreach ($objusuario as $key => $value) {
       
          echo    "<option value='".$objusuario[$key]->getid()."'>
          ".$objusuario[$key]->getnombre()." </option>";
          
          
      }
      
      echo     "</select>";
  }else{
      echo "  <label for=''>Area tecnica:</label>
              <select id='auditor' name='auditor' class='form-control'>
                  <option value='null'>SIN AUDITORES</option>
              </select>";
  }
}
  public static function listadoEmpleados(){
    $objEmpresa=usuarioDao::listadoUsuarios();
    //print_r($objEmpresa);
    if($objEmpresa != false){
    echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                        </th>
                        <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Tipo de Usuario
                        </th>
                        <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li> Nombre Usuario
                        </th>
                        <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li> País
                        </th>
                        <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Ciudad / Municipio
                        </th>
                   
                        
                    </tr>
                </thead>
                <tbody>
                    ";
                    foreach ($objEmpresa as $key => $value) {
                    echo"
                    <tr role='row' class='even'>
                        <td class='reorder sorting_1'><a href='".MODULE_APP_SERVER."usuarios/verFicha.php?id=".$objEmpresa[$key]->getIdusuario()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                        <td class='reorder sorting_1'>
                        ".$objEmpresa[$key]->getTipo_usuario()." 
                      </td>
                      <td class='reorder sorting_1'>
                        ".$objEmpresa[$key]->getNombre_usuario()."
                      </td>
                      <td class='reorder sorting_1'>
                        ".$objEmpresa[$key]->getPais_usuario()."
                      </td>
                      <td class='reorder sorting_1'>
                        ".$objEmpresa[$key]->getCiudad_usuario()."
                      </td>";

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
                    <strong>tenemos un problema!!</strong> <p>Actualmente no hay empresas registradas con la consulta anterior</p>
                </div>
            </div>
        </div>
        ";
    }
}

public static function listadoEmpleadosBusqueda($rol,$usuario){
  $objEmpresa=usuarioDao::listadoUsuariosBuscar($rol,$usuario);
  //print_r($objEmpresa);
  if($objEmpresa != false){
  echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                  role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
              <thead>
                  <tr role='row'>
                      <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                      </th>
                      <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Tipo de usuario
                      </th>
                      <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>Nombre usuario
                      </th>
                      <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li> Pais
                      </th>
                      <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>ciudad / Municipio
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
                      <td class='reorder sorting_1'><a href='".MODULE_APP_SERVER."usuarios/verFicha.php?id=".$objEmpresa[$key]->getIdusuario()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                      <td class='reorder sorting_1'>
                      ".$objEmpresa[$key]->getTipo_usuario()." 
                    </td>
                    <td class='reorder sorting_1'>
                      ".$objEmpresa[$key]->getNombre_usuario()."
                    </td>
                    <td class='reorder sorting_1'>
                      ".$objEmpresa[$key]->getPais_usuario()."
                    </td>
                    <td class='reorder sorting_1'>
                      ".$objEmpresa[$key]->getCiudad_usuario()."
                    </td>";
                   

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
public static function auditoriasCalendarioVerificacion($idauditor,$fecha){
  
  $objEmpresa=auditoriaDao::auditoriasCalendarioVerificacion($fecha);
  $array = explode("-",$fecha);
 
  //print_r($objEmpresa);
  if($objEmpresa != false){
  $estado = "Fecha  disponible para auditoria";
  echo   "
  
      
             <div class='col-md-12'>
             <div class='table-responsive table-bordered'>
  <table class='table'>
               
               <thead>
                   <tr>
                       <th scope='col'><li class='fa fa-calendar-check'></li>&nbsp;Fecha</th>
                       <th scope='col'><li class='fa fa-user-clock'></li>&nbsp;Auditor</th>
                       <th scope='col'><li class='fa fa-warehouse'></li>&nbsp;Empresa Ancla</th>
                       <th scope='col'><li class='fa fa-warehouse'></li>&nbsp;Empresa Asociada</th>
                   </tr>
               </thead>
               <tbody>";
               foreach ($objEmpresa as $key => $value) {
                 $auditor=usuarioDao:: usuarioId($objEmpresa[$key]->getIdusuario_auditor());
                 $empA=empresaDao::empresaId($objEmpresa[$key]->getIdempresa_ancla());
                 $empB=empresaDao::empresaId($objEmpresa[$key]->getIdempresa_asociada());
                 
                  if( strcmp($fecha,$objEmpresa[$key]->getFecha_programada_auditoria()) == 0 && intval($objEmpresa[$key]->getIdusuario_auditor()) == intval($idauditor)) {
                    echo"
                    <tr >
                      <td class='bg-danger  bg-lighten-4'>".$objEmpresa[$key]->getFecha_programada_auditoria()."</td>
                      <td>".$auditor->getNombre_usuario()."</td>
                     
                      <td>".$empA->getNombre_empresa()."</td>
                      <td>".$empB->getNombre_empresa()."</td>
                    </tr>";
                    $estado = "Fecha no disponible por esta ocupada por el auditor !";
        
                  }elseif( strcmp($fecha,$objEmpresa[$key]->getFecha_programada_auditoria()) == 0){
                    echo"
                    <tr >
                      <td class='bg-danger  bg-lighten-4'>".$objEmpresa[$key]->getFecha_programada_auditoria()."</td>
                      <td>".$auditor->getNombre_usuario()."</td>
                     
                      <td>".$empA->getNombre_empresa()."</td>
                      <td>".$empB->getNombre_empresa()."</td>
                    </tr>";
                    $estado = "Fecha no disponible por esta ocupada por un auditor de AES !";
                   
                  }elseif( intval($objEmpresa[$key]->getIdusuario_auditor()) == intval($idauditor)){
                    echo"
                    <tr >
                      <td class='bg-yellow bg-lighten-4'>".$objEmpresa[$key]->getFecha_programada_auditoria()."</td>
                      <td>".$auditor->getNombre_usuario()."</td>
                     
                      <td>".$empA->getNombre_empresa()."</td>
                      <td>".$empB->getNombre_empresa()."</td>
                    </tr>";
                   
                  }else{
                    echo"
                    <tr >
                      <td class='bg-blue bg-lighten-4'>".$objEmpresa[$key]->getFecha_programada_auditoria()."</td>
                      <td>". $auditor->getNombre_usuario()."</td>
                     
                      <td>".$empA->getNombre_empresa()."</td>
                      <td>".$empB->getNombre_empresa()."</td>
                    </tr>";
                    
                  }
                }
                  echo"
              </tbody>
          </table>
          </div>
          <br>
          
          <div class='col-md-12'>
               <div class='form-group'>
                  <label >
                  <h5 class='card-title'>Estado: ". $estado."</h5>
                  </label>
                  <script>
                  document.getElementsByName('verificacion')[0].value = '". $estado."'
                  </script>
                  
                     
               </div>
            </div>";
  }else{
  
echo "
        <div class='bs-callout-white callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
               <div class='media-left media-middle bg-warning callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
               </div>
               <div class='media-body p-1'>
                     <p>Por favor eliga una fecha para verificar la disponibilidad de la fecha para la realizacion de la auditoria.</p>
               </div>
            </div>
        </div>
      ";
  }
}
    
    
}
?>
