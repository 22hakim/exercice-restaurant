<?php 

use App\core\{Autoloader, Https };
use App\controller\{FrontController, AjaxController};

session_start();

require_once './core/Autoloader.php';

Autoloader::register();

$routeur = new FrontController();

if(isset($_GET['ajax'])):

    $methodAjax = $_GET['ajax'];
    
    //echo json_encode($_POST);
    
    
    (method_exists( AjaxController::class, $methodAjax)) ? AjaxController::$methodAjax()  : $routeur->index() ;    
    

elseif(isset($_GET['p'])):
	
    $method = $_GET['p'];
    
    (method_exists( FrontController::class, $method)) ? $routeur->$method()  : $routeur->index() ;
    
    
else:
    
    header('Location: index.php?p=home');
    exit; 
    
endif;