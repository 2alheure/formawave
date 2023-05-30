<?php

namespace App;

use DateTime;
use Exception;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Jeu {
    public Joueur $joueur1;
    public Joueur $joueur2;

    public Joueur $joueurQuiJoue;
    public Joueur $gagnant;
    public $plateau = [
        [null, null, null],
        [null, null, null],
        [null, null, null],
    ];

    public DateTime $dateDebut;
    public DateTime $dateDernierCoup;

    public string $erreur;

    public function __construct() {
        $this->joueur1 = new Joueur('X', 'bg-red-500 text-black');
        $this->joueur2 = new Joueur('O', 'bg-green-500 text-white');

        $this->joueurQuiJoue = $this->joueur1;
        $this->gagnant = null;

        $this->dateDebut = new DateTime;
    }

    /**
     * Place le symbol dans la case [x ; y] du plateau
     * @param Joueur $joueur Le joueur qui joue le coup
     * @param int $x L'abscisse du coup sur le plateau du coup
     * @param int $y L'ordonnée du coup sur le plateau du coup
     * @return bool Si le coup a pu être joué ou non
     */
    public function placerCoup(int $x, int $y): bool {
        $this->erreur = '';
        if (!empty($this->gagnant)) {
            $this->erreur = 'Vous ne pouvez pas jouer. Le jeu est déjà gagné. Recommencez une partie.';
            return false;
        }

        if ($x < 0 || $x > 3 || $y < 0 || $y > 3) {
            $this->erreur = 'La case ciblée n\'existe pas.';
            return false;
        }

        if ($this->plateau[$x][$y] !== null) {
            $this->erreur = 'La case visée n\'est pas vide.';
            return false;
        }

        $this->plateau[$x][$y] = $this->joueurQuiJoue->jeton;

        if ($this->existeComboGagnant()) {
            $this->gagnant = $this->joueurQuiJoue;
        } else {
            $this->changerTourDeJeu();
        }

        $this->dateDernierCoup = new DateTime;
        return true;
    }

    public function changerTourDeJeu() {
        if ($this->joueurQuiJoue === $this->joueur1) $this->joueurQuiJoue = $this->joueur2;
        else $this->joueurQuiJoue = $this->joueur1;
    }

    /**
     * Renvoie 1 si c'est au tour du joueur 1, 
     * renvoie 2 si c'est au tour du joueur 2
     */
    public function tourDe(): string {
        if ($this->joueurQuiJoue === $this->joueur1) return 1;
        else return 2;
    }

    public function existeComboGagnant(): bool {
        foreach ($this->plateau as $x => $ligne) {
            foreach ($ligne as $y => $jeton) { // On vérifie pour chaque case
                if ($jeton === null) continue; // Si la case est vide elle nous intéresse pas

                for ($i = -1; $i <= 1; $i++) {
                    for ($j = -1; $j <= 1; $j++) { // On va vérifier les cases autour (donc +- 1 par rapport à x et y)

                        if ($i === 0 && $j === 0) continue; // Si on est sur un décalage de 0 et 0 on saute (= même case)

                        if (
                            !isset($this->plateau[$i + $x][$j + $y])
                            || !isset($this->plateau[-$i + $x][-$j + $y])
                        ) continue; // Si une des cases n'existe pas sur le plateau on saute

                        if (
                            $this->plateau[$i + $x][$j + $y] === $jeton
                            && $this->plateau[-$i + $x][-$j + $y] === $jeton // Si les deux cases valent la même chose que la case initiale on a trouvé un combo gagnant
                        ) return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Check si le jeu est mort (plus de case dispo et pas de gagnant)
     */
    public function estMort(): bool {
        if (!empty($this->gagnant)) return false; // Si on a un gagnant c'est pas mort

        foreach ($this->plateau as $ligne) {
            foreach ($ligne as $jeton) {
                if (empty($jeton)) return false;
            }
        }

        return true;
    }

    public function sAfficher() {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        $twig = new Environment($loader, [
            'debug' => true,
            'cache' => false
        ]);
        $twig->addExtension(new DebugExtension);

        try {
            echo $twig->render('jeu.html', [
                'jeu' => $this,
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
