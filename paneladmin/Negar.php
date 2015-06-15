<?php
require_once('config.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$servicio = $_POST['servicio'];
$fecha = $_POST['fecha'];
$estado = $_POST['estado'];
$comentario = $_POST['comentario'];
$maquinas = $_POST['maquinas'];
$precio = $_POST['precio'];
$q = "SELECT * FROM usuarios WHERE id_usuario = '" . $id . "'";
$q2 = mysql_query("SELECT * FROM citas WHERE id_usuario = '" . $id . "'");
while($row = mysql_fetch_array($q2)){
    $id_cita = $row['id_cita'];
    $cedula = $row['cedula_usuario'];
    $rif = $row['rif_usuario'];
    $cantidad = $row['cantidad'];
    $direccion = $row['direccion'];
    $numero = $row['numero'];
    $sql = mysql_query("DELETE FROM citas WHERE id_usuario = '" . $id . "'");
    if($sql){
        echo 'La cita ha sido negada con éxito';
    } else {
        echo 'Error';
    }
}
?>