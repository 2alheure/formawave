<?php

/********* Partie 3 ***********************************************/
/********* D. Interagir avec le système de fichiers ***************/
/********* III. Les autres fonctions ******************************/

// On n'utilisera que les fonctions du terminal Linux pour ces exercices

/** 1)
 * 
 * Créer un dossier
 */
mkdir('dossier');

/** 2)
 * 
 * Créer un fichier dans ce dossier
 */
touch('dossier/fichier.txt');

/** 3)
 * 
 * Changer les droits du fichier pour 
 * supprimer les droits de lecture aux autres utilisateurs
 */
chmod('dossier/fichier.txt', 0700);

/** 4)
 * 
 * Supprimer le fichier
 */
unlink('dossier/fichier.txt');

/** 5)
 * 
 * Supprimer le dossier
 */
rmdir('dossier');
