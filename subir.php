<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    $sql = mysql_query("SELECT * FROM imagenes WHERE id_usuario = '$id'");
    if (mysql_num_rows($sql) == 0) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Subir Transferencias | Moldes y Matrices</title>
            <meta charset="utf-8"/>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
            <link rel="stylesheet" href="css/flat-ui.min.css"/>
            <link rel="stylesheet" href="stylesheet.css"/>
        </head>
        <body style="background-color:#ECF0F1">
        <?php require_once('nav.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="text-center panel-text">Subir transferencias</h3>

                            <p class="text-justify panel-text">
                                Para la aprobación de la cita, debe adjuntar un scaneo, foto o versión digital del
                                comprobante de pago (recuerde que sólo trabajamos con transferencias electrónicas y
                                depósitos bancarios). El formato del archivo debe ser "JPG", "JPEG", "PNG", "XPS",
                                "OXPS", "PDF".
                            </p>

                            <p class="text-justify panel-text">Es necesario y sin excepciones, el adjuntar el archivo de
                                pago ya que esto es lo que garantiza que el persona técnico realice la visita</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form name="formularioSubir"
                                  action="<?php echo 'upload.php?id=' . $_SESSION['id_usuario']; ?>" method="post"
                                  enctype="multipart/form-data" id="formularioSubir">
                                <div class="form-group group-1">
                                    <label for="nombreArchivo">Nombre del archivo:</label>
                                    <input type="text" class="form-control" onkeydown="removerClases()"
                                           name="nombreArchivo" id="nombreArchivo"/>
                                    <span class="label label-1"></span>
                                </div>
                                <div class="form-group group-2">
                                    <input type="file" onclick="removerClases()"
                                           name="archivoSubido" id="archivoSubido"/>
                                    <span class="label label-2"></span>
                                </div>
                                <button type="submit" class="btn btn-danger btn-block" onclick="validarSubida();">
                                    Subir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php require_once('footer2.php');
    } elseif (mysql_num_rows($sql) > 0) {
        include 'vista-no-subir.php';
    }
    ?>

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/flat-ui.min.js"></script>
    <script src="app.js"></script>
</body>
    </html>
    <?php
}
