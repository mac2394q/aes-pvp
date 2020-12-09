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
       $idempresa = empresaController::objEmpresa($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idempresa" />
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
                        <h3 class="content-header-title white titulo">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a class="text-white" href="http://aesbeta.ml/resources/public/views/platform/modules/empresa/">Listado</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a class="text-white" href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Folio empresa</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Registrar sede
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
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card" >
                                    
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <p class="parrafo">Rellene el formulario teniendo en cuenta que los campos con asterisco (*) son de carácter obligatorios , los campos que no lo posean son opcionales.
                                                </p>
                                            </div>
                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                        Informacion de la empresa a asociar :
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title">Razon social </h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput1"
                                                                    class="form-control card-title" placeholder=". . ."
                                                                    name="fname"
                                                                    value="<?php echo $idempresa->getNombre_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Area tecnica </h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput3"
                                                                    class="form-control card-title" placeholder=". . . "
                                                                    name="email"
                                                                    value="<?php echo $idempresa->getIdarea_tecnica_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Ciudad</h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput3"
                                                                    class="form-control card-title" placeholder=". . . "
                                                                    name="email"
                                                                    value="<?php echo $idempresa->getCiudad_principal_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"> Pais </h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="phone"
                                                                    value="<?php echo $idempresa->getPais_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                        Informacion general de la sede</h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Ciudad sede
                                                                    </h5>
                                                                </label>
                                                                <input type="text" id="projectinput1"
                                                                    class="form-control" placeholder=". . ."
                                                                    name="ciudad">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Direccion </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="direccion">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"> Numero de empleados </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="nempleados">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Procesos </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="procesos">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> E-mail
                                                                        Empresarial </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Comercial</h2>
                                        <h4 class="card-title">Contacto de sede</h4>
                                        
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div data-repeater-list="car">
                                                    <div data-repeater-item="" style="">
                                                        <form class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Contacto
                                                                    sede</label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="contacto">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Cargo </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="cargo">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Telefono
                                                                    Movil - Fijo -
                                                                    Ext </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="telefonos">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                <button type="button"
                                                                    class="btn btn-danger round waves-effect waves-light"
                                                                    data-repeater-delete="" id="eliminarCertificado"> <i
                                                                        class="ft-x"></i>
                                                                    Eliminar</button>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="form-group overflow-hidden">
                                                    <div class="col-12">
                                                        <button data-repeater-create="" id="agregarCertificado"
                                                            class="btn btn-success round waves-effect waves-light">
                                                            <i class="fa fa-plus"></i> Agregar
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="form-actions">

                                                    <button class="btn capa round text-white" id="registrarSede">
                                                        <i class="fa fa-save fa-2x"></i> Asociar sede a empresa
                                                    </button>
                                                    <br><br>
                                                    <div id="smgEmpresa">
                                                    </div>
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
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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