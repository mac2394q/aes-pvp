<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."usuarios.php");
  require_once(PDO_PATH."usuarioDao.php");
  
class pacientesController
{

    public static function registrarPaciente($model){
        return usuarioDao::registrarPaciente($model);
    }

    public static function ultimoRegistroPaciente(){
        return usuarioDao::ultimoRegistroPaciente();
    }


    public static function consultar_pacientes($ciudad,$busqueda){
        $objPacientes = usuarioDao::listado_pacientes_busqueda($ciudad,$busqueda);
        if($objPacientes != null){
        echo "
          <table id='users-list-datatable' class='table dataTable no-footer' role='grid'
              aria-describedby='users-list-datatable_info'>
              <thead>
                  <tr role='row'>
                      <th class='sorting_asc' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 38.4px;'>Diagnostico
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 140px;'>Nombre
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 203.2px;'>Departamento
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 146.4px;'>Ciudad
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 101.6px;'>Estrato
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 61.6px;'>Comunidad
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 88.8px;'>Beneficiario
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 88.8px;'>Perfil
                      </th>
                      
                      
                  </tr>
              </thead>
              <tbody>";
              foreach ($objPacientes as $key => $value) {
                echo "
                  <tr role='row' class='odd'>
                      <td class='sorting_1'>reservado</td>
                      <td>".$objPacientes[$key]->getNombre_apellido()."
                      </td>
                      <td>".$objPacientes[$key]->getDepartamento()."</td>
                      <td>".$objPacientes[$key]->getCiudad()."</td>
                      <td>".$objPacientes[$key]->getEstrato()."</td>
                      <td>".$objPacientes[$key]->getComunidad()."</td>
                      <td>".$objPacientes[$key]->getEstado_ayuda()."</td>
                      <td><a href='/app/resources/public/views/platform/modules/pacientes/verPerfil.php?id=".$objPacientes[$key]->getIdusuario()."'><li class='fa fa-book-reader'></li>&nbsp; Ver </a></td>
                      
                  </tr>";
              }
             echo "   
              </tbody>
          </table>";
        }else{
            echo "
          <div class='bs-callout-pink callout-square callout-transparent mt-1'>
              <div class='media align-items-stretch'>
                  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                      <i class='fa fa-exclamation-triangle text-white'></i>
                  </div>
                  <div class='media-body p-1'>
                      <strong>Sin resultados!!</strong> <p>No se encontro coincidencias con la busqueda realizada</p>
                  </div>
              </div>
          </div>
          ";
        }
    }

    public static function contadorPacientes($tipo_contador){
        return usuarioDao::contadorPacientes($tipo_contador);
    }

    public static function objPaciente($idusuario){
        return usuarioDao::objPaciente($idusuario);
    }

    public static function objRegistroUltimo($idusuario){
        return usuarioDao:: objRegistroUltimo($idusuario);
    }

    public static function objRegistroPaciente($idusuario){
        return usuarioDao:: objRegistroPaciente($idusuario);
    }

    public static function contadorValoraciones($idusuario){
        return usuarioDao::contadorValoraciones($idusuario);
    }

    public static function historiasRegistroPaciente($idusuario){
        $objPacientes = usuarioDao::historiasRegistroPaciente($idusuario);
        if($objPacientes != null){
        echo "
          <table id='users-list-datatable' class='table dataTable no-footer' role='grid'
              aria-describedby='users-list-datatable_info'>
              <thead>
                  <tr role='row'>
                      <th class='sorting_asc' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 38.4px;'>Codigo: Evaluacion
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 140px;'>Diagnostico
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 203.2px;'>Fecha Registro
                      </th>
                      <th class='sorting' tabindex='0' aria-controls='users-list-datatable' rowspan='1' colspan='1'
                          style='width: 88.8px;'>Examen
                      </th>
                  </tr>
              </thead>
              <tbody>";
              foreach ($objPacientes as $key => $value) {
                echo "
                  <tr role='row' class='odd'>

                      <td><li class='fa fa-notes-medical fa-2x'></li>&nbsp;&nbsp;".$objPacientes[$key]->getIdregistro()."</td>
                      <td>".$objPacientes[$key]->getEstado_diagnostico()."</td>
                      <td>".$objPacientes[$key]->getFecha_registro()."</td>
                      <td><a href='/app/resources/public/views/platform/modules/pacientes/verExamen.php?id=".$objPacientes[$key]->getIdregistro()."&idusuario=".$objPacientes[$key]->getIdusuario()."'><li class='fa fa-book-reader'></li>&nbsp; Ver </a></td>
                      
                  </tr>";
              }
             echo "   
              </tbody>
          </table>";
        }else{
            echo "
          <div class='bs-callout-pink callout-square callout-transparent mt-1'>
              <div class='media align-items-stretch'>
                  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                      <i class='fa fa-exclamation-triangle text-white'></i>
                  </div>
                  <div class='media-body p-1'>
                      <strong>Sin resultados!!</strong> <p>No se encontre un historico de examenes para el paciente actual.</p>
                  </div>
              </div>
          </div>
          ";
        }


    }

}