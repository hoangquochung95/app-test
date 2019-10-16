<?php

class MyApp {
    private static $controllers =[
        'site'=>'/controller/SiteController.php',
        'cart'=>'/controller/CartController.php'
    ];
    private static $views = [
        'site-index' => '/view/site/index.php'
    ];
    public static function run(){
        if(isset($_SERVER['REQUEST_URI'])){
            $requestUrl = explode('/',$_SERVER['REQUEST_URI']);
            $aliasController =  (count($requestUrl) > 2) ? strtolower(trim( $requestUrl[1])): 'site';
            $actionController = (count($requestUrl) > 2) ? strtolower(trim( $requestUrl[2])): strtolower(trim( $requestUrl[1]));
            print_r( $requestUrl);
            echo $aliasController.'1';
            echo  $actionController ;
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

    public static function getView($nameView){
        if(isset(self::$views[$nameView])){
            // require_once __DIR__.self::$views[$nameView]; 
            // readfile("/path/to/file");
            echo file_get_contents(__DIR__.self::$views[$nameView]);
        }
    }

}