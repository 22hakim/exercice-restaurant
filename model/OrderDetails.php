<?php 

namespace App\model;

use App\core\Connect;


class OrderDetails extends Connect 
{
    
    protected $_pdo;
    
    public function __construct()
    {
        
        $this->_pdo = $this->connexion();
    }
    
    /**
     * add order Details in DB
     */
    public function addOrderDetail(array $data)
    {

        $sql = "INSERT INTO `orderdetails`( `order_id`, `product_id`, `quantity`, `price`) 
                VALUES (:order_id,:product_id,:quantity,:price)";
        $q = $this->_pdo->prepare($sql);
        
        $q->execute([
                    ':order_id' => $data['order_id'],
                    ':product_id' => $data['product_id'],
                    ':quantity' => $data['quantity'],
                    ':price' => $this->recupPriceProduct($data['product_id'])
                    ]);
                    
        return $data;
                    
    }

    /**
     * Recup order Details
     */
    public function recupOrderDetail(int $orderId)
    {

        $sql = "SELECT `id`, `order_id`, `product_id`, `quantity`, `price` 
                FROM `orderdetails` 
                WHERE `order_id` = :orderId";
        $q = $this->_pdo->prepare($sql);
        
        $q->execute([
                    ':orderId' => $orderId
                    ]);
                    
        return $q->fetchAll(\PDO::FETCH_ASSOC);
        
    }
    
    /**
     * method that recup product detail price called in addOrderDetail 
     */
    public function recupPriceProduct(int $idProduct)
    {
        
        $sql="SELECT `ref`, `price` FROM `product` WHERE `ref` = :productId";
        $q = $this->_pdo->prepare($sql);
        
        $q->execute([   ':productId' => $idProduct  ]);
        $value = $q->fetch(\PDO::FETCH_ASSOC); 
        
        return $value['price'];
        
    }



}