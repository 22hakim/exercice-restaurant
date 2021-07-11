import DataStorage from './DataStorage.js';

export default class Basket {

    constructor(){
        
        this.basket    = new DataStorage();

    }


    loadBasket() 
    {
        let shoppingCart = this.basket.loadDataFromDomStorage('panier');

        if (shoppingCart == null)   shoppingCart = [];  

        return shoppingCart;
    }

    saveBasket(basket) 
    {   
        this.basket.saveDataToDomStorage('panier', basket);
    }

    clearBasket()
    {
        window.localStorage.clear();
        
    }

}