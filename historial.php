<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
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
<body style="background: #e1e1e1">
<?php require_once('nav.php');?>
<?php
$query_historial = "SELECT * FROM citas";
$consulta = mysql_query($query_historial);
while($resultado = mysql_fetch_array($consulta)){
    $_SESSION['fecha-cita'] = $resultado['fecha'];
    $_SESSION['tipo-servicio'] = $resultado['servicio'];
    $_SESSION['comentario'] = $resultado['descripcion'];
    $_SESSION['numero-maquinas'] = $resultado['cantidad'];
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success panel-verde">
                <div class="panel-body">
                    <h6 class="text-center panel-margen panel-fondo">
                        Servicio Solicitado:
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center panel-text panel-margen  ">
                        <?php echo $_SESSION['tipo-servicio'];?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success panel-verde">
                <div class="panel-body">
                    <h6 class="text-center panel-fondo panel-margen">
                        Nº de máquinas a ser revisadas:
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center panel-text panel-margen  ">
                        <?php echo $_SESSION['numero-maquinas'];?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success panel-verde">
                <div class="panel-body">
                    <h6 class="text-center panel-fondo panel-margen">
                        Fecha de la cita:
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center panel-text panel-margen  ">
                        <?php echo $_SESSION['fecha-cita'];?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success panel-verde">
                <div class="panel-body">
                    <h6 class="text-center panel-fondo panel-margen">
                        Comentarios:
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center panel-text panel-margen  ">
                        <?php echo $_SESSION['comentario'];?>
                    </h5>
                </div>
            </div>
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