<?php
class DBHandling
{
  const HOST = 'localhost';
  const PORT = 27017;
  const NAME = 'imagehosting';
  
  private $host;
  private $port;
  private $dbname;
  private $connection;
  public $database;
  private $config;


  private static $instance;
  
  private function __construct(){
    
    
    $this->config = Config::getInstance();
    $config = $this->config->parseConfig('database');
    
    $this->host   = $config[0]['host'];
    $this->dbname = $config[0]['database'];
    $this->port   = $config[0]['port'];
    
    $connectionstr = sprintf("mongodb://%s:%d", $this->host, $this->port);
    try{
      $this->connection = new Mongo($connectionstr);
      $this->database = $this->connection->selectDB($this->dbname);
    }catch(MongoConnectException $e){
      throw $e;
    }
  }
  
  public static function getInstance(){
    if(!isset(self::$instance)){  
        self::$instance = new DBHandling();
    }
    //var_dump(self::$instance);
    return self::$instance;
  }
  
  public function getCollection($name){
    return $this->database->selectCollection($name);
  }
}
