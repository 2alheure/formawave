<?php

/**
 * Créez une classe PHP qui représente une arme (générique)
 * 
 * Une arme est définie par les dégats qu'elle peut infliger
 * 
 * La seule action de cette classe est statique : attaquer un personnage
 * Une attaque inflige le montant de dégats (défini dans la classe) à un personnage
 * 
 * Créez 3 armes distinctes
 */

namespace Objects\Weapons;

use Characters\Personnage;
use Games\Narrateur;

class Arme {
    const DEGATS = 50;
    const NAME = 'Arme';

    static public function attaque(Personnage $quelqu_un) {
        Narrateur::parle('Une arme (' . self::NAME . ') est utilisée.');

        $quelqu_un->subitDegats(self::DEGATS);
    }
}
