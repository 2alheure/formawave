<?php

namespace Characters;

use Games\Narrateur;
use Montures\Cheval;
use Objects\Heals\Potion;
use Objects\Heals\Soin;
use Structures\Guilde;
use Objects\Weapons\Epee;

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
    protected $alignement;
    protected $avatar = 'avatar/default.jpg';

    protected $inventaire;

    protected $pv = 100;
    protected $force = 100;
    protected $magie = 100;
    protected $sagesse = 100;

    public function __construct(string $pseudo, int $age, string $alignement = 'neutre', $avatar = '') {
        $this->pseudo = $pseudo;
        $this->age = $age;
        $this->alignement = $alignement;

        if (!empty($avatar)) $this->avatar = $avatar;

        $this->inventaire = array(
            'epee' => new Epee,
            'potion' => new Potion
        );

        $this->luiArrive('Il est arrivé dans cette contrée.');
    }

    public function frappeALEpee(Personnage $quelqu_un, int $bonus_frappe = 0) {

        if ($quelqu_un->guilde == $this->guilde)
            $this->luiArrive('On tape pas les copains !');

        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            $this->luiArrive('Il frappe ' . $quelqu_un->pseudo . ' à l\'épée.');

            // Ma formule c'est : La force - 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = Epee::DEGATS + round($this->force - $this->age * 0.1) + $bonus_frappe;

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
                $this->luiArrive('Il frappe le cadavre de ' . $quelqu_un->pseudo . '.');
        }
    }

    public function frappe(Personnage $quelqu_un, int $bonus_frappe = 0) {

        if ($quelqu_un->guilde == $this->guilde)
            $this->luiArrive('On tape pas les copains !');

        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            $this->luiArrive('Il frappe ' . $quelqu_un->pseudo . '.');

            // Ma formule c'est : La force - 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = round($this->force - $this->age * 0.1) + $bonus_frappe;

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
                $this->luiArrive('Il frappe le cadavre de ' . $quelqu_un->pseudo . '.');
        }
    }

    public function envoieSortSur(Personnage $quelqu_un) {
        if ($quelqu_un->estVivant()) {   // Si le personnage qu'on frappe est vivant
            $this->luiArrive('Il envoie un sort sur ' . $quelqu_un->pseudo . '.');

            // Ma formule c'est : La magie + 10 % de l'âge du personnage 
            // (arrondi à l'entier le plus proche)
            $degats = round($this->magie + $this->age * 0.1);

            // Le "quelqu'un" subit nos dégats
            $quelqu_un->subitDegats($degats);
        } else {
            // Sinon

            if ($this->sagesse < 10) // Si le personnage n'est pas assez sage
                $this->luiArrive('Il s\'acharne sur le cadavre de ' . $quelqu_un->pseudo . '.');
        }
    }

    public function estSoigne(int $soins) {
        if ($this->estVivant()) {
            $this->luiArrive('Il est soigné de ' . $soins . ' PV.');

            // On "actualise" les PV du personnage
            $this->pv += $soins;
        }
    }

    public function subitDegats(int $nombre_degats) {
        $this->luiArrive('Il subit ' . $nombre_degats . ' dégats.');

        // On "actualise" les PV du personnage
        $this->pv -= $nombre_degats;

        // Si jamais ses PV tombent en dessous de 0
        // Ce personnage est mort
        if ($this->pv <= 0) {
            $this->luiArrive('Il trépasse');
            $this->vivant = false;
        }
    }

    public function utiliseObjet(string $quel_objet, Personnage $cible) {
        if (isset($this->inventaire[$quel_objet])) {

            $objet = $this->inventaire[$quel_objet];
            if ($objet instanceof Soin) {
                $objet::soigne($cible);
                unset($this->inventaire[$quel_objet]);
            } else {
                $objet::attaque($cible);
            }
        }
    }

    public function chevauche(Cheval $monture) {
        $this->luiArrive('Il chevauche son fidèle destrier.');

        $monture->chevauche();
    }

    public function rentreDans(Guilde $guilde) {
        $guilde->accueille($this);
        $this->guilde = $guilde;
    }

    public function estVivant() {
        return $this->vivant;
    }

    public function getAlignement() {
        switch ($this->alignement) {
            case 'bon':
            case 'mauvais':
                return $this->alignement;
            default:
                return 'neutre';
        }
    }

    public function setAlignement(string $nouvel_alignement) {
        $this->alignement = $nouvel_alignement;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar(string $avatar) {
        $this->avatar = $avatar;
    }

    public function luiArrive(string $happens) {
        Narrateur::parle($happens, $this);
    }
}
