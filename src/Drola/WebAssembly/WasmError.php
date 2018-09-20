<?php

namespace Drola\WebAssembly;

class WasmError extends \Exception
{
    /**
     * @var string|null The name of the file containing the code that caused the exception.
     */
    protected $fileName;

    /**
     * @var int|null The line number of the code that caused the exception.
     */
    protected $lineNumber;

    /**
     * WasmError constructor.
     * @param string $message Human-readable description of the error.
     * @param string|null $fileName The name of the file containing the code that caused the exception.
     * @param int|null $lineNumber The line number of the code that caused the exception.
     */
    public function __construct(string $message = '', string $fileName = null, int $lineNumber = null)
    {
        parent::__construct($message);
        $this->fileName = $fileName;
        $this->lineNumber = $lineNumber;
    }

    /**
     * @return null|string
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @return int|null
     */
    public function getLineNumber(): ?int
    {
        return $this->lineNumber;
    }
}
