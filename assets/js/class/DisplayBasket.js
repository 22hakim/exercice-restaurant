import Basket from './Basket.js';

export default class DisplayBasket {
    
    constructor(page = 'basket'){
        
        this.basket         = new Basket();
        this.panier         = this.basket.loadBasket();
        this.emptyBasket    = document.querySelector('#emptycard');
        this.filledBasket   = document.querySelector('#filledcard');
        this.verif(page);
    }
    
    verif(page){
        
        if(page == 'order')
            return this.displayBasket('order');

        

        const panier = this.panier
        

        if(panier.length == 0){
            this.displayEmptyBasket();
        
        }else{
            this.displayBasket('basket')
        }
        
    }
    
    
    createTag(tagHtml, content = null){
        
        const tag = document.createElement(tagHtml);
        return tag.textContent = content;
        
    }
    
    displayBasket(page){
        
        this.filledBasket.style.display     = 'block';
        if(page == 'basket'){
            
            this.emptyBasket.style.display      = 'none'; 
            
        }else{
            
            document.querySelector('.panier').style.display = 'none'
        }
        
        
        document.querySelector('#tbody-shop').innerHTML = '';
        
        for(const item of this.panier){
            
            const tr = this.createTag('tr');
            const td1= this.createTag('td',item.name);
            const td2= this.createTag('td',item.price.toFixed(2));
            const td3= this.createTag('td',item.quantity);
            const td4= this.createTag('td',(item.price*item.quantity).toFixed(2));
            

            tr.append(td1,td2,td3,td4);
            
            if(document.querySelector('.suppr')){
                
                const td5       = this.createTag('td');
                td5.style.textAlign = 'center';
                const hyperText = this.createTag('a', 'supprimer');
                hyperText.href = '#'
                hyperText.dataset.deleteId = item.id;
                
                td5.append(hyperText);
                tr.append(td5)
            }
            
            document.querySelector('#tbody-shop').prepend(tr);
            
        }
        
        this.displayAmount();
        
    }
    
    
    displayEmptyBasket(){
        
        this.emptyBasket.style.display      = 'block';
        this.filledBasket.style.display     = 'none';
        this.emptyBasket.innerHTML = `<p>Aucun produit dans le panier pour le moment</p>`
        
    }
    
    displayAmount(){
        
        const shoppingCart = this.panier;
        let totalAmount = 0.0;
        
        for(const item of shoppingCart){

            totalAmount += item.price * item.quantity
            
        }
        
        document.querySelector('#totalAmount').textContent = `Le montant total de la commande est de ${totalAmount.toFixed(2)} €`
    }
    
}