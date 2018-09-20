<?php

namespace Drola\WebAssembly;

class WasmModule
{
    /**
     * @var array
     */
    private $customSections;

    /**
     * @var array
     */
    private $exports;

    /**
     * @var array
     */
    private $imports;

    /**
     * WasmModule constructor.
     *
     * @param string|\SplFileInfo $bufferSource Binary code for of the .wasm module
     */
    public function __construct($bufferSource)
    {
        //TODO: Compile the .wasm file here
    }

    /**
     * @param string $sectionName
     * @return array A copy of the contents of all custom sections in the module with the given string name.
     */
    public function getCustomSections(string $sectionName): array
    {
        return $this->customSections[$sectionName] ?? [];
    }

    /**
     * @return array An array containing descriptions of all the declared exports.
     */
    public function getExports(): array
    {
        return $this->exports;
    }

    /**
     * @return array An array containing descriptions of all the declared imports.
     */
    public function getImports(): array
    {
        return $this->imports;
    }
}
