<?php

require_once __DIR__ . '/../classes/Product.php';

class Orange extends Product {
    public function __construct() {
        parent::__construct('Orange', 35, true);
    }
}
