<?php

function chercherFQCN($fqcn) {
    // Le FQCN =  Montures\Monture
    // On le transforme en Montures/Monture.php

    $fichier = str_replace('\\', '/', $fqcn);
    $fichier .= '.php';

    require_once $fichier;
}
spl_autoload_register('chercherFQCN');

use Games\Narrateur;
use Montures\Cheval;
use Characters\Archer;
use Structures\Guilde;
use Characters\Personnage;
use Objects\Heals\Potion;
use Objects\Weapons\Couteau;

/**
 * "Il était une fois..."
 * 
 * A l'aide des différentes classes que vous allez écrire tout au long du module
 * construisez une histoire.
 * 
 * Cette histoire ne devra s'écrire sans aucun appel à echo, print, ... dans ce fichier
 * 
 * Faites évoluer cette histoire au fur et à mesure que le module avance.
 * 
 * (On n'est pas à une faute de français près. 
 * Il se peut que tout ne s'accorde pas exactement comme voulu, ce n'est pas très grave...
 * Mais essayez de faire au mieux =p)
 * 
 * (Copiez-collez vos classes dans ce dossier, et arrangez-les si nécessaire)
 */


?>
<!doctype html>
<html lang="en">

<head>
    <title>Histoire</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .avatar {
            max-width: 25px;
            max-height: 25px;
        }
    </style>
</head>

<body>


    <?php

    Narrateur::parle('Un aventurier du nom de Rodolphe commence son aventure.');
    $rodolphe = new Archer('Rodolphe', 44, 'bon');

    $cheval = new Cheval;
    $rodolphe->chevauche($cheval);

    $bandit1 = new Personnage('Bandit One', 30, 'mauvais', 'avatar/bandit.png');
    $bandit2 = new Personnage('Bandit Two', 30, 'mauvais', 'avatar/bandit.png');
    $bandit3 = new Personnage('Bandit Three', 30, 'mauvais', 'avatar/bandit.png');
    $guilde_de_bandits = new Guilde('Derobator');
    $bandit1->rentreDans($guilde_de_bandits);
    $bandit2->rentreDans($guilde_de_bandits);
    $bandit3->rentreDans($guilde_de_bandits);

    Narrateur::parle('Rodolphe aperçoit au loin 3 bandits !');


    Narrateur::parle('Pris de panique, le cheval de Rodolphe l\'abandonne.');
    $cheval->sEnfuit();

    Narrateur::parle('Rodolphe n\'a plus le choix : il doit combattre !');
    $rodolphe->flecheEnflammee($bandit1);
    $rodolphe->fleche($bandit2);

    $bandit3->frappeALEpee($rodolphe);

    try {
        $rodolphe->utiliseObjet('potion', $rodolphe);
    } catch (Exception $e) {
        Narrateur::parle('Je t\'ai vu essayer de tricher, Rodolphe !');
    }

    Couteau::attaque($rodolphe);

    $rodolphe->flecheEnflammee($bandit3);

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>