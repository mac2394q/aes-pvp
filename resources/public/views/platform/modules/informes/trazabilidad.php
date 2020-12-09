<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."informeController.php");
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
  <div class="content-header row">
      <div class="content-header-dark bg-img col-12">
        <div class="row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title white titulo"><i class="fa fa-mail-bulk"></i> Módulo  de Informes</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active parrafo">Listado de Clientes</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper">

      <div class="content-body">
        <div class="content-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                      <div class="table-responsive">
                        <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <div class="row">
                            <div class=" col-md-2">
                              <div class="form-group">
                                <label for="">
                                  <h5 class="card-title titulo">
                                    <li class="fa fa-clipboard-list"></li> <span class="text-danger">*</span> Fecha inicial
                                  </h5>
                                </label>
                                <input type="date" id="fechai" name="fechai" class="form-control titulo" />
                              </div>
                            </div>
                            <div class=" col-md-2">
                              <div class="form-group">
                                <label for="">
                                  <h5 class="card-title titulo">
                                    <li class="fa fa-clipboard-list"></li> <span class="text-danger">*</span> Fecha Final
                                  </h5>
                                </label>
                                <input type="date" id="fechaf" name="fechaf" class="form-control titulo" />
                                 
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Buscar . . ."
                                    aria-describedby="button-addon2" name="buscar" value="">
                                  <div class="input-group-append">
                                    <button class="btn round text-white capa " type="button" id="buscarEmpresa">
                                      <li class="fa fa-search"></li> &nbsp;&nbsp;Buscar
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
                              <div class="col-sm-12">
                                 <div id="tablaDinamica_panel">
                                 
                                 </div>
                                 <div id="infoEmpresa">
                                 
                                 </div>
                             
                                <div id="tablaDinamica_panel2">
                                 
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
            </div>
           
          </div>
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
    <script src="<?php echo PLATFORM_SERVER."modules/informes/triggers/module.js"; ?>"></script>
</body>

</html>