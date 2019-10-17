<?php 

class Session {
    public static function start (){
        if(self::getIsStarted()){
            return;
        }
        session_start();
    }

    public static function close(){
        if (session_id() !== '')
            session_write_close();
    }

    public static function destroy()
    {
        if (session_id() !== '') {
            session_unset();
            session_destroy();
        }
    }

    public static function setSession($name,$value){
        $_SESSION[$name] = $value;
    }

    public static function getSession ($name){
        if(!isset($_SESSION[$name]))
            return false;
        return $_SESSION[$name];
    }
    
    public static function getIsStarted()
    {
        if (function_exists('session_status'))
            return session_status() === PHP_SESSION_ACTIVE;
        return session_id() !== '';
    }
}