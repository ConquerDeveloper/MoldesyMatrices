<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
$permisos = $admin->Permisos('permisos');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php require_once('nav2.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-6">
            <?php require_once('buscador.php'); ?>
        </div>
    </div>
</div>

<hr/>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row col-md-12 custyle">
                    <table class="table table-striped custab">
                        <thead>
                        <tr class="tabla-cabecera">
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Empresa</th>
                            <th class="text-center">Rif</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                        <div id="tabla">
                            <?php
                            $ad = $admin->TraerUsuarios();
                            for ($i = 0; $i < sizeof($ad); $i++) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id=' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['nombre_usuario']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>N"
                                               value="<?php echo $ad[$i]['nombre_usuario']; ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id= ' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['correo_usuario']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>C"
                                               value="<?php echo $ad[$i]['correo_usuario'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id= ' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['cedula_usuario']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>c"
                                               value="<?php echo $ad[$i]['cedula_usuario'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id= ' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['numero']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>n"
                                               value="<?php echo $ad[$i]['numero'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id= ' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['direccion']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>D"
                                               value="<?php echo $ad[$i]['direccion'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id= ' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['empresa_usuario']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>E"
                                               value="<?php echo $ad[$i]['empresa_usuario'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo 'mostrarCitas.php?id= ' . $ad[$i]['id_usuario']; ?>"
                                           style="color:#636363">
                                            <?php echo $ad[$i]['rif_usuario']; ?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>R"
                                               value="<?php echo $ad[$i]['rif_usuario'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php if($permisos == 1){?>
                                        <a class='btn btn-success btn-xs' href="javascript:void(0)" data-toggle="modal"
                                           data-target="#modalEdicion"
                                           onclick="var id = <?php echo $ad[$i]['id_usuario']; ?>; Editar(id);">
                                            <span class="fui-new"></span> Editar
                                        </a>
                                        <?php } elseif($permisos == 0) {?>
                                            <a class='btn btn-success btn-xs disabled' href="javascript:void(0)" data-toggle="modal"
                                               data-target="#modalEdicion"
                                               onclick="var id = <?php echo $ad[$i]['id_usuario']; ?>; Editar(id);">
                                                <span class="fui-new"></span> Editar
                                            </a>
                                        <?php }?>
                                        <?php $nombre = $ad[$i]["nombre_usuario"]; ?>
                                        <?php if($permisos == 1){?>
                                        <a href="#" class="btn btn-danger btn-xs"
                                           onclick="var id = <?php echo $ad[$i]['id_usuario']; ?>; var name = '<?php echo $nombre; ?>'; Eliminar(id,name);"
                                           data-toggle="modal" data-target="#modalEliminar">
                                            <span class="fui-cross"></span> Borrar
                                        </a>
                                        <?php } elseif($permisos == 0) {?>
                                            <a href="#" class="btn btn-danger btn-xs disabled"
                                               onclick="var id = <?php echo $ad[$i]['id_usuario']; ?>; var name = '<?php echo $nombre; ?>'; Eliminar(id,name);"
                                               data-toggle="modal" data-target="#modalEliminar">
                                                <span class="fui-cross"></span> Borrar
                                            </a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal de edicion de usuarios-->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id"/>
                </div>
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" id="nombre"/>
                </div>
                <div class="form-group">
                    <label for="">Correo Electrónico:</label>
                    <input type="text" class="form-control" id="correo"/>
                </div>
                <div class="form-group">
                    <label for="">Cédula:</label>
                    <input type="text" class="form-control" id="cedula"/>
                </div>
                <div class="form-group">
                    <label for="">Teléfono:</label>
                    <input type="text" class="form-control" id="numero"/>
                </div>
                <div class="form-group">
                    <label for="">Dirección:</label>
                    <input type="text" class="form-control" id="direccion"/>
                </div>
                <div class="form-group">
                    <label for="">Empresa:</label>
                    <input type="text" class="form-control" id="empresa"/>
                </div>
                <div class="form-group">
                    <label for="">Rif de la Empresa:</label>
                    <input type="text" class="form-control" id="rif"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="Edicion()">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!--Modal de elimiacion de usuarios-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    ¿Está seguro de que desea eliminar a <?php echo ucfirst("<span id='nom'></span>"); ?>?
                    <input type="hidden" value="" id="nombreUsuario"/>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="EliminarUsuario()">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script src="../app.js"></script>
</body>
</html>
