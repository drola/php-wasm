<?php


namespace Drola\WebAssembly;

class SExpressionElement
{
    /**
     * @var bool
     */
    private $isString;

    /**
     * @var bool
     */
    private $isQuoted;

    /**
     * @var bool
     */
    private $isDollar;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $isList;

    /**
     * @var null
     */
    private $elements;

    /**
     * SExpressionElement constructor.
     * @param bool $isString
     * @param bool $isQuoted
     * @param bool $isDollar
     * @param string $value
     * @param bool $isList
     * @param null $elements
     */
    public function __construct(
        bool $isString,
        bool $isQuoted,
        bool $isDollar,
        string $value,
        bool $isList,
        $elements = null
    ) {
        $this->isString = $isString;
        $this->isQuoted = $isQuoted;
        $this->isDollar = $isDollar;
        $this->value = $value;
        $this->isList = $isList;
        $this->elements = $elements;
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
}
