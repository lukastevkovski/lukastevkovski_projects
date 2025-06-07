<?php

class Cart {
    private array $cartItems = [];

    public function addToCart(array $item): void {
        $this->cartItems[] = $item;
    }

    public function printReceipt(): void {
        if (empty($this->cartItems)) {
            echo "Your cart is empty\n";
            return;
        }

        $total = 0;

        foreach ($this->cartItems as $cartItem) {
            $amount = $cartItem['amount'];
            $product = $cartItem['item'];
            $price = $product->getPrice() * $amount;
            $unit = $product->isSoldByKg() ? 'kgs' : 'gunny sacks';

            echo "{$product->getName()} | {$amount} {$unit} | total= {$price} denars\n";
            $total += $price;
            echo '<br>';
            echo '<br>';
        }

        echo "Final price amount: {$total} denars\n";
        
    }
}
