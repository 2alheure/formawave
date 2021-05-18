<?php

// On a une classe "de base"
// Qui est générique
class Vehicule {
    public $roues = 4;
    private $quelque_chose;
    protected $quelque_chose_2;
    protected $plaque_d_immatriculation;

    const CARBURANT = 'essence';

    // Le mot-clef "final" indique que les enfants ne peuvent pas surcharger la méthode (= la réécrire)
    final public function rouler() {
        echo 'Je roule';
    }

    public function klaxonne($bruit) {
        echo "$bruit, $bruit !";
    }
}


// On accède aux constantes d'une classe avec le nom de la classe
// Et l'opérateur Paamayim Nekudotayim (Le "::")
Vehicule::CARBURANT;    // "essence"

// On a une classe "enfant"
// On dit qu'elle "hérite" / "étend" de Vehicule
// Qui détaille le comportement d'un véhicule
// Pour l'adapter au cas particulier d'une voiture 
class Voiture extends Vehicule {
    /**
     * Tous les attributs
     * Et toutes les méthodes de Vehicule
     * sont héritées dans Voiture
     * 
     * sauf les private
     */

    // $quelque_chose n'existe pas !
    // $quelque_chose_2 existe !


    // On rajoute un comportement aux voitures
    // Qui n'existait pas pour les véhicules
    public function controleTechnique() {
        echo 'Je passe le contrôle technique.';
    }
}

class Moto extends Vehicule {
    public $roues = 2;
    const TOURNER_A_DROITE = 1;
    const TOURNER_A_GAUCHE = 2;
    const ALLER_TOUT_DROIT = 3;


    // On change le comportement du klaxonne
    // En l'adaptant pour la moto
    public function klaxonne($bruit) {
        // On utilise le comportement du parent (donc de véhicule)
        parent::klaxonne($bruit);

        // Et on rajoute ce qu'on souhaite
        echo 'J\'allume mes warnings';
    }

    // Il y a une erreur car la méthode est "final" dans Vehicule
    public function rouler($direction) {
        // On accède aux constantes de la classe actuelle via "self"
        if ($direction == self::ALLER_TOUT_DROIT) {
        } else if ($direction == self::TOURNER_A_DROITE) {
        } else {
        }
    }
}

$moto = new Moto;
$moto->rouler(Moto::ALLER_TOUT_DROIT);

$audi = new Voiture;
$audi->klaxonne('Tuut');
$audi->controleTechnique();
