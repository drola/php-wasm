<?php


namespace Drola\WebAssembly;

class Buffer implements IBuffer
{
    /**
     * @var string
     */
    protected $buffer;

    /**
     * Buffer constructor.
     * @param string $buffer
     */
    public function __construct(string $buffer)
    {
        $this->buffer = $buffer;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return strlen($this->buffer);
    }

    /**
     * @param int $pos
     * @return int
     */
    public function ord(int $pos): int
    {
        return ord($this->buffer[$pos]);
    }

    /**
     * @param int $offset
     * @return IBuffer
     */
    public function offset(int $offset): IBuffer
    {
        return new BufferSlice($this, $offset);
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
        return is_int($offset) && strlen($this->buffer) > $offset;
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
            return $this->buffer[$offset];
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
        if (is_int($offset) && $this->offsetExists($offset) && is_string($value) && strlen($value) === 1) {
            $this->buffer[$offset] = $value;
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

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return 0;
    }
}
