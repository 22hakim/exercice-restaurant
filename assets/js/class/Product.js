import Basket from './Basket.js';
import Modal from './Modal.js';
import DisplayBasket from './DisplayBasket.js';

export default class Product {
    
    
    constructor(){

        this.basket = new Basket();
        this.modal  = new Modal();

    }
    
    makeProduct(event){
        
        const parentElement = event.target.parentElement
        const id    = parentElement.dataset.id
        const name  = parentElement.querySelector('p span').textContent
        const price = +parentElement.dataset.price;         

        this.addProduct(id, price, name ); 
    }

    
    addProduct(productId,productPrice, productName){
        
        
        const shoppingCart = this.basket.loadBasket();
        
        const product = {
            id : productId,
            name : productName,
            price : productPrice,
            quantity : 1
        }
        

        for( let index = 0; index < shoppingCart.length ; index++){
            
            if(shoppingCart[index].id == product.id){
                
                shoppingCart[index].quantity++;
                this.basket.saveBasket(shoppingCart);
                this.refreshBasketIcon();
                return 
        
            }
            
        }
        
     
        shoppingCart.push(product);


        this.basket.saveBasket(shoppingCart);
        this.refreshBasketIcon()
        
    }
    

    deleteProduct(event){
        

        const shoppingCart = this.basket.loadBasket();
        const newShopcart = shoppingCart.filter(product => product.id != event.dataset.deleteId)

            
        this.basket.saveBasket(newShopcart);
        
        new DisplayBasket();
        this.refreshBasketIcon()
    }
    
    
    refreshBasketIcon(){
        
        if(document.querySelector('#mymodal'))
            this.modal.hideModal();
        
        
        const shoppingCart = this.basket.loadBasket();
        
        let totalAmount = 0.0;
        for(const item of shoppingCart){

            totalAmount += item.price * item.quantity
            
        }
        
        document.querySelector('.panier strong').textContent = totalAmount.toFixed(2)
        
    }
    


}