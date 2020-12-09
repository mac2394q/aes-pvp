<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
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
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
  <!-- fixed-top-->
  <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
  <div class="app-content content">
    <div class="content-header row">
      <div class="content-header-dark bg-img col-12">
        <div class="row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title white parrafo">Módulo Empresa</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
              <li class="breadcrumb-item active parrafo">Listado de Empresas</li>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 parrafo ">
          <li class="fa fa-city"></li> Listado de empresas PVP AES
        </h3>
        <h5 class="content-header-title mb-0 parrafo ">
          <li class="fa fa-city"></li> Empresas registradas <?php echo empresaController::nEmpresas(); ?>
        </h5>
        <h5 class="content-header-title mb-0 parrafo "> Activas <?php echo empresaController::nEmpresasEstados(1); ?>
        </h5>
        <h5 class="content-header-title mb-0 parrafo "> Inactivas
          <?php echo empresaController::nEmpresasEstados(0); ?></h5>
      </div>
    </div>
    <div class="content-wrapper">

      <div class="content-body">
        <div class="content-body">
          <section id="validation-scenario">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <?php if($_SESSION['rol'] == "ADMINISTRADOR"   ){ ?>
                    <ul class="list-inline mb-0">
                      <li><a href="registrarEmpresa.php"
                          class="btn text-white capa  round btn-min-width mr-1 mb-1 waves-effect waves-light"><i
                            class="fa fa-folder-plus"></i> Nueva Empresa</a></li>
                    </ul>
                    <?php } ?>
                    
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                      <div class="table-responsive">
                        <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <div class="row">

                            <div class="col-sm-12 col-md-4">
                              <div class="form-group">
                                <?php areaController::select_area_listado_general(); ?>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-2">
                              <div class="form-group">
                                <label for="projectinput6">
                                  <h5 class='card-title titulo'>
                                    <li class="fa fa-calendar-day"></li> Estado:
                                  </h5>
                                </label>
                                <select id="projectinput6" name="estado" class="form-control">
                                  <option value="ea">ACTIVAS</option>
                                  <option value="ei">INACTIVA</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">

                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Buscar . . ."
                                    aria-describedby="button-addon2" name="buscar" value="">
                                  <div class="input-group-append">
                                    <button class="btn round text-white capa " type="button" id="buscarEmpresa">
                                      <li class="fa fa-search"></li>
                                    </button>
                                  </div>
                                  <div class="input-group-append">
                                    <button  class="btn round btn-danger" type="button" onclick="location.reload()">
                                      <li class="fa fa-ban"></li>&nbsp;Limpiar
                                    </button>
                                    
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div id="tablaDinamica_panel">
                                  <?php empresaController::listadoSimpleEmpresas("az",$idArea,"te",null); ?>

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
  <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
  <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
  <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
</body>

</html>