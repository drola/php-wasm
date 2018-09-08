<?php


namespace Drola\WebAssembly;


class BufferSlice extends Buffer implements IBuffer
{
    /**
     * @var Buffer
     */
    private $parentBuffer;

    /**
     * @var int
     */
    private $offset;

    /**
     * BufferSlice constructor.
     * @param Buffer $buffer
     * @param int $offset
     */
    public function __construct(Buffer $buffer, int $offset = 0)
    {
        $this->parentBuffer = $buffer;
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return strlen($this->parentBuffer->buffer) - $this->offset;
    }

    /**
     * @param int $pos
     * @return int
     */
    public function ord(int $pos): int
    {
        return ord($this->parentBuffer->buffer[$this->offset + $pos]);
    }

    /**
     * @param int $offset
     * @return IBuffer
     */
    public function offset(int $offset): IBuffer
    {
        return new BufferSlice($this->parentBuffer, $this->offset + $offset);
    }

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return is_int($offset) && strlen($this->parentBuffer->buffer) > ($offset + $this->offset);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->parentBuffer->buffer[$offset + $this->offset];
        } else {
            throw new \OutOfRangeException();
        }
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if ($this->offsetExists($offset) && is_string($value) && strlen($value) === 1) {
            $this->parentBuffer->buffer[$offset + $this->offset] = $value;
        } else {
            throw new \OutOfRangeException();
        }
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException();
    }
}
