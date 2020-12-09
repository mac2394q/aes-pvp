/*  Eventos para modulo de sesion. */
$(document).on('click','#validarSesion',function(e){

  $("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
   sendEventApp('POST',routesAppPlatform()+'sesion/core/validaSesion.php',
   params = {
       "usuario" : document.getElementsByName("usuario")[0].value,
       "clave" : document.getElementsByName("clave")[0].value,
       "idioma" : document.getElementsByName("idioma")[0].value
     },'#smgLogin');  
    
     return false;
 });