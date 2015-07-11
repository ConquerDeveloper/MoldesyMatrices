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
    $direccion = $row['direccion'];
    $numero = $row['numero'];


    $sql = mysql_query("INSERT INTO negadas VALUES
    ('NULL','" . $id_cita . "', '" . $id . "', '" . $servicio . "', '" . $fecha . "', '" . $comentario . "',
     '" . $nombre . "', '" . $cedula . "', '" . $rif . "', '" . $maquinas . "', '" . $estado . "', '" . $direccion . "',
     '" . $numero . "', '" . $precio . "', now(), now())");



    $sql2 = mysql_query("DELETE FROM citas WHERE id_usuario = '" . $id . "'");
    $sql3 = mysql_query("DELETE FROM imagenes WHERE id_usuario = '" . $id . "'");
    if($sql && $sql2 && $sql3){
        echo 'La cita ha sido negada con éxito';
    } else {
        echo 'Error';
    }
}
?>