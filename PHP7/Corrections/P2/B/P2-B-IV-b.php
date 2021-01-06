<?php

/********* Partie 2 ****************************/
/********* B. Les instructions de base *********/
/********* IV. Les dates ***********************/
/********* b. Fonctions ************************/

// Affichez les dates suivantes avec les formats demandés
// La date du jour au format jj/mm/aa (format français)
echo date('d/m/y').'<br />';
/**
 * Il faut ici se souvenir que date()
 * renvoie par défaut la date du jour.
 * En lui fournissant le format, on peut donc obtenir ce que l'on souhaite.
 */


// La date de la chute du mur de Berlin au format aaaa-mm-jj (format MySQL)
echo date_format(date_create_from_format('d/m/Y', '09/11/1989'), 'Y-m-d').'<br />';
/**
 * Ici, il faut comprendre que pour créer une date, 
 * on doit avoir recours à date_create ou à date_create_from_format.
 * Puis on utilise la fonction date_format pour afficher la date au format qui nous plait.
 */

// La date de la destruction des tours du World Trade Center au format anglais textuel (Ex : Wednesday, January the 5th, 2021)
echo date_format(date_create_from_format('d/m/Y', '11/09/2001'), 'l\, F \t\h\e jS\, Y').'<br />';
/**
 * On utilise la même méthode que précédemment, 
 * mais avec un autre format ;-)
 * 
 * Rappel : les formats sont disponibles dans la documentation
 * https://www.php.net/manual/fr/datetime.createfromformat.php
 */
