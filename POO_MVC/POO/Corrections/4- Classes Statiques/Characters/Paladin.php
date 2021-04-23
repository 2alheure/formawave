<?php

namespace Characters;

/**
 * Définissez la classe Paladin, qui est un genre de Personnage
 */

use Characters\Personnage;

class Paladin extends Personnage {
    protected $pv = 500;
    protected $force = 350;
    protected $magie = 200;
    protected $sagesse = 20;
    protected $avatar = 'avatar/default_paladin.png';

    public function coupDEpee(Personnage $quelqu_un) {
        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            $this->luiArrive('Il donne un coup d\'épée sur ' . $quelqu_un->pseudo . '.');

            // Ma formule c'est : La magie + 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = round(100 + $this->force - $this->age * 0.1);

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
            $this->luiArrive('Il s\'acharne sur le cadavre de ' . $quelqu_un->pseudo . '.');
        }
    }
}
