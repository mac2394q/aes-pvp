<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."plantillaController.php");
       require_once (CONTROLLERS_PATH."auditoriasController.php");
       require_once (CONTROLLERS_PATH."sedeController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objusuarioR=usuarioDao::usuarioIdSesion($_SESSION['idsesion']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
    <input type="hidden" name="fechaTop" value="" />
    <input type="hidden" name="auditorTop" value="" />
    <input type="hidden" name="usuario" value="<?php  echo $objusuarioR->getIdusuario() ?>" />
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
                        <h3 class="content-header-title white titulo">Módulo Auditorias</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active parrafo">Registrar Nueva Auditoria
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <section id="description" class="card">
                <div class="content-body">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="content-body">
                                    <div class="form">
                                        <div class="form-body">
                                            <br>
                                            <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                Registrar Auditoría</h2>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <?php empresaController::listadoEmpresasSelect("empresaAncla","Empresa Ancla:"); ?>
                                                </div>
                                                <div class="col-md-4" id="EmpresaDiv">
                                                    <?php empresaController::listadoEmpresasSelect("empresaAso","Empresa Asociada:"); ?>
                                                </div>
                                                <div class="col-md-4" id="sedeDiv">
                                                    <label for=''>
                                                        <h5 class='card-title'>
                                                            <li class='fa fa-warehouse'></li> <span
                                                                class='text-danger'>*</span>Sedes de Empresa:
                                                        </h5>
                                                    </label>
                                                    <select id='sede' name='sede' class='form-control'>
                                                        <option value='null'>SIN SEDES PARA ASOCIAR</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div id="plantillaAso">
                                                        <div class="form-group">
                                                            <?php plantillaController::listadoPlantilla(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <br>
                                                        <?php usuarioController::listadoAuditores(); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for=''>
                                                            <h5 class='card-title'>
                                                                <li class='fa fa-warehouse'></li> <span
                                                                    class='text-danger'>*</span> Fecha de
                                                                    Programación
                                                            </h5>
                                                        </label>

                                                        <input type="date" class="form-control card-title"
                                                            placeholder=". . . " name="fecha" id="fecha" value=""
                                                            onchange='test()'>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-actions">
                                                <button class="btn capa text-white round " id="registrarAuditoria">
                                                    <i class="fa fa-save fa-2x"></i> Crear Auditoria
                                                </button>&nbsp;&nbsp;&nbsp;
                                                <button type="button" onclick="location.reload()"
                                                    class="btn text-white btn-danger round waves-effect waves-light">
                                                    <i class="fa fa-times fa-2x"></i> Limpiar
                                                </button>
                                                <br>
                                                <hr>
                                                <div id="smgAuditoria"></div>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->
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
        $(document).on('click', '#auditor', function (e) {
            document.getElementsByName("auditorTop")[0].value = document.getElementsByName("auditor")[0].value;
            console.log(document.getElementsByName("auditor")[0].value);
        });
        $('#fecha').change(function () {
            //document.getElementsByName("fechaTop")[0].value = document.getElementById("fecha").value ;
            var date = $('#fecha').val();
            document.getElementsByName("fechaTop")[0].value = date;
            //alert("date "+date);  
            //ar date = null;
        });
    </script>
</body>

</html>