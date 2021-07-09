import Ajax from './Ajax.js';

export default class Filter {
    
    
    constructor(target){
        
        this.AjaxClass = new Ajax();
        this.verif(target);
        
    }
    
    verif(target){
        
        switch(target){
            
            case 'all':
                this.AjaxClass.requestHtml('index.php?ajax=allDishHtml');
            break;
            case 'meat':
                this.AjaxClass.requestHtml('index.php?ajax=meatDish');
            break;
            case 'vegan':
                this.AjaxClass.requestHtml('index.php?ajax=veganDish');
            break;
            case 'fish':
                this.AjaxClass.requestHtml('index.php?ajax=fishDish');
            break;
        }
        
        
        
    }
    
}