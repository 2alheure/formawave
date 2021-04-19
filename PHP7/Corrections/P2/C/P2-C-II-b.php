<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* II. Boucles *************************/
/********* b. while ****************************/

// Déclarez une variable `temps` 
// et affectez-lui un nombre entier compris entre 3 et 10
$temps = 5;

/**
 * Affichez "Bonjour" puis,
 * au bout de {temps} secondes,
 * affichez "Au revoir"
 */

echo 'Bonjour<br />';
$now = time();

while (time() - $now < $temps) {}
/**
 * Cette boucle ne fait qu'attendre que la valeur de time() augmente
 * assez pour dépasser la condition.
 * 
 * Cette méthode s'appelle de l'attente active :
 * Le processus est actif (il tourne) pendant qu'il attend
 */

echo 'Au revoir';