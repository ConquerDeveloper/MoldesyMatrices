<?php
require_once('config.php');
$reparacion = $_POST['reparacion'];
$texto = $_POST['texto'];
$sql = mysql_query("SELECT id_usuario, nombre_usuario, servicio, fecha, descripcion, cantidad, valor FROM aprobadas WHERE id_cita = '{$reparacion}'");
while($row = mysql_fetch_array($sql)){
    $id = $row['id_usuario'];
    $nombre = $row['nombre_usuario'];
    $servicio = $row['servicio'];
    $fecha = $row['fecha'];
    $descripcion = $row['descripcion'];
    $cantidad = $row['cantidad'];
    $valor = $row['valor'];
}
$sql2 = mysql_query("INSERT INTO reparaciones VALUES('{$reparacion}', '{$id}','{$nombre}','{$servicio}','{$fecha}','{$descripcion}','$cantidad','{$valor}','{$texto}','NULL')");
$sql3 = mysql_query("INSERT INTO reparacion_historial VALUES('NULL','{$reparacion}','{$id}','{$nombre}','{$servicio}', '{$fecha}','{$descripcion}','{$cantidad}','{$valor}','{$texto}',now(),now())");
if($sql2 && $sql3){
    echo 'La reparación se insertó exitosamente';
} else {
    echo 'Error';
}
?>