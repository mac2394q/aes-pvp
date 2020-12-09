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
       //print_r($objEmpleado);
       $estado = null;
       if(intval($objSesion->getEstado_sesion()) == 1){
        $estado = "<div class='badge badge-pill badge-success'><li class='fa fa-check-circle'></li>&nbsp;ACTIVA</div>";
       }else{
        $estado = "<div class='badge badge-pill badge-danger'><li class='fa fa-ban'></li>&nbsp; INACTIVA</div>";
       } 
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idempleado" id="idempleado" value="<?php echo  $idempleado; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />

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
                        <h3 class="content-header-title white titulo">Módulo Empleado</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <?php if($_SESSION['rol'] != "AUDITOR" ){ ?>
                                    <li class="breadcrumb-item parrafo "><a class="text-white" href="empleados.php">Listado </a>
                                    </li>
                                    <?php } ?>
                                    <li class="breadcrumb-item active parrafo">Ver Ficha Empleado
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
                        <ul class="list-inline mb-0">
                            <?php 
                            if($objEmpleado->getTipo_usuario() == "AUDITOR" ){
                                ?>
                            <li><a href="<?php echo "../usuarios/historialAuditorias.php?id=".$idempleado; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Historial de Auditorías </a>
                            </li>
                            <?php }?>
                            <li><a href="<?php echo "perfilEmpleado.php?id=".$idempleado; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Foto Perfil </a>
                            </li>

                            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "COMERCIAL" ){ ?>
                            <li><a href="<?php echo "autentificacionEmpleado.php?id=".$idempleado; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Autenticación </a>
                            </li>
                            <?php }?>
                            
                        </ul>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">
                                    <li class="fa fa-exclamation"></li> Estado :
                                    <? echo $estado; ?>
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Información
                                                General
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Nombre del Empleado
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="nombre" id="nombre"
                                                            value="<?php echo $objEmpleado->getNombre_usuario();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Tipo de Usuario </h5>
                                                        </label>
                                                        <select disabled id='area' name='area' class='form-control'>
                                                            <?php echo "<option value='".$objEmpleado->getTipo_usuario()."'>".$objEmpleado->getTipo_usuario()."</option>";  ?>
                                                            <option value="AUDITOR">AUDITOR</option>
                                                            <option value="COMERCIAL">COMERCIAL</option>
                                                            <option value="ADMINISTRACION">ADMINISTRACION</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Documento </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="documento" id="documento"
                                                            value="<?php echo $objEmpleado->getDocumento_usuario();  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Correo Electrónico </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="correo1" id=correo1"
                                                        value="<?php echo $objEmpleado->getCorreo_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Telefono</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="telefono" id="telefono"
                                                        value="<?php echo $objEmpleado->getTelefono_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        Dirección</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="direccion" id="direccion"
                                                        value="<?php echo $objEmpleado->getDireccion_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            E-mail Corporativo </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="correo2" id="correo2"
                                                        value="<?php echo $objEmpleado->getMail_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Ciudad de Residencia </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="ciudad" id="ciudad"
                                                        value="<?php echo $objEmpleado->getCiudad_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        País </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="pais" id="pais"
                                                        value="<?php echo $objEmpleado->getPais_usuario();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <p class="parrafo">la foto de  se reajusta para tener una
                                                        resolucion de 280x160 pixeles.</p>
                                                </div>
                                            </div>
                                            <div class="card-body  my-gallery" itemscope
                                                itemtype="http://schema.org/ImageGallery">
                                                <div class="row">
                                                    <?php
                                                    
                                                         $url = DOCUMENTS_SERVER."fotosPerfilEmpleados/".$idempleado."/".$idempleado.".jpg";
                                                         //echo $url;
                                                         if(rutas::validarRutas($url)=="404"){;
                                                    ?>
                                                    <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia"
                                                        itemscope itemtype="http://schema.org/ImageObject">
                                                        <a href="http://pvp.aes.org.co/vendor/aes/notfound.png"
                                                            itemprop="contentUrl" data-size="280x160">
                                                            <img class="img-thumbnail img-fluid"
                                                                src="http://pvp.aes.org.co/vendor/aes/notfound.png"
                                                                itemprop="thumbnail" alt="Image description" />
                                                        </a>
                                                    </figure>
                                                    <?php }else{ ?>
                                                    <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia"
                                                        itemscope itemtype="http://schema.org/ImageObject">
                                                        <a href="<?php echo DOCUMENTS_SERVER."fotosPerfilEmpleados/".$idempleado."/".$idempleado.".jpg"; ?>"
                                                            itemprop="contentUrl" data-size="280x160">
                                                            <img class="img-thumbnail img-fluid" width="250"
                                                                src="<?php echo DOCUMENTS_SERVER."fotosPerfilEmpleados/".$idempleado."/".$idempleado.".jpg"; ?>"
                                                                itemprop="thumbnail" alt="Image description" />
                                                        </a>
                                                    </figure>
                                                    <?php } ?>


                                                </div>

                                            </div>
                                            <!--/ Image grid -->
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" id="editarEmpresa"
                                                class="btn capa round text-white waves-effect waves-light">
                                                <i class="fa fa-pen-square fa-2x"></i>&nbsp; Actualizar Formulario
                                            </button>
                                            <button type="button" id="actualizarCambios"
                                                class="btn round capa text-white waves-effect waves-light">
                                                <i class="fa fa-save fa-2x"></i>&nbsp; Modificar
                                            </button>
                                            <div id="smgEmpleado"></div>
                                        </div>

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
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/sweet-alerts.min.js"; ?>"></script>
    <script>
        $('#actualizarCambios').hide();


        $(document).on('click', '#editarEmpresa', function (e) {
            $('#editarEmpresa').hide();
            $('#nombre').removeAttr("readonly");
            $('#area').removeAttr("readonly");
            $('#documento').removeAttr("readonly");
            $('#correo1').removeAttr("readonly");
            $('#telefono').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#correo2').removeAttr("readonly");
            $('#pais').removeAttr("readonly");
            $('#ciudad').removeAttr("readonly");
            $('#actualizarCambios').show();
        });

        $(document).on('click', '#actualizarCambios', function (e) {

            $('#editarEmpresa').show();

            $('#nombre').removeAttr("readonly");
            $('#area').removeAttr("readonly");
            $('#documento').removeAttr("readonly");
            $('#correo1').removeAttr("readonly");
            $('#telefono').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#correo2').removeAttr("readonly");
            $('#pais').removeAttr("readonly");
            $('#ciudad').removeAttr("readonly");

            $('#actualizarCambios').hide();

            sendEventApp('POST', routesAppPlatform() + 'usuarios/core/modificarEmpleado.php',
                params = {
                    "nombre": document.getElementsByName("nombre")[0].value,
                    "area": document.getElementsByName("area")[0].value,
                    "documento": document.getElementsByName("documento")[0].value,
                    "ciudad": document.getElementsByName("ciudad")[0].value,
                    "correo1": document.getElementsByName("correo1")[0].value,
                    "telefono": document.getElementsByName("telefono")[0].value,
                    "direccion": document.getElementsByName("direccion")[0].value,
                    "correo2": document.getElementsByName("correo2")[0].value,
                    "pais": document.getElementsByName("pais")[0].value,
                    "ciudad": document.getElementsByName("ciudad")[0].value,
                    "idempleado": document.getElementsByName("idempleado")[0].value
                }, '#smgEmpleado');

        });
    </script>
</body>
<!-- END: Body-->

</html>
