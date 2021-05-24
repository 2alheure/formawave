<?php

/**
 * Ceci est une annotation
 */


/**
 * Cette classe est trop géniale !
 */
class MaClasse {

    /**
     * @var string Cet attribut est génial, lui aussi !
     */
    public $attribut;


    /**
     * @method Cette fonction sert à faire un truc incompréhensible
     * 
     * @param int $param1 Ce paramètre sert à quelque chose d'important
     * @param int $param2 Celui-là aussi est super important
     * 
     * @return string Un truc qui a été fait qui est super important
     * 
     * @throws Exception Tu as perdu au lancé de dé (tu as fait 6)
     * 
     * @link https://google.com Plus de détails sur la super fonction
     */
    function faitUnTrucIncomprehensible(int $param1, int $param2): string {
        // Fait un truc super dur
        // Mais du coup le code est illisible

        $de = rand(1, 6);
        if ($de = 6) throw new Exception('T\'as perdu !');

        return 'super important';
    }
}







// un peu plus loin dans mon code

try {
    $instance = new MaClasse;
    $instance->faitUnTrucIncomprehensible(1, 2);   // Passez la souris sur la fonction
} catch (Exception $e) {
    echo 'Cheh !';
}
