<?php

require_once __DIR__ . '/../classes/Product.php';

class Nuts extends Product {
    public function __construct() {
        parent::__construct('Nuts', 150, false); 
    }
}


