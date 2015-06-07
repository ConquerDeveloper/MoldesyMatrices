<?php
require_once('config.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$servicio = $_POST['servicio'];
$fecha = $_POST['fecha'];
$estado = $_POST['estado'];
$comentario = $_POST['comentario'];
$estado_aprobado = $_POST['estado_aprobado'];
$q = "SELECT * FROM usuarios WHERE id_usuario = '" . $id . "'";
$q2 = mysql_query("SELECT * FROM citas WHERE id_usuario = '" . $id . "'");
while($row = mysql_fetch_array($q2)){
    $id_cita = $row['id_cita'];
    $cedula = $row['cedula_usuario'];
    $rif = $row['rif_usuario'];
    $cantidad = $row['cantidad'];
    $direccion = $row['direccion'];
    $numero = $row['numero'];
    $sql = mysql_query("INSERT INTO aprobadas VALUES('NULL','$id_cita','$id','$servicio','$fecha','$comentario','$nombre','$cedula','$rif','$cantidad','$estado_aprobado','$direccion','$numero')");
    if($sql){
        mysql_query("DELETE FROM citas WHERE id_usuario = '" . $id . "'");
        echo 'La cita ha sido aprobada con éxito';
    } else {
        echo 'Error';
    }
}