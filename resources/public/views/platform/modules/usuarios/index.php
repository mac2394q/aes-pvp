<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">
<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
    <style>
    .user-profile {
          background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
    }
    .user-profile .user-info {
    background-color: rgba(0, 0, 0, 0.35);
    }
    </style>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
  <!-- fixed-top-->
  <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
         <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title white">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block"><li class="fa fa-city"></li> Listado de Empresas PVP AES</h3>
          
        </div>
        
      </div>
      <div class="content-body">
        <div class="content-body">
          <section id="validation-scenario">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <ul class="list-inline mb-0">
                      <li><a href="registrarEmpleado.php" class="btn capa btn-success btn-sm"><i class="ft-plus white"></i> Registrar nuevo empleado</a></li>
                      </ul>
                    
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                      <p class='parrafo'>Consulta parametrizada del estado actual de las empresa registradas en AES.</p>
                      <div class="table-responsive">
                        <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <div class="row">
                            
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <?php areaController::select_area_listado_general(); ?>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label for="projectinput6">Estado:</label>
                                <select id="projectinput6" name="estado" class="form-control">
                                  <option value="te">SIN ESTADO</option>
                                  <option value="ea">ACTIVAS</option>
                                  <option value="ei">INACTIVA</option>
                                  <option value="ep">PROGRAMADA</option>
                                  <option value="eau">AUDITADA</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Buscar . . ."
                                    aria-describedby="button-addon2" name="buscar" id="buscar">
                                  <div class="input-group-append">
                                    <button id="buscarUsuarios" class="btn capa round  btn-success"   >
                                      <li class="fa fa-search"></li>
                                    </button>
                                    <button id="buscarUsuarios" class="btn capa round  btn-success"   >
                                      <li class="fa fa-search"></li>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div id="tablaDinamica_panel">
                                  <?php usuarioController::listadoEmpleados(); ?>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
</body>
</html>