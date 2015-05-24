<?php
require_once('config.php');
class ValidarInicio{
    protected $nombreInicio;
    protected $contraInicio;
    public function __construct($name,$pass){
        $this->nombreInicio = addslashes($_POST[$name]);
        $this->contraInicio = addslashes($_POST[$pass]);
    }
    public function validarCampos(){
        $query = mysql_query("SELECT nombre_usuario,contra_usuario FROM usuarios WHERE nombre_usuario = '$this->nombreInicio' AND contra_usuario = '$this->contraInicio'");
        if(strlen($this->nombreInicio) == 0 && strlen($this->contraInicio) == 0){
            echo 'Incompleto';
            return false;
        } elseif(strlen($this->nombreInicio) == 0){
            echo 'Incompleto2';
            return false;
        } else {
            if(strlen($this->contraInicio) == 0){
                echo 'Incompleto3';
                return false;
            } elseif(mysql_num_rows($query) == 0){
                echo 'cuentaInexistente';
                return false;
            }
        }
    }
}
$validarInicio = new ValidarInicio('nombreInicio', 'passInicio');
$validarInicio->validarCampos();
?>