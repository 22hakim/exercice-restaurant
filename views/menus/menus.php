<h1>Details of our menus</h1>
<p class="select">Choose your main course according to your menu!</p>
<div class="filter">
	<button data-filter="all">All</button>
	<button data-filter="meat">Meat</button>
	<button data-filter="vegan">Vegan</button>
	<button data-filter="fish">Fish</button>
</div> <!-- end of .filter -->
	<div id="mymodal"></div>
	<div class="choice myresult"></div>
</div> <!-- end of .choice -->
<article>
	<h2>Deserts</h2>
	<p class="select">Here are the deserts you can choose to finish your meal (included in your menu).</p>
	<div class="choice">
	<?php foreach($desserts as $dessert) : ?>
		<div class="mix">
			<figure data-id="<?= $dessert['id'] ?>">
				<img src="assets/img/menus/<?= htmlspecialchars($dessert['picture']) ?>" alt="photo de <?= htmlspecialchars($dessert['name']) ?>">
				<figcaption><img src="assets/img/fork-knife.svg" alt="">
					<h3><?= htmlspecialchars($dessert['name']) ?></h3>
					<h4 data-price="<?= $dessert['price'] ?>"><?= $dessert['price'] ?> €</h4>
				</figcaption>
			</figure>
		</div>
	<?php endforeach; ?>
	</div> <!-- end of .choice -->
</article>
<article>
	<h2>Cocktails</h2>
	<p class="select">Soft drinkgs are included, but if you want you can order one of our excellent cocktails (not included in the menu).</p>
	<div class="choice">
	<?php foreach($coktails as $coktail) : ?>
		<div class="mix">
			<figure data-id="<?= $coktail['id'] ?>">
				<img src="assets/img/menus/<?= htmlspecialchars($coktail['picture']) ?>" alt="photo de <?= htmlspecialchars($coktail['name']) ?>">
				<figcaption><img src="assets/img/fork-knife.svg" alt="">
					<h3><?= htmlspecialchars($coktail['name']) ?></h3>
					<h4 data-price="<?= $coktail['price'] ?>"><?= $coktail['price'] ?> €</h4>
				</figcaption>
			</figure>
		</div>
	<?php endforeach; ?>
	</div> <!-- end of .choice -->
</article>

