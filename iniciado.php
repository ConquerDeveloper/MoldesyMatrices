<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio;
$inicio->Inicializar('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
$inicio->Redirecciona();
?>
