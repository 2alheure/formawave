<?php include __DIR__ . '/morceaux/header.html.php'; ?>

<img src="<?php echo $un_article['image']; ?>" alt="<?php echo $un_article['image_alt']; ?>" class="banner" />
<small><?php echo $un_article['image_copyright']; ?></small>

<h1 class="mb-4"><?php echo $un_article['titre']; ?></h1>

<p><?php echo $un_article['contenu']; ?></p>

<?php include __DIR__ . '/morceaux/footer.html.php'; ?>