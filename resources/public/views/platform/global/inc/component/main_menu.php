<?php session_start(); 

   include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');?>
<div  id="top_bar" class="main-menu material-menu menu-fixed menu-light menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header open"><span>ROL : <?php echo $_SESSION['rol']; ?></span>
                <i class="fa fa-keyboard" data-toggle="tooltip" data-placement="right"
                    data-original-title="Paneles de administracion"></i>
            </li>
            <li class=" nav-item"><a href="<?php echo INDEX_PLATFORM_PATH; ?>"><i class="fa fa-home"></i>
                <span class="menu-title titulo">INICIO</span></a>
            </li>
            <?php if($_SESSION['rol'] == "ADMINISTRADOR"  ){ ?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."plantillas/";?>"><i class="fa fa-laptop"></i>
                    <span class="menu-title titulo">PLANTILLA</span></a>
            </li>
            <?php  }?>


            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "COMERCIAL" || $_SESSION['rol'] == "EMPRESA" ){ ?>
            <li class="nav-item has-sub"><a href="#">
                <i class="fa fa-industry"></i>
                <span class="menu-title titulo">EMPRESA </span>&nbsp;</a>
                <ul class="menu-content">


                    <?php if($_SESSION['rol'] == "EMPRESA" ){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."empresa/verFicha.php?id=".$_SESSION['idempresa']; ?>">Mi Perfil</a>
                    </li>
                    <?php } ?>

                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "COMERCIAL"){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."empresa/";?>">Listado </a>
                    </li>
                    <?php } ?>


                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" ){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."empresa/registrarEmpresa.php";?>">Nueva Empresa</a>
                    </li>
                    <?php } ?>

                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "COMERCIAL"){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."empresa/grupos.php";?>"> Grupos Empresariales</a>
                    </li>
                    <?php } ?>
                   
                </ul>
            </li>
            <?php } ?>


            <?php if($_SESSION['rol'] == "ADMINISTRADOR"  || $_SESSION['rol'] == "AUDITOR"){ ?>
            <li class="nav-item has-sub"><a href="#"><i class="fa fa-users"></i>
                    <span class="menu-title titulo">USUARIOS AES</span>&nbsp;</a>
                <ul class="menu-content">

                    <?php if($_SESSION['rol'] == "ADMINISTRADOR"  ){ ?>
                    <li><a class="menu-item parrafo2"
                            href="<?php echo MODULE_APP_SERVER."usuarios/empleados.php";?>">Colaboradores</a>
                    </li>
                    <?php } ?>

                    <?php if( $_SESSION['rol'] == "AUDITOR"){ ?>
                    <li><a class="menu-item parrafo2"
                            href="<?php echo MODULE_APP_SERVER."usuarios/verFicha.php?id=".$_SESSION['idusuario'];?>">Mi Perfil</a>
                    </li>
                    <?php } ?>


                </ul>
            </li>
            <?php } ?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR"  || $_SESSION['rol'] == "AUDITOR"){ ?>
            <li class="nav-item has-sub"><a href="#">
                <i class="fa fa-laptop"></i>
                <span class="menu-title titulo">AUDITORIA </span>&nbsp;</a>
                <ul class="menu-content">
                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "COMERCIAL"){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."auditorias/";?>">Listado </a>
                    </li>
                    <?php } ?>

                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" ){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."auditorias/registrarAuditoria.php";?>"> Nueva  Auditoria</a>
                    </li>
                    <?php } ?>
                    

                    <?php if($_SESSION['rol'] == "AUDITOR" ){ ?>
                    <li><a class="menu-item parrafo2" href="<?php echo MODULE_APP_SERVER."auditorias/auditoriasEmpresaAuditor.php";?>">Mis auditorias </a>
                    </li>
                    <?php } ?>
                    
                </ul>
            </li>
            <?php } ?>


            <?php if($_SESSION['rol'] == "ADMINISTRADOR"  ){ ?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."seguridad/";?>"><i class="fa fa-shield-alt"></i>
                    <span class="menu-title titulo">GESTION DE SEGURIDAD</span></a>
            </li>
            <?php } ?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR"  ){ ?>
            <li class="nav-item has-sub"><a href="#"><i class="fa fa-chart-bar"></i>
                <span class="menu-title titulo">INFORMES</span>&nbsp;</a>
                <ul class="menu-content">
                   
                    <li><a class="menu-item parrafo2"
                            href="<?php echo MODULE_APP_SERVER."informes/listadoClientes.php";?>">Listado de Clientes</a>
                    </li>

                    <li><a class="menu-item parrafo2"
                            href="<?php echo MODULE_APP_SERVER."informes/trazabilidad.php";?>">Trazabilidad</a>
                    </li>
                    
                </ul>
            </li>
            <?php } ?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR"  ){ ?>
            <li class="nav-item has-sub"><a href="#"><i class="fa fa-users"></i>
                <span class="menu-title titulo">HERRAMIENTAS</span>&nbsp;</a>
                <ul class="menu-content">
                    <?php if($_SESSION['rol'] == "ADMINISTRADOR"  ){ ?>
                    <li><a class="menu-item parrafo2"
                            href="https://www.ilovepdf.com/es/jpg_a_pdf">JPG <=> PDF</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>


        </ul>
    </div>
</div>

