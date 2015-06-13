<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<?php require_once('nav2.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row col-md-12 custyle">
                    <h4 class="text-center">Citas Aprobadas</h4>
                    <hr/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right" id="esconderBtn">
                        Esconder
                    </a>
                    <a href="javascript:void(0)" class="btn btn-success btn-xs pull-right" id="mostrarBtn">
                        Mostrar
                    </a>
                    <table class="table table-striped custab">
                        <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Servicio</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Comentario</th>
                            <th class="text-center">Nº de máquinas</th>
                            <th class="text-center">Bs.F</th>
                        </tr>
                        </thead>
                            <?php
                            $admi = $admin->TraerAprobadas($_GET['id']);
                            for ($e = 0; $e < sizeof($admi); $e++) {
                                ?>
                                <tr id="tablaAprobadas">
                                    <td class="text-center">
                                        <?php echo ucfirst($admi[$e]['nombre_usuario']);?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                               value="<?php echo $admi[$e]['nombre_usuario']; ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['servicio'];?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                               value="<?php echo $admi[$e]['servicio']?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['fecha'];?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                               value="<?php echo $admi[$e]['fecha']?>"/>
                                    </td>
                                    <?php
                                    if($admi[$e]['servicio'] == 'Mantenimiento Correctivo'){
                                    ?>
                                        <td class="text-center">
                                            <?php echo $admi[$e]['descripcion'];?>
                                            <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                                   value="<?php echo $admi[$e]['descripcion']?>"/>
                                        </td>
                                    <?php } elseif($admi[$e]['servicio'] == 'Mantenimiento Preventivo') {?>
                                        <td class="text-center">
                                            No hay comentarios
                                            <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                                   value="<?php echo $admi[$e]['descripcion']?>"/>
                                        </td>
                                    <?php }?>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['cantidad'];?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                               value="<?php echo $admi[$e]['cantidad']?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['valor'];?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                               value="<?php echo $admi[$e]['valor']?>"/>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </table>



                    <h4 class="text-center">Citas Pendientes</h4>
                    <hr/>
                    <table class="table table-striped custab">
                        <thead>
                        <a href="#" class="btn btn-primary btn-xs pull-right">Editar fecha</a>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Servicio</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Comentario</th>
                            <th class="text-center">Nº de máquinas</th>
                            <th class="text-center">Bs.F</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                            <?php
                            $ad = $admin->TraerCitas($_GET['id']);
                            for ($i = 0; $i < sizeof($ad); $i++) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="mostrarCitas.php">
                                            <?php echo ucfirst($ad[$i]['nombre_usuario']);?>
                                        </a>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>N"
                                               value="<?php echo $ad[$i]['nombre_usuario']; ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['servicio'];?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>S"
                                               value="<?php echo $ad[$i]['servicio']?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['fecha'];?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>F"
                                               value="<?php echo $ad[$i]['fecha']?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['aprobado'];?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>A"
                                               value="<?php echo $ad[$i]['aprobado']?>"/>
                                    </td>
                                    <?php
                                    if($ad[$i]['servicio'] == 'Mantenimiento Correctivo'){
                                    ?>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['descripcion'];?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>D"
                                               value="<?php echo $ad[$i]['descripcion']?>"/>
                                    </td>
                                    <?php } elseif($ad[$i]['servicio'] == 'Mantenimiento Preventivo') {?>
                                        <td class="text-center">
                                            No hay comentarios
                                            <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>D"
                                                   value="<?php echo $ad[$i]['descripcion']?>"/>
                                        </td>
                                    <?php }?>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['cantidad'];?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>C"
                                               value="<?php echo $ad[$i]['cantidad']?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['valor'];?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>V"
                                               value="<?php echo $ad[$i]['valor']?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a class='btn btn-info btn-xs' href="javascript:void(0)"
                                           onclick="var id = <?php echo $ad[$i]['id_usuario'];?>; Aprobar(id);">
                                            <span class="fui-check"></span>
                                            Aprobar
                                        </a>
                                        <a href="#" class="btn btn-danger btn-xs"
                                           onclick="var id = '<?php echo $ad[$i]['id_usuario']; ?>'; Negar(id)">
                                            <span class="fui-cross"></span>
                                            Negar
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../app.js"></script>
<script>
    $(document).ready(function(){
        $("*#tablaAprobadas").trigger("hide");
    });
    $(function(){
        $("#esconderBtn").click(function(){
            $("*#tablaAprobadas").hide('slow');
        });
        $("#mostrarBtn").click(function(){
            $("*#tablaAprobadas").show('slow');
        });
    });
</script>
</body>
</html>