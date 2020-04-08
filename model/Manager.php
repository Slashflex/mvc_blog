<?php
namespace Blog\Model;

require('config.php');

class Manager
{
  protected function dbConnect()
  {
    $db = new \PDO('pgsql:host=localhost;dbname=test_mvc', 'david', DB_PASSWORD);
    return $db;
  }
}
