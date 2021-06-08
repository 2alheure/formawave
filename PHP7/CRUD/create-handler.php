<?php

// On vérifie le contenu du formulaire
if (
    !empty($_POST['nom'])
    && !empty($_POST['stock'])
    && !empty($_POST['prix'])

    && is_numeric($_POST['prix'])
    && is_numeric($_POST['stock'])
) {
    // On insère notre truc à vendre dans la table
    $requete = 'INSERT INTO `trucs_a_vendre` 
        VALUES (
            NULL, 
            \'' . $_POST['nom'] . '\', '
            . $_POST['prix'] . ', '
            . $_POST['stock'] .
        ')';

    /**
     * Etape 1 : Connexion
     */
    $bdd = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '');

    /**
     * Etape 2 : Envoyer la requête
     */
    $reponse = $bdd->query($requete);

    if ($reponse === false) {
        echo 'Problème pendant l\'insertion.';
        die();
    } else {
        // L'insertion a réussi
        // On redirige
        header('location: retrieve.php');
    }
} else {
    echo 'Erreur de saisie du formulaire.';
    die();
}
