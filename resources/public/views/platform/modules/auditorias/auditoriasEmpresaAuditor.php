<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."auditoriasController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
  ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
  <!-- BEGIN: Header-->
  <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
  <!-- END: Main Menu-->
  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-header row">
      <div class="content-header-dark bg-img col-12">
        <div class="row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title white titulo"><i class="fa fa-mail-bulk"></i> Módulo de Auditorías - Auditor</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active parrafo">Listado de Auditorias del Auditor</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-body">
        <!-- contendio -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-content ">
                <div class="card-body  ">
                  <div class="table-responsive">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="tablaDinamica_panel">
                          <?php auditoriasController::listadoSimpleAuditoriaAuditor($_SESSION['idusuario']); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ contendio -->
      </div>
    </div>
  </div>
  <!-- END: Content-->
  <!-- BEGIN: Customizer-->
  <!-- End: Customizer-->
  <!-- Buynow Button-->
  <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
</body>
<!-- END: Body-->
</html>