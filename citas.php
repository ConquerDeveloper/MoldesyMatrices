<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
if (!isset($_SESSION['usuario'])){
    header('Location: index.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Citas | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<?php
require_once('vista-cita.php');

$destinatario = 'thedanielpsx@gmail.com';
$asunto = 'Solicitud de cita';
$cuerpo = '
        <html>
        <head>
           <title>Solicitud de cita</title>
        </head>
        <body>
        <font face="Open Sans, Helvetica, sans-serif">
        <font color="#d64242"><h1>Solicitud de cita</h1></font>
        <font color="#636363">
        <p>
        Estimado administrador, ha recibido este correo para informarle que el usuario ' . $_SESSION['usuario'] . '
        ha solicitado una cita para el d&iacute;a ' . $_POST['select-fecha'] . ' y se encuentra en espera de su respuesta.
        </p>
        <p>
        Tipo de cita: ' . $_POST['select-cita'] . '
        </p>
        <p>
        Cantidad de máquinas: ' . $_POST['select-numero'] . '
        </p>
        <p>
        Cuota: ' . $_POST['valor'] . ' Bs.F
        </p>
        <p>
       Comentarios: ' . $_POST['select-comentario'] .'
        </p>
        </font>
        <button style="background: #d64242; border-radius: 3px; border: 2px solid #d64242; height: 50px; width: 100px;">
        <font face="Open Sans, Helvetica, sans-serif">
        <a href="http://localhost/daniel/paneladmin/index.php" target="_blank" style="color: #fff; text-decoration: none; font-weight: bold;">Ver solicitud</a>
        </font>
        </button>
        </body>
        </html>
        ';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Daniel Da Costa <thedanielpsx@gmail.com>\r\n";
$headers .= "Reply-To: thedanielpsx@gmail.com\r\n";
mail($destinatario, $asunto, $cuerpo, $headers);


$fecha = str_replace("/", "-", $_POST['select-fecha']);
$id_usuario = $_SESSION['id_usuario'];
$cita = $_POST['select-cita'];
$comentario = $_POST['select-comentario'];
$usuario = $_SESSION['usuario'];
$cedula = $_SESSION['cedula'];
$rif = $_SESSION['rif'];
$cantidad = $_POST['select-numero'];
$direccion_usuario = $_SESSION['direccion'];
$numero_usuario = $_SESSION['numero'];
$valor = $_POST['valor'];
$query_1 = "INSERT INTO citas
            (id_cita, id_usuario,servicio,fecha,descripcion,nombre_usuario,cedula_usuario,rif_usuario,cantidad, aprobado,direccion,numero,valor)
            VALUES('null','$id_usuario','$cita','$fecha','$comentario',
            '$usuario','$cedula','$rif','$cantidad','no','$direccion_usuario','$numero_usuario','$valor')";

$query1 = "INSERT INTO citas_nuevas
            (id_nueva, id_usuario,servicio,fecha,descripcion,nombre_usuario,cedula_usuario,rif_usuario,cantidad, aprobado,direccion,numero,valor, hora, tiempo)
            VALUES('null','$id_usuario','$cita','$fecha','$comentario',
            '$usuario','$cedula','$rif','$cantidad','no','$direccion_usuario','$numero_usuario','$valor', now(), now())";

$query_2 = "INSERT INTO citas
            (id_cita, id_usuario,servicio,fecha,nombre_usuario,cedula_usuario,rif_usuario,cantidad, aprobado,direccion,numero,valor)
            VALUES('null','$id_usuario','$cita','$fecha',
            '$usuario','$cedula','$rif','$cantidad','no','$direccion_usuario','$numero_usuario','$valor')";

$query2 = "INSERT INTO citas_nuevas
            (id_nueva, id_usuario,servicio,fecha,nombre_usuario,cedula_usuario,rif_usuario,cantidad, aprobado,direccion,numero,valor, hora, tiempo)
            VALUES('null','$id_usuario','$cita','$fecha',
            '$usuario','$cedula','$rif','$cantidad','no','$direccion_usuario','$numero_usuario','$valor', now(), now())";

if ($_POST['select-cita'] == 'Mantenimiento Correctivo') {
    mysql_query($query_1);
    mysql_query($query1);
} else {
    if ($_POST['select-cita'] == 'Mantenimiento Preventivo') {
        mysql_query($query_2);
        mysql_query($query2);
    }
}





 } ?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="app.js"></script>
</body>
</html>