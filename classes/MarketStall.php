<?php

require_once __DIR__ . '/Product.php';

class MarketStall {
    public array $products = [];

    public function __construct(array $products) {
        foreach ($products as $key => $product) {
            if ($product instanceof Product) {
                $this->products[$key] = $product;
            }
        }
    }

    public function addProductToMarket(string $name, Product $product): void {
        $this->products[$name] = $product;
    }

    public function getItem(string $name, int $amount): array|false {
        if (array_key_exists($name, $this->products)) {
            return [
                'amount' => $amount,
                'item' => $this->products[$name]
            ];
        }
        return false;
    }
}
