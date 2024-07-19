<?php

namespace AcmeWidgetCo\Interfaces;

interface DeliveryChargeInterface
{
    public function calculate(float $total): float;
}
