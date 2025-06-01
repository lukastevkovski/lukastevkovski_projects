<?php
require_once 'Furniture.php';
require_once __DIR__ . '/../interface/Printable.php';


class Sofa extends Furniture implements Printable {
    private $seats;
    private $armrests;
    private $length_opened;

    public function getSeats() {
        return $this->seats;
    }

    public function getArmrests() {
        return $this->armrests;
    }

    public function getLengthOpened() {
        return $this->length_opened;
    }

    // Setters
    public function setSeats($seats) {
        $this->seats = $seats;
    }

    public function setArmrests($armrests) {
        $this->armrests = $armrests;
    }

    public function setLengthOpened($length_opened) {
        $this->length_opened = $length_opened;
    }

    public function area_opened() {
        if ($this->getIsForSleeping()) {
            return $this->getWidth() * $this->length_opened;
        } else {
            return "This sofa is for sitting only, it has {$this->armrests} armrests and {$this->seats} seats.";
        }
    }

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
