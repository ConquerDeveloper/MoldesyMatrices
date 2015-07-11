<?php
require_once('usuarios.php');
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
<?php
$contacto = new Contacto('nombreContacto', 'emailContacto', 'asuntoContacto', 'textoContacto');
$contacto->EnviarEmailContacto();
?>
<h4 class="text-center">El mensaje se envió a los administradores y será atendido en la brevedad posible</h4>




<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="app.js"></script>
<script>
    setTimeout(function(){
        location.href="index.php";
    }, 5000);
</script>
</body>
</html>