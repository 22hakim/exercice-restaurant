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

        const orderlines = this.basketClass.loadBasket();
        const orderId = document.querySelector('[data-order]').dataset.order
        
        for(const orderline of orderlines){

            const form = new FormData()
            form.append('product_id',orderline.id);
            form.append('order_id',orderId);
            form.append('quantity',orderline.quantity);
        
            this.AjaxClass.requestPost('index.php?ajax=saveOrderlines',form);

        }
        
        document.location.href="index.php?p=paiement&orderNum="+orderId;
        
    };
    
    
    
}