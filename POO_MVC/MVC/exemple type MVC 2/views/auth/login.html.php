<?php include view('parts/header'); ?>

<form action="<?= url('/login-handler') ?>" method="post" class="flex flex-col md:w-1/2 w-full border-2 mt-8 shadow-xl rounded-lg mx-auto p-8">
    <label for="login">Identifiant</label>
    <input type="text" class="outline outline-gray-500 p-1 outline-1 rounded-sm mt-2 mb-8" name="login" id="login" placeholder="Identifiant">

    <label for="password">Mot de passe</label>
    <input type="password" class="outline outline-gray-500 p-1 outline-1 rounded-sm mt-2 mb-8" name="password" id="password" placeholder="Mot de passe">

    <!-- 
        <div>
            <input type="checkbox" class="p-1 outline-1 rounded-sm mt-2 mb-8" name="remember" id="remember" placeholder="Mot de passe" value="true">
            <label for="remember">Se souvenir de moi</label>
        </div>
    -->

    <input type="submit" value="Se connecter" class="cursor-pointer rounded bg-gray-800 text-white hover:bg-gray-600 w-1/2 p-2 mx-auto">
</form>

<?php include view('parts/footer'); ?>