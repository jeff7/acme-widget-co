<?php

namespace AcmeWidgetCo\Strategies;

use AcmeWidgetCo\Interfaces\OfferInterface;

class RedWidgetOffer implements OfferInterface
{
    public function apply(array $items, $catalog): float
    {
        $discount = 0;
        $redWidgets = array_filter($items, fn($code) => $code === 'R01');
        if (count($redWidgets) > 1) {
            $discount = $catalog->getPrice('R01') / 2;
        }
        return $discount;
    }
}
