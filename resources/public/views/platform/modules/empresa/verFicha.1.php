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

    <input type="hidden" value="<?php  echo $_POST['id']; ?>" name="idempresa" />

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

                                    <li class="breadcrumb-item"><a href="index.php">Empresas</a>

                                    </li>

                                    <li class="breadcrumb-item active">Crear Nueva Empresa

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

                <div class="row">

                    <section id="basic-form-layouts">









                        <div class="col-md-12">

                            <div class="card">

                                <div class="card-header">

                                    <h4 class="card-title" id="bordered-layout-basic-form">Autentificación</h4>

                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>

                                    <div class="heading-elements">

                                        <ul class="list-inline mb-0">

                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>

                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>

                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                            <li><a data-action="close"><i class="ft-x"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                                <div class="card-content collpase show">

                                    <div class="card-body">

                                        <div class="card-text">

                                            <p>Tenga en cuenta que los datos de

                                                autentificación son unicos para cada

                                                empresa

                                                <code>Cada empresa tendra una cuenta

                                                    unica con un sistema de validación

                                                    de doble autentificación</code> ,

                                                solo se permite un usuario de empresa

                                                conectado paralelamente</p>

                                        </div>

                                        <form class="form form-horizontal form-bordered">

                                            <div class="form-body">



                                                <h4 class="form-section"><i class="ft-clipboard"></i> Otro Datos

                                                    Relevantes

                                                </h4>



                                                <div class="form-group row mx-auto">

                                                    <label class="col-md-3 label-control">Logo Empresarial</label>



                                                    <div class="col-md-9">

                                                        <label class="file center-block">

                                                            <input type="file" id="file" name="file">

                                                            <span class="file-custom"></span>

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-actions">



                                                <button type="button" id="subirFileV1"
                                                    class="btn round text-white capa waves-effect waves-light">

                                                    <i class="la la-check-square-o"></i> Guardar

                                                </button>

                                                &nbsp;

                                                &nbsp;

                                                &nbsp;

                                                &nbsp;

                                                &nbsp;

                                                &nbsp;



                                                <a href="index.php"
                                                    class="btn round btn-danger waves-effect waves-light">

                                                    <i class="la la-check-square-o"></i> Cancelar

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



                    </section>

                    <!--/ contendio -->

                </div>

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

    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>

    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>

    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>

    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/sweet-alerts.min.js"; ?>"></script>

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