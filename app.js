//Script que agrega fondo a la barra de navegacion cuando se baja el scroll
$(window).scroll(function () {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});
function Scroll() {
    $("html,body").animate({
        scrollTop: 0
    }, "slow");
    setTimeout(function () {
        $("#triggerModal").trigger("click");
    }, 500);
}
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
    $(".vacio4").removeClass("noCoinciden");
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
$(function () {
    $("#select-cita").change(function () {
        if ($(this).val() == "Mantenimiento Correctivo") {
            $("#input-textarea").slideToggle();
        } else if ($(this).val() == "Mantenimiento Preventivo") {
            $("#input-textarea").hide("slow");
        }
        if ($(this).val() !== "seleccione") {
            $(this).removeClass("inputRojo");
            $(".blanco1").removeClass("inputIncompleto");
        }
    });
    $("#select-numero").change(function () {
        if ($(this).val() !== "numero-maquinas") {
            $(this).removeClass("inputRojo");
            $(".blanco2").removeClass("inputIncompleto");
        }
    });
});
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
                    } else if (response == "listo") {
                        var c = confirm("¿Está seguro de los datos ingresados?");
                        if (c == true) {
                            $("#formularioClausulas").submit();
                        } else if (c == false) {
                            return false;
                        }
                    } else {
                        if (response == "listo2") {
                            var c2 = confirm("¿Está seguro de los datos ingresados?");
                            if (c2 == true) {
                                $("#formularioClausulas").submit();
                            } else if (c2 == false) {
                                return false;
                            }
                        }
                    }
                }
            }
        }
    });
    Calcular();
}
function Calcular() {
    var cantidad = $("#select-numero option:selected").val();
    var valorAPagar = $("#total").val();
    $param = {
        cantidad: cantidad,
        valor: valorAPagar
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
                $("#total").val(response);
            } else {
                if (response == "2.000") {
                    $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                    $("#total").val(response);
                } else if (response == "3.000") {
                    $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                    $("#total").val(response);
                } else {
                    if (response == "4.000") {
                        $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                        $("#total").val(response);
                    } else if (response == "5.000") {
                        $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                        $("#total").val(response);
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
    var empresa = $("#" + id + "E").val();
    var rif = $("#" + id + "R").val();
    $("#nombre").val(nom);
    $("#correo").val(correo);
    $("#cedula").val(cedula);
    $("#numero").val(numero);
    $("#direccion").val(direccion);
    $("#empresa").val(empresa);
    $("#rif").val(rif);
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
            direccion: $("#direccion").val(),
            empresa: $("#empresa").val(),
            rif: $("#rif").val()
        },
        success: function (data) {
            if (data == "Cambios realizados con éxito") {
                alert(data);
                self.location.reload();
            } else {
                alert(data);
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
    var cantidad = $("#" + id + "C").val();
    var valor = $("#" + id + "V").val();
    var transferencia = $("#" + id + "IMG").val();
    $parametros = {
        id: id,
        nombre: nombre,
        servicio: servicio,
        fecha: fecha,
        estado: estado,
        comentario: comentario,
        cantidad: cantidad,
        valor: valor,
        transferencia: transferencia,
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
function Negar(id) {
    var id = id;
    var nombre = $("#" + id + "N").val();
    var servicio = $("#" + id + "S").val();
    var fecha = $("#" + id + "F").val();
    var estado = $("#" + id + "A").val();
    var comentario = $("#" + id + "D").val();
    var maquinas = $("#" + id + "C").val();
    var precio = $("#" + id + "V").val();
    $parametros = {
        id: id,
        nombre: nombre,
        servicio: servicio,
        fecha: fecha,
        estado: estado,
        comentario: comentario,
        maquinas: maquinas,
        precio: precio
    };
    $.ajax({
        url: "Negar.php",
        type: "POST",
        data: $parametros,
        success: function (response) {
            if (response == "La cita ha sido negada con éxito") {
                alert(response);
                self.location.reload();
            } else {
                alert(response);
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
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
function noExcursion(date) {
    var day = date.getDay();
    return [(day != 0 && day != 5 && day != 6), ''];
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
    $("#select-fecha,#fechaModificable").datepicker({
        beforeShowDay: noExcursion
    });
});
function Eliminar(id, name) {
    $("#nom").html(name);
    $("#nombreUsuario").val(id);
}
function EliminarUsuario() {
    var id = $("#nombreUsuario").val();
    var nombre = $("#nom").val();
    $parametros = {
        id: id,
        nombre: nombre
    };
    $.ajax({
        url: "Eliminar.php",
        type: "POST",
        data: $parametros,
        success: function (resp) {
            alert("Usuario eliminado exitosamente");
            self.location.reload();
            return resp;
        }
    });
}
$(function () {
    $("#esconderBtn").click(function () {
        $("*#tablaAprobadas").hide('slow');
    });
    $("#mostrarBtn").click(function () {
        $("*#tablaAprobadas").show('slow');
    });
});
function EditarFecha(fecha, id) {
    $("#fechaModificable").val(fecha);
    $("#fechaEscondida").val(id);
}
function EdicionFecha() {
    var fecha = $("#fechaModificable").val();
    var id = $("#fechaEscondida").val();
    $params = {
        fecha: fecha,
        id: id
    };
    $.ajax({
        url: "editarFecha.php",
        type: "POST",
        data: $params,
        success: function (response) {
            if (response == "La fecha de la cita ha sido modificada exitosamente") {
                alert(response);
                self.location.reload();
            } else {
                alert(response);
            }
        }
    });
}
$(function () {
    $("#btnCrearAdmin").on("click", function () {
        $parametros = {
            id: $("#idAdmin").val(),
            nombre: $("#nombreAdmin").val(),
            contra: $("#contraAdmin").val(),
            tipo: $("#tipoAdmin option:selected").val()
        };
        $.ajax({
            url: "crearAdmin.php",
            type: "POST",
            data: $parametros,
            success: function (response) {
                if (response == "Ha creado un nuevo administrador exitosamente") {
                    alert(response);
                    self.location.reload();
                } else if (response == "Error") {
                    alert(response);
                }
            }
        });
    });
});
function EditarAdmin(id) {
    var id = id;
    var nombre = $("#" + id + "N").val();
    var clave = $("#" + id + "C").val();
    var tipo = $("#" + id + "T").val();
    $("#nombreModificable").val(nombre);
    $("#claveModificable").val(clave);
    $("#tipoModificable").val(tipo);
    $("#inputOculto").val(id);
}
function EdicionAdmin() {
    var id = $("#inputOculto").val();
    var nombre = $("#nombreModificable").val();
    var clave = $("#claveModificable").val();
    var tipo = $("#tipoModificable").val();
    $params = {
        id: id,
        nombre: nombre,
        clave: clave,
        tipo: tipo
    };
    $.ajax({
        url: "editarAdmins.php",
        type: "POST",
        data: $params,
        success: function (response) {
            if (response == "Los datos fueron modificados con éxito") {
                alert(response);
                self.location.reload();
            } else {
                alert(response);
            }
        }
    });
}
function EliminarAdmin(id, nombre) {
    $(".nombreAdmin").html(nombre);
    $("#Oculto").val(id);
}
function EliminacionAdmin() {
    var id = $("#Oculto").val();
    $param = {
        id: id
    };
    $.ajax({
        url: "eliminarAdmin.php",
        type: "POST",
        data: $param,
        success: function (response) {
            if (response == "El usuario ha sido eliminado con éxito") {
                alert(response);
                self.location.reload();
            } else {
                alert(response);
            }
        }
    });
}