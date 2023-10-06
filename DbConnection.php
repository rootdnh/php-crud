<?php
class DatabaseConnection
{
  private static $db_connection;

  private function __construct(){
    $db_driver = 'mysql';
    $user = "root";
    $pass = "#pass";
    $host = "localhost";
    $db_name = "blog";

    self::$db_connection = new PDO("$db_driver:host=$host;dbname=$db_name", $user, $pass);
  }
  
  public static function connection(){
    if(!self::$db_connection){
      new self();
    }
    return self::$db_connection;
  }
}

$con = DatabaseConnection::connection();

