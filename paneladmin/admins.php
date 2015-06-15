<?php
require_once('config.php');

class Administradores
{
    public $admin;
    public $pass;
    public $permisos;
    public $usuario = array();
    public $citas = array();
    public $negadas = array();
    public $aprobadas = array();
    public $servicio;
    public $imagen;

    public function Post($nombre_admin, $contra_admin)
    {
        $this->admin = $_POST[$nombre_admin];
        $this->pass = $_POST[$contra_admin];
    }

    public function Sesion()
    {
        if (isset($this->admin) && !empty($this->admin) && isset($this->pass) && !empty($this->pass)) {
            $_query_ = mysql_query("SELECT * FROM admins WHERE nombre_admin = '" . $this->admin . "'");
            while ($row = mysql_fetch_array($_query_)) {
                $_SESSION['id'] = $row['id_admin'];
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

    public function TraerAprobadas($id)
    {
        $sql2 = mysql_query("SELECT * FROM aprobadas WHERE id_usuario = '" . $id . "'");
        while ($row = mysql_fetch_array($sql2)) {
            $this->aprobadas[] = $row;
        }
        return $this->aprobadas;
    }

    public function ValidarAdmins()
    {
        $_q_ = "SELECT * FROM admins
        WHERE nombre_admin = '" . $this->admin . "'
        AND contra_admin = '" . $this->pass . "'
        AND contra_md5 = '" . md5($this->pass) . "'";
        $q_ = mysql_query($_q_);
        if (mysql_num_rows($q_) == 0) {
            include 'vista-formulario-error.php';
        } else {
            header('Location: inicio.php?id=' . $_SESSION['id']);
        }

    }

    public function Imagen()
    {
        $sql = mysql_query("SELECT * FROM imagenes WHERE id_usuario = '{$_GET['id']}'");
        while ($row = mysql_fetch_array($sql)) {
            $this->imagen = $row['imagen'];
        }
        return $this->imagen;
    }

    public function TraerAdmins()
    {
        $sql = mysql_query("SELECT * FROM admins");
        while ($row = mysql_fetch_array($sql)) {
            $this->usuario[] = $row;
        }
        return $this->usuario;
    }

    public function Permisos($data)
    {
        $sql = mysql_query("SELECT * FROM admins WHERE id_admin = '{$_GET['id']}'");
        while($row = mysql_fetch_array($sql)){
            $this->permisos = $row[$data];
        }
        return $this->permisos;
    }
}