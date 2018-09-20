<?php

namespace Drola\WebAssembly;

/**
 * A WebAssembly.Global object represents a global variable instance,
 * accessible from both JavaScript and importable/exportable across
 * one or more WebAssembly.Module instances. This allows dynamic linking of multiple modules.

 * @package Drola\WebAssembly
 */
class WasmGlobal
{
    /**
     * @var WasmGlobalDescriptor
     */
    private $globalDescriptor;

    /**
     * @var mixed
     */
    private $value;


    /**
     * WasmGlobal constructor.
     * @param WasmGlobalDescriptor $globalDescriptor
     * @param mixed $value The value the variable contains. This can be any value,
     * as long as its type matches the variable's data type.
     */
    public function __construct(WasmGlobalDescriptor $globalDescriptor, $value)
    {
        $this->globalDescriptor = $globalDescriptor;
        $this->setValue($value);
    }

    /**
     * @return WasmGlobalDescriptor
     */
    public function getGlobalDescriptor(): WasmGlobalDescriptor
    {
        return $this->globalDescriptor;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
