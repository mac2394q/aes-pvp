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
       //$objPlantilla = plantillaController::plantillaId($_GET['id']);
       $objGupo = plantillaController::grupoId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $_GET['id'];  ?>" name="idgrupo" />
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
                                        <li class="breadcrumb-item parrafo"><a class="text-white" href="index.php">listado </a>
                                        </li>
                                        <li class="breadcrumb-item active parrafo"><a class="text-white" href="<?php echo "verFicha.php?id=".$objGupo->getIdplantilla_maestra_grupo(); ?>">Plantilla / Capitulos</a>
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
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Elementos de Plantilla</h2>
                                        <a href="<?php echo "agregarElementos.php?id=".$objGupo->getIdplantilla_maestra_grupo();?>"
                                            class="btn text-white capa btn-sm round"><i class="fa fa-folder-plus fa-2x"></i>&nbsp;
                                            Agregar Nueva Rubrica al Capitulo</a>
                                        
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div>
                                                    <div style="">
                                                        <div id="smgPlantilla"></div>
                                                        <form class="form row">

                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title">
                                                                        <span class="text-danger">*</span>
                                                                        <li class="fa fa-audio-description"></li>
                                                                        Consecutivo del Capitulo
                                                                    </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="consecutivo"
                                                                    value="<?php echo $objGupo->getEtiqueta_grupo_plantilla();    ?>">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title">
                                                                        <span class="text-danger">*</span>
                                                                        <li class="fa fa-audio-description"></li>
                                                                        Titulo del Capitulo
                                                                    </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="titulo"
                                                                    value="<?php  echo $objGupo->getTitulo_conjunto();    ?>">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                <button type="button" id="editarGrupo"
                                                                    class="btn round text-white capa waves-effect waves-light"> <i
                                                                        class="fa fa-edit fa-2x"></i> Modificar
                                                                    Capitulo </button>
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