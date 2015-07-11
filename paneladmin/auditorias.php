<?php
session_start();
require_once('admins.php');
$admin = new Administradores;
$admin->Sesion();
$permisos = $admin->Permisos('permisos');
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración | Moldes y Matrices</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/flat-ui.min.css"/>
    <link rel="stylesheet" href="../stylesheet.css"/>
    <link rel="stylesheet" href="../css/colorbox.css" />
    <style>
        .navbar {
            margin-bottom: 0;
        }

        .text-center {
            padding-top: 20px;
        }
        .col-xs-12 {
            background-color: #fff;
        }
        #sidebar {
            height: 100%;
            padding-right: 0;
            padding-top: 20px;
        }
        #sidebar .nav {
            width: 95%;
        }
        #sidebar li {
            border:0 #f2f2f2 solid;
            border-bottom-width:1px;
        }

        /* collapsed sidebar styles */
        @media screen and (max-width: 767px) {
            .row-offcanvas {
                position: relative;
                -webkit-transition: all 0.25s ease-out;
                -moz-transition: all 0.25s ease-out;
                transition: all 0.25s ease-out;
            }
            .row-offcanvas-right
            .sidebar-offcanvas {
                right: -41.6%;
            }

            .row-offcanvas-left
            .sidebar-offcanvas {
                left: -41.6%;
            }
            .row-offcanvas-right.active {
                right: 41.6%;
            }
            .row-offcanvas-left.active {
                left: 41.6%;
            }
            .sidebar-offcanvas {
                position: absolute;
                top: 0;
                width: 41.6%;
            }
            #sidebar {
                padding-top:0;
            }
        }
    </style>
</head>
<?php require_once('nav2.php');?>
<body style="background: #ECF0F1">
<div class="page-container">

    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">

            <!-- sidebar -->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                <ul class="nav">
                    <li><a href="javascript:void(0)" onclick="Recientes()">Recientes</a></li>
                    <li><a href="javascript:void(0)" onclick="Antiguos()">Antiguos</a></li>
                </ul>
            </div>

            <!-- main area -->
            <div class="col-xs-12 col-sm-9">
                <div class="jumbotron" style="background: #d64242; margin-top: 10px;">
                    <div class="container">
                        <div class="row">
                            <h4 class="text-center" style="color:#fff; margin:0">
                                Eventos del Sistema
                            </h4>
                        </div>
                    </div>
                </div>
                <p class="contenido text-justify"></p>
            </div><!-- /.col-xs-12 main -->
        </div><!--/.row-->
    </div><!--/.container-->
</div><!--/.page-container-->




<?php
}
?>
<script src="../js/vendor/jquery.min.js"></script>
<script src="../js/flat-ui.min.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script src="../js/jquery.colorbox.js"></script
<script src="../app.js"></script>
<script>
    function Recientes(){
        $.ajax({
            type: "post",
            url: "traerRecientes.php",
            success: function(resultado){
                $(".contenido").html(resultado);
            }
        });
    }
    function Antiguos(){
        $.ajax({
            type: "post",
            url: "traerAntiguos.php",
            success: function(resultado){
                $(".contenido").html(resultado);
            }
        });
    }
    $(".imagen").colorbox({rel:'imagen', width:'90%', height:'90%'});
</script>
</body>
</html>