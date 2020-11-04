<?php

namespace App\Model;

class ShoppingCart
{
    public $products = [];

    /**
     * ShoppingCart constructor.
     * @param array $products
     */
    public function __construct(array $products)
    {
        $this->products = $products;
    }
}
