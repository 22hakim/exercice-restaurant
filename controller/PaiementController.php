<?php 

namespace App\controller;

use App\model\{OrderDetails};


/**
 * Manage paiement
 */
class PaiementController{
    
    public static function paiement($amount)
    {

        $amount = floatval(number_format($amount, 2, '.', ' ')); 
        $amount =  $amount*100;
        
        require 'vendor/autoload.php';  
                
        \Stripe\Stripe::setApiKey('sk_test_iH3QPiqdGQTV6Nh6S5tgPRBR00UdczvBvP');
        
        return \Stripe\PaymentIntent::create([
                'amount' => $amount, 
                'currency' => 'eur'
        ]);   

    }

}