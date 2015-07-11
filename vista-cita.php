<!DOCTYPE html>
<html>
<head>
    <title>Has solicitado tu cita | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <style>
        #cita-solicitada-body {
            background: #e1e1e1;
            font-family: Open sans,sans-serif;
            color: #fff;
            padding-top: 50px;
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
<body id="cita-solicitada-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="img/icons/svg/retina.svg" alt="Retina" class="img-responsive" style="margin:0px auto">
                        <h2 class="text-center panel-text">
                            ¡Su cita fue solicitada con éxito!
                        </h2>
                        <p class="text-center panel-text">
                            ¡Gracias por solicitar nuestros servicios! El próximo paso será realizar el pago. Descargue el documento PDF con la información de su cita y consérvelo
                        </p>
                        <a href="<?php echo 'pdf.php?id=' . $_SESSION['id_usuario'];?>" target="_blank" class="btn btn-danger btn-block">Descargar Planilla PDF</a>
                        <button class="btn btn-success btn-block" onclick="location.href='<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>'">Inicio</button>
                    </div>
                </div>
            </div>


            <!--div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div-->
        </div>
    </div>
</body>
</html>