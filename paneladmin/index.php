<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php include('navadmin.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Sistema de Administración Moldes y Matrices C.A.</h4>
            <hr class="separacion-admin"/>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="iniciado.php" method="post" name="formAdmin" id="formAdmin">
                        <div class="form-group">
                            <label for="">Admin:</label>
                            <input type="text" name="nombreAdmin" class="form-control" required="required"
                                   id="nombre-admin"/>
                            <span class="empty1"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input type="password" name="contraAdmin" class="form-control" required="required"
                                   id="contra-admin"/>
                            <span class="empty2"></span>
                        </div>
                        <button class="btn btn-danger btn-block" type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../app.js"></script>
<script>
    $(document).ready(function () {
        $("#nombre-admin").focus();
    });
</script>
</body>
</html>
