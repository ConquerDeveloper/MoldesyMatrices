<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM imagenes WHERE id_usuario = '$id'";
    $variable = mysql_query($sql);
    if (mysql_num_rows($variable) == 1) {
        include 'vista-no-subir.php';
    } else {
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
                            <h3 class="text-center panel-text">Lore Ipsum Dolor</h3>

                            <p class="text-justify panel-text">
                                Lorem ipsum dolor sit amecLorem ipsum dolor sit amecLorem ipsum dolor sit amec
                                Lorem ipsum dolor sit amecLorem ipsum dolor sit amecLorem ipsum dolor sit amec
                                Lorem ipsum dolor sit amec.
                            </p>
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
                                <div class="form-group">
                                    <label for="nombreArchivo">Nombre del archivo:</label>
                                    <input type="text" class="form-control" onkeydown="removerClases()"
                                           name="nombreArchivo" id="nombreArchivo"/>
                                    <span class="blanco-1"></span>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" onclick="removerClases()"
                                           name="archivoSubido" id="archivoSubido"/>
                                    <span class="blanco-2"></span>
                                </div>
                                <button type="submit" class="btn btn-danger btn-block" onclick="validarSubida();">
                                    SUBIR
                                </button>
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
    <?php
    }
}
