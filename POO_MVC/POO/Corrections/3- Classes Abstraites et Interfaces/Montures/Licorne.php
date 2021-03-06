<?php

namespace Montures;

use Montures\Monture;

class Licorne extends Monture {
    public $vitesse = 80;       // 2 fois plus vite qu'un cheval
    public $endurance = INF;    // Une licorne est toujours en forme
    public $pv = 100;           // Plus fragile qu'un cheval

    public function chevauche() {
        echo 'La licorne file à travers les nuages en laissant trainer derrière elle un arc-en-ciel.';
    }

    public function seRepose() {
        echo 'La licorne s\'allonge... mais seulement pour vous faire plaisir : elle n\'est pas fatiguée.';
    }
}
