<?php

namespace Drola\WebAssembly;

/**
 * The WebAssembly.Memory() constructor creates a new Memory object which is
 * a resizable string that holds the raw bytes of memory accessed by a WebAssembly Instance.
 * A memory created by PHP or in WebAssembly code will be accessible and mutable
 * from both PHP and WebAssembly.
 *
 * @package Drola\WebAssembly
 */
class WasmMemory
{
    /**
     * @var WasmMemoryDescriptor
     */
    private $memoryDescriptor;

    /**
     * @var string
     */
    private $buffer = '';

    const BYTES_PER_PAGE = 64 * 1024;

    /**
     * WasmMemory constructor.
     * @param WasmMemoryDescriptor $memoryDescriptor
     */
    public function __construct(WasmMemoryDescriptor $memoryDescriptor)
    {
        if ($memoryDescriptor->getMaximum() !== null
            && $memoryDescriptor->getMaximum() < $memoryDescriptor->getInitial()) {
            throw new \OutOfRangeException("Maximum memory size cannot be smaller than initial memory size");
        }

        $this->memoryDescriptor = $memoryDescriptor;
        $this->grow($memoryDescriptor->getInitial());
    }

    /**
     * The grow() method of the Memory object increases the size of the memory instance
     * by a specified number of WebAssembly pages.
     *
     * @param int $number The number of WebAssembly pages you want to grow the memory by (each one is 64KiB in size).
     * @return int The previous size of the memory, in units of WebAssembly pages.
     */
    public function grow(int $number): int
    {
        $originalSize = strlen($this->buffer);
        $newSize = $originalSize + $number * self::BYTES_PER_PAGE;
        $this->buffer = str_pad($this->buffer, $newSize, "\x00");
        return $originalSize / self::BYTES_PER_PAGE;
    }
}
