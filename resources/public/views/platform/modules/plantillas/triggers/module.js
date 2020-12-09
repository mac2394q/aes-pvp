/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarPlantilla',function(e){
    var formData = new FormData();
    formData.append("etiqueta" ,document.getElementsByName("etiqueta")[0].value);
    formData.append("pais" ,document.getElementsByName("pais")[0].value);
    formData.append("area" ,document.getElementsByName("area")[0].value);
    var contador = document.getElementsByName("certificadosDinamicos")[0].value;
    formData.append("contadorCertificados" ,contador);
    for (let index = 0; index < parseInt(contador); index++) {
      formData.append("consecutivo"+index ,document.getElementsByName("car["+index +"][consecutivo]")[0].value);
      formData.append("etiquetaPlantilla"+index ,document.getElementsByName("car["+index +"][etiquetaPlantilla]")[0].value);
      console.log(document.getElementsByName("car["+index +"][consecutivo]")[0].value);
      console.log(document.getElementsByName("car["+index +"][etiquetaPlantilla]")[0].value);
  
    }
  
    for (var pair of formData.entries()) {
      console.log(pair[0]+ ', ' + pair[1]); 
  }
  
    var ruta = routesAppPlatform()+'plantillas/core/registroPlantilla.php';
    
    sendEventFormDataApp('POST',ruta,formData,'#smgPlantilla');
    return false;
   });

   $(document).on('click','#registrarCapitulo',function(e){
    var formData = new FormData();
  
      formData.append("consecutivo" ,document.getElementsByName("consecutivo")[0].value);
      formData.append("etiquetaPlantilla" ,document.getElementsByName("etiquetaPlantilla")[0].value);
      formData.append("idplantilla" ,document.getElementsByName("idplantilla")[0].value);
    var ruta = routesAppPlatform()+'plantillas/core/registrarGrupo.php';
    
    sendEventFormDataApp('POST',ruta,formData,'#smgPlantilla');
    return false;
   });



   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarPlantillaGrupo',function(e){
  var formData = new FormData();
  //var contador = document.getElementsByName("certificadosDinamicos")[0].value;
  //formData.append("contadorCertificados" ,contador);
  formData.append("idplantilla" ,document.getElementsByName("idplantilla")[0].value);
  // for (let index = 0; index < parseInt(contador); index++) {
  //   formData.append("etiquetaPlantilla"+index ,document.getElementsByName("car["+index +"][etiquetaPlantilla]")[0].value);
  //   formData.append("textarea2"+index ,document.getElementsByName("car["+index +"][textarea2]")[0].value);
  //   formData.append("plantilla"+index ,document.getElementsByName("car["+index +"][plantilla]")[0].value);
  //   console.log(document.getElementsByName("car["+index +"][textarea2]")[0].value);
  //   console.log(document.getElementsByName("car["+index +"][etiquetaPlantilla]")[0].value);
  // }
//   for (var pair of formData.entries()) {
//     console.log(pair[0]+ ', ' + pair[1]); 
// }
  formData.append("etiquetaPlantilla",document.getElementsByName("etiquetaPlantilla")[0].value);
  formData.append("textarea2",document.getElementsByName("textarea2")[0].value);
  formData.append("plantilla",document.getElementsByName("plantilla")[0].value);

  var ruta = routesAppPlatform()+'plantillas/core/registroPlantillaGrupo.php';
  
  sendEventFormDataApp('POST',ruta,formData,'#smgPlantilla');
  return false;
 });



 $(document).on('click','#editarGrupo',function(e){
  var formData = new FormData();

  formData.append("idgrupo" ,document.getElementsByName("idgrupo")[0].value);
 
  formData.append("consecutivo",document.getElementsByName("consecutivo")[0].value);
  formData.append("titulo",document.getElementsByName("titulo")[0].value);


  var ruta = routesAppPlatform()+'plantillas/core/editarGrupo.php';
  
  sendEventFormDataApp('POST',ruta,formData,'#smgPlantilla');
  return false;
 });



 $(document).on('click','#editarItem',function(e){
  var formData = new FormData();

  formData.append("idplantilla" ,document.getElementsByName("idplantilla")[0].value);
 
  formData.append("etiquetaPlantilla",document.getElementsByName("etiquetaPlantilla")[0].value);
  formData.append("textarea2",document.getElementsByName("textarea2")[0].value);
  // formData.append("plantilla",document.getElementsByName("plantilla")[0].value);

  var ruta = routesAppPlatform()+'plantillas/core/editarRubrica.php';
  
  sendEventFormDataApp('POST',ruta,formData,'#smgPlantilla');
  return false;
 });

 $(document).on('click','#editarPlantilla',function(e){
  var formData = new FormData();

  formData.append("idplantilla" ,document.getElementsByName("idplantilla")[0].value);
 
  formData.append("nombre",document.getElementsByName("nombre")[0].value);
  formData.append("area",document.getElementsByName("area_")[0].value);


  var ruta = routesAppPlatform()+'plantillas/core/editarPlantilla.php';
  console.log(document.getElementsByName("idplantilla")[0].value);

 

  sendEventFormDataApp('POST',ruta,formData,'#smgPlantilla');
  return false;
 });