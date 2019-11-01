<?php

interface IProduct {
    public function getTotalCost();
    public function getIncome();
}

abstract class Product implements IProduct {

    const Interest = 20;

    protected $price;
    protected $name;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getTotalCost();

    public function getIncome() {
        return $this->getTotalCost() * self::Interest / 100;
    }

    public function __get($name)
    {
        if (isset($this->$name))
            return $this->$name;
        else
            return "undefined";
    }

}

class DigitalProduct extends  Product {

    public function __construct($name, $price)
    {
        parent::__construct($name, $price);
    }

    public function getTotalCost()
    {
        return $this->price;
    }

}

class WeightProduct extends Product {

    protected $weight;

    public function __construct($name, $price, $weight)
    {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }

    public function getTotalCost()
    {
        return $this->price * $this->weight;
    }
}

class CountableProduct extends Product {

    protected $count;

    public function __construct($name, $price, $count)
    {
        parent::__construct($name, $price);
        $this->count = $count;
    }

    public function getTotalCost()
    {
        return $this->price * $this->count;
    }
}


$site = new DigitalProduct('Разработка сайта', 10000);
$smartphone = new CountableProduct('IPhone X', 100000, 4);
$flour = new WeightProduct('Мука', 300, 100);

echo 'Товар "' . $site->name . '" стоимостью ' . $site->price . ' рублей приносит ' . $site->getIncome() . ' рублей прибыли <br>';
echo 'Товар "' . $smartphone->name . '"с ценой ' . $smartphone->price . ' рублей в количестве ' . $smartphone->count . ' шт и общей стоимостью ' . $smartphone->getTotalCost() . ' рублей приносит ' . $smartphone->getIncome() . ' рублей прибыли <br>';
echo 'Товар "' . $flour->name . '"с ценой ' . $flour->price . ' рублей весом ' . $flour->weight . ' кг и общей стоимостью ' . $flour->getTotalCost() . ' рублей приносит ' . $flour ->getIncome() . ' рублей прибыли <br>';
