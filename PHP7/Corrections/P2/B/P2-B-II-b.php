<?php
/********* Partie 2 ****************************/
/********* B. Les instructions de base *********/
/********* II. Les opérateurs ******************/
/********* b. De comparaison *******************/

/**
 * Je vous invite à découvrir les opérateurs par vous-mêmes :
 * 
 * PHP met à disposition une fonction pour débugger, 
 * qui s'appelle `var_dump`, et qui affiche le type et la valeur
 * de ce que vous lui donnez entre parenthèses.
 * 
 * Aussi, amusez-vous avec les divers opérateurs vus et `var_dump` 
 * et testez un peu avant d'entamer les exercices un peu plus bas ;-)
 */

// Par exemple
var_dump(3 > 1);



/*  1)

    Complétez les commentaires 
    en donnant les résultats des diverses opérations :
    
    1 == 1              ==> true
    62 > 22             ==> true
    4 < -4              ==> false
    5 != -5             ==> true
    (3 * 2) >= 6        ==> true
    10 / 2 <= 7         ==> true
    90 % 2 <> 0         ==> true
    3 == M_PI           ==> false         // M_PI est la constante mathématique π (pi)
    5 === 6             ==> false
    4 !== '4'           ==> true
    1 + 2 === 3         ==> true
    7 !== 7             ==> false
 */


/*  2)

    Donnez les expressions en PHP correspondant 
    permettant de répondre aux questions ci-dessous :

    Trois vaut-il plus que deux ?
    => 3 > 2

    Si j'ai très faim, vaut-il mieux que je mange 
    quarante-cinq huitièmes de tarte, 
    ou bien dix demi-tartes ?
    => 45 / 8 > 10 / 2

    La variable `x` est-elle paire ?
    => $x % 2 == 0

    La variable `x` vaut-elle exactement la chaîne de caractères 
    composée du nombre cinquante-et-un ?
    => $x === '51'
*/