<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
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
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
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
                        <h3 class="content-header-title white">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo text-white"><a href="empleados.php" class='text-white'>Listado </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Registro de Empleado
                                    </li>
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
                <div class="">
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                           
                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                        Información  General
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Nombre </h5>
                                                                </label>
                                                                <input type="text" id="projectinput1"
                                                                    class="form-control" placeholder=". . ."
                                                                    name="nombre">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=''>
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Rol: </h5>
                                                                </label>
                                                                <select id='area' name='area' class='form-control'>
                                                                    <option value="AUDITOR">AUDITOR</option>
                                                                    <option value="COMERCIAL">COMERCIAL</option>
                                                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput2">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Documento </h5>
                                                                </label>
                                                                <input type="text" id="projectinput2"
                                                                    class="form-control" placeholder=". . ."
                                                                    name="documento">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Correo
                                                                            Electrónicoo </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="correo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Telefono </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="telefono">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Dirección  </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="direccion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                    Información Administrativa</h2>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php usuarioController::listadoPaises("pais");?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"> Ciudad /Estado / Municipio
                                                                    </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="ciudad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h4 class="form-section"><i class="ft-clipboard"></i> Otro Datos
                                                    </h4>
                                                    <div class="form-group row mx-auto">
                                                        <label class="col-md-3 label-control">Foto Documento</label>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label id="projectinput8" class="file center-block">
                                                                    <input type="file" id="fileDoc" name="fileDoc">
                                                                    <span class="file-custom"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-auto">
                                                       
                                                       
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Usuario </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="usuario">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Clave </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="clave">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="form-actions">

                                                        <button type="button" id="registrarEmpleado"
                                                            class="btn round text-white capa  waves-effect waves-light">
                                                            <i class="fa fa-save fa-2x"></i> Guardar
                                                        </button>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <button type="button"  onclick="location.reload()"
                                                            class="btn text-white btn-danger round waves-effect waves-light">
                                                            <i class="fa fa-times fa-2x"></i> Limpiar
                                                        </button><br>
                                                        <div id="smgEmpleado"></div>
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
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
<script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/module.js"; ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>
<!-- END: Body-->

</html>
