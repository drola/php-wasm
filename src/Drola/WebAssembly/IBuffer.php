<?php


namespace Drola\WebAssembly;

interface IBuffer extends \ArrayAccess
{
    /**
     * @return int
     */
    public function getLength(): int;

    /**
     * @param int $pos
     * @return int
     */
    public function ord(int $pos): int;

    /**
     * @param int $offset
     * @return IBuffer
     */
    public function offset(int $offset): IBuffer;

    /**
     * @return int
     */
    public function getOffset(): int;
}
