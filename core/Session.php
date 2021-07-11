<?php 

namespace App\core;


/**
 * Method using $_SESSION
 */ 
class Session {
    
    /**
     * destroy Session when user logout
     */ 
    public static function deconnect()
    {
        
        session_start();
        session_destroy();
        
    }
    
    /**
     * set Session for user
     */ 
    public static function setUserSession(array $sessions):void
    { 
        
        foreach($sessions as $sessionKey => $sessionValue){

            $sessionValue = self::checkInput($sessionValue);
            $_SESSION['user'][$sessionKey]  = $sessionValue;
            
        }
        
    }
    
    /**
     * encode int and string
     */ 
    public static function checkInput($data)
    {

         return (is_numeric($data)) ? intval($data) : htmlspecialchars($data);

    }
    
    /**
     * check if user is online
     */  
    public static function online() :bool 
    {
        
        return (array_key_exists('user', $_SESSION));
  
    }
    

}