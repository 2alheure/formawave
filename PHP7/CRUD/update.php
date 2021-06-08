<?php

// On veut un id dans l'URL ($_GET['id'])
if (empty($_GET['id'])) {
    echo 'Mauvaise URL.';
    die();
}

$requete = 'SELECT * FROM `trucs_a_vendre` WHERE `id` = ' . $_GET['id'];

/**
 * Etape 1 : Connexion
 */
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=UTF8', 'root', '');

/**
 * Etape 2 : Envoyer la requête
 */
$reponse = $bdd->query($requete);

if ($reponse === false) {
    echo 'Il y a eu un souci pendant le requête.';
    die();
}

/**
 * Etape 3 : Lire la réponse
 */
$truc_a_vendre = $reponse->fetch(PDO::FETCH_ASSOC);

if ($truc_a_vendre === false) {
    echo 'L\'id existe pas.';
    die();
}

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

    <h1>Update</h1>

    <form action="update-handler.php?id=<?php echo $truc_a_vendre['id']; ?>" method="POST" style="margin-bottom: 150px;">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?php echo $truc_a_vendre['nom']; ?>" id="nom" required autofocus>
        <br>

        <label for="prix">Prix</label>
        <input type="number" name="prix" value="<?php echo $truc_a_vendre['prix']; ?>" id="prix" required>
        <br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?php echo $truc_a_vendre['stock']; ?>" id="stock" required>
        <br>

        <input type="submit" value="Envoyer">
    </form>


    <a href="delete.php?id=<?php echo $truc_a_vendre['id']; ?>" style="color:red; margin-top: 100px">Supprimer</a>
</body>

</html>