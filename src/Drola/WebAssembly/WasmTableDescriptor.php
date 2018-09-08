<?php

namespace Drola\WebAssembly;


class WasmTableDescriptor
{
    /**
     * A string representing the type of value to be stored in the table. At the moment this can only have a value of "anyfunc" (functions).
     *
     * @var string
     */
    private $element;

    /**
     * The initial number of elements of the WebAssembly Table.
     *
     * @var int
     */
    private $initial;

    /**
     * The maximum number of elements the WebAssembly Table is allowed to grow to.
     *
     * @var int|null
     */
    private $maximum;

    public function __construct(string $element, int $initial, int $maximum = null)
    {
        $this->element = $element;
        $this->initial = $initial;
        $this->maximum = $maximum;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
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
