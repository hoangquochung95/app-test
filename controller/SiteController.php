<?php 

class SiteController {
    private $currentAction ;
    public function __construct($action = 'index')
    {
        $action = !empty($action) ? $action :'index';
        $this->currentAction = $action;
    }
    
    public function runAction(){
        $nameAction = strtolower(trim($this->currentAction)).'Action';
        if(method_exists ($this, $nameAction)){
            $this->$nameAction();
        }
    }

    public function indexAction(){
        if(Session::getSession('user')){
            header("Location: http://localhost:5000/product/");
        }
        MyApp::getView('site-index');
    }
    public function loginAction(){
        if(isset($_POST['email'])){
            $email = strtolower(trim($_POST['email']));
            $user = User::findUser($email);
            if($user){
                Session::setSession('user',$user);
                header("Location: http://localhost:5000/product/");
            }else{
                header("Location: http://localhost:5000/");

            }
        }
    }
    public function logoutAction(){
        Session::destroy();
        header("Location: http://localhost:5000/");
    }
}