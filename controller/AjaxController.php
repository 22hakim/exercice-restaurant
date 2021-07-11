<?php 

namespace App\controller;

use App\model\{Dish,OrderDetails};

/**
 * Managing all Ajax request 
 */
class AjaxController
{
    
    /**
     * fetching all dishes in Json format 
     */   
    public static function allDish()
    {

        $dish = new Dish();
        echo json_encode($dish->recupAll());
        
    }
    
    /**
     * fetching all dishes in Html format 
     */     
    public static function allDishHtml()
    {

        $dish = new Dish();
        $dishes = $dish->recupAll();
        require './views/menus/part/allDish.php';
        
    }
    
    /**
     * fetching meat dishes 
     */   
    public static function meatDish()
    {
        
        $dish = new Dish();
        $dishes = $dish->recupDishByCategory('meat');
        require './views/menus/part/allDish.php';
        
    }

    /**
     * fetching vegan dishes 
     */   
    public static function veganDish()
    {
        
        $dish = new Dish();
        $dishes = $dish->recupDishByCategory('vegan');
        require './views/menus/part/allDish.php';
        
    }

    /**
     * fetching fish dishes 
     */   
    public static function fishDish()
    {
        
        $dish = new Dish();
        $dishes = $dish->recupDishByCategory('fish');
        require './views/menus/part/allDish.php';
        
    }
    
    /**
     * save OrderLines
     */  
    public static function saveOrderlines($datas)
    {
        $datas = $_POST;
        $orderDetails = new OrderDetails();
        $response = $orderDetails->addOrderDetail($datas);
        echo json_encode($response);
        
    }
    
    
}