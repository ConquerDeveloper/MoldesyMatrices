<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
if (!isset($_SESSION['usuario'])){
    header('Location: index.php');
} else {
$id = $_GET['id'];
$sql = "SELECT * FROM citas WHERE id_usuario = '$id'";
$variable = mysql_query($sql);
$aprobado = mysql_fetch_array($variable);
if ($aprobado['aprobado'] == 'no'){
    require_once('vista-no-aprobada.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Citas | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/flat-ui.min.css"/>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body style="background:#e1e1e1">
<?php require_once('nav.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="text-center panel-text">Lorem Ipsum Dolor</h6>

                    <p class="text-justify">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="text-center panel-text">Lorem Ipsum Dolor</h6>

                    <p class="text-justify">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="text-center panel-text">Lorem Ipsum Dolor</h6>

                    <p class="text-justify">Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="<?php echo 'citas.php?id=' . $_SESSION['id_usuario']; ?>" method="post"
                          id="formularioClausulas">
                        <div class="form-group">
                            <label for="">Servicio a solicitar:</label>
                            <select class="form-control" name="select-cita" id="select-cita">
                                <option value="seleccione">-Seleccione-
                                </option>
                                <option value="Mantenimiento Preventivo"
                                        id="mantenimientop">Mantenimiento Preventivo
                                </option>
                                <option value="Mantenimiento Correctivo"
                                        id="mantenimientoc">Mantenimiento Correctivo
                                </option>
                            </select>
                            <span class="blanco1"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Nº de máquinas a ser revisadas:</label>
                            <select class="form-control" name="select-numero" id="select-numero" onclick="Calcular()">
                                <option value="numero-maquinas" id="numero-maquinas">-Seleccione-</option>
                                <option value="1" id="uno">1</option>
                                <option value="2" id="dos">2</option>
                                <option value="3" id="tres">3</option>
                                <option value="4" id="cuatro">4</option>
                                <option value="5" id="cinco">5</option>
                            </select>
                            <span class="blanco2"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha de la Cita:</label>

                            <div class="input-group">
                                <input type="text" class="form-control" onclick="removerClases()"
                                       onkeydown="removerClases()" name="select-fecha" id="select-fecha"/>
                                <span class="input-group-addon">
                                    <span class="fui-calendar"></span>
                                </span>
                            </div>
                            <span class="blanco3"></span>
                        </div>
                        <div class="form-group" id="input-textarea">
                            <label for="">Descríbanos su falla</label>
                            <textarea name="select-comentario" id="textarea-comentario" onkeydown="removerClases()"
                                      rows="3" class="form-control"></textarea>
                        </div>
                        <span class="blanco4"></span>

                        <div class="form-group">
                            <p class="text-center alert alert-warning" style="font-size:15px">
                                Al hacer click en el botón "Enviar", estás aceptando los <a href="javascript:void(0)"
                                                                                            data-toggle="modal"
                                                                                            data-target="#modalCondiciones">
                                    Términos y Condiciones de la empresa</a>.
                            </p>
                            <span class="total"></span>
                            <input type="hidden" value="" name="valor" id="total"/>
                        </div>
                        <button type="button" class="btn btn-danger btn-block" onclick="validarSolicitud()">Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal de Cláusulas de cita-->
<div class="modal fade" id="modalClausulas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Cláusulas de la cita</h4>
            </div>
            <div class="modal-body">
                <p class="modal-texto text-justify">
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor
                    sit amec
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor
                    sit amec
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Entiendo</button>
            </div>
        </div>
    </div>
</div>


<!--Modal Terminos y Condiciones-->
<div class="modal fade" id="modalCondiciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Términos y Condiciones</h4>
            </div>
            <div class="modal-body">
                <p class="modal-texto text-justify">
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor
                    sit amec
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor
                    sit amec
                    Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Entiendo</button>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer2.php'); ?>
<?php
}
}
?>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="app.js"></script>
<script>
    $(document).ready(function () {
        $("#input-textarea").hide();
    });
</script>
</body>
</html>
