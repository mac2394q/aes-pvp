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
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objPlantilla = plantillaController::plantillaId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idplantilla" />
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
                        <h3 class="content-header-title white titulo">Módulo Plantilla</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a href="index.php" class="text-white">Listado</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Ficha de Plantilla
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
                                            
                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                        Información General </h2>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Área Asociada:
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput1"
                                                                    class="form-control" placeholder=". . ."
                                                                    name="etiqueta" id="etiqueta"
                                                                    value="<?php echo $objPlantilla->getIdarea_tecnica_plantilla();?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title">Nombre de la Plantilla </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="nombre" id="nombre"
                                                                    value="<?php echo $objPlantilla->getEtiqueta_plantilla();?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title">País </h5>
                                                                </label>
                                                                <input type="text" readonly id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="pais" id="pais"
                                                                    value="<?php echo $objPlantilla->getPais_plantilla();?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <?php areaController::select_area_listado($objPlantilla->getIdarea_tecnica_plantilla()); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <a href="<?php echo "agregarElementos.php?id=".$_GET['id'];?>"
                                                        class="btn round text-white capa btn-sm"><i
                                                            class="fa fa-file-alt fa-3x"></i>&nbsp; Nueva
                                                        Rubrica al Capitulo</a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="<?php echo "agregarCapitulo.php?id=".$_GET['id'];?>"
                                                        class="btn round text-white capa btn-sm"><i
                                                            class="fa fa-folder-plus fa-3x"></i>&nbsp; Nuevo Capitulo a
                                                        la Plantilla</a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a id="editarPlantilla" href="#"
                                                        class="btn text-white capa round btn-sm"><i
                                                            class="fa fa-edit fa-3x"></i>&nbsp; Modificar Datos de la
                                                        Plantilla</a>
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
                                            Elementos de Plantilla</h2>
                                        <h4 class="card-title">Elementos de Conjunto</h4>
                                        
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div data-repeater-list="car">
                                                    <div data-repeater-item="" style="">
                                                        <?php plantillaController::listadoPlantillasGrupo($_GET['id']); ?>

                                                        <hr>
                                                    </div>
                                                </div>

                                                <br>
                                                <br>
                                                <div class="form-actions">


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