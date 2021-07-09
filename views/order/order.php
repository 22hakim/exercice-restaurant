<section>
	<article>
		<h1 id="orderId" data-order="<?= $_GET['orderId']?>">Commande n° <?= $_GET['orderId'] ?></h1>		
		<p id="userid" data-user-id="<?= $_SESSION['user']['id'] ?>"><?= $_SESSION['user']['login'] ?></p>
	    <p>Adresse : A créer et ajouter dans la Bdd </p> 
	    <p>Ici normalement le code Postal </p> 
	</article>

	<div id="ordercart">

	    <div id="filledcard">
	    	<table>
	    		<thead>
	                <tr>
	                    <th>Produit</th>
	                    <th>Prix Unitaire</th>
	                    <th>Quantité</th>
	                    <th>Sous-total</th>
	                </tr>
	    		</thead>
	    		<tbody id="tbody-shop"></tbody>
	    	</table>
	    	<div class="amount-div">
	            <p id="totalAmount"></p>
	            <div>
	                <a href="index.php?p=paiement"class="btn-style-blue" id="make-order-details">Proceder au paiement </a>
	                <button class="btn-style-red" id="cancel-order">Annuler commande</button>                 
	            </div>
	        </div>
	    </div>
	</div>
	
</section>






