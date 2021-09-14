-- Ecrire les requêtes demandées

-- 1. "Récupère les utilisateurs dont l'id est supérieur à 3 et inférieur à 5"
SELECT * FROM `user` WHERE `id` > 3 AND `id` < 5;
SELECT * FROM `user` WHERE `id` = 4; -- Fonctionne pour les malins

-- 2. "Récupère les véhicules dont l'id est compris entre 40 et 50"
SELECT * FROM `vehicules` WHERE `id` BETWEEN 40 AND 50;

-- 3. "Récupère 10 stations-essence, ordonnées par le prix du gazoil qu'elles vendent"
SELECT * FROM `stations_essence` ORDER BY `prix_gazoil` ASC LIMIT 10;

-- 4. "Modifie les 10 articles les plus chers pour réduire leur prix de 1 €"
UPDATE `articles` SET `prix` = `prix` - 1 ORDER BY `prix` DESC LIMIT 10;

-- 5. "Supprime les clients mineurs ou dont l'adresse email est absente"
DELETE FROM `clients` WHERE `age` BETWEEN 0 AND 17 OR `email` IS NULL;
DELETE FROM `clients` WHERE `age` < 18 OR `email` IS NULL;