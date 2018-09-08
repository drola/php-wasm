<?php

namespace Drola\WebAssembly;

/**
 * A WebAssembly.Instance object is a stateful, executable instance of a WebAssembly.Module.
 *
 * Instance objects contain all the Exported WebAssembly functions that allow calling into
 * WebAssembly code from PHP.
 *
 * @package Drola\WebAssembly
 */
class WasmInstance
{
    /**
     * WasmInstance constructor.
     * @param WasmModule $module The WebAssembly.Module object to be instantiated.
     * @param object $importObject An object containing the values to be imported into the newly-created Instance, such as functions or WebAssembly.Memory objects. There must be one matching property for each declared import of module or else a WebAssembly.LinkError is thrown.
     */
    public function __construct(WasmModule $module, $importObject = null)
    {
    }

    /**
     * Returns an object containing as its members all the functions exported from the WebAssembly module instance, to allow them to be accessed and used by PHP.
     */
    public function getExports() {

    }
}