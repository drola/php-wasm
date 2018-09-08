<?php

namespace Drola\WebAssembly;

use Drola\WebAssembly\Lexer\WasmLexer;
use PHPUnit\Framework\TestCase;

class WasmLexerTest extends TestCase
{
    public function testEmpty() {
        $buffer = fopen('php://memory', 'rw');
        $result = WasmLexer::lex($buffer);
        $this->assertEquals([], $result);
    }
}
