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
                                            RESUMEN EJECUTIVO SOBRE CUMPLIMIENTO DE REQUISITOS OEA </h2>
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
                                                            Fecha de programación
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
                                                            Nombre auditor
                                                        </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objUsuario->getNombre_usuario();  ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div id="top_bar2">
                                        <a class="btn btn-secondary waves-effect waves-light" href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">
                                            <i class="fa fa-clipboard fa-2x"></i> &nbsp;&nbsp;Ver ficha de auditoría
                                        </a>
                             
                                        <button  id="imprimirFactura" class="btn btn-secondary waves-effect waves-light">
                                            <i class="fa fa-file-pdf fa-2x"></i> &nbsp;PDF
                                        </button>
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
                                            <div class="row">
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                    1. ACTIVIDADES DESARROLLADAS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='textarea'
                                                    style="border: 1px solid #888;" name='textarea' rows='4' cols='120'>.
                                                    0. Objetivo de la auditoria: Verificar la implementación adecuada de los requisitos minimos de seguridad de la seguridad en la cadena de suministro internacional.

1. Reunión de apertura para auditoria de verificación Requisitos mínimos de seguridad del operador económico autorizado en Colombia de acuerdo resolución 000015 del 17 de Febrero del 2016.

2. Ejecución de auditoria de verificación Requisitos mínimos de seguridad del operador económico autorizado en Colombia de acuerdo resolución 000015 del 17 de Febrero del 2016. :
      * Verificación documental magnetica y fisica de la información requerida para evidenciar el cumplimiento de cada requisito.

     * Recorrido a las instalaciones para verificación de controles de sistema de seguridad electronica, controles de ingreso de visitantes, controles y demarcación de zonas criticas.

    * Verificación de porte de carnet de identificación del personal y conocimiento de politicas de seguridad y procedimientos relacionados con la cadena de suministro.

3. Reunión de cierre de la auditoria de verificación Requisitos mínimos de seguridad del operador económico autorizado en Colombia de acuerdo resolución 000015 del 17 de Febrero del 2016

                                                </textarea>
                                            </div>
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                    2. ASPECTO RELEVANTES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='textarea'
                                                    style="border: 1px solid #888;" name='textarea' rows='4' cols='120'>.Aspectos relevantes positivos: La compañia cuenta con un sistema de gestión certificado con ISO 9001 y un sistema de seguridad en la cadena de suministro certificado con la norma ISO 28001 con la firma certificadora AES, esto permite un nivel de organización y gestión que evidencia el compromiso de la Alta Gerencia lo que les ha permitido mantenerse en el tiempo y lograr una cartera de clientes importantes y reconocidos en el Valle del Cauca.

                                                </textarea>
                                            </div>
                                            <br><br><br>

                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                    3. HALLAZGOS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='textarea'
                                                    style="border: 1px solid #888;" name='textarea' rows='4' cols='120'>Se detectaron 6 No conformidades o incumplimientos a los requisitos de la norma. Estos estan relacionados con:
1. Ejecución de visitas bienales a los asociados de negocio.
2. Solicitud de planes de contingencia a los asociados de negocio.
3. Establecer clausulas de confidencialidad y responsabilidad en contratos de sus empleados.
4. Diseñar un plan de continuidad del negocio.
5. Programa de induccion y reinduccion para el personal.
6. Implementar un programa de prevención de consumo de drogas.


Se debe ahondar un poco mas en aspectos relacionados con la gestión del riesgo desde la seguridad con el personal, temas de seguridad de la información, entre otros. De tal manera que puedan usar los elementos que ya tienen para que sea una aplicación sistematica y aplicable a cualquier sistema de gestión. En la medida que logren esto su sistema será robusto con las medidas necesarias para mejorar los niveles de seguridad de la empresa y mayor competitividad.

                                                </textarea>
                                            </div>
                                            <br><br><br>


                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                    4. CONCLUSIONES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='textarea'
                                                    style="border: 1px solid #888;" name='textarea' rows='4' cols='120'>.La compañía cuenta con el compromiso de la Dirección para la mejora del sistema de seguridad de la cadena de suministro, aunque cuentan con recursos limitados se han esmerado por la implementación de sistemas integrados de gestión que aportan a que la compañia cuente con procesos ordenados y controlados.
                                                </textarea>
                                            </div>
                                            <br><br><br>
                                            




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