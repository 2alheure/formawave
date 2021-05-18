<?php

namespace Characters;

/**
 * Définissez la classe Mage, qui est un genre de Personnage
 */

use Characters\Personnage;

class Mage extends Personnage {
    public $pv = 200;
    public $force = 100;
    public $magie = 500;
    public $sagesse = 100;
    protected $avatar = 'avatar/default_mage.png';

    public function soigne(Personnage $quelqu_un) {
        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            $this->luiArrive('Il soigne ' . $quelqu_un->pseudo . '.');

            // Ma formule c'est : 10 + 10 % de la magie du personnage 
            // (arrondi à l'entier le plus proche)
            $soins = round(10 + $this->magie * 0.1);

            // Le "quelqu'un" est soigné
            $quelqu_un->estSoigne($soins);
        } else {
            // Sinon

            $this->luiArrive('On ne peut soigner un cadavre');
        }
    }

    public function bouleDeFeu(Personnage $quelqu_un) {
        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            $this->luiArrive('Il envoie une boule de feu sur ' . $quelqu_un->pseudo . '.');

            // Ma formule c'est : La magie + 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = round(150 + $this->magie + $this->age * 0.1);

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
                $this->luiArrive('Il s\'acharne sur le cadavre de ' . $quelqu_un->pseudo . '.');
        }
    }

    public function frappe(Personnage $quelqu_un = null, int $bonus_frappe = 0) {
        parent::frappe($quelqu_un, 10);
    }
}
