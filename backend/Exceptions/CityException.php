<?php

namespace App\Exceptions;

use Exception;

class CityException extends Exception {

    public function __construct (string $message, $code = 0) {

        parent::__construct($message, $code);

    }

}
