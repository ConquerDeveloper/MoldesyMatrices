<?php
//Se incluye el archivo config que contiene las configuraciones de la conexion a la base de datos
require_once('config.php');
//Se crea la clase Registro, la cual se encargara de registrar a los nuevos usuarios
class Registro
{
    //Se crean las propiedades que tomaran los valores que se ingresen en el formulario
    protected $nombre;
    protected $correo;
    protected $pass;
    protected $repeat;
    protected $cedula;
    protected $empresa;
    protected $rif;
    protected $direccion;
    protected $numero;
    //Se crea un metodo constructor para iniciar las propiedades
    public function Inicializar($name, $mail, $password, $rpt, $id, $emp, $num_rif, $address, $number)
    {
        $this->nombre = addslashes($_POST[$name]);
        $this->correo = addslashes($_POST[$mail]);
        $this->pass = addslashes($_POST[$password]);
        $this->repeat = addslashes($_POST[$rpt]);
        $this->cedula = addslashes($_POST[$id]);
        $this->empresa = addslashes($_POST[$emp]);
        $this->rif = addslashes($_POST[$num_rif]);
        $this->direccion = addslashes($_POST[$address]);
        $this->numero = addslashes($_POST[$number]);
    }
    //Se crea un metodo que se encarga de verificar que todos los campos fueron llenados
    public function Registrar()
    {
        if (isset($this->nombre) && !empty($this->nombre)
            && isset($this->correo) && !empty($this->correo)
            && isset($this->pass) && !empty($this->pass)
            && isset($this->repeat) && !empty($this->repeat)
            && isset($this->cedula) && !empty($this->cedula)
            && isset($this->empresa) && !empty($this->empresa)
            && isset($this->rif) && !empty($this->rif)
            && isset($this->direccion) && !empty($this->direccion)
            && isset($this->numero) && !empty($this->numero)
        ) {
            $q = "INSERT INTO
        usuarios(nombre_usuario,
        correo_usuario,
        contra_usuario,
        rpt_usuario,
        cedula_usuario,
        empresa_usuario,
        rif_usuario,
        direccion,
        numero)
        VALUES('$this->nombre', '$this->correo', '$this->pass', '$this->repeat',
        '$this->cedula', '$this->empresa', '$this->rif','$this->direccion','$this->numero')";
            $q2 = "INSERT INTO
        usuarios_nuevos (nombre_usuario,
        correo_usuario,
        contra_usuario,
        rpt_usuario,
        cedula_usuario,
        empresa_usuario,
        rif_usuario,
        direccion,
        numero, hora, fecha)
        VALUES('$this->nombre', '$this->correo', '$this->pass', '$this->repeat',
        '$this->cedula', '$this->empresa', '$this->rif','$this->direccion','$this->numero', now(), now())";
            mysql_query($q);
            mysql_query($q2);
        }
    }
    public function EnviarCorreo()
    {
        $destinatario = $this->correo;
        $asunto = "Bienvenido a Moldes y Matrices C.A.";
        $cuerpo = '
        <html>
        <head>
           <title>Bienvenido a Moldes y Matrices C.A.</title>
        </head>
        <body>
        <font face="Open Sans, Helvetica, sans-serif">
        <font color="#d64242"><h1>&iexcl;Bienvenido a Moldes y Matrices C.A.!</h1></font>
        <font color="#636363">
        <p>
        <b>Estimado ' . ucfirst($this->nombre) . '</b>. Nos complace
        recibirte como nuevo usuario en Moldes y Matrices. Aqu&iacute;, podr&aacute; solicitar las citas
        para el servicio que requiera, as&iacute; como tambi&eacute;n ver un
        historial completo de sus ordenes. Sin m&aacute;s que agregar, nos despedimos cordialmente.
        </p>
        </font>
        </body>
        </html>
        ';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: Daniel Da Costa <thedanielpsx@gmail.com>\r\n";
        $headers .= "Reply-To: thedanielpsx@gmail.com\r\n";
        mail($destinatario, $asunto, $cuerpo, $headers);
    }
    public function Redireccionar()
    { //Una vez registrado, este metodo se encarga de mostrar un mensaje de bienvenida y redireccionar a la pagina de inicio
        ?>
        <script>
            setTimeout(function () {
                window.location.href = "index.php";
            }, 5000);
        </script>
    <?php
    }
}
class Inicio extends Registro
{
    public function Inicializar($userSesion, $passSesion)
    {
        $this->nombre = addslashes($_POST[$userSesion]);
        $this->pass = addslashes($_POST[$passSesion]);
    }
    public function iniciarSesion()
    {
        if (isset($this->nombre) && !empty($this->nombre)
            && isset($this->pass) && !empty($this->pass)
        ) {
            $query = mysql_query("SELECT * FROM usuarios WHERE nombre_usuario = '$this->nombre'");
            while ($query_sesion = mysql_fetch_array($query)) {
                if ($this->pass == $query_sesion['contra_usuario']) {
                    $_SESSION['usuario'] = $this->nombre;
                    $_SESSION['id_usuario'] = $query_sesion['id_usuario'];
                    $_SESSION['rif'] = $query_sesion['rif_usuario'];
                    $_SESSION['cedula'] = $query_sesion['cedula_usuario'];
                    $_SESSION['direccion'] = $query_sesion['direccion'];
                    $_SESSION['numero'] = $query_sesion['numero'];
                }
            }
        }
    }
    public function mostrarNombre($data)
    {
        $_q = "SELECT * FROM usuarios WHERE id_usuario = '" . addslashes(trim($_GET['id'])) . "'";
        $_q_ = mysql_query($_q);
        while ($consulta = mysql_fetch_array($_q_)) {
            echo strtoupper($consulta['nombre_usuario']);
        }
    }
    public function Redirecciona()
    {
        header('Location: inicio.php?id=' . $_SESSION['id_usuario']);
    }
}
class Subir
{
    protected $nombreArchivo;
    protected $archivoSubido;
    public function __construct($name, $file)
    {
        $this->nombreArchivo = $name;
        $this->archivoSubido = $file;
    }
    public function Upload()
    {
        $directorio = 'imagenes/';
        $directorio_objetivo = $directorio . basename($_FILES[$this->archivoSubido]['name']);
        $tipoImagen = pathinfo($directorio_objetivo, PATHINFO_EXTENSION);
        $verificarImagen = getimagesize($_FILES[$this->archivoSubido]['tmp_name']);
        if ($_FILES[$this->archivoSubido]['error'] > 0) {
            echo $_FILES[$this->archivoSubido]['error'];
        } else {
            if ($verificarImagen != false) {
                if ($tipoImagen !== 'jpg' && $tipoImagen !== 'jpeg' && $tipoImagen !== 'png' && $tipoImagen !== 'xps' && $tipoImagen !== 'oxps') {
                    include 'vista-formato.php';
                    return false;
                } else {
                    move_uploaded_file($_FILES[$this->archivoSubido]['tmp_name'], $directorio_objetivo);
                    $query_image = "INSERT INTO imagenes VALUES('NULL','$this->nombreArchivo','$directorio_objetivo','{$_GET['id']}')";
                    $query_log = "INSERT INTO imagenes_historial VALUES('NULL', '$this->nombreArchivo', '$directorio_objetivo', '{$_GET['id']}', now(), now(),'{$_SESSION['usuario']}')";
                    mysql_query($query_image);
                    mysql_query($query_log);
                    include 'vista-subido.php';
                }
            } else {
                include 'vista-no-imagen.php';
                return false;
            }
        }
    }
}

class Contacto
{
    public $nombreContacto;
    public $email;
    public $asunto;
    public $comentario;
    public function __construct($name, $mail, $subject, $text)
    {
        $this->nombreContacto = addslashes($_POST[$name]);
        $this->email = addslashes($_POST[$mail]);
        $this->asunto = addslashes($_POST[$subject]);
        $this->comentario = addslashes($_POST[$text]);
    }
    public function EnviarEmailContacto()
    {
        if(isset($this->nombreContacto) && !empty($this->nombreContacto)
            && isset($this->email) && !empty($this->email)
            && isset($this->asunto) && !empty($this->asunto)){
            $destinatario = 'thedanielpsx@gmail.com';
            $asunto = $this->asunto;
            $mensaje = 'Detalles del formulario de contacto \n';
            $mensaje .= 'Nombre: ' . $this->nombreContacto . '\n';
            $mensaje .= 'Correo:' . $this->email . '\n';
            $mensaje .= 'Correo:' . $this->asunto . '\n';
            $mensaje .= 'Correo:' . $this->comentario . '\n';
            mail($destinatario,$asunto, $this->comentario);
        } else {
            echo 'Error al enviar el mensaje';
            die();
        }
    }
}
class Historial
{
    public $historial = array();
    public function TraerHistorial()
    {
        $sql = mysql_query("SELECT * FROM reparaciones WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'");
        while($row = mysql_fetch_array($sql)){
            $this->historial[] = $row;
        }
        return $this->historial;
    }
}
class Modificar
{
    public $modificar;
    public function TraerDatosUsuario($data)
    {
        $sql = mysql_query("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'");
        while($row = mysql_fetch_array($sql)){
            $this->modificar = $row[$data];
        }
        return $this->modificar;
    }
}
?>