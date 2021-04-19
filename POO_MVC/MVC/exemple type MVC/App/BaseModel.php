<?php

namespace App;

use Exception;
use PDO;

class BaseModel {
	protected $bdd;

	public function __construct() {
		if (env('DB_HOST') === null || env('DB_PORT') === null || env('DB_LOGIN') === null || env('DB_PASSWORD') === null || env('DB_NAME') === null) throw new Exception('Missing database configuration parameter.');

		$this->bdd = new PDO('mysql:host=' . env('DB_HOST') . ';port=' . env('DB_PORT') . ';dbname=' . env('DB_NAME'), env('DB_LOGIN'), env('DB_PASSWORD'));
	}
}
