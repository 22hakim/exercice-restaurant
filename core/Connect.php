<?php 

namespace App\core;

use \PDO; 

/**
 * Connection to dataBase class
 */
class Connect
{
    
    const HOST      = "db.3wa.io";
    const DB_NAME   ="hako_restaurant";
    const USER      ="hako";
    const PASSWORD  = "d844f53f2e4879e6c6f7dc31b378559f";
    
    /**
     * Connect to database
     */
    public function connexion(){
        
        $pdo = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, self::USER, self::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES UTF8');
        return $pdo;
        
    }

}
