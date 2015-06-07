<?php
require_once('config.php');
$nombre = $_POST['nombreAdmin'];
$pass = $_POST['contraAdmin'];
$query = mysql_query("SELECT nombre_admin FROM admins WHERE nombre_admin = '" . $nombre . "'");
if(mysql_num_rows($query) == 0){
    echo 'nop';
}