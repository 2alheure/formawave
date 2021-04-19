<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* II. Boucles *************************/
/********* a. for ******************************/

// Déclarez une variable `limite` et affectez-lui un nombre
// (Un conseil : pas un nombre trop élevé ;-))
$limite = 100;

// Affichez tous les nombres pairs de 0 à `limite`
for ($i = 0; $i <= $limite; $i = $i + 2) {  // On pourrait aussi écrire $i += 2

    // Dans cette boucle on ne parcourera que les nombres pairs
    echo $i . '<br />';
}

// Affichez tous les nombres impairs de `limite` à -`limite`
for ($j = $limite; $j >= -$limite; $j = $j - 1) { // On pourrait aussi écrire $j--

    // Comme on ne sait pas ce qu'est $limite, on parcourt toutes les valeurs
    // Le modulo est négatif avec les nombres négatifs, donc on doit tester 1 ET -1
    if ($j % 2 == 1 || $j % 2 == -1) echo $j . '<br />';
}
