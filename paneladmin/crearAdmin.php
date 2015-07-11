<?php
session_start();
require_once('config.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$contra = $_POST['contra'];
$tipo = $_POST['tipo'];
$sql = mysql_query("INSERT INTO
                  admins(nombre_admin, contra_admin, permisos, contra_md5)
                  VALUES('{$nombre}', '{$contra}', '{$tipo}', '" . md5($contra) . "')");
$sql2 = mysql_query("INSERT INTO admin_creado VALUES('NULL', '{$id}', '{$nombre}', '{$contra}', '{$tipo}', now(), now(), '{$_SESSION['admin']}')");
if($sql){
    echo 'Ha creado un nuevo administrador exitosamente';
} elseif(!$sql){
    echo 'Error';
}
?>