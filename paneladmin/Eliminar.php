<?php
require_once('config.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$query = "DELETE FROM usuarios WHERE id_usuario = '" . $id . "'";
mysql_query($query);
?>