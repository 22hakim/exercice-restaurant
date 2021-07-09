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

        this.addProduct(id, price, name ); // recnvoi les informations 
    }

    
    /* ajouter un produit au panier */
    addProduct(productId,productPrice, productName){
        
        
        // recuperer le panier 
        const shoppingCart = this.basket.loadBasket();
        
        // créer le produit 
        const product = {
            id : productId,
            name : productName,
            price : productPrice,
            quantity : 1
        }
        
        // console.log(product)
        
        // verifier si le produit existe deja dans le panier
        for( let index = 0; index < shoppingCart.length ; index++){
            // si oui augmenter la quantite de produit de 1
            if(shoppingCart[index].id == product.id){
                
                shoppingCart[index].quantity++ // j'ajoute 
                
                this.basket.saveBasket(shoppingCart); // je sauvegarde 
                
                this.refreshBasketIcon() // rafraichi l'icone 
                
                return  // je quitte la fonction 
                
                
            }
            
            
        }
        
        // si non ajouter le produit au panier         
        shoppingCart.push(product);

        // sauvegarder le panier 
        this.basket.saveBasket(shoppingCart);
        
        // rafraichi l'icone 
        this.refreshBasketIcon()
        
        
    }
    
    /* supprimer un produit du panier */
    deleteProduct(event){
        
        // recuperer le panier 
        const shoppingCart = this.basket.loadBasket();
        
        // supprimer le produit 
        // https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Array/filter
        const newShopcart = shoppingCart.filter(product => product.id != event.dataset.deleteId)
        // console.log(newShopcart)
            
        // sauvegarder le panier 
        this.basket.saveBasket(newShopcart);
        
        // rafraichi l'icone et le panier 
        new DisplayBasket();
        this.refreshBasketIcon()
    }
    
    
    refreshBasketIcon(){
        
        if(document.querySelector('#mymodal'))
            this.modal.hideModal();
        
        
        // recuperer le panier 
        const shoppingCart = this.basket.loadBasket();
        
        let totalAmount = 0.0;
        
        
        for(const item of shoppingCart){

            // console.log(item)
            // {id: "4", name: "Cajun shrimp", price: 15, quantity: 1}
            totalAmount += item.price * item.quantity
            
        }
        
        document.querySelector('.panier strong').textContent = totalAmount.toFixed(2)
        
    }
    


}