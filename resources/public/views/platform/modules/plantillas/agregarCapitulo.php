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
       //echo "xcx".$_GET['id'];
       $objPlantilla = plantillaController::plantillaId($_GET['id']);
       //print_r($objPlantilla);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <input type="hidden" name="idplantilla" value="<?php echo $_GET['id']; ?>" />
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
                                    <li class="breadcrumb-item parrafo"><a class="text-white" href="index.php">Listado
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a class="text-white"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Plantilla /
                                            Capitulos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Agregar Elementos
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
                            <div class="col-md-12">
                                <div class="card" >
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                        Informacion General </h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
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
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title">Nombre de la Plantilla </h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="pais" id="pais"
                                                                    value="<?php echo $objPlantilla->getEtiqueta_plantilla();?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title">País </h5>
                                                                </label>
                                                                <input readonly type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="pais" id="pais"
                                                                    value="<?php echo $objPlantilla->getPais_plantilla();?>">
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Capitulo de la Plantilla</h2>
                                        
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div>
                                                    <div style="">
                                                        <div id="smgPlantilla"></div>
                                                        <form class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Consecutivo</label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="consecutivo">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Etiqueta de Grupo</label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="etiquetaPlantilla">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                <button type="button" id="registrarCapitulo"
                                                                    class="btn text-white capa waves-effect waves-light">
                                                                    <i class="fa fa-plus fa-2x"></i>
                                                                    Agregar Capitulo</button>
                                                            </div>
                                                            <br>
                                                        </form>
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
    </script>
</body>
</html>