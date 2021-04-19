<?php

/**
 * C'est dans ce fichier que nous allons pouvoir écrire
 * toutes les informations générales de notre application.
 * 
 * C'est également dans le fichier config.php 
 * que devront se trouver les informations sensibles.
 * 
 * Dupliquez le contenu du fichier config_example.php 
 * dans un fichier config.php.
 * 
 * Le fichier config.php est ignoré par git 
 * pour plus de sécurité.
 */

// General config
$config['BASE_URL'] = 'http://localhost';	// Pas de '/' à la fin

// Database config
$config['DB_HOST'] = '127.0.0.1';
$config['DB_PORT'] = '3306';
$config['DB_LOGIN'] = 'root';
$config['DB_PASSWORD'] = '';
$config['DB_NAME'] = 'test';

// Add your needed configuration under this line
// $config[''] = '';