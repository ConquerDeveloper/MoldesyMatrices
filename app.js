//Script que agrega fondo a la barra de navegacion cuando se baja el scroll
$(window).scroll(function () {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});


$(".modal").on("hidden.bs.modal", function () {
    $(this).find("form")[0].reset();
    $(".form-group").removeClass("has-error has-feedback");
    $(".label").removeClass("label-danger").html("");
});


$(function () {
    $("#nombreUsuario").on("keyup", function () {
        if ($(this).val().length == 10) {
            $(".group-1").addClass("has-error has-feedback");
            $(".label-1").addClass("label-danger").html("Ha excedido el límite de caracteres (10)");
        }
    });
});

$(function () {
    $(".form-group").on("keydown", function () {
        $(this).removeClass("has-error has-feedback");
        $(".label").removeClass("label-danger").html("");
    });
});

$(function () {
    $("#formularioClausulas").find(".form-control").on("click", function () {
        $(".form-group").removeClass("has-error has-feedback");
        $(".label").removeClass("label-danger").html("");
    });
});

function Scroll() {
    $("html,body").animate({
        scrollTop: 0
    }, "slow");
    setTimeout(function () {
        $("#triggerModal").trigger("click");
    }, 500);
}
$(function () {
    $(".modal").on("shown.bs.modal", function () {
        $(this).find(".form-control")[0].focus();
    });
});
$(function () {
    $("#formularioSubir").find(".group-2").on("click", function () {
        $(".group-2").removeClass("has-error has-feedback");
        $(".label-2").removeClass("label-danger").html("");
    });
    $(this).find(".group-2").on("keyup", function () {
        $(".group-1").removeClass("has-error has-feedback");
        $(".label-1").removeClass("label-danger").html("");
    });
});
//funcion que valida con ajax todos los campos del form de registro al hacer click en el boton de envio
function validarRegistro() {
    $.ajax({
        url: "validarRegistro.php",
        type: "post",
        data: $("#formularioRegistro").serialize(),
        success: function (respuesta) {
            if (respuesta == "Incompleto") {
                $(".form-group").addClass("has-error has-feedback");
                $(".label").addClass("label-danger").html("Complete este campo");
                return false;
            } else if (respuesta == "Incompleto2") {
                $(".group-1").addClass("has-error has-feedback");
                $(".label-1").addClass("label-danger").html("Complete este campo");
                return false;
            } else {
                if (respuesta == "Incompleto3") {
                    $(".group-2").addClass("has-error has-feedback");
                    $(".label-2").addClass("label-danger").html("Complete este campo");
                    return false;
                } else if (respuesta == "Incompleto4") {
                    $(".group-3").addClass("has-error has-feedback");
                    $(".label-3").addClass("label-danger").html("Complete este campo");
                    return false;
                } else {
                    if (respuesta == "Incompleto5") {
                        $(".group-4").addClass("has-error has-feedback");
                        $(".label-4").addClass("label-danger").html("Complete este campo");
                        return false;
                    } else if (respuesta == "Incompleto6") {
                        $(".group-5").addClass("has-error has-feedback");
                        $(".label-5").addClass("label-danger").html("Complete este campo");
                        return false;
                    } else {
                        if (respuesta == "Incompleto7") {
                            $(".group-6").addClass("has-error has-feedback");
                            $(".label-6").addClass("label-danger").html("Complete este campo");
                            return false;
                        } else if (respuesta == "Incompleto8") {
                            $(".group-7").addClass("has-error has-feedback");
                            $(".label-7").addClass("label-danger").html("Complete este campo");
                            return false;
                        } else {
                            if (respuesta == "nombreExistente") {
                                $(".group-1").addClass("has-error has-feedback");
                                $(".label-1").addClass("label-danger").html("Nombre de usuario en uso");
                                return false;
                            } else if (respuesta == "correoExistente") {
                                $(".group-2").addClass("has-error has-feedback");
                                $(".label-2").addClass("label-danger").html("Correo en uso");
                                return false;
                            } else {
                                if (respuesta == "correoFalso") {
                                    $(".group-2").addClass("has-error has-feedback");
                                    $(".label-2").addClass("label-danger").html("Correo inválido");
                                    return false;
                                } else if (respuesta == "noCoinciden") {
                                    $(".group-3").addClass("has-error has-feedback");
                                    $(".group-4").addClass("has-error has-feedback");
                                    $(".label-3").addClass("label-danger").html("Las contraseñas no coinciden");
                                    $(".label-4").addClass("label-danger").html("Las contraseñas no coinciden");
                                    return false;
                                } else {
                                    if (respuesta == "cedulaExistente") {
                                        $(".group-5").addClass("has-error has-feedback");
                                        $(".label-5").addClass("label-danger").html("N° de cédula en uso");
                                        return false;
                                    } else if (respuesta == "Incompleto9") {
                                        $(".group-8").addClass("has-error has-feedback");
                                        $(".label-8").addClass("label-danger").html("Complete este campo");
                                        return false;
                                    } else {
                                        if (respuesta == "Incompleto10") {
                                            $(".group-9").addClass("has-error has-feedback");
                                            $(".label-9").addClass("label-danger").html("Complete este campo");
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
                $(".form-group").addClass("has-error has-feedback");
                $(".label").addClass("label-danger").html("Complete este campo");
                return false;
            } else if (response == "Incompleto2") {
                $(".group-1").addClass("has-error has-feedback");
                $(".label-1").addClass("label-danger").html("Complete este campo");
                return false;
            } else {
                if (response == "Incompleto3") {
                    $(".group-2").addClass("has-error has-feedback");
                    $(".label-2").addClass("label-danger").html("Complete este campo");
                    return false;
                } else if (response == "cuentaInexistente") {
                    $(".form-group").addClass("has-error has-feedback");
                    $(".label").addClass("label-danger").html("Combinación de usuario y contraseña incorrectos");
                    return false;
                }
                $("#formularioInicio").submit();
            }
        }
    });
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
                $(".group-1").addClass("has-error has-feedback");
                $(".label-1").addClass("label-danger").html("Seleccione una cita");
                return false;
            } else if (response == "vacio2") {
                $(".group-2").addClass("has-error has-feedback");
                $(".label-2").addClass("label-danger").html("Seleccione el n° de máquinas");
                return false;
            } else {
                if (response == "vacio3") {
                    $(".group-3").addClass("has-error has-feedback");
                    $(".label-3").addClass("label-danger").html("Seleccione una fecha");
                    return false;
                } else if (response == "invalido") {
                    $(".group-3").addClass("has-error has-feedback");
                    $(".label-3").addClass("label-danger").html("Asegúrate de ingresar una fecha que no sea el día actual o anterior a este");
                    return false;
                } else {
                    if (response == "vacio4") {
                        $(".group-4").addClass("has-error has-feedback");
                        $(".label-4").addClass("label-danger").html("Describa su falla");
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
            } else if (response == "1000") {
                $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                $("#total").val(response);
            } else {
                if (response == "2000") {
                    $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                    $("#total").val(response);
                } else if (response == "3000") {
                    $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                    $("#total").val(response);
                } else {
                    if (response == "4000") {
                        $(".total").html("Total a Pagar: " + response + " Bs.F").css("color", "#363636");
                        $("#total").val(response);
                    } else if (response == "5000") {
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
            $(".group-1").addClass("has-error has-feedback");
            $(".label-1").addClass("label-danger").html("Complete este campo");
            return false;
            e.preventDefault();
        } else if ($("#archivoSubido").val() == "") {
            $(".group-2").addClass("has-error has-feedback");
            $(".label-2").addClass("label-danger").html("Seleccione una imagen");
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
    $("#select-fecha,#fechaModificable,#fechaInicial,#fechaFinal").datepicker({
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
$(".imagen").colorbox({rel: 'imagen', width: '90%', height: '90%'});
function Reparacion(id) {
    $("#reparacionHidden").val(id);
}
function Reparar() {
    var reparacion = $("#reparacionHidden").val();
    var texto = $("#text-area-reparacion").val();
    $params = {
        reparacion: reparacion,
        texto: texto
    };
    $.ajax({
        url: "reparacion.php",
        type: "POST",
        data: $params,
        success: function (response) {
            if (response == "La reparación se insertó exitosamente") {
                alert(response);
                self.location.reload();
            } else {
                alert(response);
            }
        }
    });
}
function verReparacion(id, nombre, servicio, fecha, descripcion, cantidad, valor, reparacion) {
    $("#nombreReparacion").val(nombre);
    $("#servicioReparacion").val(servicio);
    $("#fechaReparacion").val(fecha);
    $("#comentarioReparacion").val(descripcion);
    $("#maquinasReparacion").val(cantidad);
    $("#precioReparacion").val(valor);
    $("#reparacion").val(reparacion);
}