<?php


// On fait un tableau d'animaux
$animaux = [
    'Chat',
    'Chien',
    'Loup',
    'Mouton',
    'Vache',
    'Chèvre',
    'Serpent',
    'Lama',
    'Bison',
    'Moustique',
    'Araignée',
    'Fourmie',
    'Abeille',
    'Scorpion',
    'Aigle',
    'Perroquet',
    'Dindon',
    'Hibou',
    'Chouette',
    'Caméléon',
    'Varan',
    'Cloporte',
    'Grenouille',
    'Wallaby',
    'Kangourou',
    'Crabe',
    'Wombat',
    'Raton Laveur',
    'Pangolin',
    'Chauve-Souris',
    'Panda',
    'Antilope',
    'Léopard',
    'Gazelle',
    'Lion',
    'Girafe',
    'Ecureuil',
    'Lapin',
    'Hamster',
    'Paon',
    'Mouche',
    'Tigre',
    'Zèbre',
    'Cochon',
    'Cheval',
    'Âne',
];

// On fait un tableau d'adjectifs
$adjectifs = [
    'anonyme',
    'bleu',
    'petit',
    'moche',
    'grand',
    'beau',
    'borgne',
    'urbain',
    'crade',
    'affamé',
    'intelligent',
    'écorché',
    'vif',
    'rapide',
    'fluide',
    'athlétique',
    'poétique',
    'emblématique',
    'squelettique',
    'charismatique',
    'courageux',
    'fort',
    'sauvage',
    'pessimiste',
    'optimiste',
    'réaliste',
    'vivifiant',
    'passionné',
    'dépressif',
    'intéressant',
    'vieux',
    'jeune',
];

// On prend une clef au hasard dans chaque tableau
$clef_animal_hasard = array_rand($animaux);
$clef_adjectif_hasard = array_rand($adjectifs);

// On récupère l'animal et le qualificatif
$animal = $animaux[$clef_animal_hasard];
$qualificatif = $adjectifs[$clef_adjectif_hasard];

// var_dump($animal, $qualificatif);

/**
 * On écrit ici le PHP
 * nécessaire à l'exercice
 */
