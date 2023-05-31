<?php

namespace App;

class Joueur {
    public Jeton $jeton;
    public string $symbol;
    public string $cssClasses;

    public function __construct(string $symbol = 'x', string $cssClasses) {
        $this->symbol = $symbol;
        $this->cssClasses = $cssClasses;
        $this->jeton = new Jeton($this);
    }
}
