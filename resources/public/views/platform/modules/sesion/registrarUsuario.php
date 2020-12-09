<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/price/conf.php');
       require_once (PLATFORM_PATH."global/inc/login/head.php");
       
    ?>
    <link rel="stylesheet" type="text/css" src="<?php echo VENDOR_SERVER."vendors/css/extensions/sweetalert.css"; ?>">
    <style>
        .redondeo {
            border-top-left-radius: 20px;
            border-bottom-right-radius: 30px;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="<?php echo VENDOR_SERVER."forounipa/logo-universidad-del-pacifico.png"; ?>"
                                            class="img-fluid mx-auto d-block pt-2 redondeo" width="60" alt="logo">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                        <span>registrate para iniciar sesion</span></p>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-4 mb-2">
                                                <label for="issueinput1">Rol del usuario</label>
                                                <select id="rol" name="rol" class="form-control" data-toggle="tooltip"
                                                    data-trigger="hover" data-placement="top"
                                                    data-title="segun el rol seleccionado, las funcionas en la plataforma seran diferentes">
                                                    <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                    <option value="DOCENTE">DOCENTE</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-8 mb-2" id="rowPerfil">
                                                <label for="issueinput1">Perfil profesional</label>
                                                <input type="text" id="perfil" class="form-control" placeholder=". . ."
                                                    name="perfil" data-toggle="tooltip" data-trigger="hover"
                                                    data-placement="top"
                                                    data-title="Perfil profesional o Carrera universitaria del docente.">
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="form-group col-4 mb-2">
                                                <label for="issueinput1">Fecha de nacimiento</label>
                                                <input type="date" id="fecha" class="form-control" placeholder=". . ."
                                                    name="fecha" data-toggle="tooltip" data-trigger="hover"
                                                    data-placement="top" data-title="fecha de nacimiento del usuario">
                                            </div>
                                            <div class="form-group col-8 mb-2">
                                                <label for="issueinput1">Nombre completo</label>
                                                <input type="text" id="nombre" class="form-control" placeholder=". . ."
                                                    name="nombre" data-toggle="tooltip" data-trigger="hover"
                                                    data-placement="top" data-title="Nombre completo del estudiante">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-7 mb-2">
                                                <label for="issueinput1">Numero, codigo o seria de
                                                    identificacion</label>
                                                <input type="text" id="identificacion" class="form-control"
                                                    placeholder=". . ." name="identificacion" data-toggle="tooltip"
                                                    data-trigger="hover" data-placement="top"
                                                    data-title="Identificacion ,dni o numero unico">
                                            </div>
                                            <div class="form-group col-5 mb-2" id="rowTipoDocumento">
                                                <label for="issueinput1">Tipo de documento</label>
                                                <select id="tipoDocumento" name="tipoDocumento" class="form-control"
                                                    data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                    data-title="tipo del documento de identificacion del usuario">
                                                    <option value="CC">CEDULA DE CIUDADANIA</option>
                                                    <option value="TI">TARJETA DE IDENTIDAD</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-5 mb-2" id="rowTipoDocumento2">
                                                <label for="issueinput1">Tipo de documento</label>
                                                <input type="text" readonly value="CEDULA DE CIUDADANIA"
                                                    class="form-control">
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="form-group col-8 mb-2">
                                                <label for="issueinput1">Direccion de residencia</label>
                                                <input type="text" id="direccion" class="form-control"
                                                    placeholder=". . ." name="direccion" data-toggle="tooltip"
                                                    data-trigger="hover" data-placement="top"
                                                    data-title="Direccion de residencia del usuario y ciudad ">
                                            </div>
                                            <div class="form-group col-4 mb-2">
                                                <label for="issueinput1">Telefono</label>
                                                <input type="text" id="telefono" class="form-control"
                                                    placeholder=". . ." value="+00 000 000 000 " name="telefono"
                                                    data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                    data-title="Telefono fijo  + ext o numero movil #">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12 mb-2">
                                                <label for="issueinput1">Correo electronico</label>
                                                <input type="text" id="correo" value="@" class="form-control" placeholder=". . ."
                                                    name="correo" data-toggle="tooltip" data-trigger="hover"
                                                    data-placement="top" data-title="texto tooltip">
                                            </div>
                                        </div>
                                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                            <span>Autenticacion</span>
                                        </p>
                                        <div class="row">
                                            <div class="form-group col-12 mb-2">
                                                <label for="issueinput1">Usuario <code
                                                        id="usuarioExistente"></code></label>
                                                <input readonly type="text" id="usuario" class="form-control"
                                                    placeholder=". . ." name="usuario" data-toggle="tooltip"
                                                    data-trigger="hover" data-placement="top"
                                                    data-title="El usuario es creado a apartir del correo electronico ingresado por el usuario">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6 mb-2">
                                                <label for="issueinput1">Clave</label>
                                                <input type="text" id="clave" class="form-control" placeholder=". . ."
                                                    name="clave" data-toggle="tooltip" data-trigger="hover"
                                                    data-placement="top"
                                                    data-title="La clave de usuario puede ser ingresa a interes o generada de manera automatica">
                                            </div>
                                            <div class="form-group col-6 mb-2">
                                                <br>
                                                <label for="issueinput1">&nbsp;</label>
                                                <button type="button" id="generar"
                                                    class="btn btn-warning mr-1 waves-effect waves-light">
                                                    <i class="fa fa-passport"></i> Generar contraseña
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                    </p>
                                    <div class="card-body">
                                            
                                            <div class="form-body">

                                                    <div class="form-actions top">
                                                        <button type="button" id="registrarUsuario" class="btn btn-warning mr-1 waves-effect waves-light">
                                                            <i class="fa fa-save"></i> &nbsp;REGISTRAR
                                                        </button>
                                                        <a href="login.php" class="btn btn-primary waves-effect waves-light">
                                                            <i class="fa fa-reply"></i> Retornar al inicio 
                                                        </a>
                                                    </div>
                    
                                                    
                                                </div>
                                            <br>
                                        <div id="smgLogin"></div>

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
    <?php require_once (PLATFORM_PATH."global/inc/login/lib.php"); ?>
    <script src="<?php echo PLATFORM_SERVER."global/core/directory.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."global/core/app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/sesion/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/sesion/triggers/sweet-alerts.min.js"; ?>"></script>
    <script>
        $("#rowPerfil").hide();
        $("#rowTipoDocumento2").hide();


        $("#rol").change(function () {
            var rol = document.getElementsByName("rol")[0].value;
            if (rol == "ESTUDIANTE") {
                $("#rowTipoDocumento").show();
                $("#rowPerfil").hide();
                $("#rowTipoDocumento2").hide();

            } else {
                $("#rowTipoDocumento").hide();
                $("#rowPerfil").show();
                $("#rowTipoDocumento2").show();
            }

        });
        $("#correo").change(function () {
            document.getElementsByName("usuario")[0].value = document.getElementsByName("correo")[0].value;
            document.getElementById("usuarioExistente").innerHTML = "Este usuario ya existe en la plataforma";

        });
        $("#generar").click(function () {

            var long = 8;
            var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
            var contraseña = "";
            for (i = 0; i < long; i++) contraseña += caracteres.charAt(Math.floor(Math.random() * caracteres
                .length));

            document.getElementsByName("clave")[0].value = contraseña;


        });
    </script>


</body>

</html>