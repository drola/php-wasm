<?php

namespace Drola\WebAssembly;

use Drola\WebAssembly\Buffer;
use PHPUnit\Framework\TestCase;

class BufferTest extends TestCase
{

    public function testOffset()
    {
        $buffer = new Buffer('0123456789');
        $o0 = $buffer->offset(0);
        $this->assertEquals('0', $o0[0]);
        $o1 = $buffer->offset(1);
        $this->assertEquals('1', $o1[0]);
    }

    public function testOffsetSet()
    {
        $buffer = new Buffer('0123456789');
        $buffer[0] = '1';
        $this->assertEquals('1', $buffer[0]);

        try {
            $buffer['badOffset'] = '1';
            $this->fail('Should have thrown an exception');
        } catch(\OutOfRangeException $e) {

        }

        try {
            $buffer[0] = '123';
            $this->fail('Should have thrown an exception');
        } catch(\OutOfRangeException $e) {

        }

        try {
            $buffer[0] = 1;
            $this->fail('Should have thrown an exception');
        } catch(\OutOfRangeException $e) {

        }
    }

    public function testOrd()
    {
        $buffer = new Buffer(" ");
        $this->assertEquals(32, $buffer->ord(0));
    }

    public function testGetLength()
    {
        $buffer = new Buffer('0123456789');
        $this->assertEquals(10, $buffer->getLength());
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testOffsetUnset()
    {
        $buffer = new Buffer('0123456789');
        unset($buffer[0]);
    }

    public function testOffsetExists()
    {
        $buffer = new Buffer('0123456789');
        $this->assertTrue(isset($buffer[0]));
        $this->assertFalse(isset($buffer[10]));
    }

    public function testOffsetGet()
    {
        $buffer = new Buffer('0123456789');
        $this->assertEquals('0', $buffer[0]);
        try {
            $v = $buffer[10];
            $this->fail('Should have thrown an exception');
        } catch (\OutOfRangeException $e) {

        }
    }
}
