<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
function MostrarDatosImagen($data){
    $datos = '';
    $sql = mysql_query("SELECT * FROM imagenes WHERE id_usuario = '{$_GET['id']}'");
    while($row = mysql_fetch_array($sql)){
        $datos = $row[$data];
    }
    return $datos;
}
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
    <link rel="stylesheet" href="../css/colorbox.css" />
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php require_once('nav2.php');
$q = mysql_query("SELECT * FROM citas WHERE id_usuario = '" . $_GET['id'] . "'");
$q2 = mysql_query("SELECT * FROM aprobadas WHERE id_usuario = '" . $_GET['id'] . "'");
if(mysql_num_rows($q) > 0 || mysql_num_rows($q2) > 0){
?>
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
                    <?php
                    $qqq = mysql_query("SELECT * FROM aprobadas WHERE id_usuario = '" . $_GET['id'] . "'");
                    if (mysql_num_rows($qqq) == 0) {
                        ?>
                        <div class="jumbotron" style="background: #BDC3C7">
                            <div class="container">
                                <div class="row">
                                    <h4 class="text-center" style="color:#fff; margin:0">
                                        No hay citas aprobadas
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif (mysql_num_rows($qqq) > 0) {
                        ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right" id="esconderBtn">
                            Esconder
                        </a>
                        <a href="javascript:void(0)" class="btn btn-success btn-xs pull-right" id="mostrarBtn">
                            Mostrar
                        </a>
                        <table class="table table-striped custab">
                            <thead>
                            <tr class="tabla-cabecera">
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Servicio</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Comentario</th>
                                <th class="text-center">Nº de máquinas</th>
                                <th class="text-center">Bs.F</th>
                                <th class="text-center">Transferencia</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <?php
                            $admi = $admin->TraerAprobadas($_GET['id']);
                            for ($e = 0; $e < sizeof($admi); $e++) {
                                ?>
                                <tr id="tablaAprobadas">
                                    <td class="text-center">
                                        <?php echo ucfirst($admi[$e]['nombre_usuario']); ?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario'] ?>"
                                               value="<?php echo $admi[$e]['nombre_usuario']; ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['servicio']; ?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario'] ?>"
                                               value="<?php echo $admi[$e]['servicio'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['fecha']; ?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario'] ?>"
                                               value="<?php echo $admi[$e]['fecha'] ?>"/>
                                    </td>
                                    <?php
                                    if ($admi[$e]['servicio'] == 'Mantenimiento Correctivo') {
                                        ?>
                                        <td class="text-center">
                                            <?php echo $admi[$e]['descripcion'];?>
                                            <input type="hidden" id="<?php echo $admi[$e]['id_usuario']?>"
                                                   value="<?php echo $admi[$e]['descripcion']?>"/>
                                        </td>
                                    <?php } elseif ($admi[$e]['servicio'] == 'Mantenimiento Preventivo') { ?>
                                        <td class="text-center">
                                            No hay comentarios
                                            <input type="hidden" id="<?php echo $admi[$e]['id_usuario'] ?>"
                                                   value="<?php echo $admi[$e]['descripcion'] ?>"/>
                                        </td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['cantidad']; ?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario'] ?>"
                                               value="<?php echo $admi[$e]['cantidad'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $admi[$e]['valor']; ?>
                                        <input type="hidden" id="<?php echo $admi[$e]['id_usuario'] ?>"
                                               value="<?php echo $admi[$e]['valor'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <a href="../<?php echo $admin->Imagen();?>" style="margin:0px auto" class="imagen" title="Transferencia Bancaria">
                                            <img src="../<?php echo $admin->Imagen();?>" class="img-responsive img-rounded" width="30" height="30" style="margin:0px auto"/>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $query_ = mysql_query("SELECT * FROM reparaciones WHERE id_cita = '{$admi[$e]['id_cita']}'");
                                        if(mysql_num_rows($query_) == 0) {
                                        ?>
                                        <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalReparacion"
                                            onclick="var id='<?php echo $admi[$e]['id_cita']?>';Reparacion(id)">
                                            Reparación
                                        </button>
                                        <?php } elseif(mysql_num_rows($query_) > 0) {?>
                                            <button class="btn btn-xs btn-success disabled">
                                                Reparación
                                            </button>
                                            <?php
                                            $q = mysql_query("SELECT * FROM reparaciones WHERE id_cita = '{$admi[$e]['id_cita']}'");
                                            while($row = mysql_fetch_array($q)){
                                                $reparacion = $row['reparacion'];
                                            }
                                            ?>
                                            <button class="btn btn-xs btn-info" onclick="var id = '<?php echo $admi[$e]['id_cita'];?>';
                                                var nombre = '<?php echo $admi[$e]['nombre_usuario']; ?>';
                                                var servicio = '<?php echo $admi[$e]['servicio']; ?>';
                                                var fecha = '<?php echo $admi[$e]['fecha']; ?>';
                                                var descripcion = '<?php echo $admi[$e]['descripcion']; ?>';
                                                var cantidad = '<?php echo $admi[$e]['cantidad']; ?>';
                                                var valor = '<?php echo $admi[$e]['valor']; ?>';
                                                var reparacion = '<?php echo $reparacion; ?>';
                                                verReparacion(id, nombre, servicio, fecha, descripcion, cantidad, valor, reparacion)" data-toggle="modal" data-target="#verReparacion">
                                                Ver reparación
                                            </button>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    <?php } ?>




                    <hr/>
                    <?php
                    $qqq = mysql_query("SELECT * FROM citas WHERE id_usuario = '" . $_GET['id'] . "'");
                    if (mysql_num_rows($qqq) == 0) {
                        ?>
                        <div class="jumbotron" style="background: #BDC3C7">
                            <div class="container">
                                <div class="row">
                                    <h4 class="text-center" style="color:#fff; margin:0">
                                        No hay citas pendientes
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif (mysql_num_rows($qqq) > 0) {
                        ?>
                        <table class="table table-striped custab">
                            <thead>
                            <tr class="tabla-cabecera">
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Servicio</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Comentario</th>
                                <th class="text-center">Nº de máquinas</th>
                                <th class="text-center">Bs.F</th>
                                <th class="text-center">Transferencia</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>

                            <?php
                            $ad = $admin->TraerCitas($_GET['id']);
                            for ($i = 0; $i < sizeof($ad); $i++) {
                                ?>
                                <a href="javascript:void(0)"
                                   onclick="var fecha ='<?php echo $ad[$i]['fecha']; ?>'; var id ='<?php echo $ad[$i]['id_cita']; ?>'  ;EditarFecha(fecha, id)"
                                   class="btn btn-success btn-xs pull-right" data-toggle="modal"
                                   data-target="#modalEditarFecha">
                                    <span class="fui-new"></span>
                                    Editar
                                </a>
                                <tr>
                                    <td class="text-center">
                                            <?php echo ucfirst($ad[$i]['nombre_usuario']); ?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>N"
                                               value="<?php echo $ad[$i]['nombre_usuario']; ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['servicio']; ?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>S"
                                               value="<?php echo $ad[$i]['servicio'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['fecha']; ?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>F"
                                               value="<?php echo $ad[$i]['fecha'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['aprobado']; ?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>A"
                                               value="<?php echo $ad[$i]['aprobado'] ?>"/>
                                    </td>
                                    <?php
                                    if ($ad[$i]['servicio'] == 'Mantenimiento Correctivo') {
                                        ?>
                                        <td class="text-center">
                                            <?php echo $ad[$i]['descripcion'];?>
                                            <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>D"
                                                   value="<?php echo $ad[$i]['descripcion']?>"/>
                                        </td>
                                    <?php } elseif ($ad[$i]['servicio'] == 'Mantenimiento Preventivo') { ?>
                                        <td class="text-center">
                                            No hay comentarios
                                            <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>D"
                                                   value="<?php echo $ad[$i]['descripcion'] ?>"/>
                                        </td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['cantidad']; ?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>C"
                                               value="<?php echo $ad[$i]['cantidad'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $ad[$i]['valor']; ?>
                                        <input type="hidden" id="<?php echo $ad[$i]['id_usuario'] ?>V"
                                               value="<?php echo $ad[$i]['valor'] ?>"/>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $sql = mysql_query("SELECT * FROM imagenes WHERE id_usuario = '{$_GET['id']}'");
                                        if(mysql_num_rows($sql) > 0){
                                        ?>
                                        <a href="../<?php echo $admin->Imagen();?>" style="margin:0px auto" class="imagen" title="Transferencia Bancaria">
                                            <img src="../<?php echo $admin->Imagen();?>" class="img-responsive img-rounded" width="30" height="30" style="margin:0px auto"/>
                                            <input type="hidden" id="<?php echo $ad[$i]['id_usuario']?>IMG" value="<?php echo MostrarDatosImagen('imagen');?>"/>
                                        </a>
                                        <?php } elseif(mysql_num_rows($sql) == 0) {?>
                                        No se ha realizado la transferencia
                                        <?php }?>
                                    </td>
                                    <td class="text-center">
                                        <a class='btn btn-success btn-xs' href="javascript:void(0)"
                                           onclick="var id = <?php echo $ad[$i]['id_usuario']; ?>; Aprobar(id);">
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal de edición de fecha-->
<div class="modal fade" id="modalEditarFecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Editar Fecha</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Fecha solicitada:</label>
                    <input type="text" class="form-control" value="" id="fechaModificable"/>
                    <input type="hidden" id="fechaEscondida" value=""/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="EdicionFecha()">Guardar</button>
            </div>
        </div>
    </div>
</div>



    <!--Modal de ver Reparacion-->
    <div class="modal fade" id="verReparacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Reparación realizada</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" class="form-control" disabled="disabled" value="" id="nombreReparacion"/>
                    </div>
                    <div class="form-group">
                        <label for="">Servicio:</label>
                        <input type="text" class="form-control" disabled="disabled" value="" id="servicioReparacion"/>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha:</label>
                        <input type="text" class="form-control" disabled="disabled" value="" id="fechaReparacion"/>
                    </div>
                    <div class="form-group">
                        <label for="">Comentario:</label>
                        <input type="text" class="form-control" disabled="disabled" value="" id="comentarioReparacion"/>
                    </div>
                    <div class="form-group">
                        <label for="">N° de máquinas:</label>
                        <input type="text" class="form-control" disabled="disabled" value="" id="maquinasReparacion"/>
                    </div>
                    <div class="form-group">
                        <label for="">Precio:</label>
                        <input type="text" class="form-control" disabled="disabled" value="" id="precioReparacion"/>
                    </div>
                    <div class="form-group">
                        <label for="">Reparacion:</label>
                        <textarea  class="form-control" disabled="disabled" id="reparacion"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!--Modal de reparación de máquina-->
    <div class="modal fade" id="modalReparacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Escribir Reparación</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Indique la reparación que realizada a la máquina:</label>
                        <textarea name="comentarioReparacion" rows="4" placeholder="Escriba la reparacion" id="text-area-reparacion" class="form-control"></textarea>
                        <input type="hidden" value="" id="reparacionHidden"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="Reparar()">Guardar</button>
                </div>
            </div>
        </div>
    </div>


<?php } else { ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style="background: #BDC3C7">
                <div class="container">
                    <div class="row">
                        <h4 class="text-center" style="color:#fff; margin:0">
                            Este usuario no ha realizado ninguna cita
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script src="../js/jquery.colorbox.js"></script>
<script src="../app.js"></script>
<script>
    $(document).ready(function () {
        $("*#tablaAprobadas").hide();
    });
    $(".imagen").colorbox({rel:'imagen', width:'90%', height:'90%'});
    function Reparacion(id){
        $("#reparacionHidden").val(id);
    }
    function Reparar(){
        var reparacion = $("#reparacionHidden").val();
        var texto = $("#text-area-reparacion").val();
        $params = {
            reparacion: reparacion,
            texto: texto
        };
        $.ajax({
            url:"reparacion.php",
            type: "POST",
            data: $params,
            success: function(response){
                if(response == "La reparación se insertó exitosamente"){
                    alert(response);
                    self.location.reload();
                } else {
                    alert(response);
                }
            }
        });
    }
    function verReparacion(id, nombre, servicio, fecha, descripcion, cantidad, valor, reparacion){
        $("#nombreReparacion").val(nombre);
        $("#servicioReparacion").val(servicio);
        $("#fechaReparacion").val(fecha);
        $("#comentarioReparacion").val(descripcion);
        $("#maquinasReparacion").val(cantidad);
        $("#precioReparacion").val(valor);
        $("#reparacion").val(reparacion);
    }
</script>
</body>
</html>