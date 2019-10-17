<?php

class Product {
    private $name;
    private $email;
    private static $activeProducts = [
        1 => [
            'name' => 'Apple',
            'price' => 4.95
        ],
        2 => [
            'name' => 'Orange',
            'price' => 3.99
        ]
    ];

    public static function findProduct($prductId){
        if (isset(Product::$activeProducts[$prductId])) { 
            return Product::$activeProducts[$prductId];
        }
        return false;
    }
}