<!DOCTYPE html>
<html>
<head>
    <title>Registro completado | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <style>
        #registro-completo-body {
            background: #e1e1e1;
            font-family: Open Sans, sans-serif;
            color: #fff;
        }
        .contenedor-mensaje {
            background: #444444;
            margin-top: 20px;
        }
        .spinner {
            margin: 100px auto 0;
            width: 70px;
            text-align: center;
        }

        .spinner > div {
            width: 18px;
            height: 18px;
            background-color:#1abc9c;

            border-radius: 100%;
            display: inline-block;
            -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
            animation: bouncedelay 1.4s infinite ease-in-out;
            /* Prevent first frame from flickering when animation starts */
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .spinner .bounce1 {
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .spinner .bounce2 {
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% { -webkit-transform: scale(0.0) }
            40% { -webkit-transform: scale(1.0) }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            } 40% {
                  transform: scale(1.0);
                  -webkit-transform: scale(1.0);
              }
        }
    </style>
</head>
<body id="registro-completo-body">
    <?php require_once('usuarios.php');
    //Se instancia o se crea un objeto de la clase Registro pasandole los parametos que vienen siendo los "names" de los inputs del form de Registro
    $registro = new Registro();
    //Se inicializan los valores del formulario de registro
    $registro->Inicializar('nombreUsuario', 'correoUsuario', 'passUsuario', 'rptpassUsuario', 'cedulaUsuario', 'empresaUsuario', 'rifUsuario','direccionUsuario','numeroUsuario');
    //Se instancia el metodo de registro
    $registro->Registrar();
    //Se instancia el metodo de envio de correo
    $registro->EnviarCorreo();
    //Por ultimo se instancia el metodo de redireccionamiento
    $registro->Redireccionar();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron contenedor-mensaje">
                    <h3 class="text-center">¡Ha completado su registro exitosamente!</h3>
                    <p class="text-center">Le damos la bienvenida a Moldes y Matrices. <br/>
                        <small style="color: #1abc9c">Usted está siendo redireccionado...</small></p>
                </div>
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>