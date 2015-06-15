<?php
require_once('config.php');
$nombre = $_POST['nombre'];
$contra = $_POST['contra'];
$tipo = $_POST['tipo'];
$sql = mysql_query("INSERT INTO
                  admins(nombre_admin, contra_admin, permisos, contra_md5)
                  VALUES('{$nombre}', '{$contra}', '{$tipo}', '" . md5($contra) . "')");
if($sql){
    echo 'Ha creado un nuevo administrador exitosamente';
} elseif(!$sql){
    echo 'Error';
}
?>