<?php

namespace Drola\WebAssembly;


class WasmMemoryDescriptor
{
    /**
     * @var int
     */
    private $initial;

    /**
     * @var int|null
     */
    private $maximum;

    /**
     * Note: A WebAssembly page has a constant size of 65,536 bytes, i.e., 64KiB.
     *
     * @param int $initial The initial size of the WebAssembly Memory, in units of WebAssembly pages.
     * @param int|null $maximum The maximum size the WebAssembly Memory is allowed to grow to, in units of WebAssembly pages.
     */
    public function __construct(int $initial, int $maximum = null)
    {
    }

    /**
     * @return int
     */
    public function getInitial(): int
    {
        return $this->initial;
    }

    /**
     * @return int|null
     */
    public function getMaximum(): ?int
    {
        return $this->maximum;
    }
}