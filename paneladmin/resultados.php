<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php
require_once('nav2.php');
$busqueda = $_POST['busquedaGeneral'];
function MostrarResultados()
{
    $busqueda = $_POST['busquedaGeneral'];
    $resultado = array();
    $sql = mysql_query("SELECT * FROM aprobadas WHERE nombre_usuario LIKE '%{$busqueda}%' OR fecha LIKE '%{$busqueda}%'");
    while ($row = mysql_fetch_array($sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

$resultados = MostrarResultados();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-6">
            <?php require_once('buscador.php'); ?>
        </div>
    </div>
</div>

<hr/>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $_sql_ = mysql_query("SELECT * FROM aprobadas WHERE nombre_usuario LIKE '%{$busqueda}%' OR fecha LIKE '%{$busqueda}%'");
            if (mysql_num_rows($_sql_) > 0) {
                for ($i = 0; $i < sizeof($resultados); $i++) {
                    ?>
                    <table class="table table-striped custab">
                        <thead>
                        <tr class="tabla-cabecera">
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Servicio</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Comentario</th>
                            <th class="text-center">Nº de máquinas</th>
                            <th class="text-center">Bs.F</th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="text-center">
                                <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                    <?php echo ucfirst($resultados[$i]['nombre_usuario']); ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                    <?php echo $resultados[$i]['servicio']; ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                    <?php echo $resultados[$i]['fecha']; ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <?php if ($resultados[$i]['servicio'] == 'Mantenimiento Correctivo') { ?>
                                    <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                        <?php echo $resultados[$i]['descripcion']; ?>
                                    </a>
                                <?php } else if ($resultados[$i]['servicio'] == 'Mantenimiento Preventivo') { ?>
                                    <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                        No hay comentarios
                                    </a>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                    <?php echo $resultados[$i]['cantidad']; ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo 'mostrarCitas.php?id=' . $resultados[$i]['id_usuario'] ?>" style="color:#636363">
                                    <?php echo $resultados[$i]['valor']; ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                <?php }
            } else {
                ?>
                <div class="jumbotron" style="background: #BDC3C7">
                    <div class="container">
                        <div class="row">
                            <h4 class="text-center" style="color:#fff; margin:0">
                                No se encontraron resultados
                            </h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script src="../app.js"></script>
</body>
</html>