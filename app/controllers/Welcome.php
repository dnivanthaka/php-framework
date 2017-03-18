<?php
class Welcome extends Controller
{
    private $_hello;

    public function __construct(){
        parent::__construct();

        $this->_hello = new \welcome\FormattedMessage();
    }

    public function index(){
        $this->view->load('common/header');
        echo $this->_hello->getMessage();
        //////echo print_r($this->_getPHPVersion());
        $this->view->load('common/footer');
    }

    private function _getPHPVersion(){
        exec('php --version 2>&1', $output);

        return $output;
    }
}
