<nav class="navbar navbar-inverse navbar-static-top navbar-embossed" role="navigation" id="nav-admin">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo 'inicio.php?id=' . $_SESSION['id'];?>">
                Moldes <span class="light">y Matrices</span>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo strtoupper($_SESSION['admin']);?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo 'inicio.php?id=' . $_SESSION['id'];?>">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo 'Administradores.php?id=' .  $_SESSION['id'];?>">
                                Administradores
                            </a>
                        </li>
                        <li>
                            <a href="salir.php">Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>