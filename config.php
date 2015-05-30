<?php

class Conexion
{
    private $host;
    private $user;
    private $pass;

    public function __construct($localhost, $root, $blank)
    {
        $this->host = $localhost;
        $this->user = $root;
        $this->pass = $blank;
    }

    public function Conectar()
    {
        $con = mysql_connect($this->host, $this->user, $this->pass);
        mysql_select_db('daniel');
        if (!$con) {
            ?>
            <h1><?php echo 'No se pudo conectar a la base de datos';?></h1>
        <?php
        }
    }
}

$conexion = new Conexion('localhost', 'root', '');//-->Parametros de conexion al localhost ::CONFIGURAR SEGUN TUS ESPECIFICACIONES::
$conexion->Conectar();
?>