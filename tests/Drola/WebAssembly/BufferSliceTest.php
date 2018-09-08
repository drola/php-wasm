<?php

namespace Drola\WebAssembly;

use PHPUnit\Framework\TestCase;

class BufferSliceTest extends TestCase
{

    /**
     * @expectedException \BadMethodCallException
     */
    public function testOffsetUnset()
    {
        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        unset($o[0]);
    }

    public function testGetLength()
    {
        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        $this->assertEquals(9, $o->getLength());
    }

    public function testOrd()
    {

        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        $this->assertEquals(ord('1'), $o->ord(0));
    }

    public function testOffsetGet()
    {

        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        $this->assertEquals($o[0], '1');
    }

    public function testOffsetExists()
    {

        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        $this->assertTrue(isset($o[0]));
        $this->assertFalse(isset($o[9]));
    }

    public function testOffsetSet()
    {

        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        $o[0] = '2';
        $this->assertEquals('2', $b[1]);
        $this->assertEquals('2', $o[0]);
    }

    public function testOffset()
    {

        $b = new Buffer('0123456789');
        $o = $b->offset(1);
        $o2 = $o->offset(1);
        $this->assertEquals('2', $o2[0]);
        $o2[0] = '3';
        $this->assertEquals('3', $o2[0]);
        $this->assertEquals('3', $o[1]);
        $this->assertEquals('3', $b[2]);
    }
}
