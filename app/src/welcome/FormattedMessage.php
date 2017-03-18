<?php
namespace welcome;


class FormattedMessage extends Message
{
    public function __construct(){
        parent::__construct();
    }

    public function getMessage(){
        return '<h2>'.$this->_message.'</h2>';
    }
}
