<?php 

namespace App\core;

class Autoloader{
    
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
        
    }
    
    static function autoload($namespace){

        // var_dump($namespace); 
        /*  'App\controller\FrontController' */
        
        $class = str_replace("\\", "/", $namespace);
        // var_dump($class);
        /* 'App/controller/FrontController' */
        
        $class = str_replace("App", ".", $class);
        // var_dump($class);
        /* './controller/FrontController' */
        
        require_once $class.'.php';
        /* require_once './controller/FrontController.php'; */

        
    }
    
    
    
}