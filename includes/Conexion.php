<?php
 

class Conexion {
    private static $conn;

    

    private function __construct()
    {
       
    }

    public static function getConexion()
    {
        if (is_null(self::$conn)) {
            try {
                include_once('config.inc.php');
                self::$conn = new PDO('mysql:dbname=' . DB_NAME . ';host=' . HOST, USER, PASS);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->exec('set charset utf8');
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return;
            }
        }
        return self::$conn;
    }

    public static function closeConexion()
    {
        if (isset(self::$conn)) {
            self::$conn = null;
        }
    }
}