<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception {
    function __construct(string $message = "Page not found", int $code = 404, ?Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
