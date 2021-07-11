<?php 

namespace App\model;

use App\core\Connect;
use \PDO;


class Dessert extends Connect 
{
    
    protected $_pdo;
    
    public function __construct()
    {
        $this->_pdo = $this->connexion();
    }
    
    /**
     * Fetching all Deserts
     */
    public function recupAll()
    {
        
        $sql = "SELECT `id`, `name`, `price`, `date_creation`, `picture`, `sold` 
                FROM `dessert`";
        $query = $this->_pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC); 
        
    }


    
    
}