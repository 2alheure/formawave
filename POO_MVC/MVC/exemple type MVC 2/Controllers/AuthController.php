<?php

namespace Controllers;

use Models\UserModel;

class AuthController {
    static function displayLoginForm() {
        include view('auth/login');
    }

    static function processLoginForm() {
        if (empty($_POST['login']) || $_POST['password']) {
            redirect('/login');
        }

        $user = UserModel::getByEmail($_POST['login']);

        if (
            $user === false // Wrong login
            || !password_verify($_POST['password'], $user->password) // Wrong password
        ) {
            redirect('/login');
        }

        $_SESSION['user'] = $user;

        redirect('/home');
    }

    static function logout() {
        session_destroy();
        redirect('/home');
    }
}
