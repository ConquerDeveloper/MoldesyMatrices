<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
if(isset($_SESSION['usuario'])){
    header('Location: inicio.php?id=' . $_SESSION['id_usuario']);
} else {
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Ayuda | Moldes y Matrices</title>
        <meta charset="utf-8"/>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/flat-ui.min.css"/>
        <link rel="stylesheet" href="stylesheet.css"/>
    </head>
    <body style="background: #ECF0F1">
    <?php require_once('nav2.php')?>
    <div class="jumbotron" style="background: #fff;">
        <div class="container">
            <h3 class="text-center">Manual del usuario</h3>

            <p class="panel-text text-center">
                Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum <a href="index.php" class="url">Moldes y
                    Matrices</a>.
            </p>
        </div>
    </div>
    <div class="container" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center">¿Necesitas ayuda?</h5>
                <p class="text-justify">
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum.
                </p>
                <hr/>
                <div class="text-center">
                    <a class="btn btn-md btn-danger" href="download.php?file=manual.pdf">Descargar Manual <span class="fui-bookmark"></span></a>
                </div>
            </div>
        </div>
    </div>





    <?php require_once('footer2.php');?>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/flat-ui.min.js"></script>
    <script src="app.js"></script>
    </body>
<?php }?>