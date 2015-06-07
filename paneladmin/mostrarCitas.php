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
                        <tr>
                            <th>Nombre</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Comentario</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                        <div id="tabla">
                            <?php
                            $ad = $admin->TraerCitas($_GET['id']);
                            for($i=0; $i<sizeof($ad);$i++){
                                ?>
                                <tr>
                                    <td><a href="mostrarCitas.php"><?php echo $ad[$i]['nombre_usuario'];?></a><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>N" value="<?php echo $ad[$i]['nombre_usuario']; ?>"/></td>
                                    <td><?php echo $ad[$i]['servicio'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>S" value="<?php echo $ad[$i]['servicio']?>"/></td>
                                    <td><?php echo $ad[$i]['fecha'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>F" value="<?php echo $ad[$i]['fecha']?>"/></td>
                                    <td><?php echo $ad[$i]['aprobado'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>A" value="<?php echo $ad[$i]['aprobado']?>"/></td>
                                    <td><?php echo $ad[$i]['descripcion'];?><input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>D" value="<?php echo $ad[$i]['descripcion']?>"/></td>
                                    <td class="text-center">
                                        <a class='btn btn-info btn-xs' href="javascript:void(0)" onclick="var id = <?php echo $ad[$i]['id_usuario'];?>; Aprobar(id);">
                                            <span class="glyphicon glyphicon-edit"></span> Aprobar</a>
                                        <a href="#" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-remove"></span> Negar</a></td>
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


<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../app.js"></script>
<script>
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
        }
        $.ajax({
            url: "aprobarCita.php",
            type: "POST",
            data: $parametros,
            success: function(resp){
                if(resp == "La cita ha sido aprobada con éxito"){
                    alert(resp);
                    self.location.reload();
                } else {
                    alert(resp);
                }
            }
        });
    }
</script>
</body>
</html>