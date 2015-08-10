<?php
require_once('config.php');
$cantidad = $_POST['cantidad'];
if ($cantidad == 'numero-maquinas') {
    echo 'nada';
} elseif ($cantidad == '1') {
    echo '1000';
} else {
    if ($cantidad == '2') {
        echo '2000';
    } elseif ($cantidad == '3') {
        echo '3000';
    } else {
        if ($cantidad == '4') {
            echo '4000';
        } elseif ($cantidad == '5') {
            echo '5000';
        }
    }
}
?>