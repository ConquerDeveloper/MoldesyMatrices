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
    <title>Inicio | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<main>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">
                </span> <span class="light">Moldes y</span> Matrices
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#" data-toggle="modal" data-target="#modalInicio">Inicia sesión</a>
                </li>
                <li>
                    <a class="page-scroll" href="#" data-toggle="modal" data-target="#modalRegistro">Regístrate</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</main>

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
        <li data-target="#bs-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="hero">
                <hgroup>
                    <h1>Lorem Ipsum</h1>
                    <h3>Lorem ipsum dolor sit amec.</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" data-toggle="modal" data-target="#modalRegistro" role="button">Empezar</button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2"></div>
            <div class="hero">
                <hgroup>
                    <h1>Lorem Ipsum</h1>
                    <h3>Lorem ipsum dolor sit amec.</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" role="button">Ver más</button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3"></div>
            <div class="hero">
                <hgroup>
                    <h1>Lorem Ipsum</h1>
                    <h3>Lorem ipsum dolor sit amec.</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" role="button">Ver más</button>
            </div>
        </div>
    </div>

    <!--Seccion de Saber Mas-->
    <section id="seccion-tile">
        <div class="seccion-tile">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tile">
                            <figure>
                                <img src="img/icons/svg/map.svg" class="tile-image" alt="Retina">
                            </figure>
                            <h3 class="tile-title">Lorem Ipsum Dolor</h3>
                            <p class="text-center">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                                Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tile">
                            <figure>
                                <img src="img/icons/svg/clocks.svg" class="tile-image" alt="Retina">
                            </figure>
                            <h3 class="tile-title">Lorem Ipsum Dolor</h3>
                            <p class="text-center">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                                Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tile">
                            <figure>
                                <img src="img/icons/svg/compas.svg" class="tile-image" alt="Retina">
                            </figure>
                            <h3 class="tile-title">Lorem Ipsum Dolor</h3>
                            <p class="text-center">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                                Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!--Seccion de ver más-->
<section id="seccion2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img/icons/svg/calendar.svg" class="img-responsive" alt="Calendar">
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Lorem Ipsum Dolor</h3>
                <p class="text-justify">lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec </p>
                <button class="btn btn-danger" href="javascript:void(0)" style="margin-left:40%;">Ver más</button>
            </div>
        </div>
    </div>
</section>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr style="border: 2px solid #f2f2f2;"/>
            </div>
        </div>
    </div>

    <section id="seccion3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Lorem Ipsum Dolor</h3>
                    <p class="text-justify">lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec </p>
                    <button class="btn btn-danger" href="javascript:void(0)" style="margin-left:40%; margin-bottom:10%;">Ver más</button>
                </div>
                <div class="col-md-6">
                    <img src="img/icons/svg/clipboard.svg" class="img-responsive" alt="Clipboard">
                </div>
            </div>
        </div>
    </section>


    <section id="seccion4" class="content-section4 text-center">
        <div class="seccion-4">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 id="seccion-titulo">Lorem ipsum dolor sit amec lorem ipsum dolor sit amec lorem ipsum dolor sit amec.</h2>
                    <button class="btn btn-danger btn-lg" id="btn-aprende"><strong>Lorem ipsum</strong><br/>Dolor sit amec</button>
                    <button class="btn btn-danger btn-lg" id="btn-aprende"><strong>Lorem ipsum</strong><br/>Dolor sit amec</button>
                    <button class="btn btn-danger btn-lg" id="btn-aprende"><strong>Lorem ipsum</strong><br/>Dolor sit amec</button>
                    <p class="text-center" style="margin-top:30px;color:#fff"><small>Lorem ipsum dolor sit amec sit amec.</small></p>
                </div>
            </div>
        </div>
    </section>



    <!--Modal de Registro-->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Crea tu Cuenta</h4>
            </div>
            <div class="modal-body">
                <form name="registro" method="post" action="registro-completado.php" id="formularioRegistro">
                    <div class="form-group">
                        <label for="nombreUsuario">Nombre de usuario:</label>
                        <input type="text" maxlength="25" name="nombreUsuario" onkeydown="removerClases();removerLimite();" class="form-control" id="nombreUsuario"/>
                        <span class="vacio1"></span>
                    </div>
                    <div class="form-group">
                        <label for="correoUsuario">Correo electrónico:</label>
                        <input type="email" name="correoUsuario" onkeydown="removerClases()" class="form-control" id="correoUsuario"/>
                        <span class="vacio2"></span>
                    </div>
                    <div class="form-group">
                        <label for="passUsuario">Contraseña:</label>
                        <input type="password" name="passUsuario" onkeydown="removerClases()" class="form-control" id="passUsuario"/>
                        <span class="vacio3"></span>
                    </div>
                    <div class="form-group">
                        <label for="rptpassUsuario">Repetir contraseña:</label>
                        <input type="password" name="rptpassUsuario" onkeydown="removerClases()" class="form-control" id="rptpassUsuario"/>
                        <span class="vacio4"></span>
                    </div>
                    <div class="form-group">
                        <label for="cedulaUsuario">Cédula:</label>
                        <input type="text" name="cedulaUsuario" onkeydown="removerClases()" class="form-control" id="cedulaUsuario"/>
                        <span class="vacio5"></span>
                    </div>
                    <div class="form-group">
                        <label for="empresaUsuario">Empresa:</label>
                        <input type="text" name="empresaUsuario" onkeydown="removerClases()" class="form-control" id="empresaUsuario"/>
                        <span class="vacio6"></span>
                    </div>
                    <div class="form-group">
                        <label for="rifUsuario">Rif de la empresa:</label>
                        <input type="text" name="rifUsuario" onkeydown="removerClases()" class="form-control" id="rifUsuario"/>
                        <span class="vacio7"></span>
                    </div>
                    <div class="form-group">
                        <label for="direccionUsuario">Dirección:</label>
                        <input type="text" name="direccionUsuario" onkeydown="removerClases()" class="form-control" id="direccionUsuario"/>
                        <span class="vacio8"></span>
                    </div>
                    <div class="form-group">
                        <label for="numeroUsuario">Número:</label>
                        <input type="text" name="numeroUsuario" onkeydown="removerClases()" class="form-control" id="numeroUsuario"/>
                        <span class="vacio9"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="validarRegistro()" class="btn btn-danger btn-lg">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!--Modal de Inicio de Sesion-->
<div class="modal fade" id="modalInicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Inicia Sesión</h4>
            </div>
            <div class="modal-body">
                <form name="registro" method="post" action="iniciado.php" id="formularioInicio">
                    <div class="form-group">
                        <label for="nombreInicio">Nombre de usuario:</label>
                        <input type="text" name="nombreInicio" onkeydown="removerClases()" class="form-control" id="nombreInicio"/>
                        <span class="blank1"></span>
                    </div>
                    <div class="form-group">
                        <label for="passInicio">Contraseña:</label>
                        <input type="password" name="passInicio" onkeydown="removerClases()" class="form-control" id="passInicio"/>
                        <span class="blank2"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="validarInicio()"  class="btn btn-danger btn-lg">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php require_once('footer.php');?>
    <?php }?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="app.js"></script>
</body>
</html>