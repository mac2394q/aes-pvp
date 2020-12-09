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
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
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
                        <h3 class="content-header-title white titulo">Módulo Plantillas PVP</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a class="text-white"
                                            href="http://pvp.aes.org.co/resources/public/views/platform/modules/plantillas/">Listado
                                            </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Registrar  Plantilla
                                    </li>

                                </ol>
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
                    <section id="basic-form-layouts">


                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="form-section"><i class="fa fa-business-time"></i>
                                        Elementos de Plantilla</h2>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div class="repeater-default">
                                            <div data-repeater-list="car">
                                                <div data-repeater-item="" style="">
                                                    <form class="form row">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">
                                                                        <h5 class="card-title"><span
                                                                                class="text-danger">*</span> Nombre
                                                                            Plantilla
                                                                        </h5>
                                                                    </label>
                                                                    <input type="text" id="projectinput1"
                                                                        class="form-control" placeholder=". . ."
                                                                        name="etiqueta" id="etiqueta">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <?php areaController::select_area_listado_general(); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <?php usuarioController::listadoPaises("pais");?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                                            <label for="projectinput3"><span
                                                                    class="text-danger">*</span>
                                                                </span> Numeral Capítulo / Título</label>
                                                            <input type="text" id="projectinput3" class="form-control"
                                                                placeholder=". . . " name="consecutivo">
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                                            <label for="projectinput3"><span
                                                                    class="text-danger">*</span>
                                                                </span> Numeral Requisito</label>
                                                            <input type="text" id="projectinput3" class="form-control"
                                                                placeholder=". . . " name="etiquetaPlantilla">
                                                        </div>


                                                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                            <button type="button" id="eliminarCertificado"
                                                                class="btn btn-danger round  waves-effect waves-light"
                                                                data-repeater-delete=""> <i class="fa fa-ban fa-2x"></i>&nbsp;
                                                                Eliminar</button>
                                                        </div>

                                                        <br>
                                                    </form>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group overflow-hidden">
                                                <div class="col-12">
                                                    <button data-repeater-create="" id="agregarCertificado"
                                                        class="btn text-white round capa waves-effect waves-light">
                                                        <i class="fa fa-plus fa-2x"></i>&nbsp; Agregar
                                                    </button>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-actions">

                                                <button class="btn text-white round capa" id="registrarPlantilla">
                                                    <i class="fa fa-save fa-2x"></i>&nbsp; Validar Plantilla
                                                </button>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class="btn btn-danger round" onclick="location.reload()">
                                                    <i class="fa fa-ban fa-2x"></i>&nbsp;Limpiar
                                                </button>
                                                <br><br>
                                                <hr>
                                                <div id="smgPlantilla"></div>
                                            </div>
                                            <br>
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
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/plantillas/triggers/module.js"; ?>"></script>
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

</html>