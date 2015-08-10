<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
if(!isset($_SESSION['id_usuario'])){
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
<body style="background: #ECF0F1">
<?php require_once('nav.php');?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron perfil-titulo">
                    <span class="fui-calendar calendario"></span>
                    <p class="text-center">Solicite una cita</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="text-center panel-text">¿Desea que lo atendamos?</h5>
                        <p class="text-justify">Solicite una cita para poder gozar de la realización de cualquiera de nuestros servicios, bien sea de Mantenimiento Preventivo o Correctivo.</p>
                        <button class="btn btn-danger btn-block" onclick="location.href='<?php echo 'solicitud.php?id=' . $_SESSION['id_usuario'];?>'">
                            Solicitar
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
                        Suba sus Transferencias
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center panel-text">
                            ¿Realizó los pagos requeridos?
                        </h4>
                        <p class="text-justify">Para la aprobación de la cita, debe adjuntar un scaneo, foto o versión digital del comprobante de pago (sólo trabajamos con transferencias electrónicas y depósitos bancarios).</p>
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
                        Consulte su historial
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center panel-text">
                            ¿Desea ver su histórico?
                        </h4>
                        <p class="text-justify">Este espacio le permite acceder a su historial de servicios contratados, el cual le permitirá llevar un control de reparaciones y agilizar el contacto con la empresa.</p>
                        <button class="btn btn-danger btn-block" onclick="location.href='<?php echo 'historial.php?id=' . $_SESSION['id_usuario']; ?>'">
                            Historial de Citas
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron perfil-titulo4">
                    <span class="fui-user"></span>
                    <p class="text-center">
                        Modifique su información
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center panel-text">
                            ¿Desea cambiar sus datos?
                        </h4>
                        <p class="text-justify">Este espacio le permite acceder a su información de usuario y cambiar los datos que prefiera para futuras operaciones en el sitio. Procure suministrar información fiable.</p>
                        <button class="btn btn-danger btn-block" onclick="location.href='<?php echo 'modificar.php?id=' . $_SESSION['id_usuario']; ?>'">
                            Modificar
                        </button>
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