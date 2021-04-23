<?php

/**
 * Créez une classe narrateur, qui n'aura qu'une méthode statique : parler
 * 
 * (Personnalisez la méthode pour personnaliser votre affichage ;-))
 */

namespace Games;

use Characters\Personnage;

class Narrateur {
    /**
     * Le Narrateur a pour unique rôle de narrer l'histoire, en parlant
     * 
     * Si on reçoit un personnage, on pourra adapter l'affichage 
     * en fonction de celui-ci : 
     *      - couleur du texte (bleu = gentil, rouge = méchant, noir = neutre)
     *      - icône (archer, paladin, mage, ...)
     *      - etc
     */
    static public function parle(string $parole, Personnage $personnage = null) {
        $printed = '<p>';

        if (!empty($personnage)) {
            switch ($personnage->getAlignement()) {
                case 'neutre':
                    $color = 'dark';
                    break;
                case 'mauvais':
                    $color = 'danger';
                    break;
                case 'bon':
                    $color = 'primary';
                    break;
            }

            $printed .= '<img class="avatar mr-2" />'
                . '<b class="text-' . $color . '">' . $personnage->pseudo . '</b>&nbsp;: ';
        }

        $printed .= $parole . '</p>' . PHP_EOL;
    }
}
