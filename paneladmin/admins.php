<?php
require_once('config.php');

class Administradores
{
    public $admin;
    public $pass;
    public $usuario = array();
    public $citas = array();

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

    public function TraerUsuarios()
    {

        $sql = "SELECT * FROM usuarios ORDER BY nombre_usuario";
        $res = mysql_query($sql);

        while ($reg = mysql_fetch_array($res)) {
            $this->usuario[] = $reg;
        }
        return $this->usuario;
    }

    public function TraerCitas($id)
    {

        $sql = "SELECT * FROM citas WHERE id_usuario = '" . $id . "'";
        $res = mysql_query($sql);

        while ($reg = mysql_fetch_array($res)) {
            $this->citas[] = $reg;
        }
        return $this->citas;
    }

    public function ValidarAdmins()
    {
        $_q_ = "SELECT * FROM admins
        WHERE nombre_admin = '" . $this->admin . "'
        AND contra_admin = '" . $this->pass . "'
        AND contra_md5 = '" . md5($this->pass) . "'";
        $q_ = mysql_query($_q_);
        if (mysql_num_rows($q_) == 0) {
            echo "No hay coincidencia <br>";
        } else {
            header('Location: inicio.php');
        }

    }
}