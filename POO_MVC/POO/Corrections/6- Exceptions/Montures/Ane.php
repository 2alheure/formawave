<?php

namespace Montures;

use Games\Narrateur;
use Montures\Monture;

class Ane extends Monture {
    public $vitesse = 25;       // ~2 fois moins vite qu'un cheval
    public $endurance = 500;    // 5 fois plus endurant qu'un cheval
    public $pv = 300;           // Plus fragile qu'un cheval, mais moins qu'une licorne

    public function chevauche() {
        // Le joueur lance un dé 100
        // Si le résultat est <= 20, l'âne refuse de se déplacer
        $de_100 = rand(1, 100);

        if ($de_100 <= 20) $this->neBougePas();
        else $this->trotte();
    }

    public function trotte() {
        if ($this->endurance > 0) {
            // Si notre âne a encore de l'endurance

            // Il avance à une vitesse qui dépend de l'endurance
            $vitesse_reelle = round($this->vitesse * ($this->endurance / 100));

            Narrateur::parle('L\'âne avance à une vitesse de ' . $vitesse_reelle . ' km/h.');
            $this->endurance -= 5;
        } else {
            Narrateur::parle('L\'âne a atteint ses limites et refuse d\'avancer plus.');
        }
    }

    public function neBougePas() {
        Narrateur::parle('L\'âne fait sa tête de mule et refuse de se déplacer.');
    }

    public function seRepose() {
        // L'âne se repose et regagne de l'endurance
        $this->au_repos = true;
        $this->endurance += 50;

        Narrateur::parle('L\'âne se repose');
    }
}
