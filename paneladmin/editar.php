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
$query = mysql_query("UPDATE usuarios SET
                      nombre_usuario = '" . $nombre . "',
                      correo_usuario = '" . $correo . "',
                      cedula_usuario = '" . $cedula . "',
                      numero = '" . $numero . "',
                      direccion = '" . $direccion . "',
                      empresa_usuario = '" . $empresa . "',
                      rif_usuario = '" . $rif . "' WHERE id_usuario = '" . $id . "'");
$query2 = mysql_query("UPDATE reparaciones SET
                      nombre_usuario = '" . $nombre . "' WHERE id_usuario = '" . $id . "'");
$query3 = mysql_query("UPDATE citas SET
                      nombre_usuario = '" . $nombre . "',
                      cedula_usuario = '" . $cedula . "',
                      numero = '" . $numero . "',
                      direccion = '" . $direccion . "',
                      rif_usuario = '" . $rif . "' WHERE id_usuario = '" . $id . "'");
$query4 = mysql_query("UPDATE aprobadas SET
                      nombre_usuario = '" . $nombre . "',
                      cedula_usuario = '" . $cedula . "',
                      numero = '" . $numero . "',
                      direccion = '" . $direccion . "',
                      rif_usuario = '" . $rif . "' WHERE id_usuario = '" . $id . "'");

$query5 = mysql_query("INSERT INTO usuario_editado values('null', '$nombre', '$correo', 'Sin modificar','Sin modificar', '$cedula', '$empresa', '$rif', '$direccion', '$numero', now(), now())");
if($query && $query2 && $query3 && $query4 && $query5){
    echo 'Cambios realizados con éxito';
} else {
    echo "error";
}

