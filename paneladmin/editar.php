<?php
require_once('config.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$numero = $_POST['numero'];
$direccion = $_POST['direccion'];
$empresa = $_POST['empresa'];
$rif = $_POST['rif'];

$_query_ = mysql_query("SELECT * FROM usuarios WHERE correo_usuario = '" . $correo . "'");

if (mysql_num_rows($_query_) == 0) {
    $query = mysql_query("UPDATE usuarios SET
                      nombre_usuario = '" . $nombre . "',
                      correo_usuario = '" . $correo . "',
                      cedula_usuario = '" . $cedula . "',
                      numero = '" . $numero . "',
                      direccion = '" . $direccion . "',
                      empresa_usuario = '" . $empresa . "',
                      rif_usuario = '" . $rif . "' WHERE id_usuario = '" . $id . "'");
    echo 'Cambios realizados con éxito';
} else {
    echo 'E-mail en uso';
}