//Script que agrega fondo a la barra de navegacion cuando se baja el scroll
$(window).scroll(function () {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});
$("#modalRegistro, #modalInicio").on("shown.bs.modal", function () {
    $("#nombreUsuario,#nombreInicio").focus();
});
//funcion que valida con ajax todos los campos del form de registro al hacer click en el boton de envio
function validarRegistro() {
    $.ajax({
        url: "validarRegistro.php",
        type: "post",
        data: $("#formularioRegistro").serialize(),
        success: function (respuesta) {
            if (respuesta == "Incompleto") {
                $("#nombreUsuario").addClass("inputRojo");
                $(".vacio1").addClass("inputIncompleto");
                $("#correoUsuario").addClass("inputRojo");
                $(".vacio2").addClass("inputIncompleto");
                $("#passUsuario").addClass("inputRojo");
                $(".vacio3").addClass("inputIncompleto");
                $("#rptpassUsuario").addClass("inputRojo");
                $(".vacio4").addClass("inputIncompleto");
                $("#cedulaUsuario").addClass("inputRojo");
                $(".vacio5").addClass("inputIncompleto");
                $("#empresaUsuario").addClass("inputRojo");
                $(".vacio6").addClass("inputIncompleto");
                $("#rifUsuario").addClass("inputRojo");
                $(".vacio7").addClass("inputIncompleto");
                $("#direccionUsuario").addClass("inputRojo");
                $(".vacio8").addClass("inputIncompleto");
                $("#numeroUsuario").addClass("inputRojo");
                $(".vacio9").addClass("inputIncompleto");
                return false;
            } else if (respuesta == "Incompleto2") {
                $("#nombreUsuario").addClass("inputRojo");
                $(".vacio1").addClass("inputIncompleto");
                return false;
            } else {
                if (respuesta == "Incompleto3") {
                    $("#correoUsuario").addClass("inputRojo");
                    $(".vacio2").addClass("inputIncompleto");
                    return false;
                } else if (respuesta == "Incompleto4") {
                    $("#passUsuario").addClass("inputRojo");
                    $(".vacio3").addClass("inputIncompleto");
                    return false;
                } else {
                    if (respuesta == "Incompleto5") {
                        $("#rptpassUsuario").addClass("inputRojo");
                        $(".vacio4").addClass("inputIncompleto");
                        return false;
                    } else if (respuesta == "Incompleto6") {
                        $("#cedulaUsuario").addClass("inputRojo");
                        $(".vacio5").addClass("inputIncompleto");
                        return false;
                    } else {
                        if (respuesta == "Incompleto7") {
                            $("#empresaUsuario").addClass("inputRojo");
                            $(".vacio6").addClass("inputIncompleto");
                            return false;
                        } else if (respuesta == "Incompleto8") {
                            $("#rifUsuario").addClass("inputRojo");
                            $(".vacio7").addClass("inputIncompleto");
                            return false;
                        } else {
                            if (respuesta == "nombreExistente") {
                                $(".vacio1").addClass("usuarioExistente");
                                return false;
                            } else if (respuesta == "correoExistente") {
                                $(".vacio2").addClass("correoExiste");
                                return false;
                            } else {
                                if (respuesta == "correoFalso") {
                                    $(".vacio2").addClass("correoInvalido");
                                    return false;
                                } else if (respuesta == "noCoinciden") {
                                    $(".vacio4").addClass("noCoinciden");
                                    return false;
                                } else {
                                    if (respuesta == "cedulaExistente") {
                                        $(".vacio5").addClass("cedulaExiste");
                                        return false;
                                    } else if (respuesta == "Incompleto9") {
                                        $("#direccionUsuario").addClass("inputRojo");
                                        $(".vacio8").addClass("inputIncompleto");
                                        return false;
                                    } else {
                                        if (respuesta == "Incompleto10") {
                                            $("#numeroUsuario").addClass("inputRojo");
                                            $(".vacio9").addClass("inputIncompleto");
                                            return false;
                                        }
                                        $("#formularioRegistro").submit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    });
}
function validarInicio() {
    $.ajax({
        type: "post",
        url: "validarInicio.php",
        data: $("#formularioInicio").serialize(),
        success: function (response) {
            if (response == "Incompleto") {
                $("#nombreInicio,#passInicio").addClass("inputRojo");
                $(".blank1,.blank2").addClass("inputIncompleto");
                return false;
            } else if (response == "Incompleto2") {
                $("#nombreInicio").addClass("inputRojo");
                $(".blank1").addClass("inputIncompleto");
                return false;
            } else {
                if (response == "Incompleto3") {
                    $("#passInicio").addClass("inputRojo");
                    $(".blank2").addClass("inputIncompleto");
                    return false;
                } else if (response == "cuentaInexistente") {
                    $(".blank2").addClass("cuentaInexistente");
                    return false;
                }
                $("#formularioInicio").submit();
            }
        }
    });
}

//Funciones que remueven todos los estilos y mensajes de las validaciones del form de registro
function removerClases() {
    $("#nombreUsuario, #correoUsuario, #passUsuario, #rptpassUsuario, #cedulaUsuario, #empresaUsuario, #rifUsuario,#nombreInicio,#passInicio,#select-fecha,#select-cita,#textarea-comentario,#select-numero,#direccionUsuario,#numeroUsuario,#nombreArchivo,#archivoSubido,#nombre-admin,#contra-admin").removeClass("inputRojo");
    $(".vacio1, .vacio2, .vacio3, .vacio4, .vacio5, .vacio6, .vacio7,.vacio8,.vacio9,.blank1,.blank2,.blanco1,.blanco2,.blanco3,.blanco4,.blanco-1,.blanco-2,.empty1.empty2").removeClass("inputIncompleto");
    $(".vacio5").removeClass("cedulaExiste");
    $(".vacio2").removeClass("correoInvalido");
    $(".vacio2").removeClass("correoExiste");
    $(".vacio3").removeClass("noCoinciden");
    $(".vacio1").removeClass("usuarioExistente");
    $(".blank2").removeClass("cuentaInexistente");
    $(".empty2").removeClass("cuentaInexistente");
    $(".blanco3").removeClass("fechaInvalida");
}
function removerLimite() {
    if ($("#nombreUsuario").val().length >= 25) {
        $(".vacio1").addClass("numExcedido");
        return false;
    } else {
        $(".vacio1").removeClass("numExcedido");
        return true;
    }
}

$("#menu-close").click(function (e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});
$("#modalClausulas").modal({
    show: true
});
$("#input-textarea").hide();
function mostrarTextarea() {
    $("#input-textarea").show("slow");
}
function esconderTextarea() {
    $("#input-textarea").hide("slow");
}
function validarSolicitud() {
    $.ajax({
        url: "validarSolicitud.php",
        type: "POST",
        data: $("#formularioClausulas").serialize(),
        success: function (response) {
            if (response == "vacio1") {
                $("#select-cita").addClass("inputRojo");
                $(".blanco1").addClass("inputIncompleto");
                return false;
            } else if (response == "vacio2") {
                $("#select-numero").addClass("inputRojo");
                $(".blanco2").addClass("inputIncompleto");
                return false;
            } else {
                if (response == "vacio3") {
                    $("#select-fecha").addClass("inputRojo");
                    $(".blanco3").addClass("inputIncompleto");
                    return false;
                } else if (response == "invalido") {
                    $("#select-fecha").addClass("inputRojo");
                    $(".blanco3").addClass("fechaInvalida");
                    return false;
                } else {
                    if (response == "vacio4") {
                        $("#textarea-comentario").addClass("inputRojo");
                        $(".blanco4").addClass("inputIncompleto");
                        return false;
                    } else if(response == "listo"){
                        var c = confirm("¿Está seguro de los datos ingresados?");
                        if(c == true){
                            $("#formularioClausulas").submit();
                        } else if(c == false){
                            return false;
                        }
                    } else {
                        if(response == "listo2"){
                            var c2 = confirm("¿Está seguro de los datos ingresados?");
                            if(c2 == true){
                                $("#formularioClausulas").submit();
                            } else if(c2 == false){
                                return false;
                            }
                        }
                    }
                }
            }
        }
    });
}
function Calcular() {
    var cantidad = $("#select-numero option:selected").val();
    $param = {
        cantidad: cantidad
    };
    $.ajax({
        url: "validarCantidad.php",
        type: "POST",
        data: $param,
        success: function (response) {
            if (response == "nada") {
                $(".total").html("");
            } else if (response == "1.000") {
                $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
            } else {
                if (response == "2.000") {
                    $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                } else if (response == "3.000") {
                    $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                } else {
                    if (response == "4.000") {
                        $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                    } else if (response == "5.000") {
                        $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                    }
                }
            }
        }
    });
}
function validarSubida() {
    $("#formularioSubir").submit(function (e) {
        if ($("#nombreArchivo").val() == "") {
            $("#nombreArchivo").addClass("inputRojo");
            $(".blanco-1").addClass("inputIncompleto");
            return false;
            e.preventDefault();
        } else if ($("#archivoSubido").val() == "") {
            $("#archivoSubido").addClass("inputRojo");
            $(".blanco-2").addClass("inputIncompleto");
            return false;
            e.preventDefault();
        } else {
            e.submit();
        }
    });
}
function Editar(id) {
    $("#id").val(id);
    var nom = $("#" + id + "N").val();
    var correo = $("#" + id + "C").val();
    var cedula = $("#" + id + "c").val();
    var numero = $("#" + id + "n").val();
    var direccion = $("#" + id + "D").val();
    $("#nombre").val(nom);
    $("#correo").val(correo);
    $("#cedula").val(cedula);
    $("#numero").val(numero);
    $("#direccion").val(direccion);
}
function Edicion() {
    $.ajax({
        url: "editar.php",
        type: "POST",
        data: {
            id: $("#id").val(),
            nombre: $("#nombre").val(),
            correo: $("#correo").val(),
            cedula: $("#cedula").val(),
            numero: $("#numero").val(),
            direccion: $("#direccion").val()
        },
        success: function (data) {
            if (data == "Cambios realizados con éxito") {
                alert(data);
                self.location.reload();
            } else {
                if (data == "E-mail en uso") {
                    alert(data);
                }
            }
        }
    });
}
function Aprobar(id) {
    var id = id;
    var nombre = $("#" + id + "N").val();
    var servicio = $("#" + id + "S").val();
    var fecha = $("#" + id + "F").val();
    var estado = $("#" + id + "A").val();
    var comentario = $("#" + id + "D").val();
    $parametros = {
        id: id,
        nombre: nombre,
        servicio: servicio,
        fecha: fecha,
        estado: estado,
        comentario: comentario,
        estado_aprobado: "si"
    };
    $.ajax({
        url: "aprobarCita.php",
        type: "POST",
        data: $parametros,
        success: function (resp) {
            if (resp == "La cita ha sido aprobada con éxito") {
                alert(resp);
                self.location.reload();
            } else {
                alert(resp);
            }
        }
    });
}
$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'yy/mm/dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
function noExcursion(date){
    var day = date.getDay();
    return [(day != 5  && day != 6 && day != 0), ''];
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
    $("#select-fecha").datepicker({
        beforeShowDay: noExcursion
    });
});