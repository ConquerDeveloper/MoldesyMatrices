<!DOCTYPE html>
<html>
<head>
    <title>No puedes acceder a este lugar</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
    <style>
        #cita-solicitada-body {
            background: #e1e1e1;
            font-family: Open sans,sans-serif;
            color: #fff;
            padding-top: 50px;
        }
    </style>
</head>
<body id="cita-solicitada-body">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="img/icons/svg/clocks.svg" alt="Watches" class="img-responsive" style="margin:0px auto">
                    <h2 class="text-center panel-text">
                        No puedes solicitar otra cita.
                    </h2>
                    <p class="text-center panel-text">
                        Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec
                        Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.
                    </p>
                    <button class="btn btn-danger btn-block" onclick="location.href='<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>'">
                        INICIO
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>