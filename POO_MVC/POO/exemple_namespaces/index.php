<?php

/**
 * On a deux namespaces utilisés : Foo et Bar.
 * Chaque namespace est rangé dans un dossier du même nom.
 */

// On utilise la fonction PHP `spl_autoload_register` 
// pour automatiquement aller chercher les classes qui nous intéressent
spl_autoload_register(function ($class) {
	// On remplace les "\" par des "/" et on va chercher le fichier associé à la classe
	// Ex : Foo\Test => Foo/Test.php
	require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});


use Foo\Test;
use Bar\Test as Test2;	// On utilise un alias pour éviter d'avoir deux classes "Test"

$test = new Test();
$test->itsMe();		// Affiche "Foo\Test"

$test = new Test2();
$test->itsMe();		// Affiche "Bar\Test"