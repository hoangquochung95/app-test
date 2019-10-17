<?php 

class ShoppingCartController{
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

    public function indexAction(){
        MyApp::getView('cart-index');
    }
    
    
}