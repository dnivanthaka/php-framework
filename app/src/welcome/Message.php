<?php
namespace welcome;

abstract class Message
{
    protected $_message;
    //static $count = 0;

    public function __construct(){
        $this->_message = 'This is the welcome message!!!';
        //self::$count = self::$count + 1;

        //echo self::$count;
    }

    protected abstract function getMessage();    
}
