<?php 

namespace App\model;

use App\core\Connect;


class Dish extends Connect 
{
    
    protected $_pdo;
    
    public function __construct()
    {
        
        $this->_pdo = $this->connexion();
    }
    
    /**
     * fetching all Dishes
     */
    public function recupAll(){
        
        $sql = "SELECT `id`, `name`, `description`, `price`, `picture`, `category`, `date_creation`, `sold`       FROM `main_dish`";
        $query = $this->_pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC); 
          
    }


    /**
     * fetching dishes by category 
     */
    public function recupDishByCategory(string $category){
        
        $sql = "SELECT `id`, `name`, `description`, `price`, `picture`, `category`, `date_creation`, `sold`       FROM `main_dish`
                WHERE category = :category";
        $query = $this->_pdo->prepare($sql);
        $query->execute([ 
                ':category' => $category
            ]);
        return $query->fetchAll(\PDO::FETCH_ASSOC); 

    }
    
    
}