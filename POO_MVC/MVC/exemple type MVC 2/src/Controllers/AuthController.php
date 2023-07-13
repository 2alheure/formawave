<?php

namespace Controllers;

use Models\UserModel;

class AuthController {
    static function displayLoginForm() {
        include view('auth/login');
    }

    static function processLoginForm() {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            add_flash('error', 'Les deux champs sont requis.');
            redirect('/login');
        }

        $user = UserModel::getByEmail($_POST['login']);

        if (
            $user === false // Wrong login
            || !password_verify($_POST['password'], $user->password) // Wrong password
        ) {
            add_flash('error', 'Identifiants invalides.');
            redirect('/login');
        }

        add_flash('success', 'Vous êtes à présent connecté.');
        $_SESSION['user'] = $user;

        redirect('/home');
    }

    static function logout() {
        // We don't "destroy" the session as we want to keep the flashes
        // But we unset the user
        unset($_SESSION['user']);

        add_flash('success', 'Vous êtes à présent déconnecté.');
        redirect('/home');
    }

    static function displayProfile() {
        dd(user());
    }
}
