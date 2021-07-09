<?php 

namespace App\controller;

use App\controller\{FormController,PaiementController};
use App\model\{User, Dish, Dessert, Cocktail, Orders, OrderDetails};
use App\core\{Session, Cookie, Https};


class FrontController{
    
    public function test(){
        
        echo ' page de test <br>';

    
    }
    
    public function home(){
        
        $this->render('home/index');
    
    }
    
    public function contact(){
        
        $this->render('contact/contact');
    
    }
    
    public function about(){
        
        $this->render('about/about');
    
        
    }

    public function menu(){
        
        $dessert = new Dessert();
        $desserts = $dessert->recupAll();

        $cocktail = new Cocktail();
        $coktails = $cocktail->recupAll();
        
        $this->render('menus/menus', [  'desserts' => $desserts,
                                        'coktails'=> $coktails ]);
    
        
    }
    
    public function register(){
        
        (Session::online()) ? Https::redirect('index.php') : '' ; 

        if($_POST):

            $form   = new FormController(new User());
            $messages = $form->registerForm($_POST);
        
        endif;

        $this->render('connexion/register', [ 'messages' => ($messages) ?? null ]);
    }

    public function login(){
        
        (Session::online()) ? Https::redirect('index.php') : '' ; 
        

        if($_POST):

            $form   = new FormController(new User());
            $messages = $form->loginForm($_POST);
        
        endif;
        
        
        $this->render('connexion/login', [ 'messages' => ($messages) ?? null,
                                           'cookie'  => new Cookie ]);
        
    }
    
    public function logout(){
        
        Session::deconnect();
        
        header('Location: index.php');
        exit;
    }
    
    
    // controller qui permet de valider le panier 
    public function shoppingcart(){
        
        $this->render('order/shoppingcart');
        
    }
    
    // controller qui permet d'enregistrer la commande s'il est en ligne ou redirige vers shoppingcart
    public function toPaiement(){
        
        $orderModel = new Orders();
        
        if(Session::online()) {
            $orderId = $orderModel->addOrder($_SESSION['user']['id']);
            Https::redirect('index.php?p=order&orderId='.$orderId);
        }else{
            Https::redirect('index.php?p=shoppingcart');
        }
        
    }
    
    // controller qui affiche la commande validé et permet de passer au paiement 
    public function order(){
        
        $this->render('order/order');
        
    }
    
    // controller qui affiche le paiement 
    public function paiement(){
        // je recupere le details de mes commandes 
        $orderDetails = new OrderDetails();
        $orderlines = $orderDetails->recupOrderDetail($_GET['orderNum']);
        
        $totalAmount = 0;
        foreach($orderlines as $orderline){
        
            $totalAmount += $orderline['quantity']*$orderline['price'];

            
        }
        
        $intent = PaiementController::paiement($totalAmount);
        $this->render('paiement/paiement', [
                                                'totalAmount'=>$totalAmount,
                                                'intent'=>$intent
                                            ]);

        
    }
    
    public function updateorder(){
        
        var_dump($_GET);
        /*
        'amount' => string '24.6' (length=4)
        'orderId' => string '16' (length=2)
        */
        if(isset($_GET['amount']) == false ){
            
            Https::redirect('index.php');
            
        }else{
            
            $orderModel = new Orders();
            $orderModel->updateOrder($_GET['amount'], $_GET['orderId']);
            Https::redirect('index.php?p=success');
            
            
            
        }
        
    }
    
    public function success(){
        
        $this->render('paiement/success');
        
    }
    
    public function render(string $path,$array = []){
    
    // permet de créer des variables dynamiquement, je leur donne le nom des valeurs des tableaux passé plus bas ex: fonction menu
        if(count($array) > 0){
            foreach($array as $key => $value){
                ${$key} = $value;
                // exemple on va créer la variable $dessert avec dedans le contenu de $dessert du parametre
            } 
        }
        
        $session = new Session;
        $https   = new Https;

        $path = $path.".php";
        require 'template/template.php';
        
    }

}