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
            <h3 class="content-header-title white parrafo">Módulo Empresa - Grupo Empresarial</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                 <li class="breadcrumb-item  parrafo"><a class="text-white">Empresas</a></li>
                

              </div>
            </div>
          </div>
        </div>
      </div>

     
    </div>
    <div class="content-wrapper">
      
      <br>
      <div class="content-body">
        <div class="content-body">
          <section id="validation-scenario">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <?php if($_SESSION['rol'] == "ADMINISTRADOR"   ){ ?>
                    <ul class="list-inline mb-0">
                      <li><a href="registrarGrupo.php" class="btn round white capa "><i
                            class="fa fa-users fa-2x "></i> Crear Grupo Empresarial</a></li>
                    </ul>
                  <?php } ?>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                     
                      <div class="table-responsive">
                        <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          
                          <div class="row">
                            <div class="col-md-12">
                              <div id="tablaDinamica_panel">
                                <?php empresaController::listadoSimpleGrupos("az",null); ?>
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