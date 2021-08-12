<?php

include __DIR__ . '/../models/article_model.php';

trier_articles($articles);

$html_title = 'Mes super articles triés par titres | Mon super blog';
$on_est_sur_un_article = false;

include __DIR__ . '/../views/liste-articles.html.php';