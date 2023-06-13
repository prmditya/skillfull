<?php

class Database
{
  private $host = DB_HOST;
  private $username = DB_USERNAME;
  private $password = DB_PASSWORD;
  private $dbname = DB_NAME;
  public $dbHandler;

  public function __construct()
  {
    $this->dbHandler = new mysqli($this->host, $this->username, $this->password, $this->dbname);
  }

  public function query($query)
  {
    return mysqli_query($this->dbHandler, $query);
  }
}
