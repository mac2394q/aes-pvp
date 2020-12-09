$(document).on('click', '#informeClientes', function (e) {

    var formData = new FormData();  
    formData.append("fechai", $('#fechai').val());
    formData.append("fechaf", $('#fechaf').val());

    var ruta = routesAppPlatform() + 'informes/core/listadoClientes.php';
    sendEventFormDataApp('POST', ruta, formData, '#tablaDinamica_panel');
    return false;
  });

  $(document).on('click', '#buscarEmpresa', function (e) {

    var formData = new FormData();  
    formData.append("buscar",  document.getElementsByName("buscar")[0].value );
    var ruta = routesAppPlatform() + 'informes/core/tablaClientes.php';
    sendEventFormDataApp('POST', ruta, formData, '#tablaDinamica_panel');
    return false;
  });



 

  $(document).on('click', '#buscarEmpresa', function (e) {

    var formData = new FormData();  
    formData.append("buscar",  document.getElementsByName("buscar")[0].value );
    var ruta = routesAppPlatform() + 'informes/core/tablaClientes.php';
    sendEventFormDataApp('POST', ruta, formData, '#tablaDinamica_panel');
    return false;
  });

  

  $(document).on('click', '#generarInformeTrazabilidad', function (e) {
    $('#tablaDinamica_panel').hide();
    var formData = new FormData();  

    formData.append("fechai", $('#fechai').val());
    formData.append("fechaf", $('#fechaf').val());
    formData.append("buscar",  $(this).attr('title') );
    
    var ruta = routesAppPlatform() + 'informes/core/informacionEmpresa.php';
    sendEventFormDataApp('POST', ruta, formData, '#infoEmpresa');


    var ruta2 = routesAppPlatform() + 'informes/core/trazabilidad.php';
    sendEventFormDataApp('POST', ruta2, formData, '#tablaDinamica_panel2');
    return false;
  });