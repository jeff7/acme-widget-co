<?php

namespace AcmeWidgetCo\Strategies;

use AcmeWidgetCo\Interfaces\DeliveryChargeInterface;

class DeliveryChargeStrategy implements DeliveryChargeInterface
{
    private array $deliveryCharges;

    public function __construct()
    {
        $this->deliveryCharges = [
            'below_50' => 4.95,
            'below_90' => 2.95,
            'above_90' => 0.00
        ];
    }

    public function calculate(float $total): float
    {
        if ($total < 50) {
            return $this->deliveryCharges['below_50'];
        } elseif ($total < 90) {
            return $this->deliveryCharges['below_90'];
        } else {
            return $this->deliveryCharges['above_90'];
        }
    }
}
