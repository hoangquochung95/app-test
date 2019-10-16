<?php 

class SiteController {
    private $currentAction ;
    public function __construct($action = 'index')
    {
        $action = !empty($action) ? $action :'index';
        $this->currentAction = $action;
        echo $action;
    }
    
    public function runAction(){
        $nameAction = strtolower(trim($this->currentAction)).'Action';
        echo$nameAction ;
        if(method_exists ($this, $nameAction)){
            $this->$nameAction();
        }
    }
    public function indexAction(){
        MyApp::getView('site-index');
    }
    public function loginAction(){
        echo 'asdasd';
    }
}