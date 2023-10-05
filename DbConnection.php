<?php
class DataBaseConnection
{
  private static $db_connection;

  public function __construct($user, $pass, $host, $db_name){
    $db_driver = 'mysql';
    self::$db_connection = new PDO("$db_driver:host=$host;dbname=$db_name", $user, $pass);
  }
  
  public function connection(){
    return self::$db_connection;
  }
}
