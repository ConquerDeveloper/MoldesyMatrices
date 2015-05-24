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
    ?>
    <?php
    $fecha = str_replace("/","-", $_POST['select-fecha']);
    $id_usuario = $_SESSION['id_usuario'];
    $cita = $_POST['select-cita'];
    $comentario = $_POST['select-comentario'];
    $usuario = $_SESSION['usuario'];
    $cedula = $_SESSION['cedula'];
    $rif = $_SESSION['rif'];
    $cantidad = $_POST['select-numero'];
    $direccion_usuario = $_SESSION['direccion'];
    $numero_usuario = $_SESSION['numero'];
    $query_1 = "INSERT INTO citas
            (id_cita, id_usuario,servicio,fecha,descripcion,nombre_usuario,cedula_usuario,rif_usuario,cantidad, aprobado,direccion,numero)
            VALUES('null','$id_usuario','$cita','$fecha','$comentario',
            '$usuario','$cedula','$rif','$cantidad','no','$direccion_usuario','$numero_usuario')";
    $query_2 = "INSERT INTO citas
            (id_cita, id_usuario,servicio,fecha,nombre_usuario,cedula_usuario,rif_usuario,cantidad, aprobado,direccion,numero)
            VALUES('null','$id_usuario','$cita','$fecha',
            '$usuario','$cedula','$rif','$cantidad','no','$direccion_usuario','$numero_usuario')";
    if($_POST['select-cita'] == 'mantenimientoc'){
        $consulta = mysql_query($query_1);
        /*if($consulta){
            ?>
            <script>
                setTimeout(function(){
                    window.location.href="<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>"
                }, 3000);
            </script>
            <?php
        }*/
    } else {
        if($_POST['select-cita'] == 'mantenimientop'){
            $consulta2 = mysql_query($query_2);
            /*if($consulta2){
            ?>
            <script>
                setTimeout(function(){
                    window.location.href="<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>"
                }, 3000);
            </script>
            <?php
            }*/
        }
    }
    ?>
<?php }?>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/flat-ui.min.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
    <script src="app.js"></script>
</body>
</html>