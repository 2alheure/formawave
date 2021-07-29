-- Ecrire les requêtes correspondant

-- 1. Vous êtes futur parent,
-- et vous souhaitez afficher toutes les combinaisons possibles entre nom et prenom
-- pour votre enfant
SELECT * FROM prenom JOIN nom;

-- 2. Vous êtes un site de rencontre,
-- et vous souhaitez lister toutes les combinaisons possibles entre 2 personnes
SELECT * FROM personne JOIN personne;

-- 3. On précise le 2.
-- en ne listant que les possibilités pour des personnes 
-- qui sont d'un certain genre 
-- et cherchent des personnes d'un certain genre
SELECT * 
FROM personne AS personne1 
JOIN personne AS personne2 
ON 
	personne1.genre = personne2.recherche 
	AND personne2.genre = personne1.recherche
;

-- 4. Lister tous les articles 
-- et leur catégorie (stockée dans une table à part)
SELECT * FROM article 
JOIN categorie ON article.categorie = categorie.id;

-- 5. Lister tous les produits 
-- et leur provenance (stockée dans une table à part)
SELECT * FROM produits 
JOIN provenance ON produits.provenance = provenance.id;