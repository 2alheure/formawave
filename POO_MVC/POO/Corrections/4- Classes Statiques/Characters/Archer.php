<?php

namespace Characters;

/**
 * Définissez la classe Archer, qui est un genre de Personnage
 */

use Characters\Personnage;

class Archer extends Personnage {

    protected $pv = 200;
    protected $force = 350;
    protected $magie = 100;
    protected $sagesse = 50;
    protected $avatar = 'avatar/default_archer.png';

    protected $nb_fleches = 50;
    protected $huile_inflammable = 10;

    public function fleche(Personnage $quelqu_un) {
        if ($this->aDesFleches()) {
            $degats = 100 + ($this->force - $this->age * 0.1);  // On calcule les dégat
            $this->nb_fleches--; // Il utilise une flèche

            if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant

                echo $this->pseudo . ' tire une flèche sur ' . $quelqu_un->pseudo;

                $quelqu_un->subitDegats($degats);
            } else {
                echo $this->pseudo . ' tire une flèche sur le cadavre de ' . $quelqu_un->pseudo;
            }
        } else {
            echo 'L\'archer ' . $this->pseudo . ' n\'a plus de flèche.';
        }
    }

    public function flecheMagique(Personnage $quelqu_un) {
        if ($this->aDesFleches()) {
            $degats = 100 + ($this->magie / 2) + ($this->force - $this->age * 0.1);  // On calcule les dégat
            $this->nb_fleches--; // Il utilise une flèche

            if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant

                echo $this->pseudo . ' tire une flèche magique sur ' . $quelqu_un->pseudo;

                $quelqu_un->subitDegats($degats);
            } else {
                echo $this->pseudo . ' tire une flèche magique sur le cadavre de ' . $quelqu_un->pseudo;
            }
        } else {
            echo 'L\'archer ' . $this->pseudo . ' n\'a plus de flèche.';
        }
    }

    public function flecheEnflammee(Personnage $quelqu_un) {
        if ($this->aDesFleches()) {
            if ($this->aDeLHuile()) {
                $degats = 150 + ($this->force - $this->age * 0.1);  // On calcule les dégat
                $this->nb_fleches--; // Il utilise une flèche
                $this->huile_inflammable--; // Il utilise de l'huile inflammable

                if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant

                    echo $this->pseudo . ' tire une flèche enflammée sur ' . $quelqu_un->pseudo;

                    $quelqu_un->subitDegats($degats);
                } else echo $this->pseudo . ' tire une flèche enflammée sur le cadavre de ' . $quelqu_un->pseudo;
            } else echo 'L\'archer ' . $this->pseudo . ' n\'a plus d\'huile inflammable.';
        } else echo 'L\'archer ' . $this->pseudo . ' n\'a plus de flèche.';
    }

    public function tailleDesFleches() {
        echo 'L\'archer ' . $this->pseudo . ' taille des flèches.';
        $this->nb_fleches += 10;
    }

    public function aDesFleches() {
        return $this->nb_fleches > 0;
    }

    public function aDeLHuile() {
        return $this->huile_inflammable > 0;
    }
}
