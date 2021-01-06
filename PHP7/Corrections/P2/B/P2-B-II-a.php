<?php
/********* Partie 2 ****************************/
/********* B. Les instructions de base *********/
/********* II. Les opérateurs ******************/
/********* a. Arithmétiques ********************/


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
var_dump(3 + 1);



/*  1)

    Complétez les commentaires 
    en donnant les résultats des diverses opérations :
    
    1 + 1               = 2
    62 - 22             = 40
    -4                  = -4
    40 * 3              = 120
    10 + 6 / 3          = 12
    (10 + 6) / 3        = 5.3333333...
    90 % 4 * 3          = 6
    2 ** 10             = 1024
    2 ** 3 * 3 ** 2     = 72
*/

/*  2)

    Donnez les expressions en PHP correspondant 
    aux énoncés ci-dessous :

    Deux au carré
    => 2 ** 2

    Le quart du tiers de quarante-cinq
    => 45 / 3 / 4

    Le reste de la division de trente par quatre
    => 30 % 4

    
    Le périmètre d'un cercle de rayon trois centimètres
    (Il existe une constante PHP pour exprimer π (pi))
    => 2 * M_PI * 3     // Le périmètre d'un cercle = 2 x π x rayon

*/