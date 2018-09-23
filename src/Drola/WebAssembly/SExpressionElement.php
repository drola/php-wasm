<?php


namespace Drola\WebAssembly;

class SExpressionElement
{
    /**
     * @var bool
     */
    private $isString = null;

    /**
     * @var bool
     */
    private $isQuoted = null;

    /**
     * @var bool
     */
    private $isDollar = null;

    /**
     * @var string
     */
    private $value = null;

    /**
     * @var bool
     */
    private $isList = null;

    /**
     * @var null
     */
    private $elements = null;

    /**
     * @var null|int
     */
    private $line = null;

    /**
     * @var null|int
     */
    private $column = null;

    /**
     * @var null|SourceLocation
     */
    private $sourceLocation = null;

    /**
     * @var null|SourceLocation
     */
    private $endSourceLocation = null;

    /**
     * SExpressionElement constructor.
     */
    public function __construct() {
    }

    /**
     * @return bool
     */
    public function isString(): bool
    {
        return $this->isString;
    }

    /**
     * @return bool
     */
    public function isQuoted(): bool
    {
        return $this->isQuoted;
    }

    /**
     * @return bool
     */
    public function isDollar(): bool
    {
        return $this->isDollar;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isList(): bool
    {
        return $this->isList;
    }

    /**
     * @return null
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param int $line
     * @param int $column
     * @param SourceLocation $sourceLocation
     */
    public function setMetadata(int $line, int $column, SourceLocation $sourceLocation)
    {
        $this->line = $line;
        $this->column = $column;
        $this->sourceLocation = $sourceLocation;
    }

    /**
     * @param string $str
     * @param bool $isDollar
     * @param bool $isQuoted
     */
    public function setString(string $str, bool $isDollar, bool $isQuoted)
    {
        $this->isList = false;
        $this->value = $str;
        $this->isDollar = $isDollar;
        $this->isQuoted = $isQuoted;
    }

    /**
     * @param SourceLocation $sourceLocation
     */
    public function setEndLocation(SourceLocation $sourceLocation) {
        $this->endSourceLocation = $sourceLocation;
    }

    /**
     * @return int|null
     */
    public function getLine(): ?int
    {
        return $this->line;
    }

    /**
     * @return int|null
     */
    public function getColumn(): ?int
    {
        return $this->column;
    }

    /**
     * @return SourceLocation|null
     */
    public function getSourceLocation(): ?SourceLocation
    {
        return $this->sourceLocation;
    }

    /**
     * @return SourceLocation|null
     */
    public function getEndSourceLocation(): ?SourceLocation
    {
        return $this->endSourceLocation;
    }

    /**
     * @param SExpressionElement $element
     * @throws ParseException
     */
    public function appendToList(SExpressionElement $element) {
        if(!$this->isList) {
            throw new ParseException('expected list', $this->line, $this->column);
        }
        $this->elements[] = $element;
    }
}
