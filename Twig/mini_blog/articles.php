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

for ($i = 0; $i < $nb; $i++) {
    $articles[] = new Article(
        'Mon super article ' . $i,
        'Auteur n° ' . $i,
        new DateTime(),
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur suscipit voluptatem neque aspernatur numquam culpa modi aut saepe ut, ullam alias excepturi eum reprehenderit! Perferendis minima ad dolor. Ducimus, praesentium!
Dolores veritatis enim error voluptatum quaerat ducimus tenetur hic mollitia harum facilis, nulla officiis vel aperiam sed dignissimos, placeat qui. Velit quam incidunt enim, repellendus vitae voluptas ullam nam accusantium!
Quam error voluptatem maxime esse saepe repellendus similique obcaecati magnam molestiae ipsum officiis itaque illo amet, veritatis dolor voluptate architecto facere iste animi atque consequatur magni corrupti? Quidem, doloribus. Blanditiis?
Quam possimus, obcaecati optio accusantium doloribus dolores ex hic exercitationem, itaque veritatis sit ut quisquam magnam? Perspiciatis inventore rem et dolorum consequuntur iste minus non. Repellat nesciunt alias doloremque debitis?
Magni ab temporibus exercitationem eos. Iure quo pariatur corporis deserunt dolor impedit, quos, nihil obcaecati ut repellendus recusandae ea consequuntur facilis autem quae nam nesciunt? Beatae molestiae tempora mollitia fuga!'
    );
}
