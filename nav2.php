<nav class="navbar navbar-default navbar-embossed navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <?php if(isset($_SESSION['id_usuario'])) {?>
            <a class="navbar-brand" href="<?php echo 'inicio.php?id=' . $_SESSION['id_usuario']; ?>">
            <?php } else { ?>
            <a class="navbar-brand" href="index.php">
                <?php }?>
                <span class="light">Moldes y </span>Matrices
            </a>
        </div>
    </div>
</nav>