<?php


namespace Drola\WebAssembly;

class SExpressionParser
{
    /**
     * @var IBuffer
     */
    private $buffer;

    /**
     * SExpressionParser constructor.
     * @param IBuffer $buffer
     */
    public function __construct(IBuffer $buffer)
    {
        $this->buffer = $buffer;
    }

    public function parse()
    {
        /**
         * @var $stack \SplStack<SExpressionElement>
         */
        $stack = new \SplStack();

        /**
         * @var $stackLocs \SplStack<SourceLocation>
         */
        $stackLocs = new \SplStack();

        $currentElement = null;

        while (true) {
            $this->skipWhitespace();
            //if($this->)
        }
    }

    private function skipWhitespace()
    {
    }
}
