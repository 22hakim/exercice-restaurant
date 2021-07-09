<?php 

namespace App\model;

use App\core\Connect;


class Dessert extends Connect {
    
    protected $_pdo;
    
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    /* récupere tout les desserts */
    public function recupAll(){
        
        $sql = "SELECT `id`, `name`, `price`, `date_creation`, `picture`, `sold` 
                FROM `dessert`";
        $query = $this->_pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC); 
        
        
    }


    
    
}