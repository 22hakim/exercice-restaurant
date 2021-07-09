<?php foreach($dishes as $dish) : ?>
<div class="mix">
	<figure data-id="<?= $dish['id'] ?>">
		<img src="assets/img/menus/<?= htmlspecialchars($dish['picture']) ?>" alt="<?= htmlspecialchars($dish['description']) ?>">
		<figcaption><img src="assets/img/fork-knife.svg" alt="">
			<h3><?= htmlspecialchars($dish['name']) ?></h3>
			<h4 data-price="<?= $dish['price'] ?>"><?= $dish['price'] ?> €</h4>
		</figcaption>
	</figure>
</div>
<?php endforeach; ?>

