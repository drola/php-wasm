<?php


namespace Drola\WebAssembly;

class SExpressionParser
{
    /**
     * @var IBuffer
     */
    private $buffer;

    /**
     * @var SourceLocation
     */
    private $location;

    /**
     * @var IBuffer
     */
    private $input;

    /**
     * @var int
     */
    private $line;

    /**
     * @var IBuffer
     */
    private $lineStart;

    /**
     * SExpressionParser constructor.
     * @param IBuffer $buffer
     * @throws ParseException
     */
    public function __construct(IBuffer $buffer)
    {
        $this->input = $buffer;
        $this->line = 1;
        $this->lineStart = $buffer;
        $root = null;
        while($root === null) {
            $root = $this->parse();
        }
    }

    /**
     * @throws ParseException
     */
    public function parse(): SExpressionElement
    {
        /**
         * @var $stack \SplStack<SExpressionElement>
         */
        $stack = new \SplStack();

        /**
         * @var $stackLocs \SplStack<SourceLocation>
         */
        $stackLocs = new \SplStack();

        $currentElement = new SExpressionElement();
        $this->input = $this->buffer;
        while (true) {
            $this->skipWhitespace();
            if ($this->input[0] === "\0") {
                break;
            }
            if ($this->input[0] === '(') {
                $this->input = $this->input->offset(1);
                $stack->push($currentElement);
                $currentElement = new SExpressionElement();
                $currentElement->setMetadata(
                    $this->line, $this->input->getOffset() - $this->lineStart->getOffset() - 1,
                    $this->location
                );
                $stackLocs->push($this->location);
            } else if ($this->input[0] === ')') {
                $this->input = $this->input->offset(1);
                $currentElement->setEndLocation($this->location);
                $last = $currentElement;
                if ($stack->isEmpty()) {
                    throw new ParseException("s-expr stack empty");
                }
                $currentElement = $stack->pop();
                $this->location = $stackLocs->pop();
                $currentElement->appendToList($last);
            } else {
                $currentElement->appendToList($this->parseString());
            }
        }

        if ($stack->count() != 0) {
            throw new ParseException("stack is not empty", $currentElement->getLine(), $currentElement->getColumn());
        }
        return $currentElement;
    }

    private function skipWhitespace()
    {
    }

    private function parseString()
    {
    }

    private function parseDebugLocation()
    {

    }
}
