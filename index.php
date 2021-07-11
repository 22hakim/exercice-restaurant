<?php 

use App\core\Autoloader;
use App\controller\{FrontController, AjaxController};

session_start();

require_once './core/Autoloader.php';

Autoloader::register();
$routeur = new FrontController();

/**
 * Manage Ajax requests
 */
if(isset($_GET['ajax'])):

    $methodAjax = $_GET['ajax'];
        
    (method_exists( AjaxController::class, $methodAjax)) 
        ? AjaxController::$methodAjax()  
        : $routeur->home() ;    
    
/**
 * Manage routeur requests
 */
elseif(isset($_GET['p'])):
	
    $method = $_GET['p'];
    
    (method_exists( FrontController::class, $method)) 
        ? $routeur->$method()  
        : $routeur->home() ;
    
    
else:
    
    header('Location: index.php?p=home');
    exit; 
    
endif;