-- Ecrire les requêtes demandées

-- 1. "Je souhaite récupérer toutes les informations de tous les articles, et le pseudo des utilisateurs qui les ont écrits"
SELECT 
	`article`.*,
	`utilisateur`.`pseudo`

FROM `article`
	JOIN `utilisateur`
		ON `article`.`utilisateur_id` = `utilisateur`.`id`
;

-- 2. "Je souhaite récupérer le contenu d'un commentaire en particulier, ainsi que le pseudo de l'utilisateur qui l'a posté et le titre de l'article sous lequel il est posté"
SELECT 
	`commentaire`.`contenu`,
	`utilisateur`.`pseudo` AS pseudo_utilisateur,
	`article`.`titre` AS titre_article

FROM `commentaire`
	JOIN `utilisateur` 
		ON `commentaire`.`id_utilisateur` = `utilisateur`.`id`
	JOIN `article`
		ON `commentaire`.`id_article` = `article`.`id`

WHERE 
	`commentaire`.`id` = 3 -- id choisi arbitrairement
;

-- 3. "Je souhaite récupérer toutes les commandes d'un utilisateur en particulier, le nom et prénom de l'utilisateur qui a passé la commande ainsi que le nom du produit qui a été commandé et sa quantité"
SELECT 
	`commande`.`quantite`,
	`utilisateur`.`nom`,
	`utilisateur`.`prenom`,
	`produit`.`nom` AS produit

FROM `commande`
	JOIN `utilisateur`
		ON `commande`.`utilisateur_id` = `utilisateur`.`id`
	JOIN `produit`
		ON `commande`.`produit_id` = `produit`.`id`

WHERE 
	`utilisateur`.`id` = 3 -- choisi arbitrairement
;

-- 4. "Je souhaite récupérer l'ensemble des épisodes (leur nom et numéro) d'une saison de la série que je regarde actuellement"
SELECT 
	`episode`.`nom`,
	`episode`.`numero`

FROM `episode`
	JOIN `serie`
		ON `episode`.`id_serie` = `serie`.`id`

WHERE 
	`serie`.`id` = 3 -- choisi arbitrairement
	AND `episode`.`saison` = 2 -- choisi arbitrairement
;

-- 5. "Je souhaite récupérer l'ensemble des informations des voitures de mon parc automobile, avec le nom de leur marque, le nom de leur modèle, leur type de carburation et leur catégorie"
SELECT 
	`voiture`.*,
	`marque`.`nom`,
	`modele`.`nom`,
	`type_carburation`.`nom`,
	`categorie`.`nom`,

FROM `voiture`
	JOIN `categorie` 
		ON `voiture`.`categorie_id` = `categorie`.`id`
	JOIN `type_carburation` 
		ON `voiture`.`type_carburation_id` = `type_carburation`.`id`
	JOIN `modele` 
		ON `voiture`.`modele_id` = `modele`.`id`
	JOIN `marque`
		ON `modele`.`marque_id` = `marque`.`id`

WHERE 
	`voiture`.`utilisateur_id` = 36 -- choisi arbitrairement
;
