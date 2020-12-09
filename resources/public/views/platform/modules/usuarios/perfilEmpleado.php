<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (PROVIDERS_PATH."pdo/usuarioDao.php");
       require_once (PROVIDERS_PATH."pdo/sesionDao.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempleado = $_GET['id'];
       $objEmpleado =usuarioDao::usuarioId($idempleado);
       $objSesion = sesionDao::sesionID($objEmpleado->getIdsesion_usuario());
  ?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }
        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
    </style>
      
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"  style="zoom:75%;">
    <input type="hidden" value="<?php  echo $_GET['id']; ?>" name="idempleado" />
    <!-- BEGIN: Header-->
    <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title white">Módulo Usuarios</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a href="empleados.php" class='text-white'>Listado de Usuarios</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a class='text-white' href="<?php echo "verFicha.php?id=".$idempleado; ?>">Fichero Empleado</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo">Foto perfil
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
                <div class="">
                    <section id="basic-form-layouts">
                    
                      
                            
                        
                        <div class="col-md-12">
                            <div class="card">
                                
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        
                                        <form class="form form-horizontal form-bordered">
                                            <div class="form-body">
                                                
                                                <h4 class="form-section"><i class="ft-clipboard"></i> Foto de perfil del empleado
                                                </h4>
                                                <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <div class="card-text">
                                                        <p>La foto empleado se reajusta para tener una
                                                            resolucion de 480x360 pixeles.</p>
                                                    </div>
                                                </div>
                                                <div class="card-body  my-gallery" itemscope
                                                    itemtype="http://schema.org/ImageGallery">
                                                    <div class="row">
                                                        <?php
                                                          $url = DOCUMENTS_SERVER."fotosPerfilEmpleados/".$idempleado."/".$idempleado.".jpg";
                                                         if(rutas::validarRutas($url)=="404"){;
                                                    ?>
                                                        <figure class="col-lg-3 col-md-6 col-12"
                                                            itemprop="associatedMedia" itemscope
                                                            itemtype="http://schema.org/ImageObject">
                                                            <a href="http://pvp.aes.org.co/vendor/aes/notfound.png"
                                                                itemprop="contentUrl" data-size="480x360">
                                                                <img class="img-thumbnail img-fluid"
                                                                    src="http://pvp.aes.org.co/vendor/aes/notfound.png"
                                                                    itemprop="thumbnail" alt="Image description" />
                                                            </a>
                                                        </figure>
                                                        <?php }else{ ?>
                                                        <figure class="col-lg-3 col-md-6 col-12"
                                                            itemprop="associatedMedia" itemscope
                                                            itemtype="http://schema.org/ImageObject">
                                                            <a href="<?php echo DOCUMENTS_SERVER."fotosPerfilEmpleados/".$idempleado."/".$idempleado.".jpg"; ?>"
                                                                itemprop="contentUrl" data-size="480x360">
                                                                <img class="img-thumbnail img-fluid"
                                                                    src="<?php echo DOCUMENTS_SERVER."fotosPerfilEmpleados/".$idempleado."/".$idempleado.".jpg"; ?>"
                                                                    itemprop="thumbnail" alt="Image description" />
                                                            </a>
                                                        </figure>
                                                        <?php } ?>


                                                    </div>
                                                    
                                                </div>
                                                <!--/ Image grid -->
                                            </div>
                                               
                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-3 label-control">Foto perfil empleado</label>
                                                    
                                                    <div class="col-md-9">
                                                        <label class="file center-block">
                                                            <input type="file" id="files" name="files">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                
                                                <button type="button" id="subirFileV1"
                                                    class="btn capa text-white round  waves-effect waves-light">
                                                    <i class="fa fa-save fa-2x"></i> Cambiar foto perfil
                                                </button>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;

                                                <a href="<?php echo "verFicha.php?id=".$idempleado; ?>"
                                                    class="btn btn-danger round waves-effect waves-light">
                                                    <i class="fa fa-ban fa-2x"></i> Cancelar
                                                </a>
                                                <br><br>
                                                <hr>
                                                <div id="smgEmpleado"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </section>
                    <!--/ contendio -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Customizer-->
    <!-- End: Customizer-->
    <!-- Buynow Button-->
    <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/module.js"; ?>"></script>


</body>
<!-- END: Body-->
</html>
