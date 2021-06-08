<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="retrieve.php">Retrieve</a></li>
            <li><a href="create.php">Create</a></li>
        </ul>
    </nav>

    <h1>Create</h1>

    <form action="create-handler.php" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required autofocus>
        <br>

        <label for="prix">Prix</label>
        <input type="number" name="prix" id="prix" required>
        <br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" required>
        <br>

        <input type="submit" value="Envoyer">
    </form>
</body>

</html>