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
<body>
<?php include('../nav2.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Sistema de Administración</h4>
            <hr/>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <form action="inicio.php" method="post" name="formAdmin" id="formAdmin">
                <div class="form-group">
                    <label for="">Admin:</label>
                    <input type="text" name="nombre-admin" class="form-control" required="required" id="nombre-admin"/>
                </div>
                <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input type="password" name="contra-admin" class="form-control" required="required" id="contra-admin"/>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Entrar</button>
            </form>
        </div>
    </div>
</div>




<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../app.js"></script>
<script>
    $(document).ready(function(){
        $("#nombre-admin").focus();
    });
</script>
</body>
</html>
