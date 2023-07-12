<?php
namespace App;

use DateTime;

/**
 * Ecrivez les tests unitaires 
 * pour TOUS les comportements de cette classe
 */
class Meteo {
    public DateTime $date;
    public float $temperature; // En ° C
    public float $pressure; // En hPa
    // Haute pression = temps calme
    // Basse pression = pluie

    public function __construct() {
        $this->date = new DateTime;
    }

    public function recommandedOutfits() {
        $warm = $this->temperature > 15;
        $wet = $this->pressure < 1000;

        if ($warm && $wet) {
            return 'T-shirt aéré + Pantalon léger + chaussures respirantes';
        } elseif ($warm && !$wet) {
            return 'Casquette + T-shirt + Short';
        } elseif (!$warm && $wet) {
            return 'Manteau + Parapluie';
        } else {
            return 'Doudoune + Gants';
        }
    }
}
