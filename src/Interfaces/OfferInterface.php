<?php

namespace AcmeWidgetCo\Interfaces;

interface OfferInterface
{
    public function apply(array $products, array $catalog): float;
}
