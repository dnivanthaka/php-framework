<?php
class Welcome extends Controller
{
    private $_hello;

    public function __construct(){
        parent::__construct();

        $this->_hello = new \welcome\FormattedMessage();
    }

    public function index(){
        echo $this->_hello->getMessage();
    }
}
