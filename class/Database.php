<?php

class Database
{

    const HOST = 'mysql:host=localhost;dbname=blog_poo';
    const USER = 'root';
    const PASS = '';

    private static $pdo;


    public static function getPDO()
    {
        if (self::$pdo === null)
        {
            try {
                $pdo = new PDO(self::HOST, self::USER, self::PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo = $pdo;
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        }
        return self::$pdo;
    }

}


