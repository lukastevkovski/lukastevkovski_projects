<?php

require_once __DIR__ . '/../classes/Product.php';

class Pepper extends Product {
    public function __construct() {
        parent::__construct('Pepper', 330, true);
    }
}
