<?php

class Config {
    private static $dsn = 'mysql:host=localhost;dbname=crud_automoveis';
    private static $user = 'root';
    private static $pwd = '';
    private static $pdo = null;

    public static function connect(){
        if(self::$pdo == null){
            try{
                self::$pdo = new PDO(self::$dsn, self::$user, self::$pwd);
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        return self::$pdo;
    }

    public static function disconnect(){
        self::$pdo = null;
    }
}

?>
