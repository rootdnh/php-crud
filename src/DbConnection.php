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

    try{
      self::$db_connection = new PDO("$db_driver:host=$host;dbname=$db_name", $user, $pass);
      self::$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$db_connection->exec('SET NAMES utf8');
    }catch(PDOException $err) {
      die("Connection Error: " . $err->getMessage());
    }
  }
  
  public static function connection(){
    if(!self::$db_connection){
      new self();
    }
    return self::$db_connection;
  }
}

$con = DatabaseConnection::connection();

