<?php

/**
 * La classe PHP qui représente un cheval
 * 
 * Un cheval est caractérisé par sa vitesse et son endurance
 * Les actions d'un cheval se résument à :
 * 		- Galoper
 * 		- Prendre la fuite (les lâches)
 *      - Chevaucher
 */
namespace Monture;

class Cheval {
    public $vitesse = 40;
    public $endurance = 100;
    public $au_repos = false;

    public function chevauche() {
        $this->au_repos = false;

        // Le personnage lance un "dé 100"
        $de_100 = rand(1, 100);

        // S'il a fait 2 ou moins, son cheval s'enfuit
        if ($de_100 <= 2) $this->sEnfuit();
        else $this->galope();
    }

    public function galope() {
        if ($this->endurance > 0) {
            // Si notre cheval a encore de l'endurance

            // Il avance à une vitesse qui dépend de l'endurance
            $vitesse_reelle = round($this->vitesse * ($this->endurance / 100));

            echo 'Le cheval galope à une vitesse de ' . $vitesse_reelle . ' km/h. Tagada, tagada !';
            $this->endurance -= 5;
        } else {
            echo 'Le cheval est épuisé et refuse d\'avancer.';
        }
    }

    public function sEnfuit() {
        echo 'Le cheval s\'enfuit à toute vitesse en laissant sur place son cavalier...';
    }

    public function seRepose() {
        // Le cheval se repose et regagne de l'endurance
        $this->au_repos = true;
        $this->endurance += 10;

        echo 'Le cheval se repose';
    }
}
