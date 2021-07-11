<?php 

namespace App\controller;

use App\controller\{FormController,PaiementController};
use App\model\{User, Dish, Dessert, Cocktail, Orders, OrderDetails};
use App\core\{Session, Cookie, Https};


/**
 * Managing all pages
 */
class FrontController{
    
    /**
     * Home page
     */
    public function home()
    {
        
        $this->render('home/index');
    
    }
    
    /**
     * contact page
     */
    public function contact()
    {
        
        $this->render('contact/contact');
    
    }
    
    /**
     * About page
     */
    public function about()
    {
        
        $this->render('about/about');
        
    }

    /**
     * Menu page
     */
    public function menu()
    {
        
        $dessert = new Dessert();
        $desserts = $dessert->recupAll();

        $cocktail = new Cocktail();
        $coktails = $cocktail->recupAll();
        
        $this->render('menus/menus', [  'desserts' => $desserts,
                                        'coktails'=> $coktails ]);
    
        
    }
    
    /**
     * Register page
     */
    public function register()
    {
        
        (Session::online()) ? Https::redirect('index.php') : '' ; 

        if($_POST):

            $form   = new FormController(new User());
            $messages = $form->registerForm($_POST);
        
        endif;

        $this->render('connexion/register', [ 'messages' => ($messages) ?? null ]);
    }


    /**
     * Login page
     */
    public function login()
    {
        
        (Session::online()) ? Https::redirect('index.php') : '' ; 
        
        if($_POST):

            $form   = new FormController(new User());
            $messages = $form->loginForm($_POST);
        
        endif;
        
        $this->render('connexion/login', [ 'messages' => ($messages) ?? null,
                                           'cookie'  => new Cookie ]);
        
    }
    
    /**
     * Logout page
     */
    public function logout()
    {
        
        Session::deconnect();
        
        header('Location: index.php');
        exit;
    }
    
    

    /**
     * Shopping cart display page
     */
    public function shoppingcart()
    {
        
        $this->render('order/shoppingcart');
        
    }
    
    /**
     * Redirect to order page if user Online or back to shoppingCart page
     */
    public function toPaiement()
    {
        
        $orderModel = new Orders();
        
        if(Session::online()) {
            $orderId = $orderModel->addOrder($_SESSION['user']['id']);
            Https::redirect('index.php?p=order&orderId='.$orderId);

        }else{
            Https::redirect('index.php?p=shoppingcart');
        }
        
    }
    
    /**
     * Order page
     */
    public function order()
    {
        
        $this->render('order/order');
        
    }
    
    /**
     * Paiement page
     */
    public function paiement()
    {

        $orderDetails = new OrderDetails();
        $orderlines = $orderDetails->recupOrderDetail($_GET['orderNum']);
        
        $totalAmount = 0;
        foreach($orderlines as $orderline)
        {
            $totalAmount += $orderline['quantity']*$orderline['price'];
        }
        
        $intent = PaiementController::paiement($totalAmount);
        $this->render('paiement/paiement', [
                                                'totalAmount'=>$totalAmount,
                                                'intent'=>$intent
                                            ]);
    
    }
    

    /**
     * Update order statut and amount in database.
     */
    public function updateorder()
    {
        
        if(isset($_GET['amount']) == false ){ 
            Https::redirect('index.php');
            
        }else{    
            $orderModel = new Orders();
            $orderModel->updateOrder($_GET['amount'], $_GET['orderId']);
            Https::redirect('index.php?p=success');
            
        }
        
    }
    
    /**
     * Paiement success page
     */
    public function success()
    {
        
        $this->render('paiement/success');
        
    }
    
    /**
     * Render that provide all views displaying
     */
    public function render(string $path,$array = [])
    {
        // create dynamically $var 
        if(count($array) > 0){
            foreach($array as $key => $value)
            {
                ${$key} = $value;
            } 
        }
        
        $session = new Session;
        $https   = new Https;

        $path = $path.".php";
        require 'template/template.php';
        
    }

}