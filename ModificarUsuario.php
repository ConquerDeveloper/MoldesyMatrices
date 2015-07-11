<?php
require_once('config.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$rpt = $contra;
$cedula = $_POST['cedula'];
$empresa = $_POST['empresa'];
$rif = $_POST['rif'];
$direccion = $_POST['direccion'];
$numero = $_POST['numero'];
$sql = mysql_query("UPDATE usuarios SET
      nombre_usuario = '".$nombre."',
      correo_usuario = '".$correo."',
      contra_usuario = '".$contra."',
      cedula_usuario = '".$cedula."}',
      empresa_usuario = '".$empresa."',
      rif_usuario = '".$rif."',
      direccion = '".$direccion."',
      numero = '".$numero."' WHERE id_usuario = '".$id . "'");
$sql2 = mysql_query("UPDATE aprobadas SET
      nombre_usuario = '".$nombre."',
      cedula_usuario = '".$cedula."}',
      rif_usuario = '".$rif."',
      direccion = '".$direccion."',
      numero = '".$numero."' WHERE id_usuario = '".$id . "'");
$sql3 = mysql_query("UPDATE citas SET
      nombre_usuario = '".$nombre."',
      cedula_usuario = '".$cedula."}',
      rif_usuario = '".$rif."',
      direccion = '".$direccion."',
      numero = '".$numero."' WHERE id_usuario = '".$id . "'");
$sql4 = mysql_query("UPDATE citas SET
      nombre_usuario = '".$nombre."' WHERE id_usuario = '".$id . "'");

$sql5 = mysql_query("INSERT INTO usuario_editado
                    VALUES('NULL','{$nombre}', '{$correo}','{$contra}','{$rpt}',
                    '{$cedula}','{$empresa}','{$rif}','{$direccion}','{$numero}', now(), now())");
if($sql && $sql2 && $sql3 && $sql4 && $sql5){
    echo 'Los datos fueron modificados con éxito';
} else {
    echo 'Error';
}
?>