<?php

class Canard {
    private $espece;
    private $mort = 'false';
    private $nb_ailes = 2;
    private $nb_pattes = 2;
    private $nb_plumes = 23456;

    public function __construct(
        string $espece_du_canard_a_creer,
        int $nb_ailes_du_canard_a_creer,
        int $nb_pattes_du_canard_a_creer,
        int $nb_plumes_du_canard_a_creer
    ) {
        $this->espece = $espece_du_canard_a_creer;
        $this->nb_ailes  = $nb_ailes_du_canard_a_creer;
        $this->nb_pattes = $nb_pattes_du_canard_a_creer;
        $this->nb_plumes = $nb_plumes_du_canard_a_creer;
    }

    public function __destruct() {
        echo '<br>Le canard ' . $this->espece . ' a été détruit.';
    }

    // Une méthode
    public function sEnvole() {

        // NON mort     (il est faux de dire qu'il est mort --> Il est vrai de dire qu'il n'est pas mort)
        // !$this->mort ($mort = false                      --> !$mort = true)

        if (($this->nb_ailes == 2) && !$this->mort) {
            echo 'Je m\'envole très loin !';
        }
    }

    public function mourir() {
        return $this->mort;
    }

    public function getNbAiles() {
        return $this->nb_ailes;
    }

    public function setNbAiles($nouvelle_valeur) {
        $this->nb_ailes = $nouvelle_valeur;
    }
}

$canard = new Canard('colvert', 2, 3, 5678);   // PHP fait $canard->__construct()
$canard2 = new Canard('galinette cendrée', 3, 2, 9876);  // PHP fait $canard2->__construct()

echo 'canard<br><pre>';
print_r($canard);
echo '</pre><br>canard2<br><pre>';
print_r($canard2);
echo '</pre>';
