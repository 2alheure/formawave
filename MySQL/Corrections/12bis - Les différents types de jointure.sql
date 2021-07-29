-- Ecrire les requêtes correspondant

-- 1. Lister tous les utilisateurs 
-- et, s'ils en ont un, leur rôle
-- (le rôle est stocké dans une table à part)
SELECT * FROM utilisateurs 
LEFT OUTER JOIN role ON utilisateurs.role = role.id;

-- 2. Lister tous les véhicules
-- la marque du véhicule (stockée dans une table à part)
-- et, s'ils en ont un, leur propriétaire
SELECT * FROM vehicules 
JOIN marque ON vehicule.marque = marque.id
LEFT OUTER JOIN proprietaire ON vehicule.proprietaire = proprietaire.id;

-- 3. Lister tous les articles,
-- leur statut (stocké dans une table à part),
-- leur auteur et le rôle de l'auteur
-- (le rôle est stocké dans une table à part)
SELECT * FROM articles
JOIN statut ON articles.statut = statut.id
JOIN auteur ON articles.auteur = auteur.id
JOIN role ON auteur.role = role.id;

-- 4. Lister tous les commentaires d'un article, 
-- et leur auteur (aux commentaires comme à l'article)
SELECT * FROM commentaires
JOIN article ON commentaire.article = article.id
JOIN utilisateur AS auteur_de_comm ON commentaire.auteur = auteur_de_comm.id
JOIN utilisateur AS auteur_de_article ON article.auteur = auteur_de_article.id
WHERE article.id = 53;

-- 5. Lister tous les produits du panier d'un utilisateur
SELECT * FROM produits
JOIN panier ON produits.id = panier.produit
WHERE panier.user = 1337; -- 1337 = Exemple d'id utilisateur

-- 6. Lister tous les livres que tous les utilisateurs possèdent
SELECT livre.titre, utilisateur.nom FROM livre
JOIN bibliotheque ON livre.id = bibliotheque.livre
JOIN utilisateur ON bibliotheque.user = utilisateur.id;

-- Bonus. Lister tous les articles et le nombre de leurs commentaires
SELECT 
	articles.*, 
	COUNT(commentaires.id) AS nb_comm 
FROM articles
	JOIN commentaires ON commentaires.article = articles.id
GROUP BY articles.id;

-- Bonus 2. Récupérer le prix total du panier d'un utilisateur
SELECT 
	utilisateur.nom, 
	utilisateur.prenom,
	SUM(produits.prix * panier.quantite) AS montant_panier,
	SUM(panier.quantite) AS nb_produit
FROM produits
	JOIN panier ON produits.id = panier.produit
	JOIN utilisateur ON utilisateur.id = panier.user
GROUP BY utilisateur.id HAVING utilisateur.id = 1337;