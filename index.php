<?php
require_once 'classes/Furniture.php';
require_once 'classes/Sofa.php';
require_once 'classes/Bench.php';
require_once 'classes/Chair.php';

echo "--- Furniture Test ---" . PHP_EOL;
$furniture = new Furniture(200, 100, 75);
$furniture->setIsForSeating(true);
$furniture->setIsForSleeping(false);
echo "Area: " . $furniture->area() . PHP_EOL;
echo "Volume: " . $furniture->volume() . PHP_EOL;

echo PHP_EOL . "--- Sofa Test ---" . PHP_EOL;
$sofa = new Sofa(220, 90, 80);
$sofa->setIsForSeating(true);
$sofa->setIsForSleeping(false);
$sofa->setArmrests(2);
$sofa->setSeats(3);

echo "Area: " . $sofa->area() . PHP_EOL;
echo "Volume: " . $sofa->volume() . PHP_EOL;
echo $sofa->area_opened() . PHP_EOL;

$sofa->setIsForSleeping(true);
$sofa->setLengthOpened(190);
echo $sofa->area_opened() . PHP_EOL;

echo PHP_EOL . "--- Bench Test ---" . PHP_EOL;
$bench = new Bench(180, 50, 40);
$bench->setIsForSeating(true);
$bench->setIsForSleeping(false);
$bench->setSeats(4);
$bench->setArmrests(0);
$bench->print();
$bench->sneakpeek();
$bench->fullinfo();

echo PHP_EOL . "--- Chair Test ---" . PHP_EOL;
$chair = new Chair(60, 60, 100);
$chair->setIsForSeating(true);
$chair->setIsForSleeping(false);
$chair->print();
$chair->sneakpeek();
$chair->fullinfo();
