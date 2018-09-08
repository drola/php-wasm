<?php

namespace Drola\WebAssembly;


class WasmGlobalDescriptor
{
    /**
     * @var string A string representing the data type of the global.
     * This can be one of i32, i64, f32, and f64.
     */
    private $value;

    /**
     * @var bool Whether the global is mutable or not.
     */
    private $mutable;

    /**
     * WasmGlobalDescriptor constructor.
     * @param string $value A string representing the data type of the global. This can be one of i32, i64, f32, and f64.
     * @param bool $mutable Whether the global is mutable or not.
     */
    public function __construct(string $value, bool $mutable = false)
    {
        $this->value = $value;
        $this->mutable = $mutable;
    }

    /**
     * @return string A string representing the data type of the global. This can be one of i32, i64, f32, and f64.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool Whether the global is mutable or not.
     */
    public function isMutable(): bool
    {
        return $this->mutable;
    }
}
