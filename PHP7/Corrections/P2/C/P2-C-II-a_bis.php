<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* II. Boucles *************************/

// 1) Affichez la table de multiplication de 1
/**
 * Exemple d'affichage :
 * "1 x 1 = 1
 * 1 x 2 = 2
 * ...
 * 1 x 10 = 10"
 */
// for ($i = 1; $i <= 10; $i++) {
//     echo '1 x ' . $i . ' = ' . (1 * $i) . '<br>';
// }



// 2) Affichez toutes les tables de multiplication de 1 à 10
for ($j = 1; $j <= 10; $j++) {
    
    // La boucle for ($i)
    // C'est UNE table
    // On répète UNE table * 10
    // Grâce à la boucle for ($j)
    for ($i = 1; $i <= 10; $i++) {
        echo $j . ' x ' . $i . ' = ' . ($j * $i) . '<br>';
    }

    echo '<br><hr><br>';
}
