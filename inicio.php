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
    <title>Inicio | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body style="background: #e1e1e1">
<?php require_once('nav.php');?>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron perfil-titulo">
                    <span class="fui-calendar"></span>
                    <p class="text-center">
                        Solicitar Cita
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center panel-text">
                            Lorem ipsum dolor
                        </h4>
                        <p class="text-justify">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                            Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                            Lorem ipsum dolor sit amec.</p>
                        <button class="btn btn-danger btn-block" onclick="location.href='<?php echo 'solicitud.php?id=' . $_SESSION['id_usuario'];?>'">
                            Solicitar Cita
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron perfil-titulo3">
                    <span class="fui-upload"></span>
                    <p class="text-center">
                        Subir Transferencias
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center panel-text">
                            Lorem ipsum dolor
                        </h4>
                        <p class="text-justify">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                            Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                            Lorem ipsum dolor sit amec.</p>
                        <button class="btn btn-danger btn-block" onclick="location.href='<?php echo 'subir.php?id=' . $_SESSION['id_usuario'];?>'">Subir Transferencias</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron perfil-titulo2">
                    <span class="fui-document"></span>
                    <p class="text-center">
                        Historial de Citas
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center panel-text">
                            Lorem ipsum dolor
                        </h4>
                        <p class="text-justify">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                            Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                            Lorem ipsum dolor sit amec.</p>
                        <button class="btn btn-danger btn-block">Historial de Citas</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php require_once('footer2.php');?>
<?php }?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="app.js"></script>
</body>
</html>