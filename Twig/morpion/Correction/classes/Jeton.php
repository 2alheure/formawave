<?php

namespace App;

class Jeton {
    public Joueur $joueur;

    public function __construct(Joueur $joueur) {
        $this->joueur = $joueur;
    }
}
