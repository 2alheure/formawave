-- Ecrire les requêtes demandées

-- 1. "Insère dans la table `machin` la ligne (1, 2, 4) aux colonnes (respectivement) `truc`, `muche` et `bidule`"

INSERT INTO machin (truc, muche, bidule) VALUE (1, 2, 4);

-- 2. "Insère les lignes (1, TRUE), (2, FALSE), (3, NULL) dans la table `hello`"

INSERT INTO hello VALUES (1, TRUE), (2, FALSE), (3, NULL);

-- 3. "Modifie la table `machin` et mets, dans la colonne `bidule`, la valeur 43"

UPDATE machin SET bidule = 43;

-- 4. "Supprime les entrées de `vehicule`"

DELETE FROM vehicule;

-- 5. "Récupère toutes les valeurs de la colonne `nom` de la table `utilisateur`"

SELECT nom FROM utilisateur;

-- 6. "Récupère toutes les entrées de la table `article`"

SELECT * FROM article;

-- 7. "Récupère toutes les valeurs de la colonne `psw`, qu'on va renommer temporairement `mot_de_passe`, de la table `utilisateur`"

SELECT psw AS mot_de_passe FROM utilisateur;