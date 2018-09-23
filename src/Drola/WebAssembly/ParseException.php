<?php


namespace Drola\WebAssembly;


class ParseException extends \Exception
{
    public function __construct(string $message = "", int $line = null, int $column = null)
    {
        if ($line !== null && $column !== null) {
            parent::__construct($message . " (line " . $line . ", col " . $column . ")");
        } else {
            parent::__construct($message);
        }
    }
}