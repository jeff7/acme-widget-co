<?php

require 'vendor/autoload.php';

use AcmeWidgetCo\Basket;
use AcmeWidgetCo\Catalog;
use AcmeWidgetCo\Strategies\DeliveryChargeStrategy;
use AcmeWidgetCo\Strategies\RedWidgetOffer;

// Config
$catalog = new Catalog();
$deliveryStrategy = new DeliveryChargeStrategy();
$offerStrategy = new RedWidgetOffer();

//Index execution
echo "\n--------------------------------------//---------------------------------\n";
$basket = new Basket($catalog, $deliveryStrategy, $offerStrategy);
$basket->add('R01');
$basket->add('G01');
$basket->add('B01');
$basket->add('R01');
echo 'Total: $' . $basket->total() . "\n"; // Total: $85.28
echo "\n--------------------------------------//---------------------------------\n";

$basket->clearBasket();
$basket->add('B01');
$basket->add('G01');
echo "Total: $" . $basket->total() . "\n"; // Total: $37.85
echo "\n--------------------------------------//---------------------------------\n"; 

$basket->clearBasket();
$basket->add('R01');
$basket->add('R01');
echo "Total: $" . $basket->total() . "\n"; // Total: $54.38
echo "\n--------------------------------------//---------------------------------\n";

$basket->clearBasket();
$basket->add('R01');
$basket->add('G01');
echo "Total: $" . $basket->total() . "\n"; // Total: $60.85
echo "\n--------------------------------------//---------------------------------\n";

$basket->clearBasket();
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
echo "Total: $" . $basket->total() . "\n"; // Total: $98.28
