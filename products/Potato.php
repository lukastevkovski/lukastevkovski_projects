<?php

require_once __DIR__ . '/../classes/Product.php';

class Potato extends Product {
    public function __construct() {
        parent::__construct('Potato', 25, true); 
    }
}
