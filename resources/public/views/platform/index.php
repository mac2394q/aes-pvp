<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (PROVIDERS_PATH."pdo/usuarioDao.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
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

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
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
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title white titulo">
              <li class="fa fa-desktop "></li>&nbsp;Panel de Trabajo Principal
            </h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb parrafo">
                  <li class="breadcrumb-item titulo active text-white ">
                    <span class="fa fa-address-card"></span>&nbsp; <?php echo $_SESSION['rol'];  ?>
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
        <div class="content-body">
          <div class="row">
            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){ ?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title titulo">Listado General de Empresas</h4>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard ">
                    <div class="table-responsive">
                      <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">

                          <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                              <?php areaController::select_area_listado_general(); ?>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                              <label for="projectinput6">Estado:</label>
                              <select id="projectinput6" name="estado" class="form-control">
                                <option value="te">Sin Estado</option>
                                <option value="ea">Activas</option>
                                <option value="ei">Inactivas</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar . . ."
                                  aria-describedby="button-addon2" name="buscar">
                                <div class="input-group-append">
                                  <button class="btn capa text-white round " id="buscarEmpresa" type="button">
                                    <li class="fa fa-search"></li> 
                                  </button>
                                </div>
                                <div class="input-group-append">
                                    <button  class="btn round btn-danger" type="button" onclick="location.reload()">
                                      <li class="fa fa-ban"></li>&nbsp;Limpiar
                                    </button>
                                    
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div id="tablaDinamica_panel">
                                <?php empresaController::listadoSimpleEmpresas("az",$idArea,"te",null); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>


            <?php if($_SESSION['rol'] == "COMERCIAL"){ 
            $objEmpleado =usuarioDao::usuarioId($_SESSION['idusuario']);
            ?>

            <div class="col-md-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body">
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
                              <input readonly type="text" class="form-control" placeholder=". . ." name="nombre"
                                id="nombre" value="<?php echo $objEmpleado->getNombre_usuario();  ?>">
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
                              <input readonly type="text" class="form-control" placeholder=". . ." name="documento"
                                id="documento" value="<?php echo $objEmpleado->getDocumento_usuario();  ?>">
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
                            <input readonly type="text" class="form-control" placeholder=". . . " name="correo1"
                              id=correo1" value="<?php echo $objEmpleado->getCorreo_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Telefono</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="telefono"
                              id="telefono" value="<?php echo $objEmpleado->getTelefono_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Dirección</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="direccion"
                              id="direccion" value="<?php echo $objEmpleado->getDireccion_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                E-mail Corporativo </h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="correo2"
                              id="correo2" value="<?php echo $objEmpleado->getMail_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Ciudad de Residencia </h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="ciudad"
                              id="ciudad" value="<?php echo $objEmpleado->getCiudad_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                País </h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="pais" id="pais"
                              value="<?php echo $objEmpleado->getPais_usuario();  ?>">
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
                  <h4 class="card-title titulo">Listado General de Empresas</h4>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard ">
                    <div class="table-responsive">
                      <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">

                          <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                              <?php areaController::select_area_listado_general(); ?>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                              <label for="projectinput6">Estado:</label>
                              <select id="projectinput6" name="estado" class="form-control">
                                <option value="te">Sin Estado</option>
                                <option value="ea">Activas</option>
                                <option value="ei">Inactivas</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar . . ."
                                  aria-describedby="button-addon2" name="buscar">
                                <div class="input-group-append">
                                  <button class="btn capa text-white round " id="buscarEmpresa" type="button">
                                    <li class="fa fa-search"></li> Buscar
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div id="tablaDinamica_panel">
                                <?php empresaController::listadoSimpleEmpresas("az",$idArea,"te",null); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>

            <?php if($_SESSION['rol'] == "AUDITOR" || $_SESSION['rol'] == "COMERCIAL"){ 
            $objEmpleado =usuarioDao::usuarioId($_SESSION['idusuario']);
            ?>
            <div class="col-md-12">
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="info"><a
                              href="<?php echo "modules/auditorias/auditoriasEmpresaAuditor.php?id=".$_SESSION['idusuario']; ?>"
                              class="text-black">Historial de Auditorías</h3></a>
                        </div>
                        <div>
                          <a
                            href="<?php echo "modules/auditorias/auditoriasEmpresaAuditor.php?id=".$_SESSION['idusuario']; ?>"><i
                              class="fa fa-book info font-large-2 float-right"></i></a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body">
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
                              <input readonly type="text" class="form-control" placeholder=". . ." name="nombre"
                                id="nombre" value="<?php echo $objEmpleado->getNombre_usuario();  ?>">
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
                              <input readonly type="text" class="form-control" placeholder=". . ." name="documento"
                                id="documento" value="<?php echo $objEmpleado->getDocumento_usuario();  ?>">
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
                            <input readonly type="text" class="form-control" placeholder=". . . " name="correo1"
                              id=correo1" value="<?php echo $objEmpleado->getCorreo_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Telefono</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="telefono"
                              id="telefono" value="<?php echo $objEmpleado->getTelefono_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Dirección</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="direccion"
                              id="direccion" value="<?php echo $objEmpleado->getDireccion_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                E-mail Corporativo </h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="correo2"
                              id="correo2" value="<?php echo $objEmpleado->getMail_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Ciudad de Residencia </h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="ciudad"
                              id="ciudad" value="<?php echo $objEmpleado->getCiudad_usuario();  ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                País </h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="pais" id="pais"
                              value="<?php echo $objEmpleado->getPais_usuario();  ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if($_SESSION['rol'] == "EMPRESA"){ 
            $objEmpresa =empresaController::objEmpresa($_SESSION['idempresa']);
            ?>
            <div class="col-md-12 row">
              <div class="col-xl-4 col-lg-8 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="info"><a
                              href="<?php echo "modules/empresa/asociarEmpresas.php?id=".$_SESSION['idempresa']; ?>"
                              class="text-black">Asociada de Negocios & Ancla</h3></a>
                        </div>
                        <div>
                          <a href="<?php echo "modules/empresa/asociarEmpresas.php?id=".$_SESSION['idempresa']; ?>"><i
                              class="fa fa-city info font-large-2 float-right"></i></a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="info"><a
                              href="<?php echo "modules/auditorias/seleccionRolAuditoria.php?id=".$_SESSION['idempresa']; ?>"
                              class="text-black">Historial de Auditorías</h3></a>
                        </div>
                        <div>
                          <a
                            href="<?php echo "modules/auditorias/seleccionRolAuditoria.php?id=".$_SESSION['idempresa']; ?>"><i
                              class="fa fa-book info font-large-2 float-right"></i></a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">

              <div class="card">

                <div class="card-content collapse show">
                  <div class="card-body">

                    <div class="form">
                      <div class="form-body">
                        <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                          Información General
                        </h2>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="">
                                <h5 class="card-title"><span class="text-danger">*</span>
                                  Compañía
                                </h5>
                              </label>
                              <input readonly type="text" class="form-control" placeholder=". . ." name="razonSocial"
                                id="razonSocial" value="<?php echo $objEmpresa->getNombre_empresa();  ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">
                                <h5 class="card-title"><span class="text-danger">*</span>
                                  No Identificación</h5>
                              </label>
                              <input readonly type="text" class="form-control" placeholder=". . ." name="nit" id="nit"
                                value="<?php echo $objEmpresa->getNit_empresa();  ?>">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">
                                <h5 class="card-title"><span class="text-danger">*</span>
                                  Área Técnica </h5>
                              </label>
                              <input readonly type="text" class="form-control" placeholder=". . ." name="area" id="area"
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
                            <input readonly type="text" class="form-control" placeholder=". . . " name="ciudad"
                              id="ciudad" value="<?php echo $objEmpresa->getCiudad_principal_empresa();  ?>">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Departamento/Estado</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="departamento"
                              id="departamento" value="<?php echo $objEmpresa->getDepartamento();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                País</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="pais" id="pais"
                              value="<?php echo $objEmpresa->getPais_empresa();  ?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>
                                Dirección</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . " name="direccion"
                              id="direccion" value="<?php echo $objEmpresa->getDireccion_empresa();  ?>">
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
                            <input readonly type="text" class="form-control" placeholder="@" name="emailEmpresarial"
                              id="emailEmpresarial" value="<?php echo $objEmpresa->getCorreo_empresa();  ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"><span class="text-danger">*</span>Sitio
                                web
                                Empresa</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder="http://www. " name="sitioWeb"
                              id="sitioWeb" value="<?php echo $objEmpresa->getSitio_web_empresa();  ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title">E-mail Electrónico para
                                Facturación</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder="@" name="emailFacturacion"
                              id="emailFacturacion"
                              value="<?php echo $objEmpresa->getCorreo_facturacion_empresa();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title">Cierre Mensual</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder="Dia 30  "
                              name="fechaCorteFacturacion" id="fechaCorteFacturacion"
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
                            <input readonly type="text" class="form-control" placeholder="# ext #"
                              name="telefonoRepresentante" id="telefonoRepresentante"
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
                            <input readonly type="text" class="form-control" placeholder=". . . "
                              name="representanteSistemaGestion" id="representanteSistemaGestion"
                              value="<?php echo $objEmpresa->getRepresentante_sistema_gestion();  ?>">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title">Cargo</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder=". . . "
                              name="cargoRepresentanteSistema" id="cargoRepresentanteSistema"
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
                            <input readonly type="text" id="" class="form-control" placeholder="# ext #"
                              name="telefonoSistema" id="telefonoSistema"
                              value="<?php echo $objEmpresa->getTelefono_movil_representante_sistema_gestion_empresa();  ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">
                              <h5 class="card-title"> Correo Electrónico</h5>
                            </label>
                            <input readonly type="text" class="form-control" placeholder="@" name="emailContacto"
                              id="emailContacto"
                              value="<?php echo $objEmpresa->getCorreo_sistema_gestion_empresa();  ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <?php } ?>


          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php

    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
  <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
  <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
  <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
</body>

</html>