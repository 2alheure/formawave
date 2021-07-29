<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello, World!</title>
</head>

<body>
    <p>
        Ci-dessous devrait s'afficher "Hello, World!" :<br>
        <?php echo 'Hello, World!'; ?>
    </p>
    <p>
        Et ci-après devrait s'afficher une erreur :<br>
        <?= $test; ?>
    </p>


    <p>Ci-après le phpinfo&nbsp;:</p>
    <?php phpinfo(); ?>

</body>

</html>