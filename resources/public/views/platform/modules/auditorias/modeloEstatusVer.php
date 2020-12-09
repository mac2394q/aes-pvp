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
       $objEmpresa = empresaDao::empresaId($_GET['id']);
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
        <div class="content-wrapper">
            <br>
            <div class="content-body">
                <div class="content-body">
                    <section>
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    <div id="top_bar2" class="card-header">
                                        <div>
                                            <a class="btn btn-secondary round waves-effect waves-light"
                                                href="<?php echo "../empresa/verFicha.php?id=".$_GET['id']; ?>">
                                                <i class="fa fa-clipboard fa-2x"></i> &nbsp;&nbsp;Ver ficha de empresa
                                            </a>
                                            <a target="_blank" href="<?php echo "estatusPDF.php?id=".$_GET['id']; ?>"
                                                class="btn btn-secondary round waves-effect waves-light">
                                                <i class="fa fa-file-pdf fa-2x"></i> &nbsp;PDF
                                            </a>
                                        </div>
                                        <h3 class="form-section">
                                            <strong>INFORMACIÓN GENERAL DE LA ORGANIZACIÓN</strong>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            FECHA DE ENTREGA DE INFORME
                                                        </h5>
                                                    </label>
                                                    <input type="date" class="form-control" placeholder=". . ."
                                                        name="fechaInforme" id="fechaInforme"
                                                        value="<?php echo date("Y")."-" .date("m")."-". date("d"); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            NOMBRE DE EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresa->getNombre_empresa(); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <h2 class="form-section"><i class="fa fa-chart-bar"></i>
                                                    ESTATUS DE VINCULACIÓN AL PROGRAMA PVP </h2>

                                                <?php  auditoriasController::listadoModeloStatus($_GET['id']); ?>
                                                
                                                <div aria-expanded="true" aria-labelledby="description"
                                                    class="tab-pane active" id="desc" role="tabpanel">
                                                    <br>
                                                   
                                                    <h2 class="my-1">
                                                        Estatus de Vinculacion al Programa de Verificacion de
                                                        Proveedores
                                                    </h2>
                                                    <table id="" class="table-responsive mt-1">
                                                        <thead>
                                                            <tr role="row">
                                                                <th width="70%"> ESTATUS :
                                                                </th>
                                                                <th width="30%"> NO EMPRESAS :
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="even">
                                                                <td>AUDITADA</td>
                                                                <td>
                                                                <?php echo auditoriasController::estadoModeloStatus('PRO12',$_GET['id']); ?>
                                                                </td>
                                                            </tr>
                                                            <tr role="row" class="even">
                                                                <td>PROGRAMADA</td>
                                                                <td>
                                                                <?php echo auditoriasController::estadoModeloStatus('PRO02',$_GET['id']); ?>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr role="row" class="even">
                                                                <td>TOTAL </td>
                                                                <td>
                                                                    <?php echo auditoriasController::estadoModeloStatusTotal($_GET['id']); ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div id="pie-chart"></div> -->
                                    </div>
                                    <br><br>
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
    <script src="https://www.google.com/jsapi"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/pie/pie.min.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>
    <script>
        function drawPie() {
            var e = google.visualization.arrayToDataTable([
                ["Task", "Hours per Day"],
                ["NO  AUDITADA", 12],
                ["AUDITADA", 50],
                ["PROGRAMADA", 12],
                ["TOTAL", 12]
            ]);
            new google.visualization.PieChart(document.getElementById("pie-chart")).draw(e, {
                title: " Estatus de Vinculacion al Programa de Verificacion de Proveedores",
                height: 300,
                fontSize: 15,
                colors: ["#e30707", "#196e0f", "#f2e30f", "#E84A5F", "#474747"],
                chartArea: {
                    left: "8%",
                    width: "90%",
                    height: 450
                }
            })
        }
        google.load("visualization", "1.0", {
            packages: ["corechart"]
        }), google.setOnLoadCallback(drawPie), $(function () {
            function e() {
                drawPie()
            }
            $(window).on("resize", e), $(".menu-toggle").on("click", e)
        });
    </script>
</body>
</html>