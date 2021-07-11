import Product from './class/Product.js';
import Filter from './class/Filter.js';
import Modal from './class/Modal.js';
import Basket from './class/Basket.js';
import DisplayBasket from './class/DisplayBasket.js';
import Order from './class/Order.js';
import Paiement from './class/Paiement.js';
import Slider from './class/Slider.js';

const ProductClass = new Product();
const ModalClass = new Modal();
const BasketClass = new Basket();
const PaiementClass = new Paiement();


document.addEventListener('DOMContentLoaded',()=>{
    
    /* Menu */
    if(document.querySelector('.choice')) 
        new Filter('all')

    /* Slider */
    if(document.querySelector('.slider')) 
        new Slider()
        
    /* Basket */
    ProductClass.refreshBasketIcon();

    /* shopping cart */
    if(document.querySelector('#shoppingcart'))
        new DisplayBasket();
    if(document.querySelector('#ordercart'))
        new DisplayBasket('order')
        
    /* Formulaire de Paiement */
    if(document.querySelector('#paiement-form')){
        document.querySelector('.panier').style.display = 'none' // cache le panier
        PaiementClass.initStripe(Stripe('pk_test_kX5YAGvqZjShllOiYuKgC3c500toOKx1vM'));
        PaiementClass.makeForm();
    }


    document.addEventListener('click',event =>{
        
        new Filter(event.target.dataset.filter);

        if(event.target.matches('.mix figcaption'))
            ModalClass.makeModal(event);

        if(event.target.matches('#confirmYes'))
            ProductClass.makeProduct(event);
        
        if(event.target.matches('#confirmNo'))
            ModalClass.hideModal(); 
            
        if(event.target.matches('#clearCart')){
            BasketClass.clearBasket()
            ProductClass.refreshBasketIcon();
            new DisplayBasket();
        }
        
        if(event.target.matches('[data-delete-id]')){
            ProductClass.deleteProduct(event.target);
        }
        
        if(event.target.matches('#make-order-details')){
            
            event.preventDefault()
            new Order('save-orderlines');
        }
        
        if(event.target.matches('#card-button'))
            PaiementClass.paiement(event)
        
    })

})