<?php

class Article {
    public string $titre;
    public string $auteur;
    public DateTime $datePublication;
    public string $contenu;

    public function __construct(
        string $titre,
        string $auteur,
        DateTime $datePublication,
        string $contenu
    ) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->datePublication = $datePublication;
        $this->contenu = $contenu;
    }
}

$articles = [];
$nb = rand(5, 15);

// Faker est un outil pour avoir des fausses données
$faker = \Faker\Factory::create('fr_FR');

for ($i = 0; $i < $nb; $i++) {
    $articles[] = new Article(
        $faker->sentence(), // Une phrase aléatoire (du lorem ipsum)
        $faker->name(), // Un nom aléatoire
        $faker->dateTime(), // Un datetime aléatoire
        $faker->text(1000) // Un texte aléatoire (du lorem ipsum)
    );
}
