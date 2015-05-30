//Script que agrega fondo a la barra de navegacion cuando se baja el scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});
$("#modalRegistro, #modalInicio").on("shown.bs.modal", function(){
    $("#nombreUsuario,#nombreInicio").focus();
});
//funcion que valida con ajax todos los campos del form de registro al hacer click en el boton de envio
function validarRegistro(){
    $.ajax({
        url: "validarRegistro.php",
        type: "post",
        data: $("#formularioRegistro").serialize(),
        success: function(respuesta){
            if(respuesta == "Incompleto"){
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
            }else if(respuesta == "Incompleto2"){
                $("#nombreUsuario").addClass("inputRojo");
                $(".vacio1").addClass("inputIncompleto");
                return false;
            } else {
                if(respuesta == "Incompleto3"){
                    $("#correoUsuario").addClass("inputRojo");
                    $(".vacio2").addClass("inputIncompleto");
                    return false;
                }else if(respuesta == "Incompleto4"){
                    $("#passUsuario").addClass("inputRojo");
                    $(".vacio3").addClass("inputIncompleto");
                    return false;
                } else {
                    if(respuesta == "Incompleto5"){
                        $("#rptpassUsuario").addClass("inputRojo");
                        $(".vacio4").addClass("inputIncompleto");
                        return false;
                    } else if(respuesta == "Incompleto6"){
                        $("#cedulaUsuario").addClass("inputRojo");
                        $(".vacio5").addClass("inputIncompleto");
                        return false;
                    } else {
                        if(respuesta == "Incompleto7"){
                            $("#empresaUsuario").addClass("inputRojo");
                            $(".vacio6").addClass("inputIncompleto");
                            return false;
                        } else if(respuesta == "Incompleto8"){
                            $("#rifUsuario").addClass("inputRojo");
                            $(".vacio7").addClass("inputIncompleto");
                            return false;
                        } else {
                            if(respuesta == "nombreExistente"){
                                $(".vacio1").addClass("usuarioExistente");
                                return false;
                            } else if(respuesta == "correoExistente"){
                                $(".vacio2").addClass("correoExiste");
                                return false;
                            }else {
                                if(respuesta == "correoFalso"){
                                    $(".vacio2").addClass("correoInvalido");
                                    return false;
                                }else if(respuesta == "noCoinciden"){
                                    $(".vacio4").addClass("noCoinciden");
                                    return false;
                                } else {
                                    if(respuesta == "cedulaExistente"){
                                        $(".vacio5").addClass("cedulaExiste");
                                        return false;
                                    } else if(respuesta == "Incompleto9"){
                                        $("#direccionUsuario").addClass("inputRojo");
                                        $(".vacio8").addClass("inputIncompleto");
                                        return false;
                                    } else {
                                        if(respuesta == "Incompleto10"){
                                            $("#numeroUsuario").addClass("inputRojo");
                                            $(".vacio9").addClass("inputIncompleto");
                                            return false;
                                        } $("#formularioRegistro").submit();
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
function validarInicio(){
    $.ajax({
        type: "post",
        url: "validarInicio.php",
        data: $("#formularioInicio").serialize(),
        success: function(response){
            if(response == "Incompleto"){
                $("#nombreInicio,#passInicio").addClass("inputRojo");
                $(".blank1,.blank2").addClass("inputIncompleto");
                return false;
            } else if(response == "Incompleto2"){
                $("#nombreInicio").addClass("inputRojo");
                $(".blank1").addClass("inputIncompleto");
                return false;
            } else {
                if(response == "Incompleto3"){
                    $("#passInicio").addClass("inputRojo");
                    $(".blank2").addClass("inputIncompleto");
                    return false;
                } else if(response == "cuentaInexistente"){
                    $(".blank2").addClass("cuentaInexistente");
                    return false;
                } $("#formularioInicio").submit();
            }
        }
    });
}

//Funciones que remueven todos los estilos y mensajes de las validaciones del form de registro
function removerClases(){
    $("#nombreUsuario, #correoUsuario, #passUsuario, #rptpassUsuario, #cedulaUsuario, #empresaUsuario, #rifUsuario,#nombreInicio,#passInicio,#select-fecha,#select-cita,#textarea-comentario,#select-numero,#direccionUsuario,#numeroUsuario,#nombreArchivo,#archivoSubido").removeClass("inputRojo");
    $(".vacio1, .vacio2, .vacio3, .vacio4, .vacio5, .vacio6, .vacio7,.vacio8,.vacio9,.blank1,.blank2,.blanco1,.blanco2,.blanco3,.blanco4,.blanco-1,.blanco-2").removeClass("inputIncompleto");
    $(".vacio5").removeClass("cedulaExiste");
    $(".vacio2").removeClass("correoInvalido");
    $(".vacio2").removeClass("correoExiste");
    $(".vacio3").removeClass("noCoinciden");
    $(".vacio1").removeClass("usuarioExistente");
    $(".blank2").removeClass("cuentaInexistente");
}
function removerLimite(){
    if($("#nombreUsuario").val().length >= 25){
        $(".vacio1").addClass("numExcedido");
        return false;
    } else {
        $(".vacio1").removeClass("numExcedido");
        return true;
    }
}

$("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});

// Opens the sidebar menu
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});
$("#modalClausulas").modal({
        show: true
    });
$("#input-textarea").hide();
function mostrarTextarea(){
    $("#input-textarea").show("slow");
}
function esconderTextarea(){
    $("#input-textarea").hide("slow");
}
function validarSolicitud(){
    if($("#select-cita").val() == "seleccione"){
        $(".blanco1").addClass("inputIncompleto");
        $("#select-cita").addClass("inputRojo");
        return false;
    }
    if($("#select-numero").val() == "numero-maquinas"){
        $(".blanco2").addClass("inputIncompleto");
        $("#select-numero").addClass("inputRojo");
        return false;
    }
    if($("#select-fecha").val() == ""){
        $(".blanco3").addClass("inputIncompleto");
        $("#select-fecha").addClass("inputRojo");
        return false;
    }
    if($("#select-cita option:selected").val() == "Mantenimiento Correctivo"){
        if($("#textarea-comentario").val() == ""){
            $("#textarea-comentario").addClass("inputRojo");
            $(".blanco4").addClass("inputIncompleto");
            return false;
        }
    }
    var c = confirm("¿Está seguro de los datos ingresados?");
    if(c == false){
        $("#formularioClausulas").preventDefault();
    } else {
        $("#formularioClausulas").submit();
    }
}
function Calcular(){
    var num;
    $("#select-numero").each(function(){
        if($("#select-numero option:selected").val() == "numero-maquinas"){
            $(".total").html(" ");
            return false;
        }
        if($("#select-numero option:selected").val() == "1"){
            num = 1000;
            $(".total").html("Total a pagar: " + num + " Bs.F").css("color","#34495e");
        }
        if($("#select-numero option:selected").val() == "2") {
            num = 2000;
            $(".total").html("Total a pagar: " + num + " Bs.F").css("color","#34495e");
        }
        if($("#select-numero option:selected").val() == "3") {
            num = 3000;
            $(".total").html("Total a pagar: " + num + " Bs.F").css("color","#34495e");
        }
        if($("#select-numero option:selected").val() == "4") {
            num = 4000;
            $(".total").html("Total a pagar: " + num + " Bs.F").css("color","#34495e");
        }
        if($("#select-numero option:selected").val() == "5") {
            num = 5000;
            $(".total").html("Total a pagar: " + num + " Bs.F").css("color","#34495e");
        }
    });
}
function validarSubida(){
    $("#formularioSubir").submit(function(e){
        if($("#nombreArchivo").val() == "" ){
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
