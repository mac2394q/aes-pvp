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
       require_once (CONTROLLERS_PATH."grupoController.php");
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
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
                        <h3 class="content-header-title white titulo">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a href="index.php"
                                            class="text-white">Empresas</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Registrar Empresa
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
                                <div class="card" >

                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                    Información General
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Compañía 
                                                                    </h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . ." name="razonSocial">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> No.
                                                                        Identificación</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . ." name="nit">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <?php areaController::select_area_listado_general(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>
                                                                        Ciudad/Provincia/Municipio</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . . " name="ciudad">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>
                                                                        Departamento/Estado</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . . " name="departamento">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <?php usuarioController::listadoPaises("pais");?>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Dirección </h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . . " name="direccion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                        Información Administrativa</h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Correo
                                                                        Electrónico</h5>
                                                                </label>
                                                                <input type="text" class="form-control" placeholder="@"
                                                                    name="emailEmpresarial">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Sitio web
                                                                        Empresa</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="http://www. " name="sitioWeb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"> Correo Electrónico para
                                                                    Facturación</h5>
                                                                </label>
                                                                <input type="text" class="form-control" placeholder="@"
                                                                    name="emailFacturacion">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title">Cierre Mensual</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Dia 30  " name="fechaCorteFacturacion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h2 class="form-section"><i class="fa fa-business-time"></i>
                                                        Comercial</h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Representante
                                                                        Legal Compañía</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . ." name="representanteLegal">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title">Cargo</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . ." name="cargoRepresentante">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Teléfono
                                                                        (Móvil, Fijo)
                                                                    </h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="# ext #" name="telefonoRepresentante">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Representante
                                                                        Sistema de Gestión</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . . "
                                                                    name="representanteSistemaGestion">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title">Cargo</h5>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=". . . "
                                                                    name="cargoRepresentanteSistema">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Teléfono
                                                                        (Móvil, Fijo)
                                                                    </h5>
                                                                </label>
                                                                <input type="text" id="" class="form-control"
                                                                    placeholder="# ext #" name="telefonoSistema">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"> Correo Electrónico</h5>
                                                                </label>
                                                                <input type="text" class="form-control" placeholder="@"
                                                                    name="emailContacto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> Limpiar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Guardar
                                                    </button>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Certificados Adjuntos  Empresa </h4>

                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div id="certificadosDiv">
                                                    <div data-repeater-list="car">
                                                        <div data-repeater-item="" style="">
                                                            <form class="form row">
                                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                                    <label for=""><span
                                                                            class="text-danger">*</span>Certificado:</label>
                                                                    <br>
                                                                    <select class="form-control" name="certificado">
                                                                        <option value="ISO 9001">ISO 9001</option>
                                                                        <option value="ISO 18001">ISO 18001 </option>
                                                                        <option value="ISO 45001"> ISO 45001</option>
                                                                        <option value="ISO 14001"> ISO 14001</option>
                                                                        <option value="ISO 28001">ISO 28001</option>
                                                                        <option value="OTRO">OTRO</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-2">
                                                                    <label for="email-addr"><span
                                                                            class="text-danger">*</span>
                                                                        Entidad:</label>
                                                                    <br>
                                                                    <select class="form-control" i name="entidad">
                                                                        <option value="ICONTEC">ICONTEC</option>
                                                                        <option value="SGS">SGS </option>
                                                                        <option value="AES"> AES</option>
                                                                        <option value="COTECNA"> COTECNA</option>
                                                                        <option value="BERITAS">BERITAS</option>
                                                                        <option value="OTRO">OTRO</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label for=""><span class="text-danger">*</span>
                                                                        Serial
                                                                        /
                                                                        Código</label>
                                                                    <br>
                                                                    <input type="text" class="form-control"
                                                                        name="codigo" value="000-00" placeholder=". . .">
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label for=""><span class="text-danger">*</span>
                                                                        Fecha
                                                                        Certificado</label>
                                                                    <br>
                                                                    <input type="date" id="timesheetinput3"
                                                                        class="form-control" name="date">
                                                                </div>
                                                                <div
                                                                    class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                    <button id="eliminarCertificado" type="button"
                                                                        class="btn round btn-danger waves-effect waves-light"
                                                                        data-repeater-delete=""> <i class="ft-x"></i>
                                                                        Eliminar</button>
                                                                </div>

                                                                <hr>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group overflow-hidden">
                                                    <div class="col-12">
                                                        <button id="agregarCertificado" data-repeater-create=""
                                                            class="btn text-white round capa waves-effect waves-light">
                                                            <i class="ft-plus"></i> Agregar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    
                                    <div class="card-content collpase show">
                                        <div class="card-body">

                                            <form class="form form-horizontal form-bordered">
                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-clipboard"></i> Otros Datos
                                                        
                                                    </h4>
                                                    <div class="form-group row mx-auto">
                                                        <label class="col-md-3 label-control" for="">Grupo </label>
                                                        <div class="col-md-9">
                                                            <?php grupoController::select_grupo(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-auto">
                                                        <label class="col-md-3 label-control">Logo Empresarial</label>

                                                        <div class="col-md-9">
                                                            <label class="file center-block">
                                                                <input type="file" id="logo" name="logo">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">

                                                    <button type="button" id="registrarEmpresa"
                                                        class="btn text-white round capa waves-effect waves-light">
                                                        <i class="fa fa-save fa-2x"></i> Guardar
                                                    </button>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;

                                                    <a href="index.php" onclick="location.reload()"
                                                        class="btn round btn-danger waves-effect waves-light">
                                                        <i class="fa fa-ban fa-2x"></i> Limpiar
                                                    </a>
                                                    <br><br>
                                                    <hr>
                                                    <div id="smgEmpresa"></div>
                                                </div>
                                            </form>
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

    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
    

    <script>
        $(document).on('click', '#agregarCertificado', function (e) {



            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            //alert(contador);
            contador = parseInt(contador) + 1;
            //alert(contador);
            document.getElementsByName("certificadosDinamicos")[0].value = contador;
        });

        $(document).on('click', '#eliminarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            if (parseInt(contador) > 0) {
                //alert(contador);
                contador = parseInt(contador) - 1;
                //alert(contador);
                document.getElementsByName("certificadosDinamicos")[0].value = contador;
            }
        });
    </script>
</body>
<!-- END: Body-->

</html>
