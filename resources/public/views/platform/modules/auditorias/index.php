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
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:70%;">
  <input type="hidden" name="fechaTop" value="0" />
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
            <h3 class="content-header-title white titulo"><i class="fa fa-mail-bulk"></i> Módulo  de Auditorías</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active parrafo">Listado de Auditorías</li>
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
              <?php if($_SESSION['rol'] == "ADMINISTRADOR"   ){ ?>
                <ul class="list-inline mb-0">
                  <li><a href="registrarAuditoria.php"
                      class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light"><i
                        class="fa fa-paste "></i> Registrar Nueva Auditoría</a></li>
                </ul>
              <?php } ?>
               
              </div>
              <div class="card-content ">
                <div class="card-body  ">
                  <div class="table-responsive">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                          <label for="projectinput6">
                            <h5 class="card-title parrafo">Tipo de Consulta:</h5>
                          </label>
                          <select name="estado_auditoria" id="estado_auditoria" class="form-control">
                            <option value="fecha">FECHA DE AUDITORIA</option>
                            <option value="ancla">EMPRESA ANCLA</option>
                            <option value="asociada">EMPRESA ASOCIADA</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                          <div id="label_"><label >&nbsp;</label></div>
                          <input type="text" id="consulta_" class="form-control "
                            placeholder="Consultar. . . [nombre empresa] " name="consulta_">
                          <input type="date" id="consulta_f" class="form-control "
                             name="consulta_f">
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-2">
                        <div class="form-group"><br>
                          <button class="btn capa text-white round" type="button" id="consultar_auditoria">
                            <li class="fa fa-search"></li>
                          </button>
                          &nbsp;&nbsp;&nbsp;
                          <button  class="btn round btn-danger" type="button" onclick="location.reload()">
                                      <li class="fa fa-ban"></li>&nbsp;Limpiar
                          </button>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div id="tablaDinamica_panel">
                          <?php auditoriasController::listadoSimpleAuditorias("az","te","sin_estado",null); ?>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>
  <script>
        
        $(document).on('click', '#estado_auditoria', function (e) {
          var valor = document.getElementsByName("estado_auditoria")[0].value;
          console.log(valor);
          if(valor == "fecha"){
            $("#consulta_f").show();
            $("#consulta_").hide();
            $("#label_").hide();
          }else{
            $("#consulta_").show();
            $("#label_").show();
            $("#consulta_f").hide();
          }
        });
        $('#consulta_f').change(function () {
            //document.getElementsByName("fechaTop")[0].value = document.getElementById("fecha").value ;
            var date = $('#consulta_f').val();
            document.getElementsByName("fechaTop")[0].value = date;
            //alert("date "+date);  
            //ar date = null;
        });
        $("#consulta_").hide();
        $("#label_").hide();
        

    </script>
</body>
<!-- END: Body-->
</html>