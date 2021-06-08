<?php

// On vérifie le contenu du formulaire

if (
    !empty($_POST['nom'])
    && !empty($_POST['stock'])
    && !empty($_POST['prix'])

    && is_numeric($_POST['prix'])
    && is_numeric($_POST['stock'])
) {
    // On modifie le truc à vendre
    $requete = 'UPDATE `trucs_a_vendre` SET 
        `nom` = \'' . $_POST['nom'] . '\', 
        `prix` = ' . $_POST['prix'] . ', 
        `stock` = ' . $_POST['stock']
        . ' WHERE `id` = ' 
        . $_GET['id'];

    /**
     * Etape 1 : Connexion
     */
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');

    /**
     * Etape 2 : Envoyer la requête
     */
    $reponse = $bdd->query($requete);

    if ($reponse === false) {
        echo 'La mise à jour ne s\'est pas faite correctement.';
        die();
    } else {
        header('location: retrieve.php');
    }

} else {
    echo 'Erreur de saisie du formulaire.';
    die();
}
