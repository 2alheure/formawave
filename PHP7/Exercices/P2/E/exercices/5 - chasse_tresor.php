<?php

$tableau = array_fill(0, 10, array_fill(0, 10, false));
$tableau[rand(0, 9)][rand(0, 9)] = true;


echo '<pre>';
print_r($tableau);
echo '</pre>';


/**
 * Ecrivez une fonction
 * qui prend un tableau (en 2 dimensions).
 * et renvoie la position du trésor.
 * 
 * Le trésor est matérialisé par le booléen `true`.
 * 
 * (Le tableau ci-dessus est là pour vous permettre de tester avec un tableau aléatoire)
 */



 
/**
 * BONUS : 
 * Affichez (en HTML) une carte au trésor.
 * La carte serait un tableau, 
 * et le trésor serait marqué d'une croix (&times;) 
 * à son emplacement.
 */