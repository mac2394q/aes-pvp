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
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (CONTROLLERS_PATH."auditoriasController.php");
       require_once (CONTROLLERS_PATH."plantillaController.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idauditoria= $_GET['id'];
       $objAuditoria =auditoriasController::auditoriaID($idauditoria);
       $objplantilla = plantillaController::plantillaId($objAuditoria->getIdplantilla_madre_aditoria());
       $objUsuario = usuarioController::usuarioId($objAuditoria->getIdusuario_auditor());
       $objEmpresaAsociada=empresaController::objEmpresa( $objAuditoria->getIdempresa_asociada());
       $idempresaB = $objEmpresaAsociada->getIdempresarial();
       //$objPlantilla = plantillaController::grupoId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
     
    ?>
    <style>
        .daniela{
          font-size: 17px;
          font-weight: 600;
          height: 1rem;
          padding-top: 1.21rem;
          padding-bottom: 1.21rem;}
        </style>
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
            
            <div class="content-body">
                <div class="content-body">
                    <section id="basic-form-layouts">
                        <div class="row match-height">

                            <div class="col-12">
                                <div class="card">
                                    <div  class="card-header">
                                        <img src="https://aes.org.co/wp-content/uploads/2019/04/088.png" />
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                        <br>
                                        
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            RAZON SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresaAsociada->getNombre_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Fecha de Programacion
                                                        </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objAuditoria->getFecha_programada_auditoria();  ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Nombre Auditor
                                                        </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objUsuario->getNombre_usuario();  ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div id="top_bar2">
                                        <a class="btn btn-secondary round  waves-effect waves-light" href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">
                                            <i class="fa fa-clipboard fa-2x"></i> &nbsp;&nbsp;Ver ficha de auditoria
                                        </a>
                             
                                        <a target="_blank" href="<?php echo "oeaPDF.php?id=".$_GET['id']; ?>" class="btn round  btn-secondary waves-effect waves-light">
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
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div>
                                                    <div>
                                                        <?php auditoriasController::oea($_GET['id']); ?>
                                                        <hr>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <div id="smgPlantilla"></div>
                                                </div>

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