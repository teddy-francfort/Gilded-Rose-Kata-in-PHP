<?php

namespace App\Exceptions;

class InvalidItemQuantityException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $this->message ?? "The quantity is invalid";
    }
}