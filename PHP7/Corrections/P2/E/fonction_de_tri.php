<?php

/** Fin de la partie 2 sur le langage **/

// Exercice : écrire une fonction de tri

// $tableau contient des nombres
$tableau = array(1, 2, 3, 4, 5, 5, 5, 7, 8, 12, 14, 42, 1337, 18, 6357, 61384, 973, 16897);

// On mélange le tableau
shuffle($tableau);

// A présent, on appelle notre fonction de tri (définie plus bas)
// Pour trier notre tableau (et on vérifie qu'il est bien trié)
echo '<pre>';
print_r($tableau);
echo '</pre>';


/**
 * Complétez la fonction ci-dessous
 */
function trier(array $tableau)
{
    // Si le tableau est vide ou n'a qu'un seul élément,
    // pas besoin de le trier
    $count = count($tableau);
    if ($count < 2) return $tableau;

    $passage = 0;
    do {
        $passage++;
        $precedent = $tableau;

        /* On n'utilise pas de boucle foreach car on ne veut pas parcourir TOUS les éléments
            On va jusqu'à $count - $passage car on sait que les éléments à la fin du tableau
            sont déjà triés vu qu'on les "pousse vers la fin" à chaque fois qu'ils sont plus grands */
        for ($i = 0; $i < $count - $passage; $i++) {

            /* Si un élément du tableau est supérieur
                à son "voisin de droite"
                alors on échange leurs places */
            if ($tableau[$i] > $tableau[$i + 1]) {
                $save = $tableau[$i];   // Nous sommes obligés de nous souvenir de la valeur car elle se fait écraser ensuite !
                $tableau[$i] = $tableau[$i + 1];
                $tableau[$i + 1] = $save;
            }
        }
    } while ($tableau !== $precedent);
    // On reste dans la boucle tant que le tableau subit des changements

    return $tableau;
}
// Cette manière de faire s'appelle "Tri à bulle"
// Mais il en existe plein d'autres