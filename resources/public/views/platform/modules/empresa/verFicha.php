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
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempresa = $_GET['id'];
       $objEmpresa =empresaController::objEmpresa($idempresa);
       $estado = null;
       if(intval($objEmpresa->getEstado_empresa()) == 1){
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
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
    <input type="hidden" value="0" name="certificadosDinamicos" />
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
                        <h3 class="content-header-title white titulo">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb parrafo">
                                <?php if($_SESSION['rol'] != "EMPRESA" ){ ?>                
                                    <li class="breadcrumb-item parrafo"><a href="index.php" class='text-white'>Empresas</a>
                                    </li>
                                <?php } ?>
                                    <li class="breadcrumb-item active parrafo ">Ver Ficha Empresa
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
                            <?php if($_SESSION['rol'] != "AUDITOR" ){ ?>
                            <li><a href="<?php echo "asociarSedes.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-store-alt"></i> Gestion de Sedes </a>
                            </li>
                            <?php } ?>
                            
                            <li><a href="<?php echo "seguridad.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-store-alt"></i> Documentos de Seguridad </a>
                            </li>
                      
                            <?php if($_SESSION['rol'] != "EMPRESA" ){ ?>
                            <li><a href="<?php echo "autentificacionEmpresa.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-shield-alt"></i> Autenticacion Empresa</a>
                            </li>
                            <?php } ?>
                            <?php if($_SESSION['rol'] != "AUDITOR" ){ ?>
                            <li><a href="<?php echo "asociarEmpresas.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-city"></i> Asociada de negocios & Ancla </a>
                            </li>
                            <?php } ?>
                            <?php //echo "../auditorias/auditoriasEmpresa.php?id=".$idempresa; ?>
                            <li><a href="<?php echo "../auditorias/seleccionRolAuditoria.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Historial de auditorias </a>
                            </li>
                            <li><a href="<?php echo "logoEmpresa.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Logo empresarial </a>
                            </li>
                            <?php if($_SESSION['rol'] != "EMPRESA" ){ ?>
                            <li>
                                <?php 
                                        if(intval($objEmpresa->getEstado_empresa()) == 1){
                                            echo "<button id='inhabilitarEmpresa' class='btn btn-warning round btn-min-width mr-1 mb-1 waves-effect waves-light'>
                                            <i class='fa fa-ban'></i> Inhabilitar empresa</button>";
                                        
                                        }else{
                                            echo "<button id='habilitarEmpresa' class='btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light'>
                                            <i class='fa fa-ban'></i> habilitar empresa</button>";
                                        } 
                                    ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title titulo" id="basic-layout-form">
                                    <li class="fa fa-bookmark fa-2x"></li> Estado de la Empresa
                                    <? echo $estado; ?>
                                </h4>
                                
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Información  General
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Compañía 
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresa->getNombre_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                No Identificación</h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="nit" id="nit"
                                                            value="<?php echo $objEmpresa->getNit_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                            Área Técnica </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="area" id="area"
                                                            value="<?php echo $objEmpresa->getIdarea_tecnica_empresa();  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Ciudad/Provincia/Municipio</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="ciudad" id="ciudad"
                                                        value="<?php echo $objEmpresa->getCiudad_principal_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Departamento/Estado</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="departamento" id="departamento"
                                                        value="<?php echo $objEmpresa->getDepartamento();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        País</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="pais" id="pais"
                                                        value="<?php echo $objEmpresa->getPais_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        Dirección</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="direccion" id="direccion"
                                                        value="<?php echo $objEmpresa->getDireccion_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                        Información Administrativa</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            E-mail
                                                            Empresarial</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder="@"
                                                        name="emailEmpresarial" id="emailEmpresarial"
                                                        value="<?php echo $objEmpresa->getCorreo_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>Sitio
                                                            web
                                                            Empresa</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="http://www. " name="sitioWeb" id="sitioWeb"
                                                        value="<?php echo $objEmpresa->getSitio_web_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">E-mail Electrónico para
                                                        Facturación</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder="@"
                                                        name="emailFacturacion" id="emailFacturacion"
                                                        value="<?php echo $objEmpresa->getCorreo_facturacion_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">Cierre Mensual</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="Dia 30  " name="fechaCorteFacturacion"
                                                        id="fechaCorteFacturacion"
                                                        value="<?php echo $objEmpresa->getFecha_corte_facturacion_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Comercial</h2>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Representante
                                                            Legal Compañía </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="representanteLegal" id="representanteLegal"
                                                        value="<?php echo $objEmpresa->getRepresentante_legal_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">Cargo</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="cargoRepresentante" id="cargoRepresentante"
                                                        value="<?php echo $objEmpresa->getCargo_representante_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Telefono (Movil
                                                            - Fijo )</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="# ext #" name="telefonoRepresentante"
                                                        id="telefonoRepresentante"
                                                        value="<?php echo $objEmpresa->getTelefono_movil_representante_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Representante del Sistema de Gestión</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="representanteSistemaGestion"
                                                        id="representanteSistemaGestion"
                                                        value="<?php echo $objEmpresa->getRepresentante_sistema_gestion();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">Cargo</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="cargoRepresentanteSistema"
                                                        id="cargoRepresentanteSistema"
                                                        value="<?php echo $objEmpresa->getCargo_representante_sistema_gestion_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Telefono (Movil
                                                            - Fijo)</h5>
                                                    </label>
                                                    <input readonly type="text" id="" class="form-control"
                                                        placeholder="# ext #" name="telefonoSistema"
                                                        id="telefonoSistema"
                                                        value="<?php echo $objEmpresa->getTelefono_movil_representante_sistema_gestion_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"> Correo Electrónico</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder="@"
                                                        name="emailContacto" id="emailContacto"
                                                        value="<?php echo $objEmpresa->getCorreo_sistema_gestion_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                Certificados Adjuntos  Empresa
                                </h2>
                              
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="repeater-default">
                                        <?php  empresaController::certificadosEmpresa($idempresa ); ?>
                                        <br>
                                        <br>
                                        <?php if($_SESSION['rol'] != "EMPRESA" ){ ?>
                                        <h4 class="card-title">Agregar Nuevos Certificados</h4>
                                        <div data-repeater-list="car">
                                            <div data-repeater-item="" style="">
                                                <form class="form row">
                                                    <div class="form-group mb-1 col-sm-12 col-md-2">
                                                        <label for=""><span
                                                                class="text-danger">*</span>Certificado:</label>
                                                        <br>
                                                        <select class="form-control" name="certificado">
                                                            <option value="ISO 9001">ISO 9001</option>
                                                            <option value="ISO 18001">ISO 18001 </option>
                                                            <option value="ISO 45001"> ISO 45001</option>
                                                            <option value="ISO 14001"> ISO 14001</option>
                                                            <option value="ISO 28001">ISO 28001</option>
                                                            <option value="OTRO">OTRO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-2">
                                                        <label for="email-addr"><span class="text-danger">*</span>
                                                            Entidad:</label>
                                                        <br>
                                                        <select class="form-control" i name="entidad">
                                                            <option value="ICONTEC">ICONTEC</option>
                                                            <option value="SGS">SGS </option>
                                                            <option value="AES"> AES</option>
                                                            <option value="COTECNA"> COTECNA</option>
                                                            <option value="BERITAS">BERITAS</option>
                                                            <option value="OTRO">OTRO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                        <label for=""><span class="text-danger">*</span> Serial /
                                                        Código</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="codigo"
                                                            placeholder=". . .">
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-3">
                                                        <label for=""><span class="text-danger">*</span> Fecha
                                                            Certificado</label>
                                                        <br>
                                                        <input type="date" id="timesheetinput3" class="form-control"
                                                            name="date">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                        <button type="button"
                                                            class="btn btn-danger  round waves-effect waves-light"
                                                            data-repeater-delete="" id="eliminarCertificado"> <i
                                                                class="ft-x"></i>
                                                            Eliminar</button>
                                                    </div>
                                                </form>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form row ">
                                            <div class="form-group col-md-3">
                                                <button data-repeater-create="" id="agregarCertificado"
                                                    class="btn text-white   round capa waves-effect waves-light">
                                                    <i class="fa fa-plus fa-2x"></i>&nbsp; Agregar
                                                </button>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button id="registrarCertificados"
                                                    class="btn text-white  round  capa waves-effect waves-light">
                                                    <i class="fa fa-th-list fa-2x"></i>&nbsp; Validar Certificados
                                                    Agregados
                                                </button>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="bordered-layout-basic-form">Otros Aspectos</h4>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form ">
                                        <div class="form-body">
                                            <div class="form-group col-md-5">
                                                <?php grupoController::select_grupEmpresa($objEmpresa->getIdgrupoEmpresarial()); ?>
                                            </div>
                                            <section id="image-gallery" class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Logo Empresarial</h4>
                                                    
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body">
                                                        <div class="card-text">
                                                            <p>El logo empresarial se reajusta para tener una
                                                                resolucion de 480x360 pixeles.</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-body  my-gallery" itemscope
                                                        itemtype="http://schema.org/ImageGallery">
                                                        <div class="row">
                                                            <?php
                                                         $url = DOCUMENTS_SERVER."fotosPerfil/".$idempresa."/".$idempresa.".jpg";
                                                         if(rutas::validarRutas($url)=="404"){
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
                                                                <a href="<?php echo DOCUMENTS_SERVER."fotosPerfil/".$idempresa."/".$idempresa.".jpg"; ?>"
                                                                    itemprop="contentUrl" data-size="480x360">
                                                                    <img class="img-thumbnail img-fluid"
                                                                        src="<?php echo DOCUMENTS_SERVER."fotosPerfil/".$idempresa."/".$idempresa.".jpg"; ?>"
                                                                        itemprop="thumbnail" alt="Image description" />
                                                                </a>
                                                            </figure>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!--/ Image grid -->
                                                </div>
                                                <?php if($_SESSION['rol'] != "EMPRESA" ){ ?>
                                                <div class="form-actions">
                                                    <button type="button" id="editarEmpresa"
                                                        class="btn text-white  round capa waves-effect waves-light">
                                                        <i class="fa fa-pen-square fa-2x"></i>&nbsp; Actualizar
                                                        Información
                                                    </button>
                                                    <button type="button" id="actualizarCambios"
                                                        class="btn text-white round capa waves-effect waves-light">
                                                        <i class="fa fa-save fa-2x"></i>&nbsp; Modificar
                                                    </button>
                                                    <div id="smgEmpresa"></div>
                                                </div>
                                                <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!--/ contendio -->
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
            $('#razonSocial').removeAttr("readonly");
            $('#nit').removeAttr("readonly");
            $('#pais').removeAttr("readonly");
            $('#ciudad').removeAttr("readonly");
            $('#departamento').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#fechaCorteFacturacion').removeAttr("readonly");
            $('#sitioWeb').removeAttr("readonly");
            $('#emailContacto').removeAttr("readonly");
            $('#sitioWeb').removeAttr("readonly");
            $('#emailFacturacion').removeAttr("readonly");
            $('#fechaCorteFacturacion').removeAttr("readonly");
            $('#representanteLegal').removeAttr("readonly");
            $('#cargoRepresentante').removeAttr("readonly");
            $('#telefonoRepresentante').removeAttr("readonly");
            $('#representanteSistemaGestion').removeAttr("readonly");
            $('#cargoRepresentanteSistema').removeAttr("readonly");
            $('#telefonoSistema').removeAttr("readonly");
            $('#emailEmpresarial').removeAttr("readonly");
            $('#actualizarCambios').show();
        });
        $(document).on('click', '#actualizarCambios', function (e) {
            $('#editarEmpresa').show();
            $('#razonSocial').removeAttr("readonly");
            $('#nit').removeAttr("readonly");
            $('#pais').removeAttr("readonly");
            $('#ciudad').removeAttr("readonly");
            $('#departamento').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#fechaCorteFacturacion').removeAttr("readonly");
            $('#sitioWeb').removeAttr("readonly");
            $('#emailContacto').removeAttr("readonly");
            $('#emailFacturacion').removeAttr("readonly");
            $('#fechaCorteFacturacion').removeAttr("readonly");
            $('#representanteLegal').removeAttr("readonly");
            $('#cargoRepresentante').removeAttr("readonly");
            $('#telefonoRepresentante').removeAttr("readonly");
            $('#representanteSistemaGestion').removeAttr("readonly");
            $('#cargoRepresentanteSistema').removeAttr("readonly");
            $('#telefonoSistema').removeAttr("readonly");
            $('#emailEmpresarial').removeAttr("readonly");
            $('#actualizarCambios').hide();
            sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
                params = {
                    "razonSocial": document.getElementsByName("razonSocial")[0].value,
                    "nit": document.getElementsByName("nit")[0].value,
                    "pais": document.getElementsByName("pais")[0].value,
                    "ciudad": document.getElementsByName("ciudad")[0].value,
                    "departamento": document.getElementsByName("departamento")[0].value,
                    "direccion": document.getElementsByName("direccion")[0].value,
                    "fechaCorteFacturacion": document.getElementsByName("fechaCorteFacturacion")[0].value,
                    "emailFacturacion": document.getElementsByName("emailFacturacion")[0].value,
                    "representanteLegal": document.getElementsByName("representanteLegal")[0].value,
                    "cargoRepresentante": document.getElementsByName("cargoRepresentante")[0].value,
                    "telefonoRepresentante": document.getElementsByName("telefonoRepresentante")[0].value,
                    "representanteSistemaGestion": document.getElementsByName(
                        "representanteSistemaGestion")[0].value,
                    "cargoRepresentanteSistema": document.getElementsByName("cargoRepresentanteSistema")[0]
                        .value,
                    "telefonoSistema": document.getElementsByName("telefonoSistema")[0].value,
                    "emailEmpresarial": document.getElementsByName("emailEmpresarial")[0].value,
                    "sitioWeb": document.getElementsByName("sitioWeb")[0].value,
                    "emailContacto": document.getElementsByName("emailContacto")[0].value,
                    "grupo": document.getElementsByName("grupo")[0].value,
                    "idempresa": document.getElementsByName("idempresa")[0].value
                }, '#smgEmpresa');
        });
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
<!-- END: Body-->
</html>
