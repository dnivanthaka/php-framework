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
        $data['message'] = $this->_hello->getMessage();
        //$data = array('message'=>$message);
        $this->view->load('welcome', $data);
        //////echo print_r($this->_getPHPVersion());
        $this->view->load('common/footer');
        $this->view->render();
    }

    private function _getPHPVersion(){
        exec('php --version 2>&1', $output);

        return $output;
    }
}
