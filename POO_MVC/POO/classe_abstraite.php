<?php

// Une classe abstraite est une classe qui a au moins une méthode abstraite
abstract class MaClasseAbstraite {
    public $attribut;

    protected function methode() {
    }

    // Une méthode abstraite : on sait qu'elle existe, mais on ne sait pas ce qu'elle fait
    // Elle n'a donc pas de corps
    abstract public function methodeAbstraite($param1, $param2 = null, string $param3);
}

abstract class PenelopeFillon {
    abstract public function travailler();
}

class MaClasseConcrete extends MaClasseAbstraite {
    // L'enfant définit la méthode qui était abstraite chez sa mère
    public function methodeAbstraite($param1, $param2 = null, string $param3) {
        echo 'Je fais ceci';
    }
}


$variable = new MaClasseAbstraite;  // Pas le droit d'instancier une classe abstraite !