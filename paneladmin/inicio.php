<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<?php require_once('nav2.php')?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading panel-primary">
                    <h1 class="panel-title text-center">
                        Bienvenido <?= $_SESSION['admin']; ?>
                    </h1>
                </div>
                <div class="panel-body">
                    <p class="panel-text text-center">
                        Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.
                        Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="container">
                    <div class="row col-md-12 custyle">
                        <table class="table table-striped custab">
                            <thead>
                            <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b>Agregar nuevo usuario</a>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Cédula</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <div id="tabla">
                                <?php
                                $ad = $admin->TraerUsuarios();
                                for($i=0; $i<sizeof($ad);$i++){
                                ?>
                                <tr>
                                    <td class="<?php echo $ad[$i]['id_usuario']?>N"><?php echo $ad[$i]['nombre_usuario'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>N" value="<?php echo $ad[$i]['nombre_usuario']; ?>"/></td>
                                    <td class="<?php echo $ad[$i]['id_usuario']?>C"><?php echo $ad[$i]['correo_usuario'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>C" value="<?php echo $ad[$i]['correo_usuario']?>"/></td>
                                    <td class="<?php echo $ad[$i]['id_usuario']?>c"><?php echo $ad[$i]['cedula_usuario'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>c" value="<?php echo $ad[$i]['cedula_usuario']?>"/></td>
                                    <td class="<?php echo $ad[$i]['id_usuario']?>n"><?php echo $ad[$i]['numero'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>n" value="<?php echo $ad[$i]['numero']?>"/></td>
                                    <td class="<?php echo $ad[$i]['id_usuario']?>D"><?php echo $ad[$i]['direccion'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>D" value="<?php echo $ad[$i]['direccion']?>"/></td>
                                    <td class="text-center">
                                        <a class='btn btn-info btn-xs' href="javascript:void(0)" data-toggle="modal" data-target="#modalEdicion" onclick="var id = <?php echo $ad[$i]['id_usuario'];?>; Editar(id);">
                                            <span class="glyphicon glyphicon-edit"></span> Editar</a>
                                        <a href="#" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-remove"></span> Borrar</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </div>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>








<!--Modal de edicion de usuarios-->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id"/>
            </div>
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" class="form-control" id="nombre"/>
            </div>
            <div class="form-group">
                <label for="">Correo Electrónico</label>
                <input type="text" class="form-control" id="correo"/>
            </div>
            <div class="form-group">
                <label for="">Cédula</label>
                <input type="text" class="form-control" id="cedula"/>
            </div>
            <div class="form-group">
                <label for="">Teléfono</label>
                <input type="text" class="form-control" id="numero"/>
            </div>
            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control" id="direccion"/>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="Edicion()">Guardar</button>
        </div>
    </div>
</div>
</div>














<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../app.js"></script>
<script>
    function Editar(id){
        $("#id").val(id);
        var nom = $("#"+id+"N").val();
        var correo = $("#"+id+"C").val();
        var cedula = $("#"+id+"c").val();
        var numero = $("#"+id+"n").val();
        var direccion = $("#"+id+"D").val();
        $("#nombre").val(nom);
        $("#correo").val(correo);
        $("#cedula").val(cedula);
        $("#numero").val(numero);
        $("#direccion").val(direccion);
    }
    function Edicion(){
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
            success: function(data){
                var id = $("#id").val();
                //$("."+id+"N").append(" ");
                $("."+id+"N").html($("#nombre").val());
                $("."+id+"C").html($("#correo").val());
            }
        });
    }
</script>
</body>
</html>
