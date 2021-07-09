<?php 

namespace App\model;

use App\core\Connect;

class User extends Connect{

    protected $_pdo;
    
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    
    public function addUser($login,$password,$mail){
        
        
        $password = password_hash($password, PASSWORD_DEFAULT); // je hash mon mot de passe 
        
        $sql = "INSERT INTO `user`( `login`, `password`, `email`) 
                VALUES (:login,:password,:email)";
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                ':login' => $login,
                ':password' => $password,
                ':email' => $mail
        ]);
        
    }
    


    public function recupUserByMail($mail){
        
        $sql = "SELECT `id`, `login`, `password`, `email`, `creation_date` FROM `user` WHERE email = :mail";
        $query = $this->_pdo->prepare($sql);
        $query->execute([
                ':mail' => $mail,
            ]);
        return $query->fetch(\PDO::FETCH_ASSOC); 
        
    }
    
    

}