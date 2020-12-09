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
       require_once (CONTROLLERS_PATH."plantillaController.php");
       require_once (CONTROLLERS_PATH."auditoriasController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objAuditoria = auditoriaDao::auditoriaId($_GET['id']);
       //$objPlantilla = plantillaController::grupoId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idauditoria" />
    <input type="hidden" name="fechaTop" value="0" />
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-wrapper">

            <br>
            <div class="content-body">
                <div class="content-body">

                    <div class="row match-height">
                        <div class="col-6">
                            <div class="card">
                                <div id="top_bar2" class="card-header">
                                    <div>
                                        <h2 class="form-section titulo"><i class="fa fa-file-pdf fa-2x"></i>
                                            Certificado de Auditoría</h2>
                                        <br>
                                        <a class="btn capa text-white round waves-effect waves-light"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">
                                            <i class="fa fa-clipboard round  fa-2x"></i> &nbsp;&nbsp;Ver Ficha de
                                            Auditoría
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <h4 class="form-section parrafo"><i class="fa fa-folder-open fa-2x"></i>
                                            Certificado de Auditoría:</h4>
                                            <div class="form-group row mx-auto last" id="respuesta"></div>
                                        <div class="form-group row mx-auto">
                                            
                                            <div class="col-md-9">
                                                <label id="projectinput8" class="file center-block">
                                                    <input type="file" id="files" name="files">
                                                    <span class="file-custom"></span>
                                                </label>&nbsp;&nbsp;&nbsp;
                                                <?php if($_SESSION['rol'] == "ADMINISTRADOR"){ ?>
                                                <button class="btn capa round text-white waves-effect waves-light"
                                                    id="subirCertificacion">
                                                    <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                </button>
                                                <?php } ?>
                                                &nbsp;&nbsp;

                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto last">
                                            <br>
                                            <div class="col-md-9">
                                                <?php
                                                        if(rutas::validarRutas( DOCUMENTS_SERVER."documentos/auditoria/".$_GET['id']."/".$_GET['id']."_certificado.pdf") == "200"){
                                                            echo " <div class='badge badge-success round'>Archivo Cargado</div>";
                                                        } ?>
                                                <a target="_blank"
                                                    href="<?php echo DOCUMENTS_SERVER."documentos/auditoria/".$_GET['id']."/".$_GET['id']."_certificado.pdf"; ?>"
                                                    class="btn capa text-white round waves-effect waves-light">
                                                    <i class="fa fa-download fa-2x"></i>&nbsp;Descargar Documento
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto last" id="plan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div id="top_bar2" class="card-header">
                                    <div>
                                        <h2 class="form-section titulo"><i class="fa fa-file-pdf fa-2x"></i>
                                            Cierre de Auditoría</h2>
                                        <br>

                                    </div>
                                </div>
                               
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div id="smgDocumentos1"></div>
                                        <div class="form-group row mx-auto">
                                        <div class="form-group">
                                                <label for=''>
                                                    <h5 class='card-title'>
                                                        <li class='fa fa-warehouse'></li> <span
                                                            class='text-danger'>*</span> Fecha de Cierre de Auditoría
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <label for=''>
                                                    <h5 class='card-title'>
                                                         Cierre <?php echo $objAuditoria->getFecha_cierre_auditoria(); ?>
                                                    </h5>
                                                </label>

                                                <input type="date" class="form-control card-title" placeholder=". . . "
                                                    name="fecha" id="fecha" value="" onchange='test()'>
                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto last">
                                            
                                            <div class="col-md-9">
                                            <?php if($_SESSION['rol'] == "EMPRESA" || $_SESSION['rol'] == "ADMINISTRADOR"){ ?>
                                                <button id="cierreAuditoria"
                                                    class="btn capa text-white round waves-effect waves-light">
                                                    <i class="fa fa-download fa-2x"></i>&nbsp;Registrar Fecha de Cierre
                                                </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto last" id="respuesta">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://www.google.com/jsapi"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/pie/pie.min.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>.
    <script>
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