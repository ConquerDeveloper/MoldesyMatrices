<?php
require_once('config.php');
$cita = $_POST['select-cita'];
$numero = $_POST['select-numero'];
$fecha = $_POST['select-fecha'];
$comentario = $_POST['select-comentario'];

if ($cita == 'seleccione') {
    echo 'vacio1';
} elseif ($numero == 'numero-maquinas') {
    echo 'vacio2';
} else {
    if (strlen($fecha) == 0) {
        echo 'vacio3';
    } elseif (str_replace("/", "-", $fecha) < date("Y-m-d")) {
        echo 'invalido';
    } else {
        if ($cita == 'Mantenimiento Correctivo' && strlen($comentario) == 0) {
            echo 'vacio4';
        } elseif ($cita == 'Mantenimiento Preventivo' && strlen($numero) > 0 && strlen($fecha) > 0) {
            echo 'listo';
        } else {
            if ($cita == 'Mantenimiento Correctivo' && strlen($numero) > 0 && strlen($fecha) > 0 && strlen($comentario) > 0) {
                echo 'listo2';
            }
        }
    }
}

?>