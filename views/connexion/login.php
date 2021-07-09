<h1>Connexion </h1>
<p class="select">Si vous n'avez pas de compte, vous pouvez en créer un.</p>
<p class="mandatory">Champs avec <abbr title="(required)" aria-hidden="true">*</abbr>  obligatoires.</p>
<?php if(empty($messages['success'])) : ?>
    <?php  if(!empty($messages['errors'])){  ?>
        <ul>
        <?php foreach($messages['errors'] as $error):  ?>    
            <li><?=  $error ?></li>
        <?php endforeach ?>    
        </ul>
    <?php    }  ?>
<form action="index.php?p=login" method="post" class="connect-form">
	<div>
		<fieldset>
			<legend>Information</legend>
			<label for="mail"><abbr title="(required)" aria-hidden="true">*</abbr> Mail</label>
			<input type="email" id="mail" name="mail" <?= $cookie::checkCookie('mail') ?>>
			<label for="password"><abbr title="(required)" aria-hidden="true">*</abbr> Mot de passe</label>
			<input type="password" id="password" name="password" <?= $cookie::checkCookie('password') ?>>
			<div>
			    <label for="remember"> Se souvenir de moi </label>	
	            <input type="checkbox" value="true" id="remember" name="remember" checked>
			</div>

		</fieldset>
	</div>
	<p><input type="submit" value="Connexion"></p>
</form>
<?php else : ?>
	<p class="mandatory"><?= $messages['success'][0] ?></p>
	<a href="index.php">retourner a l'accueil</a>
    <a href="index.php?p=logout">se déconnecter</a>
<?php endif; ?>
<div class="map">
	<h2>Our location</h2>
	<iframe src="https://www.openstreetmap.org/export/embed.html?bbox=-74.00132596492769%2C40.73365735272384%2C-73.99950206279756%2C40.73476096226166&amp;layer=mapnik"></iframe>
</div><!-- end of .map -->

