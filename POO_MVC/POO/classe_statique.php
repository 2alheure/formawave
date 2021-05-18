<?php

// "Classe statique" est un abus de langage
// Ce n'est pas la classe qui est statique, mais ce qu'elle contient
class Electricite {
    public $attribut;

    // Une constante est statique, elle ne change pas (elle est constante)
    const CONSTANTE = 42;

    // Une méthode statique utilise le mot-clef "static"
    static public function methodeStatique() {

        // $this;  // $this représente l'instance
        // Comme on est dans une méthode statique, 
        // on peut pas appeler l'instance vu qu'on ne doit pas en dépendre

        self::CONSTANTE;    // self représente la classe
        // On peut l'appeler 
        // (c'est statique, la classe ne change pas en fonction de l'instance)
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
