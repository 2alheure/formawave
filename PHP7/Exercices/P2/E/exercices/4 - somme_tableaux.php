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
