<?php 

namespace App\model;

use App\core\Connect;
use \PDO;


class Cocktail extends Connect 
{
    
    protected $_pdo;
    
    public function __construct()
    {
        
        $this->_pdo = $this->connexion();
    }
    
    /**
     * fetching all cocktails
     */
    public function recupAll()
    {
        
        $sql = "SELECT `id`, `name`, `price`, `date_creation`, `picture`, `sold` 
                FROM `cocktail`";
        $query = $this->_pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC); 
          
    }

}