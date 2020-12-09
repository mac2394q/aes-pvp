$(document).on('click', '#empresaAncla', function(e) {
    // var nombre  = document.getElementsByName("empresaAncla")[0].value;
    // var res=nombre.replace("car[0][", "");
    // res=nombre.replace("]", "");
    // console.log(res);
    // var href = $(this).attr('name');
    // console.log(href );
    // var res=href.replace("car[", "");
    // res=res.replace("]", "");
    // res=res.replace("empresaAncla", "");
    // res=res.replace("[]", "");
    //console.log(document.getElementById("empresaAncla")[0].value);
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/empresaAnclaAsociada.php',
        params = {
            "idempresa": document.getElementsByName("empresaAncla")[0].value
        }, '#EmpresaDiv');
    return false;
});
$(document).on('click', '#empresaAso', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/sedesEmpresa.php',
        params = {
            "empresaAso": document.getElementsByName("empresaAso")[0].value
        }, '#sedeDiv');
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/plantillaEmpresa.php',
        params = {
            "empresaAso": document.getElementsByName("empresaAso")[0].value
        }, '#plantillaAso');
    //alert(document.getElementsByName("empresaAso")[0].value);
    return false;
});
$(document).on('click', '#calendarioAuditor', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/modalCalendarioAuditoria.php',
        params = {
            "auditor": document.getElementsByName("auditorTop")[0].value,
            "fecha": document.getElementsByName("fechaTop")[0].value
        }, '#calendarioDiv');
    return false;
});
$(document).on('click', '#verificar_auditoria_disponibilidad', function(e) {
    document.getElementsByName("fechaTop")[0].value = document.getElementsByName("fechax")[0].value;
    document.getElementsByName("fecha")[0].value = document.getElementsByName("fechax")[0].value;
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/reConsultaVerificacion.php',
        params = {
            "auditor": document.getElementsByName("auditorTop")[0].value,
            "fecha": document.getElementsByName("fechax")[0].value
        }, '#resultadoVerificacion');
    return false;
});
$(document).on('click', '#auditor', function(e) {
    if (document.getElementsByName("auditor")[0].value != "no") {
        sendEventApp('POST', routesAppPlatform() + 'auditorias/core/informacionAuditor.php',
            params = {
                "auditor": document.getElementsByName("auditor")[0].value
            }, '#informacionAuditor');
    }
    return false;
});
$(document).on('click', '#finalizarAuditoria', function(e) {
    swal({
            title: "Finalizar Auditoria",
            text: "Esta seguro de Finalizar la Auditoria ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                sendEventApp('POST', routesAppPlatform() + 'auditorias/core/finalizarAuditoria.php',
                    params = {
                        "idauditoria": document.getElementsByName("idauditoria")[0].value,
                    }, '#smgAuditoria');
            }
        });
    return false;
});
$(document).on('click', '#finalizarPlan', function(e) {

    swal({
            title: "Finalizar Plan de Accion",
            text: "Esta seguro de Finalizar el plan de accion ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                sendEventApp('POST', routesAppPlatform() + 'auditorias/core/finalizarPlan.php',
                    params = {
                        "idauditoria": document.getElementsByName("idauditoria")[0].value,
                    }, '#smgAuditoria');
            }
        });
    return false;
});
$(document).on('click', '#validarElementoPlan', function(e) {
    var formData = new FormData();
    var href = $(this).attr('href').replace("#", "");
    formData.append("id", href);
    formData.append("accion", document.getElementsByName("accion" + href)[0].value);
    formData.append("responsable", document.getElementsByName("responsable" + href)[0].value);
    formData.append("fecha", document.getElementsByName("fecha" + href)[0].value);
    formData.append("porcentaje", document.getElementsByName("porcentaje" + href)[0].value);
    formData.append("file", $("#file" + href)[0].files[0]);
    // console.log(href);
    // console.log(document.getElementsByName("responsable1")[0].value);
    // console.log(document.getElementsByName("responsable4")[0].value);
    var ruta = routesAppPlatform() + 'auditorias/core/registrarItemPlan.php';
    sendEventFormDataApp('POST', ruta, formData, '#respuesta' + href);
    // sendEventApp('POST',routesAppPlatform()+'auditorias/core/observacionAuditor.php',
    // params = {
    //    "iditem" : href,
    //    "estado" : estado,
    //    "observacion" : observacion
    //  },'#respuesta'+href);
    return false;
});
$(document).on('click', '#seleccionElemento', function(e) {
    var formData = new FormData();
    var id = $(this).attr('title');
    var estado = document.getElementsByName("estado" + id)[0].value;
    //alert(id+" "+estado);
    formData.append("id", id);
    formData.append("tipo", estado);
    var ruta = routesAppPlatform() + 'auditorias/core/checkElement.php';
    sendEventFormDataApp('POST', ruta, formData, '#' + id);
    return false;
});
$(document).on('click', '#validarElemento', function(e) {
    var href = $(this).attr('href').replace("#", "");
    var estado = document.getElementsByName("estado" + href)[0].value;
    var observacion = document.getElementsByName("textarea" + href)[0].value;
    console.log(href);
    console.log(estado);
    console.log(observacion);
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/observacionAuditor.php',
        params = {
            "iditem": href,
            "estado": estado,
            "observacion": observacion
        }, '#respuesta' + href);
    return false;
});
$(document).on('click', '#validarElemento2', function(e) {
    var href = $(this).attr('href').replace("#", "");
    var observacion = document.getElementsByName("textarea" + href)[0].value;
    console.log(href);
    console.log(observacion);
    sendEventApp('POST', routesAppPlatform() + 'auditorias/core/observacionEmpresa.php',
        params = {
            "iditem": href,
            "observacion": observacion
        }, '#respuesta2' + href);
    return false;
});
$(document).on('click', '#registrarAuditoria', function(e) {
    //$("#smgLogin").html("");
    //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
    var formData = new FormData();
    formData.append("idusuario", document.getElementsByName("usuario")[0].value);
    var user = document.getElementsByName("usuario")[0].value;
    formData.append("idauditor", document.getElementsByName("auditor")[0].value);
    formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
    var fecha = document.getElementsByName("fechaTop")[0].value;
    formData.append("idplantilla", document.getElementsByName("plantilla")[0].value);
    formData.append("empresaAncla", document.getElementsByName("empresaAncla")[0].value);
    var ancla = document.getElementsByName("empresaAncla")[0].value;
    formData.append("empresaAso", document.getElementsByName("empresaAso")[0].value);
    var asociada = document.getElementsByName("empresaAso")[0].value;
    formData.append("sede", document.getElementsByName("sede")[0].value);
    if (user != "no" && ancla != "null" && ancla != "null" && asociada != "null" && fecha.length > 0) {
        swal({
                title: "Registrar Auditoria",
                text: "Esta seguro de registrar una nueva Auditoria ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'auditorias/core/registrarAuditoria.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgAuditoria');
                    location.reload();
                }
            });
    } else {
        swal({
            title: "Error de validacion",
            text: "Actualmente hay campos obligatorios pendiente!",
            icon: "warning",
            button: false,
            timer: 6000
        });
        $("#smg").html("Actualmente hay campos obligatorios pendiente");
    }
    return false;
});
$(document).on('click', '#registrarAuditoriaPre', function(e) {
    //$("#smgLogin").html("");
    //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
    var formData = new FormData();
    formData.append("idusuario", document.getElementsByName("usuario")[0].value);
    formData.append("idauditor", document.getElementsByName("auditor")[0].value);
    formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
    formData.append("idplantilla", document.getElementsByName("plantilla")[0].value);
    formData.append("empresaAncla", document.getElementsByName("empresaAncla")[0].value);
    formData.append("empresaAso", document.getElementsByName("empresaAso")[0].value);
    formData.append("sede", document.getElementsByName("sede")[0].value);
    var ruta = routesAppPlatform() + 'auditorias/core/registrarAuditoria.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgAuditoria');
    return false;
});

$(document).on('click', '#subirCertificacion', function(e) {
    var formData = new FormData();

    formData.append("files", $("#files")[0].files[0]);
    formData.append("idauditoria", document.getElementsByName("idauditoria")[0].value);

    swal({
            title: "Subir Certificado ",
            text: "Esta seguro de subir certificado de auditoria ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'auditorias/core/subirCertificadoAuditoria.php';
                sendEventFormDataApp('POST', ruta, formData, '#respuesta');
            }
        });
    return false;
});
$(document).on('click', '#cierreAuditoria', function(e) {
    var formData = new FormData();
    var f = document.getElementsByName("fechaTop")[0].value;
    formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
    formData.append("idauditoria", document.getElementsByName("idauditoria")[0].value);

    if (f != 0) {
        swal({
                title: "Cierre de Auditoria ",
                text: "Esta seguro de cerrar el registro de auditoria ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'auditorias/core/cierreAuditoria.php';
                    sendEventFormDataApp('POST', ruta, formData, '#respuesta');
                }
            });
    }

    return false;
});

$(document).on('click', '#consultar_auditoria', function(e) {
    var formData = new FormData();
    var estado = document.getElementsByName("estado_auditoria")[0].value;
    formData.append("estado", estado);
    if (estado == "fecha") {
        formData.append("consulta", document.getElementsByName("fechaTop")[0].value);
    } else {
        formData.append("consulta", document.getElementsByName("consulta_")[0].value);
    }

    swal({
            title: "Consulta parametrizada",
            text: "Son los parametros correctos para su busqueda y filtrado de las auditorias => " + estado,
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'auditorias/core/consultarAuditoria.php';
                sendEventFormDataApp('POST', ruta, formData, '#tablaDinamica_panel');
            }
        });
    return false;
});