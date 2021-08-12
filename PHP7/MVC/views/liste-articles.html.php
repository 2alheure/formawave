<?php include __DIR__ . '/morceaux/header.html.php'; ?>

<h1>Mes super articles</h1>

<div class="row d-flex">
	<?php
	/**
	 * Je me dis que je reçois des articles 
	 * dans une variable $articles
	 */

	foreach ($articles as $un_article) : ?>

		<div class="card text-left col-5 m-4 px-2">
			<!-- Equivalent de <?php echo $un_article['image']; ?> -->
			<img class="card-img-top" src="<?= $un_article['image'] ?>" alt="<?= $un_article['image_alt'] ?>">
			<div class="card-body">
				<h4 class="card-title"><?= $un_article['titre'] ?></h4>
				<p class="card-text"><?= get_resume($un_article) ?></p>
				<small><a href="article_controller.php">Article aléatoire</a></small>
			</div>
		</div>

	<?php endforeach; ?>
</div>

<?php include __DIR__ . '/morceaux/footer.html.php'; ?>