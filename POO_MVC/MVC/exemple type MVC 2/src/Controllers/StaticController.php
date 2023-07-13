<?php

namespace Controllers;

class StaticController {
    static function displayHomepage() {
        include view('static/home');
    }
}
