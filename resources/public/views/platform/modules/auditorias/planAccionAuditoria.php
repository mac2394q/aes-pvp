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
       //$objPlantilla = plantillaController::grupoId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idauditoria" />

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
                        <h3 class="content-header-title white titulo">Módulo Auditoría</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a class="text-white" href="index.php">Listado </a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a class="text-white" 
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver ficha de
                                            Auditoría</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Proceso de Plan Accion
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

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="form-section titulo"><i class="fa fa-business-time"></i>
                                            Plantilla PVP</h2>
                                        <br>
                                        <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "AUDITOR"){ ?>
                                        <h4 class="card-title parrafo">Nota : Auditor la opcion de <code> |VALIDAR PLAN
                                                DE ACCION| </code> si y solo si todas las rubricas de plan de accion
                                            fueron evaluadas y chequeadas correctamente. </h4>
                                        <br>
                                        
                                        <div class="form-group ">
											<a  id="finalizarPlan" class="btn round capa text-white waves-effect waves-light text-white">  <i class="fa fa-clipboard-check fa-2x"></i>&nbsp; Validar plan de accion</a>
                                            <a  target="_blank" href="<?php echo "planAccionAuditoriaPDF.php?id=".$_GET['id']; ?>" class="btn round capa text-white waves-effect waves-light text-white">  <i class="fa fa-file-pdf fa-2x"></i>&nbsp;PDF</a>
                                        </div>
                                        <?php } ?>
                                        <!--  session para empresas -->
                                        <?php if($_SESSION['rol'] == "EMPRESA"){ ?>
                                          <div class="form-group ">
									      <a  target="_blank" href="<?php echo "planAccionAuditoriaPDF.php?id=".$_GET['id']; ?>" class="btn round capa text-white waves-effect waves-light text-white">  <i class="fa fa-file-pdf fa-2x"></i>&nbsp;PDF</a>
                                        </div>
                                        <?php } ?>
                                        <br>
                                        <div class="form-group ">
                                            <div id="smgAuditoria"></div>
                                        </div>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-h font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">

                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div>
                                                    <div>
                                                        <?php auditoriasController::listadoGrupoAuditoriaItemPlanAccion($_GET['id']); ?>
                                                        <hr>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <div id="smgAuditoria"></div>
                                                </div>

                                            </div>
                                            <br>
                                            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "AUDITOR"){ ?>
                                            <div class="form-group ">
                                                <a id="finalizarPlan"
                                                    class="btn round capa text-white waves-effect waves-light text-white">
                                                    <i class="fa fa-clipboard-check fa-2x"></i>&nbsp; Validar plan de
                                                    accion</a>
                                            </div>
                                            <?php } ?>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>
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