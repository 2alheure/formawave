<?php


class Electricite {
    public $attribut;

    // Une constante est statique, elle ne change pas (elle est constante)
    const CONSTANTE = 42;

    // Une méthode statique utilise le mot-clef "static"
    static public function methodeStatique() {
    }
}

Electricite::CONSTANTE;
Electricite::methodeStatique();

// Tout est hérité, y compris le statique
class Enfant extends Electricite {
}

Enfant::methodeStatique();

$elec = new Electricite;
$elec2 = new Electricite;

