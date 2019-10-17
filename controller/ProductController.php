<?php

class ProductController
{
    private $currentAction;
    public function __construct($action = 'index')
    {
        $action = !empty($action) ? $action : 'index';
        $this->currentAction = $action;
    }

    public function runAction()
    {
        $nameAction = strtolower(trim($this->currentAction)) . 'Action';
        if (method_exists($this, $nameAction)) {
            $this->$nameAction();
        }
    }
    public function indexAction()
    {
        MyApp::getView('shop-index');
    }

    public function addCartAction(){
        if( isset($_POST['numberApples'])){
            $numberApples = $_POST['numberApples'];
            $numberOranges = $_POST['numberOranges'];

            if (!empty(Session::getSession('cart'))) {
                $cart = Session::getSession('cart');
                $cart->setProducts(1, intval($numberApples));
                $cart->setProducts(2, intval($numberOranges));
            } else {
                $cart = new Cart();
                $cart->setProducts(1, intval($numberApples));
                $cart->setProducts(2, intval($numberOranges));
                Session::setSession('cart', $cart);
            }
        }   
        echo $cart->calculatorOrder();
        die();
    }

}
