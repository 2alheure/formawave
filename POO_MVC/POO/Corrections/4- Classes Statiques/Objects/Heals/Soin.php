<?php

namespace Objects\Heals;

use Games\Narrateur;
use Characters\Personnage;

/**
 * Créez une classe PHP qui représente un soin (générique)
 * 
 * Un soin est défini par le nombre de points de vie qu'il peut rendre en une seul utilisation
 * 
 * La seule action de cette classe est statique : soigner un personnage
 * Un soin rend des points de vie (d'un montant défini dans la classe) à un personnage
 * 
 * Créez 3 soins distincts
 */


class Soin {
    const SOIN = 25;
    const NAME = 'Soin';

    static public function soigne(Personnage $quelqu_un) {
        Narrateur::parle('Un soin (' . self::NAME . ') est utilisé.');

        $quelqu_un->estSoigne(self::SOIN);
    }
}
