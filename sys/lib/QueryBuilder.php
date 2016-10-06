<?php

class QueryBuilder
{
    private $_db;
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function insert($table, $data){
        $keys   = array();
        $values = array();
        
        $keys_str   = '';
        $values_str = '';
        
        if($this->isAssoc($data)){
            foreach($data as $key => $val){
                //Escape data here to prevent SQL injection attacks
                $keys[]   = sprintf('%s', $key);
                $values[] = sprintf('"%s"', $val);
            }
        
        $keys_str   = '('.implode(',', $keys).')';
        
        }else{
            foreach($data as $val){
                //Escape data here to prevent SQL injection attacks
                $values[] = sprintf('"%s"', $val);
            }
        }
        
        $values_str = implode(',', $values);
        
        $query = sprintf('INSERT INTO %s %s VALUES (%s)', $table, $keys_str, $values_str);
        
        return $query;
    }
    
    public function update($table, $data){
        //$values = array();
        
        //foreach($data as $key => $val){
            //$values[] = sprintf('%s = %s', $key, $val);
        //}
        
        //$values_str = implode(',', $values);
        
        //$query = sprintf('INSERT INTO %s ()');
    }
    
    function isAssoc($arr){
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}