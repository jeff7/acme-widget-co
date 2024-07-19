<?php

namespace AcmeWidgetCo;

class Catalog
{
    private array $products = [
        'R01' => 32.95,
        'G01' => 24.95,
        'B01' => 7.95
    ];

    public function getPrice(string $code): object
    {
        if ($this->products[$code]) {
            return $this->products[$code];
        } else {
            throw new \Exception("Product not found");
        }
    }
}