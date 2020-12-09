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
            <h3 class="content-header-title white"><i class="fa fa-mail-bulk"></i> MÓDULO DE AUDITORÍAS</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Listado de auditorías como asociada de negocio</li>
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
              <div class="card-header">

                <a class="heading-elements-toggle"><i class="fa fa-user font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="printer"><i class="ft-printer"></i></a></li>
                    <li><a data-action="reload" id="recargar_index_auditoria"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content ">
                <div class="card-body  ">
                  <div class="table-responsive">

                    <div class="row">


                      <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                          <label for="projectinput6">
                            <h5 class="card-title">Estado:</h5>
                          </label>
                          <select id="projectinput6" name="estado_auditoria" class="form-control">
                            <option value="sin_estado">SIN ESTADO</option>
                            <option value="auditoria_programada">PROGRAMADA</option>
                            <option value="auditoria_programada_vencidad">PROGRAMADA VENCIDA</option>
                            <option value="auditoria_progreso">EN PROGRESO</option>
                            <option value="auditoria_terminada">AUDITADA</option>
                            <option value="auditoria_pendiente">PENDIENTE</option>
                            <option value="auditoria_revision">EN REVISIÓN</option>
                            <option value="auditoria_aprobada">APROBADA</option>
                            <option value="auditoria_certificada">CERTIFICADA</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                          <label for="projectinput6">
                            <h5 class="card-title">Consulta:</h5>
                          </label>
                          
                          <input type="text" id="consulta" class="form-control"
                            placeholder="Consultar. . . [nombre empresa] / [0000-00-00]" name="consulta">
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-2">
                        <div class="form-group"><br>
                          <button class="btn btn-success" type="button" id="consultar_auditoria">
                            <li class="fa fa-search"></li>
                          </button>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div id="tablaDinamica_panel">
                          <?php auditoriasController::listadoCompuestoAuditoriaEmpresa("az","te","sin_estado",null,$_GET['id'],$_GET['id2']); ?>
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