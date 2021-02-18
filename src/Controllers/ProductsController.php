<?php

namespace App\Controllers;

use App\Application;
use App\Models\Products\Products;
/**
 * Class ProductsController for request products
 *
 * @package RubyNight\App\Controllers;
 *
 * @author Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 */
class ProductsController
{
    /**
     * Render view
     *
     * @return view renders view
     */
    public static function index()
    {
        // render view from router for products
        return Application::$app->router->view('products.index');
    }

    /**
     * Get products from db
     *
     * @return array $products
     */
    public static function get()
    {
        // declare a new products object
        $products = new Products();
        // return products
        return $products->get();
    }
}