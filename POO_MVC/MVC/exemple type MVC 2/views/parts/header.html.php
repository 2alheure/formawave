<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mx-auto">

        <!-- Menu -->
        <nav class="flex p-4 gap-8 items-center bg-gray-800 text-white">

            <a href="<?= url('/home') ?>"class="hover:underline">Accueil</a>


            <?php if (is_connected()) : ?>
                <a href="<?= url('/logout') ?>"class="hover:underline">Se déconnecter</a>
                <a href=""class="hover:underline flex gap-2 items-center ml-auto">
                    <img src="<?= user('image') ?>" alt="" class="bg-gray-500 w-10 h-10 object-cover rounded-full">
                    <?= user('pseudo') ?>
                </a>
            <?php else : ?>
                <a href="<?= url('/login') ?>"class="hover:underline">Se connecter</a>
            <?php endif; ?>


        </nav>