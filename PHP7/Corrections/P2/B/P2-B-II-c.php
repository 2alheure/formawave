<?php

/********* Partie 2 ****************************/
/********* B. Les instructions de base *********/
/********* II. Les opérateurs ******************/
/********* c. Logiques *************************/


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
var_dump(true && true);


/*  1)

    Complétez les commentaires 
    en donnant les résultats des diverses assertions logiques :

    true AND true
    => true

    true OR false
    => true

    true && true && true && ... && true && false
    => false                                        // Même s'il n'y a qu'UN SEUL false, TOUT est false

    false || false || false || ... || false || true
    => true                                         // Même s'il n'y a qu'UN SEUL true, TOUT est true

    true XOR false
    => true

    true XOR true
    => false

    false XOR false
    => false

    (5 < 2) || (3 > 1)
    => false

    (1 >= 1) && (1 <= 1) && (1 == 1 OR 1 === '1')
    => true
*/


/*  2)

    "Traduisez" en français les expressions PHP suivantes :

    $a || $b
    => a est vrai OU b est vrai

    $a && $b
    => a est vrai ET b est vrai

    $a XOR $b
    => a et vrai OU BIEN b est vrai, mais pas les deux

    $mouille == $il_pleut && $j_ai_oublie_mon_parapluie
    => Je suis mouillé s'il pleut et que j'ai oublié mon parapluie
    // Ou encore
    => S'il pleut et que j'ai oublié mon parapluie, alors je suis mouillé

    $diplome == $moyenne > 10 && !$renvoye_de_l_ecole
    => J'ai mon diplôme si ma moyenne est supérieure à 10 et que je n'ai pas été renvoyé de l'école
    // Ou encore
    => Si ma moyenne est supérieure à 10 et que je n'ai pas été renvoyé de l'école, alors j'ai mon diplôme
*/
