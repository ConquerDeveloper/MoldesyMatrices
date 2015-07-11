<?php
session_start();
require_once('config.php');
$id = $_POST['id'];
$fecha = $_POST['fecha'];
$_q_ = mysql_query("UPDATE citas SET fecha = '" . $fecha . "' WHERE id_cita = '" . $id . "'");
$_q_2 = mysql_query("INSERT INTO cita_editada values('null','$id','$fecha','".$_SESSION['usuario']."',now(), now())");
if($_q_ && $_q_2){
    echo 'La fecha de la cita ha sido modificada exitosamente';
} else {
    echo 'Error';
}


?>