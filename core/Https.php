<?php 

namespace App\core;


/**
 * https class 
 */ 
class Https {


    /**
     * redirection method
     */ 
    public static function redirect(string $path) :void 
    {
    
        header('Location: '.$path);
        exit;
        
    } 
    
    /**
     * manage tab header
     */ 
    public static function active(string $path)  
    {
    
        return ($_GET['p'] === $path) ? "class = 'active'" : '';
            
    } 
    
}