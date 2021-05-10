<?php

/********* Partie 2 ****************************/
/********* B. Les instructions de base *********/
/********* V. Les tableaux ********************/
/********* a. Le cas simple ********************/

// Nous allons faire un "Le compte est bon".
// Déclarez un tableau de 5 nombres (entiers) qui s'appelle nombres
$nombres = array(5, 7, 12, 50, 100); // Equivaut à [5, 7, 12, 50, 100]

// Déclarez une variable `resultat` qui contient un nombre entier
$resultat = 634;

// Affichez à présent, à l'aide de la fonction `echo`,
// Les différentes étapes pour obtenir le résultat à partir des nombres
// En n'utilisant que des additions, soustractions, multiplications et divisions entières
echo "Pour obtenir $resultat à l'aide de nos nombres, il faut faire : <br />"
	. ">> $nombres[0] x $nombres[4] = 500 <br />"
	. ">> $nombres[1] x $nombres[2] = 84 <br />"
	. ">> 500 + 84 + $nombres[3] = 634 <br />"
	. 'Le compte est bon !';
