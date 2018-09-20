<?php


namespace Drola\WebAssembly;

class SExpressionStringElement extends SExpressionElement
{
    /**
     * SExpressionStringElement constructor.
     * @param bool $isQuoted
     * @param bool $isDollar
     * @param string $value
     */
    public function __construct(bool $isQuoted, bool $isDollar, string $value)
    {
        parent::__construct(true, $isQuoted, $isDollar, $value, false, null);
    }
}
