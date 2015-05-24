<?php
require_once('config.php');
class ValidarRegistro {
    protected $nombreUsuario;
    protected $correoUsuario;
    protected $passUsuario;
    protected $rptPass;
    protected $cedulaUsuario;
    protected $empresaUsuario;
    protected $rifUsuario;
    protected $direccionUsuario;
    protected $numeroUsuario;
    public function __construct($username,$useremail,$userpass,$userrepeat,$userid,$useremp,$userrif,$addressuser,$numbuser){
        $this->nombreUsuario = addslashes($_POST[$username]);
        $this->correoUsuario = addslashes($_POST[$useremail]);
        $this->passUsuario = addslashes($_POST[$userpass]);
        $this->rptPass = addslashes($_POST[$userrepeat]);
        $this->cedulaUsuario = addslashes($_POST[$userid]);
        $this->empresaUsuario = addslashes($_POST[$useremp]);
        $this->rifUsuario = addslashes($_POST[$userrif]);
        $this->direccionUsuario = addslashes($_POST[$addressuser]);
        $this->numeroUsuario = addslashes($_POST[$numbuser]);
    }
    public function ValidarValores(){
        $query = mysql_query("SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = '$this->nombreUsuario'");
        $query2 = mysql_query("SELECT correo_usuario FROM usuarios WHERE correo_usuario = '$this->correoUsuario'");
        $query3 = mysql_query("SELECT cedula_usuario FROM usuarios WHERE cedula_usuario = '$this->cedulaUsuario'");
        if(strlen($this->nombreUsuario) == 0 && strlen($this->correoUsuario) == 0
        && strlen($this->passUsuario) == 0 && strlen($this->rptPass) == 0
        && strlen($this->cedulaUsuario) == 0 && strlen($this->empresaUsuario) == 0
        && strlen($this->rifUsuario) == 0){
            echo 'Incompleto';
        }elseif(strlen($this->nombreUsuario) == 0){
            echo 'Incompleto2';
        } else {
            if(strlen($this->correoUsuario) == 0){
                echo 'Incompleto3';
            } elseif(strlen($this->passUsuario) == 0){
                echo 'Incompleto4';
            } else {
                if(strlen($this->rptPass) == 0){
                    echo 'Incompleto5';
                }elseif(strlen($this->cedulaUsuario) == 0){
                    echo 'Incompleto6';
                } else {
                    if(strlen($this->empresaUsuario) == 0){
                        echo 'Incompleto7';
                    } elseif(strlen($this->rifUsuario) == 0){
                        echo 'Incompleto8';
                    } else {
                        if(mysql_num_rows($query) > 0){
                            echo 'nombreExistente';
                        } elseif(mysql_num_rows($query2) > 0){
                            echo 'correoExistente';
                        } else {
                            if(!filter_var($this->correoUsuario, FILTER_VALIDATE_EMAIL)){
                                echo 'correoFalso';
                            } elseif($this->passUsuario !== $this->rptPass){
                                echo 'noCoinciden';
                            } else {
                                if(mysql_num_rows($query3) > 0){
                                    echo 'cedulaExistente';
                                } elseif(strlen($this->direccionUsuario) == 0){
                                    echo'Incompleto9';
                                } else {
                                    if(strlen($this->numeroUsuario) == 0){
                                        echo 'Incompleto10';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}
$validacion = new ValidarRegistro('nombreUsuario', 'correoUsuario', 'passUsuario', 'rptpassUsuario', 'cedulaUsuario', 'empresaUsuario', 'rifUsuario','direccionUsuario','numeroUsuario');
$validacion->ValidarValores();






?>