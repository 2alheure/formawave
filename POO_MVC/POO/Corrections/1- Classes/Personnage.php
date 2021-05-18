<?php

require_once 'Cheval.php';

/**
 * Créez une classe PHP qui représente un personnage de jeu vidéo (type RPG)
 * Un personnage est caractérisé par un pseudo, des points de vie, sa force 
 * (ainsi que tous les points de caractéristique que vous voudrez)
 * 
 * Les actions d'un personnage consistent en : 
 * 		- Frapper (infliger des dégats à un autre personnage en fonction de sa force)
 * 		- Chevaucher un Cheval (ce qui appelle la méthode chevauche de la classe Cheval)
 */

class Personnage {
    public $pseudo;
    public $age;
    public $vivant = true;
    public $guilde;

    protected $pv = 100;
    protected $force = 100;
    protected $magie = 100;
    protected $sagesse = 100;

    // public function __construct(string $pseudo, int $age, int $pv = 0, int $force = 0, int $magie = 0, int $sagesse = 0) {
    //     $this->pseudo = $pseudo;
    //     $this->age = $age;
    //     $this->pv = $pv;
    //     $this->force = $force;
    //     $this->magie = $magie;
    //     $this->sagesse = $sagesse;
    // }

    public function frappe(Personnage $quelqu_un, int $bonus_frappe = 0) {

        if ($quelqu_un->guilde == $this->guilde)
            echo 'On tape pas les copains !';

        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            echo $this->pseudo . ' frappe ' . $quelqu_un->pseudo . '.';

            // Ma formule c'est : La force - 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = round($this->force - $this->age * 0.1) + $bonus_frappe;

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);

            // Si à présent il est mort
            if (!$quelqu_un->estVivant()) {
                echo 'Ce coup a été fatal à ' . $quelqu_un->pseudo . '.';
            }
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
                echo $this->pseudo . ' frappe le cadavre de ' . $quelqu_un->pseudo . '.';
        }
    }

    public function envoieSortSur(Personnage $quelqu_un) {
        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            echo $this->pseudo . ' envoie un sort sur ' . $quelqu_un->pseudo . '.';

            // Ma formule c'est : La magie + 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = round($this->magie + $this->age * 0.1);

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);

            // Si à présent il est mort
            if (!$quelqu_un->estVivant()) {
                echo 'Ce sort a été fatal à ' . $quelqu_un->pseudo . '.';
            }
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
                echo $this->pseudo . ' s\'acharne sur le cadavre de ' . $quelqu_un->pseudo . '.';
        }
    }

    public function estSoigne(int $soins) {
        if ($this->estVivant()) {
            echo $this->pseudo . ' a été soigné de ' . $soins . ' PV.';

            // On "actualise" les PV du personnage
            $this->pv += $soins;
        }
    }

    public function subitDegats(int $nombre_degats) {
        echo $this->pseudo . ' a subi ' . $nombre_degats . ' dégats.';

        // On "actualise" les PV du personnage
        $this->pv -= $nombre_degats;

        // Si jamais ses PV tombent en dessous de 0
        // Ce personnage est mort
        if ($this->pv <= 0) {
            $this->vivant = false;
        }
    }

    public function chevauche(Cheval $monture) {
        echo $this->pseudo . ' chevauche son fidèle destrier.';

        $monture->chevauche();
    }

    public function rentreDans(Guilde $guilde) {
        $guilde->accueille($this);
        $this->guilde = $guilde;
    }

    public function estVivant() {
        return $this->vivant;
    }
}
