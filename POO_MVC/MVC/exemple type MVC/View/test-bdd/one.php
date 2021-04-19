<?php view('layout/header'); ?>

<h1><?= $truc['nom'] ?></h1>
<img src="<?= $truc['image'] ?>" alt="">
<p><?= $truc['description'] ?></p>
<?php view('layout/footer');
