<?php


namespace Drola\WebAssembly;


class SExpressionListElement extends SExpressionElement
{
    /**
     * SExpressionListElement constructor.
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        parent::__construct(false, false, false, '', true, $elements);
    }
}
