<?php

class Database
{
  private $host = DB_HOST;
  private $username = DB_USERNAME;
  private $password = DB_PASSWORD;
  private $dbname = DB_NAME;
  private $dbHandler;

  public function __construct()
  {
    $this->dbHandler = new mysqli($this->host, $this->username, $this->password, $this->dbname);
  }

  public function query($query)
  {
    mysqli_query($this->dbHandler, $query);

    return mysqli_affected_rows($this->dbHandler);
  }
}
