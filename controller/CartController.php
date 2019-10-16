<?php 

class CartController{
    private $currentAction ;
    public function __construct($action)
    {
        if(empty($action))
            echo 'Cart index';
        else{
            echo 'cart other';
        }
    }
    
}