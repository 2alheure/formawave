<?php

/********* Partie 2 ****************************/
/********* B. Les instructions de base *********/
/********* III. Les chaînes de caractères ******/
/********* c. Fonctions ************************/

/*  1)

    Quelle fonction, qui opère sur des
    chaînes de caractères, en calcule sa taille ?
    (La documentation est votre amie ;-))
    => strlen
*/


$phrase = 'Ceci servira de phrase de test ; '
    . 'admettez que c\'est mieux que "Lorem Ipsum" quand même !';

/*  2)

    Affichez la phrase de test avec les modifications demandées
*/

// En majuscules
echo strtoupper($phrase) . '<br />';

// En rouge
echo '<p style="color: red">' . $phrase . '</p><br />';

// En minuscules
echo strtolower($phrase) . '<br />';

// En triple (interdiction de l'afficher 3 fois d'affilée !)
echo str_repeat($phrase, 3) . '<br />';

// En remplaçant "Lorem Ipsum" par ce qui vous fait plaisir ;-)
echo str_replace('Lorem Ipsum', 'Ce qui vous fait plaisir', $phrase);
