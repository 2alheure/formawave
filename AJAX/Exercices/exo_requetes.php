<?php
$waiting_for = [
    array(
        'variable' => '$_GET[\'hohoho\']',
        'expecting' => 'hahaha'
    ),
    array(
        'variable' => '$_POST[\'test\']',
        'expecting' => 'oui oui oui'
    ),
    array(
        'variable' => '$_FILES[\'sample_file\'][\'name\']',
        'expecting' => 'Mon super fichier.waou'
    ),
    array(
        'variable' => '$_COOKIE[\'granola\']',
        'expecting' => 'Hmmm... C\'est bon !'
    ),
    array(
        'variable' => '$_SERVER[\'SCRIPT_NAME\']',
        'expecting' => '/ajax/abcdef/postman.php'
    ),
    array(
        'variable' => '$_SERVER[\'HTTP_USER_AGENT\']',
        'expecting' => 'SNCF'
    ),
    array(
        'variable' => '$_SERVER[\'REQUEST_METHOD\']',
        'expecting' => 'POST'
    ),
    array(
        'variable' => '$_SERVER[\'SCRIPT_NAME\']',
        'expecting' => '/ajax/abcdef/postman.php'
    ),
];

$n = 0;
?>
<!doctype html>
<html lang="en">

<head>
    <title>Exercice sur Postman</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Exercice sur Postman</h1>
    <p>
        Vous devez faire en sorte d'écrire une requête pour que le tableau soit correctement rempli. <br>
        Le tableau présente la variable PHP affichée, la valeur envoyée, et la valeur attendue.
    </p>
    <small>Evidemment, vous devrez sans doute faire des recherches pour compléter cet exercice^^'</small>

    <table class="table table-stripe table-hover">
        <thead>
            <tr>
                <th>Variable PHP</th>
                <th>Valeur attendue</th>
                <th>Valeur reçue</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($waiting_for as $waiting) {
                $variable = $waiting['variable'];
                $expecting = $waiting['expecting'];

                $to_eval = 'return isset(' . $variable . ') ? ' . $variable . ' : \'\';';

                $got = eval($to_eval);

            ?>
                <tr>
                    <td><code><?= $variable ?></code></td>
                    <td><?= $expecting ?></td>
                    <td><?= empty($got) ? '&empty;' : $got ?></td>
                    <td>
                        <?php if ($got != $expecting) : ?>
                            <span class="text-danger font-weight-bold" style="font-size: 20px;">&cross;</span>
                        <?php else :
                            $n++;
                        ?>
                            <span class="text-success font-weight-bold" style="font-size: 20px;">&check;</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Résultats</h2>
    <p>Vous avez obtenu <?= $n ?> / <?= count($waiting_for) ?> points.</p>
    <?php if ($n == count($waiting_for)) : ?>
        <p><b>Félicitations !</b> Vous avez terminé cet exercice !</p>
    <?php endif; ?>
</body>

</html>