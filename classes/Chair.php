<?php
require_once 'Furniture.php';
require_once __DIR__ . '/../interface/Printable.php';

class Chair extends Furniture implements Printable {

    public function print() {
        $name = get_class($this);
        $sleeping = $this->getIsForSleeping() ? "sleeping" : "sitting only";
        echo "{$name}, {$sleeping}, " . $this->area() . "cm2" . PHP_EOL;
    }

    public function sneakpeek() {
        echo get_class($this) . PHP_EOL;
    }

    public function fullinfo() {
        $name = get_class($this);
        $sleeping = $this->getIsForSleeping() ? "sleeping" : "sitting-only";
        echo "{$name}, {$sleeping}, " . $this->area() . "cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm" . PHP_EOL;
    }
}
