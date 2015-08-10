<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
$permisos = $admin->Permisos('permisos');
if (!isset($_SESSION['admin'])){
    header('Location: index.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Panel de Administraci&oacute;n | Moldes y Matrices</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php require('nav2.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-6">
            <?php require_once('buscador.php'); ?>
        </div>
    </div>
</div>

<hr/>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row col-md-12 custyle">
                    <table class="table table-striped custab">
                        <thead>
                        <tr class="tabla-cabecera">
                            <th class="text-center">Seleccione fecha inicial</th>
                            <th class="text-center">Seleccione fecha final</th>
                            <th class="text-center">Acci&oacute;n</th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="text-center"><input type="text" class="form-control" id="fechaInicial"></td>
                            <td class="text-center"><input type="text" class="form-control" id="fechaFinal"></td>
                            <td class="text-center"><a href="javascript:void(0)" class="btn btn-md btn-success"
                                                       id="consultar">Consultar
                                    <span class="fui-search"></span></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row col-md-12">
        <span class="resultado"></span>
    </div>
</div>

<?php } ?>
<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script src="../app.js"></script>
<script>
    $("#consultar").on("click", function () {
        var inicio = $("#fechaInicial").val();
        var final = $("#fechaFinal").val();
        $parametros = {
            inicio: inicio,
            final: final
        };
        $.ajax({
            url: "calcularReporte.php",
            type: "POST",
            data: $parametros,
            success: function (resultado) {
                $(".resultado").html("<div class='panel panel-info'><div class='panel-heading text-center'><strong>Reporte de Ingresos</strong></div><div class='panel-body'><p><strong>" + resultado + "</strong></p></div></div>");
            }
        });
    });
</script>
</body>
</html>