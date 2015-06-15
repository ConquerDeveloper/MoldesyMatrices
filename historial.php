<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
$historial = new Historial;
if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Historial de Citas | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body style="background:#ECF0F1">
<?php require_once('nav.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $historia = $historial->TraerHistorial();
            for($i = 0; $i < sizeof($historia); $i ++){
            ?>
            <table class="table table-striped custab">
                <thead>
                <tr class="tabla-cabecera">
                    <th class="text-center">Servicio</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Reparación</th>
                </tr>
                </thead>
                <tr>
                    <td class="text-center">
                        <?php echo $historia[$i]['servicio'];?>
                    </td>
                    <td class="text-center">
                        <?php echo $historia[$i]['fecha'];?>
                    </td>
                    <td class="text-center">
                        <?php echo $historia[$i]['descripcion'];?>
                    </td>
                    <td class="text-center">
                        <?php echo $historia[$i]['cantidad'];?>
                    </td>
                    <td class="text-center">
                        <?php echo $historia[$i]['valor'];?>
                    </td>
                    <td class="text-center">
                        <?php echo $historia[$i]['reparacion'];?>
                    </td>
                </tr>
            </table>
            <?php }?>
        </div>
    </div>
</div>


<?php }?>
<?php require_once('footer2.php');?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="app.js"></script>
</body>
</html>