<?php

class Session{
    private $session_id;
    private static $instance;
    
    private function __construct(){
        session_start();
    
        $session_id = session_id();
    }
    
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Session();
        }
        //var_dump(self::$instance);
        return self::$instance;
    }
    
    public function destroy(){
        session_destroy();
    }
    
    public function put($key, $value=''){
        if(is_array($key)){
            foreach($key as $k=>$v){
                $_SESSION[$k] = $v;
            }
        }else{
            $_SESSION[$key] = $value;
        }
    }
    
    public function get($key){
        return $_SESSION[$key];
    }
    
    public function remove($key){
        unset($_SESSION[$key]);
    }
}
