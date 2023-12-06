<?php
require_once __DIR__ .'/vendor/autoload.php';

interface TaxiFactory
{
    public function createTaxi(): Taxi;
}


abstract class Taxi
{
    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    abstract public function getPrice();
}


class EconomyTaxi extends Taxi
{
    protected $model = 'Economy Model';

    public function getPrice()
    {
        return 10.0;
    }
}


class StandardTaxi extends Taxi
{
    protected $model = 'Standard Model';

    public function getPrice()
    {
        return 20.0;
    }
}


class LuxuryTaxi extends Taxi
{
    protected $model = 'Luxury Model';

    public function getPrice()
    {
        return 50.0;
    }
}


class EconomyTaxiFactory implements TaxiFactory
{
    public function createTaxi(): Taxi
    {
        return new EconomyTaxi();
    }
}


class StandardTaxiFactory implements TaxiFactory
{
    public function createTaxi(): Taxi
    {
        return new StandardTaxi();
    }
}


class LuxuryTaxiFactory implements TaxiFactory
{
    public function createTaxi(): Taxi
    {
        return new LuxuryTaxi();
    }
}


function orderTaxi(TaxiFactory $factory)
{
    $taxi = $factory->createTaxi();

    echo "You ordered a {$taxi->getModel()} taxi. The price is {$taxi->getPrice()} USD.\n";
}


orderTaxi(new EconomyTaxiFactory());


orderTaxi(new StandardTaxiFactory());


orderTaxi(new LuxuryTaxiFactory());