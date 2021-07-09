<?php 

namespace App\core;

class Https {


    // function qui me facilite les redirections 
    public static function redirect(string $path) :void {
    
        header('Location: '.$path);
        exit;
        
    } 
    
    public static function active(string $path)  {
    
        return ($_GET['p'] === $path) ? "class = 'active'" : '';
            
    } 
    
}