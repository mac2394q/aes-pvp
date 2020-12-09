/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarEmpleado',function(e){

    var formData = new FormData();
    var words = [
      document.getElementsByName("nombre")[0].value,
      document.getElementsByName("documento")[0].value,
      document.getElementsByName("correo")[0].value,
      document.getElementsByName("direccion")[0].value,
      document.getElementsByName("pais")[0].value,
      document.getElementsByName("usuario")[0].value,
      document.getElementsByName("clave")[0].value
    ];
  
    if (validarionResumen(words) > 1) {
      swal({title: "Tenemos un problema!",
      text: "Actualmente hay campos obligatorios en el formulario sin diligenciar!",
      icon: "warning",
      button: false, 
      timer: 6000 });
      $("#smgEmpresa").html("Actualmente hay campos obligatorios en el formulario sin diligenciar ");
    } else {
      formData.append("nombre", document.getElementsByName("nombre")[0].value);
    formData.append("area", document.getElementsByName("area")[0].value);
    formData.append("documento", document.getElementsByName("documento")[0].value);
    formData.append("correo", document.getElementsByName("correo")[0].value);
    formData.append("telefono", document.getElementsByName("telefono")[0].value);
    formData.append("direccion", document.getElementsByName("direccion")[0].value);
    formData.append("pais", document.getElementsByName("pais")[0].value);
    formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
    formData.append("usuario", document.getElementsByName("usuario")[0].value);
    formData.append("clave", document.getElementsByName("clave")[0].value);
    formData.append("fileDoc", $('#fileDoc')[0].files[0]);


    var ruta = routesAppPlatform() + 'usuarios/core/registrarEmpleado.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgEmpleado');

       return false;
       swal({title: "Formulario de registro!",
      text: "Registro de usuario exitoso!",
      icon: "success",
      button: false, 
      timer: 6000 });
    }
    
  
   });


   
$(document).on('click', '#subirFileV1', function (e) {
    var formData = new FormData();
    //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
    formData.append("files", $('#files')[0].files[0]);
    formData.append("idempleado", document.getElementsByName("idempleado")[0].value);
    sendEventFormDataApp('POST', routesAppPlatform() + 'usuarios/core/actualizarLogo.php', formData, '#smgEmpleado');
    return false;
  });
  

  $(document).on('click', '#buscarUsuarios', function (e) {
    
    sendEventApp('POST', routesAppPlatform() + 'usuarios/core/buscarUsuarios.php',
      params = {
        "area": document.getElementsByName("area")[0].value,
        "buscar": document.getElementsByName("buscar")[0].value
      }, '#tablaDinamica_panel');
    return false;
  });





  $(document).on('click', '#autentificacion', function (e) {
    sendEventApp('POST', routesAppPlatform() + 'usuarios/core/autentificacion.php',
      params = {
        "rol": document.getElementsByName("rol")[0].value,
        "usuario": document.getElementsByName("usuario")[0].value,
        "clave": document.getElementsByName("clave")[0].value,
        "estado": document.getElementsByName("estado")[0].value,
        "idsesion": document.getElementsByName("idsesion")[0].value,
        "idempleado": document.getElementsByName("idempleado")[0].value
      }, '#smgSesion');
    return false;
  });


