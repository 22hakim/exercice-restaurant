export default class Modal {
    
    makeModal(event){
        
        const parentElement = event.target.parentElement
        const id    = event.target.parentElement.dataset.id
        const name  = event.target.querySelector('h3').textContent
        const price = +event.target.querySelector('h4').dataset.price;

        this.displayModal(id,price,name);
    }
    
    
    displayModal(productId,productPrice,productName){
        
        
        document.querySelector('#mymodal').innerHTML = `	
        <!--Modal panier-->
    	<div class="modal" data-price=${productPrice} data-id=${productId}>
    		<p>Ajouter <span>${productName}</span> au panier?</p>
    		<button id="confirmYes">OUI</button>
    		<button id="confirmNo">NON</button>
    	</div>`
    	
        
    }
    
    /* cacher la modal */
    hideModal(){
        
        document.querySelector('#mymodal').innerHTML = ''
        
    }
    
}