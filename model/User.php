<?php 

namespace App\model;

use App\core\Connect;
use \PDO;

class User extends Connect
{

    protected $_pdo;
    
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    /**
     * add user in DB
     */
    public function addUser(string $login, string $password, string $mail)
    {
        
        $password = password_hash($password, PASSWORD_DEFAULT); 
        
        $sql = "INSERT INTO `user`( `login`, `password`, `email`) 
                VALUES (:login,:password,:email)";
        $query = $this->_pdo->prepare($sql);

        $query->execute([
                ':login' => $login,
                ':password' => $password,
                ':email' => $mail
        ]);
        
    }
    
    /**
     * fetch user by mail 
     */
    public function recupUserByMail(string $mail)
    {
        
        $sql = "SELECT `id`, `login`, `password`, `email`, `creation_date` FROM `user` WHERE email = :mail";
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                ':mail' => $mail,
            ]);
        return $query->fetch(PDO::FETCH_ASSOC); 
        
    }
    
    

}