<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">
<head>
    <?php

       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."sedeController.php");
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
       $objSede = sedeController::objSede($objAuditoria->getIdsede_auditoria());
       $ncapitulos = plantillaController::ngruposPlantillas($objplantilla->getIdplantilla_maestra());
       //$objPlantilla = plantillaController::grupoId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
        //print_r( $objAuditoria);
    ?>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idauditoria" id="idauditoria" />
    <input type="hidden" value="<?php echo $ncapitulos; ?>" name="ngrupos" id="ngrupos" />
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
                                    <div class="card-header">
                                        <img src="https://aes.org.co/wp-content/uploads/2019/04/088.png" />
                                        <h1 class="form-section"><i class="fa fa-business-time"></i>
                                            Informe  Auditoría Verificación  de Proveedores  </h1>
                                        <br>
                                        <div id="top_bar2">
                                            <a class="btn btn-secondary round waves-effect waves-light"
                                                href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">
                                                <i class="fa fa-clipboard fa-2x"></i> &nbsp;&nbsp;Ver Ficha de Auditoría 
                                            </a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a  target="_blank" href="<?php echo "verificacionProveedoresPDF.php?id=".$_GET['id']; ?>" class="btn round capa text-white waves-effect waves-light text-white">  <i class="fa fa-file-pdf fa-2x"></i>&nbsp;PDF</a>
                                            <!-- <button id="imprimirFactura"
                                                class="btn btn-secondary waves-effect waves-light">
                                                <i class="fa fa-file-pdf fa-2x"></i> &nbsp;PDF

                                            </button> -->
                                        </div>
                                        <h3 class="form-section">
                                            <strong>1. INFORMACIÓN GENERAL DE LA ORGANIZACIÓN</strong></h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            ORGANIZACIÓN

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresaAsociada->getNombre_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            SITIO WEB

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresaAsociada->getSitio_web_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            DIRECCIÓN Y LOCALIZACIÓN

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ." name="razonSocial" id="razonSocial" value="<?php echo $objSede->getDireccion_sede()." - ".$objSede->getCiudad_sede();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            REPRESENTANTE DE LA ORGANIZACIÓN

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresaAsociada->getRepresentante_legal_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            CARGO

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresaAsociada->getCargo_representante_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            CORREO ELECTRÓNICO

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresaAsociada->getCorreo_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <h3 class="form-section black">
                                            <strong>2. INFORMACIÓN DE LA AUDITORIA</strong></h3>
                                        <div class="row">
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        OBJETIVO:
                                                    </h5>
                                                </label>
                                                <textarea class='form-control ' id='objetivo_auditoria' style="border: 1px solid #888;" name='objetivo_auditoria' rows='4' cols='120'><?php echo "".trim($objAuditoria->getObjetivo_auditoria()); ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            CRITERIOS DE AUDITORIA

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="criterio_auditoria" id="criterio_auditoria"
                                                        value="<?php echo "".$objAuditoria->getCriterios_auditoria(); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <h3 class="form-section">
                                            <strong>3. EQUIPO AUDITOR </strong></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            AUDITOR(ES)
                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objUsuario->getNombre_usuario();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <h3 class="form-section">
                                            <strong>4. INFORMACIÓN RELACIONADA CON LOS SITIOS AUDITADOS </strong>
                                        </h3>
                                        <p>NÚMERO DE SITIOS INCLUIDOS EN EL ALCANCE DE LA AUDITORIA.</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            DIRECCIÓN

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="direccion_auditor" id="direccion_auditor"
                                                        value="<?php echo $objSede->getDireccion_sede();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            LOCALIZACIÓN

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objAuditoria->getDireccion_auditoria();  ?>">
                                                </div>
                                            </div>
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        OBSERVACIONES:
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='observacion_auditoria' style="border: 1px solid #888;" name='observacion_auditoria' rows='4' cols='120'><?php echo $objAuditoria->getObservacion_auditoria();  ?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <h3 class="form-section">
                                            <strong>5. INFORMACION DEL ENTORNO </strong>
                                        </h3>
                                        <p>NÚMERO DE SITIOS INCLUIDOS EN EL ALCANCE DE LA AUDITORIA.</p>
                                        <div class="row">
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        DESCRIPCIÓN DEL ENTORNO:
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='descripcion_auditoria' style="border: 1px solid #888;" name='descripcion_auditoria' rows='4' cols='120'><?php echo $objAuditoria->getDescripcion_auditoria();  ?></textarea>
                                            </div>
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        Localizacion Geografica de la  Entidad:
                                                    </h5>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="localidad_auditoria" id="localidad_auditoria" value="<?php echo $objAuditoria->getLocalidad_auditoria();  ?>">
                                                </label>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class=' col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        Mapa de Localizacion:
                                                    </h5>
                                                    <br>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="mapa_localizacion" id="mapa_localizacion" <?php echo "value='".$objAuditoria->getLink_auditoria()."'";  ?>" />
                                                    <br>
                                                    <?php echo $objAuditoria->getLink_auditoria();  ?>
                                                </label>
                                            </div>
                                            <br><br>
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        Descripción de las  Condiciones  de Seguridad del  Entorno:
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='descripcion_condiciones_entorno_auditoria' style="border: 1px solid #888;" name='descripcion_condiciones_entorno_auditoria' rows='4' cols='120'><?php echo $objAuditoria->getDescripcion_condiciones_entorno_auditoria();  ?></textarea>
                                            </div>
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        Descripción de las Condiciones de Seguridad Internas 
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='descripcion_condiciones_seguridad' style="border: 1px solid #888;" name='descripcion_condiciones_seguridad' rows='4' cols='120'><?php echo $objAuditoria->getDescripcion_condiciones_interna_auditoria();  ?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <h3 class="form-section">
                                            <strong>6. ACTIVIDADES DESARROLLADAS </strong>
                                        </h3>
                                        <div class="row">
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <br>
                                                <textarea class='form-control ' id='actividades' style="border: 1px solid #888;" name='actividades' rows='4' cols='120'><?php echo $objAuditoria->getActividades_auditoria();  ?></textarea>
                                            </div>
                                        </div>
                                        <h3 class="form-section">
                                            <strong>7. CAPITULOS Y ASPECTOS EVALUADOS </strong>
                                        </h3>
                                        <div class="row">
                                        <?php plantillaController::listadoPlantillasGrupo2($objAuditoria->getIdplantilla_madre_aditoria(),$idauditoria); ?>
                                        </div>
                                        <br>
                                        <br>
                                        <h3 class="form-section">
                                            <strong> 8. CONCLUSIÓN DE LA AUDITORIA </strong>
                                        </h3>
                                        <div class="row">
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        COMENTARIOS DEL EQUIPO AUDITOR

                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='comentarios_auditor' style="border: 1px solid #888;" name='comentarios_auditor' rows='4' cols='120'><?php echo $objAuditoria->getConclusion_auditoria();  ?></textarea>
                                            </div>
                                            <div class='form-group mb-1 col-sm-12 col-md-12'>
                                                <label for='projectinput3'>
                                                    <h5 class='card-title'>
                                                        <span class='text-danger'>*</span>
                                                        RECOMENDACIONES DEL AUDITOR:
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class='form-control ' id='recomendacion_auditor' style="border: 1px solid #888;" name='recomendacion_auditor' rows='4' cols='120'><?php echo $objAuditoria->getRecomendacion_auditoria() ;  ?></textarea>
                                            </div>
                                            <br><br><br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            NOMBRE AUDITOR LÍDER

                                                        </h5>
                                                    </label>
                                                    <input  type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objUsuario->getNombre_usuario();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div>
                                                    <div>
                                                        <button id="modificarAuditoriaReporte"
                                                            class="btn btn-secondary waves-effect waves-light">
                                                            <i class="fa fa-save fa-2x"></i> &nbsp;Editar informe

                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div id="smgReporte"></div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
        $(document).on('click', '#modificarAuditoriaReporte', function (e) {
        //$("#smgLogin").html("");
        //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
        var formData = new FormData();
        formData.append("idauditoria", document.getElementsByName("idauditoria")[0].value);
        
        formData.append("objetivo_auditoria", document.getElementsByName("objetivo_auditoria")[0].value);
        formData.append("criterio_auditoria", document.getElementsByName("criterio_auditoria")[0].value);
        formData.append("direccion_auditor", document.getElementsByName("direccion_auditor")[0].value);
        formData.append("observacion_auditoria", document.getElementsByName("observacion_auditoria")[0].value);
        formData.append("descripcion_auditoria", document.getElementsByName("descripcion_auditoria")[0].value);
        formData.append("localidad_auditoria", document.getElementsByName("localidad_auditoria")[0].value);
        formData.append("mapa_localizacion", document.getElementsByName("mapa_localizacion")[0].value);
        formData.append("descripcion_condiciones_entorno_auditoria", document.getElementsByName("descripcion_condiciones_entorno_auditoria")[0].value);
        formData.append("descripcion_condiciones_seguridad", document.getElementsByName("descripcion_condiciones_seguridad")[0].value);
        formData.append("actividades", document.getElementsByName("actividades")[0].value);
        formData.append("comentarios_auditor", document.getElementsByName("comentarios_auditor")[0].value);
        formData.append("recomendacion_auditor", document.getElementsByName("recomendacion_auditor")[0].value);
        formData.append("ngrupos", document.getElementsByName("ngrupos")[0].value);
        // console.log(document.getElementsByName("objetivo_auditoria")[0].value);
        // console.log(document.getElementsByName("criterio_auditoria")[0].value);
        
        //   for (var value of formData.values()) {
        //     console.log(value); 
        //  }
        var ncapitulos = document.getElementsByName("ngrupos")[0].value;
        var ncap = 0;
        for (let index = 1; index <= parseInt(ncapitulos); index++) {
          console.log($(document.getElementById(index)).attr('name'));
          formData.append(index, document.getElementById(index).value);
          formData.append(index+"_"+document.getElementsByName("idauditoria")[0].value, $(document.getElementById(index)).attr('name'));
        
          if(document.getElementById(index).value == ""){ncap++;}}
          if(parseInt(ncap) < 1){
          
          swal({
            title: "Informe de verificacion de proveedores ",
            text: "Esta seguro de  registrar el informe ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var ruta = routesAppPlatform() + 'auditorias/core/modificarAuditoria.php';
              sendEventFormDataApp('POST', ruta, formData, '#smgReporte');
            }
          });
        }else{
          swal({
            title: "Informe de verificacion de proveedores ",
            text: "Actualmente falta por diligenciar de  la seccion 7  del informe uno o mas capitulos vacios!",
            icon: "error",
            type: "warning"
          });
        }
        
        return false;
      });
     
    </script>
</body>
</html>