<?php

class User{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public static function logIn($con,$email,$pass)
    {
        if (isset($con)) {
            $query = 'select id, name, email from user where email = :email and password = :pass';
            $statement = $con->prepare($query);
            $statement->execute(array(':email' => $email, ':pass' => $pass));
            $resultSet = $statement->fetch();

            if ($resultSet) {
                return $resultSet;
            }else{
                return null;
            }
        }
    }

    public static function addUser($con, $name, $email, $password)
    {
        if (isset($con)) {
            $query = 'insert into user(name,email,password) values(:name, :email, :password)';
            $statement = $con->prepare($query);
            $result = $statement->execute(array(':name' => $name,':email' => $email, ':password' => $password));
            
            return $result;
            
        }
    }

    public static function findByEmail($con,$email)
    {
        if (isset($con)) {
            $query = 'select email, password from user where email = :email';
            $statement = $con->prepare($query);
            $statement->execute(array(':email' => $email));
            $resultSet = $statement->fetch();

            if ($resultSet) {
                return $resultSet;
            }else{
                return null;
            }
        }
    }
}