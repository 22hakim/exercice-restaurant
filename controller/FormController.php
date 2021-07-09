<?php 

namespace App\controller;

use App\model\User;
use App\core\{ Session, Cookie };

class FormController {
    
    
    protected User $_user;

    
    public function __construct(User $user){
        
        $this->_user = $user;

    }
    
    public function registerForm(array $data){

        $messages = [];
        
        // verif 1
        if(empty($data['login']) || empty($data['password'])|| empty($data['password2']) || empty($data['mail']))
            $messages['errors'][] = "veuillez remplir tous les champs";

        // verif 2
        if(!strlen($data['login']) >= 3)
            $messages['errors'][] = "login trop court ";
    
            // verif 3
        if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) 
            $messages['errors'][] = "L'adresse email est incorrecte ";
    
        // verif 4
        if ($data['password'] !== $data['password2']) 
            $messages['errors'][] = "Les mots de passe doivent être les memes";

        $exist = $this->_user->recupUserByMail($data['mail']);
    
        if($exist)
            $messages['errors'][] = "L'email correspond à un compte déja existant";

        if(empty($messages['errors'])){
            
            $this->_user->addUser($data['login'],$data['password'],$data['mail']);
            $messages['success'] = ['bravo Inscription réussie'];
            
        }
        
        return $messages;
    }

    public function loginForm(array $data){
        
        // verif 1
        if(empty($data['password']) || empty($data['mail'])){
            
            return ['errors' => ["veuillez remplir tous les champs"]] ;

        }
        else{ 
            
            $exist = $this->_user->recupUserByMail($data['mail']);
            
            if(!$exist){
                
                return ['errors' => ["L'email n'existe pas"]];
                
            }else if (password_verify($data['password'], $exist['password'])) {  
                
                    Session::setUserSession($exist);

               

                (isset($data['remember'])) ? Cookie::setCookies($data) : Cookie::deleteCookie($data);

            
            } else {
                
                return ['errors' => ['Le mot de passe est invalide.']];
            }

            
        }
        
        header('location: index.php');
        exit;
            
    }

    
}