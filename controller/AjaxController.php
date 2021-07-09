<?php 

namespace App\controller;

use App\model\{Dish,OrderDetails};


class AjaxController{
    
    
    // fetch('index.php?ajax=allDish').then(res => res.json()).then(data => console.log(data))
    public static function allDish(){
        // façon ou je recupere le code en json
        $dish = new Dish();
        echo json_encode($dish->recupAll());
        
    }
    
    public static function allDishHtml(){
        // façon ou je recupere le code en json
        $dish = new Dish();
        $dishes = $dish->recupAll();
        require './views/menus/part/allDish.php';
        
    }
    
    public static function meatDish(){
        
        $dish = new Dish();
        $dishes = $dish->recupDishByCategory('meat');
        require './views/menus/part/allDish.php';
        
    }

    public static function veganDish(){
        
        $dish = new Dish();
        $dishes = $dish->recupDishByCategory('vegan');
        require './views/menus/part/allDish.php';
        
    }

    public static function fishDish(){
        
        $dish = new Dish();
        $dishes = $dish->recupDishByCategory('fish');
        require './views/menus/part/allDish.php';
        
    }
    
    public static function saveOrderlines(){
        $datas = $_POST;
        // echo json_encode($datas);
        $orderDetails = new OrderDetails();
        $response = $orderDetails->addOrderDetail($datas);
        echo json_encode($response);
        
    }
    
    

}