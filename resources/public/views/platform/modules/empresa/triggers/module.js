/*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarEmpresa', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  var words = [
    document.getElementsByName("razonSocial")[0].value,
    document.getElementsByName("nit")[0].value,
    document.getElementsByName("area")[0].value,
    document.getElementsByName("pais")[0].value,
    document.getElementsByName("departamento")[0].value,
    document.getElementsByName("ciudad")[0].value,
    document.getElementsByName("direccion")[0].value ,
    document.getElementsByName("emailEmpresarial")[0].value,
    document.getElementsByName("sitioWeb")[0].value,
    document.getElementsByName("representanteLegal")[0].value,
    document.getElementsByName("telefonoRepresentante")[0].value,
    document.getElementsByName("representanteSistemaGestion")[0].value,
    document.getElementsByName("telefonoSistema")[0].value,
    document.getElementsByName("grupo")[0].value
  ];

  if (validarionResumen(words) > 1) {
    swal({title: "Tenemos un problema!",
	  text: "Actualmente hay campos obligatorios en el formulario sin diligenciar!",
	  icon: "warning",
	  button: false, 
	  timer: 6000 });
    $("#smgEmpresa").html("Actualmente hay campos obligatorios en el formulario sin diligenciar ");
  } else {
    formData.append("razonSocial", document.getElementsByName("razonSocial")[0].value);
    formData.append("nit", document.getElementsByName("nit")[0].value);
    formData.append("area", document.getElementsByName("area")[0].value);
    formData.append("pais", document.getElementsByName("pais")[0].value);
    formData.append("departamento", document.getElementsByName("departamento")[0].value);
    formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
    formData.append("direccion", document.getElementsByName("direccion")[0].value);
    formData.append("emailEmpresarial", document.getElementsByName("emailEmpresarial")[0].value);
    formData.append("sitioWeb", document.getElementsByName("sitioWeb")[0].value);
    formData.append("emailFacturacion", document.getElementsByName("emailFacturacion")[0].value);
    formData.append("fechaCorteFacturacion", document.getElementsByName("fechaCorteFacturacion")[0].value);
    formData.append("representanteLegal", document.getElementsByName("representanteLegal")[0].value);
    formData.append("cargoRepresentante", document.getElementsByName("cargoRepresentante")[0].value);
    formData.append("telefonoRepresentante", document.getElementsByName("telefonoRepresentante")[0].value);
    formData.append("representanteSistemaGestion", document.getElementsByName("representanteSistemaGestion")[0].value);
    formData.append("cargoRepresentanteSistema", document.getElementsByName("cargoRepresentanteSistema")[0].value);
    formData.append("telefonoSistema", document.getElementsByName("telefonoSistema")[0].value);
    formData.append("emailContacto", document.getElementsByName("emailContacto")[0].value);
    formData.append("grupo", document.getElementsByName("grupo")[0].value);
    formData.append("logo", $('#logo')[0].files[0]);

    var contador = document.getElementsByName("certificadosDinamicos")[0].value;
    formData.append("contadorCertificados", contador);
    for (let index = 0; index < parseInt(contador); index++) {
      formData.append("certificado" + index, document.getElementsByName("car[" + index + "][certificado]")[0].value);
      formData.append("entidad" + index, document.getElementsByName("car[" + index + "][entidad]")[0].value);
      formData.append("codigo" + index, document.getElementsByName("car[" + index + "][codigo]")[0].value);
      formData.append("date" + index, document.getElementsByName("car[" + index + "][date]")[0].value);
      // console.log(document.getElementsByName("car[" + index + "][certificado]")[0].value);
      // console.log(document.getElementsByName("car[" + index + "][entidad]")[0].value);
      // console.log(document.getElementsByName("car[" + index + "][codigo]")[0].value);
      // console.log(document.getElementsByName("car[" + index + "][date]")[0].value);
    }
    // for (var pair of formData.entries()) {
    //   console.log(pair[0] + ', ' + pair[1]);
    // }
    var ruta = routesAppPlatform() + 'empresa/core/registrarEmpresa.php';

    sendEventFormDataApp('POST', ruta, formData, '#smgEmpresa');
    swal({title: "Formulario de Registro!",
	  text: " Registro de empresa exitoso !",
	  icon: "success",
	  button: false, 
	  timer: 6000 });
    return false;

  }

});

$(document).on('click', '#registrarCertificados', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();

  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);

  var contador = document.getElementsByName("certificadosDinamicos")[0].value;
  formData.append("contadorCertificados", contador);
  for (let index = 0; index < parseInt(contador); index++) {
    formData.append("certificado" + index, document.getElementsByName("car[" + index + "][certificado]")[0].value);
    formData.append("entidad" + index, document.getElementsByName("car[" + index + "][entidad]")[0].value);
    formData.append("codigo" + index, document.getElementsByName("car[" + index + "][codigo]")[0].value);
    formData.append("date" + index, document.getElementsByName("car[" + index + "][date]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][certificado]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][entidad]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][codigo]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][date]")[0].value);
  }
  for (var pair of formData.entries()) {
    console.log(pair[0] + ', ' + pair[1]);
  }
  var ruta = routesAppPlatform() + 'empresa/core/agregarCertificado.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgEmpresa');
  return false;
});






$(document).on('click', '#registrarContacto', function (e) {

  var formData = new FormData();

  formData.append("idsede_", document.getElementsByName("idsede_")[0].value);

  var contador = document.getElementsByName("certificadosDinamicos")[0].value;
  formData.append("contadorCertificados", contador);
  for (let index = 0; index < parseInt(contador); index++) {
    formData.append("contacto" + index, document.getElementsByName("car[" + index + "][contacto]")[0].value);
    formData.append("cargo" + index, document.getElementsByName("car[" + index + "][cargo]")[0].value);
    formData.append("telefonos" + index, document.getElementsByName("car[" + index + "][telefonos]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][contacto]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][cargo]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][telefonos]")[0].value);
  }
  var ruta = routesAppPlatform() + 'empresa/core/agregarContacto.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgEmpresa');
  return false;
});


/*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarSede', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  var formData = new FormData();
  var words = [
    document.getElementsByName("ciudad")[0].value,
    document.getElementsByName("email")[0].value
  ];

  if (validarionResumen(words) > 1) {
    swal({title: "Tenemos un problema!",
	  text: "Actualmente hay campos obligatorios en el formulario sin diligenciar!",
	  icon: "warning",
	  button: false, 
	  timer: 6000 });
    $("#smgEmpresa").html("Actualmente hay campos obligatorios en el formulario sin diligenciar ");
  } else {
    swal("Formulario de registro", "Registro de usuario exitoso", "success");
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
  formData.append("direccion", document.getElementsByName("direccion")[0].value);
  formData.append("nempleados", document.getElementsByName("nempleados")[0].value);
  formData.append("procesos", document.getElementsByName("procesos")[0].value);
  formData.append("email", document.getElementsByName("email")[0].value);


  var contador = document.getElementsByName("certificadosDinamicos")[0].value;
  formData.append("contadorCertificados", contador);
  for (let index = 0; index < parseInt(contador); index++) {
    formData.append("contacto" + index, document.getElementsByName("car[" + index + "][contacto]")[0].value);
    formData.append("cargo" + index, document.getElementsByName("car[" + index + "][cargo]")[0].value);
    formData.append("telefonos" + index, document.getElementsByName("car[" + index + "][telefonos]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][contacto]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][cargo]")[0].value);
    console.log(document.getElementsByName("car[" + index + "][telefonos]")[0].value);
  }
  // for (var pair of formData.entries()) {
  //   console.log(pair[0] + ', ' + pair[1]);
  // }
  
  var ruta = routesAppPlatform() + 'empresa/core/registrarSede.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgEmpresa');
  

    return false;
  }
});



$(document).on('click', '#habilitarEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/habilitarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#inhabilitarEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/inhabilitarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value
    }, '#smg');
  return false;

});
$(document).on('click', '#habilitarSedeEmpresa', function (e) {});
$(document).on('click', '#inhabilitarSedeEmpresa', function (e) {

});
$(document).on('click', '#modificarEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value,
      "nit": document.getElementsByName("nit")[0].value,
      "pais": document.getElementsByName("pais")[0].value,
      "ciudad": document.getElementsByName("ciudad")[0].value,
      "direccion": document.getElementsByName("direccion")[0].value,
      "emailEmpresarial": document.getElementsByName("emailEmpresarial")[0].value,
      "sitioWeb": document.getElementsByName("sitioWeb")[0].value,
      "emailFacturacion": document.getElementsByName("emailFacturacion")[0].value,
      "fechaCorteFacturacion": document.getElementsByName("fechaCorteFacturacion")[0].value,
      "representanteLegal": document.getElementsByName("representanteLegal")[0].value,
      "cargoRepresentante": document.getElementsByName("cargoRepresentante")[0].value,
      "telefonoRepresentante": document.getElementsByName("telefonoRepresentante")[0].value,
      "representanteSistemaGestion": document.getElementsByName("representanteSistemaGestion")[0].value,
      "cargoRepresentanteSistema": document.getElementsByName("cargoRepresentanteSistema")[0].value,
      "telefonoSistema": document.getElementsByName("telefonoSistema")[0].value,
      "emailContacto": document.getElementsByName("emailContacto")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#modificarGrupoEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value,
      "idgrupo": document.getElementsByName("idgrupo")[0].value
    }, '#smg');
  return false;

});
$(document).on('click', '#modificarSedeEmpresa', function (e) {

});
$(document).on('click', '#modificarSesionEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idsesion": document.getElementsByName("idempresa")[0].value,
      "usuario": document.getElementsByName("usuario")[0].value,
      "clave": document.getElementsByName("clave")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#modificarAreaEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value,
      "idarea": document.getElementsByName("idarea")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#modificarFotoEmpresa', function (e) {

});
$(document).on('click', '#asociarEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/asociarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value,
      "empresaA": document.getElementsByName("empresaA")[0].value
    }, '#tablaDinamica_panelAsociacion');
  return false;
});
// $(document).on('click','#desasociarEmpresa',function(e){
//   sendEventApp('POST',routesAppPlatform()+'empresa/core/inhabilitarEmpresa.php',
//     params = {
//        "idEmpresaA" : document.getElementsByName("idempresaA")[0].value,
//        "idEmpresaB" : document.getElementsByName("idempresaB")[0].value
//      },'#smg');
//      return false;

// });
$(document).on('click', '#autentificacion', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'sesion/core/autentificacion.php',
    params = {
      "usuario": document.getElementsByName("usuario")[0].value,
      "clave": document.getElementsByName("clave")[0].value,
      "estado": document.getElementsByName("estado")[0].value,
      "idsesion": document.getElementsByName("idsesion")[0].value,
      "idempresa": document.getElementsByName("idempresa")[0].value
    }, '#smgSesion');
  return false;

  swal({title: "Datos de acceso!",
	  text: " Registro de datos de acceso exitoso !",
	  icon: "success",
	  button: false, 
	  timer: 6000 });
    return false;

});


$(document).on('click', '#registrarGrupo', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/registrarGrupo.php',
    params = {
      "etiqueta": document.getElementsByName("fname")[0].value
    }, '#smgGrupo');

  return false;
});

$(document).on('click', '#buscarEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/consultaEmpresa.php',
    params = {
      "buscar": document.getElementsByName("buscar")[0].value,
      "estado": document.getElementsByName("estado")[0].value,
      "area": document.getElementsByName("area")[0].value,
    }, '#tablaDinamica_panel');

  return false;
});


$(document).on('click', '#subirFileV1', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("files", $('#files')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/actualizarLogo.php', formData, '#smgEmpresa');
  return false;
});

$(document).on('click', '#subirFileV2', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("files2", $('#files2')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/actualizarLogo.php', formData, '#smgEmpresa');
  return false;
});
