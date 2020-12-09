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
                                    <li class="breadcrumb-item active parrafo">Gestion Documental Empresa
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <a
                                                        href="<?php echo "validacionEmpresa.php?id=".$_GET['id']; ?>">
                                                        <h6 class="parrafo">Validación Empresa</h6>
                                                    </a>

                                                </div>
                                                <div>
                                                    <a
                                                        href="<?php echo "validacionEmpresa.php?id=".$_GET['id']; ?>"><i
                                                            class="fa fa-city secondary font-large-2 float-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <a
                                                        href="<?php echo "validacionRepresentante.php?id=". $_GET['id']; ?>">
                                                        <h6 class="parrafo">Validación Representante Legal </h6>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a
                                                        href="<?php echo "validacionRepresentante.php?id=". $_GET['id']; ?>"><i
                                                            class="fa fa-warehouse secondary font-large-2 float-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="form-section"><i class="fa fa-id-card-alt"></i>&nbsp;Documentos Adjuntos de
                                    la Empresa</h3>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <div class="form form-horizontal row-separator">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Plan de
                                                Contingencia:</h4>
                                            <div id="smgDocumentos1"></div>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar Documento Actual</label>
                                                <div class="col-md-9">
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="files11" name="files11">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    
                                                    <button class="btn capa round text-white waves-effect waves-light"
                                                        id="subirFileV3">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                    </button>
                                                    
                                                    &nbsp;&nbsp;
                                                     <?php if($_SESSION['rol'] != "EMPRESA" ){ ?> 
                                                    <button class="btn capa round text-white waves-effect waves-light"
                                                        id="eliminarDocumentoV3">
                                                        <i class="fa fa-ban fa-2x"></i>&nbsp;Eliminar
                                                    </button>
                                                     <?php } ?> 
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="projectinput9">Documento
                                                </label>
                                                <div class="col-md-9">
                                                    <a target="_blank"
                                                        href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/plan.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp;Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last" id="plan">
                                            </div>

                                        </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Manifestación Suscrita:
                                            </h4>
                                            <div id="smgDocumentos2"></div>

                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar Documento Actual</label>
                                                <div class="col-md-9">
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="file22" name="file22">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    
                                                    <button class="btn capa round text-white waves-effect waves-light"
                                                        id="subirFileV4">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                    </button>
                                                   
                                                    &nbsp;&nbsp;
                                                    <?php if($_SESSION['rol'] != "EMPRESA" ){ ?> 
                                                    <button class="btn capa round text-white waves-effect waves-light"
                                                        id="eliminarDocumentoV4">
                                                        <i class="fa fa-ban fa-2x"></i>&nbsp;Eliminar
                                                    </button>
                                                    <?php } ?> 
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="projectinput9">Documento
                                                </label>
                                                <div class="col-md-9">
                                                    <a target="_blank"
                                                        href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/manifestacion.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp; Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last" id="conti">
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


        $(document).on('click', '#registrarDocumento2', function (e) {

            var formData = new FormData();
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            formData.append("REPRESENTANTE", document.getElementsByName("REPRESENTANTE")[0].value);
            formData.append("descripcion3", document.getElementsByName("descripcion3")[0].value);
            formData.append("filea", $("#filea")[0].files[0]);


            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            var ruta = routesAppPlatform() + 'empresa/core/agregarValidacionEmpresa2.php';

            sendEventFormDataApp('POST', ruta, formData, '#empresa2');
            return false;
        });

        $(document).on('click', '#subirFileV4', function (e) {
            var formData = new FormData();
            //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
            formData.append("file22", $('#file22')[0].files[0]);
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/subirManifiesto.php', formData,
                '#conti');
            return false;
        });

        $(document).on('click', '#subirFileV3', function (e) {
            var formData = new FormData();
            //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
            formData.append("files11", $('#files11')[0].files[0]);
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/subirPlanContingencia.php',
                formData, '#plan');
            return false;
        });


        $(document).on('click', '#eliminarDocumentoV3', function (e) {
            var formData = new FormData();
            //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
            formData.append("files11", $('#files11')[0].files[0]);
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/eliminarPlanContingencia.php',
                formData, '#plan');
            return false;
        });

        $(document).on('click', '#eliminarDocumentoV4', function (e) {
            var formData = new FormData();
            //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
            formData.append("files11", $('#files11')[0].files[0]);
            formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
            sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/eliminarManifiesto.php',
                formData, '#conti');
            return false;
        });
    </script>
</body>

</html>