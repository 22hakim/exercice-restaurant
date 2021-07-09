<?php if($session::online() === false) : ?>
	<p>Vous devez être connecté pour procéder à la validation du panier </p>
<?php endif;?>
<section>
	<h1>Mon panier </h1>
	<div id="shoppingcart">
	    <!-- si le panier est vide -->
	    <div id="emptycard"></div>
	    <!-- si le panier n'est pas vide-->
	    <div id="filledcard">
	    	<table>
	    		<thead>
	                <tr>
	                    <th>Produit</th>
	                    <th>Prix Unitaire</th>
	                    <th>Quantité</th>
	                    <th>Sous-total</th>
	                    <th class="suppr"></th>
	                </tr>
	    		</thead>
	    		<tbody id="tbody-shop"></tbody>
	    	</table>
	    	<div class="amount-div">
	            <p id="totalAmount"></p>
	            <div>
	                <a href="index.php?p=toPaiement"class="btn-style-blue">Passer commande</a>
	                <button class="btn-style-red" id="clearCart">Vider panier</button>                 
	            </div>
	        </div>
	    </div>
	</div>
	
</section>