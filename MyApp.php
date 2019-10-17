<?php

class MyApp {
    private static $core = [
        'session' => '/core/Session.php',
        'cart' => '/core/Cart.php'
    ];

    private static $controllers =[
        'site'=>'/controller/SiteController.php',
        'cart'=>'/controller/ShoppingCartController.php',
        'product' => '/controller/ProductController.php'
    ];
    private static $views = [
        'site-index' => '/view/site/index.php',
        'shop-index' => '/view/shop/index.php',
        'cart-index' => '/view/cart/index.php'
    ];
    private static $model = [
        'user' => '/model/User.php',
        'product' => '/model/Product.php'
    ];


    public static function run(){
        self::initModels();
        self::initCore();
        Session::start();

        if(isset($_SERVER['REQUEST_URI'])){
            $requestUrl = explode('/',$_SERVER['REQUEST_URI']);
            if(empty($requestUrl[0]) && empty($requestUrl[1])){
                $aliasController = 'site';
                $actionController = 'index';
            }else{
                if(strtolower(trim($requestUrl[1])) !== 'site')
                    self::checkAuth();

                if(count($requestUrl) <= 2){
                    $aliasController = strtolower(trim($requestUrl[1]));
                    $actionController = 'index';
                }else{
                    $aliasController = strtolower(trim($requestUrl[1]));
                    $actionController = strtolower(trim($requestUrl[2]));
                }
            }

            if( isset(self::$controllers[$aliasController]) ){
                require_once __DIR__.self::$controllers[$aliasController]; 
                $controller = basename(self::$controllers[$aliasController],'.php'); 
                return new $controller($actionController);
            }else{
                require_once __DIR__.self::$controllers['site']; 
                $controller = basename(self::$controllers['site'],'.php'); 
                return new $controller($actionController);
            }
        }
    }

    public function checkAuth(){
        if (!Session::getSession('user'))
            header("Location: http://localhost:5000/");
    }

    public static function initCore()
    {
        if (!empty(self::$core)) {
            foreach (self::$core as $path) {
                require_once __DIR__ . $path; 
                
            }
        }
    }

    public static function getView($nameView){
        if(isset(self::$views[$nameView])){
            ob_start();
            ob_implicit_flush(false);
            require(__DIR__ . self::$views[$nameView]);
            ob_end_flush();
        }
    }

    public static function initModels(){
        if(!empty(self::$model)){
            foreach (self::$model as $path){
                require_once __DIR__ . $path; 
            }
        }
    }


}