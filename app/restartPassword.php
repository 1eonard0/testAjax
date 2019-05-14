<?php
include_once('../includes/Conexion.php');
include_once('User.php');

$email = $_GET['email'];

if (isset($email)) {
    
    $result = User::findByEmail(Conexion::getConexion(),$email);
    Conexion::closeConexion();

    if (isset($result)) {
        echo $result['email'];
    }else{
        echo "false";
    }   
    
}