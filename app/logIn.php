<?php
include_once('../includes/Conexion.php');
include_once('User.php');

$email = $_GET['email'];
$pass = $_GET['password'];

if (isset($email) && isset($pass)) {
    
    $result = User::logIn(Conexion::getConexion(),$email,$pass);
    Conexion::closeConexion();

    if (isset($result)) {
        echo $result['name'];
    }else{
        echo "false";
    }   
    
}



