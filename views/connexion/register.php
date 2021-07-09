<h1>Inscription </h1>
<?php if(empty($messages['success'])) : ?>
	<p class="select">Si vous n'avez pas de compte, c'est le moment d'en créer un.</p>
	<p class="mandatory">Champs avec <abbr title="(required)" aria-hidden="true">*</abbr>  obligatoires.</p>
	
    <?php  if(!empty($messages['errors'])){  ?>
        <ul>
        <?php foreach($messages['errors'] as $error):  ?>    
            <li><?=  $error ?></li>
        <?php endforeach ?>    
        </ul>
    <?php    }  ?>
<form action="index.php?p=register" method="post" class="connect-form">
	<div>
		<fieldset>
			<legend>Information</legend>
			<label for="login"><abbr title="(required)" aria-hidden="true">*</abbr>login</label>
			<input type="text" id="login" name="login" required>
			<label for="password"><abbr title="(required)" aria-hidden="true">*</abbr> Password</label>
			<input type="password" id="password" name="password" required>
			<label for="password2"><abbr title="(required)" aria-hidden="true">*</abbr> Confirm Password</label>
			<input type="password" id="password2" name="password2" required>

			<label for="mail"><abbr title="(required)" aria-hidden="true">*</abbr> Mail</label>
			<input type="mail" id="mail" name="mail" required>

		</fieldset>
	</div>
	<p><input type="submit" value="Connexion"></p>
</form>
<?php else : ?>
	<p class="mandatory"><?= $messages['success'][0] ?></p>
	<a href="index.php?p=login">se Connecter</a>
<?php endif; ?>
<div class="map">
	<h2>Our location</h2>
	<iframe src="https://www.openstreetmap.org/export/embed.html?bbox=-74.00132596492769%2C40.73365735272384%2C-73.99950206279756%2C40.73476096226166&amp;layer=mapnik"></iframe>
</div><!-- end of .map -->

