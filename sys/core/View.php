<?php

class View
{
    private $config;
    private $_template;
    private $_template_header;
    private $_template_footer;
    private $_template_nav;
    private $_custom_styles;
    private $_custom_js;
    
    private $_views = [];
    
    public function __construct(){
        $this->config = Config::getInstance();
        
        $this->_custom_styles = array();
        $this->_custom_js = array();
    }
    
    public function load($viewname, &$data = NULL){
        
        if(is_array($data)){
            foreach($data as $key => $value){
                $$key = $value;
            }
        }
    
        if(isset($this->_template_header)){
            include($this->config->item('app_dir').DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$this->_template_header.'.php');
        }
        
        if(isset($this->_template_nav)){
            include($this->config->item('app_dir').DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$this->_template_nav.'.php');
        }
        
        include($this->config->item('app_dir').DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$viewname.'.php');
        
        if(isset($this->_template_footer)){
            include($this->config->item('app_dir').DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$this->_template_footer.'.php');
        }
    }
    
    public function setcustom($type, $name, $path){
        if($type == 'css'){
            $this->_custom_styles[$name] = $path;
        }else if($type == 'js'){
            $this->_custom_js[$name] = $path;
        }
    }

    public function template($template){
        $this->_template = $template;
    }
    
    public function header($header){
        $this->_template_header = $header;
    }
    
    public function footer($footer){
        $this->_template_footer = $footer;
    }
    
    public function navigation($nav){
        $this->_template_nav = $nav;
    }
    
    public function set($viewname, &$data = NULL){
        $this->_views[] = array($viewname, $data);
    }
    
    public function render(){
        
    }
}

