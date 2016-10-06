<?php

class Controller
{
    protected $view;
    protected $config;

    public function __construct(){       
        $this->config = Config::getInstance();
        $this->view   = new View(); 
    }

}

