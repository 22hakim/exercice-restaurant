<?php 

namespace App\controller;

use App\model\{OrderDetails};


class PaiementController{
    
    public static function paiement($amount){

        // je dois mettre max 2 chiffre apres la virgule 
        $amount = floatval(number_format($amount, 2, '.', ' ')); 
        // var_dump($amount);

        // le montant doit etre en centimes donc je multiplie mon montant par 100 pour avoir un entier 
        $amount =  $amount*100;
        
        //var_dump($amount);
        
        // recuperation de l'autoload de composer pour gerer les classes de stripe 
        require 'vendor/autoload.php';  
                
        \Stripe\Stripe::setApiKey('sk_test_iH3QPiqdGQTV6Nh6S5tgPRBR00UdczvBvP');
        
        return \Stripe\PaymentIntent::create([
                'amount' => $amount, 
                'currency' => 'eur'
        ]);   
        
        
        
        
    }
}