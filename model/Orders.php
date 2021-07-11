<?php 

namespace App\model;

use App\core\Connect;

class Orders extends Connect 
{
    
    protected $_pdo;
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();

    }
    
    /**
     * add ORder in DB
     */
    public function addOrder($userid)
    {
        $sql = "INSERT INTO `orders`( `user_id`) 
                VALUES (:userid)";
        $query= $this->_pdo->prepare($sql);

        $query->execute([
            'userid' => $userid
            ]);
            
        return $this->_pdo->lastInsertId();

    }
    
    /**
     * update ORder price and statut in DB
     */
    public function updateOrder($amount, $orderId){
        
        $sql = "UPDATE 
                    `orders` 
                SET 
                    `total_price`=:price,
                    `paid`= 'yes' 
                WHERE `id`= :id";
        $query= $this->_pdo->prepare($sql);
        $query->execute([
            ':price' => $amount,
            ':id'    => $orderId
            ]);
        
    }
    
}