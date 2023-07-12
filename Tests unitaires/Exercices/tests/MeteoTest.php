<?php

use App\Meteo;
use PHPUnit\Framework\TestCase;

class MeteoTest extends TestCase {
    public function testGetCorrectRecommandedOutfits() {
        $m = new Meteo;

        // Chaud & humide
        $m->temperature = 30;
        $m->pressure = 980;
        $this->assertEquals(
            'T-shirt aéré + Pantalon léger + chaussures respirantes',
            $m->recommandedOutfits()
        );

        // Froid & humide
        $m->temperature = 5;
        $m->pressure = 980;
        $this->assertEquals(
            'Manteau + Parapluie',
            $m->recommandedOutfits()
        );

        // Chaud & sec
        $m->temperature = 30;
        $m->pressure = 1030;
        $this->assertEquals(
            'Casquette + T-shirt + Short',
            $m->recommandedOutfits()
        );

        // Froid & sec
        $m->temperature = 5;
        $m->pressure = 1030;
        $this->assertEquals(
            'Doudoune + Gants',
            $m->recommandedOutfits()
        );
    }

    public function testInstanceHasDate() {
        $m = new Meteo;

        $this->assertInstanceOf(DateTime::class, $m->date);
    }
}
