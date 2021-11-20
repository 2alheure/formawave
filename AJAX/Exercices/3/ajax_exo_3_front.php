<?php

/**
 * On va chercher les éléments de notre BDD
 */
$bdd = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
$elements = $bdd->query('SELECT * FROM liste_courses');
?>


<!doctype html>
<html lang="en">

<head>
    <title>AJAX | Exercice 3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container">
        <h1>Ma liste de courses</h1>
        <div class="d-flex justify-content-center">
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-ajout">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Ajouter
            </button>
        </div>
        <div class="row" id="liste">
            <ul class="list-group col-12">
                <?php foreach ($elements as $element) : ?>
                    <li class="list-group-item">
                        <span class="badge badge-primary badge-pill mr-2">
                            <?= $element['quantite'] ?>&times;
                        </span>
                        <?= $element['nom'] ?>
                        <span class="actions pull-right">
                            <!-- Modifiez ce bouton à volonté -->
                            <button class="btn btn-danger ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Modal d'ajout -->
    <div class="modal fade" id="modal-ajout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter à la liste</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Nom de l'élément</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nom-ajout" id="nom-ajout" placeholder="Nom de l'élément">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Quantité</label>
                        <div class="col-sm-12">
                            <input type="number" min="1" step="1" class="form-control" name="quantite-ajout" id="quantite-ajout" placeholder="Quantité">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <!-- On fait attention à ne pas prendre jQuery slim... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $(function() {
            /* Ecrivez ici le JS
            nécessaire à l'exercice */
        });
    </script>
</body>

</html>