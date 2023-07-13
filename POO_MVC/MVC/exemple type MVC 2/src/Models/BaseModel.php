<?php

namespace Models;

use PDO;
use App\Config;

class BaseModel {
    static function connectToDB(): PDO {
        // We instanciate the PDO
        $db = new PDO(
            'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';port=' . Config::DB_PORT,
            Config::DB_USER,
            Config::DB_PSW
        );

        // We put default fetch mode to FETCH_OBJ
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $db;
    }
}
