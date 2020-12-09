/*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarValidacion', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
  formData.append("documento", document.getElementsByName("documento")[0].value);
  formData.append("descripcion", document.getElementsByName("descripcion")[0].value);
  formData.append("tipo", document.getElementsByName("tipo")[0].value);


  var ruta = routesAppPlatform() + 'seguridad/core/registrarValidacion.php';
   console.log(document.getElementsByName("documento")[0].value);
  sendEventFormDataApp('POST', ruta, formData, '#smgValidacion');
  return false;
});



$(document).on('click', '#actualizarValidacion', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  formData.append("id", document.getElementsByName("id")[0].value);
  formData.append("fecha", document.getElementsByName("fecha")[0].value);
  formData.append("documento", document.getElementsByName("documento")[0].value);
  formData.append("descripcion", document.getElementsByName("descripcion")[0].value);
  formData.append("tipo", document.getElementsByName("tipo")[0].value);


  var ruta = routesAppPlatform() + 'seguridad/core/actualizarValidacion.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgValidacion');
  return false;
});


