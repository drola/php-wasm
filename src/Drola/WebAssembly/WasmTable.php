<?php

namespace Drola\WebAssembly;

/**
 * The WebAssembly.Table() constructor creates a new Table object of the given size and element type.
 *
 * This is a PHP wrapper object — an array-like structure representing a WebAssembly Table,
 * which stores function references. A table created by PHP or in WebAssembly code will be
 * accessible and mutable from both PHP and WebAssembly.
 *
 * @package Drola\WebAssembly
 */
class WasmTable
{
    private $table = [];

    private $tableDescriptor;

    /**
     * WasmTable constructor.
     * @param WasmTableDescriptor $tableDescriptor
     */
    public function __construct(WasmTableDescriptor $tableDescriptor)
    {
        if($tableDescriptor->getMaximum() !== null && $tableDescriptor->getMaximum() < $tableDescriptor->getInitial()) {
            throw new \OutOfRangeException("Maximum number of elements cannot be smaller than initial number of elements");
        }

        $this->tableDescriptor = $tableDescriptor;
        $this->grow($this->tableDescriptor->getInitial());
    }

    /**
     * @return int
     */
    public function getLength() {
        return count($this->table);
    }

    /**
     * Retrieve a function reference stored at a given index
     *
     * @param int $index The index of the function reference you want to retrieve.
     * @return funcref A function reference — this is an exported WebAssembly function.
     */
    public function get(int $index) {
        if($index >= count($this->table)) {
            throw new \OutOfRangeException("Index must be less than length");
        }

        return $this->table[$index];
    }

    /**
     * The grow() method of the WebAssembly.Table object increases the size of the Table instance by a specified number of elements.
     *
     * @param $number int The number of elements you want to grow the table by.
     * @return int The previous length of the table.
     */
    public function grow($number: int): int {
        $originalLength = count($this->table);
        $newLength = $number + $originalLength;
        if($newLength > $this->tableDescriptor->getMaximum()) {
            throw new \RangeException("Cannot grow array beyond maximum number of elements.");
        }

        $this->table = array_pad($this->table, $newLength, null);

        return $originalLength;
    }

    /**
     * The set() method of the WebAssembly.Table object mutates a reference stored at a given index to a different value.
     *
     * @param int $index The index of the function reference you want to mutate.
     * @param $value funcref The value you want to mutate the reference to. This must be an exported WebAssembly function.
     */
    public function set(int $index, $value) {
        if($index >= count($this->table)) {
            throw new \OutOfRangeException("Index must be less than length");
        }

        if($value === null) {
            throw new \TypeError('$value should be an exported WebAssembly function.');
        }
    }
}