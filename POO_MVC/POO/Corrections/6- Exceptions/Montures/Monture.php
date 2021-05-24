<?php

/**
 * Définissez une classe abstraite qui représente une monture.
 * 
 * Une monture est définie par des points de vie, une endurance et une vitesse.
 * Une monture est chevauchable.
 * 
 * Faites en sorte que le Cheval (cf. partie 1) soit une monture.
 * Créez deux autres montures.
 */

namespace Montures;

use Montures\Chevauchable;

abstract class Monture implements Chevauchable {
    public $endurance;
    public $vitesse;
    public $pv;

    abstract public function seRepose();
}
