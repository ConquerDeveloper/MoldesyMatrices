<nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="navegador">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>"><span class="light">Moldes</span> y Matrices</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><span class="fui-list"></span></a>
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><span class="fui-cross"></span></a>
                    <li class="sidebar-brand">
                        <a  href="<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>" onclick = $("#menu-close").click(); ><?php $inicio->mostrarNombre('nombre_usuario');?></a>
                    </li>
                    <li>
                        <a href="<?php echo 'inicio.php?id=' . $_SESSION['id_usuario'];?>" onclick = $("#menu-close").click(); >Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo 'solicitud.php?id=' . $_SESSION['id_usuario'];?>" onclick= $("#menu-close").click();>Solicitar una cita</a>
                    </li>
                    <li>
                        <a href="<?php echo 'subir.php?id=' . $_SESSION['id_usuario'];?>" onclick = $("#menu-close").click(); >Subir Transferencias</a>
                    </li>
                    <li>
                        <a href="<?php echo 'historial.php?id=' . $_SESSION['id_usuario'];?>" onclick = $("#menu-close").click(); >Historial de citas</a>
                    </li>
                    <li>
                        <a href="#portfolio" onclick = $("#menu-close").click(); >Modificar datos</a>
                    </li>
                    <li>
                        <a href="salir.php" onclick = $("#menu-close").click(); >Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
