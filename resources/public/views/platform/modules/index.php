<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <?php
       include_once ($_SERVER['DOCUMENT_ROOT'].'/app/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once(CONTROLLERS_PATH."pacientesController.php");
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
  ?>
</head>

<body
  class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns fixed-navbar  menu-expanded pace-done"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:80%;">
  <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
  <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
  <div class="app-content content">
    <div class="content-header row">
      <div class="content-header-dark bg-img col-12">
        <div class="row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title white titulo">
              &nbsp; &nbsp; <li class="fa fa-desktop "></li>&nbsp;&nbsp; Panel Estadistico&nbsp;
            </h3>
            <div class="row breadcrumbs-top">
              <ol class="breadcrumb parrafo">
                <li class="breadcrumb-item titulo active text-white ">
                  &nbsp; &nbsp; <span class="fa fa-address-card"></span>&nbsp; &nbsp;
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- users list start -->
        <div class="row">
          <div class="col-md-9">
            <section class="users-list-wrapper">
              <div class="users-list-filter px-1">
                <form>
                  <div class="row border border-light rounded py-2 mb-2">
                    <div class="col-md-2">
                      <label for="users-list-verified">Departamento</label>
                      <fieldset class="form-group">
                        <select class="form-control" id="users-list-verified">
                          <option value="valle">Valle del cauca</option>
                        </select>
                      </fieldset>
                    </div>
                    <div class="col-md-3">
                      <label for="users-list-role">Ciudad</label>
                      <fieldset class="form-group">
                        <select class="form-control" id="ciudad" name="ciudad">
                          <option value="todos">Todas</option>
                          <option value="Cali">Cali</option>
                          <option value="Buenaventura">Buenaventura</option>
                          <option value="Tulua">Tulua</option>
                          <option value="Zarzal">Zarzal</option>
                          <option value="Jamundi">Jamundi</option>
                          <option value="Dagua">Dagua</option>
                        </select>
                      </fieldset>
                    </div>
                    <div class="col-md-3">
                    <fieldset class="form-group">
                    <label for="users-list-status">Diagnostico</label>
                          <input type="text" class="form-control" id="busqueda" name="busqueda">
                      </fieldset>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                      <button class="btn btn-block btn-info " id="consulta_pacientes">Consultar</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="users-list-table">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <!-- datatable start -->
                      <div class="table-responsive">
                        <div id="users-list-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                          <div class="row">
                            <div class="col-sm-12"  id="contenedor_dinamico">
                              <?php pacientesController::consultar_pacientes('todos',''); ?>
                            </div>
                          </div>
                          <div class="row">
                          </div>
                        </div>
                      </div>
                      <!-- datatable ends -->
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title parrafo">Estadisticas del Sistema</h4>
              </div>
              <div class="card-content collapse show">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead">
                      <tr>
                        <th>Numero Pacientes</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Infectados</td>
                        <th><?php echo pacientesController::contadorPacientes('infectado') ?></th>
                      </tr>
                      <tr>
                        <td>No Infectados</td>
                        <th><?php echo pacientesController::contadorPacientes('noinfectado') ?></th>
                      </tr>
                      <tr>
                        <td>En reserva</td>
                        <th><?php echo pacientesController::contadorPacientes('reserva') ?></th>
                      </tr>
                      <tr>
                        <td>Beneficiarios Ayudas</td>
                        <th><?php echo pacientesController::contadorPacientes('beneficio') ?></th>
                      </tr>
                      <tr>
                        <td>No Beneficiarios Ayudas</td>
                        <th><?php echo pacientesController::contadorPacientes('ninguno') ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- users list ends -->
      </div>
    </div>
  </div>
  <?php
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
  ?>

  <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
  <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
  <script src="<?php echo PLATFORM_SERVER."modules/pacientes/triggers/module.js"; ?>"></script>
</body>
<!-- END: Body-->

</html>