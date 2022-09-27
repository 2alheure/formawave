<?php

$tableau = range(rand(1, 10), rand(20, 30), rand(1, 3));

/**
 * Ecrire une fonction `mediane`
 * qui prend un tableau de nombres (triés)
 * et qui renvoie sa médiane.
 * 
 * Rappel : la médiane c'est la valeur du "milieu du tableau".
 * Donc si le tableau a 5 éléments, c'est le 3e élément.
 * Si le tableau a 8 éléments, c'est la moyenne du 4e et 5e.
 * 
 * (Le tableau ci-dessus est là pour vous permettre de tester avec un tableau aléatoire)
 */
function mediane(array $tab): float {
    $nombre_cases = count($tab);
    $moitie = floor($nombre_cases / 2);

    if ($nombre_cases % 2 === 0) {
        // Le nombre de cases est pair
        // Je fais la moyenne
        $mediane = ($tab[$moitie] + $tab[$moitie - 1]) / 2;
    } else {
        // Le nombre de cases est impair
        // Je prends la "case du milieu"
        $mediane = $tab[$moitie];
    }

    return $mediane;
}

echo '<pre>';
print_r($tableau);
echo '</pre>';
echo 'La médiane du tableau est : ' . mediane($tableau);
