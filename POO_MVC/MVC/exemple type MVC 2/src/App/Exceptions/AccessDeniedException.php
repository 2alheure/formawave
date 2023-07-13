<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class AccessDeniedException extends Exception {
    function __construct(string $message = "Access denied", int $code = 403, ?Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
