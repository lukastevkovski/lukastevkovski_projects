<?php

require_once __DIR__ . '/../classes/Product.php';

class Kiwi extends Product {
    public function __construct() {
        parent::__construct('Kiwi', 80, true); 
    }
}
