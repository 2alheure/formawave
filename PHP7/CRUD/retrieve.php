<?php

// On veut afficher la liste des trucs à vendre


/**
 * Etape 1 : connexion
 */
$bdd = new mysqli('localhost', 'root', '', 'test');

if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}

/**
 * Etape 2 : Requête
 */
$requete = 'SELECT * FROM `trucs_a_vendre`';
$reponse = $bdd->query($requete);

if ($reponse === false) {
    echo 'Problème lors de la requête.';
    die();
}

/**
 * Etape 3 : Lire la réponse
 */
$trucs_a_vendre = $reponse->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="retrieve.php">Retrieve</a></li>
            <li><a href="create.php">Create</a></li>
        </ul>
    </nav>

    <h1>Retrieve</h1>

    <?php foreach ($trucs_a_vendre as $produit) { ?>
        <h2><?php echo $produit['nom']; ?></h2>
        <p><?php echo $produit['stock']; ?> unités à <?php echo $produit['prix']; ?> € / unité</p>
        <p>
            <a href="update.php?id=<?php echo $produit['id']; ?>">Modifier</a>
        </p>
    <?php } ?>
</body>

</html>