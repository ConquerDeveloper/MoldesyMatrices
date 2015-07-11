<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
$permisos = $admin->Permisos('permisos');
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
} else {
if($permisos == 1){
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
    <link rel="stylesheet" href="../css/colorbox.css"/>
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body style="background: #ECF0F1">
<?php
require_once('nav2.php');
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
            <table class="table table-striped custab">
                <thead>
                <tr class="tabla-cabecera">
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Clave</th>
                    <th class="text-center">Permiso</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Acción</th>
                </tr>
                </thead>
                <a href="javascript:void(0)" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalCrearAdmin">
                    <span class="fui-user"></span>
                    Crear
                </a>
                <?php
                $Admins = $admin->TraerAdmins();
                for ($i = 0; $i < sizeof($Admins); $i++) {
                    ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $Admins[$i]['nombre_admin']; ?>
                            <input type="hidden" id="<?php echo $Admins[$i]['id_admin'];?>N"
                                   value="<?php echo $Admins[$i]['nombre_admin']?>"/>
                        </td>
                        <td class="text-center">
                            <?php echo $Admins[$i]['contra_admin']; ?>
                            <input type="hidden" id="<?php echo $Admins[$i]['id_admin'];?>C"
                                   value="<?php echo $Admins[$i]['contra_admin']?>"/>
                        </td>
                        <td class="text-center">
                            <?php echo $Admins[$i]['permisos']; ?>
                            <input type="hidden" id="<?php echo $Admins[$i]['permisos'];?>P"
                                   value="<?php echo $Admins[$i]['permisos']?>"/>
                        </td>
                        <td class="text-center">
                            <?php if($Admins[$i]['permisos'] == 1){?>
                            Master
                            <input type="hidden" id="<?php echo $Admins[$i]['id_admin'];?>T"
                                   value="<?php echo $Admins[$i]['permisos']?>"/>
                            <?php } elseif($Admins[$i]['permisos'] == 0) {?>
                            Normal
                             <input type="hidden" id="<?php echo $Admins[$i]['id_admin'];?>T"
                                    value="<?php echo $Admins[$i]['permisos']?>"/>
                            <?php }?>
                        </td>
                        <td class="text-center">
                            <a class='btn btn-success btn-xs' href="javascript:void(0)" data-toggle="modal" data-target="#modalEditarAdmin"
                                onclick="var id = '<?php echo $Admins[$i]['id_admin'];?>'; var permiso = '<?php echo $Admins[$i]['permisos'];?>'; EditarAdmin(id, permiso);">
                                <span class="fui-new"></span>
                                Editar
                            </a>
                            <?php if($Admins[$i]['permisos'] == 0){?>
                            <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalEliminarAdmin"
                                onclick="var id='<?php echo $Admins[$i]['id_admin'];?>'; var nombre ='<?php echo $Admins[$i]['nombre_admin']?>';EliminarAdmin(id, nombre)">
                                <span class="fui-cross"></span>
                                Borrar
                            </a>
                            <?php } elseif($Admins[$i]['permisos'] == 1) {?>
                                <a href="#" class="btn btn-danger btn-xs disabled">
                                    <span class="fui-cross"></span>
                                    Borrar
                                </a>
                            <?php }?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCrearAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Crear Administrador</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" id="nombreAdmin" name="nombreAdmin"/>
                    <?php
                    function traerId(){
                        $id = '';
                        $sql = mysql_query("SELECT id_admin FROM admins WHERE id_admin = '{$_GET['id']}'");
                        while($row = mysql_fetch_array($sql)){
                            $id = $row['id_admin'];
                        }
                        return $id;
                    }
                    ?>
                    <input type="hidden" value="<?php echo traerId();?>" name="idAdmin" id="idAdmin"/>
                </div>
                <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input type="password" class="form-control" id="contraAdmin" name="contraAdmin"/>
                </div>
                <div class="form-group">
                    <label for="">Tipo:</label>
                    <select name="tipoAdmin" id="tipoAdmin" class="form-control">
                        <option value="seleccione">-Seleccione-</option>
                        <option value="1">Master</option>
                        <option value="0">Normal</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btnCrearAdmin">Guardar</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modalEditarAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Editar Administrador</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" value="" id="nombreModificable"/>
                    <input type="hidden" value="" id="inputOculto"/>
                </div>
                <div class="form-group">
                    <label for="">Clave:</label>
                    <input type="text" class="form-control" value="" id="claveModificable"/>
                </div>
                <div class="form-group">
                    <label for="">Tipo:</label>
                    <input type="text" class="form-control" value="" id="tipoModificable"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="EdicionAdmin()">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalEliminarAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Eliminar Administrador</h4>
            </div>
            <div class="modal-body">
                <p class="text-center" style="margin:0">¿Esta seguro de eliminar al administrador <span class="nombreAdmin"></span>? </p>
                <input type="hidden" val="" id="Oculto"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="EliminacionAdmin()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<?php } elseif($permisos == 0){

    include 'vista-sin-permiso.php';

}
}
?>


<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script src="../app.js"></script>
</body>
</html>