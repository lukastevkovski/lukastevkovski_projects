<?php

require_once './products/Orange.php';
require_once './products/Potato.php';
require_once './products/Nuts.php';
require_once './products/Kiwi.php';
require_once './products/Pepper.php';
require_once './products/Raspberry.php';

require_once './classes/MarketStall.php';
require_once './classes/Cart.php';


$orange = new Orange();
$potato = new Potato();
$nuts = new Nuts();
$kiwi = new Kiwi();
$pepper = new Pepper();
$raspberry = new Raspberry();


$marketStall1 = new MarketStall([
    'orange' => $orange,
    'potato' => $potato,
    'nuts' => $nuts
]);

$marketStall2 = new MarketStall([
    'kiwi' => $kiwi,
    'pepper' => $pepper,
    'raspberry' => $raspberry
]);


$cart = new Cart();
$cart->addToCart($marketStall1->getItem('orange', 3));
$cart->addToCart($marketStall2->getItem('raspberry', 3));
$cart->addToCart($marketStall2->getItem('pepper', 1));
$cart->printReceipt();
