-- Ecrire les requêtes correspondant

-- 1. On est sur un blog, 
-- et on veut afficher les archives des articles de janvier 1990
SELECT * FROM `articles` WHERE `creation` BETWEEN '1990-01-01' AND '1990-01-31';
SELECT * FROM `articles` WHERE `creation` >= '1990-01-01' AND`creation` <= '1990-01-31';

SELECT * FROM `articles` WHERE YEAR(`date_publication`) = 1990 AND MONTH(`date_publication`) = 01;

SELECT * FROM `articles` WHERE `date_publication` LIKE '1990-01-%';

-- 2. On est sur un site e-commerce, 
-- et on souhaite afficher la 2e page de produits (chaque page fait 50 produits)
SELECT * FROM `produits` LIMIT 50 OFFSET 50;
SELECT * FROM `produits` LIMIT 50, 50;

-- 3. On est sur un CV en ligne, 
-- et on souhaite afficher toutes les compétences qui sont du domaine informatique
SELECT * FROM `competences` WHERE `domaine` = 'informatique';

-- 4. On est sur un site d'annonces immobilières, 
-- et on souhaite faire passer l'annonce 53 de l'état "à vendre" à l'état "vendu"
UPDATE `annonces` SET `etat` = 'vendu' WHERE `id` = 53;

-- 5. On est sur un site de gestion de stock alimentaire,
-- et on souhaite supprimer tous les aliments dont la date de péremption est passée
DELETE FROM `stock` WHERE `date_de_peremption` < CURRENT_TIMESTAMP;

-- 6. On est sur un forum en ligne,
-- et on souhaite supprimer toutes les communications qui contiennent une insulte 
-- (choisissez-en 3 à filtrer)
DELETE FROM `communication` WHERE `contenu` LIKE '%馬鹿%' OR `contenu` LIKE '%canard%' OR `contenu` LIKE '%eau sale%';

-- 7. On est un site de constructeur automobile,
-- et on souhaite enregistrer la mise en service d'un nouveau véhicule
INSERT INTO `vehicule` (`date_mise_en_service`, `modele`) VALUES (CURRENT_TIMESTAMP, 'C3');

-- 8. On est sur un site de l'état,
-- et on souhaite obtenir une liste de toutes les personnes qui ne sont pas à jour dans le paiement de leurs impots
-- (on peut imaginer qu'il y a le montant dû et le montant encaissé)
SELECT `nom`, `prenom`
FROM `contribuable` 
WHERE `montant_du` > `montant_encaisse`;