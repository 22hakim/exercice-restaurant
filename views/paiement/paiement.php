<section>
    <h1 id="orderId" data-order="<?= $_GET['orderNum']?>">Paiement Commande n° <?= $_GET['orderNum'] ?></h1>		
    <p data-amount="<?= $totalAmount ?>">Mon total du: <?= $totalAmount ?></p>
</section>
<section>
    <form id='paiement-form'>
        <!-- 1 -  div pour les erreurs de paiements (paiement refusé, probleme de connexion )  -->
        <div id="errors"></div>
        
        <!-- 2 -  Nom du detenteur de la cart   -->
        <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
        
        <!-- 3 - Le formulaire de paiement qui sera crée par stripe -->
        <div id="form-paiement"></div>
        
        <!-- 4 - button sur lequel il y aura un evenement j'ai ajouté type boutton pour eviter qu'il soumet l'evenement comme si j'avais fait event.preventDefault() -->
        <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Procéder au paiement</button>

    </form>
</section>