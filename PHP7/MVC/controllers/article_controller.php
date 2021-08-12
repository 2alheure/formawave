<?php
/**
 * J'appelle mon modèle
 */
include __DIR__ . '/../models/article_model.php';

/**
 * Je fais ma logique
 * 
 * Je crée mes variables, je fais mes calculs, ...
 */
$clef_article_au_hasard = array_rand($articles);
$un_article = $articles[$clef_article_au_hasard];
$html_title = $un_article['titre'] . ' | Mon super blog';
$on_est_sur_un_article = true;

/**
 * J'appelle ma vue
 */
include __DIR__ . '/../views/article.html.php';