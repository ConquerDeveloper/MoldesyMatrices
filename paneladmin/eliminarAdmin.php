<?php
require_once('config.php');
$id = $_POST['id'];
$sql = mysql_query("DELETE FROM admins WHERE id_admin = '{$id}'");
if($sql){
    echo 'El usuario ha sido eliminado con éxito';
} else {
    echo 'Error';
}
?>