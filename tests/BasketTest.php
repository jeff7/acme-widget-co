<?php

use PHPUnit\Framework\TestCase;
use AcmeWidgetCo\Basket;
use AcmeWidgetCo\Catalog;
use AcmeWidgetCo\Strategies\DeliveryChargeStrategy;
use AcmeWidgetCo\Strategies\RedWidgetOffer;

class BasketTest extends TestCase
{
    private Catalog $catalog;
    private DeliveryChargeStrategy $deliveryStrategy;
    private RedWidgetOffer $offerStrategy;

    protected function setUp(): void
    {
        $this->catalog = new Catalog();
        $this->deliveryStrategy = new DeliveryChargeStrategy();
        $this->offerStrategy = new RedWidgetOffer();
    }

    public function testTotal(): void
    {
        $basket = new Basket($this->catalog, $this->deliveryStrategy, $this->offerStrategy);
        $basket->add('B01');
        $basket->add('G01');
        $this->assertEquals(37.85, $basket->total());
        
        $basket = new Basket($this->catalog, $this->deliveryStrategy, $this->offerStrategy);
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(54.38, $basket->total());

        $basket = new Basket($this->catalog, $this->deliveryStrategy, $this->offerStrategy);
        $basket->add('R01');
        $basket->add('G01');
        $this->assertEquals(60.85, $basket->total());

        $basket = new Basket($this->catalog, $this->deliveryStrategy, $this->offerStrategy);
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(98.28, $basket->total());
    }

    public function testClearBasket(): void
    {
        $basket = new Basket($this->catalog, $this->deliveryStrategy, $this->offerStrategy);
        $basket->add('B01');
        $basket->add('G01');
        $this->assertEquals(37.85, $basket->total());
        $basket->clearBasket();
        $this->assertEquals(0, $basket->total());
    }
}
