<?php

interface ProductInterface{
    public function getPrice(): int;
    public function getName(): string;
    public function isSoldByKg(): bool;
}