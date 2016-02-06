<?php

class Database
{

    const HOST = 'mysql:host=localhost;dbname=blog_poo';
    const USER = 'root';
    const PASS = 'Philou1984';
    /* const PASS = '';*/
 /*   private static $pdo;*/


    public static function getPDO()
    {
        try
        {
            $pdo = new PDO(self::HOST, self::USER, self::PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch (Exception $errorconnexion) {
                die('Erreur de connexion ' . $errorconnexion->getmessage());
        }

    }

    /*public static function getPDO()
    {
        if (self::$pdo === null) {/* permet de créer une connection à la bdd une seule fois */
    /*        try {
                $pdo = new PDO(self::HOST, self::USER, self::PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo = $pdo;
            } catch (Exception $errorconnexion) {
                die('Erreur de connexion ' . $errorconnexion->getmessage());
            }
        }
        return self::$pdo;
    }*/

}
