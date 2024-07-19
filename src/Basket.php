<?php

namespace AcmeWidgetCo;

use AcmeWidgetCo\Strategies\DeliveryChargeStrategy;
use AcmeWidgetCo\Strategies\RedWidgetOffer;

class Basket
{
    private Catalog $catalog;
    private DeliveryChargeStrategy $deliveryStrategy;
    private RedWidgetOffer $offerStrategy;
    private array $items = [];

    public function __construct(Catalog $catalog, DeliveryChargeStrategy $deliveryStrategy, RedWidgetOffer $offerStrategy)
    {
        $this->catalog = $catalog;
        $this->deliveryStrategy = $deliveryStrategy;
        $this->offerStrategy = $offerStrategy;
    }
    
    public function add(string $productCode): void
    {
        $this->items[] = $productCode;
    }

    public function total(): string | int
    {
        $total = array_sum(array_map(fn($code) => $this->catalog->getPrice($code), $this->items));

        if ($total == 0)
            return 0;

        $offerDiscount = $this->offerStrategy->apply($this->items, $this->catalog);
        $deliveryCost = $this->deliveryStrategy->calculate($total - $offerDiscount);
        return number_format($total - $offerDiscount + $deliveryCost, 2);
    }

    public function clearBasket(): void
    {
        array_splice($this->items, 0);
    }
}
