<?php

/**
 * Ecrire une fonction `factoriel`
 * qui calcule et renvoie le factoriel d'un nombre.
 * 
 * (Le factoriel d'un nombre n vaut
 * 1 * 2 * 3 * ... * n)
 */
function factoriel(int $n): int {
    $resultat = 1;

    for ($i = 1; $i <= $n; $i++) {
        $resultat *= $i;
        // $resultat = $resultat * $i;
    }

    return $resultat;
}

echo '10! = ' . factoriel(10); // Censé trouver 3 628 800