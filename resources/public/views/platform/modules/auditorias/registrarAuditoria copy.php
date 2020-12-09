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

       require_once (CONTROLLERS_PATH."plantillaController.php");

       require_once (CONTROLLERS_PATH."auditoriasController.php");

       require_once (CONTROLLERS_PATH."sedeController.php");

       session::verificarSesion($_SESSION['idsesion']);

       date_default_timezone_set('America/Bogota');

       setlocale(LC_ALL,"es_CO");

       $objusuarioR=usuarioDao::usuarioIdSesion($_SESSION['idsesion']);

      //  echo "id".$_SESSION['idusuario'];

      //print_r($_SESSION);

    ?>

</head>



<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"

    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">

    <input type="hidden" name="fechaTop" value="" />

    <input type="hidden" name="auditorTop" value="" />

    <input type="hidden" name="usuario" value="<?php  echo $objusuarioR->getIdusuario() ?>" />



    <!-- fixed-top-->

    <?php

    /* top bar  */

    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");

    /* Menu  */

    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");

  ?>

    <div class="app-content content">

        <div class="content-wrapper">

            <div class="content-header row">

                <div class="content-header-dark bg-img col-12">

                    <div class="row">

                        <div class="content-header-left col-md-9 col-12 mb-2">

                            <h3 class="content-header-title white">Módulo Auditorias</h3>

                            <div class="row breadcrumbs-top">

                                <div class="breadcrumb-wrapper col-12">

                                    <ol class="breadcrumb">

                                        <li class="breadcrumb-item active">Registrar nueva auditoria

                                        </li>

                                    </ol>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <br>

            <div class="content-body">

                <div class="content-body">

                    <section id="basic-form-layouts">

                        <div class="row match-height">

                            <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog"

                                aria-labelledby="myModalLabel16" aria-hidden="true">

                                <div class="modal-dialog modal-xl" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel16">Verificación de disponibilidad

                                                para programación de auditoria</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">×</span>

                                            </button>

                                        </div>

                                        <div class="modal-body">

                                            <div id="calendarioDiv">



                                            </div>

                                            <!-- <h5>Check First Paragraph</h5>

                                            <p>Oat cake ice cream candy chocolate cake chocolate cake cotton

                                                candy dragée apple pie. Brownie carrot

                                                cake candy canes bonbon fruitcake topping halvah. Cake sweet

                                                roll cake cheesecake cookie chocolate cake

                                                liquorice. Apple pie sugar plum powder donut soufflé.</p>

                                            <p>Sweet roll biscuit donut cake gingerbread. Chocolate cupcake

                                                chocolate bar ice cream. Danish candy

                                                cake.</p>

                                            <hr>

                                            <h5>Some More Text</h5>

                                            <p>Cupcake sugar plum dessert tart powder chocolate fruitcake jelly.

                                                Tootsie roll bonbon toffee danish.

                                                Biscuit sweet cake gummies danish. Tootsie roll cotton candy

                                                tiramisu lollipop candy cookie biscuit pie.</p> -->

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button"

                                                class="btn grey btn-outline-secondary waves-effect waves-light"

                                                data-dismiss="modal">Cerrar</button>

                                            <!-- <button type="button"

                                                class="btn btn-outline-primary waves-effect waves-light">Save

                                                changes</button> -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card-text">

                            <p>Rellene el formulario teniendo en cuenta que los campos con * son de

                                caracter obligatorios , los campos que no lo posean son opcionales

                            </p>

                        </div>

                        <div class="form">

                            <div class="form-body">



                                <br><br>

                                <h2 class="form-section"><i class="fa fa-mail-bulk"></i>

                                    Empresa ancla & Empresa asociada de negocio</h2>

                                <div class="row">

                                    <div class="col-md-3">

                                        <?php empresaController::listadoEmpresasSelect("empresaAncla","Empresa ancla:"); ?>

                                    </div>

                                    <div class="col-md-3" id="EmpresaDiv">

                                        <?php empresaController::listadoEmpresasSelect("empresaAso","Empresa asociada:"); ?>

                                    </div>

                                    <div class="col-md-6" id="sedeDiv">

                                        <label for=''>Sedes de empresa:</label>

                                        <select id='plantilla' name='plantilla' class='form-control'>

                                            <option value='null'>SIN SEDES PARA ASOCIAR</option>

                                        </select>

                                    </div>

                                </div>

                                <br><br>

                                <div class="row">



                                    <div class="col-md-8">

                                        <div class="form-group">

                                            <?php plantillaController::listadoPlantilla(); ?>

                                        </div>

                                    </div>

                                </div>



                                <br>

                                <br>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <?php usuarioController::listadoAuditores(); ?>

                                        </div>

                                    </div>



                                </div>

                                <br>

                                <br>

                                <div class="row">

                                    <div class="col-md-3">

                                        <div class="form-group">

                                            <label for="projectinput3">

                                                <h5 class="card-title">

                                                    <li class="fa fa-calendar-alt"></li> Fecha de

                                                    programación

                                                </h5>

                                            </label>

                                            <input type="date" class="form-control card-title" placeholder=". . . "

                                                name="fecha" id="fecha" value="" onchange='test()'>

                                        </div>

                                    </div>

                                    <div class="col-md-7">

                                        <div class="form-group">

                                            <label for="projectinput3">

                                                <h5 class="card-title">

                                                    <li class="fa fa-exclamation"></li> Verificación

                                                    del sistema :

                                                </h5>

                                            </label>

                                            <h5 class="card-title"><input readonly type="text"

                                                    class="form-control card-title" placeholder=". . . "

                                                    name="verificacion" value=". . . "></h5>

                                        </div>

                                    </div>

                                    <div class=" col-md-2">

                                        <div class="form-group"><br>

                                            <button class="btn btn-success" type="button" id="calendarioAuditor"

                                                data-toggle="modal" data-target="#xlarge">

                                                <li class="fa fa-calendar-check fa-2x"></li>

                                            </button>

                                        </div>

                                    </div>

                                </div>



                                <br><br>



                                <div class="form-actions">

                                    <button class="btn btn-success" id="registrarAuditoria">

                                        <i class="la la-check-square-o"></i> adjuntar Auditoria

                                    </button>

                                    <br>

                                    <hr>

                                    <div id="smgAuditoria"></div>

                                </div>

                            </div>

                        </div>

                </div>

                <br>

                        <hr>

                        <br>

                        <div class="row">

                           <?php echo auditoriasController::auditoriasSinAprobar(); ?>

                        </div>

                <!-- <div class="form-actions">

                    <button class="btn btn-success" id="registrarAuditoria">

                        <i class="la la-check-square-o"></i> Validar auditorias Auditoria

                    </button>

                    <br>

                    <hr>

                    <div id="smgAuditoriaV"></div>

                </div> -->

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

    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>

    <script>

        $(document).on('click', '#auditor', function (e) {

            document.getElementsByName("auditorTop")[0].value = document.getElementsByName("auditor")[0].value;

            console.log(document.getElementsByName("auditor")[0].value);

        });

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