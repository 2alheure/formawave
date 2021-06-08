-- Ecrire les requêtes correspondant

-- 1. On est sur un blog, 
-- et on veut afficher les archives des articles de janvier 1990
SELECT * FROM `articles` WHERE `annee` = "1990" AND `mois` = "01" ;
SELECT * FROM `articles` WHERE YEAR(`date`) = 1990 AND MONTH(`date`) = 1 ;
SELECT * FROM `articles` WHERE `date` LIKE '1990-01-%' ;
SELECT * FROM `articles` WHERE `date` BETWEEN '1990-01-01' AND '1990-01-31' ;


-- 2. On est sur un site e-commerce, 
-- et on souhaite afficher la 2e page de produits (chaque page fait 50 produits)
SELECT * FROM `produits` LIMIT 50, 50 ;
SELECT * FROM `produits` LIMIT 50 OFFSET 50 ;


-- Pour la 3e page
SELECT * FROM `produits` LIMIT 100, 50 ;
SELECT * FROM `produits` LIMIT 50 OFFSET 100 ;


-- 3. On est sur un CV en ligne, 
-- et on souhaite afficher toutes les compétences qui sont du domaine informatique
SELECT * FROM `competences` WHERE `domaine` = 'informatique' ;


-- 4. On est sur un site d'annonces immobilières, 
-- et on souhaite faire passer l'annonce 53 de l'état "à vendre" à l'état "vendu"
UPDATE `annonces` SET `etat` = 'vendu' WHERE `id` = 53 ;


-- 5. On est sur un site de gestion de stock alimentaire,
-- et on souhaite supprimer tous les aliments dont la date de péremption est passée
DELETE FROM `aliments` WHERE `date_de_peremption` < CURDATE() ;
DELETE FROM `aliments` WHERE `date_de_peremption` < CURRENT_DATE() ;
DELETE FROM `aliments` WHERE `date_de_peremption` < CURRENT_TIMESTAMP() ;


-- 6. On est sur un forum en ligne,
-- et on souhaite supprimer toutes les communications qui contiennent une insulte 
-- (choisissez-en 3 à filtrer)
DELETE FROM `communications` 
WHERE 
    LOCATE('cannard avec un o', `message`) != 0
    OR LOCATE('pignouf', `message`) != 0
    OR LOCATE('ange sans g', `message`) != 0
;

DELETE FROM `communications` 
WHERE
    `message` LIKE '%pignouf%'
    OR `message` LIKE '%cannard avec un o%'
    OR `message` LIKE '%ange sans g%'
;


-- BONUS. On est sur un blog,
-- et on souhaite afficher les articles qui correspondent à la chaîne de caractères
-- saisie dans un input search
SELECT * FROM `articles` WHERE `titre` LIKE '%valeur de l''input search%';


-- 7. On est un site de constructeur automobile,
-- et on souhaite enregistrer la mise en service d'un nouveau véhicule
INSERT INTO `vehicule` VALUE ('Volkswagen', '600EED77', 'Golf', '2021-05-08');


-- 8. On est sur un site de l'état,
-- et on souhaite obtenir une liste de toutes les personnes 
-- qui ne sont pas à jour dans le paiement de leurs impots
-- (on peut imaginer qu'il y a le montant dû et le montant encaissé)
SELECT * FROM `contribuable` WHERE `restant_du` > 0;
SELECT * FROM `contribuable` WHERE `montant_du` > `montant_encaisse`;
