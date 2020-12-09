<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH."auditoriasController.php");
require_once(CONTROLLERS_PATH."usuarioController.php");
require_once(MODEL_PATH."empresa.php");
$objUsuario = usuarioController::usuarioId($_POST['auditor']);

// <button class='btn btn-success' type='button' id='verificar_auditoria_disponibilidad'>
//                <li class='fa fa-filter'></li>&nbsp; Verificar Disponibidad
//             </button>

echo "
<div class='row'>
   <input type='hidden' name='auditorTop2' value='".$objUsuario->getIdusuario()."' />

   <div class='col-md-3'>

      <div class='col-md-12'>
         <div class=form-group>
             <label for=projectinput3>
                 <h5 class=card-title>
                     <li class=fa fa-calendar-alt></li> Auditor
             </label>
            <input readonly type='text' id='projectinput1'
               class='form-control card-title' placeholder='. . .' name='fname' value='".$objUsuario->getNombre_usuario()."'>
         </div>
      </div>

      <div class='col-md-12'>
         <div class='form-group'>
             <label for='projectinput3'>
                 <h5 class='card-title'>
                     <li class=fa fa-calendar-alt></li> Fecha de
                     programacion
                 </h5>
             </label>
             <input type='date' class='form-control card-title' placeholder='. . . '
                 name='fechax' id='fechax' value='".$_POST['fecha']."'>
         </div>
      </div>

      <div class='col-md-12'>
         <div class='form-group'><br>
            
         </div>
      </div>

      <div class='col-md-12'>
         <div class='form-group'>
         <table>
          <tr><td class='bg-danger   white'><li class='fa fa-question-circle'></li>&nbsp;Fecha ocupada por el auditor</td></tr>
          <tr> <td class='bg-yellow bg-lighten-3 '><li class='fa fa-question-circle'></li>&nbsp;Fecha de auditorias programadas para el auditor</td></tr><br>
          <tr> <td class='bg-blue  white'><li class='fa fa-question-circle'></li>&nbsp;Fecha de auditorias programadas para otros auditores AES</td></tr>
          </table>
         </div>
      </div>

      
      
   </div>


   <div class='col-md-9'>
      <div id='resultadoVerificacion'>
            
      
            <div class='col-md-12'>";
            usuarioController::auditoriasCalendarioVerificacion($objUsuario->getIdusuario(),$_POST['fecha']);

      // <!--     <div class='bs-callout-white callout-square callout-transparent mt-1'>
      //             <div class='media align-items-stretch'>
      //                <div class='media-left media-middle bg-warning callout-arrow-left position-relative p-2'>
      //                     <i class='fa fa-exclamation-triangle text-white'></i>
      //                </div>
      //                <div class='media-body p-1'>
      //                      <p>Por favor eliga una fecha para verificar la disponibilidad de la fecha para la realizacion de la auditoria.</p>
      //                </div>
      //             </div>
      //          </div>-->
            
   echo    "
            </div>
      </div>
   </div>



   </div>
</div>";


?>