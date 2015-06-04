<?php
require_once('config.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$numero = $_POST['numero'];
$direccion = $_POST['direccion'];

$query = mysql_query("UPDATE usuarios SET
                      nombre_usuario = '" . $nombre . "',
                      correo_usuario = '" . $correo . "',
                      cedula_usuario = '" . $cedula . "',
                      numero = '" . $numero . "',
                      direccion = '" . $direccion . "' WHERE id_usuario = '" . $id . "'");

if($query){
    echo 'cambios realizados ggg :v';
} else {
    echo 'Oshe n0 D:';
}