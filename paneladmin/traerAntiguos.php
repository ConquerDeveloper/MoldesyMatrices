<?php
require_once('config.php');
function dateDiff($start, $end)
{

    $start_ts = strtotime($start);

    $end_ts = strtotime($end);

    $diff = $end_ts - $start_ts;

    return round($diff / 60 / 60 / 24);
}

$sql = mysql_query("SELECT * FROM citas_nuevas ORDER BY hora DESC");

echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Solicitudes de citas
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql)) {
    $resultado = dateDiff(date('Y-m-d'), $row['tiempo']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Servicio: ' . $row['servicio'] . '<br/>';
        echo 'Máquinas: ' . $row['cantidad'] . '<br/>';
        echo 'Fecha solicitada: ' . $row['fecha'] . '<br/>';
        if ($row['servicio'] == 'Mantenimiento Preventivo') {
            echo 'Comentarios: No hay comentarios' . '<br/>';
        } else {
            echo 'Comentarios: ' . $row['descripcion'] . '<br/>';
        }
        echo 'Hora de la solicitud: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';

$sql_citas_editadas = mysql_query("SELECT * FROM cita_editada ORDER BY hora DESC");

echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Citas editadas
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_citas_editadas)) {
    $resultado = dateDiff(date('Y-m-d'), $row['fecha']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['usuario'] . '<br/>';
        echo 'Fecha editada: ' . $row['fecha_cita'] . '<br/>';
        echo 'Hora de la edición: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';

$sql_citas_aprobadas = mysql_query("SELECT * FROM aprobadas ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingNine" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
          Citas aprobadas
        </a>
      </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNine">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_citas_aprobadas)) {
    $resultado = dateDiff(date('Y-m-d'), $row['tiempo']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Servicio: ' . $row['servicio'] . '<br/>';
        echo 'Máquinas: ' . $row['cantidad'] . '<br/>';
        echo 'Fecha solicitada: ' . $row['fecha'] . '<br/>';
        if($row['servicio'] == 'Mantenimiento Preventivo'){
            echo 'Comentarios: No hay comentarios <br/>';
        } else {
            echo 'Comentarios: ' . $row['descripcion'] . '<br/>';
        }
        echo 'Hora de la aprobación: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';


$sql_citas_negadas = mysql_query("SELECT * FROM negadas ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Citas negadas
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_citas_negadas)) {
    $resultado = dateDiff(date('Y-m-d'), $row['tiempo']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Servicio: ' . $row['servicio'] . '<br/>';
        echo 'Máquinas: ' . $row['cantidad'] . '<br/>';
        echo 'Fecha: ' . $row['fecha'] . '<br/>';
        if ($row['servicio'] == 'Mantenimiento Preventivo') {
            echo 'Comentarios: No hay comentarios' . '<br/>';
        } else {
            echo 'Comentarios: ' . $row['descripcion'] . '<br/>';
        }
        echo 'Hora de la negación: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';


$sql_imagenes_subidas = mysql_query("SELECT * FROM imagenes_historial ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingNine" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
          Transferencias subidas
        </a>
      </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNine">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_imagenes_subidas)) {
    $resultado = dateDiff(date('Y-m-d'), $row['tiempo']);
    if ($resultado < -1) {
        echo 'Usuario que subió la transferencia: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Transferencia: ' . '<a href="../' . $row['imagen'] . '" class="imagen" title="Transferencia Bancaria">
                                                    <img src="../' . $row['imagen'] .'" class="img-responsive img-rounded" width="30" height="30"/>
                                                </a>' . '<br/>';
        echo 'Hora de la subida: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';

$sql_reparaciones = mysql_query("SELECT * FROM reparacion_historial ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          Reparaciones
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_reparaciones)) {
    $resultado = dateDiff(date('Y-m-d'), $row['tiempo']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Servicio: ' . $row['servicio'] . '<br/>';
        echo 'Máquinas: ' . $row['cantidad'] . '<br/>';
        echo 'Fecha: ' . $row['fecha'] . '<br/>';
        if ($row['servicio'] == 'Mantenimiento Preventivo') {
            echo 'Comentarios: No hay comentarios' . '<br/>';
        } else {
            echo 'Comentarios: ' . $row['descripcion'] . '<br/>';
        }
        echo 'Reparación: ' . $row['reparacion'] . '<br/>';
        echo 'Hora de la reparación: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';


$sql_admins_editados = mysql_query("SELECT * FROM admin_editado ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          Edición de administradores
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_admins_editados)) {
    $resultado = dateDiff(date('Y-m-d'), $row['fecha']);
    if ($resultado < -1) {
        echo 'Administrador: ' . $row['usuario'] . '<br/>';
        echo 'Acción: Edición de administrador' . '<br/>';
        echo 'Administrador editado: ' . $row['nombre_admin'] . '<br/>';
        echo 'Permiso: ' . $row['permiso'] . '<br/>';
        echo 'Contraseña: ' . $row['contra_admin'] . '<br/>';
        echo 'Hora de la edición: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';

$sql_admins_creados = mysql_query("SELECT * FROM admin_creado ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          Creación de administradores
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_admins_creados)) {
    $resultado = dateDiff(date('Y-m-d'), $row['fecha']);
    if ($resultado < -1) {
        echo 'Administrador: ' . $row['usuario'] . '<br/>';
        echo 'Acción: Creación de administrador' . '<br/>';
        echo 'Administrador creado: ' . $row['nombre_admin'] . '<br/>';
        echo 'Permiso: ' . $row['permiso'] . '<br/>';
        echo 'Contraseña: ' . $row['contra_admin'] . '<br/>';
        echo 'Hora de la creación: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';


$sql_usuarios_nuevos = mysql_query("SELECT * FROM usuarios_nuevos ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSeven" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
          Usuarios creados
        </a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_usuarios_nuevos)) {
    $resultado = dateDiff(date('Y-m-d'), $row['fecha']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Correo: ' . $row['correo_usuario'] . '<br/>';
        echo 'Contraseña: ' . $row['contra_usuario'] . '<br/>';
        echo 'Cédula: ' . $row['cedula_usuario'] . '<br/>';
        echo 'Empresa: ' . $row['empresa_usuario'] . '<br/>';
        echo 'Rif: ' . $row['rif_usuario'] . '<br/>';
        echo 'Dirección: ' . $row['direccion'] . '<br/>';
        echo 'Número: ' . $row['numero'] . '<br/>';
        echo 'Hora de la creación: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';


$sql_usuarios_editados = mysql_query("SELECT * FROM usuario_editado ORDER BY hora DESC");
echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingEight" style="background: #d64242; color: #fff">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
          Usuarios editados
        </a>
      </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
      <div class="panel-body">';
while ($row = mysql_fetch_array($sql_usuarios_editados)) {
    $resultado = dateDiff(date('Y-m-d'), $row['fecha']);
    if ($resultado < -1) {
        echo 'Usuario: ' . $row['nombre_usuario'] . '<br/>';
        echo 'Correo: ' . $row['correo_usuario'] . '<br/>';
        echo 'Contraseña: ' . $row['contra_usuario'] . '<br/>';
        echo 'Cédula: ' . $row['cedula_usuario'] . '<br/>';
        echo 'Empresa: ' . $row['empresa_usuario'] . '<br/>';
        echo 'Rif: ' . $row['rif_usuario'] . '<br/>';
        echo 'Dirección: ' . $row['direccion'] . '<br/>';
        echo 'Número: ' . $row['numero'] . '<br/>';
        echo 'Hora de la edición: ' . $row['hora'] . '<br/><br/>';
    }
}
echo '  </div>
    </div>
  </div>';
?>