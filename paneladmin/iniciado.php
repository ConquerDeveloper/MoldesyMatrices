<?php
session_start();
require_once('admins.php');
$admin = new Administradores();
$admin->Post('nombreAdmin','contraAdmin');
$admin->Sesion();
$admin->Redirigir();
?>