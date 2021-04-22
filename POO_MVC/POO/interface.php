<?php

// Une interface c'est (en gros) 
// Une classe abstraite qui n'a QUE des méthodes abstraites
// Définie avec le mot-clef "interface"
interface Jouable {
    /* "Qui peut être joué" */

    // Les méthodes sont forcément abstraites... 
    // Du coup pas besoin de le préciser avec "abstract"
    public function truc();
    public function bidule();
    public function machin();
}

interface Machinable {
    /* "Qui peut être machiné" */
    public function truc();
    public function bidule();
    public function machin();
}

// On IMPLEMENTE une interface avec "implements"
// On peut implémenter plusieurs interfaces
class MaClass implements Jouable, Machinable {

    // Comme les méthodes sont abstraites, on doit OBLIGATOIREMENT les définir
    public function truc() {
    }
    public function bidule() {
    }
    public function machin() {
    }
}


if ($objet instanceof Jouable) {
    $objet->truc();
}
