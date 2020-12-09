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
       require_once (CONTROLLERS_PATH."sedeController.php");
       require_once (CONTROLLERS_PATH."seguridadController.php");
       session::verificarSesion($_SESSION['idsesion']);
       $objSede = sedeController::objSede($_GET['id']);
       $objEmpre =empresaController::objEmpresa($objSede->getIdempresa_sede());
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
      //  echo "id".$_SESSION['idusuario'];
      //print_r($objEmpre);
    ?>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
    <input type="hidden" name="idsede" id="idsede" value="<?php echo  $objSede->getIdsede(); ?>" />
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $_GET['id']; ?>" />
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <input type="hidden" value="0" name="certificados1" />
    <input type="hidden" value="0" name="certificados2" />
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
                        <h3 class="content-header-title white">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a href="index.php"
                                            class="text-white">Empresas</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>"
                                            class="text-white">Folio Empresa</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a
                                            href="<?php echo "seguridad.php?id=".$_GET['id']; ?>"
                                            class="text-white">Gestión Documental Empresa</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Validación Empresa
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
                    <div class="row match-height">
                        <!-- documentos adjntos -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title titulo">Gestión Documental Empresa</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <?php  empresaController::listadoDocumentosEmpresaValidacion($_GET['id'],"EMPRESA"); ?>
                                            <br>
                                            <hr>
                                            <div>
                                                <div style="">
                                                    <form class="form row">
                                                        <div class="form-group mb-1 col-sm-12 col-md-3">
                                                            <?php seguridadController::listadoCertificados2("EMPRESA"); ?>
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-5">
                                                            <label for="projectinput3"><span
                                                                    class="text-danger">*</span>
                                                                </span> Descripción del Documento </label><br><br>
                                                            <input type="text" id="descripcion2" class="form-control"
                                                                placeholder=". . . " name="descripcion2">
                                                        </div>
                                                        <div class="form-group mb-1 col-sm-12 col-md-6">
                                                            <label for="email-addr"><span class="text-danger">*</span>
                                                                Adjunto:</label>
                                                            <br><br><br>
                                                            <input type="file" id="files2" name="files2" />
                                                        </div>
                                                    </form>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form row ">
                                                <div class="form-group col-md-3">
                                                    <button id="registrarDocumento"
                                                        class="btn round capa text-white waves-effect waves-light">
                                                        <i class="fa fa-plus fa-2x"></i>&nbsp; Agregar Documento
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                            <div id="empresa"></div>
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
    <script>
        $(document).on('click', '#registrarDocumento', function (e) {
            var formData = new FormData();
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            formData.append("EMPRESA", document.getElementsByName("EMPRESA")[0].value);
            formData.append("descripcion2", document.getElementsByName("descripcion2")[0].value);
            formData.append("files2", $("#files2")[0].files[0]);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            var ruta = routesAppPlatform() + 'empresa/core/agregarValidacionEmpresa.php';
            sendEventFormDataApp('POST', ruta, formData, '#empresa');
            return false;
        });

        $(document).on('click', '#eliminarDocumento', function (e) {
            var formData = new FormData();
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            
            
            var ruta = routesAppPlatform() + 'empresa/core/eliminarValidacionEmpresa.php';
            sendEventFormDataApp('POST', ruta, formData, '#empresa');
            return false;
        });
       

    </script>
</body>
</html>