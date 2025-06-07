<?php

require_once __DIR__ . '/../classes/Product.php';

class Raspberry extends Product {
    public function __construct() {
        parent::__construct('Raspberry', 555, false); 
    }
}
