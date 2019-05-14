<?php
include_once('../includes/Conexion.php');
include_once('User.php');

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

if (isset($name) && isset($email) && isset($pass)) {
    if (User::findByEmail(Conexion::getConexion(), $email) == null) {

        $result = User::addUser(Conexion::getConexion(),$name,$email,$pass);
        Conexion::closeConexion();

        if ($result) {
            echo "register successfully. congratulation";
        }else{
            echo "ouch. something was wrong!.";
        } 
    } else {
        echo "The inserted email already exists.";
    }
    
}else{
    echo "There's fields empty.";
}