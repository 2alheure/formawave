<?php

$tableau = array_fill(0, 10, array_fill(0, 10, false));
$tableau[rand(0, 9)][rand(0, 9)] = true;


// echo '<pre>';
// print_r($tableau);
// echo '</pre>';


/**
 * Ecrivez une fonction
 * qui prend un tableau (en 2 dimensions).
 * et renvoie la position du trésor.
 * 
 * Le trésor est matérialisé par le booléen `true`.
 * 
 * (Le tableau ci-dessus est là pour vous permettre de tester avec un tableau aléatoire)
 */
function trouver_tresor(array $tab) {
    foreach ($tab as $x => $ligne) {
        foreach ($ligne as $y => $case) {
            if ($case === true) return [
                'x' => $x,
                'y' => $y
            ];
        }
    }
}

// echo 'La position du trésor c\'est : ';
// print_r(trouver_tresor($tableau));



/**
 * BONUS : 
 * Affichez (en HTML) une carte au trésor.
 * La carte serait un tableau, 
 * et le trésor serait marqué d'une croix (&times;) 
 * à son emplacement.
 */
?>

<style>
    table {
        border-collapse: collapse;
    }
    
    table tr td {
        border: 1px solid #000;
        width: 30px;
        height: 30px;
        vertical-align: middle;
        text-align: center;
        padding: 0;
    }
</style>

<table>
    <?php
    foreach ($tableau as $x => $ligne) {
        echo '<tr>';
        foreach ($ligne as $y => $case) {
            if ($case === true) {
                echo '<td style="color:red;font-size:25px;">&times;</td>';
            } else {
                echo '<td></td>';
            }
        }
        echo '</tr>';
    }
    ?>
</table>