<?php

namespace App\Exception;

// On peut déclarer nos use
use Exception;
use Throwable;

class ServerErrorException extends Exception {

	public function
	__construct(string $message = "", int $code = 0, Throwable $previous = null) {
		parent::__construct();

		// On prévoit le cas où le message est vide
		if (empty($this->message)) $this->message = 'Une erreur inattendue est survenue';
	}

	// Le comportement de cette classe ne change pas de son parent
	// On ne l'utilise que pour distinguer l'exception des autres
}
