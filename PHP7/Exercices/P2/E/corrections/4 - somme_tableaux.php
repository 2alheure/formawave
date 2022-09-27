<?php

$tableau = range(rand(1, 10), rand(20, 30), rand(1, 3));
$tableau2 = $tableau;
shuffle($tableau);

/**
 * Ecrivez une fonction 
 * qui prend deux tableaux
 * et renvoie un 3e tableau, 
 * qui contient dans chacune de ses cases 
 * la somme des cases correspondantes des deux premiers tableaux.
 * 
 * Par exemple : [1, 2, 3] et [4, 5, 6] ===> [(1+4), (2+5), (3+6)] ===> [5, 7, 9]
 * 
 * (Les tableaux ci-dessus sont là pour vous permettre de tester avec des tableaux aléatoires)
 */
function somme_tableau(array $tab1, array $tab2): array {
    $taille = count($tab1);

    $tab3 = [];

    for ($i = 0; $i < $taille; $i++) {
        $tab3[$i] = $tab1[$i] + $tab2[$i];
    }

    // foreach ($tab1 as $clef => $valeur) {
    //     $tab3[$clef] = $tab1[$clef] + $tab2[$clef];
    // }

    return $tab3;
}

echo '<pre>';
print_r($tableau);
print_r($tableau2);
echo 'La somme des tableaux est : ';
print_r(somme_tableau($tableau, $tableau2));
echo '</pre>';
