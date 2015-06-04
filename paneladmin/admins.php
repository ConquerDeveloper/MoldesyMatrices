<?php
require_once('config.php');

class Administradores
{
    public $admin;
    public $pass;
    private $usuario = array();

    public function Post($nombre_admin, $contra_admin)
    {
        $this->admin = $_POST[$nombre_admin];
        $this->pass = $_POST[$contra_admin];
    }

    public function Sesion()
    {
        if (isset($this->admin) && !empty($this->admin) && isset($this->pass) && !empty($this->pass)) {
            $_query_ = mysql_query("SELECT nombre_admin, contra_admin FROM admins WHERE nombre_admin = '" . $this->admin . "'");
            while ($row = mysql_fetch_array($_query_)) {
                $_SESSION['admin'] = $row['nombre_admin'];
            }
        }
    }

    public function Redirigir()
    {
        header('Location: inicio.php');
    }

    public function TraerUsuarios()
    {

        $sql = "select * from usuarios order by nombre_usuario";
        $res = mysql_query($sql);

        while ($reg = mysql_fetch_array($res)) {
            $this->usuario[] = $reg;
        }
        return $this->usuario;
    }
}