<?php

namespace App\Class;


use Exception;
use PDO;

class DBConnect
{

    public static function getPDO(): PDO
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=exo_contact;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Problème avec la base de données ! ' . $e->getMessage());
        }

        return $db;

    }


}