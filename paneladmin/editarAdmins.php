<?php
require_once('config.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$tipo = $_POST['tipo'];
$sql = mysql_query("UPDATE admins
                    SET nombre_admin = '{$nombre}',
                    contra_admin = '{$clave}',
                    contra_md5 = '" . md5($clave) . "',
                    permisos = '{$tipo}' WHERE id_admin = '{$id}'");
if($sql){
    echo 'Los datos fueron modificados con éxito';
} else {
    echo 'Error';
}
?>