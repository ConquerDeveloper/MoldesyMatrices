<?php
require('config.php');
function mostrarReportes()
{
    $datos = array();
    $inicio = $_POST['inicio'];
    $final = $_POST['final'];
    $sql = mysql_query("SELECT * FROM aprobadas WHERE fecha BETWEEN '{$inicio}' AND '{$final}'");
    while ($row = mysql_fetch_array($sql)) {
        $datos[] = $row;
    }
    return $datos;
}

function calcular_precio_total()
{
    $inicio = $_POST['inicio'];
    $final = $_POST['final'];
    $sql = mysql_query("SELECT SUM(valor) AS total FROM aprobadas WHERE fecha BETWEEN  '{$inicio}' AND '{$final}'");
    $row = mysql_fetch_array($sql);
    return $row['total'];
}
function calcular_cant_servicios(){
    $inicio = $_POST['inicio'];
    $final = $_POST['final'];
    $sql = mysql_query("SELECT COUNT(servicio) AS total_servicios FROM aprobadas WHERE fecha BETWEEN  '{$inicio}' AND '{$final}'");
    $row = mysql_fetch_array($sql);
    return $row['total_servicios'];
}
$reportes = mostrarReportes();
    ?>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Servicio</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Serv. Totales</th>
            <th class="text-center">Pago Total</th>
        </tr>
        </thead>
        <?php for ($i = 0; $i < count($reportes); $i++) { ?>
        <tr>
            <td class="text-center"><?php echo $reportes[$i]['nombre_usuario']; ?></td>
            <td class="text-center"><?php echo $reportes[$i]['servicio']; ?></td>
            <td class="text-center"><?php echo $reportes[$i]['fecha']; ?></td>
            <td class="text-center"><?php echo $reportes[$i]['valor'] . ' Bs.f'; ?></td>
            <?php } ?>
            <td class="text-center"><?php echo calcular_cant_servicios(); ?></td>
            <td class="text-center"><?php echo calcular_precio_total() . ' Bs.f'; ?></td>
        </tr>
    </table>
<?php