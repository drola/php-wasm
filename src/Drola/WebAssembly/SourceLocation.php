<?php


namespace Drola\WebAssembly;

class SourceLocation
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $line;

    /**
     * @var int
     */
    private $column;

    /**
     * SourceLocation constructor.
     *
     * @param string $name
     * @param int $line
     * @param int $column
     */
    public function __construct(string $name, int $line, int $column)
    {
        $this->name = $name;
        $this->line = $line;
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }
}
