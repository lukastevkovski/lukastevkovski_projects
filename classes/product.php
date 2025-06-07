<?php

class Product {
    protected string $name;
    protected int $price;
    protected bool $isSoldByKg;

    public function __construct(string $name, int $price, bool $isSoldByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->isSoldByKg = $isSoldByKg;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function isSoldByKg(): bool {
        return $this->isSoldByKg;
    }
}
