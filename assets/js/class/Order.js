import Ajax from './Ajax.js';
import Basket from './Basket.js';


export default class Order{
    
    constructor(action){
        
        this.basketClass = new Basket(); 
        this.AjaxClass   = new Ajax();
        this.verif(action);
        
    }
    
    verif(action){
        
        switch(action){
            case 'save-orderlines':
                this.saveOrderlines();
            break;
        }
        
    }
    
    saveOrderlines(){

        // 1) je recupere mon panier 
        const orderlines = this.basketClass.loadBasket();
        
        // je recupere l'id de l'user que j'ai mis dans la page order.php
        const orderId = document.querySelector('[data-order]').dataset.order
        //console.log(user_id)
        
        // 3) je boucle sur chaque ligne du panier 
        for(const orderline of orderlines){
            //console.log(orderline) // {id: "1", name: "Grilled mussels", price: 14, quantity: 1}
            
            //4) je les mets dans un formData
            const form = new FormData()
            form.append('product_id',orderline.id);
            form.append('order_id',orderId);
            form.append('quantity',orderline.quantity);
            
            
            // 5) je lance ma requete ajax ( doit avoir une url qui appelera une fonction du ajaxController.php)
            this.AjaxClass.requestPost('index.php?ajax=saveOrderlines',form);
            
            
            // 6) je redirige vers la page de paiement de la commande
            document.location.href="index.php?p=paiement&orderNum="+orderId; 
            
            
        }
        
        
    };
    
    
    
}