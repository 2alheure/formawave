<?php

// Si on se place du point de vue "on récupère une erreur"
try {

    // On ESSAYE d'exécuter le code du try


    // PHP Data Objects
    $bdd = new PDO('xfcgvhkbjlnk,l', 'root', '');   // Génère une erreur (= "lève une Exception")


    // Un autre code
    // Jamais exécuté (parce qu'y a une Exception)

} catch (Exception $e) {
    // Dès qu'une Exception est levée, 
    // le try s'arrête et on arrive dans le catch

    // On fait ce qu'on a à faire

    echo $e->getMessage();

    echo 'Un problème est survenu';

    $de = rand(1, 6);
} finally {

    // TOUJOURS exécuté (après le try, ou après le catch)
    // Le finally est pas obligatoire
}


// Si on se place du point de vue "on crée une erreur"
$exception = new Exception('Ceci est une exception personnalisée.');    // On peut très bien crée une instance d'Exception
throw $exception; // On la "jette" (on la "déclenche")


// La classe Exception ressemble à ça : 
// Lien de la doc : https://www.php.net/manual/fr/class.exception.php
// class Exception {

//     public $message;
//     public $code;

//     public function getMessage() {
//         return $this->getMessage();
//     }

//     public function getCode() {
//         return $this->code;
//     }
// }

// Vu que c'est une classe comme une autre, on peut en hériter
class MonExceptionAMoi extends Exception {
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null) {
        file_put_contents('log.txt', 'Il y a eu une erreur');   // J'écris un fichier de log
        mail('truc@muche.fr', 'Une erreur est survenue', 'Rohlala, le site est planté !'); // J'envoie un mail

        parent::__construct();
    }
}

// Je peux maintenant jeter mon exception personnalisée
throw new MonExceptionAMoi('Message super descriptif de mon erreur');


class NotFoundException extends Exception {
}

class ServerErrorException extends Exception {
}


// Mon code banal

try {
    // On demande l'article de blog avec l'id = 3
    // Mais il n'existe pas

    /// blablabla
    // throw new NotFoundException;
} catch (PDOException $e) {
    // je suis dans le cas où j'ai une erreur PDO
} catch (NotFoundException $e) {
    // Je suis dans le cas où la page n'a pas été trouvée
} catch (ServerErrorException $e) {
    // Je suis dans le cas où il y a une erreur serveur
}
