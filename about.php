<?php
require_once('usuarios.php');
session_start();
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acerca de | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body style="background: #ecf0f1">
<?php include 'nav2.php'; ?>
<div class="jumbotron" style="background: #fff;">
    <div class="container">
        <h3 class="text-center">Moldes y Matrices C.A.</h3>

        <p class="panel-text text-center">
            Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum <a href="index.php" class="url">Moldes y
                Matrices</a>.
        </p>
    </div>
</div>

<?php
if (isset($_SESSION['id_usuario'])){
    ?>
    <div class="container" id="<?php echo 'm&v?id=' . $_SESSION['id_usuario'];?>"></div>
<?php } else { ?>
<div class="container" id="m&v">
    <?php } ?>
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-center">
                Nosotros
            </h4>

            <p class="justify texto-normal">
                Moldes y matrices 2014, C.A, fue creada el 13 de marzo del año 2014 por la idea de un empresario de
                reparar moldes y maquinarias dedicadas al moldeado por inyección y soplado de plástico para la
                fabricación de piezas plásticas, inicia sus operaciones en una oficina ubicada en la urbanización
                Piñonal, calle 25 galpón 23 en la ciudad de Maracay estado Aragua, cuyo principal servicio es la
                reparación de máquinas para la inyección y soplado de plástico
                Moldes y Matrices 2014, C.A persigue la efectividad al ofrecer sus servicios de mantenimientos, por ello
                cuenta con una flota amplia de técnicos, transporte y maquinaria para resolver los problemas que se
                presenten con las maquinas del cliente, realizando un servicio de calidad y satisfaciendo las
                necesidades del cliente.
            </p>
        </div>
        <div class="col-md-6">
            <h4 class="text-center">
                Nuestra misión
            </h4>

            <p class="justify texto-normal">
                Moldes y Matrices 2014, C.A tiene como misión abarcar el mercado nacional, minimizando el tiempo de
                respuesta, e incrementar el empleo en el área de reparación de máquinas de inyección y Soplado de
                plástico, colaborando con el desarrollo del mercado del plástico en el país.
            </p>
            <h4 class="text-center">Nuestra visión</h4>

            <p class="justify texto-normal">
                Moldes y Matrices 2014, C.A tiene como visión ser una de las organizaciones más competitivas en el
                sector del plástico, y colocarse como la primera empresa a nivel regional, estatal y nacional, que
                satisfaga las necesidades de sus clientes por medio de la más alta calidad de los servicios que ofrezca.
                Trabajar con recursos humanos del país, mejorar la calidad de vida de los empleados con buenos salarios,
                convertirse en una empresa sustentable con alcance en todo el territorio.
            </p>
        </div>
    </div>
</div>

<div class="jumbotron" style="background: #fff">
    <?php
    if (isset($_SESSION['id_usuario'])){
    ?>
    <div class="container" id="<?php echo 'servicios?id=' . $_SESSION['id_usuario'];?>">
        <?php } else { ?>
        <div class="container" id="servicios">
            <?php } ?>
            <h4 class="text-center">
                Servicios
            </h4>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-center panel-text">Mantenimiento Preventivo</h6>

                    <p class="text-center">
                        <span class="fui-search font-big"></span>
                    </p>

                    <p class="texto-normal text-center">
                        Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-center panel-text">Mantenimiento Correctivo</h6>

                    <p class="text-center">
                        <span class="fui-check font-big"></span>
                    </p>

                    <p class="texto-normal text-center">
                        Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['id_usuario'])){
    ?>
    <div class="container" id="<?php echo 'contacto?id=' . $_SESSION['id_usuario'];?>">
        <?php } else { ?>
        <div class="container" id="contacto">
            <?php } ?>
            <h4 class="text-center">Contáctanos</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu nombre"
                                           required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" placeholder="Escribe tu correo"
                                           required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Comentario:</label>
                                    <textarea type="text" class="form-control" name="" id="" rows="4"
                                              required="required" placeholder="Escribe tu comentario..."></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-danger">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('footer2.php'); ?>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/flat-ui.min.js"></script>
        <script src="app.js"></script>
</body>
</html>