<?php

class Config
{
    private $keys;
    
    private static $instance;

    private function __construct(){
        global $config;
        
        //$this->parseConfigs($config['system_dir'].DIRECTORY_SEPARATOR.'config');
        
        require_once($config['system_dir'].DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');       
        $this->keys = $config;
        //
    }
    
    private function parseConfigs($dir){
        $files = $this->readConfigs($dir);
        //print_r($files);
        foreach($files as $file){
            require($dir.DIRECTORY_SEPARATOR.$file);
            $this->keys[] = $export_var;
            //print_r($export_var);
            
        }
    }
    
    public static function getInstance(){
        if(!isset(self::$instance)){
          self::$instance = new Config();
        }
        //var_dump(self::$instance);
        return self::$instance;
    }
    
    public function vardump(){
        var_dump($this->keys);
    }
    
    public function item($key){
        if(array_key_exists($key, $this->keys))
            return $this->keys[$key];
        else
            return null;
    }
    
    public function site_url(){
        if($this->item('site_url') === null || $this->item('site_url') === ''){
            return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
        }else{
            return $this->item('site_url');
        }
    }
    
    public function base_url(){
        $url = $this->site_url();
        return substr($url, 0, strrpos($url, '/'));
    }
    
    public function redirect($url){
        //http://regexone.com/references/php
        if(preg_match("@^(https?://)([^/]+)@i", $url)){
            header("Location: ${url}");
        }else{
            $url = $this->site_url().'/'.$url;
            header("Location: ${url}");
        }
        //header("Location: ${url}");
        exit();
    }

    private function readConfigs($dir)
    {
        $files = array();
        
        $dh = opendir($dir);
        while(false !== ($file = readdir($dh))){
            if($file != '.' && $file != '..' && !strrpos($file, '.html')){
                $files[] = $file;
            }
        }
        
        return $files;
    }
    
    public function parseConfig($file){
        require_once($this->keys['system_dir'].DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$file.'.php');       
        //$this->keys = $$file;
        //print_r($$file);
        
        return $$file;
    }
}

