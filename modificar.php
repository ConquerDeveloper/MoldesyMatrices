<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
$modificar = new Modificar;
if (!isset($_SESSION['id_usuario'])){
    header('Location: index.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php require_once('nav.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-left">
                <span class="fui-new"></span> Modifica tu información
            </h5>
        </div>
        <hr/>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped custab">
                <thead>
                <tr class="tabla-cabecera2">
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Contraseña</th>
                    <th class="text-center">Cédula</th>
                    <th class="text-center">Empresa</th>
                    <th class="text-center">RIF</th>
                    <th class="text-center">Dirección</th>
                    <th class="text-center">Número</th>
                    <th class="text-center">Acción</th>
                </tr>
                </thead>
                <tr>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('nombre_usuario');?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('correo_usuario'); ?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('contra_usuario'); ?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('cedula_usuario'); ?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('empresa_usuario'); ?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('rif_usuario'); ?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('direccion'); ?>
                    </td>
                    <td class="text-center">
                        <?php echo $modificar->TraerDatosUsuario('numero'); ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEdit"
                            onclick="var id='<?php echo $modificar->TraerDatosUsuario('id_usuario');?>';
                                var nombre ='<?php echo $modificar->TraerDatosUsuario('nombre_usuario');?>';
                                var correo ='<?php echo $modificar->TraerDatosUsuario('correo_usuario');?>';
                                var contra ='<?php echo $modificar->TraerDatosUsuario('contra_usuario')?>';
                                var cedula ='<?php echo $modificar->TraerDatosUsuario('cedula_usuario');?>';
                                var empresa ='<?php echo $modificar->TraerDatosUsuario('empresa_usuario')?>';
                                var rif ='<?php echo $modificar->TraerDatosUsuario('rif_usuario')?>';
                                var direccion ='<?php echo $modificar->TraerDatosUsuario('direccion')?>';
                                var numero ='<?php echo $modificar->TraerDatosUsuario('numero');?>';
                                Modificar(id, nombre, correo, contra, cedula, empresa, rif, direccion, numero)">
                            <span class="fui-new"></span> Editar
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Modifica tus datos</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" id="nombreEditable"/>
                    <input type="hidden" id="idOculto"/>
                </div>
                <div class="form-group">
                    <label for="">Correo electrónico</label>
                    <input type="text" class="form-control" id="correoEditable"/>
                </div>
                <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input type="text" class="form-control" id="contraEditable"/>
                </div>
                <div class="form-group">
                    <label for="">Cédula:</label>
                    <input type="text" class="form-control" id="cedulaEditable"/>
                </div>
                <div class="form-group">
                    <label for="">Empresa:</label>
                    <input type="text" class="form-control" id="empresaEditable"/>
                </div>
                <div class="form-group">
                    <label for="">Rif:</label>
                    <input type="text" class="form-control" id="rifEditable"/>
                </div>
                <div class="form-group">
                    <label for="">Dirección:</label>
                    <input type="text" class="form-control" id="direccionEditable"/>
                </div>
                <div class="form-group">
                    <label for="">Número:</label>
                    <input type="text" class="form-control" id="numeroEditable"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="Modificacion()" class="btn btn-success btn-lg">Guardar</button>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer2.php') ?>
<?php } ?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="app.js"></script>
<script>
    function Modificar(id, nombre, correo, contra, cedula, empresa, rif, direccion, numero){
        $("#idOculto").val(id);
        $("#nombreEditable").val(nombre);
        $("#correoEditable").val(correo);
        $("#contraEditable").val(contra);
        $("#cedulaEditable").val(cedula);
        $("#empresaEditable").val(empresa);
        $("#rifEditable").val(rif);
        $("#direccionEditable").val(direccion);
        $("#numeroEditable").val(numero);
    }
    function Modificacion(){
        var id = $("#idOculto").val();
        var nombre = $("#nombreEditable").val();
        var correo = $("#correoEditable").val();
        var contra = $("#contraEditable").val();
        var cedula = $("#cedulaEditable").val();
        var empresa = $("#empresaEditable").val();
        var rif = $("#rifEditable").val();
        var direccion = $("#direccionEditable").val();
        var numero = $("#numeroEditable").val();
        $parametros = {
            id: id,
            nombre: nombre,
            correo: correo,
            contra: contra,
            cedula: cedula,
            empresa: empresa,
            rif: rif,
            direccion: direccion,
            numero: numero
        };
        $.ajax({
            url: "ModificarUsuario.php",
            type: "POST",
            data: $parametros,
            success: function(response){
                if(response == "Los datos fueron modificados con éxito"){
                    alert(response);
                    self.location.reload();
                } else {
                    alert(response);
                }
            }
        });
    }
</script>
</body>
</html>