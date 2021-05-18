<?php

namespace Structures;

use Characters\Personnage;
use Games\Narrateur;

/**
 * Créez une classe PHP qui représente une guilde
 * Une guilde est caractérisée par son nom, et les Personnages qui la composent
 * La seule action qu'une guilde peut "accomplir" c'est accueillir un nouveau personnage
 */

class Guilde {
    public $nom;
    // Nos membres sont stockés dans un tableau de Personnages
    public $membres = array();

    public function accueille(Personnage $quelqu_un) {
        if (!in_array($quelqu_un, $this->membres)) {
            // Si $quelqu_un ne fait pas déjà partie de nos membres

            // On ajoute une case à notre tableau
            // Pour y mettre $quelqu_un
            // array_push($this->membres, $quelqu_un);
            $this->membres[] = $quelqu_un;

            Narrateur::parle('Il rentre dans la guilde ' . $this->nom . '.', $quelqu_un);
        } else {
            // Sinon

            Narrateur::parle('Il aime tellement la guilde ' . $this->nom . ' qu\'il essaye de l\'intégrer une nouvelle fois !', $quelqu_un);
        }
    }
}
