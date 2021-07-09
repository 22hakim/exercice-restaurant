<?php 

namespace App\core;

use \PDO; // pour dire que j'ai besoin d'une classe native PHP
/*
User : hako
Password : d844f53f2e4879e6c6f7dc31b378559f
Host : db.3wa.io
*/
class Connect{
    
    const HOST = "db.3wa.io";
    const DB_NAME ="hako_restaurant";
    const USER ="hako";
    const PASSWORD = "d844f53f2e4879e6c6f7dc31b378559f";
    

    public function connexion(){
        
        $pdo = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, self::USER, self::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES UTF8');
        return $pdo;
        
    }

}
