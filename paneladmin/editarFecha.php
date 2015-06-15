<?php
require_once('config.php');
$id = $_POST['id'];
$fecha = $_POST['fecha'];
$_q_ = mysql_query("UPDATE citas SET fecha = '" . $fecha . "' WHERE id_cita = '" . $id . "'");
if($_q_){
    echo 'La fecha de la cita ha sido modificada exitosamente';
} else {
    echo 'Error';
}


?>