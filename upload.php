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
    <meta charset="utf-8"/>
    <title>Subido</title>
</head>
<body>
<?php
$subir = new Subir('nombreArchivo','archivoSubido');
$subir->Upload();
?>

<?php }?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="app.js"></script>
</body>
</html>
