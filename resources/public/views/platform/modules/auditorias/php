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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:100%;">
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
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div id="top_bar2" class="card-header">
                                        <div >
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Verificacion de cumplimineto de requisitos</h2>
                                        <br>
                                        <h4 class="card-title">Nota : este informe muestra el estado luego de terminada
                                            la auditoria,tenga en cuenta que los procentaje son calculados por la
                                            plataforma segun el numero de rubrica evaluadas y segun su estado <code>
                                                Cumple </code> o <code> No cumple </code>
                                        </h4>
                                        <br>
                                        
                                        <a class="btn btn-secondary waves-effect waves-light" href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">
                                            <i class="fa fa-clipboard fa-2x"></i> &nbsp;&nbsp;Ver ficha de auditoria
                                        </a>
                             
                                        <a target="_blank" href="<?php echo "resumenAuditoriaPDF.php?id=".$_GET['id']; ?>" class="btn btn-secondary waves-effect waves-light">
                                            <i class="fa fa-file-pdf fa-2x"></i> &nbsp;PDF
                                        </a>
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
                                        <div class="card-body" >
                                            <div id="imprimir">
                                           
                                            
                                            <!-- <img src="<?php echo VENDOR_SERVER."aes/reporte.png"; ?>" width="970" height="120"> -->
                                            <br><br><br><br>
                                            <p class="card-text">Numero de rubricas evaluadas durante la auditoria :
                                                <?php echo auditoriaDao::rubricasEvaludas($_GET['id']); ?></p>
                                            <br>
                                            
                                            <div id="pie-chart"></div>
                                            <h2 class="form-section"><i class="fa fa-chart-bar"></i>
                                            Resumen de cumplimiento </h2>
                                            <?php plantillaController::listadoPlantillasInforme($objAuditoria->getIdplantilla_madre_aditoria(),$_GET['id']); ?>
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
    <script src="https://www.google.com/jsapi"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/pie/pie.min.js"></script> -->
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
        function drawPie() {
            var e = google.visualization.arrayToDataTable([
                ["Task", "Hours per Day"],
                ["Cumplen", <?php echo auditoriaDao::rubricasCumplidas($_GET['id']); ?> ],
                ["No cumplen", <?php echo auditoriaDao::rubricasNoCumplidas($_GET['id']); ?> ]
            ]);
            new google.visualization.PieChart(document.getElementById("pie-chart")).draw(e, {
                title: "Estado de la auditoria",
                height: 400,
                fontSize: 12,
                colors: ["#0288D1", "#d50000", "#FF847C", "#E84A5F", "#474747"],
                chartArea: {
                    left: "5%",
                    width: "90%",
                    height: 350
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


        $(document).on('click', '#imprimirFactura', function (e) {
        //$('#areaImprimir').hide();
        $('#top_bar').hide();
        $('#top_bar2').hide();
        window.print();
        $('#areaImprimir').show();
        $('#top_bar').show();
        $('#top_bar2').show();
        });
    </script>
</body>
</html>