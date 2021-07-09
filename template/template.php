<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Find out the various menus available at Freshly Restaurant">
	<title>Freshly Restaurant - Our menus</title>
	<link rel="icon" href="assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Athiti:500|Merienda:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/brands.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/solid.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/restau.css">
</head>

<body>
	<header>
		<div class="container">
			<a href="index.php?p=home" class="logo">
				<img src="assets/img/logo.png" alt="Logo Freshly Restaurant">
				<strong>Freshly restaurant</strong>
			</a>
			<nav>
				<ul>
					<li><a href="index.php?p=home" <?= $https::active('home') ?>>Home</a></li>
					<li><a href="index.php?p=about" <?= $https::active('about') ?>>About</a></li>
					<li><a href="index.php?p=menu" <?= $https::active('menu') ?>>Menus</a></li>
					<li><a href="index.php?p=contact" <?= $https::active('contact') ?>>Contact</a></li>
					<?php if($session::online() === false) : ?>
					<li><a href="index.php?p=register" <?= $https::active('register') ?>>Inscription</a></li>
					<li><a href="index.php?p=login" <?= $https::active('login') ?>>Connexion</a></li>
					<?php else : ?>
					<li><a href="index.php?p=logout">Déconnexion</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div> <!-- end of .container -->
	</header>
	<main class="container">
		<div id="info"></div>
		<div class="panier">
			<a href="index.php?p=shoppingCart" title="acceder à mon panier"><i class="fas fa-shopping-cart"></i> <strong>00,00</strong>&#8364;</a>
		</div>
	    <?php require 'views/'.$path ?>
	</main>
	<footer>
		<div class="container">
			<div class="flex">
				<aside>
					<h4>Opening hours</h4>
					<ul>
						<li>Monday: Closed</li>
						<li>Tue-Wed : 9am - 10pm</li>
						<li>Thu-Fri : 9am - 10pm</li>
						<li>Sat-Sun : 5pm - 10pm</li>
					</ul>
				</aside>
				<aside>
					<h4>Contact</h4>
					<address>
						<p>13 Christopher Street<br>
							New York,<br>
							NY 10014-3543</p>
						<p>+01 2000 800 9999</p>
					</address>
				</aside>
				<aside>
					<h4>Social networks</h4>
					<div class="reseaux">
						<a href="#" class="fab fa-facebook-f"></a>
						<a href="#" class="fab fa-instagram"></a>
						<a href="#" class="fab fa-pinterest-p"></a>
					</div>
				</aside>
			</div> <!-- end of .flex -->
			<div class="footer">
			</div> <!-- end of .footer -->
		</div> <!-- end of .container -->
	</footer>
	<!-- JS -->
    <script src="https://js.stripe.com/v3/"></script>
	<script type="module" src="assets/js/main.js" ></script>
</body>

</html>